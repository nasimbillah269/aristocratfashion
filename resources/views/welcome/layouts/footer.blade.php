<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <a href="#" class="brand-logo d-inline-block mb-2" style="color:#fff;"> <img src="{{asset(general()->logo())}}" alt="{{general()->title}}" /></a>
        <p style="font-size:.7rem; letter-spacing:2px; color:#888;">EASY KOREAN SHOPPING</p>
        <p>Aristocrat Fashion trusted Korean skincare website for 100% authentic K-beauty products.</p>

       
      </div>
      <div class="col-6 col-md-2">
        <h6>Categories</h6>
           @if($menu = menu('Footer Three'))
        <ul>
          @foreach($menu->subMenus as $menu)
          <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
          @endforeach

        </ul>
        @endif
      </div>
      <div class="col-6 col-md-3">
        <h6>Useful Links</h6>
        
          @if($menu = menu('Footer Five'))
        <ul>
          @foreach($menu->subMenus as $menu)
          <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
          @endforeach
        </ul>
        @endif
        </div>
        
      <div class="col-6 col-md-3">
        <h6>Pages</h6>
         @if($menu = menu('Footer Two'))
        <ul>
          @foreach($menu->subMenus as $menu)
          <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
          @endforeach

        </ul>
        @endif
        
       <div>
    @if(general()->facebook_link)
        <a href="{{ general()->facebook_link }}" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
    @endif

    @if(general()->instagram_link)
        <a href="{{ general()->instagram_link }}" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-instagram"></i>
        </a>
    @endif

    @if(general()->youtube_link)
        <a href="{{ general()->youtube_link }}" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-youtube"></i>
        </a>
    @endif

    @if(general()->linkedin_link)
        <a href="{{ general()->linkedin_link }}" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-tiktok"></i>
        </a>
    @endif

    @if(general()->twitter_link)
        <a href="{{ general()->twitter_link }}" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
    @endif
</div>
      </div>
    </div>
    <div class="footerContact" style="
    margin-right: 89px;">
           <div class="footerMail">
        <a href="mailto:{{ general()->email }}">
            <i class="fa-solid fa-envelope"></i>
            <span>{{ general()->email }}</span>
        </a>
    </div>

<div class="footerMail"  style="margin-left: 2px;">
    <a href="tel:{{ general()->mobile }}">
        <i class="fa-solid fa-phone"></i>
        <span>{{ general()->mobile }}</span>
    </a>
</div>
    </div>
    <!--<div class="mt-4 paymentImg">-->
    <!--  <h6>Pay With</h6>-->
    <!-- <img src="{{asset('welcome/assets/images/aristo/SSLCommerz-Pay-With-logo-All-Size-01.png')}}" alt="Personal Care">-->
    <!--</div>-->

    <div class="footer-bottom">
      All rights reserved © 2026 <strong style="color:#fff;">Aristocrat Fashion</strong>
    </div>
  </div>
</footer>
