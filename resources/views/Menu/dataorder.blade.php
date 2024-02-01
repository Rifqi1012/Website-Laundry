@extends('Layout.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Data Order</h4>
    </div>
    <div class="card-body">
        <!-- Tambahkan button di sini -->
        <div class="buttons">
            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                data-target="#tambahDataOrderModal"><i class="far fa-edit"></i> Tambah Data Order</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>No</th>
                        <th>Nomor Order</th> <!-- Kolom "Nomor Order" yang baru ditambahkan -->
                        <th>Kode Paket</th>
                        <th>Nama Pelanggan</th>
                        <th>Berat Per Kg</th>
                        <th>Total</th>
                        <th>Tanggal Ambil</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataOrders as $dataOrder)
                    <tr>
                        <td class="d-none">{{ $dataOrder->id }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataOrder->no_order }}</td> <!-- Menampilkan Nomor Order -->
                        <td>{{ $dataOrder->kode_paket }}</td>
                        <td>{{ $dataOrder->nama_pelanggan }}</td>
                        <td>{{ $dataOrder->berat_per_kg }}</td>
                        <td>RP {{ number_format($dataOrder->berat_per_kg * $dataOrder->dataPaket->harga_per_kg, 0, ',',
                            '.') }}</td>
                        <td>{{ $dataOrder->tanggal_ambil }}</td>
                        <td>
                            @if ($dataOrder->status === 'OnProcess')
                            <div class="badge badge-info">OnProcess</div>
                            @elseif ($dataOrder->status === 'Ready')
                            <div class="badge badge-warning">Ready</div>
                            @elseif ($dataOrder->status === 'Completed')
                            <div class="badge badge-success">Completed</div>
                            @endif
                        </td>
                        <td>
                            @if ($dataOrder->status === 'OnProcess')
                            <!-- Tombol Edit dan Hapus -->
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal"
                                data-target="#editDataOrderModal{{ $dataOrder->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-success update-status-order"
                                data-id="{{ $dataOrder->id }}">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-danger delete-data-order"
                                data-id="{{ $dataOrder->id }}"><i class="fas fa-times"></i></a>
                            <a href="#" class="btn btn-icon btn-primary cetak-order" data-id="{{ $dataOrder->id }}">
                                <i class="fas fa-print"></i> Cetak
                            </a>
                            @elseif ($dataOrder->status === 'Ready' || $dataOrder->status === 'Completed')
                            <!-- Tombol Detail Transaksi -->
                            <a href="#" class="btn btn-icon btn-info detail-transaksi-order"
                                data-id="{{ $dataOrder->id }}">
                                <i class="far fa-eye"></i> Detail Transaksi
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection