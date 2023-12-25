<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'area',
        'rooms',
        'layout_image',
        'price',
        'house_id',
    ];
    // protected $guarded = [];

    protected $appends = [
        'house_title',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'house_id'
        // 'house'
    ];

    // protected $casts = [

    // ];

    public function getHouseTitleAttribute(): String 
    {
        $houseTitle = $this->house->title;

        return $houseTitle;
    }


    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getAvgPriceToApartments()
    {
        $avgPrice = Apartment::avg('price')->where('project_id', );

        return $avgPrice;
    }
}
