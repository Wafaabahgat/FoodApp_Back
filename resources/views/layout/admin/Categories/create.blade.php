@extends('layout.admin')

@section('title')
    Create Categories Data
@endsection


@section('contentheader')
    Menu Categories
@endsection

@section('contentheaderactivelink')
    <a href={{ route('categories.index') }}>Create Categories Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf
            @include('layout.admin.Categories._form')
        </form>

    </div>
@endsection
