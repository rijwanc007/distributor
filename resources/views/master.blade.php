<!DOCTYPE html>
<html lang="en">
@include('admin.include.head_link')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="{{url('/home')}}" class="logo">
      <span class="logo-lg"><b>Setcol</b>BD</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('assets/images/employee_image/'.Auth::user()->image)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{asset('assets/images/employee_image/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
                <p>
                  {{Auth::user()->name}} - {{Auth::user()->position}}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('user.show',Auth::user()->first_name.'_'.Auth::user()->last_name.'_'.Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                   <a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('assets/images/employee_image/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
     @include('admin.include.side_bar')
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      @yield('content')
    </section>
  </div>
     @include('admin.include.footer')
</div>
     @include('admin.include.footer_js_link')
</body>
</html>
