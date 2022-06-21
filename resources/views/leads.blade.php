@extends('template.navbar')
@section('content')
    <head>
        <title>Leads</title>
    </head>
    <leads></leads>
    @php $user = auth(); @endphp
    @if($user->user()->hasRole('admin') || $user->user()->hasRole('salesmanager'))
        <div class="">
            <div class="col-12 col-lg-9 ps-3 pe-3 pb-5">
                <form action="{{route('importleads')}}" class="mb-2" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="greyBackgroundDivLeads ">
                    <div class="row g-0">
                        <div class="col-auto">
                            <div class="cornerSvgLeads">
                                <svg width="152" height="145" viewBox="0 0 152 145" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_28_428)">
                                        <path
                                            d="M37.8089 76.6026C40.6028 81.2529 48.5509 85.8226 52.7934 89.1208C57.0358 92.419 51.5186 101.776 56.5636 103.22C61.6087 104.664 77.1172 98.167 82.1967 97.5371C87.2763 96.9072 92.1249 95.2406 96.4657 92.6326C100.806 90.0246 104.554 86.5261 107.496 82.3371C110.437 78.148 112.514 73.3503 113.607 68.2179C114.701 63.0855 114.79 57.7189 113.87 52.4246C112.95 47.1303 112.1 38.1049 111.258 33.1283L81.7671 33.1283L66.0166 33.1283C59.914 33.1283 53.8752 34.3691 48.2671 36.7755L47.1897 37.6043C43.645 40.3309 40.9314 43.9925 39.3539 48.1771C38.3323 50.8871 37.8089 53.7593 37.8089 56.6555L37.8089 76.6026Z"
                                            fill="#DCE4F9" />
                                    </g>
                                    <path
                                        d="M90.375 67.9465H77.786L80.2522 65.2408L78.9044 63.7679L74.125 68.9911L78.9044 74.2143L80.2522 72.7414L77.786 70.0357H90.375V67.9465Z"
                                        fill="#313131" />
                                    <path
                                        d="M86.8928 62.9388V58.9592C86.8936 58.8283 86.8673 58.6985 86.8153 58.5772C86.7633 58.456 86.6867 58.3458 86.5899 58.2528L79.2774 51.2885C79.1798 51.1963 79.064 51.1234 78.9367 51.0739C78.8095 51.0244 78.6732 50.9993 78.5357 51H68.0893C67.5352 51 67.0038 51.2097 66.6119 51.5828C66.2201 51.956 66 52.4621 66 52.9898V76.8673C66 77.3951 66.2201 77.9012 66.6119 78.2743C67.0038 78.6475 67.5352 78.8571 68.0893 78.8571H84.8036C85.3577 78.8571 85.8891 78.6475 86.2809 78.2743C86.6727 77.9012 86.8928 77.3951 86.8928 76.8673V74.8776H84.8036V76.8673H68.0893V52.9898H76.4464V58.9592C76.4464 59.4869 76.6665 59.993 77.0584 60.3662C77.4502 60.7394 77.9816 60.949 78.5357 60.949H84.8036V62.9388H86.8928ZM78.5357 58.9592V53.3977L84.3753 58.9592H78.5357Z"
                                        fill="#313131" />
                                    <defs>
                                        <filter id="filter0_d_28_428" x="0.808594" y="0.128235" width="150.691"
                                                height="144.3" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                           result="hardAlpha" />
                                            <feOffset dy="4" />
                                            <feGaussianBlur stdDeviation="18.5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                           values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                     result="effect1_dropShadow_28_428" />
                                            <feBlend mode="normal" in="SourceGraphic"
                                                     in2="effect1_dropShadow_28_428" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="col">
                            <div class="cornerSvgTitleLeads">
                                <span class="leadsTitleSpanStyle fs-5">Leads Importieren</span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 px-2 px-md-4 pb-4" style="margin-top: -1.5rem;">
                        <div class="col pe-2" >
                            <label for="file" class="leadsCustomFileInput form-control">
                                <div class="row g-0">
                                    <div class="col my-auto ps-2">
                                        <span id="afterUploadTextKunden" style="color: #CBCBCB;">keine Datei ausgewählt</span>
                                    </div>
                                    <div class="col-auto my-auto">
                                        <div
                                            class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2">Datei auswählen
                                        </div>
                                    </div>
                                </div>
                                <input onchange="changeUploadText()" class=" d-none" type="file" name="file" id="file">
                            </label>
                            <script>
                                                    function changeUploadText(){
                                                        var text = document.getElementById("file").value;
                                                        var text2 = text.split("\\").pop();
                                                        if(text == null || text == ''){
                                                            document.getElementById("afterUploadTextKunden").innerHTML = 'No File Selected';
                                                        }
                                                        else{
                                                            document.getElementById("afterUploadTextKunden").innerHTML = text2;
                                                        }
                                                    }
                                                </script>
                        </div>
                        <div class="col-12 col-md-auto my-auto pt-4 pt-md-0">
                            <button type="submit" class="leadOffnenBtnStyle w-100 py-1 px-4">Hochladen</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>



