<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireDeveloperRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'company',
        'email',
        'phone',
        'developer_type',
        'developer_slug',
        'engagement_type',
        'team_size',
        'budget',
        'description',
        'ip_address',
        'user_agent',
    ];
}
