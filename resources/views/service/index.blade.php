@extends('layouts.app')
@section('title', 'Services')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Service list</div>

                <div class="card-body">
                    @include('msg.main')
                    <a class="btn btn-secondary btn-sm" href="{{route('services-index')}}">Reset sort</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID
                                    <a href="{{route('services-index', ['sort' => 'ascId'])}}">&#8679;</a>
                                    <a href="{{route('services-index', ['sort' => 'descId'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Service name
                                    <a href="{{route('services-index', ['sort' => 'ascName'])}}">&#8679;</a>
                                    <a href="{{route('services-index', ['sort' => 'descName'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Duration
                                    <a href="{{route('services-index', ['sort' => 'ascTime'])}}">&#8679;</a>
                                    <a href="{{route('services-index', ['sort' => 'descTime'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Price
                                    <a href="{{route('services-index', ['sort' => 'ascPrice'])}}">&#8679;</a>
                                    <a href="{{route('services-index', ['sort' => 'descPrice'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Company name
                                    <a href="{{route('services-index', ['sort' => 'ascCompany'])}}">&#8679;</a>
                                    <a href="{{route('services-index', ['sort' => 'descCompany'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        @forelse($services as $service)
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
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="{{route('services-show', $service->id)}}">Show</a>
                            </td>
                        </tr>

                        @empty
                        <li>No services, no life.</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
