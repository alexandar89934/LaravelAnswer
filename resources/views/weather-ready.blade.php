@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>{{ $address->formatted_address }}</h3>
            <hr>

            <p>
               Summary: {{ $weather->weather[0]->description }}
            </p>
            <ul>
                <li>Current Temp: {{ $weather->main->temp }}</li>
                <li>Feels Like:  {{ $weather->main->feels_like }}</li>
                <li>Wind Speed: {{ $weather->wind->speed }}</li>
            </ul>

        </div>
    </div>
</div>

@endsection
