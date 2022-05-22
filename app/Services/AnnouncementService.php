<?php

namespace App\Services;

use App\Models\Announcement;
use Illuminate\Http\Request;

final class AnnouncementService
{
    public function save(Request $request): string
    {
        $storage = $request->get('storage', 'public');

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ];
        $images = $request->images ?? [];

        $announcement = Announcement::create($data);

        ImageService::save($images, $storage, $announcement);

        return 'Announcement with title' . $announcement->title . 'is created.';
    }

    public function delete(Announcement $announcement): string
    {
        $title = $announcement->title;

        ImageService::delete($announcement->images);

        $announcement->images()->detach();

        $announcement->delete();

        return 'Announcement with title' . $title . 'is deleted.';
    }
}
