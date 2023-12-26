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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [];

    public function apartments()
    {
        return $this->hasMany(Apartment::class)->orderBy("created_at");
    }

    public function houses()
    {
        return $this->hasMany(House::class)->orderBy("created_at");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getAvgPriceToApartments(Project $project)
    {
        $houses = House::where('project_id', $project->id)->get();
        
        foreach ($houses as $house) {
            $housesId[] = $house->id;
        }

        $apartmentsAvgPrice[] = Apartment::whereIn('house_id', $housesId)->avg('price');

        return $apartmentsAvgPrice;
    }

}
