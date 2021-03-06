<?php

namespace App\Models;

use App\Scopes\SellerScope;

class Seller extends User
{
   public static function boot()
   {
      parent::boot();
      static::addGlobalScope(new SellerScope);
   }

   public function products()
   {
      return $this->hasMany(Product::class);
   }
}