@extends('layouts.app')

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
                    <table id="ds" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tim</th>
                                <th>Nama Disiner</th>
                                <th>Nama CS</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $disainer as $key => $disainers )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <strong style="text-transform: uppercase">
                                        {{ $disainers->nama_tim }}
                                    </strong>
                                </td>
                                <td><strong style="text-transform: uppercase">{{ $disainers->Users->name }}</strong>
                                <td><strong style="text-transform: uppercase">{{ $disainers->UsersCs->name }}</strong>
                                </td>
                                <td>
                                    <a style="color: white" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter{{ $disainers->id }}" class="btn btn-danger">
                                        <i class="menu-icon tf-icons bx bx-undo"></i>
                                        Pengembalian data</a>
                                    <div class="modal fade" id="modalCenter{{ $disainers->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('pengembalianDataDisiner', $disainers->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <input type="hidden" name="disiner_id"
                                                                value="{{ $disainers->id }}">
                                                            <h2>Apakah anda mau melakukan <br> pengembalian ke disiner
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Ya, saya mau
                                                            mengembalikan data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    new DataTable('#ds');
</script>
@endpush
