@extends('template.navbar')
    @section('content')
    <title>Termine</title>
    
<section>
    <div class="px-4">
        <div class="row">
            <div class="col text-right my-2 ">
                <div class="pull-right text-end">
                    <button class="border-0 px-2 pt-1 pb-2 me-2"
                            style="background-color: #C4C6D2; border-radius: 12px;">
                        <svg id="Group_1" data-name="Group 1" xmlns="http://www.w3.org/2000/svg"
                             height="22px" viewBox="0 0 32.504 28.358">
                            <g id="Ellipse_2" data-name="Ellipse 2" transform="translate(0)" fill="none"
                               stroke="#fff" stroke-linecap="round" stroke-width="2">
                                <ellipse cx="12.438" cy="12.438" rx="12.438" ry="12.438" stroke="none" />
                                <ellipse cx="12.438" cy="12.438" rx="11.438" ry="11.438" fill="none" />
                            </g>
                            <line id="Line_4" data-name="Line 4" x2="8.532" y2="7.141"
                                  transform="translate(22.563 19.808)" fill="none" stroke="#fff"
                                  stroke-linecap="round" stroke-width="2" />
                        </svg>
                    </button>
                    <button class="border-0 px-2 pt-1 pb-2" style="background-color: #C4C6D2; border-radius: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg"height="22px" viewBox="0 0 28.063 28.637">
                            <g id="Group_2" data-name="Group 2" transform="translate(1 1)">
                                <circle id="Ellipse_3" data-name="Ellipse 3" cx="6.803" cy="6.803" r="6.803"
                                        transform="translate(6.229)" fill="none" stroke="#fff" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                                <path id="Path_1" data-name="Path 1" d="M2,102.218a13.032,13.032,0,0,1,26.063,0"
                                      transform="translate(-2 -75.581)" fill="none" stroke="#fff"
                                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                      stroke-width="2" />
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col">
        <section>
            <div class="container">
                <div class="declined-section row">
                    <div
                        class="header-section-name text-center col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 g-0 my-auto">
                        <div class="py-3 ">
                            <div class="mx-3">
                                    <span class="fs-3 fw-bold text-color-header1">
                                        {{$leads->first_name}}
                                    </span>
                            </div>
                            <div class="mx-3">
                                    <span class="fs-6 text-color-header1">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.587" height="16.243"
                                                 viewBox="0 0 8.587 12.243">
                                                <path id="Path_170" data-name="Path 170"
                                                      d="M1507.522,2353.695l.285-.4c.45-.637.916-1.3,1.32-1.908a17.1,17.1,0,0,0,1.607-2.977,3.3,3.3,0,0,0,.287-1.836,3.541,3.541,0,0,0-3.492-2.981,3.5,3.5,0,0,0-2.866,1.494,3.146,3.146,0,0,0-.606,2.37,6.507,6.507,0,0,0,.733,1.932,32.418,32.418,0,0,0,2.511,4.006c.072.1.145.2.22.3m.009-9.063h.024a2.481,2.481,0,0,1-.023,4.963h-.028a2.486,2.486,0,0,1-2.446-2.508,2.475,2.475,0,0,1,2.474-2.455m0,9.964c-.23-.312-.449-.6-.66-.9a32.713,32.713,0,0,1-2.552-4.072,7.013,7.013,0,0,1-.785-2.091,3.7,3.7,0,0,1,.695-2.752,4.05,4.05,0,0,1,7.31,1.7,3.861,3.861,0,0,1-.319,2.12,17.67,17.67,0,0,1-1.656,3.068C1508.941,2352.621,1508.181,2353.663,1507.534,2354.6Zm0-9.438a1.955,1.955,0,0,0-.021,3.91h.023a1.955,1.955,0,0,0,.018-3.91Z"
                                                      transform="translate(-1503.243 -2342.783)" fill="#fff" stroke="#fff"
                                                      stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        {{$leads->address}}
                                    </span>
                            </div>
                            <div class="input-group justify-content-center mt-3">
                                <button class="py-2 border-0 static-btn1 m-1">
                                        <span class="bg-dark py-1 px-3 people-svg-span">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                                 class="bi bi-people-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                <path fill-rule="evenodd"
                                                      d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                            </svg>
                                        </span>
                                    <span class="px-2" style="font-size: 14px;">
                                            {{$leads->number_of_persons}} Personon
                                        </span>
                                </button>
                                <button class="py-2 border-0 static-btn1 m-1">
                                        <span class="bg-dark py-1 px-3 people-svg-span">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                                 class="bi bi-people-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                <path fill-rule="evenodd"
                                                      d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                            </svg>
                                        </span>
                                    <span class="px-2" style="font-size: 14px;">
                                            {{$leads->created_at}}
                                        </span>
                                </button>
                            </div>
                            <div class="mx-3">
                                <hr class="hr-style">
                            </div>
                        </div>
                    </div>
                    <div class="declined-items py-3 col-12 col-sm-12 col-md-12 col-lg col-xl g-0 ">
                        <div class="border-left-div">
                            @php
                                $leadss = $leads->id * 1244;
                                $leadId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                            @endphp
                            <form method="POST" action="{{route('deletedlead',$leadId)}}">
                                @csrf
                            <div class="termin-div mx-3 py-3">
                                <div class="text-center py-3">
                                        <span class="fs-5 fw-bold text-secondary">
                                            Kein Termin Vereinbart
                                        </span>
                                </div>
                                <div class="row g-3 align-items-center py-1 mx-5">
                                    <div class="col-12 col-md-6 text-center">
                                        <label for="inputTxt4" class="col-form-label">Begrundung: </label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" id="inputTxt4" class="form-control"
                                               aria-describedby="passwordHelpInline" name="reason">
                                    </div>
                                </div>
                                <div class="mb-3 mx-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">Kommentar:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                </div>
                            </div>
                            <div class="fertig-div text-center my-2">
                                <input type="submit" class="fertig-btn px-4 py-2" value="Fertig">
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</script>
@endsection
<style>
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
        background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='9' ry='9' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        border-radius: 9px;
    }

    .termin-div {
        background-color: #fff !important;
        border-radius: 19px !important;

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

    .accepted-section {
        background-color: #7DBF9A;
        border-radius: 19px;
    }

    .declined-section {
        background-color: #EF696A;
        border-radius: 19px;
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

    .text-color-header1 {
        color: #fff;
    }

    .people-icon-div {
        background-color: #525353;
        margin: 3px;
    }

    .static-btn1 {
        background-color: #fff !important;
        border-radius: 8px !important;
    }

    .people-svg-span {
        border-radius: 8px;
    }

    .accordion-button:not(.collapsed) {
        color: #7DBF9A;
        background-color: #fff;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed)::after {
        content: '';
    }

    .accordion-button:focus {
        border-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
</style>

<style>
    /*Per Notification */
    .coloriii a{
        color: black !important;
    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>

