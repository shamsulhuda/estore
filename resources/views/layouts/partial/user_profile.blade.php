@extends('layouts.app')

@section('title', 'user information')

@push('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content')


<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="@if($user_info->avatar == 'default.png'){{asset('backend/img/user2-160x160.jpg')}}@else {{asset("uploads/users/avatar/{$user_info->avatar}")}} @endif"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user_info->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Member since:</b> <a class="float-right">{{ date_format(Auth::user()->created_at, 'M. Y') }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">{{ $user_info->phone_no }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Category:</b> <a class="float-right">@if($user_info->is_admin == NULL) General user @else Admin @endif</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#wishlist" data-toggle="tab">My wishlist</a></li>
                  <li class="nav-item"><a class="nav-link" href="#cart" data-toggle="tab">My Cart</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="wishlist">
                    <!-- Post -->
                    <div class="post">
                      
                     <table class="table wishlist-table">
                       <thead>
                        <tr>
                           <th>#</th>
                           <th>product name</th>
                           <th>product price</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($wishlist_items as $key=>$item)
                         <tr>
                           <td>{{ $key+1 }}</td>
                           <td>{{ $item->product->product_name }}</td>
                           <td>{{ number_format($item->product->price,2) }} Tk.</td>
                         </tr>
                        @endforeach
                       </tbody>
                     </table>
                    </div>
                    <!-- /.post -->

                  </div>

                  <!-- /.wishlist -->
                <div class="tab-pane" id="cart">
                    <!-- Post -->
                    <div class="post">
                      
                     <table class="table wishlist-table">
                       <thead>
                        <tr>
                           <th>#</th>
                           <th>product name</th>
                           <th>product price</th>
                           <th>product Quantity</th>
                         </tr>
                       </thead>
                       <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach(Cart::content() as $key=>$item)
                         <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->price }} Tk.</td>
                           <td>{{ $item->qty }}</td>
                         </tr>
                        @endforeach
                       </tbody>
                     </table>
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.end wishlist -->

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ date_format($user_info->created_at, 'd M. Y') }}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time" title="updated" data-toggle="tools-tip"><i class="far fa-clock"></i> {{ $user_info->updated_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Name</a></h3>

                          <div class="timeline-body">
                            <p>{{ $user_info->name }}</p>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $user_info->updated_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Email</a></h3>

                          <div class="timeline-body">
                            <p>{{ $user_info->email }}</p>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-phone bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ $user_info->updated_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Phone</a></h3>

                          <div class="timeline-body">
                            @if($user_info->phone_no == NULL)
                              <p class="text-muted"><i>please add your phone number</i></p>
                            @else
                              <p>{{ $user_info->phone_no }}</p>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div>
                        <i class="fas fa-address bg-secondary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>{{ $user_info->updated_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Street address</a></h3>

                          <div class="timeline-body">
                            @if($user_info->street_address == NULL)
                              <p class="text-muted"><i>please add your location</i></p>
                            @else
                              <p>{{ $user_info->street_address }}</p>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          {{ date_format(now(), 'd M. Y')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                     
                      <!-- END timeline item -->
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('profile.update',$user_info->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group row">
                        <div class="input-group">
                          <label for="inputName" class="col-sm-2 col-form-label">Avatar</label>
                          <div class="col-sm-10 custom-file">
                            <input type="file" class="form-control custom-file-input" name="avatar">
                            <label class="custom-file-label" for="exampleInputFile">Choose new avatar file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name<small style="color:red;">*</small></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="inputName" value="{{ $user_info->name }}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email<small style="color:red;">*</small></label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $user_info->email }}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone<small style="color:red;">*</small></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="phone_no" id="inputName2" value="{{ $user_info->phone_no }}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Street address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="street_address" id="inputName2" value="{{ $user_info->street_address }}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Shipping address<small style="color:red;">*</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="shipping_address" required>{{ $user_info->shipping_address }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@endsection

@push('scripts')
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $(".wishlist-table").DataTable();
    
  });
</script>
@endpush