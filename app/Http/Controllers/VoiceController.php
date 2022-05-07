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

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $model = new Voice();

            $data = $request->all();

            $now = Carbon::now();

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
