<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('SMS.backend.pages.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required|image',
                'description' => 'required',
            ]);
            $path = 'uploads/schedules/';
            $image = $request->image;
            $extension = $request->image->extension();
            $file_name = uniqid() . '_' . $request->name . '.' . $extension;
            $image->storeAs($path, $file_name);
            Schedule::create([
                'name' => $request->name,
                'image_url' => $path.$file_name,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('successToast', 'Schedule created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'description' => 'required',
            ]);
            $path = 'uploads/schedules/';
            $image = $request->image;
            $extension = $request->image->extension();
            $file_name = uniqid() . '_' . $request->name . '.' . $extension;
            $image->storeAs($path, $file_name);
            $schedule = Schedule::findOrFail($id);
            if (Storage::exists($schedule->image_url)) {
                // delete image
                Storage::delete($schedule->image_url);
            }
            $schedule->update([
                'name' => $request->name,
                'image_url' => $path.$file_name,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('successToast', 'Schedule updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);
            $schedule->delete();
            return redirect()->back()->with('successToast', 'Schedule deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
