

<?php $__env->startSection('title'); ?>
<title><?php echo e(websiteTitle($product->seo_title?:$product->name)); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('SEO'); ?>
<meta name="title" property="og:title" content="<?php echo e($product->seo_title?:websiteTitle($product->name)); ?>" />
<meta name="description" property="og:description" content="<?php echo e($product->seo_description?:$product->short_description); ?>" />
<meta name="keywords" content="<?php echo e($product->seo_keyword?:general()->meta_keyword); ?>" />
<meta name="image" property="og:image" content="<?php echo e(asset($product->image())); ?>" />
<meta name="url" property="og:url" content="<?php echo e(route('productView',$product->slug?:'no-title')); ?>" />
<link class="canonical" href="<?php echo e(route('productView',$product->slug?:'no-title')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
.paragraphs ul li {
    display: block;
    margin-bottom: 20px;
}

/* =============================================
   MANAGEMENT PRODUCT DETAIL MAIN
   ============================================= */
.mgmt-detail-section {
    padding: 40px 0 60px;
    background-color: #fff;
}

/* =============================================
   PRODUCT IMAGE (Left Column)
   ============================================= */
.mgmt-detail-img-wrap {
    position: relative;
    width: 100%;
    background-color: transparent;
    border-radius: 0;
    overflow: hidden;
    padding-right: 20px;
}

.mgmt-detail-img {
    width: 100%;
    height: auto;
    object-fit: contain;
    display: block;
}

/* =============================================
   PRODUCT INFO (Right Column)
   ============================================= */


.mgmt-detail-title {
    font-family: var(--mgmt-font);
    font-size: 28px;
    font-weight: 700;
    color: var(--mgmt-heading);
    margin: 0 0 4px 0;
    line-height: 1.2;
}

.mgmt-detail-desc {
    font-family: var(--mgmt-font);
    font-size: 15px;
    font-weight: 400;
    color: var(--mgmt-text-light);
    line-height: 1.6;
    margin: 0 0 16px 0;
}

.mgmt-detail-readmore {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 400;
    color: var(--mgmt-accent);
    text-decoration: underline;
    text-underline-offset: 4px;
    cursor: pointer;
    background: none;
    border: none;
    padding: 0;
    transition: color 0.25s ease;
    display: block;
    margin-top: 4px;
}

.mgmt-detail-readmore:hover {
    color: #6a4914;
}

.mgmt-detail-color-label {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 700;
    color: var(--mgmt-heading);
    margin: 4px 0 0 0;
    text-transform: uppercase;
}

.mgmt-detail-color-label span {
    font-weight: 700;
    color: var(--mgmt-heading);
}

.mgmt-detail-color-swatch-wrap {
    display: flex;
    gap: 10px;
    margin: 0 0 16px 0;
}

.mgmt-detail-swatch {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #dddddd;
    cursor: pointer;
    transition: border-color 0.25s ease;
    padding: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: none;
}

.mgmt-detail-swatch:hover {
    border-color: #aaaaaa;
}

.mgmt-detail-swatch-active {
    border-color: var(--mgmt-accent);
}

.mgmt-detail-swatch-inner {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: block;
}

.mgmt-detail-price {
    font-family: var(--mgmt-font);
    font-size: 22px;
    font-weight: 400;
    color: var(--mgmt-heading);
    margin: 0 0 12px 0;
}

.mgmt-detail-stock-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: var(--mgmt-font);
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    background: #f8d7da;
    color: #b02a37;
    padding: 5px 14px;
    border-radius: 3px;
    margin: 0 0 12px 0;
}

.mgmt-detail-cart-row {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: 0 0 12px 0;
    flex-wrap: wrap;
}

.mgmt-detail-qty-control {
    display: flex;
    align-items: center;
    border: 1px solid #cccccc;
    border-radius: 0 !important;
    height: 48px;
}

.mgmt-detail-qty-btn {
    width: 40px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--mgmt-bg);
    border: none;
    color: var(--mgmt-heading);
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.25s ease;
}

.mgmt-detail-qty-btn:hover {
    background-color: #f5f5f5;
}

.mgmt-detail-qty-input {
    width: 40px;
    height: 100%;
    text-align: center;
    font-family: var(--mgmt-font);
    font-size: 15px;
    font-weight: 500;
    color: var(--mgmt-heading);
    border: none;
    background-color: var(--mgmt-bg);
    outline: none;
    -moz-appearance: textfield;
}

.mgmt-detail-qty-input::-webkit-outer-spin-button,
.mgmt-detail-qty-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.mgmt-detail-btn-cart {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 48px;
    padding: 0 36px;
    font-family: var(--mgmt-font);
    font-size: 15px;
    font-weight: 600;
    color: var(--mgmt-bg);
    background-color: var(--mgmt-accent);
    border: none;
    border-radius: 0;
    cursor: pointer;
    transition: background-color 0.25s ease;
}

.mgmt-detail-btn-cart:hover {
    background-color: #6a4914;
}

.mgmt-detail-btn-buy {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 230px;
    height: 48px;
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 700;
    color: #ffffff !important;
    background-color: #03b847 !important;
    border: none;
    border-radius: 0;
    cursor: pointer;
    transition: background-color 0.25s ease;
    margin-bottom: 20px;
}

.mgmt-detail-btn-buy:hover {
    background-color: #000000;
}

.mgmt-detail-meta-wrap {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.mgmt-detail-meta-line {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 400;
    color: var(--mgmt-heading);
    margin: 0;
}

.mgmt-detail-meta-line strong {
    font-weight: 600;
}

.mgmt-detail-meta-link {
    color: var(--mgmt-heading);
    text-decoration: none;
    font-weight: 400;
    transition: color 0.25s ease;
}

.mgmt-detail-meta-link:hover {
    color: var(--mgmt-accent);
}

.mgmt-detail-share-wrap {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 10px;
}

.mgmt-detail-share-btn {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #eeeeee;
    color: var(--mgmt-heading);
    font-size: 15px;
    text-decoration: none;
    transition: background-color 0.25s ease, color 0.25s ease;
    border: none;
    cursor: pointer;
}

.mgmt-detail-share-btn:hover {
    background-color: #dddddd;
    color: var(--mgmt-heading);
    text-decoration: none;
}

/* =============================================
   ACCORDION SECTION
   ============================================= */
.mgmt-accordion-section {
    padding: 0 0 60px 0;
    background-color: var(--mgmt-bg);
}

.mgmt-accordion-item {
    border: none;
    border-radius: 0 !important;
    background-color: var(--mgmt-bg);
    margin-bottom: 16px;
}

.mgmt-accordion-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 16px 20px;
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 700;
    color: var(--mgmt-heading);
    background-color: var(--mgmt-bg-light);
    border: none;
    cursor: pointer;
    text-align: left;
    transition: background-color 0.25s ease;
}

.mgmt-accordion-btn:hover {
    background-color: #ebebeb;
}

.mgmt-accordion-btn:focus {
    outline: none;
    box-shadow: none;
}

.mgmt-accordion-icon {
    font-size: 14px;
    color: var(--mgmt-heading);
    flex-shrink: 0;
}

