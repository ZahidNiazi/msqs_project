<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-graduation-cap fa-lg text-success"></i>
        </div>
        <div class="sidebar-brand-text mx-2 font-weight-bold">MCQs Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="false" aria-controls="collapseCategory">
            <i class="fas fa-layer-group"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('category.add') }}"><i class="fas fa-plus-circle text-success"></i> Add Subject</a>
                <a class="collapse-item" href="{{ route('All.Category') }}"><i class="fas fa-list text-primary"></i> View Categories</a>
            </div>
        </div>
    </li>

    <!-- Subcategories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubcategory"
            aria-expanded="false" aria-controls="collapseSubcategory">
            <i class="fas fa-sitemap"></i>
            <span>Subcategories</span>
        </a>
        <div id="collapseSubcategory" class="collapse" aria-labelledby="headingSubcategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('subcategory.add') }}"><i class="fas fa-plus-circle text-success"></i> Add Subcategory</a>
                <a class="collapse-item" href="{{ route('all.subcategory') }}"><i class="fas fa-list text-primary"></i> View Subcategories</a>
            </div>
        </div>
    </li>

    <!-- Topics -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTopic"
            aria-expanded="false" aria-controls="collapseTopic">
            <i class="fas fa-book-open"></i>
            <span>Topics</span>
        </a>
        <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('admin.add.topic') }}"><i class="fas fa-plus-circle text-success"></i> Add Topic</a>
                <a class="collapse-item" href="{{ route('admin.all.topic') }}"><i class="fas fa-list text-primary"></i> View Topics</a>
            </div>
        </div>
    </li>

    <!-- MCQs -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMcqs"
            aria-expanded="false" aria-controls="collapseMcqs">
            <i class="fas fa-question-circle"></i>
            <span>MCQs</span>
        </a>
        <div id="collapseMcqs" class="collapse" aria-labelledby="headingMcqs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('mcqs.add') }}"><i class="fas fa-plus-circle text-success"></i> Add Mcq</a>
                <a class="collapse-item" href="{{ route('All.mcqs') }}"><i class="fas fa-list text-primary"></i> View Mcqs</a>
                <a class="collapse-item" href="{{ route('mcqs.import.form') }} ">
                <i class="fas fa-file-upload text-info"></i> Import MCQs
            </a>
            </div>
        </div>
    </li>

    <!-- About Us -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
            aria-expanded="false" aria-controls="collapseAbout">
            <i class="fas fa-info-circle"></i>
            <span>About Us</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingAbout" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('aboutus.create') }}"><i class="fas fa-plus-circle text-success"></i> Add About Us</a>
                <a class="collapse-item" href="{{ route('aboutus.index') }}"><i class="fas fa-list text-primary"></i> View About Us</a>
            </div>
        </div>
    </li>

    <!-- Reports -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
            aria-expanded="false" aria-controls="collapseReports">
            <i class="fas fa-chart-line"></i>
            <span>Reports</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingReports" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item" href="{{ route('reports.mcqs') }}"><i class="fas fa-file-alt text-warning"></i> MCQs Reports</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
