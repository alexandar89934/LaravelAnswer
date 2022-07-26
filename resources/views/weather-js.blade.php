@extends('template')



@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" v-if="step == 1">
            <h3>Enter an Address to get Weather</h3>
            <hr>

            <form>


                <input type="text" name="location" style="margin: 20px 0;" class="form-control" placeholder="Enter a Zipcode or Address" v-model="userInput">
                <button class="btn btn-primary" style="width:100%;" v-on:click.prevent="getWeather" v-show="userInput">Get Weather</button>

            </form>

        </div>

        <div class="col-md-6 col-md-offset-3" v-if="step == 2">
            <h3>@{{googleAddress.formatted}}</h3>
            <hr>

            <ul>
                <li>Lat: @{{googleAddress.lat}}</li>
                <li>Lng: @{{googleAddress.lng}}</li>
            </ul>



            <p>
                @{{ darksky.summary }}
            </p>
            <ul>
                <li>Current Temp: @{{ darksky.temp }}</li>
                <li>Feels Like: @{{ darksky.feelsLikeTemp }}</li>
                <li>Wind Speed: @{{ darksky.windSpeed }} mph</li>
            </ul>

        </div>


    </div>
</div>

@endsection
@section('scripts')
<script>

    var app = new Vue({
            el: '#app',
            data: {
                step: 1;
                userInput: '',
                googleAddress: {
                    formatted: '',
                    lat: '',
                    lng: ''
                },
                darksky: {
                    summary: '',
                    temperature: '',
                    feelsLikeTemp: '',
                    windSpeed: ''
                }
            },
            methods: {
                getWeather: function() {
                    this.step = 2;
                    let vm = this;
                    axios.get('https://maps.googleapis.com/maps/api/geocode/json?', {
                        params: {
                            address: vm.userInput
                        }
                    }).then(function(response){
                        let res = response.data.results[0];
                        vm.googleAddress.formatted = res.formatted_address;
                        vm.googleAddress.lat = res.goemetry.location.lat;
                        vm.googleAddress.lng = res.goemetry.location.lng;


                        
                        const darkskyApi = '{{ env('WEATHER_API') }}';
                        const corsAnywhere = 'https//cors-anywhere.herokuapp.com/';
                        const url = `${corsAnywhere}https://api.openweathermap.org/data/2.5/weather?lat=`${res.goemetry.location.lat},${res.goemetry.location.lng},${darkskyApi}
                        return axios.get(url);
                    }).then(function(response){
                        let res2 = response.data;
                        vm.darksky.summary = res2.currently.summary;
                        vm.darksky.temp = res2.currently.temperature;
                        vm.darksky.feelsLikeTemp = res2.currently.apparentTemperature;
                        vm.darksky.windSpeed = res2.currently.windSpeed;

                    })
                }
            }
        });

</script>
@endsection
