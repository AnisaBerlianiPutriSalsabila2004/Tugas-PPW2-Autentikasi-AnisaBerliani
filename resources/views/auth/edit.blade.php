@extends('auth.layouts')

@section('content')

    <div class="card">

    <div class="card-header">
        <div class="float-start">Edit Projek</div>
        <div class="float-end">
            <a href="{{ route('dashboards') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('update', $accounts->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name : </label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ $accounts->name }}">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>


        <div class="mb-3 row">
            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email : </label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ $accounts->email  }}">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Foto Profil: </label>
            <input type="file" class="form-control @error('image_profile') is-invalid @enderror"
                name="image_profile" id="image_profile">

            <!-- error message untuk title -->
            @error('image_profile')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="edit profil">
        </div>

        </form>

    </div>
    </div>

@endsection