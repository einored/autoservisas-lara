@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create service</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('services-store')}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="create_service_name" />
                            <li>Duration</li>
                            <input type="text" class="form-control" name="create_service_time" />
                            <li>Price</li>
                            <input type="text" class="form-control" name="create_service_price" />
                            <li>Company name</li>
                            <select class="form-control" name="create_service_company_id" required focus>
                                <option value="" disabled selected>Please select company</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" name="create_service_company_id" /> --}}
                            @csrf
                            <button type="submit" class="button-top-margin btn btn-success btn-sm">Create</button>
                        </form>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
