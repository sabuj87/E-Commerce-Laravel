<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Seller;
use App\Models\Category;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;


    public function images(){                            
    
        return $this->hasMany(ProductImage::class);
  
  
      }
      public function reviews(){                            
    
        return $this->hasMany(Review::class);
  
  
      }

    public function brand(){


        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function seller(){


      return $this->belongsTo(Seller::class,'seller_id');
  }
  public function category(){


    return $this->belongsTo(category::class,'category_id');
}
}
