@extends('layout.layout')
@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/bus-details-for-normal-dd.css')}}">
</head>

    <div class="content-container">
        <div class="bus-details-page-container">
            <section class="header-sec">
                <h2 id="heading">Add a Bus Details</h2>
                <hr>
            </section>
            <section class="picture-sec">
                <div class="bus-picture-container">
                    <img src="{{URL::asset('Images/normal-bus-type-icon.PNG')}}" class="bus-type-icon" alt="#">
                </div>
                <div class="label-container">
                    <span id="bus-type-label">Normal Bus</span>
                </div>
            </section>
            <section class="data-sec">
                <div class="layer-data-container">
                    <form method="POST" action="{{route('submit.add-a-bus-details',[$package['username'],$package['bus_username']])}}"> 
                        @csrf
                        <div class="layer-label-container">
                            <label id="layer-label">Lower Layer</label>
                        </div>
                        <table>
                            <tr>
                                <td>Number of seats</td>
                                <td>
                                    <input type="number" name="number-of-seats" id="number-of-seats">
                                </td>
                            </tr>
                            <tr>
                                <td>Select Seat Type</td>
                                <td>
                                    <div class="seat-types-container">

                                        <div id="fix-seat-option" class="seat-types-options">
                                            <img src="{{URL::asset('Images/icons/fix-seat.png')}}" alt="#" height="28px" width="28px">
                                            <div id="seat-type">Fix Seat</div>
                                            <input type="radio" name="bus-seat-types" id="fix-seat-radio" value="fix-seat" checked>
                                        </div>

                                        {{-- <div id="comfortable-seat-option" class="seat-types-options">
                                            <img src="{{URL::asset('Images/icons/comfertable-seat.png')}}" alt="#" height="28px" width="22px">
                                            <div id="seat-type">Comfertable Seat</div>
                                            <input type="radio" name="bus-seat-types" id="comfortable-seat-radio">
                                        </div> --}} 

                                        {{-- {{ $package['username'] }} --}}
                                        
                                        <div id="berth-seat-option" class="seat-types-options">
                                            <img src="{{URL::asset('Images/icons/berth-seat.png')}}" alt="#" height="28px" width="46px">
                                            <div id="seat-type">Berth Seat</div>
                                            <input type="radio" name="bus-seat-types" id="berth-seat-radio" value="berth-seat">
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="button-container">
                            <button id="next-button" type="submit">next</button>
                        </div>
                    </form>
                </div>
            </section>
            
        </div>
    </div>
        
@endsection
