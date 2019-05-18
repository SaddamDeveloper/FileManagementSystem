
@extends('layouts.app')

@section('content')
<div id="app">
<leftsidebar></leftsidebar>
<div id="right-panel" class="right-panel">
<navheader></navheader>
    <div class="content mt-3">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <registeredcase></registeredcase>
            <vue-progress-bar></vue-progress-bar>
            <router-view></router-view>
        </div>
    </div> <!-- .content -->
</div>
</div>
<!-- Right Panel -->
@endsection
