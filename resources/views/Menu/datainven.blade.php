@extends('Layout.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Data Inventaris</h4>
    </div>
    <div class="card-body">
        <!-- Tambahkan button di sini -->
        <div class="buttons">
            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                data-target="#tambahDataInventarisModal"><i class="far fa-edit"></i> Tambah Data Inventaris</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataInvens as $DataInventaris)
                    <tr>
                        <td class="d-none">{{ $DataInventaris->id }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $DataInventaris->nama_barang }}</td>
                        <td>RP {{ number_format($DataInventaris->harga_barang, 0, ',', '.') }}</td>
                        <td>{{ $DataInventaris->jumlah_barang }}</td>
                        <td>RP {{ number_format($DataInventaris->harga_barang * $DataInventaris->jumlah_barang, 0, ',',
                            '.') }}</td>
                        <td>{{ $DataInventaris->tanggal }}</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal"
                                data-target="#editDataInventarisModal{{ $DataInventaris->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-danger delete-data-inven"
                                data-id="{{ $DataInventaris->id }}"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection