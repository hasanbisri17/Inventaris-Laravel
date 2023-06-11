@extends('template.main')

@section('title','Employee')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Create an Employee</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>

    <div class="card">
      <form class="needs-validation" novalidate="" action="{{ route('employee.store') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Employee Form <a href="{{ route('employee.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Nidn</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" class="form-control number" name="nip" required="">
              <div class="invalid-feedback">
                  Silahkan isi Nidn
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Nama</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="">
              <div class="invalid-feedback">
                  Silahkan isi nama Pegawai
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Jabatan</label>
            <div class="col-sm-12 col-md-7">
              <select name="jabatan_id" class="form-control">
                @foreach($jabatans as $jabatan)
                  <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group mb-0 row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Alamat</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control" name="address" required=""></textarea>
              <div class="invalid-feedback">
                Silahkan isi Alamat
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection
