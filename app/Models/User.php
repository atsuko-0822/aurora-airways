<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
    'password',
    'user_number',
    'full_name',
    'phone_number',
    'address',
    'passport_number',
    'emergency_contact_name',
    'emergency_contact_phone',
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
        ];
    }

    public function reservations()
{
    return $this->hasMany(Reservation::class);
}

protected $casts = [
    'is_active' => 'boolean',
];

protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $latestId = DB::table('users')->max('id') ?? 0;
        $nextNumber = str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
        $user->user_number = '0000-' . $nextNumber;
    });
}
}
