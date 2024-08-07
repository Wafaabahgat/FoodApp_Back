@extends('layout.admin')

@section('title')
    Edit Dishes Data
@endsection


@section('contentheader')
    Edit Dishes Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('restaurants.index') }}>Edit Dishes</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Dishes._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
