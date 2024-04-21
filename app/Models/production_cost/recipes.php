<?php

namespace App\Models\production_cost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\inventory\products;
use App\Models\inventory\supplies;

class recipes extends Model
{
    use HasFactory;
    protected $primaryKey = 'pk_recipe';

    public function productsRecipes()
    {
        return $this->belongsTo(products::class, 'fk_product', 'pk_product');
    }

    public function supplysRecipes()
    {
        return $this->belongsTo(supplies::class, 'fk_supply', 'pk_supply');
    }
}