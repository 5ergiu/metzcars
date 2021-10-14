<?php

namespace App\Services;

use App\Helpers\LoggerHelper;
use finfo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class UploadsService
{
    const SIZE_AUTOVIT_S = '320x240';
    const SIZE_AUTOVIT_L = '1280x800';
    const SIZE_THUMB     = '300';

    /**
     * Saves autovit advert images to public storage.
     * @param string $directory
     * @param array $images
     */
    public function saveAutovitAdvertImages(string $directory, array $images): void
    {
        $idx  = 1;
        $path = 'images/' . $directory;

        foreach ($images as $image) {
            foreach ($image as $size => $url) {
                if ($size === self::SIZE_AUTOVIT_S || $size === self::SIZE_AUTOVIT_L) {
                    $imageName = "$idx.jpeg";
                    $image     = Image::make($url)->encode('jpeg', 100)->save("/tmp/$imageName");

                    if ($size === self::SIZE_AUTOVIT_S) {
                        Storage::putFileAs("$path/thumbs", $image->basePath(), $imageName);
                    } elseif ($size === self::SIZE_AUTOVIT_L) {
                        Storage::putFileAs($path, $image->basePath(), $imageName);
                    }
                }
            }
            $idx++;
        }
    }

    /**
     * Handles the upload of images.
     * @param array $images
     * @param string $directory
     * @return void
     */
    public function handleImagesUpload(array $images, string $directory): void
    {
        if(count(Storage::files("images/$directory")) > 0) {
            Storage::deleteDirectory("images/$directory");
        }

        $idx  = 1;
        $path = 'images/' . $directory;

        foreach ($images as $image) {
            $encodedImg = Image::make($image->path())->encode('jpeg', 100)->save();
            $imageName  = "$idx.jpeg";

            $idx++;

            try {
                Storage::putFileAs($path, $encodedImg->basePath(), $imageName);
                $this->makeThumb($path, $image, $imageName);
            } catch (Throwable $e) {
                new LoggerHelper($e);
            }
        }
    }

    /**
     * Creates thumbnails.
     * @param string $path
     * @param UploadedFile $image
     * @param string $imageName
     * @return void
     */
    private function makeThumb(string $path, UploadedFile $image, string $imageName): void
    {
        $thumb = Image::make($image->path())->resize(self::SIZE_THUMB, self::SIZE_THUMB, function ($constraint) {
            $constraint->aspectRatio();
        })->save();

        $path = $path . '/thumbs';

        Storage::putFileAs($path, $thumb->basePath(), $imageName);
    }
}
