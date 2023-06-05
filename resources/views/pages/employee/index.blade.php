@extends('template.main')

@section('title','Pegawai')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Pegawai</h2>
    {{-- <p class="section-lead">This page is just an example for you to create your own page.</p> --}}

    <div class="row">
        <div class="col-12">
          <div class="card shadow">
            <div class="card-header">
              <h4>Data Pegawai</h4>
              <div class="card-header-action">
                <a href="{{ route('employee.create') }}" class="btn btn-danger">Add More <i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th class="text-center">Nidn</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($data) > 0)

                        @foreach($data as $field)

                        <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $field->nip }}</td>
                        <td>{{ $field->name }}</td>
                        <td>{{ $field->address }}</td>
                        <td>
                            <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="#"><i class="fas fa-eye"></i> View</a>
                                <a class="dropdown-item has-icon" href="{{ route('employee.edit', $field) }}"><i class="fas fa-pen"></i> Edit</a>
                                <a class="dropdown-item has-icon" href="{{ route('employee.destroy', $field->id) }}"><i class="far fa-trash-alt"></i> Hapus</a>
                            </div>
                            </div>
                        </td>
                        </tr>

                        @endforeach

                    @else

                        <tr class="text-center">
                            <td colspan="5">No data found</td>
                        </tr>

                    @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
