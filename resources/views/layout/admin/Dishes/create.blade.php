@extends('layout.admin')

@section('title')
    Create Dishes Data
@endsection


@section('contentheader')
Create Dish
@endsection

@section('contentheaderactivelink')
    <a href={{ route('restaurants.index') }}>Create Dishes Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">

        <form action="{{ route('dishes.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf

            @include('layout.admin.Dishes._form')
        </form>

    </div>
@endsection
