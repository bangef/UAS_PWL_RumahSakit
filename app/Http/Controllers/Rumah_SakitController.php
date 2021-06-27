<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rumah_Sakit;
use Symfony\Contracts\Service\Attribute\Required;

class Rumah_SakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_rs = DB::table('rumah_sakit')
            ->join('pasien', 'pasien.id', '=', 'rumah_sakit.idpasien')
            ->join('dokter', 'dokter.id', '=', 'rumah_sakit.iddokter')
            ->join('ruangan', 'ruangan.id', '=', 'rumah_sakit.idruangan')
            ->select('rumah_sakit.*', 'pasien.nama AS ps', 'dokter.nama AS dok', 'ruangan.nama AS rua')
            ->get();

        return view('rumah_sakit.index', compact('ar_rs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke halaman form
        return view('rumah_sakit.form');
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
                'nama_rs' => 'required',
                'idpasien' => 'required|numeric',
                'iddokter' => 'required|numeric',
                'idruangan' => 'required|numeric',
                'alamat' => 'required',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:1024',
            ],

            [
                //Pesan Error
                'nama_rs.required' => 'Nama Wajib di Isi',
                'idpasien.required' => 'Nama Pasien Wajib di Isi',
                'iddokter.required' => 'Nama Dokter Wajib di Isi',
                'idruangan.required' => 'Ruangan Wajib di Isi',
                'alamat.required' => 'Alamat Wajib di Isi',
                'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 1024 KB',
            ]
        );

        if (!empty($request->foto)) {
            $fileName = $request->nama_rs . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('rumah_sakit')->insert(
            [
                'nama_rs' => $request->nama_rs,
                'idpasien' => $request->idpasien,
                'iddokter' => $request->iddokter,
                'idruangan' => $request->idruangan,
                'alamat' => $request->alamat,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/rumah_sakit');
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
        $ar_rs = DB::table('rumah_sakit')
        ->join('pasien', 'pasien.id', '=', 'rumah_sakit.idpasien')
        ->join('dokter', 'dokter.id', '=', 'rumah_sakit.iddokter')
        ->join('ruangan', 'ruangan.id', '=', 'rumah_sakit.idruangan')
        ->select('rumah_sakit.*','pasien.nama AS ps','dokter.nama AS dok','ruangan.nama AS rua')
        ->where('rumah_sakit.id', $id)->get();

        return view('rumah_sakit.show', compact('ar_rs'));
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
        $data = DB::table('rumah_sakit')->where('id', $id)->get();

        return view('rumah_sakit.form_edit', compact('data'));
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
        DB::table('rumah_sakit')->where('id',$id)->update(
            [
                'nama_rs' => $request->nama_rs,
                'idpasien' => $request->idpasien,
                'iddokter' => $request->iddokter,
                'idruangan' => $request->idruangan,
                'alamat' => $request->alamat,
                'foto' => $request->foto,
            ]
        );

        //2. landing page
        return redirect('/rumah_sakit'.'/'.$id);
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
        DB::table('rumah_sakit')->where('id', $id)->delete();

        //2. landing page
        return redirect('/rumah_sakit');
    }
}