<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageModel extends Model
{
    use HasFactory;
    protected $table    = 'products'; 
    protected $fillable =[
       'id','name','category'
    ];
    public $timestamps  = false;
}
