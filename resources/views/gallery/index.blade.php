@extends('auth.layouts')
@section('content')
<div class="row justify-content-center mt-5">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">Dashboard</div>
 <div class="card-body">
 <div class="rowcreate">
 @if(count($galleries)>0)
 @foreach ($galleries as $gallery)
 <div class="col-sm-3">
 <div>
 <a class="example-image-link" href="{{asset('storage/posts_image/'.$gallery->picture)}}" data-lightbox="roadtrip" data-title="{{$gallery->description}}">
 <img class="example-image img-fluid mb-2" src="{{asset('storage/posts_image/'.$gallery->picture )}}" alt="{{$gallery->title}}" />
 <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm mt-2">EDIT POST</a>
 <a href="{{ route('gallery.destroy', $gallery->id) }}" class="btn btn-danger btn-sm mt-2">DELETE POST</a>
 </a>
 </div>
 </div>
 <br>
 @endforeach
 @else
 <h3>Tidak ada data.</h3>
 @endif
 <div class="d-flex">
 {{ $galleries->links() }}
 </div>
 </div>
 </div>
 </div>
 <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm mt-2">CREATE POST</a>
 </div>
</div>
@endsection