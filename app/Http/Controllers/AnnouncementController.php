<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Response;

class AnnouncementController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        return view('index', [
            'announcements' => Announcement::all(),
        ]);
    }

    /**
     * @param Announcement $announcement
     *
     * @return Response
     */
    public function show(Announcement $announcement)
    {
        return view('show', [
            'announcement' => $announcement,
        ]);
    }
}
