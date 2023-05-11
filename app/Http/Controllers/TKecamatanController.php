<?php

namespace App\Http\Controllers;

use App\Models\TKecamatan;
use Exception;
use Illuminate\Http\Request;

class TKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kecamatan = TKecamatan::paginate(10);
        return view('kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $data = $request->validate([
                'kode' => 'required|unique:t_kecamatans',
                'nama_kecamatan' => 'required|string'
            ]);

            TKecamatan::create([
                'kode' => $request->kode,
                'nama_kecamatan' => $request->nama_kecamatan,
                'active' => $request->active,
            ]);

            return redirect('/kecamatan')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $error) {
            return redirect('/kecamatan')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TKecamatan $tKecamatan, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TKecamatan $tKecamatan, $id)
    {
        //
        $tKecamatan = TKecamatan::findOrFail($id);
        return view('kecamatan.edit', compact('tKecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TKecamatan $tKecamatan, $id)
    {
        //
        $tKecamatan = TKecamatan::findOrFail($id);
        try {

            $tKecamatan->update([
                'kode' => $request->kode,
                'nama_kecamatan' => $request->nama_kecamatan,
                'active' => $request->active,
            ]);

            return redirect('/kecamatan')->with('success', 'Data berhasil diupdate');
        } catch (Exception $error) {
            return redirect('/kecamatan')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TKecamatan $tKecamatan, $id)
    {
        //
        $tKecamatan = TKecamatan::findOrFail($id);
        try {
            $tKecamatan->delete();
            return redirect('/kecamatan')->with('success', 'Data berhasil dihapus');
        } catch (Exception $error) {
            return redirect('/kecamatan')->with('error', 'Data gagal dihapus');
        }
    }
}
