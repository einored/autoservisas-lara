@extends('layouts.app')
@section('title', 'Company')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Company</div>

                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Company name </th>
                                <th scope="col">Address </th>
                                <th scope="col">Phone number </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->phone_number}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('companies-edit', $company)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('companies-delete', $company)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
