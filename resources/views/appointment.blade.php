@extends('template.navbar')
@section('content')
@php $admini = Auth::user(); @endphp
<head>
    <title>
        Kalender
    </title>
    <meta http-equiv="Content-Type" content="charset=UTF-8" />
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

@if($admini->hasRole('admin') || $admini->hasRole('salesmanager') || auth()->user()->headadmin->hasRole('salesmanager') || auth()->user()->headadmin->hasRole('admin'))
<script>

  document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events');
    new FullCalendar.Draggable(containerEl, {
      locale: 'de',
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
            title: eventEl.innerText.trim(),
        }
      },

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
                        right: 'resourceTimeGridDay,timeGridWeek,dayGridMonth'
                    },
                    views: {
                        dayGridMonth: {
                            eventMaxStack: 3
                        },
                        timeGridWeek: {
                            eventMaxStack: 3
                        },

                    },

                    slotLabelFormat: {hour: 'numeric', minute: '2-digit', hour12: false},
                    height: 650,
                    initialView: 'resourceTimeGridDay',
                    slotMinTime: "08:00:00",
                    slotMaxTime: "20:30:00",
                    slotDuration: '00:15:00',
                    slotLabelInterval: 30,
                    allDaySlot: false,
                    eventMaxStack: 3,
                    dayMaxEvents: 3,
                    firstDay: 1,

                resources: [
                @foreach($users as $user)
                    { id: '{!! $user->id !!}', title: '{!! $user->name !!}', eventColor: 'rgb(12, 113, 195)' },
                @endforeach
                ],
                events: [

              @foreach($absences as $appointmentAGG)
              @if($appointmentAGG->type == 1)
        {      
                  aid: {!! $appointmentAGG->id !!},
                  resourceId: '{!! $appointmentAGG->admin->id !!}',
                  title: 'Abwesenheit {{ucfirst($appointmentAGG->admin->name)}}',
                  start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["from"] . " 08:00")) !!}'),
                  name: '{{ $appointmentAGG->admin->name }}',
                  user_to: '{{ $appointmentAGG->admin->id }}',
                //   allDay : false,
                  absence: true,
                  allDay: false,
        //  start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["from"] . "" . "08:00")) !!}'),
                   @if($appointmentAGG->type == 0)
                        status: 'Offen',
                   @elseif($appointmentAGG->type == 1)
                        status: 'Akzeptiert',
                   @else
                        status: 'Abgelehnt',
                   @endif
                   description: '{{ $appointmentAGG["description"] }}',
                   employee_id: '{!! $appointmentAGG["employee_id"] !!}',
                   color: '#9B51E0',
                   to: new Date('{!! date("d/M/Y", strtotime($appointmentAGG["to"])) !!}'),
                   end: new Date('{!! date("d/M/Y", strtotime($appointmentAGG["to"])) !!}')
              },
              @endif
              @endforeach
	  @foreach ( $appointments as $appointmentAGG )
        {
                id: '{!! $appointmentAGG["id"] !!}',
                resourceId: '{!! $appointmentAGG["assign_to_id"] !!}',
                title: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }} ({{$appointmentAGG["address"]}} , {{$appointmentAGG["postal_code"]}} , {{$appointmentAGG["city"]}} , {{$appointmentAGG["number_of_persons"]}})',
                start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["appointment_date"]." ".$appointmentAGG["time"])) !!}') ,
                telephone: '{{ $appointmentAGG["telephone"] }}' ,
                birthdate: '{{ $appointmentAGG["birthdate"] }}' ,
                number_of_persons: '{{ $appointmentAGG["number_of_persons"] }}' ,
                nationality: '{{ $appointmentAGG["nationality"] }}' ,
                status_task: '{{ $appointmentAGG["status_task"] }}' ,
                color: '#219653',
                name: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }}',
                user_to :'{{ $appointmentAGG["assign_to_id"] }}',
                absence: false,
                appointment_date: ('{!! date("m/d/Y", strtotime($appointmentAGG["appointment_date"])) !!}'),
                time: ('{!! date("H:i", strtotime($appointmentAGG["time"])) !!}'),
                berater: '{!! $appointmentAGG->admin->name !!}',
                titlemodal: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }}'
              },
	  @endforeach

              @foreach($personalApp as $appointmentAGG)
          {
              pid: '{!! $appointmentAGG["id"] !!}',
              resourceId: '{!! $appointmentAGG->user_id !!}',
              title: 'Mitarbeiterbesprechungen {{ucfirst($appointmentAGG->Admins->name) . " " . $appointmentAGG->comment }}',
              titull: '{!! $appointmentAGG->title !!}',
              start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["date"]." ".$appointmentAGG["time"])) !!}'),
              name: '{{ $appointmentAGG->Admins->name }}',
              allDay : false,
              absence: false,
              @if($appointmentAGG->AppOrCon == 1)
              status: 'Private Termine',
              @elseif($appointmentAGG->AppOrCon == 2)
              status: 'Mitarbeiterbesprechungen',
              @endif
              color: '#E178AD',
              textColor: 'white',
              app: true,
              address: '{!! $appointmentAGG["address"] !!}',
              comment: '{!! $appointmentAGG["comment"] !!}',
          },
          @endforeach
          @foreach($rejected as $appointmentAGG)
          {
              id: '{!! $appointmentAGG->id !!}',
              rejected: true,
              start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["appointment_date"]." ".$appointmentAGG["time"])) !!}'),
              color: '#dd4134',
              title: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }}',
              resourceId: '{!! $appointmentAGG["assign_to_id"] !!}',
          },
          @endforeach
      ],

      drop: function(arg) {
        console.log('drop date: ' + arg.dateStr)

        if (arg.resource) {

		  if (confirm("Wollen Sie den Termin ,,"+arg.draggedEl.innerText.trim()+"'' dem Berater ,,"+arg.resource.title+" hinzufügen")) {
		  // Save it!
		  // console.log('Thing was saved to the database.');

	    $.ajax({
                                    url: "{{URL::route('Dropajax')}}" + "?nom_lead=" + arg.draggedEl.innerText.trim() + "&id_user=" + arg.resource.id + "&time=" + arg.draggedEl.now + "&ctime=" + calendar.getDate(),
                                    type: "GET",
                                    success: function (data) {
                                        alert(data);
                                        window.location.reload();
                                    }
                                });

		  arg.draggedEl.parentNode.removeChild(arg.draggedEl);
		} else {
		  // Do nothing!
		  // console.log('Thing was not saved to the database.');
		  // alert('KO');

		  // remove from calendar
		  arg.remove()
		}
        }
      },
      eventDragStart: function(arg){
        alert(arg);
      },
      eventReceive: function(arg) { // called when a proper external event is dropped
        //console.log('eventReceive', arg.event);


      },
      eventDrop: function(arg) { // called when an event (already on the calendar) is moved
        //console.log('eventDrop', arg.event);
      },
	  eventClick: function(calEvent) {
            if(!calEvent.event.extendedProps.absence && !calEvent.event.extendedProps.app && !calEvent.event.extendedProps.rejected){
                document.getElementById("start").innerHTML = moment(calEvent.event.start).format('Y-MM-DD HH:mm');
                document.getElementById("name").innerHTML = calEvent.event.extendedProps.titlemodal;
                document.getElementById("telephone").innerHTML = calEvent.event.extendedProps.telephone;
                document.getElementById("birthdate").innerHTML = calEvent.event.extendedProps.birthdate;
                document.getElementById("number_of_persons").innerHTML = calEvent.event.extendedProps.number_of_persons;
                document.getElementById("nationality").innerHTML = calEvent.event.extendedProps.nationality;
                document.getElementById("status_task").innerHTML = calEvent.event.extendedProps.status_task;
                document.getElementById("id").innerHTML = calEvent.event.aid;
                document.getElementById("id_lead_input").value = calEvent.event.id;
                document.getElementById("id_lead_input2").value = calEvent.event.id;
                document.getElementById("date_new2").value = moment(calEvent.event.start).format('Y-MM-DD');
                document.getElementById("time_new").value = moment(calEvent.event.start).format('HH:mm');
                document.getElementById("time_new2").value = moment(calEvent.event.start).format('HH:mm');
                document.getElementById("datumm").innerHTML = moment(calEvent.event.extendedProps.appointment_date).format('DD.MM.Y');
                document.getElementById("zeitt").innerHTML = calEvent.event.extendedProps.time;
                document.getElementById("berater").innerHTML = calEvent.event.extendedProps.berater;
		        document.getElementById("OP-"+calEvent.event.extendedProps.user_to).selected = true;
                $(exampleModal).modal('show');
            }
            else if(calEvent.event.extendedProps.absence){
                document.getElementById("from1").innerHTML = moment(calEvent.event.start).format('Y-MM-DD');
                document.getElementById("title1").innerHTML = calEvent.event.title;
                document.getElementById('name1').innerHTML = calEvent.event.extendedProps.name;
                document.getElementById('to1').innerHTML = moment(calEvent.event.extendedProps.to).format('Y-MM-DD')
                document.getElementById('status1').innerHTML = calEvent.event.extendedProps.status;
                document.getElementById('ab_id').value = calEvent.event.extendedProps.aid;
                document.getElementById('ab_id1').value = calEvent.event.extendedProps.aid;
                document.getElementById('description1').innerHTML = calEvent.event.extendedProps.description;
              if(calEvent.event.extendedProps.status == 'Akzeptiert' || calEvent.event.extendedProps.status == 'Abgelehnt'){
                  document.getElementById('approveab').style.display = "none";
                  document.getElementById('declineab').style.display = "none";
              }
              else{
                  document.getElementById('approveab').style.display = "block";
                  document.getElementById('declineab').style.display = "block";
              }
              $(exampleModal1).modal('show')
          }
            else if(calEvent.event.extendedProps.rejected){
                var urll = 'https://crm.finanu.ch/dealnotclosed/';
                location.replace('https://crm.finanu.ch/dealnotclosed/' + calEvent.event.id);
            }
            else{
                document.getElementById("date2").innerHTML = moment(calEvent.event.start).format('Y-MM-DD HH:mm');
                document.getElementById("title2").innerHTML = calEvent.event.extendedProps.titull;
                document.getElementById("addres").innerHTML = calEvent.event.extendedProps.address;
                document.getElementById('name2').innerHTML = calEvent.event.extendedProps.name;
                // document.getElementById('status2').innerHTML = calEvent.event.extendedProps.status;
                document.getElementById('comment2').innerHTML = calEvent.event.extendedProps.comment;
                $(exampleModal2).modal('show')
            }
	 },
    });

      calendar.setOption('locale', 'de');
      calendar.render();


  });

</script>
<!-- Modal -->
@foreach($appointments_events as $app)
<div class="modal fade" id="app{{$app->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document " style="max-width: 700px">
    <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
        <div class="p-4" style="background-color: #219653;border-radius:15px 15px 0 0">
            <div class="row g-0">
                <div class="col text-center" style="margin-right: -17px;">
                    <span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';">Appointment</span>
                </div>
                <div class="col-auto my-auto" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                    <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">

                <div class="row g-2">

                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Datum</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->appointment_date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4216 3.94684C13.111 4.09714 12.981 4.47098 13.1313 4.78149C13.5419 5.62973 13.75 6.54404 13.75 7.5C13.75 10.9462 10.9462 13.75 7.5 13.75C4.0538 13.75 1.25 10.9462 1.25 7.5C1.25 4.0538 4.0538 1.25 7.5 1.25C8.92807 1.25 10.2696 1.71631 11.38 2.59842C11.6493 2.81342 12.0432 2.7684 12.2581 2.49817C12.4731 2.22809 12.4281 1.83472 12.1577 1.62003C10.8432 0.575256 9.189 0 7.5 0C3.36472 0 0 3.36472 0 7.5C0 11.6353 3.36472 15 7.5 15C11.6353 15 15 11.6353 15 7.5C15 6.35406 14.7498 5.25589 14.2563 4.23721C14.1063 3.92593 13.7312 3.79623 13.4216 3.94684Z" fill="white"/>
                                        <path d="M7.5 2.5C7.155 2.5 6.875 2.78 6.875 3.125V7.5C6.875 7.845 7.155 8.125 7.5 8.125H10.625C10.97 8.125 11.25 7.845 11.25 7.5C11.25 7.155 10.97 6.875 10.625 6.875H8.125V3.125C8.125 2.78 7.845 2.5 7.5 2.5Z" fill="white"/>
                                        </svg>

                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Zeit</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->time}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7083 11.6667C13.7439 11.6667 14.5833 12.5061 14.5833 13.5417V14.7933L14.5768 14.8837C14.3178 16.6555 12.7263 17.5075 10.0557 17.5075C7.39468 17.5075 5.77775 16.6653 5.42872 14.9138L5.41667 14.7917V13.5417C5.41667 12.5061 6.25613 11.6667 7.29167 11.6667H12.7083ZM12.7083 12.9167H7.29167C6.94649 12.9167 6.66667 13.1965 6.66667 13.5417V14.7253C6.89982 15.7257 7.95885 16.2575 10.0557 16.2575C12.1524 16.2575 13.1639 15.7314 13.3333 14.7443V13.5417C13.3333 13.1965 13.0535 12.9167 12.7083 12.9167ZM13.5363 6.66576L18.125 6.66667C19.1605 6.66667 20 7.50613 20 8.54167V9.79331L19.9934 9.8837C19.7345 11.6555 18.1429 12.5075 15.4723 12.5075L15.2099 12.5047C14.9641 11.9101 14.5126 11.4232 13.9445 11.1312C14.3735 11.2153 14.8817 11.2575 15.4723 11.2575C17.569 11.2575 18.5805 10.7314 18.75 9.7443V8.54167C18.75 8.19649 18.4702 7.91667 18.125 7.91667H13.75C13.75 7.47803 13.6747 7.05699 13.5363 6.66576ZM1.875 6.66667L6.4637 6.66576C6.34838 6.99178 6.27686 7.33851 6.25622 7.69887L6.25 7.91667H1.875C1.52982 7.91667 1.25 8.19649 1.25 8.54167V9.72531C1.48316 10.7257 2.54219 11.2575 4.63899 11.2575C5.15738 11.2575 5.60944 11.2254 5.99883 11.162C5.45653 11.4565 5.02663 11.9312 4.78862 12.5055L4.63899 12.5075C1.97801 12.5075 0.361084 11.6653 0.0120523 9.91381L0 9.79167V8.54167C0 7.50613 0.839466 6.66667 1.875 6.66667ZM10 5C11.6108 5 12.9167 6.30584 12.9167 7.91667C12.9167 9.5275 11.6108 10.8333 10 10.8333C8.38917 10.8333 7.08333 9.5275 7.08333 7.91667C7.08333 6.30584 8.38917 5 10 5ZM10 6.25C9.07953 6.25 8.33333 6.99619 8.33333 7.91667C8.33333 8.83714 9.07953 9.58333 10 9.58333C10.9205 9.58333 11.6667 8.83714 11.6667 7.91667C11.6667 6.99619 10.9205 6.25 10 6.25ZM15.4167 0C17.0275 0 18.3333 1.30584 18.3333 2.91667C18.3333 4.5275 17.0275 5.83333 15.4167 5.83333C13.8058 5.83333 12.5 4.5275 12.5 2.91667C12.5 1.30584 13.8058 0 15.4167 0ZM4.58333 0C6.19416 0 7.5 1.30584 7.5 2.91667C7.5 4.5275 6.19416 5.83333 4.58333 5.83333C2.9725 5.83333 1.66667 4.5275 1.66667 2.91667C1.66667 1.30584 2.9725 0 4.58333 0ZM15.4167 1.25C14.4962 1.25 13.75 1.99619 13.75 2.91667C13.75 3.83714 14.4962 4.58333 15.4167 4.58333C16.3371 4.58333 17.0833 3.83714 17.0833 2.91667C17.0833 1.99619 16.3371 1.25 15.4167 1.25ZM4.58333 1.25C3.66286 1.25 2.91667 1.99619 2.91667 2.91667C2.91667 3.83714 3.66286 4.58333 4.58333 4.58333C5.50381 4.58333 6.25 3.83714 6.25 2.91667C6.25 1.99619 5.50381 1.25 4.58333 1.25Z" fill="white"/>
                                    </svg>

                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Personen</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->number_of_persons}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Vorname</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{ $app->first_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.665 11.28V13.28C14.6657 13.4657 14.6277 13.6495 14.5533 13.8196C14.479 13.9897 14.3699 14.1424 14.233 14.2679C14.0962 14.3934 13.9347 14.489 13.7588 14.5485C13.5829 14.608 13.3966 14.6301 13.2117 14.6133C11.1602 14.3904 9.18966 13.6894 7.45833 12.5667C5.84755 11.5431 4.48189 10.1775 3.45833 8.56668C2.33165 6.82748 1.63049 4.84734 1.41166 2.78668C1.395 2.60233 1.41691 2.41652 1.47599 2.2411C1.53508 2.06567 1.63004 1.90447 1.75484 1.76776C1.87964 1.63105 2.03153 1.52182 2.20086 1.44703C2.37018 1.37224 2.55322 1.33352 2.73833 1.33335H4.73833C5.06187 1.33016 5.37552 1.44473 5.62084 1.6557C5.86615 1.86667 6.02638 2.15964 6.07166 2.48001C6.15608 3.12006 6.31263 3.7485 6.53833 4.35335C6.62802 4.59196 6.64744 4.85129 6.59427 5.1006C6.5411 5.34991 6.41757 5.57875 6.23833 5.76001L5.39166 6.60668C6.3407 8.27571 7.72263 9.65764 9.39166 10.6067L10.2383 9.76001C10.4196 9.58077 10.6484 9.45725 10.8977 9.40408C11.1471 9.35091 11.4064 9.37032 11.645 9.46001C12.2498 9.68571 12.8783 9.84227 13.5183 9.92668C13.8422 9.97237 14.1379 10.1355 14.3494 10.385C14.5608 10.6345 14.6731 10.9531 14.665 11.28Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle" >Telephon</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->telephone}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hidden class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0L7.96875 0.799065C7.96875 0.799065 7.61629 1.30637 7.27404 1.91355C7.10291 2.21846 6.94201 2.53651 6.80409 2.85981C6.66617 3.18312 6.53846 3.48014 6.53846 3.86916C6.53846 4.97576 7.42473 5.88785 8.5 5.88785C9.57527 5.88785 10.4615 4.97576 10.4615 3.86916C10.4615 3.48014 10.3338 3.18312 10.1959 2.85981C10.058 2.53651 9.89709 2.21846 9.72596 1.91355C9.38371 1.30637 9.03125 0.799065 9.03125 0.799065L8.5 0ZM8.5 5.88785H6.53846V8.57944H2.61538C1.16977 8.57944 0 9.78329 0 11.271C0 11.9544 0.245192 12.5827 0.653846 13.0584V18H16.3462V13.0584C16.7548 12.5827 17 11.9544 17 11.271C17 9.78329 15.8302 8.57944 14.3846 8.57944H10.4615V5.88785H8.5ZM8.5 2.43925C8.54342 2.51285 8.53831 2.50759 8.58173 2.58645C8.73753 2.86244 8.90355 3.15683 9.01082 3.40654C9.11809 3.65625 9.15385 3.88756 9.15385 3.86916C9.15385 4.24241 8.86268 4.54206 8.5 4.54206C8.13732 4.54206 7.84615 4.24241 7.84615 3.86916C7.84615 3.88756 7.88191 3.65625 7.98918 3.40654C8.09645 3.15683 8.26247 2.86244 8.41827 2.58645C8.46169 2.50759 8.45658 2.51285 8.5 2.43925ZM7.84615 7.23364H9.15385V8.57944H7.84615V7.23364ZM2.61538 9.92523H14.3846C15.1636 9.92523 15.6923 10.4693 15.6923 11.271C15.6923 12.0727 15.1636 12.6168 14.3846 12.6168C13.6056 12.6168 13.0769 12.0727 13.0769 11.271H11.7692C11.7692 12.0727 11.2405 12.6168 10.4615 12.6168C9.68254 12.6168 9.15385 12.0727 9.15385 11.271H7.84615C7.84615 12.0727 7.31746 12.6168 6.53846 12.6168C5.75947 12.6168 5.23077 12.0727 5.23077 11.271H3.92308C3.92308 12.0727 3.39438 12.6168 2.61538 12.6168C1.83639 12.6168 1.30769 12.0727 1.30769 11.271C1.30769 10.4693 1.83639 9.92523 2.61538 9.92523ZM4.57692 13.0584C5.05709 13.6157 5.75691 13.9626 6.53846 13.9626C7.32001 13.9626 8.01983 13.6157 8.5 13.0584C8.98017 13.6157 9.67999 13.9626 10.4615 13.9626C11.2431 13.9626 11.9429 13.6157 12.4231 13.0584C12.9032 13.6157 13.6031 13.9626 14.3846 13.9626C14.6119 13.9626 14.829 13.9127 15.0385 13.8575V16.6542H1.96154V13.8575C2.17097 13.9127 2.38807 13.9626 2.61538 13.9626C3.39694 13.9626 4.09675 13.6157 4.57692 13.0584Z" fill="white"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Geburstag</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->birthdate}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17.6028C13.4183 17.6028 17 14.0211 17 9.60278C17 5.18451 13.4183 1.60278 9 1.60278C4.58172 1.60278 1 5.18451 1 9.60278C1 14.0211 4.58172 17.6028 9 17.6028Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 9.60278H17" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 1.60278C10.876 3.79347 11.9421 6.63641 12 9.60278C11.9421 12.5692 10.876 15.4121 9 17.6028C7.12404 15.4121 6.05794 12.5692 6 9.60278C6.05794 6.63641 7.12404 3.79347 9 1.60278V1.60278Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>



                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Nationalität</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1">{{$app->nationality}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                   
                       

                </div>
        </div>
      <div hidden class="modal-header">
                <div class="col-md-4" style="text-align : left">
                <h5 class="modal-title" id="">Termindetails</h5>
                </div>
                <div class="col-md-6" style="text-align : center">
                <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B>(<span ></span>personen)</h4>
                </div>
                <div class="col-md-2" style="text-align : right">
                <h5 class="modal-title"><B>ID :</B><span></span></h5>
            </div>
      </div>

      <div hidden class="modal-body">




	    <p style="line-height :8px"><B>Vorname :</B><span></span></p>
	    <p style="line-height :8px"><B>Telefon :</B><span></span></p>
	    <p style="line-height :8px"><B>Geburtstag :</B><span></span></p>
	    <p style="line-height :8px"><B>Nationalitet :</B><span></span></p>
	    <p style="line-height :8px"><B>Status der Aufgabe :</B><span></span></p>
		<hr>
		<!--<p><B>address :</B><span id='address'></span></p> -->
		<div class="row" >
			<div class="col-md-6" style="text-align : left; ">
			<a href="#" onclick='document.getElementById("change_fs").style.display = "block" ;' class="btn btn-info btn-sm"><i class="far fa-edit"></i> Bearbeiten</a>
			</div>
			<div class="col-md-6" style="text-align : right ;">

			</div>
			<hr>
		</div>

      </div>

    </div>
  </div>
</div>
@endforeach
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document " style="max-width: 700px">
    <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
        <div class="p-4" style="background-color: #219653;border-radius:15px 15px 0 0">
            <div class="row g-0">
                <div class="col text-center" style="margin-right: -17px;">
                    <span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';">Appointment</span>
                </div>
                <div class="col-auto my-auto" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                    <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">

                <div class="row g-2">

                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Datum</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="datumm"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4216 3.94684C13.111 4.09714 12.981 4.47098 13.1313 4.78149C13.5419 5.62973 13.75 6.54404 13.75 7.5C13.75 10.9462 10.9462 13.75 7.5 13.75C4.0538 13.75 1.25 10.9462 1.25 7.5C1.25 4.0538 4.0538 1.25 7.5 1.25C8.92807 1.25 10.2696 1.71631 11.38 2.59842C11.6493 2.81342 12.0432 2.7684 12.2581 2.49817C12.4731 2.22809 12.4281 1.83472 12.1577 1.62003C10.8432 0.575256 9.189 0 7.5 0C3.36472 0 0 3.36472 0 7.5C0 11.6353 3.36472 15 7.5 15C11.6353 15 15 11.6353 15 7.5C15 6.35406 14.7498 5.25589 14.2563 4.23721C14.1063 3.92593 13.7312 3.79623 13.4216 3.94684Z" fill="white"/>
                                        <path d="M7.5 2.5C7.155 2.5 6.875 2.78 6.875 3.125V7.5C6.875 7.845 7.155 8.125 7.5 8.125H10.625C10.97 8.125 11.25 7.845 11.25 7.5C11.25 7.155 10.97 6.875 10.625 6.875H8.125V3.125C8.125 2.78 7.845 2.5 7.5 2.5Z" fill="white"/>
                                        </svg>

                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Zeit</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="zeitt"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7083 11.6667C13.7439 11.6667 14.5833 12.5061 14.5833 13.5417V14.7933L14.5768 14.8837C14.3178 16.6555 12.7263 17.5075 10.0557 17.5075C7.39468 17.5075 5.77775 16.6653 5.42872 14.9138L5.41667 14.7917V13.5417C5.41667 12.5061 6.25613 11.6667 7.29167 11.6667H12.7083ZM12.7083 12.9167H7.29167C6.94649 12.9167 6.66667 13.1965 6.66667 13.5417V14.7253C6.89982 15.7257 7.95885 16.2575 10.0557 16.2575C12.1524 16.2575 13.1639 15.7314 13.3333 14.7443V13.5417C13.3333 13.1965 13.0535 12.9167 12.7083 12.9167ZM13.5363 6.66576L18.125 6.66667C19.1605 6.66667 20 7.50613 20 8.54167V9.79331L19.9934 9.8837C19.7345 11.6555 18.1429 12.5075 15.4723 12.5075L15.2099 12.5047C14.9641 11.9101 14.5126 11.4232 13.9445 11.1312C14.3735 11.2153 14.8817 11.2575 15.4723 11.2575C17.569 11.2575 18.5805 10.7314 18.75 9.7443V8.54167C18.75 8.19649 18.4702 7.91667 18.125 7.91667H13.75C13.75 7.47803 13.6747 7.05699 13.5363 6.66576ZM1.875 6.66667L6.4637 6.66576C6.34838 6.99178 6.27686 7.33851 6.25622 7.69887L6.25 7.91667H1.875C1.52982 7.91667 1.25 8.19649 1.25 8.54167V9.72531C1.48316 10.7257 2.54219 11.2575 4.63899 11.2575C5.15738 11.2575 5.60944 11.2254 5.99883 11.162C5.45653 11.4565 5.02663 11.9312 4.78862 12.5055L4.63899 12.5075C1.97801 12.5075 0.361084 11.6653 0.0120523 9.91381L0 9.79167V8.54167C0 7.50613 0.839466 6.66667 1.875 6.66667ZM10 5C11.6108 5 12.9167 6.30584 12.9167 7.91667C12.9167 9.5275 11.6108 10.8333 10 10.8333C8.38917 10.8333 7.08333 9.5275 7.08333 7.91667C7.08333 6.30584 8.38917 5 10 5ZM10 6.25C9.07953 6.25 8.33333 6.99619 8.33333 7.91667C8.33333 8.83714 9.07953 9.58333 10 9.58333C10.9205 9.58333 11.6667 8.83714 11.6667 7.91667C11.6667 6.99619 10.9205 6.25 10 6.25ZM15.4167 0C17.0275 0 18.3333 1.30584 18.3333 2.91667C18.3333 4.5275 17.0275 5.83333 15.4167 5.83333C13.8058 5.83333 12.5 4.5275 12.5 2.91667C12.5 1.30584 13.8058 0 15.4167 0ZM4.58333 0C6.19416 0 7.5 1.30584 7.5 2.91667C7.5 4.5275 6.19416 5.83333 4.58333 5.83333C2.9725 5.83333 1.66667 4.5275 1.66667 2.91667C1.66667 1.30584 2.9725 0 4.58333 0ZM15.4167 1.25C14.4962 1.25 13.75 1.99619 13.75 2.91667C13.75 3.83714 14.4962 4.58333 15.4167 4.58333C16.3371 4.58333 17.0833 3.83714 17.0833 2.91667C17.0833 1.99619 16.3371 1.25 15.4167 1.25ZM4.58333 1.25C3.66286 1.25 2.91667 1.99619 2.91667 2.91667C2.91667 3.83714 3.66286 4.58333 4.58333 4.58333C5.50381 4.58333 6.25 3.83714 6.25 2.91667C6.25 1.99619 5.50381 1.25 4.58333 1.25Z" fill="white"/>
                                    </svg>

                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Personen</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='number_of_persons'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Vorname</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='name'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.665 11.28V13.28C14.6657 13.4657 14.6277 13.6495 14.5533 13.8196C14.479 13.9897 14.3699 14.1424 14.233 14.2679C14.0962 14.3934 13.9347 14.489 13.7588 14.5485C13.5829 14.608 13.3966 14.6301 13.2117 14.6133C11.1602 14.3904 9.18966 13.6894 7.45833 12.5667C5.84755 11.5431 4.48189 10.1775 3.45833 8.56668C2.33165 6.82748 1.63049 4.84734 1.41166 2.78668C1.395 2.60233 1.41691 2.41652 1.47599 2.2411C1.53508 2.06567 1.63004 1.90447 1.75484 1.76776C1.87964 1.63105 2.03153 1.52182 2.20086 1.44703C2.37018 1.37224 2.55322 1.33352 2.73833 1.33335H4.73833C5.06187 1.33016 5.37552 1.44473 5.62084 1.6557C5.86615 1.86667 6.02638 2.15964 6.07166 2.48001C6.15608 3.12006 6.31263 3.7485 6.53833 4.35335C6.62802 4.59196 6.64744 4.85129 6.59427 5.1006C6.5411 5.34991 6.41757 5.57875 6.23833 5.76001L5.39166 6.60668C6.3407 8.27571 7.72263 9.65764 9.39166 10.6067L10.2383 9.76001C10.4196 9.58077 10.6484 9.45725 10.8977 9.40408C11.1471 9.35091 11.4064 9.37032 11.645 9.46001C12.2498 9.68571 12.8783 9.84227 13.5183 9.92668C13.8422 9.97237 14.1379 10.1355 14.3494 10.385C14.5608 10.6345 14.6731 10.9531 14.665 11.28Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle" >Telephon</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='telephone'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hidden class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0L7.96875 0.799065C7.96875 0.799065 7.61629 1.30637 7.27404 1.91355C7.10291 2.21846 6.94201 2.53651 6.80409 2.85981C6.66617 3.18312 6.53846 3.48014 6.53846 3.86916C6.53846 4.97576 7.42473 5.88785 8.5 5.88785C9.57527 5.88785 10.4615 4.97576 10.4615 3.86916C10.4615 3.48014 10.3338 3.18312 10.1959 2.85981C10.058 2.53651 9.89709 2.21846 9.72596 1.91355C9.38371 1.30637 9.03125 0.799065 9.03125 0.799065L8.5 0ZM8.5 5.88785H6.53846V8.57944H2.61538C1.16977 8.57944 0 9.78329 0 11.271C0 11.9544 0.245192 12.5827 0.653846 13.0584V18H16.3462V13.0584C16.7548 12.5827 17 11.9544 17 11.271C17 9.78329 15.8302 8.57944 14.3846 8.57944H10.4615V5.88785H8.5ZM8.5 2.43925C8.54342 2.51285 8.53831 2.50759 8.58173 2.58645C8.73753 2.86244 8.90355 3.15683 9.01082 3.40654C9.11809 3.65625 9.15385 3.88756 9.15385 3.86916C9.15385 4.24241 8.86268 4.54206 8.5 4.54206C8.13732 4.54206 7.84615 4.24241 7.84615 3.86916C7.84615 3.88756 7.88191 3.65625 7.98918 3.40654C8.09645 3.15683 8.26247 2.86244 8.41827 2.58645C8.46169 2.50759 8.45658 2.51285 8.5 2.43925ZM7.84615 7.23364H9.15385V8.57944H7.84615V7.23364ZM2.61538 9.92523H14.3846C15.1636 9.92523 15.6923 10.4693 15.6923 11.271C15.6923 12.0727 15.1636 12.6168 14.3846 12.6168C13.6056 12.6168 13.0769 12.0727 13.0769 11.271H11.7692C11.7692 12.0727 11.2405 12.6168 10.4615 12.6168C9.68254 12.6168 9.15385 12.0727 9.15385 11.271H7.84615C7.84615 12.0727 7.31746 12.6168 6.53846 12.6168C5.75947 12.6168 5.23077 12.0727 5.23077 11.271H3.92308C3.92308 12.0727 3.39438 12.6168 2.61538 12.6168C1.83639 12.6168 1.30769 12.0727 1.30769 11.271C1.30769 10.4693 1.83639 9.92523 2.61538 9.92523ZM4.57692 13.0584C5.05709 13.6157 5.75691 13.9626 6.53846 13.9626C7.32001 13.9626 8.01983 13.6157 8.5 13.0584C8.98017 13.6157 9.67999 13.9626 10.4615 13.9626C11.2431 13.9626 11.9429 13.6157 12.4231 13.0584C12.9032 13.6157 13.6031 13.9626 14.3846 13.9626C14.6119 13.9626 14.829 13.9127 15.0385 13.8575V16.6542H1.96154V13.8575C2.17097 13.9127 2.38807 13.9626 2.61538 13.9626C3.39694 13.9626 4.09675 13.6157 4.57692 13.0584Z" fill="white"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Geburstag</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='birthdate'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17.6028C13.4183 17.6028 17 14.0211 17 9.60278C17 5.18451 13.4183 1.60278 9 1.60278C4.58172 1.60278 1 5.18451 1 9.60278C1 14.0211 4.58172 17.6028 9 17.6028Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 9.60278H17" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 1.60278C10.876 3.79347 11.9421 6.63641 12 9.60278C11.9421 12.5692 10.876 15.4121 9 17.6028C7.12404 15.4121 6.05794 12.5692 6 9.60278C6.05794 6.63641 7.12404 3.79347 9 1.60278V1.60278Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>



                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Nationalität</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='nationality'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5648 0H0.473052C0.222249 0 0 0.18473 0 0.412573V11.9131C0 12.0638 0.0999127 12.2025 0.245467 12.2749L6.29603 15.2833C6.36393 15.3171 6.44141 15.334 6.51652 15.334C6.59162 15.334 6.66792 15.3171 6.73587 15.2833L12.7729 12.2749C12.9184 12.2025 13 12.0638 13 11.9131V0.412573C13 0.18473 12.8156 0 12.5648 0ZM12.0917 11.6687L6.5 14.4511L0.908297 11.6687V0.825147H12.0917V11.6687Z" fill="white"/>
                                            <path d="M10.2768 10.7832V8.84448L6.50644 10.6495L2.72656 8.84448V10.7785L6.50638 12.6522L10.2768 10.7832Z" fill="white"/>
                                            <path d="M10.2768 7.91311V5.97443L6.50644 7.77943L2.72656 5.97443V7.90842L6.50638 9.78217L10.2768 7.91311Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Status</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='status_task'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-12 col-sm-6">
                        <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                            <div class="row g-0">
                                <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7083 11.6667C13.7439 11.6667 14.5833 12.5061 14.5833 13.5417V14.7933L14.5768 14.8837C14.3178 16.6555 12.7263 17.5075 10.0557 17.5075C7.39468 17.5075 5.77775 16.6653 5.42872 14.9138L5.41667 14.7917V13.5417C5.41667 12.5061 6.25613 11.6667 7.29167 11.6667H12.7083ZM12.7083 12.9167H7.29167C6.94649 12.9167 6.66667 13.1965 6.66667 13.5417V14.7253C6.89982 15.7257 7.95885 16.2575 10.0557 16.2575C12.1524 16.2575 13.1639 15.7314 13.3333 14.7443V13.5417C13.3333 13.1965 13.0535 12.9167 12.7083 12.9167ZM13.5363 6.66576L18.125 6.66667C19.1605 6.66667 20 7.50613 20 8.54167V9.79331L19.9934 9.8837C19.7345 11.6555 18.1429 12.5075 15.4723 12.5075L15.2099 12.5047C14.9641 11.9101 14.5126 11.4232 13.9445 11.1312C14.3735 11.2153 14.8817 11.2575 15.4723 11.2575C17.569 11.2575 18.5805 10.7314 18.75 9.7443V8.54167C18.75 8.19649 18.4702 7.91667 18.125 7.91667H13.75C13.75 7.47803 13.6747 7.05699 13.5363 6.66576ZM1.875 6.66667L6.4637 6.66576C6.34838 6.99178 6.27686 7.33851 6.25622 7.69887L6.25 7.91667H1.875C1.52982 7.91667 1.25 8.19649 1.25 8.54167V9.72531C1.48316 10.7257 2.54219 11.2575 4.63899 11.2575C5.15738 11.2575 5.60944 11.2254 5.99883 11.162C5.45653 11.4565 5.02663 11.9312 4.78862 12.5055L4.63899 12.5075C1.97801 12.5075 0.361084 11.6653 0.0120523 9.91381L0 9.79167V8.54167C0 7.50613 0.839466 6.66667 1.875 6.66667ZM10 5C11.6108 5 12.9167 6.30584 12.9167 7.91667C12.9167 9.5275 11.6108 10.8333 10 10.8333C8.38917 10.8333 7.08333 9.5275 7.08333 7.91667C7.08333 6.30584 8.38917 5 10 5ZM10 6.25C9.07953 6.25 8.33333 6.99619 8.33333 7.91667C8.33333 8.83714 9.07953 9.58333 10 9.58333C10.9205 9.58333 11.6667 8.83714 11.6667 7.91667C11.6667 6.99619 10.9205 6.25 10 6.25ZM15.4167 0C17.0275 0 18.3333 1.30584 18.3333 2.91667C18.3333 4.5275 17.0275 5.83333 15.4167 5.83333C13.8058 5.83333 12.5 4.5275 12.5 2.91667C12.5 1.30584 13.8058 0 15.4167 0ZM4.58333 0C6.19416 0 7.5 1.30584 7.5 2.91667C7.5 4.5275 6.19416 5.83333 4.58333 5.83333C2.9725 5.83333 1.66667 4.5275 1.66667 2.91667C1.66667 1.30584 2.9725 0 4.58333 0ZM15.4167 1.25C14.4962 1.25 13.75 1.99619 13.75 2.91667C13.75 3.83714 14.4962 4.58333 15.4167 4.58333C16.3371 4.58333 17.0833 3.83714 17.0833 2.91667C17.0833 1.99619 16.3371 1.25 15.4167 1.25ZM4.58333 1.25C3.66286 1.25 2.91667 1.99619 2.91667 2.91667C2.91667 3.83714 3.66286 4.58333 4.58333 4.58333C5.50381 4.58333 6.25 3.83714 6.25 2.91667C6.25 1.99619 5.50381 1.25 4.58333 1.25Z" fill="white"/>
                                    </svg>

                                </div>
                                <div class="col-auto pe-4 my-auto">
                                    <span class="appointmentModalSpanStyle">Berater</span>
                                </div>
                                <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='berater'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div style="display : none" id="change_fs" class="pt-4 px-0">
                                {{ Form::open(array('url' => 'changeTS' , 'method' => 'get')) }}
                                    <input type="hidden" value="" id="id_lead_input" name="id_lead_input">
                                    <div class="row g-2 mx-0 px-0">
                                        <div class="form-group col-sm">
                                            {!! Form::label('ts_id', 'FS:') !!}
                                            <select name="ts_id" id="" class="form-control form-select form-select-sm p-2" required style="box-shadow: 0px 4px 4px rgb(185 185 185 / 25%) !important;
                                        border-radius: 9px !important;
                                        border: none !important;">
                                                <option value="" id="">*******</option>
                                                @foreach($users as $user)
                                                <option value="{!! $user->id !!}" id="OP-{!! $user->id !!}">{!! $user->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm">
                                            {!! Form::label('ts_id', 'Date:') !!}
                                            <input type="date"  id="date_new" name="date_new" class="form-control form-control-sm p-2" value="" disabled style="box-shadow: 0px 4px 4px rgb(185 185 185 / 25%) !important;
                                        border-radius: 9px !important;
                                        border: none !important;">
                                        </div>
                                        <div class="form-group col-sm-auto">
                                            {!! Form::label('ts_id', 'Time:') !!}
                                            <input type="time"  id="time_new" name="time_new" class="form-control form-control-sm p-2" value="" min="08:00" max="20:00" disabled style="box-shadow: 0px 4px 4px rgb(185 185 185 / 25%) !important;
                                        border-radius: 9px !important;
                                        border: none !important;">
                                        </div>
                                        <div class="col-6 col-sm-auto mt-auto pt-3 pt-sm-0 pe-1" style="text-align : right">
                                            <button style="background: #EB5757 !important;border-radius: 9px !important;border: none" class="px-4 py-2 w-100" href="#" onclick="$(exampleModal).modal('hide'); ">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18 2L2 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M2 2L18 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                            </button>
                                        </div>
                                        <div class="col-6 col-sm-auto mt-auto pt-3 pt-sm-0 ps-1">
                                            <button class="px-4 py-2 w-100" type="submit" style="background: #219653;border-radius: 9px;border: none;">
                                                <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 10.5333L9.33333 18L24 2" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                {{ Form::close() }}
                        </div>
                        <div class="row g-0 justify-content-center">
                            <div class="col-12 col-md-6 pt-4">
                            {{ Form::open(array('url' => 'changeTS' , 'method' => 'get')) }}
                                <input type="hidden"  id="id_lead_input2" name="id_lead_input">
                                <input type="hidden"  id="ts_id2" name="ts_id" value="0">
                                <input type="hidden"  id="time_new2" name="time_new">
                                <input type="hidden"  id="date_new2" name="date_new">
                                <button type="submit" class="py-2 w-100" style="background: #2F60DC; border: none; border-radius: 7px;color: #fff;font-weight: 600;">Berater entfernen</button>

			                {{ Form::close() }}
                            </div>
                        </div>

                </div>
        </div>
      <div hidden class="modal-header">
                <div class="col-md-4" style="text-align : left">
                <h5 class="modal-title" id="exampleModalLabel">Termindetails</h5>
                </div>
                <div class="col-md-6" style="text-align : center">
                <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B>(<span ></span>personen)</h4>
                </div>
                <div class="col-md-2" style="text-align : right">
                <h5 class="modal-title"><B>ID :</B><span id='id'></span></h5>
            </div>
      </div>

      <div hidden class="modal-body">




	    <p style="line-height :8px"><B>Vorname :</B><span></span></p>
	    <p style="line-height :8px"><B>Telefon :</B><span></span></p>
	    <p style="line-height :8px"><B>Geburtstag :</B><span></span></p>
	    <p style="line-height :8px"><B>Nationalitet :</B><span></span></p>
	    <p style="line-height :8px"><B>Status der Aufgabe :</B><span></span></p>
		<hr>
		<!--<p><B>address :</B><span id='address'></span></p> -->
		<div class="row" >
			<div class="col-md-6" style="text-align : left; ">
			<a href="#" onclick='document.getElementById("change_fs").style.display = "block" ;' class="btn btn-info btn-sm"><i class="far fa-edit"></i> Bearbeiten</a>
			</div>
			<div class="col-md-6" style="text-align : right ;">

			</div>
			<hr>
		</div>

      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document " style="max-width: 700px">
        <div class="modal-content" style="border-radius:16px !important;border: none !important;">
            <div hidden class="modal-header">
                <div class="col-md-4" style="text-align : left">
                    <h5 class="modal-title" id="exampleModalLabel">Abwesenheit</h5>
                </div>
                <div class="col-md-6" style="text-align : center">
                    <h4 style="text-align : center; "><B><span id='start1' style="color : #e57e2d"></span></B></h4>
                </div>
            </div>
            <div hidden class="modal-body" style="margin-top: 30px;">
                <p style="line-height :8px;"><B>Vorname :</B><span id=''></span></p>
                <b>Bezeichnung :</b><span style="display: none" id=''> </span><span id=''> </span>
                <p><B>Aus :</B><span id=''></span></p>
                <p><B>Zu :</B><span id=''></span></p>
                <p style="margin-bottom: 30px;"><B>Status :</B><span id=''></span></p>
                <hr>
            </div>
            <div class="p-4" style="background-color: #9b51e0;border-radius:15px 15px 0 0">
				<div class="row g-0">
					<div class="col text-center">
						<span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';">Abwesenheit</span>
					</div>
				</div>
			</div>
            <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">
                <div class="row g-2">
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Vorname</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='name1'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="12" height="2" rx="1" fill="white"/>
                                        <rect y="4" width="12" height="2" rx="1" fill="white"/>
                                    </svg>



                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Bezeichnung</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='title1'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Aus</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="from1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Zu</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="to1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6 0C14.8759 0 15.9228 1.00126 15.9959 2.25921L16 2.4V10.4C16 11.6759 14.9987 12.7228 13.7408 12.7959L13.6 12.8H10.8L8.64 15.68C8.4888 15.8816 8.252 16 8 16C7.7795 16 7.57064 15.9093 7.42057 15.7516L7.36 15.68L5.2 12.8H2.4C1.12406 12.8 0.0772285 11.7987 0.00408249 10.5408L0 10.4V2.4C0 1.12406 1.00126 0.0772285 2.25921 0.00408249L2.4 0H13.6ZM13.6 1.6H2.4C1.99069 1.6 1.65173 1.90972 1.6054 2.30689L1.6 2.4V10.4C1.6 10.8093 1.90972 11.1483 2.30689 11.1946L2.4 11.2H5.6C5.8205 11.2 6.02936 11.2907 6.17942 11.4484L6.24 11.52L8 13.8664L9.76 11.52C9.8923 11.3436 10.0901 11.2309 10.3063 11.2055L10.4 11.2H13.6C14.0093 11.2 14.3483 10.8903 14.3946 10.4931L14.4 10.4V2.4C14.4 1.99069 14.0903 1.65173 13.6931 1.6054L13.6 1.6ZM12 7.2C12.4416 7.2 12.8 7.5584 12.8 8C12.8 8.41006 12.491 8.74837 12.0933 8.79461L12 8.8H4C3.5584 8.8 3.2 8.4416 3.2 8C3.2 7.58994 3.50903 7.25162 3.90675 7.20539L4 7.2H12ZM12 4C12.4416 4 12.8 4.3584 12.8 4.8C12.8 5.21006 12.491 5.54838 12.0933 5.59461L12 5.6H4C3.5584 5.6 3.2 5.2416 3.2 4.8C3.2 4.38994 3.50903 4.05162 3.90675 4.00539L4 4H12Z" fill="white"/>
                                    </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Comment</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="description1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #9b51e0;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5648 0H0.473052C0.222249 0 0 0.18473 0 0.412573V11.9131C0 12.0638 0.0999127 12.2025 0.245467 12.2749L6.29603 15.2833C6.36393 15.3171 6.44141 15.334 6.51652 15.334C6.59162 15.334 6.66792 15.3171 6.73587 15.2833L12.7729 12.2749C12.9184 12.2025 13 12.0638 13 11.9131V0.412573C13 0.18473 12.8156 0 12.5648 0ZM12.0917 11.6687L6.5 14.4511L0.908297 11.6687V0.825147H12.0917V11.6687Z" fill="white"/>
                                            <path d="M10.2768 10.7832V8.84448L6.50644 10.6495L2.72656 8.84448V10.7785L6.50638 12.6522L10.2768 10.7832Z" fill="white"/>
                                            <path d="M10.2768 7.91311V5.97443L6.50644 7.77943L2.72656 5.97443V7.90842L6.50638 9.78217L10.2768 7.91311Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Status</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='status1'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="row g-0 justify-content-center">
                                <div class="col-6 col-md-4 mt-auto pt-3 pt-sm-0 pe-1" id="approveab">
                                    {{ Form::open(array('url' => 'approveAbsense' , 'method' => 'get')) }}
                                    <input type="hidden"  id="ab_id" name="ab_id">
                                            <button class="px-4 py-2 w-100" type="submit" style="background: #219653;border-radius: 9px;border: none;">
                                                <svg width="20" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 10.5333L9.33333 18L24 2" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>


                                    {{ Form::close() }}
                                </div>
                                <div class="col-6 col-md-4 mt-auto pt-3 pt-sm-0 ps-1" id="declineab">

                                    {{ Form::open(array('url'=> 'declineAbsense','method'=> 'get','class'=>'')) }}
                                    <input type="hidden"  id="ab_id1" name="ab_id1">


                                            <button type="submit" style="background: #EB5757 !important;border-radius: 9px !important;border: none" class="px-4 py-2 w-100 h-100" href="#">
                                                <svg width="20" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                    <path d="M18 2L2 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M2 2L18 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                            </button>

                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document " style="max-width: 700px">
        <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
        <div class="p-4" style="background-color: #E178AD;border-radius:15px 15px 0 0">
            <div class="row g-0">
                <div class="col text-center" style="margin-right: -17px;">

                    <span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';">Mitarbeiterbesprechungen</span>

                </div>
                <div class="col-auto my-auto d-none" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                    <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">

                <div class="row g-2">
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Vorname:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='name2'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5648 0H0.473052C0.222249 0 0 0.18473 0 0.412573V11.9131C0 12.0638 0.0999127 12.2025 0.245467 12.2749L6.29603 15.2833C6.36393 15.3171 6.44141 15.334 6.51652 15.334C6.59162 15.334 6.66792 15.3171 6.73587 15.2833L12.7729 12.2749C12.9184 12.2025 13 12.0638 13 11.9131V0.412573C13 0.18473 12.8156 0 12.5648 0ZM12.0917 11.6687L6.5 14.4511L0.908297 11.6687V0.825147H12.0917V11.6687Z" fill="white"/>
                                            <path d="M10.2768 10.7832V8.84448L6.50644 10.6495L2.72656 8.84448V10.7785L6.50638 12.6522L10.2768 10.7832Z" fill="white"/>
                                            <path d="M10.2768 7.91311V5.97443L6.50644 7.77943L2.72656 5.97443V7.90842L6.50638 9.78217L10.2768 7.91311Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Typ:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='status2'></span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">

                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Titel:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='title2'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">

                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Addres:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='addres'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Datum & Zeit:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="date2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6 0C14.8759 0 15.9228 1.00126 15.9959 2.25921L16 2.4V10.4C16 11.6759 14.9987 12.7228 13.7408 12.7959L13.6 12.8H10.8L8.64 15.68C8.4888 15.8816 8.252 16 8 16C7.7795 16 7.57064 15.9093 7.42057 15.7516L7.36 15.68L5.2 12.8H2.4C1.12406 12.8 0.0772285 11.7987 0.00408249 10.5408L0 10.4V2.4C0 1.12406 1.00126 0.0772285 2.25921 0.00408249L2.4 0H13.6ZM13.6 1.6H2.4C1.99069 1.6 1.65173 1.90972 1.6054 2.30689L1.6 2.4V10.4C1.6 10.8093 1.90972 11.1483 2.30689 11.1946L2.4 11.2H5.6C5.8205 11.2 6.02936 11.2907 6.17942 11.4484L6.24 11.52L8 13.8664L9.76 11.52C9.8923 11.3436 10.0901 11.2309 10.3063 11.2055L10.4 11.2H13.6C14.0093 11.2 14.3483 10.8903 14.3946 10.4931L14.4 10.4V2.4C14.4 1.99069 14.0903 1.65173 13.6931 1.6054L13.6 1.6ZM12 7.2C12.4416 7.2 12.8 7.5584 12.8 8C12.8 8.41006 12.491 8.74837 12.0933 8.79461L12 8.8H4C3.5584 8.8 3.2 8.4416 3.2 8C3.2 7.58994 3.50903 7.25162 3.90675 7.20539L4 7.2H12ZM12 4C12.4416 4 12.8 4.3584 12.8 4.8C12.8 5.21006 12.491 5.54838 12.0933 5.59461L12 5.6H4C3.5584 5.6 3.2 5.2416 3.2 4.8C3.2 4.38994 3.50903 4.05162 3.90675 4.00539L4 4H12Z" fill="white"/>
                                    </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Kommentar:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="comment2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                </div>
        </div>
            <div class="modal-header" hidden>
                <div class="col-md-4" style="text-align : left">
                    <h5 class="modal-title" id="exampleModalLabel">Abwesenheit</h5>
                </div>
                <div class="col-md-6" style="text-align : center">
                    <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                </div>
            </div>
            <div class="modal-body" hidden style="margin-top: 30px;">
                <p style="line-height :8px;"><B>Vorname :</B><span id=''></span></p>
                <b>Bezeichnung :</b><span  id=''></span><span id='description'> </span>
                <p><B>Aus :</B><span id=''></span></p>
                <p><B>Comment :</B><span id=''></span></p>
                <p style="margin-bottom: 30px;"><B>Status :</B><span id=''></span></p>
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
            </div>

        </div>
    </div>



<div class="col-12 col-sm-12 col-md-12 pt-3 g-0">

{{ Form::open(array('url' => 'Appointments' , 'method' => 'get')) }}
<div class="mx-3 px-3 py-3" style=" border-radius:25px;background: #F9FAFC;">
<div class="row g-0">
        <div class="col-auto cornerSvgKalendar">
        <svg width="139" height="133" viewBox="0 0 139 133" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_28_428)">
            <path d="M37.3167 69.451C39.6407 73.3453 46.252 77.1722 49.7809 79.9343C53.3098 82.6964 48.7205 90.532 52.917 91.7414C57.1135 92.9507 70.0136 87.5101 74.2388 86.9825C78.464 86.455 82.4971 85.0594 86.1078 82.8753C89.7184 80.6912 92.836 77.7614 95.2825 74.2533C97.729 70.7452 99.4564 66.7273 100.366 62.4292C101.276 58.1311 101.35 53.6369 100.585 49.2032C99.8196 44.7695 99.1988 37.2112 98.4985 33.0435L74.2388 33.0435L62.025 33.0435C56.7638 33.0435 51.5876 34.4062 46.9953 37V37L44.9828 38.6112C43.011 40.1899 41.3481 42.1233 40.0792 44.3125V44.3125C38.27 47.4337 37.3167 50.9796 37.3167 54.5876L37.3167 69.451Z" fill="#DCE4F9"/>
            </g>
            <path d="M74.1401 59.7263C74.4066 59.7263 74.6226 59.9359 74.6226 60.1945C74.6226 60.4531 74.4066 60.6628 74.1401 60.6628H69.9885C69.722 60.6628 69.5059 60.4531 69.5059 60.1945C69.5059 59.9359 69.722 59.7263 69.9885 59.7263H74.1401ZM76.8185 58.0842C76.8185 57.8256 76.6024 57.616 76.336 57.616H69.9885C69.722 57.616 69.5059 57.8256 69.5059 58.0842C69.5059 58.3428 69.722 58.5525 69.9885 58.5525H76.336C76.6024 58.5525 76.8185 58.3428 76.8185 58.0842ZM66.3948 47.3606V45.286C66.3948 45.0274 66.6108 44.8177 66.8773 44.8177L68.6278 44.8167C68.6278 43.815 69.4676 43 70.4999 43C71.5323 43 72.3722 43.815 72.3722 44.8167V44.8177H74.1226C74.3891 44.8177 74.6051 45.0274 74.6051 45.286V47.3606C74.6051 47.6192 74.3891 47.8288 74.1226 47.8288H66.8773C66.6108 47.8288 66.3948 47.6192 66.3948 47.3606ZM67.3598 46.8923H73.64V45.7542H71.8896C71.6231 45.7542 71.4071 45.5446 71.4071 45.286V44.8167C71.4071 44.3313 71.0002 43.9365 70.5 43.9365C69.9998 43.9365 69.5928 44.3313 69.5928 44.8167V45.286C69.5928 45.5446 69.3768 45.7542 69.1103 45.7542H67.3598V46.8923H67.3598ZM82 46.4119V70.8718C82 71.4939 81.4785 72 80.8375 72H60.1625C59.5215 72 59 71.4939 59 70.8718V46.4119C59 45.7898 59.5215 45.2838 60.1625 45.2838H64.8371C65.1036 45.2838 65.3196 45.4934 65.3196 45.752C65.3196 46.0106 65.1036 46.2203 64.8371 46.2203H62.1425V68.8078H78.8575V46.2203H76.1628C75.8963 46.2203 75.6803 46.0106 75.6803 45.752C75.6803 45.4934 75.8963 45.2838 76.1628 45.2838H80.8374C81.4785 45.2838 82 45.7898 82 46.4119ZM81.035 46.4119C81.035 46.308 80.9444 46.2203 80.8375 46.2203H79.8225V69.2761C79.8225 69.5347 79.6065 69.7443 79.34 69.7443H61.6599C61.3934 69.7443 61.1774 69.5347 61.1774 69.2761V46.2203H60.1625C60.0554 46.2203 59.965 46.3081 59.965 46.4119V70.8718C59.965 70.9757 60.0555 71.0635 60.1625 71.0635H80.8375C80.9445 71.0635 81.035 70.9757 81.035 70.8718V46.4119ZM64.4294 51.584C64.1965 51.7097 64.1126 51.9948 64.2421 52.2208L65.1287 53.7685C65.2138 53.9171 65.3752 54.0093 65.5504 54.0093C65.7256 54.0093 65.887 53.9171 65.9722 53.7685L67.5177 51.0706C67.6473 50.8446 67.5634 50.5595 67.3305 50.4338C67.0977 50.3082 66.8037 50.3895 66.6742 50.6156L65.5504 52.5773L65.0855 51.7657C64.9562 51.5397 64.6623 51.4583 64.4294 51.584ZM67.3305 57.3812C67.0976 57.2555 66.8037 57.3369 66.6743 57.5629L65.5504 59.5246L65.0856 58.713C64.9561 58.487 64.6622 58.4054 64.4293 58.5313C64.1964 58.657 64.1125 58.9421 64.242 59.1681L65.1286 60.7158C65.2138 60.8644 65.3751 60.9566 65.5504 60.9566C65.7255 60.9566 65.887 60.8645 65.9721 60.7158L67.5177 58.018C67.6473 57.792 67.5634 57.5069 67.3305 57.3812ZM69.9885 53.7154H74.1401C74.4066 53.7154 74.6227 53.5058 74.6227 53.2472C74.6227 52.9886 74.4066 52.7789 74.1401 52.7789H69.9885C69.722 52.7789 69.5059 52.9886 69.5059 53.2472C69.5059 53.5058 69.722 53.7154 69.9885 53.7154ZM76.336 50.6686H69.9885C69.722 50.6686 69.5059 50.8783 69.5059 51.1369C69.5059 51.3955 69.722 51.6051 69.9885 51.6051H76.336C76.6024 51.6051 76.8185 51.3955 76.8185 51.1369C76.8185 50.8783 76.6024 50.6686 76.336 50.6686Z" fill="black"/>
            <defs>
            <filter id="filter0_d_28_428" x="0.316406" y="0.043541" width="137.793" height="132.873" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
        <div class="col cornerSvgKalendarTitle">
            <div class="fs-5">
                <span  style="font-weight: 700;">Termine</span>
            </div>
        </div>
    </div>
