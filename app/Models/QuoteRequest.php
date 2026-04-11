<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'company',
        'email',
        'phone',
        'services',
        'budget',
        'description',
        'ip_address',
        'user_agent',
    ];
}