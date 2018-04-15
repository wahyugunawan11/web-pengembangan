<html>
<head>
<title>Inventarisasi Data Indonesia</title>
{{HTML::style('Css/tiwi.css')}}
@yield('include')
</head>
<body>
{{Form::open(array('method'=>'post', 'url'=>"paneladmin/login"))}}
<div id = "main">
<div id="header">
	LOGIN
</div>
<div id = "menu">
</div>
<div id = "content">
	<form>
		Username: <input type="text" name="username"></input><br>
		Password: <input type="text" name="password"></input><br>
		<button>Login</button>
	</form>
</div>
<div id="footer">
	@yield('content2')
<font color="black" face = "Courier New" size ="3">
<center>Teknik Informatika UNTAN &copy; 2015</center></font></div></center></div>
{{Form::close()}}
</body>
</html>