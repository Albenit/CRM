@extends('template.navbar')
@section('content')
    <title>
        Historie Der Termine
    </title>
    <div>
        <div class="p-4">
            
            <div class="row g-0">
                <div class="col pb-3">
                    <span class="fs-5 spanColor fw-600">Historie Der Termine</span>
                </div>
                <div onclick="openSortInputs()" class="col-auto kundenSearchBarStyle p-2 h-100" style="cursor: pointer;">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="23" height="23" fill="#F7F7F7"/>
                        <path d="M4.92857 12.393C4.92857 12.6352 5.01135 12.8675 5.1587 13.0388C5.30606 13.2101 5.5059 13.3063 5.71428 13.3063H18.2857C18.4941 13.3063 18.6939 13.2101 18.8413 13.0388C18.9886 12.8675 19.0714 12.6352 19.0714 12.393C19.0714 12.1508 18.9886 11.9185 18.8413 11.7472C18.6939 11.5759 18.4941 11.4797 18.2857 11.4797H5.71428C5.5059 11.4797 5.30606 11.5759 5.1587 11.7472C5.01135 11.9185 4.92857 12.1508 4.92857 12.393ZM1.78572 6H22.2143C22.4227 6 22.6225 6.09622 22.7699 6.2675C22.9172 6.43877 23 6.67107 23 6.91329C23 7.15551 22.9172 7.3878 22.7699 7.55908C22.6225 7.73035 22.4227 7.82658 22.2143 7.82658H1.78572C1.57733 7.82658 1.37748 7.73035 1.23013 7.55908C1.08278 7.3878 1 7.15551 1 6.91329C1 6.67107 1.08278 6.43877 1.23013 6.2675C1.37748 6.09622 1.57733 6 1.78572 6ZM9.64286 16.9595H14.3571C14.5655 16.9595 14.7654 17.0557 14.9127 17.2269C15.0601 17.3982 15.1429 17.6305 15.1429 17.8727C15.1429 18.115 15.0601 18.3473 14.9127 18.5185C14.7654 18.6898 14.5655 18.786 14.3571 18.786H9.64286C9.43447 18.786 9.23462 18.6898 9.08727 18.5185C8.93992 18.3473 8.85714 18.115 8.85714 17.8727C8.85714 17.6305 8.93992 17.3982 9.08727 17.2269C9.23462 17.0557 9.43447 16.9595 9.64286 16.9595Z" fill="#646464"/>
                    </svg>
                </div>
                <form action="{{route('rejectedAppointment')}}" method="GET">
                    <div class="col-3 ms-auto sortData" style="display: none;" id="sortdatainputs">
                        <div class="p-3">
                            <label for="berater" class="fw-600">Berater</label>
                            <select name="berater" style="border: none" class="form-control">
                                    <option value="all">Alles</option>
                                @foreach($beraters as $berater) 
                                    <option value="{{$berater->id}}">{{ucfirst($berater->name)}}</option>
                                @endforeach
                            </select>
                            <label for="berater" class="fw-600">Status</label>
                            <select name="status" style="border: none" class="form-control">
                                <option value="all">Alles</option>
                                <option value="Abschluss">Abschluss</option>
                                <option value="Kein Abschluss">Kein Abschluss</option>
                                <option value="Folget">Folget</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <input type="submit" style="background-color: #2F60DC;border-radius: 11px;"
                                class="border-0 text-light fw-600 my-2 text-center dropdown-item"
                                value="Suche">
                                
                        </div>
                    </div>
                </form>
            </div>
            <div style="overflow-x: auto;">
                <table class="table table-borderless kundenCustomTableStyle" border="0" cellpadding="0" cellspacing="0"
                    style="background: #F9FAFC;box-shadow: 0px 4px 4px rgba(208, 208, 208, 0.25);border-radius: 8px">
                    <thead style="border-bottom: 0px solid #fff !important;border-radius: 8px">
                        <tr class="bg-color1"
                            style="border: none; border-bottom: 0px #fff solid !important;border-radius: 8px">
                            <th scope="col" class="header-styling">Datum</th>
                            <th scope="col" class="header-styling">Berater</th>
                            <th scope="col" class="header-styling">Terminname</th>
                            <th scope="col" class="header-styling">Status</th>
                            <th scope="col" class="header-styling">Begründung</th>
                            <th scope="col" class="header-styling">Kommentar</th>
                            <th scope="col" class="header-styling">Anzahl Personen</th>

                            
                        </tr>
                    </thead>


                    <tbody id="body-table-edit" style="border: none; border-radius: 8px !important;">
                        @if (count($leads) == 0)
                            <tr>
                                <td colspan="7">
                                    <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5"
                                        style="color: #9F9F9F">
                                        <div class="py-5">
                                            keine Termine
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($leads as $lead)
                                <tr style="border-top: 1px solid #E9E8E8 !important;">
                                    <td scope="row">
                                        <div>{{ Carbon\Carbon::parse($lead->appointment_date)->format('d.m.Y') }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $lead->assign_to_id == null ? 'Nicht zugeordnet' : ucfirst($lead->admin->name) }}</div>
                                    </td>
                                    <td scope="row">
                                        <div style="font-weight: 600 !important;">{{ ucfirst($lead->first_name) }}{{ ucfirst($lead->last_name) }}</div>
                                    </td>
                                    <td>
                                        @if ($lead->completed == 1)
                                            <div>
                                                <div class="go-btn py-2 w-100 px-2"
                                                    style="font-weight: 600; text-align:center;">
                                                    Abschluss
                                                </div>
                                            </div>
                                        @elseif ($lead->assign_to_id != null && $lead->deleted_at != null)
                                            <div>
                                                <div class="close-btn py-2 w-100 px-2"
                                                    style="font-weight: 600; text-align:center;">
                                                    Kein Abschluss
                                                </div>
                                            </div>
                                        @elseif ($lead->appointment_date != null && $lead->completed == 0 && $lead->rejected == 0 && $lead->deleted_at == null && $lead->folged == 0)
                                            <div>
                                                <div class="pend-btn py-2 w-100 px-2"
                                                    style="font-weight: 600; text-align:center;">
                                                    Pending
                                                </div>
                                            </div>
                                        @elseif ($lead->completed == 0 && $lead->rejected == 0 && $lead->deleted_at == null && $lead->folged == 1)
                                            <div>
                                                <div class="mid-btn py-2 w-100 px-2"
                                                    style="font-weight: 600; text-align:center;">
                                                    Folget
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($lead->begrundung != null || $lead->begrundung2 != null)
                                            <div>{{ $lead->begrundung }} {{ $lead->begrundung2 }}</div>
                                        @else
                                            <div class=" fs-6 fw-400" style="color: #9F9F9F">keine Begründung
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lead->begrundungfile2 == null && $lead->folged == 1 && $lead->completed == 0 && $lead->rejected == 0 && $lead->deleted_at == null)
                                            <div>{{$lead->folgeComment}}</div>
                                        @elseif($lead->begrundungfile2 != null)
                                            <div>
                                                <a style="text-decoration: none"
                                                    href="{{ route('showfile2', $lead->begrundungfile2) }}" target="_blank">
                                                    <input type="text" class="form-control" id="begrundung"
                                                        disabled style="background:transparent; border:none; color: blue; cursor: pointer;"
                                                        value="{{$lead->begrundungfile2}}">
                                                </a>
                                            </div>
                                        @else
                                            <div class="fs-6 fw-400" style="color: #9F9F9F">keine Kommentar</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $lead->number_of_persons }}</div>
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
<script>
        function openSortInputs() {
        $('#sortdatainputs').slideToggle();
    }
</script>
<style>
    .sortData{
        background: #FFFFFF;
        box-shadow: 0px 4px 4px rgba(185, 185, 185, 0.25);
        border-radius: 14px;

        position: absolute;
        z-index: 999;
        top: 5rem;
        right: 1.5rem;
    }
    .kundenSearchBarStyle {
        background: #F7F7F7;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 11px;
    }
    .pend-btn {
        color: #fff;
        font-weight: 220;
        background-color: #d9d9d9;
        border: 1px #d9d9d9 solid;
        border-radius: 13px;
        width: 150px;
    }

    .mid-btn {
        color: #FFFFFF;
        font-weight: 220;
        background-color: #FFBF00;
        border: 1px #FFBF00 solid;
        border-radius: 13px;
        width: 150px;
    }

    .close-btn {
        color: #ffffff;
        font-weight: 220;
        background-color: #C74E46;
        border: 1px #C74E46 solid;
        border-radius: 13px;
        width: 150px;
    }

    .go-btn {
        color: #ffffff;
        font-weight: 220;
        background-color: #79B887;
        border: 1px #79B887 solid;
        border-radius: 13px;
        width: 100px;
    }

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

    th,
    td {
        font-family: 'Montserrat', sans-serif;
    }
</style>
