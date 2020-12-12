{{-- we extends layout from the app.blade using extends keywords --}}
@extends('layout.app')

{{-- This section is inject the content to yeild for the file we inherited --}}
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
        </div>
    </div>
@endsection