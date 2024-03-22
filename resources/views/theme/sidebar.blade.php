<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('staff*') ? 'active' : '' }}">
            <a href="{{route('staff.index')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role_id === 1)
        <li class="sidebar-item {{ request()->is('daftar-dosen*') ? 'active' : '' }}">
            <a href="{{ route('staff.dosen') }}" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Daftar Dosen</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->role_id === 1)
        <li class="sidebar-item {{ request()->is('daftar-user*') ? 'active' : '' }}">
            <a href="{{ route('staff.user') }}" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                <span>Daftar User</span>
            </a>
        </li>
        @endif
        {{-- <li
          class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
              <i class="bi bi-stack"></i>
              <span>Components</span>
          </a>

          <ul class="submenu ">

              <li class="submenu-item  ">
                  <a href="component-accordion.html" class="submenu-link">Accordion</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-alert.html" class="submenu-link">Alert</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-badge.html" class="submenu-link">Badge</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-breadcrumb.html" class="submenu-link">Breadcrumb</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-button.html" class="submenu-link">Button</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-card.html" class="submenu-link">Card</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-carousel.html" class="submenu-link">Carousel</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-collapse.html" class="submenu-link">Collapse</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-dropdown.html" class="submenu-link">Dropdown</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-list-group.html" class="submenu-link">List Group</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-modal.html" class="submenu-link">Modal</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-navs.html" class="submenu-link">Navs</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-pagination.html" class="submenu-link">Pagination</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-progress.html" class="submenu-link">Progress</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-spinner.html" class="submenu-link">Spinner</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-toasts.html" class="submenu-link">Toasts</a>

              </li>

              <li class="submenu-item  ">
                  <a href="component-tooltip.html" class="submenu-link">Tooltip</a>

              </li>

          </ul>


      </li> --}}
      <form id="hideForm" action="/logout" method="POST">
        @csrf
        <li class="sidebar-item">
            <a onclick="document.getElementById('hideForm').submit();" class='sidebar-link'>
                <i class="bi bi-box-arrow-left text-danger"></i>
                <span class="text-danger">Logout</span>
            </a>
        </li>
        </form>
    </ul>
</div>
