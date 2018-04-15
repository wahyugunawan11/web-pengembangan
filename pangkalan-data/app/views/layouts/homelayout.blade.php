<!DOCTYPE HTML>
<html>
<head>
	@yield('judul')
	<meta name="description" content="website description" />
	<meta name="keywords" content="website keywords, website keywords" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	@yield('style')
	@yield('bagianjs')
  @yield('include')
</head>
<body>
	<div id="main">
		<header>
			<div id="logo">
        @yield('logo')
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            @yield('menu')
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        @yield('sidebar')
      </div>
      @yield('content')
      @yield('siteContent')
    </div>
    <div id="scroll">
    </div>
    <footer>
      <p><a href="{{URL::to('/home')}}">Home</a> | <a href="{{URL::to('/lecturer')}}">Data Dosen</a> | <a href="{{URL::to('/contact')}}">Kontak</a> | <a href="{{URL::to('/login')}}">Login</a></p>
      <p>Copyright &copy; LPPKM Universitas Tanjungpura | {{$thnsekarang}}</p>
    </footer>
  </div>
  @yield('bagianjs2')
</body>
</html>