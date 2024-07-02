<div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item {{request()->is('index') ? 'active' : '' }}">
                <a href="{{route('index')}}" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Drink Menu</span>
                </a>
              </li>
              <li class="tm-page-nav-item {{request()->is('aboutUs') ? 'active' : '' }}">
                <a href="{{route('aboutUs')}}" class="tm-page-link ">
                  <i class="fas fa-users tm-page-link-icon "></i>
                  <span>About Us</span>
                </a>
              </li>
              <li class="tm-page-nav-item {{request()->is('specialItem') ? 'active' : '' }}">
                <a href="{{route('specialItem')}}" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>Special Items</span>
                </a>
              </li>
              <li class="tm-page-nav-item {{request()->is('contact') ? 'active' : '' }}">
                <a href="{{route('contact')}}" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      