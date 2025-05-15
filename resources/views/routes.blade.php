@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/routes.css')}}">
</head>

    <div class="content-container">

        <div class="routes-container">
            <div class="page-header">
                <div>
                    {{-- we don't have any data to show here, so blank --}}
                </div>
                <div class="heading-container">
                    <h3 class="heading">Bus Routes</h3>
                </div>
                <div class="date-of-routes-container">
                    <label for="date-for-routes">Date</label>
                    <input type="date" name="" id="date-for-routes">
                </div>
            </div>
            <div class="route-picker-container">
                <form action="" class="route-picker">
                    <label for="base-location">Find Bus</label>
                    <input type="text" name="base-location" id="base-location" placeholder="From" >
                    <input type="text" name="destination" id="destination" placeholder="To">
                    <button type="submit">search</button>
                </form>
            </div>
            <div class="routes-table-container">
                <table class="routes-table"> 
                    <tr class="heading-row">
                        <th>BUS</th>
                        <th>From</th>
                        <th>To</th>
                        {{-- <th>Pickup points</th>
                        <th>Dropping Points</th>
                        <th>Driver</th> --}}
                        <th>bookings</th>
                        {{-- <th>Visibility</th> --}}
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($todayTrips as $trip)
                        
                    <tr>
                        <td class="bus-cell">
                            <img src="{{URL::asset('Images/bus.jpg')}}" class="bus-picture" alt="Bus Image">
                            <div class="bus-name">{{ $trip['bus_name'] }}</div>
                            <div class="bus-number">{{ $trip['bus_number'] }}</div>
                        </td>
                        <td class="from-cell">
                            <div class="place">{{ $trip['from'] }}</div>
                            <div class="time">{{ $trip['deprature_time'] }}</div>
                            <div class="date">{{ $trip['deprature_date'] }}</div>
                        </td>
                        <td class="to-cell">
                            <div class="place">{{ $trip['to'] }}</div>
                            <div class="time">{{ $trip['arrival_time'] }}</div>
                            <div class="date">{{ $trip['arrival_date'] }}</div>
                        </td>
                        {{-- <td class="pickup-points-cell">
                            <div class="pickup-drop-point">
                                <div class="place">Jasdan</div>
                                <div class="time">02:00 PM</div>
                            </div>
                            <div class="pickup-drop-point">
                                <div class="place">Aji dem</div>
                                <div class="time">02:20 PM</div>
                            </div>
                            <div class="sign-container">
                                <img src="{{URL::asset('Images/icons/down-arrow-sign.png');}}" class="see-all-points" alt="All Pickup Points List">
                            </div>
                        </td>
                        <td class="dropping-points-cell">
                            <div class="pickup-drop-point">
                                <div class="place">Jasdan</div>
                                <div class="time">03:50 PM</div>
                            </div>
                            <div class="pickup-drop-point">
                                <div class="place">Nyay Mandir</div>
                                <div class="time">03:45 PM</div>
                            </div>
                            <div class="sign-container">
                                <img src="{{URL::asset('Images/icons/down-arrow-sign.png');}}" class="see-all-points" alt="All Dropping Points List">
                            </div>
                        </td> 
                        <td class="driver-cell">
                            <img src="{{URL::asset('Images/UttamRamani.jpg');}}" class="driver-picture" alt="Driver Photo">
                            <div class="driver-name">Vanrajsign Yadavsinhji vadhvana</div>
                            <div class="driver-id">@vanrajsinhranasignyadavji</div>
                        </td>--}}
                        <td class="bookings-cell">
                            <div class="no-of-bookings">
                                <span id="booked-seats">{{$trip['booked_seats_count']}}</span>
                                <span id="total-seats">/ {{$trip['total_seats']}}</span>
                            </div>
                            <div class="button-container">
                                {{-- <button>Manage</button> --}}
                                <a href=" {{route('booking.manage',['trip_id' => $trip->id])}}" class="manage-btn">
                                    Manage
                                </a>
                            </div>
                        </td>
                        {{-- <td class="visibility-cell">
                            <label class="visibility-switch">
                                <input type="checkbox" id="status-input">
                                <span class="slider round"></span>
                            </label>
                            <div class="visibility-mode">Private</div>
                        </td> --}}
                        <td class="Update-cell">
                            <img src="{{URL::asset('Images/Edit.png');}}" alt="" height="20px">
                        </td>
                        <td class="Delete-cell">
                            <img src="{{URL::asset('Images/delete.png');}}" alt="" height="20px">
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="create-route-container">
                <div class="sign" onclick="addTrip()">+</div>
            </div>
        </div>

    </div>
    <script>
        function addTrip() {
            window.location.href = " {{ route('trip.create') }} ";
        }
        
        document.getElementById('status-input').addEventListener('change', function () {
            alert('Status is now: ' + (this.checked ? 'Checked' : 'Unchecked'));
        });
</script>
        
    </script>
@endsection

