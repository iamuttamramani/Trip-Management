@extends('layout.layout')

@section('content')
<head>
    <link rel="stylesheet" href="{{URL::asset('css/home.css')}}">
</head>
<div class="content-container">
    <section class="overview-section">
        {{-- Overview Tables Section --}}

        <h3 class="heading-of-section">Overview</h3> {{-- Heading of section --}}
        <div class="overview-table-box">
            <div class="table-container">
                {{-- Daily Data Table --}}
                <div class="table-label"> Today </div> {{-- heading of the table --}}
                <table>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Expected Trips</span>
                                <img src="{{URL::asset('Images/icons/Expected-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="today-expected-trips-value">{{$expectedToday}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Trips in Progress</span>
                                <img src="{{URL::asset('Images/icons/trips-in-progress-icon.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="today-trips-in-progress-value">{{$inProgressToday}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Completed Trips</span>
                                <img src="{{URL::asset('Images/icons/completed-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="today-trip-are-completed-value">{{$completedToday}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Upcoming Trips</span>
                                <img src="{{URL::asset('Images/icons/upcoming-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td >
                            <div class="table-value" id="today-upcoming-trips-value">{{$upcomingToday}}</div>
                        </td>
                    </tr>
                </table>
                
            </div>
            <div class="table-container">
                {{-- Monthly Data Table --}}
                <table>
                    <div class="table-label"> This Month </div> {{-- heading of the table --}}
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Expected Trips</span>
                                <img src="{{URL::asset('Images/icons/Expected-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="monthly-expected-trips-value">{{$expectedMonth}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Pending Trips</span>
                                <img src="{{URL::asset('Images/icons/pending-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="monthly-pending-trips-value">{{$pendingMonth}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Completed Trips</span>
                                <img src="{{URL::asset('Images/icons/completed-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="monthly-completed-trip-value">{{$completedMonth}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-subject-container">
                            <div class="table-subject">
                                <span>Expected Revenue</span>
                                <img src="{{URL::asset('Images/icons/Expected-trips.png')}}" alt="" class="visual-sign">
                            </div>
                        </td>
                        <td>
                            <div class="table-value" id="monthly-expected-revenue-value">₹{{$expectedRevenue}}</div>
                        </td>
                    </tr>
                </table>
    
            </div>
            
        </div>
    </section>
    
    <section class="bus-schedule">
        {{-- BUS Schedule Tables Section --}}
        <h3 class="heading-of-section">Bus Schedule</h3> {{-- Heading of section --}}
        {{-- <div class="table-container"> --}}
            <table id="bus-schedule-table">
                <tr>
                    <th class="table-label">BUS NAME</th>
                    <th>ROUTE</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    {{-- <th>STATUES</th> --}}
                </tr>
                @foreach ($busSchedule as $bus)
                    
                <tr>
                    <td class="bus-name">
                        {{$bus -> bus_name }}                     
                    </td>
                    <td>
                        <span class="base-location">{{$bus -> from }}</span>
                        <span>-</span>
                        <span class="destination">{{$bus -> to }}</span>
                    </td>
                    <td>
                        <div class="departure-time">
                            {{-- <span class="hour">12</span>:
                            <span class="minute">12</span>
                            <span class="am-pm">AM</span> --}}
                            <span>{{$bus -> deprature_time }}</span>
                        </div>
                        <div class="departure-date">
                            {{-- <div class="date">99</div>-
                            <div class="month">99</div>-
                            <div class="year">9999</div> --}}
                            <div style="width: 100%; text-align:center">{{$bus -> deprature_date }}</div>
                        </div>
                    </td>
                    <td>
                        <div class="arrival-time">
                            {{-- <span class="hour">12</span>:
                            <span class="minute">12</span>
                            <span class="am-pm">AM</span> --}}
                            <span>{{$bus -> arrival_time }}</span>
                        </div>
                        <div class="arrival-date" style="text-align: center">
                            {{-- <div class="date">99</div>-
                            <div class="month">99</div>-
                            <div class="year">9999</div> --}}
                            <div style="width: 100%; text-align:center">{{$bus -> arrival_date }}</div>
                        </div>
                    </td>
                    {{-- <td>~ Nearing Destination</td> --}}
                </tr>
                @endforeach
            </table>
        {{-- </div> --}}
    </section>
</div>    
<script>
    function autoRefresh() {
        window.location = window.location.href;
    }
    // setInterval('autoRefresh()', 1000);
</script>
@endsection