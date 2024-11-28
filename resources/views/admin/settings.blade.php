@extends('admin.layouts.admin')

@section('title', 'Cape-API Settings')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title mb-0">API Information</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <h5 class="alert-heading">API Endpoints</h5>
                <p class="mb-2">Using User ID:</p>
                <code>GET {{ url('/api/cape-api/cape/{user_id}') }}</code>
                <p class="mt-2 mb-2">Using Username:</p>
                <code>GET {{ url('/api/cape-api/cape/name/{username}') }}</code>
                <hr>
                <p class="mb-0">You can use either:</p>
                <ul class="mb-0">
                    <li>Replace <code>{user_id}</code> with the user's ID number</li>
                    <li>Replace <code>{username}</code> with the user's username</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title mb-0">Cape Dimensions</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cape-api.admin.settings.save') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="widthInput">Width</label>
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
                            <label class="form-label" for="heightInput">Height</label>
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
                    <label class="form-label" for="iconInput">Navigation Icon</label>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                        id="iconInput" name="icon" 
                        value="{{ old('icon', $settings['icon']) }}"
                        placeholder="bi bi-person-circle">
                    <small class="form-text">Enter a Bootstrap icon class (e.g., bi bi-person-circle). You can find icons at <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></small>

                    @error('icon')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
