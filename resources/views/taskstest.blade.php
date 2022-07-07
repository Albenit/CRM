@extends('template.navbar')
@section('content')
    <head>
        <title>
            Aufgaben
        </title>
        <link rel="icon" type="image/png" href="{{config('app.url')}}imgs/Favicon.png">
    </head>

    @if(Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('admin'))
        {{--        mobile--}}
        <section class="mobile-tasks">
            <div class="row g-0">
                @if(Auth::guard('admins')->user()->hasRole('admin'))
                    <div class="col-12 col-md-6">
                        <div class="offene-div my-3 mx-3">
                            <div class="d-flex justify-content-between">
                                <span class="fw-600 fs-5">Pendenzübersicht</span>
                                <span onclick="secondDivToggleFunct()" class="fw-600 px-4 pb-1 pt-1 fs-5 number-offene"
                                      style="background-color: #F7F7F7; color: #FF4000;">{{$familyMemberCount}}</span>
                            </div>
                            <div id="firstDivToggle" class="py-5 sjfg" onclick="firstDivToggleFunct()">
                                <div class="text-center">
                            <span class="fs-4 fw-bold" style="color: #BCC1CD;">
                                Drücken um aufzuklappen
                            </span>
                                </div>
                            </div>
                            <div id="secondDivToggle" class="wrapper p-2" style="display: none;">
                                <div class="overflow-divv1">
                                    @if(count($tasks) == 0)
                                        <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                            Keine Pendenzübersicht
                                        </div>
                                    @else
                                        @php
                                            $admin_id = $leadsss;
                                            $count = 1;
                                        @endphp
                                        @foreach($tasks as $taskk)
                                            @foreach($taskk->family as $task)
                                                @php
                                                    $leadss = $task->id * 1244;
                                                                $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                                $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->pendency->admin_id * 1244);
                                                                $pend_id = $task->pendency->id;
                                                @endphp
                                                @if($count %2 == 0)
                                                    <a href="{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}">
                                                        <div class="offene-item-one py-2 px-3 m-2"
                                                             style="background-color: #ececec">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="name-divs">
                                                                    <div class="name fs-5 fw-bold" style="color: #535353;">
                                                                        {{ucfirst($task->first_name)}} {{ucfirst($task->last_name)}}
                                                                    </div>
                                                                    <div class="status fw-bold" style="color: #535353;">
                                                                        Status: {{ucfirst($task->status)}}
                                                                    </div>
                                                                </div>
                                                                <div class="svg-divv">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.253"
                                                                         height="15.484"
                                                                         viewBox="0 0 6.253 15.484">
                                                                        <g id="Group_1178" data-name="Group 1178"
                                                                           transform="translate(-1054.727 -165.697)">
                                                                            <ellipse id="Ellipse_6" data-name="Ellipse 6"
                                                                                     cx="3.127" cy="2.978"
                                                                                     rx="3.127" ry="2.978"
                                                                                     transform="translate(1054.727 165.697)"
                                                                                     fill="#535353"/>
                                                                            <ellipse id="Ellipse_7" data-name="Ellipse 7"
                                                                                     cx="3.127" cy="2.978"
                                                                                     rx="3.127" ry="2.978"
                                                                                     transform="translate(1054.727 175.225)"
                                                                                     fill="#535353"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </a>
                                                @else
                                                    <a href="{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}">
                                                        <div class="offene-item-one py-2 px-3 m-2">

                                                            <div class="d-flex justify-content-between">
                                                                <div class="name-divs">
                                                                    <div class="name fs-5 fw-bold" style="color: #535353;">
                                                                        {{ucfirst($task->first_name)}} {{ucfirst($task->last_name)}}
                                                                    </div>
                                                                    <div class="status fw-bold" style="color: #535353;">
                                                                        Status: {{ucfirst($task->status)}}
                                                                    </div>
                                                                </div>
                                                                <div class="svg-divv">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.253"
                                                                         height="15.484"
                                                                         viewBox="0 0 6.253 15.484">
                                                                        <g id="Group_1178" data-name="Group 1178"
                                                                           transform="translate(-1054.727 -165.697)">
                                                                            <ellipse id="Ellipse_6" data-name="Ellipse 6"
                                                                                     cx="3.127" cy="2.978"
                                                                                     rx="3.127" ry="2.978"
                                                                                     transform="translate(1054.727 165.697)"
                                                                                     fill="#535353"/>
                                                                            <ellipse id="Ellipse_7" data-name="Ellipse 7"
                                                                                     cx="3.127" cy="2.978"
                                                                                     rx="3.127" ry="2.978"
                                                                                     transform="translate(1054.727 175.225)"
                                                                                     fill="#535353"/>
                                                                        </g>
                                                                    </svg>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12  col-md-6">
                    <div class="pendzen-div  my-3 mx-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-600 fs-5">Pendenzen</span>
                            <span onclick="secondDivToggleFunct22()" class="fw-600 px-4 pb-1 pt-1 fs-5 number-offene"
                                  style="background-color: #FF400010; color: #FF4000;">{{count($pending)}}</span>
                        </div>
                        <div id="firstDivToggle22" class="py-5 sjfg1" onclick="firstDivToggleFunct22()">
                            <div class="text-center">
                            <span class="fs-4 fw-bold" style="color: #BCC1CD;">
                                Drücken um
                                aufzuklappen
                            </span>
                            </div>
                        </div>
                        <div id="secondDivToggle22" class="wrapper1 p-2" style="display: none;">
                            <div class="overflow-divv2">
                                @if(count($pending) == 0)
                                    <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                        Keine Pendenze
                                    </div>
                                @else
                                    @foreach($pending as $task)
                                        @php
                                            $leadss = $task->family->id * 1244;
                                            $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                            $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                            $pend_id = $task->id;
                                        @endphp
                                        <div class="offene-item-one py-2 px-3 m-2"
                                             data-bs-target="#statss{{$task->pid}}"
                                             data-bs-toggle="modal">
                                            <div class="d-flex justify-content-between">
                                                <div class="name-divs">
                                                    <div class="name fs-5 fw-bold" style="color: #535353;">
                                                        {{ucfirst($task->first_name)}}  {{ucfirst($task->last_name)}}
                                                    </div>
                                                    <div class="comment fw-bold" style="color: #535353;">
                                                        Kategorie:
                                                        @if($task->type == "task")
                                                            <span class="submited-btn1 py-1 px-3">
                                                                {{ucfirst($task->type)}}
                                                                </span>
                                                            <span class="submited-btn py-1 px-3">Eingereicht</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="svg-divv">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.253"
                                                         height="15.484"
                                                         viewBox="0 0 6.253 15.484">
                                                        <g id="Group_1178" data-name="Group 1178"
                                                           transform="translate(-1054.727 -165.697)">
                                                            <ellipse id="Ellipse_6" data-name="Ellipse 6" cx="3.127"
                                                                     cy="2.978"
                                                                     rx="3.127" ry="2.978"
                                                                     transform="translate(1054.727 165.697)"
                                                                     fill="#535353"/>
                                                            <ellipse id="Ellipse_7" data-name="Ellipse 7" cx="3.127"
                                                                     cy="2.978"
                                                                     rx="3.127" ry="2.978"
                                                                     transform="translate(1054.727 175.225)"
                                                                     fill="#535353"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        @if($task->type != 'Order')
                                            <div class="modal fade" id="statss{{$task->pid}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content"
                                                         style="background: #f8f8f8; border-radius: 43px">
                                                        <div class="modal-header mx-3 pt-4"
                                                             style="border-bottom: none !important;">
                                                            <h4>Pendenzen Info</h4>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"
                                                                    style="opacity: 1 !important;"></button>
                                                        </div>
                                                        <div class="modal-body p-3">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="text-center my-1 fw-bold"
                                                                         style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                        Datum:
                                                                        <br>
                                                                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('Y-m-d')}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="text-center my-1 fw-bold"
                                                                         style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                                                        Time:
                                                                        <br>
                                                                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('H:i')}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-6">
                                                                    <div class="text-center my-1 fw-bold"
                                                                         style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                        Kundenname:
                                                                        <br>
                                                                        {{ucfirst($task->family->first_name)}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="text-center my-1 fw-bold"
                                                                         style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                                                        Titel
                                                                        <br>
                                                                        {{$task->title}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-12">
                                                                    <div class="text-center fw-bold"
                                                                         style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                        Beschreibung:
                                                                        <br>
                                                                        {{$task->description}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer text-center"
                                                             style="border-top: none !important; display: block;">
                                                            <button type="button" class="btn px-3"
                                                                    style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                    data-bs-dismiss="modal"><b>Close</b></button>

                                                            <a onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">
                                                                <button class="btn px-3"
                                                                        style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                        data-bs-dismiss="modal"><b>Offen</b></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-end py-1" style="background-color: transparent;">
                                <div class="prev-nxt-btn d-flex">
                                    <a href="{{route('tasks',['pendingP' => $pending->currentPage() - 1])}}">
                                        <div class="prev-btn border p-2 bg-light m-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </div>
                                    </a>
                                    @if($pending->count() > 0)
                                        <a href="{{route('tasks',['pendingP' => $pending->currentPage() + 1])}}">
                                            <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-chevron-right"
                                                     viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    @else
                                        <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6">
                    <div class="kundenbirung-div  my-3 ">
                        <div class="d-flex justify-content-between">
                            <span class="fw-600 ps-4 fs-5">Kundenbindung</span>
                            <span class="fw-600 pe-4 pb-1 pt-1 fs-5 number-offene"
                                  style="color: #434343;">{{count($birthdays)}}</span>
                        </div>
                        <div class="wrapper2 p-2">
                            @if(count($birthdays) == 0)
                                <div class="text-center fs-4 fw-600" style="color: #9F9F9F">
                                    Keine geburtstage für heute
                                </div>
                            @else
                                <div class="overflow-divv1">
                                    @foreach($birthdays as $birth)
                                        <div class="offene-item-one22 py-2 px-3 m-2 bg-light border">
                                            <div class="d-flex ">
                                                <div class="my-auto col-auto pe-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="33"
                                                         fill="currentColor"
                                                         class="bi bi-balloon" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M8 9.984C10.403 9.506 12 7.48 12 5a4 4 0 0 0-8 0c0 2.48 1.597 4.506 4 4.984ZM13 5c0 2.837-1.789 5.227-4.52 5.901l.244.487a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.244-.487C4.789 10.227 3 7.837 3 5a5 5 0 0 1 10 0Zm-6.938-.495a2.003 2.003 0 0 1 1.443-1.443C7.773 2.994 8 2.776 8 2.5c0-.276-.226-.504-.498-.459a3.003 3.003 0 0 0-2.46 2.461c-.046.272.182.498.458.498s.494-.227.562-.495Z"/>
                                                    </svg>
                                                </div>
                                                <div class="name-divs col">
                                                    <div class="name fs-5 fw-bold" style="color: #535353;">
                                                        {{$birth['name']}} {{$birth['lname']}}
                                                    </div>
                                                    <div class="comment fw-bold" style="color: #535353;">
                                                        {{$birth['birthday']}} ({{$birth['age']}} Jahre)
                                                    </div>
                                                </div>
                                                <div class="svg-divv">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6.253"
                                                         height="15.484"
                                                         viewBox="0 0 6.253 15.484">
                                                        <g id="Group_1178" data-name="Group 1178"
                                                           transform="translate(-1054.727 -165.697)">
                                                            <ellipse id="Ellipse_6" data-name="Ellipse 6" cx="3.127"
                                                                     cy="2.978"
                                                                     rx="3.127" ry="2.978"
                                                                     transform="translate(1054.727 165.697)"
                                                                     fill="#535353"/>
                                                            <ellipse id="Ellipse_7" data-name="Ellipse 7" cx="3.127"
                                                                     cy="2.978"
                                                                     rx="3.127" ry="2.978"
                                                                     transform="translate(1054.727 175.225)"
                                                                     fill="#535353"/>
                                                        </g>
                                                    </svg>
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
        {{--        Desktop--}}
        <section class="desktop-tasks">
            <div class="container-fluid">
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('backoffice'))
                    <div class="row g-0 mx-1 mx-sm-3">
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="open-tasks m-2">
                                <div class="header  justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 23.5 17.5">
                                                <g id="pendingTasksSvg" transform="translate(-178.5 -76.5)">
                                                    <line id="Line_50" data-name="Line 50" x2="20"
                                                          transform="translate(179.5 77.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_51" data-name="Line 51" x2="20"
                                                          transform="translate(179.5 83.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_52" data-name="Line 52" x2="12"
                                                          transform="translate(179.5 89.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <g id="Group_1042" data-name="Group 1042">
                                                        <g id="Ellipse_390" data-name="Ellipse 390"
                                                           transform="translate(193 85)" fill="#fff" stroke="#000"
                                                           stroke-width="0.8">
                                                            <circle cx="4.5" cy="4.5" r="4.5" stroke="none"/>
                                                            <circle cx="4.5" cy="4.5" r="4.1" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_391" data-name="Ellipse 391"
                                                           transform="translate(195 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_392" data-name="Ellipse 392"
                                                           transform="translate(197 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_393" data-name="Ellipse 393"
                                                           transform="translate(199 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>


                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Pendenzübersicht</span>
                                        </div>
                                    </div>

                                    <div class="h-100 count fs-5 px-4">
                                        {{$familyMemberCount}}
                                    </div>
                                </div>
                                <div class="content px-3">
                                    <div class="overflow-div pe-3">
                                        <table class="table table-borderless table-1">
                                            <thead>
                                            <tr class="sticky-class">
                                                <th scope="col">Datum</th>
                                                <th scope="col">Vorname</th>
                                                <th scope="col">Nachname</th>
                                            </tr>
                                            </thead>
                                            <tbody id="body-table-edit">
                                            @if(count($tasks) == 0)
                                                <div class="fs-5 fw-600"
                                                     style="position: absolute; margin-top: 70px; color: #9F9F9F">
                                                    Keine Pendenzübersicht
                                                </div>
                                            @else
                                                @php
                                                    $admin_id = Crypt::encrypt($leadsss);
                                                    $count = 1;
                                                @endphp
                                                @foreach($tasks as $task)
                                                    @foreach($task->family as $family)
                                                        @php
                                                            $leadss = $family->id * 1244;
                                                           $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                           $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($family->pendency->admin_id * 1244);
                                                           $pend_id = $family->pendency->id;
                                                        @endphp
                                                        {{--                                                    @if($count %2 == 0)--}}
                                                        <tr class="table-content1"
                                                            style="cursor: pointer;border-left: 3px solid !important;border-right: 2px solid;border-top: none;border-bottom: none; border-color: #afafaf">
                                                            <td scope="row"
                                                                onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ Carbon\Carbon::parse($family->created_at)->format('Y-m-d') }}</td>
                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ucfirst($family->first_name)}}</td>
                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ucfirst($family->last_name)}}</td>
                                                        </tr>
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <tr class="table-content1 " style="cursor: pointer; background-color: #ffffff" >--}}
                                                        {{--                                                            <td scope="row"--}}
                                                        {{--                                                                onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ Carbon\Carbon::parse($family->created_at)->format('Y-m-d') }}</td>--}}
                                                        {{--                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ucfirst($family->first_name)}}</td>--}}
                                                        {{--                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ucfirst($family->last_name)}}</td>--}}
                                                        {{--                                                        </tr>--}}
                                                        {{--                                                    @endif--}}
                                                    @endforeach
                                                    <tr class=""
                                                        style="border-bottom: 2px solid; border-color: #afafaf;">

                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end py-1" style="background-color: transparent;">
                                        <div class="prev-nxt-btn d-flex">
                                            <a href="{{route('tasks',['taskk' => $tasks->currentPage() - 1])}}">
                                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            @if($tasks->count() > 0)
                                                <a href="{{route('tasks',['taskk' => $tasks->currentPage() + 1])}}">
                                                    <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            @else
                                                <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-lg-6 ">
                            <div class="birthday-div m-2">
                                <div class="header  justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37" fill="currentColor"
                                                 class="bi bi-calendar" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            </svg>

                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Geburstage/Jubiläen</span>
                                        </div>
                                    </div>

                                    <div class="count fs-5 h-100 px-4">
                                        {{count($birthdays)}}
                                    </div>
                                </div>
                                <div class="content px-3 py-2">
                                    <div class="overflow-div pe-3">
                                        @if(count($birthdays) == 0)
                                            <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                                Keine geburtstage für heute
                                                <hr>
                                            </div>
                                        @else
                                            @foreach($birthdays as $birth)
                                                <div class="p-2 my-2 birthday-itemm bg-white d-flex">
                                                    <div class="my-auto px-2">
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40"
                                                     viewBox="0 0 21 17.837">
                                            <g id="anniversay" transform="translate(-277 -71.163)">
                                                <g id="Rectangle_904" data-name="Rectangle 904"
                                                   transform="translate(277 78)" fill="#fff" stroke="#000"
                                                   stroke-width="1">
                                                    <rect width="21" height="11" rx="2" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="20" height="10" rx="1.5" fill="none"/>
                                                </g>
                                                <g id="Group_1047" data-name="Group 1047"
                                                   transform="translate(279.578 71.5)">
                                                    <g id="Group_1044" data-name="Group 1044" transform="translate(1)">
                                                        <path id="Path_1959" data-name="Path 1959"
                                                              d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                              transform="translate(0.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                        <path id="Path_1960" data-name="Path 1960"
                                                              d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                              transform="translate(1.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                    </g>
                                                    <g id="Group_1045" data-name="Group 1045" transform="translate(13)">
                                                        <path id="Path_1959-2" data-name="Path 1959"
                                                              d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                              transform="translate(0.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                        <path id="Path_1960-2" data-name="Path 1960"
                                                              d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                              transform="translate(1.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                    </g>
                                                    <g id="Group_1046" data-name="Group 1046" transform="translate(7)">
                                                        <path id="Path_1959-3" data-name="Path 1959"
                                                              d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                              transform="translate(0.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                        <path id="Path_1960-3" data-name="Path 1960"
                                                              d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                              transform="translate(1.922)" fill="none" stroke="#000"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="0.5"/>
                                                    </g>
                                                </g>
                                                <g id="Rectangle_906" data-name="Rectangle 906"
                                                   transform="translate(280 75)" fill="#fff" stroke="#000"
                                                   stroke-linejoin="round" stroke-width="1">
                                                    <rect width="3" height="4" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                </g>
                                                <g id="Rectangle_912" data-name="Rectangle 912"
                                                   transform="translate(286 75)" fill="#fff" stroke="#000"
                                                   stroke-linejoin="round" stroke-width="1">
                                                    <rect width="3" height="4" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                </g>
                                                <g id="Rectangle_913" data-name="Rectangle 913"
                                                   transform="translate(292 75)" fill="#fff" stroke="#000"
                                                   stroke-linejoin="round" stroke-width="1">
                                                    <rect width="3" height="4" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                </g>
                                                <line id="Line_53" data-name="Line 53" x2="17.5"
                                                      transform="translate(278.75 83.5)" fill="none" stroke="#000"
                                                      stroke-linecap="round" stroke-width="1"/>
                                                <g id="Rectangle_909" data-name="Rectangle 909"
                                                   transform="translate(279 78)" fill="#000" stroke="#000"
                                                   stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                    <rect width="5" height="3" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                </g>
                                                <g id="Rectangle_910" data-name="Rectangle 910"
                                                   transform="translate(291 78)" fill="#000" stroke="#000"
                                                   stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                    <rect width="5" height="3" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                </g>
                                                <g id="Rectangle_911" data-name="Rectangle 911"
                                                   transform="translate(285 78)" fill="#000" stroke="#000"
                                                   stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                    <rect width="5" height="3" stroke="none"/>
                                                    <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                </g>
                                            </g>
                                        </svg>

                                                </span>
                                                    </div>
                                                    <div class="">
                                                        <div
                                                            class="fs-5 fw-600">{{$birth['name']}} {{$birth['lname']}}</div>
                                                        <div class="">{{$birth['birthday']}} ({{$birth['age']}}yahre)
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('fs'))
                                            @if(count($consultation) == 0)
                                                <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                                    Keine Mitarbeiterbesprechungen für heute
                                                    <hr>
                                                </div>
                                            @else
                                                @foreach($consultation as $perApp)
                                                    <div class="offene-item-one22 py-2 px-3 my-2" data-bs-toggle="modal"
                                                         data-bs-target="#exampleModalll{{$perApp->id}}"
                                                         style="cursor: pointer">
                                                        <div class="d-flex ">
                                                            <div class="my-auto col-auto pe-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="33"
                                                                     fill="currentColor"
                                                                     class="bi bi-file-medical" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                                                    <path
                                                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                                                </svg>
                                                            </div>
                                                            <div class="name-divs col">
                                                                <div class="name fs-5 fw-bold" style="color: #535353;">
                                                                    {{$perApp->title}}
                                                                </div>
                                                                <div class="comment fw-600" style="color: #535353;">
                                                                    {{$perApp->date}} ({{$perApp->time}})
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="exampleModalll{{$perApp->id}}"
                                                         tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content"
                                                                 style="background: #f8f8f8; border-radius: 43px">
                                                                <div class="modal-header mx-3 pt-4"
                                                                     style="border-bottom: none !important;">
                                                                    <h4>Mitarbeiterbesprechungen</h4>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                            style="opacity: 1 !important;"></button>
                                                                </div>
                                                                <div class="modal-body p-3">
                                                                    <div class="row my-2">
                                                                        <div class="col-12">
                                                                            <div class=" fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                                Title: {{$perApp->title}}
                                                                                <br>
                                                                                Kommentar: {{$perApp->comment}}
                                                                                <br>
                                                                                Adress: {{$perApp->address}}
                                                                                <br>
                                                                                Datum: {{$perApp->date}}
                                                                                <br>
                                                                                Zeit: {{$perApp->time}}
                                                                                <br>
                                                                                Von: {{ucfirst(App\Models\Admins::find($perApp->assignfrom)->name)}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer"
                                                                     style="border-top: none !important; display: block;">
                                                                    <div class="row mx-4 pb-4">
                                                                        <div class=" mx-auto">
                                                                            <button type="button" class="btn w-100 px-3"
                                                                                    style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                                    data-bs-dismiss="modal"><b>Schliessen</b>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 ">
                            <div class="pending-divv m-2">
                                <div class="header justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 23.5 17.5">
                                                <g id="openedTasksSvg" transform="translate(-178.5 -76.5)">
                                                    <line id="Line_50" data-name="Line 50" x2="20"
                                                          transform="translate(179.5 77.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_51" data-name="Line 51" x2="20"
                                                          transform="translate(179.5 83.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_52" data-name="Line 52" x2="12"
                                                          transform="translate(179.5 89.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <g id="Group_1042" data-name="Group 1042">
                                                        <g id="Ellipse_390" data-name="Ellipse 390"
                                                           transform="translate(193 85)" fill="#fff" stroke="#000"
                                                           stroke-width="0.8">
                                                            <circle cx="4.5" cy="4.5" r="4.5" stroke="none"/>
                                                            <circle cx="4.5" cy="4.5" r="4.1" fill="none"/>
                                                        </g>
                                                        <path id="Path_1956" data-name="Path 1956"
                                                              d="M-1.219.859l1.578.484"
                                                              transform="translate(197.141 88.156)" fill="none"
                                                              stroke="#000" stroke-linecap="round" stroke-width="0.3"/>
                                                        <path id="Path_1955" data-name="Path 1955" d="M-.406,0h0V2.531"
                                                              transform="translate(197.906 86.969)" fill="none"
                                                              stroke="#000" stroke-linecap="round" stroke-width="0.3"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Pendenze / Zur Nachbearbeitung</span>
                                        </div>
                                    </div>
                                    <div class="h-100 fs-5 px-4 count">
                                        {{count($pending)}}
                                    </div>
                                </div>
                                <div class="content px-3">
                                    <div class="overflow-div pe-3">
                                        <table class="table table-22 table-borderless">
                                            <thead>
                                            <tr class="sticky-class"
                                                style="border-bottom: 1px solid #70707050 !important;">
                                                <th scope="col">Datum</th>
                                                <th scope="col">Kundename</th>
                                                <th scope="col">Titel</th>
                                                <th scope="col">Beschreibung</th>
                                                <th scope="col">Kategorie</th>

                                            </tr>
                                            </thead>
                                            <tbody id="body-table-edit">
                                            @if($pending->count() == 0)
                                                <div class="text-center fs-5 fw-600"
                                                     style="position: absolute; margin-top: 90px;color: #9F9F9F">
                                                    Keine Pendenzen
                                                </div>
                                            @else
                                                @foreach($pending as $task)
                                                    @php
                                                        $num = $task->family ? $task->family->id : 0;
                                                            $leadss = $num * 1244;
                                                            $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                            $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                            $pend_id = $task->id;
                                                    @endphp
                                                    <tr class="table-content" style="cursor: pointer">
                                                        <td scope="row"
                                                            @if($task->type != "Order") data-bs-target="#stats{{$task->id}}"
                                                            data-bs-toggle="modal" @endif>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->created_at)->format('Y-m-d')}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->id}}"
                                                            data-bs-toggle="modal" @endif>{{ucfirst($task->family ? $task->family->first_name : "")}}  {{ucfirst($task->family ? $task->family->last_name : "")}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->id}}"
                                                            data-bs-toggle="modal" @endif>{{$task->title}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->id}}"
                                                            data-bs-toggle="modal" @endif>{{$task->description}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->id}}"
                                                            data-bs-toggle="modal" @endif>
                                                            @if($task->type == "Task" || $task->type == "Aktualisiert")
                                                                @if($task->type == "Aktualisiert")<span
                                                                    class="submited-btn2 py-2 px-4">
                                                                        {{ucfirst($task->type)}}
                                                                    @else
                                                                        <span class="submited-btn1 py-2 px-4">
                                                                        {{ucfirst($task->type)}}
                                                                            @endif
                                                        </span>
                                                                        @elseif($task->type == 'Order')
                                                                            <span
                                                                                class="submited-btn py-2 px-4">Offer</span>
                                                                        @else
                                                                            <span class="submited-btn py-2 px-4">Eingereicht</span>
                                                                @endif
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="stats{{$task->id}}" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content"
                                                                 style="background: #f8f8f8; border-radius: 43px">
                                                                <div class="modal-header mx-3 pt-4"
                                                                     style="border-bottom: none !important;">
                                                                    <h4>Pendenzen Info</h4>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                            style="opacity: 1 !important;"></button>
                                                                </div>
                                                                <div class="modal-body p-3">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="text-center my-1 fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                                Datum:
                                                                                <br>
                                                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('Y-m-d')}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-center my-1 fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                                                                Time:
                                                                                <br>
                                                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $task->created_at)->format('H:i')}}

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row my-2">
                                                                        <div class="col-6">
                                                                            <div class="text-center my-1 fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                                Kundenname:
                                                                                <br>
                                                                                {{ucfirst($task->family ? $task->family->first_name : "")}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="text-center my-1 fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                                                                Titel
                                                                                <br>
                                                                                {{$task->title}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row my-2">
                                                                        <div class="col-12">
                                                                            <div class="text-center fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                                Beschreibung:
                                                                                <br>
                                                                                {{$task->description}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer text-center"
                                                                     style="border-top: none !important; display: block;">

                                                                    <button class="btn px-3"
                                                                            style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                            data-bs-dismiss="modal"><b>Close</b>
                                                                    </button>

                                                                    <a onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $task->id])}}'">

                                                                        <button class="btn px-3"

                                                                                style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                                data-bs-dismiss="modal"><b>Offen</b>
                                                                        </button>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-start py-1"
                                         style="background-color: transparent;">
                                        <div class="prev-nxt-btn d-flex">
                                            <a href="{{route('tasks',['pendingP' => $pending->currentPage() - 1])}}">
                                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-chevron-left"
                                                         viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            @if($pending->count() > 0)
                                                <a href="{{route('tasks',['pendingP' => $pending->currentPage() +1])}}">
                                                    <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-chevron-right"
                                                             viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(auth()->user()->hasRole('fs'))
                    <div class="row g-0">
                        <div class="col-12 col-md-8 col-lg-8 h-auto">
                            <div class="pending-divv mx-2 h-auto">
                                <div class="header justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 23.5 17.5">
                                                <g id="openedTasksSvg" transform="translate(-178.5 -76.5)">
                                                    <line id="Line_50" data-name="Line 50" x2="20"
                                                          transform="translate(179.5 77.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_51" data-name="Line 51" x2="20"
                                                          transform="translate(179.5 83.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_52" data-name="Line 52" x2="12"
                                                          transform="translate(179.5 89.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <g id="Group_1042" data-name="Group 1042">
                                                        <g id="Ellipse_390" data-name="Ellipse 390"
                                                           transform="translate(193 85)" fill="#fff" stroke="#000"
                                                           stroke-width="0.8">
                                                            <circle cx="4.5" cy="4.5" r="4.5" stroke="none"/>
                                                            <circle cx="4.5" cy="4.5" r="4.1" fill="none"/>
                                                        </g>
                                                        <path id="Path_1956" data-name="Path 1956"
                                                              d="M-1.219.859l1.578.484"
                                                              transform="translate(197.141 88.156)" fill="none"
                                                              stroke="#000" stroke-linecap="round" stroke-width="0.3"/>
                                                        <path id="Path_1955" data-name="Path 1955" d="M-.406,0h0V2.531"
                                                              transform="translate(197.906 86.969)" fill="none"
                                                              stroke="#000" stroke-linecap="round" stroke-width="0.3"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Pendenze / Zur Nachbearbeitung</span>
                                        </div>
                                    </div>
                                    <div class="h-100 fs-5 px-4 count">
                                        {{count($pending)}}
                                    </div>
                                </div>
                                <div class="content px-3 h-100">
                                    <div class="overflow-div pe-3">
                                        <table class="table table-22 table-borderless">
                                            <thead>
                                            <tr class="sticky-class"
                                                style="border-bottom: 1px solid #70707050 !important;">
                                                <th scope="col">Datum</th>
                                                <th scope="col">Kundename</th>
                                                <th scope="col">Titel</th>
                                                <th scope="col">Beschreibung</th>
                                                <th scope="col">Kategorie</th>

                                            </tr>
                                            </thead>
                                            <tbody id="body-table-edit">
                                            @if($pending->count() == 0)
                                                <div class="text-center fs-5 fw-600"
                                                     style="position: absolute; margin-top: 90px;color: #9F9F9F">
                                                    Keine Pendenzen
                                                </div>
                                            @else
                                                @foreach($pending as $task)
                                                    @php
                                                        $leadss = $task->id * 1244;
                                                        $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                        $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                                        $pend_id = $task->pid;
                                                    @endphp

                                                    <tr class="table-content" style="cursor: pointer">
                                                        <td scope="row"
                                                            @if($task->type != "Order") data-bs-target="#stats{{$task->pid}}"
                                                            data-bs-toggle="modal" @endif>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->created_at)->format('Y-m-d')}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->pid}}"
                                                            data-bs-toggle="modal" @endif>{{ucfirst($task->first_name)}} {{ucfirst($task->last_name)}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->pid}}"
                                                            data-bs-toggle="modal" @endif>{{$task->title}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->pid}}"
                                                            data-bs-toggle="modal" @endif>{{$task->description}}</td>
                                                        <td @if($task->type != "Order") data-bs-target="#stats{{$task->pid}}"
                                                            data-bs-toggle="modal" @endif>
                                                            @if($task->type == "Task" || $task->type == "Aktualisiert")
                                                                @if($task->type == "Aktualisiert")<span
                                                                    class="submited-btn2 py-2 px-4">
                                                            {{ucfirst($task->type)}}
                                                                    @else
                                                                        <span class="submited-btn1 py-2 px-4">
                                                            {{ucfirst($task->type)}}
                                                                            @endif
                                                            </span>
                                                                        @elseif($task->type == 'Order')
                                                                            <span
                                                                                class="submited-btn py-2 px-4">Offer</span>
                                                                        @else
                                                                            <span class="submited-btn py-2 px-4">Eingereicht</span>
                                                                @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-start py-1"
                                         style="background-color: transparent;">
                                        <div class="prev-nxt-btn d-flex">
                                            <a href="{{route('tasks',['pendingP' => $pending->currentPage() - 1])}}">
                                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-chevron-left"
                                                         viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            @if($pending->count() > 0)
                                                <a href="{{route('tasks',['pendingP' => $pending->currentPage() +1])}}">
                                                    <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-chevron-right"
                                                             viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="birthday-div mx-2">
                                <div class="header  justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37" fill="currentColor"
                                                 class="bi bi-calendar" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            </svg>

                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Geburstage/Jubiläen</span>
                                        </div>
                                    </div>

                                    <div class="count fs-5 h-100 px-4">
                                        {{count($birthdays)}}
                                    </div>
                                </div>
                                <div class="content px-3 py-2 h-100">
                                    <div class="overflow-div pe-3">
                                        @if(count($birthdays) == 0)
                                            <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                                Keine geburtstage für heute
                                                <hr>
                                            </div>
                                        @else
                                            @foreach($birthdays as $birth)
                                                <div class="p-2 my-2 birthday-itemm bg-white d-flex">
                                                    <div class="my-auto px-2">
                                                    <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40"
                                                         viewBox="0 0 21 17.837">
                                                <g id="anniversay" transform="translate(-277 -71.163)">
                                                    <g id="Rectangle_904" data-name="Rectangle 904"
                                                       transform="translate(277 78)" fill="#fff" stroke="#000"
                                                       stroke-width="1">
                                                        <rect width="21" height="11" rx="2" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="20" height="10" rx="1.5"
                                                              fill="none"/>
                                                    </g>
                                                    <g id="Group_1047" data-name="Group 1047"
                                                       transform="translate(279.578 71.5)">
                                                        <g id="Group_1044" data-name="Group 1044"
                                                           transform="translate(1)">
                                                            <path id="Path_1959" data-name="Path 1959"
                                                                  d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                                  transform="translate(0.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                            <path id="Path_1960" data-name="Path 1960"
                                                                  d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                                  transform="translate(1.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                        </g>
                                                        <g id="Group_1045" data-name="Group 1045"
                                                           transform="translate(13)">
                                                            <path id="Path_1959-2" data-name="Path 1959"
                                                                  d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                                  transform="translate(0.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                            <path id="Path_1960-2" data-name="Path 1960"
                                                                  d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                                  transform="translate(1.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                        </g>
                                                        <g id="Group_1046" data-name="Group 1046"
                                                           transform="translate(7)">
                                                            <path id="Path_1959-3" data-name="Path 1959"
                                                                  d="M0,0H0L-.531,1.063l-.391.859L0,3"
                                                                  transform="translate(0.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                            <path id="Path_1960-3" data-name="Path 1960"
                                                                  d="M-.922,0h0l.563,1.078.391.844L-.922,3"
                                                                  transform="translate(1.922)" fill="none" stroke="#000"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="0.5"/>
                                                        </g>
                                                    </g>
                                                    <g id="Rectangle_906" data-name="Rectangle 906"
                                                       transform="translate(280 75)" fill="#fff" stroke="#000"
                                                       stroke-linejoin="round" stroke-width="1">
                                                        <rect width="3" height="4" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                    </g>
                                                    <g id="Rectangle_912" data-name="Rectangle 912"
                                                       transform="translate(286 75)" fill="#fff" stroke="#000"
                                                       stroke-linejoin="round" stroke-width="1">
                                                        <rect width="3" height="4" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                    </g>
                                                    <g id="Rectangle_913" data-name="Rectangle 913"
                                                       transform="translate(292 75)" fill="#fff" stroke="#000"
                                                       stroke-linejoin="round" stroke-width="1">
                                                        <rect width="3" height="4" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="2" height="3" fill="none"/>
                                                    </g>
                                                    <line id="Line_53" data-name="Line 53" x2="17.5"
                                                          transform="translate(278.75 83.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="1"/>
                                                    <g id="Rectangle_909" data-name="Rectangle 909"
                                                       transform="translate(279 78)" fill="#000" stroke="#000"
                                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                        <rect width="5" height="3" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                    </g>
                                                    <g id="Rectangle_910" data-name="Rectangle 910"
                                                       transform="translate(291 78)" fill="#000" stroke="#000"
                                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                        <rect width="5" height="3" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                    </g>
                                                    <g id="Rectangle_911" data-name="Rectangle 911"
                                                       transform="translate(285 78)" fill="#000" stroke="#000"
                                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                        <rect width="5" height="3" stroke="none"/>
                                                        <rect x="0.5" y="0.5" width="4" height="2" fill="none"/>
                                                    </g>
                                                </g>
                                            </svg>

                                                    </span>
                                                    </div>
                                                    <div class="">
                                                        <div
                                                            class="fs-5 fw-600">{{$birth['name']}} {{$birth['lname']}}</div>
                                                        <div class="">{{$birth['birthday']}} ({{$birth['age']}}yahre)
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('fs'))
                                            @if(count($consultation) == 0)
                                                <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                                    Keine Mitarbeiterbesprechungen für heute
                                                    <hr>
                                                </div>
                                            @else
                                                @foreach($consultation as $perApp)
                                                    <div class="offene-item-one22 py-2 px-3 my-2" data-bs-toggle="modal"
                                                         data-bs-target="#exampleModalll{{$perApp->id}}"
                                                         style="cursor: pointer">
                                                        <div class="d-flex ">
                                                            <div class="my-auto col-auto pe-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="33"
                                                                     fill="currentColor"
                                                                     class="bi bi-file-medical" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                                                    <path
                                                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                                                </svg>
                                                            </div>
                                                            <div class="name-divs col">
                                                                <div class="name fs-5 fw-bold" style="color: #535353;">
                                                                    {{$perApp->title}}
                                                                </div>
                                                                <div class="comment fw-600" style="color: #535353;">
                                                                    {{$perApp->date}} ({{$perApp->time}})
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="exampleModalll{{$perApp->id}}"
                                                         tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content"
                                                                 style="background: #f8f8f8; border-radius: 43px">
                                                                <div class="modal-header mx-3 pt-4"
                                                                     style="border-bottom: none !important;">
                                                                    <h4>Mitarbeiterbesprechungen</h4>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                            style="opacity: 1 !important;"></button>
                                                                </div>
                                                                <div class="modal-body p-3">
                                                                    <div class="row my-2">
                                                                        <div class="col-12">
                                                                            <div class=" fw-bold"
                                                                                 style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                                                                Title: {{$perApp->title}}
                                                                                <br>
                                                                                Kommentar: {{$perApp->comment}}
                                                                                <br>
                                                                                Adress: {{$perApp->address}}
                                                                                <br>
                                                                                Datum: {{$perApp->date}}
                                                                                <br>
                                                                                Zeit: {{$perApp->time}}
                                                                                <br>
                                                                                Von: {{ucfirst(App\Models\Admins::find($perApp->assignfrom)->name)}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer"
                                                                     style="border-top: none !important; display: block;">
                                                                    <div class="row mx-4 pb-4">
                                                                        <div class=" mx-auto">
                                                                            <button type="button" class="btn w-100 px-3"
                                                                                    style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                                                                    data-bs-dismiss="modal"><b>Schliessen</b>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
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
                {{--                <div class="col-12 col-md-6">--}}
                {{--                    <div class="offene-div my-3 mx-3">--}}
                {{--                        <div class="d-flex justify-content-between">--}}
                {{--                            <span class="fw-600 fs-5">nnnnnn</span>--}}
                {{--                            <span onclick="secondDivToggleFunct()" class="fw-600 px-4 pb-1 pt-1 fs-5 number-offene"--}}
                {{--                                  style="background-color: #F7F7F7; color: #FF4000;">{{$familyMemberCount}}</span>--}}
                {{--                        </div>--}}
                {{--                        <div id="firstDivToggle" class="py-5 sjfg" onclick="firstDivToggleFunct()">--}}
                {{--                            <div class="text-center">--}}
                {{--                            <span class="fs-4 fw-bold" style="color: #BCC1CD;">--}}
                {{--                                Drücken um--}}
                {{--                                aufzuklappen--}}
                {{--                            </span>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div id="secondDivToggle" class="wrapper p-2" style="display: none;">--}}
                {{--                            <div class="overflow-divv1">--}}
                {{--                                @if(count($tasks) == 0)--}}
                {{--                                    <div class="text-center fs-5 fw-600" style="color: #9F9F9F">--}}
                {{--                                        Keine Offene Aufgaben--}}
                {{--                                    </div>--}}
                {{--                                @else--}}
                {{--                                    @php--}}
                {{--                                        $admin_id = $leadsss;--}}
                {{--                                        $count = 1;--}}
                {{--                                    @endphp--}}
                {{--                                    @foreach($tasks as $taskk)--}}
                {{--                                        @foreach($taskk->family as $task)--}}
                {{--                                            @php--}}
                {{--                                                $leadss = $task->id * 1244;--}}
                {{--                                                $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);--}}
                {{--                                            @endphp--}}
                {{--                                            @if($count %2 == 0)--}}
                {{--                                                <a href="{{route('leadfamilyperson',[$taskId,$admin_id])}}">--}}
                {{--                                                    <div class="offene-item-one py-2 px-3 m-2"--}}
                {{--                                                         style="background-color: #ececec">--}}

                {{--                                                        <div class="d-flex justify-content-between">--}}
                {{--                                                            <div class="name-divs">--}}
                {{--                                                                <div class="name fs-5 fw-bold" style="color: #535353;">--}}
                {{--                                                                    {{ucfirst($task->first_name)}} {{ucfirst($task->last_name)}}--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="status fw-bold" style="color: #535353;">--}}
                {{--                                                                    Status: {{ucfirst($task->status)}}--}}
                {{--                                                                </div>--}}
                {{--                                                            </div>--}}
                {{--                                                            <div class="svg-divv">--}}
                {{--                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.253"--}}
                {{--                                                                     height="15.484"--}}
                {{--                                                                     viewBox="0 0 6.253 15.484">--}}
                {{--                                                                    <g id="Group_1178" data-name="Group 1178"--}}
                {{--                                                                       transform="translate(-1054.727 -165.697)">--}}
                {{--                                                                        <ellipse id="Ellipse_6" data-name="Ellipse 6"--}}
                {{--                                                                                 cx="3.127" cy="2.978"--}}
                {{--                                                                                 rx="3.127" ry="2.978"--}}
                {{--                                                                                 transform="translate(1054.727 165.697)"--}}
                {{--                                                                                 fill="#535353"/>--}}
                {{--                                                                        <ellipse id="Ellipse_7" data-name="Ellipse 7"--}}
                {{--                                                                                 cx="3.127" cy="2.978"--}}
                {{--                                                                                 rx="3.127" ry="2.978"--}}
                {{--                                                                                 transform="translate(1054.727 175.225)"--}}
                {{--                                                                                 fill="#535353"/>--}}
                {{--                                                                    </g>--}}
                {{--                                                                </svg>--}}

                {{--                                                            </div>--}}
                {{--                                                        </div>--}}

                {{--                                                    </div>--}}
                {{--                                                </a>--}}
                {{--                                            @else--}}
                {{--                                                <a href="{{route('leadfamilyperson',[$taskId,$admin_id])}}">--}}
                {{--                                                    <div class="offene-item-one py-2 px-3 m-2">--}}

                {{--                                                        <div class="d-flex justify-content-between">--}}
                {{--                                                            <div class="name-divs">--}}
                {{--                                                                <div class="name fs-5 fw-bold" style="color: #535353;">--}}
                {{--                                                                    {{ucfirst($task->first_name)}} {{ucfirst($task->last_name)}}--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="status fw-bold" style="color: #535353;">--}}
                {{--                                                                    Status: {{ucfirst($task->status)}}--}}
                {{--                                                                </div>--}}
                {{--                                                            </div>--}}
                {{--                                                            <div class="svg-divv">--}}
                {{--                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.253"--}}
                {{--                                                                     height="15.484"--}}
                {{--                                                                     viewBox="0 0 6.253 15.484">--}}
                {{--                                                                    <g id="Group_1178" data-name="Group 1178"--}}
                {{--                                                                       transform="translate(-1054.727 -165.697)">--}}
                {{--                                                                        <ellipse id="Ellipse_6" data-name="Ellipse 6"--}}
                {{--                                                                                 cx="3.127" cy="2.978"--}}
                {{--                                                                                 rx="3.127" ry="2.978"--}}
                {{--                                                                                 transform="translate(1054.727 165.697)"--}}
                {{--                                                                                 fill="#535353"/>--}}
                {{--                                                                        <ellipse id="Ellipse_7" data-name="Ellipse 7"--}}
                {{--                                                                                 cx="3.127" cy="2.978"--}}
                {{--                                                                                 rx="3.127" ry="2.978"--}}
                {{--                                                                                 transform="translate(1054.727 175.225)"--}}
                {{--                                                                                 fill="#535353"/>--}}
                {{--                                                                    </g>--}}
                {{--                                                                </svg>--}}

                {{--                                                            </div>--}}
                {{--                                                        </div>--}}

                {{--                                                    </div>--}}
                {{--                                                </a>--}}
                {{--                                            @endif--}}
                {{--                                        @endforeach--}}
                {{--                                        @php--}}
                {{--                                            $count++;--}}
                {{--                                        @endphp--}}
                {{--                                    @endforeach--}}
                {{--                                @endif--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="col-12 col-md-12">
                    <div class="pendzen-div  my-3 mx-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-600 fs-5">Aufgaben öffnen</span>
                            <span onclick="secondDivToggleFunct44()" class="fw-600 px-4 pb-1 pt-1 fs-5 number-offene"
                                  style="background-color: #F7F7F7; color: #FF4000;">{{count($opened)}}</span>
                        </div>
                        <div id="firstDivToggle44" class="py-5 sjfg2" onclick="firstDivToggleFunct44()">
                            <div class="text-center">
                            <span class="fs-4 fw-bold" style="color: #BCC1CD;">
                                Drücken um
                                aufzuklappen
                            </span>
                            </div>
                        </div>
                        <div id="secondDivToggle44" class="wrapper3 p-2" style="display: none;">
                            <div class="overflow-divv2">
                                @if(count($opened) == 0)
                                    <div class="text-center fs-5 fw-600" style="color: #9F9F9F">
                                        Keine Aufgaben öffnen
                                    </div>
                                @else
                                    @foreach($opened as $task)
                                        @php
                                            $leadss = $task->family_id * 1244;
                                            $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                            $pend_id = $task->id;
                                        @endphp
                                        <div class="answered-items ms-3 ms-sm-2 ms-md-4 me-2 me-sm-3 my-3">

                                            @php
                                                $leadss = $task->admin_id * 1244;
                                                $taskAdminId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);

                                                $authUserId= $leadsss;
                                                $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($task->admin_id * 1244);
                                            @endphp
                                            <a data-bs-toggle="collapse" id="demo23_2{{$authUserId}}"
                                               style="text-decoration:none;">
                                                <div class="px-2 py-2">
                                                    <div class="m-1 d-flex justify-content-between"
                                                         style="text-overflow: ellipsis; overflow:hidden;">
                                                        <div
                                                            class="fw-bold">{{ucfirst($task->family->first_name )}} {{ucfirst( $task->family->last_name)}} </div>
                                                        <div class="col-auto">
                                                                    <span style="cursor:pointer;"
                                                                          onclick="window.location.href='{{route('chat',[$taskAdminId,$leadsss])}}'">
                                                                        <span class="px-2" style="font-size: 19px;">
                                                                            <i class="bi bi-chat justify-content-end"></i>
                                                                        </span>
                                                                    </span>
                                                            <span id="demo23span_2{{$authUserId}}"
                                                                  class="bi bi-chevron-down"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div id="demo_2{{$authUserId}}" class="collapse px-3 py-2">
                                                <h6 class="m-1"><b>Klientin: {{ucfirst($task->family->first_name)}}</b>
                                                </h6>
                                                <h6 class="m-1"><b>Berater:</b> {{ucfirst($task->adminpend->name)}}
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
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="desktop-tasks">
            <div class="container-fluid">
                <div class="row g-0 mx-3">
                    @if(Auth::user()->hasRole('backoffice'))
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="open-tasks m-2">
                                <div class="header  justify-content-between">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 23.5 17.5">
                                                <g id="pendingTasksSvg" transform="translate(-178.5 -76.5)">
                                                    <line id="Line_50" data-name="Line 50" x2="20"
                                                          transform="translate(179.5 77.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_51" data-name="Line 51" x2="20"
                                                          transform="translate(179.5 83.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <line id="Line_52" data-name="Line 52" x2="12"
                                                          transform="translate(179.5 89.5)" fill="none" stroke="#000"
                                                          stroke-linecap="round" stroke-width="2"/>
                                                    <g id="Group_1042" data-name="Group 1042">
                                                        <g id="Ellipse_390" data-name="Ellipse 390"
                                                           transform="translate(193 85)" fill="#fff" stroke="#000"
                                                           stroke-width="0.8">
                                                            <circle cx="4.5" cy="4.5" r="4.5" stroke="none"/>
                                                            <circle cx="4.5" cy="4.5" r="4.1" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_391" data-name="Ellipse 391"
                                                           transform="translate(195 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_392" data-name="Ellipse 392"
                                                           transform="translate(197 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                        <g id="Ellipse_393" data-name="Ellipse 393"
                                                           transform="translate(199 89)" fill="#000" stroke="#000"
                                                           stroke-width="1">
                                                            <circle cx="0.5" cy="0.5" r="0.5" stroke="none"/>
                                                            <circle cx="0.5" cy="0.5" fill="none"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>


                                        </div>
                                        <div class="txt-01">
                                            <span class="ps-2">Pendenzübersicht</span>
                                        </div>
                                    </div>

                                    <div class="h-100 count fs-5 px-4">
                                        {{$familyMemberCount}}
                                    </div>
                                </div>
                                <div class="content px-3">
                                    <div class="overflow-div pe-3">
                                        <table class="table table-borderless table-1">
                                            <thead>
                                            <tr class="sticky-class">
                                                <th scope="col">Datum</th>
                                                <th scope="col">Vorname</th>
                                                <th scope="col">Nachname</th>
                                            </tr>
                                            </thead>
                                            <tbody id="body-table-edit">
                                            @if(count($tasks) == 0)
                                                <div class="fs-5 fw-600"
                                                     style="position: absolute; margin-top: 70px; color: #9F9F9F">
                                                    Keine Pendenzübersicht
                                                </div>
                                            @else
                                                @php
                                                    $admin_id = Crypt::encrypt($leadsss);
                                                    $count = 1;
                                                @endphp
                                                @foreach($tasks as $task)
                                                    @foreach($task->family as $family)
                                                        @php
                                                            $leadss = $family->id * 1244;
                                                            $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                            $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($family->admin_id * 1244);
                                                            $pend_id = $family->pendency->id;
                                                        @endphp
                                                        {{--                                                    @if($count %2 == 0)--}}
                                                        <tr class="table-content1"
                                                            style="cursor: pointer;border-left: 3px solid !important;border-right: 2px solid;border-top: none;border-bottom: none; border-color: #afafaf">
                                                            <td scope="row"
                                                                onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ Carbon\Carbon::parse($family->created_at)->format('Y-m-d') }}</td>
                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ucfirst($family->first_name)}}</td>
                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,'admin_id' => $admin_id,'pend_id' => $pend_id])}}'">{{ucfirst($family->last_name)}}</td>
                                                        </tr>
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <tr class="table-content1 " style="cursor: pointer; background-color: #ffffff" >--}}
                                                        {{--                                                            <td scope="row"--}}
                                                        {{--                                                                onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ Carbon\Carbon::parse($family->created_at)->format('Y-m-d') }}</td>--}}
                                                        {{--                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ucfirst($family->first_name)}}</td>--}}
                                                        {{--                                                            <td onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">{{ucfirst($family->last_name)}}</td>--}}
                                                        {{--                                                        </tr>--}}
                                                        {{--                                                    @endif--}}
                                                    @endforeach
                                                    <tr class=""
                                                        style="border-bottom: 2px solid; border-color: #afafaf;">

                                                    </tr>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end py-1" style="background-color: transparent;">
                                        <div class="prev-nxt-btn d-flex">
                                            <a href="{{route('tasks',['taskk' => $tasks->currentPage() - 1])}}">
                                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            @if($tasks->count() > 0)
                                                <a href="{{route('tasks',['taskk' => $tasks->currentPage() + 1])}}">
                                                    <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            @else
                                                <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 col-xl-6 pe-0 pe-xl-1 py-1">
                        <div class="secondGreyBorderDash p-3 p-md-4">

                            <div class="pb-3">
                                <span class="fs-4 secondGreyBorderDashSpan">Eingerichte Kunden</span>
                            </div>
                            <div class="overFlowDivDashboard">
                                <div class="row g-0">
                                    <div class="col-3">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-auto pe-2 my-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"  height="22" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                </svg>
                                            </div>
                                            <div class="col-auto">
                                                <span class="anfragenTitleSpans">Datum</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-auto my-auto pe-2">
                                                <svg width="22" height="22" viewBox="0 0 25 18" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M17 7.75C18.8675 7.75 20.3638 6.075 20.3638 4C20.3638 1.925 18.8675 0.25 17 0.25C15.1325 0.25 13.625 1.925 13.625 4C13.625 6.075 15.1325 7.75 17 7.75ZM8 7.75C9.8675 7.75 11.3637 6.075 11.3637 4C11.3637 1.925 9.8675 0.25 8 0.25C6.1325 0.25 4.625 1.925 4.625 4C4.625 6.075 6.1325 7.75 8 7.75ZM8 10.25C5.37875 10.25 0.125 11.7125 0.125 14.625V16.5C0.125 17.1875 0.63125 17.75 1.25 17.75H14.75C15.3687 17.75 15.875 17.1875 15.875 16.5V14.625C15.875 11.7125 10.6213 10.25 8 10.25ZM17 10.25C16.6737 10.25 16.3025 10.275 15.9087 10.3125C15.9312 10.325 15.9425 10.35 15.9537 10.3625C17.2362 11.4 18.125 12.7875 18.125 14.625V16.5C18.125 16.9375 18.0462 17.3625 17.9225 17.75H23.75C24.3687 17.75 24.875 17.1875 24.875 16.5V14.625C24.875 11.7125 19.6213 10.25 17 10.25Z"
                                                          fill="#1D1D1D" />
                                                </svg>
                                            </div>
                                            <div class="col-auto">
                                                <span class="anfragenTitleSpans">Vorname</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-auto pe-2 my-auto">
                                                <svg width="22" height="22" viewBox="0 0 25 18" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M17 7.75C18.8675 7.75 20.3638 6.075 20.3638 4C20.3638 1.925 18.8675 0.25 17 0.25C15.1325 0.25 13.625 1.925 13.625 4C13.625 6.075 15.1325 7.75 17 7.75ZM8 7.75C9.8675 7.75 11.3637 6.075 11.3637 4C11.3637 1.925 9.8675 0.25 8 0.25C6.1325 0.25 4.625 1.925 4.625 4C4.625 6.075 6.1325 7.75 8 7.75ZM8 10.25C5.37875 10.25 0.125 11.7125 0.125 14.625V16.5C0.125 17.1875 0.63125 17.75 1.25 17.75H14.75C15.3687 17.75 15.875 17.1875 15.875 16.5V14.625C15.875 11.7125 10.6213 10.25 8 10.25ZM17 10.25C16.6737 10.25 16.3025 10.275 15.9087 10.3125C15.9312 10.325 15.9425 10.35 15.9537 10.3625C17.2362 11.4 18.125 12.7875 18.125 14.625V16.5C18.125 16.9375 18.0462 17.3625 17.9225 17.75H23.75C24.3687 17.75 24.875 17.1875 24.875 16.5V14.625C24.875 11.7125 19.6213 10.25 17 10.25Z"
                                                          fill="#1D1D1D" />
                                                </svg>
                                            </div>
                                            <div class="col-auto">
                                                <span class="anfragenTitleSpans">Nachname</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-auto pe-2 my-auto">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.84832 14.0608L9.59199 19.188L10.4692 16.1446L10.0395 15.6738C9.8462 15.3909 9.80324 15.1439 9.91065 14.9308C10.1434 14.4707 10.6249 14.5567 11.0743 14.5567C11.5451 14.5567 12.1287 14.4672 12.2755 15.0579C12.3257 15.2549 12.263 15.4625 12.1252 15.6738L11.6955 16.1446L12.5727 19.188L14.1517 14.0608C15.2903 15.0848 18.6612 15.2907 19.9162 15.9906C20.3136 16.2126 20.6717 16.4937 20.9599 16.8732C21.3967 17.4515 21.6652 18.2051 21.7386 19.1629L22 20.8332C21.9356 21.5099 21.5524 21.9002 20.7952 21.9592H11.0815H1.20482C0.447555 21.9019 0.0644479 21.5117 0 20.8332L0.261372 19.1629C0.334771 18.2051 0.603304 17.4515 1.04012 16.8732C1.32834 16.4919 1.68639 16.2108 2.08381 15.9906C3.33876 15.2907 6.70974 15.0848 7.84832 14.0608ZM7.05883 6.72268C6.84222 6.73163 6.67931 6.77639 6.56831 6.85157C6.50387 6.89454 6.45732 6.95004 6.42689 7.01448C6.39287 7.08609 6.37855 7.17381 6.38034 7.27586C6.38929 7.57303 6.54504 7.95972 6.84401 8.40548L6.84759 8.41265L7.82147 9.96298C8.21173 10.5842 8.62169 11.2179 9.13012 11.6834C9.61885 12.1309 10.2132 12.4335 10.9991 12.4353C11.8495 12.4371 12.4725 12.122 12.9755 11.6494C13.5 11.1571 13.9154 10.4839 14.3235 9.81081L15.4209 8.00269C15.625 7.53544 15.7002 7.22394 15.6537 7.03955C15.625 6.93034 15.5051 6.87664 15.301 6.86769C15.258 6.8659 15.2133 6.8659 15.1667 6.8659C15.1184 6.86769 15.0665 6.87127 15.0128 6.87485C14.9841 6.87664 14.9555 6.87485 14.9286 6.86948C14.8302 6.87485 14.7299 6.86769 14.6279 6.85336L15.0038 5.19025C12.997 5.16519 11.6239 4.8161 10.0002 3.77777C9.46668 3.43763 9.30556 3.04736 8.77207 3.08495C8.36927 3.16193 8.03092 3.34274 7.7606 3.63276C7.50281 3.91024 7.30767 4.28977 7.18057 4.77492L7.3936 6.73521C7.27545 6.74237 7.16267 6.73879 7.05883 6.72268ZM15.6769 6.37359C15.9473 6.45594 16.1209 6.6278 16.1907 6.90528C16.2695 7.2132 16.1836 7.64464 15.924 8.23541C15.9186 8.24615 15.9133 8.2569 15.9079 8.26764L14.798 10.0972C14.3701 10.8026 13.9351 11.5079 13.355 12.0522C12.7553 12.6143 12.0142 12.9884 11.0027 12.9867C10.0575 12.9849 9.34673 12.6232 8.76312 12.0898C8.1992 11.5742 7.76776 10.9082 7.3578 10.2566L6.38392 8.70803C6.02767 8.17634 5.84327 7.69119 5.83074 7.29197C5.82537 7.104 5.8576 6.93392 5.92562 6.78534C5.99902 6.6278 6.11002 6.49711 6.2604 6.39686C6.33021 6.35031 6.40898 6.30914 6.4967 6.27691C6.43405 5.4373 6.40898 4.37749 6.45016 3.49133C6.47164 3.28188 6.51103 3.07063 6.5701 2.85939C6.81894 1.96965 7.44373 1.25356 8.2171 0.76125C8.48922 0.587598 8.78818 0.444381 9.10326 0.329807C10.974 -0.350476 13.4553 0.0200989 14.7836 1.45585C15.3243 2.04126 15.6644 2.81821 15.7378 3.84401L15.6769 6.37359Z"
                                                          fill="black" />
                                                </svg>
                                            </div>
                                            <div class="col-auto">
                                                <span class="anfragenTitleSpans">Berater</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(count($tasks) == 0)
                                    <div class="fs-5 fw-600"
                                         style="position: absolute; margin-top: 70px; color: #9F9F9F">
                                        Keine Pendenzübersicht
                                    </div>
                                @else
                                    @php
                                        $admin_id = Crypt::encrypt($leadsss);
                                        $count = 1;
                                    @endphp
                                    @foreach($tasks as $task)
                                        <div class="thirdBorderDivDash py-1 my-2 px-1">
                                            @foreach($task->family as $family)

                                                @php
                                                    $leadss = $family->id * 1244;
                                                    $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                                @endphp
                                                <a style="text-decoration: none;color: black"
                                                   href="{{route('leadfamilyperson',[$taskId,$admin_id])}}'">
                                                    <div class="thirdBorderDivDash py-2 my-2" style="border:1px solid #DCE4F9; background-color: #d4d9f3">
                                                        <div class="row g-0 text-center">
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-5">{{ Carbon\Carbon::parse($family->created_at)->format('Y-m-d') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-5">{{ucfirst($family->first_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-5">{{ucfirst($family->last_name)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div onclick="window.location.href='{{route('leadfamilyperson',[$taskId,$admin_id])}}'">
                                                                    <span class="anfragenFieldsSpan fs-5">{{ucfirst($family->lead->admin->name)}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                @endif
                            </div>
                            <div class="pt-2">
                                <div class="row g-0 justify-content-end">
                                    <div class="col-auto me-2">
                                        <svg width="35" height="35" viewBox="0 0 36 36" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="18" fill="#5288F5" />
                                            <path d="M20 25L14 18.5L20 12" stroke="white" stroke-width="4"
                                                  stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </div>
                                    <div class="col-auto">
                                        <svg width="35" height="35" viewBox="0 0 36 36" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="18" fill="#5288F5" />
                                            <path d="M16 12L22 18.5L16 25" stroke="white" stroke-width="4"
                                                  stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</script>
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

    .form-control {
        border-color: #ced4da !important;
        box-shadow: none !important;
    }

    .number-offene {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .sjfg {
        background-color: #F7F7F7;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .sjfg1 {
        background-color: #FF400010;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .sjfg2 {
        background-color: #f7f7f7;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .offene-item-one {
        background-color: #fff;
        border-radius: 10px;
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
        background-color: #F7F7F7;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .wrapper1 {
        height: auto;
        max-height: 400px;
        /* height: 400px; */
        background-color: #FF400010;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .wrapper2 {
        height: auto;
        max-height: 400px;
        background-color: #fff;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .wrapper3 {
        height: auto;
        max-height: 400px;
        background-color: #F7F7F7;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .offene-item-one22 {
        background-color: #ffffff;
        border-radius: 10px;
    }

    .overflow-divv1::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    /* Track */
    .overflow-divv1::-webkit-scrollbar-track {
        background: #ffffff !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-divv1::-webkit-scrollbar-thumb {
        background: #5b6466;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-divv1::-webkit-scrollbar-thumb:hover {
        background: #5b6466;
        border-radius: 10px;
    }

    .overflow-divv2::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    /* Track */
    .overflow-divv2::-webkit-scrollbar-track {
        background: #ffffff !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-divv2::-webkit-scrollbar-thumb {
        background: #FF4000;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-divv2::-webkit-scrollbar-thumb:hover {
        background: #FF4000;
        border-radius: 10px;
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
        background-color: #fff;
        border-radius: 8px;
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
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

</style>
