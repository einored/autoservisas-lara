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
                        <form action="{{route('fixers-store')}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="create_fixer_name" />
                            <li>Surname</li>
                            <input type="text" class="form-control" name="create_fixer_surname" />
                            <li>Photo</li>
                            <input type="text" class="form-control" name="create_fixer_photo" />
                            <li>Company name</li>
                            <select class="form-control" name="create_fixer_company_id" required focus>
                                <option value="" disabled selected>Please select company</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{ $company->name }}</option>
                                @endforeach
                            </select>
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
