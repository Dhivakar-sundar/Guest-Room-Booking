<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $fillable = [
    "admin_id",
    "address",
        "owner" ,
        "telephone" ,
        "facility",
        "floor" ,
       "bed",
        "rent",
        "min" ,
        "max" ,
        "status",
        "file"
    ];
}