<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use Symfony\Contracts\Service\Attribute\Required;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pasien = DB::table('pasien')->get();

        return view('pasien.index', compact('ar_pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('pasien.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validated = $request->validate(
            [
                'nama' => 'required',
                'umur' => 'required|numeric',
                'penyakit' => 'required',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:1024',
            ],

            [
                'nama.required' => 'Nama Wajib di Isi',
                'umur.required' => 'Umur Wajib di Isi',
                'umur.numeric' => 'Umur Harus Berupa Angka',
                'penyakit.required' => 'Keluhan Penyakit Wajib di Isi',
                'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 1024 KB',
            ]
        );

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->nama . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('pasien')->insert(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'penyakit' => $request->penyakit,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail
        $ar_pasien = DB::table('pasien')->where('pasien.id', $id)->get();

        return view('pasien.show', compact('ar_pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('pasien')->where('id', $id)->get();

        return view('pasien.form_edit', compact('data'));
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
        //mengedit data
        // 1. proses ubah data
        DB::table('pasien')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'penyakit' => $request->penyakit,
                'foto' => $request->foto,
            ]
        );

        //2. landing page
        return redirect('/pasien'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        //1. hapus data
        DB::table('pasien')->where('id', $id)->delete();

        //2. landing page
        return redirect('/pasien');
    }
}