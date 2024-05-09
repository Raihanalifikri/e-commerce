<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.category.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('admin.category.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li> 
                <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.product.index') }}" class="{{ request()->routeIs('admin.product.gallery.index') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Product</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav --><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.userList.index') }}">
        <i class="bi bi-grid"></i>
        <span>User</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.transection.*', 'admin.product.*', ) ? '' : 'collapsed' }} "
            data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="transaction-nav"
            class="nav-content {{ request()->routeIs('admin.transection.*', 'admin.product.*') ? 'show' : '' }} "
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.transection.index') }}"
                    class="{{ request()->routeIs('admin.transection.*') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Transaction</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.my-transection.index') }}"
                    class="{{ request()->routeIs('admin.my-transection.*', ) ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>My Transaction</span>
                </a>
            </li>


        </ul>
    </li>

    </ul>

  </aside>