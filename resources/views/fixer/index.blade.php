@extends('layouts.app')
@section('title', 'Fixers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Fixer list</div>

                <div class="card-body">
                    @include('msg.main')
                    <a class="btn btn-secondary btn-sm" href="{{route('fixers-index')}}">Reset sort</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID
                                    <a href="{{route('fixers-index', ['sort' => 'ascId'])}}">&#8679;</a>
                                    <a href="{{route('fixers-index', ['sort' => 'descId'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Fixer name
                                    <a href="{{route('fixers-index', ['sort' => 'ascName'])}}">&#8679;</a>
                                    <a href="{{route('fixers-index', ['sort' => 'descName'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Fixer surname
                                    <a href="{{route('fixers-index', ['sort' => 'ascSurname'])}}">&#8679;</a>
                                    <a href="{{route('fixers-index', ['sort' => 'descSurname'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Photo</th>
                                <th scope="col">Rating
                                    <a href="{{route('fixers-index', ['sort' => 'ascRating'])}}">&#8679;</a>
                                    <a href="{{route('fixers-index', ['sort' => 'descRating'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Company name
                                    <a href="{{route('fixers-index', ['sort' => 'ascCompany'])}}">&#8679;</a>
                                    <a href="{{route('fixers-index', ['sort' => 'descCompany'])}}">&#8681;</a>
                                </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        @forelse($fixers as $fixer)
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
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="{{route('fixers-show', $fixer->id)}}">Show</a>
                            </td>
                        </tr>

                        @empty
                        <li>No fixers, no life.</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
