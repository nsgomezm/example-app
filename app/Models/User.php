<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserPersonalInformation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];


    protected $appends = [
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    protected function avatar(): Attribute
    {

        $name = $this->personalInformation?->name ?? $this->email;

        return new Attribute(
            get: fn () => "https://ui-avatars.com/api/?name=$name"
        );
    }

    public function getAvatarAttributes(){
        return "test";
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'date:d-M-Y',
            'updated_at' => 'date:d-M-Y'
        ];
    }

    public function personalInformation(){
        return $this->hasOne(UserPersonalInformation::class);
    }


}

