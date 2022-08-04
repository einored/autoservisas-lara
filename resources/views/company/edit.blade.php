@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit company</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('companies-edit', $company)}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="company_name" value="{{old('company_name', $company->name)}}" />
                            <li>Address</li>
                            <input type="text" class="form-control" name="company_address" value="{{old('company_address', $company->address)}}" />
                            <li>Phone number</li>
                            <input type="text" class="form-control" name="company_phone" value="{{old('company_phone', $company->phone_number)}}" />

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
