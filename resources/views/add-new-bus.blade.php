@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/add-new-bus.css')}}">
</head>

<div class="content-container">
    <div class="bus-form-container">
        <div class="form-header">
            <h2 id="form-heading">Add a New Bus</h2>
        </div>
        <hr>
        <div class="main-section">
            <section class="left-porsion">
                <div class="bus-picture-container">
                    <img src="{{URL::asset('Images/bus-picture.png')}}" id="bus-picture" alt="Bus Image">
                </div>
            </section>
            <section class="right-porsion">
                <form action="{{route('insert.data')}}">
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    <div class="bus-name-container field">
                        <label for="bus-name">Bus Name</label><br>
                        <input type="text" name="bus_name" id="bus-name">
                    </div>
                    <div class="bus-number-container field">
                        <label for="state-code">Bus No</label>
                        <div class="bus-number">
                            <input type="text" name="state_code" id="state-code">
                            <input type="text" name="region_code" id="region-code">
                            <input type="text" name="vehicle_alfa_code" id="vehicle-alfa-code">
                            <input type="text" name="vehicle_num_code" id="vehicle-num-code">
                        </div>
                    </div>
                    <div class="bus-type-container field">
                        <label>Bus Type</label>
                        <div class="bus-type">
                            <div class="normal-bus-container bus-type-option">
                                <img src="{{URL::asset('Images/normal-bus-type-icon.PNG')}}" id="#" alt="#" height="30px">
                                <span id="bus-type" style="text-align: center">Normal</span>
                                <input type="radio" name="bus_type" id="normal-bus" value="normal-bus" checked> {{-- input name changed --}}
                            </div>
                            <div class="dd-bus-container bus-type-option">
                                <img src="{{URL::asset('Images/double-decker-bus-icon.PNG')}}" id="#" alt="#" height="30px">
                                <div id="bus-type">Double Decker</div>
                                <input type="radio" name="bus_type" id="double-decker-bus" value="double-decker-bus"> {{-- input name changed --}}
                            </div>
                        </div>
                    </div>
                    <div class="field number-of-seats-field">
                        <label for="number_of_seats">Number of Seats</label>
                        <input type="text" name="number_of_seats" id="number_of_seats" max="16">
                    </div>
                    <div class="button-container field">
                        <button id="next-button" type="submit">Next</button>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>

<script>
    const totalSeatsIn = document.querySelectorAll('input[name="bus_type"]');
    const seatInput = document.getElementById('number_of_seats');

    seatInput.addEventListener('change',() => {
        totalSeatsIn.forEach( (radio) => {
            if(radio.value === 'double-decker-bus' && radio.checked === true && seatInput.value > 38) {
                alert('Double Decker bus can have max 38 seats');
                seatInput.value = 38;
            } else if (radio.value === 'normal-bus' && radio.checked === true && seatInput.value > 19) {
                alert('Normal bus can have max 19 seats');
                seatInput.value = 19;
            }
        });
    });
</script>

@endsection