@extends('layouts.app')
@section('title', 'Orders')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    @include('msg.main')
                    <a class="btn btn-secondary btn-sm" href="{{route('orders-index')}}">Reset sort</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Service</th>
                                <th scope="col">Fixer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit/Change status</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->service_id}}</td>
                            <td>{{$order->fixer_id}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('orders-edit', $order)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('orders-delete', $order)}}" method="post">
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
