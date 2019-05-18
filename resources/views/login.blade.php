@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg">
           <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               <li class="nav-item">
                   <a class="nav-link" href="#">Link</a>
               </li>
               </ul>
           </div>
   </nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                   <userlogin></userlogin>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
