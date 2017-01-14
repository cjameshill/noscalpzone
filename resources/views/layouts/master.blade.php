@extends('layouts.app')

@section('container')


    @include('components._primary-header')

    <div class="wrapper">
        @yield('content')

        @include('components._primary-footer')

    </div>

    <ticket-checkout></ticket-checkout>

@endsection