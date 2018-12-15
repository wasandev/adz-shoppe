
<nav class="flex items-center justify-between flex-wrap bg-blue-light p-6">
    
        <div class="flex items-center flex-no-shrink text-white mr-6">
            <a href="/" class="no-underline text-white hover:text-black transition">
                <span class="font-semibold text-xl tracking-tight">SISAHY GO</span>
            </a>
        </div>
    
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
   
                @auth
                <div>
                    <a href="#responsive-header" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">
                        Docs
                    </a>
                    <a href="#responsive-header" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">
                        บริการ
                    </a>
                </div>
                
                @else
                <div>
                    <a href="#responsive-header" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">
                        หน้าหลัก
                    </a>
                                        
                    <a href="#responsive-header" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">
                        ติดตามสินค้า
                    </a>
                    
                </div>
                @endauth    

            </div>
            <div>
                @auth
                    <a href="{{ route('logout') }}" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">Logout</a>
                @else        
                    <a href="{{ route('login') }}" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">Login</a>
                    <a href="{{ route('register') }}" class="mr-2 no-underline text-white hover:text-grey-darkest transition text-lg mr-3">Register</a>
                @endauth
            
            </div>
        </div>
   
  </nav>
