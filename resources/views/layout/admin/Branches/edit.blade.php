@extends('layout.admin')

@section('title')
    Edit Branches Data
@endsection


@section('contentheader')
    Edit Branches Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('branches.index') }}>Edit Branches</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('branches.update', $branches->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Branches._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
