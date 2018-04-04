@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Get Information to Send Credit') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('send_credit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="from_number" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="from_number" type="text" class="form-control{{ $errors->has('from_number') ? ' is-invalid' : '' }}" value="{{ $data['from']['number'] }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="to_name" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="to_name" type="text" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" name="to_name" value="{{ $data['to']['user']['name'] }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ccv2" class="col-md-4 col-form-label text-md-right">{{ __('CCV2') }}</label>

                                <div class="col-md-6">
                                    <input id="ccv2" type="password" class="form-control{{ $errors->has('ccv2') ? ' is-invalid' : '' }}" name="ccv2" placeholder="CCV2" required>
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                                {{--<label for="expiration" class="col-md-4 col-form-label text-md-right">{{ __('Expiration') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input disabled id="expiration" type="text" class="form-control{{ $errors->has('expiration') ? ' is-invalid' : '' }}" name="expiration" value="{{ $data['account']['expiration'] }}" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ $data['amount'] }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $data['to']['id'] }}" name="to_id">
                            <input type="hidden" value="{{ $data['from']['id'] }}" name="from_id">
                            <input type="hidden" value="{{ $data['from']['id'] }}" name="amount">
                            <input type="hidden" name="amount" value="{{ $data['amount'] }}">
                            <input type="hidden" name="from_number" value="{{ $data['from']['number'] }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
