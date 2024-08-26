@extends('layout.admin')

@section('title')
    Edit Carusels Data
@endsection


@section('contentheader')
    Edit Carusels Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('carusels.index') }}>Edit Carusels</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('carusels.update', $carusels->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Carusels._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
