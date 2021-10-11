<?php

namespace App\Services;

use App\Http\Requests\UploadImagesRequest;
use finfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
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
     * @param array $photos
     */
    public function saveAutovitAdvertPhotos(string $directory, array $photos): void
    {
        foreach ($photos as $key => $photo) {
            foreach ($photo as $size => $url) {
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
     * @param UploadImagesRequest $request
     * @return JsonResponse
     */
    public function handleImagesUpload(UploadImagesRequest $request): JsonResponse
    {
        $success   = true;
        $images    = $request->file('images');
        $directory = $request->get('directory');
        $idx       = 1;

        foreach ($images as $image) {
            $path      = 'images/' . $directory;
            $imageName = "$idx." . $image->getClientOriginalExtension();
            $idx++;

            try {
                Storage::putFileAs($path, $image, $imageName);
                $this->makeThumb($path, $image, $imageName);
            } catch (Throwable $e) {
                $success = false;
                Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
            }
        }

        return response()->json(['success' => $success], $success ? 200 : 400);
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
