@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/buses.css')}}">
</head>

<div class="content-container">
    <div class="buses-container">
       
        @foreach ($myBuses as $bus)
            <div class="bus-card">
                <div class="bus-features-section">
                    <div class="seat-detail-container">
                        {{-- <div class="normal-seat-container seat-container">
                            <img src="{{URL::asset('Images/icons/normal-seat-icon.png')}}" alt="Normal Seat">
                            <span class="total-normal-seat-number seats">52</span>
                        </div> --}}
                        <div class="berth-seat-container seat-container">
                            <img src="{{URL::asset('Images/icons/berth-seat-icon.png')}}" alt="Berth Seat">
                            <span class="total-normal-seat-number seats">{{ $bus->seats }}</span>
                        </div>
                    </div>
                    {{-- <div class="bus-features-container">
                        <img src="{{URL::asset('Images/icons/Diesel-features.png')}}" alt="#Diesel Bus">
                        <img src="{{URL::asset('Images/icons/flex-seat-features.png')}}" alt="#Diesel Bus">
                        <img src="{{URL::asset('Images/icons/AC-features.png')}}" alt="#Diesel Bus">
                        <img src="{{URL::asset('Images/icons/Wi-Fi-features.png')}}" alt="#Diesel Bus">
                        <img src="{{URL::asset('Images/icons/CCTV-features.png')}}" alt="#Diesel Bus">
                    </div> --}}
                </div>
                <div class="bus-picture-section">
                    <div class="bus-picture-container">
                        <img src="{{URL::asset('Images/bus-picture.png')}}" class="bus-picture" alt="#Bus-picture">
                    </div>
                </div>
                <div class="bus-name-section">
                    <div class="bus-name">{{ $bus->bus_name }}</div>
                </div>
                <div class="bus-data-section">
                    <table>
                        <tr>
                            <td>Bus No</td>
                            <td>
                                {{ $bus->state_code }}
                                {{ $bus->region_code }}
                                {{ $bus->vehicle_alfa_code }}
                                {{ $bus->vehicle_num_code }}
                            </td>
                        </tr>
                        <tr>
                            <td>Bus Id</td>
                            <td>{{ $bus->busUsername }}</td>
                        </tr>
                        <tr>
                            <td>Owner Name</td>
                            <td>Sadgati</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>Inactive</td>
                        </tr>
                    </table>
                </div>
                <div class="update-button-section">
                    <a href="{{route('bus.update')}}"><button>Update</button></a>
                </div>
            </div>
        @endforeach
    </div>
        <a href="/add/bus">
            <button class="add-bus-container">
                <div class="sign">+</div>
            </button>
        </a>
</div>

<script>
    document.querySelector(".add-bus-container").addEventListener('click',() => {
        console.log('add bus button is clicked');
    })
</script>

@endsection