@extends('Layout.main')

@section('content')

<div class="row">
    <!-- Card Statistik Order Bulan Ini -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <!-- Konten Card Statistik Order Bulan Ini -->
                <div class="card-content">
                    <h5 class="font-15">Statistik Order Bulan Ini</h5>
                    <p class="mb-0">OnProcess: {{ $onProcessCount }}</p>
                    <p class="mb-0">Completed: {{ $completedCount }}</p>
                    <p class="mb-0">Total Orders: {{ $totalOrdersCount }}</p>
                </div>
                <img src="assets/img/statistik.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>

    <!-- Card Penghasilan Bulan Ini -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <!-- Konten Card Penghasilan Bulan Ini -->
                <div class="card-content">
                    <h5 class="font-15">Penghasilan Bulan Ini</h5>
                    <p class="mb-0">OnProcess: RP {{ number_format($onProcessTotal, 0, ',', '.') }}</p>
                    <p class="mb-0">Completed: RP {{ number_format($completedTotal, 0, ',', '.') }}</p>
                    <p class="mb-0">Total Penghasilan: RP {{ number_format($totalPenghasilanBulan, 0, ',', '.') }}</p>
                </div>
                <img src="assets/img/penghasilan.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>

    <!-- Card Pengeluaran Bulan Ini -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <!-- Konten Card Pengeluaran Bulan Ini -->
                <div class="card-content">
                    <h5 class="font-15">Pengeluaran Bulan Ini</h5>
                    <p class="mb-0">Total Pengeluaran: RP {{ number_format($totalPengeluaranBulan, 0, ',', '.') }}</p>
                </div>
                <img src="assets/img/pengeluaran.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Card Statistik Order Pertahun -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <div class="card-content">
                    <h5 class="font-15">Statistik Order Pertahun</h5>
                    <p class="mb-0">OnProcess: {{ $onProcessCountTahun }}</p>
                    <p class="mb-0">Completed: {{ $completedCountTahun }}</p>
                    <p class="mb-0">Total Orders: {{ $totalOrdersCountTahun }}</p>
                </div>
                <img src="assets/img/statistik.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>

    <!-- Card Penghasilan Pertahun -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <div class="card-content">
                    <h5 class="font-15">Penghasilan Pertahun</h5>
                    <p class="mb-0">OnProcess: RP {{ number_format($onProcessTotalTahun, 0, ',', '.') }}</p>
                    <p class="mb-0">Completed: RP {{ number_format($completedTotalTahun, 0, ',', '.') }}</p>
                    <p class="mb-0">Total Penghasilan: RP {{ number_format($totalPenghasilanTahun, 0, ',', '.') }}</p>
                </div>
                <img src="assets/img/penghasilan.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>

    <!-- Card Pengeluaran Pertahun -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-statistic-4"
                style="display: flex; align-items: center; justify-content: space-between; min-height: 180px;">
                <div class="card-content">
                    <h5 class="font-15">Pengeluaran Pertahun</h5>
                    <p class="mb-0">Total Pengeluaran: RP {{ number_format($totalPengeluaranTahun, 0, ',', '.') }}</p>
                </div>
                <img src="assets/img/pengeluaran.png" alt="" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>
</div>
@endsection