.mgmt-accordion-body {
    padding: 24px 20px;
    background-color: var(--mgmt-bg);
    border: 1px solid var(--mgmt-border);
    border-top: none;
}

.mgmt-accordion-body-title {
    font-family: var(--mgmt-font);
    font-size: 15px;
    font-weight: 700;
    color: var(--mgmt-heading);
    margin: 0 0 16px 0;
}

.mgmt-accordion-body p {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 400;
    color: var(--mgmt-text-light);
    line-height: 1.6;
    margin: 0 0 16px 0;
}

.mgmt-accordion-body p:last-child {
    margin-bottom: 0;
}

.mgmt-accordion-dim-label {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 700;
    color: var(--mgmt-heading);
    margin: 20px 0 12px 0;
}

.mgmt-accordion-dim-list {
    list-style: disc;
    margin: 0;
    padding: 0 0 0 20px;
}

.mgmt-accordion-dim-list li {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 400;
    color: var(--mgmt-text-light);
    line-height: 1.8;
    margin-bottom: 8px;
}
.mgmt-accordion-dim-list li:last-child {
    margin-bottom: 0;
}

/* =============================================
   "YOU MAY ALSO LIKE" SECTION
   ============================================= */
.mgmt-related-section {
    padding: 40px 0 60px;
    background-color: var(--mgmt-bg);
}

.mgmt-related-heading {
    font-family: var(--mgmt-font);
    font-size: 22px;
    font-weight: 700;
    color: var(--mgmt-heading);
    text-align: left;
    margin: 0 0 32px 0;
}

.mgmt-related-card {
    display: block;
    text-decoration: none;
    background-color: var(--mgmt-bg);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.mgmt-related-card:hover {
    text-decoration: none;
}

.mgmt-related-card-img-wrap {
    width: 100%;
    overflow: hidden;
    background-color: transparent;
    border-radius: 0;
}

.mgmt-related-card-img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
    transition: opacity 0.3s ease;
}

.mgmt-related-card:hover .mgmt-related-card-img {
    opacity: 0.9;
}

.mgmt-related-card-body {
    padding: 16px 0 0 0;
}

.mgmt-related-card-title {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 600;
    color: var(--mgmt-accent);
    margin: 0 0 8px 0;
    line-height: 1.3;
}

.mgmt-related-card-price {
    font-family: var(--mgmt-font);
    font-size: 14px;
    font-weight: 600;
    color: var(--mgmt-heading);
    margin: 0 0 6px 0;
}

.mgmt-related-card-color {
    font-family: var(--mgmt-font);
    font-size: 13px;
    font-weight: 400;
    color: var(--mgmt-accent);
}

/* =============================================
   PRODUCT ZOOM & GALLERY THUMBNAILS
   ============================================= */
