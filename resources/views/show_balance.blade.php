@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Get Balance') }}</div>

                    <div class="card-body">
                        {{--<form method="POST" action="{{ route('show_balance') }}">--}}
                            {{--@csrf--}}

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Balance') }}</label>

                                <div class="col-md-6">
                                    <input disabled id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                                           name="number" value="{{ $data['balance'] }}" required autofocus>

                                    {{--@if ($errors->has('number'))--}}
                                        {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('number') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" onclick="location.href='{{ route('get_balance') }}'" class="btn btn-primary">
                                        {{ __('Back') }}
                                    </button>
                                </div>
                            </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
