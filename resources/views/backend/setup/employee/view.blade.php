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
                <h3 class="box-title">Employee List</h3>
                <a href="{{ route('employee.add') }}" style="float: right" class="btn btn-success btn-rounded mb-5">Add Employee </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Sl</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Age</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Departement</th>
                              <th>Salary</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($employees as $key => $employee)
                          <tr>
                              <td width="5%">{{$key+1}}</td>
                              <td>{{ $employee->first_name }}</td>
                              <td>{{ $employee->last_name }}</td>
                              <td>{{ $employee->age }}</td>
                              <td>{{ $employee->phone }}</td>
                              <td>{{ $employee->email }}</td>
                              <td>{{ $employee['departement_name']['name'] }}</td>
                              <td>{{ $employee->salary . "$"}}</td>
                              <td width="25%">
                                  <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-info">Edit</a>
                                  <a href="{{ route('employee.delete',$employee->id) }}" class="btn btn-danger" id="delete">Delete</a>
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