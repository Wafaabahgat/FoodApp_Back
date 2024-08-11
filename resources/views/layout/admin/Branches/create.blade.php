@extends('layout.admin')

@section('title')
    Create Branches Data
@endsection


@section('contentheader')
    Menu Branches
@endsection

@section('contentheaderactivelink')
    <a href={{ route('branches.index') }}>Create Branches Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('branches.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf
            @include('layout.admin.Branches._form')
        </form>

    </div>
@endsection
