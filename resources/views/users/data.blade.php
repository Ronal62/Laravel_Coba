@extends('layout.main')

@section('content')
    <h3>Data User</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-outline-primary " onclick="window.location='{{ url('users/add') }}'"><i
                    class="fas fa-plus"></i> Tambah User</button>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Berhasil!!</strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">*</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->password }}</td>
                            <td>
                                <button onclick="window.location='{{ url('users/' . $row->id) }}'" type="button"
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></button>
                                    
                                <form onsubmit="deleteData('{{ $row->name }}')" style="display: inline" method="POST"
                                    action="{{ url('users/' . $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data" class="btn btn-outline-danger btn-sm"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteData(name) {
            pesan = confirm(`Are you sure to delete ${name}`);
            if (pesan) return true;
            elseif
            return false;
        }
    </script>
@endsection
