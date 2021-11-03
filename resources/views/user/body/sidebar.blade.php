@php
$prefix = Request::route()->getPrefix();  
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('user.index') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src=" {{ asset('backend/images/logo-dark.png') }} " alt="">
						  <h3><b>F.</b> Society</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{  ($route == 'user.index')? 'active':'' }}">
          <a href="{{ route('user.index')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li> 
        
        		  
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="user"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>My Profile</a></li>
            <li><a href="{{ route('password.edit')}}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>	 
        
        <li class="treeview {{ ($prefix == '/task')?'active':'' }}">
          <a href="#">
            <i data-feather="bell"></i> <span>View Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('task.view') }}"><i class="ti-more"></i>Notifications</a></li>
          </ul>
        </li>	  

        <li class="treeview {{ ($prefix == '/chat')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i> <span>Chat Room</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('chat.home') }}"><i class="ti-more"></i>Chat</a></li>
          </ul>
        </li>	
	         
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>