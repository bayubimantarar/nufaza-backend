@extends('main')

@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Unggah Data
          </h5>
          <hr />
          <form action="/unggah" method="post" enctype="multipart/form-data">
            <input
              type="hidden"
              name="_token"
              value="{{ csrf_token() }}"
            />
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                  <label
                    for=""
                    class="control-label"
                  >
                    File <small class="text-danger">*</small>
                  </label>
                  <br />
                  <input
                    type="file"
                    name="file_sekolah"
                  />
                  @if($errors->has('file_sekolah'))
                    <div class="text-danger">
                      {{ $errors->first('file_sekolah') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <button
              type="submit"
              class="btn btn-sm btn-primary"
            >
              <i class="fa fa-upload"></i> Unggah
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
