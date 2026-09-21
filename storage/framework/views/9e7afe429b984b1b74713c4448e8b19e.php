<?php $__currentLoopData = $product->productAttibutesVariationGroup(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ii=>$attri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row" style="margin:0 -10px;">
        <div class="col-md-2" style="padding:10px;">
            <h5 style="margin-bottom: 5px;font-weight: bold; font-size: 15px;"><?php echo e($attri->name); ?> :  <span class="selected-value text-success"></span></h5>
        </div>
        <div class="col-md-10" style="padding:0 5px;">
            <ul class="colorList attributeItem">
                <?php $__currentLoopData = $product->productVariationAttributeItemsList()->whereHas('attributeItem')->where('attribute_id',$attri->id)->select('attribute_item_id')->groupBy('attribute_item_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$sku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <!--<?php echo e($sku->variationItemCheck($product->id,$attri->id)); ?>-->
                    <!--<?php echo e($sku->attribute_item_id); ?>-->
                    <input type="radio" class="attributeValue"
                    value="<?php echo e($sku->attribute_item_id); ?>"
                    data-vlueid="<?php echo e($sku->attribute_item_id); ?>"
                    name="option[<?php echo e($attri->id); ?>]"
                    data-name="<?php echo e($attri->name); ?>"
                    data-group="<?php echo e($ii); ?>"
                    id="for_<?php echo e($attri->name); ?>_<?php echo e($k+1); ?>"
                    
                    <?php if($selectVariation): ?>
                	<?php $__currentLoopData = $selectVariation->attributeVatiationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<?php echo e($item->attribute_item_id==$sku->attribute_item_id?'checked':''); ?>

                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                    
                    required=""
                    >
                    <?php if($attri->view==2): ?>
                	<label class="colorItem 
                	<?php if($selectVariation): ?>
                	<?php $__currentLoopData = $selectVariation->attributeVatiationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<?php echo e($item->attribute_item_id==$sku->attribute_item_id?'active':''); ?>

                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                	"
                 data-bs-placement="top" data-bs-title="<?php echo e($attri->name); ?>"
                	data-name="<?php echo e($attri->name); ?>"
                	data-vari="<?php echo e($sku->attributeItem->name); ?>"
                	<?php if($sku->variationItemImage($product->id)): ?>
                    data-image="<?php echo e(asset($sku->variationItemImage($product->id))); ?>"
                    <?php endif; ?>
                	for="for_<?php echo e($attri->name); ?>_<?php echo e($k+1); ?>"
                    style="background-color: <?php echo e(trim($sku->attributeItemValue())); ?>;"
                	</label>
                	<?php elseif($attri->view==3): ?>
                	<label class="imageItem textItem
                	<?php if($selectVariation): ?>
                	<?php $__currentLoopData = $selectVariation->attributeVatiationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<?php echo e($item->attribute_item_id==$sku->attribute_item_id?'active':''); ?>

                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                	"
                	data-name="<?php echo e($attri->name); ?>"
                	<?php if($sku->variationItemImage($product->id)): ?>
                    data-image="<?php echo e(asset($sku->variationItemImage($product->id))); ?>"
                    <?php endif; ?>
                	for="for_<?php echo e($attri->name); ?>_<?php echo e($k+1); ?>"
                	>
                	<!--<img src="<?php echo e(asset($sku->variationItemImage($product->id))); ?>" /> -->
                	<?php echo e($sku->attributeItemValue()); ?></label>
                	<?php else: ?>
                	<label class="textItem
                	<?php if($selectVariation): ?>
                	<?php $__currentLoopData = $selectVariation->attributeVatiationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<?php echo e($item->attribute_item_id==$sku->attribute_item_id?'active':''); ?>

                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                	"
                	data-name="<?php echo e($attri->name); ?>"
                	<?php if($sku->variationItemImage($product->id)): ?>
                    data-image="<?php echo e(asset($sku->variationItemImage($product->id))); ?>"
                    <?php endif; ?>
                	for="for_<?php echo e($attri->name); ?>_<?php echo e($k+1); ?>"
                	><?php echo e($sku->attributeItemValue()); ?></label>
                	<?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/products/includes/productVariation.blade.php ENDPATH**/ ?>