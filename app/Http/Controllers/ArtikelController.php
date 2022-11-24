<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data artikel
        $data = Artikel::all();
        return view('/artikel/artikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menuju form buat artikel
        $kategori = Kategori::all();
        $user = User::all();
        $data = Artikel::all();
        return view('/artikel/create', compact('data', 'kategori', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambah artikeel baru
        // dd($request);
        $validator = $request->validate([
            'judul' => 'required|string',
            'foto' => 'required|image',
            'isi' => 'required|string',
            'tgl_artikel' => 'required|string',
            'kategori_id' => 'string',
            'user_id' => 'string',
          ]);
          $validator['foto'] = $request->file('foto')->store('artikel/foto');
          Artikel::create($validator);
          return redirect('/artikel');
        //   ->with('success', 'success add four');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menuju form edit
        $kategori = Kategori::all();
        $user = User::all();
        $data = Artikel::findOrFail($id);
        return view('/artikel/edit', compact('data', 'kategori', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //edit / update data artikel
        $data = Artikel::findOrFail($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('artikel/foto');
            if ($request->foto){
                Storage::delete($data->foto);
            }
            $data->update([
                'judul' => $request->judul,
                'foto' => $file,
                'isi' => $request->isi,
                'tgl_artikel' => $request->tgl_artikel,
                'kategori_id' => $request->kategori_id,
                'user_id' => $request->user_id,
            ]);
        } else {
            $data->update([
                'judul' => $request->judul,
                'foto' => $data->foto,
                'isi' => $request->isi,
                'tgl_artikel' => $request->tgl_artikel,
                'kategori_id' => $request->kategori_id,
                'user_id' => $request->user_id,
            ]);
        }
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data artikel
        $data = Artikel::findOrFail($id);
        if($data->foto){
            Storage::delete($data->foto);
        }
        $data->delete();
        return redirect('/artikel');
        // ->with('error', 'success add artikel');
    }

    public function depan()
    {
        //
        $data = Artikel::all();
        return view('home', compact('data'));
    }
}
