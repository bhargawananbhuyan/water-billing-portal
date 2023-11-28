<header class="bg-indigo-500 text-white py-4">
    <div class="container flex flex-wrap items-center justify-between gap-x-5">
        <a href="{{ route('home') }}" class="font-semibold">Water Management Portal</a>

        <nav class="flex items-center gap-x-5 text-sm">
            <a href="{{ route('home') }}" @class(['underline' => Route::is('home')])>
                Home
            </a>

            @guest
                <a href="{{ route('login') }}" @class(['underline' => Route::is('login')])>
                    Login
                </a>
            @endguest

            @auth
                @if (Auth::user()->role === 'consumer')
                    <a href="{{ route('consumer.bills_view') }}" @class(['underline' => Route::is('consumer.bills_view')])>
                        Bills
                    </a>
                @endif

                @if (Auth::user()->role === 'provider')
                    <a href="{{ route('provider.consumers_view') }}" @class(['underline' => Route::is('provider.consumers_view')])>
                        Consumers
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-red-500 text-xs font-medium p-2 rounded-md">
                        Logout
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>
