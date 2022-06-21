@extends('template.navbar')
@section('content')
<div>
    <div class="p-4">
        <div class="pb-3">
            <span class="fs-5 spanColor fw-600">Abgelehnte Leads</span>
        </div>
        <div style="overflow-x: auto;">
            <table class="table table-borderless kundenCustomTableStyle" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFC;box-shadow: 0px 4px 4px rgba(208, 208, 208, 0.25);border-radius: 8px">
                <thead style="border-bottom: 0px solid #fff !important;border-radius: 8px">
                    <tr class="bg-color1" style="border: none; border-bottom: 0px #fff solid !important;border-radius: 8px">
                        <th scope="col" class="header-styling">Vorname</th>
                        <th scope="col" class="header-styling">Telefonnummer</th>
                        <th scope="col" class="header-styling">Anzahl der Personen</th>
                        <th scope="col"  class="header-styling">Grund</th>
                    </tr>
                </thead>
                <tbody id="body-table-edit" style="border: none; border-radius: 8px !important;">
                    @if (count($leads) == 0)
                    <tr>
                        <td colspan="4" >
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #9F9F9F">
                                <div class="py-5">
                                    keine Abgelehnte Leads
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
                                <div>{{$lead->telephone}}</div>
                            </td>
                            <td>
                                <div>{{$lead->number_of_persons}}</div>
                            </td>
                            
                            <td>
                                <div>{{$lead->status}}</div>
                            </td>
                        </tr>
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
