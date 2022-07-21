@extends('template')

@section('content')
<div class="container">
<!-- <img src="{{ asset('storage/'.$user->profile_pic) }}" alt="no pic" class="img-rounded pull-right" style="max-height:100px;"> -->
<img src="{{ $user->profile_pic }}" alt="no pic" class="img-rounded pull-right" style="max-height:100px;">
<h1>{{ $user->name }}'s Profile</h1>
<p>
    See what {{ $user->name }} has been up to on LaravelAnswers.
</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <h3>Questions</h3>
        <!--Display all the questions that this user submited. -->
        @foreach($user->questions as $question)    
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>{{ $question->title }}</h4>
                    <p>
                        {{ $question->desctiption }}
                    </p>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-link">view Question</a>
                </div>
            </div>

        @endforeach

    </div>
    <div class="col-md-6">
    <h3>Answers</h3>
        <!--Display all the answers that this user submited. -->
        @foreach($user->answers as $answer)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $answer->question->title }}
                </div>
                <div class="panel-body">
                    <p>
                        <small>{{ $user->name }}'s answer:</small><br>
                        {{ $answer->content }}
                    </p>
                    <a href="{{ route('questions.show', $answer->question->id) }}" class="btn btn-sm btn-link">View all answers to this question</a>
                </div>
            </div>
        @endforeach
    </div>

</div>

</div>
@endsection