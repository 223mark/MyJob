<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobapplyData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'status',
        'email',
        'company_id',
        'job_id',
        'image',
        'phone_number',
        'address'
    ];
}
