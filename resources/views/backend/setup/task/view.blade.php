
@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section id="notification-box" class="content">
                
                    <div class="d-flex align-items-center py-5">
                        <div class="m-auto">
                            <h1 class="py-5 page-title">Notifications</h1>
                        </div>
                    </div>
                
                @if (auth()->user()->unreadNotifications()->count() > 0)
                @foreach (auth()->user()->unreadNotifications as $notification)
                <div class="my-5 offset-lg-2 col-md-8 col-12">
                    <div class="box">
                    <div class="box-header">
                    <h4 class="box-title">{{ $notification->data['from'] }}</h4>
                    <div class="box-controls pull-right">
                      <a  class="btn btn-info" href="{{ route('task.read',$notification) }}">Mark As Read</a>
                    </div>                
                    </div>

                  <div class="box-body">
                    <p>{{ $notification->data['content']}}</p>
                  </div>
                    </div>
                </div>
                @endforeach
                    
                @else
                <div id="no-notification-box" class="text-center callout callout-info">
                    <h4>There Are No Notifications</h4>

                    <p></p>
                </div>
                @endif
                    
               </section>
        </div>
    </div>
@endsection