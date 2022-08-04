@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit order</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('orders-edit', $order)}}" method="post">
                            <li>User</li>
                            <select class="form-control" name="order_user_id" required focus>
                                @foreach($users as $user)
                                <option value="{{$user->id}}" {{old('order_user_id', $order->user_id)==$user->id? 'selected':''}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <li>Fixer</li>
                            <select class="form-control" name="order_fixer_id" required focus>
                                @foreach($fixers as $fixer)
                                <option value="{{$fixer->id}}" {{old('order_fixer_id', $order->fixer_id)==$fixer->id? 'selected':''}}>{{ $fixer->name }}</option>
                                @endforeach
                            </select>
                            <li>Service</li>
                            <select class="form-control" name="order_service_id" required focus>
                                @foreach($services as $service)
                                <option value="{{$service->id}}" {{old('order_service_id', $order->service_id)==$service->id? 'selected':''}}>{{ $service->name }}</option>
                                @endforeach
                            </select>
                            <li>Status</li>
                            <select class="form-control" name="order_status" required focus>
                                <option value="0" {{old('order_status', $order->status)=='0'?'selected':''}}>Nepatvirtinta</option>
                                <option value="1" {{old('order_status', $order->status)=='1'?'selected':''}}>Patvirtinta</option>
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
