<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?php echo e(asset(general()->favicon())); ?>" />
        <title>Order Invoice Mail Form <?php echo e(general()->title); ?></title>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />

<!--        <style>-->
           
<!--body{-->
<!--margin:0;-->
<!--background:#f4f6fb;-->
<!--font-family:'Poppins', Arial, sans-serif;-->
<!--color:#333;-->
<!--}-->

<!--.wrapper{-->
<!--max-width:700px;-->
<!--margin:30px auto;-->
<!--background:#ffffff;-->
<!--border-radius:8px;-->
<!--overflow:hidden;-->
<!--box-shadow:0 4px 12px rgba(0,0,0,0.05);-->
<!--}-->

<!--.header{-->
<!--background:#1e88e5;-->
<!--text-align:center;-->
<!--padding:25px;-->
<!--color:white;-->
<!--}-->

<!--.header img{-->
<!--max-width:180px;-->
<!--margin-bottom:10px;-->
<!--}-->

<!--.header h2{-->
<!--margin:5px 0;-->
<!--font-weight:600;-->
<!--}-->

<!--.content{-->
<!--padding:25px;-->
<!--}-->

<!--.section{-->
<!--margin-bottom:25px;-->
<!--background:#fafafa;-->
<!--padding:15px;-->
<!--border-radius:6px;-->
<!--}-->

<!--.section-title{-->
<!--font-weight:600;-->
<!--margin-bottom:10px;-->
<!--color:#444;-->
<!--border-bottom:1px solid #eee;-->
<!--padding-bottom:5px;-->
<!--}-->

<!--.order-info p{-->
<!--margin:4px 0;-->
<!--font-size:14px;-->
<!--}-->

<!--table{-->
<!--width:100%;-->
<!--border-collapse:collapse;-->
<!--margin-top:10px;-->
<!--}-->

<!--th{-->
<!--background:#f1f3f7;-->
<!--font-weight:600;-->
<!--padding:10px;-->
<!--font-size:14px;-->
<!--text-align:left;-->
<!--border-bottom:2px solid #e6e6e6;-->
<!--}-->

<!--td{-->
<!--padding:10px;-->
<!--font-size:14px;-->
<!--border-bottom:1px solid #eee;-->
<!--}-->

<!--.text-center{-->
<!--text-align:center;-->
<!--}-->

<!--.total-row td{-->
<!--font-weight:500;-->
<!--}-->

<!--.grand-total{-->
<!--font-size:18px;-->
<!--font-weight:700;-->
<!--color:#e53935;-->
<!--}-->

<!--.badge{-->
<!--background:#ffe082;-->
<!--padding:3px 8px;-->
<!--border-radius:4px;-->
<!--font-size:12px;-->
<!--}-->

<!--.footer{-->
<!--background:#fafafa;-->
<!--padding:20px;-->
<!--text-align:center;-->
<!--font-size:13px;-->
<!--color:#777;-->
<!--border-top:1px solid #eee;-->
<!--}-->

<!--.footer a{-->
<!--color:#1e88e5;-->
<!--text-decoration:none;-->
<!--}-->

<!--@media only screen and (max-width:600px){-->

<!--.wrapper{-->
<!--margin:10px;-->
<!--}-->

<!--.content{-->
<!--padding:15px;-->
<!--}-->

<!--th, td{-->
<!--font-size:12px;-->
<!--padding:8px;-->
<!--}-->

<!--.header h2{-->
<!--font-size:20px;-->
<!--}-->

<!--}-->
           
           
<!--        </style>-->
    </head>
    
    
    


    <body style="margin: 0; background: #f4f6f8; font-family: Arial, Helvetica, sans-serif">
        <table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 0">
            <tr>
                <td align="center">
                    <table
                        width="600"
                        cellpadding="0"
                        cellspacing="0"
                        style="
                            background: #ffffff;
                            border-radius: 8px;
                            overflow: hidden;
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                        "
                    >
                        <tr>
                            <td style="background: #2f80ed; padding: 25px; text-align: center; color: #ffffff">
                                <h1 style="margin: 0; font-size: 26px"><?php echo e(general()->title); ?></h1>
                                <p style="margin: 5px 0 0; font-size: 14px">Order Invoice</p>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 30px; color: #333333">
                                <p style="font-size: 16px; margin-top: 0; text-align: center">
                                    Thank you for shopping with <strong><?php echo e(general()->title); ?></strong>.
                                </p>

                                <table width="100%" style="border-collapse: collapse; margin-top: 20px">
                                    <tr>
                                        <td style="padding: 8px 0"><strong>Invoice:</strong></td>
                                        <td>#<?php echo e($datas['order']->invoice); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 8px 0"><strong>Customer Name:</strong></td>
                                        <td><?php echo e($datas['order']->name); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 8px 0"><strong>Email:</strong></td>
                                        <td><?php echo e($datas['order']->email); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 8px 0"><strong>Date:</strong></td>
                                        <td><?php echo e($datas['order']->created_at->format('d-m-Y h:i A')); ?></td>
                                    </tr>
                                </table>

                                <h3 style="margin-top: 30px">Order Details</h3>

                                <table
                                    width="100%"
                                    cellpadding="10"
                                    cellspacing="0"
                                    style="border-collapse: collapse; border: 1px solid #eee"
                                >
                                    <tr style="background: #f7f7f7">
                                        <th align="left">Product</th>
                                        <th align="center">Qty</th>
                                        <th align="right">Price</th>
                                        <th align="right">Total</th>
                                    </tr>

                                     <?php $__currentLoopData = $datas['order']->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($item->product_name); ?></td>
                                        <td align="center"><?php echo e($item->quantity); ?></td>
                                        <td align="right"><?php echo e(priceFullFormat($item->price)); ?></td>
                                        <td align="right"><?php echo e(priceFullFormat($item->final_price)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td colspan="3" align="right" style="border-top: 1px solid #eee">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td align="right" style="border-top: 1px solid #eee"><?php echo e(priceFullFormat($datas['order']->total_price)); ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" align="right"><strong>Discount</strong></td>
                                        <td align="right">
                                             <?php echo e(priceFullFormat($datas['order']->coupon_discount +
                                            $datas['order']->items->sum('total_coupon_discount'))); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" align="right" style="font-size: 18px">
                                            <strong>Grand Total</strong>
                                        </td>
                                        <td align="right" style="font-size: 18px; color: #e53935">
                                            <strong><?php echo e(priceFullFormat($datas['order']->grand_total)); ?></strong>
                                        </td>
                                    </tr>
                                </table>

                                <p style="margin-top: 30px; font-size: 14px; color: #666;     text-align: center;">
                                    If you have any questions about your order, feel free to contact us.
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td
                                style="
                                    background: #f7f7f7;
                                    padding: 20px;
                                    text-align: center;
                                    font-size: 13px;
                                    color: #888;
                                "
                            >
                                © <?php echo e(date('Y')); ?> <?php echo e(general()->title); ?>. All rights reserved.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

    
    
    
</html>
<?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/mails/InvoiceMail.blade.php ENDPATH**/ ?>