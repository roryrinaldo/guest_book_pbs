@extends('layouts.user_layout')

@section('title', 'Data Pengunjung')

@section('content')
   

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
        
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
            
                </li>
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
              
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}>
        
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
        @endif
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Daftar Pengunjung</h6>
                        <div class="d-flex">
                            <div class="form-group mt-3 me-2 col-md-10">
                                <input type="text" class="form-control" id="search" placeholder="Search">
                            </div>
                            <button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('createVisitor') }}'">Tambah</button>
                        </div>
                    </div>
                    <div class="card-body mx-4 px-0 pt-0 pb-3">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visit Date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Instansi</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Dicari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keperluan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $counter = 1 @endphp
                                @foreach($visitors as $visitor)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                      
                                        <td>{{ $visitor->nama }}</td>
                                        <td>{{ $visitor->tanggal_kunjungan }}</td>
                                  
                                
                                        <td>{{ $visitor->instansi }}</td>
                                        <td>{{ $visitor->data_dicari }}</td>
                                        <td>{{ $visitor->keperluan }}</td>
                                        <td>
                                            @for ($i = 1; $i <= $visitor->rating; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                            @endfor
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary text-white font-weight-bold text-xs" onclick="showDetailsModal('{{ $visitor->id }}')">
                                                Detail
                                            </button>                                               
                                            <a href="{{ route('editVisitor', ['id' => $visitor->id]) }}" class="btn btn-warning text-secondary font-weight-bold text-white text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            <a href="{{ route('deleteVisitor', ['id' => $visitor->id]) }}" class="btn btn-danger text-white font-weight-bold text-xs" onclick="return confirm('Are you sure you want to delete this visitor?')" data-toggle="tooltip" data-original-title="Delete user">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                              
                                    <div class="modal fade" id="detailsModal{{ $visitor->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modal-title-default">Detail Pengunjung</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Email:</strong> {{ $visitor->email }}</p>
                                                    <p><strong>Name:</strong> {{ $visitor->nama }}</p>
                                                    <p><strong>Visit Date:</strong> {{ $visitor->tanggal_kunjungan }}</p>
                                                    <p><strong>Address:</strong> {{ $visitor->alamat }}</p>
                                                    <p><strong>Phone:</strong> {{ $visitor->no_hp }}</p>
                                                    <p><strong>Instansi:</strong> {{ $visitor->instansi }}</p>
                                                    <p><strong>Data Dicari:</strong> {{ $visitor->data_dicari }}</p>
                                                    <p><strong>Keperluan:</strong> {{ $visitor->keperluan }}</p>
                                                    <p><strong>Rating:</strong> 
                                                    @for ($i = 1; $i <= $visitor->rating; $i++)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @endfor</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                             <!-- Tautan Pagination Manual -->
                             <div class="d-flex justify-content-center mt-4">
                                <ul class="pagination">
                                    @if ($visitors->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">&laquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $visitors->previousPageUrl() }}" rel="prev">&laquo;</a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $visitors->lastPage(); $i++)
                                        <li class="page-item {{ $visitors->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $visitors->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($visitors->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $visitors->nextPageUrl() }}" rel="next">&raquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">&raquo;</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    

    <script>    
        document.addEventListener('DOMContentLoaded', function () {
            // Auto close success alert after 5 seconds
            var successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(function () {
                    successAlert.classList.add('fade');
                    successAlert.addEventListener('transitionend', function () {
                        successAlert.style.display = 'none';
                    });
                }, 5000);
            }

            // Auto close error alert after 5 seconds
            var errorAlert = document.querySelector('.alert-danger');
            if (errorAlert) {
                setTimeout(function () {
                    errorAlert.classList.add('fade');
                    errorAlert.addEventListener('transitionend', function () {
                        errorAlert.style.display = 'none';
                    });
                }, 5000);
            }
        });


        // Add JavaScript code for search functionality (as in the previous example)
        function showDetailsModal(visitorId) {
            // Find the modal element by ID
            var modal = $('#detailsModal' + visitorId);
            if (modal.length) {
                // Show the modal
                modal.modal('show');
            } else {
                console.error('Modal not found for visitor ID: ' + visitorId);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('search');
            const tableRows = document.querySelectorAll('.table tbody tr');
    
            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
    
                tableRows.forEach(function (row) {
                    const rowData = row.innerText.toLowerCase();
                    row.style.display = rowData.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
@endsection