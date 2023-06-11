@extends('template.main')

@section('title','Item')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Items</h2>

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Master Data Barang</h4>
                <div class="card-header-action">
                    {{-- <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cetak Label"><i class="fas fa-file-excel"></i> Cetak</a>
                    <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Eksport Data"><i class="fas fa-file-excel"></i> Eksport</a> --}}
                    <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Import Data"><i class="fas fa-file-upload"></i> Import</a>
                    <a href="{{ route('item.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Data">Tambah <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                          <th><i class="fas fa-th"></i></th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Tahun Pembelian</th>
                          <th>Kondisi</th>
                          {{-- <th>Info</th> --}}
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(count($data) > 0)

                          @foreach($data as $field)

                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $field->item_code }}</td>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->qty }}</td>
                            <td>{{ $field->date_of_purchase }}</td>
                            @if($field->condition === 1)
                            <td>
                              <span class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Baik">Baik</span>
                            </td>
                            @elseif($field->condition === 2)
                            <td>
                              <span class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Kurang Baik">Kurang Baik</span>
                            </td>
                            @else
                              <td>
                                  <span class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Rusak Berat">Rusak Berat</span>
                              </td>
                            @endif
                            {{-- <td>{{ Str::limit($field->info, $limit = 20, $end = '...') }}</td> --}}
                            <td>
                              <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                              </button>
                              <div class="dropdown-menu">
                                  {{-- <a class="dropdown-item has-icon" href="#"><i class="fas fa-eye"></i> View</a> --}}
                                  <a class="dropdown-item has-icon" href="{{ route('item.edit', $field) }}"><i class="fas fa-pen"></i> Edit</a>
                                  <a class="dropdown-item has-icon" href="{{ route('item.show',$field) }}"><i class="fas fa-plus"></i> Suplay</a>
                                  <a class="dropdown-item has-icon delete-btn" href="{{ route('item.destroy', $field->id) }}"><i class="far fa-trash-alt"></i> Hapus</a>
                              </div>
                              </div>
                          </td>
                            {{-- <td nowrap="">
                              <a href="{{ route('item.edit', $field) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                              <a href="{{ route('item.show',$field) }}" class="btn btn-icon btn-info"><i class="fas fa-plus"></i></a>
                              <a href="{{ route('item.destroy', $field->id) }}" class="btn btn-icon btn-danger delete-btn"><i class="far fa-trash-alt"></i></a>
                            </td> --}}
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
    </div>
  </div>
@endsection
