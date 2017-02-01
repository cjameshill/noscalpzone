@extends('layouts.app')

@section('container')

    @include('components._primary-header', ['color' => 'is-primary'])

    <div class="wrapper">
        @yield('content')

    </div>

    <ticket-checkout></ticket-checkout>

@endsection