.mgmt-detail-img-zoom-wrap {
    position: relative;
    cursor: crosshair;
    border: 1px solid var(--mgmt-border, #eeeeee);
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.mgmt-detail-img-zoom-wrap img {
    width: 100%;
    height: auto;
    object-fit: contain;
    display: block;
    pointer-events: none;
}

/* Zoom Lens */
.mgmt-zoom-lens {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    width: 120px;
    height: 120px;
    border: 2px solid var(--mgmt-accent, #6a4914);
    background-color: rgba(255,255,255,0.3);
    pointer-events: none;
    z-index: 5;
}

/* Zoom Result (zoomed view) */
.mgmt-zoom-result {
    display: none;
    position: absolute;
    top: 0;
    width: 600px;
    height: 800px;
    border: 1px solid #ddd;
    background-repeat: no-repeat;
    background-size: 200%;
    background-color: #fff;
    z-index: 10;
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}


.productPriceAppend .regularPrice {
    font-size: 14px;
    font-weight: normal;
    color: #a1a1a1;
}

@media (max-width: 1199.98px) {
    .mgmt-zoom-result {
        width: 300px;
        height: 300px;
    }
}

@media (max-width: 767.98px) {
    .mgmt-zoom-result {
        display: none !important;
    }
    .mgmt-zoom-lens {
        display: none !important;
    }
}

.mgmt-thumbnails-wrap {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    overflow-x: auto;
    padding-bottom: 5px;
    scrollbar-width: thin;
    scrollbar-color: var(--mgmt-accent) #f0f0f0;
}

.mgmt-thumbnails-wrap::-webkit-scrollbar {
    height: 4px;
}

.mgmt-thumbnails-wrap::-webkit-scrollbar-track {
    background: #f0f0f0;
}

.mgmt-thumbnails-wrap::-webkit-scrollbar-thumb {
    background-color: var(--mgmt-accent);
    border-radius: 2px;
}

.mgmt-thumbnail-item {
       width: 120px;
    height: 110px;
    flex-shrink: 0;
    border: 1px solid #00000024;
    cursor: pointer;
    transition: all 0.25s ease;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

.mgmt-thumbnail-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.mgmt-thumbnail-item:hover,
.mgmt-thumbnail-item.active {
    border-color: var(--mgmt-accent, #6a4914);
}







.color-picker {
    font-family: Arial, sans-serif;
        margin-bottom: 10px;
}

.colors {
    display: flex;
    gap: 12px;
    margin-top: 10px;
}

.color {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid #ddd;
    transition: all 0.3s ease;
}

.color.active {
    box-shadow: 0 0 0 3px #d6c08d;
}

.orange {
    background: #f68b00;
}

.black {
    background: #000;
}

.gray {
    background: #9b9b9b;
}

.red {
    background: #ff1f1f;
}

.buyNow.buyNowSinBtn.btn {
    padding: 5px 2px;
}


.color-picker h4 {
    font-size: 20px;
    margin: 0;
    color: #000;
}

.color-picker h4 span {
    font-size: 20px;
    color: #000;
}



ul.colorList{
    display:inline-block;
    margin-top:0;
    margin-bottom:0;
    padding:0;
    min-height: 45px;
}

ul.colorList li{
    background-color: unset;
    color:unset;
    float: left;
    padding:0;
    padding-right: 10px;
}

.attributeItem .colorItem {
    height: 25px;
    width: 25px;
    border-radius: 100%;
    cursor:pointer;
    margin-bottom: 5px;
    
}

.attributeItem .colorItem.active {
    box-shadow: 0px 1px 8px 2px #444;
    transition: 0.4s;
    border: 2px solid #dbcccc;
}

.attributeItem .textItem {
    /*height: 25px;*/
    min-width: 25px;
    border-radius: 5px;
    background: #f1f1f1;
    text-align: center;
    padding: 8px 20px;
    text-transform: uppercase;
    cursor: pointer;
    border: 1px solid #e9dce2;
    margin-bottom: 5px;
    line-height: 18px;
}

.attributeItem .textItem.active {
    border-color: #0a0a0a;
    background: black;
    color: white;
}

.attributeItem .imageItem {
    margin-bottom: 5px;
}

.attributeItem .imageItem img {
    width: 25px;
    height: 25px;
    border-radius: 5px;
    border: 1px solid #dfdede;
    padding: 1px;
}

.attributeItem .imageItem.active img {
    border-color: #0ba350;
}

.attributeValue {
    width: 1px;
    position: absolute;
    z-index: -9;
}





.colorList .colorItem {
  position: relative;
}

.colorList .colorItem::after {
  content: attr(data-vari); /* Use the data-name attribute as tooltip text */
  position: absolute;
  top: -30px; /* Position above the label */
  left: 50%;
  transform: translateX(-50%);
  background-color: black;
  color: white;
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 4px;
  white-space: nowrap;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease-in-out;
}

.colorList .colorItem:hover::after {
  opacity: 1;
  visibility: visible;
}









@media (max-width: 991.98px) {
    .mgmt-thumbnails-wrap {
        justify-content: center;
    }
}

/* =============================================
   RESPONSIVE
   ============================================= */
@media (max-width: 991.98px) {
    .mgmt-detail-section {
        padding: 30px 0 40px;
    }
    .mgmt-detail-img-wrap {
        padding-right: 0;
        margin-bottom: 24px;
    }
    .mgmt-detail-title {
        font-size: 24px;
    }
    .mgmt-related-card-img {
        height: 240px;
    }
}

@media (max-width: 767.98px) {
    .mgmt-detail-section {
        padding: 20px 0 30px;
    }
    .mgmt-detail-title {
        font-size: 22px;
    }
    .mgmt-detail-price {
        font-size: 20px;
    }
    .mgmt-detail-btn-buy {
        max-width: 100%;
    }
    .mgmt-detail-cart-row {
        flex-direction: column;
        align-items: stretch;
    }
    .mgmt-detail-qty-control {
        justify-content: center;
    }
    .mgmt-detail-btn-cart {
        width: 100%;
    }
    .mgmt-related-card-img {
        height: 200px;
    }
}

@media (max-width: 480px) {
    .mgmt-detail-title {
        font-size: 20px;
    }
    .mgmt-detail-price {
        font-size: 18px;
    }
    .mgmt-related-card-img {
        height: 160px;
    }
}






/* Custom styling matching the screenshot elements */
.mgmt-detail-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #222;
}

.custom-feature-badges .badge {
    font-size: 0.85rem;
    color: #4f5d73 !important;
    background-color: #f8f9fa !important;
    border-color: #e4e7eb !important;
}

.custom-offer-banner {
    border: 1px solid #d4edda !important;
}

.mgmt-detail-qty-control input::-webkit-outer-spin-button,
.mgmt-detail-qty-control input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.mgmt-detail-qty-control input[type=number] {
    -moz-appearance: textfield;
}







.feature-box {
  background-color: #f0478412;
  border: 1px solid #fef2f6;
  border-radius: 4px;
  padding: 16px 20px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  row-gap: 16px;
  column-gap: 24px;
}

.feature-item {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 15px;
  font-weight: 600;
  color: #666666;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.feature-icon {
  color: #f04784;
  font-size: 18px;
}


.offerPrice {
    font-size: 30px;
    font-weight: bold;
    color: #f04784;
    margin-right: 20px;
}

.regularPrice {
    font-size: 26px;
}




.btn-add-cart {
    background: #fff;
    border: 1.5px solid var(--pink);
    color: var(--pink);
}
.btn-buy-now {
    background: var(--pink);
    border: 1.5px solid var(--pink);
    color: #fff;
}



/* ========================================================= PRODUCT TABS SECTION ========================================================= */
.mgmt-product-tabs-section {
    width: 100%;
    padding: 30px 0 50px;
    background: #fff;
    
} /* ========================================================= TAB NAVIGATION ========================================================= */
.mgmt-product-tabs-nav {
    width: 100%;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 25px;
    overflow-x: auto;
    scrollbar-width: none;
}
.mgmt-product-tabs-nav::-webkit-scrollbar {
    display: none;
}
.mgmt-product-tab-btn {
    position: relative;
    flex: 1 0 auto;
    min-width: 150px;
    padding: 14px 20px;
    border: 0;
    outline: 0;
    background: transparent;
    color: #777;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.25s ease;
} /* Active Line */
.mgmt-product-tab-btn::after {
    content: "";
    position: absolute;
    left: 20%;
    right: 20%;
    bottom: -1px;
    height: 2px;
    background: transparent;
    border-radius: 10px;
    transition: all 0.25s ease;
}
.mgmt-product-tab-btn:hover {
    color: #222;
}
.mgmt-product-tab-btn.active {
    color: #f04784;
}
.mgmt-product-tab-btn.active::after {
    background: #f04784;
} /* ========================================================= TAB CONTENT ========================================================= */
.mgmt-product-tab-content {
    display: none;
    width: 100%;
    animation: mgmtTabFade 0.3s ease;
}
.mgmt-product-tab-content.active {
    display: block;
}
@keyframes mgmtTabFade {
    from {
        opacity: 0;
        transform: translateY(8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
} /* ========================================================= DESCRIPTION ========================================================= */
.mgmt-description-content {
    color: #555;
    font-size: 14px;
    line-height: 1.8;
}
.mgmt-description-content p {
    margin-bottom: 14px;
}
.mgmt-description-content h1,
.mgmt-description-content h2,
.mgmt-description-content h3,
.mgmt-description-content h4,
.mgmt-description-content h5,
.mgmt-description-content h6 {
    color: #222;
    margin-top: 20px;
    margin-bottom: 10px;
    font-weight: 600;
}
.mgmt-description-content ul,
.mgmt-description-content ol {
    padding-left: 20px;
}
.mgmt-description-content li {
    margin-bottom: 6px;
}
.mgmt-description-content img {
    max-width: 100%;
    height: auto;
} /* ========================================================= SPECIFICATION TABLE ========================================================= */
.specification-table {
    width: 100%;
    margin: 0;
    border: 1px solid #e8e8e8;
}
.specification-table th,
.specification-table td {
    padding: 13px 15px;
    font-size: 13px;
    vertical-align: middle;
    border-color: #e8e8e8;
}
.specification-table th {
    width: 35%;
    color: #333;
    font-weight: 600;
}
.specification-table td {
    color: #666;
}
.mgmt-no-specification {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 25px;
    border: 1px solid #eeeeee;
    border-radius: 7px;
    color: #777;
    font-size: 14px;
}
.mgmt-no-specification i {
    color: #999;
} /* ========================================================= REVIEW SECTION ========================================================= */
.mgmt-review-wrapper {
    width: 100%;
} /* ========================================================= REVIEW SUMMARY ========================================================= */
.mgmt-review-summary {
    display: flex;
    align-items: center;
    gap: 30px;
    padding: 22px;
    margin-bottom: 25px;
    background: #fafafa;
    border: 1px solid #eeeeee;
    border-radius: 8px;
} /* Average */
.mgmt-review-average {
    min-width: 140px;
    padding-right: 30px;
    text-align: center;
    border-right: 1px solid #e5e5e5;
}
.mgmt-review-average h2 {
    margin: 0 0 5px;
    color: #222;
    font-size: 34px;
    font-weight: 700;
    line-height: 1;
}
.mgmt-review-stars {
    display: flex;
    justify-content: center;
    gap: 3px;
    margin-bottom: 6px;
}
.mgmt-review-stars i {
    color: #f5b301;
    font-size: 14px;
}
.mgmt-review-average span {
    display: block;
    color: #777;
    font-size: 12px;
} /* Summary Text */
.mgmt-review-summary-text h4 {
    margin: 0 0 6px;
    color: #222;
    font-size: 18px;
    font-weight: 600;
}
.mgmt-review-summary-text p {
    margin: 0;
    max-width: 550px;
    color: #777;
    font-size: 13px;
    line-height: 1.6;
} /* ========================================================= REVIEW FORM ========================================================= */
.mgmt-review-form-wrapper {
    width: 100%;
    padding: 24px;
    background: #fff;
    border: 1px solid #eeeeee;
    border-radius: 8px;
}
.mgmt-review-form-title {
    margin-bottom: 22px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eeeeee;
}
.mgmt-review-form-title h4 {
    margin: 0 0 5px;
    color: #222;
    font-size: 19px;
    font-weight: 600;
}
.mgmt-review-form-title p {
    margin: 0;
    color: #888;
    font-size: 12px;
    line-height: 1.6;
} /* ========================================================= FORM GROUP ========================================================= */
.mgmt-form-group {
    margin-bottom: 18px;
}
.mgmt-form-group label {
    display: block;
    margin-bottom: 7px;
    color: #333;
    font-size: 13px;
    font-weight: 600;
}
.mgmt-form-group label span {
    color: #e53935;
} /* Input */
.mgmt-form-group .form-control {
    width: 100%;
    min-height: 44px;
    padding: 10px 13px;
    color: #333;
    background: #fff;
    border: 1px solid #dddddd;
    border-radius: 6px;
    outline: none;
    box-shadow: none;
    font-size: 13px;
    transition: all 0.2s ease;
}
.mgmt-form-group .form-control::placeholder {
    color: #aaa;
}
.mgmt-form-group .form-control:focus {
    color: #222;
    background: #fff;
    border-color: #222;
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.04);
} /* Textarea */
.mgmt-form-group textarea.form-control {
    min-height: 130px;
    resize: vertical;
    line-height: 1.6;
} /* ========================================================= STAR RATING ========================================================= */
.mgmt-rating-group {
    margin-top: 3px;
}
.mgmt-rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    width: max-content;
    gap: 4px;
}
.mgmt-rating-input input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
.mgmt-rating-input label {
    margin: 0;
    color: #cccccc;
    font-size: 26px;
    line-height: 1;
    cursor: pointer;
    transition: color 0.2s ease;
}
.mgmt-rating-input label:hover,
.mgmt-rating-input label:hover ~ label,
.mgmt-rating-input input:checked ~ label {
    color: #f5b301;
} /* ========================================================= SUBMIT BUTTON ========================================================= */
.mgmt-review-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 10px 23px;
    color: #fff;
    background: #222;
    border: 0;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s ease;
}
.mgmt-review-submit:hover {
    color: #fff;
    background: #000;
    transform: translateY(-1px);
}
.mgmt-review-submit i {
    font-size: 13px;
} /* ========================================================= MOBILE DESIGN ========================================================= */
@media (max-width: 575px) {
    .mgmt-product-tabs-section {
        padding: 20px 0 35px;
    } /* Tabs */
    .mgmt-product-tabs-nav {
        margin-bottom: 18px;
    }
    .mgmt-product-tab-btn {
        min-width: 33.333%;
        padding: 13px 7px;
        font-size: 12px;
    }
    .mgmt-product-tab-btn::after {
        left: 12%;
        right: 12%;
    } /* Description */
    .mgmt-description-content {
        font-size: 13px;
        line-height: 1.7;
    } /* Specification */
    .specification-table th,
    .specification-table td {
        padding: 10px;
        font-size: 12px;
    }
    .specification-table th {
        width: 40%;
    } /* Review Summary */
    .mgmt-review-summary {
        flex-direction: column;
        gap: 15px;
        padding: 18px 14px;
        text-align: center;
    }
    .mgmt-review-average {
        width: 100%;
        min-width: 0;
        padding: 0 0 15px;
        border-right: 0;
        border-bottom: 1px solid #e5e5e5;
    }
    .mgmt-review-summary-text {
        width: 100%;
    }
    .mgmt-review-summary-text h4 {
        font-size: 16px;
    }
    .mgmt-review-summary-text p {
        font-size: 12px;
    } /* Form */
    .mgmt-review-form-wrapper {
        padding: 18px 14px;
    }
    .mgmt-review-form-title {
        margin-bottom: 18px;
    }
    .mgmt-review-form-title h4 {
        font-size: 17px;
    }
    .mgmt-review-form-title p {
        font-size: 11px;
    }
    .mgmt-form-group {
        margin-bottom: 15px;
    }
    .mgmt-form-group label {
        font-size: 12px;
    }
    .mgmt-form-group .form-control {
        min-height: 42px;
        padding: 9px 11px;
        font-size: 12px;
    }
    .mgmt-form-group textarea.form-control {
        min-height: 110px;
    } /* Rating */
    .mgmt-rating-input label {
        font-size: 23px;
    } /* Button */
    .mgmt-review-submit {
        width: 100%;
        min-height: 43px;
        font-size: 12px;
    }
}













</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "<?php echo e(route('index')); ?>"
    }
    <?php $__currentLoopData = $product->productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ctg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>,
    {
      "@type": "ListItem",
      "position": <?php echo e($index + 2); ?>,
      "name": "<?php echo e($ctg->name); ?>",
      "item": "<?php echo e(route('productCategory', $ctg->slug ?: 'no-title')); ?>"
    }
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>,
    {
      "@type": "ListItem",
      "position": <?php echo e($product->productCategories->count() + 2); ?>,
      "name": "<?php echo e($product->name); ?>",
      "item": "<?php echo e(url()->current()); ?>"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo e($product->name); ?>",
  "image": "<?php echo e(asset($product->image())); ?>",
  "description": <?php echo json_encode(strip_tags($product->seo_contents ?: $product->description), 15, 512) ?>,
  "brand": {
    "@type": "Brand",
    "name": "<?php echo e($product->brand->name ?? 'Unknown'); ?>"
  },
  "offers": {
    "@type": "Offer",
    "url": "<?php echo e(url()->current()); ?>",
    "priceCurrency": "BDT",
    "price": "<?php echo e($product->offerPrice()); ?>",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  }
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('contents'); ?>

<main class="mgmt-detail-section" id="mgmtDetailSection">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-start">

            <div class="col-12 col-lg-6">
                <div class="mgmt-detail-img-wrap largeImage">
                    <div class="mgmt-detail-img-zoom-wrap">
                        <img src="<?php echo e(asset($product->image())); ?>" alt="<?php echo e($product->name); ?>" class="mgmt-detail-img" id="mgmtMainImage">
                        <div class="mgmt-zoom-lens"></div>
                        <div class="mgmt-zoom-result"></div>
                    </div>

                    <div class="mgmt-thumbnails-wrap">
                        <div class="mgmt-thumbnail-item active" data-src="<?php echo e(asset($product->image())); ?>">
                            <img src="<?php echo e(asset($product->image())); ?>" alt="<?php echo e($product->name); ?>">
                        </div>
                        <?php if(isset($product->galleryFiles) && $product->galleryFiles->count() > 0): ?>
                            <?php $__currentLoopData = $product->galleryFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mgmt-thumbnail-item" data-src="<?php echo e(asset($gallery->image())); ?>">
                                    <img src="<?php echo e(asset($gallery->image())); ?>" alt="Gallery Image">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="mgmt-detail-info">

    <!-- 1. Title -->
    <h1 class="mgmt-detail-title"><?php echo e($product->name); ?></h1>

    <!-- 2. Price -->
    <div class="productPrice my-2">
        <p class="mgmt-detail-price fs-3 fw-bold text-danger">
            <?php if($product->productAttibutesVariationGroup()->count() > 0 && $selectVariation): ?>
            <div class="productPriceAppend">
                <?php if($selectVariation->stockStatus()): ?>
                    <span class="offerPrice" data-price="<?php echo e($selectVariation->offerPrice()); ?>"><?php echo e(priceFullFormat($selectVariation->offerPrice())); ?></span>
                    <?php if($selectVariation->reguler_price > $selectVariation->offerPrice()): ?>
                    <del class="regularPrice" data-price="<?php echo e($selectVariation->reguler_price); ?>"> <?php echo e(priceFullFormat($selectVariation->reguler_price)); ?></del>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="offerPrice" data-price="<?php echo e($selectVariation->preorder_price); ?>"><?php echo e(priceFullFormat($selectVariation->preorder_price)); ?></span>
                    <?php if($selectVariation->reguler_price > $selectVariation->preorder_price): ?>
                    <del class="regularPrice" data-price="<?php echo e($selectVariation->reguler_price); ?>"><?php echo e(priceFullFormat($selectVariation->reguler_price)); ?></del>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div>
            <?php if($product->stockStatus()): ?>
                <span class="offerPrice" data-price="<?php echo e($product->offerPrice()); ?>"><?php echo e(priceFullFormat($product->offerPrice())); ?></span>
                <?php if($product->regular_price > $product->offerPrice()): ?>
                <del class="regularPrice" data-price="<?php echo e($product->regular_price); ?>"><?php echo e(priceFullFormat($product->regular_price)); ?></del>
                <?php endif; ?>
            <?php else: ?>
                <span class="offerPrice" data-price="<?php echo e($product->purchase_price); ?>"><?php echo e(priceFullFormat($product->purchase_price)); ?></span>
                <?php if($product->regular_price > $product->purchase_price): ?>
                <del class="regularPrice" data-price="<?php echo e($product->regular_price); ?>"><?php echo e(priceFullFormat($product->regular_price)); ?></del>
                <?php endif; ?>
            <?php endif; ?>
            </div>
            <?php endif; ?>
        </p>
    </div>

    <!-- 2b. Stock Status -->
    <?php
        $inStock = $product->stockStatus() && (!($product->productAttibutesVariationGroup()->count() > 0 && $selectVariation) || $selectVariation->stockStatus());
    ?>
    <?php if (! ($inStock)): ?>
    <div class="mgmt-detail-stock-badge"><i class="fas fa-times-circle"></i> Out of Stock</div>
    <?php endif; ?>

    <!-- 3. Form (Qty, Add to Cart, Buy Now) -->
    <form class="addToCartForm" action="<?php echo e(route('addToCart',$product->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php if($product->productAttibutesVariationGroup()->count() > 0): ?>
            <div class="smalOtherBox my-3">
                <?php echo $__env->make(welcomeTheme().'products.includes.productVariation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <div class="mgmt-detail-cart-row d-flex align-items-center gap-2 mb-3">
            <!-- Quantity Control -->
            <div class="mgmt-detail-qty-control quantityValue d-flex align-items-center border rounded">
                <button type="button" class="mgmt-detail-qty-btn decrement-quantity btn btn-light border-0 px-3 py-2" data-direction="-1" aria-label="Decrease quantity">
                    <i class="fas fa-minus"></i>
                </button>
                <input type="number" name="quantity" class="mgmt-detail-qty-input productQtyValue form-control text-center border-0 fw-bold" id="qty" value="1" min="1" data-max="<?php echo e($product->quantity); ?>" style="width: 50px;" readonly>
                <button type="button" class="mgmt-detail-qty-btn increment-quantity btn btn-light border-0 px-3 py-2" data-direction="1" aria-label="Increase quantity">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <!-- Add to Cart -->
            <button type="button" class="mgmt-detail-btn-cart addToCart addToSinBtn btn btn-dark px-4 py-2 d-flex align-items-center gap-2" data-product-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('addToCart',$product->id)); ?>">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
            
            <!--<button -->
            <!--        type="button"-->
            <!--        class="btn btn-add-cart addCart ajaxaddToCart" -->
            <!--        data-id="<?php echo e($product->id); ?>" -->
            <!--        data-url="<?php echo e(route('addToCart', $product->id)); ?>"-->
            <!--    >-->
            <!--        <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart-->
            <!--    </button>-->

            <!-- Buy Now -->
            <button type="submit" name="orderNow" value="order" class="mgmt-detail-btn-buy buyNow buyNowSinBtn btn text-white px-4 py-2 d-flex align-items-center gap-2 m-0" data-product-id="<?php echo e($product->id); ?>" style="background-color: #e91e63;">
                <i class="fas fa-bolt"></i> Buy Now
            </button>
        </div>
    </form>

    <!-- 4. Description -->
    <div class="mgmt-detail-desc my-3 text-secondary lh-lg">
        <?php echo $product->short_description; ?>

    </div>

    <div class="feature-box">
  <div class="feature-item">
    <i class="fas fa-box feature-icon"></i>
    <span>We imported this</span>
  </div>
  
  <div class="feature-item">
    <i class="fas fa-certificate feature-icon"></i>
    <span>100% Authentic</span>
  </div>

  <div class="feature-item">
    <i class="fas fa-shopping-cart feature-icon"></i>
    <span>Free Delivery </span>
  </div>

  <div class="feature-item">
    <i class="fas fa-truck feature-icon"></i>
    <span>2-3 Days Delivery</span>
  </div>
</div>


    <!-- 7. Cash on Delivery Button -->
    <div class="custom-cod-btn-wrap my-3">
        <?php
        $banner1 =App\Models\PostExtra::latest()->where('type',4)->where('parent_id',null)->where('status','active')
                       ->where('data_type','Large Banner One')
                       ->first();
        $banner2 =App\Models\PostExtra::latest()->where('type',4)->where('parent_id',null)->where('status','active')
                       ->where('data_type','Large Banner Two')
                       ->first();
        ?>
        
        <?php if($banner1): ?>
            <a href="<?php echo e($banner1->image_link?:'javascript:void(0)'); ?>" style="display: block;box-shadow: 0px 2px 7px rgb(0 0 0 / 15%);border-radius: 5px;margin-bottom: 10px;" >
                <img src="<?php echo e(asset($banner1->image())); ?>" alt="<?php echo e($banner1->name); ?>" style="border-radius: 5px;" />
            </a>
        <?php endif; ?>
        
        <?php if($banner2): ?>
            <a href="<?php echo e($banner2->image_link?:'javascript:void(0)'); ?>" style="display: block;box-shadow: 0px 2px 7px rgb(0 0 0 / 15%);border-radius: 5px;margin-bottom: 10px;" >
                <img src="<?php echo e(asset($banner2->image())); ?>" alt="<?php echo e($banner2->name); ?>" style="border-radius: 5px;" />
            </a>
        <?php endif; ?>
        
        
    </div>

    <div class="succeMessage my-2"></div>

    <!-- 8. Product Meta -->
    <div class="mgmt-detail-meta-wrap text-muted small mt-4">
        <?php if($product->sku_code): ?>
            <p class="mgmt-detail-meta-line mb-1"><strong>SKU:</strong> <span><?php echo e($product->sku_code); ?></span></p>
        <?php endif; ?>

        <?php if($product->country): ?>
            <p class="mgmt-detail-meta-line mb-1"><strong>Country:</strong> <span><?php echo e($product->country->name); ?></span></p>
        <?php endif; ?>

        <p class="mgmt-detail-meta-line mb-1"><strong>Categories:</strong>
            <?php $__currentLoopData = $product->productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('productCategory', $ctg->slug ?: 'no-title')); ?>" class="mgmt-detail-meta-link text-decoration-none text-primary"><?php echo e($ctg->name); ?></a><?php echo e(!$loop->last ? ',' : ''); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
        
        <p class="mgmt-detail-meta-line mb-1"><strong>Available:</strong> <span><?php echo e($product->quantity); ?> Qty</span></p>
    </div>

    <!-- 9. Share Icons -->
    <div class="mgmt-detail-share-wrap d-flex align-items-center gap-2 mt-3">
        <span class="fw-bold text-dark me-1"><i class="fas fa-share-alt"></i> Share:</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('productView', $product->slug ?: 'no-title'))); ?>" class="btn btn-primary rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(route('productView', $product->slug ?: 'no-title'))); ?>&text=<?php echo e(urlencode($product->name)); ?>" class="btn btn-info text-white rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on X"><i class="fab fa-twitter"></i></a>
        <a href="javascript:void(0)" class="btn btn-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on Pinterest"><i class="fab fa-pinterest-p"></i></a>
        <a href="javascript:void(0)" class="btn btn-secondary rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://api.whatsapp.com/send?text=<?php echo e(urlencode($product->name . ' - ' . route('productView', $product->slug ?: 'no-title'))); ?>" class="btn btn-success rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="javascript:void(0)" class="btn btn-info text-white rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" aria-label="Share on Telegram"><i class="fab fa-telegram-plane"></i></a>
    </div>

    <!-- 10. Rating -->
    <div class="mgmt-detail-rating mt-3 text-warning">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star text-muted"></i>
    </div>

