@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-13">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">Username</th>
                        <th scope="col">email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data_akun)
                        <tr>
                            <td>{{ $data_akun->id}}</td>
                            <td>
                            <div class="row">
                                <div class="col-md-6" style="line-height: 35px;"><?php
                                    if ($data_akun->image_profile != null){
                                        ?> <embed src="{{ asset('storage/photos/thumbnail/'.$data_akun->image_profile) }}">
                                     <?php }else{
                                        ?><p>TIDAK ADA GAMBAR</p><?php
                                     }; ?>
                                </div>
                            </div>
                        </td>
                            <td>{{ $data_akun->name }}</td>
                            <td>{{ $data_akun->email }}</td>
                            <td>
                                <a href="{{ route('edit', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit </a>

                                <form action="{{ route('delete', $data_akun->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this product?');"></i> Delete Image</button>
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