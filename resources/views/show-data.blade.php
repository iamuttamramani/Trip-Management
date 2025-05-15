<h1>This is show data page.</h1>
{{-- @foreach ($data as $key => $value)
    {{ $value }}
@endforeach --}}

Bus Name is {{ $data['bus_name'] }} <br>
Bus Number is {{ $data['state_code'] }} - {{ $data['region_code'] }} - {{ $data['vehicle_alfa_code'] }} - {{ $data['vehicle_num_code'] }} <br>
Bus Type is {{ $data['bus_type'] }}
