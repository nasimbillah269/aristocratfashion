<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{asset(general()->favicon())}}">
<title>Reset Password Mail Form {{general()->title}} </title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

<style>

body{
margin:0;
background:#f1f1f1;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  font-size:14px;
  padding: 8px;
}



	@media only screen and (max-width: 600px) {


		}

</style>

</head>

<body style="margin:0;padding:0;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">

<div style="margin:25px auto;width:80%;min-width:600px;max-width:900px;overflow:hidden;padding:20px;background:#fff;border:1px solid #e5e5e5;border-radius:8px;">

    <!-- Header -->
    <div style="text-align:center;padding:10px 0 20px;">

        <img src="{{ URL::asset(general()->logo()) }}"
             style="max-width:200px;max-height:80px;"
             alt="{{ general()->title }}">

        <h2 style="margin:10px 0 3px;color:#222;font-size:22px;">
            {{ $datas['r']->name }}
        </h2>

        <p style="margin:0;color:#777;font-size:14px;">
            Welcome To {{ general()->title }}!
        </p>

    </div>


    <!-- Product Request -->
    <div style="background:#f8f8f8;padding:15px;margin:10px 0;border-radius:6px;">

        <p style="margin:0 0 12px;border-bottom:1px solid #d5d5d5;padding:5px 0 10px;font-size:15px;">
            <strong>PRODUCT REQUEST FORM</strong>
        </p>

        <!-- Product Name -->
        <p style="margin:7px 0;font-size:14px;">
            <strong>Product Name:</strong>
            {{ $datas['r']->product_name }}
        </p>

        <!-- Product Link -->
        <p style="margin:7px 0;font-size:14px;">
            <strong>Product Link:</strong>

            @if($datas['r']->product_link)
                <a href="{{ $datas['r']->product_link }}"
                   target="_blank"
                   style="color:#e34b82;text-decoration:none;">
                    {{ $datas['r']->product_link }}
                </a>
            @else
                N/A
            @endif
        </p>

        <!-- Quantity -->
        <p style="margin:7px 0;font-size:14px;">
            <strong>Quantity:</strong>
            {{ $datas['r']->quantity }}
        </p>

        <!-- Note / Message -->
        <p style="margin:7px 0;font-size:14px;">
            <strong>Note:</strong>
        </p>

        <div style="background:#fff;border:1px solid #e5e5e5;padding:10px;border-radius:4px;font-size:14px;line-height:1.6;">
            {!! nl2br(e($datas['r']->message ?? 'N/A')) !!}
        </div>

    </div>


    <!-- Customer Information -->
    <div style="background:#f8f8f8;padding:15px;margin:10px 0;border-radius:6px;">

        <p style="margin:0 0 12px;border-bottom:1px solid #d5d5d5;padding:5px 0 10px;font-size:15px;">
            <strong>CUSTOMER INFORMATION</strong>
        </p>

        <p style="margin:7px 0;font-size:14px;">
            <strong>Name:</strong>
            {{ $datas['r']->name }}
        </p>

        <p style="margin:7px 0;font-size:14px;">
            <strong>Mobile:</strong>
            {{ $datas['r']->mobile }}
        </p>

        <p style="margin:7px 0;font-size:14px;">
            <strong>Email:</strong>
            {{ $datas['r']->email }}
        </p>

    </div>


    <!-- Attachment -->
    @if($datas['r']->hasFile('attachment'))

        <div style="background:#f8f8f8;padding:15px;margin:10px 0;border-radius:6px;">

            <p style="margin:0 0 8px;font-size:15px;">
                <strong>Attachment:</strong>
            </p>

            <p style="margin:0;font-size:14px;color:#666;">
                {{ $datas['r']->file('attachment')->getClientOriginalName() }}
            </p>

        </div>

    @endif


    <!-- Contact Information -->
    <div style="background:#f8f8f8;padding:15px;margin:10px 0;border-radius:6px;">

        <p style="margin:0 0 10px;border-bottom:1px solid #d5d5d5;padding:5px 0 10px;font-size:15px;">
            <strong>CONTACT US</strong>
        </p>

        <p style="margin:0;font-size:14px;line-height:1.8;color:#555;">

            {!! general()->address_one !!}

            <br>

            <strong>Email:</strong>
            {{ general()->email }}

            <br>

            <strong>Mobile:</strong>
            {{ general()->mobile }}

            <br>

            <strong>Website:</strong>
            <a href="{{ general()->website }}"
               target="_blank"
               style="color:#e34b82;text-decoration:none;">
                {{ general()->website }}
            </a>

        </p>

    </div>


    <!-- Footer -->
    <div style="text-align:center;padding:15px 0 5px;">

        <p style="margin:0;color:#999;font-size:12px;">
            This email was generated from the Product Request Form.
        </p>

    </div>

</div>

</body>


</html>