<div class="row g-0 pb-4">
    <div class="col-12 col-md-auto pe-0 pe-md-5 pb-2 pb-md-0">
            <input type="radio" id="html" name="trie" value="desc" @if($trie == "desc" )checked @endif>
            <label for="html" style="font-weight: 500;">Zeit absteigend</label>
        </div>
        <div class="col-12 col-md-auto">
            <input type="radio" id="css" name="trie" value="asc" @if($trie == "asc" )checked @endif>
            <label for="css" style="font-weight: 500;">Zeit aufsteigend</label>
        </div>
    </div>
	<div class="row justify-content-between">
            <div class="col-lg pb-3 pb-lg-0">
                <label class="fw-500">Datum</label>
                    <input type="date" class="form-control form-control-sm kalendarFormStyle py-2" name="date_in" value="{!! $date_in->format('Y-m-d') !!}">
            </div>
			<div class="col-lg pb-3 pb-lg-0">
				<label class="fw-500">Region</label>
				<select name="region" class="form-control form-select form-select-sm kalendarFormStyle py-2">
					<option value="all" @if($regionO == "all") selected @endif>Alle Regionen</option>
					@foreach ( $regions as $region)
						<option value="{!! $region->city !!}" @if($regionO == $region->city) selected @endif >{!! $region->city !!}</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg pb-3 pb-lg-0">
				<label class="fw-500">Status</label>
				<select name="rejected" class="form-control form-select form-select-sm kalendarFormStyle py-2">
					<option value="all" @if($rejectedO == "all") selected @endif>Alle</option>
					<option value="1" @if($rejectedO == "1") selected @endif>Abgelehnt </option>
					<option value="0" @if($rejectedO == "0") selected @endif>Akzeptiert</option>
				</select>
			</div>
			<div class="col-lg">
				<label class="fw-500">Sprache</label>
				<select name="sprache" class="form-control form-select form-select-sm kalendarFormStyle py-2">
					<option value="all"  @if($spracheO == "all") selected @endif>Alle Sprachen</option>
					@foreach ( $langues as $langue)
						<option value="{!! $langue->sprache !!}" @if($spracheO == $langue->sprache) selected @endif >{!! $langue->sprache !!}</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 my-auto">
            <label style="visibility: hidden;">S</label>
            {!! Form::button('<span>Filter</span>', ['type' => 'submit', 'class' => 'btn buttoni-filter justify-content-center ps-3 d-flex w-100']) !!}	</div>
