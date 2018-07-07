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

    <h1>Admin Home Page!</h1>

    <p><a href="/admin/add-question" role="button" class="btn btn-primary">Add Question</a></p>

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
        <h4>You have not added in questions.</h4>
    @endif

</main>


{{-- </div> --}}
@endsection
