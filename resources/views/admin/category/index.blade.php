@extends('layouts.app')

@section('title', 'eStore | category')

@push('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content')
<div class="container">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header text-uppercase">
              <a href="{{route('category.create')}}" class="btn btn-info btn-sm">Add new category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categories as $key=>$category)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{ \Carbon\Carbon::parse($category->created_at)->timezone('Asia/Dhaka')->format('d/m/Y \a\t h:i A')}}</td>
                  <td>
                    <span><a href="{{route('category.edit',$category->id)}}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a></span> | 
                    <span>
                      <form id="delete-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display: none;" method="POST">
                          @csrf
                          @method('DELETE')
                        </form>

                        <a href="#" onclick="if (confirm('Are you sure want to delete this item?')) {
                          event.preventDefault();
                          document.getElementById('delete-{{$category->id}}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-trash"></i></a>
                    </span>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection

@push('scripts')

<script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

@endpush