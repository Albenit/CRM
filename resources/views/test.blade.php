
<form action="{{route('statistic')}}" class="container">
    <div class="input-div1 input-groupp justify-content-between">
        <div class="pe-3">
             <span class="" style="font-size: 15px;">
                  Berater:
             </span>
        </div>
        <select class="form-select"
                aria-label="Default select example" name="berater" id="berater">
                @foreach($admins as $admin)
                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endforeach
        </select>
    </div>
    <div class="input-div1 input-groupp justify-content-between">
        <div class="pe-3">
             <span class="" style="font-size: 15px;">
                  Model:
             </span>
        </div>
        <select class="form-select"
                aria-label="Default select example" name="model" id="model">
            <option value="Grundversicherung">Grundversicherung</option>
            <option value="Zusatzversicherung">Zusatzversicherung</option>
            <option value="Autoversicherung">Autoversicherung</option>
            <option value="Hasurat">Hausrat</option>
            <option value="Vorsorge">Vorsorge</option>
            <option value="Rechtsschutz">Rechtsschutz</option>
        </select>
    </div>
    <div class="input-div1 input-groupp justify-content-between">
        <div class="pe-3">
             <span class="" style="font-size: 15px;">
                  Gesellschaft:
             </span>
        </div>
        <select class="form-select"
                aria-label="Default select example" name="gesellschaft" id="gesellschaft">
            <option value="Sympany">Sympany</option>
            <option value="Helsana">Helsana</option>
            <option value="Swica">Swica</option>
            <option value="GM">GM</option>
        </select>
    </div>

    <div class="mb-3">
        <div class="input-div1 input-groupp justify-content-between">
            <div class="pe-3">
                <span class="" style="font-size: 15px;">
                       Status
                </span>
            </div>
            <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option value="Aufgenomen">Aufgenomen</option>
                <option value="Offen">Offen</option>
                <option value="Abgelehnt">Abgelehnt</option>
                <option value="Zuruckgezogen">Zuruckgezogen</option>
                <option value="Provisionert">Provisionert</option>
                <option value="Nicht Ausgewählt">Nicht Ausgewählt</option>
            </select>
        </div>
    </div>
    <br>
    <div>
        <input class="btn btn-success" type="submit" value="Filtro">
    </div>
</form>

<hr>
{{--Terminated/Not Termminated--}}
<h3 class="container">Leads</h3>
    <div class="">
        <form method="get" action="{{ url('leadStatistic') }}">
            <div class="container">
                <select class="form-select" name="statInfo">
                    <option value="terminate">Terminatet</option>
                    <option value="notTerminate">Not Terminate</option>
                </select>
                <br>
                <input class="btn btn-success" type="submit" value="Submit">
            </div>
        </form>
    </div>

{{--Duration of lead procesing--}}

    <div class="container">
        <span>Duration of lead procesing</span>
            @foreach($leads as $item)
                <div>
                    <span>{{$item->first_name}}, Duration: {{$item->duration}}</span>
                </div>
            @endforeach

    </div>

<hr>
{{--    Appointment--}}
{{--    Closing Rate--}}
    <div>

    </div>

    <div class="container">
        <h5>Contrats Per Date</h5>
        <form action="{{ route('contractperdate') }}">
            <div class="py-2">
                <select class="form-select"
                        aria-label="Default select example" name="modelName" id="model">
                    <option value="all">All</option>
                    <option value="Grundversicherung">Grundversicherung</option>
                    <option value="Zusatzversicherung">Zusatzversicherung</option>
                    <option value="Autoversicherung">Autoversicherung</option>
                    <option value="Hasurat">Hausrat</option>
                    <option value="Vorsorge">Vorsorge</option>
                    <option value="Rechtsschutz">Rechtsschutz</option>
                </select>
            </div>
            <input type="date" name="date">
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<hr>
{{Form::open(array('method'=>'post','url'=>'createAbsence'))}}
<div>From</div>
<input type="date" name="from">
<div>To</div>
<input type="date" name="to">
<div>Description</div>
<select name="reason" id="reason" onchange="hide()">
    <option value="Sick days">Sick days</option>
    <option value="Accident reports">Accident reports</option>
    <option value="Vacation days">Vacation days</option>
    <option value="Unable to work days">Unable to work days</option>
</select>
<br>
<input type="text" id="description" name="description" style="display: none;">
<br>
<button type="submit" class="btn btn-success">Request</button>
{{Form::close()}}
{{Form::open(array('url'=> 'addBankInformationData','method'=> 'post'))}}
<select name="id">
    @foreach(App\Models\Admins::all() as $admin)
        <option value="{{$admin->id}}">{{$admin->name}}</option>
    @endforeach
</select>
<label>Bank</label>
<input type="text" name="bank">
<label>IBAN</label>
<input type="text" name="iban">
{{Form::button('Add info',['type' => 'Submit', 'class'=> 'btn btn-success'])}}
{{Form::close()}}



<script>
    function hide() {
        var x = document.getElementById('reason').value;
        if (x == "Unable to work days") {
            document.getElementById('description').style.display = "inline";
        } else {
            document.getElementById('description').style.display = "none";
        }
    }
</script>



