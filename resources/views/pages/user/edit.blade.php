@extends('template.main')

@section('title','Employee')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Edit an Employee</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>

    <div class="card">
      <form class="needs-validation" novalidate="" action="{{ route('user.update',$data) }}" method="post">
        @csrf @method('patch')
        <div class="card-header">
          <h4>Employee Form <a href="{{ route('user.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Back</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Nama</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="" value="{{ $data->name }}">
              <div class="invalid-feedback">
                  Silahkan isi Nama
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Email</label>
            <div class="col-sm-12 col-md-7">
              <input type="email" class="form-control" name="email" required="" value="{{ $data->email }}">
              <div class="invalid-feedback">
                  Silahkan isi Email
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Level</label>
            <div class="col-sm-12 col-md-7">
              <select name="level_id" class="form-control">
                @foreach($levels as $level)
                  <option value="{{ $level->id }}" {{ $level->level_id == $level->id ? 'checked':'' }}>{{ $level->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Password</label>
            <div class="col-sm-12 col-md-7">
              <input type="password" class="form-control" name="password" required="">
              <div class="invalid-feedback">
                  Silahkan isi Nama
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
