@extends('admin.admin_master');

@section('admin')

<style>
.direct-chat-messages::-webkit-scrollbar {
    width: .5em !important;
    border-radius: 10px;
  }
   
.direct-chat-messages::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgb(39,46,72) !important;
  }
   
.direct-chat-messages::-webkit-scrollbar-thumb {
    background-color: rgb(25, 30, 44) !important;
    outline: 1px solid rgb(37, 45, 66) !important;
  }
  </style>
<div class="content-wrapper">
    
    <div class="container-full">
        <!-- Content Header (Page header) -->    
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="box">
                        <div class="box-header with-border p-0">
                            <div class="form-element lookup">
                                <input class="form-control p-20 w-p100" type="text" placeholder="Search Contact">
                            </div>
                        </div>
                        <div class="box-body p-0">
                            <div class="slimScrollDiv"
                                style="position: relative; overflow: hidden; width: auto; height: 680px;">
                                <div id="chat-contact" class="media-list media-list-hover media-list-divided "
                                    style="overflow: hidden; width: auto; height: 680px;">

                                @foreach ($users as $user)
                                    @if ($user->isOnline() == "user-is-online-")

                                    <div class="media media-single">
                                        <a href="#" class="avatar avatar-lg status-success">
                                            @if ($user->image != null)
                                                <img style="object-fit:cover;" src="{{ asset('upload/user_images/' . $user->image) }}" alt="...">
                                            @else
                                            <img style="object-fit:cover;" src="{{ asset('upload/default.png') }}" alt="...">
                                            @endif
                                        </a>
    
                                        <div class="media-body">
                                            <h6><a href="#">{{ $user->name }}</a></h6>
                                            <small class="text-success">Online</small>
                                        </div>
                                    </div>
                                    @else
                                    <div class="media media-single">
                                        <a href="#" class="avatar avatar-lg status-success">
                                            @if ($user->image != null)
                                                <img style="object-fit:cover;" src="{{ asset('upload/user_images/' . $user->image) }}" alt="...">
                                            @else
                                            <img style="object-fit:cover;" src="{{ asset('upload/default.png') }}" alt="...">
                                            @endif
                                        </a>
    
                                        <div class="media-body">
                                            <h6><a href="#">{{ $user->name }}</a></h6>
                                            <small class="text-danger">Offline</small>                                     </div>
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                                <div class="slimScrollBar"
                                    style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; border-radius: 7px; z-index: 99; right: 1px; height: 546.572px;">
                                </div>
                                <div class="slimScrollRail"
                                    style="width: 7px; height: 100%; position: absolute; top: 0px;  border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="box direct-chat">
                        <div class="box-header with-border">
                            <h4 class="box-title">Chat Message</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
                            <!-- Conversations are loaded here -->
                            <div class="slimScrollDiv"
                                style="position: relative; overflow: hiddden; width: auto; height: 580px;">
                                <div id="chat-app" class="direct-chat-messages chat-app"
                                    style="overflow: hiddden; width: auto; height: 580px;">

                                    @foreach ($messages as $message)
                                        @if (auth()->user()->name != $message->sender)
                                        <div style="margin-left:0;" class="direct-chat-text">
                                            <span class="direct-chat-name">{{$message->sender}}</span>
                                                <p>{{ $message->content}}</p>
                                                <p class="direct-chat-timestamp"><time datetime="2018">{{ $message->created_at }}</time></p>
                                            </div>       
                                        @else
                                        <div class="direct-chat-msg right mb-30">
                                            <div class="clearfix mb-15">
                                                <span class="direct-chat-name pull-right">You</span>
                                            </div>
                                            <div class="direct-chat-text">
                                                <p>{{ $message->content}}</p>
                                                <p class="direct-chat-timestamp"><time datetime="2018">{{ $message->created_at }}</time></p>
                                            </div>
                                            
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="slimScrollBar"
                                    style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; border-radius: 7px; z-index: 99; right: 1px; height: 338.431px;">
                                </div>
                                <div class="slimScrollRail"
                                    style="width: 7px; height: 100%; position: absolute; top: 0px; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                </div>
                            </div>
                            <!--/.direct-chat-messages-->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            
                                <div class="input-group">
                                    <input id="chat-message" type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <div class="input-group-addon">
                                        <div class="align-self-end gap-items">
                                            
                                            
                                            <a id="submit-chat-message" class="publisher-btn " href="#"><i class="fa fa-paper-plane"></i></a>
                                            <input id="userName" type="hidden" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <!-- /.box-footer-->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection

