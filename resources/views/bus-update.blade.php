@extends('layout.layout')
@section('content')
    <head>
        {{-- <link rel="stylesheet" href="bus-update.css"> --}}
        <link rel="stylesheet" href="{{URL::asset('css/bus-update.css')}}">
    </head>
    <div class="form-container">
        <form action="">
            <div class="heading-container">
                <h2 style="color: #1b4965">Update Bus Details</h2>
            </div>
            <div class="picture-container">
                <img src="{{URL::asset('Images/bus-picture.png')}}" alt="#" class="bus-picture">
            </div>
            <div class="data-container">
                <table cellspacing="5" >
                    <tr>
                        <div class="bus-name-container">
                            <td><label for="bus-name">Bus Name</label></td>
                            <td><input type="text" class="input-field" name="bus-name" id="bus-name"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="bus-id-container">
                            <td><label for="bus-id">Bus Id</label></td>
                            <td><input type="text" class="input-field" name="bus-id" id="bus-id"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="owner-name-container">
                            <td><label for="owner-name">Owner Name</label></td>
                            <td><input type="text" class="input-field" name="owner-name" id="owner-name"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="bus-number-container">
                            <td><label for="state-code">Bus Number</label></td>
                            <td>
                                <div class="bus-number-boxes-container">
                                    <input type="text" name="state-code" class="number-box input-field" id="state-code" size="2">
                                    <input type="text" name="region-code" class="number-box input-field" id="region-code" size="2">
                                    <input type="text" name="vehicle-alfa-code" class="number-box input-field" id="vehicle-alfa-code" size="2">
                                    <input type="text" name="vehicle-num-code" class="number-box input-field" id="vehicle-num-code" size="4">
                                </div>
                            </td>
                        </div>
                    </tr>
                    {{-- <tr>
                        <td>
                            <label >Features</label>
                        </td>
                        <div class="features-container">
                            <td>
                                <div class="features-boxes">
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                    <div class="feature-box">
                                        F
                                    </div>
                                </div>
                            </td>
                        </div>
                    </tr> --}}
                    <tr>
                        <div class="status-container">
                            <td>
                                <label for="status">Status</label>
                            </td>
                            <td>
                                <div class="status-mode-container">
                                    <span class="status-option">Active</span>
                                    <span class="status-option">Inactive</span>
                                </div>
                            </td>
                        </div>
                    </tr>
                </table>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection