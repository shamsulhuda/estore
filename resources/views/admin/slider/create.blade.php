@extends('layouts.app')

@section('title', 'eStore | create')

@push('css')
@endpush

@section('content')

<section class="content">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title text-uppercase">Create New slider</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form role="form" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Slider title</label>
              <input type="text" class="form-control" name="title" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Slider Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="float-right">
          <a href="{{route('slider.index')}}" class="btn btn-danger btn-sm">Back</a> 
          <button type="submit" class="btn btn-info btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection

@push('scripts')


@endpush