
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text">Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-solid fa-list"></i>
            <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('category.add') }}">Add Subject</a>
                <a class="collapse-item" href="{{ route('All.Category') }}">View Category</a>
            </div>
        </div>
    </li>

    <!-- Subcategories -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubcategory"
            aria-expanded="true" aria-controls="collapseSubcategory">
            <i class="fas fa-sitemap"></i>
            <span>Subcategories</span>
        </a>
        <div id="collapseSubcategory" class="collapse" aria-labelledby="headingSubcategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('subcategory.add') }}">Add Subcategory</a>
                <a class="collapse-item" href="{{ route('all.subcategory') }}">View Subcategories</a>
            </div>
        </div>
    </li>

    <!-- Topics -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTopic"
            aria-expanded="true" aria-controls="collapseTopic">
            <i class="fas fa-book-open"></i>
            <span>Topics</span>
        </a>
        <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.add.topic') }}">Add Topic</a>
                <a class="collapse-item" href="{{ route('admin.all.topic') }}">View Topics</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
            aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-x-ray"></i>
            <span>Mcqs</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('mcqs.add') }}">Add Mcq</a>
                <a class="collapse-item" href="{{ route('All.mcqs') }}">View Mcqs</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAboutUs"
            aria-expanded="true" aria-controls="collapseAboutUs">
            <i class="fas fa-info-circle"></i>
            <span>About Us</span>
        </a>
        <div id="collapseAboutUs" class="collapse" aria-labelledby="headingAboutUs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('aboutus.create') }}">Add About Us</a>
                <a class="collapse-item" href="{{ route('aboutus.index') }}">View About Us</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse22"
            aria-expanded="true" aria-controls="collapse22">
            <i class="fas fa-bug"></i>
            <span>Mcqs Reports</span>
        </a>
        <div id="collapse22" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('reports.mcqs') }}">View Mcqs Reports</a>
            </div>
        </div>
    </li>
<!-- Blog  -->
        {{-- <li class="nav-item  active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse223"
            aria-expanded="true" aria-controls="collapse223">
            <i class="fas fa-bug"></i>
            <span>Blog</span>
        </a>
        <div id="collapse223" class="collapse" aria-labelledby="heading23" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('post.add')}}">Add Blog</a>
                <a class="collapse-item" href="{{ route('all.post') }}">View Blog</a>
            </div>
        </div>
    </li> --}}

{{--
    {{-- <li class="nav-item  active">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-solid fa-briefcase"></i>
            <span>Brand</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('brand.add') }}">Add Brand</a>
                <a class="collapse-item" href="{{ route('all.brand') }}">View Brand</a>
            </div>
        </div>
    </li>--}}

    {{-- <li class="nav-item  active">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsefour"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-solid fa-swatchbook"></i>
            <span>Product</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.product.create') }}">Add Product</a>
                <a class="collapse-item" href="{{ route('admin.all.product') }}">View Product</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item  active">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsesix"
            aria-expanded="true" aria-controls="collapsesix">
            <i class="fa fa-solid fa-cube"></i>
            <span>Order</span>
        </a>
        <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('admin.order.create')}}">Add Order</a>
                <a class="collapse-item" href="{{route('admin.all.order')}}">View Order</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item  active">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseseven"
            aria-expanded="true" aria-controls="collapseseven">
            <i class="fa fa-solid fa-cube"></i>
            <span>Customer</span>
        </a>
        <div id="collapseseven" class="collapse" aria-labelledby="headingsix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('admin.customer.create')}}">Add Customer</a>
                <a class="collapse-item" href="{{route('admin.all.customer')}}">View Customer</a>
            </div>
        </div>
    </li> --}}


    {{-- <li class="nav-item  active">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseeight"
            aria-expanded="true" aria-controls="collapseseven">
            <i class="fa fa-solid fa-cube"></i>
            <span>Employee</span>
        </a>
        <div id="collapseeight" class="collapse" aria-labelledby="headingsix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{url('/crud')}}">View Employee</a>
            </div>
        </div>
    </li> --}}




    {{-- <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}

    <!-- Sidebar Message -->

    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
      </div> --}}

</ul>


