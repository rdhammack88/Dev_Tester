@extends('layouts.app')
<script type="text/javascript">
    document.title = 'Admin Home Page!';
</script>

@section('content')

<h1>Admin Home Page!</h1>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success">
            You are logged in!
        </div>
    </div>
</div>

{{-- @if (count($questions) > 0)
    @foreach ($questions as $question)
        <p>{{ $question }}</p>
    @endforeach
@else
    <p>You have not created any questions</p>
@endif --}}
{{ $user_id }}

@endsection
