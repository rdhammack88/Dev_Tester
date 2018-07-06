@extends('layouts.app')

@section('content')

<h1>Admin Home Page!</h1>

{{-- @if (count($questions) > 0)
    @foreach ($questions as $question)
        <p>{{ $question }}</p>
    @endforeach
@else
    <p>You have not created any questions</p>
@endif --}}
{{ $user_id }}

@endsection
