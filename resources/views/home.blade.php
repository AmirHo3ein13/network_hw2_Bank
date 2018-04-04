@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" onclick="location.href='{{ route('create_account') }}'" class="btn btn-primary">
                                {{ __('Create Account') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" onclick="location.href='{{ route('get_balance') }}'" class="btn btn-primary">
                                {{ __('Get Balance') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" onclick="location.href='{{ route('get_numbers') }}'" class="btn btn-primary">
                                {{ __('Send Credit') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" onclick="location.href='{{ route('get_info') }}'" class="btn btn-primary">
                                {{ __('Get Credit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
