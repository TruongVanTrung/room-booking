<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = [];
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
