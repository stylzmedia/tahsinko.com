<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name','email', 'subject', 'message', 'attachment', 'is_sent', 'try',
    ];
    protected $casts = [
        'id' => 'int',
        'is_sent' => 'int',
        'try' => 'int',
    ];
    public function getEmailsAttribute($data){
        return json_decode($data);
    }
}
