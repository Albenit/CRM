@extends('template.navbar')
@section('content')
{{-- @foreach($leads as $lead)
    <div class="row g-0 m-3 flexDirRow">
        <div class="col-3 pe-0 openLeadsFirstDiv">
            <div class="">
                <div class="whiteee p-3">
                    <div class="namme mb-2">
                        <span class="fs-4 fw-bold">{{$lead->first_name}} (19.1.1986)</span>
                    </div>
                    <div class="adresse row">
                        <div class="col-4 pe-0">
                            <span class="">Adresse:</span>
                        </div>
                        <div class="col ps-0">
                            <span class="grayyy1 fw-500 ">{{$lead->address}}</span>
                        </div>
                    </div>
                    <div class="haushalt row">
                        <div class="col-4 pe-0">
                            <span class="">Haushalt:</span>
                        </div>
                        <div class="col ps-0">
                            <span class="grayyy1 fw-500">{{$lead->number_of_persons}}</span>
                        </div>
                    </div>
                    <div class="grund row">
                        <div class="col-4 pe-0">
                            <span class="">Grund:</span>
                        </div>
                        <div class="col ps-0">
                            <span class="grayyy1 fw-500">@if($lead->info != null) {{$lead->info->grund}} @endif</span>
                        </div>
                    </div>
                    <div class="kampagne row">
                        <div class="col-4 pe-0">
                            <span class="">Kampagne:</span>
                        </div>
                        <div class="col ps-0">
                            <span class="grayyy1 fw-500">@if($lead->info != null) {{$lead->info->kampagne}} @endif</span>
                        </div>
                    </div>
                </div>
                <div class="grayyy" style="cursor: pointer;">
                    <div class="lead-offnen text-center py-2">
                        <span class="fs-4 fw-bold">Lead öffnen</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-0 receivedCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Erhalten/Neu</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="greyBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div class="receivedDiv h-100 my-auto ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4">
                        Empfangen
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-0 assignedToCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Zugewiesen An</span>
                </div>
                <div class="my-auto h-75">
                @if($lead->assign_to_id != null)
                    <div
                        class="orangeBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div
                            class="assignedToDiv h-100 my-auto ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0">
                            
                        </div>
                    </div>
                    @else
                    <div
                        class="orangeBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div
                            class="assignedToDiv h-100 my-auto ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0">
                            
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if($lead->rejected == 1)
        <div class="col px-0 lostCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Hat Verloren</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="redBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto h-100">
                        <div
                            class="lostDiv my-auto h-100 justify-content-center ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0">
                            Hat Verloren
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-0 wonCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Gewonnen</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="greenBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div
                            class="wonDiv my-auto h-100 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0 ps-0 ps-sm-0 ps-md-5 ps-lg-5 ps-xl-5 ps-xxl-5 ms-0 ms-sm-0 ms-md-5 ms-lg-5 ms-xl-5 ms-xxl-5">
                            <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="59.804" height="43.804"
                                viewBox="0 0 59.804 43.804">
                                <path id="Path_379" data-name="Path 379"
                                    d="M8370.12,1003.732l20.094,20.423,35.472-40.187"
                                    transform="translate(-8367.999 -981.851)" fill="none" stroke="#feffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($lead->rejected == 0 && $lead->assign_to_id != null && $lead->assign_to_id != 0 && $lead->appointment_date != null)
        <div class="col px-0 lostCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Hat Verloren</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="redBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto h-100">
                        <div
                            class="lostDiv my-auto h-100 justify-content-center ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0">
                            Hat Verloren
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-0 wonCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Gewonnen</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="greenBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div
                            class="wonDiv my-auto h-100 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0 ps-0 ps-sm-0 ps-md-5 ps-lg-5 ps-xl-5 ps-xxl-5 ms-0 ms-sm-0 ms-md-5 ms-lg-5 ms-xl-5 ms-xxl-5">
                            <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="59.804" height="43.804"
                                viewBox="0 0 59.804 43.804">
                                <path id="Path_379" data-name="Path 379"
                                    d="M8370.12,1003.732l20.094,20.423,35.472-40.187"
                                    transform="translate(-8367.999 -981.851)" fill="none" stroke="#feffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col px-0 lostCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Hat Verloren</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="redBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto h-100">
                        <div
                            class="lostDiv my-auto h-100 justify-content-center ps-0 ps-sm-0 ps-md-4 ps-lg-4 ps-xl-4 ps-xxl-4 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0">
                            Hat Verloren
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-0 wonCol">
            <div class="py-0 py-sm-0 py-md-3 py-lg-3 py-xl-3 py-xxl-3 h-100">
                <div class="text-center hideTextMob">
                    <span class="openLeadsSpanText">Gewonnen</span>
                </div>
                <div class="my-auto h-75">
                    <div
                        class="greenBorderDiv py-5 py-sm-5 py-md-0 py-lg-0 py-xl-0 py-xxl-0 mt-0 mt-sm-0 mt-md-2 mt-lg-2 mt-xxl-2 mt-xl-2 my-auto">
                        <div
                            class="wonDiv my-auto h-100 pt-5 pt-sm-5 pt-md-0 pt-lg-0 pt-xl-0 pt-xxl-0 ps-0 ps-sm-0 ps-md-5 ps-lg-5 ps-xl-5 ps-xxl-5 ms-0 ms-sm-0 ms-md-5 ms-lg-5 ms-xl-5 ms-xxl-5">
                            <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="59.804" height="43.804"
                                viewBox="0 0 59.804 43.804">
                                <path id="Path_379" data-name="Path 379"
                                    d="M8370.12,1003.732l20.094,20.423,35.472-40.187"
                                    transform="translate(-8367.999 -981.851)" fill="none" stroke="#feffff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endforeach  --}}





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
                        <th scope="col" class="header-styling">Platform</th>
                        <th scope="col" class="header-styling">Personen</th>
                        <th scope="col"  class="header-styling">Status</th>
                        <th scope="col" class="header-styling">Kampagne</th>
                        <th scope="col" class="header-styling">Teilnahme</th>
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
                        <td scope="row">
                            <div>{{ucfirst($lead->first_name)}}</div>
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
                                    <span>Lost</span>
                                </div>
                            @elseif($lead->rejected == 0   && $lead->appointment_date == null)
                                <div class="yellowRedDiv py-1 text-center">
                                    <span>Pending</span>
                                </div>
                            @elseif($lead->completed = 1 && $lead->rejected == 0)
                                <div class="greenRedDiv py-1 text-center">
                                    <span>Won</span>
                                </div>
                            @endif
                            
                        </td>
                        <td>
                            <div>{{$lead->info->kampagne}}</div>
                        </td>
                        <td>
                            <div>{{$lead->info->teilnahme}}</div>
                        </td>
                        <td>
                            <div class="showMoreBlueText fw-600" data-bs-toggle="modal" data-bs-target="#{{$lead->slug}}">Zeig mehr</div>
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
                                                style="color: #434343; font-weight: 600;">Platform: <span
                                                style="color: #88889D;font-weight: 500">{{$lead->campaign->name}} </span></span><br>
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
                                                style="color: #88889D;font-weight: 500"> {{$lead->birthdate}}</span></span><br>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </tbody>

            </table>
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
        font-weight: 600 !important;
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