@extends('layouts.visitor_layout')

@section('title', 'Form Buku Tamu')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center ">
                        <p class="mb-0 ">Isi Buku Tamu</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeTamu') }}" method="post">
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
                                    <label for="nama" class="form-control-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="nama" id="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_kunjungan" class="form-control-label">Visit Date</label>
                                    
                                </div>
                            </div> --}}
                            <input hidden class="form-control" type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" required>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp" class="form-control-label">Nomor Handphone</label>
                                    <input class="form-control" type="text" name="no_hp" id="no_hp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instansi" class="form-control-label">Instansi</label>
                                    <input class="form-control" type="text" name="instansi" id="instansi" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data_dicari" class="form-control-label">Data Dicari</label>
                                    <input class="form-control" type="text" name="data_dicari" id="data_dicari" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keperluan" class="form-control-label">Keperluan</label>
                                    <input class="form-control" type="text" name="keperluan" id="keperluan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rating" class="form-control-label">Rating</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating1" name="rating" value="1">
                                            <label class="custom-control-label" for="rating1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline" >
                                            <input class="form-check-input" type="radio" id="rating2" name="rating" value="2">
                                            <label class="custom-control-label" for="rating2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating3" name="rating" value="3">
                                            <label class="custom-control-label" for="rating3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating3" name="rating" value="4">
                                            <label class="custom-control-label" for="rating4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating5" name="rating" value="5">
                                            <label class="custom-control-label" for="rating5">5</label>
                                        </div>
                                        
                                    </div>
                            </div>
                       
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ... (footer section) ... -->
</div>

<script>
    // Set default value to today's date
    document.getElementById('tanggal_kunjungan').valueAsDate = new Date();
</script>
@endsection