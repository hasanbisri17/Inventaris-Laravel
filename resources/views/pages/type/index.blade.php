@extends('template.main')

@section('title','Type')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Type</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card shadow">
      <div class="card-header">
        <h4>Data Table</h4>
        <div class="card-header-action">
          <a href="{{ route('type.create') }}" class="btn btn-danger">Add More <i class="fas fa-plus"></i></a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><i class="fas fa-th"></i></th>
                <th>Type</th>
                <th>Info</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @if(count($data) > 0)

                @foreach($data as $field)

                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="font-weight-600">{{ $field->name }}</td>
                  <td>{{ $field->info }}</td>
                  <td>
                    <div class="dropdown d-inline">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href="{{ route('type.edit', $field) }}"><i class="fas fa-pen"></i> Edit</a>
                            <a class="dropdown-item has-icon delete-btn" href="{{ route('type.destroy', $field->id) }}"><i class="far fa-trash-alt"></i> Hapus</a>
                        </div>
                    </div>
                </td>
                </tr>

                @endforeach

              @else

                <tr class="text-center">
                  <td colspan="4">No data found</td>
                </tr>

              @endif


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
