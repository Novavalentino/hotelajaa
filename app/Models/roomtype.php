<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomtype extends Model
{
    use HasFactory;
    protected $table = 'roomtype';
    protected $fillable = ['roomtype', 'availableroom', 'facility'];
}
