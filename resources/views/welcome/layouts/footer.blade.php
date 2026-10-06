<!-- ===================== FOOTER ===================== -->
<style>
  .af-footer { background:#000; color:#bdbdbd; font-size:.9rem; position:relative; }
  .af-footer::before { content:""; position:absolute; top:0; left:0; right:0; height:3px;
    background:linear-gradient(90deg, transparent, #c9a24a, transparent); }
  .af-footer a { color:#bdbdbd; text-decoration:none; transition:color .2s; }
  .af-footer a:hover { color:#c9a24a; }

  .af-footer-main { padding:3.5rem 0 2rem; }

  .af-brand img { max-width:100px; margin-bottom:.9rem; }
  .af-tagline { font-size:.7rem; letter-spacing:2.5px; color:#c9a24a; text-transform:uppercase; margin-bottom:.6rem; }
  .af-about { color:#d6d6d6; line-height:1.7; margin-bottom:0; max-width:360px; }

  .af-footer h6 { color:#fff; font-family:'Poppins',sans-serif; font-weight:600; font-size:.95rem;
    letter-spacing:.5px; margin-bottom:1.2rem; padding-bottom:.7rem; position:relative; }
  .af-footer h6::after { content:""; position:absolute; left:0; bottom:0; width:32px; height:2px; background:#c9a24a; }

  .af-links { list-style:none; padding:0; margin:0; }
  .af-footer .af-links li { display:block; margin-bottom:.65rem; }
  .af-links a { display:inline-block; transition:color .2s, transform .2s; }
  .af-links a:hover { transform:translateX(3px); }

  .af-social { display:flex; gap:.6rem; flex-wrap:wrap; }
  .af-social a { width:36px; height:36px; border-radius:50%; border:1px solid #333; color:#fff;
    display:inline-flex; align-items:center; justify-content:center; font-size:.9rem; transition:.2s; }
  .af-social a:hover { background:#c9a24a; border-color:#c9a24a; color:#000; }

  /* Contact / info strip */
  .af-info { margin-top:2.5rem; border:1px solid #1f1f1f; border-radius:10px; background:#0a0a0a; }
  .af-info-item { display:flex; align-items:center; gap:.9rem; padding:8px; height:100%; }
  .af-info .col-lg-3 + .col-lg-3 .af-info-item { border-left:1px solid #1f1f1f; }
  .af-info-icon { width:42px; height:42px; border-radius:50%; flex-shrink:0;
    display:inline-flex; align-items:center; justify-content:center;
    background:rgba(201,162,74,.12); color:#c9a24a; font-size:1rem; }
  .af-info-item small { display:block; color:#7d7d7d; font-size:.68rem; letter-spacing:1.2px; text-transform:uppercase; margin-bottom:.15rem; }
  .af-info-item span, .af-info-item a { color:#eaeaea; font-size:.85rem; line-height:1.5; }
  .af-info-item a:hover { color:#c9a24a; }
  .af-info-item .af-wa { display:flex; align-items:center; gap:.4rem; margin-top:.2rem; }
  .af-info-item .af-wa i { color:#25d366; font-size:1rem; }

  .af-footer-bottom { border-top:1px solid #1a1a1a; padding:1.1rem 0; font-size:.8rem; color:#8a8a8a; }
  .af-footer-bottom strong { color:#fff; font-weight:600; }
  .af-bottom-inner { display:flex; align-items:center; justify-content:space-between; gap:1rem; flex-wrap:wrap; }

  @media (max-width: 991.98px) {
    .af-info .col-lg-3 + .col-lg-3 .af-info-item { border-left:0; }
    .af-info .col-md-6:nth-child(even) .af-info-item { border-left:1px solid #1f1f1f; }
    .af-info .col-md-6:nth-child(n+3) .af-info-item { border-top:1px solid #1f1f1f; }
  }
  @media (max-width: 767.98px) {
    .af-footer-main { padding:2.5rem 0 1.5rem; }
    .af-info .af-info-item { border-left:0 !important; }
    .af-info .col-12 + .col-12 .af-info-item { border-top:1px solid #1f1f1f; }
    .af-footer-bottom { text-align:center; }
    .af-bottom-inner { flex-direction:column; justify-content:center; }
  }
</style>

<footer class="af-footer">
  <div class="container af-footer-main">
    <div class="row g-4">

      <!-- Brand -->
      <div class="col-lg-4 col-md-12 af-brand">
        <a href="{{ url('/') }}"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}" /></a>
        <p class="af-tagline">Easy K-Beauty &amp; Lifestyle Shopping</p>
        <p class="af-about">Aristocrat Fashion is your trusted Place for 100% authentic Korean cosmetics, personal care, and lifestyle products.</p>

      </div>

      <!-- Link columns -->
      <div class="col-lg-8">
        <div class="row g-4">
          <div class="col-md-4 col-6">
            <h6>Categories</h6>
            @if($menu = menu('Footer Three'))
            <ul class="af-links">
              @foreach($menu->subMenus as $menu)
              <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
              @endforeach
            </ul>
            @endif
          </div>

          <div class="col-md-4 col-6">
            <h6>Useful Links</h6>
            @if($menu = menu('Footer Five'))
            <ul class="af-links">
              @foreach($menu->subMenus as $menu)
              <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
              @endforeach
            </ul>
            @endif
          </div>

          <div class="col-md-4 col-6">
            <h6>Pages</h6>
            @if($menu = menu('Footer Two'))
            <ul class="af-links">
              @foreach($menu->subMenus as $menu)
              <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Contact & license strip -->
    <div class="af-info">
      <div class="row g-0">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="af-info-item">
            <span class="af-info-icon"><i class="fa-solid fa-certificate"></i></span>
            <div><small>ই-ট্রেড লাইসেন্স</small><span>লাইসেন্স নং : TRAD / DNCC / 020173/2026</span></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="af-info-item">
            <span class="af-info-icon"><i class="fa-solid fa-location-dot"></i></span>
            <div><small>Address</small><span>H-181, Muktijoddha Road, Azampur, Dakshin Khan, Dhaka-1230</span></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="af-info-item">
            <span class="af-info-icon"><i class="fa-solid fa-envelope"></i></span>
            <div><small>Email</small><a href="mailto:{{ general()->email }}">{{ general()->email }}</a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="af-info-item">
            <span class="af-info-icon"><i class="fa-solid fa-phone"></i></span>
            <div>
              <small>Phone</small><a href="tel:{{ general()->mobile }}">{{ general()->mobile }}</a>
              <a href="https://wa.me/8801826814260" target="_blank" rel="noopener noreferrer" class="af-wa"><i class="fa-brands fa-whatsapp"></i> 01826-814260</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="af-footer-bottom">
    <div class="container af-bottom-inner">
      <div>All rights reserved &copy; {{ date('Y') }} <strong>Aristocrat Fashion</strong></div>
          <div class="af-social">
            @if(general()->facebook_link)
              <a href="{{ general()->facebook_link }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            @endif
            @if(general()->instagram_link)
              <a href="{{ general()->instagram_link }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            @endif
            @if(general()->youtube_link)
              <a href="{{ general()->youtube_link }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            @endif
            @if(general()->linkedin_link)
              <a href="{{ general()->linkedin_link }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            @endif
            <a href="https://wa.me/8801826814260" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            @if(general()->twitter_link)
              <a href="{{ general()->twitter_link }}" target="_blank" rel="noopener noreferrer" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
            @endif
          </div>
    </div>
  </div>
</footer>
