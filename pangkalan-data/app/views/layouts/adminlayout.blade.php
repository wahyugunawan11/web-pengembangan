<html>
  <head>
    <meta charset="UTF-8">
    @yield('title')
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @yield('style')
    @yield('include')
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{URL::to('/adminhome')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>PDP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LPPKM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="AdminLTE-2.1.1/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  @foreach($user as $index=>$user2)
                  <span class="hidden-xs">{{$user2->username}}</span>
                  @endforeach
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="AdminLTE-2.1.1/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Administrator LPPKM Universitas Tanjungpura
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      @foreach($user as $index=>$user2)
                      <a href="{{URL::to('/admin_editpassword')}}">Ubah password</a>
                      @endforeach
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="{{URL::to('/logout')}}">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="AdminLTE-2.1.1/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              @foreach($user as $index=>$user2)
              <p>{{$user2->username}}</p>
              @endforeach
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            @yield('sidebar')
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('content')
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <!-- small box -->
            @yield('inner')
            <!-- ./col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; {{$thnsekarang}}, LPPKM Universitas Tanjungpura.</strong>
      </footer>
    </div><!-- ./wrapper -->
    @yield('bagianjs')
    @yield('include2')
  </body>
</html>