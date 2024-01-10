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
            <a class="nav-link collapsed" href="{{ url('/lead-list') }}">
                <i class="bi bi-journal-text"></i>
                <span>Leads</span>
            </a>
        </li>

        @if (auth()->user()->is_admin == 1 && auth()->user()->id == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/user-list') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/message-list') }}">
                    <i class="bi bi-send-fill"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('district') }}">
                    <i class="bi bi-send-fill"></i>
                    <span>Districts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('state') }}">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>States</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link collapsed"
                    onclick="event.preventDefault();
                        this.closest('form').submit();"> <i
                        class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </a>
            </form>
        </li>
    </ul>

</aside><!-- End Sidebar-->
