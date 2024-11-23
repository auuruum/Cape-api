@extends('layouts.app')

@section('title', trans('cape-api::messages.profile.title'))

@push('scripts')
    <script src="{{ plugin_asset('cape-api', 'js/cape-upload.js') }}"></script>
@endpush

@section('content')
    <div class="container content">
        <div class="card shadow-sm">
            <div class="card-header">
                <h2 class="card-header-title">{{ trans('cape-api::messages.profile.title') }}</h2>
            </div>
            <div class="card-body">
                @if($hasCape)
                    <div class="text-center mb-4 cape-preview">
                        <h4>{{ trans('cape-api::messages.profile.current') }}</h4>
                        <img src="{{ route('cape-api.profile.cape.show', ['user' => auth()->user()->id]) }}" 
                             alt="Current cape" 
                             class="img-fluid">
                    </div>
                @endif

                <form action="{{ route('cape-api.profile.cape.upload') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="capeInput">
                            {{ trans('cape-api::messages.profile.upload.title') }}
                        </label>
                        <input type="file" 
                               class="form-control @error('cape') is-invalid @enderror" 
                               id="capeInput" 
                               name="cape" 
                               accept="image/png">
                        
                        @error('cape')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <div class="form-text">
                            {{ trans('cape-api::messages.profile.upload.requirements', ['width' => $width, 'height' => $height]) }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ trans('cape-api::messages.profile.upload.submit') }}
                    </button>
                </form>

                @if($hasCape)
                    <form action="{{ route('cape-api.profile.cape.delete') }}" 
                          method="POST" 
                          class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ trans('cape-api::messages.profile.delete.submit') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
