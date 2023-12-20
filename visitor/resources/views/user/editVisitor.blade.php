@extends('layouts.user_layout')

@section('title', 'Form Edit Data Pengunjung')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Data Pengunjung</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateVisitor', ['id' => $visitor->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $visitor->email }}" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $visitor->nama }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_kunjungan" class="form-control-label">Visit Date</label>
                                    <input class="form-control" type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ $visitor->tanggal_kunjungan }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Address</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $visitor->alamat }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_hp" class="form-control-label">Phone Number</label>
                                    <input class="form-control" type="text" name="no_hp" id="no_hp" value="{{ $visitor->no_hp }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="instansi" class="form-control-label">Instansi</label>
                                    <input class="form-control" type="text" name="instansi" id="instansi" value="{{ $visitor->instansi }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data_dicari" class="form-control-label">Data Dicari</label>
                                    <input class="form-control" type="text" name="data_dicari" id="data_dicari" value="{{ $visitor->data_dicari }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keperluan" class="form-control-label">Keperluan</label>
                                    <input class="form-control" type="text" name="keperluan" id="keperluan" value="{{ $visitor->keperluan }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rating" class="form-control-label">Rating</label>

                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}" {{ $visitor->rating == $i ? 'checked' : '' }}>
                                            <label for="rating{{ $i }}" class="star" title="{{ $i }} stars"></label>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('visitor') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ... (footer section) ... -->
</div>

<script>
     // Mendengarkan perubahan nilai pada bintang rating
     document.querySelectorAll('.rating input').forEach(function (star) {
        star.addEventListener('change', function () {
            // Menangkap nilai bintang yang dipilih
            var rating = this.value;

            // Lakukan sesuatu dengan nilai rating, misalnya tampilkan di console
            console.log('Rating:', rating);
        });
    });
</script>
@endsection