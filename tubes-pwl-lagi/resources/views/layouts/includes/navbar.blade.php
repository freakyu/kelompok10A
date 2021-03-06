<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard"><img src="{{ asset('assets/img/logo-kober.png') }}"width="200" alt="KoBer Web Logo" class="img-responsive logo">
        </a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ Auth::user()->getGambar() }}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/users/{{ Auth::user()->id }}/detail"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        <li>
                            <a href="/logout">
                                <i class="lnr lnr-exit"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>