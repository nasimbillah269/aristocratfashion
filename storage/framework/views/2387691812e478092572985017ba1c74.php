<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <a href="#" class="brand-logo d-inline-block mb-2" style="color:#fff;"> <img src="<?php echo e(asset(general()->logo())); ?>" alt="<?php echo e(general()->title); ?>" /></a>
        <p style="font-size:.7rem; letter-spacing:2px; color:#888;">EASY KOREAN SHOPPING</p>
        <p>Aristocrat Fashion trusted Korean skincare website for 100% authentic K-beauty products.</p>

       
      </div>
      <div class="col-6 col-md-2">
        <h6>Categories</h6>
           <?php if($menu = menu('Footer Three')): ?>
        <ul>
          <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(asset($menu->menuLink())); ?>"><?php echo e($menu->menuName()); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
        <?php endif; ?>
      </div>
      <div class="col-6 col-md-3">
        <h6>Useful Links</h6>
        
          <?php if($menu = menu('Footer Five')): ?>
        <ul>
          <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(asset($menu->menuLink())); ?>"><?php echo e($menu->menuName()); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
        </div>
        
      <div class="col-6 col-md-3">
        <h6>Pages</h6>
         <?php if($menu = menu('Footer Two')): ?>
        <ul>
          <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(asset($menu->menuLink())); ?>"><?php echo e($menu->menuName()); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
        <?php endif; ?>
        
       <div>
    <?php if(general()->facebook_link): ?>
        <a href="<?php echo e(general()->facebook_link); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
    <?php endif; ?>

    <?php if(general()->instagram_link): ?>
        <a href="<?php echo e(general()->instagram_link); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-instagram"></i>
        </a>
    <?php endif; ?>

    <?php if(general()->youtube_link): ?>
        <a href="<?php echo e(general()->youtube_link); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-youtube"></i>
        </a>
    <?php endif; ?>

    <?php if(general()->linkedin_link): ?>
        <a href="<?php echo e(general()->linkedin_link); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-tiktok"></i>
        </a>
    <?php endif; ?>

    <?php if(general()->twitter_link): ?>
        <a href="<?php echo e(general()->twitter_link); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
    <?php endif; ?>
</div>
      </div>
    </div>
    <div class="footerContact" style="
    margin-right: 89px;">
           <div class="footerMail">
        <a href="mailto:<?php echo e(general()->email); ?>">
            <i class="fa-solid fa-envelope"></i>
            <span><?php echo e(general()->email); ?></span>
        </a>
    </div>

<div class="footerMail"  style="margin-left: 2px;">
    <a href="tel:<?php echo e(general()->mobile); ?>">
        <i class="fa-solid fa-phone"></i>
        <span><?php echo e(general()->mobile); ?></span>
    </a>
</div>
    </div>
    <!--<div class="mt-4 paymentImg">-->
    <!--  <h6>Pay With</h6>-->
    <!-- <img src="<?php echo e(asset('welcome/assets/images/aristo/SSLCommerz-Pay-With-logo-All-Size-01.png')); ?>" alt="Personal Care">-->
    <!--</div>-->

    <div class="footer-bottom">
      All rights reserved © 2026 <strong style="color:#fff;">Aristocrat Fashion</strong>
    </div>
  </div>
</footer>
<?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/layouts/footer.blade.php ENDPATH**/ ?>