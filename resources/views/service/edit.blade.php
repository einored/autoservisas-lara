@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit service</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('services-edit', $service)}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="service_name" value="{{old('service_name', $service->name)}}" />
                            <li>Duration</li>
                            <input type="text" class="form-control" name="service_time" value="{{old('service_time', $service->time)}}" />
                            <li>Price</li>
                            <input type="text" class="form-control" name="service_price" value="{{old('service_price', $service->price)}}" />
                            <li>Company name</li>
                            <select class="form-control" name="service_company_id" required focus>
                                <option value="{{old('service_company_id', $service->company_id)}}" >Please select company</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('put')
                            <button type="submit" class="button-top-margin btn btn-success btn-sm">Edit</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
