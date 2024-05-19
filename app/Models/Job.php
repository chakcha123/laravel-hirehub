<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'timing',
        'description',
        'salary',
        'experience',
        'company_name',
        'company_location',
        'company_website',
    ];
}
