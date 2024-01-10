<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admininstrator extends Model
{
    use HasFactory;
    protected $table="admininstrators";
    protected $guarded=['id'];
}
