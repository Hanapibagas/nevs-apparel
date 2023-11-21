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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Disainer</h4>

        <div class="card">
            <h5 class="card-header">Data masuk dari CS</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tim</th>
                                <th>Nama CS</th>
                                <th>status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $disainer as $key => $disainers )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <strong>
                                        {{ $disainers->nama_tim }}
                                    </strong>
                                </td>
                                <td>{{ $disainers->Users->name }}</td>
                                <td style="margin-top: 10px; margin-left: 20px;"
                                    class="badge bg-{{ isset($disainers->DataMesin[0]) && $disainers->DataMesin[0]->status == 1 ? 'success' : 'danger' }}">
                                    {{ isset($disainers->DataMesin[0]) && $disainers->DataMesin[0]->status == 1 ?
                                    'SELESAI' : 'PANDING' }}
                                </td>
                                <td>
                                    <div class=" dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('getCreateToTeamMesinPegawai', $disainers->nama_tim) }}"><i
                                                    class="bx bx-send me-1"></i> Kirim ke tim mesin</a>
                                            <a class="dropdown-item"
                                                href="{{ route('getCreateToTeamCsPegawai', $disainers->nama_tim) }}"><i
                                                    class="bx bx-send me-1"></i> Kirim ke tim CS</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter{{ $disainers->id }}"
                                                style="cursor: pointer"><i class="bx bx-info-circle me-1"></i>
                                                Detail data</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalCenter{{ $disainers->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Detail Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        value="{{ $disainers->nama_tim  }}" readonly />
                                                </div>
                                            </div>
                                            @foreach($disainers->DataMesin as $dataMesin)
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keterangan" class="form-label">Nama Penanggung Jawab
                                                        Mesin</label>
                                                    @php
                                                    $namaPenanggungJawabUser = $disainers->users->where('id',
                                                    $dataMesin->nama_penanggung_jawab_mesin_ACC)->first();
                                                    $namaPenanggungJawab = $namaPenanggungJawabUser ?
                                                    $namaPenanggungJawabUser->name : 'User Tidak Ditemukan';
                                                    @endphp
                                                    <input type="text" id="status" class="form-control"
                                                        value="{{ $namaPenanggungJawab }}" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <textarea id="basic-default-message" readonly class="form-control"
                                                        name="keterangan"
                                                        aria-describedby="basic-icon-default-message2">{{ $dataMesin->keterangan }}</textarea>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Close</button>
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