@extends('layout.admin')

@section('title')
    Edit Country Data
@endsection


@section('contentheader')
    Edit Country Data
@endsection

@section('contentheaderactivelink')
    <a href={{ route('country.index') }}>Edit Country</a>
@endsection

@section('contentheaderactive')
    Edit
@endsection

@section('content')
    <div class="card">
      

        <form action="{{ route('country.update', $country->id) }}" method="post" enctype="multipart/form-data"
            class="mx-2 my-2">
            @csrf
            @method('PUT')

            @include('layout.admin.Country._form', [
                'button_label' => 'Update',
            ])
        </form>

    </div>
@endsection
