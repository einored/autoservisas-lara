@extends('layouts.app')
@section('title', 'Companies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Company list</div>

                <div class="card-body">
                    @include('msg.main')
                    <a class="btn btn-secondary btn-sm" href="{{route('companies-index')}}">Reset sort</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID
                                    <a href="{{route('companies-index', ['sort' => 'ascId'])}}">&#8679;</a>
                                    <a href="{{route('companies-index', ['sort' => 'descId'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Company name
                                    <a href="{{route('companies-index', ['sort' => 'ascName'])}}">&#8679;</a>
                                    <a href="{{route('companies-index', ['sort' => 'descName'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Address
                                    <a href="{{route('companies-index', ['sort' => 'ascAddress'])}}">&#8679;</a>
                                    <a href="{{route('companies-index', ['sort' => 'descAddress'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Phone number
                                    <a href="{{route('companies-index', ['sort' => 'ascPhone'])}}">&#8679;</a>
                                    <a href="{{route('companies-index', ['sort' => 'descPhone'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        @forelse($companies as $company)
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
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="{{route('companies-show', $company->id)}}">Show</a>
                            </td>
                        </tr>

                        @empty
                        <li>No companies, no life.</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
