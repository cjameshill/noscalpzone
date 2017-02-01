@extends('layouts.dashboard')

@section('content')

   <dashboard :user="{{ $user }}"></dashboard>

@endsection


