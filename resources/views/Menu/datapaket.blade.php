@extends('Layout.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Data Paket</h4>
    </div>
    <div class="card-body">
        <!-- Tambahkan button di sini -->
        <div class="buttons">
            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                data-target="#tambahDataPaketModal"><i class="far fa-edit"></i> Tambah Data Paket</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>No</th>
                        <th>Kode Paket</th>
                        <th>Nama Paket</th>
                        <th>Harga Per Kg</th>
                        <th>Waktu Per Hari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPakets as $dataPaket)
                    <tr>
                        <td class="d-none">{{ $dataPaket->id }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataPaket->kode_paket }}</td>
                        <td>{{ $dataPaket->nama_paket }}</td>
                        <td>RP {{ number_format($dataPaket->harga_per_kg, 0, ',', '.') }}</td>
                        <td>{{ $dataPaket->waktu }}</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal"
                                data-target="#editDataPaketModal{{ $dataPaket->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-danger delete-data-paket"
                                data-id="{{ $dataPaket->id }}"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection