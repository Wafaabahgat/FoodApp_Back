@extends('layout.admin')

@section('title')
    Create Orders Data
@endsection


@section('contentheader')
    Menu Orders
@endsection

@section('contentheaderactivelink')
    <a href={{ route('orders.index') }}>Create Orders Data</a>
@endsection

@section('contentheaderactive')
    Create Orders
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">Create</h3>
        </div>

        <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf

            @include('layout.admin.Orders._form')
        </form>
    </div>
@endsection

{{--         $orderitem --}}
@section('contentheaderactive')
    Create Order Item
@endsection

@section('content')
    <div class="card">

        <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data" class="mx-2 my-2">
            @csrf

            @include('layout.admin.Orders._formitem')
        </form>
    </div>
@endsection
