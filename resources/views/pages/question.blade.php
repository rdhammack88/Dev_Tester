@extends('layouts.app')

@section('content')
    {{ $question }}
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
    @endforeach
    {{-- $key[$value]['answer'] --}}


    {{-- {{ $table1 }}
    <br>
    {{ $table2 }}
    <br>
    {{ $table3 }} --}}


    <br><br><br>
    {{-- @foreach ($question as $key)
        {{ $key . ' -> ' . $question[$key] }}
        <br>
    @endforeach --}}

    {{-- @foreach ($question as $key => $value)
        {{ $key . ' -> ' . $key[$value] }}
    @endforeach --}}
@endsection
