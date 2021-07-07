<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;
    public static $em='';
    public function getEntryDateAttribute($input)
{
    return Carbon::createFromFormat('Y-m-d', $input)
      ->format(config('app.date_format'));
}
public function setEntryDateAttribute($input)
{
    $this->attributes['entry_date'] = 
      Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
}
}
