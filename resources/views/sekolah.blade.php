@extends('main')

@section('css')
  <link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
  />
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Data Sekolah
          </h5>
          <hr />
          <p>
            <a
              href="/form-unggah"
              class="btn btn-sm btn-primary"
            >
              <i class="fa fa-plus"></i> Unggah File
            </a>
            <a
              href="/unduh-excel"
              class="btn btn-sm btn-success {{ $total == 0 ? 'disabled' : ''}}"
            >
              <i class="fa fa-file-excel-o"></i> Unduh File Excel
          </a>
          </p>
          <table class="table table-striped table-bordered table-hover" id="sekolah-table">
            <thead>
              <tr>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
  ></script>
  <script
    src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
  ></script>
  <script>
    var sekolah_table = $('#sekolah-table').DataTable({
      ajax: {
        url: '/data',
        type: 'get'
      },
      datatype: 'json',
      columns: [
        {data: 'npsn'},
        {data: 'nama_sekolah'},
        {data: 'alamat'}
      ],
      responsive: true
    });
  </script>
@endsection
