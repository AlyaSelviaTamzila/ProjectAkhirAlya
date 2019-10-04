@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
          <h1>Ubah Penyewa</h1>
          <hr>
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                  <li><strong>{{ $error }}</strong>
              @endforeach
            </div>
          @endif

          @foreach($data as $datas)
          <form action="{{ route('penyewaan.update', $datas->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="namap">Nama Penyewa:</label>
              <input type="text" class="form-control" id="namap" name="namap" value="{{$datas->namap}}">
            </div>
            <div class="form-group">
              <label for="namab">Nama Barang:</label>
              <input type="text" class="form-control" id="namab" name="namab" value="{{$datas->namab}}">
            </div>
            <div class="form-group">
              <label for="jmlbarang">Jumlah Barang:</label>
              <input type="text" class="form-control" id="jmlbarang" name="jmlbarang" value="{{$datas->jmlbarang}}">
            </div>
            <div class="form-group">
              <label for="tglpinjam">Tanggal Pinjam:</label>
              <input type="text" class="form-control" id="tglpinjam" name="tglpinjam" value="{{$datas->tglpinjam}}">
            </div>
            <div class="form-group">
              <label for="tglpengem">Tanggal Pengembalian:</label>
              <input type="text" class="form-control" id="tglpengem" name="tglpengem" value="{{$datas->tglpengem}}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-md btn-primary">Submit</button>
              <button type="reset" class="btn btn-md btn-danger">Cancel</button>
            </div>
          </form>
          @endforeach
        </div>
      </section>
@endsection
