<?php
// ── app/Models/ScheduledCall.php ──────────────────────────────────
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class ScheduledCall extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'preferred_date',
        'timezone',
        'time_slot',
        'call_topic',
        'wants_video',
        'video_platform',
        'notes',
        'ip_address',
        'user_agent',
    ];
 
    protected $casts = [
        'preferred_date' => 'date',
        'wants_video'    => 'boolean',
    ];
}