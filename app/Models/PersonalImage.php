<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalImage extends Model
{
    use HasFactory;
    protected $table = 'personal_images';
    protected $fillable = [
        'personal_statuses_id',
        'photo',
    ];

    public function getPhotoAttribute($val) {
        return ($val !== null) ? asset('dashboard/personal/' . $val) : "";
    }
}
