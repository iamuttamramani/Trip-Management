<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experiment Page</title>
    <link rel="stylesheet" href="{{URL::asset('css/ex.css')}}">
</head>
<body>

    <div class="layout-container" id="lower">
        {{ $id = 0;}}
        @for ($Column = 1; $Column <= 5; $Column++)
        <div class="column" id="">
            <div class="Left-seat-box seat-box">

                @for ($leftSeats = 1; $leftSeats <= 2; $leftSeats++)
                <div class="seat" id="">
                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                </div>
                @endfor

            </div>
            <div class="right-seat-box seat-box">

                @for ($rightSeats = 1; $rightSeats <= 2; $rightSeats++)
                <div class="seat" id="">
                    <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="{{++$id}}" class="seat-image" alt="" >
                </div>
                @endfor
                
            </div>
        </div>
        
        @endfor

    </div>
    <h1>UTTAM</h1>
</body>
<script>
    const seatImages = document.querySelectorAll('.seat-image');
    let selectedSeatsId = [];
    seatImages.forEach(seatImage => {
        seatImage.style.backgroundColor="gray";
        seatImage.addEventListener("click", () => {
            
            if (seatImage.style.backgroundColor==="gray" && selectedSeatsId.length < 6) {
                seatImage.style.backgroundColor="white";
                selectedSeatsId.push(seatImage.id);
                console.log("array :" + selectedSeatsId);
            }
            else {
                selectedSeatsId = selectedSeatsId.filter(seat => seat !== seatImage.id);
                seatImage.style.backgroundColor="gray";
                console.log("select removed");
            }
        });
    });

</script>
</html>