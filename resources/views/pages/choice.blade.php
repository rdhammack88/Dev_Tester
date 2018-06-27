@extends('layouts.app')

@section('content')
    <main class="testChoice">
		<div class="container-fluid">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <small class="success">{{ session('success') }}</small>
                </div>
            @endif


            <h3>Choose your test type</h3>
            {{-- {{ $choices }} --}}

<?php //echo $_SERVER['PHP_SELF'] . '/' . $_POST['test_category']; ?>
        	<form action="{{ action('QuestionsController@showQuestion') }}" method="post"> 
                {{-- /question --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<label for="category">Test Category:</label>
        		<select name="category" id="category" required>
        			<option value="none" selected disabled>Select One...</option>
                    @foreach ($choices as $choice)

                        <option value="{{ $choice }}" name="test_category">
                            {{ strtoupper($choice) }}
                        </option>

                    @endforeach
        		</select>
        		<br/><br/>
        		<label for="number_of_questions">Number of Questions:</label>
        		<select name="number_of_questions" id="number_of_questions" required>
        			<?php
        				//$question_count = $_SESSION['question_count'];
        			?>
        		</select>
        		<br/><br/>
        		<label for="type">Test Type:</label>
        		<span id="type">Multiple Choice</span>
        		<br/><br/>
        		<label for="time">Estimated Time:</label>
        		<span id="time"></span>
        		<br/><br/><br/>
        		<button type="submit" name="start" class="start">Start Quiz</button>

                <p id="data"></p>

        	</form>
        </div>
    </main>
@endsection
