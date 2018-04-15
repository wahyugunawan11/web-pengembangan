<html >
  <head>
    <meta charset="UTF-8">
    <title>Pangkalan Data Penelitian | Masuk</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="log-in/css/style.css">
    <script>
    @if ($status == 'failed')
    alert("Username kosong!");
    @endif
    @if ($status == 'failed2')
    alert("Username/password salah! Silakan masukkan username dan password Anda.");
    @endif
</script>
  </head>
  <body>
  {{Form::open(array('method'=>'post', 'url'=>"login"))}}
    <div class="login-card">
    <h1>Login</h1><br>
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <select name="status" class="form-control">
          <option value="administrator">Administrator</option>
          <option value="kalemlit">Ketua LPPKM</option>
          <option value="dosen">Dosen</option>
        </select>
        <input type="submit" name="login" class="login login-submit" value="Masuk">
  {{Form::close()}}
      <div class="login-help">
        Copyright &copy; LPPKM Universitas Tanjungpura | {{$thnsekarang}}
      </div>
    </div>
<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
</body>
</html>
