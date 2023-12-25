<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Project extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    protected $appends = [];

    protected $hidden = [];

    protected $casts = [];

    public function apartments()
    {
        $this->hasMany(Apartment::class)->orderBy("created_at");
    }

    public function houses()
    {
        $this->hasMany(House::class)->orderBy("created_at");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getAvgPriceToApartments()
    {
        // return $avgPrice;
    }

}
