@extends("layouts.app")

@section("style")
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
          <div class="card radius-10">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Voices</h5>
                    </div>
                    <div class="font-22 ms-auto text-white">
                        <a href="{{ route('voices.create') }}">
                            Add New
                        </a>
                    </div>
                </div>

                <hr>
                <div class="table-responsive">
                    <form>
                        <div class="row" style="padding: 10px;">
                            <div class="col-md-4">
                                <input type="text" name="s" value="{{ request()->get('s', '') }}" class="form-control" placeholder="Search by Name or Username" />
                            </div>

                            <div class="col-md-2">
                                <input type="submit" value="Search" class="btn btn-secondary">
                            </div>
                        </div>
                    </form>

                    <br />

                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Action</th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Profile</th>
                                <th>Gender</th>
                                <th>Age Group</th>
                                <th>Race</th>
                                <th>Language</th>
                                <th>Accent</th>
                                <th>Delivery Style</th>
                                <th>Characters</th>
                                <th>Impersonation</th>
                                <th>Home Studio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($voices) && !$voices->isEmpty())
                                @foreach ($voices as $key => $voice)
                                    <tr>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('voices.edit', $voice->id) }}"><i class="bx bx-edit"></i></a>
                                                &nbsp;
                                                <a href="javascript:void(0);" onclick="return removeVoice(event);" data-form-id="delete-form-{{ $voice->id }}">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $voice->id }}" action="{{ route('voices.destroy', $voice->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $voice->name }}</td>
                                        <td>{{ $voice->user_name }}</td>
                                        <td>{{ $voice->gender->text }}</td>
                                        <td>{{ $voice->ageGroup->text }}</td>
                                        <td>{{ $voice->race->text }}</td>
                                        <td>{{ implode(", ", $voice->languages->pluck('text')->toArray()) }}</td>
                                        <td>{{ (!empty($voice->accents) && !$voice->accents->isEmpty()) ? implode(", ", $voice->accents->pluck('text')->toArray()) : '-' }}</td>
                                        <td>{{ (!empty($voice->deliveryStyles) && !$voice->deliveryStyles->isEmpty()) ? implode(", ", $voice->deliveryStyles->pluck('text')->toArray()) : '-' }}</td>
                                        <td>{{ (!empty($voice->characters) && !$voice->characters->isEmpty()) ? implode(", ", $voice->characters->pluck('text')->toArray()) : '-' }}</td>
                                        <td>{{ (!empty($voice->impersonations) && !$voice->impersonations->isEmpty()) ? implode(", ", $voice->impersonations->pluck('text')->toArray()) : '-' }}</td>
                                        <td>{{ !empty($voice->homeStudio) ? $voice->homeStudio->text : '-' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="20" style="text-align: center;">
                                        <mark>No record found!</mark>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <br/>
                    <div style="float: right;">
                        {{ $voices->links('pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
