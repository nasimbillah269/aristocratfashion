 <?php $__env->startSection('title'); ?>
<title><?php echo e($page->seo_title?:websiteTitle($page->name)); ?></title>
<?php $__env->stopSection(); ?> <?php $__env->startSection('SEO'); ?>
<meta name="title" property="og:title" content="<?php echo e($page->seo_title?:websiteTitle($page->name)); ?>" />
<meta name="description" property="og:description" content="<?php echo $page->seo_description?:general()->meta_description; ?>" />
<meta name="keywords" content="<?php echo e($page->seo_keyword?:general()->meta_keyword); ?>" />
<meta name="image" property="og:image" content="<?php echo e(asset($page->image())); ?>" />
<meta name="url" property="og:url" content="<?php echo e(route('pageView',$page->slug?:'no-title')); ?>" />
<link rel="canonical" href="<?php echo e(route('pageView',$page->slug?:'no-title')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
.contactFormGrid .form-control {
    text-align: left;
    margin: 0;
}
.heading-banner h4 {
    background: #e6007e;
    display: block;
    padding: 40px 20px;
    color: #fff;
    border-radius: 20px;
}

.pageContents {
    background: #fff;
    padding: 20px;
    margin-bottom: 40px;
}

.contact-main {
    background: #fff;
    padding: 20px;
    border-radius: 20px;
}


</style>
<?php $__env->stopPush(); ?> 

<?php $__env->startSection('contents'); ?>






 <!--<section class="section-b-space pt-0"> -->
 <!--      <div class="heading-banner">-->
 <!--        <div class="custom-container container">-->
 <!--          <div class="row align-items-center">-->
 <!--            <div class="col-sm-6">-->
 <!--              <h4>Contact </h4>-->
 <!--            </div>-->
 <!--            <div class="col-sm-6">-->
 <!--              <ul class="breadcrumb float-end">-->
 <!--                <li class="breadcrumb-item">  <a href="#">Home  </a></li>-->
 <!--                <li class="breadcrumb-item active">  <a href="#">Contact </a></li>-->
 <!--              </ul>-->
 <!--            </div>-->
 <!--          </div>-->
 <!--        </div>-->
 <!--      </div>-->
 <!--    </section>-->
 
  <div class="pageContainer"> 
       <div class="heading-banner">
         <div class="custom-container container">
           <div class="row align-items-center">
             <div class="col-sm-12">
               <h4><?php echo e($page->name); ?> </h4>
             </div>
             <!--<div class="col-sm-6">-->
             <!--  <ul class="breadcrumb float-end">-->
             <!--    <li class="breadcrumb-item">  <a href="<?php echo e(route('index')); ?>">Home  </a></li>-->
             <!--    <li class="breadcrumb-item active">  <a href="#"><?php echo e($page->name); ?> </a></li>-->
             <!--  </ul>-->
             <!--</div>-->
           </div>
         </div>
       </div>
     </div>
     
     <section class="section-b-space pt-0"> 
       <div class="custom-container container">
         <div class="contact-main"> 
           <div class="row gy-3">
             <div class="col-12">
               <div class="title-1 address-content"> 
                 <p class="pb-0">Let's Get In Touch <span></span></p>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="location"></i></div>
                 <div class="contact-box"> 
                   <h6>Contact Number </h6>
                   <p><?php echo e(general()->mobile); ?></p>
                 </div>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="phone-calling"></i></div>
                 <div class="contact-box"> 
                   <h6>Email Address </h6>
                   <p><?php echo e(general()->email); ?></p>
                 </div>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="mail"></i></div>
                 <div class="contact-box"> 
                   <h6>Office Address </h6>
                   <p> <?php echo general()->address_one; ?> </p>
                 </div>
               </div>
             </div>
             <!--<div class="col-xl-3 col-sm-6">-->
             <!--  <div class="address-items"> -->
             <!--    <div class="icon-box">  <i class="iconsax" data-icon="map-1"></i></div>-->
             <!--    <div class="contact-box"> -->
             <!--      <h6>Showroom Address </h6>-->
             <!--      <p> <?php echo general()->address_one; ?> </p>-->
             <!--    </div>-->
             <!--  </div>-->
             <!--</div>-->
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space pt-0"> 
       <div class="custom-container container">
         <div class="contact-main"> 
           <div class="row align-items-center gy-4">
             <div class="col-lg-6 order-lg-1 order-2">
               <div class="contact-box"> 
                 <h4>Contact Us  </h4>
                 <p>If you've got fantastic _or want to collaborate,  out to us.  </p>
                 <div class="contact-form">  
                 <?php echo $__env->make(welcomeTheme().'.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <form  action="<?php echo e(route('contactMail')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-4">
                     <div class="col-12"> 
                       <label class="form-label" for="inputEmail4">Full Name  </label>
                       <input class="form-control" id="inputEmail4" type="text" name="name" value="" placeholder="Enter Full Name" />
                       <?php if($errors->has('name')): ?>
                        <p style="color: red; margin: 0;"><?php echo e($errors->first('name')); ?></p>
                        <?php endif; ?>
                     </div>
                     <div class="col-6">
                       <label class="form-label" for="inputEmail5">Email Address </label>
                       <input class="form-control" id="inputEmail5" type="email" name="email" value="" placeholder="Enter Email Address" />
                       <?php if($errors->has('email')): ?>
                        <p style="color: red; margin: 0;"><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>
                     </div>
                     <div class="col-6">
                       <label class="form-label" for="inputEmail6">Phone Number </label>
                       <input class="form-control" id="inputEmail6" type="number" name="mobile" value="" placeholder="Enter Phone Number" />
                       <?php if($errors->has('mobile')): ?>
                        <p style="color: red; margin: 0;"><?php echo e($errors->first('mobile')); ?></p>
                        <?php endif; ?>
                     </div>
                     <div class="col-12"> 
                       <label class="form-label" for="inputEmail7">Subject </label>
                       <input class="form-control" id="inputEmail7" type="text" name="subject" value="" placeholder="Enter Subject" />
                       <?php if($errors->has('subject')): ?>
                        <p style="color: red; margin: 0;"><?php echo e($errors->first('subject')); ?></p>
                        <?php endif; ?>
                     </div>
                     <div class="col-12"> 
                       <label class="form-label">Message </label>
                       <textarea class="form-control" id="message" type="text" name="message" value="" rows="6" placeholder="Enter Your Message"></textarea>
                        <?php if($errors->has('message')): ?>
                        <p style="color: red; margin: 0;"><?php echo e($errors->first('message')); ?></p>
                        <?php endif; ?>
                     </div>
                     <div class="col-12"> 
                       <button class="btn btn_black rounded sm" type="submit"> Send Message  </button>
                     </div>
                   </div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="col-xl-5 col-lg-6 order-lg-2 order-1 offset-xl-1">
               <div class="contact-img">  <img class="img-fluid" src="<?php echo e(asset('welcome/assets/images/contact/1.svg')); ?>" alt="" /></div>
             </div>
           </div>
         </div>
       </div>
     </section>


<?php $__env->stopSection(); ?> <?php $__env->startPush('js'); ?> <?php $__env->stopPush(); ?>
<?php echo $__env->make(welcomeTheme().'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/pages/contactUs.blade.php ENDPATH**/ ?>