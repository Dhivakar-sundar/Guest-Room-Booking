<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
      "start_date",
      "end_Date" ,
      "room_id",
      "user_id",
      "type" ,
      "adults" ,
      "children",
      "requirement",
      "books_status",
      "admin_id",
      "rent",
      "payment"
    ];

}
