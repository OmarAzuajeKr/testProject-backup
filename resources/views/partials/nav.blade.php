
<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">{{__('About')}}</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">{{__('Contact')}}</a></li>
        <li class="{{ setActive('projects.*') }}"><a href="{{ route('projects.index') }}">{{__('Projects')}}</a></li>
        @guest
        <li><a href="{{ route('login') }}">{{__('Login')}}</a></li> 
        @else
        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a></li>

        @endguest
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>