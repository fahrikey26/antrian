<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $antrian = Antrian::where('status', 'menunggu')->orderBy('nomor_antrian')->get();
        return view('antrian.index', compact('antrian'));
    }

    // Membuat antrian baru
    public function store(Request $request)
    {
        $nomor_antrian_terakhir = Antrian::max('nomor_antrian') ?? 0;
        Antrian::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'nomor_antrian' => $nomor_antrian_terakhir + 1,
            'status' => 'menunggu',
        ]);

        return redirect()->back()->with('success', 'Antrian berhasil ditambahkan.');
    }

    public function index2()
    {
        $antrian = Antrian::where('status', 'menunggu')->orderBy('nomor_antrian')->get();
        return view('antrian.ambiltiket', compact('antrian'));
    }

    // Membuat antrian baru
    public function store2(Request $request)
    {
        $nomor_antrian_terakhir = Antrian::max('nomor_antrian') ?? 0;
        Antrian::create([
            'nomor_antrian' => $nomor_antrian_terakhir + 1,
            'status' => 'menunggu',
        ]);

        return redirect()->back()->with('success', 'Antrian berhasil ditambahkan.');
    }

    // Mengubah status antrian menjadi 'diproses'
    public function process($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->update(['status' => 'diproses']);
        return redirect()->back();
    }

    // Menyelesaikan antrian
    public function complete($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->update(['status' => 'selesai']);
        return redirect()->back();
    }
}
