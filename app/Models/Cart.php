<?php

namespace App\Models;

use App\Model\ProductSku;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = [
        'user_id', 
        'product_id', 
        'quantity', 
		'trans_date',
		'color',
		'size',
		'cookie',

    ];

    public function product()
    {
    	return $this->belongsTo(Post::class, 'product_id');
    }
    
    public function productColor()
    {
    	return $this->belongsTo(Attribute::class, 'color')->where('type',9);
    }
    
    public function productSize()
    {
    	return $this->belongsTo(Attribute::class, 'size')->where('type',9);
    }
    
    public function image(){
        if($this->product){
            
            if($this->product->productAttibutesVariationGroup()->count() > 0 and $this->sku_id)
            {
                $skuData = json_decode($this->sku_id, true);
                foreach($skuData as $title => $sku) {
                    if($title==68){
                        $hasImage =PostAttribute::where('src_id',$this->product_id)->where('reff_id',$title)->where('parent_id',$sku)->first();
                        if($hasImage){
                         return $hasImage->variationItemImage();   
                        }
                    }
                }
            }
            return $this->product->image();

        }else{
            return 'medies/noimage.jpg';
        }
    }
    
    public function itemAttributes(){
        $options = []; // Initialize as an empty array
        if ($this->product && $this->sku_id) {
            $skuData = json_decode($this->sku_id, true);
            foreach($skuData as $title => $sku) {
                $hasAttri = $this->product->productVariationAttributeList()->find($sku); // Find the attribute
                if ($hasAttri) {
                    $parent = $hasAttri->parent;
                    $options[$parent->name] = $hasAttri->name; // Use the parent name as key, and attribute name as value
                }
            }
        }
        return $options;
    }
    
    public function itemStock()
    {
        // 1. Jodi variation match kore, tobe variation stock return korbe
        $item = $this->itemData();
    
        if ($item) {
            return ($item->stock_status && $item->quantity > 0) ? $item->quantity : 0;
        }
    
        // 2. Variation na thakle, base product-er stock return korbe
        if ($this->product) {
            return $this->product->stockStatus() ? $this->product->quantity : 0;
        }
    
        return 0;
    }

public function itemprice()
{
    // 1. Matched variation product dynamic check
    $item = $this->itemData();

    if ($item) {
        $inStock = $item->stock_status && $item->quantity > 0;

        return $inStock ? $item->offerPrice() : $item->preorder_price;
    }

    // 2. Variation match na pele ba simple product hole Base Product Price
    if ($this->product) {
        return $this->product->stockStatus() 
            ? $this->product->offerPrice() 
            : $this->product->purchase_price;
    }

    return 0;
}
    
    public function itemData()
{
    if (!$this->product) {
        return null;
    }

    $selectedIds = json_decode($this->sku_id, true) ?? [];

    if (empty($selectedIds)) {
        return null;
    }

    $proDatas = $this->product->productVariationAttributeItems;

    if ($proDatas && count($proDatas) > 0) {
        foreach ($proDatas as $data) {
            // Variation item-er IDs array-te convert
            $itemIds = $data->attributeVatiationItems->pluck('attribute_item_id')->toArray();

            // Selected IDs-er sob missing ache kina check ($isMatch)
            $isMatch = empty(array_diff($selectedIds, $itemIds));

            if ($isMatch) {
                return $data; // Matching dynamic FULL ROW / MODEL object return korbe
            }
        }
    }

    return null;
}

public function regularPrice()
{
    $item = $this->itemData();

    if ($item) {
        return $item->reguler_price ?? 0;
    }

    return $this->product ? $this->product->regularPrice() : 0;
}

// Discount Percent calculate korar function
public function itemDiscount()
{
    $regularPrice = $this->regularPrice();
    $currentPrice = $this->itemprice();

    if ($regularPrice > $currentPrice && $regularPrice > 0) {
        return round((($regularPrice - $currentPrice) / $regularPrice) * 100);
    }

    return 0;
}

    public function subtotal()
    {
        return ($this->quantity * $this->itemprice())+($this->quantity*$this->warranty_charge);
    }
    
    public function InDhakaDeliveryCharge()
    {
        if($this->product){
         return   $this->quantity * $this->product->shipping_cost;
        }else{
         return   $this->quantity*0;
        }
    }
    public function OurOfDhakaDeliveryCharge()
    {
        if($this->product){
         return   $this->quantity * $this->product->shipping_cost2;
        }else{
         return   $this->quantity*0;
        }
        
        
    }
}
