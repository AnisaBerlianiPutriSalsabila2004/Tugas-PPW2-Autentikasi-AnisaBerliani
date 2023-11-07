@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $data_akun)
                        <tr>
                            <td>{{ $data_akun->id}}</td>
                            <td>{{ $data_akun->role }}</td>
                            <td>{{ $data_akun->username }}</td>
                            <td>{{ $data_akun->password }}</td>
                            <td>
                                <form action="{{ route('account.destroy', $data_akun->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <a href="{{ route('account.show', $data_akun->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('account.edit_akun', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit Akun</a>
                                    
                                    <a href="{{ route('account.edit_profil', $data_akun->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit Profil</a>

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
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection