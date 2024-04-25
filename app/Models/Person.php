<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        // Add other fillable attributes as needed
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_person', 'person_id', 'maincity_id');
    }
}