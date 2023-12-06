@extends('layouts.app')

@section('title', 'Admin Inventory - Barang')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('barang.create') }}" class="btn btn-md btn-success">TAMBAH BARANG</a>
                </div>

                @if(count($Barang) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MERK</th>
                                <th>SERI</th>
                                <th>SPESIFIKASI</th>
                                <th>STOK</th>
                                <th>KATEGORI</th>
                                <th style="width: 15%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Barang as $barang)
                                <tr>
                                    <td>{{ $barang->id }}</td>
                                    <td>{{ $barang->merk }}</td>
                                    <td>{{ $barang->seri }}</td>
                                    <td>{{ $barang->spesifikasi }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>{{ $barang->kategori->kategori }}</td>
                                    
                                    <td class="text-center"> 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="alert">
                                            Data barang belum tersedia
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $barang->links() }} --}}
                @else
                    <div class="alert">
                        Data <strong>Barang</strong> kosong.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
