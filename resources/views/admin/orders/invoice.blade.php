@extends('layouts.app')

@section('title', 'eStore | Orders')

@push('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <span>
                  <button class="btn btn-info generate_invoice"><i class="fas fa-print"></i> Print</button>
                </span>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
      <div class="container-fluid">
        <div class="text-center">
          <h1>Invoice</h1>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              If you get this invoice then, we will assume your order is completed! Please, collect this invoice for further action.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> e-Store
                    <small class="float-right">Date: {{ date('d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>E-Store</strong><br>
                    <strong>{{ Auth::user()->name }} (Admin)</strong><br>
                    {{ $setting->address }}<br>
                    Phone: (+88) {{ $setting->phone }}<br>
                    Email: {{ $setting->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $order_info->name }}</strong><br>
                    {{ $order_info->shipping_address }}<br>
                    Phone: {{ $order_info->phone_no }}<br>
                    Email: {{ $order_info->email }}<br>
                    Payment method: <strong>{{ $order_info->payment->name }}</strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<span class="text-uppercase">{{ uniqid(3) }}</span></b><br>
                  <br>
                  <b>Order ID:</b> 00{{ $order_info->id }}<br>

                  @if($order_info->payment_id == 1)

                  <b>Payment Due:</b> <strong class="text-danger">
                    @if($order_info->is_completed !== 1)
                    YES
                    @else
                    PAID
                    @endif
                  </strong><br>
                  
                  @else
                  <b>Transaction ID: {{ $order_info->transaction_id }}</b><br>
                  @endif
                  <b>Delivery status:</b> 
                  @if($order_info->is_completed !== 1)
                  <span class="text-danger">On process...</span>
                  @else
                  <span class="text-success"><strong>Completed</strong></span>
                  @endif 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price (with discount)</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                        $sum = 0;
                      @endphp
                    @foreach($orders as $order)
                    @php
                      $qty = $order->quantity;
                      $single_price = $order->product->price;
                      $discount = $order->product->discount;

                      $total_price = $single_price - ($single_price * ($discount/100));
                      $subtotal = ($total_price * $qty);
                    @endphp
                    <tr>
                      <td>{{ $order->product->product_name }}</td>
                      <td>{{ number_format($total_price,2) }} Tk.</td>
                      <td>x {{ $qty }}</td>
                      <td>{{ number_format($subtotal,2) }} Tk.</td>
                    </tr>
                    @php
                    $sum = $sum + $subtotal;
                    @endphp
                    @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Available Payment Methods:</p>
                  <img src="{{asset('frontend/images/logo/cashon.png')}}" title="Cash on Delivery" alt="cash on" style="width: 100px; height: 50px;">
                  <img src="{{asset('frontend/images/logo/bKash.png')}}" title="bKash" alt="bKash payment" style="width: 100px; height: 50px;">
                  <img src="{{asset('frontend/images/logo/rocket.png')}}" title="Rocket payment" alt="Rocket" style="width: 100px; height: 50px;">

                  <p class="mt-2">
                    <button class="btn btn-info btn-sm"><i class="fas fa-info"></i></button> If you order for cash on delivery, please make sure your cash is ready for the delivery time!
                  </p>
                  

                  <p class="lead text-uppercase">Order date: {{ \Carbon\Carbon::parse($order_info->created_at)->timezone('Asia/Dhaka')->format('d M. Y \a\t h:i A')}}</p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ number_format($sum,2) }} Tk.</td>
                      </tr>
                      <tr>
                        <th>Shipping cost:</th>
                        <td>{{ number_format($setting->shipping_cost,2) }} Tk.</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><strong>{{ number_format($sum + $setting->shipping_cost,2) }}</strong> Tk. </td>
                      </tr>
                      <tr>
                        <th>Your payable total amount is:</th>
                        <td><strong>{{ number_format($sum + $setting->shipping_cost,2) }}</strong> Tk. </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
              <div class="row mt-4">
                <div class="col-md-6">
                  <b>--------------------</b><br>
                  <strong>Worker signature</strong>
                </div>
                <div class="col-md-6">
                  <b class="float-right">------------------------</b><br>
                  <strong class="float-right">Customer signature</strong>
                </div>
                
              </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print mt-3">
                <div class="col-12">
                  
                  <a href="{{ route('order.index') }}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Back to list
                  </a>
                  <button type="button" class="btn btn-primary float-right generate_invoice" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection

@push('scripts')

<script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#cat-table").DataTable();
  });
</script>

<script type="text/javascript">
  $('.generate_invoice').on('click', function(){
    window.addEventListener("load", window.print());
  });
  
</script>

@endpush