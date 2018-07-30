@extends('layouts.app')

@section('content')
    <main class="questionPage">
		<div class="container">
			<form method="post" action="/question/{{ $question['question_category'] }}/{{ $question_number + 1 }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="question">
					<p class="current">Question {{ $question_number }} of {{ $question_count }}</p>

					<p>
                        <span id="question_number">{{ $question_number . '.' }}</span>
                        {{ $question['question'] }}
                    </p>
				</div>

				<div class="answers">
					<ul class="choices">

						@foreach ($answers as $answer)
                            <li class="answer">
                                <input type="hidden" name="is_correct" value="{{ $answer['is_correct'] }}">
                                <input type="radio" name="choice" value="{{ $answer['id'] }}" id="{{ 'answer' . $answer['id'] }}">
                                &nbsp;&nbsp;
                                <label for="{{ 'answer' . $answer['id'] }}">{{ $answer['answers'] }}</label>
                            </li>
                        @endforeach

					</ul>
					<br>
					<p class="choicesError text-error"><?php // echo $choicesError; ?></p>
				</div>

				<div class="submission">
                    @if ($question_number >= $question_count)
                        <input type="submit" name="submitQuiz" value="Submit Test" id="submitAnswer">
                    @else
                        <input type="submit" name="nextQuestion" value="Next" id="submitAnswer">
                    @endif

					<input type="submit" name="quit" value="Quit">
                    <input type="hidden" name="category" value="{{ $question['question_category'] }}">
                    <input type="hidden" name="number_of_questions" value="{{ $question_count }}">
				</div>
			</form>
		</div>
	</main>
@endsection
