@extends('layouts.app')
@section('title', 'Fixer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Fixer</div>

                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Fixer name </th>
                                <th scope="col">Fixer surname </th>
                                <th scope="col">Photo </th>
                                <th scope="col">Rating </th>
                                <th scope="col">Company name </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$fixer->id}}</td>
                            <td>{{$fixer->name}}</td>
                            <td>{{$fixer->surname}}</td>
                            <td>{{$fixer->photo}}</td>
                            <td>{{$fixer->rating}}</td>
                            <td>{{$fixer->company_id}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('fixers-edit', $fixer)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('fixers-delete', $fixer)}}" method="post">
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
