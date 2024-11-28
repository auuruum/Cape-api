@extends('admin.layouts.admin')

@section('title', trans('cape-api::admin.settings.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ trans('cape-api::admin.api.title') }}</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <h5 class="alert-heading">{{ trans('cape-api::admin.api.endpoints') }}</h5>
                <p class="mb-2">{{ trans('cape-api::admin.api.using_id') }}:</p>
                <code>GET {{ url('/api/cape-api/cape/{user_id}') }}</code>
                <p class="mt-2 mb-2">{{ trans('cape-api::admin.api.using_name') }}:</p>
                <code>GET {{ url('/api/cape-api/cape/name/{username}') }}</code>
                <hr>
                <p class="mb-0">{{ trans('cape-api::admin.api.usage_intro') }}:</p>
                <ul class="mb-0">
                    <li>{{ trans('cape-api::admin.api.replace_id') }}</li>
                    <li>{{ trans('cape-api::admin.api.replace_name') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ trans('cape-api::admin.dimensions.title') }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cape-api.admin.settings.save') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="widthInput">{{ trans('cape-api::admin.dimensions.width') }}</label>
                            <input type="number" class="form-control @error('width') is-invalid @enderror" 
                                id="widthInput" name="width" 
                                value="{{ old('width', $settings['width']) }}"
                                min="1">

                            @error('width')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="heightInput">{{ trans('cape-api::admin.dimensions.height') }}</label>
                            <input type="number" class="form-control @error('height') is-invalid @enderror" 
                                id="heightInput" name="height" 
                                value="{{ old('height', $settings['height']) }}"
                                min="1">

                            @error('height')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="showCapeInput" name="show_cape" 
                            value="1" {{ old('show_cape', $settings['show_cape']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="showCapeInput">
                            {{ trans('cape-api::admin.settings.show_cape') }}
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="iconInput">{{ trans('cape-api::admin.dimensions.icon') }}</label>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                        id="iconInput" name="icon" 
                        value="{{ old('icon', $settings['icon']) }}">
                    <small class="form-text">{!! trans('cape-api::admin.dimensions.icon_hint') !!}</small>
                    <small class="form-text d-block">{{ trans('cape-api::admin.dimensions.icon_optional') }}</small>

                    @error('icon')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('cape-api::admin.settings.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
