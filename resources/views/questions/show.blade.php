@extends('template')

@section('content')

    <div class="container">
        <h1>{{ $question->title }}</h1>
        <p class="lead">
            {{ $question->description }}
        </p>
        <p>
            Submited By: {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
        </p> 
        @if (Auth::id())
        <div class="btn-group btn-group-sm">
            <form action="{{ route('questions.edit', $question->id ) }}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Edit</button>
            </form>
            <form action="{{ route('questions.destroy', $question->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
        </div>
        @endif
        <hr>

        <!-- display all of the answers for this question -->
        @if ($question->answers()->count() > 0)
        @foreach($question->answers as $answer)
           <div class="panel panel-default">
            <div class="panel-body">
                <p>
                    {{ $answer->content }}
                </p>
                <h6>Answered By: {{$answer->user->name}},  {{ $question->created_at->diffForHumans() }}</h6>
            </div>
           </div>
           @if (Auth::id())
        <div class="row">
            <div class="col-md-3">
            <form action="{{ route('answers.edit', $answer->id ) }}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Edit</button>
            </form>
            </div>
            <div class="col-md-9">
            <form action="{{ route('answers.destroy', $answer->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </div>
        </div>
        @endif


        @endforeach
        @else
            <p>There are no answers to this question yet.</p>
        @endif
       
        <hr>
        <!-- display the form,to submit a new answer -->
        <form action="{{ route('answers.store') }}" method="POST">
            {{ csrf_field() }}
 
            <h4>Submit Your Own Answer:</h4>
            <textarea  class="form-control" name="content" rows="4"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id">
            <button class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
@endsection