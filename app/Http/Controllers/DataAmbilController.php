<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataOrder;
use App\Models\DataPaket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DataAmbilController extends Controller
{
    public function view()
    {
        // Ambil data order dengan status 'Ready' dan 'Completed'
        $dataOrders = DataOrder::whereIn('status', ['Ready', 'Completed'])->get();
        $dataPakets = DataPaket::all();

        return view('Menu.datapengambilan', compact('dataOrders', 'dataPakets'));
    }
    public function updateStatus(Request $request, $id)
    {
        $dataOrder = DataOrder::find($id);

        if (!$dataOrder) {
            return response()->json(['success' => false]);
        }

        // Validasi status hanya dapat diubah jika status sebelumnya adalah 'OnProcess'
        if ($dataOrder->status === 'Ready') {
            $dataOrder->status = 'Completed';

            // Menggunakan Carbon untuk mengisi nilai Diambil dengan waktu saat ini
            $dataOrder->Diambil = Carbon::now();

            $dataOrder->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
