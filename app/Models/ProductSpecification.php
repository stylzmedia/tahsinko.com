<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'name',
        'position',
        'status',
    ];

    public function ProductSpecificationValues()
    {
        return $this->hasMany(ProductSpecificationValue::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'status' => 'integer',
    ];
}
