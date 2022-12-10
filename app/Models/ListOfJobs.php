<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOfJobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'company_id',
        // 'job_id',
        'company_name',
        'status',
        'salary',
        'tags',
        'location',
        'description',
        'email',
        'typeOfJob'
    ];
}
