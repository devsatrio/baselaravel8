@extends('layouts.app')
@section('title')
    Poliklinik
@endsection

@section('css')
@endsection

@section('template_title')
    Edit Profile
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Profile</h3>
                        </div>
                        <form method="POST" role="form" onsubmit="return validasiinput();" enctype="multipart/form-data"
                            action="{{ url('/home/edit-profile') }}">
                            @csrf
                            @foreach ($data as $row)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $row->name }}" id="nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ $row->username }}" id="username" autocomplete="new-username"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $row->email }}" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password Baru</label>
                                                <input type="password" class="form-control" id="password"
                                                    autocomplete="new-password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control" id="kpassword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card-footer">
                                <button type="button" onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection

@push('js_in')
    <script>
        function validasiinput() {
            if ($('#password').val() == $('#kpassword').val()) {
                return true;
            } else {
                Swal.fire({
                    title: 'Maaf',
                    text: 'Konfirmasi password salah!'
                })
                $('#kpassword').val('');
                return false;
            }
        }
    </script>
@endpush
