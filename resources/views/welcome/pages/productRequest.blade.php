@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@push('css')
<style>
.contactFormGrid .form-control {
    text-align: left;
    margin: 0;
}




/* ==========================================
   PRE-ORDER FORM
========================================== */

.preorder-card {
    margin: 40px 0;

    border-radius: 12px;

}

.preorder-header {
    margin-bottom: 30px;
}

.preorder-header h2 {
    font-size: 34px;
    font-weight: 600;
    color: #172033;
    margin: 0 0 15px;
}

.preorder-header p {
    font-size: 15px;
    line-height: 1.8;
    color: #666;
    margin: 0;
}

.form-section h4 {
    font-size: 22px;
    font-weight: 600;
    color: #172033;
    margin-bottom: 22px;
}

.form-section {
    margin-bottom: 25px;
}

.customer-section {
    padding-top: 5px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #5d6675;
    margin-bottom: 8px;
}

.form-label span {
    color: #e34b82;
    margin-left: 2px;
}

.form-label small {
    color: #888;
    font-weight: 400;
}

.form-control {
    height: 46px;
    border: 1px solid #e2e5ea;
    border-radius: 6px;
    padding: 10px 14px;
    font-size: 14px;
    color: #333;
    box-shadow: none;
    transition: all .2s ease;
}

.form-control::placeholder {
    color: #a0a5ad;
}

.form-control:focus {
    border-color: #e34b82;
    box-shadow: 0 0 0 3px rgba(227, 75, 130, 0.08);
}

.preorder-textarea {
    height: auto;
    min-height: 140px;
    resize: vertical;
}

input[type="file"].form-control {
    height: auto;
    padding: 9px 12px;
}

.text-danger {
    display: block;
    margin-top: 5px;
    font-size: 12px;
}

.preorder-submit {
    border: 0;
    background: #e34b82;
    color: #fff;
    padding: 12px 24px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all .3s ease;
}

.preorder-submit i {
    margin-right: 7px;
}

.preorder-submit:hover {
    background: #d83c73;
    transform: translateY(-1px);
}


/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 767px) {

    .preorder-card {
        padding: 22px 18px;
    }

    .preorder-header h2 {
        font-size: 27px;
    }

    .preorder-header p {
        font-size: 14px;
        line-height: 1.7;
    }

    .form-section h4 {
        font-size: 19px;
    }

    .preorder-submit {
        width: 100%;
    }
}








</style>
@endpush 

@section('contents')

<!--<div class="singleProHead">-->
<!--    <div class="container">-->
<!--        <nav aria-label="breadcrumb">-->
<!--            <ol class="breadcrumb">-->
<!--                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>-->
<!--                <li class="breadcrumb-item active" aria-current="page">{{$page->name}}</li>-->
<!--            </ol>-->
<!--        </nav>-->
<!--    </div>-->
<!--</div>-->

<div class="cotactMainDiv">
    <div class="container">
        <div class="row">
            <!--<div class="col-md-2"></div>-->
           <div class="col-md-12">
    @include(welcomeTheme().'.alerts')

    <div class="preorder-card">

        <!-- Header -->
        <div class="preorder-header">
            <h2>Pre-order</h2>

            <p>
                আমরা আপনার কাঙ্ক্ষিত যে কোন নির্দিষ্ট কোরিয়ান পণ্য খুঁজে পেতে সাহায্য করতে পারি।
                এজন্য আপনাকে Aristocrat Fashion এর ওয়েবসাইটের মাধ্যমে প্রি-অর্ডার করতে হবে।
                দ্রুততম সময়ের মধ্যে আমরা সরাসরি দক্ষিণ কোরিয়া থেকে তা আপনার জন্য নিয়ে আসবো।
            </p>
        </div>

        <form action="{{ route('requestProductSubmit') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Product Information -->
            <div class="form-section">

                <h4>Fill out the form with details</h4>

                <div class="row g-3">

                    <!-- Product Name -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Product Name<span>*</span>
                        </label>

                        <input type="text"
                               name="product_name"
                               class="form-control"
                               value="{{ old('product_name') }}"
                               placeholder="Name"
                               required>

                        @if ($errors->has('product_name'))
                            <small class="text-danger">
                                {{ $errors->first('product_name') }}
                            </small>
                        @endif
                    </div>

                    <!-- Product Link -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Product Link <small>(if any)</small>
                        </label>

                        <input type="url"
                               name="product_link"
                               class="form-control"
                               value="{{ old('product_link') }}"
                               placeholder="Link">

                        @if ($errors->has('product_link'))
                            <small class="text-danger">
                                {{ $errors->first('product_link') }}
                            </small>
                        @endif
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Quantity<span>*</span>
                        </label>

                        <input type="number"
                               name="quantity"
                               class="form-control"
                               value="{{ old('quantity', 1) }}"
                               min="1"
                               placeholder="Quantity"
                               required>

                        @if ($errors->has('quantity'))
                            <small class="text-danger">
                                {{ $errors->first('quantity') }}
                            </small>
                        @endif
                    </div>

                    <!-- Note -->
                    <div class="col-12">
                        <label class="form-label">Note</label>

                        <textarea name="message"
                                  class="form-control preorder-textarea"
                                  placeholder="Write your requirements..."
                                  rows="5">{{ old('message') }}</textarea>

                        @if ($errors->has('message'))
                            <small class="text-danger">
                                {{ $errors->first('message') }}
                            </small>
                        @endif
                    </div>

                    <!-- Attachment -->
                    <div class="col-12">
                        <label class="form-label">
                            Attachment
                            <small>(Max 2Mb)</small>
                        </label>

                        <input type="file"
                               name="attachment"
                               class="form-control"
                               accept="image/*">

                        @if ($errors->has('attachment'))
                            <small class="text-danger">
                                {{ $errors->first('attachment') }}
                            </small>
                        @endif
                    </div>

                </div>
            </div>


            <!-- Customer Information -->
            <div class="form-section customer-section">

                <div class="row g-3">

                    <!-- Name -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Your Name<span>*</span>
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Name"
                               required>

                        @if ($errors->has('name'))
                            <small class="text-danger">
                                {{ $errors->first('name') }}
                            </small>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Email<span>*</span>
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="Email"
                               required>

                        @if ($errors->has('email'))
                            <small class="text-danger">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                    </div>

                    <!-- Mobile -->
                    <div class="col-md-4">
                        <label class="form-label">
                            Mobile Number<span>*</span>
                        </label>

                        <input type="text"
                               name="mobile"
                               class="form-control"
                               value="{{ old('mobile') }}"
                               placeholder="Number"
                               required>

                        @if ($errors->has('mobile'))
                            <small class="text-danger">
                                {{ $errors->first('mobile') }}
                            </small>
                        @endif
                    </div>

                </div>
            </div>


            <!-- Submit -->
            <button type="submit" class="preorder-submit">
                <i class="fa-solid fa-paper-plane"></i>
                Send Details
            </button>

        </form>

    </div>
</div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush