@extends('layouts.master')

@section('content')
	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
	@endif
	<div class="row">
		<div class="col-6"> 
			<h1><br>Data Siswa</h1>
			<br>
		</div>

		<div class="col-6">
			<br>
			<button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				Tambah Data Siswa
			</button>

		</div>

		<table class="table table-hover">
			<tr>
				<th>Nama Depan</th>
				<th>Nama Belakang</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>

			@foreach($data_siswa as $siswa)
			<tr>
				<td>{{$siswa->nama_depan}}</td>
				<td>{{$siswa->nama_belakang}}</td>
				<td>{{$siswa->jenis_kelamin}}</td>
				<td>{{$siswa->agama}}</td>
				<td>{{$siswa->alamat}}</td>
				<td>
					<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
					<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda Yakin Ingin Menghapus Data Siswa Ini?')">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/siswa/create" method="POST">
      		{{csrf_field()}}
		  <div class="form-group">
		    <label for="namaDepan">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
		  </div>

		  <div class="form-group">
		    <label for="namaBelakang">Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
		    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
		      <option value="L">Laki-laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="agama">Agama</label>
		    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
		  </div>

		  <div class="form-group">
		    <label for="alamat">Alamat</label>
		    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  @endsection

