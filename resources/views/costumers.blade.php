@extends('template.navbar')
@section('content')
    <head>
        <title>
            Kunden
        </title>
    </head>

    <body>

    <div class="desktop-kunden">
        <form method="post" action="{{route('search')}}">
            <div class="suchen-div my-3 mx-4">
                @csrf
                <div class="row g-0">
                    <div class="col kundenSearchBarStyle ps-3 me-1">
                        <div class="row g-0">
                            <div class="col-auto my-auto">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.00474 17.0095C13.4256 17.0095 17.0095 13.4256 17.0095 9.00474C17.0095 4.58385 13.4256 1 9.00474 1C4.58385 1 1 4.58385 1 9.00474C1 13.4256 4.58385 17.0095 9.00474 17.0095Z" stroke="#CBCBCB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.0127 19.075L14.6602 14.7224" stroke="#CBCBCB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </div>
                            <div class="col my-auto">
                                <input type="text" class="input-suchen form-control searchPlaceholderStyle py-2" name="searchname"
                                    placeholder="Suche (Kundenname, Vert)" style="border: none !important;background-color: transparent !important;">
                            </div>

                        </div>
                    </div>
                    <!-- {{-- <a href="{{route('searchword')}}" class="col-auto kundenSearchBarStyle h-100 p-2 me-1">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="23" height="23" fill="#F7F7F7"/>
                        <path d="M20.9882 8.87501L18.3644 1.17664C18.3473 1.12513 18.313 1.08013 18.2666 1.04832C18.2202 1.01651 18.1641 0.999568 18.1066 1.00001H15.8651C15.7463 1.00001 15.645 1.07066 15.6073 1.17664L12.9632 8.87501C12.9546 8.89946 12.9488 8.92664 12.9488 8.95381C12.9488 9.0924 13.0704 9.20653 13.2181 9.20653H14.8515C14.9731 9.20653 15.0774 9.13044 15.1121 9.02174L15.6189 7.34783H18.1964L18.6974 9.01903C18.7293 9.12772 18.8364 9.20381 18.9581 9.20381H20.7304C20.7594 9.20381 20.7855 9.20109 20.8115 9.19294C20.881 9.1712 20.936 9.12772 20.9708 9.06794C21.0027 9.00816 21.0084 8.94022 20.9882 8.87501ZM15.8825 5.93207L16.8324 2.75544H17.0148L17.9444 5.93207H15.8825ZM20.0383 19.3261H16.285V19.3152L20.1252 14.1821C20.157 14.1386 20.1744 14.0897 20.1744 14.0353V13.0462C20.1744 12.9076 20.0528 12.7935 19.9051 12.7935H13.9971C13.8494 12.7935 13.7278 12.9076 13.7278 13.0462V14.2147C13.7278 14.3533 13.8494 14.4674 13.9971 14.4674H17.5477V14.4783L13.6931 19.6114C13.6609 19.6544 13.6437 19.7056 13.6438 19.7582V20.7473C13.6438 20.8859 13.7655 21 13.9131 21H20.0354C20.1831 21 20.3047 20.8859 20.3047 20.7473V19.5788C20.3051 19.5457 20.2985 19.5129 20.2853 19.4823C20.272 19.4517 20.2525 19.4238 20.2277 19.4003C20.2029 19.3768 20.1734 19.3581 20.1409 19.3454C20.1084 19.3326 20.0735 19.3261 20.0383 19.3261ZM8.72055 16.163H6.51956V1.76088C6.51956 1.64131 6.4153 1.54349 6.28788 1.54349H4.66609C4.53867 1.54349 4.43441 1.64131 4.43441 1.76088V16.163H2.23342C2.03939 16.163 1.92934 16.375 2.05097 16.5163L5.29454 20.3723C5.31621 20.3983 5.3439 20.4193 5.37551 20.4337C5.40712 20.4482 5.44182 20.4557 5.47699 20.4557C5.51215 20.4557 5.54685 20.4482 5.57846 20.4337C5.61007 20.4193 5.63776 20.3983 5.65944 20.3723L8.903 16.5163C9.02174 16.375 8.91458 16.163 8.72055 16.163Z" fill="#646464"/>
                        </svg>
                    </a>  --}} -->
             
                    <div onclick="openSortInputs()" class="col-auto kundenSearchBarStyle p-2 h-100" style="cursor: pointer;">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="23" height="23" fill="#F7F7F7"/>
                            <path d="M4.92857 12.393C4.92857 12.6352 5.01135 12.8675 5.1587 13.0388C5.30606 13.2101 5.5059 13.3063 5.71428 13.3063H18.2857C18.4941 13.3063 18.6939 13.2101 18.8413 13.0388C18.9886 12.8675 19.0714 12.6352 19.0714 12.393C19.0714 12.1508 18.9886 11.9185 18.8413 11.7472C18.6939 11.5759 18.4941 11.4797 18.2857 11.4797H5.71428C5.5059 11.4797 5.30606 11.5759 5.1587 11.7472C5.01135 11.9185 4.92857 12.1508 4.92857 12.393ZM1.78572 6H22.2143C22.4227 6 22.6225 6.09622 22.7699 6.2675C22.9172 6.43877 23 6.67107 23 6.91329C23 7.15551 22.9172 7.3878 22.7699 7.55908C22.6225 7.73035 22.4227 7.82658 22.2143 7.82658H1.78572C1.57733 7.82658 1.37748 7.73035 1.23013 7.55908C1.08278 7.3878 1 7.15551 1 6.91329C1 6.67107 1.08278 6.43877 1.23013 6.2675C1.37748 6.09622 1.57733 6 1.78572 6ZM9.64286 16.9595H14.3571C14.5655 16.9595 14.7654 17.0557 14.9127 17.2269C15.0601 17.3982 15.1429 17.6305 15.1429 17.8727C15.1429 18.115 15.0601 18.3473 14.9127 18.5185C14.7654 18.6898 14.5655 18.786 14.3571 18.786H9.64286C9.43447 18.786 9.23462 18.6898 9.08727 18.5185C8.93992 18.3473 8.85714 18.115 8.85714 17.8727C8.85714 17.6305 8.93992 17.3982 9.08727 17.2269C9.23462 17.0557 9.43447 16.9595 9.64286 16.9595Z" fill="#646464"/>
                        </svg>
                    </div>
                </div>

            </div>
            <div class="col-3 ms-auto sortData" style="display: none;" id="sortdatainputs">
                <div class="p-3">
                    <label for="searchdate1" class="fw-600">Von</label>
                    <input type="date" class="dropdown-item px-0 mb-3" name="searchdate1">
                    <label for="searchdate2" class="fw-600">Bis</label>
                    <input type="date" class="dropdown-item px-0" name="searchdate2">
                    @if (!auth()->user()->hasRole('fs') || auth()->user()->hasRole('salesmanager'))
                    <label for="berater" class="fw-600">Berater</label>
                    <select name="berater" style="border: none" class="form-control">@foreach($beraters as $berater) <option value="{{$berater->id}}">{{ucfirst($berater->name)}}</option> @endforeach</select>
                    @endif
                    <label for="berater" class="fw-600">Status</label>
                    <select name="status" style="border: none" class="form-control">
                    <option value="alle">Alle</option>
                    <option value="Eingereicht">Eingereicht</option>
                    <option value="Aufgenommen">Aufgenommen</option>
                    <option value="Abgelehnt">Abgelehnt</option>
                    <option value="Provisionert">Provisionert</option>
                </select>
                    <input type="submit" style="background-color: #2F60DC;border-radius: 11px;"
                           class="border-0 text-light fw-600 my-2 text-center dropdown-item"
                           value="Suche">
                        
                </div>
            </div>

            <div class="kunderportfolio-div mx-4 my-4">
                <div class="header kundenstyle1 border-0 px-3 py-3" style="position: relative;">
                    <div class="d-flex justify-content-between ">

                        <div class="row g-0">
                            <div class="col-auto cornerSvgKunden">
                            <svg width="152" height="145" viewBox="0 0 152 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_28_428)">
                                <path d="M37.8069 76.6026C40.6009 81.2528 48.549 85.8225 52.7914 89.1208C57.0338 92.419 51.5166 101.776 56.5617 103.22C61.6067 104.664 77.1152 98.167 82.1948 97.5371C87.2743 96.9071 92.1229 95.2406 96.4637 92.6326C100.805 90.0245 104.552 86.5261 107.494 82.337C110.435 78.1479 112.512 73.3502 113.605 68.2178C114.699 63.0854 114.788 57.7189 113.868 52.4246C112.948 47.1302 112.098 38.1049 111.256 33.1282L81.7651 33.1282L66.0146 33.1282C59.912 33.1282 53.8732 34.3691 48.2651 36.7755V36.7755L47.1878 37.6042C43.6431 40.3309 40.9294 43.9924 39.3519 48.1771V48.1771C38.3303 50.887 37.8069 53.7593 37.8069 56.6554L37.8069 76.6026Z" fill="#DCE4F9"/>
                                </g>
                                <path d="M89.5873 57.4099L87.5909 55.4135C87.0397 54.8623 86.1456 54.8623 85.5944 55.4135L74.6129 66.3946C74.4574 66.5496 74.3408 66.7386 74.2717 66.9467L73.2735 69.9413C73.2236 70.0916 73.2077 70.246 73.2091 70.3996H71.8137H64.8008V71.7996H72.1886H74.6008V71.7911C74.7543 71.7926 74.9088 71.7771 75.0591 71.7267L78.0536 70.7285C78.2618 70.659 78.4508 70.5423 78.6057 70.3874L89.5869 59.4062C90.1384 58.8556 90.1384 57.9615 89.5873 57.4099ZM74.6129 70.3879L75.6111 67.3933L77.6075 69.3898L74.6129 70.3879ZM78.6061 68.3915L76.6093 66.3947L86.5927 56.4118L88.5891 58.4082L78.6061 68.3915Z" fill="black"/>
                                <path d="M69.532 50.8C67.216 50.8 65.332 52.6839 65.332 55C65.332 57.316 67.216 59.2 69.532 59.2C71.8481 59.2 73.732 57.316 73.732 55C73.732 52.6839 71.8481 50.8 69.532 50.8ZM69.532 57.8C67.9855 57.8 66.732 56.5465 66.732 55C66.732 53.4535 67.9855 52.2 69.532 52.2C71.0785 52.2 72.332 53.4535 72.332 55C72.332 56.5465 71.0785 57.8 69.532 57.8Z" fill="black"/>
                                <path d="M73.7104 60.3499C73.589 59.684 73.0094 59.2 72.3328 59.2H69.5328H66.7328C66.0561 59.2 65.4765 59.684 65.3556 60.3499L64.8008 63.4H66.2236L66.7328 60.6H68.8328V63.4H70.2328V60.6H72.3328L72.8419 63.4H74.2648L73.7104 60.3499Z" fill="black"/>
                                <path d="M83.0055 52.2H74.6055V53.6H83.0055V52.2Z" fill="black"/>
                                <path d="M64.8008 66.2V67.6H72.5783L72.9437 66.5034C72.9796 66.3965 73.0384 66.3009 73.0865 66.2H64.8008Z" fill="black"/>
                                <path d="M74.6055 56.4001V57.8001H81.2326L82.6326 56.4001H74.6055Z" fill="black"/>
                                <path d="M84.6039 54.4227C84.9414 54.0853 85.3544 53.8566 85.8 53.726V48H62V76H85.8V65.1734L84.4 66.5734V74.6H63.4V49.4H84.4V54.6266L84.6039 54.4227Z" fill="black"/>
                                <defs>
                                <filter id="filter0_d_28_428" x="0.808594" y="0.12821" width="150.688" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                            <div class="col cornerSvgKundenDiv">
                                    <span class="fs-5" style="font-weight: 600;">
                                        Kundenportfolio
                                    </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end col my-auto input-group" style="margin-top: -0rem !important;display: none !important;">
                            <div class="dropdown  px-2 fw-600">
                                <button class="dropdown-toggle border-0 bg-transparent" type="button"
                                        id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.391" height="20.587"
                                         viewBox="0 0 28.391 27.587">
                                        <g id="Group_980" data-name="Group 980" transform="translate(1.25)">
                                            <g id="Group_17" data-name="Group 17">
                                                <line id="Line_5" data-name="Line 5" x2="25.891"
                                                      transform="translate(0 24.217)"
                                                      fill="none" stroke="#000" stroke-linecap="round"
                                                      stroke-width="2.5"/>
                                                <line id="Line_6" data-name="Line 6" x2="25.891"
                                                      transform="translate(0 13.488)"
                                                      fill="none" stroke="#000" stroke-linecap="round"
                                                      stroke-width="2.5"/>
                                                <line id="Line_7" data-name="Line 7" x2="25.891"
                                                      transform="translate(0 2.76)"
                                                      fill="none" stroke="#000" stroke-linecap="round"
                                                      stroke-width="2.5"/>
                                                <g id="Ellipse_4" data-name="Ellipse 4"
                                                   transform="translate(4.926 21.457)"
                                                   stroke="#000" stroke-width="1">
                                                    <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none"/>
                                                    <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none"/>
                                                </g>
                                                <g id="Ellipse_5" data-name="Ellipse 5"
                                                   transform="translate(16.186 10.728)"
                                                   stroke="#000" stroke-width="1">
                                                    <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none"/>
                                                    <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none"/>
                                                </g>
                                                <g id="Ellipse_6" data-name="Ellipse 6" transform="translate(4.926)"
                                                   stroke="#000" stroke-width="1">
                                                    <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none"/>
                                                    <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="content kundenstyle2 border-0">
                    <div class="table-responsive ovrflw " style="overflow: auto; max-height: 62vh;">
                        
                        <table class="table table-borderless kundenCustomTableStyle" border="0" cellpadding="0" cellspacing="0" style="background-color:#F9FAFC !important;">
                            <thead style="border-bottom: 0px solid #fff !important;">
                            <tr class="bg-color1" style="border: none; border-bottom: 0px #fff solid !important;">
                                <th scope="col" class="header-styling">ID</th>
                                <th scope="col" class="header-styling">Vorname</th>
                                <th scope="col" class="header-styling">Nachname</th>
                                <th scope="col" class="header-styling">Mandatiert</th>
                                <th scope="col" class="header-styling">Abschlüsse</th>
                                <th scope="col" class="header-styling">Provision</th>
                                <th scope="col" class="header-styling">Status</th>
                            </tr>
                            </thead>
                            <tbody id="body-table-edit"
                                style="cursor: pointer; border: none;border-bottom: 12px #fff solid;border-top: 5px #fff solid; border-radius: 30px !important;">
                                @if (count($data) == 0)
                                    <tr>
                                        <td colspan="7" >
                                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #9F9F9F">
                                                <div class="py-5">
                                                Es wurden noch keine Kunden erfasst
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @for($i = 0; $i < count($data); $i++)
                                    @php $leadss=$data[$i]->id * 1244;
                                        $datId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                    @endphp

                                    @if(Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('salesmanager'))
                                        @if($family_person[$i]->kundportfolio == 0)
                                            <tr style="border-top: 1px solid #E9E8E8 !important;">
                                            <th data-bs-toggle="modal" data-bs-target="#rejectmodal" scope="row"
                                            style="font-weight: 600 !important;"><div style="padding: 6px;">{{$data[$i]->id}}</div></th>
                                            <td data-bs-toggle="modal" data-bs-target="#rejectmodal"
                                            style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->first_name}}</div></td>
                                            <td data-bs-toggle="modal" data-bs-target="#rejectmodal"
                                            style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->last_name}}</div></td>
                                            @if($mandatiert[$i]['mandatiert'])

                                                <td data-bs-toggle="modal" data-bs-target="#rejectmodal"><div style="padding: 6px;"><span style="font-weight: 500 !important;">Ja</span></div></td>
                                            @else
                                                <td data-bs-toggle="modal" data-bs-target="#rejectmodal"><div style="padding: 6px;"><span style="font-weight: 500 !important;">Nein</span></div></td>

                                            @endif
                                        @else
                                            <tr style="border-top: 1px solid #E9E8E8 !important;" onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                <th scope="row"
                                                    style="font-weight: 600 !important;"><div style="padding: 6px;">{{$data[$i]->id}}</div></th>
                                                <td style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->first_name}}</div></td>
                                                <td style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->last_name}}</div></td>
                                                @if($mandatiert[$i]['mandatiert'])
                                                    <td><div style="padding: 6px;"><span style="font-weight: 500 !important;">Ja</span></div></td>
                                                @else
                                                    <td><div style="padding: 6px;"><span style="font-weight: 500 !important;">Nein</span></div></td>
                                                @endif
                                        @endif
                                    @else
                                        @if($family_person[$i]->kundportfolio == 0)
                                            <tr style="border-top: 1px solid #E9E8E8 !important;" onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <th scope="row"
                                                style="font-weight: 600 !important;"><div style="padding: 6px;">{{$data[$i]->id}}</div></th>
                                            <td style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->first_name}}</div></td>
                                            <td style="font-weight: 500 !important;"><div style="padding: 6px;">{{$data[$i]->last_name}}</div></td>
                                            @if($mandatiert[$i]['mandatiert'])
                                                <td>
                                                    <div style="padding: 6px;"><span style="font-weight: 500 !important;">Ja</span></div>
                                                </td>
                                            @else
                                                <td>
                                                    <div style="padding: 6px;"><span style="font-weight: 500 !important;">Nein</span></div>
                                                </td>
                                            @endif
                                        @else        
                                            <tr style="border-top: 1px solid #E9E8E8 !important;">
                                                <th scope="row" class="" style="font-weight: 600 !important;"><div style="padding: 6px;">{{$data[$i]->id}}</div></th>
                                                    <td style="font-weight: 500 !important;" onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div style="padding: 6px;">
                                                            {{$data[$i]->first_name}}
                                                        </div>
                                                    </td>
                                                    <td style="font-weight: 500 !important;" onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div style="padding: 6px;">
                                                            {{$data[$i]->last_name}}
                                                        </div>
                                                    </td>
                                                @if($mandatiert[$i]['mandatiert'])
                                                    <td onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                    <div style="padding: 6px;">    
                                                        <span style="font-weight: 500 !important;">Ja</span>
                                                    </div>
                                                    </td>
                                                @else
                                                    <td onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div style="padding: 6px;">
                                                            <span style="font-weight: 500 !important;">Nein</span>
                                                        </div>
                                                    </td>
                                                @endif
                                            
                                        @endif
                                    @endif    
                                                    @if (($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)') && ($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)') &&
                                                        ($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)') && ($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)') &&
                                                        ($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)') && ($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)'))
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                style="padding:6px !important;font-weight: 500 !important"
                                                                id="status">{{$family_person[$i]->status_of_produkts}}</div>
                                                        </td>
                                                    @else
                                                    
                                                
                                                    <td onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div class="lastDivRemovePadding">
                                                            @if(!empty($grundversicherungP[$i]))
                                                                @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')

                                                                @else
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;">
                                                                            <span style="font-weight: 500 !important;">Grundversicherung</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(!empty($retchsschutzP[$i]))
                                                                @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')

                                                                @else
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;">
                                                                            <span style="font-weight: 500 !important;">Rechtsschutz</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(!empty($vorsorgeP[$i]))
                                                                @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')
                                                                
                                                                @else
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;">
                                                                            <span style="font-weight: 500 !important;">Vorsorge</span>
                                                                        </div>    
                                                                    </div>
                                                                @endif
                                                            @endif    
                                                            @if(!empty($zusatzversicherungP[$i]))
                                                                @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')
                                                                
                                                                @else
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;">
                                                                            <span style="font-weight: 500 !important;">Zusatzversicherung</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif 
                                                            @if(!empty($autoversicherungP[$i]))
                                                                @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')
                                                                
                                                                @else
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px ;">
                                                                            <span style="font-weight: 500 !important;">Autoversicherung @if($totaliNeuen[$i]['netotali'] > 1)
                                                                                ({{$totaliNeuen[$i]['netotali']}})@endif</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if(!empty($hausratP[$i]))
                                                                @if($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)')
                                                                
                                                                @else 
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;">
                                                                            <span style="font-weight: 500 !important;">Hausrat</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif          
                                                        </div>
                                                    </td>
                                                    <td onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div class="lastDivRemovePadding">
                                                            @if(!empty($grundversicherungP[$i]))
                                                                @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')

                                                                @else
                                                                    @if($grundversicherungP[$i]->status_PG == 'Provisionert')
                                                                        <div class="pb-3"> 
                                                                            <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;">{{findgrund($grundversicherungP[$i]->society_PG,'Grund',$grundversicherungP[$i]->total_commisions_PG)}}CHF</span></div>
                                                                        </div>
                                                                    @else
                                                                        <div class="pb-3"> 
                                                                            <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(!empty($retchsschutzP[$i]))
                                                                @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')

                                                                @else
                                                                    @if($retchsschutzP[$i]->status_PR == 'Provisionert')
                                                                        <div class="pb-3">
                                                                            <div style="padding: 6px;color: #037241; font-weight: 500 !important;">{{findgrund($retchsschutzP[$i]->society_PR,'Ru',$retchsschutzP[$i]->total_commisions_PR)}}CHF</div>
                                                                        </div> 
                                                                    @else
                                                                        <div class="pb-3"> 
                                                                            <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(!empty($vorsorgeP[$i]))
                                                                @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')
                                                                
                                                                @else
                                                                    @if($vorsorgeP[$i]->status_PV == 'Provisionert')
                                                                        <div class="pb-3">
                                                                            <div style="padding: 6px;color: #037241; font-weight: 500 !important;">{{$vorsorgeP[$i]->total_commisions_PV}}&#160;CHF</div>
                                                                        </div>  
                                                                    @else
                                                                        <div class="pb-3"> 
                                                                            <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(!empty($zusatzversicherungP[$i]))
                                                                @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')
                                                                
                                                                @else   
                                                                    @if($zusatzversicherungP[$i]->status_PZ == 'Provisionert')
                                                                    <div class="pb-3">
                                                                    <div style="padding: 6px;color: #037241; font-weight: 500 !important;">{{findgrund($zusatzversicherungP[$i]->society_PZ,'Zusat',$zusatzversicherungP[$i]->total_commisions_PZ)}}CHF</div>
                                                                    </div>
                                                                       
                                                                    @else
                                                                    <div class="pb-3"> 
                                                                        <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            @endif    
                                                            @if(!empty($autoversicherungP[$i]))
                                                                @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')
                                                                
                                                                @else
                                                                    @if($autoversicherungP[$i]->status_PA == 'Provisionert')
                                                                    <div class="pb-3">
                                                                        <div style="padding: 6px;color: #037241; font-weight: 500 !important;">{{$sumNeuen[$i]['nesum']}}CHF
                                                                        </div>
                                                                    </div>    
                                                                    
                                                                    @else
                                                                    <div class="pb-3"> 
                                                                        <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(!empty($hausratP[$i]))
                                                                @if($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)')
                                                                
                                                                @else 
                                                                    @if($hausratP[$i]->status_PH == 'Provisionert')
                                                                        <div class="pb-3">
                                                                            <div style="padding:6px;color: #037241; font-weight: 500 !important;">{{$hausratP[$i]->total_commisions_PH}}CHF</div>
                                                                        </div>
                                                                    @else
                                                                        <div class="pb-3"> 
                                                                            <div style="padding: 6px;"><span style="color: #037241; font-weight: 500 !important;visibility: hidden">CHF</span></div>
                                                                        </div>
                                                                    @endif   
                                                                @endif
                                                            @endif    

                                                        </div>
                                                    </td>
                                                    <td onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                                        <div class="lastDivRemovePadding">
                                                                @if(!empty($grundversicherungP[$i]))
                                                                    @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')

                                                                    @else
                                                                        <div class="pb-3">
                                                                            @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->status_PG == 'Eingereicht')
                                                                                <div class="status1 border-0 py-1 ms-0" id="status"
                                                                                    style="padding:6px !important; background-color: #9F9F9F;font-weight: 500 !important;">
                                                                                    {{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->status_PG == 'Aufgenommen')
                                                                                <div class="status1 border-0 py-1  greencol ms-0" id="status"
                                                                                    style="padding:6px !important;font-weight: 500 !important;">
                                                                                    {{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->status_PG == 'Abgelehnt')
                                                                                <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->status_PG == 'Provisionert' && $grundversicherungP[$i]->stoiner_PG == null)
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($grundversicherungP[$i]->status_PG)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($grundversicherungP[$i]->stoiner_PG == 'Storniert')
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($grundversicherungP[$i]->stoiner_PG)}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endif        
                                                                @if(!empty($retchsschutzP[$i]))
                                                                    @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')

                                                                    @else
                                                                        <div class="pb-3">
                                                                            @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')
                                                                                <div class="status1 border-0 py-1  bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->status_PR == 'Eingereicht')
                                                                                <div class="status1 border-0 py-1 ms-0" id="status"
                                                                                    style="padding:6px !important; background-color: #9F9F9F;font-weight: 500 !important;">
                                                                                    {{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->status_PR == 'Aufgenommen')
                                                                                <div class="status1 border-0 py-1 greencol ms-0  ms-0" id="status"
                                                                                    style="padding:6px !important;font-weight: 500 !important;">
                                                                                    {{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->status_PR == 'Abgelehnt')
                                                                                <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->status_PR == 'Provisionert' && $retchsschutzP[$i]->stoiner_PR == null)
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($retchsschutzP[$i]->status_PR)}}</div>
                                                                            @endif
                                                                            @if($retchsschutzP[$i]->stoiner_PR == 'Storniert')
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($retchsschutzP[$i]->stoiner_PR)}}</div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                @if(!empty($vorsorgeP[$i]))
                                                                    @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')
                                                                    
                                                                    @else
                                                                        <div class="pb-3">
                                                                            @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->status_PV == 'Eingereicht')
                                                                                <div class="status1 border-0 py-1  ms-0" id="status"
                                                                                    style="padding:6px !important; background-color: #9F9F9F">
                                                                                    {{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->status_PV == 'Aufgenommen')
                                                                                <div class="status1 border-0 py-1 greencol ms-0  ms-0" id="status"
                                                                                    style="padding:6px !important;font-weight: 500 !important;">
                                                                                    {{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->status_PV == 'Abgelehnt')
                                                                                <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->status_PV == 'Provisionert' && $vorsorgeP[$i]->stoiner_PV == null)
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($vorsorgeP[$i]->status_PV)}}
                                                                                </div>
                                                                            @endif
                                                                            @if($vorsorgeP[$i]->stoiner_PV == 'Storniert')
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($vorsorgeP[$i]->stoiner_PV)}}
                                                                                </div>
                                                                            @endif
                                                                        </div>    
                                                                    @endif
                                                                @endif
                                                                @if(!empty($zusatzversicherungP[$i]))
                                                                    @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')
                                                                    
                                                                    @else 
                                                                        <div class="pb-3"> 
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')
                                                                                <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Eingereicht')
                                                                                <div class="status1 border-0 py-1 ms-0" id="status"
                                                                                    style="padding:6px !important; background-color: #9F9F9F">
                                                                                    {{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Aufgenommen')
                                                                                <div class="status1 border-0 py-1 greencol ms-0" id="status"
                                                                                    style="padding:6px !important;font-weight: 500 !important;">
                                                                                    {{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Abgelehnt')
                                                                                <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->status_PZ == 'Provisionert' && $zusatzversicherungP[$i]->stoiner_PZ == null)
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</div>
                                                                            @endif
                                                                            @if($zusatzversicherungP[$i]->stoiner_PZ == 'Storniert')
                                                                                <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                    style="padding:6px !important;font-weight: 500 !important;"
                                                                                    id="status">{{strtoupper($zusatzversicherungP[$i]->stoiner_PZ)}}</div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                                @if(!empty($autoversicherungP[$i]))
                                                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')
                                                                    
                                                                    @else  
                                                                    <div class="pb-3"> 
                                                                        @if($totaliNeuen[$i]['netotali'] > 1)
                                                                                @php $offen= 0; @endphp
                                                                                @foreach($statusNeuen[$i]['statusNeuen'] as $status)
                                                                                    @if($status->status_PA != 'Provisionert')
                                                                                        @php $offen++; break; @endphp
                                                                                    @endif
                                                                                @endforeach
                                                                                    @if($offen > 0)
                        
                                                                                        <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">OFFEN</div>
                                                                                    @else
                                                                                        <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">PROVISIONERT</div>
                        
                                                                                    @endif
                                                                        @else
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)')
                                                                                        <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">{{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')
                                                                                        <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">{{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Eingereicht')
                                                                                        <div class="status1 border-0 py-1 ms-0" id="status"
                                                                                            style="padding:6px !important; background-color: #9F9F9F">
                                                                                            {{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Aufgenommen')
                                                                                        <div class="status1 border-0 py-1 greencol ms-0" id="status"
                                                                                            style="padding:6px !important;font-weight: 500 !important;">
                                                                                            {{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Abgelehnt')
                                                                                        <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">{{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->status_PA == 'Provisionert' && $autoversicherungP[$i]->stoiner_PA == null)
                                                                                        <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">{{strtoupper($autoversicherungP[$i]->status_PA)}}</div>
                                                                                    @endif
                                                                                    @if($autoversicherungP[$i]->stoiner_PA == 'Storniert')
                                                                                        <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                                            id="status">{{strtoupper($autoversicherungP[$i]->stoiner_PA)}}</div>
                                                                                    @endif
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                @endif  
                                                                @if(!empty($hausratP[$i]))
                                                                    @if($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)')
                                                                    
                                                                    @else 
                                                                    <div class="pb-3"> 
                                                                        @if($hausratP[$i]->status_PH == 'Offen (Berater)')
                                                                            <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                            style="padding:6px !important;font-weight: 500 !important;"
                                                                            id="status">{{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->status_PH == 'Offen (Innendienst)')
                                                                            <div class="status1 border-0 py-1 bg-warning ms-0"
                                                                                style="padding:6px !important;font-weight: 500 !important;"
                                                                                id="status">{{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->status_PH == 'Eingereicht')
                                                                            <div class="status1 border-0 py-1 ms-0" id="status"
                                                                                style="padding:6px !important; background-color: #9F9F9F">
                                                                                {{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->status_PH == 'Aufgenommen')
                                                                            <div class="status1 border-0 py-1 greencol ms-0" id="status"
                                                                                style="padding:6px !important;font-weight: 500 !important;">
                                                                                {{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->status_PH == 'Abgelehnt')
                                                                            <div class="status1 border-0 py-1 bg-danger ms-0"
                                                                                style="padding:6px !important;font-weight: 500 !important;"
                                                                                id="status">{{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->status_PH == 'Provisionert' && $hausratP[$i]->stoiner_PH == null)
                                                                            <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                style="padding:6px !important;font-weight: 500 !important;"
                                                                                id="status">{{strtoupper($hausratP[$i]->status_PH)}}</div>
                                                                        @endif
                                                                        @if($hausratP[$i]->stoiner_PH == 'Storniert')
                                                                            <div class="status1 border-0 py-1 bg-success ms-0"
                                                                                style="padding:6px !important;font-weight: 500 !important;"
                                                                                id="status">{{strtoupper($hausratP[$i]->stoiner_PH)}}</div>
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                @endif 
                                                        </div>
                                                    </td>
                                                    @endif
                                            </tr>
                                        
                                   

                                        <div class="modal fade" id="rejectmodal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog h-75 d-flex align-items-center">
                                                <div class="modal-content"
                                                    style="background: #f8f8f8; border-radius: 15px !important;">
                                                    <div class="modal-body p-3">
                                                        <div class="row">
                                                            <span style="font-size: 16px;font-weight: 500;color: #434343"
                                                                class="text-center">
                                                                Du kannst den Kunden aktuell nicht offnen, da der Innendienst
                                                                den Kunden noch nicht fertig erstellt hat.
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center p-0 pb-3"
                                                        style="border-top: none !important; display: block;">
                                                        <button type="button" class="btn px-3"
                                                            style=" color: #ffffff !important; background-color: #2F60DC !important;border-radius: 7px !important;font-weight: 600;"
                                                            data-bs-dismiss="modal">Schliessen</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end py-3" style="background-color: transparent;display: none !important;">
                        <div class="prev-nxt-btn d-flex">
                            <div class="prev-btn border p-2 bg-light m-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </div>
                            <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end py-1 pe-3" style="background-color: transparent;">
                        <div class="prev-nxt-btn d-flex">
                            <a href="{{route('costumers',['page' => $data->currentPage() - 1])}}">
                                <div class="prev-btn border p-2 bg-light m-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                            </a>
                            @if($data->count() > 0)
                                <a href="{{route('costumers',['page' => $data->currentPage() + 1])}}">
                                    <div class="nxt-btn border p-2 bg-light m-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('backoffice'))
                <div class="pt-4">
                    <a href="{{route('insertcostumer')}}">
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
                                        <span class="text-dark">Neuen Kunden erfassen</span>
                                    </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                
                @if(auth()->user()->hasRole('admin'))
                    <div class="container-fluid p-0">

                        <div class="col-12 g-0 pb-5">
                            <div class="import-leads-div p-3 mb-5 mt-4">
                                <form action="{{route('importcostumer')}}" class="mb-2" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row g-0">
                                        <div class="col-auto cornerSvgKunden">
                                        <svg width="152" height="145" viewBox="0 0 152 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g filter="url(#filter0_d_28_428)">
                                                <path d="M37.8069 76.6026C40.6009 81.2529 48.549 85.8226 52.7914 89.1208C57.0338 92.419 51.5166 101.776 56.5617 103.22C61.6067 104.664 77.1152 98.167 82.1948 97.5371C87.2743 96.9072 92.1229 95.2406 96.4637 92.6326C100.805 90.0246 104.552 86.5261 107.494 82.3371C110.435 78.148 112.512 73.3503 113.605 68.2179C114.699 63.0855 114.788 57.7189 113.868 52.4246C112.948 47.1303 112.098 38.1049 111.256 33.1283L81.7651 33.1283L66.0146 33.1283C59.912 33.1283 53.8732 34.3691 48.2651 36.7755V36.7755L47.1878 37.6043C43.6431 40.3309 40.9294 43.9925 39.3519 48.1771V48.1771C38.3303 50.8871 37.8069 53.7593 37.8069 56.6555L37.8069 76.6026Z" fill="#DCE4F9"/>
                                                </g>
                                                <path d="M90.375 67.9464H77.786L80.2522 65.2408L78.9044 63.7678L74.125 68.991L78.9044 74.2143L80.2522 72.7413L77.786 70.0357H90.375V67.9464Z" fill="#313131"/>
                                                <path d="M86.8928 62.9388V58.9592C86.8936 58.8283 86.8673 58.6985 86.8153 58.5772C86.7633 58.456 86.6867 58.3458 86.5899 58.2528L79.2774 51.2885C79.1798 51.1963 79.064 51.1234 78.9367 51.0739C78.8095 51.0244 78.6732 50.9993 78.5357 51H68.0893C67.5352 51 67.0038 51.2097 66.6119 51.5828C66.2201 51.956 66 52.4621 66 52.9898V76.8673C66 77.3951 66.2201 77.9012 66.6119 78.2743C67.0038 78.6475 67.5352 78.8571 68.0893 78.8571H84.8036C85.3577 78.8571 85.8891 78.6475 86.2809 78.2743C86.6727 77.9012 86.8928 77.3951 86.8928 76.8673V74.8776H84.8036V76.8673H68.0893V52.9898H76.4464V58.9592C76.4464 59.4869 76.6665 59.993 77.0584 60.3662C77.4502 60.7394 77.9816 60.949 78.5357 60.949H84.8036V62.9388H86.8928ZM78.5357 58.9592V53.3977L84.3753 58.9592H78.5357Z" fill="#313131"/>
                                                <defs>
                                                <filter id="filter0_d_28_428" x="0.808594" y="0.128296" width="150.688" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                        <div class="col cornerSvgKundenDiv">
                                            <div class="head">
                                                <span class="fs-5" style="font-weight: 600;">Kunden Importieren</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content py-3" style="margin-top: -2.5rem;">
                                        <div class="row g-0">
                                            <div class="col-12 col-md pb-2 pb-md-0 pe-0 pe-md-2">
                                                <label for="file" class="leadsCustomFileInput form-control">
                                                    <div class="row g-0">
                                                        <div class="col my-auto ps-2">
                                                            <span id="afterUploadTextKunden">keine Datei ausgewählt</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2">Datei auswählen</div>
                                                        </div>
                                                    </div>
                                                    <input onchange="changeUploadText()" class="d-none" type="file" name="costumerfile" id="file">
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
                                            <div class="col-12 col-md-auto my-auto">
                                                <input class="leadOffnenBtnStyle w-100 py-1 px-4" type="submit" class="mt-2 btn py-2" value="Hochladen">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>

    {{--    mobile--}}

    <div class="mobile-kunden container-fluid p-3 p-sm-4 p-md-5">
        <form method="post" action="{{route('search')}}">
            <div class="filters mx-3">
                <div class="row" style="position: relative;">
                    <div class="col g-0">

                        @csrf
                        <div class="input-group">
                            <input type="text" class="border-0 input-suchen form-control searchPlaceholderStyle searchPlaceholderStyle2 py-2" name="searchname" style="background: #F7F7F7 !important;border: 1px solid rgba(100, 97, 97, 0.05) !important;border-radius: 11px !important;"
                                   placeholder="Suche (Kundenname, Vert )">
                        </div>

                    </div>

                    <div class="col-auto my-auto g-0 ps-1" id="ascDscSort">
<!--    {{-- <a href="{{route('searchword')}}" style="text-decoration: none;color: #434343;cursor: pointer"
                           class="">
                            <div class="date-filter p-2 text-center">
                            <svg width="21" height="21" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="23" height="23" fill="#F7F7F7"/>
                                <path d="M20.9882 8.87501L18.3644 1.17664C18.3473 1.12513 18.313 1.08013 18.2666 1.04832C18.2202 1.01651 18.1641 0.999568 18.1066 1.00001H15.8651C15.7463 1.00001 15.645 1.07066 15.6073 1.17664L12.9632 8.87501C12.9546 8.89946 12.9488 8.92664 12.9488 8.95381C12.9488 9.0924 13.0704 9.20653 13.2181 9.20653H14.8515C14.9731 9.20653 15.0774 9.13044 15.1121 9.02174L15.6189 7.34783H18.1964L18.6974 9.01903C18.7293 9.12772 18.8364 9.20381 18.9581 9.20381H20.7304C20.7594 9.20381 20.7855 9.20109 20.8115 9.19294C20.881 9.1712 20.936 9.12772 20.9708 9.06794C21.0027 9.00816 21.0084 8.94022 20.9882 8.87501ZM15.8825 5.93207L16.8324 2.75544H17.0148L17.9444 5.93207H15.8825ZM20.0383 19.3261H16.285V19.3152L20.1252 14.1821C20.157 14.1386 20.1744 14.0897 20.1744 14.0353V13.0462C20.1744 12.9076 20.0528 12.7935 19.9051 12.7935H13.9971C13.8494 12.7935 13.7278 12.9076 13.7278 13.0462V14.2147C13.7278 14.3533 13.8494 14.4674 13.9971 14.4674H17.5477V14.4783L13.6931 19.6114C13.6609 19.6544 13.6437 19.7056 13.6438 19.7582V20.7473C13.6438 20.8859 13.7655 21 13.9131 21H20.0354C20.1831 21 20.3047 20.8859 20.3047 20.7473V19.5788C20.3051 19.5457 20.2985 19.5129 20.2853 19.4823C20.272 19.4517 20.2525 19.4238 20.2277 19.4003C20.2029 19.3768 20.1734 19.3581 20.1409 19.3454C20.1084 19.3326 20.0735 19.3261 20.0383 19.3261ZM8.72055 16.163H6.51956V1.76088C6.51956 1.64131 6.4153 1.54349 6.28788 1.54349H4.66609C4.53867 1.54349 4.43441 1.64131 4.43441 1.76088V16.163H2.23342C2.03939 16.163 1.92934 16.375 2.05097 16.5163L5.29454 20.3723C5.31621 20.3983 5.3439 20.4193 5.37551 20.4337C5.40712 20.4482 5.44182 20.4557 5.47699 20.4557C5.51215 20.4557 5.54685 20.4482 5.57846 20.4337C5.61007 20.4193 5.63776 20.3983 5.65944 20.3723L8.903 16.5163C9.02174 16.375 8.91458 16.163 8.72055 16.163Z" fill="#646464"/>
                                </svg>
                            </div>
                        </a> --}} -->

                    </div>
                    <div class="col-auto my-auto ps-1 pe-0">
                        <div class="date-filter p-2 text-center" onclick="openFilterModalMobile()">
                            <svg width="21" height="21" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="23" height="23" fill="transparent"/>
                                <path d="M4.92857 12.393C4.92857 12.6352 5.01135 12.8675 5.1587 13.0388C5.30606 13.2101 5.5059 13.3063 5.71428 13.3063H18.2857C18.4941 13.3063 18.6939 13.2101 18.8413 13.0388C18.9886 12.8675 19.0714 12.6352 19.0714 12.393C19.0714 12.1508 18.9886 11.9185 18.8413 11.7472C18.6939 11.5759 18.4941 11.4797 18.2857 11.4797H5.71428C5.5059 11.4797 5.30606 11.5759 5.1587 11.7472C5.01135 11.9185 4.92857 12.1508 4.92857 12.393ZM1.78572 6H22.2143C22.4227 6 22.6225 6.09622 22.7699 6.2675C22.9172 6.43877 23 6.67107 23 6.91329C23 7.15551 22.9172 7.3878 22.7699 7.55908C22.6225 7.73035 22.4227 7.82658 22.2143 7.82658H1.78572C1.57733 7.82658 1.37748 7.73035 1.23013 7.55908C1.08278 7.3878 1 7.15551 1 6.91329C1 6.67107 1.08278 6.43877 1.23013 6.2675C1.37748 6.09622 1.57733 6 1.78572 6ZM9.64286 16.9595H14.3571C14.5655 16.9595 14.7654 17.0557 14.9127 17.2269C15.0601 17.3982 15.1429 17.6305 15.1429 17.8727C15.1429 18.115 15.0601 18.3473 14.9127 18.5185C14.7654 18.6898 14.5655 18.786 14.3571 18.786H9.64286C9.43447 18.786 9.23462 18.6898 9.08727 18.5185C8.93992 18.3473 8.85714 18.115 8.85714 17.8727C8.85714 17.6305 8.93992 17.3982 9.08727 17.2269C9.23462 17.0557 9.43447 16.9595 9.64286 16.9595Z" fill="#646464"/>
                                </svg>
                        </div>
                    </div>
                    <div class="col-9 px-0 mx-0 pt-1 filtersortMobile" id="filterSort" style="display: none;">
                        <div class="sort-filter p-3">
                            <div class="dropdown ">
                                <!-- <button class="dropdown-toggle border-0 bg-transparent" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 28.391 27.587">
                                        <g id="Group_980" data-name="Group 980" transform="translate(1.25)">
                                        <g id="Group_17" data-name="Group 17">
                                        <line id="Line_5" data-name="Line 5" x2="25.891"
                                                transform="translate(0 24.217)" fill="none" stroke="#C5C7CD"
                                                stroke-linecap="round" stroke-width="2.5"></line>
                                        <line id="Line_6" data-name="Line 6" x2="25.891"
                                                transform="translate(0 13.488)" fill="none" stroke="#C5C7CD"
                                                stroke-linecap="round" stroke-width="2.5"></line>
                                        <line id="Line_7" data-name="Line 7" x2="25.891"
                                                transform="translate(0 2.76)" fill="none" stroke="#C5C7CD"
                                                stroke-linecap="round" stroke-width="2.5"></line>
                                        <g id="Ellipse_4" data-name="Ellipse 4"
                                            transform="translate(4.926 21.457)" stroke="#C5C7CD"
                                            stroke-width="1">
                                            <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none">
                                            </ellipse>
                                            <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none">
                                            </ellipse>
                                        </g>
                                        <g id="Ellipse_5" data-name="Ellipse 5"
                                            transform="translate(16.186 10.728)" stroke="#C5C7CD"
                                            stroke-width="1">
                                            <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none">
                                            </ellipse>
                                            <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none">
                                            </ellipse>
                                        </g>
                                        <g id="Ellipse_6" data-name="Ellipse 6" transform="translate(4.926)"
                                            stroke="#C5C7CD" stroke-width="1">
                                            <ellipse cx="2.815" cy="3.065" rx="2.815" ry="3.065" stroke="none">
                                            </ellipse>
                                            <ellipse cx="2.815" cy="3.065" rx="2.315" ry="2.565" fill="none">
                                            </ellipse>
                                        </g>
                                        </g>
                                        </g>
                                        </svg>
                                        </span>

                                </button> -->

                                @csrf
                                <div class="pb-2">
                                <label for="from-date" class="fw-600 text-start">Von</label>
                                <input type="date" class="form-control px-0" name="searchdate1" placeholder="mm/dd/yyyy" style="border: none !important; outline: none !important;">

                                </div>
                                <div>
                                    <label for="to-date" class="fw-600">Zu</label>
                                    <input type="date" class="form-control px-0" name="searchdate2" placeholder="mm/dd/yyyy" style="border: none !important; outline: none !important;">
                                </div>

                                <div class="pt-1">
                                <input type="submit" style="background-color: #2F60DC !important;border-radius:8px !important;"
                                       class="border-0 bg-secondary text-light fw-600 mt-2 px-0 text-center rounded dropdown-item form-control"
                                       value="Suche">
                                </div>


                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </form>
        <div class="content">
            <div class="overflow-content">
                @if(!$data == [])
                    @for($i = 0; $i < count($data); $i++)
                        @php $leadss=$data[$i]->id * 1244;
                        $datId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                        @endphp

                        <div class="content-box my-2 mx-1 px-3 py-2">
                            <div class="top">
                                @if(Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('salesmanager'))
                                    @if($family_person[$i]->kundportfolio == 0)
                                        <div class="name-div" data-bs-toggle="modal" data-bs-target="#rejectmodali">
                                            <span class="fs-6">{{$data[$i]->first_name}} {{$data[$i]->last_name}} <span style="font-weight: 400;font-size: 14px" class="ps-2"> {{Carbon\Carbon::createFromFormat('Y-m-d',$data[$i]->birthdate)->format('d.m.Y')}}</span></span>
                                        </div>
                                    @else
                                        <div class="name-div"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <span class="fs-6">{{$data[$i]->first_name}} {{$data[$i]->last_name}} <span style="font-weight: 400;font-size: 14px" class="ps-2">{{Carbon\Carbon::createFromFormat('Y-m-d',$data[$i]->birthdate)->format('d.m.Y')}}</span></span>
                                        </div>
                                    @endif
                                @else
                                    @if($family_person[$i]->kundportfolio == 0)
                                        <div class="name-div"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <span class="fs-6">{{$data[$i]->first_name}} {{$data[$i]->last_name}} <span style="font-weight: 400;font-size: 14px" class="ps-2">{{Carbon\Carbon::createFromFormat('Y-m-d',$data[$i]->birthdate)->format('d.m.Y')}}</span></span>
                                        </div>
                                    @else
                                        <div class="name-div"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <span class="fs-6">{{$data[$i]->first_name}} {{$data[$i]->last_name}}<span style="font-weight: 400;font-size: 14px" class="ps-2">{{Carbon\Carbon::createFromFormat('Y-m-d',$data[$i]->birthdate)->format('d.m.Y')}}</span></span>
                                        </div>
                                    @endif
                                @endif
                                @if($mandatiert[$i]['mandatiert'])
                                    <div class="mandatiert-div">
                                        <span style="font-weight: 500 !important;">Mandatiert</span>
                                    </div>
                                @else
                                @endif
                            </div>
                            @if (($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)') && ($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)') &&
                                ($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)') && ($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)') &&
                                ($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)') && ($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)'))
                                   <div class="row my-1"
                                   onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                        <div class="col-6">
                                            <div class="title-status">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="status-check bg-warning py-1">
                                                <span>{{$family_person[$i]->status_of_produkts}}</span>
                                            </div>
                                        </div>
                                   </div>
    
                            @endif
                            <div class="info-divider">
                                
                                @if(!empty($grundversicherungP[$i]))
                                    @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)' || $grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                                                    <span>Grundversicherung</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($grundversicherungP[$i]->status_PG == 'Offen (Berater)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                                @if($grundversicherungP[$i]->status_PG == 'Offen (Innendienst)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                                @if($grundversicherungP[$i]->status_PG == 'Eingereicht')
                                                    <div class="status-check py-1" style="background-color: #9F9F9F">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                                @if($grundversicherungP[$i]->status_PG == 'Aufgenommen')
                                                    <div class="status-check greencol py-1">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                                @if($grundversicherungP[$i]->status_PG == 'Abgelehnt')
                                                    <div class="status-check bg-danger py-1">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                                @if($grundversicherungP[$i]->status_PG == 'Provisionert')
                                                    <div class="status-check bg-success py-1">
                                                        <span>{{strtoupper($grundversicherungP[$i]->status_PG)}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if(!empty($retchsschutzP[$i]))
                                    @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)' || $retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                                                    <span>Rechtsschutz</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($retchsschutzP[$i]->status_PR == 'Offen (Berater)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                                @if($retchsschutzP[$i]->status_PR == 'Offen (Innendienst)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                                @if($retchsschutzP[$i]->status_PR == 'Eingereicht')
                                                    <div class="status-check py-1" style="background-color: #9F9F9F">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                                @if($retchsschutzP[$i]->status_PR == 'Aufgenommen')
                                                    <div class="status-check greencol py-1">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                                @if($retchsschutzP[$i]->status_PR == 'Abgelehnt')
                                                    <div class="status-check bg-danger py-1">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                                @if($retchsschutzP[$i]->status_PR == 'Provisionert')
                                                    <div class="status-check bg-success py-1">
                                                        <span>{{strtoupper($retchsschutzP[$i]->status_PR)}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if(!empty($vorsorgeP[$i]))
                                    @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)' || $vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                                                    <span>Vorsorge</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($vorsorgeP[$i]->status_PV == 'Offen (Berater)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                                @if($vorsorgeP[$i]->status_PV == 'Offen (Innendienst)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                                @if($vorsorgeP[$i]->status_PV == 'Eingereicht')
                                                    <div class="status-check py-1" style="background-color: #9F9F9F">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                                @if($vorsorgeP[$i]->status_PV == 'Aufgenommen')
                                                    <div class="status-check greencol py-1">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                                @if($vorsorgeP[$i]->status_PV == 'Abgelehnt')
                                                    <div class="status-check bg-danger py-1">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                                @if($vorsorgeP[$i]->status_PV == 'Provisionert')
                                                    <div class="status-check bg-success py-1">
                                                        <span>{{strtoupper($vorsorgeP[$i]->status_PV)}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if(!empty($zusatzversicherungP[$i]))
                                    @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)' || $zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                                                    <span>Zusatzversicherung</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Berater)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Offen (Innendienst)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Eingereicht')
                                                    <div class="status-check py-1" style="background-color: #9F9F9F">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Aufgenommen')
                                                    <div class="status-check greencol py-1">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Abgelehnt')
                                                    <div class="status-check bg-danger py-1">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                                @if($zusatzversicherungP[$i]->status_PZ == 'Provisionert')
                                                    <div class="status-check bg-success py-1">
                                                        <span>{{strtoupper($zusatzversicherungP[$i]->status_PZ)}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if(!empty($autoversicherungP[$i]))
                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)' || $autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                        <span>Autoversicherung @if($totaliNeuen[$i]['netotali'] > 1)
                        ({{$totaliNeuen[$i]['netotali']}})@endif</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($totaliNeuen[$i]['netotali'] > 1)
                                                    @php $offen= 0; @endphp
                                                    @foreach($statusNeuen[$i]['statusNeuen'] as $status)
                                                        @if($status->status_PA != 'Provisionert')
                                                            @php $offen++; break; @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($offen > 0)
                                                        <div class="status-check bg-warning py-1">
                                                            <span>OFFEN</span>
                                                        </div>
                                                    @else
                                                        <div class="status-check bg-success py-1">
                                                            <span>PROVISIONERT</span>
                                                        </div>
                                                    @endif
                                                @else
                                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Berater)')
                                                        <div class="status-check bg-warning py-1">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif
                                                    @if($autoversicherungP[$i]->status_PA == 'Offen (Innendienst)')
                                                        <div class="status-check bg-warning py-1">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif
                                                    @if($autoversicherungP[$i]->status_PA == 'Eingereicht')
                                                        <div class="status-check py-1"
                                                             style="background-color: #9F9F9F">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif
                                                    @if($autoversicherungP[$i]->status_PA == 'Aufgenommen')
                                                        <div class="status-check greencol py-1">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif
                                                    @if($autoversicherungP[$i]->status_PA == 'Abgelehnt')
                                                        <div class="status-check bg-danger py-1">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif
                                                    @if($autoversicherungP[$i]->status_PA == 'Provisionert')
                                                        <div class="status-check bg-success py-1">
                                                            <span>{{strtoupper($autoversicherungP[$i]->status_PA)}}</span>
                                                        </div>
                                                    @endif

                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if(!empty($hausratP[$i]))
                                    @if($hausratP[$i]->status_PH == 'Offen (Berater)' || $hausratP[$i]->status_PH == 'Offen (Innendienst)')

                                    @else
                                        <div class="row my-1"
                                             onclick="window.location.href='{{route('costumer_form', $datId)}}'">
                                            <div class="col-6 my-auto">
                                                <div class="title-status">
                                                    <span>Hausrat</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($hausratP[$i]->status_PH == 'Offen (Berater)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                                @if($hausratP[$i]->status_PH == 'Offen (Innendienst)')
                                                    <div class="status-check bg-warning py-1">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                                @if($hausratP[$i]->status_PH == 'Eingereicht')
                                                    <div class="status-check py-1" style="background-color: #9F9F9F">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                                @if($hausratP[$i]->status_PH == 'Aufgenommen')
                                                    <div class="status-check greencol py-1">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                                @if($hausratP[$i]->status_PH == 'Abgelehnt')
                                                    <div class="status-check bg-danger py-1">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                                @if($hausratP[$i]->status_PH == 'Provisionert')
                                                    <div class="status-check bg-success py-1">
                                                        <span>{{strtoupper($hausratP[$i]->status_PH)}}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="rejectmodali" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"
                                     style="background: #f8f8f8; border-radius: 15px">
                                    <div class="modal-body p-3">
                                        <div class="row">
                    <span style="font-size: 16px;" class="text-center">
                        Du kannst gerade nicht eintreten!
                    </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center p-0 pb-3"
                                         style="border-top: none !important; display: block;">
                                        <button type="button" class="btn px-3"
                                                style=" color: #ffffff !important; background-color: #2F60DC !important;border-radius: 7px !important;font-weight: 600;"
                                                data-bs-dismiss="modal">Schliessen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>

    </div>


    </body>
@endsection
<script>
    function NaBleronit() {
        document.getElementById("inputPress").style.display = "none";
        document.getElementById("inputShow").style.display = "block";
        document.getElementById("ascDscSort").classList.remove('col');
        document.getElementById("ascDscSort").classList.remove('col');
        document.getElementById("ascDscSort").classList.add('col-6');
        document.getElementById("filterSort").classList.add('col-6');
    }
    function openFilterModalMobile() {
        $("#filterSort").slideToggle()
    }
    function openSortInputs() {
        $('#sortdatainputs').slideToggle();
    }
</script>
<style>
    
    .filtersortMobile {
        position: absolute;
        right: 0rem;
        top: 2.5rem;
    }
    .kundenSearchBarStyle {
        background: #F7F7F7;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 11px;
    }
    .table>:not(caption)>*>* {
        padding: 1rem 0.5rem !important;
    }
    .kundenCustomTableStyle {
        border-radius: 23px;
    }
    .kundenCustomTableStyle th,td,tr,thead,tbody {
        border: none !important;
    }
    .kundenCustomTableStyle thead th:first-child {
        text-align: center;
    }
    .kundenCustomTableStyle tbody th {
        text-align: center;
        border-right: 1px solid #E9E8E8 !important;
        font-weight: 600 !important;
    }
    .kundenCustomTableStyle td {
        border-collapse:collapse
    }

    .kundenCustomTableStyle thead th {
        border-bottom: 1px solid #E9E8E8 !important;
    }

    .kundenCustomTableStyle tr:last-child {
        border-bottom-left-radius: 23px;
    }

    .dropdown-item:focus-visible {
        outline: none !important;
    }
    {
    background: #F7F7F7;
    border: 1px solid rgba(100, 97, 97, 0.05);
    border-radius: 11px;
    }
    .searchPlaceholderStyle::placeholder {
        color: #CFCECE !important;
    }
    .searchPlaceholderStyle2 {
        background: #fff !important;

    }
    .searchPlaceholderStyle2::placeholder {
        font-size: 15px !important;
    }
    .cornerSvgKundenDiv {
        margin-top: -0.3rem !important;
        margin-left: -1rem;
    }
    .cornerSvgKunden {
        margin-top: -3.1rem !important;
        margin-left: -3.4rem;
    }
    .import-leads-div {
        background: #F9FAFC;
        border-radius: 23px;
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

    /* overflow 1 */
    .ovrflw::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    /* Track */
    .ovrflw::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .ovrflw::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    /* Handle on hover */
    .ovrflw::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .input-suchen:focus-visible {
        outline: none;

    }

    .suchen-style1 {
        background-color: #fff;
        border-radius: 0px;
        border-bottom: 0.5px solid black;
    }

    .suchen-style2 {
        background-color: #fff;
        border-radius: 0px;
        border-bottom: 0.5px solid black;
    }

    .dropdown button:after {
        display: none;
    }

    .header-styling {
        font-weight: 600 !important;
        color: #2D2D2D !important;
        position: sticky !important;
        top: 0;
        background-color: #F9FAFC !important;
    }

    .table {
        margin-bottom: 0 !important;
    }

    #body-table-edit td {
        margin-top: 0.6rem !important;
        margin-bottom: 0.3rem !important;

    }

    #status {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }

    .status1 {
        font-weight: 500;
        background-color: #D9D9D9 !important;
        border-radius: 14px;
        color: #fff;
        display: flex;
        justify-content: center;
    }

    .status2 {
        /*background-color: #239654 !important;*/
        font-weight: 500;
        border-radius: 10px;
        color: #fff;
        display: flex;
        justify-content: center;
    }

    .status3 {
        /*background-color: #F1CA4B !important;*/
        font-weight: 500;
        border-radius: 10px;
        color: #fff;
        display: flex;
        justify-content: center;
    }

    table tbody {
        border-top: 15px solid white;
    }

    .bg-color1 {
        background-color: #F0F0F0;
    }

    .kundenstyle1 {
        background-color: #F9FAFC;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
        border-top-left-radius: 23px;
        border-top-right-radius: 23px;
        border-bottom: none;
    }

    .kundenstyle2 {
        background-color: #F9FAFC;
        border-bottom-left-radius: 23px;
        border-bottom-right-radius: 23px;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-top: none;
        margin-top: -2.5rem !important;
    }

    .greencol {
        background-color: rgb(100, 199, 100) !important;
    }

    .openbtn {
        background-color: #30a56e;
        color: #fff1ff;
        padding-left: 35px;
        padding-right: 35px;
        padding-top: 1px;
        padding-bottom: 1px;
        border-radius: 5px;
    }

    .rejectbtn {
        background-color: #fa3737;
        color: #fff1ff;
        padding-left: 22px;
        padding-right: 22px;
        padding-top: 1px;
        padding-bottom: 1px;
        border-radius: 5px;
    }

    #body-table-edit td {
        margin-top: 0.6rem !important;
        margin-bottom: 0.3rem !important;
    }
    .lastDivRemovePadding .pb-3:last-child {
        padding-bottom: 0% !important;
    }
    .lastDivRemovePadding div {
        padding-left: 0% !important;
    } 
    .lastDivRemovePadding .py-1 {
        padding-left: 0% !important;
    }
    table div {
        padding-left: 0% !important;
    }
    .lastDivRemovePadding span {
        word-break: keep-all !important;
    }
</style>

{{--test--}}

<style>

    .desktop-kunden {
        display: block;
    }

    #inputShow {
        display: none;
    }

    .mandatiert-div {
        color: #64D4A4;
    }

    .name-div {
        color: #434343;
        font-weight: 600;
    }

    .title-status {
        color: #7B7B7B;
        font-weight: 500;
        font-size: 15px;
    }

    .status-check {
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-align: center;
        border-radius: 8px;
    }

    @media (max-width: 575.98px) {
        .status-check {
            font-size: 13px;
        }

        .title-status {
            font-size: 13px;
        }
    }

    .aufg-s {
        background-color: #6FCF97;
    }

    .prov-s {
        background-color: #219653;
    }

    .offen-s {
        background-color: #F2C94C;
    }

    .content-box {
        background: linear-gradient(0deg, #F9FAFC, #F9FAFC), linear-gradient(0deg, #FFFFFF, #FFFFFF), #FFFFFF;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 11px;
    }


    .overflow-content {
        overflow-x: hidden;
        overflow-y: auto;
        height: 70vh;
    }

    .date-filter {
        background: #F7F7F7;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 8px;
    }

    .sort-filter {
        background: #FFFFFF;
        box-shadow: 0px 4px 4px rgba(185, 185, 185, 0.25);
        border-radius: 14px;
    }

    .search-filter {
        background-color: #fff;
        border-radius: 8px;
    }

    .sort-filter svg {
        fill: #C5C7CD;
        stroke: #C5C7CD;
    }

    .dropdown button:after {
        display: none;
    }

    .mobile-kunden {
        display: none;
    }

    @media (max-width: 991.98px) {
        .mobile-kunden {
            display: block;
        }

        .desktop-kunden {
            display: none;
        }

        body {
            background-color: #fff !important;
        }
    }

    .sortData{
        background: #FFFFFF;
        box-shadow: 0px 4px 4px rgba(185, 185, 185, 0.25);
        border-radius: 14px;

        position: absolute;
        z-index: 999;
        top: 5rem;
        right: 1.5rem;
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

</style>
