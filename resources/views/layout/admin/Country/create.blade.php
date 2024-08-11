@extends('layout.admin')

@section('title')
    Create Country Data
@endsection


@section('contentheader')
    Menu Country
@endsection

@section('contentheaderactivelink')
    <a href={{ route('country.index') }}>Create Country Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('country.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf
            @include('layout.admin.Country._form')
        </form>

    </div>
@endsection
