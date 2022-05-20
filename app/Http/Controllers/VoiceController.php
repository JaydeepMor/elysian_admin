<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Models\Gender;
use App\Models\AgeGroup;
use App\Models\Race;
use App\Models\Language;
use App\Models\Accent;
use App\Models\DeliveryStyle;
use App\Models\Character;
use App\Models\Impersonation;
use App\Models\HomeStudio;
use App\Models\Voice;
use App\Models\VoiceAudio;
use Carbon\Carbon;

class VoiceController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $voices = Voice::paginate(Voice::PAGINATE_RECORDS);

        return view('index', compact('voices'));
    }

    public function create()
    {
        $genders = Gender::all();
        $ageGroups = AgeGroup::all();
        $races = Race::all();
        $languages = Language::all();
        $accents = Accent::all();
        $deliveryStyles = DeliveryStyle::all();
        $characters = Character::all();
        $impersonations = Impersonation::all();
        $homeStudios = HomeStudio::all();

        return view('voices.create', compact('genders', 'ageGroups', 'races', 'languages', 'accents', 'deliveryStyles', 'characters', 'impersonations', 'homeStudios'));
    }

    public function rewriteDataList(array $data)
    {
        if (!empty($data['gender_id'])) {
            $find = Gender::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['gender_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Gender::insertGetId(['text' => (string)$data['gender_id']]);

                if ($create) {
                    $data['gender_id'] = $create;
                }
            } else {
                $data['gender_id'] = $find->id;
            }
        }

        if (!empty($data['age_group_id'])) {
            $find = AgeGroup::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['age_group_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = AgeGroup::insertGetId(['text' => (string)$data['age_group_id']]);

                if ($create) {
                    $data['age_group_id'] = $create;
                }
            } else {
                $data['age_group_id'] = $find->id;
            }
        }

        if (!empty($data['race_id'])) {
            $find = Race::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['race_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Race::insertGetId(['text' => (string)$data['race_id']]);

                if ($create) {
                    $data['race_id'] = $create;
                }
            } else {
                $data['race_id'] = $find->id;
            }
        }

        if (!empty($data['language_id'])) {
            $find = Language::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['language_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Language::insertGetId(['text' => (string)$data['language_id']]);

                if ($create) {
                    $data['language_id'] = $create;
                }
            } else {
                $data['language_id'] = $find->id;
            }
        }

        if (!empty($data['accent_id'])) {
            $find = Accent::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['accent_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Accent::insertGetId(['text' => (string)$data['accent_id']]);

                if ($create) {
                    $data['accent_id'] = $create;
                }
            } else {
                $data['accent_id'] = $find->id;
            }
        }

        if (!empty($data['delivery_style_id'])) {
            $find = DeliveryStyle::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['delivery_style_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = DeliveryStyle::insertGetId(['text' => (string)$data['delivery_style_id']]);

                if ($create) {
                    $data['delivery_style_id'] = $create;
                }
            } else {
                $data['delivery_style_id'] = $find->id;
            }
        }

        if (!empty($data['character_id'])) {
            $find = Character::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['character_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Character::insertGetId(['text' => (string)$data['character_id']]);

                if ($create) {
                    $data['character_id'] = $create;
                }
            } else {
                $data['character_id'] = $find->id;
            }
        }

        if (!empty($data['impersonation_id'])) {
            $find = Impersonation::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['impersonation_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = Impersonation::insertGetId(['text' => (string)$data['impersonation_id']]);

                if ($create) {
                    $data['impersonation_id'] = $create;
                }
            } else {
                $data['impersonation_id'] = $find->id;
            }
        }

        if (!empty($data['home_studio_id'])) {
            $find = HomeStudio::select('id')->whereRaw("LOWER(`text`) = '" . strtolower($data['home_studio_id']) . "'")->first();

            // Add new if not found.
            if (empty($find)) {
                $create = HomeStudio::insertGetId(['text' => (string)$data['home_studio_id']]);

                if ($create) {
                    $data['home_studio_id'] = $create;
                }
            } else {
                $data['home_studio_id'] = $find->id;
            }
        }

        return $data;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $model = new Voice();

            $data = $request->all();

            $now = Carbon::now();

            // Update datalist value.
            $data = $this->rewriteDataList($data);

            $check = $model->validator($data);

            if ($check->fails()) {
                return back()->withInput()->withErrors($check->errors());
            }

            $create = $model::create($data);

            if ($create) {
                $audioData = [];

                foreach ($data['mp3_title'] as $index => $mp3Title) {
                    $audioData[] = [
                        'mp3_title' => $mp3Title,
                        'mp3' => $data['mp3'][$index],
                        'voice_id' => $create->id,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }

                VoiceAudio::insert($audioData);

                DB::commit();

                return redirect(route('voices.index'))->with('success', 'Voice added successfully!');
            }
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        } catch (\Throwable $e) {
            DB::rollback();
        }

        return back()->withInput();
    }

    public function edit(int $id)
    {
        $voice = Voice::find($id);

        if (empty($voice)) {
            return redirect(route('voices.index'))->with('error', 'Voice not found! Please reload page and try again.');
        }

        $genders = Gender::all();
        $ageGroups = AgeGroup::all();
        $races = Race::all();
        $languages = Language::all();
        $accents = Accent::all();
        $deliveryStyles = DeliveryStyle::all();
        $characters = Character::all();
        $impersonations = Impersonation::all();
        $homeStudios = HomeStudio::all();

        return view('voices.edit', compact('genders', 'ageGroups', 'races', 'languages', 'accents', 'deliveryStyles', 'characters', 'impersonations', 'homeStudios', 'voice'));
    }

    public function update(Request $request, int $id)
    {
        DB::beginTransaction();

        try {
            $model = new Voice();

            $data = $request->all();

            $now = Carbon::now();

            // Find exists.
            $find = $model::find($id);

            if (empty($find)) {
                return redirect(route('voices.index'))->with('error', 'Voice not found! Please reload page and try again.');
            }

            // Update datalist value.
            $data = $this->rewriteDataList($data);

            $check = $model->validator($data);

            if ($check->fails()) {
                return back()->withInput()->withErrors($check->errors());
            }

            $update = $find->update($data);

            if ($update) {
                // Remove old voice audio first.
                VoiceAudio::where('voice_id', $id)->delete();

                $audioData = [];

                foreach ($data['mp3_title'] as $index => $mp3Title) {
                    $audioData[] = [
                        'mp3_title' => $mp3Title,
                        'mp3' => $data['mp3'][$index],
                        'voice_id' => $id,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }

                VoiceAudio::insert($audioData);

                DB::commit();

                return redirect(route('voices.index'))->with('success', 'Voice updated successfully!');
            }
        } catch (\Exception $e) {
            DB::rollback();
        } catch (\Throwable $e) {
            DB::rollback();
        }

        return back()->withInput();
    }

    public function destroy(int $id)
    {
        DB::beginTransaction();

        try {
            $model = new Voice();

            $find = $model::find($id);

            if (empty($find)) {
                return redirect(route('voices.index'))->with('error', 'Voice not found! Please reload page and try again.');
            }

            $delete = $find->delete();

            if ($delete) {
                $find->voiceAudios()->delete();

                DB::commit();

                return redirect(route('voices.index'))->with('success', 'Voice deleted successfully!');
            }
        } catch (\Exception $e) {
            DB::rollback();
        } catch (\Throwable $e) {
            DB::rollback();
        }

        return back()->withInput();
    }
}
