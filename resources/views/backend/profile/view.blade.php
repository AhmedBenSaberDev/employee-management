@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
        
          <div class="col-12">
            <div class="box box-widget widget-user">
               
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                    <a style="float:right;" href="{{ route('profile.edit') }}" class="btn btn-rounded btn-info">Edit Profile</a>
                  <h3 class="widget-user-username">User Name : {{ $user->name }}</h3>
                  <h6 class="widget-user-desc">User Type : {{ $user->usertype }}</h6>
                  <h6 class="widget-user-desc">User Email : {{ $user->email }}</h6>
                  
                </div>
                <div style="position:relative;top:-10%;left:47.5%;" class="widget-user-image">
                  <img style="height:150px;width:150px;object-fit:cover;" class="rounded-circle" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }} " alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Mobile Number</h5>
                        <span class="description-text">{{$user->mobile}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                        <h5 class="description-header">Address</h5>
                        <span class="description-text">{{ $user->address }}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Gender</h5>
                        <span class="description-text">{{ $user->gender }}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection