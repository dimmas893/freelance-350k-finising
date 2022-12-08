<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">WhareHouse</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">WH</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li> --}}
            <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="ion-ios-home-outline h3" data-pack="default"
                        data-tags="on, off"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ route('suplier') }}"><i class="ion-person h3" data-pack="default"
                        data-tags="on, off"></i> <span>Suplier</span></a></li>
            <li><a class="nav-link" href="{{ route('customor') }}"><i class="ion-person-stalker h3" data-pack="default"
                        data-tags="on, off"></i> <span>Customor</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Manage</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('wharehouse') }}"></i><span>Wharehouse</span></a></li>
                    <li><a class="nav-link" href="{{ route('inbound') }}">Inbound</a></li>
                    <li><a class="nav-link" href="{{ route('outbound') }}">Outbound</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