</div>{{ Form::close() }}
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 g-0"><br>
            <div class="row g-0 mx-2">
                <div class="col-lg-9 col-12" style="font-size: 12px; text-align : center ;">
                    @if(session('msg')) 
                    <div style="background-color: #DEF2D5 !important;border-radius: 8px!important;color: #219653 !important;font-weight: 600 !important;border: none !important;padding-right: 0.75rem !important;padding-left: 0.75rem !important;padding-top: 0.6rem !important;padding-bottom: 0.6rem !important" class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="fs-6">{!! session('msg') !!} <?php session(['msg' => '']); ?></span><button style="padding: 0.85rem 1rem;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                    @endif
                </div>
                <div class="col-lg-9 col-12 mb-3 pe-0 pe-lg-3" style="font-size: 12px;">
                    <div class="mx-2" id='calendar'></div>
                    <div style='clear:both'></div>
                </div>
                <div class="col-lg-3 col-12 box follow-scroll ">
                    <div id='external-events' class="h-100">
                        <div id='wrap' class="me-2 pt-3 h-100" style="position: relative; overflow-y: scroll;background: #F9FAFC;text-align: left;height: 600px ;border-radius: 23px;">
                             <div class="row g-0">
                                <div class="col-auto" style="margin-top: -3.2rem;margin-left:-2.4rem;">
                                <svg width="139" height="135" viewBox="0 0 139 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_28_428)">
                                    <path d="M37.0932 70.9938C39.4228 74.8712 46.05 78.6814 49.5873 81.4315C53.1246 84.1816 48.5244 91.9831 52.7309 93.1871C56.9375 94.3912 69.8685 88.9743 74.1038 88.449C78.3392 87.9238 82.3819 86.5342 86.0013 84.3596C89.6206 82.1851 92.7457 79.2681 95.198 75.7752C97.6503 72.2824 99.3819 68.282 100.294 64.0027C101.206 59.7233 101.28 55.2486 100.513 50.8342C99.746 46.4198 98.9519 37.9426 98.2499 33.7931L73.7499 33.7931L57.4128 33.7931C56.9719 33.7931 56.5322 33.8366 56.0999 33.9231V33.9231C53.2238 34.4983 50.4755 35.5896 47.9882 37.1442L47.75 37.2931L46.5647 38.1821C43.3951 40.5592 40.798 43.6159 38.964 47.1278V47.1278C37.7351 49.481 37.0932 52.0964 37.0932 54.7512L37.0932 70.9938Z" fill="#DCE4F9"/>
                                    </g>
                                    <path d="M67.75 62.7931H60.75V67.7931H67.75V62.7931Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M67.75 54.7931H60.75V59.7931H67.75V54.7931Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M72.75 54.7931H80.75" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M72.75 59.7931H80.75" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M72.75 65.7931H80.75" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M67.75 46.7931H60.75V51.7931H67.75V46.7931Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M72.75 49.7931H80.75" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <defs>
                                    <filter id="filter0_d_28_428" x="0.09375" y="0.79306" width="137.945" height="133.568" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                <div class="col " style="margin-left: -1rem;margin-top: -0.5rem">
                                    <div class="fs-5">
                                        <span style="font-weight: 700;">Terminliste  </span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div  class=" p-2" style="margin-right: 0.75rem; margin-top: -0.5rem;background: #E7E7E7;border-radius: 5px;filter: drop-shadow(0px 4px 4px rgba(0,0,0,0.15))">
                                        <span style="font-weight: 600;line-height: 0.7">{{count($appointments_events)}}</span>
                                    </div>
                                </div>
                             </div>
                            <!-- <hr class="mx-2" style="height: 2px"> -->
                            <script>
                                function openmod(x){
                                    let y = 'app' + x;
                                    document.getElementById(y).style.display = "block";
                                  
                                }
                                </script>
                            @foreach ( $appointments_events as $appointment )
                                @if($appointment["rejected"] == 0)
                                    <div class='fc-event p-2 m-2'  data-bs-toggle="modal" data-bs-target="#app{{$appointment->id}}"
                                         style="margin: 10px 0; cursor: pointer;color:#fff;text-align: left; font-size: 14px; border-radius: 10px;  background: #0c71c3;">{!! $appointment["id"] !!}
                                        -{!! $appointment['first_name'] !!} {!! $appointment['last_name'] !!}<br><B
                                            style="color:#fff">{!! date("d/M/Y H:i", strtotime($appointment["appointment_date"]." ".$appointment["time"])) !!}
                                            ( {!! $appointment["number_of_persons"]!!} {!! $appointment["number_of_persons"] == 1 ? 'Person' : 'Personen'!!}
                                            {!! $appointment["address"]  . "," . $appointment["postal_code"] . "," . $appointment["city"] !!})</B><br>@if($appointment["assigned"] == '0')<div
                                             style="color:#fff; border:1px solid #fff;border-radius: 4px;padding-left: 2px;padding-right: 2px;">Nicht zugeordnet</div>@endif</div>
                                @else
                                    <div class='fc-event  p-2 m-2' data-bs-toggle="modal" data-bs-target="#app{{$appointment->id}}"
                                         style="margin: 10px 0; cursor: pointer; text-align: left; color:#fff;border-radius: 10px; font-size: 14px;  background:#c40000;">{!! $appointment["id"] !!}
                                        -{!! $appointment['first_name'] !!} {!! $appointment['last_name'] !!}<br><B
                                            style="color: #fff;">{!! date("d/M/Y H:i", strtotime($appointment["appointment_date"]." ".$appointment["time"])) !!}
                                            ( {!! $appointment["number_of_persons"]!!} {!! $appointment["number_of_persons"] == 1 ? 'Person' : 'Personen'!!}
                                            {!! $appointment["address"]  . "," . $appointment["postal_code"] . "," . $appointment["city"] !!})</B><br>@if($appointment["assigned"] == '0')<div
                                             style="color:#fff;border:1px solid #fff;border-radius: 4px;padding-left: 2px;padding-right: 2px;">Abgelehnt </div>@endif
                                    </div>
                                @endif
                            @endforeach
                           
                            <div class="row g-0" style="position: absolute; bottom: 1.25rem;left: 1.25rem">
                                <div class="col-auto my-auto me-2">
                                    <div>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M15.2031 13.7402C16.3604 12.2596 16.9937 10.4371 17.004 8.55805C17.0143 6.67902 16.4009 4.84965 15.2599 3.35651C14.4182 2.25414 13.3191 1.3747 12.0589 0.795072C10.7987 0.215447 9.41568 -0.0467186 8.03072 0.0314946C6.64576 0.109708 5.30105 0.525919 4.11413 1.24374C2.92721 1.96157 1.93422 2.95915 1.22197 4.14929L1.21581 1.24651L0.00257296 1.24909L0.011578 5.49468L0.619483 6.09991L4.86582 6.0909L4.86324 4.87787L2.20747 4.88351C3.01498 3.48088 4.26648 2.38689 5.76462 1.77405C7.26276 1.16122 8.92231 1.06439 10.4816 1.49885C12.0408 1.93331 13.4111 2.87433 14.3763 4.17353C15.3415 5.47274 15.8467 7.0562 15.8123 8.67423C15.7779 10.2923 15.2057 11.8528 14.1862 13.1098C13.1666 14.3668 11.7575 15.2487 10.1812 15.6164C8.60483 15.9842 6.9509 15.8169 5.48019 15.1409C4.00947 14.4649 2.80564 13.3187 2.05852 11.883L0.98357 12.4457C1.64154 13.7046 2.60485 14.7783 3.78528 15.5685C4.96572 16.3588 6.32557 16.8404 7.74034 16.9692C9.15511 17.098 10.5796 16.8699 11.8834 16.3057C13.1871 15.7416 14.3286 14.8595 15.2031 13.7402ZM11.1229 12.5722L11.9801 11.7128L8.51014 8.25693L8.50038 3.65713L7.28715 3.6597L7.29744 8.51181L7.47548 8.94084L11.1229 12.5722Z"
                                                  fill="#3670BD" />
                                        </svg>

                                    </div>
                                </div>
                                <div class="col">
                                    <a href="{{route('rejectedAppointment')}}" style="text-decoration: none;">
                                        <span class="underlinedFirstTxt">Historie Der Termine</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
	  <div class="row g-0 px-2">
            <div class="col-md-12">
                <div class="">
                    <a href="{{route('insertappointment')}}">
                        <div class="row g-0 justify-content-center pt-3 pt-md-0">
                            <div class="col-auto my-auto">
                            <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.4961 35.0005C8.84807 35.0005 0.996094 27.1485 0.996094 17.5005C0.996094 7.85246 8.84807 0.000488281 18.4961 0.000488281C28.1441 0.000488281 35.9961 7.85246 35.9961 17.5005C35.9961 27.1485 28.1441 35.0005 18.4961 35.0005Z" fill="#5288F5"/>
                                <path d="M26.0549 19.0005H11.9373C11.4171 19.0005 10.9961 18.5531 10.9961 18.0005C10.9961 17.4479 11.4171 17.0005 11.9373 17.0005H26.0549C26.575 17.0005 26.9961 17.4479 26.9961 18.0005C26.9961 18.5531 26.575 19.0005 26.0549 19.0005Z" fill="white"/>
                                <path d="M18.9961 26.0005C18.4435 26.0005 17.9961 25.5794 17.9961 25.0593V18.0005V10.9417C17.9961 10.4215 18.4435 10.0005 18.9961 10.0005C19.5487 10.0005 19.9961 10.4215 19.9961 10.9417V25.0593C19.9961 25.5794 19.5487 26.0005 18.9961 26.0005Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="col-auto my-auto ps-2">
                                    <div>
                                        <span class="text-dark">Neuen hinzufügen</span>
                                    </div>
                            </div>
                        </div>
                    </a>
                    </div>
            </div>
            <div class="col">
                <section>
                    <div class="container-fluid g-0">
                        <div class="form-div my-4 py-3 px-3 mx-auto" style="background: #F9FAFC;border-radius: 23px;">
                        <div class="row g-0">
                        <div class="col-auto cornerSvgKalendar">
                            <svg width="139" height="135" viewBox="0 0 139 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_28_428)">
                                <path d="M37.0932 70.9938C39.4228 74.8712 46.05 78.6814 49.5873 81.4315C53.1246 84.1815 48.5244 91.983 52.7309 93.1871C56.9375 94.3912 69.8685 88.9742 74.1038 88.449C78.3392 87.9238 82.3819 86.5342 86.0013 84.3596C89.6206 82.185 92.7457 79.268 95.198 75.7752C97.6503 72.2823 99.3819 68.282 100.294 64.0026C101.206 59.7232 101.28 55.2486 100.513 50.8342C99.746 46.4198 98.9519 37.9426 98.2499 33.793L73.7499 33.793L57.4128 33.793C56.972 33.793 56.5322 33.8366 56.0999 33.923C53.2238 34.4983 50.4755 35.5896 47.9882 37.1442L47.75 37.2931L46.5647 38.1821C43.3951 40.5592 40.798 43.6159 38.964 47.1277C37.7351 49.4809 37.0932 52.0964 37.0932 54.7511L37.0932 70.9938Z" fill="#DCE4F9"/>
                                </g>
                                <path d="M80.9989 60.3834H70.6683L72.6921 58.2466L71.5861 57.0834L67.6641 61.2084L71.5861 65.3334L72.6921 64.1701L70.6683 62.0334H80.9989V60.3834Z" fill="#313131"/>
                                <path d="M78.1448 56.4286V53.2857C78.1454 53.1823 78.1238 53.0798 78.0811 52.9841C78.0385 52.8884 77.9756 52.8013 77.8962 52.7279L71.8955 47.2279C71.8154 47.155 71.7204 47.0974 71.616 47.0583C71.5115 47.0192 71.3997 46.9994 71.2869 47H62.7145C62.2598 47 61.8237 47.1656 61.5022 47.4603C61.1806 47.755 61 48.1547 61 48.5714V67.4286C61 67.8453 61.1806 68.245 61.5022 68.5397C61.8237 68.8344 62.2598 69 62.7145 69H76.4303C76.885 69 77.3211 68.8344 77.6426 68.5397C77.9641 68.245 78.1448 67.8453 78.1448 67.4286V65.8571H76.4303V67.4286H62.7145V48.5714H69.5724V53.2857C69.5724 53.7025 69.753 54.1022 70.0745 54.3969C70.3961 54.6916 70.8322 54.8572 71.2869 54.8572H76.4303V56.4286H78.1448ZM71.2869 53.2857V48.8936L76.0788 53.2857H71.2869Z" fill="#313131"/>
                                <defs>
                                <filter id="filter0_d_28_428" x="0.09375" y="0.79303" width="137.945" height="133.568" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                        <div class="col cornerSvgKalendarTitle" style="margin-top: -0.5rem !important;">
                            <div class="fs-5">
                                <span style="font-weight: 700;">Oder Nach Datei einfügen</span>
                            </div>
                        </div>
                    </div>

                            <form method="post" action="{{route('addappointmentfile')}}" enctype="multipart/form-data">
                            @csrf
                                        <div class="row g-0 justify-content-end" style="margin-top: -1.5rem">
                                            <div class="col-12 col-md pe-0 pe-md-2">
                                                <label for="file" class="leadsCustomFileInput form-control" style="cursor: pointer;">
                                                    <div class="row g-0">
                                                        <div class="col-12 col-md my-auto ps-2">
                                                            <span id="afterUploadTextKunden">keine Datei ausgewählt</span>
                                                        </div>
                                                        <div class="col-12 col-md-auto pt-2 pt-md-0">
                                                            <div
                                                                class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2">Datei auswählen</div>
                                                        </div>
                                                    </div>
                                                    <input class="d-none" onchange="changeUploadText()" type="file" name="costumerfile" id="file">
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
                                            <div class="col-12 col-md-auto my-auto pt-2 pt-md-0">
                                                <input class="leadOffnenBtnStyle w-100 py-1 px-4" type="submit" class="mt-2 btn py-2" value="Hochladen">

                                            </div>
                                        </div>
                                <!-- <div class="row mx-4">
                                    <div class="col">
                                        <div class="mx-2">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="file">
                                            </div>
                                            <div class="my-4">
                                                <button type="submit" class="py-2 px-5 border-0 fw-bold"
                                                        style="background-color: #0c71c3; color: #fff; border-radius: 8px;">Annehmen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </form>
                            {{-- <div onclick="openExamplePic()">
                                <span class="btn fw-600" style="border: 1px solid #434343;border-radius: 5px">Beispiel</span>
                            </div>
                            <br>
                            <div style="display: none" class="w-100" id="picture">
                                <img src="exceExample.png" alt="pic" class="img-fluid">
                            </div> --}}
                        </div>
                    </div>
                </section>
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





