@extends('admin.admin_master');

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
        
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Users list</h3>
                <a href="{{ route('user.add') }}" style="float: right" class="btn btn-success btn-rounded mb-5">Add user </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $key => $user)
                          <tr>
                              <td width="5%">{{$key+1}}</td>
                              <td>{{$user->usertype}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td width="25%">
                                  <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">Edit</a>
                                  <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                         
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
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