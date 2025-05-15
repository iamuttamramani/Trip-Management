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
        @for ($Column = 1; $Column <= 5; $Column++)
        <div class="column" id="C1">
            <div class="Left-seat-box">
                @for ($leftSeats = 1; $leftSeats <= 2; $leftSeats++)
                @endfor
            </div>
            @for ($leftSeats = 1; $leftSeats <= 2; $leftSeats++)
            
            @endfor
        </div>
        
        @endfor

    </div>
    <h1>UTTAM</h1>
</body>
</html>

{{-- 
                <div class="column" id="C1">
                @for ($seat = 1; $seat <= 5; $seat++)
                    <div class="seat" id="s1">
                        <img src="{{URL::asset('Images/icons/berth-seat-for-ex.png')}}" id="uttam" class="seat-image" alt="" >
                    </div>
                @endfor
            </div>
    --}}