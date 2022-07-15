@extends('template')

@section('content')

    <div class="container">
      <h1>Update a Answer</h1>
      <hr />
      <form action="{{ route('answers.update', $answer->id) }}" method="POST">
      @method('PATCH')
      {{ csrf_field() }}
     
        <h4>Update Answer:</h4>
        <textarea  class="form-control" name="content" rows="4">{{ $answer->content }}</textarea>
            <button class="btn btn-primary">Submit</button>
      </form>
    </div>
       

@endsection

