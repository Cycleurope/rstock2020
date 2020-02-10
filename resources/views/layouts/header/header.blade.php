<header>
    <nav class="navbar navbar-expand-lg">
        <a href="{{ route('home') }}" class="navbar-brand">R-Stock 2020</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Tableau de bord</a></li>
                <li class="nav-item"><a href="{{ route('search') }}" class="nav-link">Rechercher</a></li>
            </ul>
            <ul class="navbar-nav mr-auto">
                @can('isAdmin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Administration
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('users.admins') }}"><i class="fa fa-users mr-2"></i>Comptes Administrateur</a>
                      <a class="dropdown-item" href="{{ route('users.monitors') }}"><i class="fa fa-users mr-2"></i>Comptes Moniteurs</a>
                      <a class="dropdown-item" href="{{ route('users.guests') }}"><i class="fa fa-users mr-2"></i>Comptes Visiteurs</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('users.create') }}"><i class="fa fa-user-plus mr-2"></i>Nouveau compte</a>
                    </div>
                </li>
                @endcan
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown dropdown-menu-right">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user mr-2"></i>Mon profil</a>
                      <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2"></i>Se déconnecter</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>