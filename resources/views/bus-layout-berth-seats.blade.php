@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/bus-layout-berth-seats.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="content-container">
    <div class="layout-page-container">
        <section class="header-sec">
            <h2 id="page-heading">Create a Bus Layout</h2>
            <hr>
        </section>
        @if(session('error'))
            <p>{{ session('error') }}</p>   
        @endif
        @if ($bus['bus_type'] === 'normal-bus' )
        <?php $id=0; ?>
        <section class="layout-sec">
            <div class="bus-layout-container">
                <div class="section-label">Base layer</div>
                <div class="layout-driver-sec">
                    <img src="{{URL::asset('Images/icons/driver-sign.png')}}" id="driver-sign" alt="#Driver-sign">
                </div>
                
                <div class="layout-seater-sec">
                    @for ($row = 1; $row <= 6; $row++)
                    <div class="row">
                        <div class="left-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                        <div class="middle-seats">
                            @if ($row > 3)
                                <div class="seat" id="">
                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" style="opacity: 0.8">
                                </div>
                            @endif
                        </div>
                        <div class="right-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="total-seats-container">
                    <div class="selected-seat" id="count-of-selected-seats">0</div>/<div class="selected-seat" id="number-of-total-seats">Total Seats</div>
                </div> 
            </div>
            
        </section>
        @endif
        @if ($bus['bus_type'] === 'double-decker-bus' )
        <?php $id=0; ?>
        <section class="layout-sec">
            <div class="bus-layout-container">
                <div class="section-label">Lower Deck</div>
                <div class="layout-driver-sec">
                    <img src="{{URL::asset('Images/icons/driver-sign.png')}}" id="driver-sign" alt="#Driver-sign">
                </div>
                
                <div class="layout-seater-sec">
                    @for ($row = 1; $row <= 6; $row++)
                    <div class="row">
                        <div class="left-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                        <div class="middle-seats">
                            @if ($row > 3)
                                <div class="seat" id="">
                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" style="opacity : 0.8" >
                                </div>
                            @endif
                        </div>
                        <div class="right-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                {{-- <div class="total-seats-container">
                    <span class="selected-seat" id="count-of-selected-seats">0</span>/<span class="selected-seat" id="number-of-total-seats">Total Seats</span>
                </div>  --}}
            </div>
            <div class="bus-layout-container">
                <div class="section-label">Upper Deck</div>
                <div class="layout-driver-sec" style="visibility:hidden">
                    <img src="{{URL::asset('Images/icons/driver-sign.png')}}" id="driver-sign" alt="#Driver-sign">
                </div>
                
                <div class="layout-seater-sec">
                    @for ($row = 1; $row <= 6; $row++)
                    <div class="row">
                        <div class="left-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                        <div class="middle-seats">
                            @if ($row > 3)
                                <div class="seat" id="">
                                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt=""  style="opacity : 0.8" >
                                </div>
                            @endif
                        </div>
                        <div class="right-seats">
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                            <div class="seat" id="">
                                <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            
        </section>
        <div class="total-seats-container">
            <span class="selected-seat" id="count-of-selected-seats">0</span>/<span class="selected-seat" id="number-of-total-seats">Total Seats</span>
        </div> 
        @endif
        

        <section class="submit-button-container">
            <button onclick="sendSeats()" id="submit-button">Add Bus</button>
        </section>
    </div>
</div>

<script>
    const seatsImages = document.querySelectorAll(".seat-image"); //Get All
    const allSeats = document.querySelectorAll(".seat"); //Get All
    const countOfSelectedSeats = document.querySelector("#count-of-selected-seats");
    const numberOfTotalSeats = document.querySelector("#number-of-total-seats");
    const bus = @json($bus);
    let selectedSeats = [];
    let numberOfSelectedSeats;

    
    

    function sendSeats() {
        selectedSeats.sort((a, b) => a - b);

            fetch("{{ route('seats.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    seats: selectedSeats,
                    bus:bus
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Server response:", data);
                if(data.success === true) {
                    window.location.href = data.redirect;
                    alert(data.message);
                }                
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Something went wrong!");
            });
        }
    
    const updateSelectedSeatCount = () => {
        countOfSelectedSeats.innerText = selectedSeats.length;
        // console.log(countOfSelectedSeats.innerText);
    }
    

    const isSeatSelected = (id) => {
        // console.log("is Seat Selected function is start...");
        // console.log("perameter is "+id);
        const index = selectedSeats.indexOf(id);
        // console.log("Find index of id, index is "+index);
        if (index > -1) {
            // value is availabel in array
            selectedSeats.splice(index, 1); //removed value from Selected seat Array.
            // console.log("if is exicuted from isSeatSelected");
            return true;
        } else {
            // value is not availabel in array
            // console.log("else is exicuted from isSeatSelected");
            return false;
        }
    }


    seatsImages.forEach(seat => {
        // seat.style.backgroundColor = "white";
        seat.addEventListener("click",() => {
            
                
            
            // seat.style.backgroundColor = "white";
            if (isSeatSelected(seat.id)) {
                seat.style.backgroundColor = "white";
                updateSelectedSeatCount();
                console.log(selectedSeats);
                // console.log(selectedSeats);
                // id removed from array by given function in condition.  
            }
            else {
                if ((selectedSeats.length +1 ) <= parseInt(bus['seats']) ) {
                    seat.style.backgroundColor = "darkgray";
                    // seat.style.classList();
                    selectedSeats.push(seat.id);
                    // console.log(typeof seat.id);
                    updateSelectedSeatCount();
                    console.log(selectedSeats);
                    // add id in array
                }
            }
        });
    });

    // Total seat Counter
    numberOfTotalSeats.innerText=bus['seats'];
    
        
</script>

@endsection