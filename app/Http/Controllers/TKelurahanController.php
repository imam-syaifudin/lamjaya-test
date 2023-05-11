<?php

namespace App\Http\Controllers;

use App\Models\TKecamatan;
use App\Models\TKelurahan;
use Exception;
use Illuminate\Http\Request;

class TKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelurahan = TKelurahan::paginate(10);
        return view('kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kecamatan = TKecamatan::all();
        return view('kelurahan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $data = $request->validate([
                'kode' => 'required|unique:t_kelurahans',
                'nama_kelurahan' => 'required|string',
            ]);

            TKelurahan::create([
                'kode' => $request->kode,
                'nama_kelurahan' => $request->nama_kelurahan,
                't_kecamatan_id' => $request->nama_kecamatan,
                'active' => $request->active,
            ]);

            return redirect('/kelurahan')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $error) {
            return redirect('/kelurahan')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TKelurahan $tKelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TKelurahan $tKelurahan, $id)
    {
        //
        $tKelurahan = tKelurahan::findOrFail($id);
        $kecamatan = TKecamatan::all();
        return view('kelurahan.edit', compact('tKelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TKelurahan $tKelurahan, $id)
    {
        //
        $tKelurahan = tKelurahan::findOrFail($id);
        try {

            $data = $request->validate([
                'nama_kelurahan' => 'required|string',
                'nama_kecamatan' => 'required|string',
            ]);

            $tKelurahan->update([
                'kode' => $request->kode,
                'nama_kelurahan' => $request->nama_kelurahan,
                'nama_kecamatan' => $request->nama_kecamatan,
                'active' => $request->active,
            ]);

            return redirect('/kelurahan')->with('success', 'Data berhasil diupdate');
        } catch (Exception $error) {
            
            return redirect('/kelurahan')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TKelurahan $tKelurahan, $id)
    {
        //
        $tKelurahan = tKelurahan::findOrFail($id);
        try {

            $tKelurahan->delete();
            return redirect('/kelurahan')->with('success', 'Data berhasil dihapus');
        } catch (Exception $error) {
            return redirect('/kelurahan')->with('error', 'Data gagal dihapus');
        }
    }
}
