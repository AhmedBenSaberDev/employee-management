@extends('admin.admin_master')
@section('admin')
    

  <div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        @if ($employee)                
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
        @endif
    </section>
    <!-- /.content -->
    </div>
</div>
@endsection