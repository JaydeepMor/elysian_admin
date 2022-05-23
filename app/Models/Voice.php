<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Voice extends BaseModel
{
    use SoftDeletes;

    const PAGINATE_RECORDS = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_name',
        'gender_id',
        'age_group_id',
        'race_id',
        'language_id',
        'accent_id',
        'delivery_style_id',
        'character_id',
        'impersonation_id',
        'home_studio_id'
    ];

    public function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string'],
            'user_name' => ['required', 'string'],
            'gender_id' => ['required', 'integer', 'exists:' . (new Gender())->getTableName() . ',id'],
            'age_group_id' => ['required', 'integer', 'exists:' . (new AgeGroup())->getTableName() . ',id'],
            'race_id' => ['required', 'integer', 'exists:' . (new Race())->getTableName() . ',id'],
            'language_id' => ['required', 'integer', 'exists:' . (new Language())->getTableName() . ',id'],
            'accent_id' => ['nullable', 'integer', 'exists:' . (new Accent())->getTableName() . ',id'],
            'delivery_style_id' => ['nullable', 'integer', 'exists:' . (new DeliveryStyle())->getTableName() . ',id'],
            'character_id' => ['nullable', 'integer', 'exists:' . (new Character())->getTableName() . ',id'],
            'impersonation_id' => ['nullable', 'integer', 'exists:' . (new Impersonation())->getTableName() . ',id'],
            'home_studio_id' => ['nullable', 'integer', 'exists:' . (new HomeStudio())->getTableName() . ',id'],
            'mp3_title.*' => ['required', 'string'],
            'mp3.*' => ['required', 'string'],
            'voice_id.*' => ['nullable', 'integer', 'exists:' . (new Voice())->getTableName() . ',id']
        ], [
            'user_name.required' => 'The profile field is required.',
            'gender_id.required' => 'The gender field is required.',
            'age_group_id.required' => 'The age group field is required.',
            'race_id.required' => 'The race field is required.',
            'language_id.required' => 'The language field is required.',
            // 'accent_id.required' => 'The accent field is required.',
            // 'delivery_style_id.required' => 'The delivery style field is required.',
            // 'character_id.required' => 'The character field is required.',
            // 'impersonation_id.required' => 'The impersonation field is required.',
            // 'home_studio_id.required' => 'The home studio field is required.'
        ]);

        return $validator;
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function ageGroup()
    {
        return $this->hasOne(AgeGroup::class, 'id', 'age_group_id');
    }

    public function race()
    {
        return $this->hasOne(Race::class, 'id', 'race_id');
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function accent()
    {
        return $this->hasOne(Accent::class, 'id', 'accent_id');
    }

    public function deliveryStyle()
    {
        return $this->hasOne(DeliveryStyle::class, 'id', 'delivery_style_id');
    }

    public function character()
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }

    public function impersonation()
    {
        return $this->hasOne(Impersonation::class, 'id', 'impersonation_id');
    }

    public function HomeStudio()
    {
        return $this->hasOne(HomeStudio::class, 'id', 'home_studio_id');
    }

    public function voiceAudios()
    {
        return $this->hasMany(VoiceAudio::class, 'voice_id', 'id');
    }
}
