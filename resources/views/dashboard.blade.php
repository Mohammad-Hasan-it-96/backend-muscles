@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <h2>Welcome to Dashboard</h2>
        <div class="row">
            @yield('content')
        </div>
    </div>
@endsection
