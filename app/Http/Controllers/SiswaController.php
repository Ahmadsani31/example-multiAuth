<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Siswa $siswa)
    {
        $siswa = Siswa::all();
        return view('admin.home',['siswas' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $siswa = $request->validate([
            'nisn'      => 'required|unique:siswas|min:10|max:10',
            'nama'      => 'required|min:3',
            'tempat'    => 'required',
            'tgl'       => 'required',
            'kelas'     => 'required',
            'lokal'     => 'required',
            'jurusan'   => 'required',
            'phone'     => 'required|numeric',
            'alamat'    => 'required',

        ]);

        $rules = [
            'nisn'      => 'required|unique:siswas|min:10|max:10',
            'nama'      => 'required|min:3',
            'phone'     => 'required|numeric|min:10',

        ];

        $messages = [
            'nama.min'             => 'Nama lengkap minimal 3 karakter',
            'phone.min'            => 'No Telepon Minimal 10 Angka',
            'phone.numeric'        => 'Gunakan Angka Untuk No Telphone',
            'nisn.unique'          => 'NISN sudah terdaftar',
        ];

        $validator = Validator::make($siswa, $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($siswa);
        }

        $id_user = Auth::user()->id;

        $siswa['admin_id']  =  $id_user;
        $siswa['nisn']      = request('nisn');
        $siswa['nama']      = Str::title(request('nama'));
        $siswa['tempat']    = Str::ucfirst(request('tempat'));
        $siswa['tgl']       = request('tgl');
        $siswa['kelas']     = Str::upper(request('kelas'));
        $siswa['lokal']     = Str::upper(request('lokal'));
        $siswa['jurusan']   = Str::upper(request('jurusan'));
        $siswa['phone']     = request('phone');
        $siswa['alamat']    = Str::ucfirst(request('alamat'));

        Siswa::create($siswa);
        return redirect()->route('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //   echo $id;

       $siswa = Siswa::find($id);
       return view('admin.modal', ['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Siswa $id)
    {

        Siswa::where('id',$id)->update([
                                        'nama'       => $request->nama,
                                        'tempat'     => $request->tempat,
                                        'tgl'        => $request->tgl,
                                        'kelas'      => $request->kelas,
                                        'lokal'      => $request->namalokal,
                                        'jurusan'    => $request->jurusan,
                                        'phone'      => $request->phone,
                                        'alamat'     => $request->alamat
               ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        // $siswa = Siswa::find($id);
        $siswa->delete();

     return redirect()->back()->with('toast_info','Product success delete.');
    }
}
