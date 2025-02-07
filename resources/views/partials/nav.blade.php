
<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">{{__('About')}}</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">{{__('Contact')}}</a></li>
        <li class="{{ setActive('projects.*') }}"><a href="{{ route('projects.index') }}">{{__('Projects')}}</a></li>
    </ul>
</nav>