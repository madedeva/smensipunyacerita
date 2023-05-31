    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="oi oi-menu"></span> Menu
	        </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link pl-0">Beranda</a></li>
                @guest
                <li class="nav-item {{ request()->is('curhat*') ? 'active' : '' }}"><a href="{{ route('login') }}" class="nav-link">Curhat</a></li>
				<li class="nav-item {{ request()->is('blog*') ? 'active' : '' }}"><a href="{{ route('login') }}" class="nav-link">Blog</a></li>
                @else
                <li class="nav-item {{ request()->is('curhat*') ? 'active' : '' }}"><a href="{{ route('curhat.create') }}" class="nav-link">Curhat</a></li>
				<li class="nav-item {{ request()->is('blog*') ? 'active' : '' }}"><a href="/blog" class="nav-link">Blog</a></li>
                @endguest
	        </ul>
            @guest
			<ul class="navbar-nav">
				<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
			</ul>
            @else
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
						<i class="fas fa-user-circle fa-fw">{{ Auth::user()->name }}</i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if (Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
						<a class="dropdown-item" href="/admin">Dashboard</a>
                        @endif
						@if (Auth::user()->role == 'siswa')
						<a class="dropdown-item" href="/cerita_saya">Cerita Saya</a>
						@endif
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/profile">Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
					</div>
				</li>
			</ul>
            @endguest
	      </div>
	    </div>
	  </nav>