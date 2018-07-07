@extends('layouts.app')

@section('content')

    <main class="addPage">
    	<div class="container">
    		<h2>Add a Question</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('question', 'Question Text:') }}
                    {{ Form::text('question', '', ['class' => 'form-control', 'placeholder' => 'Question Text']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('question_category', 'Question Category:') }}
                    {{ Form::text('question_category', '', ['class' => 'form-control', 'placeholder' => 'Question Category']) }}
                </div>

                @for ($i=1; $i < 6; $i++)
                    <div class="form-group">
                        {{ Form::label('choice#'.$i, 'Choice #'.$i.':') }}
                        {{ Form::text('choice#'.$i, '', ['class' => 'form-control', 'placeholder' => 'Answer Choice #' . $i]) }}
                    </div>
                @endfor

                <div class="form-group">
                    {{ Form::label('correct_choice', 'Correct Choice Number:') }}
                    {{ Form::number('correct_choice', '', ['class' => 'form-control', 'placeholder' => 'Correct Choice', 'min' => 1]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('correct_explanation', 'Correct Explanation:') }}
                    {{ Form::text('correct_explanation', '', ['class' => 'form-control', 'placeholder' => 'What is the Correct Reason']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('resource', 'Resources:') }}
                    {{ Form::text('resource', '', ['class' => 'form-control', 'placeholder' => 'Add Resources']) }}
                </div>
                <div class="form-group">
                    <a href="/admin/dashboard" class="back-button">Cancel</a>
                    {{ Form::submit('Submit', ['name' => 'submit']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </main>

@endsection
