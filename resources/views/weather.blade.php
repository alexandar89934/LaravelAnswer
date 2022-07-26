@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Enter an Address to get Weather</h3>
            <hr>

            <form action="{{ route('weather') }}" method="post">
            {{ csrf_field() }}

                <input type="text" name="location" style="margin: 20px 0;" class="form-control" placeholder="Enter a Zipcode or Address">
                <input type="submit" class="btn btn-primary" value="Get Weather" style="width:100%;">

            </form>

        </div>
    </div>
</div>

@endsection
