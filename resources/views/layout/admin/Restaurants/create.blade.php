@extends('layout.admin')

@section('title')
    Create Restaurants Data
@endsection


@section('contentheader')
    Menu Restaurants
@endsection

@section('contentheaderactivelink')
    <a href={{ route('restaurants.index') }}>Create Restaurants Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('restaurants.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf

            @include('layout.admin.Restaurants._form')
        </form>

    </div>
@endsection
