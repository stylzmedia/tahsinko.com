<?php

namespace App\Models;

use App\Repositories\MediaRepo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'position',
        'featured',
        'meta_title',
        'meta_description',
        'meta_tags',
        'feature_type',
        'feature_video',
        'image',
        'image_path',
        'video_type',
        'video',
        'video_embade_code',
        'media_id',
        'status',
        'publish_date'

    ];

    // Image Paths
    public function getImgPathsAttribute(){
        return MediaRepo::sizes($this->image_path, $this->image);
    }

    // Category
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
