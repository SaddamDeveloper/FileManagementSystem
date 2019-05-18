@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                   <signup></signup>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
