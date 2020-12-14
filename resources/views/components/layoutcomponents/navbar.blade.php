<div class="container mx-auto mb-6">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li><a href="{{route('home')}}" class="p-3">Home</a></li>
            <li><a href="{{route('dashboard')}}" class="p-3">Dashboard</a></li>
            <li><a href="{{route('posts')}}" class="p-3">Post</a></li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li><a href="" class="p-3">{{auth()->user()->name}}</a></li>
                <li>
                    <form action="{{route('logout')}}" method="POST" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li><a href="{{route('register')}}" class="p-3">Register</a></li>
                <li><a href="{{route('login')}}" class="p-3">Login</a></li>
            @endguest
        </ul>
    </nav>
</div>

{{-- {{route('register')}} this is a route helper form the laravel which we can point to url using its referred name
     Then its not a problem if any url path is changed 
--}}