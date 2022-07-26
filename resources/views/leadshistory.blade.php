@extends('template.navbar')
@section('content')
    <title>
        Historie Der Leads
    </title>
<div>
    <div class="p-4">
        <div class="pb-3">
            <span class="fs-5 spanColor fw-600">Historie Der Leads</span>
        </div>
        <div style="overflow-x: auto;">
            <table class="table table-borderless kundenCustomTableStyle" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFC;box-shadow: 0px 4px 4px rgba(208, 208, 208, 0.25);border-radius: 8px">
                <thead style="border-bottom: 0px solid #fff !important;border-radius: 8px">
                    <tr class="bg-color1" style="border: none; border-bottom: 0px #fff solid !important;border-radius: 8px">
                        <th scope="col" class="header-styling">Leads</th>
                        <th scope="col" class="header-styling">Plattform</th>
                        <th scope="col" class="header-styling">Personen</th>
                        <th scope="col"  class="header-styling">Status</th>
                        <th scope="col" class="header-styling">Kampagne</th>
                        <th scope="col" class="header-styling">Berater</th>
                        <th scope="col" class="header-styling"></th>
                    </tr>
                </thead>
            

                <tbody id="body-table-edit" style="border: none; border-radius: 8px !important;">
                    @if (count($leads) == 0)
                    <tr>
                        <td colspan="7">
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #9F9F9F">
                                <div class="py-5">
                                    keine Lead
                                </div>
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($leads as $lead)
                    <tr style="border-top: 1px solid #E9E8E8 !important;">
                        <tbody scope="row">
                            <td>
                            <div style="font-weight: 600 !important;">{{ucfirst($lead->first_name)}} {{ucfirst($lead->last_name)}}</div>
                        </td>
                        <td>
                            <div>{{ucfirst($lead->campaign->name)}}</div>
                        </td>
                        <td>
                            <div>{{$lead->number_of_persons}}</div>
                        </td>
                        <td>
                            @if($lead->rejected == 1 || $lead->deleted_at != null)
                                <div class="lostRedDiv py-1 text-center">
                                    <span>Verloren</span>
                                </div>
                            @elseif($lead->rejected == 0  && $lead->appointment_date == null)
                                <div class="yellowRedDiv py-1 text-center">
                                    <span>Pending</span>
                                </div>
                            @elseif($lead->rejected == 0 && $lead->appointment_date != null)
                                <div class="greenRedDiv py-1 text-center">
                                    <span>Gewonnen</span>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>{{$lead->info->kampagne}}</div>
                        </td>
                        <td>
                            <div> {{ucfirst($lead->assign_to_id == null ? '' : ucfirst($lead->admin->name))}}</div>
                        </td>
                        <td>
                            <div class="showMoreBlueText fw-600" data-bs-toggle="modal" data-bs-target="#{{$lead->slug}}">Details</div>
                        </td>
                    </tr>
                    <div class="col-12 col-lg-6">
                        <div class="modal fade" id="{{$lead->slug}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"
                                        style="background: #fff; border-radius: 23px">
                                    <div class="modal-header mx-3 pb-0 pt-3"
                                            style="border-bottom: none !important;">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"
                                                style="opacity: 1 !important;">
                                        </button>
                                    </div>
                                    <div class="modal-body p-1 p-sm-3">
                                        <div class="row mx-3 my-auto">
                                            <div class="col-12 col-md-4 my-auto">
                                                <span class="fs-4 fw-bold text-dark">
                                                {{ $lead->first_name }} {{ $lead->last_name }}
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="mt-sm-3 mt-1">
                                            <div class="mx-0 pb-0 mx-sm-3 pb-sm-3 row g-2">
                                                <div class="col-md-6 col-12">
                                                    <div class="text-dark text-left p-3 m-2 h-100"
                                                            style="border-radius: 9px; background:#fafafa;">
                                                        <div class="py-2">
                                                            <h6 style="font-weight: 700 !important; color:#434343 !important;">Herkunft vom Lead</h6>
                                                        </div>

                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Plattform: <span
                                                                style="color: #88889D;font-weight: 500">{{ucfirst($lead->campaign->name)}} </span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span style="color: #434343; font-weight: 600;">Kampagne:
                                                                <span style="color: #88889D;font-weight: 500"> {{$lead->info->kampagne}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Grund: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->info->grund}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Teilnahme: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->info->teilnahme}}</span></span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="text-dark text-left p-3 h-100 m-2"
                                                            style="border-radius: 9px; background:#fafafa;">
                                                        <div class="py-1">
                                                            <h6 style="color: #434343 !important; font-weight: 700 !important;">Angaben</h6>
                                                        </div>
                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Gerburstdatum: <span
                                                                style="color: #88889D;font-weight: 500"> {{Carbon\Carbon::parse($lead->birthdate)->format('d.m.Y')}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Haushalt: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->number_of_persons}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Telefon: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->telephone}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">PLZ, Ort: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->postal_code}} {{ $lead->city }} </span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Krankenkasse: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->info->krankenkasse}} </span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Bewertung KK: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->info->bewertung}} </span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Wichtig: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->info->wichtig}} </span></span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-sm-2 mt-1">
                                            <div class="mx-0 pb-0 mx-sm-3 pb-sm-3 row g-2">
                                                <div class="col-md-6 col-12">
                                                    <div class="text-dark text-left p-3 m-2 h-100"
                                                            style="border-radius: 9px; background:#fafafa;">
                                                        <div class="py-2">
                                                            <h6 style="font-weight: 700 !important; color:#434343 !important;">Lead Details</h6>
                                                        </div>

                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Assigned From: <span
                                                                style="color: #88889D;font-weight: 500">Sales Manager </span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span style="color: #434343; font-weight: 600;">Assigned To:
                                                                <span style="color: #88889D;font-weight: 500">{{$lead->assign_to_id == null ? '' : ucfirst($lead->admin->name) }}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            <span
                                                                style="color: #434343; font-weight: 600;">Created At: <span
                                                                style="color: #88889D;font-weight: 500"> {{$lead->created_at->format('d.m.Y')}}</span></span><br>
                                                                        </div>
                                                                        <div class="py-1">
                                                            </span><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="text-dark text-left p-3 h-100 m-2"
                                                            style="border-radius: 9px; background:#fafafa;">
                                                        
                                                            @if($lead->rejected == 1 || $lead->deleted_at != null)
                                                                <div class="py-1">
                                                                    <h6 style="color: #434343 !important; font-weight: 700 !important;">Lead Verloren</h6>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Grund: 
                                                                        <span style="color: #88889D;font-weight: 500">{{$lead->leadsHistory->status}} {{$lead->pendingRejectLead->begrundung}}</span>
                                                                    </span>
                                                                    <br>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Verloren Datum: 
                                                                        <span style="color: #88889D;font-weight: 500"> {{$lead->deleted_at == null ? '' : $lead->deleted_at->format('d.m.Y')}}</span>
                                                                    </span>
                                                                    <br>
                                                                </div>
                                                            @elseif($lead->rejected == 0 && $lead->appointment_date != null)
                                                                <div class="py-1">
                                                                    <h6 style="color: #434343 !important; font-weight: 700 !important;">Gewonen</h6>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Grund: 
                                                                        <span style="color: #88889D;font-weight: 500"></span>
                                                                    </span>
                                                                    <br>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Agent: 
                                                                        <span style="color: #88889D;font-weight: 500"> {{$lead->agent}}</span>
                                                                    </span>
                                                                    <br>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Appointment Datum: 
                                                                        <span style="color: #88889D;font-weight: 500"> {{Carbon\Carbon::parse($lead->appointment_date)->format('d.m.Y')}}</span>
                                                                    </span>
                                                                    <br>
                                                                </div>
                                                                <div class="py-1">
                                                                    <span style="color: #434343; font-weight: 600;">Zeit: 
                                                                        <span style="color: #88889D;font-weight: 500"> {{$lead->time}}</span>
                                                                    </span>
                                                                    <br>
                                                                </div>  
                                                            @elseif($lead->rejected == 0 && $lead->appointment_date == null)
                                                                <div class="py-1" style="text-align: center">
                                                                    <h6 style="color: #434343 !important; font-weight: 700 !important;">Pending</h6>
                                                                </div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @endif

                </tbody>

            </table>
            <div class="row g-0">
                <div class="col text-center">
                    <span>Page: {{$leads->currentPage()}} of {{$leads->lastPage()}} </span>
                </div>
                <div class="col-auto">
                    @if($leads->currentPage() > 1)
                        <div class="prev-nxt-btn d-flex">
                            <a href="{{route('leadshistory',['page' => $leads->currentPage() - 1])}}">
                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    @endif 
                    @if($leads->count() > 0 && $leads->currentPage() != $leads->lastPage())
                        <div class="next-prv-btn d-flex">
                            <a href="{{route('leadshistory',['page' => $leads->currentPage() + 1])}}">
                                <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    .contentDiv {
        background: #F9FAFC;
        border: 1px solid #EDF1FA;
        box-shadow: 0px 4px 4px rgba(208, 208, 208, 0.25);
        border-radius: 0px 0px 8px 8px;
    }

    .lostRedDiv {
        background: #EB5757;
        border-radius: 8px;
        color: #fff;
        font-weight: 600;
    }

    .greenRedDiv {
        background: #219653;
        border-radius: 8px;
        color: #fff;
        font-weight: 600;
    }
    .yellowRedDiv {
        background: #FFC107;
        border-radius: 8px;
        color: #fff;
        font-weight: 600;
    }

    .showMoreBlueText {
        color: #2D9CDB;
        cursor: pointer;
        font-weight: 600 !important;
    }
    .modal-dialog {
        max-width: 100% !important;
        width: 800px !important;
    }
    .spanColor {
        color: #2D2D2D;
    }

    .spanGreyColor {
        color: #585858;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fw-500 {
        font-weight: 500;
    }

    .titlesDiv {
        background: #EAEFFB;
        border: 1px solid #DBE4F9;
        border-radius: 8px;
    }

    .kundenCustomTableStyle {
        border-radius: 23px;
    }

    .kundenCustomTableStyle thead th {
        background: #EAEFFB;
        border: 1px solid #DBE4F9;
        font-weight: 600 !important;
        color: #2D2D2D !important;
        padding: 1rem;
    }

    .kundenCustomTableStyle thead th:first-child {
        border-radius: 8px 0px 0px 0px;
    }

    .kundenCustomTableStyle thead th:last-child {
        border-radius: 0px 8px 0px 0px;
    }

    .kundenCustomTableStyle th,
    td,
    tr,
    thead,
    tbody {
        border: none !important;
    }

    .kundenCustomTableStyle td {
        border-collapse: collapse;
        font-weight: 500 !important;
        color: #585858;
        padding: 1rem !important;
        border-right: 1px solid #E9E8E8 !important;
        vertical-align: middle;
    }

    .kundenCustomTableStyle td:last-child {
        border-right: none !important;
    }

    .kundenCustomTableStyle thead th {
        border-bottom: 1px solid #E9E8E8 !important;
    }

    .kundenCustomTableStyle tr:last-child {
        border-bottom-left-radius: 23px;
    }

    @media (max-width: 1199.98px) {}

    @media (max-width: 799.99px) {
        .modal-dialog {
        max-width: 100% !important;
        width: auto !important;
    }
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }
    th, td {
        font-family: 'Montserrat', sans-serif;
    }
</style>