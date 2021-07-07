<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   // protected $fillable=['id_ord','plat_id','id_client','lng','lalt'];
    protected $primaryKey = 'id_ord';
    
  
}
