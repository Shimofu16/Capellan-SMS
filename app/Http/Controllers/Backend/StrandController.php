<?php

namespace App\Http\Controllers\Backend;

use App\Models\Strand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strands = Strand::all();
        return view('SMS.backend.pages.academics.strand.index', compact('strands'));
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
            $slug = Str::of($request->name)
            ->explode(' ')
            ->reject(function ($word) {
                $lowercaseWord = strtolower($word);
                return in_array($lowercaseWord, ['and', 'the']);
            })
            ->map(function ($word) {
                return Str::substr($word, 0, 1);
            })
            ->implode('');
            Strand::create([
                'name' => $request->name,
                'slug' => $slug,
            ]);
            return back()->with('successToast', 'Strand successfully created!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
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
            $strand = Strand::findOrFail($id);
            $slug = $request->slug;
            if ($request->slug === $strand->slug) {
                $slug = Str::of($request->name)
                    ->explode(' ')
                    ->reject(function ($word) {
                        $lowercaseWord = strtolower($word);
                        return in_array($lowercaseWord, ['and', 'the']);
                    })
                    ->map(function ($word) {
                        return Str::substr($word, 0, 1);
                    })
                    ->implode('');

            }
            $strand->update([
                'name' => $request->name,
                'slug' => $slug,
            ]);
            return back()->with('successToast', 'Strand successfully updated!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $strand = Strand::findOrFail($id);
            $strand->delete();
            return back()->with('successToast', 'Strand successfully deleted!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
