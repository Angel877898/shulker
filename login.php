<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>ShulkerBox</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css" media="all">
</head>

<body id="iniciar">
  <div id="logo">
    <a href="#">
      ShulkerBox
    </a>
  </div>
  <div id="login" class="bloque">
    <h3>Identificate</h3>
    <form id="inicio" name="form1" method="post" action="checklogin.php" enctype="multipart/form-data">
      <label>
        <input name="username" type="text" id="username" placeholder="Username" class="texto"/>
      </label>
      <label>
        <input name="password" type="password" id="password" placeholder="Password" class="texto"/>
      </label>
      <label>
        <input type="submit" name="login" value="Entrar" required id="entrar"/>
        <input type="submit" name="register" value="Registrar" required id="registro"/>

      </label>
    </form>
  </div>
</body>

</html>