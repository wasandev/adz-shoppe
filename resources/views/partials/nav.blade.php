
    <nav class="flex items-center justify-between shadow flex-wrap bg-brand p-2" >
        <div class="flex items-center flex-no-shrink text-danger-light mr-4 md:items-center">           
            <svg class="fill-current h-8 w-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"/>
            </svg>
        
            <span class="font-semibold text-base tracking-tight text-danger-light">SISAHY GO</span>
        </div>
        
        <div class="block lg:hidden">
            <button @click="toggle" class="flex items-center px-2 py-2  text-white hover:text-danger">
                <svg class="fill-current h-5 w-5 " 
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                
                </svg>
            </button>
        </div> 
        <div :class="open ? 'block': 'hidden'" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
   
                @auth
                <div>
                    <a href="/" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        Docs
                    </a>
                    <a href="#responsive-header" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        บริการ
                    </a>
                </div>
                
                @else
                <div>
                    <a href="/" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        หน้าหลัก
                    </a>
                                        
                    <a href="/" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        ติดตามสินค้า
                    </a>
                    
                </div>
                @endauth    

            </div>
            <div>
                @auth
                    <a href="{{ route('logout') }}" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else        
                    <a href="{{ route('login') }}" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="mr-2 no-underline text-white hover:text-danger transition text-base mr-3">
                        {{ __('Register') }}
                    </a>
                @endauth
            
            </div>
        </div>
   
  </nav>


