
@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Send A Task</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form  method="POST" action="{{ route('task.store') }}">
                            @csrf
                             <div class="row">
                               <div class="col-md-12">	
                                    
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Task Content</label>
                                            <textarea name="content" rows="5" cols="5" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                          <h5>Send To </h5>
                                              
                                          <div class="controls">
                                              <select id="user_id" name="user_id"  required="" class="form-control">
                                                  <option value="" selected="" disabled="">Select User</option>
                                                  <option value="all" >To All Users</option>
                                                  @foreach ($users as $user)
                                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                  @endforeach
                                                  
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                               
                              </div>
                               <div class="text-xs-right">
                                  <input id="submit-task" type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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