<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Trip</title>
  <style>
    body {
      font-family: sans-serif;
      background-color: #cae9ff;
      padding: 30px;
    }

    .form-container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      padding: 12px;
      width: 100%;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
    }

    .repeat-container {
      display: flex;
      gap: 5px;
    }

    .day-label {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 30px;
      width: 30px;
      border: 1px solid #000;
      border-radius: 50%;
    }

    .everyday-label {
      padding: 5px;
      height: 20px;
      width: 80px;
      border: 1px solid #000;
      border-radius: 20px;
    }

    .option-selected {
      color: #fff;
      border-color: #fff;
      background-color: blue;
      scale: 0.9;
    }

    .repeat-label > input[type='checkbox']{
      display: none;
    }
    
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Create New Trip</h2>

    {{-- @if(session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif --}}

    <form action="{{ route('trip.store') }}" method="POST">
      @csrf

      {{-- <label for="trip_name">Trip Name</label>
      <input type="text" name="trip_name" id="trip_name" required> --}}

      <label for="from">From</label>
      <input type="text" name="from" id="from" required>

      <label for="to">To</label>
      <input type="text" name="to" id="to" required>

      <label for="date">Trip Date</label>
      <input type="date" name="deprature_date" id="date" required>

      <label for="time">Trip Time</label>
      <input type="time" name="deprature_time" id="time" required>

      <label for="date">Arrival Date</label>
      <input type="date" name="arrival_date" id="date" required>

      <label for="date">Arrival Day</label>
      <select name="arrival_day" id="arrival_day" required>
        <option value="same_day">Same day</option>
        <option value="next_day">Next day</option>
      </select>

      <label for="time">Arrival Time</label>
      <input type="time" name="arrival_time" id="time" required>

      <label for="price">Ticket Price</label>
      <input type="number" name="price" id="price" required>

      <label for="bus_id">Select Bus</label>
      <select name="bus_id" id="bus_id" required>
        <option value="">-- Select Bus --</option>
        @foreach($buses as $bus)
          <option value="{{ $bus->id }}">{{ $bus->bus_name }}</option>
        @endforeach
      </select>

      <label for="#">Repeat Trip</label>
      <div class="repeat-container">
        <label for="Mon-1" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Mon-1" value="Monday">
          <span class="day-label">M</span>
        </label>

        <label for="Tue-2" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Tue-2" value="Tuesday">
          <span class="day-label">T</span>
        </label>

        <label for="Wed-3" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Wed-3" value="Wednesday">
          <span class="day-label">W</span>
        </label>
        
        <label for="Thu-4" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Thu-4" value="Thursday">
          <span class="day-label">T</span>
        </label>
        
        <label for="Fri-5" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Fri-5" value="Friday">
          <span class="day-label">F</span>
        </label>
        
        <label for="Sat-6" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Sat-6" value="Saturday">
          <span class="day-label">S</span>
        </label>
        
        <label for="Sun-7" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="Sun-7" value="Sunday">
          <span class="day-label">S</span>
        </label>
        
        <label for="every-day" class="repeat-label">
          <input type="checkbox" name="repeat_day[]" id="every-day" value="Everyday">
          <span class="day-label everyday-label">Every Day</span>
        </label>
      </div>

      <div class="repeat-message">

      </div>
      <button type="submit">Create Trip</button>
    </form>
  </div>
  <script>
    const repeatOpt = document.querySelectorAll('input[type=checkbox]');
    let isDaysOpt;
    const dayIds = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    let selectedOpt = [];

    function activateEverdayBtn() {
      repeatOpt[7].checked = true;
      disableDaysOpt();
      repeatOpt[7].closest('.repeat-label').querySelector('.day-label').classList.add('option-selected');
      selectedOpt = [];
      selectedOpt.push(repeatOpt[7].id);
    }

    function deactivateEverydayBtn() {
      enableDaysOpt();
      repeatOpt[7].checked = false;
      repeatOpt[7].closest('.repeat-label').querySelector('.day-label').classList.remove('option-selected');
      selectedOpt = [];
    }

    function enableDaysOpt() {
      for (let i = 0; i < repeatOpt.length - 1; i++) {
        const option = repeatOpt[i];
        const optLabel = option.closest('.repeat-label').querySelector('.day-label');
        option.disabled = false;
        optLabel.style.opacity = 1;
      }
    }

    function disableDaysOpt() {
      for (let i = 0; i < repeatOpt.length - 1; i++) {
        const option = repeatOpt[i];
        const optLabel = option.closest('.repeat-label').querySelector('.day-label');
        optLabel.classList.remove('option-selected');
        option.checked = false;
        option.disabled = true;
        optLabel.style.opacity = 0.5;
      }
    }

    function getOptIdNum(optionId) {
      let parts;
      parts = optionId.split('-');
      return parts[1];
    }

    function optimizeOption() {
      let optIds = [];
      let checkIds = ['1','2','3','4','5','6','7']
      repeatOpt.forEach( option => {
        if(option.checked == true) {
          // console.log("this option is checked " + option.id);
          optIdNum = getOptIdNum(option.id); //get num from id
          optIds.push(optIdNum);
          // console.log(optIds);
        } else {
          // console.log("unchecked :" + option.id);
        }
      });
      checkBothIds = checkIds.every(item => optIds.includes(item)); //Check , is All Opt are Matched ? 
      if (checkBothIds) {
        disableDaysOpt();
        return true;
      }
    }


    repeatOpt.forEach(option => {
      if (option.id !== 'every-day') {
          option.addEventListener('change', () => {
          const optionLabel = option.closest('.repeat-label').querySelector('.day-label');

          if (option.checked == true) {
            optionLabel.classList.add('option-selected');
            selectedOpt.push(option.id);
            // console.dir(selectedOpt); --Check Value pushed or not.
          } else {
            optionLabel.classList.remove('option-selected');
            selectedOpt = selectedOpt.filter($value => $value !== option.id);
            // console.dir(selectedOpt); --Check Value poped or not.
          }
          const isAllSelected = optimizeOption();
          if (isAllSelected) {
            activateEverdayBtn();
          }
        });
      }
    });

    repeatOpt[7].addEventListener('change', () => {
      if (repeatOpt[7].checked == true) {
        activateEverdayBtn();
      } else {
        deactivateEverydayBtn();
      }
    });


  </script>

</body>
</html>