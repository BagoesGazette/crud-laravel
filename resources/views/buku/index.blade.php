@extends('layout.main')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Buku</h1>
    </div>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($buku as $b)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $b->nama_kategori }}</td>
                            <td>{{ $b->judul_buku }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning tombolUpdateData" data-id="{{ $b->id }}">Update</button>
                                <a href="{{ url("buku/destroy/".$b->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" action="" autocomplete="off" method="post">@csrf
        <div class="modal-body">
          <div class="form-group">
              <label>Nama Kategori</label>
              <select name="nama_kategori" class="custom-select" id="nama_kategori">
                  <option disabled selected>Pilih Kategori</option>
                  @foreach ($kategori as $k)
                      <option value="{{ $k["id"] }}">{{ $k["nama_kategori"] }}</option>
                  @endforeach
              </select>
              @error('nama_kategori')
              <small class="text-danger">{{ $message }}</small>
              @enderror
          </div>
          <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukkan judul buku">
              @error('judul_buku')
              <small class="text-danger">{{ $message }}</small>
              @enderror
          </div>
          <div class="form-group">
              <label>Penerbit</label>
              <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Masukkan penerbit">
              @error('penerbit')
              <small class="text-danger">{{ $message }}</small>
              @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@stop
@push('page-scripts')
<script>
    $(function() {

        $(document).ready( function () {
            $('.datatable').DataTable();
        });

        $('.tombolTambahData').on('click', function() {
            $('#exampleModalLabel').html('Tambah Buku');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('.form').attr("action","buku/store");
            $('#nama_kategori').val("Pilih Kategori");
            $('#judul_buku').val("");
            $('#penerbit').val("");
        });

        $('.tombolUpdateData').on('click', function() {
            const id = $(this).data('id');
            $('#exampleModalLabel').html('Update Kategori');
            $('.modal-footer button[type=submit]').html('Update Data');
            $('.form').attr("action","buku/update/"+id);


            $.ajax({
                url: '/buku/edit/'+id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('#nama_kategori').val(data.kategori_id)
                    $('#judul_buku').val(data.judul_buku)
                    $('#penerbit').val(data.penerbit)
                },
                error: function(error){
                    console.log(error)
                }
            });

        });
  
    })
  </script>
@endpush