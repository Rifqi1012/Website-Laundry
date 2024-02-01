<?php

namespace App\Http\Controllers;

use App\Models\DataOrder;
use App\Models\DataPaket;
use App\Models\DataInventaris;
use Carbon\Carbon;

use Illuminate\Http\Request;

class dataUtamaController extends Controller
{
    public function view()
    {
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Menghitung statistik per bulan
        $dataOrdersBulan = DataOrder::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();

        $onProcessOrdersBulan = $dataOrdersBulan->whereIn('status', ['OnProcess', 'Ready']);
        $completedOrdersBulan = $dataOrdersBulan->where('status', 'Completed');

        $onProcessTotal = $onProcessOrdersBulan->sum('total');
        $completedTotal = $completedOrdersBulan->sum('total');
        $totalPenghasilanBulan = $onProcessTotal + $completedTotal;

        $onProcessCount = $onProcessOrdersBulan->count();
        $completedCount = $completedOrdersBulan->count();
        $totalOrdersCount = $onProcessCount + $completedCount;

        // Menghitung pengeluaran per bulan
        $dataInvenBulan = DataInventaris::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();
        $totalPengeluaranBulan = $dataInvenBulan->sum('total');

        // Menghitung pengeluaran per tahun
        $dataInvenTahun = DataInventaris::whereYear('created_at', $currentYear)->get();
        $totalPengeluaranTahun = $dataInvenTahun->sum('total');

        // Menghitung statistik per tahun
        $dataOrdersTahun = DataOrder::whereYear('created_at', $currentYear)->get();

        $onProcessOrdersTahun = $dataOrdersTahun->whereIn('status', ['OnProcess', 'Ready']);
        $completedOrdersTahun = $dataOrdersTahun->where('status', 'Completed');

        $onProcessTotalTahun = $onProcessOrdersTahun->sum('total');
        $completedTotalTahun = $completedOrdersTahun->sum('total');
        $totalPenghasilanTahun = $onProcessTotalTahun + $completedTotalTahun;

        $onProcessCountTahun = $onProcessOrdersTahun->count();
        $completedCountTahun = $completedOrdersTahun->count();
        $totalOrdersCountTahun = $onProcessCountTahun + $completedCountTahun;

        return view('Menu.datautama', compact('onProcessCount', 'completedCount', 'totalOrdersCount', 'onProcessTotal', 'completedTotal', 'totalPenghasilanBulan', 'totalPengeluaranBulan', 'totalPengeluaranTahun', 'onProcessCountTahun', 'completedCountTahun', 'totalOrdersCountTahun', 'onProcessTotalTahun', 'completedTotalTahun', 'totalPenghasilanTahun'));
    }



}
