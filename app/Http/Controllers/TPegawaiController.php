<?php

namespace App\Http\Controllers;

use App\Models\TKecamatan;
use App\Models\TKelurahan;
use App\Models\TPegawai;
use App\Models\TProvinsi;
use Exception;
use Illuminate\Http\Request;

class TPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pegawai = TPegawai::paginate(10);
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahan = TKelurahan::all();
        $kecamatan = TKecamatan::all();
        $provinsi = TProvinsi::all();

        return view('pegawai.create', compact('kelurahan', 'kecamatan', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

    
            TPegawai::create([
                'nama_pegawai' => $request->nama_pegawai,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'active' => $request->active,
            ]);

            return redirect('/pegawai')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $error) {
            return redirect('/pegawai')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TPegawai $tPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TPegawai $tPegawai,$id)
    {
        //
        $tPegawai = TPegawai::findOrFail($id);

        $kelurahan = TKelurahan::all();
        $kecamatan = TKecamatan::all();
        $provinsi = TProvinsi::all();

        return view('pegawai.edit', compact('kelurahan', 'kecamatan', 'provinsi','tPegawai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TPegawai $tPegawai,$id)
    {
        //
        $tPegawai = TPegawai::findOrFail($id);

        try {

    
            $tPegawai->update([
                'nama_pegawai' => $request->nama_pegawai,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'active' => $request->active,
            ]);

            return redirect('/pegawai')->with('success', 'Data berhasil diupdate');
        } catch (Exception $error) {
            return redirect('/pegawai')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TPegawai $tPegawai,$id)
    {
        //
        $tPegawai = TPegawai::findOrFail($id);
        try {
            $tPegawai->delete();

            return redirect('/pegawai')->with('success', 'Data berhasil dihapus');
        } catch (Exception $error) {
            return redirect('/pegawai')->with('error', 'Data gagal dihapus');
        }
    }
}
