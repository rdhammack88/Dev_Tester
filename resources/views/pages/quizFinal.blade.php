@extends('layouts.app')

@section('content')

<!-- <h1>Questions</h1>
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

-->

<!-- @foreach ($question_answers as $question_answer)
    {{ $question_answer }}
@endforeach -->

<main id="finalePage">
	<div class="container">
		<!-- Final test result details header -->
		<section id="finaleDetails">
			<h2>{{ $msg }}</h2>
			<p>Final Score: &nbsp;&nbsp;{{ $user_score }}%</p>
			<p>Correct: &nbsp;&nbsp;&nbsp;&nbsp;
				<span class="$class">{{ count($user_correct_answers) }}</span> of 
				<span class="correct">{{ count($questions) }}</span> 
			</p>
		</section>

        <div class="wrapper">
            <ol id="question_list">
                @foreach ($questions as $question)
                <li class="question">
                    {{ $question['question'] }}
                        <ol class="answer_list">

                        @foreach ($question_answers as $question_answer)
                            @if ($question_answer['question_number'] === $question['id'])
                                @if (in_array($question_answer['id'], $correct_answers))
                                    <li class="correct">{{ $question_answer['answers'] }}</li>
                                @elseif (in_array($question_answer['id'], $user_answers) && !in_array($question_answer['id'], $user_correct_answers))
                                    <li class="wrong">{{ $question_answer['answers'] }}</li>
                                @else 
                                    <li>{{ $question_answer['answers'] }}</li>
                                @endif
                            @endif
                        @endforeach
                        
                        </ol>
                </li>                
                @endforeach

            </ol>
        </div> 
        <a href="/quiz-choice" class="retake">Take Quiz Again</a>
    </div>
</main>

@endsection
