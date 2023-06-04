<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckCountRoom extends Model
{
    use HasFactory;

    protected $table = 'checkroom';

    protected $guarded = [];
    public $timestamps = true;
}
