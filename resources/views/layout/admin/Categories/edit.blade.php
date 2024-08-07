@extends('layout.admin')

@section('title')
    Edit Category Data
@endsection


@section('contentheader')
    Edit Category Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('categories.index') }}>Edit Category</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Categories._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
