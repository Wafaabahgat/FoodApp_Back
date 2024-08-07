@extends('layout.admin')

@section('title')
    Dishes Data
@endsection


@section('contentheader')
    Menu Dishes
@endsection

@section('contentheaderactivelink')
    <a href={{ route('dishes.index') }}> Dishes </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
    <div class="mb-2">
        <a href="{{ route('dishes.create') }}" class="mr-2 btn btn-primary">Create</a>
        {{-- <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-dark">Trash</a> --}}
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Dishes Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Restaurant</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $dt)
                            <tr>
                                <th scope="row"> {{ $dt->id }} </th>
                                <td> {{ $dt->name }} </td>
                                <td> {{ $dt->description }} </td>
                                <td> {{ $dt->price }} </td>
                                <td>{{ $dt->restaurant ? $dt->restaurant->name : 'No Restaurant' }}</td>
                                <td>{{ $dt->category ? $dt->category->name : 'No Category' }}</td>
                                <td> {{ $dt->created_at }} </td>
                                <td>
                                    <a href="{{ route('dishes.edit', $dt->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('dishes.destroy', $dt->id) }}" method="post">
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
