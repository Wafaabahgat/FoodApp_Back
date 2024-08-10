@extends('layout.admin')

@section('title')
    Orders Data
@endsection


@section('contentheader')
    Menu Orders
@endsection

@section('contentheaderactivelink')
    <a href={{ route('orders.index') }}> Orders </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
    <div class="mb-2">
        <a href="{{ route('orders.create') }}" class="mr-2 btn btn-primary">Create</a>
        {{-- <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-dark">Trash</a> --}}
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Orders Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User</th>
                            <th scope="col">Restaurant</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total_amount</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $dt)
                            <tr>
                                <th scope="row"> {{ $dt->id }} </th>
                                <td> {{ $dt->name }} </td>
                                <td> {{ $dt->address }} </td>
                                <td> {{ $dt->status }} </td>
                                <td> {{ $dt->total_amount }} </td>
                                <td> {{ $dt->created_at }} </td>
                                <td>
                                    <a href="{{ route('orders.edit', $dt->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('orders.destroy', $dt->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    No data yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>


        {{-- Orders item --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Orders item Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order Name</th>
                            <th scope="col">Dish</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orderitemdata as $orderitemdt)
                            <tr>

                                <td> {{ $orderitemdt->order_id }} </td>
                                <td> {{ $orderitemdt->dish_id }} </td>
                                <td> {{ $orderitemdt->quantity }} </td>
                                <td> {{ $orderitemdt->price }} </td>
                                <td> {{ $orderitemdt->created_at }} </td>
                                <td>
                                    <a href="{{ route('orders.edit', $dt->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('orders.destroy', $dt->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    No data yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
