<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ Route('admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        trips
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Trips</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Trips Details:</h6>
            <a class="collapse-item" href="#">Active Trips</a>
            <a class="collapse-item" href="#">Completed Trips</a>
            <a class="collapse-item" href="#">Booked Trips</a>
            <a class="collapse-item" href="#">Route Map</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Email
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Email</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Email Detail:</h6>
            <a class="collapse-item" href="#">Compose Mail</a>
            <a class="collapse-item" href="#">inbox</a>
            <a class="collapse-item" href="#">View Mail</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Drivers
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Drivers</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Drivers Detail:</h6>
            <a class="collapse-item" href="#">Add New Driver</a>
            <a class="collapse-item" href="#">All Drivers</a>
            <a class="collapse-item" href="#">Driver Payment</a>
            <!-- <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a> -->
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Passengers
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePassengers" aria-expanded="true" aria-controls="collapsePassengers">
          <i class="fas fa-fw fa-folder"></i>
          <span>Passengers</span>
        </a>
        <div id="collapsePassengers" class="collapse" aria-labelledby="headingPassengers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Passengers Detail:</h6>
            <a class="collapse-item" href="#">All Passengers</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Vehicles
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVehicle" aria-expanded="true" aria-controls="collapseVehicle">
          <i class="fas fa-fw fa-folder"></i>
          <span>Vehicles</span>
        </a>
        <div id="collapseVehicle" class="collapse" aria-labelledby="headingVehicle" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Vehicles Detail:</h6>
            <a class="collapse-item" href="{{ url('admin/vehicles/index') }}">View All Vehicle</a>
            <a class="collapse-item" href="{{ url('admin/vehicles/add') }}">Add Vehicle Details</a>
            <a class="collapse-item" href="#">Edit Vehicle Details</a>
            <!-- <a class="collapse-item" href="#">Add Vehicle Details</a> -->
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Coupons
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupons" aria-expanded="true" aria-controls="collapseCoupons">
          <i class="fas fa-fw fa-folder"></i>
          <span>Coupons</span>
        </a>
        <div id="collapseCoupons" class="collapse" aria-labelledby="headingCoupons" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Coupons Detail:</h6>
            <a class="collapse-item" href="#">Coupon Generation</a>
            <a class="collapse-item" href="#">Coupon List</a>
            <!-- <a class="collapse-item" href="#">Edit Vehicle Details</a> -->
            <!-- <a class="collapse-item" href="#">Add Vehicle Details</a> -->
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Fare Management
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFares" aria-expanded="true" aria-controls="collapseFares">
          <i class="fas fa-fw fa-folder"></i>
          <span>Fares</span>
        </a>
        <div id="collapseFares" class="collapse" aria-labelledby="headingFares" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fares Detail:</h6>
            <a class="collapse-item" href="#">Fare Add</a>
            <a class="collapse-item" href="#">Fare List</a>
            <!-- <a class="collapse-item" href="#">Edit Vehicle Details</a> -->
            <!-- <a class="collapse-item" href="#">Add Vehicle Details</a> -->
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->