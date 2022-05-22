<?php

namespace App\Services;

use App\Models\Announcement;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

final class AnnouncementService
{
    public function save(Request $request): string
    {
        $storage = $request->get('storage', 'local');

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ];

        $announcement = Announcement::create($data);

        foreach ($request->images as $image) {
            try {
                $imageName = rand(11111, 99999) . '.' . $image->getClientOriginalExtension();
                Storage::disk($storage)->put($imageName, $image->file());
                $image = Image::create([
                    'storage' => $storage,
                    'filename' => $imageName,
                ]);
    
                $announcement->images()->attach($image->id);
            } catch (Throwable $e) {
                logger($e);
            }
        }

        return 'Announcement with title' . $announcement->title . 'is created.';
    }

    public function delete(Announcement $announcement)
    {
        $title = $announcement->title;

        $announcement->images()->detach();

        $announcement->delete();

        return 'Announcement with title' . $title . 'is deleted.';
    }
}
