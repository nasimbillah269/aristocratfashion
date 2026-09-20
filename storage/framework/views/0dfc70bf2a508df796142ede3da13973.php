 
<?php $__env->startSection('title'); ?>
<title><?php echo e(websiteTitle('Checkout')); ?></title>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('SEO'); ?>
<meta name="description" content="<?php echo general()->meta_description; ?>" />
<meta name="keywords" content="<?php echo e(general()->meta_keyword); ?>" />
<meta property="og:title" content="<?php echo e(general()->meta_title); ?>" />
<meta property="og:description" content="<?php echo general()->meta_description; ?>" />
<meta property="og:image" content="<?php echo general()->meta_description; ?>" />
<meta property="og:url" content="<?php echo e(route('index')); ?>" />
<?php $__env->stopSection(); ?> <?php $__env->startPush('css'); ?>
<style type="text/css">
    .invoice-inner {
        box-shadow: 0px 0px 5px #ccc;
        padding: 10px 20px;
    }

    .invoice-header {
        padding: 20px 0px 35px;
    }

    .invoice-header img {
        width: 100%;
    }

    .invoice-header h6 {
        margin-top: 15px !important;
    }

    .invoice-header h6,
    p {
        margin: 0;
        line-height: 15px;
        font-size: 12px;
    }

    .invoice-inner h2 {
        margin: 10px 0px;
        font-size: 41px;
        letter-spacing: 3px;
        color: #00549e;
    }

    .ordrinfotable {
        padding: 10px 12px;
        border: 1px solid #ccc;
    }

    table.tableOrderinfo.table {
        margin: 0;
        padding: 0;
    }

    .tableOrderinfo td {
        padding: 0;
        font-size: 13px;
        line-height: 17px;
        border: none;
    }

    .mainTable {
        margin: 30px 0;
    }

    .mainproducttable {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .mainproducttable td {
        padding: 5px 7px;
        font-size: 12px;
        border: 1px solid #ccc;
    }

    tr.headerTable {
        background-color: #e2e2e2;
    }

    tr.headerTable td {
        font-size: 13px;
        padding: 7px;
    }

    .boxFrozen {
        border: 1px solid #ccc;
        text-align: center;
        margin-bottom: 6px;
        border-bottom: 0px solid #ccc;
    }

    .boxFrozen h3 {
        padding: 5px;
        color: #fff;
        margin: 0;
        background-color: #ff1414;
        font-size: 16px;
    }

    .boxFrozen p {
        font-size: 16px;
        padding: 5px 0px;
        border-bottom: 1px solid #ccc;
    }

    .footerInvoice {
        margin-top: 100px;
    }

    @media only screen and (max-width: 567px) {
        .invoice-inner {
            padding: 10px;
            margin: 10px 0px;
        }
        .invoiceContainer {
            padding: 0;
        }
    }
</style>
<?php $__env->stopPush(); ?> <?php $__env->startSection('contents'); ?>

<div class="main-home-page">
    <div class="container">
        <div class="cart-page">
            <div class="Invoice-table">
                <div class="row" style="margin: 0;">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8" style="padding: 0;">
                        <br>
                        <?php echo $__env->make(welcomeTheme().'.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($order->payment_method=='Online Payment' && $order->order_status=='pending'): ?>
                        <p style="text-align:center;margin-bottom:10px;">
                            <a href="<?php echo e(route('sslPayment',['again-pay','order_id'=>$order->id])); ?>" class="btn btn-success"><i class="fa fa-money"></i> Payment Again</a>
                            <br>
                                <span style="color: red;font-weight: bold;font-size: 18px;">Your online payment are not completed. try again.</span>
                        </p>
                        <?php endif; ?>
                        <div class="invoicePage PrintAreaContact">
                                <div class="container invoiceContainer">
                                    <div class="invoice-inner">
                                        <div class="invoice-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="<?php echo e(asset(general()->logo())); ?>" />
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-7" style="text-align: end;">
                                                    <h6>CONTACT INFORMATION:</h6>
                                                    <p>
                                                        <?php echo e(general()->address_one); ?><br />
                                                        <?php echo e(general()->mobile); ?><br />
                                                        <?php echo e(general()->website); ?><br />
                                                        <?php echo e(general()->email); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin: 0;" />
                                        <h2>INVOICE</h2>
                                        <div class="orderInfo">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>
                                                        <b>Order To:</b><br />
                                                        <b>Name:</b> <?php echo e($order->name); ?><br />
                                                        <b>Mobile:</b> <?php echo e($order->mobile); ?><br />
                                                        <b>Address:</b> <?php echo e($order->fullAddress()); ?>

                                                    </p>
                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="ordrinfotable">
                                                        <table class="tableOrderinfo table">
                                                            <thead>
                                                                <tr>
                                                                    <td style="width: 40%;">Invoice Number</td>
                                                                    <td>: <?php echo e($order->invoice); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%;">Invoice Date</td>
                                                                    <td>: <?php echo e($order->created_at->format('d-m-Y h:i A')); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%;">Order Status</td>
                                                                    <td>: <?php echo e(ucfirst($order->order_status)); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 40%;">Payment Method</td>
                                                                    <td>: <?php echo e(ucfirst($order->payment_method)); ?></td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <div class="mainTable">
                                                <table class="table mainproducttable">
                                                    <thead>
                                                        <tr class="headerTable">
                                                            <td style="width: 40%;">Product Name & Description</td>
                                                            <td style="width: 10%; text-align: center;">Price</td>
                                                            <td style="width: 15%; text-align: center;">Quantity</td>
                                                            <td style="width: 15%; text-align: center;">Discount</td>
                                                            <td style="width: 15%; text-align: center;">Total Price</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($item->product_name); ?>

                                                            <?php if($item->itemAttributes()): ?>
                                							<br>
                                							<span style="font-size: 14px;">
                                                                <?php $__currentLoopData = $item->itemAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeName => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <b><?php echo e($attributeName); ?></b>: <?php echo e($value); ?>

                                                                    <?php if(!$loop->last): ?>
                                                                        , 
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </span>
                                							<?php endif; ?>
                                							<?php if($item->warranty_note): ?>
                                							<br>
                                							 <small style="font-size: 12px;"><?php echo e($item->warranty_note); ?> -  <b><?php echo e($item->warranty_charge > 0?priceFullFormat($item->warranty_charge):'Free'); ?></b></small>
                                							<?php endif; ?>
                                							<?php if($item->pre_order): ?>
                                							<br>
                                							<span style="padding: 0px 10px;display: inline-block;border-radius: 5px;background: #d9d910;">Pre-Order</span>
                                							<?php endif; ?>
                                                            </td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($item->price)); ?></td>
                                                            <td style="text-align: center;"><?php echo e($item->quantity); ?></td>
                                                            <td style="text-align: center;"><?php echo e($item->total_coupon_discount); ?></td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($item->final_price)); ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <tr>
                                                            <td colspan="4" style="text-align: end;">Subtotal</td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($order->total_price)); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-align: end;">Discount</td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($order->coupon_discount + $order->items->sum('total_coupon_discount'))); ?></td>
                                                        </tr>
                                                        
                                                        
                                                        <?php if($order->getway_charge > 0): ?>
                                                        <tr>
                                                            <td colspan="4" style="text-align: end;">Gateway Charge:</td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($order->getway_charge)); ?></td>
                                                        </tr>
                                                        <?php endif; ?>
                                                        
                                                        <tr>
                                                            <td colspan="4" style="text-align: end;">Grand Total</td>
                                                            <td style="text-align: center;"><?php echo e(priceFormat($order->grand_total)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="frozenTable">
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-7">
                                                    <?php if($order->payment_status=='paid'): ?>
                                                    <div class="paidsStatus" style="text-align: center;">
                                                        <img src="<?php echo e(asset('medies/paid.png')); ?>" style="max-width: 120px;" />
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="footerInvoice">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Thank you for shopping from <?php echo e(general()->title); ?></p>
                                                </div>
                                                <div class="col-md-6" style="text-align: end;">
                                                    ------------------------
                                                    <p>Authorized Sign</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startPush('js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
<script src="<?php echo e(asset('batikrom/js/inword.js')); ?>"></script>

<script>


    window.dataLayer = window.dataLayer || [];
    
        dataLayer.push({
            event: "purchase",
            ecommerce: {
                currency: "<?php echo e(general()->currency); ?>",
                value: <?php echo e(round($order->grand_total)); ?>,
                vat: <?php echo e(round($order->tax ?? 0)); ?>,
                shipping: <?php echo e(round($order->shipping_charge ?? 0)); ?>,
                discount: <?php echo e(round($order->coupon_discount ?? 0)); ?>,
                transaction_id: <?php echo e($order->invoice); ?>,
                items: [
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        <?php if($product =$item->product): ?>
                        item_id: "<?php echo e($product->id); ?>",
                        item_name: "<?php echo e($product->name); ?>",
                        item_category: "<?php echo implode(' - ', $product->productCategories->pluck('name')->toArray()); ?>",
                        item_brand: "<?php echo e($product->brand ? $product->brand->name : ''); ?>",
                        price: "<?php echo e(round($item->price)); ?>",
                        quantity: "<?php echo e($item->quantity); ?>",
                    
                        <?php endif; ?>
                    }<?php if(!$loop->last): ?>,<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            },
            user_data: {
            name: "<?php echo e($order->name); ?>",
            email: "<?php echo e($order->email); ?>",
            mobile: "<?php echo e($order->mobile); ?>",
            address: "<?php echo e($order->address); ?>",
            external_id:"<?php echo e($order->id); ?>",
            country: "BD"
        }
    });

    console.log('purcehase')

</script>


<script type="text/javascript">
    $(document).ready(function () {
        var date = new Date();
        date.setDate(date.getDate() + 7);

        console.log(date);

        var words = "";

        $(function () {
            var totalamount = Number($("#inWordTotal").data("amount"));
            words = toWords(totalamount);
            $("#inWordTotal")
                .empty()
                .append(words + "Taka only");
        });
    });
</script>

<script src="<?php echo e(asset('app-assets/js/printThis.js')); ?>"></script>

<script type="text/javascript">
    $("#PrintAction").on("click", function () {
        $(".PrintAreaContact").printThis();
    });
</script>

<!--Meta Purchase event-->
<script>
fbq('track', 'Purchase', {
    value: <?php echo e($order->grand_total); ?>,
    currency: 'BDT'
}, {
    eventID:'ORDER-<?php echo e($order->invoice); ?>'
});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make(welcomeTheme().'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/carts/cartInvoice.blade.php ENDPATH**/ ?>