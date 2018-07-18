@extends('layouts.app')

@section('content')

<h1>Questions</h1>
@foreach ($questions as $question)
    {{ $question }}
@endforeach
<br><br>
<h1>Correct Answers</h1>
@foreach ($correct_answers as $correct_answer)
    {{ $correct_answer }}
@endforeach
<br><br>
<h1>User Answers</h1>
@foreach ($user_answers as $user_answer)
    {{ $user_answer }}
@endforeach




@endsection
