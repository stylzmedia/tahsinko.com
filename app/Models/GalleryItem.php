<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'title','gallery_id','description', 'image','video','video_embade_code','pdf_file','type', 'position'
    ];
    public function getImgPathsAttribute(){
        $year_month = $this->year . '/' . $this->month;
        $file_name = $this->image;
        $output = array();


        if(file_exists(public_path("uploads/gallery/$year_month/$file_name"))){
            $output['small'] = asset("uploads/gallery/$year_month/$file_name");
        }else{
            $output['small'] = asset('img/no-image.png');
        }

        if(file_exists(public_path("uploads/gallery/$year_month/$file_name"))){
            $output['medium'] = asset("uploads/gallery/$year_month/$file_name");
        }else{
            $output['medium'] = asset('img/no-image.png');
        }
        if(file_exists(public_path("uploads/gallery/$year_month/$file_name"))){
            $output['large'] = asset("uploads/gallery/$year_month/$file_name");
        }else{
            $output['large'] = asset('img/no-image.png');
        }
        if(file_exists(public_path("uploads/gallery/$year_month/$file_name"))){
            $output['original'] = asset("uploads/gallery/$year_month/$file_name");
        }else{
            $output['original'] = asset('img/no-image.png');
        }

        return $output;
    }
}
