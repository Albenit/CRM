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
                        <div class="col ps-0">
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
                                <div class="row g-2 gx-0 gx-md-2">
                                    <div class="col-12 col-md-6">
                                        <div class="white-thingy">
                                                <div class="text-div py-3 ps-4">
                                                    <div class="row g-0">
                                                        <div class="col-5 me-2">
                                                            <span class="fw-600 ">Vorname</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->first_name}}</span>
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
                                                            <span class="fw-600 ">Nachname</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->last_name}}</span>
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
                                                            <span class="fw-600 ">Strasse</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->address}}</span>
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
                                                            <span class="fw-600 ">Nr</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->nr}}</span>
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
                                                            <span class="fw-600 ">PLZ</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->postal_code}}</span>
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
                                                            <span class="fw-600 ">Ort</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->city}}</span>
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
                                                            <span class="fw-600 ">Nationalitat</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->nationality}}</span>
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
                                                            <span class="fw-600 ">Sprache</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->sprache}}</span>
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
                                                            <span class="fw-600 ">Tel. Privat</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->telephone}}</span>
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
                                                            <span class="fw-600 ">Personen</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->number_of_persons}}</span>
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
                                                            <span class="fw-600 ">Datum</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->appointment_date}}</span>
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
                                                            <span class="fw-600 ">Zeit</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->time}}</span>
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
                                                            <span class="fw-600 ">Zufriedenheit</span> 
                                                        </div>
                                                        <div class="col">
                                                            <span class="fs-6">{{$leads->zufriedenheit}}</span>
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

                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 px-0 ps-sm-0 pt-2">
                        @php
                            $leadss = $leads->id * 1244;
                            $leadsId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                        @endphp
                        <div class="white-thingy mt-2 mx-2">
                            <div class="text-div py-3 ps-4 ">
                                <input class="me-2" type="radio" name='nidy' value="ni" id="ni" onchange="radioo()"> <span style="font-size: 16px;">  Termin stattgefunden </span>
                            </div>
                        </div>
                        <form method="post" style="margin: 0.5rem !important;" action="{{route('rejectlead',$leadsId)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2" id="nii" style="display: none">
                                <div class="termin-div py-3">

                                    <div class="row g-3 align-items-center py-1 px-4">
                                        <div class="col-auto">
                                            <label for="inputTxt4" class="col-form-label">Begrundung </label>
                                        </div>
                                        <div class="col">
                                            <select id="inputTxt4" name="begrundung" class="form-select"
                                            >
                                                <option value="Mehrjahresvetrag">Mehrjahresvetrag</option>
                                                <option value="Krankheit">Krankheit</option>
                                                <option value="Sonstiges">Sonstiges</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3" id="btnnii" style="display: none">
                                <button type="submit" class="w-100 absendenRedBtn py-2 border-0">
                                    <span class="fw-bold fs-6 ">Absenden</span>
                                </button>
                            </div>
                        </form>
                        <div class="white-thingy mb-2 mx-2">
                            <div class="text-div py-3 ps-4 mb-3 mb-md-0">
                                <input type="radio" name='nidy' value="dy" id="dy" class="me-2" onchange="radioo()"> <span style="font-size: 16px;"> Termin nicht stattgefunden </span>
                            </div>
                        </div>

                        <form method="post" action="{{route('rejectlead',$leadsId)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="" id="dyy" style="display: none">
                                <div class="termin-div py-3 mx-2">

                                    <div class="row g-0 align-items-center py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4">
                                            <label for="inputTxt4" class="col-form-label">Begrundung </label>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" name="begrundung2">
                                                <option value="Kunde nicht Zuhause">Kunde nicht Zuhause</option>
                                                <option value="Berater wurde weg geschickt">Berater wurde weg geschickt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-0 text-center my-1 my-sm-3 py-1 px-2 px-md-4">
                                        <div class="col-5 col-sm-4 upload-div">
                                            <div class="text-start">
                                                <div class="">
                                                    <span>
                                                        Uploads:
                                                    </span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-8 col-md decline-div text-end">
                                            <div class="upload-box my-2" id="hideUploadBox">
                                                <div class="my-2 p-4 text-center">
                                                    <label for="file-input-3">
                                                    <svg width="30" height="30" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.7994 5.87725C19.5391 4.33035 18.7732 2.9186 17.6017 1.84728C16.3001 0.65581 14.608 0 12.8459 0C11.4842 0 10.1575 0.390482 9.02114 1.12639C8.07497 1.73714 7.289 2.56316 6.73331 3.53436C6.49301 3.48931 6.24271 3.46428 5.9924 3.46428C3.86477 3.46428 2.13263 5.19641 2.13263 7.32404C2.13263 7.59938 2.16267 7.86471 2.21273 8.12503C0.836032 9.12626 0 10.7383 0 12.4554C0 13.8421 0.515637 15.1887 1.4568 16.2551C2.42299 17.3464 3.69957 17.9922 5.06125 18.0673C5.07627 18.0673 5.08628 18.0673 5.1013 18.0673H9.40661C9.78207 18.0673 10.0824 17.7669 10.0824 17.3915C10.0824 17.016 9.78207 16.7156 9.40661 16.7156H5.12132C3.07379 16.5905 1.35167 14.6431 1.35167 12.4504C1.35167 11.0336 2.11261 9.71199 3.33912 8.9961C3.62447 8.8309 3.74462 8.48547 3.63449 8.17509C3.53436 7.90476 3.4843 7.61941 3.4843 7.31403C3.4843 5.93232 4.61069 4.80593 5.9924 4.80593C6.28776 4.80593 6.57812 4.85599 6.84845 4.95612C7.17886 5.07627 7.54431 4.92608 7.6945 4.61069C8.63065 2.62324 10.6532 1.34166 12.8509 1.34166C15.8045 1.34166 18.2425 3.55439 18.5229 6.48801C18.5529 6.79339 18.7832 7.03869 19.0836 7.08875C21.3113 7.46922 22.9934 9.52676 22.9934 11.8747C22.9934 14.3627 21.036 16.5254 18.623 16.7106H14.9334C14.558 16.7106 14.2576 17.011 14.2576 17.3865C14.2576 17.7619 14.558 18.0623 14.9334 18.0623H18.648C18.663 18.0623 18.6781 18.0623 18.6981 18.0623C20.225 17.9522 21.6517 17.2513 22.713 16.0798C23.7693 14.9184 24.3451 13.4266 24.3451 11.8747C24.34 9.06619 22.4227 6.56811 19.7994 5.87725Z" fill="#AEAEAE"/>
                                                                <path d="M16.2309 13.0962C16.4962 12.8308 16.4962 12.4053 16.2309 12.14L12.6515 8.56057C12.5263 8.43541 12.3511 8.36032 12.1759 8.36032C12.0007 8.36032 11.8254 8.43041 11.7003 8.56057L8.12087 12.14C7.85554 12.4053 7.85554 12.8308 8.12087 13.0962C8.25103 13.2263 8.42625 13.2964 8.59646 13.2964C8.76667 13.2964 8.94188 13.2313 9.07204 13.0962L11.5 10.6682V21.8269C11.5 22.2024 11.8004 22.5028 12.1759 22.5028C12.5513 22.5028 12.8517 22.2024 12.8517 21.8269V10.6682L15.2797 13.0962C15.54 13.3615 15.9656 13.3615 16.2309 13.0962Z" fill="#AEAEAE"/>
                                                                </svg>
                                                                <div>
                                                                    <span style="color: #979797;">Upload your files here</span>
                                                                </div>
                                                                <div>
                                                                    <span class="fw-bold text-decoration-underline" style="color: #979797;">Browse</span>
                                                                </div>
                                                    </label>
                                                    <input onchange="uploadfile()" name="begrundungfile2" type="file" id="file-input-3"
                                                           class="svg-div w-100 border-0  g-0">
                                                </div>
                                            </div>
                                            <div>
                                                    <div id="uploadspan" style="font-size: 14px;"></div>
                                                </div>
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
                            <div class="my-3 px-2" id="btndyy" style="display: none">
                                <button type="submit" class="w-100 absendenRedBtn py-2 border-0 mb-5 mb-md-0">
                                    <span class="fw-bold fs-6">Absenden</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        background: #e59394;
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

    

    .white-thingy {
        background-color: #fff;
        border-radius: 10px;

    }

    .fw-600 {
        font-weight: 600;
    }

    .wrapper-div {
        background-color: #EF696A;
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
