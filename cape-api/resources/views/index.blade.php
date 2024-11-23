@extends('layouts.app')

@section('title', 'Cape API')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ trans('messages.home.features') }}</h2>

                    <div class="card-text">
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <h3>
                                    <i class="bi bi-person-circle text-primary"></i>
                                    Custom Cape
                                </h3>
                                <p>Upload and manage your custom Minecraft cape. Show off your unique style in-game!</p>
                            </div>

                            <div class="col-md-6">
                                <h3>
                                    <i class="bi bi-arrows-angle-expand text-primary"></i>
                                    Flexible Dimensions
                                </h3>
                                <p>Support for both standard (64x32) and HD cape dimensions. Configure the size that works best for your server!</p>
                            </div>

                            <div class="col-md-6">
                                <h3>
                                    <i class="bi bi-shield-check text-primary"></i>
                                    Secure Storage
                                </h3>
                                <p>Your cape is securely stored and managed through your profile. Only you can control your cape settings.</p>
                            </div>

                            <div class="col-md-6">
                                <h3>
                                    <i class="bi bi-gear text-primary"></i>
                                    Easy Management
                                </h3>
                                <p>Simple interface to upload, view, and delete your cape. Full control at your fingertips!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ trans('messages.home.links') }}</h2>

                    <div class="list-group list-group-flush">
                        @auth
                            <a href="{{ route('cape-api.profile.cape') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-person-circle"></i> Manage Your Cape
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-box-arrow-in-right"></i> {{ trans('auth.login') }}
                            </a>
                            <a href="{{ route('register') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-person-plus"></i> {{ trans('auth.register') }}
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
