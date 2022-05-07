<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class VoiceAudio extends BaseModel
{
    use SoftDeletes;

    protected $table = "voice_audios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mp3_title',
        'mp3',
        'voice_id'
    ];

    public function validator(array $data)
    {
        $validator = Validator::make($data, [
            'mp3_title' => ['required', 'string'],
            'mp3'       => ['required', 'string'],
            'voice_id'  => ['required', 'integer', 'exists:' . (new Voice())->getTableName() . ',id']
        ]);

        return $validator;
    }

    public function voice()
    {
        return $this->hasOne(Voice::class, 'id', 'voice_id');
    }
}
