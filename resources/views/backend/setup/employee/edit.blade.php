@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Edit Employee</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form  method="POST" action="{{ route('employee.update', $employee->id) }}">
                            @csrf
                             <div class="row">
                               <div class="col-12">	
                                    
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5> First Name 
                                                @if ($errors->first('first_name'))
                                                    <span class="text-danger">* {{ $errors->first('first_name') }}</span>
                                                @endif 
                                            </h5>
                                            <div class="controls">
                                                <input type="text" name="first_name" class="form-control" required="" value="{{ $employee->first_name }}">
                                             </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <h5>Last Name 
                                              @if ($errors->first('last_name'))
                                                  <span class="text-danger">* {{ $errors->first('last_name') }}</span>
                                              @endif 
                                          </h5>
                                          <div class="controls">
                                              <input type="text" name="last_name" class="form-control" required="" value="{{ $employee->last_name }}">
                                           </div>
                                      </div>
                                  </div>

                                </div>

                                <div class="row">

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <h5>Email
                                              @if ($errors->first('email'))
                                                  <span class="text-danger">* {{ $errors->first('email') }}</span>
                                              @endif 
                                          </h5>
                                          <div class="controls">
                                              <input type="email" name="email" class="form-control" required="" value="{{ $employee->email }}">
                                           </div>
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Phone
                                            @if ($errors->first('phone'))
                                                <span class="text-danger">* {{ $errors->first('phone') }}</span>
                                            @endif 
                                        </h5>
                                        <div class="controls">
                                            <input type="number" name="phone" class="form-control" required="" value="{{ $employee->phone }}">
                                         </div>
                                    </div>
                                </div>

                              </div>

                              <div class="row">

                                <div class="col-md-4">
                                  <div class="form-group">
                                      <h5>Age
                                          @if ($errors->first('age'))
                                              <span class="text-danger">* {{ $errors->first('age') }}</span>
                                          @endif 
                                      </h5>
                                      <div class="controls">
                                          <input type="number" name="age" class="form-control" required="" value="{{ $employee->age }}">
                                       </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <h5>salary
                                        @if ($errors->first('salary'))
                                            <span class="text-danger">* {{ $errors->first('salary') }}</span>
                                        @endif 
                                    </h5>
                                    <div class="controls">
                                        <input type="number" name="salary" class="form-control" required="" value="{{ $employee->salary }}">
                                     </div>
                                </div>
                            </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                      <h5>Departement </h5>
                                          
                                      <div class="controls">
                                          <select name="departement_id"  required="" class="form-control">
                                              <option value="" selected="" disabled="">Select Departement</option>
                                              @foreach ($departements as $departement)
                                                  <option {{ ($employee['departement_name']['name'] == $departement->name)?'selected':'' }} value="{{ $departement->id }}">{{ $departement->name }}</option>
                                              @endforeach
                                              
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              </div>

                               <div class="text-xs-right">
                                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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