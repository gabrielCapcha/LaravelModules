<div class="sidebar" data-color="pink">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="#" class="simple-text logo-mini">
          </a>
          <a href="#" class="simple-text logo-normal">
            {{ $jsonResponse->user->name }}
          </a>
        </div>
        <ul class="nav">
          <li class="active">
            <a href="dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if($jsonResponse->companyObject['flag_report'] == true)
          <li>
            <a class="nav-link">
              <i class="tim-icons icon-book-bookmark"></i>
              <p data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Reportes
              </p>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link">
                    <p style="padding-left:10px">Reporte de comisiones</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <p style="padding-left:10px">Reporte de ventas</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          <li>
            <a href="new-sale">
              <i class="tim-icons icon-cart"></i>
              <p>Nueva venta</p>
            </a>
          </li>
          <li>
            <a href="products">
              <i class="tim-icons icon-components"></i>
              <p>Productos</p>
            </a>
          </li>
          <li>
            <a href="plugins">
              <i class="tim-icons icon-atom"></i>
              <p>PLUGINS</p>
            </a>
          </li>
        </ul>
      </div>
    </div>