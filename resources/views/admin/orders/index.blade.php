@extends('layouts.app')

@section('title', 'eStore | Orders')

@push('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content')
<div class="container">
      <div class="row">
        <div class="col-12">

          {{-- {{ App\Order::where('user_id', 3)->get() }} --}}

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="order-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer Name</th>
                  <th>Order time</th>
                  <th>order activity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key=>$order)
                <tr>
                  <td>00{{ $order->id }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->created_at)->timezone('Asia/Dhaka')->format('d/m/Y \a\t h:i a')}}</td>
                  <td>
                    @if($order->is_seen_by_admin !== 1)
                    <a href="{{ route('order.details', $order->id) }}" class="text-info">
                      <button class="btn btn-info btn-sm"><i class="fas fa-eye" title="view order details"></i></button></a>
                    @else
                    <a href="{{ route('order.details', $order->id) }}" class="text-success"><button class="btn btn-success btn-sm"><i class="fas fa-eye" title="Seen by admin"></i></button></a>
                    @endif 
                    <a href="{{ route('order.invoice', $order->id) }}"><button class="btn btn-info btn-sm"><i class="fas fa-print" title="invoice"></i></button></a>
                  </td>
                  <td>
                    @if($order->is_completed !== 1)
                    <a href="{{ route('order.status', $order->id) }}" class="text-info"><i class="fas fa-times-circle"></i> <span class="badge badge-info">pending</span></a>
                    @else
                    <a href="{{ route('order.status', $order->id) }}" class="text-success"><i class="fas fa-check-circle"></i> <span class="badge badge-success">shipped</span></a>
                    @endif
                  </td>
                  <td>
                    <span>
                      <form id="" action="" style="display: none;" method="POST">
                          @csrf
                          @method('DELETE')
                        </form>

                        <a href="#" onclick="if (confirm('Are you sure, to delete this item?')) {
                          event.preventDefault();
                          document.getElementById('').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-trash text-danger"></i></a>
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
    $("#order-table").DataTable();
   
  });
</script>

@endpush