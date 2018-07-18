@extends('layouts.app')
<script type="text/javascript">
    // document.title = 'Admin Home Page!';
</script>

@section('content')

{{-- <div class="container-fluid"> --}}

    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success">
                You are logged in!
            </div>
        </div>
    </div> --}}


    {{-- @if (count($questions) > 0)
        @foreach ($questions as $question)
            <p>{{ $question }}</p>
        @endforeach
    @else
        <p>You have not created any questions</p>
    @endif --}}
    {{-- {{ $user_id }} --}}
    {{-- {{ $questions }} --}}

<main id="adminPage" class="container-fluid">
{{-- {{ auth()->user()->user_privilege }} --}}
    <h1>Admin Home Page!</h1>

@if (auth()->user()->user_privilege >= 3)
    <div class="row">
        {{-- panels --}}
        <div class="col-md-3 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Number of Questions</h3>
                </div>
                <div class="panel-body">
                    <p class="user-question-count">{{ count($questions) }} Questions</p>
                    <p class="user-answer-count">{{ $answers }} Answers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Total Users</h3>
                </div>
                <div class="panel-body">
                    <p>{{ $total_users }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-push-1">
            <p class="add-btn-container"><a href="/admin/add-question" role="button" class="btn btn-primary">Add Question</a></p>
        </div>
    </div>


    {{-- <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Number of Questions</h3>
        </div>
        <div class="panel-body">

        </div>
    </div> --}}

    @if (count($questions))
        @foreach ($questions as $question)
            <div class="question_box">
        		<p class="question_number">Question Number: {{ $question['id'] }} </p>
                <p class="edit-question">
        			<a href="/admin/edit-question/{{ $question['id'] }}">✎</a>
        		</p>
                <p>{{ $question['question'] }}</p>
            </div>
        @endforeach

        {{-- {{ $questions->links() }} --}}
        <div class="container">
            {{ $questions->links() }}
        </div>
    @else
        <h4 class="no-user-questions">You have not added any questions.</h4>
    @endif

@elseif (auth()->user()->user_privilege <= 2)
    <h3 class="no-user-privilege">You have not been approved to add any questions just yet. Please be patient...</h3>

@endif
</main>


{{-- </div> --}}
@endsection
