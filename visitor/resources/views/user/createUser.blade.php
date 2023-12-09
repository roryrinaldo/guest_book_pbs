@extends('layouts.user_layout')

@section('title', 'Form Tambah Data User')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah User</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeUser') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control" type="text" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                      
                       
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('managementUser') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ... (footer section) ... -->
</div>
@endsection