<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'file',
        'created_at',
        'updated_at'
    ];

    public function capital(): HasOne {
        return $this->hasOne(Capital::class, 'id', 'capital_id');
    }

    public function attractions(): HasMany {
        return $this->hasMany(Attraction::class, 'city_id', 'id');
    }

    // public function attractions(): HasMany {
    //     return $this->hasMany(Attraction::class, 'id', 'attraction_id');
    // }

    public function people() :BelongsToMany {
        return $this->belongsToMany(Person::class, 'city_person', 'maincity_id', 'person_id');
    }
}
