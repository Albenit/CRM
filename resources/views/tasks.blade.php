@extends('template.navbar')
@section('content')
    <head>
        <title>
            Pendenzen
        </title>
        <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
    </head>

    @if(Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('admin'))
        {{--        mobile--}}
        @if (Auth::guard('admins')->user()->hasRole('fs'))
        <section class="mobile-tasks">
            <div class="row g-0 mx-3">
                
                <div class="col-12  col-md-6">
                    <div class="pendzen-div  my-3 mx-3">
                        <div class="pb-1">
                            <span class="fw-600 fs-5">Pendenzen/ Zur Nachbearbeitung</span>
                        </div>
                        <div id="secondDivToggle22" class="wrapper1 p-2" style="display: block;">

                            <div class="overflow-divv2">
                                @if(count($pending) == 0)
                                    <div class="text-center fs-6 fw-400" style="color: #D1D1D1">
                                        Keine Pendenze
                                    </div>
                                @else
                                    @foreach($pending as $task)
                                    @if ($task->family_id != 0)
                                        @php
                                            $leadss = $task->family->id * 1244;
                                            $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                            $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                            $pend_id = $task->id;
                                        @endphp
                                        <div class="offene-item-one py-2 px-3 m-2"
                                             data-bs-target="#statsss{{$task->id}}"
                                             data-bs-toggle="modal">
                                            <div class="d-flex justify-content-between">
                                                <div class="name-divs">
                                                    <div class="name fs-6 fw-600" style="color: #434343;">
                                                        {{ucfirst($task->family->first_name)}} {{ucfirst($task->family->last_name)}}
                                                    </div>
                                                </div>
                                                <div class="svg-divv my-auto">
                                                <svg width="5" height="15" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.71429 7.00003C2.71429 6.52665 2.33053 6.14289 1.85714 6.14289C1.38376 6.14289 1 6.52665 1 7.00003C1 7.47342 1.38376 7.85718 1.85714 7.85718C2.33053 7.85718 2.71429 7.47342 2.71429 7.00003Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M2.71429 1.85709C2.71429 1.3837 2.33053 0.999948 1.85714 0.999948C1.38376 0.999948 1 1.3837 1 1.85709C1 2.33048 1.38376 2.71423 1.85714 2.71423C2.33053 2.71423 2.71429 2.33048 2.71429 1.85709Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M2.71429 12.1429C2.71429 11.6695 2.33053 11.2857 1.85714 11.2857C1.38376 11.2857 1 11.6695 1 12.1429C1 12.6162 1.38376 13 1.85714 13C2.33053 13 2.71429 12.6162 2.71429 12.1429Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="statsss{{$task->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content"
                                                     style="background: #fff; border-radius: 18px">
                                                    <div class="px-3 pt-4 pb-3 w-100"
                                                         style="border-bottom: none !important;">
                                                         <div class="row g-0">
                                                             <div class="col">
                                                                 <div style="font-weight: 700;font-size: 18px">
                                                                    Pendenzen Info
                                                                 </div>
                                                             </div>
                                                             <div class="col-auto my-auto">
                                                             <button type="button" class=""
                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                style="opacity: 1 !important;background-color: transparent;border: none">
                                                                <svg width="17" height="17" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M19 2L2 19" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M2 2L19 19" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>


                                                            </button>
                                                             </div>
                                                         </div>

                                                    </div>
                                                    <div class="modal-body p-3 mx-3" style="background-color: #FAFAFA;border-radius: 9px;">
                                                    <div class="row">
                                                            <div class="col-12">
                                                                <div class="my-1"
                                                                     style="padding: 5px;background-color: transparent;border-radius: 15px">

                                                                    <div class="row g-0">

                                                                        <div class="col-6 pe-3">
                                                                            <span class="fw-600">Kundenname</span>
                                                                        </div>
                                                                        <div class="col">
                                                                            {{ucfirst($task->family->first_name)}} {{ucfirst($task->family->last_name)}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-1"
                                                                     style="padding: 5px;background-color: transparent; border-radius: 15px">
                                                                     <div class="row g-0">

                                                                        <div class="col-6 pe-3">
                                                                            <span class="fw-600">Titel</span>
                                                                        </div>
                                                                        <div class="col">
                                                                            {{$task->title}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                                <div class="col-12">
                                                                    <div class="row g-0 my-1" style="padding: 5px; background-color: transparent; border-radius: 15px;">
                                                                        <div class="col-6 pe-3" style="font-weight: 600">
                                                                            Beschreibung
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <span style="font-weight: 400 !important;">
                                                                                {{$task->description}}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    
                                                            <div class="col-12">
                                                                <div class="my-1"
                                                                     style="padding: 5px;background-color: transparent;border-radius: 15px">
                                                                    <div class="row g-0">

                                                                        <div class="col-6 pe-3">
                                                                            <span class="fw-600">Datum</span>
                                                                        </div>
                                                                        <div class="col">
                                                                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('d.m.Y')}}
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-1"
                                                                     style="padding: 5px;background-color: transparent; border-radius: 15px">
                                                                     <div class="row g-0">

                                                                        <div class="col-6 pe-3">
                                                                            <span class="fw-600">Zeit</span>
                                                                        </div>
                                                                        <div class="col">
                                                                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('H:i')}}
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                    <div class="modal-footer text-center mx-1"
                                                         style="border-top: none !important; display: block;">
                                                        <button type="button" class="btn py-1 w-100 mx-0"
                                                                style=" color: #ffffff !important; background-color: #2F60DC !important;border-radius: 8px !important;font-weight: 600"
                                                                data-bs-dismiss="modal">Ablehnen</button>
                                                        {{--                                                            <a onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">--}}
                                                        {{--                                                                <button class="btn px-3"--}}
                                                        {{--                                                                        style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"--}}
                                                        {{--                                                                        data-bs-dismiss="modal"><b>Offen</b></button>--}}
                                                        {{--                                                            </a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                            @php
                                                // $leadss = $task->family->id * 1244;
                                                // $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                $pend_id = $task->id;
                                            @endphp
                                            <div class="offene-item-one py-2 px-3 m-2"
                                                data-bs-target="#statss{{$task->id}}"
                                                data-bs-toggle="modal">
                                                <div class="d-flex justify-content-between">
                                                    <div class="name-divs">
                                                        <div class="name fs-6 fw-600" style="color: #434343;">
                                                            {{ucfirst($task->title)}} 
                                                        </div>
                                                    </div>
                                                    <div class="svg-divv my-auto">
                                                    <svg width="5" height="15" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.71429 7.00003C2.71429 6.52665 2.33053 6.14289 1.85714 6.14289C1.38376 6.14289 1 6.52665 1 7.00003C1 7.47342 1.38376 7.85718 1.85714 7.85718C2.33053 7.85718 2.71429 7.47342 2.71429 7.00003Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M2.71429 1.85709C2.71429 1.3837 2.33053 0.999948 1.85714 0.999948C1.38376 0.999948 1 1.3837 1 1.85709C1 2.33048 1.38376 2.71423 1.85714 2.71423C2.33053 2.71423 2.71429 2.33048 2.71429 1.85709Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M2.71429 12.1429C2.71429 11.6695 2.33053 11.2857 1.85714 11.2857C1.38376 11.2857 1 11.6695 1 12.1429C1 12.6162 1.38376 13 1.85714 13C2.33053 13 2.71429 12.6162 2.71429 12.1429Z" fill="#454545" stroke="#454545" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="statss{{$task->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content"
                                                        style="background: #fff; border-radius: 18px">
                                                        <div class="px-3 pt-4 pb-3 w-100"
                                                            style="border-bottom: none !important;">
                                                            <div class="row g-0">
                                                                <div class="col">
                                                                    <div style="font-weight: 700;font-size: 18px">
                                                                        Pendenzen Info
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto my-auto">
                                                                <button type="button" class=""
                                                                    data-bs-dismiss="modal" aria-label="Close"
                                                                    style="opacity: 1 !important;background-color: transparent;border: none">
                                                                    <svg width="17" height="17" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M19 2L2 19" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M2 2L19 19" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>


                                                                </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-body p-3 mx-3" style="background-color: #FAFAFA;border-radius: 9px;">
                                                        <div class="row">
                                                        
                                                                <div class="col-12">
                                                                    <div class="my-1"
                                                                        style="padding: 5px;background-color: transparent; border-radius: 15px">
                                                                        <div class="row g-0">

                                                                            <div class="col-6 pe-3">
                                                                                <span class="fw-600">Titel</span>
                                                                            </div>
                                                                            <div class="col">
                                                                                {{$task->title}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                    <div class="col-12">
                                                                        <div class="row g-0 my-1" style="padding: 5px; background-color: transparent; border-radius: 15px;">
                                                                            <div class="col-6 pe-3" style="font-weight: 600">
                                                                                Beschreibung
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <span style="font-weight: 400 !important;">
                                                                                    {{$task->description}}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        
                                                                <div class="col-12">
                                                                    <div class="my-1"
                                                                        style="padding: 5px;background-color: transparent;border-radius: 15px">
                                                                        <div class="row g-0">

                                                                            <div class="col-6 pe-3">
                                                                                <span class="fw-600">Datum</span>
                                                                            </div>
                                                                            <div class="col">
                                                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('d.m.Y')}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="my-1"
                                                                        style="padding: 5px;background-color: transparent; border-radius: 15px">
                                                                        <div class="row g-0">

                                                                            <div class="col-6 pe-3">
                                                                                <span class="fw-600">Zeit</span>
                                                                            </div>
                                                                            <div class="col">
                                                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('H:i')}}
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                        <div class="modal-footer text-center mx-1"
                                                            style="border-top: none !important; display: block;">
                                                            <button type="button" class="btn py-1 w-100 mx-0"
                                                                    style=" color: #ffffff !important; background-color: #2F60DC !important;border-radius: 8px !important;font-weight: 600"
                                                                    data-bs-dismiss="modal">Ablehnen</button>
                                                            {{--                                                            <a onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">--}}
                                                            {{--                                                                <button class="btn px-3"--}}
                                                            {{--                                                                        style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"--}}
                                                            {{--                                                                        data-bs-dismiss="modal"><b>Offen</b></button>--}}
                                                            {{--                                                            </a>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12  col-md-6">
                    <div class="kundenbirung-div  my-3 ">
                        <div class="d-flex justify-content-between pb-1">
                            <span class="fw-600 ps-4 fs-5">Geburstage/ Jubiläen</span>
                        </div>
                        <div class="wrapper2 p-2 mx-3">

                            @if(count($birthdays) == 0 && count($consultation) == 0)
                                <div class="text-center fs-6 fw-400" style="color: #D1D1D1">
                                    Keine Geburtstage / Mitarbeiterbesprechungen Für Heute
                                </div>
                            @else
                                <div class="overflow-divv1">
                                    @foreach($birthdays as $birth)
                                        <div class="offene-item-one22 py-2 px-3 m-2" style="background: #FFFFFF;border: 1px solid #DCE4F9;border-radius: 11px;">
                                            <div class="d-flex ">
                                                <div class="my-auto col-auto pe-4">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M29.0218 28.0429H27.7174V21.195C27.7174 19.5768 26.4009 18.2602 24.7826 18.2602H23.8043V11.4124C23.8043 9.79412 22.4878 8.47757 20.8695 8.47757H15.9783V7.65714C17.7066 7.04419 18.4575 5.01251 17.5435 3.42713C17.5434 3.42702 17.5434 3.4269 17.5433 3.42672L15.8473 0.488534C15.4709 -0.163382 14.5283 -0.162327 14.1528 0.488592L12.4568 3.4269C11.5406 5.01467 12.2965 7.0453 14.0217 7.65714V8.47757H9.13045C7.5122 8.47757 6.19566 9.79412 6.19566 11.4124V18.2602H5.21743C3.59919 18.2602 2.28264 19.5768 2.28264 21.195C2.28264 21.437 2.28264 25.9858 2.28264 28.0429H0.978283C0.437989 28.0429 0 28.4809 0 29.0212C0 29.5615 0.437989 29.9994 0.978283 29.9994C1.5668 29.9994 26.4085 29.9994 29.0218 29.9994C29.5621 29.9994 30.0001 29.5615 30.0001 29.0212C30.0001 28.4809 29.5621 28.0429 29.0218 28.0429ZM14.1514 4.40489L15 2.93453L15.8485 4.40454C16.2218 5.05153 15.7518 5.86891 15 5.86891C14.2462 5.86891 13.7796 5.04942 14.1514 4.40489ZM8.15216 11.4124C8.15216 10.873 8.59103 10.4341 9.13045 10.4341H20.8696C21.409 10.4341 21.8479 10.873 21.8479 11.4124V14.2313C21.7567 14.139 21.658 14.034 21.5473 13.9135C20.98 13.2963 20.203 12.451 18.87 12.451C17.5377 12.451 16.7609 13.2961 16.1938 13.9131C15.6516 14.5029 15.3879 14.7432 14.957 14.7432C14.5122 14.7432 14.226 14.4574 13.7172 13.9096C13.1455 13.2941 12.3625 12.4511 11.0439 12.4511C9.71164 12.4511 8.9348 13.2962 8.36761 13.9131C8.29091 13.9966 8.2199 14.0731 8.15216 14.1441V11.4124ZM8.15216 16.5145C8.89425 16.2309 9.40513 15.6755 9.80808 15.2372C10.35 14.6476 10.6135 14.4075 11.0439 14.4075C11.4887 14.4075 11.7749 14.6933 12.2837 15.2411C12.8554 15.8566 13.6384 16.6996 14.957 16.6996C16.2899 16.6996 17.0669 15.8544 17.6342 15.2371C18.1761 14.6476 18.4397 14.4074 18.87 14.4074C19.301 14.4074 19.5647 14.6477 20.1068 15.2375C20.5261 15.6936 21.06 16.2738 21.8479 16.5458V18.2602H8.15216V16.5145ZM4.23915 28.0429V24.8049C4.23968 24.8055 4.24026 24.8061 4.24079 24.8067C4.92112 25.5532 5.76786 26.4823 7.13081 26.4823C8.46371 26.4823 9.24072 25.637 9.80808 25.0198C10.35 24.4302 10.6135 24.1901 11.0439 24.1901C11.4887 24.1901 11.7749 24.4759 12.2837 25.0237C12.8554 25.6392 13.6384 26.4822 14.957 26.4822C16.2899 26.4822 17.0669 25.637 17.6342 25.0197C18.1761 24.4302 18.4397 24.19 18.87 24.19C19.301 24.19 19.5647 24.4303 20.1068 25.0201C20.674 25.6372 21.4507 26.4822 22.7831 26.4822C24.116 26.4822 24.893 25.637 25.4604 25.0197C25.5711 24.8993 25.6697 24.7942 25.761 24.702V28.0429H4.23915ZM25.7609 22.3875C24.9731 22.6594 24.439 23.2396 24.0198 23.6957C23.4777 24.2855 23.214 24.5258 22.783 24.5258C22.3526 24.5258 22.0891 24.2857 21.5472 23.6961C20.9799 23.0789 20.2029 22.2336 18.87 22.2336C17.5377 22.2336 16.7609 23.0787 16.1937 23.6957C15.6515 24.2855 15.3879 24.5258 14.9569 24.5258C14.5121 24.5258 14.2259 24.24 13.7172 23.6922C13.1454 23.0767 12.3624 22.2337 11.0438 22.2337C9.71152 22.2337 8.93474 23.0787 8.36755 23.6957C7.82539 24.2855 7.56171 24.5258 7.13075 24.5258C6.66534 24.5258 6.27476 24.1341 5.68677 23.489C5.27444 23.0365 4.82204 22.5418 4.23903 22.2155V21.1951C4.23903 20.6557 4.6779 20.2168 5.21731 20.2168C5.73306 20.2168 24.2405 20.2168 24.7826 20.2168C25.322 20.2168 25.7608 20.6557 25.7608 21.1951V22.3875H25.7609Z" fill="#454545"/>
                                                    </svg>
                                                </div>
                                                <div class="name-divs col me-2">
                                                    <div class="name fs-5 fw-600" style="color: #434343;">
                                                        {{$birth['name']}} {{$birth['lname']}}
                                                    </div>
                                                    <div class="comment" style="color: #434343;font-weight: 400 !important;">
                                                        {{$birth['birthday']}} ({{$birth['age']}}yahre)
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($consultation as $perApp)
                                                <div class="whiteBgDivBirthday p-3 mb-2" >
                                                    <div class="row g-0">
                                                        <div class="col-auto my-auto">
                                                            <svg width="45" height="50" viewBox="0 0 40 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="1.5" y="1.5" width="37" height="52" rx="2.5" stroke="#454545" stroke-width="3"/>
                                                                <line x1="10.5" y1="32.5" x2="28.5" y2="32.5" stroke="#454545" stroke-width="3" stroke-linecap="round"/>
                                                                <line x1="10.5" y1="41.5" x2="28.5" y2="41.5" stroke="#454545" stroke-width="3" stroke-linecap="round"/>
                                                                <path d="M27.9644 14.6775C27.8788 14.4191 27.6512 14.2308 27.3772 14.1918L22.7304 13.5294L20.6523 9.39785C20.5297 9.15425 20.2768 9 20 9C19.7231 9 19.4702 9.15425 19.3477 9.39785L17.2697 13.5294L12.6228 14.1917C12.3488 14.2308 12.1212 14.4191 12.0356 14.6775C11.9501 14.9359 12.0214 15.2195 12.2197 15.4091L15.5822 18.6245L14.7881 23.1657C14.7413 23.4334 14.8535 23.704 15.0775 23.8637C15.2042 23.954 15.3543 24 15.5051 24C15.6208 24 15.7371 23.9729 15.8435 23.918L20 21.7742L24.1563 23.918C24.2634 23.9733 24.3807 23.9996 24.4968 24C24.8981 23.9994 25.2232 23.6801 25.2232 23.2863C25.2232 23.2315 25.2169 23.1781 25.205 23.1268L24.4178 18.6246L27.7803 15.4091C27.9786 15.2195 28.0499 14.9359 27.9644 14.6775Z" fill="#454545"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col ps-3 ps-md-4 my-auto">
                                                            <div>
                                                                <span class="birthDayFirstSpan">Title</span>
                                                                <span class="fs-6">{{$perApp->title}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Kommentar</span>
                                                                <span class="fs-6">{{$perApp->comment}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Datum & Zeit</span>
                                                                <span class="fs-6">{{Carbon\Carbon::parse($perApp->date)->format('d.m.Y')}} ({{$perApp->time}})</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Adress</span>
                                                                <span class="fs-6">{{$perApp->address}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Von</span>
                                                                <span class="fs-6">{{App\Models\Admins::find($perApp->assignfrom)->name}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        {{--        Desktop--}}
        <section class="desktop-tasks">
            <div class="container-fluid my-3">
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('backoffice'))
                    <div class="row g-0 mx-1 mx-sm-3">
                        <div class="col-12 col-lg-6 col-xl-6 pe-lg-2 ">
                            <div class="greyBgDivPendezen h-100 p-3 p-md-4 ">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z" fill="#DCE4F9"/>
                                            </g>
                                            <path d="M77.577 55.9988C77.9653 55.3258 78.9393 55.3334 79.317 56.0124L91.4726 77.8626C91.8434 78.5291 91.3614 79.3487 90.5987 79.3487H65.8352C65.0655 79.3487 64.5843 78.5156 64.969 77.849L77.577 55.9988Z" stroke="#313131" stroke-width="2"/>
                                            <path d="M78.1865 63.6046V67.7907V71.9767" stroke="#313131" stroke-width="1.5" stroke-linecap="square"/>
                                            <path d="M67.9538 53.5691L67.9538 59.6156L62.3724 59.6155" stroke="#313131" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M78.1865 73.8372V74.3927V74.9483" stroke="#313131" stroke-width="2"/>
                                            <path d="M75.0175 52.7327C74.2295 51.5032 73.1408 50.5057 71.8453 49.8264C70.5499 49.1472 69.0867 48.8067 67.5824 48.8344C66.078 48.862 64.5778 49.257 63.2113 49.9852C61.8449 50.7134 60.6534 51.7528 59.7398 53.0136C58.8263 54.2744 58.2183 55.7186 57.9682 57.2214C57.7182 58.7242 57.8338 60.2404 58.3049 61.6387C58.7761 63.037 59.5886 64.2755 60.6723 65.247C61.7559 66.2185 63.0781 66.8939 64.5245 67.2146" stroke="#313131" stroke-width="1.5" stroke-linecap="round"/>
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="18.5"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>

                                    </div>
                                    <div class="col titleMarginAuto">
                                        <div class="pb-3">
                                            <span class="fs-5 secondGreyBorderDashSpan">Offene Pendenzen</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="overFlowDivDashboard" style="margin-top: -1.5rem; height:250px">
                                    @if($opened->count() == 0)
                                        <div class="fs-6 fw-400 text-center d-flex h-100 justify-content-center align-items-center" style="color: #d1d1d1">
                                            keine offenen Pendenzen
                                        </div>
                                    @else
                                        <div class="row g-0 ps-2">
                                            <div class="col-3 ps-1">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Berater</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Kunde</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Aufgabe</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Beschreibung</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($opened->count() > 0)
                                            @foreach($opened as $pendency)
                                                @if ($pendency->family_id != 0)
                                                @php
                                                    $leadss = $pendency->family_id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($pendency->admin_id * 1244);
                                                    $pend_id = $pendency->id;
                                                @endphp
                                                    <div class="modal fade" style="top: 1% !important;" id="pendadmin{{$pendency->id}}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                                <div class="modal-header" style="border-bottom: 0 !important;">
                                                                    <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                                    style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                                    
                                                                </div>
                                                                <div class="modal-body px-0">
                                                                    <div class="modal-footer px-1 py-0 text-center"
                                                                        style="border-top: 0 !important; justify-content: flex-start !important;">
                                                                        <div class="row" style="width: 100%;">
                                                                            <div class="col-6 pe-1">
                                                                                <div>
                                                                                    <button type="button" class="btn py-1"
                                                                                            data-bs-dismiss="modal"
                                                                                            style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                                        Zurück
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 ps-1">
                                                                                <div>
                                                                                    <input onclick="accepttask({{$pendency->id}})" type="button"
                                                                                        style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                                        class="btn py-1" value="Pendenz abgeschlossen">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="thirdBorderDivDash py-2 my-2 ps-1">
                                                        <div data-bs-toggle="modal" data-bs-target="#pendadmin{{$pendency->id}}" class="row g-0 text-start ps-2">
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->adminpend->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->family->first_name}} {{$pendency->family->last_name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->title}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->description}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @else
                                                    @php
                                                        $leadss = $pendency->family_id * 1244;
                                                        $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                        $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($pendency->admin_id * 1244);
                                                        $pend_id = $pendency->id;
                                                    @endphp
                                                    <div class="modal fade" style="top: 1% !important;" id="pendadmin{{$pendency->id}}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                                <div class="modal-header" style="border-bottom: 0 !important;">
                                                                    <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                                    style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                                    
                                                                </div>
                                                                <div class="modal-body px-0">
                                                                    <div class="modal-footer px-0 py-0 text-center"
                                                                        style="border-top: 0 !important; justify-content: flex-start !important;">
                                                                        <div class="row g-0" style="width: 100%;">
                                                                            <div class="col-6 pe-1">
                                                                                <div>
                                                                                    <button type="button" class="btn py-1"
                                                                                            data-bs-dismiss="modal"
                                                                                            style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                                        Zurück
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 ps-1">
                                                                                <div>
                                                                                    <input onclick="accepttask({{$pendency->id}})" type="button"
                                                                                        style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                                        class="btn py-1" value="Pendenz abgeschlossen">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="thirdBorderDivDash py-2 my-2 ps-1">
                                                        <div data-bs-toggle="modal" data-bs-target="#pendadmin{{$pendency->id}}" class="row g-0 text-start ps-2">
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->adminpend->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->first_name}} {{$pendency->last_name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->title}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div>
                                                                    <span class="anfragenFieldsSpan fs-6">{{$pendency->description}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 h-auto ps-lg-2 pe-lg-2 mt-sm-3 mt-lg-0">
                            <div class="greyBgDivPendezen p-3 p-md-4 h-100">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.0423 77.3271C39.8362 81.9773 47.7843 86.547 52.0268 89.8453C56.2692 93.1435 50.752 102.5 55.797 103.944C60.8421 105.388 76.3506 98.8915 81.4301 98.2616C86.5097 97.6316 91.3583 95.9651 95.6991 93.3571C100.04 90.749 103.788 87.2506 106.729 83.0615C109.67 78.8724 111.747 74.0747 112.841 68.9423C113.934 63.8099 114.024 58.4434 113.104 53.1491C112.184 47.8547 111.334 38.8294 110.492 33.8527L80.9468 34.3263L63.3665 34.608C58.8425 34.6804 54.4031 35.8452 50.4263 38.0031L47.8194 39.4177C43.6759 41.6661 40.4617 45.3082 38.746 49.6991V49.6991C37.881 51.9127 37.4183 54.2631 37.3796 56.6394L37.0423 77.3271Z" fill="#DCE4F9"/>
                                            </g>
                                            <path d="M64.9144 52.1109C63.0288 52.5694 62.1035 54.0829 62.1035 56.695C62.1035 58.8662 63.0461 60.5871 64.681 61.4001C65.3124 61.7116 65.3729 61.7203 66.2467 61.7203C67.1029 61.7203 67.207 61.703 67.7516 61.4436C69.4124 60.6566 70.4155 58.8662 70.4069 56.7126C70.3982 54.0141 69.438 52.5003 67.4832 52.0853C66.8864 51.9636 65.4677 51.9722 64.9144 52.1109ZM67.4746 53.512C68.0887 53.6936 68.6077 54.2212 68.8152 54.8613C68.9967 55.4495 69.0745 57.1621 68.9449 57.7849C68.4259 60.2586 65.9867 61.2272 64.4559 59.5667C63.6948 58.7365 63.4524 57.9232 63.5043 56.3665C63.5734 54.6106 63.9455 53.8927 64.9746 53.538C65.5717 53.3305 66.8173 53.3218 67.4746 53.512Z" fill="black"/>
                                            <path d="M84.2894 52.1109C82.4038 52.5694 81.4785 54.0829 81.4785 56.695C81.4785 58.8662 82.4215 60.5871 84.056 61.4001C84.6874 61.7116 84.7479 61.7203 85.6304 61.7203C86.5125 61.7203 86.5733 61.7116 87.2047 61.4001C88.8392 60.5871 89.7822 58.8658 89.7822 56.695C89.7822 54.031 88.805 52.4999 86.8586 52.085C86.2614 51.9636 84.843 51.9722 84.2894 52.1109ZM86.8496 53.512C87.4551 53.6936 87.9827 54.2212 88.1902 54.8613C88.4063 55.5618 88.4585 57.361 88.268 58.0097C88.0692 58.7016 87.8441 59.1169 87.4291 59.5664C86.417 60.6649 84.843 60.6649 83.8309 59.5664C83.4156 59.1165 83.1908 58.7016 82.992 58.0097C82.8018 57.3696 82.8537 55.5618 83.0698 54.8786C83.2686 54.2472 83.7444 53.7454 84.3326 53.5466C84.9467 53.3305 86.1836 53.3218 86.8496 53.512Z" fill="black"/>
                                            <path d="M74.359 55.5878C72.6722 55.9944 71.6172 57.1535 71.2192 59.0387C71.0031 60.0854 71.0204 62.0401 71.2538 62.9136C71.8333 65.0499 73.4077 66.6415 75.267 66.9527C77.6111 67.3511 79.8943 65.6297 80.6294 62.9139C80.8628 62.0405 80.8801 60.0858 80.664 59.0391C80.2663 57.1276 79.2197 55.9858 77.481 55.5795C76.7891 55.4149 75.0422 55.4235 74.359 55.5878ZM76.841 56.8765C78.147 56.9976 78.9949 57.8191 79.2975 59.2293C79.479 60.0768 79.5136 61.4869 79.3666 62.2393C79.09 63.6318 78.2421 64.8514 77.1785 65.3618C76.7459 65.5692 76.573 65.6038 75.9416 65.6038C75.3102 65.6038 75.1373 65.5692 74.7047 65.3618C73.6408 64.8514 72.7932 63.6318 72.5163 62.2393C72.3001 61.1235 72.4471 59.3157 72.8365 58.4163C73.0612 57.8886 73.6235 57.3178 74.1338 57.1016C74.5491 56.9201 75.6646 56.7469 76.1145 56.7991C76.2355 56.816 76.5557 56.8506 76.841 56.8765Z" fill="black"/>
                                            <path d="M63.4438 62.0661C60.8663 62.6629 59.785 63.5367 59.3009 65.4309C59.128 66.071 58.9638 68.0775 59.007 68.8649C59.0416 69.4444 59.0502 69.4704 59.4655 69.9029C60.2439 70.69 61.922 71.3646 63.7557 71.6156C64.1104 71.6588 64.9493 71.728 65.6239 71.7626L66.8435 71.8231L66.9473 71.4427C66.9991 71.2353 67.0769 70.9496 67.1202 70.8113C67.172 70.673 67.2066 70.5257 67.2066 70.4911C67.2066 70.4479 66.8259 70.4133 66.3677 70.4133C64.3179 70.4133 62.4064 70.1021 61.3684 69.6004C60.4341 69.1502 60.3732 69.0724 60.3732 68.2245C60.3732 66.5896 60.6758 65.1712 61.1429 64.609C61.4804 64.2027 62.2328 63.8133 63.219 63.528L64.0147 63.3033L64.551 63.5713C65.6409 64.1249 66.8432 64.1249 67.95 63.5713L68.4864 63.3033L69.161 63.4935C69.5417 63.5972 70.0171 63.7528 70.225 63.8482C70.4324 63.9347 70.6143 64.0038 70.6316 63.9866C70.6489 63.9779 70.5884 63.6145 70.5019 63.1909C70.3463 62.4298 70.3463 62.4212 70.0175 62.3088C69.836 62.2483 69.291 62.11 68.8066 62.0149L67.9158 61.8247L67.6132 62.1273C66.9559 62.7846 65.5548 62.7933 64.9061 62.1446C64.7505 61.9803 64.5513 61.8506 64.4649 61.8593C64.3781 61.8586 63.9196 61.9537 63.4438 62.0661Z" fill="black"/>
                                            <path d="M82.8183 62.0661C81.4691 62.3773 81.5642 62.3081 81.3826 63.1906C81.2962 63.6145 81.2357 63.9776 81.253 63.9862C81.2702 64.0035 81.4518 63.9344 81.6593 63.8479C81.8667 63.7528 82.3425 63.5972 82.7232 63.4931L83.3979 63.303L83.9342 63.5709C85.0068 64.1245 86.2955 64.1159 87.3419 63.5623L87.835 63.3116L88.3713 63.4413C89.6687 63.7701 90.5076 64.2196 90.8623 64.7905C91.2081 65.3355 91.4159 66.304 91.4764 67.6623L91.537 68.8646L91.3036 69.1066C90.5598 69.8763 88.1984 70.4127 85.4826 70.4127H84.6091L84.7302 70.7328C84.7907 70.9144 84.8858 71.2346 84.9376 71.4421L85.0327 71.8224L86.3042 71.7619C89.2537 71.6149 91.3554 70.9749 92.4194 69.8936C92.826 69.487 92.8433 69.4351 92.8779 68.9161C92.9298 68.1723 92.7482 66.062 92.5926 65.4389C92.0823 63.4928 90.9232 62.5848 88.2074 62.0139L87.2907 61.8237L86.9882 62.1263C86.3308 62.7836 84.9297 62.7922 84.281 62.1435C84.1254 61.9793 83.9262 61.8496 83.8398 61.8583C83.7523 61.8586 83.2941 61.9537 82.8183 62.0661Z" fill="black"/>
                                            <path d="M72.8021 67.4721C70.856 67.896 69.7142 68.415 68.884 69.2366C67.7682 70.3525 67.3705 71.8141 67.3446 74.8501L67.3359 76.3117L67.9155 76.8567C69.0573 77.938 70.9688 78.6126 73.6759 78.8979C75.1289 79.0448 78.2254 78.9584 79.5228 78.725C81.564 78.3619 83.1988 77.661 84.0896 76.7529L84.5481 76.2858L84.5308 74.8155C84.5049 71.7795 84.1072 70.3525 82.9914 69.2366C82.1608 68.3977 80.9326 67.8528 78.9692 67.4634L78.0089 67.2732L77.6891 67.5845C77.2738 67.9911 76.7378 68.1813 75.9678 68.1813C75.1808 68.1813 74.5839 67.9825 74.2119 67.6017C73.8747 67.256 73.8402 67.256 72.8021 67.4721ZM73.7624 68.9856C74.8177 69.7121 76.8156 69.7466 78.0006 69.0547L78.3727 68.8473L78.5456 69.0634C78.7531 69.3314 79.2548 69.3746 79.4969 69.1498C79.6438 69.0202 79.7043 69.0202 80.2666 69.2017C81.1227 69.4783 81.8928 69.9628 82.2732 70.4645C82.8614 71.2256 83.0861 72.2204 83.1812 74.3912L83.2331 75.7318L82.8613 76.0693C82.1349 76.7267 80.6642 77.2198 78.6922 77.4705C77.2479 77.652 73.7447 77.6001 72.4819 77.384C70.9076 77.1074 69.5324 76.5797 68.9615 76.0348C68.6848 75.7754 68.6762 75.7495 68.6762 75.014C68.6762 73.31 68.9183 71.7273 69.299 70.9317C69.7229 70.0582 70.7347 69.4095 72.309 68.9942C73.3471 68.7262 73.3816 68.7262 73.7624 68.9856Z" fill="black"/>
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0419922" y="0.852722" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="18.5"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col" style="margin-top: -0.8rem;margin-left:-1rem;">
                                        <div class="pb-3">
                                            <span class="fs-5 secondGreyBorderDashSpan">Eingereichte Kunden</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="overFlowDivDashboard" style="height: 250px;margin-top: -1.5rem;">
                                    @if(count($answered) == 0)

                                        <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" style="color: #d1d1d1">
                                            Es gibt aktuell keine neu eingereichten Kunden

                                        </div>
                                    @else
                                        <div class="row g-0">
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start ps-1">
                                                    <div class="col-auto ps-2">
                                                        <span class="anfragenTitleSpans fs-6">Datum</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Vorname</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Nachname</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Berater</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $admin_id = Crypt::encrypt($leadsss);
                                            $count = 1;
                                        @endphp
                                        @foreach($answered as $family)
                                            <div class="thirdBorderDivDash py-1 my-2 px-1">
                                                @php
                                                    $leadss = $family->family_id * 1244;
                                                      $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                      $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($family->admin_id * 1244);
                                                      $pend_id = $family->id;
                                                @endphp
                                                <a style="text-decoration: none;color: black"
                                                   href="{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                    <div class="thirdBorderDivDash my-2" style="border:none">
                                                        <div class="row g-0 text-start ps-2">
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ Carbon\Carbon::parse($family->created_at)->format('d.m.Y')}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ucfirst($family->family->first_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ucfirst($family->family->last_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{$family->family->lead->admin->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach

                                        @php
                                            $count++;
                                        @endphp
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 h-auto pe-lg-2 mt-3">
                            <div class="greyBgDivPendezen  p-3 p-md-4">
                                <div class="row g-0">
                                    <div class="col-auto birthdayCornerSvg">
                                        <svg width="143" height="138" viewBox="0 0 143 138" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path
                                                    d="M37.3418 72.2188C39.8253 76.3524 46.8904 80.4145 50.6616 83.3463C54.4327 86.2781 49.5284 94.5952 54.013 95.8788C58.4975 97.1625 72.2831 91.3875 76.7984 90.8276C81.3136 90.2676 85.6236 88.7862 89.4821 86.4679C93.3407 84.1496 96.6723 81.0399 99.2867 77.3162C101.901 73.5925 103.747 69.3278 104.719 64.7655C105.692 60.2033 105.771 55.433 104.953 50.7268C104.135 46.0207 103.38 37.998 102.631 33.5742L76.3687 33.9952L56.3148 34.3165C55.1872 34.3345 54.0636 34.4543 52.9576 34.6744C46.3097 35.9972 40.8942 40.8068 38.7954 47.252L38.613 47.8121C38.0035 49.6838 37.6773 51.6361 37.6453 53.6043L37.3418 72.2188Z"
                                                    fill="#DCE4F9" />
                                            </g>
                                            <path
                                                d="M65.3019 46.7947C63.2024 47.9504 61.8457 50.4497 61.8457 53.1622C61.8457 53.7674 61.9127 54.3711 62.0447 54.9568C62.1193 55.2874 62.4128 55.512 62.7381 55.512C62.79 55.512 62.8426 55.5063 62.8952 55.4943C63.2784 55.408 63.5191 55.0272 63.4327 54.644C63.3239 54.1608 63.2686 53.6624 63.2686 53.1624C63.2686 50.9608 64.336 48.9508 65.988 48.0415C66.3322 47.8519 66.4577 47.4194 66.2683 47.0751C66.0788 46.7307 65.6461 46.6052 65.3019 46.7947Z"
                                                fill="black" />
                                            <path
                                                d="M87 57.2749C87 52.4876 83.497 48.5928 79.1911 48.5928C78.1105 48.5928 77.0448 48.8423 76.064 49.3182C74.7141 45.7707 71.5546 43.2755 67.8815 43.2755C62.9842 43.2755 59 47.7107 59 53.1622C59 57.7863 61.867 61.6786 65.726 62.7535C65.435 63.1136 65.2212 63.524 65.1125 63.9297C64.8578 64.8807 65.1861 65.7524 65.9696 66.2045C66.361 66.4306 66.7452 66.5453 67.1113 66.5453C67.1235 66.5453 67.1356 66.5444 67.1478 66.5441C67.0914 67.0189 66.9971 67.5926 66.9045 68.1563C66.4575 70.8785 65.8452 74.6069 67.2653 77.0669C67.3973 77.2952 67.6362 77.4228 67.8821 77.4228C68.0028 77.4228 68.1252 77.392 68.2371 77.3273C68.5774 77.1309 68.694 76.6957 68.4975 76.3555C67.3316 74.3358 67.8963 70.8974 68.3086 68.3868C68.4259 67.6717 68.5265 67.0591 68.5802 66.5431C68.604 66.5441 68.6276 66.5452 68.6515 66.5452H68.6516C69.0175 66.5452 69.4017 66.4306 69.7933 66.2045C70.5768 65.7524 70.9051 64.8805 70.6503 63.9295C70.5416 63.524 70.3278 63.1135 70.0369 62.7535C70.8942 62.5148 71.7023 62.1371 72.4411 61.6431C73.4659 63.5989 75.1348 65.0183 77.0642 65.6269C76.7588 65.9951 76.5348 66.419 76.4224 66.8378C76.1676 67.7889 76.4959 68.6607 77.2795 69.1132C77.671 69.3392 78.0548 69.4536 78.4209 69.4536C78.4617 69.4536 78.5022 69.4518 78.5423 69.4491C78.5633 69.7665 78.5926 70.1228 78.6247 70.5122C78.7801 72.3971 78.9928 74.9785 78.5481 76.5133C78.4387 76.8907 78.6561 77.2854 79.0335 77.3948C79.0996 77.414 79.1661 77.4231 79.2317 77.4231C79.5403 77.4231 79.8245 77.2206 79.9147 76.9094C80.4324 75.1229 80.2071 72.3904 80.0428 70.3953C80.0155 70.0656 79.989 69.7435 79.9688 69.4534C80.3325 69.452 80.7141 69.3376 81.103 69.1133C81.8865 68.661 82.215 67.7892 81.9601 66.8381C81.8481 66.4201 81.6247 65.997 81.3201 65.6294C84.5945 64.5962 87 61.242 87 57.2749ZM69.082 64.9722C68.8669 65.0963 68.7293 65.1224 68.6516 65.1224C68.5873 65.1224 68.5146 65.1072 68.4192 64.997C68.4151 64.9924 68.4106 64.9884 68.4064 64.984C68.3962 64.9729 68.386 64.962 68.3753 64.9516C68.3678 64.9444 68.36 64.9374 68.3522 64.9305C68.342 64.9215 68.3318 64.9128 68.321 64.9045C68.3124 64.8977 68.3037 64.8909 68.2946 64.8845C68.284 64.8769 68.273 64.8698 68.2619 64.8627C68.2526 64.8569 68.2435 64.8509 68.2339 64.8455C68.2219 64.8387 68.2095 64.8326 68.1972 64.8263C68.1882 64.8218 68.1792 64.8171 68.1701 64.8132C68.1551 64.8064 68.1396 64.8006 68.1242 64.795C68.1172 64.7925 68.1106 64.7896 68.1035 64.7872C68.0569 64.7718 68.0087 64.7613 67.9592 64.7559C67.9566 64.7556 67.9539 64.7556 67.9513 64.7553C67.9296 64.7533 67.9077 64.7519 67.8857 64.7517C67.8843 64.7517 67.8829 64.7516 67.8815 64.7516C67.8814 64.7516 67.8814 64.7516 67.8814 64.7516C67.8751 64.7516 67.869 64.7525 67.8626 64.7526C67.8459 64.753 67.8291 64.7537 67.8123 64.7554C67.8018 64.7564 67.7914 64.7582 67.7811 64.7596C67.7707 64.7611 67.7603 64.7619 67.7499 64.7639C67.7463 64.7647 67.7428 64.7658 67.7391 64.7666C67.7285 64.7686 67.718 64.7714 67.7075 64.7742C67.6936 64.7776 67.6796 64.7813 67.6662 64.7854C67.657 64.7884 67.648 64.7917 67.6389 64.795C67.6243 64.8003 67.6099 64.8058 67.5957 64.812C67.5879 64.8154 67.5803 64.8192 67.5725 64.8229C67.5577 64.83 67.5433 64.8375 67.5291 64.8455C67.5221 64.8496 67.5152 64.8536 67.5082 64.8579C67.4942 64.8665 67.4804 64.8757 67.4671 64.8853C67.4604 64.8902 67.4539 64.8949 67.4474 64.8999C67.4345 64.9099 67.422 64.9205 67.4097 64.9315C67.4035 64.9369 67.3973 64.9423 67.3913 64.948C67.3789 64.9596 67.3674 64.972 67.356 64.9845C67.352 64.989 67.3476 64.9927 67.3436 64.9973C67.2483 65.1074 67.1755 65.1227 67.1111 65.1227C67.0334 65.1227 66.8958 65.0966 66.6808 64.9725C66.5921 64.9213 66.3563 64.7853 66.4868 64.2983C66.6447 63.7086 67.2746 63.0491 67.8813 63.0491C68.4878 63.0491 69.1177 63.7086 69.2758 64.2982C69.4064 64.7851 69.1706 64.9211 69.082 64.9722ZM67.8815 61.6257C63.7688 61.6257 60.4229 57.829 60.4229 53.1622C60.4229 48.4952 63.7689 44.6984 67.8815 44.6984C71.9942 44.6984 75.34 48.4952 75.34 53.1622C75.34 57.829 71.9942 61.6257 67.8815 61.6257ZM80.3917 67.8808C80.177 68.0047 80.0393 68.0307 79.9616 68.0307C79.9237 68.0307 79.8829 68.0248 79.8365 67.9983C79.7233 67.8149 79.5293 67.6846 79.2982 67.6627C79.2673 67.6598 79.237 67.6595 79.2068 67.6605C79.2015 67.6604 79.1964 67.6597 79.1911 67.6597C78.9848 67.6597 78.7884 67.7493 78.6533 67.9053C78.5578 68.0155 78.4852 68.0307 78.4207 68.0307C78.3428 68.0307 78.2052 68.0048 77.9906 67.881C77.9019 67.8297 77.666 67.6935 77.7966 67.2062C77.9547 66.6166 78.5846 65.9572 79.1911 65.9572C79.7979 65.9572 80.4278 66.6167 80.5858 67.2062C80.7161 67.6935 80.4804 67.8297 80.3917 67.8808ZM79.1912 64.5343C76.8476 64.5343 74.6912 63.0601 73.5795 60.7394C75.3175 59.1172 76.4914 56.7697 76.721 54.1192C77.3808 53.3173 78.2715 52.861 79.1912 52.861C79.2133 52.861 79.2355 52.8612 79.2575 52.8618C79.6496 52.8699 79.9754 52.558 79.9835 52.1652C79.9917 51.7723 79.6797 51.4473 79.287 51.4392C79.2551 51.4385 79.2231 51.4382 79.1912 51.4382C78.3147 51.4382 77.4648 51.71 76.7214 52.2102C76.6769 51.6946 76.5972 51.1902 76.4841 50.7004C77.3267 50.2515 78.2529 50.0156 79.1912 50.0156C82.7125 50.0156 85.5771 53.2721 85.5771 57.2749C85.5771 61.2778 82.7126 64.5343 79.1912 64.5343Z"
                                                fill="black" />
                                            <path
                                                d="M67.8811 46.1213C67.8519 46.1213 67.8227 46.1215 67.7939 46.1222C67.4011 46.1317 67.0903 46.4577 67.0998 46.8504C67.1092 47.2374 67.4257 47.5448 67.8107 47.5448C67.8164 47.5448 67.8223 47.5448 67.8281 47.5446C67.8455 47.544 67.8635 47.5442 67.881 47.5442C68.274 47.5442 68.5925 47.2257 68.5925 46.8328C68.5925 46.4399 68.274 46.1213 67.8811 46.1213Z"
                                                fill="black" />
                                            <path
                                                d="M81.7315 52.2573L81.6978 52.234C81.376 52.0085 80.9323 52.0866 80.7069 52.4084C80.4816 52.7302 80.5595 53.1739 80.8813 53.3993L80.9044 53.4153C81.0298 53.5048 81.1743 53.5478 81.3174 53.5478C81.5393 53.5478 81.758 53.4443 81.8969 53.2499C82.1252 52.9301 82.0512 52.4858 81.7315 52.2573Z"
                                                fill="black" />
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.341797" y="0.574196" width="142.172"
                                                        height="136.49" filterUnits="userSpaceOnUse"
                                                        color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                    <feOffset dy="4" />
                                                    <feGaussianBlur stdDeviation="18.5" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                                   values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                             result="effect1_dropShadow_28_428" />
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428"
                                                             result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col birthdayTitleDiv">
                                        <div>
                                            <span class="birthdayTitleSpan fs-5">Geburtstag/ Jubiläen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="NgMgTop overflowDivPendenzen">
                                    @if(count($birthdays) == 0)

                                        <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" style="color: #d1d1d1">
                                            Heute hat keiner der Kunden Geburtstag

                                        </div>
                                    @else
                                        @foreach($birthdays as $birth)
                                            <div class="whiteBgDivBirthday p-3 mb-2">
                                                <div class="row g-0">
                                                    <div class="col-auto my-auto">
                                                        <svg width="45" height="50" viewBox="0 0 55 55" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M53.2057 51.4111H50.8145V38.8569C50.8145 35.8902 48.4008 33.4766 45.4341 33.4766H43.6406V20.9223C43.6406 17.9556 41.227 15.542 38.2602 15.542H29.293V14.0379C32.4616 12.9141 33.8383 9.18945 32.1625 6.28298C32.1624 6.28276 32.1623 6.28255 32.1622 6.28223L29.0529 0.895631C28.363 -0.299528 26.6349 -0.297595 25.9463 0.895738L22.8371 6.28255C21.1574 9.19343 22.5432 12.9162 25.7061 14.0379V15.542H16.7389C13.7722 15.542 11.3585 17.9556 11.3585 20.9223V33.4766H9.56514C6.5984 33.4766 4.18478 35.8902 4.18478 38.8569C4.18478 39.3006 4.18478 47.6398 4.18478 51.4111H1.79349C0.802967 51.4111 0 52.2141 0 53.2046C0 54.1951 0.802967 54.9981 1.79349 54.9981C2.87242 54.9981 48.4148 54.9981 53.2058 54.9981C54.1963 54.9981 54.9993 54.1951 54.9993 53.2046C54.9993 52.2141 54.1963 51.4111 53.2057 51.4111ZM25.9438 8.0755L27.4996 5.37989L29.0552 8.07486C29.7394 9.26099 28.8779 10.7595 27.4996 10.7595C26.1177 10.7595 25.2622 9.25712 25.9438 8.0755ZM14.9454 20.9224C14.9454 19.9335 15.75 19.129 16.7389 19.129H38.2603C39.2493 19.129 40.0538 19.9335 40.0538 20.9224V26.0902C39.8866 25.9211 39.7057 25.7285 39.5028 25.5077C38.4627 24.3761 37.0382 22.8265 34.5945 22.8265C32.152 22.8265 30.7279 24.3758 29.6881 25.5069C28.6941 26.5882 28.2107 27.0288 27.4207 27.0288C26.6052 27.0288 26.0806 26.5048 25.1479 25.5006C24.0997 24.3721 22.6642 22.8266 20.2468 22.8266C17.8044 22.8266 16.3802 24.3759 15.3404 25.507C15.1998 25.66 15.0696 25.8003 14.9454 25.9305V20.9224ZM14.9454 30.2762C16.3059 29.7562 17.2425 28.738 17.9812 27.9344C18.9746 26.8535 19.4578 26.4133 20.2468 26.4133C21.0622 26.4133 21.587 26.9373 22.5197 27.9415C23.5679 29.07 25.0033 30.6155 27.4207 30.6155C29.8643 30.6155 31.2888 29.0659 32.3289 27.9343C33.3223 26.8534 33.8055 26.4132 34.5945 26.4132C35.3846 26.4132 35.868 26.8537 36.8619 27.9351C37.6305 28.7712 38.6095 29.8349 40.0538 30.3334V33.4766H14.9454V30.2762ZM7.77165 51.4111V45.475C7.77262 45.4761 7.77369 45.4771 7.77466 45.4783C9.02192 46.8468 10.5742 48.5501 13.073 48.5501C15.5166 48.5501 16.9411 47.0005 17.9812 45.8689C18.9746 44.788 19.4578 44.3478 20.2468 44.3478C21.0622 44.3478 21.587 44.8718 22.5197 45.876C23.5679 47.0044 25.0033 48.55 27.4207 48.55C29.8643 48.55 31.2888 47.0003 32.3289 45.8688C33.3223 44.7879 33.8055 44.3477 34.5945 44.3477C35.3846 44.3477 35.868 44.7881 36.8619 45.8695C37.9018 47.0008 39.3257 48.55 41.7684 48.55C44.212 48.55 45.6365 47.0003 46.6766 45.8688C46.8795 45.6479 47.0604 45.4553 47.2277 45.2862V51.4111H7.77165ZM47.2276 41.043C45.7832 41.5416 44.8042 42.6054 44.0357 43.4414C43.0417 44.5227 42.5583 44.9632 41.7683 44.9632C40.9792 44.9632 40.4961 44.523 39.5027 43.4422C38.4626 42.3106 37.0381 40.7609 34.5944 40.7609C32.1519 40.7609 30.7278 42.3103 29.688 43.4414C28.694 44.5227 28.2106 44.9632 27.4206 44.9632C26.6051 44.9632 26.0805 44.4392 25.1478 43.4351C24.0995 42.3066 22.6641 40.7611 20.2467 40.7611C17.8042 40.7611 16.3801 42.3104 15.3403 43.4415C14.3463 44.5228 13.8629 44.9633 13.0728 44.9633C12.2196 44.9633 11.5035 44.2451 10.4256 43.0624C9.66966 42.2329 8.84027 41.326 7.77143 40.7279V38.857C7.77143 37.8681 8.57601 37.0635 9.56493 37.0635C10.5104 37.0635 44.4402 37.0635 45.434 37.0635C46.4229 37.0635 47.2275 37.8681 47.2275 38.857V41.043H47.2276Z"
                                                                fill="#454545" />
                                                        </svg>
                                                    </div>
                                                    <div class="col ps-3 ps-md-4 my-auto">
                                                        <div>
                                                            <span class="birthDayFirstSpan fs-5">{{$birth['name']}} {{$birth['lname']}}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fs-5">{{$birth['birthday']}} ({{$birth['age']}}yahre)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif(auth()->user()->hasRole('fs'))
                    <div class="row g-0 mx-3 my-3">
                        <div class="col-12 col-md-7 mb-4 mb-md-0 h-auto">
                            <div class="greyBgDivPendezen h-100 p-3 p-md-4 me-0 me-md-4">
                                <div class="row g-0">
                                    <div class="col-auto birthdayCornerSvg">
                                        <svg width="143" height="138" viewBox="0 0 152 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.8089 76.6026C40.6028 81.2528 48.5509 85.8225 52.7934 89.1208C57.0358 92.419 51.5186 101.776 56.5636 103.22C61.6087 104.664 77.1172 98.167 82.1967 97.5371C87.2763 96.9072 92.1249 95.2406 96.4657 92.6326C100.806 90.0245 104.554 86.5261 107.496 82.337C110.437 78.1479 112.514 73.3502 113.607 68.2178C114.701 63.0855 114.79 57.7189 113.87 52.4246C112.95 47.1302 112.1 38.1049 111.258 33.1282L81.7671 33.1282L66.0166 33.1282C59.914 33.1282 53.8752 34.3691 48.2671 36.7755L47.1897 37.6042C43.645 40.3309 40.9314 43.9925 39.3539 48.1771C38.3323 50.887 37.8089 53.7593 37.8089 56.6554L37.8089 76.6026Z" fill="#DCE4F9"/>
                                            </g>
                                            <path d="M66.975 64.05C71.3795 64.05 74.95 67.6205 74.95 72.025C74.95 76.4294 71.3795 80 66.975 80C62.5705 80 59 76.4294 59 72.025C59 67.6205 62.5705 64.05 66.975 64.05ZM66.975 75.476C66.4749 75.476 66.0695 75.8814 66.0695 76.3815C66.0695 76.8816 66.4749 77.2871 66.975 77.2871C67.4751 77.2871 67.8805 76.8816 67.8805 76.3815C67.8805 75.8814 67.4751 75.476 66.975 75.476ZM83.2875 51C85.8901 51 88 53.1098 88 55.7125V72.3875C88 74.9901 85.8901 77.1 83.2875 77.1L74.9172 77.1017C75.3477 76.4298 75.6951 75.6996 75.9452 74.9256L83.2875 74.925C84.6889 74.925 85.825 73.7889 85.825 72.3875V55.7125C85.825 54.311 84.6889 53.175 83.2875 53.175H66.6125C65.2111 53.175 64.075 54.311 64.075 55.7125L64.0744 63.0547C63.3004 63.3048 62.5702 63.6523 61.8982 64.0827L61.9 55.7125C61.9 53.1098 64.0099 51 66.6125 51H83.2875ZM66.9751 66.9545C65.4555 66.9545 64.2718 68.1397 64.2877 69.7882C64.2915 70.1886 64.6192 70.51 65.0196 70.5062C65.42 70.5023 65.7414 70.1746 65.7376 69.7743C65.7295 68.9347 66.2591 68.4045 66.9751 68.4045C67.66 68.4045 68.2125 68.9727 68.2125 69.7812C68.2125 70.1064 68.1033 70.3484 67.7515 70.7634L67.6079 70.9277L67.2231 71.3483C66.5209 72.1335 66.2501 72.6419 66.2501 73.4758C66.2501 73.8762 66.5747 74.2008 66.9751 74.2008C67.3755 74.2008 67.7001 73.8762 67.7001 73.4758C67.7001 73.1391 67.8109 72.8922 68.1695 72.469L68.3159 72.3016L68.7012 71.8804C69.3938 71.1057 69.6625 70.6019 69.6625 69.7812C69.6625 68.1809 68.4701 66.9545 66.9751 66.9545ZM74.5875 55.35C75.1381 55.35 75.5931 55.7591 75.6651 56.2899L75.675 56.4375V64.05H81.11C81.7106 64.05 82.1975 64.5369 82.1975 65.1375C82.1975 65.688 81.7884 66.143 81.2575 66.215L81.11 66.225H74.5875C74.0369 66.225 73.5819 65.8158 73.5099 65.285L73.5 65.1375V56.4375C73.5 55.8369 73.9869 55.35 74.5875 55.35Z" fill="#313131"/>
                                            <circle cx="66.5" cy="72.5" r="7.5" fill="#313131"/>
                                            <rect x="63" y="71" width="2" height="2" rx="1" fill="#DCE4F9"/>
                                            <rect x="66" y="71" width="2" height="2" rx="1" fill="#DCE4F9"/>
                                            <rect x="69" y="71" width="2" height="2" rx="1" fill="#DCE4F9"/>
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.808594" y="0.128235" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="18.5"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col birthdayTitleDiv">
                                        <div>
                                            <span class="birthdayTitleSpan fs-5">Pendenzen/ Zur Nachbearbeitung</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflowDivPendenzen">
                                    @if($pending->count() == 0)
                                        <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" style="color: #D1D1D1;margin-top: -0.7rem">
                                            Keine Pendenzen
                                        </div>
                                    @else

                                            <div class="row g-0 px-4 pendenzenTitlesStyle pb-1">
                                                <div class="col-3">
                                                    <span>Datum</span>
                                                </div>
                                                <div class="col-3">
                                                    <span>Kundename</span>
                                                </div>
                                                <div class="col-3">
                                                    <span>Titel</span>
                                                </div>
                                                <div class="col-3">
                                                    <span>Beschreibung</span>
                                                </div>
                                            </div>


                                            @foreach($pending as $task)
                                            @if ($task->family_id != 0)
                                                @php
                                                    $leadss = $task->id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                    $pend_id = $task->pid;
                                                @endphp
                                                <div class="row g-0 whiteBgDivBirthday px-3 px-md-4 py-2 mt-2">
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Datum</span>
                                                            </div>
                                                            <div class="col">
                                                            <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->created_at)->format('d.m.Y')}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Kundename</span>
                                                            </div>
                                                            <div class="col">
                                                        <span>{{ucfirst($task->family->first_name)}} {{ucfirst($task->family->last_name)}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Titel</span>
                                                            </div>
                                                            <div class="col">
                                                        <span>{{$task->title}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Beschreibung</span>
                                                            </div>
                                                            <div class="col">
                                                        <span>{{$task->description}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                @php
                                                    // $leadss = $task->id * 1244;
                                                    // $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                    $pend_id = $task->pid;
                                                @endphp
                                                <div class="row g-0 whiteBgDivBirthday px-3 px-md-4 py-2 mt-2">
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Datum</span>
                                                            </div>
                                                            <div class="col">
                                                            <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->created_at)->format('d.m.Y')}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Kundename</span>
                                                            </div>
                                                            <div class="col">
                                                        <span></span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Titel</span>
                                                            </div>
                                                            <div class="col">
                                                        <span>{{$task->title}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-xl-3 my-auto">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-md-6 pendenzenTitlesStyleSpan">
                                                                <span style="font-weight: 500;">Beschreibung</span>
                                                            </div>
                                                            <div class="col">
                                                        <span>{{$task->description}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 h-auto ">
                            <div class="greyBgDivPendezen h-100 p-3 p-md-4">
                                <div class="row g-0">
                                    <div class="col-auto birthdayCornerSvg">
                                        <svg width="143" height="138" viewBox="0 0 143 138" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path
                                                    d="M37.3418 72.2188C39.8253 76.3524 46.8904 80.4145 50.6616 83.3463C54.4327 86.2781 49.5284 94.5952 54.013 95.8788C58.4975 97.1625 72.2831 91.3875 76.7984 90.8276C81.3136 90.2676 85.6236 88.7862 89.4821 86.4679C93.3407 84.1496 96.6723 81.0399 99.2867 77.3162C101.901 73.5925 103.747 69.3278 104.719 64.7655C105.692 60.2033 105.771 55.433 104.953 50.7268C104.135 46.0207 103.38 37.998 102.631 33.5742L76.3687 33.9952L56.3148 34.3165C55.1872 34.3345 54.0636 34.4543 52.9576 34.6744C46.3097 35.9972 40.8942 40.8068 38.7954 47.252L38.613 47.8121C38.0035 49.6838 37.6773 51.6361 37.6453 53.6043L37.3418 72.2188Z"
                                                    fill="#DCE4F9" />
                                            </g>
                                            <path
                                                d="M65.3019 46.7947C63.2024 47.9504 61.8457 50.4497 61.8457 53.1622C61.8457 53.7674 61.9127 54.3711 62.0447 54.9568C62.1193 55.2874 62.4128 55.512 62.7381 55.512C62.79 55.512 62.8426 55.5063 62.8952 55.4943C63.2784 55.408 63.5191 55.0272 63.4327 54.644C63.3239 54.1608 63.2686 53.6624 63.2686 53.1624C63.2686 50.9608 64.336 48.9508 65.988 48.0415C66.3322 47.8519 66.4577 47.4194 66.2683 47.0751C66.0788 46.7307 65.6461 46.6052 65.3019 46.7947Z"
                                                fill="black" />
                                            <path
                                                d="M87 57.2749C87 52.4876 83.497 48.5928 79.1911 48.5928C78.1105 48.5928 77.0448 48.8423 76.064 49.3182C74.7141 45.7707 71.5546 43.2755 67.8815 43.2755C62.9842 43.2755 59 47.7107 59 53.1622C59 57.7863 61.867 61.6786 65.726 62.7535C65.435 63.1136 65.2212 63.524 65.1125 63.9297C64.8578 64.8807 65.1861 65.7524 65.9696 66.2045C66.361 66.4306 66.7452 66.5453 67.1113 66.5453C67.1235 66.5453 67.1356 66.5444 67.1478 66.5441C67.0914 67.0189 66.9971 67.5926 66.9045 68.1563C66.4575 70.8785 65.8452 74.6069 67.2653 77.0669C67.3973 77.2952 67.6362 77.4228 67.8821 77.4228C68.0028 77.4228 68.1252 77.392 68.2371 77.3273C68.5774 77.1309 68.694 76.6957 68.4975 76.3555C67.3316 74.3358 67.8963 70.8974 68.3086 68.3868C68.4259 67.6717 68.5265 67.0591 68.5802 66.5431C68.604 66.5441 68.6276 66.5452 68.6515 66.5452H68.6516C69.0175 66.5452 69.4017 66.4306 69.7933 66.2045C70.5768 65.7524 70.9051 64.8805 70.6503 63.9295C70.5416 63.524 70.3278 63.1135 70.0369 62.7535C70.8942 62.5148 71.7023 62.1371 72.4411 61.6431C73.4659 63.5989 75.1348 65.0183 77.0642 65.6269C76.7588 65.9951 76.5348 66.419 76.4224 66.8378C76.1676 67.7889 76.4959 68.6607 77.2795 69.1132C77.671 69.3392 78.0548 69.4536 78.4209 69.4536C78.4617 69.4536 78.5022 69.4518 78.5423 69.4491C78.5633 69.7665 78.5926 70.1228 78.6247 70.5122C78.7801 72.3971 78.9928 74.9785 78.5481 76.5133C78.4387 76.8907 78.6561 77.2854 79.0335 77.3948C79.0996 77.414 79.1661 77.4231 79.2317 77.4231C79.5403 77.4231 79.8245 77.2206 79.9147 76.9094C80.4324 75.1229 80.2071 72.3904 80.0428 70.3953C80.0155 70.0656 79.989 69.7435 79.9688 69.4534C80.3325 69.452 80.7141 69.3376 81.103 69.1133C81.8865 68.661 82.215 67.7892 81.9601 66.8381C81.8481 66.4201 81.6247 65.997 81.3201 65.6294C84.5945 64.5962 87 61.242 87 57.2749ZM69.082 64.9722C68.8669 65.0963 68.7293 65.1224 68.6516 65.1224C68.5873 65.1224 68.5146 65.1072 68.4192 64.997C68.4151 64.9924 68.4106 64.9884 68.4064 64.984C68.3962 64.9729 68.386 64.962 68.3753 64.9516C68.3678 64.9444 68.36 64.9374 68.3522 64.9305C68.342 64.9215 68.3318 64.9128 68.321 64.9045C68.3124 64.8977 68.3037 64.8909 68.2946 64.8845C68.284 64.8769 68.273 64.8698 68.2619 64.8627C68.2526 64.8569 68.2435 64.8509 68.2339 64.8455C68.2219 64.8387 68.2095 64.8326 68.1972 64.8263C68.1882 64.8218 68.1792 64.8171 68.1701 64.8132C68.1551 64.8064 68.1396 64.8006 68.1242 64.795C68.1172 64.7925 68.1106 64.7896 68.1035 64.7872C68.0569 64.7718 68.0087 64.7613 67.9592 64.7559C67.9566 64.7556 67.9539 64.7556 67.9513 64.7553C67.9296 64.7533 67.9077 64.7519 67.8857 64.7517C67.8843 64.7517 67.8829 64.7516 67.8815 64.7516C67.8814 64.7516 67.8814 64.7516 67.8814 64.7516C67.8751 64.7516 67.869 64.7525 67.8626 64.7526C67.8459 64.753 67.8291 64.7537 67.8123 64.7554C67.8018 64.7564 67.7914 64.7582 67.7811 64.7596C67.7707 64.7611 67.7603 64.7619 67.7499 64.7639C67.7463 64.7647 67.7428 64.7658 67.7391 64.7666C67.7285 64.7686 67.718 64.7714 67.7075 64.7742C67.6936 64.7776 67.6796 64.7813 67.6662 64.7854C67.657 64.7884 67.648 64.7917 67.6389 64.795C67.6243 64.8003 67.6099 64.8058 67.5957 64.812C67.5879 64.8154 67.5803 64.8192 67.5725 64.8229C67.5577 64.83 67.5433 64.8375 67.5291 64.8455C67.5221 64.8496 67.5152 64.8536 67.5082 64.8579C67.4942 64.8665 67.4804 64.8757 67.4671 64.8853C67.4604 64.8902 67.4539 64.8949 67.4474 64.8999C67.4345 64.9099 67.422 64.9205 67.4097 64.9315C67.4035 64.9369 67.3973 64.9423 67.3913 64.948C67.3789 64.9596 67.3674 64.972 67.356 64.9845C67.352 64.989 67.3476 64.9927 67.3436 64.9973C67.2483 65.1074 67.1755 65.1227 67.1111 65.1227C67.0334 65.1227 66.8958 65.0966 66.6808 64.9725C66.5921 64.9213 66.3563 64.7853 66.4868 64.2983C66.6447 63.7086 67.2746 63.0491 67.8813 63.0491C68.4878 63.0491 69.1177 63.7086 69.2758 64.2982C69.4064 64.7851 69.1706 64.9211 69.082 64.9722ZM67.8815 61.6257C63.7688 61.6257 60.4229 57.829 60.4229 53.1622C60.4229 48.4952 63.7689 44.6984 67.8815 44.6984C71.9942 44.6984 75.34 48.4952 75.34 53.1622C75.34 57.829 71.9942 61.6257 67.8815 61.6257ZM80.3917 67.8808C80.177 68.0047 80.0393 68.0307 79.9616 68.0307C79.9237 68.0307 79.8829 68.0248 79.8365 67.9983C79.7233 67.8149 79.5293 67.6846 79.2982 67.6627C79.2673 67.6598 79.237 67.6595 79.2068 67.6605C79.2015 67.6604 79.1964 67.6597 79.1911 67.6597C78.9848 67.6597 78.7884 67.7493 78.6533 67.9053C78.5578 68.0155 78.4852 68.0307 78.4207 68.0307C78.3428 68.0307 78.2052 68.0048 77.9906 67.881C77.9019 67.8297 77.666 67.6935 77.7966 67.2062C77.9547 66.6166 78.5846 65.9572 79.1911 65.9572C79.7979 65.9572 80.4278 66.6167 80.5858 67.2062C80.7161 67.6935 80.4804 67.8297 80.3917 67.8808ZM79.1912 64.5343C76.8476 64.5343 74.6912 63.0601 73.5795 60.7394C75.3175 59.1172 76.4914 56.7697 76.721 54.1192C77.3808 53.3173 78.2715 52.861 79.1912 52.861C79.2133 52.861 79.2355 52.8612 79.2575 52.8618C79.6496 52.8699 79.9754 52.558 79.9835 52.1652C79.9917 51.7723 79.6797 51.4473 79.287 51.4392C79.2551 51.4385 79.2231 51.4382 79.1912 51.4382C78.3147 51.4382 77.4648 51.71 76.7214 52.2102C76.6769 51.6946 76.5972 51.1902 76.4841 50.7004C77.3267 50.2515 78.2529 50.0156 79.1912 50.0156C82.7125 50.0156 85.5771 53.2721 85.5771 57.2749C85.5771 61.2778 82.7126 64.5343 79.1912 64.5343Z"
                                                fill="black" />
                                            <path
                                                d="M67.8811 46.1213C67.8519 46.1213 67.8227 46.1215 67.7939 46.1222C67.4011 46.1317 67.0903 46.4577 67.0998 46.8504C67.1092 47.2374 67.4257 47.5448 67.8107 47.5448C67.8164 47.5448 67.8223 47.5448 67.8281 47.5446C67.8455 47.544 67.8635 47.5442 67.881 47.5442C68.274 47.5442 68.5925 47.2257 68.5925 46.8328C68.5925 46.4399 68.274 46.1213 67.8811 46.1213Z"
                                                fill="black" />
                                            <path
                                                d="M81.7315 52.2573L81.6978 52.234C81.376 52.0085 80.9323 52.0866 80.7069 52.4084C80.4816 52.7302 80.5595 53.1739 80.8813 53.3993L80.9044 53.4153C81.0298 53.5048 81.1743 53.5478 81.3174 53.5478C81.5393 53.5478 81.758 53.4443 81.8969 53.2499C82.1252 52.9301 82.0512 52.4858 81.7315 52.2573Z"
                                                fill="black" />
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.341797" y="0.574196" width="142.172"
                                                        height="136.49" filterUnits="userSpaceOnUse"
                                                        color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                    <feOffset dy="4" />
                                                    <feGaussianBlur stdDeviation="18.5" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                                   values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                             result="effect1_dropShadow_28_428" />
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428"
                                                             result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>

                                    </div>
                                    <div class="col birthdayTitleDiv">
                                        <div>
                                            <span class="birthdayTitleSpan fs-5">Geburstage/ Jubiläen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="NgMgTop overflowDivPendenzen">
                                    @if(count($birthdays) == 0 && count($consultation) == 0)
                                        <div class="text-center fs-6 fw-400 d-flex justify-content-center h-100 align-items-center" style="color: #d1d1d1;word-break: break-all">
                                            Keine Geburtstage / Mitarbeiterbesprechungen Für Heute
                                        </div>
                                    @else
                                        @foreach($birthdays as $birth)
                                            <div class="whiteBgDivBirthday p-3 mb-2">
                                                <div class="row g-0">
                                                    <div class="col-auto my-auto">
                                                        <svg width="45" height="50" viewBox="0 0 55 55" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M53.2057 51.4111H50.8145V38.8569C50.8145 35.8902 48.4008 33.4766 45.4341 33.4766H43.6406V20.9223C43.6406 17.9556 41.227 15.542 38.2602 15.542H29.293V14.0379C32.4616 12.9141 33.8383 9.18945 32.1625 6.28298C32.1624 6.28276 32.1623 6.28255 32.1622 6.28223L29.0529 0.895631C28.363 -0.299528 26.6349 -0.297595 25.9463 0.895738L22.8371 6.28255C21.1574 9.19343 22.5432 12.9162 25.7061 14.0379V15.542H16.7389C13.7722 15.542 11.3585 17.9556 11.3585 20.9223V33.4766H9.56514C6.5984 33.4766 4.18478 35.8902 4.18478 38.8569C4.18478 39.3006 4.18478 47.6398 4.18478 51.4111H1.79349C0.802967 51.4111 0 52.2141 0 53.2046C0 54.1951 0.802967 54.9981 1.79349 54.9981C2.87242 54.9981 48.4148 54.9981 53.2058 54.9981C54.1963 54.9981 54.9993 54.1951 54.9993 53.2046C54.9993 52.2141 54.1963 51.4111 53.2057 51.4111ZM25.9438 8.0755L27.4996 5.37989L29.0552 8.07486C29.7394 9.26099 28.8779 10.7595 27.4996 10.7595C26.1177 10.7595 25.2622 9.25712 25.9438 8.0755ZM14.9454 20.9224C14.9454 19.9335 15.75 19.129 16.7389 19.129H38.2603C39.2493 19.129 40.0538 19.9335 40.0538 20.9224V26.0902C39.8866 25.9211 39.7057 25.7285 39.5028 25.5077C38.4627 24.3761 37.0382 22.8265 34.5945 22.8265C32.152 22.8265 30.7279 24.3758 29.6881 25.5069C28.6941 26.5882 28.2107 27.0288 27.4207 27.0288C26.6052 27.0288 26.0806 26.5048 25.1479 25.5006C24.0997 24.3721 22.6642 22.8266 20.2468 22.8266C17.8044 22.8266 16.3802 24.3759 15.3404 25.507C15.1998 25.66 15.0696 25.8003 14.9454 25.9305V20.9224ZM14.9454 30.2762C16.3059 29.7562 17.2425 28.738 17.9812 27.9344C18.9746 26.8535 19.4578 26.4133 20.2468 26.4133C21.0622 26.4133 21.587 26.9373 22.5197 27.9415C23.5679 29.07 25.0033 30.6155 27.4207 30.6155C29.8643 30.6155 31.2888 29.0659 32.3289 27.9343C33.3223 26.8534 33.8055 26.4132 34.5945 26.4132C35.3846 26.4132 35.868 26.8537 36.8619 27.9351C37.6305 28.7712 38.6095 29.8349 40.0538 30.3334V33.4766H14.9454V30.2762ZM7.77165 51.4111V45.475C7.77262 45.4761 7.77369 45.4771 7.77466 45.4783C9.02192 46.8468 10.5742 48.5501 13.073 48.5501C15.5166 48.5501 16.9411 47.0005 17.9812 45.8689C18.9746 44.788 19.4578 44.3478 20.2468 44.3478C21.0622 44.3478 21.587 44.8718 22.5197 45.876C23.5679 47.0044 25.0033 48.55 27.4207 48.55C29.8643 48.55 31.2888 47.0003 32.3289 45.8688C33.3223 44.7879 33.8055 44.3477 34.5945 44.3477C35.3846 44.3477 35.868 44.7881 36.8619 45.8695C37.9018 47.0008 39.3257 48.55 41.7684 48.55C44.212 48.55 45.6365 47.0003 46.6766 45.8688C46.8795 45.6479 47.0604 45.4553 47.2277 45.2862V51.4111H7.77165ZM47.2276 41.043C45.7832 41.5416 44.8042 42.6054 44.0357 43.4414C43.0417 44.5227 42.5583 44.9632 41.7683 44.9632C40.9792 44.9632 40.4961 44.523 39.5027 43.4422C38.4626 42.3106 37.0381 40.7609 34.5944 40.7609C32.1519 40.7609 30.7278 42.3103 29.688 43.4414C28.694 44.5227 28.2106 44.9632 27.4206 44.9632C26.6051 44.9632 26.0805 44.4392 25.1478 43.4351C24.0995 42.3066 22.6641 40.7611 20.2467 40.7611C17.8042 40.7611 16.3801 42.3104 15.3403 43.4415C14.3463 44.5228 13.8629 44.9633 13.0728 44.9633C12.2196 44.9633 11.5035 44.2451 10.4256 43.0624C9.66966 42.2329 8.84027 41.326 7.77143 40.7279V38.857C7.77143 37.8681 8.57601 37.0635 9.56493 37.0635C10.5104 37.0635 44.4402 37.0635 45.434 37.0635C46.4229 37.0635 47.2275 37.8681 47.2275 38.857V41.043H47.2276Z"
                                                                fill="#454545" />
                                                        </svg>
                                                    </div>
                                                    <div class="col ps-3 ps-md-4 my-auto">
                                                        <div>
                                                            <span class="birthDayFirstSpan fs-5">{{$birth['name']}} {{$birth['lname']}}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fs-5">{{$birth['birthday']}} ({{$birth['age']}}yahre)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('fs'))

                                            @foreach($consultation as $perApp)
                                                <div class="whiteBgDivBirthday p-3 mb-2" data-bs-toggle="modal"
                                                     data-bs-target="#exampleModalll{{$perApp->id}}">
                                                    <div class="row g-0">
                                                        <div class="col-auto my-auto">
                                                            <svg width="45" height="50" viewBox="0 0 40 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="1.5" y="1.5" width="37" height="52" rx="2.5" stroke="#454545" stroke-width="3"/>
                                                                <line x1="10.5" y1="32.5" x2="28.5" y2="32.5" stroke="#454545" stroke-width="3" stroke-linecap="round"/>
                                                                <line x1="10.5" y1="41.5" x2="28.5" y2="41.5" stroke="#454545" stroke-width="3" stroke-linecap="round"/>
                                                                <path d="M27.9644 14.6775C27.8788 14.4191 27.6512 14.2308 27.3772 14.1918L22.7304 13.5294L20.6523 9.39785C20.5297 9.15425 20.2768 9 20 9C19.7231 9 19.4702 9.15425 19.3477 9.39785L17.2697 13.5294L12.6228 14.1917C12.3488 14.2308 12.1212 14.4191 12.0356 14.6775C11.9501 14.9359 12.0214 15.2195 12.2197 15.4091L15.5822 18.6245L14.7881 23.1657C14.7413 23.4334 14.8535 23.704 15.0775 23.8637C15.2042 23.954 15.3543 24 15.5051 24C15.6208 24 15.7371 23.9729 15.8435 23.918L20 21.7742L24.1563 23.918C24.2634 23.9733 24.3807 23.9996 24.4968 24C24.8981 23.9994 25.2232 23.6801 25.2232 23.2863C25.2232 23.2315 25.2169 23.1781 25.205 23.1268L24.4178 18.6246L27.7803 15.4091C27.9786 15.2195 28.0499 14.9359 27.9644 14.6775Z" fill="#454545"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col ps-3 ps-md-4 my-auto">
                                                            <div>
                                                                <span class="birthDayFirstSpan">Title</span>
                                                                <span class="fs-6">{{$perApp->title}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Kommentar</span>
                                                                <span class="fs-6">{{$perApp->comment}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Datum & Zeit</span>
                                                                <span class="fs-6">{{Carbon\Carbon::parse($perApp->date)->format('d.m.Y')}} ({{$perApp->time}})</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Adress</span>
                                                                <span class="fs-6">{{$perApp->address}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="birthDayFirstSpan">Von</span>
                                                                <span class="fs-6">{{App\Models\Admins::find($perApp->assignfrom)->name}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
    @if(Auth::guard('admins')->user()->hasRole('backoffice') || Auth::guard('admins')->user()->hasRole('admin'))
        <section class="mobile-tasks">
            <div class="row g-0">
                <div class="col-12  col-md-12 mb-5">
                    <div class="pendzen-div  my-3 mx-3">
                        <div class="d-flex justify-content-between ms-3">
                            <span class="fw-600 fs-5">Eingereichte Kunden</span>
                        </div>
                        <div class="wrapper3 mx-3" style="display: block;">
                            <div class="">
                                <div id="secondDivToggle44" class="wrapper3 p-2" style="display: block;">
                                    <div class="overflow-divv2">
                                        @if(count($answered) == 0)
                                            <div class="text-center fs-6 fw-400" style="color: #d1d1d1">
                                                Es gibt aktuell keine neu eingereichten Kunden
                                            </div>
                                        @else
                                        @foreach($answered as $task)
                                                @php
                                                    $leadss = $task->family_id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $pend_id = $task->id;
                                                @endphp
                                                <div class="answered-items m-2">
                                                    @php
                                                        $leadss = $task->admin_id * 1244;
                                                        $taskAdminId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                        $authUserId= $leadsss;
                                                        $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                    @endphp
                                                    <a data-bs-toggle="collapse" id="demo23_2{{$taskAdminId}}"
                                                       style="text-decoration:none;">
                                                        <div class="px-2 py-2">
                                                            <div class="d-flex justify-content-between ms-2 me-1"
                                                                 style="text-overflow: ellipsis; overflow:hidden;">
                                                                <div
                                                                    class="fw-600 fs-6 my-auto">{{ucfirst($task->family->first_name )}} {{ucfirst( $task->family->last_name)}} </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div id="demo_2{{$taskAdminId}}" class="collapse px-3 pt-2 pb-3">
                                                        <div class="row g-0 pb-1">
                                                            <div class="col-3 me-2">
                                                                <span class="fw-600">Berater</span>
                                                            </div>
                                                            <div class="col">
                                                                <span style="font-weight: 400">{{$task->family->lead->admin->name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row g-0">
                                                            <div class="col-3 me-2">
                                                                <span class="fw-600">Datum</span>
                                                            </div>
                                                            <div class="col">
                                                                <span style="font-weight: 400">{{ Carbon\Carbon::parse($task->created_at)->format('d.m.Y')}}</span>
                                                            </div>
                                                        </div>

                                                        <a href="{{route('leadfamilyperson',['id' => $taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}">
                                                            <button class="btn w-100 mt-3 py-1"
                                                                    style="background-color: #2F60DC; color: #fff; font-weight: 600; border-radius: 8px !important">
                                                                Offen
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <script>
                                                        truefalsee2["sss" + intvaluecount2] = false;
                                                        $(document).ready(function () {
                                                            $("#demo23_2{{$taskAdminId}}").click(function () {
                                                                $("#demo_2{{$taskAdminId}}").collapse('toggle');
                                                                if (truefalsee2["sss" + intvaluecount2] === false) {
                                                                    $("#demo23span_2{{$taskAdminId}}").addClass("bi bi-chevron-down bi-chevron-up");
                                                                    truefalsee2["sss" + intvaluecount2] = true;
                                                                } else {
                                                                    $("#demo23span_2{{$taskAdminId}}").removeClass("bi bi-chevron-up");
                                                                    truefalsee2["sss" + intvaluecount2] = false;
                                                                }
                                                            });
                                                        });
                                                        intvaluecount2++;
                                                    </script>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                {{-- @foreach($answered as $family)
                                
                                <div class="answered-items m-2">
                                   
                                    @php
                                        $leadss = $family->family_id * 1244;
                                        $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                        $pend_id = $family->id;
                                   
                                        $leadss = $task->admin_id * 1244;
                                        $taskAdminId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                        $authUserId= $leadsss;
                                        $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                    @endphp
                                    <a data-bs-toggle="collapse" id="demo23_2{{$authUserId}}"
                                       style="text-decoration:none;">
                                        <div class="px-2 py-2">
                                            <div class="d-flex justify-content-between ms-2 me-1"
                                                 style="text-overflow: ellipsis; overflow:hidden;">
                                                <div
                                                    class="fw-600 fs-6 my-auto">{{ucfirst($task->family->first_name )}} {{ucfirst( $task->family->last_name)}} </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="demo_2{{$authUserId}}" class="collapse px-3 py-2">
                                        <h6 class="m-1"><b>Klientin: {{ucfirst($task->family->first_name)}}</b>
                                        </h6>
                                        <h6 class="m-1"><b>Berater:</b> {{$task->adminpend->name}}
                                        </h6>
                                        <h6 class="m-1"><b>Datum & Zeit:</b> {{$task->updated_at}}</h6>
                                        <a href="{{route('leadfamilyperson',['id' => $taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}">
                                            <button class="btn m-1"
                                                    style="background-color: #0C71C3; color: #fff; font-weight: 600; padding-left: 8%; padding-right: 8%;">
                                                Offen
                                            </button>
                                        </a>
                                    </div>
                                    <script>
                                        truefalsee2["sss" + intvaluecount2] = false;
                                        $(document).ready(function () {
                                            $("#demo23_2{{$authUserId}}").click(function () {
                                                $("#demo_2{{$authUserId}}").collapse('toggle');
                                                if (truefalsee2["sss" + intvaluecount2] === false) {
                                                    $("#demo23span_2{{$authUserId}}").addClass("bi bi-chevron-down bi-chevron-up");
                                                    truefalsee2["sss" + intvaluecount2] = true;
                                                } else {
                                                    $("#demo23span_2{{$authUserId}}").removeClass("bi bi-chevron-up");
                                                    truefalsee2["sss" + intvaluecount2] = false;
                                                }
                                            });
                                        });
                                        intvaluecount2++;
                                    </script>
                                </div>
                                {{-- <div class="answered-items m-2" data-bs-target="#r" data-bs-toggle="modal">
                                    <a style="text-decoration:none; color:#000" href="{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                        <div class="px-2 py-2">
                                            <div class="d-flex justify-content-between ms-2 me-1"
                                                 style="text-overflow: ellipsis; overflow:hidden;">
                                                <div
                                                    class="fw-600 fs-6 my-auto">{{ucfirst($family->family->first_name)}} {{ucfirst($family->family->last_name)}}</div>
                                            </div>
                                        </div>
                                    </a>  
                                </div>

                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="pendzen-div  my-3 mx-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-600 fs-5">Offene Pendenzen</span>
                        </div>

                        <div class="wrapper3 p-2" style="display: block;">
                            <div class="overflow-divv2">
                                @if(count($opened) == 0)
                                    <div class="text-center fs-6 fw-400" style="color: #d1d1d1">
                                        keine offenen Pendenzen
                                    </div>
                                @else
                                    @foreach($opened as $task)
                                    @if ($task->family_id != 0)
                                            @php
                                                $leadss = $task->family_id * 1244;
                                                $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                $pend_id = $task->id;
                                            @endphp


                                        <div class="answered-items m-2">
                                            <a data-bs-toggle="collapse" id="demo23_22{{$task->id}}"
                                            style="text-decoration:none;">
                                                <div class="px-2 py-2">
                                                    <div class="d-flex justify-content-between ms-2 me-1"
                                                        style="text-overflow: ellipsis; overflow:hidden;">
                                                        <div
                                                            class="fw-600 fs-6 my-auto">{{ucfirst($task->family->first_name )}} {{ucfirst( $task->family->last_name)}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div id="demo_2{{$task->id}}" class="collapse px-3 pt-2 pb-3">
                                                <div class="row g-0">
                                                    <div class="col-3 me-2">
                                                        <span class="fw-600">Berater</span>
                                                    </div>
                                                    <div class="col">
                                                        <span style="font-weight: 400">{{$task->adminpend->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="row g-0">
                                                    <div class="col-3 me-3">
                                                        <span class="fw-600">Aufgabe</span>
                                                    </div>
                                                    <div class="col">
                                                        <span style="font-weight: 400">{{$task->title}}</span>
                                                    </div>
                                                </div>
                                                <div class="row g-0">
                                                    <div class="col-5 me-4">
                                                        <span class="fw-600">Beschreibung: </span>
                                                    </div>
                                                    <div class="col">
                                                        <span style="font-weight: 400">{{$task->description}}</span>
                                                    </div>
                                                </div>

                                                <a href="#">
                                                    <button class="btn w-100 mt-3 py-1" data-bs-target="#pendmob{{$task->id}}" data-bs-toggle="modal"
                                                            style="background-color: #2F60DC; color: #fff; font-weight: 600; border-radius: 8px !important">
                                                        Offen
                                                    </button>
                                                </a>
                                            </div>
                                            <script>
                                                truefalsee2["sss" + intvaluecount2] = false;
                                                $(document).ready(function () {
                                                    $("#demo23_22{{$task->id}}").click(function () {
                                                        $("#demo_2{{$task->id}}").collapse('toggle');
                                                        if (truefalsee2["sss" + intvaluecount2] === false) {
                                                            $("#demo23span_2{{$task->id}}").addClass("bi bi-chevron-down bi-chevron-up");
                                                            truefalsee2["sss" + intvaluecount2] = true;
                                                        } else {
                                                            $("#demo23span_2{{$task->id}}").removeClass("bi bi-chevron-up");
                                                            truefalsee2["sss" + intvaluecount2] = false;
                                                        }
                                                    });
                                                });
                                                intvaluecount2++;
                                            </script>
                                        </div>

{{-- 
                                        <div class="answered-items m-2" data-bs-target="#pendmob{{$task->id}}" data-bs-toggle="modal">
                                            <a style="text-decoration:none;">
                                                <div class="px-2 py-2">
                                                    <div class="d-flex justify-content-between ms-2 me-1"
                                                         style="text-overflow: ellipsis; overflow:hidden;">
                                                        <div
                                                            class="fw-600 fs-6 my-auto">{{ucfirst($task->family->first_name )}} {{ucfirst( $task->family->last_name)}} </div>
                                                    </div>
                                                </div>
                                            </a>  
                                        </div> --}}
                                        {{-- Modal --}}
                                        <div class="modal fade" style="top: 1% !important;" id="pendmob{{$task->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                           <div class="modal-dialog">
                                               <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                   <div class="modal-header" style="border-bottom: 0 !important;">
                                                       <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                       style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                       
                                                   </div>
                                                   <div class="modal-body px-0">
                                                       <div class="modal-footer py-0 px-0 text-center"
                                                            style="border-top: 0 !important; justify-content: flex-start !important;">
                                                           <div class="row g-0" style="width: 100%;">
                                                               <div class="col-6 pe-1">
                                                                   <div>
                                                                       <button type="button" class="btn py-1"
                                                                               data-bs-dismiss="modal"
                                                                               style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                           Zurück
                                                                       </button>
                                                                   </div>
                                                               </div>
                                                               <div class="col-6 ps-1">
                                                                   <div>
                                                                       <input onclick="accepttask({{$task->id}})" type="button"
                                                                              style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                              class="btn py-1" value="Pendenz abgeschlossen">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                            @else
                                       @php
                                       $leadss = $task->family_id * 1244;
                                       $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                       $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                       $pend_id = $task->id;
                                   @endphp

                                <div class="answered-items m-2">
                                    <a data-bs-toggle="collapse" id="demo23_22{{$task->id}}"
                                    style="text-decoration:none;">
                                        <div class="px-2 py-2">
                                            <div class="d-flex justify-content-between ms-2 me-1"
                                                style="text-overflow: ellipsis; overflow:hidden;">
                                                <div
                                                    class="fw-600 fs-6 my-auto">{{ucfirst($task->title )}}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="demo_2{{$task->id}}" class="collapse px-3 pt-2 pb-3">
                                        <div class="row g-0">
                                            <div class="col-3 me-2">
                                                <span class="fw-600">Berater</span>
                                            </div>
                                            <div class="col">
                                                <span style="font-weight: 400">{{$task->adminpend->name}}</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col-5 me-4">
                                                <span class="fw-600">Beschreibung: </span>
                                            </div>
                                            <div class="col">
                                                <span style="font-weight: 400">{{$task->description}}</span>
                                            </div>
                                        </div>

                                        <a href="#">
                                            <button class="btn w-100 mt-3 py-1" data-bs-target="#pendmob{{$task->id}}" data-bs-toggle="modal"
                                                    style="background-color: #2F60DC; color: #fff; font-weight: 600; border-radius: 8px !important">
                                                Offen
                                            </button>
                                        </a>
                                    </div>
                                    <script>
                                        truefalsee2["sss" + intvaluecount2] = false;
                                        $(document).ready(function () {
                                            $("#demo23_22{{$task->id}}").click(function () {
                                                $("#demo_2{{$task->id}}").collapse('toggle');
                                                if (truefalsee2["sss" + intvaluecount2] === false) {
                                                    $("#demo23span_2{{$task->id}}").addClass("bi bi-chevron-down bi-chevron-up");
                                                    truefalsee2["sss" + intvaluecount2] = true;
                                                } else {
                                                    $("#demo23span_2{{$task->id}}").removeClass("bi bi-chevron-up");
                                                    truefalsee2["sss" + intvaluecount2] = false;
                                                }
                                            });
                                        });
                                        intvaluecount2++;
                                    </script>
                                </div>
                                        {{-- <div class="answered-items m-2" data-bs-target="#pendmob{{$task->id}}" data-bs-toggle="modal">
                                            <a style="text-decoration:none;">
                                                <div class="px-2 py-2">
                                                    <div class="d-flex justify-content-between ms-2 me-1"
                                                            style="text-overflow: ellipsis; overflow:hidden;">
                                                        <div
                                                            class="fw-600 fs-6 my-auto">{{ucfirst($task->title )}} </div>
                                                    </div>
                                                </div>
                                            </a>  
                                        </div> --}}
                                        {{-- Modal --}}
                                        <div class="modal fade" style="top: 1% !important;" id="pendmob{{$task->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                    <div class="modal-header" style="border-bottom: 0 !important;">
                                                        <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                        style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                        
                                                    </div>
                                                    <div class="modal-body px-0">
                                                        <div class="modal-footer py-0 px-0 text-center"
                                                            style="border-top: 0 !important; justify-content: flex-start !important;">
                                                            <div class="row g-0" style="width: 100%;">
                                                                <div class="col-6 pe-1">
                                                                    <div>
                                                                        <button type="button" class="btn py-1"
                                                                                data-bs-dismiss="modal"
                                                                                style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                            Zurück
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 ps-1">
                                                                    <div>
                                                                        <input onclick="accepttask({{$task->id}})" type="button"
                                                                                style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                                class="btn py-1" value="Pendenz abgeschlossen">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @endif
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    @if (Auth::guard('admins')->user()->hasRole('admin'))
                    <div class="col-12  col-md-6">
                        <div class="kundenbirung-div  my-3 ">
                            <div class="d-flex justify-content-between pb-1">
                                <span class="fw-600 ps-4 fs-5">Geburstage/ Jubiläen</span>
                            </div>
                            <div class="wrapper2 p-2 mx-3">
    
                                @if(count($birthdays) == 0)
                                    <div class="text-center fs-6 fw-400" style="color: #D1D1D1">
                                        Heute hat keiner der Kunden Geburtstag
                                    </div>
                                @else
                                    <div class="overflow-divv1">
                                        @foreach($birthdays as $birth)
                                            <div class="offene-item-one22 py-2 px-3 m-2" style="background: #FFFFFF;border: 1px solid #DCE4F9;border-radius: 11px;">
                                                <div class="d-flex ">
                                                    <div class="my-auto col-auto pe-4">
                                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M29.0218 28.0429H27.7174V21.195C27.7174 19.5768 26.4009 18.2602 24.7826 18.2602H23.8043V11.4124C23.8043 9.79412 22.4878 8.47757 20.8695 8.47757H15.9783V7.65714C17.7066 7.04419 18.4575 5.01251 17.5435 3.42713C17.5434 3.42702 17.5434 3.4269 17.5433 3.42672L15.8473 0.488534C15.4709 -0.163382 14.5283 -0.162327 14.1528 0.488592L12.4568 3.4269C11.5406 5.01467 12.2965 7.0453 14.0217 7.65714V8.47757H9.13045C7.5122 8.47757 6.19566 9.79412 6.19566 11.4124V18.2602H5.21743C3.59919 18.2602 2.28264 19.5768 2.28264 21.195C2.28264 21.437 2.28264 25.9858 2.28264 28.0429H0.978283C0.437989 28.0429 0 28.4809 0 29.0212C0 29.5615 0.437989 29.9994 0.978283 29.9994C1.5668 29.9994 26.4085 29.9994 29.0218 29.9994C29.5621 29.9994 30.0001 29.5615 30.0001 29.0212C30.0001 28.4809 29.5621 28.0429 29.0218 28.0429ZM14.1514 4.40489L15 2.93453L15.8485 4.40454C16.2218 5.05153 15.7518 5.86891 15 5.86891C14.2462 5.86891 13.7796 5.04942 14.1514 4.40489ZM8.15216 11.4124C8.15216 10.873 8.59103 10.4341 9.13045 10.4341H20.8696C21.409 10.4341 21.8479 10.873 21.8479 11.4124V14.2313C21.7567 14.139 21.658 14.034 21.5473 13.9135C20.98 13.2963 20.203 12.451 18.87 12.451C17.5377 12.451 16.7609 13.2961 16.1938 13.9131C15.6516 14.5029 15.3879 14.7432 14.957 14.7432C14.5122 14.7432 14.226 14.4574 13.7172 13.9096C13.1455 13.2941 12.3625 12.4511 11.0439 12.4511C9.71164 12.4511 8.9348 13.2962 8.36761 13.9131C8.29091 13.9966 8.2199 14.0731 8.15216 14.1441V11.4124ZM8.15216 16.5145C8.89425 16.2309 9.40513 15.6755 9.80808 15.2372C10.35 14.6476 10.6135 14.4075 11.0439 14.4075C11.4887 14.4075 11.7749 14.6933 12.2837 15.2411C12.8554 15.8566 13.6384 16.6996 14.957 16.6996C16.2899 16.6996 17.0669 15.8544 17.6342 15.2371C18.1761 14.6476 18.4397 14.4074 18.87 14.4074C19.301 14.4074 19.5647 14.6477 20.1068 15.2375C20.5261 15.6936 21.06 16.2738 21.8479 16.5458V18.2602H8.15216V16.5145ZM4.23915 28.0429V24.8049C4.23968 24.8055 4.24026 24.8061 4.24079 24.8067C4.92112 25.5532 5.76786 26.4823 7.13081 26.4823C8.46371 26.4823 9.24072 25.637 9.80808 25.0198C10.35 24.4302 10.6135 24.1901 11.0439 24.1901C11.4887 24.1901 11.7749 24.4759 12.2837 25.0237C12.8554 25.6392 13.6384 26.4822 14.957 26.4822C16.2899 26.4822 17.0669 25.637 17.6342 25.0197C18.1761 24.4302 18.4397 24.19 18.87 24.19C19.301 24.19 19.5647 24.4303 20.1068 25.0201C20.674 25.6372 21.4507 26.4822 22.7831 26.4822C24.116 26.4822 24.893 25.637 25.4604 25.0197C25.5711 24.8993 25.6697 24.7942 25.761 24.702V28.0429H4.23915ZM25.7609 22.3875C24.9731 22.6594 24.439 23.2396 24.0198 23.6957C23.4777 24.2855 23.214 24.5258 22.783 24.5258C22.3526 24.5258 22.0891 24.2857 21.5472 23.6961C20.9799 23.0789 20.2029 22.2336 18.87 22.2336C17.5377 22.2336 16.7609 23.0787 16.1937 23.6957C15.6515 24.2855 15.3879 24.5258 14.9569 24.5258C14.5121 24.5258 14.2259 24.24 13.7172 23.6922C13.1454 23.0767 12.3624 22.2337 11.0438 22.2337C9.71152 22.2337 8.93474 23.0787 8.36755 23.6957C7.82539 24.2855 7.56171 24.5258 7.13075 24.5258C6.66534 24.5258 6.27476 24.1341 5.68677 23.489C5.27444 23.0365 4.82204 22.5418 4.23903 22.2155V21.1951C4.23903 20.6557 4.6779 20.2168 5.21731 20.2168C5.73306 20.2168 24.2405 20.2168 24.7826 20.2168C25.322 20.2168 25.7608 20.6557 25.7608 21.1951V22.3875H25.7609Z" fill="#454545"/>
                                                        </svg>
                                                    </div>
                                                    
                                                    <div class="name-divs col me-2">
                                                        <div class="name fs-5 fw-600" style="color: #434343;">
                                                            {{$birth['name']}} {{$birth['lname']}}
                                                        </div>
                                                        <div class="comment" style="color: #434343;font-weight: 400 !important;">
                                                            {{$birth['birthday']}} ({{$birth['age']}}yahre)
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="desktop-tasks">
            <div class="container-fluid">
                <div class="row g-0 mx-3 my-3">
                    @if(Auth::user()->hasRole('backoffice'))
                        <div class="col-12 col-xl-6 col-xl-6 h-auto ps-2 mb-4 mb-xl-0">
                            <div class="greyBgDivPendezen p-3 p-md-4 h-100 me-2">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.0423 77.3271C39.8362 81.9773 47.7843 86.547 52.0268 89.8453C56.2692 93.1435 50.752 102.5 55.797 103.944C60.8421 105.388 76.3506 98.8915 81.4301 98.2616C86.5097 97.6316 91.3583 95.9651 95.6991 93.3571C100.04 90.749 103.788 87.2506 106.729 83.0615C109.67 78.8724 111.747 74.0747 112.841 68.9423C113.934 63.8099 114.024 58.4434 113.104 53.1491C112.184 47.8547 111.334 38.8294 110.492 33.8527L80.9468 34.3263L63.3665 34.608C58.8425 34.6804 54.4031 35.8452 50.4263 38.0031L47.8194 39.4177C43.6759 41.6661 40.4617 45.3082 38.746 49.6991V49.6991C37.881 51.9127 37.4183 54.2631 37.3796 56.6394L37.0423 77.3271Z" fill="#DCE4F9"/>
                                            </g>
                                            <path d="M64.9144 52.1109C63.0288 52.5694 62.1035 54.0829 62.1035 56.695C62.1035 58.8662 63.0461 60.5871 64.681 61.4001C65.3124 61.7116 65.3729 61.7203 66.2467 61.7203C67.1029 61.7203 67.207 61.703 67.7516 61.4436C69.4124 60.6566 70.4155 58.8662 70.4069 56.7126C70.3982 54.0141 69.438 52.5003 67.4832 52.0853C66.8864 51.9636 65.4677 51.9722 64.9144 52.1109ZM67.4746 53.512C68.0887 53.6936 68.6077 54.2212 68.8152 54.8613C68.9967 55.4495 69.0745 57.1621 68.9449 57.7849C68.4259 60.2586 65.9867 61.2272 64.4559 59.5667C63.6948 58.7365 63.4524 57.9232 63.5043 56.3665C63.5734 54.6106 63.9455 53.8927 64.9746 53.538C65.5717 53.3305 66.8173 53.3218 67.4746 53.512Z" fill="black"/>
                                            <path d="M84.2894 52.1109C82.4038 52.5694 81.4785 54.0829 81.4785 56.695C81.4785 58.8662 82.4215 60.5871 84.056 61.4001C84.6874 61.7116 84.7479 61.7203 85.6304 61.7203C86.5125 61.7203 86.5733 61.7116 87.2047 61.4001C88.8392 60.5871 89.7822 58.8658 89.7822 56.695C89.7822 54.031 88.805 52.4999 86.8586 52.085C86.2614 51.9636 84.843 51.9722 84.2894 52.1109ZM86.8496 53.512C87.4551 53.6936 87.9827 54.2212 88.1902 54.8613C88.4063 55.5618 88.4585 57.361 88.268 58.0097C88.0692 58.7016 87.8441 59.1169 87.4291 59.5664C86.417 60.6649 84.843 60.6649 83.8309 59.5664C83.4156 59.1165 83.1908 58.7016 82.992 58.0097C82.8018 57.3696 82.8537 55.5618 83.0698 54.8786C83.2686 54.2472 83.7444 53.7454 84.3326 53.5466C84.9467 53.3305 86.1836 53.3218 86.8496 53.512Z" fill="black"/>
                                            <path d="M74.359 55.5878C72.6722 55.9944 71.6172 57.1535 71.2192 59.0387C71.0031 60.0854 71.0204 62.0401 71.2538 62.9136C71.8333 65.0499 73.4077 66.6415 75.267 66.9527C77.6111 67.3511 79.8943 65.6297 80.6294 62.9139C80.8628 62.0405 80.8801 60.0858 80.664 59.0391C80.2663 57.1276 79.2197 55.9858 77.481 55.5795C76.7891 55.4149 75.0422 55.4235 74.359 55.5878ZM76.841 56.8765C78.147 56.9976 78.9949 57.8191 79.2975 59.2293C79.479 60.0768 79.5136 61.4869 79.3666 62.2393C79.09 63.6318 78.2421 64.8514 77.1785 65.3618C76.7459 65.5692 76.573 65.6038 75.9416 65.6038C75.3102 65.6038 75.1373 65.5692 74.7047 65.3618C73.6408 64.8514 72.7932 63.6318 72.5163 62.2393C72.3001 61.1235 72.4471 59.3157 72.8365 58.4163C73.0612 57.8886 73.6235 57.3178 74.1338 57.1016C74.5491 56.9201 75.6646 56.7469 76.1145 56.7991C76.2355 56.816 76.5557 56.8506 76.841 56.8765Z" fill="black"/>
                                            <path d="M63.4438 62.0661C60.8663 62.6629 59.785 63.5367 59.3009 65.4309C59.128 66.071 58.9638 68.0775 59.007 68.8649C59.0416 69.4444 59.0502 69.4704 59.4655 69.9029C60.2439 70.69 61.922 71.3646 63.7557 71.6156C64.1104 71.6588 64.9493 71.728 65.6239 71.7626L66.8435 71.8231L66.9473 71.4427C66.9991 71.2353 67.0769 70.9496 67.1202 70.8113C67.172 70.673 67.2066 70.5257 67.2066 70.4911C67.2066 70.4479 66.8259 70.4133 66.3677 70.4133C64.3179 70.4133 62.4064 70.1021 61.3684 69.6004C60.4341 69.1502 60.3732 69.0724 60.3732 68.2245C60.3732 66.5896 60.6758 65.1712 61.1429 64.609C61.4804 64.2027 62.2328 63.8133 63.219 63.528L64.0147 63.3033L64.551 63.5713C65.6409 64.1249 66.8432 64.1249 67.95 63.5713L68.4864 63.3033L69.161 63.4935C69.5417 63.5972 70.0171 63.7528 70.225 63.8482C70.4324 63.9347 70.6143 64.0038 70.6316 63.9866C70.6489 63.9779 70.5884 63.6145 70.5019 63.1909C70.3463 62.4298 70.3463 62.4212 70.0175 62.3088C69.836 62.2483 69.291 62.11 68.8066 62.0149L67.9158 61.8247L67.6132 62.1273C66.9559 62.7846 65.5548 62.7933 64.9061 62.1446C64.7505 61.9803 64.5513 61.8506 64.4649 61.8593C64.3781 61.8586 63.9196 61.9537 63.4438 62.0661Z" fill="black"/>
                                            <path d="M82.8183 62.0661C81.4691 62.3773 81.5642 62.3081 81.3826 63.1906C81.2962 63.6145 81.2357 63.9776 81.253 63.9862C81.2702 64.0035 81.4518 63.9344 81.6593 63.8479C81.8667 63.7528 82.3425 63.5972 82.7232 63.4931L83.3979 63.303L83.9342 63.5709C85.0068 64.1245 86.2955 64.1159 87.3419 63.5623L87.835 63.3116L88.3713 63.4413C89.6687 63.7701 90.5076 64.2196 90.8623 64.7905C91.2081 65.3355 91.4159 66.304 91.4764 67.6623L91.537 68.8646L91.3036 69.1066C90.5598 69.8763 88.1984 70.4127 85.4826 70.4127H84.6091L84.7302 70.7328C84.7907 70.9144 84.8858 71.2346 84.9376 71.4421L85.0327 71.8224L86.3042 71.7619C89.2537 71.6149 91.3554 70.9749 92.4194 69.8936C92.826 69.487 92.8433 69.4351 92.8779 68.9161C92.9298 68.1723 92.7482 66.062 92.5926 65.4389C92.0823 63.4928 90.9232 62.5848 88.2074 62.0139L87.2907 61.8237L86.9882 62.1263C86.3308 62.7836 84.9297 62.7922 84.281 62.1435C84.1254 61.9793 83.9262 61.8496 83.8398 61.8583C83.7523 61.8586 83.2941 61.9537 82.8183 62.0661Z" fill="black"/>
                                            <path d="M72.8021 67.4721C70.856 67.896 69.7142 68.415 68.884 69.2366C67.7682 70.3525 67.3705 71.8141 67.3446 74.8501L67.3359 76.3117L67.9155 76.8567C69.0573 77.938 70.9688 78.6126 73.6759 78.8979C75.1289 79.0448 78.2254 78.9584 79.5228 78.725C81.564 78.3619 83.1988 77.661 84.0896 76.7529L84.5481 76.2858L84.5308 74.8155C84.5049 71.7795 84.1072 70.3525 82.9914 69.2366C82.1608 68.3977 80.9326 67.8528 78.9692 67.4634L78.0089 67.2732L77.6891 67.5845C77.2738 67.9911 76.7378 68.1813 75.9678 68.1813C75.1808 68.1813 74.5839 67.9825 74.2119 67.6017C73.8747 67.256 73.8402 67.256 72.8021 67.4721ZM73.7624 68.9856C74.8177 69.7121 76.8156 69.7466 78.0006 69.0547L78.3727 68.8473L78.5456 69.0634C78.7531 69.3314 79.2548 69.3746 79.4969 69.1498C79.6438 69.0202 79.7043 69.0202 80.2666 69.2017C81.1227 69.4783 81.8928 69.9628 82.2732 70.4645C82.8614 71.2256 83.0861 72.2204 83.1812 74.3912L83.2331 75.7318L82.8613 76.0693C82.1349 76.7267 80.6642 77.2198 78.6922 77.4705C77.2479 77.652 73.7447 77.6001 72.4819 77.384C70.9076 77.1074 69.5324 76.5797 68.9615 76.0348C68.6848 75.7754 68.6762 75.7495 68.6762 75.014C68.6762 73.31 68.9183 71.7273 69.299 70.9317C69.7229 70.0582 70.7347 69.4095 72.309 68.9942C73.3471 68.7262 73.3816 68.7262 73.7624 68.9856Z" fill="black"/>
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0419922" y="0.852722" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="18.5"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>


                                    </div>
                                    <div class="col" style="margin-top: -0.8rem;margin-left:-1rem;">
                                        <div class="pb-3">
                                            <span class="fs-5 secondGreyBorderDashSpan">Eingereichte Kunden</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="overFlowDivDashboard" style="height: 250px;margin-top: -1.5rem;">
                                    @if(count($answered) == 0)
                                        <div class="fs-6 fw-400 text-center d-flex h-100 justify-content-center align-items-center" style="color: #d1d1d1">
                                            Es gibt aktuell keine neu eingereichten Kunden
                                        </div>
                                    @else
                                        <div class="row g-0">
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start ps-1">
                                                    <div class="col-auto ps-2">
                                                        <span class="anfragenTitleSpans fs-6">Datum</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Vorname</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Nachname</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">

                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Berater</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $admin_id = Crypt::encrypt($leadsss);
                                            $count = 1;
                                        @endphp
                                        @foreach($answered as $family)
                                            <div class="thirdBorderDivDash py-1 my-2 px-1">
                                                @php
                                                    $leadss = $family->family_id * 1244;
                                                      $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                      $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($family->admin_id * 1244);
                                                      $pend_id = $family->id;
                                                @endphp
                                                <a style="text-decoration: none;color: black"
                                                   href="{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                    <div class="thirdBorderDivDash my-2" style="border:none">
                                                        <div class="row g-0 text-start ps-2">
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ Carbon\Carbon::parse($family->created_at)->format('d.m.Y')}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ucfirst($family->family->first_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{ucfirst($family->family->last_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-6">{{$family->family->lead->admin->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach

                                        @php
                                            $count++;
                                        @endphp
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-xl-6 pe-2">
                            <div class="greyBgDivPendezen h-100 p-3 p-md-4 ms-2">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z" fill="#DCE4F9"/>
                                            </g>
                                            <path d="M77.577 55.9988C77.9653 55.3258 78.9393 55.3334 79.317 56.0124L91.4726 77.8626C91.8434 78.5291 91.3614 79.3487 90.5987 79.3487H65.8352C65.0655 79.3487 64.5843 78.5156 64.969 77.849L77.577 55.9988Z" stroke="#313131" stroke-width="2"/>
                                            <path d="M78.1865 63.6046V67.7907V71.9767" stroke="#313131" stroke-width="1.5" stroke-linecap="square"/>
                                            <path d="M67.9538 53.5691L67.9538 59.6156L62.3724 59.6155" stroke="#313131" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M78.1865 73.8372V74.3927V74.9483" stroke="#313131" stroke-width="2"/>
                                            <path d="M75.0175 52.7327C74.2295 51.5032 73.1408 50.5057 71.8453 49.8264C70.5499 49.1472 69.0867 48.8067 67.5824 48.8344C66.078 48.862 64.5778 49.257 63.2113 49.9852C61.8449 50.7134 60.6534 51.7528 59.7398 53.0136C58.8263 54.2744 58.2183 55.7186 57.9682 57.2214C57.7182 58.7242 57.8338 60.2404 58.3049 61.6387C58.7761 63.037 59.5886 64.2755 60.6723 65.247C61.7559 66.2185 63.0781 66.8939 64.5245 67.2146" stroke="#313131" stroke-width="1.5" stroke-linecap="round"/>
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="18.5"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                                                </filter>
                                            </defs>
                                        </svg>

                                    </div>
                                    <div class="col titleMarginAuto">
                                        <div class="pb-3">
                                            <span class="fs-5 secondGreyBorderDashSpan">Offene Pendenzen</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="overFlowDivDashboard" style="margin-top: -1.5rem; height:250px">
                                    @if($opened->count() == 0)
                                        <div class="fs-6 fw-400 text-center d-flex h-100 justify-content-center align-items-center" style="color: #d1d1d1">
                                            keine offenen Pendenzen
                                        </div>
                                    @else
                                        <div class="row g-0 ps-2">
                                            <div class="col-3 ps-1">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Berater</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Kunde</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Aufgabe</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row g-0 justify-content-start">
                                                    <div class="col-auto">
                                                        <span class="anfragenTitleSpans fs-6">Beschreibung</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($opened->count() > 0)
                                            @foreach($opened as $pendency)
                                            @if ($pendency->family_id != 0)
                                                @php
                                                    $leadss = $pendency->family_id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($pendency->admin_id * 1244);
                                                    $pend_id = $pendency->id;
                                                @endphp
                                                <div class="modal fade" style="top: 1% !important;" id="pend{{$pendency->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                            <div class="modal-header" style="border-bottom: 0 !important;">
                                                                <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                                style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                                
                                                            </div>
                                                            <div class="modal-body px-0">
                                                                <div class="modal-footer px-0 py-0 text-center"
                                                                     style="border-top: 0 !important; justify-content: flex-start !important;">
                                                                    <div class="row g-0" style="width: 100%;">
                                                                        <div class="col-6 pe-1">
                                                                            <div>
                                                                                <button type="button" class="btn py-1"
                                                                                        data-bs-dismiss="modal"
                                                                                        style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                                    Zurück
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 ps-1">
                                                                            <div>
                                                                                <input onclick="accepttask({{$pendency->id}})" type="button"
                                                                                       style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                                       class="btn py-1" value="Pendenz abgeschlossen">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="thirdBorderDivDash py-2 my-2 ps-1">
                                                    <div data-bs-toggle="modal" data-bs-target="#pend{{$pendency->id}}" class="row g-0 text-start ps-2">
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->adminpend->name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->family->first_name}} {{$pendency->family->last_name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->title}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->description}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    @else
                                                @php
                                                    $leadss = $pendency->family_id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                    $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($pendency->admin_id * 1244);
                                                    $pend_id = $pendency->id;
                                                @endphp
                                                <div class="modal fade" style="top: 1% !important;" id="pend{{$pendency->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content p-2" style="border-radius: 22px !important;">
                                                            <div class="modal-header" style="border-bottom: 0 !important;">
                                                                <h5 class="modal-title mx-2" id="exampleModalLabel"
                                                                style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Offene Pendenzen</h5>
                                                                
                                                            </div>
                                                            <div class="modal-body px-0">
                                                                <div class="modal-footer px-0 py-0 text-center"
                                                                     style="border-top: 0 !important; justify-content: flex-start !important;">
                                                                    <div class="row g-0" style="width: 100%;">
                                                                        <div class="col-6 pe-1">
                                                                            <div>
                                                                                <button type="button" class="btn py-1"
                                                                                        data-bs-dismiss="modal"
                                                                                        style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #828282; font-size: 16px !important; background-color: #828282; color: #fff; border-radius: 8px;">
                                                                                    Zurück
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 ps-1">
                                                                            <div>
                                                                                <input onclick="accepttask({{$pendency->id}})" type="button"
                                                                                       style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                                       class="btn py-1" value="Pendenz abgeschlossen">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="thirdBorderDivDash py-2 my-2 ps-1">
                                                    <div data-bs-toggle="modal" data-bs-target="#pend{{$pendency->id}}" class="row g-0 text-start ps-2">
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->adminpend->name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->first_name}} {{$pendency->last_name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->title}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div>
                                                                <span class="anfragenFieldsSpan fs-6">{{$pendency->description}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection
<style>
    body {
        overflow-x: hidden;
    }

    .txt-01 {
        font-size: 1.1rem;
        font-weight: 600;
        padding-top: 0.3rem;
        padding-bottom: 0.3rem;
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


    .overflow-divvv::-webkit-scrollbar {
        width: 1px !important;
    }

    /* Track */
    .overflow-divvv::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px !important;
    }

    /* Handle */
    .overflow-divvv::-webkit-scrollbar-thumb {
        background: #c9cad8 !important;
        border-radius: 10px !important;
    }

    /* Handle on hover */
    .overflow-divvv::-webkit-scrollbar-thumb:hover {
        background: #707070 !important;
        border-radius: 10px !important;
    }

    .tab-lookalike2 {
        background-color: #FFEAE4 !important;
        color: #434343 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .tab-lookalike1 {
        background-color: #F7F7F7 !important;
        color: #434343 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .tab-lookalike {
        background-color: #F7F7F7 !important;
        color: #FF4000 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .header-open-task1 {
        background-color: #F7F7F7 !important;
        border-bottom-left-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 0px !important;
    }

    .header-open-task1-pink {
        background-color: #FFEAE4 !important;
        border-bottom-left-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 0px;
    }

    .priority-spnn {
        background-color: #ad2b2b !important;
        border-radius: 35px !important;
        color: #fff !important;
    }

    .open-task-box {
        border-radius: 35px !important;
        background-color: #fff;
        border: none !important;
    }

    .pendzen-box {
        border-radius: 35px !important;
        background-color: #EAECF0 !important;
        border: none !important;
    }
    .cornerSvgToDoList {
        margin-top: -3.75rem !important;
        margin-left: -3.9rem !important;
    }
    @media (max-width: 767.98px) {

        .cornerSvgToDoList {
            margin-top: -3.28rem !important;
            margin-left: -3.4rem !important;
        }
    }


    .third-box {
        border-radius: 35px !important;
        background-color: #fff !important;
        border: #707070 1px solid !important;
    }

    .task-box {
        background-color: #F7F7F7 !important;
        border-radius: 12px !important;
    }

    .name-spnnnn {
        font-weight: 600 !important;
    }

    .fw-600 {
        font-weight: 600 !important;
    }

    .spn-muted {
        color: #707070 !important;
        font-weight: 600 !important;
        font-size: 14px !important;
    }

    .spn-normal {
        font-weight: 600;
        font-size: 14px !important;
    }
    .secondGreyBorderDash {
        background: rgba(220, 228, 249, 0.09);
        border: 2px solid rgba(47, 96, 220, 0.17) ;
        border-radius: 23px;
    }
    .titleMarginAuto {
        margin-top: -0.8rem !important;
        margin-left:-1rem;
    }
    .overFlowDivDashboard {
        height: 22vh;
        overflow-y: auto;
    }
    .anfragenTitleSpans {
        font-size: 16px !important;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.73)
    }
    .thirdBorderDivDash {
        border: 1px solid #DCE4F9 ;
        box-sizing: border-box !important;
        border-radius: 11px !important;
    }
</style>
<script>
    function firstDivToggleFunct() {
        $('#firstDivToggle').slideUp(200);
        $('#secondDivToggle').slideDown(200);
    }

    function firstDivToggleFunct22() {
        $('#firstDivToggle22').slideUp(200);
        $('#secondDivToggle22').slideDown(200);
    }

    function firstDivToggleFunct33() {
        $('#firstDivToggle33').slideUp(200);
        $('#secondDivToggle33').slideDown(200);
    }

    function firstDivToggleFunct44() {
        $('#firstDivToggle44').slideUp(200);
        $('#secondDivToggle44').slideDown(200);
    }

    function secondDivToggleFunct() {
        $('#secondDivToggle').slideUp(200);
        $('#firstDivToggle').slideDown(200);
    }

    function secondDivToggleFunct22() {
        $('#secondDivToggle22').slideUp(200);
        $('#firstDivToggle22').slideDown(200);
    }

    function secondDivToggleFunct33() {
        $('#secondDivToggle33').slideUp(200);
        $('#firstDivToggle33').slideDown(200);
    }

    function secondDivToggleFunct44() {
        $('#secondDivToggle44').slideUp(200);
        $('#firstDivToggle44').slideDown(200);
    }
    function accepttask(x){
        if(confirm('Sind Sie sicher, dass diese Aufgabe erledigt ist, sie kann nicht rückgängig gemacht werden!')){
            axios.get('accepttask?id=' + x).then(location.reload())   
        }

    }
    
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var intvaluecount = 1;
    var truefalsee = [];
    var intvaluecount2 = 1;
    var truefalsee2 = [];
</script>

<style>
    body {
        overflow-x: hidden;
    }

    .overflow-divvv::-webkit-scrollbar {
        width: 1px !important;
    }

    /* Track */
    .overflow-divvv::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px !important;
    }

    /* Handle */
    .overflow-divvv::-webkit-scrollbar-thumb {
        background: #c9cad8 !important;
        border-radius: 10px !important;
    }

    /* Handle on hover */
    .overflow-divvv::-webkit-scrollbar-thumb:hover {
        background: #707070 !important;
        border-radius: 10px !important;
    }

    .tab-lookalike2 {
        background-color: #FFEAE4 !important;
        color: #434343 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .tab-lookalike1 {
        background-color: #F7F7F7 !important;
        color: #434343 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .tab-lookalike {
        background-color: #F7F7F7 !important;
        color: #FF4000 !important;
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
    }

    .header-open-task1 {
        background-color: #F7F7F7 !important;
        border-bottom-left-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 0px !important;
    }

    .header-open-task1-pink {
        background-color: #FFEAE4 !important;
        border-bottom-left-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 0px;
    }

    .priority-spnn {
        background-color: #ad2b2b !important;
        border-radius: 35px !important;
        color: #fff !important;
    }

    .open-task-box {
        border-radius: 35px !important;
        background-color: #fff;
        border: none !important;
    }

    .pendzen-box {
        border-radius: 35px !important;
        background-color: #EAECF0 !important;
        border: none !important;
    }

    .third-box {
        border-radius: 35px !important;
        background-color: #fff !important;
        border: #707070 1px solid !important;
    }

    .task-box {
        background-color: #F7F7F7 !important;
        border-radius: 12px !important;
    }

    .name-spnnnn {
        font-weight: 600 !important;
    }

    .fw-600 {
        font-weight: 600 !important;
    }

    .spn-muted {
        color: #707070 !important;
        font-weight: 600 !important;
        font-size: 14px !important;
    }

    .spn-normal {
        font-weight: 600;
        font-size: 14px !important;
    }

    .mobile-tasks {
        display: none;
    }

    .desktop-tasks {
        display: block;
    }

    @media (max-width: 575.98px) {
        .mobile-tasks {
            display: block;
        }

        .desktop-tasks {
            display: none;
        }
    }

</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

    .fw-600 {
        font-weight: 600;
    }
    .overflowDivPendenzen {
        height: 250px;
        overflow-y: scroll;
    }
    .overflowDivPendenzen::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    .overflowDivPendenzen::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Handle */
    .overflowDivPendenzen::-webkit-scrollbar-thumb {
        background: #2F60DC90;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflowDivPendenzen::-webkit-scrollbar-thumb:hover {
        background: #2F60DC;
    }
    .form-control {
        border-color: #ced4da !important;
        box-shadow: none !important;
    }

    .number-offene {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .sjfg {

        background: #F9FAFC;
        border-radius: 15px;
    }

    .sjfg1 {
        background: #F9FAFC;
        border-radius: 15px;
    }

    .sjfg2 {
        background: #F9FAFC;
        border-radius: 15px;
    }

    .offene-item-one {
        background: #FFFFFF;
        border: 1px solid #DCE4F9;
        border-radius: 11px;
    }

    .overflow-divv1 {
        /* height: 37vh; */
        height: auto;
        max-height: 320px;
        overflow: auto;
    }

    .overflow-divv2 {
        height: auto;
        max-height: 320px;
        /* height: 28vh; */
        overflow: auto;
    }

    .wrapper {
        height: auto;
        max-height: 400px;
        background-color: #F9FAFC;
        border-radius: 15px;
    }

    .wrapper1 {
        height: auto;
        max-height: 400px;
        /* height: 400px; */
        background-color: #F9FAFC;
        border-radius: 15px;
    }

    .wrapper2 {
        height: auto;
        max-height: 400px;
        background-color: #F9FAFC;
        border-radius: 15px;
    }

    .wrapper3 {
        height: auto;
        max-height: 400px;
        background-color: #F9FAFC;
        border-radius: 15px;
    }

    .offene-item-one22 {
        background: #FFFFFF;
        border: 1px solid #DCE4F9;
        border-radius: 11px;
    }
</style>
<style>
    /*Per Notification */
    .coloriii a {
        color: black !important;
    }
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

    .fw-600 {
        font-weight: 600;
    }

    .form-control {
        border-color: #ced4da !important;
        box-shadow: none !important;
    }

    .search-button-task {
        color: #fff;
        background-color: #0C71C3;
        border-radius: 8px !important;
    }

    .submited-btn {
        background-color: #FFC428;
        color: #fff;
        border-radius: 35px;
    }

    .submited-btn1 {
        background-color: #c71a1a;
        color: #fff;
        border-radius: 35px;
    }

    .table-1 td {
        border: 1px solid #f8f8f8;
        border-left: none;
        border-right: none;
    }

    /*.table-1  td:first-child {*/
    /*    border-top-left-radius: 15px;*/
    /*}*/
    /*.table-1  td:last-child {*/
    /*    border-top-right-radius: 15px;*/
    /*}*/
    /*.table-1  td:first-child {*/
    /*    border-bottom-left-radius: 15px;*/
    /*}*/
    /*.table-1  td:last-child {*/
    /*    border-bottom-right-radius: 15px;*/
    /*}*/
    .table-1 tr:first-child {
        border-bottom: 2px solid #afafaf;
    }

    .table-2 td:first-child {
        border-top-left-radius: 15px;
    }

    .table-2 td:last-child {
        border-top-right-radius: 15px;
    }

    .table-2 td:first-child {
        border-bottom-left-radius: 15px;
    }

    .table-2 td:last-child {
        border-bottom-right-radius: 15px;
    }

    .table-22 td:first-child {
        border-top-left-radius: 15px;
    }

    .table-22 td:last-child {
        border-top-right-radius: 15px;
    }

    .table-22 td:first-child {
        border-bottom-left-radius: 15px;
    }

    .table-22 td:last-child {
        border-bottom-right-radius: 15px;
    }

    .table-22 tr {
        background-color: #fff;
    }

    .sticky-class {
        font-weight: 500 !important;
        color: #76767690 !important;
        position: sticky !important;
        top: 0;
        background-color: #EFEFEF !important;
    }

    .table-content {
        /* border-bottom: 0.5px solid #70707050 !important; */
        border-bottom: 5px solid #EFEFEF;
        font-weight: 600 !important;
        color: #434343;
        border-radius: 5px !important;
    }

    .table-content1 {
        /* border-bottom: 0.5px solid #70707050 !important; */
        font-weight: 600 !important;
        color: #434343;
        border-radius: 5px !important;

    }

    td {
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }

    th {
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }

    .search-icon {
        color: #0C71C3;
        background-color: #fff;
        border: 1px solid #707070 !important;
        border-right: none !important;
        border-top-left-radius: 10px !important;
        border-bottom-left-radius: 10px !important;
    }

    /* overflow-scroll divvvvvvvvv */
    .overflow-div {
        /* padding-right: 15px; */
    }

    .overflow-div::-webkit-scrollbar {
        width: 7px;
        height: 7px;
    }

    /* Track */
    .overflow-div::-webkit-scrollbar-track {
        background: #fff !important;
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

    .answered-items {
        background: #FFFFFF;
        border: 1px solid #DCE4F9;
        border-radius: 11px;
    }

    /* .answered-div {} */
    .answered-div .header {
        /* border-bottom: 1px solid #70707050; */
        /* border-top: 1px solid #70707050; */
        /* border-left: 1px solid #70707050; */
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .answered-div .content {
        background-color: #EFEFEF;
        height: 526px;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .answered-div .content .overflow-div {
        overflow: auto;
        height: 400px;
    }

    .answered-div .content .button-div button {
        background-color: #0C71C3;
        font-weight: 700;
        color: #fff;
        border: none;
        border-radius: 8px;
    }

    .answered-div .content label {
        font-weight: 500;
    }

    .answered-div .content input,
    textarea {
        border-color: #707070 !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-left: none !important;
    }

    /* .open-tasks-bo {} */
    .open-tasks-bo .header {
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

    .open-tasks-bo .content {
        height: 526px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .open-tasks-bo .content .overflow-div {
        height: 400px;
        overflow: auto;
    }


    /* .open-tasks-bo .content .overflow-div span {
        font-size: 18px;
    } */
    /* .open-tasks {} */
    .open-tasks .header {
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

    .open-tasks .content {
        height: 525px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .open-tasks .content .overflow-div {
        overflow: auto;
        height: 440px;
        background-color: #EFEFEF;
        /* padding: 0 !important; */
    }

    .open-tasks tr {
        background-color: #fff;
        border-bottom: 2px #EFEFEF solid;
    }

    .open-tasks-bo .content input {
        border-color: #707070 !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-left: none !important;
    }

    /* .birthday-div {} */
    .birthday-div .header {
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

    .birthday-itemm {
        border-radius: 10px;
    }

    .birthday-div .content {
        height: 525px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        /* border-left: 1px solid #70707050; */
    }

    .birthday-div .content .overflow-div {
        overflow: auto;
        height: 500px;
        padding-top: 1rem !important;
        /* padding-bottom: 1rem !important; */
        /* padding-right: 0 !important; */
    }

    /* .pending-divv {} */
    .pending-divv .header {
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

    .pending-divv .content {
        height: 520px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .pending-divv .content .overflow-div {
        height: 440px;
        overflow: auto;
        background-color: #EFEFEF;
        /* padding: 0 !important; */
    }

    .submited-btn2 {
        background-color: #eb990d;
        color: #fff;
        border-radius: 35px;
    }
    .secondGreyBorderDash {
        background: rgba(220, 228, 249, 0.09);
        border: 2px solid rgba(47, 96, 220, 0.17) ;
        border-radius: 23px;
    }
    .secondGreyBorderDashSpan {
        font-weight: 700;
    }
    .overFlowDivDashboard {
        height: 22vh;
        overflow-y: auto;
    }
    .overFlowDivDashboard::-webkit-scrollbar {
        width: 6px;
    }

    .overFlowDivDashboard::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    .overFlowDivDashboard::-webkit-scrollbar-thumb {
        background: #2F60DC80;

        border-radius: 10px;

    }

    .overFlowDivDashboard::-webkit-scrollbar-thumb:hover {
        background: #2F60DC;

    }
    .anfragenTitleSpans {
        font-size: 16px !important;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.73)
    }
    .thirdBorderDivDash {
        border: 1px solid #DCE4F9 ;
        box-sizing: border-box !important;
        border-radius: 11px !important;
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

</style>
<style>
    .greyBgDivPendezen {
        background: #F9FAFC;
        border-radius: 23px;
    }

    .birthDayFirstSpan {
        font-weight: 600;
    }

    .whiteBgDivBirthday {
        background: #FFFFFF;
        border: 1px solid #DCE4F9;
        box-sizing: border-box;
        border-radius: 11px;
    }

    .birthdayTitleSpan {
        font-weight: 700;
        color: #313131;
    }

    .birthdayCornerSvg {
        margin-top: -3.6rem !important;
        margin-left: -3.9rem;
    }

    .birthdayTitleDiv {
        margin-top: -1rem !important;
        margin-left: -1rem;
    }

    .pendenzenTitlesStyle {
        font-weight: 500;
        font-size: 17px;
    }
    .pendezenOrangeDiv {
        background: #FFC428;
        border-radius: 10px;
        color: #FFFFFF;
        font-weight: 600;
        width: 90%;
    }

    .pendezenRedDiv {
        background: #C71A1A;
        border-radius: 10px;
        color: #FFFFFF;
        font-weight: 600;
        width: 90%;
    }

    .pendezenOverFlowTable {
        margin-top: -1.1rem;
    }
    .NgMgTop {
        margin-top: -0.7rem;
    }
    .pendenzenTitlesStyleSpan {
            display: none !important;

        }
    @media (max-width: 1199.98px) {
        .pendenzenTitlesStyle {
            display: none !important;
        }
        .pendenzenTitlesStyleSpan {
            display: block !important;
        }
    }
    @media (max-width: 991.98px) {
        .pendenzenTitlesStyle {
            display: none !important;
        }
    }
    @media (max-width: 767.98px) {
        .pendenzenTitlesStyle {
            display: none !important;
        }
        .birthdayCornerSvg {
            margin-top: -3.1rem !important;
            margin-left: -3.3rem;
        }

        .birthdayTitleDiv {
            margin-top: -1rem !important;
            margin-left: -1rem;
        }
    }
    @media (max-width: 575.98px) {
        .pendezenOrangeDiv {

            width: 100%;
        }
        .pendezenRedDiv {

            width: 100%;
        }
        .pendenzenTitlesStyle {
            display: none;
        }

    }
</style>
