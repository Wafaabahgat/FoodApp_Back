@extends('layout.admin')

@section('title')
    Create Carusels Data
@endsection


@section('contentheader')
    Menu Carusels
@endsection

@section('contentheaderactivelink')
    <a href={{ route('carusels.index') }}>Create Carusels Data</a>
@endsection

@section('contentheaderactive')
    Create
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('carusels.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf
            @include('layout.admin.Carusels._form')
        </form>

    </div>
@endsection
