@extends('layouts.app')

@section('title', 'Product | edit')

@push('css')
@endpush

@section('content')

<section class="content">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title text-uppercase">Update Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
      <form role="form" action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Product name</label>
              <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Select category</label>
              <select class="form-control" name="category_id">
                <option selected disabled>--Select category--</option>
                @foreach($categories as $category)
                  <option {{ $category->id == $product->category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Price</label>
              <input type="number" class="form-control" name="price" value="{{$product->price}}" min="0" oninput="validity.valid||(value='');">
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Discount (%)</label>
              <input type="text" class="form-control" name="discount" value="{{$product->discount}}" min="0" max="100" oninput="validity.valid||(value='');">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label>Size</label>
              <input type="text" class="form-control" name="size" value="{{$product->size}}">
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
          <div class="col-sm-12">
            <!-- textarea -->
            <div class="form-group">
              <label>Product Description</label>
              <textarea class="textarea" name="description">{{$product->description }}</textarea>
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