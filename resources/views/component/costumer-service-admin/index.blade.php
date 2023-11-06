@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Pegawai Costumer Sevice
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Daftar Pegawai Costumer Sevice</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless border-bottom">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Nama pegawai</th>
                                <th class="text-nowrap text-center">Edit</th>
                                <th class="text-nowrap text-center">Hapus</th>
                                <th class="text-nowrap text-center">Updload</th>
                            </tr>
                        </thead>
                        <form method="POST" action="{{ route('postPirmission') }}">
                            @csrf
                            <tbody>
                                @foreach ($userCs as $user)
                                <tr>
                                    <td class="text-nowrap">{{ $user->name }}</td>
                                    <td>
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1"
                                                name="permission_edit" {{ $user->permission_edit == 1 ?
                                            'checked' : '' }} />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck2"
                                                name="permission_hapus" {{ $user->permission_hapus == 1 ?
                                            'checked' : '' }} />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3"
                                                name="permission_create" {{ $user->permission_create == 1 ?
                                            'checked' : '' }} />
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <button style="margin-left: 82%; margin-bottom: 30px" type="submit"
                                class="btn btn-primary">Simpan</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection