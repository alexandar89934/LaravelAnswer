@extends('template')

@section('content')
<div class="container">
  <h1>Contact Us</h1>

  <form action="{{ route('contact') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control"> 
    </div>

    
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control"> 
    </div>


   
    <div class="form-group">
        <label for="">Subject</label>
        <input type="text" name="subject" class="form-control"> 
    </div>



    

    <div class="form-group">
        <label for="">Message</label>
        <textarea class="form-control" name="message" rows="5"></textarea>
    </div>


    <input type="submit" class="btn btn-primary" value="Send Email">

  </form>
</div>
@endsection
