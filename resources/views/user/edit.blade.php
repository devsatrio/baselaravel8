@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('template_title')
    Users
@endsection

@section('content')
    <div class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        @foreach ($data as $row)
                            <form method="POST" onsubmit="return validasiinput();" role="form"
                                enctype="multipart/form-data" action="{{ url('/users/' . $row->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" value="{{ $row->name }}"
                                                    name="nama" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" value="{{ $row->username }}"
                                                    name="username" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" value="{{ $row->email }}"
                                                    name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level</label>
                                                <select name="level" class="form-control">
                                                    @foreach ($roles as $row_roles)
                                                        <option value="{{ $row_roles->id }}-{{ $row_roles->name }}"
                                                            @if ($row_roles->id == $row->level) selected @endif>
                                                            {{ $row_roles->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password Baru</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="userpassword" autocomplete="new-password">
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
                                <div class="card-footer">
                                    <button type="reset" onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@push('js_in')
    <script src="{{ asset('assets/customjs/users/users_input.js') }}"></script>
@endpush
