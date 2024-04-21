<?php

namespace App\Models\production_cost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    use HasFactory;
    protected $primaryKey = 'pk_spent';
}