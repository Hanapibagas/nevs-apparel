@extends('layouts.app')

@push('css')

@endpush

@section('content')
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text : "{{ session('success') }}",
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    })
</script>
@endif

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Costumer Service</h4>
        <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalCenter">
            Kirim data ke disainer
        </button>
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Form pengiriman data ke tim disainer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('postKeTimDisainerPegawai') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Tim</label>
                                    <input name="nama_tim" type="text" id="nameWithTitle" class="form-control"
                                        placeholder="Silahkan masukkan nama tim ..." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Disainer</label>
                                    <select name="users_id" aria-label="Default select example"
                                        id="exampleFormControlSelect1" class="form-select">
                                        <option selected>-- Silahkan Pilih Disainer --</option>
                                        @foreach ( $users as $user )
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} sedang menangani desain {{
                                            isset($userCounts[$user->id]) ? $userCounts[$user->id]
                                            : 0 }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit" class="btn btn-primary">Kirim Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Data dari tim disainer </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama tim</th>
                                <th>nama disainer</th>
                                <th>jenis mesin</th>
                                <th>Status produksi</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $cs as $key => $costumer )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $costumer->BarangMasukDisainer->nama_tim }}</td>
                                <td>{{ $costumer->Users->name }}</td>
                                <td>{{ $costumer->jenis_mesin }}</td>
                                <td>{{ $costumer->status_produksi }}</td>
                                <td>
                                    <div class=" dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item"
                                                href="{{ route('getCreateToTeamMesinPegawai', $disainers->nama_tim) }}"><i
                                                    class="bx bx-send me-1"></i> Kirim ke tim mesin</a>
                                            <a class="dropdown-item"
                                                href="{{ route('getCreateToTeamCsPegawai', $disainers->nama_tim) }}"><i
                                                    class="bx bx-send me-1"></i> Kirim ke tim CS</a> --}}
                                            <a class="dropdown-item" <button type="button" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#largeModal{{ $costumer->id }}"
                                                style=" cursor: pointer"><i class="bx bx-info-circle me-1"></i>
                                                Detail data</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="largeModal{{ $costumer->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="emailLarge" class="form-label">Nama tim</label>
                                                    <input type="text" id="emailLarge" class="form-control"
                                                        value="{{ $costumer->BarangMasukDisainer->nama_tim }}" readonly>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="dobLarge" class="form-label">Nama disainer</label>
                                                    <input type="text" id="dobLarge" class="form-control"
                                                        value="{{ $costumer->Users->name }}" readonly </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="emailLarge" class="form-label">jenis mesin</label>
                                                        <input type="text" id="emailLarge" class="form-control"
                                                            value="{{ $costumer->jenis_mesin }}" readonly>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="dobLarge" class="form-label">Status produksi</label>
                                                        <input type="text" id="dobLarge" class="form-control"
                                                            value="{{ $costumer->status_produksi }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="dobLarge" class="form-label">deadaline</label>
                                                        <input type="text" id="dobLarge" class="form-control"
                                                            value="{{ $costumer->deadline }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection