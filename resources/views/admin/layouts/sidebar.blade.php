<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('/lead-list')}}">
                <i class="bi bi-journal-text"></i>
                <span>Leads</span>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link collapsed"
                    onclick="event.preventDefault();
                        this.closest('form').submit();"> <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </a>            
            </form>
        </li>
    </ul>

</aside><!-- End Sidebar-->
