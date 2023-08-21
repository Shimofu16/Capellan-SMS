<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Fee;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::all();
        return view('SMS.backend.pages.maintenance.index', compact('fees', ));
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
            if ($request->isActive == 1) {
                Fee::where('is_active', 1)->update(['is_active' => 0]);
            }
            Fee::create([
                'fee' => $request->fee,
                'is_active' => $request->isActive,
            ]);
            return redirect()->back()->with('successToast', 'Fee added successfully!');
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
    public function update(Request $request,  $id)
    {
        try {
            $fee = Fee::find($id);
            if ($request->isActive == 1) {
                Fee::where('is_active', 1)->update(['is_active' => 0]);
            }
            $fee->update([
                'fee' => $request->fee,
                'is_active' => $request->isActive,
            ]);
            return redirect()->back()->with('successToast', 'Fee updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
