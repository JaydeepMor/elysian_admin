@extends("layouts.app")
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('voices.update', $voice->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Name</h6>
                                            <input type="text" class="form-control" name="name" placeholder="John Doe" value="{{ old('name', $voice->name) }}" autofocus required />

                                            @error('name')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Profile</h6>
                                            <input type="text" class="form-control" name="user_name" placeholder="jon_doe" value="{{ old('user_name', $voice->user_name) }}" required />

                                            @error('user_name')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Gender</h6>
                                            <input list="genders" name="gender_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('gender_id', $voice->gender->text) }}" autocomplete="off" />
                                            <datalist id="genders">
                                                @if (!empty($genders))
                                                    @foreach ($genders as $gender)
                                                        <option value="{{ $gender->text }}" {{ old('gender_id', $voice->gender->text) == $gender->text ? 'selected' : '' }}>{{ $gender->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="gender_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($genders))
                                                    @foreach ($genders as $gender)
                                                        <option value="{{ $gender->id }}" {{ old('gender_id', $voice->gender_id) == $gender->id ? 'selected' : '' }}>{{ $gender->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('gender_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Age Group</h6>
                                            <input list="age_groups" name="age_group_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('age_group_id', $voice->ageGroup->text) }}" autocomplete="off" />
                                            <datalist id="age_groups">
                                                @if (!empty($ageGroups))
                                                    @foreach ($ageGroups as $ageGroup)
                                                        <option value="{{ $ageGroup->text }}" {{ old('age_group_id', $voice->ageGroup->text) == $ageGroup->text ? 'selected' : '' }}>{{ $ageGroup->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="age_group_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($ageGroups))
                                                    @foreach ($ageGroups as $ageGroup)
                                                        <option value="{{ $ageGroup->id }}" {{ old('age_group_id', $voice->age_group_id) == $ageGroup->id ? 'selected' : '' }}>{{ $ageGroup->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('age_group_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Race</h6>
                                            <input list="races" name="race_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('race_id', $voice->race->text) }}" autocomplete="off" />
                                            <datalist id="races">
                                                @if (!empty($races))
                                                    @foreach ($races as $race)
                                                        <option value="{{ $race->text }}" {{ old('race_id', $voice->race->text) == $race->text ? 'selected' : '' }}>{{ $race->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="race_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($races))
                                                    @foreach ($races as $race)
                                                        <option value="{{ $race->id }}" {{ old('race_id', $voice->race_id) == $race->id ? 'selected' : '' }}>{{ $race->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('race_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Home Studio</h6>
                                            <input list="home_studios" name="home_studio_id" class="form-control" placeholder="Enter new or choose any of one. (Optional)" value="{{ old('home_studio_id', (!empty($voice->homeStudio) ? $voice->homeStudio->text : '')) }}" autocomplete="off" />
                                            <datalist id="home_studios">
                                                @if (!empty($homeStudios))
                                                    @foreach ($homeStudios as $homeStudio)
                                                        <option value="{{ $homeStudio->text }}" {{ old('home_studio_id', (!empty($voice->homeStudio) ? $voice->homeStudio->text : '')) == $homeStudio->text ? 'selected' : '' }}>{{ $homeStudio->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="home_studio_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($homeStudios))
                                                    @foreach ($homeStudios as $homeStudio)
                                                        <option value="{{ $homeStudio->id }}" {{ old('home_studio_id', $voice->home_studio_id) == $homeStudio->id ? 'selected' : '' }}>{{ $homeStudio->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('home_studio_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row" id="row-mp3">
                                        <h6 class="mb-0">
                                            MP3
                                        </h6>

                                        @if (!empty(old("mp3_title")))
                                            @foreach (old("mp3_title") as $index => $mp3Title)
                                                <div id="{{ ($index == 0) ? 'fixed-mp3' : '' }}" class="{{ ($index > 0) ? 'fixed-mp3' : '' }}">
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input list="languages" name="language_id[]" class="form-control" required placeholder="Language : Enter new or choose any of one." value="{{ old('language_id.' . $index) }}" autocomplete="off" />
                                                                <datalist id="languages">
                                                                    @if (!empty($languages))
                                                                        @foreach ($languages as $language)
                                                                            <option value="{{ $language->text }}" {{ old('language_id.' . $index) == $language->text ? 'selected' : '' }}>{{ $language->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('language_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input list="accents" name="accent_id[]" class="form-control" placeholder="Accent : Enter new or choose any of one. (Optional)" value="{{ old('accent_id.' . $index) }}" autocomplete="off" />
                                                                <datalist id="accents">
                                                                    @if (!empty($accents))
                                                                        @foreach ($accents as $accent)
                                                                            <option value="{{ $accent->text }}" {{ old('accent_id.' . $index) == $accent->text ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('accent_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input list="delivery_styles" name="delivery_style_id[]" class="form-control" placeholder="Delivery Style : Enter new or choose any of one. (Optional)" value="{{ old('delivery_style_id.' . $index) }}" autocomplete="off" />
                                                                <datalist id="delivery_styles">
                                                                    @if (!empty($deliveryStyles))
                                                                        @foreach ($deliveryStyles as $deliveryStyle)
                                                                            <option value="{{ $deliveryStyle->text }}" {{ old('delivery_style_id.' . $index) == $deliveryStyle->text ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('delivery_style_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input list="characters" name="character_id[]" class="form-control" placeholder="Character : Enter new or choose any of one. (Optional)" value="{{ old('character_id.' . $index) }}" autocomplete="off" />
                                                                <datalist id="characters">
                                                                    @if (!empty($characters))
                                                                        @foreach ($characters as $character)
                                                                            <option value="{{ $character->text }}" {{ old('character_id.' . $index) == $character->text ? 'selected' : '' }}>{{ $character->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('character_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-12">
                                                                <input list="impersonations" name="impersonation_id[]" class="form-control" placeholder="Impersonation : Enter new or choose any of one. (Optional)" value="{{ old('impersonation_id.' . $index) }}" autocomplete="off" />
                                                                <datalist id="impersonations">
                                                                    @if (!empty($impersonations))
                                                                        @foreach ($impersonations as $impersonation)
                                                                            <option value="{{ $impersonation->text }}" {{ old('impersonation_id.' . $index) == $impersonation->text ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('impersonation_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="mp3_title[]" placeholder="John Doe - Hard Sell" value="{{ old('mp3_title.' . $index) }}" required />

                                                                @error('mp3_title.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-5" style="min-width: 47%;">
                                                                <input type="text" class="form-control" name="mp3[]" placeholder="https://test.mp3" value="{{ old('mp3.' . $index) }}" required />

                                                                @error('mp3.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-1">
                                                                @if ($index > 0)
                                                                    <button class="btn btn-light remove-mp3" type="button">&minus;</button>
                                                                @else
                                                                    <button class="btn btn-light" type="button" id="add-mp3">&plus;</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br />
                                                </div>
                                            @endforeach
                                        @elseif (!empty($voice->voiceAudios) && !$voice->voiceAudios->isEmpty())
                                            @php
                                                $languagesOld      = $voice->languages;
                                                $accentsOld        = $voice->accents;
                                                $deliveryStylesOld = $voice->deliveryStyles;
                                                $charactersOld     = $voice->characters;
                                                $impersonationsOld = $voice->impersonations;
                                            @endphp

                                            @foreach ($voice->voiceAudios as $index => $voiceAudios)
                                                @php
                                                    $language       = $languagesOld[$index]->text;
                                                    $accent         = !empty($accentsOld[$index]) ? $accentsOld[$index]->text : '';
                                                    $deliveryStyle  = !empty($deliveryStylesOld[$index]) ? $deliveryStylesOld[$index]->text : '';
                                                    $character      = !empty($charactersOld[$index]) ? $charactersOld[$index]->text : '';
                                                    $impersonation  = !empty($impersonationsOld[$index]) ? $impersonationsOld[$index]->text : '';
                                                @endphp

                                                <div id="{{ ($index == 0) ? 'fixed-mp3' : '' }}" class="{{ ($index > 0) ? 'fixed-mp3' : '' }}">
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input list="languages" name="language_id[]" class="form-control" required placeholder="Language : Enter new or choose any of one." value="{{ $language }}" autocomplete="off" />
                                                                <datalist id="languages">
                                                                    @if (!empty($languages))
                                                                        @foreach ($languages as $language)
                                                                            <option value="{{ $language->text }}" {{ old('language_id.' . $index) == $language->text ? 'selected' : '' }}>{{ $language->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('language_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input list="accents" name="accent_id[]" class="form-control" placeholder="Accent : Enter new or choose any of one. (Optional)" value="{{ $accent }}" autocomplete="off" />
                                                                <datalist id="accents">
                                                                    @if (!empty($accents))
                                                                        @foreach ($accents as $accent)
                                                                            <option value="{{ $accent->text }}" {{ old('accent_id.' . $index) == $accent->text ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('accent_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input list="delivery_styles" name="delivery_style_id[]" class="form-control" placeholder="Delivery Style : Enter new or choose any of one. (Optional)" value="{{ $deliveryStyle }}" autocomplete="off" />
                                                                <datalist id="delivery_styles">
                                                                    @if (!empty($deliveryStyles))
                                                                        @foreach ($deliveryStyles as $deliveryStyle)
                                                                            <option value="{{ $deliveryStyle->text }}" {{ old('delivery_style_id.' . $index) == $deliveryStyle->text ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('delivery_style_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input list="characters" name="character_id[]" class="form-control" placeholder="Character : Enter new or choose any of one. (Optional)" value="{{ $character }}" autocomplete="off" />
                                                                <datalist id="characters">
                                                                    @if (!empty($characters))
                                                                        @foreach ($characters as $character)
                                                                            <option value="{{ $character->text }}" {{ old('character_id.' . $index) == $character->text ? 'selected' : '' }}>{{ $character->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('character_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-12">
                                                                <input list="impersonations" name="impersonation_id[]" class="form-control" placeholder="Impersonation : Enter new or choose any of one. (Optional)" value="{{ $impersonation }}" autocomplete="off" />
                                                                <datalist id="impersonations">
                                                                    @if (!empty($impersonations))
                                                                        @foreach ($impersonations as $impersonation)
                                                                            <option value="{{ $impersonation->text }}" {{ old('impersonation_id.' . $index) == $impersonation->text ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </datalist>

                                                                @error('impersonation_id.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div style="display: inline-flex;">
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="mp3_title[]" placeholder="John Doe - Hard Sell" value="{{ $voiceAudios->mp3_title }}" required />

                                                                @error('mp3_title.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-5" style="min-width: 47%;">
                                                                <input type="text" class="form-control" name="mp3[]" placeholder="https://test.mp3" value="{{ $voiceAudios->mp3 }}" required />

                                                                @error('mp3.' . $index)
                                                                    <span style="color: #e85252;" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-1">
                                                                @if ($index > 0)
                                                                    <button class="btn btn-light remove-mp3" type="button">&minus;</button>
                                                                @else
                                                                    <button class="btn btn-light" type="button" id="add-mp3">&plus;</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                </div>
                                            @endforeach
                                        @else
                                            <div id="fixed-mp3">
                                                <div class="row">
                                                    <div style="display: inline-flex;">
                                                        <div class="col-sm-6">
                                                            <input list="languages" name="language_id[]" class="form-control" required placeholder="Language : Enter new or choose any of one." value="{{ old('language_id.0') }}" autocomplete="off" />
                                                            <datalist id="languages">
                                                                @if (!empty($languages))
                                                                    @foreach ($languages as $language)
                                                                        <option value="{{ $language->text }}" {{ old('language_id.0') == $language->text ? 'selected' : '' }}>{{ $language->text }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            @error('language_id.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input list="accents" name="accent_id[]" class="form-control" placeholder="Accent : Enter new or choose any of one. (Optional)" value="{{ old('accent_id.0') }}" autocomplete="off" />
                                                            <datalist id="accents">
                                                                @if (!empty($accents))
                                                                    @foreach ($accents as $accent)
                                                                        <option value="{{ $accent->text }}" {{ old('accent_id.0') == $accent->text ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            @error('accent_id.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div style="display: inline-flex;">
                                                        <div class="col-sm-6">
                                                            <input list="delivery_styles" name="delivery_style_id[]" class="form-control" placeholder="Delivery Style : Enter new or choose any of one. (Optional)" value="{{ old('delivery_style_id.0') }}" autocomplete="off" />
                                                            <datalist id="delivery_styles">
                                                                @if (!empty($deliveryStyles))
                                                                    @foreach ($deliveryStyles as $deliveryStyle)
                                                                        <option value="{{ $deliveryStyle->text }}" {{ old('delivery_style_id.0') == $deliveryStyle->text ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            @error('delivery_style_id.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input list="characters" name="character_id[]" class="form-control" placeholder="Character : Enter new or choose any of one. (Optional)" value="{{ old('character_id.0') }}" autocomplete="off" />
                                                            <datalist id="characters">
                                                                @if (!empty($characters))
                                                                    @foreach ($characters as $character)
                                                                        <option value="{{ $character->text }}" {{ old('character_id.0') == $character->text ? 'selected' : '' }}>{{ $character->text }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            @error('character_id.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div style="display: inline-flex;">
                                                        <div class="col-sm-12">
                                                            <input list="impersonations" name="impersonation_id[]" class="form-control" placeholder="Impersonation : Enter new or choose any of one. (Optional)" value="{{ old('impersonation_id.0') }}" autocomplete="off" />
                                                            <datalist id="impersonations">
                                                                @if (!empty($impersonations))
                                                                    @foreach ($impersonations as $impersonation)
                                                                        <option value="{{ $impersonation->text }}" {{ old('impersonation_id.0') == $impersonation->text ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            @error('impersonation_id.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div style="display: inline-flex;">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="mp3_title[]" placeholder="John Doe - Hard Sell" value="{{ old('mp3_title.0') }}" required />

                                                            @error('mp3_title.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-5" style="min-width: 47%;">
                                                            <input type="text" class="form-control" name="mp3[]" placeholder="https://test.mp3" value="{{ old('mp3.0') }}" required />

                                                            @error('mp3.0')
                                                                <span style="color: #e85252;" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-1">
                                                            <button class="btn btn-light" type="button" id="add-mp3">&plus;</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12" style="text-align: right;">
                                            <input type="submit" class="btn btn-light px-4" value="Store" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script src="{{ asset('assets/js/voice.js') }}"></script>
@endsection
