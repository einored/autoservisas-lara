@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit fixer</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('fixers-edit', $fixer)}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="fixer_name" value="{{old('fixer_name', $fixer->name)}}" />
                            <li>Surname</li>
                            <input type="text" class="form-control" name="fixer_surname" value="{{old('fixer_surname', $fixer->surname)}}" />
                            <li>Photo</li>
                            <input type="text" class="form-control" name="fixer_photo" value="{{old('fixer_photo', $fixer->photo)}}" />
                            <li>Company name</li>
                            <select class="form-control" name="fixer_company_id" required focus>
                                <option value="{{old('fixer_company_id', $fixer->company_id)}}" >Please select company</option>
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
