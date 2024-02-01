@extends('Layout.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Data Pengambilan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>No</th>
                        <th>Nomor Order</th>
                        <th>Kode Paket</th>
                        <th>Nama Pelanggan</th>
                        <th>Berat Per Kg</th>
                        <th>Total</th>
                        <th>Diambil</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataOrders as $dataOrder)
                    @if ($dataOrder->status === 'Ready' || $dataOrder->status === 'Completed')
                    <tr>
                        <td class="d-none">{{ $dataOrder->id }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dataOrder->no_order }}</td>
                        <td>{{ $dataOrder->kode_paket }}</td>
                        <td>{{ $dataOrder->nama_pelanggan }}</td>
                        <td>{{ $dataOrder->berat_per_kg }}</td>
                        <td>RP {{ number_format($dataOrder->berat_per_kg * $dataOrder->dataPaket->harga_per_kg, 0, ',',
                            '.') }}</td>
                        <td>
                            @if ($dataOrder->status === 'Ready')
                            <div class="badge badge-danger">BelumDiambil</div>
                            @else
                            {{ $dataOrder->Diambil }}
                            @endif
                        </td>
                        <td>
                            @if ($dataOrder->status === 'Ready')
                            <div class="badge badge-warning">Ready</div>
                            @elseif ($dataOrder->status === 'Completed')
                            <div class="badge badge-success">Completed</div>
                            @endif
                        </td>
                        <td>
                            @if ($dataOrder->status === 'Completed')
                            <!-- Tombol Detail Transaksi hanya muncul jika status Completed -->
                            <a href="#" class="btn btn-icon btn-info detail-transaksi-ambil"
                                data-id="{{ $dataOrder->id }}">
                                <i class="far fa-eye"></i> Detail Transaksi
                            </a>
                            @endif
                            @if ($dataOrder->status === 'Ready')
                            <!-- Tombol Update hanya muncul jika status Ready -->
                            <a href="#" class="btn btn-icon btn-success update-status-ambil"
                                data-id="{{ $dataOrder->id }}">
                                <i class="fas fa-check"></i> Update Status
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection