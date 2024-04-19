<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UserPersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_number',
        'name',
        'last_name',
        'date_born',
        'user_id',
        'photo'
    ];

    protected $appends = [
        'photo_url'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'date:d-M-Y',
            'updated_at' => 'date:d-M-Y'
        ];
    }

    public function photoUrl(): Attribute {
//        $photoUrl = URL::temporarySignedRoute(
//            'showPhoto', now()->addMinutes(2), ['personalInformation' => $this->id]
//        );

        return new Attribute(
          get: fn() => Storage::url($this->photo)
        );
    }

}
