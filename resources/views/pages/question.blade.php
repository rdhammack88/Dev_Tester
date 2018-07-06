@extends('layouts.app')

@section('content')
    {{-- {{ $question_count }} --}}
    {{-- {{ $question }}
    <br><br>
    {{ $question['id'] }}
    <br>
    {{ $question['question_category'] }}
    <br>
    {{ $question['question'] }}
    <br>
    {{ $question['added_by'] }}
    <br>

    <br>
    {{  $question_id }}
    <br>
    {{  $answers }}
    <br>

    @foreach ($answers as $key => $value)
        <p>{{ $key . ' -> ' . $value['answers'] }}</p>
    @endforeach --}}

    {{-- <br>
    {{ $question_id }}
    {{ $question['id'] }}
    <br> --}}


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
                                <label for="{{ 'answer' . $answer['id'] }}">{{ $answer['answers'] }} -- {{ $answer['id'] }}</label>
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



            {{ $recent_choice }}
            {{-- {{ session('user.answers') }} --}}

            {{ print_r(Session::all()) }}
            {{-- @foreach ($previous_questions as $question)
                <p>{{ $question }}</p>
            @endforeach --}}

            {{-- @foreach ($user['answers'] as $user_answer)
                <p>{{ $user_answer }}</p>
            @endforeach --}}
            {{-- {{ $previous_questions }} --}}
<br><br><br><br><br>
            @foreach (session('question.previous_questions') as $question)
                <p>{{ $question }}</p>
            @endforeach
<br><br><br><br><br>
            @foreach (session('question.correct_answers') as $correct_answers)
                {{-- @foreach ($key as $correct_answers => $answer)
                <p>{{ $answer }}</p> --}}
                    <p>{{ $correct_answers }}</p>
                {{-- @endforeach --}}
            @endforeach
<br><br><br><br><br>
    @if(session('question.user_answers'))
            @foreach (session('question.user_answers') as $user_answers)
                <p>{{ $user_answers }}</p>
            @endforeach
        @endif

        <br><br><br><br><br><br>
        <p>Recenet Questions</p>
        @foreach ($recent_questions as $recent_question)
            {{ $recent_question }}
        @endforeach

            {{-- {{ session('previous_questions') }} --}}
	</main>


@endsection
