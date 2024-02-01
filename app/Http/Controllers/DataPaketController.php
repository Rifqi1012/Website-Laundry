<?php

namespace App\Http\Controllers;

use App\Models\DataPaket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DataPaketController extends Controller
{
    public function view()
    {
        if (request()->routeIs('datapaket')) {
            $dataPakets = DataPaket::all();
            return view('Menu.datapaket', compact('dataPakets'));
        } else {
            // Halaman lain atau aksi lain sesuai dengan kebutuhan Anda
        }
    }

    public function tambah(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_paket' => 'required|unique:data_paket',
            'nama_paket' => 'required|unique:data_paket',
            'harga_per_kg' => 'required|numeric',
            'waktu' => 'required|numeric',
        ], [
            'kode_paket.unique' => 'Kode paket sudah ada .',
            'nama_paket.unique' => 'Nama paket sudah ada .',
            'harga_per_kg.numeric' => 'Harga per kg harus berupa angka.',
            'waktu.numeric' => 'Waktu per hari harus berupa angka.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, simpan data paket ke dalam database
        DataPaket::create([
            'kode_paket' => $request->input('kode_paket'),
            'nama_paket' => $request->input('nama_paket'),
            'harga_per_kg' => $request->input('harga_per_kg'),
            'waktu' => $request->input('waktu'),
        ]);

        // Redirect kembali ke halaman data paket dengan pesan sukses
        return redirect()->route('datapaket')->with('success', 'Data paket berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_paket' => 'required|unique:data_paket,kode_paket,' . $id,
            'nama_paket' => 'required|unique:data_paket,nama_paket,' . $id,
            'harga_per_kg' => 'required|numeric',
            'waktu' => 'required|numeric',
        ], [
            'kode_paket.unique' => 'Kode paket sudah ada.',
            'nama_paket.unique' => 'Nama paket sudah ada.',
            'harga_per_kg.numeric' => 'Harga per kg harus berupa angka.',
            'waktu.numeric' => 'Waktu per hari harus berupa angka.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, perbarui data paket ke dalam database
        DataPaket::where('id', $id)->update([
            'kode_paket' => $request->input('kode_paket'),
            'nama_paket' => $request->input('nama_paket'),
            'harga_per_kg' => $request->input('harga_per_kg'),
            'waktu' => $request->input('waktu'),
        ]);

        // Redirect kembali ke halaman data paket dengan pesan sukses
        return redirect()->route('datapaket')->with('success', 'Data paket berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $dataPaket = DataPaket::find($id);

        if (!$dataPaket) {
            return response()->json(['success' => false]);
        }

        $dataPaket->delete();

        return response()->json(['success' => true]);
    }




}

