<?php if(isset($carts) && $carts->count() > 0): ?>
<?php echo $__env->make(welcomeTheme().'.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row g-4">
           <div class="col-xxl-9 col-xl-8">
             <div class="cart-table">
               <div class="table-responsive theme-scrollbar"> 
                 <table class="table" id="cart-table">
                   <thead>
                     <tr> 
                       <th>Product  </th>
                       <th>Price  </th>
                       <th>Quantity </th>
                       <th>Total </th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody> 
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr> 
                       <td data-label="Product"> 
                         <div class="cart-box">  
                            <a href="<?php echo e(route('productView',$cart->product->slug?:'no-title')); ?>">  <img src="<?php echo e(asset($cart->image())); ?>" alt="<?php echo e($cart->product->name); ?>"  /></a>
                            <div>
                               <a href="<?php echo e(route('productView',$cart->product->slug?:'no-title')); ?>"> 
                                <h5> <?php echo e(Str::limit($cart->product->name, 10)); ?></h5>
                               </a>
                                <?php if($cart->itemAttributes()): ?>
    							<span style="font-size: 14px;">
                                    <?php $__currentLoopData = $cart->itemAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeName => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <b><?php echo e($attributeName); ?></b>: <?php echo e($value); ?>

                                        <?php if(!$loop->last): ?>
                                            , 
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
    							<?php endif; ?>
                             
                            </div>
                         </div>
                       </td>
                       <td data-label="Price">
                        <?php echo e(priceFullFormat($cart->itemprice())); ?>/-
                        
                        <?php if($cart->itemDiscount() > 0): ?>
                            <del><?php echo e(priceFullFormat($cart->regularPrice())); ?>/-</del>
                            <span class="offer-btn"><?php echo e($cart->itemDiscount()); ?>% off</span>
                        <?php endif; ?>
                        
                      </td>
                       <td data-label="Quantity">
                         <div class="quantity">
                           <button class="minus cartUpdate" data-url="<?php echo e(route('changeToCart', [$cart, 'decrement'])); ?>" type="button"><i class="fa-solid fa-minus"></i></button>
                           <input type="number" value="<?php echo e($cart->quantity); ?>" min="1" max="20" />
                           <button class="plus cartUpdate" data-url="<?php echo e(route('changeToCart', [$cart, 'increment'])); ?>" type="button"><i class="fa-solid fa-plus"></i></button>
                         </div>
                       </td>
                       <td data-label="Total"><?php echo e(priceFullFormat($cart->subtotal())); ?></td>
                       <td data-label="">
                           <a class="deleteButton cartUpdate" data-url="<?php echo e(route('changeToCart', [$cart, 'delete'])); ?>" style="color: #F44336;cursor: pointer;" href="javascript:void(0)"><i class="fa fa-trash" ></i></a>
                        </td>
                     </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                   </tbody>
                 </table>
               </div>
               <div class="no-data" id="data-show"><img src="<?php echo e(asset('welcome/assets/images/cart/1.gif')); ?>" alt="" />
                 <h4>You have nothing in  shopping cart! </h4>
                 <p>Today is a great  to purchase the things  have been holding onto!   <span>Carry on Buying </span></p>
               </div>
             </div>
           </div>
           <div class="col-xxl-3 col-xl-4">
             <div class="cart-items">      
               <div class="cart-body"> 
                 <h6>Price Details </h6>
                 <ul> 
                   <li> 
                     <p>Sub total  </p><span><?php echo e(priceFullFormat($cartTotalPrice)); ?></span>
                   </li>
                   <li> 
                     <p>Coupon Discount  </p><span><?php echo e(priceFullFormat($couponDisc)); ?></span>
                   </li>
                 </ul>
               </div>
               <div class="cart-bottom"> 
                    <h6>Grand Total  <span><?php echo e(priceFullFormat($grandTotal)); ?></span></h6>
               </div>
               <div class="coupon-box"> 
                 <h6>Coupon </h6>
                    <form action="<?php echo e(route('couponApply')); ?>" method="post">
    					<?php echo csrf_field(); ?>
                         <ul> 
                            <li>
                                <span> 
                                    <input type="text" value="<?php echo e(old('coupon_code')); ?>" name="coupon_code" placeholder="Apply Coupon" /><i class="iconsax me-1" data-icon="tag-2"></i>
                                </span>
                                <button class="btn" type="submit">Apply</button>
                            </li>
                         </ul>
                    </form>
               </div><a class="btn btn_black w-100 rounded sm" href="<?php echo e(route('checkout')); ?>">Check Out </a>
             </div>
           </div>
         </div>


<?php else: ?>
<div class="cart_empty">
	<i class="linearicons-cart"></i>
	<h4>Continue Shopping</h4>
	<a href="<?php echo e(route('index')); ?>" class="btn btn-success rounded-0 view-cart">Shopping</a>
</div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome//carts/includes/cartItems.blade.php ENDPATH**/ ?>