<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = ["name", "description", "price", "quantity", "type_id", "image", "supplier_id"];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
