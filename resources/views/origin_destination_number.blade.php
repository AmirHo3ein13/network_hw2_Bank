@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Get Origin and Destination number') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('check_transaction') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('Origin Number') }}</label>

                                <div class="col-md-6">
                                    <input  id="from" type="text" class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" placeholder="origin account number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('Destination Number') }}</label>

                                <div class="col-md-6">
                                    <input  id="to" type="text" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" placeholder="destination account number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" placeholder="Amount of Transaction" required>
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
