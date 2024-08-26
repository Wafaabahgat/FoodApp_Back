@extends('layout.admin')

@section('title')
    Carusels Data
@endsection


@section('contentheader')
    Menu Carusels
@endsection

@section('contentheaderactivelink')
    <a href={{ route('carusels.index') }}> Carusels </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
    <div class="mb-2">
        <a href="{{ route('carusels.create') }}" class="mr-2 btn btn-primary">Create</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Carusels Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $dt)
                            <tr>
                                <th scope="row"> {{ $dt->id }} </th>
                                <td>
                                    <img src="{{ asset('storage/' . $dt->image) }}" alt="Carusels Image" height="60"
                                        width="80" />
                                </td>
                                <td> {{ $dt->name }} </td>
                                <td> {{ $dt->created_at }} </td>
                                <td>
                                    <a href="{{ route('carusels.edit', $dt->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('carusels.destroy', $dt->id) }}" method="post">
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
