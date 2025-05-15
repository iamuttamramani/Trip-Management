@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/staff.css')}}">
</head>

<div class="content-container">
    <section class="staff-card-container">
        <div class="staff-card">
            <span class="logo">SADGATI</span>
            <img src="{{URL::asset('Images/UttamRamani.jpg')}}" alt="#proflie-picture" class="profile-picture">
            <span class="user-fullname">UTTAM RAMANI</span>
            <table class="user-data">
                <tr>
                    <td class="table-label">UID</td>
                    <td class="table-data">uttamramani</td>
                </tr>
                <tr>
                    <td class="table-label">Mobile No</td>
                    <td class="table-data">95108 94941</td>
                </tr>
                <tr>
                    <td class="table-label">Email</td>
                    <td class="table-data">ramaniuttam412@gmail.com</td>
                </tr>
            </table>
            <button class="update-button">Update</button>
        </div>

    </section>
</div>

@endsection