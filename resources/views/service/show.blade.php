@extends('layouts.app')
@section('title', 'Company')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Service</div>

                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Service name </th>
                                <th scope="col">Duration </th>
                                <th scope="col">Price </th>
                                <th scope="col">Company name </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->time}}</td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->company_id}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('services-edit', $service)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('services-delete', $service)}}" method="post">
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
