@extends('layouts.app')

@section('title', 'eStore | create')

@push('css')
@endpush

@section('content')

<section class="content">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title text-uppercase">Create New Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form role="form" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Product name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Select category</label>
              <select class="form-control" name="category_id">
                <option selected disabled>--Select category--</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Price</label>
              <input type="number" class="form-control" name="price" min="0" oninput="validity.valid||(value='');" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Discount (%)</label>
              <input type="number" class="form-control" name="discount" min="0" max="100" oninput="validity.valid||(value='');" placeholder="Enter ...">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Size</label>
              <input type="text" class="form-control" name="size" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Image</label>
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
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <!-- textarea -->
            <div class="form-group">
              <label>Product Description</label>
              <textarea class="textarea" name="description" placeholder="Place some text here"></textarea>
            </div>
          </div>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-info btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection

@push('scripts')

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

@endpush