@elseif($admini->hasRole('fs'))


<script>

    /* initialize the calendar
    -----------------------------------------------------------------*/

  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {


    editable: false, // enable draggable events
      droppable: true, // this allows things to be dropped onto the calendar
      aspectRatio: 1.8,
      scrollTime: '00:00', // undo default 6am scrollTime


		headerToolbar: {
		  left: 'prev,next today',
		  center: 'title',
		  right: 'timeGridWeek,timeGridDay,dayGridMonth'
		},
		views: {
			 dayGridMonth: {
			   eventMaxStack: 3
			 }
		 },
         slotLabelFormat: {hour: 'numeric', minute: '2-digit', hour12: false},
		initialView: 'timeGridWeek',


		eventMaxStack : 3,
		dayMaxEvents : 3,
		height: 600,
		  slotMinTime: "08:00:00",
		  slotMaxTime : "22:30:00",
		  slotDuration: '00:30:00',
		  slotLabelInterval: 30,
		  allDaySlot : false,
         firstDay: 1,
    events: [
            @foreach($absences as $appointmentAGG)
            @if($appointmentAGG->type == 1)
        {
            aid: '{!! $appointmentAGG->id !!}',
            resourceId: '{!! $appointmentAGG->admin->id !!}',
            title: 'Abwesenheit {{ucfirst($appointmentAGG->admin->name)}}',
            start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["from"] . " " . "08:00")) !!}'),
            name: '{{ $appointmentAGG->admin->name }}',
            user_to: '{{ $appointmentAGG->admin->id }}',
            allDay: false,
            absence: true,
            end: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["to"])) !!}'),
            @if($appointmentAGG->type == 0)
                status: 'Offen',
            @elseif($appointmentAGG->type == 1)
                status: 'Akzeptiert',
            @else
                status: 'Abgelehnt',
            @endif
            description: '{{ $appointmentAGG["description"] }}',
            employee_id: '{!! $appointmentAGG["employee_id"] !!}',
            color: '#9B51E0',
        
        },
        @endif
        @endforeach
	  @foreach ( $appointments as $appointmentAGG)
        {
		id: '{!! $appointmentAGG["id"] !!}',
		start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["appointment_date"]." ".$appointmentAGG["time"])) !!}') ,
		telephone: '{{ $appointmentAGG["telephone"] }}' ,
		birthdate: '{{ $appointmentAGG["birthdate"] }}' ,
		number_of_persons: '{{ $appointmentAGG["number_of_persons"] }}' ,
		nationality: '{{ $appointmentAGG["nationality"] }}' ,
		status_task: '{{ $appointmentAGG["status_task"] }}' ,
		eventColor: 'green',
		name: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }}',
		title: '{{ $appointmentAGG["first_name"] }} {{ $appointmentAGG["last_name"] }}',
		address: '{{ $appointmentAGG['address'] }}',
        absence: false,
        color: '#219653',
        btn: ' <a style="background-color:#2f60dc !important;font-weight: 600;border-radius:8px !important;border:none !important;" class="btn btn-success w-100"' + ' href="' + '{{route("acceptappointment",$appointmentAGG->id)}}' + '">Termine</a>'
		},
	  @endforeach
            @foreach($personalApp as $appointmentAGG)
        {
            pid: '{!! $appointmentAGG["id"] !!}',
            resourceId: '{!! $appointmentAGG->user_id !!}',
            title: '{!! App\Models\Admins::find($appointmentAGG->assignfrom)->name . " ," . $appointmentAGG->title !!}',
            start: new Date('{!! date("d/M/Y H:i", strtotime($appointmentAGG["date"] ." ". $appointmentAGG["time"])) !!}'),
            name: '{{ App\Models\Admins::find($appointmentAGG->assignfrom)->name }}',
            allDay : false,
            absence: false,
            @if($appointmentAGG->AppOrCon == 1)
            status: 'Private Termine',
            @elseif($appointmentAGG->AppOrCon == 2)
            status: 'Mitarbeiterbesprechungen',
            @endif
            color: '#E178AD',
            textColor: 'white',
            app: true,
            comment: '{!! $appointmentAGG["comment"] !!}',
            address12: '{!! $appointmentAGG["address"] !!}',
            titleModal: '{!! $appointmentAGG["title"] !!}'
           
        },
        @endforeach
      ],

	 eventClick: function(calEvent) {
if(!calEvent.event.extendedProps.absence && !calEvent.event.extendedProps.app) {
    document.getElementById("start").innerHTML = moment(calEvent.event.start).format('Y-m-d HH:mm');
    document.getElementById("name").innerHTML = calEvent.event.title;
    document.getElementById("telephone").innerHTML = calEvent.event.extendedProps.telephone;
    document.getElementById("birthdate").innerHTML = calEvent.event.extendedProps.birthdate;
    document.getElementById("address").innerHTML = calEvent.event.extendedProps.address;
    document.getElementById("number_of_persons").innerHTML = calEvent.event.extendedProps.number_of_persons;
    document.getElementById("nationality").innerHTML = calEvent.event.extendedProps.nationality;
    document.getElementById('mbody').innerHTML = calEvent.event.extendedProps.btn;
    $(exampleModal).modal('show');
}
else if(calEvent.event.extendedProps.absence){
    document.getElementById("title1").innerHTML = calEvent.event.title;
    document.getElementById("end1").innerHTML = moment(calEvent.event.extendedProps.fundi).format('Y-MM-DD');
    document.getElementById("status1").innerHTML = calEvent.event.extendedProps.status;
    document.getElementById("start1").innerHTML = moment(calEvent.event.start).format('Y-MM-DD');
    $(exampleModal1).modal('show');
}
else {
    document.getElementById("date2").innerHTML = moment(calEvent.event.start).format('Y-MM-DD HH:mm');
    document.getElementById('name2').innerHTML = calEvent.event.extendedProps.name;
    // document.getElementById('status2').innerHTML = calEvent.event.extendedProps.status;
    document.getElementById('address12').innerHTML = calEvent.event.extendedProps.address12;
    document.getElementById('titleModal').innerHTML = calEvent.event.extendedProps.titleModal;
    document.getElementById('comment2').innerHTML = calEvent.event.extendedProps.comment;
    $(exampleModal2).modal('show')
}
	 },
  });
      calendar.setOption('locale', 'de');
  calendar.render();
});

