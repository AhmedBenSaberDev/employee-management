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
    @if (Auth::user()->usertype == "Admin")
    <li class="{{ ($route == 'user.index')?'active':'' }}">
      <a href="{{ route('user.index')}}">
        <i data-feather="pie-chart"></i>
  <span>Dashboard</span>
      </a>
    </li> 
    @else
    <li class="{{ ($route == 'user.index')?'active':'' }}">
      <a href="{{ route('user.index')}}">
        <i data-feather="pie-chart"></i>
      <span>Dashboard</span>
      </a>
    </li> 
    @endif		  
		            

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

        
        
        @if (Auth::user()->usertype == "Admin")
        <li class="treeview {{ ($prefix == '/users')?'active':'' }}">
          <a href="#">
            <i data-feather="users"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view')}}"><i class="ti-more"></i>View Users</a></li>
            <li><a href="{{ route('user.add')}}"><i class="ti-more"></i>Add users</a></li>
          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/departement')?'active':'' }}">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>General Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('departement.view')}}"><i class="ti-more"></i>Deptartement</a></li>

          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/employee' )?'active':'' }}">
          <a href="#">
            <i data-feather="user-plus"></i>
            <span>Employees Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('employee.view')}}"><i class="ti-more"></i>Employees List</a></li>

          </ul>
        </li> 	  
		 
        <li class="treeview {{ ($prefix == '/employee-of-the-monthy')?'active':'' }}">
          <a href="#">
            <i class="fa fa-trophy"></i> <span>Employee Of The Month</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employeeOfTheMonth.add') }}"><i class="ti-more"></i>Add Employee Of The Month</a></li>
          </ul>
        </li>	
	  
        @endif
        <li class="treeview {{ ($prefix == '/task')?'active':'' }}">
          <a href="#">
            <i data-feather="bell"></i> <span>Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('task.view') }}"><i class="ti-more"></i>View Notifications</a></li>
            @if (auth()->user()->usertype == "Admin")
              <li><a href="{{ route('task.add')}}"><i class="ti-more"></i>Send Tasks</a></li>
            @endif
           
          </ul>
        </li>	
      </ul>
    </section>
	
	<div class="sidebar-footer">

	</div>
  </aside>