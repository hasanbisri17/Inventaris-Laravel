@extends('template.main')

@section('title','Jabatan')

@section('content')
<div class="section-body">
    <h2 class="section-title">Jabatan</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Master Data Jabatan</h4>
                    <div class="card-header-action">
                        <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Add More <i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-th"></i></th>
                                    <th>Nama Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) > 0)

                                    @foreach($data as $field)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $field->name }}</td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('jabatan.edit', $field) }}"><i
                                                                class="fas fa-pen"></i> Edit</a>
                                                        <a class="dropdown-item has-icon delete-btn"
                                                            href="{{ route('jabatan.destroy', $field->id) }}"><i
                                                                class="far fa-trash-alt"></i> Hapus</a>
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
    </div>
</div>
    @endsection
