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
                <h3 class="box-title">Departement List</h3>
                <a href="{{ route('departement.add') }}" style="float: right" class="btn btn-success btn-rounded mb-5">Add Departement </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Sl</th>
                              <th>Name</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($departements as $key => $departement)
                          <tr>
                              <td width="5%">{{$key+1}}</td>
                              <td>{{ $departement->name }}</td>
                              <td width="25%">
                                  <a href="{{ route('departement.edit',$departement->id) }}" class="btn btn-info">Edit</a>
                                  <a href="{{ route('departement.delete',$departement->id) }}" class="btn btn-danger" id="delete">Delete</a>
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