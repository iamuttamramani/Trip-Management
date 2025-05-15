<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is home page of sadgati</title>
    <link rel="stylesheet" href="{{asset('/css/manifest.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <header>
            {{-- Left Porsion of navigation : logo --}}
            <section>
                <a href="/home"><div id="logo">SADGATI</div></a>
            </section>

            <section>
                {{-- pages Links --}}
            </section>
                
            <section>
                <div id="profile-picture-container">
                    <a href="{{route('profile.page')}}">
                        <img src="{{URL::asset('Images/UttamRamani.jpg')}}" alt="" id="profile-picture">
                    </a>
                </div>
            </section>
    </header> 
    <main>
        <section>
            <nav id="vertical-navigation">
                <div class="icon-container">
                    <a href="{{route('home')}}">
                        <img src="{{asset('Images/Icons/home-icon.png')}}" alt="Home" class="icon">
                    </a>
                    {{-- <a href="/book">
                        <img src="{{asset('Images/Icons/book-icon.png')}}" alt="Book-ticker" class="icon"> --}}
                    </a>
                    <a href="{{route('routes')}}">
                        <img src="{{asset('Images/Icons/rout-icon.png')}}" alt="Route" class="icon">
                    </a>
                    <a href="/bus">
                        <img src="{{asset('Images/Icons/bus-icon.png')}}" alt="Bus" class="icon">
                    </a>
                    {{-- <a href="/staff">
                        <img src="{{asset('Images/Icons/staff-icon.png')}}" alt="Staff" class="icon"> --}}
                    </a>
                </div>
            </nav>
        </section>
        <section>
            @yield('content')
        </section>
    </main>  
</body>
</html>