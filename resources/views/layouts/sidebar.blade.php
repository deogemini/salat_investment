<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active':null}}" aria-current="page" href="{{ route('dashboard.index') }}">
                <span data-feather="home"></span>
                <i class="bi bi-house-door-fill"></i>
                Dashboard
            </a>
        </li>
        <hr>
        <li class="nav-item">

            <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }} " href="{{ route('categories.index') }}">
                <i class="bi bi-card-list"></i>

                <span data-feather="shopping-cart">              </span>
                Products Category
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('inventory.index') ? 'active' : '' }}" href="{{ route('inventory.index')}}">
                <i class="bi bi-shop"></i>
              <span data-feather="bar-chart-2"></span>
              Inventory Management
            </a>
          </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('purchase.index') ? 'active' : '' }}" href="{{ route('purchase.index')}}">
            <i class="bi bi-bag-fill"></i>
            <span data-feather="file"></span>
            Purchases
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('sales.index') ? 'active' : '' }}" href="{{ route('sales.index')}}">
                <i class="bi bi-cash"></i>
               <span data-feather="layers"></span>
              Sales
            </a>
          </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}"  href="{{ route('customers.index')}}">
            <i class="bi bi-people"></i>

            <span data-feather="users"></span>
            Customers
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('suppliers.index') ? 'active' : '' }}"  href="{{ route('suppliers.index')}}">
            <i class="bi bi-truck"></i>
            <span data-feather="users"></span>
            Suppliers
          </a>
        </li>
        <hr>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('matofali.index') ? 'active' : '' }}"  href="{{ route('matofali.index')}}">
                <i class="bi bi-dice-6"></i>
              <span data-feather="users"></span>
              Stock ya Matofali
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('mauzoMatofali.index') ? 'active' : '' }}"  href="{{ route('mauzoMatofali.index')}}">
                <i class="bi bi-cash-stack"></i>
              <span data-feather="users"></span>
              Ripoti ya Mauzo ya tofali
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('matumizi.index') ? 'active' : '' }}"  href="{{ route('matumizi.index')}}">
            <i class="bi bi-minecart-loaded"></i>
            <span data-feather="users"></span>
            Matumizi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('ainamatumizi.index') ? 'active' : '' }}"  href="{{ route('ainamatumizi.index')}}">
            <i class="bi bi-stack"></i>
            <span data-feather="users"></span>

           Aina za Matumizi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('cement.index') ? 'active' : '' }}"  href="{{ route('cement.index')}}">
            <i class="bi bi-stack"></i>
            <span data-feather="users"></span>
           Stock Ya Cement
          </a>
        </li>
      </ul>

      <hr>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('sales_report') ? 'active' : '' }}" href="{{ route('sales_report')}}">
            <span data-feather="file-text"></span>
             Sales Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('profit_loss_report') ? 'active' : '' }}" href="{{ route ('profit_loss_report')}}">
            <span data-feather="file-text"></span>
             Profit/Loss Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('deposition.index') ? 'active' : '' }}" href="{{ route ('deposition.index')}}">
            <span data-feather="file-text"></span>
             Deposition and Withdraws
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('bankaccount.index') ? 'active' : '' }}" href="{{ route ('bankaccount.index')}}">
            <span data-feather="file-text"></span>
             Bank Details
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('reports.salesperproduct') ? 'active' : '' }}" href="{{ route ('reports.salesperproduct')}}">
            <span data-feather="file-text"></span>
            Profit Per Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('reports.produceInvoice') ? 'active' : '' }}" href="{{ route ('reports.produceInvoice')}}">
            <span data-feather="file-text"></span>
            Produce Invoice
          </a>
        </li>

      </ul>

      <hr>


      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>MASHAMBA NA VIWANJA</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('mashamba.index') ? 'active' : '' }}" href="{{ route('mashamba.index')}}">
            <span data-feather="file-text"></span>
             Mashamba
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('gharama_mashamba.index') ? 'active' : '' }}" href="{{ route ('gharama_mashamba.index')}}">
            <span data-feather="file-text"></span>
             Gharama za Mashamba
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('deposition.index') ? 'active' : '' }}" href="{{ route ('deposition.index')}}">
            <span data-feather="file-text"></span>
            Viwanja
          </a>
        </li> --}}

      </ul>
    </div>
  </nav>
