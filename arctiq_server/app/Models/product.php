<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id', 'name', 'price', 'image'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
