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
                                            <h6 class="mb-0">Language</h6>
                                            <input list="languages" name="language_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('language_id', $voice->language->text) }}" autocomplete="off" />
                                            <datalist id="languages">
                                                @if (!empty($languages))
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->text }}" {{ old('language_id', $voice->language->text) == $language->text ? 'selected' : '' }}>{{ $language->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="language_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($languages))
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}" {{ old('language_id', $voice->language_id) == $language->id ? 'selected' : '' }}>{{ $language->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('language_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Accent</h6>
                                            <input list="accents" name="accent_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('accent_id', $voice->accent->text) }}" autocomplete="off" />
                                            <datalist id="accents">
                                                @if (!empty($accents))
                                                    @foreach ($accents as $accent)
                                                        <option value="{{ $accent->text }}" {{ old('accent_id', $voice->accent->text) == $accent->text ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="accent_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($accents))
                                                    @foreach ($accents as $accent)
                                                        <option value="{{ $accent->id }}" {{ old('accent_id', $voice->accent_id) == $accent->id ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('accent_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Delivery Style</h6>
                                            <input list="delivery_styles" name="delivery_style_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('delivery_style_id', $voice->deliveryStyle->text) }}" autocomplete="off" />
                                            <datalist id="delivery_styles">
                                                @if (!empty($deliveryStyles))
                                                    @foreach ($deliveryStyles as $deliveryStyle)
                                                        <option value="{{ $deliveryStyle->text }}" {{ old('delivery_style_id', $voice->deliveryStyle->text) == $deliveryStyle->text ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="delivery_style_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($deliveryStyles))
                                                    @foreach ($deliveryStyles as $deliveryStyle)
                                                        <option value="{{ $deliveryStyle->id }}" {{ old('delivery_style_id', $voice->delivery_style_id) == $deliveryStyle->id ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('delivery_style_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Character</h6>
                                            <input list="characters" name="character_id" class="form-control" placeholder="Enter new or choose any of one. (Optional)" value="{{ old('character_id', (!empty($voice->character) ? $voice->character->text : '')) }}" autocomplete="off" />
                                            <datalist id="characters">
                                                @if (!empty($characters))
                                                    @foreach ($characters as $character)
                                                        <option value="{{ $character->text }}" {{ old('character_id', (!empty($voice->character) ? $voice->character->text : '')) == $character->text ? 'selected' : '' }}>{{ $character->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="character_id" class="form-control">
                                                <option value="" selected>-- Select --</option>

                                                @if (!empty($characters))
                                                    @foreach ($characters as $character)
                                                        <option value="{{ $character->id }}" {{ old('character_id', $voice->character_id) == $character->id ? 'selected' : '' }}>{{ $character->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('character_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Impersonation</h6>
                                            <input list="impersonations" name="impersonation_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('impersonation_id', $voice->impersonation->text) }}" autocomplete="off" />
                                            <datalist id="impersonations">
                                                @if (!empty($impersonations))
                                                    @foreach ($impersonations as $impersonation)
                                                        <option value="{{ $impersonation->text }}" {{ old('impersonation_id', $voice->impersonation->text) == $impersonation->text ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                    @endforeach
                                                @endif
                                            </datalist>

                                            <!-- <select name="impersonation_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($impersonations))
                                                    @foreach ($impersonations as $impersonation)
                                                        <option value="{{ $impersonation->id }}" {{ old('impersonation_id', $voice->impersonation_id) == $impersonation->id ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select> -->

                                            @error('impersonation_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Home Studio</h6>
                                            <input list="home_studios" name="home_studio_id" class="form-control" required placeholder="Enter new or choose any of one." value="{{ old('home_studio_id', $voice->homeStudio->text) }}" autocomplete="off" />
                                            <datalist id="home_studios">
                                                @if (!empty($homeStudios))
                                                    @foreach ($homeStudios as $homeStudio)
                                                        <option value="{{ $homeStudio->text }}" {{ old('home_studio_id', $voice->homeStudio->text) == $homeStudio->text ? 'selected' : '' }}>{{ $homeStudio->text }}</option>
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
                                                <div style="display: inline-flex;" id="{{ ($index == 0) ? 'fixed-mp3' : '' }}" class="{{ ($index > 0) ? 'fixed-mp3' : '' }}">
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
                                            @endforeach
                                        @elseif (!empty($voice->voiceAudios) && !$voice->voiceAudios->isEmpty())
                                            @foreach ($voice->voiceAudios as $index => $voiceAudios)
                                                <div style="display: inline-flex;" id="{{ ($index == 0) ? 'fixed-mp3' : '' }}" class="{{ ($index > 0) ? 'fixed-mp3' : '' }}">
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
                                            @endforeach
                                        @else
                                            <div style="display: inline-flex;" id="fixed-mp3">
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
