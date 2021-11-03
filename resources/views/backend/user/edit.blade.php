@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Edit User</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form  method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="row">
                               <div class="col-12">	
                                    
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>username 
                                                @if ($errors->first('name'))
                                                    <span class="text-danger">* {{ $errors->first('name') }}</span>
                                                @endif 
                                            </h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" value="{{ $user->name }}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Select User Role 
                                                @if ($errors->first('usertype'))
                                                    <span class="text-danger">* {{ $errors->first('usertype') }}</span></h5>
                                                @endif
                                            </h5>   
                                            <div class="controls">
                                                <select name="usertype" id="select" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Role</option>
                                                    <option value="Admin" {{ ($user->usertype == "Admin" ? "selected" : "") }}  >Admin</option>
                                                    <option value="User" {{ ($user->usertype == "User" ? "selected" : "") }}>User</option>
                                                </select>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                    
                                         <div class="form-group">
                                             <h5>User Email 
                                                @if ($errors->first('email'))
                                                    <span class="text-danger">* {{ $errors->first('email') }}</span></h5>
                                                @endif 
                                                </h5>
                                             <div class="controls">
                                                 <input type="email" name="email" class="form-control" required="" value="{{ $user->email }}" >
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                                                   
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                </div>
                            </div>
                            </div>
                           </form>
       
                       </div>
                       <!-- /.col -->
                     </div>
                     <!-- /.row -->
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
       
               </section>
        </div>
    </div>
@endsection


