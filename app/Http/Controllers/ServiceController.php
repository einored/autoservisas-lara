<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Company;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = match($request->sort) {
            'ascId' => Service::orderBy('id', 'asc')->get(),
            'descId' => Service::orderBy('id', 'desc')->get(),
            'ascName' => Service::orderBy('name', 'asc')->get(),
            'descName' => Service::orderBy('name', 'desc')->get(),
            'ascTime' => Service::orderBy('time', 'asc')->get(),
            'descTime' => Service::orderBy('time', 'desc')->get(), 
            'ascPrice' => Service::orderBy('price', 'asc')->get(),
            'descPrice' => Service::orderBy('price', 'desc')->get(),
            'ascCompany' => Service::orderBy('company_id', 'asc')->get(),
            'descCompany' => Service::orderBy('company_id', 'desc')->get(),
            default => Service::all()
        };
     
        return view('service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        // dd($companies);

        return view('service.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;

        $service->name = $request->create_service_name ?? 'no name';
        $service->time = $request->create_service_time;
        $service->price = $request->create_service_price;
        $service->company_id = $request->create_service_company_id;
        $service->save();

        return redirect()->route('services-index')->with('success', 'Created new service!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(int $serviceId)
    {
        $service = Service::where('id', $serviceId)->first();

        return view('service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $companies = Company::all();

        return view('service.edit', ['service' => $service, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->name = $request->service_name;
        $service->time = $request->service_time;
        $service->price = $request->service_price;
        $service->company_id = $request->service_company_id;

        $service->save();

        return redirect()->route('services-index')->with('success', 'service updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services-index')->with('delete', 'Service deleted!');
    }
}
