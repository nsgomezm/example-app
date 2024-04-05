<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_number',
        'name',
        'last_name',
        'date_born',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'date:d-M-Y',
            'updated_at' => 'date:d-M-Y'
        ];
    }

}
