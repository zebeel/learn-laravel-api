<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyData extends Model
{
    use HasFactory;
    protected $table = 'my_data';
    protected $fillable = ['data'];
}
