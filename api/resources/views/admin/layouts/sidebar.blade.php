<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="./index.html" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="{{asset('img/logo.jpg')}}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">StreamRail</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a href="{{url('/admin')}}" class="nav-link">
              <i class="nav-icon bi bi-house" @if($p==0) style="color:whitesmoke;" @endif></i>
              <p @if($p==0) style="font-weight: bolder; color:whitesmoke;" @endif>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/uploads')}}" class="nav-link">
              <i class="nav-icon bi bi-upload" @if($p==1) style="color:whitesmoke;" @endif></i>
              <p @if($p==1) style="font-weight: bolder; color:whitesmoke;" @endif>
                Subidas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/labels')}}" class="nav-link">
              <i class="nav-icon bi bi-tags" @if($p==2) style="color:whitesmoke;" @endif></i>
              <p @if($p==2) style="font-weight: bolder; color:whitesmoke;" @endif>
                Etiquetas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/sales')}}" class="nav-link">
              <i class="nav-icon bi bi-percent" @if($p==3) style="color:whitesmoke;" @endif></i>
              <p @if($p==3) style="font-weight: bolder; color:whitesmoke;" @endif>
                Ofertas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/users')}}" class="nav-link">
              <i class="nav-icon bi bi-people" @if($p==4) style="color:whitesmoke;" @endif></i>
              <p @if($p==4) style="font-weight: bolder; color:whitesmoke;" @endif>
                Usuarios
              </p>
            </a>
          </li>

          


        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>