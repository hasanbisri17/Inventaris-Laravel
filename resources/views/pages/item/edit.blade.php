@extends('template.main')

@section('title','Item')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Edit an Item</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form action="{{ route('item.update',$data) }}" method="post">
        @csrf @method('patch')
        <div class="card-header">
          <h4>Item Form <a href="{{ route('item.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Back</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Item Name</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="" value="{{ $data->name }}">
              
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Type</label>
            <div class="col-sm-12 col-md-7">
              <select name="type_id" class="form-control">
                @foreach($types as $type)
                  <option value="{{ $type->id }}" {{ $data->type_id == $type->id ? 'checked':'' }}>{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Room</label>
            <div class="col-sm-12 col-md-7">
              <select name="room_id" class="form-control">
                @foreach($rooms as $room)
                  <option value="{{ $room->id }}" {{ $data->room_id == $room->id ? 'checked':'' }}>{{ $room->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group mb-0 row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Info</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control" name="info" required="">{{ $data->info }}</textarea>
              
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