@extends('layout.admin')

@section('title')
    Restaurants Data
@endsection


@section('contentheader')
    Menu Restaurants
@endsection

@section('contentheaderactivelink')
    <a href={{ route('restaurants.index') }}> Restaurants </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
<div class="mb-2">
    <a href="{{ route('restaurants.create') }}" class="mr-2 btn btn-primary">Create</a>
    {{-- <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-dark">Trash</a> --}}
</div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Restaurants Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
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
                                <td> {{ $dt->phone }} </td>
                                <td> {{ $dt->email }} </td>
                                <td> {{ $dt->created_at }} </td>
                                <td>
                                    <a href="{{ route('restaurants.edit', $dt->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('restaurants.destroy', $dt->id) }}" method="post">
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
