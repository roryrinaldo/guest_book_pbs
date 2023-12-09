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
                                    <!-- Add a hidden input for rating -->
                                    <input type="hidden" name="rating" id="selectedRating" value="{{ $visitor->rating }}">

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating1" name="rating" value="1" {{ $visitor->rating == 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rating1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline" >
                                            <input class="form-check-input" type="radio" id="rating2" name="rating" value="2" {{ $visitor->rating == 2 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rating2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating3" name="rating" value="3" {{ $visitor->rating == 3 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rating3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating3" name="rating" value="4" {{ $visitor->rating == 4 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rating4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rating5" name="rating" value="5" {{ $visitor->rating == 5 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rating5">5</label>
                                        </div>
                                        
                                    </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
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
    document.addEventListener("DOMContentLoaded", function () {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const selectedRatingInput = document.getElementById('selectedRating');

        ratingInputs.forEach(function (ratingInput) {
            ratingInput.addEventListener('change', function () {
                selectedRatingInput.value = this.value;
            });
        });
    });
</script>
@endsection