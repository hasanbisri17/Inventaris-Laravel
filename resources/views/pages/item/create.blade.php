@extends('template.main')

@section('title','Item')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Create an Item</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>

    <div class="card">
      <form action="{{ route('item.store') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Item Form <a href="{{ route('item.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> back</a></h4>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right">Kode Barang</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="item_code" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right">Asal Perolehan</label>
                <div class="col-sm-12 col-md-7">
                  <select name="type_id" class="form-control select2">
                    <option selected>Pilih</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Nama Barang</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="">

            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Merek</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="brand" required="">

            </div>
          </div>
          {{-- <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Tahun Pembelian</label>
            <div class="col-sm-12 col-md-7">
              <input type="date" class="form-control" name="date_of_purchase" required="">
            </div>
          </div> --}}

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Tahun Pembelian</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control datepicker" name="price_per_item" required="">

            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Bahan</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="material" required="">

            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Lokasi</label>
            <div class="col-sm-12 col-md-7">
              <select name="room_id" class="form-control select2">
                <option selected>Pilih</option>
                @foreach($rooms as $room)
                  <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Kondisi</label>
            <div class="col-sm-12 col-md-7">
              <select name="condition" class="form-control select2">
                <option selected>Pilih</option>
                <option value="1">Baik</option>
                <option value="2">Kurang Baik</option>
                <option value="3">Rusak Berat</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Jumlah Barang</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" min="0" class="form-control" name="qty" required="">

            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Harga</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" class="form-control" name="price" required="">

            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Harga Satuan</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" class="form-control" name="price_per_item" required="">

            </div>
          </div>

          <div class="form-group mb-0 row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Keterangan</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control" name="info" required=""></textarea>

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
