
<nav class=" bg-blue-light text-white">
    <div class="flex justify-between items-baseline py-6 px-8">
        <div>
            <a href="/" class="no-underline hover:text-black transition">
                <h1>SISAHY GO</h1>
            </a>

        </div>
        <div>
            @auth
                <a href="{{ url('/') }}" class="text-white hover:text-black no-underline text-white">
                    Home
                </a>    
                <cart-icon></cart-icon>
            @else
                <a href="{{ route('login') }}" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">Login</a>
                <a href="{{ route('register') }}" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">Register</a>
                <cart-icon></cart-icon>
            @endauth   
            
        </div>
    </div>
</nav>