</script>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 700px;" role="document">
    <div class="modal-content" style="border-radius: 15px !important;border: none !important">
      <div class="modal-header text-center justify-content-center" style="background-color: #219653;border-radius: 15px 15px 0 0">
        <h5 class="text-center mb-0" style="color: #fff; font-weight: 600;" id="exampleModalLabel">Appointement detail</h5>
      </div>
      <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">
                <div class="row g-2">
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Datum</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="start"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7083 11.6667C13.7439 11.6667 14.5833 12.5061 14.5833 13.5417V14.7933L14.5768 14.8837C14.3178 16.6555 12.7263 17.5075 10.0557 17.5075C7.39468 17.5075 5.77775 16.6653 5.42872 14.9138L5.41667 14.7917V13.5417C5.41667 12.5061 6.25613 11.6667 7.29167 11.6667H12.7083ZM12.7083 12.9167H7.29167C6.94649 12.9167 6.66667 13.1965 6.66667 13.5417V14.7253C6.89982 15.7257 7.95885 16.2575 10.0557 16.2575C12.1524 16.2575 13.1639 15.7314 13.3333 14.7443V13.5417C13.3333 13.1965 13.0535 12.9167 12.7083 12.9167ZM13.5363 6.66576L18.125 6.66667C19.1605 6.66667 20 7.50613 20 8.54167V9.79331L19.9934 9.8837C19.7345 11.6555 18.1429 12.5075 15.4723 12.5075L15.2099 12.5047C14.9641 11.9101 14.5126 11.4232 13.9445 11.1312C14.3735 11.2153 14.8817 11.2575 15.4723 11.2575C17.569 11.2575 18.5805 10.7314 18.75 9.7443V8.54167C18.75 8.19649 18.4702 7.91667 18.125 7.91667H13.75C13.75 7.47803 13.6747 7.05699 13.5363 6.66576ZM1.875 6.66667L6.4637 6.66576C6.34838 6.99178 6.27686 7.33851 6.25622 7.69887L6.25 7.91667H1.875C1.52982 7.91667 1.25 8.19649 1.25 8.54167V9.72531C1.48316 10.7257 2.54219 11.2575 4.63899 11.2575C5.15738 11.2575 5.60944 11.2254 5.99883 11.162C5.45653 11.4565 5.02663 11.9312 4.78862 12.5055L4.63899 12.5075C1.97801 12.5075 0.361084 11.6653 0.0120523 9.91381L0 9.79167V8.54167C0 7.50613 0.839466 6.66667 1.875 6.66667ZM10 5C11.6108 5 12.9167 6.30584 12.9167 7.91667C12.9167 9.5275 11.6108 10.8333 10 10.8333C8.38917 10.8333 7.08333 9.5275 7.08333 7.91667C7.08333 6.30584 8.38917 5 10 5ZM10 6.25C9.07953 6.25 8.33333 6.99619 8.33333 7.91667C8.33333 8.83714 9.07953 9.58333 10 9.58333C10.9205 9.58333 11.6667 8.83714 11.6667 7.91667C11.6667 6.99619 10.9205 6.25 10 6.25ZM15.4167 0C17.0275 0 18.3333 1.30584 18.3333 2.91667C18.3333 4.5275 17.0275 5.83333 15.4167 5.83333C13.8058 5.83333 12.5 4.5275 12.5 2.91667C12.5 1.30584 13.8058 0 15.4167 0ZM4.58333 0C6.19416 0 7.5 1.30584 7.5 2.91667C7.5 4.5275 6.19416 5.83333 4.58333 5.83333C2.9725 5.83333 1.66667 4.5275 1.66667 2.91667C1.66667 1.30584 2.9725 0 4.58333 0ZM15.4167 1.25C14.4962 1.25 13.75 1.99619 13.75 2.91667C13.75 3.83714 14.4962 4.58333 15.4167 4.58333C16.3371 4.58333 17.0833 3.83714 17.0833 2.91667C17.0833 1.99619 16.3371 1.25 15.4167 1.25ZM4.58333 1.25C3.66286 1.25 2.91667 1.99619 2.91667 2.91667C2.91667 3.83714 3.66286 4.58333 4.58333 4.58333C5.50381 4.58333 6.25 3.83714 6.25 2.91667C6.25 1.99619 5.50381 1.25 4.58333 1.25Z" fill="white"/>
                                    </svg>

                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Personen</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='number_of_persons'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Vorname</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='name'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.665 11.28V13.28C14.6657 13.4657 14.6277 13.6495 14.5533 13.8196C14.479 13.9897 14.3699 14.1424 14.233 14.2679C14.0962 14.3934 13.9347 14.489 13.7588 14.5485C13.5829 14.608 13.3966 14.6301 13.2117 14.6133C11.1602 14.3904 9.18966 13.6894 7.45833 12.5667C5.84755 11.5431 4.48189 10.1775 3.45833 8.56668C2.33165 6.82748 1.63049 4.84734 1.41166 2.78668C1.395 2.60233 1.41691 2.41652 1.47599 2.2411C1.53508 2.06567 1.63004 1.90447 1.75484 1.76776C1.87964 1.63105 2.03153 1.52182 2.20086 1.44703C2.37018 1.37224 2.55322 1.33352 2.73833 1.33335H4.73833C5.06187 1.33016 5.37552 1.44473 5.62084 1.6557C5.86615 1.86667 6.02638 2.15964 6.07166 2.48001C6.15608 3.12006 6.31263 3.7485 6.53833 4.35335C6.62802 4.59196 6.64744 4.85129 6.59427 5.1006C6.5411 5.34991 6.41757 5.57875 6.23833 5.76001L5.39166 6.60668C6.3407 8.27571 7.72263 9.65764 9.39166 10.6067L10.2383 9.76001C10.4196 9.58077 10.6484 9.45725 10.8977 9.40408C11.1471 9.35091 11.4064 9.37032 11.645 9.46001C12.2498 9.68571 12.8783 9.84227 13.5183 9.92668C13.8422 9.97237 14.1379 10.1355 14.3494 10.385C14.5608 10.6345 14.6731 10.9531 14.665 11.28Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle" >Telephon</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='telephone'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hidden class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 0L7.96875 0.799065C7.96875 0.799065 7.61629 1.30637 7.27404 1.91355C7.10291 2.21846 6.94201 2.53651 6.80409 2.85981C6.66617 3.18312 6.53846 3.48014 6.53846 3.86916C6.53846 4.97576 7.42473 5.88785 8.5 5.88785C9.57527 5.88785 10.4615 4.97576 10.4615 3.86916C10.4615 3.48014 10.3338 3.18312 10.1959 2.85981C10.058 2.53651 9.89709 2.21846 9.72596 1.91355C9.38371 1.30637 9.03125 0.799065 9.03125 0.799065L8.5 0ZM8.5 5.88785H6.53846V8.57944H2.61538C1.16977 8.57944 0 9.78329 0 11.271C0 11.9544 0.245192 12.5827 0.653846 13.0584V18H16.3462V13.0584C16.7548 12.5827 17 11.9544 17 11.271C17 9.78329 15.8302 8.57944 14.3846 8.57944H10.4615V5.88785H8.5ZM8.5 2.43925C8.54342 2.51285 8.53831 2.50759 8.58173 2.58645C8.73753 2.86244 8.90355 3.15683 9.01082 3.40654C9.11809 3.65625 9.15385 3.88756 9.15385 3.86916C9.15385 4.24241 8.86268 4.54206 8.5 4.54206C8.13732 4.54206 7.84615 4.24241 7.84615 3.86916C7.84615 3.88756 7.88191 3.65625 7.98918 3.40654C8.09645 3.15683 8.26247 2.86244 8.41827 2.58645C8.46169 2.50759 8.45658 2.51285 8.5 2.43925ZM7.84615 7.23364H9.15385V8.57944H7.84615V7.23364ZM2.61538 9.92523H14.3846C15.1636 9.92523 15.6923 10.4693 15.6923 11.271C15.6923 12.0727 15.1636 12.6168 14.3846 12.6168C13.6056 12.6168 13.0769 12.0727 13.0769 11.271H11.7692C11.7692 12.0727 11.2405 12.6168 10.4615 12.6168C9.68254 12.6168 9.15385 12.0727 9.15385 11.271H7.84615C7.84615 12.0727 7.31746 12.6168 6.53846 12.6168C5.75947 12.6168 5.23077 12.0727 5.23077 11.271H3.92308C3.92308 12.0727 3.39438 12.6168 2.61538 12.6168C1.83639 12.6168 1.30769 12.0727 1.30769 11.271C1.30769 10.4693 1.83639 9.92523 2.61538 9.92523ZM4.57692 13.0584C5.05709 13.6157 5.75691 13.9626 6.53846 13.9626C7.32001 13.9626 8.01983 13.6157 8.5 13.0584C8.98017 13.6157 9.67999 13.9626 10.4615 13.9626C11.2431 13.9626 11.9429 13.6157 12.4231 13.0584C12.9032 13.6157 13.6031 13.9626 14.3846 13.9626C14.6119 13.9626 14.829 13.9127 15.0385 13.8575V16.6542H1.96154V13.8575C2.17097 13.9127 2.38807 13.9626 2.61538 13.9626C3.39694 13.9626 4.09675 13.6157 4.57692 13.0584Z" fill="white"/>
                                    </svg>


                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Geburstag</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='birthdate'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17.6028C13.4183 17.6028 17 14.0211 17 9.60278C17 5.18451 13.4183 1.60278 9 1.60278C4.58172 1.60278 1 5.18451 1 9.60278C1 14.0211 4.58172 17.6028 9 17.6028Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 9.60278H17" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 1.60278C10.876 3.79347 11.9421 6.63641 12 9.60278C11.9421 12.5692 10.876 15.4121 9 17.6028C7.12404 15.4121 6.05794 12.5692 6 9.60278C6.05794 6.63641 7.12404 3.79347 9 1.60278V1.60278Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>



                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Nationalitet</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='nationality'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #219653;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="19" height="19" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.50082 0C4.13008 0 0.574219 3.55586 0.574219 7.92654C0.574219 9.73327 1.84481 12.4104 4.35074 15.8833C6.18011 18.4187 8.03609 20.4842 8.05458 20.5048L8.50076 21L8.94693 20.5048C8.96549 20.4843 10.8214 18.4188 12.6508 15.8833C15.1567 12.4103 16.4273 9.73327 16.4273 7.92654C16.4274 3.55586 12.8715 0 8.50082 0ZM8.50076 19.1956C6.27512 16.6316 1.77544 10.8446 1.77544 7.92654C1.77538 4.21819 4.7924 1.20116 8.50082 1.20116C12.2092 1.20116 15.2262 4.21819 15.2262 7.92654C15.2262 10.8429 10.7264 16.631 8.50076 19.1956Z" fill="white"/>
                                        <path d="M8.50028 10.9112C10.1487 10.9112 11.4849 9.57492 11.4849 7.92654C11.4849 6.27817 10.1487 4.94189 8.50028 4.94189C6.8519 4.94189 5.51562 6.27817 5.51562 7.92654C5.51562 9.57492 6.8519 10.9112 8.50028 10.9112Z" fill="white"/>
                                    </svg>




                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Adress</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='address'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
      <div class="modal-body">
	    <h5 hidden style="text-align : center; "><B><span id='' style=" color : #e57e2d"></span></B> (<span id=''></span> persons  )</h5>
	    <p hidden><B>Name :</B><span id=''></span></p>
	    <p hidden><B>Telephone :</B><span id=''></span></p>
	    <p hidden><B>Birthdate :</B><span id=''></span></p>
	    <p hidden><B>Nationality :</B><span id=''></span></p>
		<hr hidden>
		<p hidden><B>address :</B><span id=''></span></p>
          <div class="row g-0 justify-content-center">
            <div class="col-5" id="mbody">

            </div>
          </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document " style="max-width: 700px">
        <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
        <div class="p-4" style="background-color: #E178AD;border-radius:15px 15px 0 0">
            <div class="row g-0">
                <div class="col text-center" style="margin-right: -17px;">

                    <span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';" id="exampleModalLabel">Mitarbeiterbesprechungen</span>

                </div>
                <div class="col-auto my-auto d-none" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                    <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">

                <div class="row g-2">
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 15.625V14C14 13.1381 13.6576 12.3114 13.0481 11.7019C12.4386 11.0924 11.612 10.75 10.75 10.75H4.25C3.38805 10.75 2.5614 11.0924 1.9519 11.7019C1.34241 12.3114 1 13.1381 1 14V15.625" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.5 7.5C9.29493 7.5 10.75 6.04493 10.75 4.25C10.75 2.45507 9.29493 1 7.5 1C5.70507 1 4.25 2.45507 4.25 4.25C4.25 6.04493 5.70507 7.5 7.5 7.5Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Aus:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='name2'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="19" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5648 0H0.473052C0.222249 0 0 0.18473 0 0.412573V11.9131C0 12.0638 0.0999127 12.2025 0.245467 12.2749L6.29603 15.2833C6.36393 15.3171 6.44141 15.334 6.51652 15.334C6.59162 15.334 6.66792 15.3171 6.73587 15.2833L12.7729 12.2749C12.9184 12.2025 13 12.0638 13 11.9131V0.412573C13 0.18473 12.8156 0 12.5648 0ZM12.0917 11.6687L6.5 14.4511L0.908297 11.6687V0.825147H12.0917V11.6687Z" fill="white"/>
                                            <path d="M10.2768 10.7832V8.84448L6.50644 10.6495L2.72656 8.84448V10.7785L6.50638 12.6522L10.2768 10.7832Z" fill="white"/>
                                            <path d="M10.2768 7.91311V5.97443L6.50644 7.77943L2.72656 5.97443V7.90842L6.50638 9.78217L10.2768 7.91311Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Typ:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='status2'></span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">

                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Titel:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='titleModal'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">

                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Addres:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id='address12'></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                        <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Datum & Zeit:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="date2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div style="background: #E178AD;border-radius: 6px;padding: 0.75rem;">
                                <div class="row g-0">
                                    <div class="col-auto my-auto me-3">
                                    <svg width="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6 0C14.8759 0 15.9228 1.00126 15.9959 2.25921L16 2.4V10.4C16 11.6759 14.9987 12.7228 13.7408 12.7959L13.6 12.8H10.8L8.64 15.68C8.4888 15.8816 8.252 16 8 16C7.7795 16 7.57064 15.9093 7.42057 15.7516L7.36 15.68L5.2 12.8H2.4C1.12406 12.8 0.0772285 11.7987 0.00408249 10.5408L0 10.4V2.4C0 1.12406 1.00126 0.0772285 2.25921 0.00408249L2.4 0H13.6ZM13.6 1.6H2.4C1.99069 1.6 1.65173 1.90972 1.6054 2.30689L1.6 2.4V10.4C1.6 10.8093 1.90972 11.1483 2.30689 11.1946L2.4 11.2H5.6C5.8205 11.2 6.02936 11.2907 6.17942 11.4484L6.24 11.52L8 13.8664L9.76 11.52C9.8923 11.3436 10.0901 11.2309 10.3063 11.2055L10.4 11.2H13.6C14.0093 11.2 14.3483 10.8903 14.3946 10.4931L14.4 10.4V2.4C14.4 1.99069 14.0903 1.65173 13.6931 1.6054L13.6 1.6ZM12 7.2C12.4416 7.2 12.8 7.5584 12.8 8C12.8 8.41006 12.491 8.74837 12.0933 8.79461L12 8.8H4C3.5584 8.8 3.2 8.4416 3.2 8C3.2 7.58994 3.50903 7.25162 3.90675 7.20539L4 7.2H12ZM12 4C12.4416 4 12.8 4.3584 12.8 4.8C12.8 5.21006 12.491 5.54838 12.0933 5.59461L12 5.6H4C3.5584 5.6 3.2 5.2416 3.2 4.8C3.2 4.38994 3.50903 4.05162 3.90675 4.00539L4 4H12Z" fill="white"/>
                                    </svg>
                                    </div>
                                    <div class="col-auto pe-4 my-auto">
                                        <span class="appointmentModalSpanStyle">Kommentar:</span>
                                    </div>
                                    <div class="col my-auto">
                                    <span class="appointmentModalSpanStyle1" id="comment2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                </div>
        </div>
            <div class="modal-header" hidden>
                <div class="col-md-4" style="text-align : left">
                    <h5 class="modal-title" id="exampleModalLabel">Abwesenheit</h5>
                </div>
                <div class="col-md-6" style="text-align : center">
                    <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                </div>
            </div>
            <div class="modal-body" hidden style="margin-top: 30px;">
                <p style="line-height :8px;"><B>Vorname :</B><span id=''></span></p>
                <b>Bezeichnung :</b><span  id=''></span><span id='description'> </span>
                <p><B>Aus :</B><span id=''></span></p>
                <p><B>Comment :</B><span id=''></span></p>
                <p style="margin-bottom: 30px;"><B>Status :</B><span id=''></span></p>
                <hr>
            
            </div>

        </div>
    </div>
                    {{-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document " style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="col-md-4" style="text-align : left">
                                        <h5 class="modal-title" id="exampleModalLabel">Mitarbeiterbesprechungen </h5>
                                    </div>
                                    <div class="col-md-6" style="text-align : center">
                                        <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                                    </div>
                                </div>
                                <div class="modal-body" style="margin-top: 30px;">
                                    <p style="line-height :8px;"><B>Vorname :</B><span id='name2'></span></p>
                                    <b>Bezeichnung :</b><span style="" id='title2'></span>
                                    <p><B>Aus :</B><span id='date2'></span></p>
                                    <p><B>Comment :</B><span id='comment2'></span></p>
                                    <p style="margin-bottom: 30px;"><B>Status :</B><span id='status2'></span></p>
                                    <hr>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document " style="max-width: 700px">
                            <div class="modal-content" style="background-color: #9b51e0 !important;border-radius:15px !important">
                                <div class="">

                                    <div class="p-4" style="background-color: #9b51e0;border-radius:15px 15px 0 0">
                                        <div class="row g-0">
                                            <div class="col text-center">
                                                <span class="fs-5" style="font-weight: 600;color: #fff;font-family: 'Roboto';">Abwesenheit</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div hidden class="" style="text-align : center">
                                        <h4 style="text-align : center; "><B><span id='start' style="color : #e57e2d"></span></B></h4>
                                    </div>
                                </div>
                                <div hidden class="modal-body" style="margin-top: 30px;">
                                    <p><b>Bezeichnung :</b><span id=''></span></p>
                                    <p><B>Aus :</B><span id=''></span></p>
                                    <p><B>Status :</B><span id=''></span></p>
                                    <p style="margin-bottom: 30px;"><B>Zu :</B><span id=''></span></p>
                                </div>
                                <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">
                                        <div class="row g-2">
                                            <div class="col-12 col-sm-6">
                                                <div style="background: #9B51E0;border-radius: 6px;padding: 0.75rem;border: none">
                                                    <div class="row g-0">
                                                        <div class="col-auto my-auto me-3">
                                                            <svg width="19" height="19" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.5648 0H0.473052C0.222249 0 0 0.18473 0 0.412573V11.9131C0 12.0638 0.0999127 12.2025 0.245467 12.2749L6.29603 15.2833C6.36393 15.3171 6.44141 15.334 6.51652 15.334C6.59162 15.334 6.66792 15.3171 6.73587 15.2833L12.7729 12.2749C12.9184 12.2025 13 12.0638 13 11.9131V0.412573C13 0.18473 12.8156 0 12.5648 0ZM12.0917 11.6687L6.5 14.4511L0.908297 11.6687V0.825147H12.0917V11.6687Z" fill="white"/>
                                                                <path d="M10.2768 10.7832V8.84448L6.50644 10.6495L2.72656 8.84448V10.7785L6.50638 12.6522L10.2768 10.7832Z" fill="white"/>
                                                                <path d="M10.2768 7.91311V5.97443L6.50644 7.77943L2.72656 5.97443V7.90842L6.50638 9.78217L10.2768 7.91311Z" fill="white"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-auto pe-4 my-auto">
                                                            <span class="appointmentModalSpanStyle">Status:</span>
                                                        </div>
                                                        <div class="col my-auto">
                                                        <span class="appointmentModalSpanStyle1" id='status1'></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div style="background: #9B51E0;border-radius: 6px;padding: 0.75rem;">
                                                    <div class="row g-0">

                                                        <div class="col-auto pe-4 my-auto">
                                                            <span class="appointmentModalSpanStyle">Bezeichnung:</span>
                                                        </div>
                                                        <div class="col my-auto">
                                                        <span class="appointmentModalSpanStyle1" id='title1'></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div style="background: #9B51E0;border-radius: 6px;padding: 0.75rem;">
                                                    <div class="row g-0">
                                                        <div class="col-auto my-auto me-3">
                                                            <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-auto pe-4 my-auto">
                                                            <span class="appointmentModalSpanStyle">Aus:</span>
                                                        </div>
                                                        <div class="col my-auto">
                                                        <span class="appointmentModalSpanStyle1" id="start1"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div style="background: #9B51E0;border-radius: 6px;padding: 0.75rem;">
                                                    <div class="row g-0">
                                                        <div class="col-auto my-auto me-3">
                                                            <svg width="19" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.5556 3H2.44444C1.6467 3 1 3.59695 1 4.33333V13.6667C1 14.403 1.6467 15 2.44444 15H12.5556C13.3533 15 14 14.403 14 13.6667V4.33333C14 3.59695 13.3533 3 12.5556 3Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M10 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M5 1V5" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M1 7H14" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div class="col-auto pe-4 my-auto">
                                                            <span class="appointmentModalSpanStyle">Zu:</span>
                                                        </div>
                                                        <div class="col my-auto">
                                                        <span class="appointmentModalSpanStyle1" id="end1"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-0 justify-content-center pt-4">
                                                <div class="col-12 col-sm-5">
                                                    <button type="button" class="btn btn-secondary w-100" style="border-radius: 8px !important;background-color: #2F60DC;border: none !important" data-bs-dismiss="modal">Schliessen</button>
                                                </div>
                                            </div>

                                        </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>




<div class="col-12 pt-4 ps-4">
  <h3 class="ps-2"> Termine</h3>
</div>
  <div class=" row g-0 mx-2">
<div class="col-12" width="90%" style="font-size: 12px;">
    <div id='calendar' class="mx-4"></div>


</div>
</div>
</div>
@else

You don't have permission // {!! $admini->hasRole('admin') !!} ---  {!! $admini->getRoleNames() !!}

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
        background-color: #2F60DC !important;
        border-radius: 9px !important;
        color: #fff !important;
    }
    .kalendarFormStyle {
        background: #FFFFFF !important;
        box-shadow: 0px 4px 4px rgba(185, 185, 185, 0.25) !important;
        border-radius: 9px !important;
        border: none !important;
    }

</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    .form-control:disabled, .form-control[readonly] {
        opacity: 0.5 !important;
    }
    .fc-daygrid-event-harness {
        cursor: pointer;
    }
    .fc-event-main {
        cursor: pointer;
    }
    .appointmentModalSpanStyle {
        color: #FFFFFF;
        font-family: 'Roboto';
        font-weight: 500;
    }
    .appointmentModalSpanStyle1 {
        color: #FFFFFF;
        font-weight: 400;
        font-family: 'Roboto';
    }
    .modal-dialog {
        max-width: 750px !important;
    }
    .leadOffnenBtnStyle {
            font-weight: 600;
            color: #FFFFFF;
            background: #5288F5;
            border-radius: 10px;
            border: none;
        }
        .leadsCustomFileInput {
            border: none !important;
            background-color: #FFFFFF !important;
            border-radius: 13px !important;
            color: #CBCBCB !important;
            font-weight: 400 !important;
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
    .cornerSvgKalendarTitle {
        margin-top: -0.5rem !important;
        margin-left: -1.5rem;
    }
    .cornerSvgKalendar {
        margin-top: -3.1rem !important;
        margin-left: -3.4rem;
    }
    .mapouter {
        position: relative;
    }
    .modal-content form {
        margin-bottom: 0% !important;
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
    .fc .fc-timegrid-axis-cushion, .fc .fc-timegrid-slot-label-cushion {
        padding: 0px 0px !important;
    }
    .fc-direction-ltr .fc-timegrid-slot-label-frame {
        text-align: center !important;
    }
    .fc .fc-scroller::-webkit-scrollbar {
    width: 6px;
    }

    .fc .fc-scroller::-webkit-scrollbar-track {
    background: transparent;
    }

    .fc .fc-scroller::-webkit-scrollbar-thumb {
    background: #2F60DC95;
    border-radius: 10px;
    }

    .fc .fc-scroller::-webkit-scrollbar-thumb:hover {
    background: #2F60DC;
    }
    .fc table {
        font-size: 15px !important;
    }
    .underlinedFirstTxt {
        font-weight: 500;
        font-size: 18px;
        text-decoration-line: underline;
        color: #3670BD;
    }
</style>
<style>
    /*Per Notification */
    .coloriii a {
        color: black !important;
    }
    .fc-timegrid-slot-label {
        display: block !important;
    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>

</div>