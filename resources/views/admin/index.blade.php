@extends('admin.admin_master')
@section('admin')
    

  <div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row d-flex justify-content-around my-5">

                <div class=" col-xl-3 col-5 ">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-primary-light rounded w-60 h-60">
                              <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">New Customers</p>
                              <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-xl-3 col-5 ">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-warning-light rounded w-60 h-60">
                              <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Sold Cars</p>
                              <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-xl-3 col-5 ">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-info-light rounded w-60 h-60">
                              <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Sales Lost</p>
                              <h3 class="text-white mb-0 font-weight-500">$1,250 <small class="text-danger"><i class="fa fa-caret-down"></i> -0.5%</small></h3>
                          </div>
                      </div>
                  </div>
                </div>

            </div>
          

          <div class="row">
              <div class="offset-lg-2 col-lg-8 my-5">
            <div class="box bg-info bg-img" style="background-image: url({{  asset('assets/images/bg-1.png') }}">
                <div class="box-body text-center">							
                    <img src="{{ asset('assets/images/trophy.png')}}" class="mt-50" alt="">
                    <div class="max-w-500 mx-auto">
                        <h2 class="text-white mb-20 font-weight-500">Best Employee {{ $employee->name }}</h2>
                        <p class="text-white-50 mb-10 font-size-20">You've got 50.5% more sales today. You've reached 8th milestone, checkout author section</p>
                    </div>
                </div>
            </div>
        </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection