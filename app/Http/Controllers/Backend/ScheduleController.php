<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Http\Controllers\Controller;
use App\Models\EMS\ActiveSyandSem;
use App\Models\EMS\SchoolYear;
use App\Models\EMS\Specialization;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public $path;
    public $sy_id;
    public function __construct()
    {
        $this->path = 'uploads/schedules/';
        $this->sy_id = ActiveSyandSem::find(1)->active_SY_id;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $teachers = Teacher::all();
        $specializations = Specialization::all();
        return view('SMS.backend.pages.schedule.index', compact('schedules', 'teachers', 'specializations'));
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
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'teacher_id' => 'required',
                'specialization_id' => 'required',
            ]);
            $image = $request->image;
            $extension = $request->image->extension();
            $file_name = uniqid() . '_' . $request->name . '.' . $extension;
            $image->storeAs($this->path, $file_name);
            Schedule::create([
                'name' => $request->name,
                'image_url' => $this->path . $file_name,
                'teacher_id' => $request->teacher_id,
                'specialization_id' => $request->specialization_id,
                'sy_id' => $this->sy_id,
            ]);
            GenerateUserSession::GenerateSession('Schedule Management', 'Added a Schedule ' . $request->name, auth()->user());
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
            $schedule = Schedule::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->image;
                $extension = $request->image->extension();
                $file_name = uniqid() . '_' . $request->name . '.' . $extension;
                $image->storeAs($this->path, $file_name);
                if (Storage::exists($schedule->image_url)) {
                    // delete image
                    Storage::delete($schedule->image_url);
                }
            }
            $schedule->update([
                'name' => $request->name,
                'image_url' => ($request->hasFile('image')) ? $this->path . $file_name : $schedule->image_url,
                'teacher_id' => $request->teacher_id,
                'specialization_id' => $request->specialization_id,
            ]);
            GenerateUserSession::GenerateSession('Schedule Management', 'Updated Schedule ' . $schedule->name, auth()->user());
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
            // check if image exists
            if (Storage::exists($schedule->image_url)) {
                // delete image
                Storage::delete($schedule->image_url);
            }
            $schedule->delete();
            GenerateUserSession::GenerateSession('Schedule Management', 'Deleted Schedule ' . $schedule->name, auth()->user());
            return redirect()->back()->with('successToast', 'Schedule deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
