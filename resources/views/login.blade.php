<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('/black-dashboard/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/black-dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/black-dashboard/assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>
<body class="">
    <div class="wrapper">
      <div class="main-panel" >
        <div class="card">
          <div class="card-body">
            <form action="login" method="POST">
              {{ csrf_field() }}
              <p style="text-align: center">Iniciar sesión</p>
              <div class="form-group">
                <label for="exampleInputEmail1">Dirección de correo</label>
                <input required="required" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Escriba su correo">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" required="required">
              </div>
              <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      Mantener sesión activa
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                  </label>
              </div>
              <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>