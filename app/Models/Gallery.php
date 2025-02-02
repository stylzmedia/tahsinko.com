<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'status', 'name', 'position', 'category_id'
    ];
    // Active
    public function scopeActive($q, $order = 'id', $take = null){
        $q->where('status', 1);
        $q->latest($order);
        if($take){
            $q->take($take);
        }
    }

    public function GalleryItems(){
        return $this->hasMany(GalleryItem::class)->orderBy('position');
    }

    public function getImgPathsAttribute(){
        $year_month = $this->year . '/' . $this->month;
        $file_name = $this->image;
        $output = array();

        if(isset($this->GalleryItems[0])){
            return $this->GalleryItems[0]->img_paths;
        }else{
            $output['small'] = asset('images/no-image.png');
            $output['medium'] = asset('images/no-image.png');
            $output['large'] = asset("uploads/gallery/$year_month/$file_name");
            $output['original'] = asset("uploads/gallery/$year_month/$file_name");
        }

        return $output;
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
