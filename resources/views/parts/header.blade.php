<header id="header">
  <div class="container">
    <div class="row-flex">
      <div class="header-bar-icon">
        <i class="ri-menu-line"></i>
      </div>
      <div class="logo">
        <a href="/"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="#"></a>
      </div>
      <div class="header-logo-mobile">
        <img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
      </div>
      <div class="menu">
        <nav>
          <ul>
            <li class="link"><a href="#">All Products</a></li>
            <li class="link"><a href="#">Popular</a></li>
            <li class="link"><a href="#">New Arrivals</a></li>
            <li class="link"><a href="#">Ready to ship</a></li>
            <li class="link"><a href="#">Upcoming Costume</a></li>
          </ul>
        </nav>
      </div>
      <div class="other-search">
        <form action="{{route('search')}}" method="get" id="searchForm">
          <ul>
            <li>
              <input type="text" placeholder="Search..." name="search" id="searching"><i class="ri-search-line" onclick="submitSearchForm()"></i>
            </li>
          </ul>
        </form>
      </div>  
      <div class="other-cart">
        <li><a href=""><i class="ri-shopping-cart-line" number="0"></i></a></li>
      </div>
      </div>
    </div>
  </div>
</header>