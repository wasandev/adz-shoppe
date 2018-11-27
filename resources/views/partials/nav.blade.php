
<nav class="bg-white  text-grey-lightest">
    <div class="flex justify-between items-baseline py-6 px-8">
        <div>
            <a href="/" class="no-underline hover:text-black transition">
                <h1>ADZShoppe</h1>
            </a>

        </div>
        <div>
            @auth
                <a href="{{ url('/') }}" class="text-grey-darker hover:text-black no-underline text-lg">
                    Home
                </a>    
                <cart-icon></cart-icon>
            @else
                <a href="{{ route('login') }}" class="mr-2 no-underline text-grey-dark hover:text-grey-darkest transition text-lg mr-3">Login</a>
                <a href="{{ route('register') }}" class="mr-2 no-underline text-grey-dark hover:text-grey-darkest transition text-lg mr-3">Register</a>
                <cart-icon></cart-icon>
            @endauth   
            
        </div>
    </div>
</nav>
