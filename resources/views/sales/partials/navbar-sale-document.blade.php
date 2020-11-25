<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" style="color: white">ADMINCOIFFURE</a>
    </div>
    <div class="navbar-wrapper" style="padding-left: 250px">
      <a class="navbar-brand" style="color: white">{{ $jsonResponse->tittle }}</a>
    </div>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav ml-auto">
        <div class="col-4 form-group">
          <input type="text" id="search-product" class="form-control" placeholder="Buscar producto...">
        </div>
        <div class="col-4 form-group">
            <input type="text" id="search-customer" class="form-control" placeholder="Buscar cliente...">
        </div>
        <div class="col-3">
            <select id="type-document" class="form-control">
                <option value="0">Precuenta</option>
                <option value="1">Boleta</option>
                <option value="2">Factura</option>
            </select>
        </div>
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <div class="photo">
              <img src="{{ asset('/black-dashboard/assets/img/anime3.png') }}">
            </div>
            <b class="caret d-none d-lg-block d-xl-block"></b>
            <p class="d-lg-none">Cerrar sesión</p>
          </a>
          <ul class="dropdown-menu dropdown-navbar">
            <li class="nav-link">
              <a href="#" class="nav-item dropdown-item">Perfil</a>
            </li>
            <li class="nav-link">
              <a href="#" class="nav-item dropdown-item">Configuración</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-link">
              <a href="logout" class="nav-item dropdown-item">Salir</a>
            </li>
          </ul>
        </li>
        <li class="separator d-lg-none"></li>
      </ul>
    </div>
  </div>
</nav>
      