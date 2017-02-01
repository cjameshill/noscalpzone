@extends('layouts.app')

@section('container')

    @include('components._primary-header', ['color' => 'is-background'])

    <div class="wrapper">
        @yield('content')

        @include('components._primary-footer')

    </div>


@endsection

@section('page-specific-js')

@endsection