<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_title',
        'work_tech',
        'work_desc',
        'work_link',
        'work_category',
        'work_img',
    ];
}
