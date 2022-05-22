<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\StoreRequest;
use App\Models\Announcement;
use App\Services\AnnouncementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AnnouncementController extends Controller
{
    private AnnouncementService $announcementService;

    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    /**
     * @return Response
     */
    public function index()
    {
        return view('admin.announcements.index', [
            'announcements' => Announcement::all(),
        ]);
    }

    /**
     * @return Response
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        return redirect()->route('admin.announcements.index')->with('message', $this->announcementService->save($request));
    }

    /**
     * @param Announcement $announcement
     */
    public function destroy(Announcement $announcement): RedirectResponse
    {
        return redirect()->route('admin.announcements.index')->with('message', $this->announcementService->delete($announcement));
    }
}
