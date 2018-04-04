@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Account') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                            <div class="col-md-6">
                                <input disabled id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ $data['account']['number'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input disabled id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $data['password'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ccv2" class="col-md-4 col-form-label text-md-right">{{ __('CCV2') }}</label>

                            <div class="col-md-6">
                                <input disabled id="ccv2" type="text" class="form-control{{ $errors->has('ccv2') ? ' is-invalid' : '' }}" name="ccv2" value="{{ $data['account']['ccv2'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="expiration" class="col-md-4 col-form-label text-md-right">{{ __('Expiration') }}</label>

                            <div class="col-md-6">
                                <input disabled id="expiration" type="text" class="form-control{{ $errors->has('expiration') ? ' is-invalid' : '' }}" name="expiration" value="{{ $data['account']['expiration'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Balance') }}</label>

                            <div class="col-md-6">
                                <input disabled id="balance" type="text" class="form-control{{ $errors->has('balance') ? ' is-invalid' : '' }}" name="balance" value="{{ $data['account']['balance'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="location.href='{{ route('home') }}'" class="btn btn-primary">
                                    {{ __('Back') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
