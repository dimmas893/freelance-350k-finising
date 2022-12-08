@extends('layouts.template.template')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Filter Outbound</h1>
            </div>

            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel Outbound</h3>
                                <a href="{{ route('outbound') }}" class="btn btn-light">Kembali</a>
                            </div>
                            @php
                                $p = 1;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Customor</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jenis Barang</th>
                                        <th>Volume Barang</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($customor as $item)
                                            <tr>
                                                <td>{{ $p++ }}</td>
                                                <td>{{ $item->p->nama }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->jenis_barang }}</td>
                                                <td>{{ $item->volume }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>
                                                    <a href="#" id="{{ $item->id }}"
                                                        class="text-success mx-1 editIcon" data-toggle="modal"
                                                        data-target="#editTUModal"><i class="ion-edit h4"
                                                            data-pack="default" data-tags="on, off"></i></a>
                                                    <a href="#" id="{{ $item->id }}"
                                                        class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4"
                                                            data-pack="default" data-tags="on, off"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Total</h3>
                            </div>
                            <div class="card-body">
                                <h3>{{ $total }} Kg</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
