<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_number extends Model
{
    use HasFactory;

    protected $fillable = ['phone','contact_id'];

    public function  contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
