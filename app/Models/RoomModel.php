<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $guarded = [];
    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(CategoryModel::class, 'id', 'id_category');
    }
}
