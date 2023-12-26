<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'project_title',
    ];

    protected $hidden = [
        'project',
        'id',
        'title',
        'project_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [

    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function apartments()
    {
       return $this->hasMany(Apartment::class)->orderBy("created_at");
    }

     public function getProjectTitleAttribute(): String 
    {
        $projectTitle = $this->project->title;

        return $projectTitle;
    }
}
