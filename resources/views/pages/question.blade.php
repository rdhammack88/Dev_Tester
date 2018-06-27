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
			<form method="POST" action="/question">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="question">
					<p class="current">Question <?php// echo $number; ?> of {{ $question_count }}</p>

					<p>
                        <span id="question_number">{{ $question_number . '.' }}</span>
                        <?php // echo  html_entity_decode(htmlspecialchars_decode($question['question'])); ?>
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
					<input type="submit" name="submit" value="Next" id="submitAnswer">
					<input type="submit" name="quit" value="Quit">
					<input type="hidden" name="number" value="<?php //echo $number; ?>">
					<input type="hidden" name="questionNumber" value="<?php //echo $question_number; ?>">
				</div>
			</form>
		</div>
	</main>


@endsection