</div>
            </div>
        </div>
    </div>
</main>


<section class="mgmt-product-tabs-section" id="mgmtProductTabs">
    <div class="container">
        <!-- ========================================= TAB NAVIGATION ========================================== -->
        <div class="mgmt-product-tabs-nav">
            <button type="button" class="mgmt-product-tab-btn active" data-tab="description">Description</button>
            <button type="button" class="mgmt-product-tab-btn" data-tab="specification">Specification</button>
            <button type="button" class="mgmt-product-tab-btn" data-tab="reviews">Reviews</button>
        </div>
        <!-- ========================================= DESCRIPTION TAB ========================================== -->
        <div class="mgmt-product-tab-content active" id="mgmtTabDescription">
            <div class="mgmt-description-content paragraphs"><?php echo $product->description; ?></div>
        </div>
        <!-- ========================================= SPECIFICATION TAB ========================================== -->
        <div class="mgmt-product-tab-content" id="mgmtTabSpecification">
            <?php if($product->extraAttribute->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped specification-table">
                    <tbody>
                        <?php $__currentLoopData = $product->extraAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraAttri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo $extraAttri->name; ?></th>
                            <td><?php echo $extraAttri->content; ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="mgmt-no-specification">
                <i class="fas fa-info-circle"></i> <span>No Specification Available</span>
            </div>
            <?php endif; ?>
        </div>
        <!-- ========================================= REVIEWS TAB ========================================== -->
        <div class="mgmt-product-tab-content" id="mgmtTabReviews">
            <div class="mgmt-review-wrapper">
                <div class="ReviewList">
                    <?php echo $__env->make(welcomeTheme() . '.products.includes.realatedReview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- REVIEW FORM -->
                <div class="mgmt-review-form-wrapper">
                    <div class="mgmt-review-form-title">
                        <h4>Write a Review</h4>
                        <p>Your email address will not be published. Required fields are marked *</p>
                    </div>
            
                    <form action="<?php echo e(route('productReview', $product->slug ?: Str::slug($product->name))); ?>" method="POST" id="productReviewForm" class="mgmt-review-form">
                        <?php echo csrf_field(); ?>
                        
                        <!-- NAME + EMAIL -->
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mgmt-form-group">
                                    <label for="reviewName"> Your Name <span>*</span> </label>
                                    <input type="text" id="reviewName" name="name" class="form-control" placeholder="Enter your name" />
                                    <span class="text-danger error-text name_error small"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mgmt-form-group">
                                    <label for="reviewEmail"> Email Address <span>*</span> </label>
                                    <input type="email" id="reviewEmail" name="email" class="form-control" placeholder="Enter your email" />
                                    <span class="text-danger error-text email_error small"></span>
                                </div>
                            </div>
                        </div>
            
                        <!-- RATING -->
                        <div class="mgmt-form-group mgmt-rating-group">
                            <label> Your Rating <span>*</span> </label>
                            <div class="mgmt-rating-input">
                                <input type="radio" name="rating" id="rating5" value="5" />
                                <label for="rating5" title="5 Stars"> <i class="far fa-star"></i> </label>
                                <input type="radio" name="rating" id="rating4" value="4" />
                                <label for="rating4" title="4 Stars"> <i class="far fa-star"></i> </label>
                                <input type="radio" name="rating" id="rating3" value="3" />
                                <label for="rating3" title="3 Stars"> <i class="far fa-star"></i> </label>
                                <input type="radio" name="rating" id="rating2" value="2" />
                                <label for="rating2" title="2 Stars"> <i class="far fa-star"></i> </label>
                                <input type="radio" name="rating" id="rating1" value="1" />
                                <label for="rating1" title="1 Star"> <i class="far fa-star"></i> </label>
                            </div>
                            <div><span class="text-danger error-text rating_error small"></span></div>
                        </div>
            
                        <!-- REVIEW TEXT -->
                        <div class="mgmt-form-group">
                            <label for="reviewMessage"> Your Review <span>*</span> </label>
                            <textarea id="reviewMessage" name="review" rows="5" class="form-control" placeholder="Write your review here..."></textarea>
                            <span class="text-danger error-text review_error small"></span>
                        </div>
            
                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="mgmt-review-submit" id="submitReviewBtn">
                            <i class="far fa-paper-plane"></i> Submit Review
                        </button>
            
                        <!-- SUCCESS / GLOBAL MESSAGE -->
                        <div id="reviewAlertMsg" class="mt-3" style="display: none;"></div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
</section>


<?php if($relatedProducts->count() > 0): ?>
<section class="mgmt-related-section" id="mgmtRelatedProducts">
    <div class="container">
        <h2 class="mgmt-related-heading">Related Products</h2>
        <div class="row g-3 g-md-4">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <?php echo $__env->make(welcomeTheme().'products.includes.productCard', ['product' => $relatedProd], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>



<script>
$(document).ready(function () {
    
    $(document).on('submit', '#productReviewForm', function(e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let submitBtn = $('#submitReviewBtn');
        let alertMsg = $('#reviewAlertMsg');

        // Clear previous error messages
        $('.error-text').text('');
        alertMsg.hide().removeClass('alert alert-success alert-danger').html('');

        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            beforeSend: function() {
                submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
            },
            success: function(response) {
                submitBtn.prop('disabled', false).html('<i class="far fa-paper-plane"></i> Submit Review');

                if (response.status === 'success') {
                    // Show success alert below submit button
                    alertMsg.addClass('alert alert-success').html(response.message).fadeIn();

                    // Append new review item to list container
                    if (response.html) {
                        $('.ReviewList').empty.append(response.html);
                    }

                    // Reset Form
                    form[0].reset();
                }
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).html('<i class="far fa-paper-plane"></i> Submit Review');

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        $('.' + key + '_error').text(val[0]);
                    });
                } else {
                    alertMsg.addClass('alert alert-danger').html('Something went wrong. Please try again.').fadeIn();
                }
            }
        });
    });
    
    $(document).on('click', '#ReviewList .pagination a, #ReviewList ul.pager a', function(e) {
        e.preventDefault();

        let pageUrl = $(this).attr('href');
        if (!pageUrl || pageUrl === '#') return;

        $.ajax({
            url: pageUrl,
            type: 'GET',
            beforeSend: function() {
                // স্মুথ ফিলিংসের জন্য অপাসিটি কমানো
                $('#ReviewList').css('opacity', '0.5');
            },
            success: function(response) {
                $('#ReviewList').css('opacity', '1');
                if (response.html) {
                    $('#ReviewList').html(response.html);
                    
                    // রিভিউ সেকশনে স্মুথ স্ক্রল (Optional)
                    $('html, body').animate({
                        scrollTop: $("#ReviewList").offset().top - 100
                    }, 300);
                }
            },
            error: function() {
                $('#ReviewList').css('opacity', '1');
                alert('Could not load reviews. Please try again.');
            }
        });
    });
    

    $('.color').on('click', function () {

        $('.color').removeClass('active');

        $(this).addClass('active');

        let colorName = $(this).data('color');

        $('#selectedColor').text(colorName);
    });

});
</script>

