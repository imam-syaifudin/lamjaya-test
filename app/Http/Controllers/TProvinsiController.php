<?php

namespace App\Http\Controllers;

use App\Models\TProvinsi;
use Exception;
use Illuminate\Http\Request;

class TProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $provinsi = TProvinsi::paginate(10);
        return view('provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $data = $request->validate([
                'kode' => 'required|unique:t_provinsis',
                'nama_provinsi' => 'required|string'
            ]);

            TProvinsi::create([
                'kode' => $request->kode,
                'nama_provinsi' => $request->nama_provinsi,
                'active' => $request->active,
            ]);

            return redirect('/provinsi')->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $error) {
            return redirect('/provinsi')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TProvinsi $tProvinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TProvinsi $tProvinsi,$id)
    {
        //
        $tProvinsi = TProvinsi::findOrFail($id);
        return view('provinsi.edit', compact('tProvinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TProvinsi $tProvinsi,$id)
    {
        //
        $tProvinsi = TProvinsi::findOrFail($id);
        try {

            $tProvinsi->update([
                'kode' => $request->kode,
                'nama_provinsi' => $request->nama_provinsi,
                'active' => $request->active,
            ]);

            return redirect('/provinsi')->with('success', 'Data berhasil diupdate');
        } catch (Exception $error) {
            return redirect('/provinsi')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TProvinsi $tProvinsi,$id)
    {
        //
        $tProvinsi = TProvinsi::findOrFail($id);
        try {

            $tProvinsi->delete();

            return redirect('/provinsi')->with('success', 'Data berhasil dihapus');
        } catch (Exception $error) {
            return redirect('/provinsi')->with('error', 'Data gagal dihapus');
        }
    }
}
