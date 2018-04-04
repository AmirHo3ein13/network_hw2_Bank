@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Get Information to Get Credit') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('get_credit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                                <div class="col-md-6">
                                    <input id="from" type="text" class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" placeholder="Number" required>
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
                                    <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" placeholder="Amount" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