<script>

window.dataLayer = window.dataLayer || [];

window.dataLayer.push({
    event: "page_view",

    page: {
        page_title: "<?php echo e($product->name); ?> - <?php echo e(general()->title); ?>",
        page_location: window.location.href,
        page_type: "product detail"
    }
    
});


// View Item Event
window.dataLayer.push({
    event: "view_item",

    ecommerce: {
        currency: "<?php echo e(general()->currency); ?>",
        value: <?php echo e($product->offerPrice()); ?>,

        items: [
            {
                item_id: "<?php echo e($product->id); ?>",
                item_name: "<?php echo e($product->name); ?>",
                affiliation: "<?php echo e(general()->title); ?>",
                discount: <?php echo e($product->discount ?? 0); ?>,
                index: 0,
                item_variant: "<?php echo e($product->variant ?? ''); ?>",
                price: <?php echo e($product->offerPrice()); ?>,
                quantity: 1,
                sku: "<?php echo e($product->sku ?? ''); ?>"
            }
        ]
    }
});
console.log('view item event');

function addToCart(product) {
    window.dataLayer = window.dataLayer || [];

    let qty = parseInt($('#quantity').val(), 10) || 1;

    window.dataLayer.push({
        event: "add_to_cart",

        ecommerce: {
            currency: "<?php echo e(general()->currency); ?>",
            value: Number(product.final_price),

            items: [
                {
                    item_id: product.id,
                    item_name: product.name,
                    affiliation: "<?php echo e(general()->title); ?>",
                    discount: product.discount || 0,
                    index: 0,
                    item_variant: product.variant || "",
                    price: Number(product.final_price),
                    quantity: qty,
                    sku: product.sku || ""
                }
            ]
        }
    });
    
    console.log('ad to card event')
}


