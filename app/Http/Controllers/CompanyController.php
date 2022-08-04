<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class CompanyController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    
    {
        $companies = match($request->sort) {
            'ascId' => Company::orderBy('id', 'asc')->get(),
            'descId' => Company::orderBy('id', 'desc')->get(),
            'ascName' => Company::orderBy('name', 'asc')->get(),
            'descName' => Company::orderBy('name', 'desc')->get(),
            'ascAddress' => Company::orderBy('address', 'asc')->get(),
            'descAddress' => Company::orderBy('address', 'desc')->get(), 
            'ascPhone' => Company::orderBy('phone_number', 'asc')->get(),
            'descPhone' => Company::orderBy('phone_number', 'desc')->get(),
            default => Company::all()
        };
     
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->name = $request->create_company_name ?? 'no name';
        $company->address = $request->create_company_address;
        $company->phone_number = $request->create_company_phone;
        $company->save();

        return redirect()->route('companies-index')->with('success', 'Created new company!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(int $companyId)
    {
        $company = Company::where('id', $companyId)->first();

        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->company_name;
        $company->address = $request->company_address;
        $company->phone_number = $request->company_phone;

        $company->save();

        return redirect()->route('companies-index')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies-index')->with('delete', 'Company deleted!');
    }
}
