<!-- REVIEW SUMMARY -->
    <div class="mgmt-review-summary">
        <div class="mgmt-review-average">
            <h2>0.0</h2>
            <div class="mgmt-review-stars">
                <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>
                <i class="far fa-star"></i> <i class="far fa-star"></i>
            </div>
            <span> 0 Customer Reviews </span>
        </div>
        <div class="mgmt-review-summary-text">
            <h4>Customer Reviews</h4>
            <p>Share your experience with this product and help other customers make a better choice.</p>
        </div>
    </div>
    
    <!-- REVIEW LIST CONTAINER -->
    <div class="mgmt-review-list mb-4" id="reviewListContainer">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-review-item border-bottom pb-3 mb-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="mb-0 fw-bold"><?php echo e($review->name); ?></h6>
                <span class="text-muted small"><?php echo e($review->created_at ? $review->created_at->diffForHumans() : 'Just now'); ?></span>
            </div>
            <div class="mgmt-review-stars text-warning mb-2" style="font-size: 13px;">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= $review->rating): ?>
                        <i class="fas fa-star"></i>
                    <?php else: ?>
                        <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <p class="mb-0 text-secondary" style="font-size: 14px;"><?php echo e($review->content); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php echo e($reviews->links('pagination')); ?>

    </div><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome//products/includes/realatedReview.blade.php ENDPATH**/ ?>