</script>



<script>
    $(document).ready(function () {
        /* |-------------------------------------------------------------------------- | PRODUCT TABS |-------------------------------------------------------------------------- */ $(
            document
        ).on("click", ".mgmt-product-tab-btn", function () {
            var $button = $(this);
            var tab = $button.data("tab");
            /* |-------------------------------------------------------------------------- | Remove Active Tab |-------------------------------------------------------------------------- */ $(
                ".mgmt-product-tab-btn"
            ).removeClass("active");
            /* |-------------------------------------------------------------------------- | Add Active Tab |-------------------------------------------------------------------------- */ $button.addClass(
                "active"
            );
            /* |-------------------------------------------------------------------------- | Hide All Content |-------------------------------------------------------------------------- */ $(
                ".mgmt-product-tab-content"
            ).removeClass("active");
            /* |-------------------------------------------------------------------------- | Show Selected Content |-------------------------------------------------------------------------- */ if (
                tab === "description"
            ) {
                $("#mgmtTabDescription").addClass("active");
            } else if (tab === "specification") {
                $("#mgmtTabSpecification").addClass("active");
            } else if (tab === "reviews") {
                $("#mgmtTabReviews").addClass("active");
            }
        });
        /* |-------------------------------------------------------------------------- | STAR RATING |-------------------------------------------------------------------------- */ $(
            ".mgmt-rating-input input"
        ).on("change", function () {
            var rating = $(this).val();
            console.log("Selected Rating:", rating);
        });
    });
