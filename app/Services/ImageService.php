<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Throwable;

final class ImageService
{
    public static function save(array $images, string $storage = 'public', Model $model = null): void
    {
        foreach ($images as $image) {
            try {
                $imageName = rand(11111, 99999) . '.' . $image->getClientOriginalExtension();

                Storage::disk($storage)->put($imageName, $image->getContent());

                $image = Image::create([
                    'storage' => $storage,
                    'name' => $imageName,
                ]);

                $model ? $model->images()->attach($image) : null;
            } catch (Throwable $e) {
                logger($e);
            }
        }
    }

    public static function delete(array $images): void
    {
        foreach ($images as $image) {
            Storage::delete($image->name);
        }
    }
}