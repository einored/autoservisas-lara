@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create company</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('companies-store')}}" method="post">
                            <li>Name</li>
                            <input type="text" class="form-control" name="create_company_name" />
                            <li>Address</li>
                            <input type="text" class="form-control" name="create_company_address" />
                            <li>Phone number</li>
                            <input type="text" class="form-control" name="create_company_phone" />
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
