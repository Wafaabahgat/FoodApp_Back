@extends('layout.admin')

@section('title')
Branches Data
@endsection


@section('contentheader')
    Menu Branches
@endsection

@section('contentheaderactivelink')
    <a href={{ route('branches.index') }}> Branches </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
<div class="mb-2">
    <a href="{{ route('branches.create') }}" class="mr-2 btn btn-primary">Create</a>
</div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Branches Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Restaurant</th>
                            <th scope="col">Country</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branches as $branch)
                            <tr>
                                <th scope="row"> {{ $branch->id }} </th>
                                <td> {{ $branch->name }} </td>
                                <td>{{ $branch->restaurant ? $branch->restaurant->name : 'No Restaurant' }}</td>
                                <td>{{ $branch->country ? $branch->country->name : 'No Country' }}</td>
                                <td> {{ $branch->address }} </td>
                                <td> {{ $branch->phone }} </td>
                                <td> {{ $branch->created_at }} </td>
                                <td>
                                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="post">
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
