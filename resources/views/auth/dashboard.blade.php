@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif --}}

                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data_akun)
                        <tr>
                            <td>{{ $data_akun->id}}</td>
                            <td>
                            <div class="row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>previe project : </strong></label>
                                <div class="col-md-6" style="line-height: 35px;"><?php
                                    if ($images != null){
                                        ?> <embed src="{{ asset('storage/photos'.$images->image_url) }}" width="100" height="100" >
                                     <?php }else{
                                        ?><p>TIDAK ADA GAMBAR</p><?php
                                     }; ?>
                                </div>
                            </div>
                        </td>
                            <td>{{ $data_akun->username }}</td>
                            <td>{{ $data_akun->password }}</td>
                            <td>
                                <form action="{{ route('delete', $data_akun->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <a href="{{ route('edit', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit </a>

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this product?');"></i> Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Belum ada akun</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>

@endsection