</script>




<script>
$(document).ready(function(){

    $(document).on('click', '.mgmt-thumbnail-item', function() {
        $('.mgmt-thumbnail-item').removeClass('active');
        $(this).addClass('active');
        var src = $(this).data('src');
        if (src) {
            $('#mgmtMainImage').attr('src', src);
        }
    });

    // Box lens zoom + scroll to change zoom level
    var zoomWrap = $('.mgmt-detail-img-zoom-wrap');
    var zoomLens = $('.mgmt-zoom-lens');
    var zoomResult = $('.mgmt-zoom-result');
    var zoomLevel = 2;
    var minZoom = 2;
    var maxZoom = 6;
    var zoomStep = 0.5;

    zoomWrap.on('mouseenter', function() {
        var src = $(this).find('img').attr('src');
        zoomLens.show();
        zoomResult.show();
        zoomResult.css('background-image', 'url(' + src + ')');
    });

    zoomWrap.on('mousemove', function(e) {
        var $this = $(this);
        var rect = this.getBoundingClientRect();

        var lensW = zoomLens.width() / 2;
        var lensH = zoomLens.height() / 2;

        var x = e.clientX - rect.left - lensW;
        var y = e.clientY - rect.top - lensH;

        x = Math.max(0, Math.min(x, rect.width - zoomLens.width()));
        y = Math.max(0, Math.min(y, rect.height - zoomLens.height()));

        zoomLens.css({ left: x + 'px', top: y + 'px' });

        var px = x / rect.width;
        var py = y / rect.height;

        zoomResult.css({
            backgroundPosition: (px * 100) + '% ' + (py * 100) + '%'
        });
    });

    zoomWrap.on('wheel', function(e) {
        e.preventDefault();
        var delta = e.deltaY || (e.originalEvent && e.originalEvent.deltaY) || 0;
        if (delta < 0) {
            zoomLevel = Math.min(maxZoom, zoomLevel + zoomStep);
        } else {
            zoomLevel = Math.max(minZoom, zoomLevel - zoomStep);
        }
        zoomResult.css('background-size', (zoomLevel * 100) + '%');
    });

    zoomWrap.on('mouseleave', function() {
        zoomLens.hide();
        zoomResult.hide();
    });

    $(".quantityValue .increment-quantity").click(function(){
        var input = $("#qty");
        var max = parseInt(input.attr("data-max")) || 20;
        var value = parseInt(input.val());
        if (value < max) { input.val(value + 1); }
    });

    $(".quantityValue .decrement-quantity").click(function(){
        var input = $("#qty");
        var min = parseInt(input.attr("min")) || 1;
        var value = parseInt(input.val());
        if (value > min) { input.val(value - 1); }
    });

    $(document).on("click", ".addToCart", function () {
    var url = $(this).data("url");
    var quantity = $("#qty").val();

    var option = [];

    $('.attributeValue:checked').each(function () {
        option.push($(this).data('vlueid'));
        // or .val() depending on your HTML
    });

    $.ajax({
        url: url,
        type: "GET",
        data: {
            quantity: quantity,
            option: option
        },
        success: function (data) {

            if (!data.success) {
                alert(data.message);
                return;
            }
            
            $(".cartCounter").empty().append(data.cartCount);
            $(".cartTotal").empty().append(data.cartTotal);
            $(".shopping-details").empty().append(data.cartViews);
            if ($('#offcanvasRight').length) {
                new bootstrap.Offcanvas($('#offcanvasRight')[0]).show();
            }
            // meta AddToCart event
            fbq('track', 'AddToCart');

            
            

            
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});


$(document).on('click', '.attributeItem li label', function () {

    let $label = $(this);
    let $input = $label.find('.attributeValue');

    // check radio
    $input.prop('checked', true);

    // remove active only in same group (same attribute)
    let groupName = $input.attr('name');

    $('.attributeItem li label').each(function () {
        if ($(this).find('.attributeValue').attr('name') === groupName) {
            $(this).removeClass('active');
        }
    });

    $label.addClass('active');

    // ├░┼╕тАЭ┬е GET SELECTED COLOR / NAME
    let selectedName = $label.data('vari'); // THIS IS IMPORTANT

    // show selected name
    $label.closest('.row')
        .find('.selected-value')
        .text(selectedName);

    // ├░┼╕тАЭ┬е CHANGE MAIN IMAGE IF EXISTS
    let image = $label.data('image');
    if (image) {
        $('.largeImage img, #mgmtMainImage').attr('src', image);
    }

    // ├░┼╕тАЭ┬е COLOR FIX (BACKGROUND BOX ALWAYS SHOW)
    if ($label.hasClass('colorItem')) {
        $label.css('background-color', $label.css('background-color'));
    }

});




  $('.attributeItem li label').click(function() {
           
            var dataName = $(this).data('name');
            $('.attributeItem li label[data-name="'+dataName+'"]').removeClass('active');
            
            $(this).addClass('active');
            
            var image = $(this).data('image');
            if (image) {
                //alert('Image URL: ' + image);
                $('.largeImage img').attr('src', image);
            }
            
            
            setTimeout(function() {
                var selectedIds = [];
                $('.attributeItem li .attributeValue:checked').each(function() {
                    selectedIds.push($(this).data('vlueid'));
                });
                
                var datas = <?php echo json_encode($datas, 15, 512) ?>;
                
                // var filteredProducts = filterProductsBySelectedAttributes(datas, selectedIds);
                
                var filteredProducts = datas.filter(function(product) {
                    return selectedIds.every(function(selectedId) {
                        return product.items.some(function(item) {
                            return item.attribute_item_id == selectedId;
                        });
                    });
                });
                
                if(filteredProducts.length > 0) {
                    var priceText = '';
                    var stutas =true;
                    var qtyVari =0;
                    filteredProducts.forEach(function(product) {
                        priceText += product.price;
                        stutas =product.stock_status?true:false;
                        qtyVari =product.quantity;
                    });
                    
                    if(stutas){
                        
                        $('.buyNowSinBtn, .addToSinBtn').prop('disabled', false);
                        $('.buyNowSinBtn').empty().append('Buy Now');
                        if($('.productQtyValue').val()==0){
                            $('.productQtyValue').val(1);
                            $('.productQtyValue').prop('disabled', false);
                        }
                        
                        $('.productQtyValue').attr('data-max',qtyVari);
                        $('.productPriceAppend').empty().append(priceText);
                        $('.productStock').empty().append('<b>Stock Available</b>');
                    
                    }else{
                        $('.buyNowSinBtn').empty().append('Pre Order');
                        $('.buyNowSinBtn').prop('disabled', false);
                        $('.addToSinBtn').prop('disabled', true);
                        $('.productQtyValue').val(1);
                        $('.productPriceAppend').empty().append(priceText);
                        $('.productQtyValue').prop('disabled', false);
                        $('.productStock').empty().append('<b style="color:red;">Stock Out</b>');
                    }
                    
                } else {
                    $('.buyNowSinBtn, .addToSinBtn').prop('disabled', true);
                    $('.buyNowSinBtn').empty().append('Buy Now');
                    $('.productQtyValue').val(0);
                    $('.productQtyValue').prop('disabled', true);
                    $('.productStock').empty().append('<b style="color:red;">Stock Out</b>');
                }
                
                $('.succeMessage').empty()
                console.log(filteredProducts);
                console.log(selectedIds);
                getPrice();
            }, 10);
            
        });



    $(document).on('click', '.mgmt-accordion-btn', function(){
        var item = $(this).closest('.mgmt-accordion-item');
        var body = item.find('.mgmt-accordion-body');
        var icon = $(this).find('.mgmt-accordion-icon');
        var isOpen = item.hasClass('mgmt-accordion-open');
        item.toggleClass('mgmt-accordion-open', !isOpen);
        body.attr('hidden', isOpen ? 'hidden' : null);
        icon.removeClass('fa-minus fa-plus').addClass(isOpen ? 'fa-plus' : 'fa-minus');
        $(this).attr('aria-expanded', !isOpen);
    });

});
</script>





<?php $__env->stopPush(); ?>

<?php echo $__env->make(welcomeTheme().'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/products/productView.blade.php ENDPATH**/ ?>