@extends('layout.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{URL::asset('css/booking-page.css')}}">
    </head>

    <div class="content-container">
        <div class="booking-manage-page">
            {{-- Heading --}}
            <section class="heading-sec">
                <h1 class="page-heading">Book Seat</h1>
            </section>
            {{-- Page Top Bar --}}
            <section class="main-sec">
                <section class="trip-infobar-sec">
                    <table>
                        <tr class="trip-info-title" >
                            <td class="route"> {{$trip->from}} to {{$trip->to}} </td>
                            <td> Dept.Time </td>
                            <td> Origin </td>
                            <td> Destination </td>
                            <td> Duration </td>
                            <td> Fare </td>
                        </tr>
                        <tr class="trip-data-row">
                            <td> {{$trip->deprature_date}} </td>
                            <td> {{$trip->deprature_time}}</td>
                            <td> {{$trip->from}}</td>
                            <td> {{$trip->to}}</td>
                            <td> {{$trip->arrival_time}}</td>
                            <td> ₹{{$trip->price}}</td>
                        </tr>
                    </table>
                    {{-- <div class="booking-btn-container">
                        <a href="/book/{{$trip->id}}">
                            <div class="booking-btn">Book</div>
                        </a>
                    </div> --}}
                </section>
                {{-- Page Main Content --}}
                <div class="main-content">
                    {{-- Bus Seating Layouts --}}
                    <section class="layout-sec">
                        {{-- This is Layout Section --}}
                        @php
                            $id=0;
                            $seatIds = json_decode($bus->seatsIds,true);
                            // $bookedSeatsIds = json_decode($trip->booked_seats,true);
                            $bookedSeatsIds = (json_decode($trip->booked_seats,true) !== 0) ? json_decode($trip->booked_seats,true) : [];
                        @endphp
                        <h3 class="layout-heading">Select Seats </h3>
                        <div class="full-bus-layout">
                            <div class="lower-deck-layout layout">
                                {{-- Lower Deck --}}
                                
                                <div class="layout-container">
                                    <div class="driver-section">
                                        <img src="{{URL::asset('Images/icons/driver-sign.png')}}" alt="">
                                    </div>
                                    @for ($row = 1; $row <= 6; $row++)
                                    <div class="row">
                                        <div class="left-seats">
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="middle-seats">
                                            @if ($row > 3)
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="right-seats">
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    <div class="layer-label">Lower layer</div>
                                </div>
                            </div>
                            <div class="upper-deck-layout layout">
                                {{-- Lower Deck --}}
                                
                                <div class="layout-container">
                                    <div class="driver-section">
                                        
                                    </div>
                                    @php

                                    @endphp
                                    @for ($row = 1; $row <= 6; $row++)
                                    <div class="row">
                                        <div class="left-seats">
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="middle-seats">
                                            @if ($row > 3)
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="right-seats">
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                            <div class="seat" id="{{++$id}}">
                                                <label for="check-{{$id}}">
                                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                                    <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                                    <input type="checkbox" name="" id="check-{{$id}}" value="{{$id}}" {{(in_array($id,$bookedSeatsIds)) ? 'disabled' : '' ;}} >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    <div class="layer-label">Upper layer</div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Booking Form --}}
                    <section class="booking-sec">
                        <section class="form-container">
                            <h3 class="form-heading"> Passenger Details </h3> 
                            <form action="{{route('booking.store',[ 'trip-id' => $trip->id, 'bus-id' => $bus->id])}}" method="POST">
                                @csrf
                                {{-- Selected Seats Array Script to Laravel --}}
                                <input type="hidden" name="selected-seats" id="selectedSeatsInput">
                                <input type="hidden" name="fare" id="fare">

                                <div class="field name-con">
                                    {{-- Passenger Name field --}}
                                    <img src="{{URL::asset('Images/Icons/user-icon.png')}}" alt="passenger-icon" class="passenger-icon">
                                    <input type="text" name="passenger-name" id="passenger-name" placeholder=" Full Name " required>
                                </div>

                                <div class="field email-con">
                                    {{-- Email field --}}
                                    <img src="{{URL::asset('Images/Icons/email-icon.png')}}" alt="passenger-icon" class="passenger-icon">
                                    <input type="email" name="email" id="email" placeholder=" Email "  required>
                                </div>

                                <div class="field mobile-con">
                                    {{-- Mobile field --}}
                                    <img src="{{URL::asset('Images/Icons/phone-icon.png')}}" alt="passenger-icon" class="passenger-icon">
                                    <input type="text" name="mobile" id="mobile" placeholder=" Mobile No "  required>
                                </div>

                                <div class="field age-con">
                                    {{-- Age field --}}
                                    <img src="{{URL::asset('Images/Icons/calendar-icon.png')}}" alt="passenger-icon" class="passenger-icon">
                                    <select name="age" id="age-select" class="age-select" required>
                                        <option disabled selected >Select Age </option>
                                        @for ($i = 14; $i < 100; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>

                                {{-- <div class="field seat-no-con">
                                    <label>Selected Seats ()</label>
                                </div>
                                <div class="field fare-con">
                                    <label>Fare : INR. 59,000</label>
                                </div> --}}
                                <table class="data-table">
                                    <tr>
                                        <td class="title">Selected Seats</td>
                                        <td id="selected-seat-show"> 0 </td>
                                    </tr>
                                    <tr>
                                        <td class="title">Fare</td>
                                        <td id="total-trip-fare">0</td>
                                    </tr>
                                </table>

                                <div class="button-container">
                                    <button type="submit" class="book-btn">Book</button>
                                </div>
                            </form>
                        </section>
                    </section>
                </div>
            </section>
            <section class="footer-sec">

            </section>
        </div>
    </div>
    
    <script>
        const seatImages = document.querySelectorAll('.seat-image');
        const busSeatsId = @json($seatIds);
        const checkboxSeatsIn = document.querySelectorAll('input[type="checkbox"]');
        const seats = document.querySelectorAll('.seat');
        // const bookedSeatsIds = @json($trip->booked_seats); // Booked Ids in array
        const bookedSeatsIds = @json($bookedSeatsIds); // Booked Ids in array
        const fareField = document.getElementById('fare');
        let selectedSeats = [];

        function fareAndSeatsUpdate () {
            // ahithi baki chhe. aa call thay atle form ma real time data update thavu joiye
            // uttamGeneratedError239at,booking-page.blade.php
            const SelectedSeatView = document.getElementById('selected-seat-show');
            const fareView =  document.getElementById('total-trip-fare');
            // SelectedSeatView.innerText = selectedSeats;
            SelectedSeatView.innerText = (selectedSeats == "") ? "0" : selectedSeats;
            fareView.innerText = "₹" + @json($trip->price) * selectedSeats.length;
            fareField.setAttribute('value',@json($trip->price) * selectedSeats.length);
        }

        function fetchSeatNumber(seatId) {
            let parts = seatId.split('-');
            return parts[1];
        }

        // Build Layout Accourding to bus Layout , Other seats to be set as hide using display : none
        seats.forEach(seat => {
            if (!(busSeatsId.includes((seat.id)))) {
                seat.style.display = 'none';
            }
        });


        // console.log(bookedSeatsIds);

        // bookedSeatsIds.forEach(seatId => {
        //     const seatNum = fetchSeatNumber(seatId);
        //     // console.log(seatNum);
        //     if (busSeatsId.includes(seatNum)) {
        //         console.log(seatNum + "Maja kr halse");
        //     }
        // });

        // console.log(seatImages);

        // Initial Check, How many Seats are Already Booked ?
        seatImages.forEach(seatImg => {
            const seatNum = fetchSeatNumber(seatImg.id);
            // console.log(seatNum);
            const response = bookedSeatsIds.includes(seatNum);
            if (response) {
                console.log('seat is already booked');
                seatImg.style.backgroundColor = '#1b4965';
                // seatImg.style.backgroundColor = 'rgba(0,0,0,0.3)';
                seatImg.style.opacity = '0.6';
                
                // Booked seat id color = #fff
                let perent = seatImg.closest('.seat');
                // let checkbox = parent.querySelector('input');
                // checkbox.setAttribute('Disabled');
                let seatLabel = perent.querySelector('.seat-label');
                seatLabel.style.color = '#fff';
            }
        });

        // Seat Select -> Image Bg Change , Unselect
        checkboxSeatsIn.forEach(checkbox => {
            checkbox.addEventListener('change', event => {

                const seatId = checkbox.defaultValue;
                let parent = checkbox.closest('.seat');
                let seatImage = parent.querySelector('.seat-image');
                let seatLabel = parent.querySelector('.seat-label');

                if (event.target.checked) {
                    seatImage.style.backgroundColor = "#1b4965";
                    seatLabel.style.color = "#fff";
                    selectedSeats.push(seatId);
                    console.log(selectedSeats);
                    fareAndSeatsUpdate();
                } else {
                    seatImage.style.backgroundColor = "";
                    seatLabel.style.color = "#000";
                    if (selectedSeats.includes(seatId)) {
                        selectedSeats = selectedSeats.filter(value => value !== seatId );
                    }                    
                    console.log(selectedSeats);
                    fareAndSeatsUpdate();
                }
                document.getElementById('selectedSeatsInput').value = JSON.stringify(selectedSeats);
            })
        });

    </script>
    

@endsection