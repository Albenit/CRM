
@extends('template.navbar')
@section('content')

    @php $admini = Auth::user(); @endphp
    <head>
        <title>
            Kalender
        </title>
    </head>
    <style>

        body {
            margin-top: 40px;
            font-size: 14px;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }



        #external-events {

        }


        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        #external-events .fc-event {
            margin: 10px 0;
            cursor: pointer;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        #calendar {
            float: left;
            width: 90%;
            text-color : black ;
        }


    </style>




    <link href='lib_cal/main.css' rel='stylesheet' />
    <script src='lib_cal/main.js'></script>
    <script src='lib_cal/moment.min.js'></script>
    <script src='lib_cal/moment.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @if($admini->hasRole('admin') || $admini->hasRole('salesmanager'))

        <script>

            document.addEventListener('DOMContentLoaded', function() {

                /* initialize the external events
                -----------------------------------------------------------------*/

                var containerEl = document.getElementById('external-events');


                new FullCalendar.Draggable(containerEl, {
                    itemSelector: '.fc-event',
                    eventData: function(eventEl) {
                        return {
                            title: eventEl.innerText.trim(),
                        }
                    }
                });

                /* initialize the calendar
                -----------------------------------------------------------------*/

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {

                    now: "{!! $date_in->format('Y-m-d') !!}",
                    editable: false, // enable draggable events
                    droppable: true, // this allows things to be dropped onto the calendar
                    aspectRatio: 1.8,

                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth'
                    },
                    views: {
                        timeGridWeek: {
                            eventMaxStack: 3
                        },
                    },
                    slotMinTime: "08:00:00",
                    slotMaxTime: "20:30:00",
                    height: 800,
                    initialView: 'dayGridMonth',


                    allDaySlot: false,
                    eventMaxStack: 2,
                    dayMaxEvents: 4,


                    resources: [

                    ],
                    events: [
                            @foreach ( $absences as $appointmentAGG )
                        {
                            id: '{!! $appointmentAGG["id"] !!}',
                            resourceId: '{!! $appointmentAGG["employee_id"] !!}',
                            title: '{!! $appointmentAGG->admin->name !!}',
                            start: new Date('{!! date("d/M/Y", strtotime($appointmentAGG->from)) !!}') ,
                            user_to :'{!! $appointmentAGG->admin["id"] !!}',
                            to: '{!! $appointmentAGG->to !!}',
                            admin: '{!! $appointmentAGG->admin->name !!}',
                        @if($appointmentAGG->type == 0)
                        status: 'Offen',
                            @elseif($appointmentAGG->type == 1)
                            status: 'Akzeptiert',
                            @else
                            status: 'Abgelehnt',
                            @endif
                            eventColor: 'red',
                            description: '{{ $appointmentAGG["description"] }}',
                            employee_id: '{!! $appointmentAGG["employee_id"] !!}'
                        },
                        @endforeach
                    ],
                    {{--drop: function(arg) {--}}
                    {{--    console.log('drop date: ' + arg.dateStr)--}}

                    {{--    if (arg.resource) {--}}
                    {{--        //console.log('drop resource: ' + arg.resource.id);--}}

                    {{--        //console.log('eventReceive',arg.draggedEl.innerText.trim());--}}


                    {{--        if (confirm("Wollen Sie den Termin ,,"+arg.draggedEl.innerText.trim()+"'' dem Berater ,,"+arg.resource.title+"''")) {--}}
                    {{--            // Save it!--}}
                    {{--            // console.log('Thing was saved to the database.');--}}

                    {{--            $.ajax({--}}
                    {{--                url: "{{URL::route('Dropajax')}}" + "?nom_lead=" + arg.draggedEl.innerText.trim() + "&id_user=" + arg.resource.id + "&time=" + arg.draggedEl.now + "&ctime=" + calendar.getDate(),--}}
                    {{--                type: "GET",--}}

                    {{--                success: function (data) {--}}

                    {{--                    window.location.reload();--}}
                    {{--                }--}}
                    {{--            });--}}




                    {{--            arg.draggedEl.parentNode.removeChild(arg.draggedEl);--}}
                    {{--        } else {--}}
                    {{--            // Do nothing!--}}
                    {{--            // console.log('Thing was not saved to the database.');--}}
                    {{--            // alert('KO');--}}

                    {{--            // remove from calendar--}}
                    {{--            arg.remove()--}}
                    {{--        }--}}
                    {{--    }--}}


                    {{--},--}}
                    eventReceive: function(arg) { // called when a proper external event is dropped
                        //console.log('eventReceive', arg.event);
                    },
                    eventDrop: function(arg) { // called when an event (already on the calendar) is moved
                        //console.log('eventDrop', arg.event);
                    },
                    eventClick: function(calEvent) {
                        document.getElementById("from").innerHTML = moment(calEvent.event.start).format('Y-MM-DD');
                        document.getElementById("title").innerHTML = calEvent.event.title;
                        document.getElementById('name').innerHTML = calEvent.event.extendedProps.admin;
                        document.getElementById('to').innerHTML = calEvent.event.extendedProps.to;
                        document.getElementById('status').innerHTML = calEvent.event.extendedProps.status;
                        document.getElementById('ab_id').value = calEvent.event.extendedProps.employee_id;
                        document.getElementById('ab_id1').value = calEvent.event.extendedProps.employee_id;
                        document.getElementById('description').innerHTML = calEvent.event.extendedProps.description;
                        $(exampleModal).modal('show');
                    },
                });
                calendar.render();
            });
        </script>
        <!-- Modal -->
        {{ Form::open(array('url' => 'filterhrcalendar' , 'method' => 'get')) }}
        <div class="row g-0 mx-3 p-2 justify-content-end" style="border: 1px solid #ccc; border-radius:10px;background: #eee;">
            <div class="col-lg-2">
                <label >Datum</label>
                <input type="date" class="form-control form-control-sm" name="date_in" value="{!! $date_in->format('Y-m-d') !!}">
            </div>

            <div class="col-lg-2">
                <label >Region</label>
                <select name="admin" class="form-control form-select form-select-sm">

                    <option value="all">Alle</option>
                    @foreach ( $admins as $admin)
                        @if(isset($admini))
                        @if($admin->id == $admini->id)
                        <option value="{{ $admin->id }}">{{ $admin->name }} selected</option>
                        @else
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endif
                        @else
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endif
                            @endforeach

                </select>
            </div>
            <div class="col-lg-1">
                <label >Status</label>
                <select name="status"
                class="form-control form-select form-select-sm">
                    <option value="all">Alle</option>
                    <option value="2">Abgelehnt </option>
                    <option value="1">Akzeptiert</option>
                </select>
            </div>

            <div class="col-lg-auto mx-1"><br>
                {!! Form::button('<i class="bi bi-funnel my-auto"></i><span>Filter</span>', ['type' => 'submit', 'class' => 'btn buttoni-filter ps-3  mx-1']) !!}
                <a href="{{url('hrcalendar')}}">{!! Form::button('<span>Show all</span>', ['type' => 'button', 'class' => 'btn buttoni-filter ps-3']) !!}</a></div>

        </div>{{ Form::close() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document " style="max-width: 700px">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-4" style="text-align : left">
                            <h5 class="modal-title" id="exampleModalLabel">Abwesenheit</h5>
                        </div>
                        <div class="col-md-6" style="text-align : center">
                            <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                        </div>
                    </div>
                    <div class="modal-body" style="margin-top: 30px;">
                        <p style="line-height :8px;"><B>Vorname :</B><span id='name'></span></p>
                        <b>Bezeichnung :</b><span style="display: none" id='title'> </span><span id='description'> </span>
                        <p><B>Aus :</B><span id='from'></span></p>
                        <p><B>Zu :</B><span id='to'></span></p>
                        <p style="margin-bottom: 30px;"><B>Status :</B><span id='status'></span></p>
                        <hr>
                        <!--<p><B>address :</B><span id='address'></span></p> -->
{{--                        <div class="row" >--}}
{{--                            <div class="col-md-6" style="text-align : left; ">--}}
{{--                                <a href="#" onclick='document.getElementById("change_fs").style.display = "block" ;' class="btn btn-info btn-sm"><i class="far fa-edit"></i> Bearbeiten</a>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6" style="text-align : right ;">--}}
                        <div class="d-inline-flex">
                                {{ Form::open(array('url' => 'approveAbsense' , 'method' => 'get')) }}
                                <input type="hidden"  id="ab_id" name="ab_id">
                                {!! Form::button('<i class="fa-solid fa-thumbs-up"></i>Bewilligen', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
                         {{ Form::close() }}
                        {{ Form::open(array('url'=> 'declineAbsense','method'=> 'get','class'=>'mx-4')) }}
                        <input type="hidden"  id="ab_id1" name="ab_id1">
                        {!! Form::button('<i class="fas fa-retweet"></i>Ablehnen', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                         {{Form::close()}}
                        </div>
                        {{--                            </div>--}}
{{--                            <hr>--}}
{{--                        </div>--}}
{{--                        <div style="display : none" id="change_fs">--}}
{{--                            {{ Form::open(array('url' => 'changeTS' , 'method' => 'get')) }}--}}
{{--                            <input type="hidden" value="" id="id_lead_input" name="id_lead_input">--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-sm-3">--}}
{{--                                    {!! Form::label('ts_id', 'FS:') !!}--}}
{{--                                    <select name="ts_id" id="" class="form-control form-select form-select-sm" required>--}}
{{--                                        <option value="" id="">*******</option>--}}
{{--                                        @foreach($users as $user)--}}
{{--                                            <option value="{!! $user->id !!}" id="OP-{!! $user->id !!}">{!! $user->name !!}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-sm-4">--}}
{{--                                    {!! Form::label('ts_id', 'Date:') !!}--}}
{{--                                    <input type="date"  id="date_new" name="date_new" class="form-control form-control-sm" value="" disabled>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-sm-2">--}}
{{--                                    {!! Form::label('ts_id', 'Time:') !!}--}}
{{--                                    <input type="time"  id="time_new" name="time_new" class="form-control form-control-sm" value="" min="08:00" max="20:00" disabled>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-sm-3" style="text-align : rignt">--}}
{{--                                    <br>--}}
{{--                                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm btn-block']) !!}--}}
{{--                                    <a class="btn btn-danger btn-sm" href="#" onclick="$(exampleModal).modal('hide'); ">Stornieren</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {{ Form::close() }}--}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>
        </div>

{{--        <div class="col-12 col-sm-12 col-md-12  g-0">--}}
{{--            <h3 class="ps-2"> Termine </h3>--}}
{{--        </div>--}}
{{--        <div class="col-12 col-sm-12 col-md-12  g-0">--}}
{{--            {{ Form::open(array('url' => 'Appointments' , 'method' => 'get')) }}--}}
{{--            <div class="row g-0 mx-3 p-2" style="border: 1px solid #ccc; border-radius:10px;background: #eee;">--}}
{{--                <div class="col-lg-2"><br>--}}
{{--                    <input type="radio" id="html" name="trie" value="desc" @if($trie == "desc" )checked @endif>--}}
{{--                    <label for="html"><i class="fas fa-sort-amount-down"></i> Zeit absteigend</label>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2"><br>--}}
{{--                    <input type="radio" id="css" name="trie" value="asc" @if($trie == "asc" )checked @endif>--}}
{{--                    <label for="css"><i class="fas fa-sort-amount-up-alt"></i> Zeit aufsteigend</label>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2">--}}
{{--                    <label >Datum</label>--}}
{{--                    <input type="date" class="form-control form-control-sm" name="date_in" value="{!! $date_in->format('Y-m-d') !!}">--}}
{{--                </div>--}}
{{--                <div class="col-lg-2">--}}
{{--                    <label >Region</label>--}}
{{--                    <select name="region" class="form-control form-select form-select-sm">--}}
{{--                        <option value="all" @if($regionO == "all") selected @endif>Alle Region</option>--}}
{{--                        @foreach ( $regions as $region)--}}
{{--                            <option value="{!! $region->city !!}" @if($regionO == $region->city) selected @endif >{!! $region->city !!}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-lg-1">--}}
{{--                    <label >Status</label>--}}
{{--                    <select name="rejected" class="form-control form-select form-select-sm">--}}
{{--                        <option value="all" @if($rejectedO == "all") selected @endif>Alle</option>--}}
{{--                        <option value="1" @if($rejectedO == "1") selected @endif>Abgelehnt </option>--}}
{{--                        <option value="0" @if($rejectedO == "0") selected @endif>Abgelehnt</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2">--}}
{{--                    <label>Sprache</label>--}}
{{--                    <select name="sprache" class="form-control form-select form-select-sm">--}}
{{--                        <option value="all"  @if($spracheO == "all") selected @endif>Alle Sprache</option>--}}
{{--                        @foreach ( $langues as $langue)--}}
{{--                            <option value="{!! $langue->sprache !!}" @if($spracheO == $langue->sprache) selected @endif >{!! $langue->sprache !!}</option>--}}
{{--                        @endforeach--}}
{{--                    </select><br>--}}
{{--                </div>--}}
{{--                <div class="col-lg-auto mx-1"><br>--}}
{{--                    {!! Form::button('<i class="bi bi-funnel my-auto"></i><span>Filter</span>', ['type' => 'submit', 'class' => 'btn buttoni-filter ps-3 d-flex']) !!}	</div>--}}

{{--            </div>{{ Form::close() }}--}}

{{--        </div>--}}
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 g-0"><br>
            <div class="row g-0 mx-2">
                <div class="col-lg-9 col-12" style="font-size: 12px; text-align : center ;">
                    @if(session('msg')) <h5
                        style="color : #212529 ; background-color : #0080003b;">{!! session('msg') !!}</h5> <?php session(['msg' => '']); ?> @endif
                </div>

                <div class="col-lg-12 col-12 mb-3" style="font-size: 12px;">
                    <div class="mx-2" id='calendar'></div>
                    <div style='clear:both'></div>

                </div>
                <div class="col-lg-2 col-12 box follow-scroll">
                    <div id='external-events'>


                    </div>
                </div>
                <div class="pt-5">
                    <div class="pb-4">
                        <span class="employeesTitle fs-2">Requests</span>
                    </div>
                    <div class="row g-0 pt-2 pe-2 justify-content-end tableStyleEmployees" style="border-radius: 11px 11px 0px 0px;">
                        <div class="col-auto pe-1">
                            <svg width="35" height="38" style="cursor: pointer;" viewBox="0 0 48 51" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="51" rx="14" fill="white" />
                                <path
                                    d="M33.7479 34.5593L28.0096 28.8169C29.1409 27.4602 29.8213 25.7264 29.8213 23.8328C29.8213 19.5127 26.2758 16 21.9147 16C17.5536 16 14 19.5168 14 23.8369C14 28.157 17.5454 31.6696 21.9065 31.6696C23.7592 31.6696 25.4643 31.0343 26.8169 29.9727L32.5757 35.7315C32.9118 36.0676 33.4118 36.0676 33.7479 35.7315C34.084 35.3954 34.084 34.8954 33.7479 34.5593ZM15.6805 23.8369C15.6805 20.4431 18.4759 17.6846 21.9065 17.6846C25.3372 17.6846 28.1326 20.4431 28.1326 23.8369C28.1326 27.2307 25.3372 29.9891 21.9065 29.9891C18.4759 29.9891 15.6805 27.2266 15.6805 23.8369Z"
                                    fill="#646464" />
                            </svg>


                        </div>
                        <div class="col-auto ps-1">
                            <svg width="35" height="38" style="cursor: pointer;" viewBox="0 0 48 51" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="51" rx="14" fill="white" />
                                <path
                                    d="M16.9286 28C16.9286 28.2652 17.0114 28.5196 17.1587 28.7071C17.3061 28.8946 17.5059 29 17.7143 29H30.2857C30.4941 29 30.6939 28.8946 30.8413 28.7071C30.9886 28.5196 31.0714 28.2652 31.0714 28C31.0714 27.7348 30.9886 27.4804 30.8413 27.2929C30.6939 27.1054 30.4941 27 30.2857 27H17.7143C17.5059 27 17.3061 27.1054 17.1587 27.2929C17.0114 27.4804 16.9286 27.7348 16.9286 28ZM13.7857 21H34.2143C34.4227 21 34.6225 21.1054 34.7699 21.2929C34.9172 21.4804 35 21.7348 35 22C35 22.2652 34.9172 22.5196 34.7699 22.7071C34.6225 22.8946 34.4227 23 34.2143 23H13.7857C13.5773 23 13.3775 22.8946 13.2301 22.7071C13.0828 22.5196 13 22.2652 13 22C13 21.7348 13.0828 21.4804 13.2301 21.2929C13.3775 21.1054 13.5773 21 13.7857 21ZM21.6429 33H26.3571C26.5655 33 26.7654 33.1054 26.9127 33.2929C27.0601 33.4804 27.1429 33.7348 27.1429 34C27.1429 34.2652 27.0601 34.5196 26.9127 34.7071C26.7654 34.8946 26.5655 35 26.3571 35H21.6429C21.4345 35 21.2346 34.8946 21.0873 34.7071C20.9399 34.5196 20.8571 34.2652 20.8571 34C20.8571 33.7348 20.9399 33.4804 21.0873 33.2929C21.2346 33.1054 21.4345 33 21.6429 33Z"
                                    fill="#646464" />
                            </svg>

                        </div>
                    </div>
                    <div class="tableStyleEmployees w-100 mb-5" style="border-radius: 0px 0px 11px 11px;overflow-x: auto;">
                        <table class="table tableStyleEmployees pb-2">
                            <thead class="border-none">
                            <tr class="fs-5">
                                <th>Person</th>
                                <th>Request Date</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Request Type</th>
                                <th>Properties</th>

                            </tr>
                            </thead>
                            <tbody class="fs-6">
                            @foreach ( $absences as $appointmentAGG )
                            <tr>
                                <td scope="row">{{$appointmentAGG->admin->name}}</td>
                                <td>{{$appointmentAGG->created_at->format('d/m/Y')}}</td>
                                <td>{{$appointmentAGG->from}}</td>
                                <td>{{$appointmentAGG->to}}</td>
                                <td>{{$appointmentAGG->description}}</td>
                                @if($appointmentAGG->type == 0)
                                <td>
                                    <div class="row g-1">
                                        <div class="col-6">
                                            <button onclick="window.location.href='{{route('cancelAbsence',$appointmentAGG->id)}}'" class="declineBtnRequest w-100 py-2">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.998 2L1.99805 18" stroke="white" stroke-width="3"
                                                          stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1.99805 2L17.998 18" stroke="white" stroke-width="3"
                                                          stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button onclick="window.location.href='{{route('acceptAbsense', $appointmentAGG->id)}}'" class="acceptBtnRequest w-100 py-2">
                                                <svg width="26" height="20"
                                                    viewBox="0 0 26 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.99805 10.5333L9.33138 18L23.998 2" stroke="white"
                                                          stroke-width="3" stroke-linecap="round"
                                                          stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                @else
                                @if($appointmentAGG->type == 1)
                                        <td>
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <div class="acceptedRequestDiv text-center py-1">
                                                        <span>Accepted</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                @else
                                        <td>
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <div class="DeclinedRequestDiv text-center py-1">
                                                        <span>Declined</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                @endif

                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                            <style>

                            </style>
                        </table>
                    </div>

                </div>


                <script type="text/javascript">
                    function openExamplePic() {
                        var x = document.getElementById('picture');
                        if (x.style.display == 'none') {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                </script>
{{--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

            @elseif(auth()->user()->hasRole('fs'))
                    <script>
                        @foreach($absences as $ab)
                        console.log({!! $ab !!});
                        @endforeach
                        document.addEventListener('DOMContentLoaded', function() {

                            var containerEl = document.getElementById('external-events');

                            new FullCalendar.Draggable(containerEl, {
                                itemSelector: '.fc-event',
                                eventData: function(eventEl) {
                                    return {
                                        title: eventEl.innerText.trim(),

                                    }
                                }
                            });

                            /* initialize the calendar
                            -----------------------------------------------------------------*/

                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {

                                now: "{!! $date_in->format('Y-m-d') !!}",
                                editable: false, // enable draggable events
                                droppable: true, // this allows things to be dropped onto the calendar
                                aspectRatio: 1.8,

                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth'
                                },
                                views: {
                                    timeGridWeek: {
                                        eventMaxStack: 3
                                    },
                                },
                                slotMinTime: "08:00:00",
                                slotMaxTime: "20:30:00",
                                height: 800,
                                initialView: 'dayGridMonth',


                                allDaySlot: false,
                                eventMaxStack: 2,
                                dayMaxEvents: 4,


                                resources: [

                                ],
                                events: [
                                        @foreach ( $absences as $appointmentAGG )
                                    {
                                        resourceId: {!! $appointmentAGG->id !!},
                                        id: '{!! $appointmentAGG["id"] !!}',
                                        title: '{!! $appointmentAGG->description !!}',
                                        start: new Date('{!! date("d/M/Y", strtotime($appointmentAGG->from)) !!}') ,
                                        eventColor: 'red',
                                        namee: '{!! $appointmentAGG->admin->name !!}',
                                        fundi: '{!! $appointmentAGG["to"] !!}',
                                        @if($appointmentAGG->type == 0)
                                        status: 'Offen',
                                        @elseif($appointmentAGG->type == 1)
                                        status: 'Akzeptiert',
                                        @else
                                        status: 'Abgelehnt',
                                        @endif
                                    },
                                    @endforeach
                                ],
                                {{--drop: function(arg) {--}}
                                    {{--    console.log('drop date: ' + arg.dateStr)--}}

                                    {{--    if (arg.resource) {--}}
                                    {{--        //console.log('drop resource: ' + arg.resource.id);--}}

                                    {{--        //console.log('eventReceive',arg.draggedEl.innerText.trim());--}}


                                    {{--        if (confirm("Wollen Sie den Termin ,,"+arg.draggedEl.innerText.trim()+"'' dem Berater ,,"+arg.resource.title+"''")) {--}}
                                    {{--            // Save it!--}}
                                    {{--            // console.log('Thing was saved to the database.');--}}

                                    {{--            $.ajax({--}}
                                    {{--                url: "{{URL::route('Dropajax')}}" + "?nom_lead=" + arg.draggedEl.innerText.trim() + "&id_user=" + arg.resource.id + "&time=" + arg.draggedEl.now + "&ctime=" + calendar.getDate(),--}}
                                    {{--                type: "GET",--}}

                                    {{--                success: function (data) {--}}

                                    {{--                    window.location.reload();--}}
                                    {{--                }--}}
                                    {{--            });--}}




                                    {{--            arg.draggedEl.parentNode.removeChild(arg.draggedEl);--}}
                                    {{--        } else {--}}
                                    {{--            // Do nothing!--}}
                                    {{--            // console.log('Thing was not saved to the database.');--}}
                                    {{--            // alert('KO');--}}

                                    {{--            // remove from calendar--}}
                                    {{--            arg.remove()--}}
                                    {{--        }--}}
                                    {{--    }--}}


                                    {{--},--}}
                                eventReceive: function(arg) { // called when a proper external event is dropped
                                    //console.log('eventReceive', arg.event);
                                },
                                eventDrop: function(arg) { // called when an event (already on the calendar) is moved
                                    //console.log('eventDrop', arg.event);
                                },
                                eventClick: function(calEvent) {
                                    document.getElementById("from").innerHTML = moment(calEvent.event.start).format('Y-MM-DD');
                                    document.getElementById("title").innerHTML = calEvent.event.title;
                                    document.getElementById("end").innerHTML = moment(calEvent.event.extendedProps.fundi).format('Y-MM-DD');
                                    document.getElementById("status").innerHTML = calEvent.event.extendedProps.status;
                                    document.getElementById("start").innerHTML = moment(calEvent.event.start).format('Y-MM-DD');
                                    $(exampleModal).modal('show');
                                },
                            });
                            calendar.render();
                        });

                    </script>
                    <!-- Modal -->
{{--                    {{ Form::open(array('url' => 'filterhrcalendar' , 'method' => 'get')) }}--}}
{{--                    <div class="row g-0 mx-3 p-2 justify-content-end" style="border: 1px solid #ccc; border-radius:10px;background: #eee;">--}}
{{--                        <div class="col-lg-2">--}}
{{--                            <label >Datum</label>--}}
{{--                            <input type="date" class="form-control form-control-sm" name="date_in" value="{!! $date_in->format('Y-m-d') !!}">--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-2">--}}
{{--                            <label >Region</label>--}}
{{--                            <select name="admin" class="form-control form-select form-select-sm">--}}

{{--                                <option value="all">Alle</option>--}}
{{--                                @foreach ( $admins as $admin)--}}
{{--                                    @if(isset($admini))--}}
{{--                                        @if($admin->id == $admini->id)--}}
{{--                                            <option value="{{ $admin->id }}">{{ $admin->name }} selected</option>--}}
{{--                                        @else--}}
{{--                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>--}}
{{--                                        @endif--}}
{{--                                    @else--}}
{{--                                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-1">--}}
{{--                            <label >Status</label>--}}
{{--                            <select name="status"--}}
{{--                                    class="form-control form-select form-select-sm">--}}
{{--                                <option value="all">Alle</option>--}}
{{--                                <option value="2">Abgelehnt </option>--}}
{{--                                <option value="1">Akzeptiert</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-auto mx-1"><br>--}}
{{--                            {!! Form::button('<i class="bi bi-funnel my-auto"></i><span>Filter</span>', ['type' => 'submit', 'class' => 'btn buttoni-filter ps-3 d-flex mx-3']) !!}	</div>--}}

{{--                    </div>{{ Form::close() }}--}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document " style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="col-md-4" style="text-align : left">
                                        <h5 class="modal-title" id="exampleModalLabel">Abwesenheit</h5>
                                    </div>
                                    <div class="col-md-6" style="text-align : center">
                                        <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                                    </div>
                                </div>
                                <div class="modal-body" style="margin-top: 30px;">
                                    <p><b>Bezeichnung :</b><span id='title'></span></p>
                                    <p><B>Aus :</B><span id='from'></span></p>
                                    <p><B>Status :</B><span id='status'></span></p>
                                    <p style="margin-bottom: 30px;"><B>Zu :</B><span id='end'></span></p>

                                    <hr>

                                    <!--<p><B>address :</B><span id='address'></span></p> -->
                                    {{--                        <div class="row" >--}}
                                    {{--                            <div class="col-md-6" style="text-align : left; ">--}}
                                    {{--                                <a href="#" onclick='document.getElementById("change_fs").style.display = "block" ;' class="btn btn-info btn-sm"><i class="far fa-edit"></i> Bearbeiten</a>--}}
                                    {{--                            </div>--}}
                                    {{--                            <div class="col-md-6" style="text-align : right ;">--}}
                                    {{--                            </div>--}}
                                    {{--                            <hr>--}}
                                    {{--                        </div>--}}
                                    {{--                        <div style="display : none" id="change_fs">--}}
                                    {{--                            {{ Form::open(array('url' => 'changeTS' , 'method' => 'get')) }}--}}
                                    {{--                            <input type="hidden" value="" id="id_lead_input" name="id_lead_input">--}}
                                    {{--                            <div class="row">--}}
                                    {{--                                <div class="form-group col-sm-3">--}}
                                    {{--                                    {!! Form::label('ts_id', 'FS:') !!}--}}
                                    {{--                                    <select name="ts_id" id="" class="form-control form-select form-select-sm" required>--}}
                                    {{--                                        <option value="" id="">*******</option>--}}
                                    {{--                                        @foreach($users as $user)--}}
                                    {{--                                            <option value="{!! $user->id !!}" id="OP-{!! $user->id !!}">{!! $user->name !!}</option>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </select>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="form-group col-sm-4">--}}
                                    {{--                                    {!! Form::label('ts_id', 'Date:') !!}--}}
                                    {{--                                    <input type="date"  id="date_new" name="date_new" class="form-control form-control-sm" value="" disabled>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="form-group col-sm-2">--}}
                                    {{--                                    {!! Form::label('ts_id', 'Time:') !!}--}}
                                    {{--                                    <input type="time"  id="time_new" name="time_new" class="form-control form-control-sm" value="" min="08:00" max="20:00" disabled>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="form-group col-sm-3" style="text-align : rignt">--}}
                                    {{--                                    <br>--}}
                                    {{--                                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm btn-block']) !!}--}}
                                    {{--                                    <a class="btn btn-danger btn-sm" href="#" onclick="$(exampleModal).modal('hide'); ">Stornieren</a>--}}
                                    {{--                                </div>--}}
                                    {{--                            </div>--}}
                                    {{--                            {{ Form::close() }}--}}
                                    {{--                        </div>--}}
                                    <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{--        <div class="col-12 col-sm-12 col-md-12  g-0">--}}
                    {{--            <h3 class="ps-2"> Termine </h3>--}}
                    {{--        </div>--}}
                    {{--        <div class="col-12 col-sm-12 col-md-12  g-0">--}}
                    {{--            {{ Form::open(array('url' => 'Appointments' , 'method' => 'get')) }}--}}
                    {{--            <div class="row g-0 mx-3 p-2" style="border: 1px solid #ccc; border-radius:10px;background: #eee;">--}}
                    {{--                <div class="col-lg-2"><br>--}}
                    {{--                    <input type="radio" id="html" name="trie" value="desc" @if($trie == "desc" )checked @endif>--}}
                    {{--                    <label for="html"><i class="fas fa-sort-amount-down"></i> Zeit absteigend</label>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-2"><br>--}}
                    {{--                    <input type="radio" id="css" name="trie" value="asc" @if($trie == "asc" )checked @endif>--}}
                    {{--                    <label for="css"><i class="fas fa-sort-amount-up-alt"></i> Zeit aufsteigend</label>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-2">--}}
                    {{--                    <label >Datum</label>--}}
                    {{--                    <input type="date" class="form-control form-control-sm" name="date_in" value="{!! $date_in->format('Y-m-d') !!}">--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-2">--}}
                    {{--                    <label >Region</label>--}}
                    {{--                    <select name="region" class="form-control form-select form-select-sm">--}}
                    {{--                        <option value="all" @if($regionO == "all") selected @endif>Alle Region</option>--}}
                    {{--                        @foreach ( $regions as $region)--}}
                    {{--                            <option value="{!! $region->city !!}" @if($regionO == $region->city) selected @endif >{!! $region->city !!}</option>--}}
                    {{--                        @endforeach--}}
                    {{--                    </select>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-1">--}}
                    {{--                    <label >Status</label>--}}
                    {{--                    <select name="rejected" class="form-control form-select form-select-sm">--}}
                    {{--                        <option value="all" @if($rejectedO == "all") selected @endif>Alle</option>--}}
                    {{--                        <option value="1" @if($rejectedO == "1") selected @endif>Abgelehnt </option>--}}
                    {{--                        <option value="0" @if($rejectedO == "0") selected @endif>Abgelehnt</option>--}}
                    {{--                    </select>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-2">--}}
                    {{--                    <label>Sprache</label>--}}
                    {{--                    <select name="sprache" class="form-control form-select form-select-sm">--}}
                    {{--                        <option value="all"  @if($spracheO == "all") selected @endif>Alle Sprache</option>--}}
                    {{--                        @foreach ( $langues as $langue)--}}
                    {{--                            <option value="{!! $langue->sprache !!}" @if($spracheO == $langue->sprache) selected @endif >{!! $langue->sprache !!}</option>--}}
                    {{--                        @endforeach--}}
                    {{--                    </select><br>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-auto mx-1"><br>--}}
                    {{--                    {!! Form::button('<i class="bi bi-funnel my-auto"></i><span>Filter</span>', ['type' => 'submit', 'class' => 'btn buttoni-filter ps-3 d-flex']) !!}	</div>--}}

                    {{--            </div>{{ Form::close() }}--}}

                    {{--        </div>--}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 g-0"><br>
                        <div class="row g-0 mx-2">
                            <div class="col-lg-9 col-12" style="font-size: 12px; text-align : center ;">
                                @if(session('msg')) <h5
                                    style="color : #212529 ; background-color : #0080003b;">{!! session('msg') !!}</h5> <?php session(['msg' => '']); ?> @endif
                            </div>

                            <div class="col-lg-12 col-12 mb-3" style="font-size: 12px;">
                                <div class="mx-2" id='calendar'></div>
                                <div style='clear:both'></div>

                            </div>
                            <div class="col-lg-2 col-12 box follow-scroll">
                                <div id='external-events'>


                                </div>
                            </div>




                            <script type="text/javascript">
                                function openExamplePic() {
                                    var x = document.getElementById('picture');
                                    if (x.style.display == 'none') {
                                        x.style.display = "block";
                                    } else {
                                        x.style.display = "none";
                                    }
                                }
                            </script>
                            @endif


                            @endsection

            <style>
                #wrap::-webkit-scrollbar {
                    width:1px;
                    height: 1px;
                }

                body {
                    overflow-x: hidden !important;
                }
                .buttoni-filter {
                    background-color: #0c71c3 !important;
                    color: #fff !important;
                }
            </style>

            <style>
                .mapouter {
                    position: relative;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                }

                .scroll-2 {
                    height: 380px !important;
                }

                .calendar-divider {
                    background-color: #efefef !important;
                    border-radius: 15px !important;
                }

                .fw-600 {
                    font-weight: 600;
                }

                .notice-box {
                    background-color: #FFEBE5;
                    border-radius: 35px;
                }

                .person-box-1 {
                    background-color: #fff;
                    border-radius: 15px;
                }


                .input-group select {
                    border-radius: 7px !important;
                    box-shadow: none !important;
                }

                .calendar-box {
                    background-color: #EFEFEF;
                    border-radius: 35px;
                }

                .person-box {
                    color: #fff;
                    font-weight: 600;
                    border-radius: 15px;
                    background-color: #4EC590;
                }

                .title-div {
                    color: #5F5F5F;
                    font-weight: 600;
                }

                body {
                    overflow-x: hidden !important;
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
                body {font-family: 'Montserrat', sans-serif;}

            </style>
                            <style>
                                .employeesTitle {
                                    font-weight: 600;
                                    font-size: 1.625rem;
                                    color: #000000;
                                }

                                .searchFieldStyle {
                                    background: rgba(196, 196, 196, 0.09);
                                    border: 1px solid rgba(100, 97, 97, 0.05);
                                    box-sizing: border-box;
                                    border-radius: 11px 0 0px 11px;
                                    border-right: 0px #fff solid;

                                }

                                .searchIconStyle {
                                    background: rgba(196, 196, 196, 0.09);
                                    border: 1px solid rgba(100, 97, 97, 0.05);
                                    box-sizing: border-box;
                                    border-radius: 0px 11px 11px 0px;
                                    border-left: 0px #fff solid;
                                    cursor: pointer;
                                }

                                .employeesGreyBg {
                                    background: #F5F5F5;
                                    border-radius: 47px;
                                }

                                .employeesTitleSpan {
                                    font-weight: 600;
                                    font-size: 2.375rem;
                                    color: #2D2D2D;
                                }

                                .proffesionStpan {
                                    font-weight: 500;
                                    font-size: 1.4375rem;
                                    color: rgba(0, 0, 0, 0.7)
                                }

                                .proffesionGreyBgDiv {
                                    background: rgba(47, 96, 220, 0.08);
                                    border-radius: 13px;

                                }

                                .personalDatenGreyBGDiv {
                                    background: rgba(0, 0, 0, 0.03);
                                    border: 3px solid rgba(47, 96, 220, 0.08);
                                    box-sizing: border-box;
                                    border-radius: 30px;
                                }

                                .personalDatenTitle {
                                    font-weight: 600;
                                    font-size: 1.5625rem;
                                    color: #000000;
                                    border-bottom: 2px solid rgba(121, 121, 121, 0.08);
                                }

                                .personalDatenLeftSide {
                                    font-weight: 500;
                                    font-size: 1.5625rem;
                                    color: #000000;
                                    border-bottom: 2px solid rgba(121, 121, 121, 0.08);
                                    height: 100%;
                                }

                                .personalDatenRightSide {
                                    color: rgba(0, 0, 0, 0.56);
                                    font-weight: 400;
                                    font-size: 1.5625rem;
                                    border-bottom: 2px solid rgba(121, 121, 121, 0.08);
                                    border-left: 2px solid rgba(121, 121, 121, 0.08);
                                    overflow-wrap: break-word;
                                    height: 100%;

                                }

                                .list-choice-title {
                                    font-weight: 400;
                                    font-size: 22px;
                                    color: #1D2346;
                                    border: 1px solid #2F60DC;
                                    border-radius: 11px;

                                }

                                .list-choice-objects {
                                    font-weight: 400;
                                    font-size: 22px;
                                    color: #1D2346;
                                    display: none;
                                    border: 1px solid #2F60DC;
                                    border-radius: 11px;
                                    margin-top: 2px;

                                }

                                .container2 {
                                    display: block;
                                    position: relative;
                                    padding-left: 40px;

                                    cursor: pointer;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                }

                                .container2 input {
                                    position: absolute;
                                    opacity: 0;
                                    cursor: pointer;
                                    height: 0;
                                    width: 0;
                                }

                                .checkmark2 {
                                    position: absolute;
                                    top: 8px;
                                    left: 0;
                                    height: 25px;
                                    width: 25px;
                                    background: rgba(181, 185, 188, 0.62);
                                    border-radius: 5px;
                                }

                                .container2:hover input~.checkmark2 {
                                    background: rgba(181, 185, 188, 0.62);

                                }

                                .container2 input:checked~.checkmark2 {
                                    background-color: #2F60DC;
                                    border-radius: 7px;
                                }

                                .checkmark2:after {
                                    content: "";
                                    position: absolute;
                                    display: none;
                                }

                                .container2 input:checked~.checkmark2:after {
                                    display: block;
                                }

                                .container2 .checkmark2:after {
                                    left: 9px;
                                    top: 4.5px;
                                    width: 7px;
                                    height: 12px;
                                    border: solid white;
                                    border-width: 0 2px 2px 0;
                                    -webkit-transform: rotate(45deg);
                                    -ms-transform: rotate(45deg);
                                    transform: rotate(45deg);
                                }

                                .hoverLabelClass:hover {
                                    background: rgba(47, 96, 220, 0.08);
                                    border-radius: 11px;
                                }

                                .labelWhenChecked {
                                    color: #000000;
                                }

                                .sichMit {
                                    font-size: 22px;
                                }

                                .activeProfile {
                                    background: #F5F5F5;
                                    border-radius: 70px 0px 0px 70px;
                                    margin-left: 3.7rem;
                                }

                                .profilePic {
                                    height: 100;
                                    width: 100;
                                }

                                .passiveProfilePic {
                                    opacity: 0.6;
                                    cursor: pointer;
                                    margin-left: 3.7rem;
                                }

                                .employeesOverflowDiv {
                                    height: 55vh;
                                    overflow-y: scroll;
                                    overflow-x: hidden;
                                }


                                .employeesOverflowDiv::-webkit-scrollbar {
                                    display: none;
                                }

                                .tableStyleEmployees {
                                    background: #F5F5F5;
                                    border-radius: 11px;
                                    border-collapse: separate;
                                }

                                .tableStyleEmployees th {
                                    color: #2D2D2D;
                                    font-weight: 500;
                                    border-bottom: none;
                                    padding-left: 1rem;
                                    padding-top: 0rem;
                                    padding-bottom: 0rem;
                                    vertical-align: middle;
                                }

                                .tableStyleEmployees td {
                                    color: #585858;
                                }

                                .declineBtnRequest {
                                    background: #F27979;
                                    border-radius: 14px;
                                    border: none
                                }

                                .acceptBtnRequest {
                                    background: #79B887;
                                    border-radius: 14px;
                                    border: none
                                }

                                .tableStyleEmployees td {
                                    vertical-align: middle;
                                    padding: 1rem 1rem;
                                }

                                .acceptedRequestDiv {
                                    font-weight: 500;
                                    color: #79B887;
                                    border-radius: 14px;
                                    border: 2px solid #79B887;
                                }

                                .DeclinedRequestDiv {
                                    font-weight: 500;
                                    color: #F27979;
                                    border-radius: 14px;
                                    border: 2px solid #F27979;
                                }

                                @media (max-width: 1399.98px) {
                                    .activeProfile {
                                        margin-left: 2.5rem;
                                    }

                                    .passiveProfilePic {
                                        margin-left: 2.5rem;
                                    }
                                }

                                @media (max-width: 1199.98px) {
                                    .activeProfile {
                                        margin-left: 2rem;
                                    }

                                    .passiveProfilePic {
                                        margin-left: 2rem;
                                    }
                                }

                                @media (max-width: 991.98px) {
                                    .activeProfile {
                                        margin-left: 2.5rem;
                                    }
                                    .tableStyleEmployees { 
                                        display: none;
                                    }
                                    .passiveProfilePic {
                                        margin-left: 2.5rem;
                                    }

                                    .employeesTitleSpan {
                                        font-size: 35px;
                                    }

                                    .proffesionStpan {
                                        font-size: 25px;

                                    }

                                    .personalDatenTitle {
                                        font-size: 27px;

                                    }

                                    .personalDatenLeftSide {
                                        font-size: 27px;

                                    }

                                    .personalDatenRightSide {
                                        font-size: 27px;

                                    }

                                    .employeesTitle {
                                        font-size: 28px;
                                    }

                                    .sichMit {
                                        font-size: 20px;
                                    }
                                }

                                @media (max-width: 767.98px) {
                                    .activeProfile {
                                        margin-left: 1.5rem;
                                    }

                                    .passiveProfilePic {
                                        margin-left: 1.5rem;
                                    }

                                    .employeesTitleSpan {
                                        font-size: 32px;
                                    }

                                    .proffesionStpan {
                                        font-size: 22px;

                                    }

                                    .personalDatenTitle {
                                        font-size: 24px;

                                    }

                                    .personalDatenLeftSide {
                                        font-size: 24px;

                                    }

                                    .personalDatenRightSide {
                                        font-size: 24px;

                                    }

                                    .employeesTitle {
                                        font-size: 25px;
                                    }

                                    .sichMit {
                                        font-size: 18px;
                                    }

                                    .profilePic {
                                        height: 80;
                                        width: 80;

                                    }

                                    .floatOnMobile {
                                        position: absolute;
                                        top: 1.5rem;
                                        left: 0;
                                        right: 0;
                                        width: 60%;
                                    }

                                    .employeesTitleAlign {
                                        text-align: center !important;
                                    }

                                    .employeesGreyBg {
                                        border-radius: 15px;
                                    }

                                    .personalDatenGreyBGDiv {
                                        border-radius: 10px;
                                    }
                                }

                                @media (max-width: 575.98px) {
                                    .employeesTitleSpan {
                                        font-size: 25px;
                                    }

                                    .proffesionStpan {
                                        font-size: 17px;

                                    }

                                    .personalDatenTitle {
                                        font-size: 18px;

                                    }

                                    .personalDatenLeftSide {
                                        font-size: 18px;

                                    }

                                    .personalDatenRightSide {
                                        font-size: 18px;

                                    }

                                    .employeesTitle {
                                        font-size: 19px;
                                    }

                                    .sichMit {
                                        font-size: 16px;
                                    }

                                    .profilePic {
                                        height: 55;
                                        width: 55;

                                    }

                                    .activeProfile {
                                        margin-left: 0rem;
                                    }

                                    .passiveProfilePic {
                                        margin-left: 0rem;
                                    }

                                    .employeesOverflowDiv {
                                        height: 55vh;
                                    }

                                    .floatOnMobile {
                                        position: absolute;
                                        top: 1.5rem;
                                        left: 0;
                                        right: 0;
                                        width: 60%;
                                    }

                                    .employeesTitleAlign {
                                        text-align: center !important;
                                    }

                                    .employeesGreyBg {
                                        border-radius: 15px;
                                    }

                                    .personalDatenGreyBGDiv {
                                        border-radius: 10px;
                                    }
                                }
                            </style>


