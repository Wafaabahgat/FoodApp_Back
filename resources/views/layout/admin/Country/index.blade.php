@extends('layout.admin')

@section('title')
Country Data
@endsection


@section('contentheader')
    Menu Country
@endsection

@section('contentheaderactivelink')
    <a href={{ route('country.index') }}> Country </a>
@endsection

@section('contentheaderactive')
    Show
@endsection

@section('content')
<div class="mb-2">
    <a href="{{ route('country.create') }}" class="mr-2 btn btn-primary">Create</a>
</div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">Country Data</h3>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Created_at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($country as $count)
                            <tr>
                                <th scope="row"> {{ $count->id }} </th>
                                <td> {{ $count->name }} </td>
                                <td> {{ $count->code }} </td>
                                <td> {{ $count->created_at }} </td>
                                <td>
                                    <a href="{{ route('country.edit', $count->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('country.destroy', $count->id) }}" method="post">
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
