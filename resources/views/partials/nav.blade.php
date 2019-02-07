
    <nav class="flex items-center justify-between shadow flex-wrap bg-white p-2" >
        <div class="flex items-center flex-no-shrink text-indigo mr-8">           
            <svg class="fill-current h-8 w-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M7 3H2v14h5V3zm2 0v14h9V3H9zM0 3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm3 1h3v2H3V4zm0 3h3v2H3V7zm0 3h3v2H3v-2z"/>
            </svg>
        
            <span class="font-semibold text-base tracking-tight text-blue">SISAHY GO</span>
        </div>
        
        <div class="block lg:hidden">
            <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-black border-grey-dark hover:text-red-light hover:border-red">
                <svg class="fill-current h-4 w-4" 
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                
                </svg>
            </button>
        </div> 
        <div :class="open ? 'block': 'hidden'" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
   
                @auth
                <div>
                    <a href="/" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        Docs
                    </a>
                    <a href="#responsive-header" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        บริการ
                    </a>
                </div>
                
                @else
                <div>
                    <a href="/" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        หน้าหลัก
                    </a>
                                        
                    <a href="/" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        ติดตามสินค้า
                    </a>
                    
                </div>
                @endauth    

            </div>
            <div>
                @auth
                    <a href="{{ route('logout') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else        
                    <a href="{{ route('login') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        {{ __('Register') }}
                    </a>
                @endauth
            
            </div>
        </div>
   
  </nav>


