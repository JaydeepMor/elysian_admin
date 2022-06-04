<?php

namespace App\Models;

class Language extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    public function voices()
    {
        return $this->belongsToMany(Voice::class, VoiceId::class);
    }
}
