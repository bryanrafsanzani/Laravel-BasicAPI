<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    
    protected $table = "voucher";
    public $timestamps = false;
    protected $primaryKey = "uuid";


    protected $fillable = [
        'uuid', 
        'nama',
        'expired', 
        ];  
}
