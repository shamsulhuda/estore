@extends('layouts.app')

@section('title', 'eStore | create')

@push('css')
@endpush

@section('content')

<section class="content">
  <div class="card card-primary">
              <div class="card-header text-uppercase">
                <h3 class="card-title">Update category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                  </div>

                  <div class="float-right">
                    <button type="submit" class="btn btn-info btn-sm">Update</button>
                  </div>
                </div>
                <!-- /.card-body -->

              </form>
            </div>
</section>

@endsection

@push('scripts')



@endpush