@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Add Departement</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form  method="POST" action="{{ route('departement.store') }}">
                            @csrf
                             <div class="row">
                               <div class="col-12">	
                                    
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Departement Name 
                                                @if ($errors->first('name'))
                                                    <span class="text-danger">* {{ $errors->first('name') }}</span>
                                                @endif 
                                            </h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" >
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