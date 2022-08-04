<?php

namespace App\Http\Controllers;

use App\Models\Fixer;
use App\Models\Company;
use Illuminate\Http\Request;

class FixerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fixers = match($request->sort) {
            'ascId' => Fixer::orderBy('id', 'asc')->get(),
            'descId' => Fixer::orderBy('id', 'desc')->get(),
            'ascName' => Fixer::orderBy('name', 'asc')->get(),
            'descName' => Fixer::orderBy('name', 'desc')->get(),
            'ascSurname' => Fixer::orderBy('surname', 'asc')->get(),
            'descSurname' => Fixer::orderBy('surname', 'desc')->get(), 
            'ascRating' => Fixer::orderBy('rating', 'asc')->get(),
            'descRating' => Fixer::orderBy('rating', 'desc')->get(), 
            'ascCompany' => Fixer::orderBy('company_id', 'asc')->get(),
            'descCompany' => Fixer::orderBy('company_id', 'desc')->get(),
            default => Fixer::all()
        };

        return view('fixer.index', ['fixers' => $fixers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('fixer.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fixer = new Fixer;

        $fixer->name = $request->create_fixer_name ?? 'no name';
        $fixer->surname = $request->create_fixer_surname;
        $fixer->photo = $request->create_fixer_photo;
        // $fixer->rating = $request->create_fixer_rating;
        $fixer->rating = 0; 
        $fixer->company_id = $request->create_fixer_company_id;
        $fixer->save();

        return redirect()->route('fixers-index')->with('success', 'Created new fixer!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixer  $fixer
     * @return \Illuminate\Http\Response
     */
    public function show(int $fixerId)
    {
        $fixer = Fixer::where('id', $fixerId)->first();

        return view('fixer.show', ['fixer' => $fixer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixer  $fixer
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixer $fixer)
    {
        $companies = Company::all();

        return view('fixer.edit', ['fixer' => $fixer, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Fixer  $fixer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixer $fixer)
    {
        $fixer->name = $request->fixer_name;
        $fixer->surname = $request->fixer_surname;
        $fixer->photo = $request->fixer_photo;
        // $fixer->rating = $request->fixer_rating;
        // $fixer->rating = 0;
        $fixer->company_id = $request->fixer_company_id;

        $fixer->save();

        return redirect()->route('fixers-index')->with('success', 'Fixer updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixer  $fixer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixer $fixer)
    {
        $fixer->delete();

        return redirect()->route('fixers-index')->with('delete', 'Fixer deleted!');
    }
}
