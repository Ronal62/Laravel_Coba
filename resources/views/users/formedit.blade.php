@extends('layout.home')

@section('content')
    <h3>Form Edit data</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-outline-primary btn-sm " onclick="window.location='{{ url('users') }}'"><i
                    class="fas fa-arrow-left"></i> </button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ url('users/' . $id) }}">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="txtname" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="txtname" name="txtname" value="{{ $txtname }}">
                </div>
                <div class="col-md-6">
                    <label for="txtusername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="txtusername" name="txtusername"
                        value="{{ $txtusername }}">
                </div>
                <div class="col-md-6">
                    <label for="txtpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="txtpassword" name="txtpassword"
                        value="{{ $txtpassword }}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
