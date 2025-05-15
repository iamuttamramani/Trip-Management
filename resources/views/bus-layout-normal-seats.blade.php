@extends('layout.layout')

@section('content')

<head>
    <link rel="stylesheet" href="{{URL::asset('css/bus-layout-normal-seats.css')}}">
</head>

<div class="content-container">
    <div class="layout-page-container">
        <section class="header-sec">
            <h2 id="page-heading">Create a Bus Layout</h2>
            <hr>
        </section>

        <section class="layout-sec">
            <div class="bus-layout-container">
                <div class="layout-driver-sec">
                    <img src="{{URL::asset('Images/icons/driver-sign.png')}}" id="driver-sign" alt="#Driver-sign">
                </div>
                <div class="layout-seater-sec">
                    <table class="seating-layout">
                        <tr>
                            <td class="sequence-no">1</td>
                            <td class="hidden-data"></td>
                            <td class="left-bundel-seat">+</td>
                            <td class="left-bundel-seat">+</td>
                            <td class="left-bundel-seat">+</td>
                            <td class="middle-single-seat">+</td>
                            <td class="right-bundel-seat">+</td>
                            <td class="right-bundel-seat">+</td>
                            <td class="right-bundel-seat">+</td>
                        </tr>
                    </table>
                </div>
                <div class="total-seats-container">
                    <span class="selected-seat">0</span>/<span class="selected-seat">n</span>
                </div>
            </div>
            <div class="layout-options-container">
                <div class="section-label">Select Bus Layout</div>
                <div class="layouts-container">
                    <div class="option-container 2x2-setting-layout" id="2x2-setting-layout">
                        <img src="{{URL::asset('Images/seating-layout/2x2-seats-layout.png')}}" class="layout" alt="2 x 2 Seating Arrangement">
                        
                    </div>
                    <div class="option-container 2x3-setting-layout" id="2x3-setting-layout">
                        <img src="{{URL::asset('Images/seating-layout/2x3-seats-layout.png')}}" class="layout" alt="2 x 3 Seating Arrangement">
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="submit-button-container">
            <button type="####" id="submit-button">Add Bus</button>
        </section>
    </div>
</div>

@endsection