<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataOrder;
use App\Models\DataPaket;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; // Import Carbon


class DataOrderController extends Controller
{
    public function view()
    {
        $dataOrders = DataOrder::all();
        $dataPakets = DataPaket::all();
        return view('Menu.dataorder', compact('dataOrders', 'dataPakets'));
    }

    public function tambah(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_paket' => 'required|exists:data_paket,kode_paket',
            'nama_pelanggan' => 'required',
            'berat_per_kg' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dapatkan data paket berdasarkan kode_paket
        $dataPaket = DataPaket::where('kode_paket', $request->input('kode_paket'))->first();

        // Hitung tanggal_ambil dengan menambahkan waktu dari data_paket
        $tanggalAmbil = Carbon::now()->addDays($dataPaket->waktu)->format('Y-m-d');

        // Hitung nilai total berdasarkan berat_per_kg dan harga_per_kg
        $total = $request->input('berat_per_kg') * $dataPaket->harga_per_kg;

        // Simpan data order ke dalam database dengan nilai total yang telah dihitung
        DataOrder::create([
            'no_order' => Carbon::now()->format('dmY') . DataOrder::count() + 1,
            'kode_paket' => $request->input('kode_paket'),
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'berat_per_kg' => $request->input('berat_per_kg'),
            'total' => $total,
            'tanggal_ambil' => $tanggalAmbil,
            'status' => 'OnProcess',
        ]);
        // Redirect kembali ke halaman data order dengan pesan sukses
        return redirect()->route('dataorder')->with('success', 'Data order berhasil ditambahkan.');
    }



    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_paket' => 'required|exists:data_paket,kode_paket',
            'nama_pelanggan' => 'required',
            'berat_per_kg' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dapatkan data order yang akan diperbarui
        $dataOrder = DataOrder::find($id);

        // Perbarui nilai kode paket, nama pelanggan, dan berat per kg
        $dataOrder->kode_paket = $request->input('kode_paket');
        $dataOrder->nama_pelanggan = $request->input('nama_pelanggan');
        $dataOrder->berat_per_kg = $request->input('berat_per_kg');

        // Dapatkan data paket lama
        $kodePaketLama = $dataOrder->kode_paket;
        $dataPaketLama = DataPaket::where('kode_paket', $kodePaketLama)->first();

        // Dapatkan data paket baru yang akan diubah oleh pengguna
        $kodePaketBaru = $request->input('kode_paket');
        $dataPaketBaru = DataPaket::where('kode_paket', $kodePaketBaru)->first();

        // Ambil tanggal awal dari created_at
        $tanggalAwal = Carbon::parse($dataOrder->created_at);

        // Hitung tanggal ambil yang baru berdasarkan paket baru
        $tanggalAmbilBaru = $tanggalAwal->addDays($dataPaketBaru->waktu);

        // Simpan perubahan data tanggal ambil ke dalam database
        $dataOrder->tanggal_ambil = $tanggalAmbilBaru;
        $dataOrder->save();

        // Redirect kembali ke halaman data order dengan pesan sukses
        return redirect()->route('dataorder')->with('success', 'Data order berhasil diperbarui.');
    }


    public function hapus($id)
    {
        $dataOrder = DataOrder::find($id);

        if (!$dataOrder) {
            return response()->json(['success' => false]);
        }

        $dataOrder->delete();

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request, $id)
    {
        $dataOrder = DataOrder::find($id);

        if (!$dataOrder) {
            return response()->json(['success' => false]);
        }

        // Validasi status hanya dapat diubah jika status sebelumnya adalah 'OnProcess'
        if ($dataOrder->status === 'OnProcess') {
            $dataOrder->status = 'Ready';
            $dataOrder->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
