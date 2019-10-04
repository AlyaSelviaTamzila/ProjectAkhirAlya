@extends('template')
@section('content')
    <section class="main-section">
      <div class="content">
        <h1>Data Penyewaan</h1>
        <a href="{{ route('penyewaan.create') }}" class="btn btn-sm btn-primary">Create Data</a>
        @if(Session::has('alert_message'))
          <div class="alert alert-success">
            <strong>{{Session::get('alert_message')}}</strong>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
          </div>

          @endif
          <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nama Penyewa</th>
                <th>Nama Barng</th>
                <th>Jumlah Barng</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Nama Penyewa</th>
                <th>Nama Barng</th>
                <th>Jumlah Barng</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
            @php $no = 1; @endphp
            @foreach($data as $datas)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $datas->namap }}</td>
                <td>{{ $datas->namab }}</td>
                <td>{{ $datas->jmlbarang }}</td>
                <td>{{ $datas->tglpinjam }}</td>
                <td>{{ $datas->tglpengem }}</td>
                <td>
                  <form action="{{ route('penyewaan.destroy', $datas->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('penyewaan.edit', $datas->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </section>
@endsection