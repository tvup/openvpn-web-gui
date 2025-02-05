@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Modal -->
                <div class="modal fade" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="pwdModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pwdModalLabel">Password:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ \Illuminate\Support\Str::random(8) }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">{{ __('users/create.register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ action('UserController@store') }}" aria-label="{{ __('users/create.register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="user_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.user_matches_the_certificate') }}</label>
                                <div class="col-md-6">
                                    <input id="user_name" type="text"
                                           class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}"
                                           name="user_name" value="{{ old('user_name') ? : ($user_name ?? '') }}"
                                           required {{ isset($user_name) ? 'readonly' : '' }} autofocus>
                                    @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="surname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.surname') }}</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                           class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                           name="surname" value="{{ old('surname') }}" autofocus>
                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vat_number"
                                       class="col-md-4 col-form-label text-md-right">{{ __('edituser.vat_number') }}</label>
                                <div class="col-md-6">
                                    <input id="vat_number" type="text"
                                           class="form-control{{ $errors->has('vat_number') ? ' is-invalid' : '' }}"
                                           name="vat_number" value="{{ old('vat_number') }}" autofocus>
                                    @if ($errors->has('vat_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vat_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.company') }}</label>
                                <div class="col-md-6">
                                    <input id="company" type="text"
                                           class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                                           name="company" value="{{ old('company') }}" autofocus>
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.email_address_unique') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.privileges') }}</label>
                                <div class="col-md-6">
                                    <select id="role"
                                            class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                            name="role" required autofocus>
                                        <option
                                            value="{{ \App\Enums\UserRoleEnum::User->value }}">{{ __('users/create.'.\App\Enums\UserRoleEnum::User->value) }}</option>
                                        <option
                                            value="{{ \App\Enums\UserRoleEnum::Admin->value }}">{{ __('users/create.'.\App\Enums\UserRoleEnum::Admin->value) }}</option>
                                        <option
                                            value="{{ \App\Enums\UserRoleEnum::Manager->value }}">{{ __('users/create.'.\App\Enums\UserRoleEnum::Manager->value) }}</option>
                                        <select>
                                            @if ($errors->has('role'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} password"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.confirm_password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control password"
                                           name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="show-password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('users/create.show_password') }}</label>
                                <div class="col-md-1">
                                    <input id="show-password" type="checkbox" class="form-control"
                                           name="show-password"
                                           onchange="myFunction()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="show-password2"
                                       class="col-md-4 col-form-label text-md-right"> </label>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-suggest-password" data-toggle="modal" data-target="#pwdModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" style="vertical-align: middle;">
                                            <path d="M18,9H17V7c0-2.8-2.2-5-5-5S7,4.2,7,7v2H6c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V11C20,9.9,19.1,9,18,9z M9,7 c0-1.7,1.3-3,3-3s3,1.3,3,3v2H9V7z M19,21H5V11h14V21z" fill="gold"/>
                                            <path d="M12.5,15.5c0.3,0,0.5-0.1,0.7-0.3l1.4-1.4c0.4-0.4,0.4-1,0-1.4s-1-0.4-1.4,0l-0.6,0.6V12c0-0.6-0.4-1-1-1s-1,0.4-1,1v1.9l-0.6-0.6 c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l1.4,1.4c0.2,0.2,0.4,0.3,0.7,0.3S12.3,15.7,12.5,15.5z" fill="gold"/>
                                            <path d="M11.5,13.5h1v1h-1V13.5z M12,14.2c0.1,0,0.2-0.1,0.3-0.1v-0.6h-0.6c0,0.1,0.1,0.2,0.1,0.3C11.8,13.7,11.9,14.2,12,14.2z" fill="black"/>
                                        </svg>





                                        {{__('users/create.suggest_password')}}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('users/create.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function myFunction() {
            let x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

