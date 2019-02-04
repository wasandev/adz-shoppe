
    <nav class="flex items-center justify-between shadow flex-wrap bg-white p-2" >
        <div class="flex items-center flex-no-shrink text-red-light mr-8">
            
            <img  class="fill-current h-12 w-12 mr-4" src="{{ Storage::url('logo.jpg') }}" />
           
            <span class="font-semibold text-xl tracking-tight">SISAHY GO</span>
            </div>
        
        <div class="block lg:hidden">
            <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-red-light border-grey-light hover:text-grey-light hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div> 
        <div :class="open ? 'block': 'hidden'" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
   
                @auth
                <div>
                    <a href="#responsive-header" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        Docs
                    </a>
                    <a href="#responsive-header" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        บริการ
                    </a>
                </div>
                
                @else
                <div>
                    <a href="#responsive-header" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        หน้าหลัก
                    </a>
                                        
                    <a href="#responsive-header" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-base mr-3">
                        ติดตามสินค้า
                    </a>
                    
                </div>
                @endauth    

            </div>
            <div>
                @auth
                    <a href="{{ route('logout') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-lg mr-3"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else        
                    <a href="{{ route('login') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-lg mr-3">Login</a>
                    <a href="{{ route('register') }}" class="mr-2 no-underline text-indigo-darker hover:text-red-light transition text-lg mr-3">Register</a>
                @endauth
            
            </div>
        </div>
   
  </nav>


