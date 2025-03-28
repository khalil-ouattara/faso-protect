<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Website extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'user_id',
        'domain_name',
        'registrar',
        'creation_date',
        'expiration_date'
    ];
}
