<?php

namespace App\Models;

use App\Repositories\MediaRepo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'section_name', 'col', 'row', 'section_name_is_show', 'title', 'section_design_type_id', 'position', 'no_of_slide_col', 'image', 'image_path','media_id', 'description', 'description2','feature_video', 'status', 'created_by', 'updated_by',
    ];
    protected $hidden=['deleted_at','created_at','updated_at'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function sectionName()
    {
        return $this->belongsTo(SectionName::class);
    }
    // Image Paths
    public function getImgPathsAttribute(){
        return MediaRepo::sizes($this->image_path, $this->image);
    }
}
