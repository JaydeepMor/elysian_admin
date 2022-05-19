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
                                <form action="{{ route('voices.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Name</h6>
                                            <input type="text" class="form-control" name="name" placeholder="John Doe" value="{{ old('name') }}" autofocus required />

                                            @error('name')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Profile</h6>
                                            <input type="text" class="form-control" name="user_name" placeholder="jon_doe" value="{{ old('user_name', '#') }}" required />

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
                                            <select name="gender_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($genders))
                                                    @foreach ($genders as $gender)
                                                        <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('gender_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Age Group</h6>
                                            <select name="age_group_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($ageGroups))
                                                    @foreach ($ageGroups as $ageGroup)
                                                        <option value="{{ $ageGroup->id }}" {{ old('age_group_id') == $ageGroup->id ? 'selected' : '' }}>{{ $ageGroup->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

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
                                            <select name="race_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($races))
                                                    @foreach ($races as $race)
                                                        <option value="{{ $race->id }}" {{ old('race_id') == $race->id ? 'selected' : '' }}>{{ $race->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('race_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Language</h6>
                                            <select name="language_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($languages))
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>{{ $language->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

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
                                            <select name="accent_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($accents))
                                                    @foreach ($accents as $accent)
                                                        <option value="{{ $accent->id }}" {{ old('accent_id') == $accent->id ? 'selected' : '' }}>{{ $accent->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('accent_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Delivery Style</h6>
                                            <select name="delivery_style_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($deliveryStyles))
                                                    @foreach ($deliveryStyles as $deliveryStyle)
                                                        <option value="{{ $deliveryStyle->id }}" {{ old('delivery_style_id') == $deliveryStyle->id ? 'selected' : '' }}>{{ $deliveryStyle->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

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
                                            <select name="character_id" class="form-control">
                                                <option value="" selected>-- Select --</option>

                                                @if (!empty($characters))
                                                    @foreach ($characters as $character)
                                                        <option value="{{ $character->id }}" {{ old('character_id') == $character->id ? 'selected' : '' }}>{{ $character->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('character_id')
                                                <span style="color: #e85252;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Impersonation</h6>
                                            <select name="impersonation_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($impersonations))
                                                    @foreach ($impersonations as $impersonation)
                                                        <option value="{{ $impersonation->id }}" {{ old('impersonation_id') == $impersonation->id ? 'selected' : '' }}>{{ $impersonation->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

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
                                            <select name="home_studio_id" class="form-control" required>
                                                <option value="" disabled selected>-- Select --</option>

                                                @if (!empty($homeStudios))
                                                    @foreach ($homeStudios as $homeStudio)
                                                        <option value="{{ $homeStudio->id }}" {{ old('home_studio_id') == $homeStudio->id ? 'selected' : '' }}>{{ $homeStudio->text }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

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
