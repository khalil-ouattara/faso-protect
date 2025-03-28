<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
            'complainant',
            'subject',
            'description',
            'status_id'
    ];

    public function status()
{
    return $this->belongsTo(Status::class);
}


}
