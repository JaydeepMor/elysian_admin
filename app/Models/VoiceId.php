<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class VoiceId extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voice_id',
        'language_id',
        'accent_id',
        'delivery_style_id',
        'character_id',
        'impersonation_id'
    ];

    public function voice()
    {
        return $this->hasOne(Voice::class, 'id', 'voice_id');
    }
}
