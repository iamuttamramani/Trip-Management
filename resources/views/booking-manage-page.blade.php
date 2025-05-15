@extends('layout.layout')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/booking-manage-page.css')}}">
    </head>

    <div class="content-container">
        <div class="booking-manage-page">
            {{-- Heading --}}
            <section class="heading-sec">
                <h1 class="page-heading">Manage Bookings</h1>
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
                    <div class="booking-btn-container">
                        <a href="/book/{{$trip->id}}">
                            <div class="booking-btn">Book</div>
                        </a>
                    </div>
                </section>
                {{-- Page Main Content --}}
                <div class="main-content">
                    {{-- Bus Seating Layouts --}}
                    <section class="layout-sec">
                        {{-- This is Layout Section --}}
                        @php
                            $id=0;
                            $seatIds = json_decode($bus->seatsIds,true);
                        @endphp
                        <h3 class="layout-heading">Overview</h3>
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
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                        </div>
                                    </div>
                                    <div class="middle-seats">
                                        @if ($row > 3)
                                            <div class="seat" id="{{++$id}}">
                                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" style="opacity: 0.8">
                                                <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="right-seats">
                                        <div class="seat" id="{{++$id}}">
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                        </div>
                                        <div class="seat" id="{{++$id}}">
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
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
                                @for ($row = 1; $row <= 6; $row++)
                                <div class="row">
                                    <div class="left-seats">
                                        <div class="seat" id="{{++$id}}">
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                        </div>
                                    </div>
                                    <div class="middle-seats">
                                        @if ($row > 3)
                                            <div class="seat" id="{{++$id}}">
                                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" style="opacity: 0.8">
                                                <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="right-seats">
                                        <div class="seat" id="{{++$id}}">
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                        </div>
                                        <div class="seat" id="{{++$id}}">
                                            <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="seatImg-{{$id}}" class="seat-image" alt="" >
                                            <div class="seat-label" id="label-{{$id}}"> {{$id}} </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                <div class="layer-label">Upper layer</div>
                            </div>
                        </div>
                    </section>
                    {{-- User Booking Table --}}
                    <section class="booking-table-sec" id="uttam">
                        <section class="table-container">
                            <h3 class="table-heading"> Manage Users</h3> 
                            <table>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Seat <br> No</th>
                                    <th>Fare</th>
                                    <th>Status</th>
                                    <th>Booked <br> By</th>
                                    <th>Payment <br> Mode</th>
                                    <th>tran. Id</th>
                                    <th>Contact</th>
                                </tr>
                                @php
                                    $no = 0;
                                @endphp

                                @if ($bookings !== null)
                                    @foreach ($bookings as $booking)
                                    @php
                                        $booked_ids = json_decode($booking->booked_seat_ids);
                                        $comma = false;
                                    @endphp
                                    
                                        <tr>
                                            <td>{{++$no;}}</td>
                                            <td>{{$booking->passenger_name}}</td>
                                            {{-- <td>{{$booking->booked_seat_ids}}</td> --}}
                                            <td>
                                                @foreach ($booked_ids as $id)
                                                    {{ ($comma) ? ',' : '' ;}}
                                                    {{ $id }}
                                                    @php
                                                        $comma = true;
                                                    @endphp
                                                @endforeach
                                            </td>
                                            <td>{{$booking->fare}}</td>
                                            <td>{{$booking->booking_status}}</td>
                                            <td>{{$booking->booked_by}}</td>
                                            <td>{{$booking->payment_mode}}</td>
                                            <td>{{($booking->transaction_id === "") ? "-" : $booking->transaction_id;}}</td>
                                            <td>
                                                {{$booking->mobile_no}}<br>
                                                {{$booking->host_username}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- have all bookings ne get karine foreach thi show karvana chhe. + no column add karvani chhe view table ma --}}

                                @endif
                                {{-- @for ($i = 0; $i < 2; $i++ )
                                <tr>
                                    <td>Uttam Ramani</td>
                                    <td>1,2,3,4,5</td>
                                    <td>4,000</td>
                                    <td>Booked</td>
                                    <td>Owner</td>
                                    <td>Cash</td>
                                    <td>N/A</td>
                                    <td>
                                        +91 95108 94941 <br>
                                        ramaniuttam412@gmail.com
                                    </td>
                                </tr>
                                @endfor  --}}
                            </table>
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
        const bookedSeatsIds = @json(json_decode($trip->booked_seats)); // Booked Ids in array
        
        function fetchSeatNumber(seatId) {
            let parts = seatId.split('-');
            return parts[1];
        }

        function isInArray(value,arr) {
            // console.log(arr.length);
            for (let i = 0; i < arr.length; i++) {
                const arrayValue = arr[i];
                console.log( )
                if (arrayValue === value){
                    return true;
                }
            }
            return false;
        }

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

        seatImages.forEach(seatImg => {
            const seatNum = fetchSeatNumber(seatImg.id);
            // const response = bookedSeatsIds.includes(seatNum);
            const response = isInArray(seatNum,bookedSeatsIds);

            if (response) {
                console.log('seat is already booked' + seatNum);
                seatImg.style.backgroundColor = '#1b4965';
                
                // Booked seat id color = #fff
                let perent = seatImg.closest('.seat');
                let seatLabel = perent.querySelector('.seat-label');
                seatLabel.style.color = '#fff';
            }
        });
        
        // bookedSeatsIds.forEach( seatId => {
        //     console.log(seatId);
        // });

        console.log(bookedSeatsIds);
        

    </script>

@endsection