



  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dash') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('pages/icons/font-awesome.html') }}">
                <span class="menu-title">Icons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('pages/forms/basic_elements.html') }}">
                <span class="menu-title">Forms</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">
            <span class="menu-title">User Management</span>
            <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admins.index') }}">
          <span class="menu-title">Admin Management</span>
          <i class="mdi mdi-account-star menu-icon"></i>
      </a>
    </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('docs/documentation.html') }}" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>