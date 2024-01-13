<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item {{ request()->is(route('dashboard.index') . '*') ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">
                <span data-feather="home"></span>
                Dashboard
            </a>
        </li>
        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <span data-feather="shopping-cart"></span>
                Products Category
            </a>
        </li>

        <li class="nav-item {{ Request::is('inventory*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('inventory.index')}}">
              <span data-feather="bar-chart-2"></span>
              Inventory Management
            </a>
          </li>

        <li class="nav-item {{ Request::is('purchase*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('purchase.index')}}">
            <span data-feather="file"></span>
            Purchases
          </a>
        </li>

        <li class="nav-item {{ Request::is('sales*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('sales.index')}}">
              <span data-feather="layers"></span>
              Sales
            </a>
          </li>

        <li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
          <a class="nav-link"  href="{{ route('customers.index')}}">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>

        <li class="nav-item {{ Request::is('suppliers*') ? 'active' : '' }}">
          <a class="nav-link"  href="{{ route('suppliers.index')}}">
            <span data-feather="users"></span>
            Suppliers
          </a>
        </li>


      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item {{ Request::is('sales_report*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('sales_report.index')}}">
            <span data-feather="file-text"></span>
             Sales Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
             Profit Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Loss Report
                  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Overall Report
          </a>
        </li>
      </ul>
    </div>
  </nav>
