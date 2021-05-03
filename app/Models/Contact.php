<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function email()
    {
        return $this->hasMany(Email::class);
    }

    public function phone_number()
    {
        return $this->hasMany(Phone_number::class);
    }
}
