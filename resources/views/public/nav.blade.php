@if (Route::has('login'))
    <div class="top-right links">
    	<a href="{{ url('/') }}">Home</a>
    	<a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('team') }}">Meet the Team</a>
        @auth
            <a href="{{ url('/home') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Research Login</a>
        @endauth
    </div>
@endif