{{--        <div class="container-fluid p-0">--}}
{{--            <div class="col-12 g-0  ">--}}
{{--                <div class="mx-1 mx-sm-3">--}}
{{--                <div class="import-leads-div px-3 m-1">--}}
{{--                    <form action="{{route('importleads')}}" class="mb-2" enctype="multipart/form-data" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="head py-3">--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="svg-divvvvvvvvvv my-auto">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="30"  fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">--}}
{{--                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>--}}
{{--                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>--}}
{{--                                </svg>--}}
{{--                                </div>--}}
{{--                                <div class="">--}}
{{--                                <span class="fs-5 ps-2 fw-bold">Leads Importieren</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="content py-3">--}}
{{--                            <input type="file" class="form-control" name="file" id="file">--}}
{{--                            <input type="submit" class=" btn fs-5 py-2 px-5 my-3" value="Senden"--}}
{{--                                   style="background-color: #0C71C3; color: #ffffff; font-weight: bold; border: none; border-radius: 12px;">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


    @endif

    @php $csrf_token = csrf_token();@endphp



@endsection




<style scoped>
    .modal-dialog {
        max-width: 750px !important;
    }
    @media (max-width: 576px) {
        .modal-dialog {
            max-width: 500px !important;
        }

        .modaldialogg {
            max-width: 500px !important;
            top: 10%;
        }
    }
</style>
<style>
    /*Per Notification */
    .coloriii a {
        color: black !important;
    }
</style>

<script>
    var ids = [];
    var cnt = 0;

    function getid(x) {
        ids[cnt] = x.value;
        cnt++;
    }

    window.data = @json(compact('csrf_token'))
    // function callModalFunct() {
    //             document.getElementById("mod01").style.display = "block";
    //         }
    //         function callModalFunct1() {
    //             document.getElementById("mod02").style.display = "block";
    //         }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
        overflow-x: hidden !important;
    }

    .grayyy1 {
        color: #88889D;
    }

    .fw-500 {
        font-weight: 500;
    }

    .assigned-items {
        background-color: #EFEFEF;
        border-radius: 15px;
    }

    .assigned-items .button-div button {
        background-color: #0C71C3;
        color: #fff;
        border-radius: 8px;
    }

    /* overflow-scroll divvvvvvvvv */
    .overflow-div {
        padding-right: 15px;
        height: 600px !important;
        overflow: auto;
    }

    .overflow-div::-webkit-scrollbar {
        width: 0px;
    }

    /* Track */
    .overflow-div::-webkit-scrollbar-track {
        background: #EFEFEF !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div::-webkit-scrollbar-thumb {
        background: #0C71C3;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div::-webkit-scrollbar-thumb:hover {
        background: #0C71C3;
        border-radius: 10px;
    }


    .assigned-leads {
        height: 90vh;
    }

    .assigned-leads .header {
        /* border-bottom: 1px solid #70707050; */
        /* border-top: 1px solid #70707050; */
        /* border-left: 1px solid #70707050; */
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .assigned-leads .content {
        background-color: #EFEFEF;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
    }


    .lead-statistics {
        /* height: 90vh; */
        background-color: #fff;
        /* border-left: 1px solid #70707050; */
    }

    .lead-statistics .header {
        /* border-bottom: 1px solid #70707050; */
        /* border-top: 1px solid #70707050; */
        /* border-right: 1px solid #70707050; */
        /* border-left: 1px solid #70707050; */
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .lead-statistics .content {
    }

    @media (max-width: 575.98px) {
        .overflow-div {
            padding-right: 5px;
        }

    }
</style>


{{--Else--}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }
    .count {
        background-color: #EFEFEF;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        vertical-align: middle;
        display: flex;
        align-items: center;
    }

    .grayyy1 {
        color: #88889D;
    }

    .fw-500 {
        font-weight: 500;
    }

    .assigned-items {
        background-color: #fff;
        border-radius: 15px;
    }

    .assigned-items1 .button-div button {
        background-color: #0C71C3;
        color: #fff;
        border-radius: 8px;
    }

    /* overflow-scroll divvvvvvvvv */
    .overflow-div1 {
        padding-right: 15px;
        height: 560px !important;
        overflow: auto;
    }

    .overflow-div1::-webkit-scrollbar {
        width: 0px;
    }

    /* Track */
    .overflow-div1::-webkit-scrollbar-track {
        background: #EFEFEF !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div1::-webkit-scrollbar-thumb {
        background: #0C71C3;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div1::-webkit-scrollbar-thumb:hover {
        background: #0C71C3;
        border-radius: 10px;
    }

    .form-check .form-check-input[type=checkbox] {
        border-radius: .25em;
        height: 29px;
        width: 29px;
    }


    .import-leads-div {
        /* border-top: 1px solid #70707050; */
        background-color: #EFEFEF;
        border-radius: 10px;
        /* height: 25vh; */
    }
    .form-remove-mb {
        margin-block-end: 0rem !important;
    }

    .assigned-leads1 {
        height: auto;
    }

    .assigned-leads1 .header {
        /* border-bottom: 1px solid #70707050; */
        /* border-top: 1px solid #70707050; */
        /* border-left: 1px solid #70707050; */
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .assigned-leads1 .content {
        background-color: #EFEFEF;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
    }

    .assigned-leads1 .button-div button {
        background-color: #0C71C3;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 12px;
    }

    .lead-statistics1 {
        height: max-content;
        background-color: #fff;
        border-bottom-right-radius: 8px !important;
        border-bottom-left-radius: 8px !important;
        /* border-left: 1px solid #70707050; */
    }

    .lead-statistics1 .header {
        /* border-bottom: 1px solid #70707050; */
        /* border-top: 1px solid #70707050; */
        /* border-right: 1px solid #70707050; */
        /* border-left: 1px solid #70707050; */
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }
    .content-wrapper {
        background-color: #EFEFEF !important;
        height: 676px;
        border-radius: 10px;
    }
    .content-wrapper1 {
        background-color: #EFEFEF !important;
        height: 614px;
        border-radius: 10px;
    }

    .lead-statistics1 .content {
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
    }

    @media (max-width: 991.98px) {
        .overflow-div {
            padding-right: 5px;
        }
        .content-wrapper {
            height: auto;
        }
        .content-wrapper1 {
            height: auto;
        }
        .lead-statistics {
            height: auto;
        }
        .lead-statistics1 {
            height: auto;
        }
    }
</style>

{{--Mobile Leads Style--}}
<style>
    .gray-div-1 {
        color: #88889D;
    }

    .assigned-leads-div-11 {
        border-radius: 0;
    }

    .t {
        color: #88889D;
    }

    .fw-600 {
        font-weight: 600;

    }

    .fw-500 {
        font-weight: 500;
    }

    .white-divv {
        background-color: #fff;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 15px !important;
        border-top-right-radius: 15px !important;
    }

    .lead-offnen-new {
        background-color: #0C71C3;
        color: #fff;
        border-bottom-left-radius: 15px !important;
        border-bottom-right-radius: 15px !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .overflow-divvv::-webkit-scrollbar {
        width: 0px;
    }

    /* Track */
    .overflow-divvv::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-divvv::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-divvv::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .form-check .form-check-input[type=checkbox] {
        border-radius: 0.25em;
        height: 29px;
        width: 29px;
    }
    /*.mobile-leads {*/
    /*    display: none;*/
    /*}*/
    /*.desktop-leads {*/
    /*    display: block;*/
    /*}*/
    @media (max-width: 575.98px) {
        .namme span {
            font-size: 1.25rem !important;
        }
        .assigned-items {
            background-color: #fff !important;
        }
        .assigned-items .button-div button {
            width: 100%;
            background-color: #0C71C3;
            color: #fff;
            border-bottom-left-radius: 15px !important;
            border-bottom-right-radius: 15px !important;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
        }
        .modal-content {
            border-radius: 10 !important;
        }
        .assigned-items .button-div button {
            font-size:  1.25rem !important;
        }
        .assigned-leads1 .content .overflow-div1 {
            overflow-x: hidden !important;
        }

    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>
<style>
    .greyBackgroundDivLeads {
        background: #F9FAFC;
        border-radius: 23px;
    }
    .iosWebkitHeight {
        -webkit-logical-height: -webkit-fill-available;
        height: 100%;
    }
    .leadsTitleSpanStyle {
        font-weight: 700;
        color: #313131
    }

    .cornerSvgLeads {
        margin-top: -2.1rem;
        margin-left: -2.3rem;
    }

    .cornerSvgTitleLeads {
        margin-left: -1rem;
        margin-top: 0.7rem;
    }

    .whiteBacgkroundLeads {
        background: #FFFFFF;
        border: 1px solid #F2F2F2;
        box-sizing: border-box;
        border-radius: 11px;
        height: 100%;
    }
    .positionAbsDiv {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        padding-right: 2rem;
        width: 100%;
    }
    .LeadNameStyleSpan {
        font-weight: 600;
        color: #313131;
    }

    .LeadLeftSideSpanStyle {
        font-weight: 500;
    }

    .LeadRightSideSpanStyle {
        color: rgba(0, 0, 0, 0.73);
    }

    .containerLeads {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .containerLeads input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmarkLeads {
        position: absolute;
        top: -10px;
        left: 5;
        height: 25px;
        width: 25px;
        background-color: #fff;
        border: 1px solid #E6E6E6;
        border-radius: 5px;
    }

    .containerLeads:hover input~.checkmarkLeads {
        background-color: #ccc;
    }

    .containerLeads input:checked~.checkmarkLeads {
        background-color: #5288F5;
    }

    .checkmarkLeads:after {
        content: "";
        position: absolute;
        display: none;
    }

    .containerLeads input:checked~.checkmarkLeads:after {
        display: block;
    }

    .containerLeads .checkmarkLeads:after {
        left: 8px;
        top: 3px;
        width: 7px;
        height: 14px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .leadOffnenBtnStyle {
        font-weight: 600;
        color: #FFFFFF;
        background: #5288F5;
        border-radius: 10px;
        border: none;
    }

    .socialMediaSpan {
        font-weight: 500;
        font-size: 18px;
        color: #313131;
    }

    .underlinedFirstTxt {
        font-weight: 500;
        font-size: 18px;
        text-decoration-line: underline;
        color: #3670BD;
    }

    .underlinedSecondtTxt {
        font-weight: 500;
        font-size: 18px;
        text-decoration-line: underline;
        color: #C41F11;
    ;
    }

    .responsivePositionMobile {
        position: absolute;
        bottom: 0.5rem;
    }

    .leadsCustomFileInput {
        border: none !important;
        background-color: #FFFFFF !important;
        border-radius: 13px !important;
        color: #CBCBCB;
        font-weight: 400;
        padding: 0.5rem 0.5rem;
    }

    .leadOffnenBtnStyle2 {
        background: #F0F2F4;
        border: 1px solid #979797;
        box-sizing: border-box;
        border-radius: 10px;
        color: #979797;
        font-weight: 500;
    }

    .leadsOverflowDiv {
        overflow-y: auto;
        overflow-x: hidden;
        height: 50vh;
    }

    .leadsOverflowDiv::-webkit-scrollbar {
        width: 4px;
    }

    .leadsOverflowDiv::-webkit-scrollbar-track {
        background: transparent;
    }

    .leadsOverflowDiv::-webkit-scrollbar-thumb {
        background: #5288F599;
        border-radius: 5px;
    }

    .leadsOverflowDiv::-webkit-scrollbar-thumb:hover {
        background: #5288F5;
    }

    @media (max-width: 768.98px) {
        .responsivePositionMobile {
            position: relative;
        }
    }
</style>

