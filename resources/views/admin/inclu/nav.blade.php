  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">




{{-- <th><img src="{{ asset('my_images/'.auth()->user()->photo->file) }}" class="img-circle" height="25" width="25" alt="Avatar" /></th> --}}




              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

{{-- <th><img src="{{ asset('my_images/'.auth()->user()->photo->file ) }}" class="img-circle" height="90" width="90" alt="Avatar" /></th> --}}


                <p>
                  {{ auth()->user()->name }}
                </p>
              </li>
              <!-- Menu Body -->
   
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('users.edit',auth()->user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('mylog') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
                
              </li>


            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>


    </nav>
  </header>
  @include('admin.inclu.menu')




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
