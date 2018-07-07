@extends('layouts.app')

@section('content')

    <main class="editPage">
    	<div class="container">
    		<h2>Edit Question</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            {!! Form::open(['route' => ['question.update', $question['question']['id']], 'method' => 'PUT']) !!}
            {{-- {{ QuestionsController@update }} --}}
                <div class="form-group">
                    {{ Form::label('question', 'Question Text:') }}
                    {{ Form::text('question', $question['question']['question'], ['class' => 'form-control', 'placeholder' => 'Question Text']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('question_category', 'Question Category:') }}
                    {{ Form::text('question_category', $question['question']['question_category'], ['class' => 'form-control', 'placeholder' => 'Question Category']) }}
                </div>

                @foreach ($question['answers'] as $key => $answer)
                    <div class="form-group">
                        {{ Form::label('choice#'.($key + 1), 'Choice #'.($key + 1)) }}
                        {{ Form::text('choice#'.($key + 1), $answer['answers'], ['class' => 'form-control', 'placeholder' => 'Answer Choice #' . ($key + 1)]) }}
                    </div>

                    @if ($answer['is_correct'] == 1)
                        <?php
                            $correct_choice = $key + 1;
                            $correct_reason = $answer['correct_explanation'];
                            $resources = $answer['resources'];
                        ?>
                    @endif
                @endforeach

                <div class="form-group">
                    {{ Form::label('correct_choice', 'Correct Choice Number:') }}
                    {{ Form::number('correct_choice', $correct_choice, ['class' => 'form-control', 'placeholder' => 'Correct Choice', 'min' => 1]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('correct_reason', 'Correct Reason:') }}
                    {{ Form::text('correct_reason', $correct_reason, ['class' => 'form-control', 'placeholder' => 'What is the Correct Reason']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('resource', 'Resources:') }}
                    {{ Form::text('resource', $resources, ['class' => 'form-control', 'placeholder' => 'Add Resources']) }}
                </div>
                <div class="form-group">
                    <a href="/admin/dashboard" class="back-button">Cancel</a>
                    {{-- {{ Form::button('Cancel', ['name' => 'cancel', 'type' => 'cancel']) }} --}}
                    {{-- <input type="submit" name="cancel" value="Cancel"> --}}
                    {{ Form::submit('Submit', ['name' => 'submit']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </main>

{{--
{{ $question['question']['id'] }}
{{ $question['answers'] }}

{{ $answer[$ans] }} --}}
{{-- {{ $answer['answers'] }} --}}
{{-- {{ $key++ }} --}}
{{-- {{ $answer }}

{{ $question[0]['id'] }}
{{ $question[0]['question_category'] }}
{{ $question[0]['question'] }}
{{ $question[0]['added_by'] }}
{{ $question[0]['id'] }}
{{ $question[0]['id'] }}
{{ $question[0]['question'] }}
{{ $question[0]['question_category'] }}
--}}

@if ($answer['correct_explanation'] !== null)
    <?php
        // $correct_reason = $answer['correct_choice'];
    ?>
@else
    <?php
        //$correct_reason = '';
    ?>
@endif
@if ($answer['resources'] !== null)
    <?php
        // $resources = $answer['resources'];
    ?>
@else
    <?php
        //$resources = '';
        //SELECT * FROM `choices` WHERE `resources` != ''
    ?>
@endif



@endsection
