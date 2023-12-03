<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('admin.scholarship') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Scholarships</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>System Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a  href="{{ route('admin.students') }}">
              <i class="bi bi-circle"></i><span>Students</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Program</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>School Year</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Reports</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.settings.backup') }}">
              <i class="bi bi-circle"></i><span>Back Up</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Audit Trail</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-navbar" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>User Setting</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-navbar" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin.profile') }}">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.accounts') }}">
              <i class="bi bi-circle"></i><span>User Accounts</span>
            </a>
          </li>

        </ul>
      </li>



      <li class="nav-heading">Others</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Help</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Log Out</span>
        </a>
      </li>

    </ul>

  </aside>
