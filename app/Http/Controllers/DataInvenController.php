<?php

namespace App\Http\Controllers;

use App\Models\DataInventaris;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataInvenController extends Controller
{
    public function view()
    {
        $dataInvens = DataInventaris::all();
        return view('Menu.datainven', compact('dataInvens'));
    }
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tanggalInput = Carbon::now()->format('Y-m-d');

        // Hitung nilai total berdasarkan harga_barang * jumlah_barang
        $total = $request->input('harga_barang') * $request->input('jumlah_barang');

        DataInventaris::create([
            'nama_barang' => $request->input('nama_barang'),
            'harga_barang' => $request->input('harga_barang'),
            'jumlah_barang' => $request->input('jumlah_barang'),
            'total' => $total, // Simpan nilai total yang telah dihitung
            'tanggal' => $tanggalInput,
        ]);

        return redirect()->route('datainven')->with('success', 'Data Inventaris berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tanggalInput = Carbon::now()->format('Y-m-d');

        // Perbarui data paket ke dalam database
        $dataInventaris = DataInventaris::find($id);

        if (!$dataInventaris) {
            return redirect()->back()->with('error', 'Data Inventaris tidak ditemukan.');
        }

        $dataInventaris->nama_barang = $request->input('nama_barang');
        $dataInventaris->harga_barang = $request->input('harga_barang');
        $dataInventaris->jumlah_barang = $request->input('jumlah_barang');
        $dataInventaris->tanggal = $tanggalInput;

        $dataInventaris->save();

        // Redirect kembali ke halaman data paket dengan pesan sukses
        return redirect()->route('datainven')->with('success', 'Data Inventaris berhasil diperbarui.');
    }


    public function hapus($id)
    {
        $dataInven = DataInventaris::find($id);

        if (!$dataInven) {
            return response()->json(['success' => false]);
        }

        $dataInven->delete();

        return response()->json(['success' => true]);
    }

}
