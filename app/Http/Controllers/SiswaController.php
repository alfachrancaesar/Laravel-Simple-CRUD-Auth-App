<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
    	if($request->has('cari')){
    		$data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
    	} else {
    		$data_siswa = \App\Siswa::all(); //berisi data yg ada di model Siswa
    	}
    	
    	return view('siswa.index', ['data_siswa' => $data_siswa]); //data siswa dilempar ke view siswa
    }

    public function create(Request $request)
    {
    	\App\Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Ditambahkan!'); //redirect langsung
    }

    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus!');
    }
}
