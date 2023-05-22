<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Repositories\MediaRepo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'freature_image',
        'video',
        'position',
        'pdf_file',
        'status',
    ];

    public function Gallery(){
        return $this->belongsToMany(Media::class, 'product_media');
    }
    // Image Paths
    public function getImgPathsAttribute(){
        return MediaRepo::sizes($this->image_path, $this->freature_image);
    }

    public function ProductSpecifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function settings()
    {
        return $this->hasMany(Settings::class, 'group', 'id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'status' => 'integer',
    ];
}
