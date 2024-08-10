@extends('layout.admin')

@section('title')
    Edit Restaurants Data
@endsection


@section('contentheader')
    Edit Restaurants Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('restaurants.index') }}>Edit Restaurants</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Restaurants._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
