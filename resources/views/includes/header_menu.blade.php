<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('/common/img/logo.png') }}" alt="logo"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="menu_icon"><i class="fas fa-bars"></i></span>
    </button>

    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Products</a>
            </li>
            
            @if(Auth::user())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Others
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                    <a class="dropdown-item" href="{{ route('showCart') }}">Cart</a>
                    <a class="dropdown-item" href="{{ route('my_orders') }}">My Orders</a>
                    
                    
                    @if($role_name == 'Vendor')
                        <a class="dropdown-item" href="{{ route('vendors_order') }}">Received Orders</a>
                        <a class="dropdown-item" href="{{ route('vendor_product.index') }}">My Products</a>
                    @endif

                </div>
            </li>
            @endif
        
        </ul>
    </div>
    
    <div class="hearer_icon d-flex">
        <!-- Check Users Authenticated & show icons-->
        @if(Auth::user())
            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
            <a href=""><i class="ti-heart"></i></a>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cart-plus"></i>
                    <b>{{ \Cart::session(Auth::user()->id)->getTotalQuantity()}}</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                    <a class="dropdown-item" href="{{ route('showCart') }}">Cart</a>
                </div>                                
            </div>
        @endif
        <!-- Check Users Authenticated & show icons-->

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                @if(Auth::user())
                    <a class="dropdown-toggle" href="#" id="navbarDropdown_3"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endif
            </li>

            <li class="nav-item">
                @if(empty(Auth::user()))
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endif
            </li>
        </ul>
        
    </div>
</nav>