@extends('template.navbar')
@section('content')
    <head>
        <title>
            Ablehnen
        </title>

    </head>
    <section class="my-0 my-sm-3">
        <div class="container-fluid">
            <div class="wrapper-div px-3 px-md-4 py-0 py-sm-4 mx-0 mx-sm-3 pb-4">
                <div class="row g-0">
                    <div class="row g-0 pt-4 pt-md-0">
                        <div class="col-auto pe-5 my-auto ps-2">
                            <a style="text-decoration: none" href="{{URL::previous()}}">

                                <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L2 12L12 22" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>


                            </a>
                        </div>
                        <div class="col ps-0 pe-2">
                            <div class="">
                                <span class="fs-4 fw-bold text-white smallTextMobile2">
                                    {{$leads->first_name}} {{$leads->last_name}}
                                </span>
                            </div>
                            <div class="">
                                <span class="fs-6 text-white smallTextMobile">
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.587" height="16.243"
                                             viewBox="0 0 8.587 12.243">
                                            <path id="Path_170" data-name="Path 170"
                                                  d="M1507.522,2353.695l.285-.4c.45-.637.916-1.3,1.32-1.908a17.1,17.1,0,0,0,1.607-2.977,3.3,3.3,0,0,0,.287-1.836,3.541,3.541,0,0,0-3.492-2.981,3.5,3.5,0,0,0-2.866,1.494,3.146,3.146,0,0,0-.606,2.37,6.507,6.507,0,0,0,.733,1.932,32.418,32.418,0,0,0,2.511,4.006c.072.1.145.2.22.3m.009-9.063h.024a2.481,2.481,0,0,1-.023,4.963h-.028a2.486,2.486,0,0,1-2.446-2.508,2.475,2.475,0,0,1,2.474-2.455m0,9.964c-.23-.312-.449-.6-.66-.9a32.713,32.713,0,0,1-2.552-4.072,7.013,7.013,0,0,1-.785-2.091,3.7,3.7,0,0,1,.695-2.752,4.05,4.05,0,0,1,7.31,1.7,3.861,3.861,0,0,1-.319,2.12,17.67,17.67,0,0,1-1.656,3.068C1508.941,2352.621,1508.181,2353.663,1507.534,2354.6Zm0-9.438a1.955,1.955,0,0,0-.021,3.91h.023a1.955,1.955,0,0,0,.018-3.91Z"
                                                  transform="translate(-1503.243 -2342.783)" fill="#fff" stroke="#fff"
                                                  stroke-width="0.5" />
                                        </svg>
                                    </span>
                                    {{$leads->address}} {{$leads->nr}} {{$leads->city}} {{$leads->postal_code}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <div class="info-divv px-2 my-3">
                                <div class="row g-2">
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                                <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Vorname </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->first_name}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Nachname </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->last_name}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Nationalitat </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->nationality}} </span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Geburtstag</span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{Carbon\Carbon::parse($leads->birthdate)->format('d.m.Y')}} </span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Strasse </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->address}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Nr </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->nr}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">PLZ </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->postal_code}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Ort </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->city}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Sprache </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->sprache}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Telefon</span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->telephone}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Personen </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->number_of_persons}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">aktuelle Krankenkasse</span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->zufriedenheit}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="white-thingy">
                                                <div class="text-div py-3 ps-4">
                                                <div class="row g-0">
                                                        <div class="col-5 me-2">
                                                            <span class="fw-600 fs-6 ">Datum </span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{Carbon\Carbon::parse($leads->appointment_date)->format('d.m.Y')}} </span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="white-thingy">
                                            <div class="text-div py-3 ps-4">
                                            <div class="row g-0">
                                                    <div class="col-5 me-2">
                                                        <span class="fw-600 fs-6 ">Zeit </span> 
                                                    </div>
                                                    <div class="col">
                                                        <span class="fs-6">{{$leads->time}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="white-thingy mt-2">
                                    <div class="text-div py-3 ps-4">
                                        <div class="row g-0">
                                                    <div class="col-5 col-sm-2 me-0 me-sm-4">
                                                        <span class="fw-600 fs-6">Bemerkung</span> 
                                                    </div>
                                                    <div class="col ms-2 ms-md-3 ms-lg-1">
                                                        <span class="fs-6">{{$leads->bemerkung}}</span>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 px-0 ps-sm-0 pt-3">
                        @php
                            $leadss = $leads->id * 1244;
                            $leadsId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                        @endphp
                        <form method="post" action="{{route('folgepost',$leadsId)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="" id="dyy" style="display: block;">
                                <div class="termin-div py-3 mx-2">
                                    <div class="row g-0 align-items-center py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4">
                                            <label for="inputTxt4" class="col-form-label">Aktuelles Datum</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="current" value="{{Carbon\Carbon::createFromFormat('Y-m-d',$leads->appointment_date)->format('m-d-Y')}}" readonly>
                                        </div>
                                    </div>

                                    <div class="row g-0 align-items-center py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4">
                                            <label for="inputTxt4" class="col-form-label">Datum Folgetermin</label>
                                        </div>
                                        <div class="col">
                                            <input required type="date" class="form-control" name="ndate">
                                        </div>
                                    </div>
                                    <div class="row g-0 align-items-center py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4">
                                            <label for="inputTxt4" class="col-form-label">Zeit</label>
                                        </div>
                                        <div class="col">
                                            <!-- <input type="time" class="form-control" name="time" value="{{$leads->time}}"> -->
                                            <div class="row g-0">
                                                <div class="col-12">
                                                    <select id="hours" name="time"  class="form-select">
                                                        <option value="{{$leads->time}}">{{$leads->time}}</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-6 ps-1"> -->
                                                    <!-- <select id="minutes" class="form-select"></select> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 align-items-center py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4">
                                            <label for="inputTxt4" class="col-form-label">Kommentar</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="folgecomment">
                                        </div>
                                    </div>
                                    <div class="decline-btn-div text-end mx-3 mx-sm-5">
                                        <button type="button" id="del" onclick="deleteupladfile()" class="decline-btn py-2 px-5" style="display: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.145" height="19.524"
                                                 viewBox="0 0 33.145 33.524">
                                                <g id="Group_620" data-name="Group 620"
                                                   transform="translate(-517.079 -959.408)">
                                                    <line id="Line_24" data-name="Line 24" y1="30.316" x2="30.316"
                                                          transform="translate(518.493 960.822)" fill="none"
                                                          stroke="currentColor" stroke-linecap="round" stroke-width="3" />
                                                    <line id="Line_25" data-name="Line 25" x2="30.316" y2="30.316"
                                                          transform="translate(518.493 961.201)" fill="none"
                                                          stroke="currentColor" stroke-linecap="round" stroke-width="3" />
                                                </g>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="my-3 px-2" id="btndyy">
                                <button type="submit" class="w-100 absendenRedBtn py-2 border-0 mb-5 mb-md-0 ">
                                    <span class="fw-bold fs-6">Absenden</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

    function createOption(value, text) {
        var option = document.createElement('option');
        if(value.charAt(0) == '1' || value.charAt(0) == '2'){
        option.text = text;
    option.value = value;
    }else{
    option.text = "0" + text;
    option.value = "0" + value;
}
return option;
    }

    var hourSelect = document.getElementById('hours');
    var z;

    for(var i = 8; i <= 19; i++){
        for(var j = 0; j < 60; j += 15) {
            if (j == 0){
                z = i + ':' + j + '0'
            }
            else {
                z = i + ':' + j 
            }
            if('{{$leads->time}}' !== z){
                hourSelect.add(createOption(z, z));
            }
        }
    }
</script>
@endsection

<script>
    function radioo(){
        if(document.getElementById('dy').checked){
            document.getElementById('dyy').style.display = 'block';
            document.getElementById('nii').style.display = 'none';
            document.getElementById('btnnii').style.display = 'none';
            document.getElementById('btndyy').style.display = 'block';
        }
        else{
            document.getElementById('btnnii').style.display = 'block';
            document.getElementById('nii').style.display = 'block';
            document.getElementById('dyy').style.display = 'none';
            document.getElementById('btndyy').style.display = 'none';
        }
    }
    function uploadfile(){
        var x = document.getElementById('file-input-3').value;
        document.getElementById('uploadspan').innerHTML = x;
        if(x != null && x != ''){
            document.getElementById('del').style.display = 'block';
            document.getElementById('hideUploadBox').style.display = 'none';
        }
    }
    function deleteupladfile(){
        document.getElementById('uploadspan').innerHTML = '';
        document.getElementById('del').style.display = 'none';
        document.getElementById('file-input-3').value = null;
        document.getElementById('hideUploadBox').style.display = 'block';

    }
</script>


<style>
    .absendenRedBtn {
        background: #ffd5ab;
        border: 1px solid #DAA7A7;
        box-sizing: border-box;
        box-shadow: 0px 4px 4px rgba(171, 169, 169, 0.25);
        border-radius: 5px;
        color: #fff;
    }
    .fertig-btn {
        background-color: #fff !important;
        color: #EF696A;
        font-weight: 600;
        border-radius: 10px;
        border: none;
    }

    .upload-box input[type="file"] {
        display: none;
    }

    .upload-box {
        border: 2px dashed #979797;
        border-radius: 9px;
    }

    .termin-div {
        background-color: #fff !important;
        border-radius: 10px !important;

    }

    .collapsed .d-btnn {
        background-color: #c8ddd1;
        opacity: 0.4;
    }

    .d-btnn {
        opacity: 1;
    }

    .accordion-button:focus {
        color: #7DBF9A !important;
        background-color: #fff !important;
        border: none;
        outline: none !important;
    }

    .sub-btn {
        border-radius: 10px;
    }

    .collapsed .d-btnn {
        background-color: #c8ddd1;
        opacity: 0.4;
    }

    .d-btnn {
        opacity: 1;
    }

    .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }

    .accordion-button {
        color: #7DBF9A;
        font-weight: bold;
        border-radius: 15px !important;
    }

    .accordion-item {
        border-radius: 15px !important;
    }

    .hr-style {
        color: #fff !important;
        height: 3px !important;
        border-radius: 50px;
        opacity: 1;
        display: none;
    }

    .border-left-div {
        border: none !important;
        border-left: 3px solid #fff !important;

    }

    @media (max-width: 991.98px) {
        .hr-style {
            display: block;
        }

        .border-left-div {
            border: none !important;
            border-left: none !important;
        }
    }


    .close-btn {
        color: #FF0D13;
        font-weight: 600;
        background-color: #fff;
        border: 1px #FF0D13 solid;
        border-radius: 13px;
        width: 100px;
    }

    .go-btn {
        color: #fff;
        font-weight: 600;
        background-color: #63D4A4;
        border: 1px #63D4A4 solid;
        border-radius: 13px;
        width: 100px;
    }

    .text-div {
        font-size: 13px;
    }

    .white-thingy {
        background-color: #fff;
        border-radius: 10px;

    }

    .fw-600 {
        font-weight: 600;
    }

    .wrapper-div {
        background-color: #FFBF80;
        border-radius: 25px;
    }
    @media (max-width: 575.98px) {

        .wrapper-div {
            border-radius: 0px;
        }
    }

    .decline-btn {
        border: 2px solid #FF0D13;
        border-radius: 13px !important;
        background-color: #fff;
        color: #FF0D13;

    }

    .decline-btn:hover {
        background-color: #FF0D13;
        color: #fff !important;
    }

    .accept-btn {
        border: 2px solid #63D4A4;
        border-radius: 13px !important;
        background-color: #fff;
        color: #63D4A4 !important;
    }

    .accept-btn:hover {
        border: 2px solid #63D4A4;
        background-color: #63D4A4;
        color: #fff !important;
    }

    .text-color-header {
        color: #656565;
    }

    .people-icon-div {
        background-color: #525353;
        margin: 3px;
    }

    .static-btn {
        background-color: #F0F0EF !important;
        border-radius: 8px !important;
    }

    .people-svg-span {
        border-radius: 8px;
    }
</style>


<style>
    /*Per Notification */
    .coloriii a{
        color: black !important;
    }
    @media (max-width: 578.98px) {
        .smallTextMobile {
            font-size: 14px !important;
        }
        .smallTextMobile2 {
            font-size: 16px !important;
        }
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
    body {font-family: 'Montserrat', sans-serif;}

</style>
