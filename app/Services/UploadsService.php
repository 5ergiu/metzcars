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
        foreach ($images as $key => $image) {
            foreach ($image as $size => $url) {
                if ($size === self::SIZE_AUTOVIT_S || $size === self::SIZE_AUTOVIT_L) {
                    $buffer = file_get_contents($url);
                    $mime   = (new finfo(FILEINFO_MIME_TYPE))->buffer($buffer);
                    $ext    = substr($mime, strrpos($mime, '/') + 1);

                    if ($size === self::SIZE_AUTOVIT_S) {
                        Storage::put("images/$directory/thumbs/$key.$ext", $buffer);
                    } elseif ($size === self::SIZE_AUTOVIT_L) {
                        Storage::put("images/$directory/$key.$ext", $buffer);
                    }
                }
            }
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
        $currentFilesNumber = count(Storage::files("images/$directory"));

        $idx = $currentFilesNumber > 0 ? $currentFilesNumber + 1 : 1;

        foreach ($images as $image) {

            $path       = 'images/' . $directory;
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
