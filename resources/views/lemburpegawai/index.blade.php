@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Lembur Pegawai</div>
        <div class="panel-body">
   
     <a href="{{route('lemburpegawai.create')}}" class="btn btn-info pull-right">Tambah Data LemburPegawai</a><br><br>
       <table class="table table-striped">

       <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn">Search</button>
                </p></form>


            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>Id Kode Lembur</th>
                        <th>Id Pegawai</th>
                        <th>Jumlah Jam</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($lemburpegawai as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}}</td>
                        <td> {{$data->kategori_lembur->kode_lembur}} </td>
                        <td> {{$data->pegawai->User->name}}</td>
                        <td> {{$data->jumlah_jam}}</td>
                                 <td>
                                <form method="POST" action="{{ route('golongan.destroy', $data->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('golongan.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
        
            </div>
        </div>
    </div>
</div>
@endsection