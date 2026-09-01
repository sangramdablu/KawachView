<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_login_at',
        'is_team_member',
        'designation',
        'team_role',
        'responsibilities',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_team_member'    => 'boolean',
        ];
    }

    /**
     * Absolute URL to the author's uploaded avatar, or null when none is
     * set. Avatars are uploaded (in KawachAdmin) via
     * ImageUploadService::uploadToPublic() into KawachAdmin's own
     * public/avatars folder — a relative path like "avatars/xxx.jpg" is
     * stored in the shared `kawach_admin` DB. This app (the public site)
     * is a *separate* Laravel install with its own public/ folder, so we
     * cannot resolve that path with this app's own asset() helper (that
     * would point at a file that doesn't exist here). Instead we prefix
     * it with config('app.images_path') — the same convention already
     * used for $post->featured_image throughout blog/news templates,
     * which points at KawachAdmin's public folder.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        return $this->avatar ? config('app.images_path') . $this->avatar : null;
    }

    /**
     * Same generated-initials + deterministic-colour scheme used in
     * KawachAdmin (RoleAccessController::formatUser()/TeamController) —
     * kept here as the single place the public site computes it, so
     * blog/news byline templates don't each invent their own version.
     */
    private const AVATAR_COLORS = ['#6c2bd9', '#1a73e8', '#00c896', '#e91e8c', '#ff6d00', '#00bcd4', '#673ab7', '#f44336', '#4caf50', '#ff9800'];

    public function getInitialsAttribute(): string
    {
        $parts = explode(' ', trim($this->name ?? ''));
        return strtoupper(substr($parts[0] ?? '', 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
    }

    public function getAvatarColorAttribute(): string
    {
        return self::AVATAR_COLORS[$this->id % count(self::AVATAR_COLORS)];
    }
}
