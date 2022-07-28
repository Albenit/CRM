@extends('template.navbar')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <title>Startseite</title>
    @if (in_array('admin', $urole))
    <div class="px-4 px-lg-5 pt-4 pt-lg-5 ">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-4 mb-5 mb-md-0">
                <div class="greyBgStats p-3 p-sm-4">
                    <div>
                        <div style="position: relative;">
                            <div class="col my-auto">
                                <div>
                                    <span class="statsTitleSpan fs-3">Group Perfomance</span>
                                </div>
                                <div>
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-5 mb-5 mb-md-0">
                <div class="greyBgStats p-3 p-sm-4">
                    <div>
                        <div style="position: relative;">
                            <div class="col my-auto">
                                <div>
                                    <span class="statsTitleSpan fs-3">Group Perfomance</span>
                                </div>
                                <div>
                                    <div id="chart9"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-3 mb-5  mb-md-0 ">
                <div class="greyBgStats p-3 p-sm-4 h-100">
                    <div>
                        <div style="position: relative;">
                            <div class="col my-auto">
                                <div>
                                    <span class="statsTitleSpan fs-3">Top Beraters</span>
                                </div>
                                <div>
                                    <div class="row g-0">
                                        <div class="col-12 py-3" >
                                            @php
                                                $cnt = 1;
                                                
                                            @endphp
                                            @foreach ($ff2 as $key => $value)
                                            @php
                                                $admin = App\Models\Admins::find($key);
                                            @endphp
                                            <div class="adminHrGreyBg my-4 py-2 px-3">
                                                <div class="row py-2">
                                                    <div class="col-4 my-auto">
                                                        @if ($admin->admin_id == null)
                                                            @if ($admin->personaldata->profile_picture == null)
                                                                <svg width="60" height="60" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M22.766 0.000976562C10.194 0.000976562 0 10.193 0 22.766C0 35.339 10.193 45.531 22.766 45.531C35.34 45.531 45.532 35.339 45.532 22.766C45.532 10.193 35.34 0.000976562 22.766 0.000976562ZM22.766 6.80798C26.926 6.80798 30.297 10.18 30.297 14.338C30.297 18.497 26.926 21.868 22.766 21.868C18.608 21.868 15.237 18.497 15.237 14.338C15.237 10.18 18.608 6.80798 22.766 6.80798ZM22.761 39.579C18.612 39.579 14.812 38.068 11.881 35.567C11.167 34.958 10.755 34.065 10.755 33.128C10.755 28.911 14.168 25.536 18.386 25.536H27.148C31.367 25.536 34.767 28.911 34.767 33.128C34.767 34.066 34.357 34.957 33.642 35.566C30.712 38.068 26.911 39.579 22.761 39.579Z" fill="#D6D6D6"/>
                                                                </svg>
                                                            @else
                                                                <img width="60" height="60" style="border-radius: 100px " src="{{route('showfile2',$admin->personaldata->profile_picture)}}" alt="Kein profilbild">
                                                            @endif
                                                        @else
                                                            @if ($admin->headadmin->personaldata->profile_picture == null)
                                                                <svg width="60" height="60" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M22.766 0.000976562C10.194 0.000976562 0 10.193 0 22.766C0 35.339 10.193 45.531 22.766 45.531C35.34 45.531 45.532 35.339 45.532 22.766C45.532 10.193 35.34 0.000976562 22.766 0.000976562ZM22.766 6.80798C26.926 6.80798 30.297 10.18 30.297 14.338C30.297 18.497 26.926 21.868 22.766 21.868C18.608 21.868 15.237 18.497 15.237 14.338C15.237 10.18 18.608 6.80798 22.766 6.80798ZM22.761 39.579C18.612 39.579 14.812 38.068 11.881 35.567C11.167 34.958 10.755 34.065 10.755 33.128C10.755 28.911 14.168 25.536 18.386 25.536H27.148C31.367 25.536 34.767 28.911 34.767 33.128C34.767 34.066 34.357 34.957 33.642 35.566C30.712 38.068 26.911 39.579 22.761 39.579Z" fill="#D6D6D6"/>
                                                                </svg>
                                                            @else
                                                                <img width="60" height="60" style="border-radius: 100px " src="{{route('showfile2',$admin->headadmin->personaldata->profile_picture)}}" alt="Kein profilbild">
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="col my-auto">
                                                        <span class="fs-6" style="font-weight: 600;">{{$admin->name}}</span>
                                                        <span class="fs-6" style="font-weight: 500;">({{$value}} Kunden)</span>                                                    
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            @php
                                                if ($cnt == 3) {
                                                    break;
                                                }
                                                $cnt++;
                                            @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-8 mt-5 mb-5 mb-md-0">
                <div class="greyBgStats p-3 p-sm-4">
                    <div>
                        <div style="position: relative;">
                            <div class="col my-auto">
                                <div>
                                    <span class="statsTitleSpan fs-3">Sales Overview</span>
                                </div>
                                <div>
                                    <div class="row g-0">
                                        <div class="col-12" style="position: relative;">
                                            <div class="">
                                                <div class="whiteBgGraph h-100 p-3">
                                                    <div class="row g-0">
                                                        <div class="col">
                                                            <div class="pb-2">
                                                                <span style="font-weight: 600;"
                                                                    class="fs-5"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto my-auto">
                                                            <div class="statsSelectStyle py-1"
                                                                onclick="openDropDownSelect9()"
                                                                style="cursor: pointer;">
                                                                <div class="row g-0">
                                                                    <div class="col ms-2">
                                                                        <div>
                                                                            <span
                                                                                id="activeDropDownItem9">
                                                                                Gesamter
                                                                                Zeitraum</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-auto my-auto mx-2 me-1">
                                                                        <div>
                                                                            <svg width="10"
                                                                                height="6"
                                                                                viewBox="0 0 10 6"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M9 1L5 5L1 1"
                                                                                    stroke="black"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="statsSelectStyleDropdown"
                                                                id="dropdownSelectId9"
                                                                style="display: none;right: 1rem;">
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,1)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span
                                                                                    id="rtest">Heute</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,7)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Letzte 7
                                                                                    Tage</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,30)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Letzte 30
                                                                                    Tage</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,120)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Letztes
                                                                                    Quartal</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,365)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Letztes
                                                                                    Jahr</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="row g-0"
                                                                        onclick="makeSelectActive9(this,0)">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg class="activeSvg9"
                                                                                    width="19"
                                                                                    height="19"
                                                                                    viewBox="0 0 19 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <circle
                                                                                        cx="9.5"
                                                                                        cy="9.5"
                                                                                        r="9"
                                                                                        fill="#fff"
                                                                                        stroke="#E0E0E0" />
                                                                                    <ellipse
                                                                                        cx="9.5"
                                                                                        cy="9.416"
                                                                                        rx="5.5"
                                                                                        ry="5"
                                                                                        fill="white" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Gesamter
                                                                                    Zeitraum</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2"
                                                                    style="border-top: 1px solid #E8E8E8;">
                                                                    <div class="row g-0"
                                                                        onclick="salesCostum()"
                                                                        style="cursor: pointer">
                                                                        <div
                                                                            class="col-auto my-auto ps-3">
                                                                            <div>
                                                                                <svg width="18"
                                                                                    height="12"
                                                                                    viewBox="0 0 12 12"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                        fill="black" />
                                                                                </svg>

                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col my-auto ps-2 pe-5">
                                                                            <div>
                                                                                <span>Individueller
                                                                                    Zeitraum</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="salesCostum"
                                                                    style="display: none">
                                                                    <div class="py-2">
                                                                        <div class="row g-0">
                                                                            <div
                                                                                class="col my-auto ps-2 pe-2">
                                                                                <div>
                                                                                    <input
                                                                                        class="form-control"
                                                                                        type="date"
                                                                                        id="salesFrom">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <div class="row g-0">
                                                                            <div
                                                                                class="col my-auto ps-2 pe-2">
                                                                                <div>
                                                                                    <input
                                                                                        class="form-control"
                                                                                        type="date"
                                                                                        id="salesTo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pb-2 pt-2">
                                                                        <div class="row g-0">
                                                                            <div
                                                                                class="col my-auto ps-2 pe-2">
                                                                                <div>
                                                                                    <input
                                                                                        onclick="makeSelectActive9(this,100)"
                                                                                        class="col-12 py-1"
                                                                                        type="button"
                                                                                        value="Suche"
                                                                                        style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-0">
                                                        <div class="col-12" style="position: relative;">
                                                            <div class="">
                                                                <div class="pt-3">
                                                                    <div class="row g-4">
                                                                        <div class="col-12 col-md mx-auto"
                                                                            style="max-width: 290px;min-width: 260px;">
                                                                            <div id="chart8"></div>
                                                                        </div>
                                                                        <div class="col-12 col-md mx-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto">
                                                                                    <svg width="60"
                                                                                        height="56"
                                                                                        viewBox="0 0 44 36"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <rect width="44"
                                                                                            height="36"
                                                                                            rx="5"
                                                                                            fill="white" />
                                                                                        <path d="M22 6V28"
                                                                                            stroke="black"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                        <path
                                                                                            d="M27 10H19.5C18.5717 10 17.6815 10.3687 17.0251 11.0251C16.3687 11.6815 16 12.5717 16 13.5C16 14.4283 16.3687 15.3185 17.0251 15.9749C17.6815 16.6313 18.5717 17 19.5 17H24.5C25.4283 17 26.3185 17.3687 26.9749 18.0251C27.6313 18.6815 28 19.5717 28 20.5C28 21.4283 27.6313 22.3185 26.9749 22.9749C26.3185 23.6313 25.4283 24 24.5 24H16"
                                                                                            stroke="black"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div>
                                                                                        <span>Total Sales</span>
                                                                                    </div>
                                                                                    <div>
                                                                                        <span class="fs-5"
                                                                                            style="font-weight: 600"
                                                                                            id="totaleran"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div>
                                                                                <div class="row gy-3 pb-3">
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="rgb(34, 132, 0)" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div
                                                                                                    class="">
                                                                                                    <span
                                                                                                        class="fs-6">Grundversicherung</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600;"
                                                                                                        id="Grundversicherung"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="rgb(255, 155, 55)" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6">Zusatzversicherung</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600;"
                                                                                                        id="Zusatzversicherung"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="rgb(135, 212, 106)" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6">Autoversicherung</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600;"
                                                                                                        id="Autoversicherung"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="rgb(81, 92, 159)" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6">Vorsorge
                                                                                                        3a&3b</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600;"
                                                                                                        id="Vorsorge"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="rgb(255, 151, 151)" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6">Rechtschutz</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600"
                                                                                                        id="Rechtschutz"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-12 col-sm-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-auto pt-1">
                                                                                                <svg width="16"
                                                                                                    height="15"
                                                                                                    viewBox="0 0 18 17"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <ellipse
                                                                                                        cx="9"
                                                                                                        cy="8.5"
                                                                                                        rx="9"
                                                                                                        ry="8.5"
                                                                                                        fill="#3d66ce" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col p-0">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6">Hausrat</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="fs-6"
                                                                                                        style="font-weight: 600"
                                                                                                        id="Hausrat"></span>
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
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-4 mb-5 mt-5 mb-md-0 ">
                <div class="greyBgStats p-3 p-sm-4 h-100">
                    <div>
                        <div style="position: relative;">
                            <div class="col my-auto">
                                <div>
                                    <span class="statsTitleSpan fs-3">Temine Map</span>
                                </div>
                                <div>
                                    <div class="row g-0">
                                        <div class="col-12 py-3" >
                                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkVp4BCBg1iwxulOu4TAc8SOQ7pYDo2nc"></script>
                                            <div id="map" style="width: 100%;">
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
    </div>
    @endif
    @if ( in_array('fs', $urole) || in_array('digital', $urole))
        <section>
            <div class="px-4 px-lg-5 pe-lg-0 pt-4 pt-lg-5 ">
                <div class="pb-5 pe-lg-5">
                    <div class="row gy-4 gx-2 gx-sm-3">
                        <div class="col-6 col-sm-6 col-lg-4 col-xxl ">
                            <div class="greenBorderDiv p-4"
                                onclick="window.location.href='{{ route('costumers', ['status' => 'Provisionert']) }}'"
                                style="cursor:pointer;">
                                <div class="cornerSvgDash">
                                    <svg viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_28_428)">
                                            <path
                                                d="M37.172 76.7164C40.1076 81.6024 46.8941 86.4191 51.2888 89.9222C55.6834 93.4253 50.1958 103.07 55.3806 104.657C60.5653 106.244 76.3209 99.7419 81.5064 99.1711C86.6919 98.6003 91.6239 96.9468 96.0206 94.3051C100.417 91.6634 104.193 88.0853 107.132 83.7749C110.07 79.4646 112.115 74.5064 113.148 69.1836C114.181 63.8608 114.183 58.2775 113.154 52.7525C112.124 47.2276 107.535 38.7637 104.599 33.8778L68.8588 33.8778C62.707 33.8778 56.5869 34.7591 50.685 36.495L49.9812 36.9642C46.285 39.4283 42.9913 42.4481 40.2163 45.9169C38.2042 51.1061 37.172 56.6235 37.172 62.1891L37.172 76.7164Z"
                                                fill="#CAE9BF" />
                                        </g>
                                        <path
                                            d="M77.3437 48.3343C77.3437 47.5878 78.0815 46.9749 79.0045 46.9749C79.924 46.9749 80.6652 47.5809 80.6652 48.3343V54.2753C80.6652 55.0218 79.9274 55.6347 79.0045 55.6347C78.0849 55.6347 77.3437 55.0286 77.3437 54.2753V48.3343ZM58.4584 66.2053C58.3657 66.2053 58.2799 65.7944 58.2799 65.2876C58.2799 64.7809 58.3554 64.3734 58.4584 64.3734H62.9876C63.0802 64.3734 63.166 64.7843 63.166 65.2876C63.166 65.7944 63.0905 66.2053 62.9876 66.2053H58.4584ZM65.6776 66.2053C65.585 66.2053 65.4992 65.7944 65.4992 65.2876C65.4992 64.7809 65.5747 64.3734 65.6776 64.3734H70.2068C70.2995 64.3734 70.3852 64.7843 70.3852 65.2876C70.3852 65.7944 70.3098 66.2053 70.2068 66.2053H65.6776ZM72.8969 66.2053C72.8043 66.2053 72.7185 65.7944 72.7185 65.2876C72.7185 64.7809 72.7905 64.3734 72.8969 64.3734H77.4261C77.5187 64.3734 77.6045 64.7809 77.6045 65.2842C77.1516 65.565 76.7158 65.8732 76.2972 66.2053H72.8969ZM58.4687 71.465C58.376 71.465 58.2902 71.054 58.2902 70.5473C58.2902 70.0405 58.3657 69.6296 58.4687 69.6296H62.9979C63.0905 69.6296 63.1763 70.0405 63.1763 70.5473C63.1763 71.054 63.1008 71.465 62.9979 71.465H58.4687ZM65.6879 71.465C65.5953 71.465 65.5095 71.054 65.5095 70.5473C65.5095 70.0405 65.585 69.6296 65.6879 69.6296H70.2171C70.3098 69.6296 70.3955 70.0405 70.3955 70.5473C70.3955 71.054 70.3201 71.465 70.2171 71.465H65.6879ZM58.4789 76.7246C58.3863 76.7246 58.3005 76.3137 58.3005 75.8069C58.3005 75.3001 58.376 74.8892 58.4789 74.8892H63.0081C63.1008 74.8892 63.1866 75.3001 63.1866 75.8069C63.1866 76.3137 63.1111 76.7246 63.0081 76.7246H58.4789ZM65.6982 76.7246C65.6056 76.7246 65.5198 76.3137 65.5198 75.8069C65.5198 75.3001 65.5953 74.8892 65.6982 74.8892H70.2274C70.3201 74.8892 70.4058 75.3001 70.4058 75.8069C70.4058 76.3137 70.3303 76.7246 70.2274 76.7246H65.6982ZM62.4351 48.3343C62.4351 47.5844 63.1763 46.9749 64.0958 46.9749C65.0154 46.9749 65.7565 47.5809 65.7565 48.3343V54.2753C65.7565 55.0218 65.0154 55.6347 64.0958 55.6347C63.1763 55.6347 62.4351 55.0286 62.4351 54.2753V48.3343ZM55.7683 59.963H87.3766V53.1248C87.3766 52.8885 87.2805 52.6865 87.133 52.5358C86.982 52.3851 86.7659 52.2927 86.5428 52.2927H83.5131C83.0052 52.2927 82.5935 51.8818 82.5935 51.375C82.5935 50.8682 83.0087 50.4573 83.5131 50.4573H86.5428C87.284 50.4573 87.9496 50.7552 88.4369 51.2414C88.9241 51.7277 89.2226 52.392 89.2226 53.1316V63.9899C88.6187 63.781 87.9977 63.6132 87.3595 63.4899V61.7949H87.38H55.7683V79.505C55.7683 79.7413 55.8609 79.9433 56.0119 80.094C56.1629 80.2447 56.379 80.3371 56.6021 80.3371H71.6239C71.7955 80.974 72.0116 81.5938 72.269 82.1931H56.6192C55.8815 82.1931 55.2124 81.8952 54.7252 81.4089C54.238 80.9261 53.9395 80.2618 53.9395 79.5222V53.1316C53.9395 52.3954 54.238 51.7277 54.7252 51.2414C55.2124 50.7552 55.8781 50.4573 56.6192 50.4573H59.8549C60.3627 50.4573 60.7744 50.8682 60.7744 51.375C60.7744 51.8818 60.3627 52.2927 59.8549 52.2927H56.6192C56.3825 52.2927 56.18 52.3851 56.0291 52.5358C55.8781 52.6865 55.7854 52.9022 55.7854 53.1248V59.963H55.7683ZM68.4089 52.2893C67.9011 52.2893 67.4893 51.8784 67.4893 51.3716C67.4893 50.8648 67.9011 50.4539 68.4089 50.4539H74.5782C75.086 50.4539 75.4978 50.8648 75.4978 51.3716C75.4978 51.8784 75.086 52.2893 74.5782 52.2893H68.4089Z"
                                            fill="#393939" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M85.3834 65.9899C86.8314 65.9899 88.2176 66.2775 89.4803 66.8014C90.7978 67.3425 91.9748 68.1369 92.9629 69.1231C93.9477 70.1058 94.7437 71.2872 95.2893 72.5952C95.8143 73.8588 96.1025 75.2387 96.1025 76.6838C96.1025 78.1288 95.8143 79.5122 95.2893 80.7723C94.7437 82.0838 93.9511 83.2617 92.9629 84.2479C91.9748 85.2306 90.7944 86.0251 89.4837 86.5695C88.2176 87.0934 86.8348 87.3811 85.3868 87.3811C83.9389 87.3811 82.5526 87.0934 81.29 86.5695C79.9758 86.0251 78.7955 85.2341 77.8073 84.2479C76.8191 83.2651 76.0265 82.0838 75.4809 80.7723C74.9559 79.5087 74.6677 78.1288 74.6677 76.6838C74.6677 75.2387 74.9559 73.8588 75.4809 72.5952C76.0265 71.2837 76.8191 70.1058 77.8073 69.1196C78.792 68.1369 79.9758 67.3425 81.2865 66.798C82.5526 66.2775 83.932 65.9899 85.3834 65.9899Z"
                                            fill="#43B21C" />
                                        <path
                                            d="M82.0752 77.6216L84.6857 79.2786C85.1751 79.5893 85.8261 79.4207 86.1028 78.9116L87.3398 76.636L89.0888 73.4187"
                                            stroke="white" stroke-width="2" stroke-linecap="round" />
                                        <defs>
                                            <filter id="filter0_d_28_428" x="0.171875" y="0.877792" width="150.752"
                                                height="145.028" filterUnits="userSpaceOnUse"
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
                                <div class="text-end textDivDash">
                                    <div>
                                        <span class="bigTitleDash">{{ $counterat['provisionertCount'] }}</span>
                                    </div>
                                    <div>
                                        <span class="smallTitleDash">Provisionert</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-4 col-xxl ">
                            <div class="yellowBorderDiv p-4"
                                onclick="window.location.href='{{ route('costumers', ['status' => 'Aufgenommen']) }}'"
                                style="cursor:pointer;">
                                <div class="cornerSvgDash">
                                    <svg viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_28_428)">
                                            <path
                                                d="M37.172 76.7164C40.1076 81.6024 46.8941 86.4191 51.2888 89.9222C55.6834 93.4253 50.1958 103.07 55.3806 104.657C60.5653 106.244 76.3209 99.7419 81.5064 99.1711C86.6919 98.6003 91.6239 96.9468 96.0206 94.3051C100.417 91.6634 104.193 88.0853 107.132 83.7749C110.07 79.4646 112.115 74.5064 113.148 69.1836C114.181 63.8608 114.183 58.2775 113.154 52.7525C112.124 47.2276 107.535 38.7637 104.599 33.8778L68.8588 33.8778C62.707 33.8778 56.5869 34.7591 50.685 36.495V36.495L49.9812 36.9642C46.285 39.4283 42.9913 42.4481 40.2163 45.9169V45.9169V45.9169C38.2042 51.1061 37.172 56.6235 37.172 62.1891L37.172 76.7164Z"
                                                fill="#FDF5AC" />
                                        </g>
                                        <path
                                            d="M77.3437 48.3343C77.3437 47.5878 78.0815 46.9749 79.0045 46.9749C79.924 46.9749 80.6652 47.5809 80.6652 48.3343V54.2753C80.6652 55.0218 79.9274 55.6347 79.0045 55.6347C78.0849 55.6347 77.3437 55.0286 77.3437 54.2753V48.3343ZM58.4584 66.2053C58.3657 66.2053 58.2799 65.7944 58.2799 65.2876C58.2799 64.7809 58.3554 64.3734 58.4584 64.3734H62.9876C63.0802 64.3734 63.166 64.7843 63.166 65.2876C63.166 65.7944 63.0905 66.2053 62.9876 66.2053H58.4584ZM65.6776 66.2053C65.585 66.2053 65.4992 65.7944 65.4992 65.2876C65.4992 64.7809 65.5747 64.3734 65.6776 64.3734H70.2068C70.2995 64.3734 70.3852 64.7843 70.3852 65.2876C70.3852 65.7944 70.3098 66.2053 70.2068 66.2053H65.6776ZM72.8969 66.2053C72.8043 66.2053 72.7185 65.7944 72.7185 65.2876C72.7185 64.7809 72.7905 64.3734 72.8969 64.3734H77.4261C77.5187 64.3734 77.6045 64.7809 77.6045 65.2842C77.1516 65.565 76.7158 65.8732 76.2972 66.2053H72.8969ZM58.4687 71.465C58.376 71.465 58.2902 71.054 58.2902 70.5473C58.2902 70.0405 58.3657 69.6296 58.4687 69.6296H62.9979C63.0905 69.6296 63.1763 70.0405 63.1763 70.5473C63.1763 71.054 63.1008 71.465 62.9979 71.465H58.4687ZM65.6879 71.465C65.5953 71.465 65.5095 71.054 65.5095 70.5473C65.5095 70.0405 65.585 69.6296 65.6879 69.6296H70.2171C70.3098 69.6296 70.3955 70.0405 70.3955 70.5473C70.3955 71.054 70.3201 71.465 70.2171 71.465H65.6879ZM58.4789 76.7246C58.3863 76.7246 58.3005 76.3137 58.3005 75.8069C58.3005 75.3001 58.376 74.8892 58.4789 74.8892H63.0081C63.1008 74.8892 63.1866 75.3001 63.1866 75.8069C63.1866 76.3137 63.1111 76.7246 63.0081 76.7246H58.4789ZM65.6982 76.7246C65.6056 76.7246 65.5198 76.3137 65.5198 75.8069C65.5198 75.3001 65.5953 74.8892 65.6982 74.8892H70.2274C70.3201 74.8892 70.4058 75.3001 70.4058 75.8069C70.4058 76.3137 70.3303 76.7246 70.2274 76.7246H65.6982ZM62.4351 48.3343C62.4351 47.5844 63.1763 46.9749 64.0958 46.9749C65.0154 46.9749 65.7565 47.5809 65.7565 48.3343V54.2753C65.7565 55.0218 65.0154 55.6347 64.0958 55.6347C63.1763 55.6347 62.4351 55.0286 62.4351 54.2753V48.3343V48.3343ZM55.7683 59.963H87.3766V53.1248C87.3766 52.8885 87.2805 52.6865 87.133 52.5358C86.982 52.3851 86.7658 52.2927 86.5428 52.2927H83.5131C83.0052 52.2927 82.5935 51.8818 82.5935 51.375C82.5935 50.8682 83.0087 50.4573 83.5131 50.4573H86.5428C87.284 50.4573 87.9496 50.7552 88.4368 51.2414C88.9241 51.7277 89.2226 52.392 89.2226 53.1316V63.9899C88.6187 63.781 87.9977 63.6132 87.3594 63.4899V61.7949H87.38H55.7683V79.505C55.7683 79.7413 55.8609 79.9433 56.0119 80.094C56.1629 80.2447 56.379 80.3371 56.6021 80.3371H71.6239C71.7955 80.974 72.0116 81.5938 72.269 82.1931H56.6192C55.8815 82.1931 55.2124 81.8952 54.7252 81.4089C54.238 80.9261 53.9395 80.2618 53.9395 79.5222V53.1316C53.9395 52.3954 54.238 51.7277 54.7252 51.2414C55.2124 50.7552 55.8781 50.4573 56.6192 50.4573H59.8549C60.3627 50.4573 60.7744 50.8682 60.7744 51.375C60.7744 51.8818 60.3627 52.2927 59.8549 52.2927H56.6192C56.3825 52.2927 56.18 52.3851 56.0291 52.5358C55.8781 52.6865 55.7854 52.9022 55.7854 53.1248V59.963H55.7683ZM68.4089 52.2893C67.9011 52.2893 67.4893 51.8784 67.4893 51.3716C67.4893 50.8648 67.9011 50.4539 68.4089 50.4539H74.5782C75.086 50.4539 75.4978 50.8648 75.4978 51.3716C75.4978 51.8784 75.086 52.2893 74.5782 52.2893H68.4089Z"
                                            fill="#393939" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M85.3832 65.9899C86.8311 65.9899 88.2173 66.2775 89.48 66.8014C90.7976 67.3425 91.9745 68.1369 92.9627 69.1231C93.9475 70.1058 94.7435 71.2872 95.2891 72.5952C95.814 73.8588 96.1023 75.2387 96.1023 76.6838C96.1023 78.1288 95.814 79.5122 95.2891 80.7723C94.7435 82.0838 93.9509 83.2617 92.9627 84.2479C91.9745 85.2306 90.7942 86.0251 89.4834 86.5695C88.2173 87.0934 86.8346 87.3811 85.3866 87.3811C83.9386 87.3811 82.5524 87.0934 81.2897 86.5695C79.9756 86.0251 78.7952 85.2341 77.807 84.2479C76.8188 83.2651 76.0262 82.0838 75.4807 80.7723C74.9557 79.5087 74.6675 78.1288 74.6675 76.6838C74.6675 75.2387 74.9557 73.8588 75.4807 72.5952C76.0262 71.2837 76.8188 70.1058 77.807 69.1196C78.7918 68.1369 79.9756 67.3425 81.2863 66.798C82.5524 66.2775 83.9317 65.9899 85.3832 65.9899Z"
                                            fill="#E6D426" />
                                        <path
                                            d="M85.9434 78.8418H83.916V76.7676C85.4668 76.0723 86.2422 75.377 86.2422 74.6816C86.2422 74.6113 86.2344 74.543 86.2188 74.4766C86.2148 74.4023 86.1914 74.3184 86.1484 74.2246C86.1211 74.1387 86.0645 74.0625 85.9785 73.9961C85.9004 73.9414 85.8008 73.9141 85.6797 73.9141C85.2148 73.9141 84.959 74.2285 84.9121 74.8574H82.1523C82.1992 73.9863 82.5547 73.2598 83.2188 72.6777C83.8828 72.1074 84.7148 71.8223 85.7148 71.8223C86.3633 71.8223 86.9629 71.9395 87.5137 72.1738C88.0645 72.416 88.4844 72.7402 88.7734 73.1465C89.0859 73.5645 89.2422 74.0273 89.2422 74.5352C89.2422 74.8047 89.2031 75.0566 89.125 75.291C89.0469 75.5449 88.9512 75.7578 88.8379 75.9297C88.7285 76.1094 88.5762 76.2852 88.3809 76.457C88.3066 76.5195 88.2246 76.5879 88.1348 76.6621C88.0488 76.7363 87.9512 76.8125 87.8418 76.8906C87.5918 77.0391 87.3828 77.1543 87.2148 77.2363C86.9531 77.3691 86.7422 77.4609 86.582 77.5117C86.4648 77.5625 86.3535 77.6074 86.248 77.6465C86.1426 77.6855 86.041 77.7207 85.9434 77.752V78.8418ZM84.959 82.1582C84.498 82.1582 84.1113 82.0215 83.7988 81.748C83.4863 81.4902 83.3301 81.1348 83.3301 80.6816C83.3301 80.2363 83.4824 79.8887 83.7871 79.6387C84.0879 79.3809 84.4785 79.252 84.959 79.252C85.4629 79.252 85.8672 79.3809 86.1719 79.6387C86.4844 79.8848 86.6406 80.2324 86.6406 80.6816C86.6406 81.1465 86.4805 81.502 86.1602 81.748C85.8359 82.0137 85.4395 82.1465 84.9707 82.1465L84.959 82.1582Z"
                                            fill="white" />
                                        <defs>
                                            <filter id="filter0_d_28_428" x="0.171875" y="0.877792" width="150.752"
                                                height="145.028" filterUnits="userSpaceOnUse"
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
                                <div class="text-end textDivDash">
                                    <div>
                                        <span class="bigTitleDash">{{ $counterat['aufgenomenCount'] }}</span>
                                    </div>
                                    <div>
                                        <span class="smallTitleDash">Aufgenommen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-4 col-xxl ">
                            <div class="yellowBorderDiv p-4" style="border: 3px solid #F8E19B;"
                                onclick="window.location.href='{{ route('costumers', ['status' => 'Aufgenommen']) }}'"
                                style="cursor:pointer;">
                                <div class="cornerSvgDash">
                                    <svg viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_28_428)">
                                            <path
                                                d="M37.172 76.7164C40.1076 81.6024 46.8941 86.4191 51.2888 89.9222C55.6834 93.4253 50.1958 103.07 55.3806 104.657C60.5653 106.244 76.3209 99.7419 81.5064 99.1711C86.6919 98.6003 91.6239 96.9468 96.0206 94.3051C100.417 91.6634 104.193 88.0853 107.132 83.7749C110.07 79.4646 112.115 74.5064 113.148 69.1836C114.181 63.8608 114.183 58.2775 113.154 52.7525C112.124 47.2276 107.535 38.7637 104.599 33.8778L68.8588 33.8778C62.707 33.8778 56.5869 34.7591 50.685 36.495V36.495L49.9812 36.9642C46.285 39.4283 42.9913 42.4481 40.2163 45.9169V45.9169V45.9169C38.2042 51.1061 37.172 56.6235 37.172 62.1891L37.172 76.7164Z"
                                                fill="#F8E19B" />
                                        </g>
                                        <path
                                            d="M78.4043 48.3594C78.4043 47.6129 79.142 47 80.065 47C80.9846 47 81.7257 47.6061 81.7257 48.3594V54.3005C81.7257 55.0469 80.988 55.6599 80.065 55.6599C79.1454 55.6599 78.4043 55.0538 78.4043 54.3005V48.3594ZM59.5189 66.2305C59.4263 66.2305 59.3405 65.8196 59.3405 65.3128C59.3405 64.806 59.416 64.3985 59.5189 64.3985H64.0481C64.1407 64.3985 64.2265 64.8094 64.2265 65.3128C64.2265 65.8196 64.151 66.2305 64.0481 66.2305H59.5189ZM66.7382 66.2305C66.6455 66.2305 66.5597 65.8196 66.5597 65.3128C66.5597 64.806 66.6352 64.3985 66.7382 64.3985H71.2674C71.36 64.3985 71.4458 64.8094 71.4458 65.3128C71.4458 65.8196 71.3703 66.2305 71.2674 66.2305H66.7382ZM73.9574 66.2305C73.8648 66.2305 73.779 65.8196 73.779 65.3128C73.779 64.806 73.8511 64.3985 73.9574 64.3985H78.4866C78.5793 64.3985 78.6651 64.806 78.6651 65.3094C78.2121 65.5901 77.7764 65.8983 77.3578 66.2305H73.9574ZM59.5292 71.4901C59.4366 71.4901 59.3508 71.0792 59.3508 70.5724C59.3508 70.0656 59.4263 69.6547 59.5292 69.6547H64.0584C64.151 69.6547 64.2368 70.0656 64.2368 70.5724C64.2368 71.0792 64.1613 71.4901 64.0584 71.4901H59.5292ZM66.7485 71.4901C66.6558 71.4901 66.57 71.0792 66.57 70.5724C66.57 70.0656 66.6455 69.6547 66.7485 69.6547H71.2777C71.3703 69.6547 71.4561 70.0656 71.4561 70.5724C71.4561 71.0792 71.3806 71.4901 71.2777 71.4901H66.7485ZM59.5395 76.7497C59.4468 76.7497 59.3611 76.3388 59.3611 75.832C59.3611 75.3252 59.4366 74.9143 59.5395 74.9143H64.0687C64.1613 74.9143 64.2471 75.3252 64.2471 75.832C64.2471 76.3388 64.1716 76.7497 64.0687 76.7497H59.5395ZM66.7588 76.7497C66.6661 76.7497 66.5803 76.3388 66.5803 75.832C66.5803 75.3252 66.6558 74.9143 66.7588 74.9143H71.288C71.3806 74.9143 71.4664 75.3252 71.4664 75.832C71.4664 76.3388 71.3909 76.7497 71.288 76.7497H66.7588ZM63.4957 48.3594C63.4957 47.6095 64.2368 47 65.1564 47C66.0759 47 66.8171 47.6061 66.8171 48.3594V54.3005C66.8171 55.0469 66.0759 55.6599 65.1564 55.6599C64.2368 55.6599 63.4957 55.0538 63.4957 54.3005V48.3594V48.3594ZM56.8288 59.9881H88.4372V53.1499C88.4372 52.9136 88.3411 52.7116 88.1935 52.561C88.0426 52.4103 87.8264 52.3178 87.6034 52.3178H84.5736C84.0658 52.3178 83.654 51.9069 83.654 51.4001C83.654 50.8934 84.0692 50.4824 84.5736 50.4824H87.6034C88.3445 50.4824 89.0102 50.7804 89.4974 51.2666C89.9846 51.7528 90.2831 52.4171 90.2831 53.1568V64.015C89.6793 63.8061 89.0582 63.6383 88.42 63.5151V61.8201H88.4406H56.8288V79.5302C56.8288 79.7665 56.9215 79.9685 57.0725 80.1192C57.2234 80.2698 57.4396 80.3623 57.6626 80.3623H72.6845C72.856 80.9992 73.0722 81.619 73.3295 82.2182H57.6798C56.9421 82.2182 56.273 81.9203 55.7857 81.4341C55.2985 80.9512 55 80.2869 55 79.5473V53.1568C55 52.4206 55.2985 51.7528 55.7857 51.2666C56.273 50.7804 56.9386 50.4824 57.6798 50.4824H60.9154C61.4232 50.4824 61.835 50.8934 61.835 51.4001C61.835 51.9069 61.4232 52.3178 60.9154 52.3178H57.6798C57.443 52.3178 57.2406 52.4103 57.0896 52.561C56.9386 52.7116 56.846 52.9273 56.846 53.1499V59.9881H56.8288ZM69.4694 52.3144C68.9616 52.3144 68.5499 51.9035 68.5499 51.3967C68.5499 50.8899 68.9616 50.479 69.4694 50.479H75.6387C76.1466 50.479 76.5583 50.8899 76.5583 51.3967C76.5583 51.9035 76.1466 52.3144 75.6387 52.3144H69.4694Z"
                                            fill="#393939" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M86.4437 66.015C87.8917 66.015 89.2779 66.3027 90.5406 66.8266C91.8582 67.3676 93.0351 68.162 94.0232 69.1482C95.008 70.131 95.804 71.3123 96.3496 72.6204C96.8746 73.8839 97.1628 75.2639 97.1628 76.7089C97.1628 78.1539 96.8746 79.5373 96.3496 80.7974C95.804 82.1089 95.0114 83.2868 94.0232 84.273C93.0351 85.2558 91.8547 86.0502 90.544 86.5947C89.2779 87.1186 87.8951 87.4062 86.4471 87.4062C84.9992 87.4062 83.6129 87.1186 82.3503 86.5947C81.0361 86.0502 79.8558 85.2592 78.8676 84.273C77.8794 83.2903 77.0868 82.1089 76.5412 80.7974C76.0162 79.5339 75.728 78.1539 75.728 76.7089C75.728 75.2639 76.0162 73.8839 76.5412 72.6204C77.0868 71.3089 77.8794 70.131 78.8676 69.1448C79.8523 68.162 81.0361 67.3676 82.3468 66.8231C83.6129 66.3027 84.9923 66.015 86.4437 66.015Z"
                                            fill="#EDB200" />
                                        <circle cx="86.5" cy="76.5" r="1.5" fill="white" />
                                        <circle cx="82.5" cy="76.5" r="1.5" fill="white" />
                                        <circle cx="90.5" cy="76.5" r="1.5" fill="white" />
                                        <defs>
                                            <filter id="filter0_d_28_428" x="0.171875" y="0.877792" width="150.752"
                                                height="145.028" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                    result="hardAlpha" />
                                                <feOffset dy="4" />
                                                <feGaussianBlur stdDeviation="18.5" />
                                                <feComposite in2="hardAlpha" operator="out" />
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow_28_428" />
                                                <feBlend mode="normal" in="SourceGraphic"
                                                    in2="effect1_dropShadow_28_428" result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>



                                </div>
                                <div class="text-end textDivDash">
                                    <div>
                                        <span class="bigTitleDash">{{ $counterat['offens'] }}</span>
                                    </div>
                                    <div>
                                        <span class="smallTitleDash">Hänging</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-4 col-xxl">
                            <div class="orangeBorderDiv p-4"
                                onclick="window.location.href='{{ route('costumers', ['status' => 'Eingereicht']) }}'"
                                style="cursor:pointer;">
                                <div class="cornerSvgDash">
                                    <svg viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_28_428)">
                                            <path
                                                d="M37.172 76.7164C40.1076 81.6024 46.8941 86.4191 51.2888 89.9222C55.6834 93.4253 50.1958 103.07 55.3806 104.657C60.5653 106.244 76.3209 99.7419 81.5064 99.1711C86.6919 98.6003 91.6239 96.9468 96.0206 94.3051C100.417 91.6634 104.193 88.0853 107.132 83.7749C110.07 79.4646 112.115 74.5064 113.148 69.1836C114.181 63.8608 114.183 58.2775 113.154 52.7525C112.124 47.2276 107.535 38.7637 104.599 33.8778L68.8588 33.8778C62.707 33.8778 56.5869 34.7591 50.685 36.495L49.9812 36.9642C46.285 39.4283 42.9913 42.4481 40.2163 45.9169C38.2042 51.1061 37.172 56.6235 37.172 62.1891L37.172 76.7164Z"
                                                fill="#FDE4CB" />
                                        </g>
                                        <path
                                            d="M78.4043 48.3594C78.4043 47.6129 79.142 47 80.065 47C80.9846 47 81.7257 47.6061 81.7257 48.3594V54.3005C81.7257 55.0469 80.988 55.6599 80.065 55.6599C79.1454 55.6599 78.4043 55.0538 78.4043 54.3005V48.3594ZM59.5189 66.2305C59.4263 66.2305 59.3405 65.8196 59.3405 65.3128C59.3405 64.806 59.416 64.3985 59.5189 64.3985H64.0481C64.1407 64.3985 64.2265 64.8094 64.2265 65.3128C64.2265 65.8196 64.151 66.2305 64.0481 66.2305H59.5189ZM66.7382 66.2305C66.6455 66.2305 66.5597 65.8196 66.5597 65.3128C66.5597 64.806 66.6352 64.3985 66.7382 64.3985H71.2674C71.36 64.3985 71.4458 64.8094 71.4458 65.3128C71.4458 65.8196 71.3703 66.2305 71.2674 66.2305H66.7382ZM73.9574 66.2305C73.8648 66.2305 73.779 65.8196 73.779 65.3128C73.779 64.806 73.8511 64.3985 73.9574 64.3985H78.4866C78.5793 64.3985 78.6651 64.806 78.6651 65.3094C78.2121 65.5901 77.7764 65.8983 77.3578 66.2305H73.9574ZM59.5292 71.4901C59.4366 71.4901 59.3508 71.0792 59.3508 70.5724C59.3508 70.0656 59.4263 69.6547 59.5292 69.6547H64.0584C64.151 69.6547 64.2368 70.0656 64.2368 70.5724C64.2368 71.0792 64.1613 71.4901 64.0584 71.4901H59.5292ZM66.7485 71.4901C66.6558 71.4901 66.57 71.0792 66.57 70.5724C66.57 70.0656 66.6455 69.6547 66.7485 69.6547H71.2777C71.3703 69.6547 71.4561 70.0656 71.4561 70.5724C71.4561 71.0792 71.3806 71.4901 71.2777 71.4901H66.7485ZM59.5395 76.7497C59.4468 76.7497 59.3611 76.3388 59.3611 75.832C59.3611 75.3252 59.4366 74.9143 59.5395 74.9143H64.0687C64.1613 74.9143 64.2471 75.3252 64.2471 75.832C64.2471 76.3388 64.1716 76.7497 64.0687 76.7497H59.5395ZM66.7588 76.7497C66.6661 76.7497 66.5803 76.3388 66.5803 75.832C66.5803 75.3252 66.6558 74.9143 66.7588 74.9143H71.288C71.3806 74.9143 71.4664 75.3252 71.4664 75.832C71.4664 76.3388 71.3909 76.7497 71.288 76.7497H66.7588ZM63.4957 48.3594C63.4957 47.6095 64.2368 47 65.1564 47C66.0759 47 66.8171 47.6061 66.8171 48.3594V54.3005C66.8171 55.0469 66.0759 55.6599 65.1564 55.6599C64.2368 55.6599 63.4957 55.0538 63.4957 54.3005V48.3594ZM56.8288 59.9881H88.4372V53.1499C88.4372 52.9136 88.3411 52.7116 88.1935 52.561C88.0426 52.4103 87.8264 52.3178 87.6034 52.3178H84.5736C84.0658 52.3178 83.654 51.9069 83.654 51.4001C83.654 50.8934 84.0692 50.4824 84.5736 50.4824H87.6034C88.3445 50.4824 89.0102 50.7804 89.4974 51.2666C89.9846 51.7528 90.2831 52.4171 90.2831 53.1568V64.015C89.6793 63.8061 89.0582 63.6383 88.42 63.5151V61.8201H88.4406H56.8288V79.5302C56.8288 79.7665 56.9215 79.9685 57.0725 80.1192C57.2234 80.2698 57.4396 80.3623 57.6626 80.3623H72.6845C72.856 80.9992 73.0722 81.619 73.3295 82.2182H57.6798C56.9421 82.2182 56.273 81.9203 55.7857 81.4341C55.2985 80.9512 55 80.2869 55 79.5473V53.1568C55 52.4206 55.2985 51.7528 55.7857 51.2666C56.273 50.7804 56.9386 50.4824 57.6798 50.4824H60.9154C61.4232 50.4824 61.835 50.8934 61.835 51.4001C61.835 51.9069 61.4232 52.3178 60.9154 52.3178H57.6798C57.443 52.3178 57.2406 52.4103 57.0896 52.561C56.9386 52.7116 56.846 52.9273 56.846 53.1499V59.9881H56.8288ZM69.4694 52.3144C68.9616 52.3144 68.5499 51.9035 68.5499 51.3967C68.5499 50.8899 68.9616 50.479 69.4694 50.479H75.6387C76.1466 50.479 76.5583 50.8899 76.5583 51.3967C76.5583 51.9035 76.1466 52.3144 75.6387 52.3144H69.4694Z"
                                            fill="#393939" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M86.4983 66C87.9169 66 89.275 66.2824 90.5121 66.7967C91.8029 67.3278 92.956 68.1077 93.9241 69.0759C94.8889 70.0407 95.6688 71.2004 96.2033 72.4846C96.7176 73.725 97 75.0797 97 76.4983C97 77.9169 96.7176 79.275 96.2033 80.5121C95.6688 81.7996 94.8923 82.956 93.9241 83.9241C92.956 84.8889 91.7996 85.6688 90.5154 86.2033C89.275 86.7176 87.9203 87 86.5017 87C85.0831 87 83.725 86.7176 82.4879 86.2033C81.2004 85.6688 80.044 84.8923 79.0759 83.9241C78.1077 82.9593 77.3312 81.7996 76.7967 80.5121C76.2824 79.2716 76 77.9169 76 76.4983C76 75.0797 76.2824 73.725 76.7967 72.4846C77.3312 71.1971 78.1077 70.0407 79.0759 69.0725C80.0407 68.1077 81.2004 67.3278 82.4846 66.7933C83.725 66.2824 85.0764 66 86.4983 66ZM85.4024 72.4207C85.4024 72.256 85.4361 72.098 85.4966 71.9501C85.5604 71.7988 85.6512 71.6643 85.7621 71.55C85.8731 71.4357 86.0109 71.345 86.1622 71.2845C86.3101 71.2239 86.4681 71.1903 86.6328 71.1903C86.7975 71.1903 86.9555 71.2239 87.1034 71.2845C87.258 71.3483 87.3925 71.4391 87.5034 71.55C87.6144 71.661 87.7085 71.7988 87.769 71.9501C87.8295 72.0946 87.8631 72.256 87.8631 72.4207V76.8378L90.6466 78.3102C90.6701 78.3237 90.6936 78.3405 90.7171 78.3539C90.8449 78.438 90.9491 78.5422 91.0331 78.6565C91.1239 78.7809 91.1878 78.922 91.2247 79.07C91.2617 79.2212 91.2718 79.3826 91.2516 79.5406C91.2315 79.6952 91.181 79.8465 91.1004 79.9843L91.0701 80.0347L91.0466 80.065C90.9625 80.186 90.8617 80.2902 90.7508 80.3675C90.6264 80.4583 90.4852 80.5222 90.3406 80.5591C90.1894 80.5961 90.028 80.6062 89.87 80.586C89.7154 80.5659 89.5641 80.5154 89.4263 80.4348L86.0512 78.6296C85.9537 78.5792 85.8663 78.5153 85.7924 78.4413C85.7151 78.3674 85.6445 78.2833 85.5873 78.1892L85.5806 78.1758C85.5235 78.0816 85.4797 77.9842 85.4495 77.8799C85.4192 77.7724 85.4024 77.6614 85.4024 77.5471V72.4207Z"
                                            fill="#FF7900" />
                                        <defs>
                                            <filter id="filter0_d_28_428" x="0.171875" y="0.877792" width="150.752"
                                                height="145.028" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                    result="hardAlpha" />
                                                <feOffset dy="4" />
                                                <feGaussianBlur stdDeviation="18.5" />
                                                <feComposite in2="hardAlpha" operator="out" />
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow_28_428" />
                                                <feBlend mode="normal" in="SourceGraphic"
                                                    in2="effect1_dropShadow_28_428" result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>



                                </div>
                                <div class="text-end textDivDash">
                                    <div>
                                        <span class="bigTitleDash">{{ $counterat['offenCount'] }}</span>
                                    </div>
                                    <div>
                                        <span class="smallTitleDash">Eingericht</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 col-xxl">
                            <div class="greyBorderDiv p-4" onclick="window.location.href='{{ route('costumers') }}'"
                                style="cursor:pointer;">
                                <div class="cornerSvgDash">
                                    <svg viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_28_428)">
                                            <path
                                                d="M37.172 76.7164C40.1076 81.6024 46.8941 86.4191 51.2888 89.9222C55.6834 93.4253 50.1958 103.07 55.3806 104.657C60.5653 106.244 76.3209 99.7419 81.5064 99.1711C86.6919 98.6003 91.6239 96.9468 96.0206 94.3051C100.417 91.6634 104.193 88.0853 107.132 83.7749C110.07 79.4646 112.115 74.5064 113.148 69.1836C114.181 63.8608 114.183 58.2775 113.154 52.7525C112.124 47.2276 107.535 38.7637 104.599 33.8778L68.8588 33.8778C62.707 33.8778 56.5869 34.7591 50.685 36.495V36.495L49.9812 36.9642C46.285 39.4283 42.9913 42.4481 40.2163 45.9169V45.9169V45.9169C38.2042 51.1061 37.172 56.6235 37.172 62.1891L37.172 76.7164Z"
                                                fill="#EDF0F8" />
                                        </g>
                                        <path
                                            d="M78.4043 48.3594C78.4043 47.6129 79.142 47 80.065 47C80.9846 47 81.7257 47.6061 81.7257 48.3594V54.3005C81.7257 55.0469 80.988 55.6599 80.065 55.6599C79.1454 55.6599 78.4043 55.0538 78.4043 54.3005V48.3594ZM59.5189 66.2305C59.4263 66.2305 59.3405 65.8196 59.3405 65.3128C59.3405 64.806 59.416 64.3985 59.5189 64.3985H64.0481C64.1407 64.3985 64.2265 64.8094 64.2265 65.3128C64.2265 65.8196 64.151 66.2305 64.0481 66.2305H59.5189ZM66.7382 66.2305C66.6455 66.2305 66.5597 65.8196 66.5597 65.3128C66.5597 64.806 66.6352 64.3985 66.7382 64.3985H71.2674C71.36 64.3985 71.4458 64.8094 71.4458 65.3128C71.4458 65.8196 71.3703 66.2305 71.2674 66.2305H66.7382ZM73.9574 66.2305C73.8648 66.2305 73.779 65.8196 73.779 65.3128C73.779 64.806 73.8511 64.3985 73.9574 64.3985H78.4866C78.5793 64.3985 78.6651 64.806 78.6651 65.3094C78.2121 65.5901 77.7764 65.8983 77.3578 66.2305H73.9574ZM59.5292 71.4901C59.4366 71.4901 59.3508 71.0792 59.3508 70.5724C59.3508 70.0656 59.4263 69.6547 59.5292 69.6547H64.0584C64.151 69.6547 64.2368 70.0656 64.2368 70.5724C64.2368 71.0792 64.1613 71.4901 64.0584 71.4901H59.5292ZM66.7485 71.4901C66.6558 71.4901 66.57 71.0792 66.57 70.5724C66.57 70.0656 66.6455 69.6547 66.7485 69.6547H71.2777C71.3703 69.6547 71.4561 70.0656 71.4561 70.5724C71.4561 71.0792 71.3806 71.4901 71.2777 71.4901H66.7485ZM59.5395 76.7497C59.4468 76.7497 59.3611 76.3388 59.3611 75.832C59.3611 75.3252 59.4366 74.9143 59.5395 74.9143H64.0687C64.1613 74.9143 64.2471 75.3252 64.2471 75.832C64.2471 76.3388 64.1716 76.7497 64.0687 76.7497H59.5395ZM66.7588 76.7497C66.6661 76.7497 66.5803 76.3388 66.5803 75.832C66.5803 75.3252 66.6558 74.9143 66.7588 74.9143H71.288C71.3806 74.9143 71.4664 75.3252 71.4664 75.832C71.4664 76.3388 71.3909 76.7497 71.288 76.7497H66.7588ZM63.4957 48.3594C63.4957 47.6095 64.2368 47 65.1564 47C66.0759 47 66.8171 47.6061 66.8171 48.3594V54.3005C66.8171 55.0469 66.0759 55.6599 65.1564 55.6599C64.2368 55.6599 63.4957 55.0538 63.4957 54.3005V48.3594V48.3594ZM56.8288 59.9881H88.4372V53.1499C88.4372 52.9136 88.3411 52.7116 88.1935 52.561C88.0426 52.4103 87.8264 52.3178 87.6034 52.3178H84.5736C84.0658 52.3178 83.654 51.9069 83.654 51.4001C83.654 50.8934 84.0692 50.4824 84.5736 50.4824H87.6034C88.3445 50.4824 89.0102 50.7804 89.4974 51.2666C89.9846 51.7528 90.2831 52.4171 90.2831 53.1568V64.015C89.6793 63.8061 89.0582 63.6383 88.42 63.5151V61.8201H88.4406H56.8288V79.5302C56.8288 79.7665 56.9215 79.9685 57.0725 80.1192C57.2234 80.2698 57.4396 80.3623 57.6626 80.3623H72.6845C72.856 80.9992 73.0722 81.619 73.3295 82.2182H57.6798C56.9421 82.2182 56.273 81.9203 55.7857 81.4341C55.2985 80.9512 55 80.2869 55 79.5473V53.1568C55 52.4206 55.2985 51.7528 55.7857 51.2666C56.273 50.7804 56.9386 50.4824 57.6798 50.4824H60.9154C61.4232 50.4824 61.835 50.8934 61.835 51.4001C61.835 51.9069 61.4232 52.3178 60.9154 52.3178H57.6798C57.443 52.3178 57.2406 52.4103 57.0896 52.561C56.9386 52.7116 56.846 52.9273 56.846 53.1499V59.9881H56.8288ZM69.4694 52.3144C68.9616 52.3144 68.5499 51.9035 68.5499 51.3967C68.5499 50.8899 68.9616 50.479 69.4694 50.479H75.6387C76.1466 50.479 76.5583 50.8899 76.5583 51.3967C76.5583 51.9035 76.1466 52.3144 75.6387 52.3144H69.4694Z"
                                            fill="#393939" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M86.4437 66.015C87.8917 66.015 89.2779 66.3027 90.5406 66.8266C91.8582 67.3676 93.0351 68.162 94.0232 69.1482C95.008 70.131 95.804 71.3123 96.3496 72.6204C96.8746 73.8839 97.1628 75.2639 97.1628 76.7089C97.1628 78.1539 96.8746 79.5373 96.3496 80.7974C95.804 82.1089 95.0114 83.2868 94.0232 84.273C93.0351 85.2558 91.8547 86.0502 90.544 86.5947C89.2779 87.1186 87.8951 87.4062 86.4471 87.4062C84.9992 87.4062 83.6129 87.1186 82.3503 86.5947C81.0361 86.0502 79.8558 85.2592 78.8676 84.273C77.8794 83.2903 77.0868 82.1089 76.5412 80.7974C76.0162 79.5339 75.728 78.1539 75.728 76.7089C75.728 75.2639 76.0162 73.8839 76.5412 72.6204C77.0868 71.3089 77.8794 70.131 78.8676 69.1448C79.8523 68.162 81.0361 67.3676 82.3468 66.8231C83.6129 66.3027 84.9923 66.015 86.4437 66.015Z"
                                            fill="#5288F5" />
                                        <path d="M90 73L83.0022 80.9105" stroke="white" stroke-width="2"
                                            stroke-linecap="round" />
                                        <circle cx="83.5" cy="73.5" r="1.5" fill="white" />
                                        <circle cx="90.5" cy="79.5" r="1.5" fill="white" />
                                        <defs>
                                            <filter id="filter0_d_28_428" x="0.171875" y="0.877792" width="150.752"
                                                height="145.028" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                    result="hardAlpha" />
                                                <feOffset dy="4" />
                                                <feGaussianBlur stdDeviation="18.5" />
                                                <feComposite in2="hardAlpha" operator="out" />
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow_28_428" />
                                                <feBlend mode="normal" in="SourceGraphic"
                                                    in2="effect1_dropShadow_28_428" result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>


                                </div>
                                <div class="text-end textDivDash">
                                    <div>
                                        <span class="bigTitleDash">{{ round($counterat['familyCount']) }}%</span>
                                    </div>
                                    <div>
                                        <span class="smallTitleDash">Abschlussquote</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pb-5">
                    <div class="row g-0">
                        <div class="col-12 col-lg-8 h-auto pe-0 pe-lg-4">
                            <calendar></calendar>
                            <div class="text-center" style="margin-top: -15px">
                                <a href="{{ route('insertappointment') }}">
                                    <div class="row g-0 justify-content-end me-lg-2">
                                        <div class="col-auto pe-2 my-auto">
                                            <span
                                                style="font-weight: 500;color: rgba(0, 0, 0, 0.73);font-size: 18px;">Neuen
                                                Termin hinzufügen</span>
                                        </div>
                                        <div class="col-auto  my-auto">
                                            <svg width="36" height="35" viewBox="0 0 36 35" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.4961 34.9994C8.84807 34.9994 0.996094 27.1474 0.996094 17.4994C0.996094 7.85136 8.84807 -0.000610352 18.4961 -0.000610352C28.1441 -0.000610352 35.9961 7.85136 35.9961 17.4994C35.9961 27.1474 28.1441 34.9994 18.4961 34.9994Z"
                                                    fill="#2F60DC" />
                                                <path
                                                    d="M26.0549 18.9995H11.9373C11.4171 18.9995 10.9961 18.5521 10.9961 17.9994C10.9961 17.4468 11.4171 16.9995 11.9373 16.9995H26.0549C26.575 16.9995 26.9961 17.4468 26.9961 17.9994C26.9961 18.5521 26.575 18.9995 26.0549 18.9995Z"
                                                    fill="white" />
                                                <path
                                                    d="M18.9961 25.9995C18.4435 25.9995 17.9961 25.5784 17.9961 25.0583V17.9995V10.9406C17.9961 10.4205 18.4435 9.99945 18.9961 9.99945C19.5487 9.99945 19.9961 10.4205 19.9961 10.9406V25.0583C19.9961 25.5784 19.5487 25.9995 18.9961 25.9995Z"
                                                    fill="white" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Insert App Modal --}}


                        {{-- End Insert app Modal --}}
                        <div class="col-12 col-lg-4 pe-0 pe-md-0 pe-lg-5 pt-5 pt-lg-0">
                            <div class="pb-3">
                                <span class="dashboardSubTitle fs-5">Weiteres</span>
                            </div>
                            <div class="pe-0 pe-lg-0">
                                <div class="row g-0">
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="weiteresGreyBgDiv"
                                            onclick="window.location.href='{{ route('leads') }}'"
                                            style="cursor: pointer">
                                            <div class="row g-0 ps-3">
                                                <div class="col-auto my-auto">
                                                    <svg width="37" height="40" viewBox="0 0 42 34"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M42 32.0491C42 33.1265 41.0728 34 39.9291 34C38.7853 34 37.8581 33.1265 37.8581 32.0491C37.8581 32.0368 37.8617 32.0256 37.8619 32.0133H37.849C37.8495 31.9683 37.8561 31.9248 37.8561 31.8796C37.8561 28.6948 36.5188 25.8106 34.3556 23.6936L34.3681 23.6818C33.9995 23.342 33.7693 22.8694 33.7693 22.3451C33.7693 21.311 34.6592 20.4728 35.7568 20.4728C36.3134 20.4728 36.8151 20.6895 37.176 21.0368L37.1796 21.0333C40.1579 23.8461 41.9999 27.7269 41.9999 32.0134H41.9962C41.9964 32.0256 42 32.0368 42 32.0491ZM25.5234 20.1213V20.1262C25.5132 20.1261 25.5033 20.1247 25.493 20.1247C18.6652 20.1247 13.1301 25.3875 13.1301 31.8796C13.1301 31.9114 13.133 31.9425 13.1352 31.9739C13.1361 31.9994 13.1432 32.0233 13.1432 32.0491C13.1432 33.1266 12.216 34 11.0723 34C9.92845 34 9.00125 33.1266 9.00125 32.0491C9.00125 32.0369 9.00483 32.0256 9.00503 32.0134H8.9861C8.9861 25.7007 12.9864 20.2784 18.7233 17.8422C16.336 15.9971 14.8121 13.1972 14.8121 10.0613C14.8121 4.5045 19.5942 0 25.4931 0C31.392 0 36.174 4.50445 36.174 10.0613C36.174 15.6083 31.4081 20.1056 25.5234 20.1213ZM25.493 3.64586C21.7392 3.64586 18.6962 6.51243 18.6962 10.0486C18.6962 13.5847 21.7392 16.4512 25.493 16.4512C29.2469 16.4512 32.29 13.5847 32.29 10.0486C32.29 6.51243 29.2469 3.64586 25.493 3.64586ZM12.8702 5.41648C10.6005 6.00626 8.93398 7.93346 8.93398 10.226C8.93398 12.1464 10.1034 13.8105 11.8171 14.6468C12.5107 14.9853 13.1846 15.6269 13.2951 16.7443C13.3909 17.7133 13.0857 19.1678 11.7251 19.5212C7.17509 20.7028 3.81682 24.5031 3.65222 29.0617C3.66232 29.1351 3.676 29.2076 3.676 29.2836C3.676 30.2387 2.85417 31.013 1.84013 31.013C0.826293 31.013 0.00436414 30.2387 0.00436414 29.2836C0.00436414 29.2668 0.00921804 29.2511 0.00970836 29.2343L0 29.2342C0 23.43 3.65786 18.8111 8.7986 16.8106C6.67104 15.279 5.29632 12.8914 5.29632 10.2008C5.29632 6.81769 7.46331 3.90978 10.5796 2.59199C12.037 1.9756 13.0986 2.71161 13.3556 3.65861C13.6635 4.79331 12.8702 5.41648 12.8702 5.41648Z"
                                                            fill="black" fill-opacity="0.86" />
                                                    </svg>
                                                </div>
                                                <div class="col ">
                                                    <div class="text-center py-2">
                                                        <div>
                                                            <span
                                                                class="weiteresfirstSpanText fs-3">{{ $leadscount }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fs-5 weiteresSecondSpanText">Neue Leads</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="weiteresGreyBgDiv mt-3 mt-md-0 mt-lg-3 ms-0 ms-md-3 ms-lg-0"
                                            onclick="window.location.href='{{ route('tasks') }}'"
                                            style="cursor: pointer">
                                            <div class="row g-0 ps-3">
                                                <div class="col-auto my-auto">
                                                    <svg width="37" height="40" viewBox="0 0 47 47"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M43.7328 33.8848H39.6949L36.1245 30.3144C36.585 29.5329 36.7833 28.6149 36.673 27.7004C36.4255 25.6481 36.2278 24.1268 36.0859 23.1787C35.6557 20.3092 33.4515 17.9733 30.4704 17.2279L28.1229 16.6412C27.8128 16.3399 27.7607 15.3497 27.8458 14.8224C28.2226 14.4594 28.5882 14.0508 28.9143 13.5953C30.1844 11.8214 30.9127 9.56094 30.9127 7.39403C30.9127 3.0406 27.8721 0 23.5187 0C19.1652 0 16.1246 3.0406 16.1246 7.39403C16.1246 9.56094 16.8531 11.8214 18.123 13.5953C18.449 14.0503 18.8147 14.4587 19.1912 14.8218C19.2766 15.3487 19.2249 16.3395 18.9144 16.641L16.5668 17.2278C13.5858 17.9731 11.3816 20.3091 10.9515 23.1786C10.8089 24.1301 10.6112 25.6514 10.3642 27.7002C10.255 28.6056 10.4481 29.5146 10.8988 30.2909L7.3051 33.8846H3.26721C1.4657 33.8846 0 35.3502 0 37.152V40.8227C0 42.6244 1.4657 44.0899 3.26721 44.0899H11.8491C13.6507 44.0899 15.1163 42.6242 15.1163 40.8227V37.152C15.1163 35.3503 13.6506 33.8848 11.8491 33.8848H11.7661L13.4271 32.2238C13.774 32.3164 14.1345 32.3649 14.5002 32.3649H21.9414V36.3402H19.2091C17.4074 36.3402 15.9419 37.8059 15.9419 39.6074V43.2781C15.9419 45.0798 17.4076 46.5453 19.2091 46.5453H27.7909C29.5926 46.5453 31.0581 45.0796 31.0581 43.2781V39.6074C31.0581 37.8057 29.5924 36.3402 27.7909 36.3402H25.0958V32.3649H32.537C32.8922 32.3649 33.2423 32.3186 33.5802 32.2311L35.2339 33.8848H35.1509C33.3493 33.8848 31.8837 35.3505 31.8837 37.152V40.8227C31.8837 42.6244 33.3494 44.0899 35.1509 44.0899H43.7328C45.5345 44.0899 47 42.6242 47 40.8227V37.152C47 35.3502 45.5343 33.8848 43.7328 33.8848ZM11.8491 36.7234C12.0852 36.7234 12.2774 36.9157 12.2774 37.1518V40.8226C12.2774 41.0587 12.0852 41.251 11.8491 41.251H3.26721C3.0311 41.251 2.83883 41.0587 2.83883 40.8226V37.1518C2.83883 36.9157 3.0311 36.7234 3.26721 36.7234H11.8491V36.7234ZM23.5187 3.1539C25.5683 3.1539 27.7583 4.26766 27.7583 7.39356C27.7583 10.4539 25.6186 13.5721 23.5187 13.5721C21.4187 13.5721 19.279 10.4539 19.279 7.39356C19.279 4.26782 21.469 3.1539 23.5187 3.1539ZM25.5186 18.4384C25.414 19.4496 24.5571 20.2407 23.5187 20.2407C22.4802 20.2407 21.6233 19.4494 21.5187 18.4384C21.9435 17.8575 22.1685 17.1974 22.2812 16.5791C22.6891 16.6749 23.1028 16.7266 23.5187 16.7266C23.9344 16.7266 24.3482 16.6747 24.7562 16.5791C24.8689 17.1972 25.0937 17.8575 25.5186 18.4384ZM27.7908 39.179C28.027 39.179 28.2191 39.3713 28.2191 39.6074V43.2781C28.2191 43.5142 28.0269 43.7065 27.7908 43.7065H19.2089C18.9728 43.7065 18.7805 43.5142 18.7805 43.2781V39.6074C18.7805 39.3713 18.9728 39.179 19.2089 39.179H27.7908V39.179ZM33.2939 28.8702C33.1812 28.9973 32.9329 29.2106 32.5368 29.2106H14.5002C14.1041 29.2106 13.8558 28.9973 13.743 28.8702C13.6303 28.7429 13.4483 28.4711 13.4956 28.0778C13.7357 26.0874 13.9348 24.5549 14.0709 23.6462C14.3078 22.0659 15.6182 20.7164 17.3316 20.2879L18.6517 19.9579C19.3642 21.9586 21.2764 23.3951 23.5185 23.3951C25.7606 23.3951 27.6729 21.9585 28.3853 19.9579L29.7053 20.2879C31.4189 20.7164 32.7292 22.0659 32.9661 23.6462C33.1018 24.5516 33.3007 26.0839 33.5412 28.0778C33.5885 28.4709 33.4066 28.7429 33.2939 28.8702ZM44.161 40.8226C44.161 41.0587 43.9687 41.251 43.7326 41.251H35.1508C34.9147 41.251 34.7224 41.0587 34.7224 40.8226V37.1518C34.7224 36.9157 34.9147 36.7234 35.1508 36.7234H43.7326C43.9687 36.7234 44.161 36.9157 44.161 37.1518V40.8226Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-center">
                                                        <div class="pt-2">
                                                            <span
                                                                class="fs-3 weiteresfirstSpanText">{{ $offen }}</span>
                                                        </div>
                                                        <div class="pb-2">
                                                            <span class="fs-5 weiteresSecondSpanText">Offene
                                                                Aufgaben</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="weiteresGreyBgDiv mt-3 mt-md-3 mt-lg-3 "
                                            onclick="window.location.href='{{ route('tasks') }}'"
                                            style="cursor: pointer">
                                            <div class="row g-0 ps-3">
                                                <div class="col-auto my-auto">
                                                    <svg width="37" height="40" viewBox="0 0 47 37"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18.6206 5.60294H37.9261V34.6618H2.33789V5.77746C2.33789 5.75037 2.3442 5.72365 2.35632 5.69941C2.38588 5.64029 2.44631 5.60294 2.51241 5.60294H5.93061C6.65098 5.60294 7.23495 5.01896 7.23495 4.2986V4.23203C7.23495 2.5851 8.57005 1.25 10.217 1.25H14.2676C15.9146 1.25 17.2497 2.5851 17.2497 4.23203C17.2497 4.98917 17.8634 5.60294 18.6206 5.60294Z"
                                                            stroke="black" stroke-width="2.5" />
                                                        <path
                                                            d="M10.8072 14.3088H42.6914C43.8758 14.3088 44.7181 15.4607 44.359 16.5894L38.4287 35.2274C38.3297 35.5386 38.0406 35.75 37.714 35.75H2.8554C2.33493 35.75 1.97269 35.2328 2.15055 34.7436L9.16253 15.4607C9.41401 14.7691 10.0713 14.3088 10.8072 14.3088Z"
                                                            fill="#EAEFFB" stroke="black" stroke-width="2.5" />
                                                        <path
                                                            d="M23.496 18.5C25.634 18.5 27.7388 19.4846 27.7388 21.8397C27.7388 24.0116 25.25 24.8468 24.7156 25.6316C24.3143 26.2154 24.4483 27.0356 23.3458 27.0356C22.6277 27.0356 22.2769 26.4515 22.2769 25.917C22.2769 23.928 25.1992 23.4779 25.1992 21.8401C25.1992 20.9387 24.5993 20.4042 23.5965 20.4042C21.4586 20.4042 22.2934 22.6084 20.6742 22.6084C20.0897 22.6084 19.5879 22.2576 19.5879 21.5898C19.5875 19.9517 21.4578 18.5 23.496 18.5ZM23.4129 28.12C24.1633 28.12 24.7826 28.7372 24.7826 29.4901C24.7826 30.2429 24.1645 30.8602 23.4129 30.8602C22.6612 30.8602 22.0427 30.2437 22.0427 29.4901C22.0427 28.7376 22.6612 28.12 23.4129 28.12Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-center py-2">
                                                        <div>
                                                            <span
                                                                class="fs-3 weiteresfirstSpanText">{{ $pendingcnt }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="fs-5 weiteresSecondSpanText">Offene
                                                                Pendenzen</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="weiteresGreyBgDiv mt-3 mt-md-3 mt-lg-3 ms-0 ms-md-3 ms-lg-0"
                                            onclick="window.location.href='{{ route('Appointments') }}'"
                                            style="cursor: pointer">
                                            <div class="row g-0 ps-3">
                                                <div class="col-auto my-auto">
                                                    <svg width="37" height="40" viewBox="0 0 40 37"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M36.7265 13.4614H36.5805V15.9468C36.5805 15.9686 36.5794 15.99 36.5788 16.0117H36.7265C37.125 16.0117 37.4491 16.3359 37.4491 16.7343V32.7424C37.4491 33.1408 37.125 33.465 36.7265 33.465H12.5824C12.184 33.465 11.8599 33.1408 11.8599 32.7424V28.0783H9.30957V32.7424C9.30957 34.5471 10.7778 36.0153 12.5824 36.0153H36.7266C38.5313 36.0153 39.9995 34.5471 39.9995 32.7424V16.7343C39.9994 14.9295 38.5313 13.4614 36.7265 13.4614Z"
                                                            fill="black" />
                                                        <path
                                                            d="M34.0389 16.7875C34.5031 16.7875 34.8795 16.4111 34.8795 15.9469V10.9029C34.8795 10.4387 34.5032 10.0623 34.0389 10.0623C33.665 10.0623 33.3485 10.3065 33.2393 10.644V16.2058C33.3486 16.5433 33.665 16.7875 34.0389 16.7875Z"
                                                            fill="black" />
                                                        <path
                                                            d="M33.9634 28.0536C34.6676 28.0536 35.2385 27.4827 35.2385 26.7784C35.2385 26.0742 34.6676 25.5033 33.9634 25.5033H32.247C31.2919 26.9191 29.731 27.8932 27.9395 28.0536H33.9634Z"
                                                            fill="black" />
                                                        <path
                                                            d="M33.9638 29.4155H15.7537C15.0494 29.4155 14.4785 29.9865 14.4785 30.6907C14.4785 31.3949 15.0494 31.9658 15.7537 31.9658H33.9638C34.668 31.9658 35.239 31.3949 35.239 30.6907C35.239 29.9865 34.668 29.4155 33.9638 29.4155Z"
                                                            fill="black" />
                                                        <path
                                                            d="M30.6899 22.2552V6.24705C30.6899 4.44238 29.2217 2.97418 27.417 2.97418H26.8048V5.52447H27.417C27.8154 5.52447 28.1396 5.84869 28.1396 6.24705V22.2552C28.1396 22.6535 27.8154 22.9778 27.417 22.9778H3.27287C2.87443 22.9778 2.55029 22.6535 2.55029 22.2552V6.24705C2.55029 5.84869 2.87443 5.52447 3.27287 5.52447H3.84388V2.97418H3.27287C1.4682 2.97418 0 4.4423 0 6.24705V22.2551C0 24.0722 1.48138 25.528 3.27287 25.528H27.4169C29.2212 25.5281 30.6899 24.0604 30.6899 22.2552Z"
                                                            fill="black" />
                                                        <path
                                                            d="M18.3045 6.72527C18.7688 6.72527 19.1452 6.34885 19.1452 5.88462V0.840659C19.1452 0.376337 18.7688 0 18.3045 0C17.8403 0 17.4639 0.376337 17.4639 0.840659V5.88462C17.4639 6.34894 17.8403 6.72527 18.3045 6.72527Z"
                                                            fill="black" />
                                                        <path
                                                            d="M12.3446 6.72527C12.8088 6.72527 13.1852 6.34885 13.1852 5.88462V0.840659C13.1852 0.376337 12.8088 0 12.3446 0C11.8802 0 11.5039 0.376337 11.5039 0.840659V5.88462C11.5039 6.34894 11.8802 6.72527 12.3446 6.72527Z"
                                                            fill="black" />
                                                        <path
                                                            d="M6.38558 6.72527C6.84982 6.72527 7.22624 6.34885 7.22624 5.88462V0.840659C7.22624 0.376337 6.8499 0 6.38558 0C5.92134 0 5.54492 0.376337 5.54492 0.840659V5.88462C5.54484 6.34894 5.92126 6.72527 6.38558 6.72527Z"
                                                            fill="black" />
                                                        <path
                                                            d="M24.2635 6.72527C24.7278 6.72527 25.1042 6.34885 25.1042 5.88462V0.840659C25.1042 0.376337 24.7277 0 24.2635 0C23.7993 0 23.4229 0.376337 23.4229 0.840659V5.88462C23.4229 6.34894 23.7992 6.72527 24.2635 6.72527Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.95874 12.1689H15.0845C15.7887 12.1689 16.3597 11.598 16.3597 10.8937C16.3597 10.1895 15.7887 9.61859 15.0845 9.61859H5.95874C5.25452 9.61859 4.68359 10.1895 4.68359 10.8937C4.68359 11.598 5.25452 12.1689 5.95874 12.1689Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.95874 16.1688H24.5779C25.2821 16.1688 25.853 15.5979 25.853 14.8937C25.853 14.1895 25.2821 13.6185 24.5779 13.6185H5.95874C5.25452 13.6185 4.68359 14.1895 4.68359 14.8937C4.68359 15.5979 5.25452 16.1688 5.95874 16.1688Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.95874 20.1687H24.5779C25.2821 20.1687 25.853 19.5978 25.853 18.8936C25.853 18.1893 25.2821 17.6184 24.5779 17.6184H5.95874C5.25452 17.6184 4.68359 18.1893 4.68359 18.8936C4.68359 19.5978 5.25452 20.1687 5.95874 20.1687Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-center py-2">
                                                        <div>
                                                            <span
                                                                class="fs-3 weiteresfirstSpanText">{{ $todayAppointCount }}</span>
                                                        </div>
                                                        <div class="">
                                                            <span class="fs-5 weiteresSecondSpanText">Termine
                                                                (Heute)</span>
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
                </div>
            </div>
        </section>
    @endif
    @if (in_array('backoffice', $urole) )

        <div class="row gx-0 gx-xl-2 gy-2 pt-4 pt-lg-0 mx-4 mx-md-4 mx-lg-5 my-4 my-md-4 my-lg-5 removeGuttersMobile"
            id="app">
            <div class="col-12 col-xl-6 d-flex flex-column">
                <todolist></todolist>
            </div>
            <div class="col-12 col-xl-6 d-flex flex-column">
                <infonumbers></infonumbers>
            </div>
            <div class="col-12 col-xl-6 d-flex flex-column">
                <div class="secondGreyBorderDash p-3 p-md-4 h-100">
                    <div class="row g-0">
                        <div class="col-auto cornerSvgToDoList">
                            <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_28_428)">
                                    <path
                                        d="M37.0423 77.3271C39.8362 81.9773 47.7843 86.547 52.0268 89.8453C56.2692 93.1435 50.752 102.5 55.797 103.944C60.8421 105.388 76.3506 98.8915 81.4301 98.2616C86.5097 97.6316 91.3583 95.9651 95.6991 93.3571C100.04 90.749 103.788 87.2506 106.729 83.0615C109.67 78.8724 111.747 74.0747 112.841 68.9423C113.934 63.8099 114.024 58.4434 113.104 53.1491C112.184 47.8547 111.334 38.8294 110.492 33.8527L80.9468 34.3263L63.3665 34.608C58.8425 34.6804 54.4031 35.8452 50.4263 38.0031L47.8194 39.4177C43.6759 41.6661 40.4617 45.3082 38.746 49.6991V49.6991C37.881 51.9127 37.4183 54.2631 37.3796 56.6394L37.0423 77.3271Z"
                                        fill="#DCE4F9" />
                                </g>
                                <path
                                    d="M64.9144 52.1109C63.0288 52.5694 62.1035 54.0829 62.1035 56.695C62.1035 58.8662 63.0461 60.5871 64.681 61.4001C65.3124 61.7116 65.3729 61.7203 66.2467 61.7203C67.1029 61.7203 67.207 61.703 67.7516 61.4436C69.4124 60.6566 70.4155 58.8662 70.4069 56.7126C70.3982 54.0141 69.438 52.5003 67.4832 52.0853C66.8864 51.9636 65.4677 51.9722 64.9144 52.1109ZM67.4746 53.512C68.0887 53.6936 68.6077 54.2212 68.8152 54.8613C68.9967 55.4495 69.0745 57.1621 68.9449 57.7849C68.4259 60.2586 65.9867 61.2272 64.4559 59.5667C63.6948 58.7365 63.4524 57.9232 63.5043 56.3665C63.5734 54.6106 63.9455 53.8927 64.9746 53.538C65.5717 53.3305 66.8173 53.3218 67.4746 53.512Z"
                                    fill="black" />
                                <path
                                    d="M84.2894 52.1109C82.4038 52.5694 81.4785 54.0829 81.4785 56.695C81.4785 58.8662 82.4215 60.5871 84.056 61.4001C84.6874 61.7116 84.7479 61.7203 85.6304 61.7203C86.5125 61.7203 86.5733 61.7116 87.2047 61.4001C88.8392 60.5871 89.7822 58.8658 89.7822 56.695C89.7822 54.031 88.805 52.4999 86.8586 52.085C86.2614 51.9636 84.843 51.9722 84.2894 52.1109ZM86.8496 53.512C87.4551 53.6936 87.9827 54.2212 88.1902 54.8613C88.4063 55.5618 88.4585 57.361 88.268 58.0097C88.0692 58.7016 87.8441 59.1169 87.4291 59.5664C86.417 60.6649 84.843 60.6649 83.8309 59.5664C83.4156 59.1165 83.1908 58.7016 82.992 58.0097C82.8018 57.3696 82.8537 55.5618 83.0698 54.8786C83.2686 54.2472 83.7444 53.7454 84.3326 53.5466C84.9467 53.3305 86.1836 53.3218 86.8496 53.512Z"
                                    fill="black" />
                                <path
                                    d="M74.359 55.5878C72.6722 55.9944 71.6172 57.1535 71.2192 59.0387C71.0031 60.0854 71.0204 62.0401 71.2538 62.9136C71.8333 65.0499 73.4077 66.6415 75.267 66.9527C77.6111 67.3511 79.8943 65.6297 80.6294 62.9139C80.8628 62.0405 80.8801 60.0858 80.664 59.0391C80.2663 57.1276 79.2197 55.9858 77.481 55.5795C76.7891 55.4149 75.0422 55.4235 74.359 55.5878ZM76.841 56.8765C78.147 56.9976 78.9949 57.8191 79.2975 59.2293C79.479 60.0768 79.5136 61.4869 79.3666 62.2393C79.09 63.6318 78.2421 64.8514 77.1785 65.3618C76.7459 65.5692 76.573 65.6038 75.9416 65.6038C75.3102 65.6038 75.1373 65.5692 74.7047 65.3618C73.6408 64.8514 72.7932 63.6318 72.5163 62.2393C72.3001 61.1235 72.4471 59.3157 72.8365 58.4163C73.0612 57.8886 73.6235 57.3178 74.1338 57.1016C74.5491 56.9201 75.6646 56.7469 76.1145 56.7991C76.2355 56.816 76.5557 56.8506 76.841 56.8765Z"
                                    fill="black" />
                                <path
                                    d="M63.4438 62.0661C60.8663 62.6629 59.785 63.5367 59.3009 65.4309C59.128 66.071 58.9638 68.0775 59.007 68.8649C59.0416 69.4444 59.0502 69.4704 59.4655 69.9029C60.2439 70.69 61.922 71.3646 63.7557 71.6156C64.1104 71.6588 64.9493 71.728 65.6239 71.7626L66.8435 71.8231L66.9473 71.4427C66.9991 71.2353 67.0769 70.9496 67.1202 70.8113C67.172 70.673 67.2066 70.5257 67.2066 70.4911C67.2066 70.4479 66.8259 70.4133 66.3677 70.4133C64.3179 70.4133 62.4064 70.1021 61.3684 69.6004C60.4341 69.1502 60.3732 69.0724 60.3732 68.2245C60.3732 66.5896 60.6758 65.1712 61.1429 64.609C61.4804 64.2027 62.2328 63.8133 63.219 63.528L64.0147 63.3033L64.551 63.5713C65.6409 64.1249 66.8432 64.1249 67.95 63.5713L68.4864 63.3033L69.161 63.4935C69.5417 63.5972 70.0171 63.7528 70.225 63.8482C70.4324 63.9347 70.6143 64.0038 70.6316 63.9866C70.6489 63.9779 70.5884 63.6145 70.5019 63.1909C70.3463 62.4298 70.3463 62.4212 70.0175 62.3088C69.836 62.2483 69.291 62.11 68.8066 62.0149L67.9158 61.8247L67.6132 62.1273C66.9559 62.7846 65.5548 62.7933 64.9061 62.1446C64.7505 61.9803 64.5513 61.8506 64.4649 61.8593C64.3781 61.8586 63.9196 61.9537 63.4438 62.0661Z"
                                    fill="black" />
                                <path
                                    d="M82.8183 62.0661C81.4691 62.3773 81.5642 62.3081 81.3826 63.1906C81.2962 63.6145 81.2357 63.9776 81.253 63.9862C81.2702 64.0035 81.4518 63.9344 81.6593 63.8479C81.8667 63.7528 82.3425 63.5972 82.7232 63.4931L83.3979 63.303L83.9342 63.5709C85.0068 64.1245 86.2955 64.1159 87.3419 63.5623L87.835 63.3116L88.3713 63.4413C89.6687 63.7701 90.5076 64.2196 90.8623 64.7905C91.2081 65.3355 91.4159 66.304 91.4764 67.6623L91.537 68.8646L91.3036 69.1066C90.5598 69.8763 88.1984 70.4127 85.4826 70.4127H84.6091L84.7302 70.7328C84.7907 70.9144 84.8858 71.2346 84.9376 71.4421L85.0327 71.8224L86.3042 71.7619C89.2537 71.6149 91.3554 70.9749 92.4194 69.8936C92.826 69.487 92.8433 69.4351 92.8779 68.9161C92.9298 68.1723 92.7482 66.062 92.5926 65.4389C92.0823 63.4928 90.9232 62.5848 88.2074 62.0139L87.2907 61.8237L86.9882 62.1263C86.3308 62.7836 84.9297 62.7922 84.281 62.1435C84.1254 61.9793 83.9262 61.8496 83.8398 61.8583C83.7523 61.8586 83.2941 61.9537 82.8183 62.0661Z"
                                    fill="black" />
                                <path
                                    d="M72.8021 67.4721C70.856 67.896 69.7142 68.415 68.884 69.2366C67.7682 70.3525 67.3705 71.8141 67.3446 74.8501L67.3359 76.3117L67.9155 76.8567C69.0573 77.938 70.9688 78.6126 73.6759 78.8979C75.1289 79.0448 78.2254 78.9584 79.5228 78.725C81.564 78.3619 83.1988 77.661 84.0896 76.7529L84.5481 76.2858L84.5308 74.8155C84.5049 71.7795 84.1072 70.3525 82.9914 69.2366C82.1608 68.3977 80.9326 67.8528 78.9692 67.4634L78.0089 67.2732L77.6891 67.5845C77.2738 67.9911 76.7378 68.1813 75.9678 68.1813C75.1808 68.1813 74.5839 67.9825 74.2119 67.6017C73.8747 67.256 73.8402 67.256 72.8021 67.4721ZM73.7624 68.9856C74.8177 69.7121 76.8156 69.7466 78.0006 69.0547L78.3727 68.8473L78.5456 69.0634C78.7531 69.3314 79.2548 69.3746 79.4969 69.1498C79.6438 69.0202 79.7043 69.0202 80.2666 69.2017C81.1227 69.4783 81.8928 69.9628 82.2732 70.4645C82.8614 71.2256 83.0861 72.2204 83.1812 74.3912L83.2331 75.7318L82.8613 76.0693C82.1349 76.7267 80.6642 77.2198 78.6922 77.4705C77.2479 77.652 73.7447 77.6001 72.4819 77.384C70.9076 77.1074 69.5324 76.5797 68.9615 76.0348C68.6848 75.7754 68.6762 75.7495 68.6762 75.014C68.6762 73.31 68.9183 71.7273 69.299 70.9317C69.7229 70.0582 70.7347 69.4095 72.309 68.9942C73.3471 68.7262 73.3816 68.7262 73.7624 68.9856Z"
                                    fill="black" />
                                <defs>
                                    <filter id="filter0_d_28_428" x="0.0419922" y="0.852722" width="150.691"
                                        height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                        <div class="col" style="margin-top: -0.8rem;margin-left:-1rem;">
                            <div class="pb-3">
                                <span class="secondGreyBorderDashSpan">Eingereichte Kunden</span>
                            </div>
                        </div>
                    </div>

                    <div class="overFlowDivDashboard" style="margin-top: -1.5rem;">
                        @if ($pendingg->count() == 0)
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                style="color: #9F9F9F">
                                Aktuell keine neu eingereichten Kunden
                            </div>
                        @else
                            <div class="row g-0 hideOnMobile">
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
                            @foreach ($pendingg as $family)
                                <div class="thirdBorderDivDash py-1 my-2 px-1">
                                    @php
                                        $leadss = $family->family_id * 1244;
                                        $taskId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                        $admin_id = \Illuminate\Support\Facades\Crypt::encrypt($family->admin_id * 1244);
                                        $pend_id = $family->id;
                                    @endphp
                                    <a style="text-decoration: none;color: black"
                                        href="{{ route('leadfamilyperson', [$taskId, 'admin_id' => $admin_id, 'pend_id' => $pend_id]) }}'">
                                        <div class="thirdBorderDivDash my-2" style="border:none">
                                            <div class="row g-0 text-start ps-2">
                                                <div class="col-3">
                                                    <div
                                                        onclick="window.location.href='{{ route('leadfamilyperson', [$taskId, 'admin_id' => $admin_id, 'pend_id' => $pend_id]) }}'">
                                                        <span
                                                            class="anfragenFieldsSpan fs-6">{{ Carbon\Carbon::parse($family->created_at)->format('d.m.Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div
                                                        onclick="window.location.href='{{ route('leadfamilyperson', [$taskId, 'admin_id' => $admin_id, 'pend_id' => $pend_id]) }}'">
                                                        <span
                                                            class="anfragenFieldsSpan fs-6">{{ ucfirst($family->family->first_name) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div
                                                        onclick="window.location.href='{{ route('leadfamilyperson', [$taskId, 'admin_id' => $admin_id, 'pend_id' => $pend_id]) }}'">
                                                        <span
                                                            class="anfragenFieldsSpan fs-6">{{ ucfirst($family->family->last_name) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div
                                                        onclick="window.location.href='{{ route('leadfamilyperson', [$taskId, 'admin_id' => $admin_id, 'pend_id' => $pend_id]) }}'">
                                                        <span
                                                            class="anfragenFieldsSpan fs-6">{{ ucfirst($family->family->lead->admin->name) }}</span>
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

            <div class="col-12 col-xl-6 d-flex flex-column">
                <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                    <div class="row g-0">
                        <div class="col-auto cornerSvgToDoList">
                            <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_28_428)">
                                    <path
                                        d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                        fill="#DCE4F9" />
                                </g>
                                <path
                                    d="M94.6179 69.6677C94.4905 69.7983 94.3763 69.9159 94.275 70.0302C94.1738 70.1444 94.0856 70.2391 94.0073 70.3175C93.9061 70.422 93.8179 70.4971 93.7428 70.5461L90.5167 67.3493C90.6669 67.222 90.8399 67.0685 91.0293 66.8922C91.2187 66.7126 91.3754 66.5722 91.5061 66.471C91.8097 66.1902 92.1395 66.0726 92.4922 66.1085C92.8448 66.1477 93.1354 66.2294 93.364 66.3567C93.6187 66.484 93.8897 66.7061 94.1803 67.0228C94.4709 67.3428 94.693 67.6759 94.8432 68.0351C94.9183 68.2375 94.9705 68.4922 94.9967 68.7959C95.0228 69.0963 94.8954 69.3902 94.6179 69.6677ZM88.7697 75.493L87.4048 76.8644L86.151 78.1183C85.7951 78.4742 85.4979 78.7779 85.2595 79.0326C85.0179 79.284 84.8873 79.4244 84.8612 79.4505C84.7338 79.5518 84.5967 79.6595 84.4432 79.7771C84.293 79.8881 84.1395 79.9861 83.9893 80.0612C83.8391 80.1363 83.604 80.231 83.2873 80.3485C82.9706 80.4628 82.6473 80.5673 82.3208 80.6718C81.991 80.773 81.6742 80.8612 81.3706 80.9363C81.0669 81.0146 80.8383 81.0636 80.6881 81.0897C80.3845 81.142 80.182 81.1028 80.0808 80.9754C79.9796 80.8481 79.9534 80.6326 80.0057 80.3289C80.0318 80.1754 80.0808 79.9469 80.1559 79.6432C80.231 79.3363 80.3191 79.0261 80.4236 78.7093C80.5249 78.3893 80.6196 78.0922 80.7077 77.8114C80.7959 77.5338 80.8644 77.3412 80.9134 77.2432C81.0669 76.9134 81.2693 76.6228 81.5208 76.3681L82.0138 75.8718L82.9608 74.9216C83.3395 74.5395 83.7575 74.115 84.2114 73.6481C84.6653 73.1779 85.1224 72.7142 85.5763 72.2604C86.6669 71.1697 87.8914 69.9485 89.2595 68.6065L92.4465 71.8032L88.7697 75.493ZM85.6024 55.7118C85.6024 55.1926 85.1812 54.7682 84.662 54.7682H82.7779V52.8873H86.5461C87.0653 52.8873 87.4865 53.3086 87.4865 53.831V66.6375L85.6024 68.711V55.7118ZM82.7779 59.9502C82.7779 60.2081 82.5657 60.4204 82.3077 60.4204H68.1788C67.9175 60.4204 67.7086 60.2081 67.7086 59.9502V59.0065C67.7086 58.7453 67.9175 58.5363 68.1788 58.5363H82.3077C82.5689 58.5363 82.7779 58.7453 82.7779 59.0065V59.9502ZM80.8938 56.6522H79.9502C79.431 56.6522 79.0098 56.231 79.0098 55.7086V51.9437C79.0098 51.4245 79.431 51 79.9502 51H80.8938C81.413 51 81.8342 51.4212 81.8342 51.9437V55.7118C81.8375 56.231 81.413 56.6522 80.8938 56.6522ZM72.4171 52.8873H78.0694V54.7714H72.4171V52.8873ZM70.533 56.6522H69.5926C69.0735 56.6522 68.649 56.231 68.649 55.7086V51.9437C68.649 51.4245 69.0702 51 69.5926 51H70.533C71.0522 51 71.4767 51.4212 71.4767 51.9437V55.7118C71.4767 56.231 71.0555 56.6522 70.533 56.6522ZM64.8841 55.7118V76.4301C64.8841 76.9493 65.3053 77.3738 65.8277 77.3738H77.7265L76.0155 79.2579H63.9404C63.4212 79.2579 63 78.8367 63 78.3175V53.8277C63 53.3053 63.4212 52.8841 63.9404 52.8841H67.7086V54.7682H65.8245C65.3053 54.7682 64.8841 55.1926 64.8841 55.7118ZM82.3077 64.1885H68.1788C67.9175 64.1885 67.7086 63.9763 67.7086 63.7183V62.7747C67.7086 62.5134 67.9175 62.3045 68.1788 62.3045H82.3077C82.5689 62.3045 82.7779 62.5134 82.7779 62.7747V63.7183C82.7779 63.9763 82.5657 64.1885 82.3077 64.1885ZM82.7779 67.4832C82.7779 67.7412 82.5657 67.9534 82.3077 67.9534H68.1788C67.9175 67.9534 67.7086 67.7412 67.7086 67.4832V66.5396C67.7086 66.2783 67.9175 66.0694 68.1788 66.0694H82.3077C82.5689 66.0694 82.7779 66.2783 82.7779 66.5396V67.4832Z"
                                    fill="black" />
                                <defs>
                                    <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691"
                                        height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                        <div class="col titleMarginAuto">
                            <div class="pb-3">
                                <span class="secondGreyBorderDashSpan">Statusprüfung</span>
                            </div>
                        </div>
                    </div>

                    <div class="overFlowDivDashboard text-start" style="margin-top: -1.5rem;height: 25vh">
                        @if ($morethan30->count() == 0)
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                style="color: #9F9F9F">
                                Keine Statusprüfung
                            </div>
                        @else
                            <div class="row g-0">
                                <div class="col-4">
                                    <div class="row g-0 justify-content-start">
                                        <div class="col-auto pe-2 my-auto">

                                        </div>
                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Berater</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row g-0 justify-content-start">
                                        <div class="col-auto my-auto pe-2">


                                        </div>
                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Kunde</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="row g-0 justify-content-start">
                                        <div class="col-auto pe-2 my-auto">

                                        </div>
                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Produkte</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($morethan30 as $more)
                                <div class="thirdBorderDivDash py-2 my-2">
                                    <div class="row g-0 text-start ps-3">
                                        <div class="col-4">
                                            <div>
                                                <span
                                                    class="anfragenFieldsSpan fs-6">{{ ucfirst($more['person']->pendency->adminpend->name) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <span
                                                    class="anfragenFieldsSpan fs-6">{{ ucfirst($more['person']->first_name) }}
                                                    {{ ucfirst($more['person']->last_name) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <span class="anfragenFieldsSpan fs-6">{{ $more['data'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6 d-flex flex-column h-auto">
                <todo></todo>
            </div>

            <div class="col-12 col-xl-6 d-flex flex-column">
                <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                    <div class="row g-0">
                        <div class="col-auto cornerSvgToDoList">
                            <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_28_428)">
                                    <path
                                        d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                        fill="#DCE4F9" />
                                </g>
                                <path
                                    d="M77.577 55.9988C77.9653 55.3258 78.9393 55.3334 79.317 56.0124L91.4726 77.8626C91.8434 78.5291 91.3614 79.3487 90.5987 79.3487H65.8352C65.0655 79.3487 64.5843 78.5156 64.969 77.849L77.577 55.9988Z"
                                    stroke="#313131" stroke-width="2" />
                                <path d="M78.1865 63.6046V67.7907V71.9767" stroke="#313131" stroke-width="1.5"
                                    stroke-linecap="square" />
                                <path d="M67.9538 53.5691L67.9538 59.6156L62.3724 59.6155" stroke="#313131"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path d="M78.1865 73.8372V74.3927V74.9483" stroke="#313131" stroke-width="2" />
                                <path
                                    d="M75.0175 52.7327C74.2295 51.5032 73.1408 50.5057 71.8453 49.8264C70.5499 49.1472 69.0867 48.8067 67.5824 48.8344C66.078 48.862 64.5778 49.257 63.2113 49.9852C61.8449 50.7134 60.6534 51.7528 59.7398 53.0136C58.8263 54.2744 58.2183 55.7186 57.9682 57.2214C57.7182 58.7242 57.8338 60.2404 58.3049 61.6387C58.7761 63.037 59.5886 64.2755 60.6723 65.247C61.7559 66.2185 63.0781 66.8939 64.5245 67.2146"
                                    stroke="#313131" stroke-width="1.5" stroke-linecap="round" />
                                <defs>
                                    <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691"
                                        height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                        <div class="col titleMarginAuto">
                            <div class="pb-3">
                                <span class="secondGreyBorderDashSpan">Ablaufende Pendenzen</span>
                            </div>
                        </div>
                    </div>
                    <div class="overFlowDivDashboard customResponsiveHeight" style="margin-top: -1.5rem;">

                        @if ($pendinggg->count() == 0)
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center customResponsiveMargin"
                                style="color: #9F9F9F;">
                                keine ablaufenden Penden
                            </div>
                        @else
                            <div class="row g-0 ps-2">
                                <div class="col-4 ps-1">
                                    <div class="row g-0 justify-content-start">

                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Berater</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row g-0 justify-content-start">

                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Kunde</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="row g-0 justify-content-start">
                                        <div class="col-auto">
                                            <span class="anfragenTitleSpans fs-6">Aufgabe</span>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            @foreach ($pendinggg as $pending)
                                <div class="modal fade" style="top: 1% !important;" id="pen{{ $pending->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content p-3" style="border-radius: 23px !important;">
                                            <div class="modal-header" style="border-bottom: 0 !important;">
                                                <span class="modal-title mx-2 fs-5" id="exampleModalLabel"
                                                    style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343">Ablaufende
                                                    Pendenzen</span>

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
                                                                <input
                                                                    onclick="window.location.href='{{ route('accepttask', $pending->id) }}'"
                                                                    type="button"
                                                                    style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #219653; font-weight: 600 !important; font-size: 16px !important; background-color: #219653; color: #fff; border-radius: 8px;"
                                                                    class="btn py-1" value="Pendenz abgeschlossen">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="modal-body">
                                                <div class="modal-footer px-1 text-center"
                                                     style="border-top: 0 !important; justify-content: flex-start !important;">
                                                    <div class="row" style="width: 100%;">
                                                        <div class="col-md-4 col-5 p-0">
                                                            <div style="padding: 2%;">
                                                                <a href="{{route('rejecttask',$pending->id)}}">
                                                                <button type="button" class="btn py-2"
                                                                        data-bs-dismiss="modal"
                                                                        style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #6C757D; font-size: 18px !important; background-color: #6C757D; color: #fff; border-radius: 8px;">
                                                                    Ablehnen
                                                                </button>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-5 p-0">
                                                            <div style="padding: 2%;">
                                                                <a href="{{route('accepttask',$pending->id)}}">
                                                                <input type="submit"
                                                                       style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #4EC590; font-weight: 600 !important; font-size: 18px !important; background-color: #4EC590; color: #fff; border-radius: 8px;"
                                                                       class="btn py-2" value="Akzeptieren">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="thirdBorderDivDash py-2 my-2 ps-1">
                                    <div class="row g-0 text-start ps-3 ps-2">
                                        <div class="col-4">
                                            <div data-bs-toggle="modal" data-bs-target="#pen{{ $pending->id }}">
                                                <span
                                                    class="anfragenFieldsSpan fs-6">{{ ucfirst($pending->adminpend->name) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div data-bs-toggle="modal" data-bs-target="#pen{{ $pending->id }}">
                                                <span class="anfragenFieldsSpan fs-6">{{ $pending->family->first_name }}
                                                    {{ $pending->family->last_name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div data-bs-toggle="modal" data-bs-target="#pen{{ $pending->id }}">
                                                <span class="anfragenFieldsSpan fs-6">{{ $pending->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6 d-flex flex-column">
                <div class="secondGreyBorderDash p-3 p-md-4 h-100">
                    <div class="row g-0">
                        <div class="col-auto cornerSvgToDoList">
                            <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_376_953)">
                                    <path
                                        d="M37.0423 77.3271C39.8362 81.9774 47.7843 86.5471 52.0268 89.8453C56.2692 93.1435 50.752 102.5 55.797 103.944C60.8421 105.388 76.3506 98.8915 81.4301 98.2616C86.5097 97.6317 91.3583 95.9651 95.6991 93.3571C100.04 90.7491 103.788 87.2506 106.729 83.0615C109.67 78.8725 111.747 74.0747 112.841 68.9424C113.934 63.81 114.024 58.4434 113.104 53.1491C112.184 47.8547 111.334 38.8294 110.492 33.8527L80.9468 34.3263L63.3665 34.608C58.8425 34.6805 54.4031 35.8453 50.4263 38.0032L47.8194 39.4178C43.6759 41.6661 40.4617 45.3082 38.746 49.6991C37.881 51.9128 37.4183 54.2631 37.3795 56.6394L37.0423 77.3271Z"
                                        fill="#DCE4F9" />
                                </g>
                                <path
                                    d="M73.8613 61C72.4769 61 71.1235 60.5895 69.9723 59.8203C68.8212 59.0511 67.924 57.9579 67.3942 56.6788C66.8644 55.3997 66.7257 53.9922 66.9958 52.6344C67.2659 51.2765 67.9326 50.0292 68.9116 49.0503C69.8906 48.0713 71.1378 47.4046 72.4957 47.1345C73.8536 46.8644 75.261 47.003 76.5401 47.5328C77.8192 48.0627 78.9124 48.9599 79.6816 50.111C80.4508 51.2622 80.8613 52.6155 80.8613 54C80.8613 55.8565 80.1238 57.637 78.8111 58.9498C77.4983 60.2625 75.7178 61 73.8613 61ZM73.8613 49.08C72.8724 49.08 71.9057 49.3732 71.0835 49.9227C70.2612 50.4721 69.6204 51.253 69.2419 52.1666C68.8635 53.0802 68.7645 54.0856 68.9574 55.0555C69.1503 56.0254 69.6265 56.9163 70.3258 57.6155C71.0251 58.3148 71.916 58.791 72.8859 58.9839C73.8558 59.1769 74.8611 59.0778 75.7747 58.6994C76.6884 58.321 77.4693 57.6801 78.0187 56.8579C78.5681 56.0356 78.8613 55.0689 78.8613 54.08C78.8613 53.4234 78.732 52.7732 78.4807 52.1666C78.2295 51.56 77.8612 51.0088 77.3969 50.5445C76.9326 50.0802 76.3814 49.7119 75.7747 49.4606C75.1681 49.2093 74.5179 49.08 73.8613 49.08Z"
                                    fill="black" />
                                <path
                                    d="M79.431 62.21C74.0194 60.9923 68.358 61.5788 63.311 63.88C62.6169 64.2115 62.0313 64.7335 61.6223 65.385C61.2133 66.0365 60.9979 66.7908 61.001 67.56V73.51C61.001 73.7752 61.1064 74.0295 61.2939 74.2171C61.4814 74.4046 61.7358 74.51 62.001 74.51C62.2662 74.51 62.5206 74.4046 62.7081 74.2171C62.8957 74.0295 63.001 73.7752 63.001 73.51V67.56C62.9923 67.1707 63.0974 66.7873 63.3035 66.4569C63.5095 66.1265 63.8076 65.8634 64.161 65.7C67.2013 64.2962 70.5123 63.5759 73.861 63.59C75.7373 63.5876 77.6072 63.8091 79.431 64.25V62.21Z"
                                    fill="black" />
                                <path d="M85.7113 71.72H79.5713V73.12H85.7113V71.72Z" fill="black" />
                                <path
                                    d="M90.6007 65.78H85.4307V67.78H89.6007V76.15H75.4307V67.78H81.7307V68.2C81.7307 68.4652 81.836 68.7196 82.0236 68.9071C82.2111 69.0946 82.4654 69.2 82.7307 69.2C82.9959 69.2 83.2502 69.0946 83.4378 68.9071C83.6253 68.7196 83.7307 68.4652 83.7307 68.2V64.31C83.7307 64.0448 83.6253 63.7904 83.4378 63.6029C83.2502 63.4154 82.9959 63.31 82.7307 63.31C82.4654 63.31 82.2111 63.4154 82.0236 63.6029C81.836 63.7904 81.7307 64.0448 81.7307 64.31V65.78H74.4307C74.1654 65.78 73.9111 65.8854 73.7236 66.0729C73.536 66.2604 73.4307 66.5148 73.4307 66.78V77.15C73.4307 77.4152 73.536 77.6696 73.7236 77.8571C73.9111 78.0446 74.1654 78.15 74.4307 78.15H90.6007C90.8659 78.15 91.1202 78.0446 91.3078 77.8571C91.4953 77.6696 91.6007 77.4152 91.6007 77.15V66.78C91.6007 66.5148 91.4953 66.2604 91.3078 66.0729C91.1202 65.8854 90.8659 65.78 90.6007 65.78Z"
                                    fill="black" />
                                <defs>
                                    <filter id="filter0_d_376_953" x="0.0419922" y="0.852722" width="150.691"
                                        height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="18.5" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_376_953" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_376_953"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        <div class="col titleMarginAuto">
                            <div class="pb-3">
                                <span class="secondGreyBorderDashSpan">Mitarbeiteranfragen</span>
                            </div>
                        </div>
                    </div>

                    <div class="overFlowDivDashboard" style="margin-top: -1.2rem">
                        @if ($absences->count() == 0)
                            <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                style="color: #9F9F9F">
                                Keine Mitarbeiteranfragen
                            </div>
                        @else
                            @foreach ($absences as $appointmentAGG)
                                <div class="thirdBorderDivDash py-2 mb-2"
                                    onclick="window.location.href='{{ route('hr_view') }}'" style="cursor: pointer">
                                    <div class="row g-0 ps-2 pb-2">
                                        <div class="col-auto my-auto ms-1 me-2">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.49158 12.7802L9.15599 17.4404L9.99333 14.6742L9.58321 14.2462C9.39865 13.9891 9.35764 13.7646 9.46017 13.571C9.68232 13.1528 10.142 13.2309 10.5709 13.2309C11.0203 13.2309 11.5774 13.1495 11.7176 13.6865C11.7654 13.8655 11.7056 14.0542 11.574 14.2462L11.1639 14.6742L12.0012 17.4404L13.5084 12.7802C14.5952 13.7109 17.813 13.898 19.0109 14.5342C19.3903 14.736 19.732 14.9915 20.0072 15.3364C20.4241 15.862 20.6804 16.5471 20.7505 17.4176L21 18.9357C20.9385 19.5508 20.5728 19.9055 19.8499 19.9592H10.5778H1.15005C0.427211 19.9072 0.0615184 19.5524 0 18.9357L0.249491 17.4176C0.319554 16.5471 0.575881 15.862 0.992839 15.3364C1.26796 14.9899 1.60973 14.7344 1.9891 14.5342C3.187 13.898 6.40475 13.7109 7.49158 12.7802ZM6.73798 6.11039C6.53121 6.11853 6.3757 6.15921 6.26975 6.22755C6.20823 6.2666 6.16381 6.31704 6.13476 6.37562C6.10229 6.44071 6.08862 6.52044 6.09032 6.61319C6.09887 6.8833 6.24754 7.23477 6.53292 7.63993L6.53633 7.64644L7.46595 9.05557C7.83847 9.6202 8.2298 10.1962 8.71511 10.6193C9.18163 11.0261 9.74896 11.3011 10.4991 11.3027C11.3108 11.3043 11.9055 11.0179 12.3857 10.5884C12.8864 10.1409 13.2829 9.52908 13.6725 8.91726L14.72 7.27382C14.9148 6.84913 14.9866 6.566 14.9421 6.3984C14.9148 6.29914 14.8003 6.25033 14.6055 6.24219C14.5645 6.24057 14.5218 6.24057 14.4773 6.24057C14.4312 6.24219 14.3816 6.24545 14.3304 6.2487C14.303 6.25033 14.2757 6.2487 14.2501 6.24382C14.1561 6.2487 14.0604 6.24219 13.963 6.22918L14.3218 4.71753C12.4062 4.69475 11.0955 4.37746 9.54561 3.4337C9.03637 3.12454 8.88258 2.76981 8.37334 2.80398C7.98885 2.87395 7.66588 3.0383 7.40784 3.3019C7.16177 3.55411 6.97551 3.89907 6.85418 4.34003L7.05753 6.12178C6.94475 6.12829 6.83709 6.12504 6.73798 6.11039ZM14.9644 5.79309C15.2224 5.86794 15.3882 6.02415 15.4548 6.27636C15.53 6.55624 15.448 6.94838 15.2002 7.48535C15.1951 7.49511 15.1899 7.50488 15.1848 7.51464L14.1253 9.17761C13.7169 9.81871 13.3017 10.4598 12.748 10.9545C12.1755 11.4654 11.4681 11.8055 10.5026 11.8039C9.60029 11.8022 8.92188 11.4735 8.3648 10.9886C7.82651 10.52 7.41468 9.91471 7.02335 9.32242L6.09374 7.91492C5.75368 7.43165 5.57767 6.99069 5.56571 6.62783C5.56058 6.45698 5.59134 6.3024 5.65628 6.16734C5.72634 6.02415 5.83229 5.90537 5.97583 5.81425C6.04248 5.77194 6.11767 5.73452 6.2014 5.70523C6.14159 4.94208 6.11767 3.9788 6.15697 3.17335C6.17748 2.98297 6.21507 2.79097 6.27146 2.59896C6.50899 1.79026 7.10538 1.13939 7.8436 0.691917C8.10334 0.534081 8.38872 0.403908 8.68948 0.299769C10.4752 -0.318556 12.8437 0.0182683 14.1116 1.32326C14.6277 1.85534 14.9524 2.56153 15.0225 3.4939L14.9644 5.79309Z"
                                                    fill="black" />
                                            </svg>

                                        </div>

                                        <div class="col-auto my-auto ms-1">
                                            <span class=" fs-6">{{ ucfirst($appointmentAGG->admin->name) }}</span>
                                        </div>
                                    </div>
                                    <div class="row g-0 ps-2 pb-2">
                                        <div class="col-auto my-auto ms-1 me-2">
                                            <svg width="21" height="21" viewBox="0 0 18 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.2927 0.00655353C10.2768 0.00514167 10.263 0.00714181 10.2479 0.00694572C10.2469 0.00694572 10.2457 0.00655353 10.2447 0.00655353C5.75927 -0.148712 1.04486 2.45798 1.45253 7.50155C1.45414 7.52198 1.4592 7.54006 1.46289 7.55912C1.457 7.61128 1.457 7.66595 1.46967 7.72529C1.71561 8.87627 1.33813 9.88815 0.393244 10.5938C0.349829 10.6262 0.316572 10.6631 0.287904 10.7015C0.192407 10.7644 0.11695 10.8606 0.0763986 10.9771C-0.100633 11.4857 0.0338073 12.0035 0.440149 12.3572C0.507252 12.4155 0.585022 12.4552 0.665577 12.4765C0.927948 12.6215 1.20228 12.7178 1.48716 12.7852C1.42861 13.101 1.4574 13.4205 1.60956 13.7212C1.32547 14.2748 1.51407 14.8856 2.07489 15.219C2.10654 15.2377 2.13811 15.252 2.16905 15.263C2.26436 15.3763 2.27353 15.5583 2.23847 15.7334C2.22761 15.7869 2.22623 15.8403 2.23031 15.8925C2.22784 15.9401 2.22933 15.9883 2.23847 16.0367C2.38652 16.8124 3.04861 17.2405 3.80666 17.2543C3.84741 17.2551 3.88514 17.2509 3.92067 17.2437C3.95573 17.2453 3.99248 17.2431 4.0304 17.2372C5.24762 17.0398 6.63352 17.1499 7.09077 18.487C7.18207 18.7541 7.42644 18.8447 7.6452 18.8095C7.71889 18.8646 7.81596 18.8963 7.93848 18.8877C10.1444 18.7335 12.3306 18.4131 14.5207 18.119C14.5982 18.1086 14.6653 18.0835 14.723 18.0483C14.9887 17.9654 15.2032 17.6681 15.0315 17.3481C13.568 14.6197 16.5349 11.6432 17.0977 9.0222C17.1099 8.96557 17.11 8.91306 17.1052 8.86305C17.7005 4.55801 14.7216 0.405444 10.2927 0.00655353ZM16.1712 8.67088C16.1653 8.71073 16.1645 8.74885 16.1669 8.78548C15.5553 11.59 12.8733 14.3012 13.9352 17.2376C11.9408 17.5083 9.9474 17.7865 7.93852 17.9271C7.92408 17.9281 7.91181 17.9319 7.8982 17.9341C7.18015 16.3359 5.50941 16.0493 3.85635 16.2995C3.83984 16.2977 3.8245 16.294 3.80674 16.2935C3.61857 16.2901 3.52036 16.2706 3.37341 16.1808C3.38624 16.1849 3.29792 16.1145 3.29894 16.1156C3.28631 16.1029 3.27843 16.0953 3.27266 16.0903C3.27266 16.0865 3.2676 16.0752 3.24905 16.0451C3.22109 16.0003 3.20046 15.9372 3.18332 15.8659C3.26854 15.2772 3.10139 14.7658 2.6081 14.3894C2.56845 14.3594 2.52406 14.3425 2.47817 14.3313C2.46394 14.3193 2.45009 14.3078 2.43515 14.2927C2.43782 14.2939 2.43535 14.2879 2.42676 14.2741C2.42676 14.2618 2.42597 14.258 2.42456 14.2592C2.43045 14.2337 2.43613 14.2082 2.44507 14.1835C2.44527 14.1825 2.51688 14.0714 2.54057 14.0379C2.60697 13.9445 2.62054 13.8312 2.59952 13.7223C2.61924 13.6145 2.6052 13.5024 2.54057 13.4088C2.35883 13.1455 2.3948 12.9215 2.54057 12.6447C2.74957 12.2484 2.37326 11.887 2.03952 11.9238C2.03603 11.9233 2.03297 11.9224 2.02955 11.9218C1.69122 11.8771 1.3641 11.7782 1.07086 11.6029C1.04984 11.5906 1.02925 11.5828 1.00862 11.5736C0.993992 11.5523 0.980344 11.5306 0.968108 11.5079C0.966029 11.5019 0.964421 11.4966 0.961558 11.4878C0.959166 11.4766 0.95748 11.4693 0.955872 11.4621C0.955087 11.44 0.95548 11.4183 0.956695 11.3962C0.958303 11.3902 0.961362 11.3764 0.96548 11.355C2.18576 10.4016 2.70992 9.09099 2.41299 7.55916C2.41339 7.53994 2.41558 7.52202 2.41397 7.50159C2.04701 2.96802 6.26483 0.829631 10.2445 0.967444C10.2573 0.967836 10.2682 0.96564 10.2806 0.965248C10.2848 0.96564 10.2881 0.967013 10.2928 0.967444C14.071 1.30778 16.7093 4.99267 16.1712 8.67088Z"
                                                    fill="#323232" />
                                                <path
                                                    d="M9.27769 10.8237C8.19259 10.8237 8.19259 12.5063 9.27769 12.5063C10.3629 12.5064 10.3629 10.8237 9.27769 10.8237Z"
                                                    fill="#323232" />
                                                <path
                                                    d="M5.76792 3.46031C5.40475 3.73865 5.2125 4.17836 5.46613 4.61133C5.67622 4.96979 6.25226 5.19294 6.61731 4.91312C7.72837 4.06145 9.37334 3.7652 10.5483 4.68142C10.7883 4.86861 10.9078 5.00873 11.0357 5.24373C11.0813 5.32727 11.0841 5.44496 11.0708 5.52732C11.0655 5.50332 10.9729 5.72208 11.0206 5.66196C10.9256 5.78204 10.8122 5.87268 10.6856 5.95519C10.2554 6.23639 9.73643 6.35491 9.24075 6.46036C9.12325 6.48527 9.02728 6.52966 8.94543 6.58453C8.61811 6.66877 8.34261 6.92679 8.34261 7.36517V8.76739C8.34261 9.85237 10.0254 9.85237 10.0254 8.76739V8.00463C11.0102 7.75787 12.0637 7.3105 12.5409 6.37318C13.0057 5.45986 12.6737 4.4936 12.0345 3.76908C10.4756 2.00166 7.52463 2.11379 5.76792 3.46031Z"
                                                    fill="#323232" />
                                            </svg>
                                        </div>
                                        <div class="col-auto my-auto ms-1">
                                            <span class="fs-6">{{ $appointmentAGG->description }}</span>
                                        </div>
                                    </div>
                                    <div class="row g-0 ps-2">
                                        <div class="col-auto my-auto ms-1 me-2">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.90022 0C4.53135 0 4.23785 0.298624 4.23785 0.664603V5.02064C4.23785 5.38662 4.53135 5.67802 4.90022 5.67802H5.25845C5.62732 5.67802 5.92758 5.38662 5.92758 5.02064V0.664603C5.92758 0.298624 5.62732 0 5.25845 0H4.90022ZM15.7416 0C15.3727 0 15.0724 0.298624 15.0724 0.664603V5.02064C15.0724 5.38662 15.3727 5.67802 15.7416 5.67802H16.093C16.4619 5.67802 16.7621 5.38662 16.7621 5.02064V0.664603C16.7621 0.298624 16.4619 0 16.093 0H15.7416ZM2.1561 3.17854C0.96303 3.17854 0 4.18612 0 5.43963V18.7317C0 19.9852 0.96303 21 2.1561 21H18.8439C20.037 21 21 19.9852 21 18.7317V5.43963C21 4.18612 20.037 3.17854 18.8439 3.17854H17.2082V5.38906C17.2082 5.94895 16.752 6.40041 16.1876 6.40041H15.6469C15.0826 6.40041 14.6263 5.94895 14.6263 5.38906V3.17854H6.37367V5.38906C6.37367 5.94895 5.91739 6.40041 5.35307 6.40041H4.8056C4.24128 6.40041 3.79176 5.94895 3.79176 5.38906V3.17854H2.1561ZM1.35179 9.48504H19.6415V17.8648C19.6415 18.7086 19.0115 19.3818 18.2221 19.3818H2.77792C1.98846 19.3818 1.35179 18.7086 1.35179 17.8648V9.48504Z"
                                                    fill="black" />
                                            </svg>
                                        </div>
                                        <div class="col-auto my-auto ms-1">
                                            <span class="fs-6">{{ $appointmentAGG->from }} -
                                                {{ $appointmentAGG->to }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            @if (!in_array('backoffice', $urole))
                <div class="col-12 col-xl-6 d-flex flex-column">
                    <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                        <div class="row g-0">
                            <div class="col-auto cornerSvgToDoList">
                                <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_28_428)">
                                        <path
                                            d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                            fill="#DCE4F9" />
                                    </g>
                                    <path
                                        d="M91.4577 53.2988C91.4324 52.9085 91.2234 52.6573 90.9683 52.5402C90.8628 52.4723 90.7373 52.4292 90.5861 52.4292C90.1849 52.4288 89.7833 52.4245 89.3821 52.4233C89.3396 51.7595 89.2378 51.1016 89.0973 50.4542C88.9977 49.9968 88.6693 49.8229 88.3475 49.8582C88.2974 49.8462 88.245 49.8381 88.1879 49.8369C83.4446 49.7329 78.7016 49.6445 73.9589 49.8305C73.8192 49.4228 73.6777 49.0431 73.5354 48.7573C73.4252 48.536 73.2707 48.4135 73.1047 48.3617C72.9906 48.2733 72.8483 48.2177 72.6733 48.2177C69.3853 48.2177 64.1612 48.2076 60.8743 48.1323C60.7562 48.0501 60.6193 48 60.4728 48H59.1168C58.7448 48 58.4282 48.307 58.3573 48.7039C58.2998 48.8132 58.258 48.9392 58.2451 49.0876C57.6158 56.4745 58.4042 66.8846 58.3419 74.2815C58.337 74.8725 58.764 75.1484 59.1711 75.1167C59.2158 75.1315 59.2606 75.1447 59.3106 75.1512C69.0507 76.432 80.7978 76.5718 90.5868 76.9992C91.0298 77.0185 91.2746 76.6869 91.3244 76.3087C91.4086 76.178 91.4598 76.0103 91.458 75.8032C91.3878 69.0238 91.9007 60.0717 91.4577 53.2988ZM87.7695 51.5099C87.82 51.81 87.8592 52.1108 87.8819 52.4152C83.5083 52.3866 79.1351 52.3075 74.7623 52.22C74.6788 52.014 74.5913 51.7633 74.5018 51.4934C78.9235 51.3394 83.3464 51.4139 87.7695 51.5099ZM89.9081 75.2317C80.5394 74.8347 69.2168 74.6678 59.8931 73.4848C59.8965 66.6046 59.2412 56.7122 59.7395 49.8413C59.7582 49.8432 59.7751 49.8485 59.7947 49.8489C63.3371 49.9465 68.8169 49.9568 72.3606 49.9577C72.7587 50.7438 73.1688 52.3672 73.4755 53.2044C73.5361 53.3698 73.623 53.516 73.7322 53.627C73.8567 53.8141 74.0505 53.9466 74.3194 53.9515C79.5321 54.0559 84.7442 54.154 89.9584 54.1659C90.2962 60.4594 89.8723 68.9317 89.9081 75.2317Z"
                                        fill="#323232" />
                                    <path
                                        d="M80.4295 61.695C80.2891 61.5867 80.1155 61.5277 79.9138 61.5205L79.7781 61.5159C79.5594 61.5082 79.5594 61.5082 79.5094 59.895C79.4927 59.3643 79.4723 58.704 79.4577 58.6048C79.3053 57.5586 78.8633 56.1564 77.6281 55.418C77.0286 55.0591 76.2742 54.8848 75.3236 54.8848C74.8062 54.8848 74.2938 54.9316 73.6835 55.0021C72.3667 55.1539 71.4399 55.3335 70.5876 56.3982C69.6965 57.5111 69.197 58.8421 69.1433 60.2472C69.1137 61.0112 69.0486 61.3751 68.7551 61.3785L68.5541 61.382C68.3058 61.3897 68.1011 61.4749 67.9475 61.6357C67.713 61.8817 67.6796 62.2441 67.6667 62.3799C67.6667 62.3837 67.6617 62.4282 67.6613 62.4316C67.6552 62.4719 67.6523 62.5124 67.6523 62.5557V70.6002C67.6523 70.7365 67.6765 70.8606 67.724 70.9698C68.186 72.0233 68.9896 72.075 70.1025 72.1458L70.3304 72.1608C71.4375 72.2367 72.5451 72.3003 73.6534 72.3574C74.7596 72.4144 75.8665 72.4649 76.9733 72.5128C77.2524 72.5253 77.5166 72.5478 77.7674 72.5703C78.9159 72.6694 79.7195 72.7673 80.4255 71.5234C80.4896 71.4097 80.5293 71.2792 80.5413 71.1368C80.7962 68.2578 80.8175 65.3189 80.818 62.5557C80.818 62.4857 80.8112 62.4195 80.7996 62.357C80.7749 62.234 80.6616 61.8745 80.4295 61.695ZM71.7969 57.7808C72.139 57.2909 72.9206 56.9079 73.4482 56.8338C74.2414 56.7219 75.0653 56.6623 75.8973 56.6559C75.9077 56.6547 75.9365 56.6516 75.9468 56.6516C76.0293 56.6516 76.3733 56.719 76.692 56.9246C76.9857 57.1146 77.2311 57.4118 77.2523 57.5197C77.7464 58.6993 77.8868 59.8613 77.6744 61.0502C77.6697 61.0779 77.6665 61.106 77.6644 61.1337C77.6494 61.3498 77.4444 61.4126 76.7521 61.4126C76.6775 61.4126 76.5997 61.4113 76.5192 61.4092C74.8763 61.364 73.4287 61.3401 72.0943 61.3372C71.7659 61.3368 71.4501 61.1988 71.2279 60.9592C71.0275 60.7429 70.9288 60.4687 70.9498 60.1867C71.0162 59.3007 71.3011 58.4911 71.7969 57.7808ZM78.8536 69.6657C78.8153 70.2731 78.3058 70.7497 77.6935 70.7497C77.6905 70.7497 77.6473 70.7489 77.6442 70.7489C74.7786 70.6288 72.5953 70.5147 70.5649 70.3798C69.9467 70.3381 69.4442 69.7999 69.4442 69.1796V64.2932C69.4442 63.6655 69.9532 63.1493 70.5789 63.143C71.0225 63.138 71.4662 63.1354 71.9094 63.1354C73.6634 63.1354 75.5642 63.1701 77.8925 63.2446C78.5173 63.2655 79.0219 63.7898 79.0177 64.4144C79.002 66.4714 78.9499 68.1402 78.8536 69.6657Z"
                                        fill="#323232" />
                                    <path
                                        d="M74.4626 64.5029C72.7784 64.5029 72.5674 66.7875 73.8296 67.3598C73.8219 67.4015 73.8195 67.4448 73.8228 67.489C73.8619 67.9897 73.8338 68.4787 73.7393 68.9719C73.673 69.3135 73.8305 69.6609 74.1861 69.7585C74.5018 69.8459 74.9067 69.6547 74.973 69.3119C75.0896 68.7079 75.1508 68.1031 75.1025 67.4885C75.0992 67.4456 75.093 67.4044 75.083 67.3639C76.3585 66.8017 76.1523 64.5029 74.4626 64.5029Z"
                                        fill="#323232" />
                                    <defs>
                                        <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691"
                                            height="144.3" filterUnits="userSpaceOnUse"
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
                            <div class="col titleMarginAuto">
                                <div class="pb-3">
                                    <span class="secondGreyBorderDashSpan">Private Termine</span>
                                </div>
                            </div>
                        </div>

                        <div class="overFlowDivDashboard" style="margin-top: -1.2rem;">
                            @if ($personalApp->count() == 0)
                                <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                    style="color: #9F9F9F">
                                    keine privaten Termine
                                </div>
                            @else
                                @foreach ($personalApp as $perApp)
                                    <div class="thirdBorderDivDash py-2 mb-2">
                                        <div class="row g-0 ps-2 pb-2">
                                            <div class="col-auto my-auto ms-1 me-2">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.49158 12.7802L9.15599 17.4404L9.99333 14.6742L9.58321 14.2462C9.39865 13.9891 9.35764 13.7646 9.46017 13.571C9.68232 13.1528 10.142 13.2309 10.5709 13.2309C11.0203 13.2309 11.5774 13.1495 11.7176 13.6865C11.7654 13.8655 11.7056 14.0542 11.574 14.2462L11.1639 14.6742L12.0012 17.4404L13.5084 12.7802C14.5952 13.7109 17.813 13.898 19.0109 14.5342C19.3903 14.736 19.732 14.9915 20.0072 15.3364C20.4241 15.862 20.6804 16.5471 20.7505 17.4176L21 18.9357C20.9385 19.5508 20.5728 19.9055 19.8499 19.9592H10.5778H1.15005C0.427211 19.9072 0.0615184 19.5524 0 18.9357L0.249491 17.4176C0.319554 16.5471 0.575881 15.862 0.992839 15.3364C1.26796 14.9899 1.60973 14.7344 1.9891 14.5342C3.187 13.898 6.40475 13.7109 7.49158 12.7802ZM6.73798 6.11039C6.53121 6.11853 6.3757 6.15921 6.26975 6.22755C6.20823 6.2666 6.16381 6.31704 6.13476 6.37562C6.10229 6.44071 6.08862 6.52044 6.09032 6.61319C6.09887 6.8833 6.24754 7.23477 6.53292 7.63993L6.53633 7.64644L7.46595 9.05557C7.83847 9.6202 8.2298 10.1962 8.71511 10.6193C9.18163 11.0261 9.74896 11.3011 10.4991 11.3027C11.3108 11.3043 11.9055 11.0179 12.3857 10.5884C12.8864 10.1409 13.2829 9.52908 13.6725 8.91726L14.72 7.27382C14.9148 6.84913 14.9866 6.566 14.9421 6.3984C14.9148 6.29914 14.8003 6.25033 14.6055 6.24219C14.5645 6.24057 14.5218 6.24057 14.4773 6.24057C14.4312 6.24219 14.3816 6.24545 14.3304 6.2487C14.303 6.25033 14.2757 6.2487 14.2501 6.24382C14.1561 6.2487 14.0604 6.24219 13.963 6.22918L14.3218 4.71753C12.4062 4.69475 11.0955 4.37746 9.54561 3.4337C9.03637 3.12454 8.88258 2.76981 8.37334 2.80398C7.98885 2.87395 7.66588 3.0383 7.40784 3.3019C7.16177 3.55411 6.97551 3.89907 6.85418 4.34003L7.05753 6.12178C6.94475 6.12829 6.83709 6.12504 6.73798 6.11039ZM14.9644 5.79309C15.2224 5.86794 15.3882 6.02415 15.4548 6.27636C15.53 6.55624 15.448 6.94838 15.2002 7.48535C15.1951 7.49511 15.1899 7.50488 15.1848 7.51464L14.1253 9.17761C13.7169 9.81871 13.3017 10.4598 12.748 10.9545C12.1755 11.4654 11.4681 11.8055 10.5026 11.8039C9.60029 11.8022 8.92188 11.4735 8.3648 10.9886C7.82651 10.52 7.41468 9.91471 7.02335 9.32242L6.09374 7.91492C5.75368 7.43165 5.57767 6.99069 5.56571 6.62783C5.56058 6.45698 5.59134 6.3024 5.65628 6.16734C5.72634 6.02415 5.83229 5.90537 5.97583 5.81425C6.04248 5.77194 6.11767 5.73452 6.2014 5.70523C6.14159 4.94208 6.11767 3.9788 6.15697 3.17335C6.17748 2.98297 6.21507 2.79097 6.27146 2.59896C6.50899 1.79026 7.10538 1.13939 7.8436 0.691917C8.10334 0.534081 8.38872 0.403908 8.68948 0.299769C10.4752 -0.318556 12.8437 0.0182683 14.1116 1.32326C14.6277 1.85534 14.9524 2.56153 15.0225 3.4939L14.9644 5.79309Z"
                                                        fill="black" />
                                                </svg>

                                            </div>

                                            <div class="col-auto my-auto ms-1">
                                                <span class=" fs-6">{{ $perApp->title }}</span>
                                            </div>
                                        </div>
                                        <div class="row g-0 ps-2 pb-2">
                                            <div class="col-auto my-auto ms-1 me-2">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.49984 0C4.12911 0 0.573242 3.55586 0.573242 7.92654C0.573242 9.73327 1.84383 12.4104 4.34976 15.8833C6.17913 18.4187 8.03511 20.4842 8.05361 20.5048L8.49978 21L8.94595 20.5048C8.96451 20.4843 10.8204 18.4188 12.6498 15.8833C15.1557 12.4103 16.4263 9.73327 16.4263 7.92654C16.4264 3.55586 12.8705 0 8.49984 0ZM8.49978 19.1956C6.27414 16.6316 1.77447 10.8446 1.77447 7.92654C1.77441 4.21819 4.79143 1.20116 8.49984 1.20116C12.2083 1.20116 15.2252 4.21819 15.2252 7.92654C15.2252 10.8429 10.7254 16.631 8.49978 19.1956Z"
                                                        fill="#323232" />
                                                    <path
                                                        d="M8.50028 10.9112C10.1487 10.9112 11.4849 9.57492 11.4849 7.92654C11.4849 6.27817 10.1487 4.94189 8.50028 4.94189C6.8519 4.94189 5.51562 6.27817 5.51562 7.92654C5.51562 9.57492 6.8519 10.9112 8.50028 10.9112Z"
                                                        fill="#323232" />
                                                </svg>


                                            </div>
                                            <div class="col-auto my-auto ms-1">
                                                <span class="fs-6"> {{ $perApp->address }}</span>
                                            </div>
                                        </div>
                                        <div class="row g-0 ps-2">
                                            <div class="col-auto my-auto ms-1 me-2">
                                                <svg width="21" height="21" viewBox="0 0 23 23" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.7889 0.762314C12.7895 0.354591 13.1922 0.0204328 13.6954 0.0212139C14.1968 0.0219922 14.6003 0.353661 14.5997 0.765125L14.5946 4.01008C14.594 4.41781 14.1913 4.75196 13.6881 4.75118C13.1867 4.7504 12.7832 4.41874 12.7838 4.00727L12.7889 0.762314ZM2.47762 10.5074C2.42711 10.5073 2.3807 10.2828 2.38113 10.006C2.38156 9.72919 2.42306 9.50669 2.47917 9.50678L4.94844 9.51061C4.99895 9.51069 5.04537 9.7352 5.04494 10.0101C5.04451 10.2869 5.00301 10.5113 4.94689 10.5112L2.47762 10.5074ZM6.41348 10.5135C6.36297 10.5134 6.31656 10.2889 6.31699 10.0121C6.31741 9.7353 6.35891 9.5128 6.41503 9.51289L8.8843 9.51672C8.93481 9.5168 8.98123 9.74131 8.9808 10.0162C8.98037 10.293 8.93887 10.5174 8.88275 10.5173L6.41348 10.5135ZM10.3493 10.5196C10.2988 10.5195 10.2524 10.295 10.2528 10.0182C10.2533 9.74141 10.2929 9.51891 10.3509 9.519L12.8202 9.52283C12.8707 9.52291 12.9171 9.74555 12.9167 10.0205C12.6695 10.1735 12.4317 10.3414 12.2032 10.5225L10.3493 10.5196ZM2.47877 13.3802C2.42827 13.3801 2.38185 13.1556 2.38228 12.8788C2.38271 12.602 2.42421 12.3776 2.48033 12.3777L4.9496 12.3815C5.0001 12.3816 5.04652 12.6061 5.04609 12.8829C5.04566 13.1597 5.00416 13.3841 4.94804 13.384L2.47877 13.3802ZM6.41463 13.3863C6.36413 13.3862 6.31771 13.1617 6.31814 12.8849C6.31857 12.6081 6.36007 12.3837 6.41619 12.3838L8.88546 12.3876C8.93596 12.3877 8.98238 12.6122 8.98195 12.889C8.98152 13.1658 8.94002 13.3902 8.8839 13.3901L6.41463 13.3863ZM2.47993 16.2529C2.42942 16.2529 2.383 16.0284 2.38343 15.7516C2.38386 15.4747 2.42536 15.2504 2.48148 15.2505L4.95075 15.2543C5.00126 15.2544 5.04767 15.4789 5.04724 15.7557C5.04681 16.0325 5.00531 16.2569 4.94919 16.2568L2.47993 16.2529ZM6.41579 16.259C6.36528 16.259 6.31886 16.0345 6.31929 15.7577C6.31972 15.4809 6.36122 15.2565 6.41734 15.2566L8.88661 15.2604C8.93712 15.2605 8.98353 15.485 8.9831 15.7618C8.98267 16.0386 8.94117 16.263 8.88505 16.2629L6.41579 16.259ZM4.66086 0.749696C4.6615 0.340102 5.06608 0.00781765 5.56741 0.00859593C6.06875 0.00937421 6.4723 0.341043 6.47166 0.752507L6.46662 3.99746C6.46599 4.40519 6.06141 4.73934 5.56007 4.73856C5.05874 4.73779 4.65519 4.40612 4.65583 3.99465L4.66086 0.749696V0.749696ZM1.01632 7.09557L18.2488 7.12232L18.2546 3.38734C18.2548 3.25829 18.2026 3.14787 18.1223 3.06545C18.0401 2.98303 17.9223 2.93235 17.8007 2.93216L16.1489 2.92959C15.8721 2.92916 15.648 2.70438 15.6484 2.42758C15.6488 2.15077 15.8755 1.92669 16.1505 1.92712L17.8023 1.92968C18.2064 1.93031 18.569 2.09359 18.8342 2.35958C19.0995 2.62557 19.2616 2.98866 19.261 3.39265L19.2518 9.32334C18.9227 9.20874 18.5843 9.11657 18.2365 9.0487L18.2379 8.12291L18.2491 8.12293L1.01477 8.09617L0.99975 17.7693C0.99955 17.8984 1.04989 18.0088 1.13207 18.0912C1.21425 18.1736 1.33202 18.2243 1.45361 18.2245L9.64335 18.2372C9.73634 18.5852 9.85366 18.9239 9.99345 19.2515L1.46139 19.2382C1.0592 19.2376 0.694677 19.0743 0.429456 18.8083C0.164233 18.5442 0.00204885 18.1811 0.002676 17.7771L0.025053 3.36279C0.0256773 2.96067 0.18899 2.59622 0.455036 2.33105C0.721081 2.06588 1.08424 1.90373 1.4883 1.90436L3.25233 1.90709C3.52919 1.90752 3.75332 2.13231 3.75289 2.40911C3.75246 2.68591 3.52763 2.91 3.25078 2.90957L1.48675 2.90683C1.35767 2.90663 1.24722 2.95696 1.16479 3.03912C1.08235 3.12129 1.03166 3.23904 1.03147 3.36061L1.02567 7.09558L1.01632 7.09557ZM7.91432 2.91494C7.63747 2.91451 7.41334 2.68973 7.41377 2.41292C7.4142 2.13612 7.63902 1.91203 7.91588 1.91246L11.2793 1.91768C11.5562 1.91811 11.7803 2.1429 11.7799 2.4197C11.7794 2.6965 11.5546 2.92059 11.2778 2.92016L7.91432 2.91494Z"
                                                        fill="#393939" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.9599 10.1023C17.7643 10.1035 18.5341 10.2648 19.2352 10.5576C19.9667 10.8599 20.6198 11.3031 21.1679 11.853C21.7142 12.4009 22.1554 13.0592 22.4573 13.7878C22.7479 14.4917 22.9068 15.2601 22.9056 16.0645C22.9043 16.8689 22.743 17.6388 22.4503 18.3398C22.146 19.0694 21.7047 19.7245 21.1549 20.2726C20.605 20.8188 19.9486 21.26 19.22 21.562C18.5161 21.8526 17.7477 22.0115 16.9433 22.0102C16.1389 22.009 15.369 21.8477 14.668 21.5549C13.9384 21.2507 13.2834 20.8094 12.7352 20.2595C12.1871 19.7116 11.7478 19.0533 11.4458 18.3227C11.1553 17.6189 10.9963 16.8505 10.9976 16.0461C10.9988 15.2416 11.1602 14.4737 11.4529 13.7708C11.7571 13.0412 12.1985 12.3861 12.7483 11.838C13.2962 11.2918 13.9545 10.8505 14.6832 10.5486C15.387 10.2599 16.1535 10.101 16.9599 10.1023ZM16.3328 13.7421C16.3329 13.6487 16.3521 13.5592 16.3866 13.4753C16.4229 13.3896 16.4745 13.3134 16.5375 13.2487C16.6005 13.184 16.6788 13.1327 16.7646 13.0985C16.8485 13.0643 16.9381 13.0454 17.0315 13.0455C17.125 13.0457 17.2145 13.0649 17.2983 13.0993C17.386 13.1357 17.4621 13.1873 17.5249 13.2503C17.5877 13.3133 17.641 13.3915 17.6752 13.4773C17.7094 13.5594 17.7283 13.6509 17.7281 13.7443L17.7242 16.249L19.3013 17.0864C19.3146 17.094 19.3279 17.1036 19.3413 17.1112C19.4136 17.159 19.4726 17.2182 19.5202 17.2831C19.5715 17.3537 19.6076 17.4338 19.6285 17.5177C19.6493 17.6035 19.6549 17.695 19.6433 17.7846C19.6317 17.8722 19.603 17.958 19.5571 18.0361L19.5399 18.0646L19.5266 18.0818C19.4788 18.1503 19.4215 18.2093 19.3586 18.2531C19.2879 18.3044 19.2078 18.3405 19.1258 18.3614C19.04 18.3822 18.9485 18.3878 18.8589 18.3762C18.7713 18.3646 18.6855 18.3359 18.6075 18.29L16.6952 17.2634C16.64 17.2347 16.5905 17.1984 16.5486 17.1564C16.5048 17.1144 16.4649 17.0667 16.4326 17.0133L16.4288 17.0057C16.3964 16.9522 16.3717 16.8969 16.3547 16.8378C16.3376 16.7768 16.3282 16.7139 16.3283 16.6491L16.3328 13.7421Z"
                                                        fill="#323232" />
                                                </svg>

                                            </div>
                                            <div class="col-auto my-auto ms-1">
                                                <span
                                                    class="fs-6">{{ Carbon\Carbon::parse($perApp->date)->format('d.m.Y') }},
                                                    {{ $perApp->time }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="text-end pt-2" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="cursor: pointer">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 35.0005C7.85197 35.0005 0 27.1485 0 17.5005C0 7.85246 7.85197 0.000488281 17.5 0.000488281C27.148 0.000488281 35 7.85246 35 17.5005C35 27.1485 27.148 35.0005 17.5 35.0005Z"
                                    fill="#5288F5" />
                                <path
                                    d="M25.0588 19.0005H10.9412C10.4211 19.0005 10 18.5531 10 18.0005C10 17.4479 10.4211 17.0005 10.9412 17.0005H25.0588C25.5789 17.0005 26 17.4479 26 18.0005C26 18.5531 25.5789 19.0005 25.0588 19.0005Z"
                                    fill="white" />
                                <path
                                    d="M18 26.0005C17.4474 26.0005 17 25.5794 17 25.0593V18.0005V10.9417C17 10.4215 17.4474 10.0005 18 10.0005C18.5526 10.0005 19 10.4215 19 10.9417V25.0593C19 25.5794 18.5526 26.0005 18 26.0005Z"
                                    fill="white" />
                            </svg>
                        </div>

                    </div>
                </div>
                {{-- Modali --}}
                <div class="modal fade" style="top: 1% !important;" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-3" style="border-radius: 23px !important;">
                            <div class="modal-header" style="border-bottom: 0 !important;">
                                <span class="modal-title mx-2 fs-5" id="exampleModalLabel"
                                    style="font-family: 'Montserrat' !important;font-weight: 700; color: #434343">Privaten
                                    Termin hinzufügen</span>
                                <button type="button"
                                    style="opacity: 1 !important;border: none; background-color: transparent;"
                                    data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="#434343" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg></button>
                            </div>
                            <div class="modal-body px-5 pb-0">
                                <form class="" action="{{ route('addPersonalAppointment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="apporconId" value="1">
                                    <input type="hidden" name="roleid[]" value="1">
                                    <div class="px-2">
                                        <label
                                            style="font-family: 'Montserrat' !important;font-weight: 600;color: #434343;">Titel</label>
                                        <input type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="title" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Datum</label>
                                        <input type="date"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="date" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Zeit</label>
                                        <!-- <input type="time"
                                                   style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                                   name="time" class="form-control mb-3" required> -->
                                        <select required
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            id="hours" name="time" class="form-select mb-3">
                                        </select>

                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Ort</label>
                                        <input type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="address" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Kommentar</label>
                                        <textarea type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            rows="3" name="comment" class="form-control mb-3" required>
                                                    </textarea>
                                        {{-- <label style="font-family: 'Montserrat' !important;"><b>Zuweisen</b></label> --}}

                                        {{-- <select class="form-select mb-2" --}}
                                        {{-- style="font-family: 'Montserrat' !important;border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important;" --}}
                                        {{-- name="roleid"> --}}
                                        {{-- @if (!in_array('backoffice', $urole)) --}}
                                        {{-- @foreach ($admins as $admin) --}}

                                        {{-- <option value="{{$admin->id}}">{{$admin->name}}</option> --}}
                                        {{-- @endforeach --}}
                                        {{-- @endif --}}
                                        {{-- </select> --}}

                                    </div>
                                    <div class="modal-footer px-1 pb-0 pt-4"
                                        style="border-top: 0 !important; justify-content: flex-start !important;">
                                        <div class="row g-0" style="width: 100%;">
                                            <div class="col-6 pe-1">
                                                <div>
                                                    <button type="button" class="btn py-1" data-bs-dismiss="modal"
                                                        style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid rgb(12, 113, 195);; font-size: 16px !important; background-color: #fff; color: rgb(12, 113, 195); border-radius: 9px;">
                                                        Schliessen
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-6 ps-1">
                                                <div>
                                                    <input type="submit"
                                                        style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid rgb(12, 113, 195); font-weight: 600 !important; font-size: 16px !important; background-color: rgb(12, 113, 195); color: #fff; border-radius: 9px;"
                                                        class="btn py-1" value="Speichern">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
                {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <div class="col-12 col-xl-6 mb-5 d-flex flex-column">
                    <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                        <div class="row g-0">
                            <div class="col-auto cornerSvgToDoList">
                                <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_28_428)">
                                        <path
                                            d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                            fill="#DCE4F9" />
                                    </g>
                                    <mask id="path-2-inside-1_28_428" fill="white">
                                        <path
                                            d="M66 59.5C66.6593 59.5 67.3037 59.3094 67.8519 58.9523C68.4001 58.5952 68.8273 58.0876 69.0796 57.4937C69.3319 56.8999 69.3979 56.2464 69.2693 55.616C69.1407 54.9855 68.8232 54.4064 68.357 53.9519C67.8908 53.4974 67.2969 53.1879 66.6503 53.0624C66.0037 52.937 65.3335 53.0014 64.7244 53.2474C64.1153 53.4934 63.5947 53.9099 63.2284 54.4444C62.8622 54.9789 62.6667 55.6072 62.6667 56.25C62.6667 57.112 63.0179 57.9386 63.643 58.5481C64.2681 59.1576 65.1159 59.5 66 59.5ZM66 68.4416C65.9993 68.1379 66.0619 67.8373 66.184 67.5579C66.3061 67.2786 66.4852 67.0263 66.7104 66.8166L70.4672 63.3594C70.5531 63.2807 70.6635 63.2421 70.7594 63.1781C70.5143 62.5731 70.0884 62.0539 69.5369 61.6878C68.9854 61.3217 68.3338 61.1256 67.6667 61.125H64.3333C63.4493 61.125 62.6014 61.4674 61.9763 62.0769C61.3512 62.6864 61 63.513 61 64.375V69.25C61 69.681 61.1756 70.0943 61.4882 70.399C61.8007 70.7038 62.2246 70.875 62.6667 70.875V77.375C62.6667 77.806 62.8423 78.2193 63.1548 78.524C63.4674 78.8288 63.8913 79 64.3333 79H67.6667C68.1087 79 68.5326 78.8288 68.8452 78.524C69.1577 78.2193 69.3333 77.806 69.3333 77.375V72.4802L66.7104 70.0666C66.4851 69.8569 66.306 69.6046 66.1838 69.3253C66.0617 69.0459 65.9992 68.7452 66 68.4416ZM86 59.5C86.6593 59.5 87.3037 59.3094 87.8519 58.9523C88.4001 58.5952 88.8273 58.0876 89.0796 57.4937C89.3319 56.8999 89.3979 56.2464 89.2693 55.616C89.1407 54.9855 88.8232 54.4064 88.357 53.9519C87.8908 53.4974 87.2969 53.1879 86.6503 53.0624C86.0037 52.937 85.3335 53.0014 84.7244 53.2474C84.1153 53.4934 83.5947 53.9099 83.2284 54.4444C82.8622 54.9789 82.6667 55.6072 82.6667 56.25C82.6667 57.112 83.0179 57.9386 83.643 58.5481C84.2681 59.1576 85.1159 59.5 86 59.5ZM87.6667 61.125H84.3333C83.6662 61.1256 83.0147 61.3216 82.4632 61.6876C81.9118 62.0536 81.4858 62.5727 81.2406 63.1776C81.3365 63.2421 81.449 63.2791 81.5333 63.3599L85.2896 66.8161C85.5141 67.0263 85.6927 67.2786 85.8148 67.5579C85.9368 67.8371 85.9997 68.1375 85.9997 68.4411C85.9997 68.7446 85.9368 69.045 85.8148 69.3242C85.6927 69.6035 85.5141 69.8558 85.2896 70.0661L82.6667 72.4807V77.375C82.6667 77.806 82.8423 78.2193 83.1548 78.524C83.4674 78.8288 83.8913 79 84.3333 79H87.6667C88.1087 79 88.5326 78.8288 88.8452 78.524C89.1577 78.2193 89.3333 77.806 89.3333 77.375V70.875C89.7754 70.875 90.1993 70.7038 90.5118 70.399C90.8244 70.0943 91 69.681 91 69.25V64.375C91 63.513 90.6488 62.6864 90.0237 62.0769C89.3986 61.4674 88.5507 61.125 87.6667 61.125ZM84.1458 67.9977L80.3896 64.5416C80.3009 64.4592 80.1894 64.404 80.0688 64.3829C79.9482 64.3617 79.824 64.3756 79.7114 64.4228C79.5989 64.47 79.5031 64.5484 79.4359 64.6482C79.3686 64.748 79.333 64.8649 79.3333 64.9844V66.8125H72.6667V64.9844C72.6671 64.8649 72.6315 64.7479 72.5644 64.648C72.4972 64.5481 72.4013 64.4696 72.2888 64.4224C72.1762 64.3752 72.0519 64.3612 71.9313 64.3823C71.8107 64.4034 71.6991 64.4586 71.6104 64.5411L67.8542 67.9977C67.7341 68.1157 67.6667 68.2751 67.6667 68.4413C67.6667 68.6075 67.7341 68.7669 67.8542 68.8849L71.6104 72.3416C71.6991 72.424 71.8108 72.4792 71.9314 72.5003C72.0521 72.5214 72.1765 72.5074 72.289 72.4601C72.4016 72.4128 72.4974 72.3343 72.5646 72.2343C72.6317 72.1343 72.6672 72.0173 72.6667 71.8977V70.0625H79.3333V71.8977C79.3328 72.0173 79.3683 72.1343 79.4354 72.2343C79.5026 72.3343 79.5984 72.4128 79.711 72.4601C79.8235 72.5074 79.9479 72.5214 80.0686 72.5003C80.1892 72.4792 80.3009 72.424 80.3896 72.3416L84.1458 68.8849C84.2659 68.7669 84.3333 68.6075 84.3333 68.4413C84.3333 68.2751 84.2659 68.1157 84.1458 67.9977Z" />
                                    </mask>
                                    <path
                                        d="M66 59.5V57.5V59.5ZM62.6667 56.25H60.6667H62.6667ZM66 68.4416L68 68.4471L68 68.4367L66 68.4416ZM66.7104 66.8166L65.3561 65.3449L65.3473 65.3531L66.7104 66.8166ZM70.4672 63.3594L69.1163 61.8845L69.1129 61.8877L70.4672 63.3594ZM70.7594 63.1781L71.8699 64.8414L73.2247 63.9369L72.613 62.4271L70.7594 63.1781ZM67.6667 61.125L67.6685 59.125H67.6667V61.125ZM64.3333 61.125V59.125V61.125ZM61 64.375H59H61ZM61 69.25H59H61ZM62.6667 70.875H64.6667V68.875H62.6667V70.875ZM62.6667 77.375H60.6667H62.6667ZM69.3333 72.4802H71.3333V71.6027L70.6876 71.0085L69.3333 72.4802ZM66.7104 70.0666L65.3477 71.5305L65.3561 71.5383L66.7104 70.0666ZM86 59.5V57.5V59.5ZM87.6667 61.125V59.125V61.125ZM84.3333 61.125V59.125L84.3316 59.125L84.3333 61.125ZM81.2406 63.1776L79.3871 62.4263L78.7773 63.9306L80.124 64.8368L81.2406 63.1776ZM81.5333 63.3599L80.1506 64.8049L80.1647 64.8184L80.1791 64.8317L81.5333 63.3599ZM85.2896 66.8161L86.6567 65.3562L86.6503 65.3502L86.6438 65.3443L85.2896 66.8161ZM85.2896 70.0661L86.6442 71.5375L86.6504 71.5317L86.6567 71.5259L85.2896 70.0661ZM82.6667 72.4807L81.3121 71.0093L80.6667 71.6034V72.4807H82.6667ZM89.3333 70.875V68.875H87.3333V70.875H89.3333ZM84.1458 67.9977L85.5474 66.571L85.5241 66.5481L85.5 66.526L84.1458 67.9977ZM80.3896 64.5416L79.028 66.0065L79.0354 66.0133L80.3896 64.5416ZM79.3333 64.9844H81.3333L81.3333 64.9785L79.3333 64.9844ZM79.3333 66.8125V68.8125H81.3333V66.8125H79.3333ZM72.6667 66.8125H70.6667V68.8125H72.6667V66.8125ZM72.6667 64.9844L70.6667 64.9768V64.9844H72.6667ZM71.6104 64.5411L72.9647 66.0128L72.972 66.006L71.6104 64.5411ZM67.8542 67.9977L66.4999 66.5261L66.4759 66.5481L66.4526 66.571L67.8542 67.9977ZM67.6667 68.4413H69.6667H67.6667ZM67.8542 68.8849L66.4526 70.3116L66.4759 70.3345L66.4999 70.3566L67.8542 68.8849ZM71.6104 72.3416L72.9721 70.8766L72.9647 70.8699L71.6104 72.3416ZM72.6667 71.8977H70.6666L70.6667 71.907L72.6667 71.8977ZM72.6667 70.0625V68.0625H70.6667V70.0625H72.6667ZM79.3333 70.0625H81.3333V68.0625H79.3333V70.0625ZM79.3333 71.8977L81.3333 71.907V71.8977H79.3333ZM80.3896 72.3416L79.0353 70.8699L79.028 70.8766L80.3896 72.3416ZM84.1458 68.8849L85.5001 70.3566L85.5241 70.3345L85.5474 70.3116L84.1458 68.8849ZM66 61.5C67.0437 61.5 68.068 61.1985 68.9436 60.628L66.7602 57.2765C66.5395 57.4203 66.2748 57.5 66 57.5V61.5ZM68.9436 60.628C69.8198 60.0573 70.5104 59.2407 70.9204 58.2757L67.2388 56.7117C67.1442 56.9345 66.9804 57.1331 66.7602 57.2765L68.9436 60.628ZM70.9204 58.2757C71.3306 57.3102 71.4387 56.2447 71.2289 55.2162L67.3096 56.0157C67.3571 56.2481 67.3332 56.4895 67.2388 56.7117L70.9204 58.2757ZM71.2289 55.2162C71.0192 54.188 70.5028 53.2507 69.7532 52.5199L66.9608 55.3839C67.1436 55.5621 67.2622 55.783 67.3096 56.0157L71.2289 55.2162ZM69.7532 52.5199C69.0042 51.7896 68.056 51.2978 67.0311 51.099L66.2695 55.0259C66.5378 55.0779 66.7775 55.2051 66.9608 55.3839L69.7532 52.5199ZM67.0311 51.099C66.0064 50.9003 64.9437 51.0019 63.9754 51.3929L65.4733 55.1019C65.7232 55.0009 66.001 54.9738 66.2695 55.0259L67.0311 51.099ZM63.9754 51.3929C63.0068 51.7841 62.1707 52.4499 61.5787 53.3138L64.8782 55.575C65.0187 55.37 65.2238 55.2026 65.4733 55.1019L63.9754 51.3929ZM61.5787 53.3138C60.9862 54.1783 60.6667 55.2002 60.6667 56.25H64.6667C64.6667 56.0142 64.7381 55.7794 64.8782 55.575L61.5787 53.3138ZM60.6667 56.25C60.6667 57.659 61.2412 58.9997 62.2468 59.9801L65.0392 57.1161C64.7945 56.8776 64.6667 56.5649 64.6667 56.25H60.6667ZM62.2468 59.9801C63.2506 60.9589 64.6016 61.5 66 61.5V57.5C65.6303 57.5 65.2856 57.3563 65.0392 57.1161L62.2468 59.9801ZM68 68.4367C67.9999 68.4115 68.005 68.3853 68.0165 68.359L64.3514 66.7568C64.1187 67.2892 63.9986 67.8643 64 68.4465L68 68.4367ZM68.0165 68.359C68.028 68.3327 68.0465 68.3053 68.0736 68.2801L65.3473 65.3531C64.9239 65.7474 64.5842 66.2244 64.3514 66.7568L68.0165 68.359ZM68.0647 68.2882L71.8215 64.8311L69.1129 61.8877L65.3561 65.3449L68.0647 68.2882ZM71.818 64.8342C71.7424 64.9035 71.6754 64.9511 71.632 64.9796C71.6102 64.9938 71.5929 65.0042 71.5825 65.0103C71.5723 65.0163 71.5664 65.0195 71.5682 65.0185C71.5713 65.0168 71.5752 65.0147 71.5905 65.0065C71.6028 65 71.6251 64.9881 71.6493 64.9747C71.6744 64.9609 71.7068 64.9427 71.7434 64.9211C71.7801 64.8993 71.823 64.8727 71.8699 64.8414L69.6488 61.5148C69.6717 61.4994 69.6903 61.4881 69.7023 61.481C69.7084 61.4774 69.7132 61.4746 69.7163 61.4728C69.7194 61.4711 69.7213 61.47 69.7214 61.47C69.7215 61.4699 69.7204 61.4705 69.7175 61.4721C69.7144 61.4738 69.7106 61.4758 69.7044 61.4791C69.6944 61.4844 69.673 61.4959 69.6509 61.5079C69.5705 61.5518 69.3451 61.675 69.1163 61.8845L71.818 64.8342ZM72.613 62.4271C72.2144 61.4431 71.5251 60.6071 70.643 60.0215L68.4307 63.354C68.6516 63.5006 68.8142 63.7031 68.9057 63.9291L72.613 62.4271ZM70.643 60.0215C69.7615 59.4363 68.7253 59.126 67.6685 59.125L67.6648 63.125C67.9424 63.1253 68.2093 63.2071 68.4307 63.354L70.643 60.0215ZM67.6667 59.125H64.3333V63.125H67.6667V59.125ZM64.3333 59.125C62.935 59.125 61.584 59.6661 60.5801 60.6449L63.3725 63.5089C63.6189 63.2687 63.9636 63.125 64.3333 63.125V59.125ZM60.5801 60.6449C59.5745 61.6253 59 62.966 59 64.375H63C63 64.0601 63.1278 63.7475 63.3725 63.5089L60.5801 60.6449ZM59 64.375V69.25H63V64.375H59ZM59 69.25C59 70.228 59.3989 71.1554 60.092 71.8311L62.8844 68.967C62.9523 69.0332 63 69.134 63 69.25H59ZM60.092 71.8311C60.7833 72.5051 61.7103 72.875 62.6667 72.875V68.875C62.739 68.875 62.8182 68.9025 62.8844 68.967L60.092 71.8311ZM60.6667 70.875V77.375H64.6667V70.875H60.6667ZM60.6667 77.375C60.6667 78.353 61.0656 79.2804 61.7586 79.9561L64.551 77.092C64.6189 77.1582 64.6667 77.259 64.6667 77.375H60.6667ZM61.7586 79.9561C62.4499 80.6301 63.377 81 64.3333 81V77C64.4056 77 64.4848 77.0275 64.551 77.092L61.7586 79.9561ZM64.3333 81H67.6667V77H64.3333V81ZM67.6667 81C68.623 81 69.5501 80.6301 70.2414 79.9561L67.449 77.092C67.5152 77.0275 67.5944 77 67.6667 77V81ZM70.2414 79.9561C70.9344 79.2804 71.3333 78.353 71.3333 77.375H67.3333C67.3333 77.259 67.3811 77.1582 67.449 77.092L70.2414 79.9561ZM71.3333 77.375V72.4802H67.3333V77.375H71.3333ZM70.6876 71.0085L68.0647 68.5949L65.3561 71.5383L67.9791 73.9519L70.6876 71.0085ZM68.0731 68.6027C68.0462 68.5776 68.0278 68.5503 68.0164 68.5241L64.3513 70.1264C64.5841 70.659 64.9241 71.1361 65.3477 71.5305L68.0731 68.6027ZM68.0164 68.5241C68.005 68.4981 67.9999 68.472 68 68.4471L64 68.4361C63.9984 69.0185 64.1185 69.5938 64.3513 70.1264L68.0164 68.5241ZM86 61.5C87.0437 61.5 88.068 61.1985 88.9436 60.628L86.7602 57.2765C86.5395 57.4203 86.2748 57.5 86 57.5V61.5ZM88.9436 60.628C89.8198 60.0573 90.5104 59.2407 90.9204 58.2757L87.2388 56.7117C87.1442 56.9345 86.9804 57.1331 86.7602 57.2765L88.9436 60.628ZM90.9204 58.2757C91.3306 57.3102 91.4387 56.2447 91.2289 55.2162L87.3097 56.0157C87.3571 56.2481 87.3332 56.4895 87.2388 56.7117L90.9204 58.2757ZM91.2289 55.2162C91.0192 54.188 90.5028 53.2507 89.7532 52.5199L86.9608 55.3839C87.1436 55.5621 87.2622 55.783 87.3097 56.0157L91.2289 55.2162ZM89.7532 52.5199C89.0042 51.7896 88.056 51.2978 87.0311 51.099L86.2695 55.0259C86.5378 55.0779 86.7775 55.2051 86.9608 55.3839L89.7532 52.5199ZM87.0311 51.099C86.0064 50.9003 84.9437 51.0019 83.9754 51.3929L85.4733 55.1019C85.7232 55.0009 86.001 54.9738 86.2695 55.0259L87.0311 51.099ZM83.9754 51.3929C83.0068 51.7841 82.1707 52.4499 81.5787 53.3138L84.8782 55.575C85.0187 55.37 85.2238 55.2026 85.4733 55.1019L83.9754 51.3929ZM81.5787 53.3138C80.9862 54.1783 80.6667 55.2002 80.6667 56.25H84.6667C84.6667 56.0142 84.7381 55.7794 84.8782 55.575L81.5787 53.3138ZM80.6667 56.25C80.6667 57.659 81.2412 58.9997 82.2468 59.9801L85.0392 57.1161C84.7945 56.8776 84.6667 56.5649 84.6667 56.25H80.6667ZM82.2468 59.9801C83.2506 60.9589 84.6016 61.5 86 61.5V57.5C85.6303 57.5 85.2856 57.3563 85.0392 57.1161L82.2468 59.9801ZM87.6667 59.125H84.3333V63.125H87.6667V59.125ZM84.3316 59.125C83.275 59.1259 82.2388 59.4361 81.3573 60.0212L83.5692 63.354C83.7906 63.207 84.0575 63.1252 84.3351 63.125L84.3316 59.125ZM81.3573 60.0212C80.4752 60.6066 79.7859 61.4425 79.3871 62.4263L83.0941 63.9289C83.1857 63.7029 83.3484 63.5005 83.5692 63.354L81.3573 60.0212ZM80.124 64.8368C80.1741 64.8705 80.2199 64.8989 80.2589 64.9219C80.2976 64.9448 80.3319 64.9639 80.3581 64.9782C80.3713 64.9854 80.3833 64.9918 80.3933 64.9971C80.4031 65.0023 80.4122 65.0072 80.4186 65.0106C80.4259 65.0144 80.4299 65.0165 80.4339 65.0187C80.4375 65.0205 80.4389 65.0213 80.4391 65.0214C80.4398 65.0218 80.432 65.0176 80.4194 65.0102C80.4066 65.0027 80.3862 64.9905 80.361 64.9738C80.3106 64.9404 80.2346 64.8853 80.1506 64.8049L82.9161 61.9149C82.6725 61.6818 82.4275 61.5493 82.3435 61.5039C82.3201 61.4912 82.2977 61.4794 82.2876 61.4741C82.2813 61.4707 82.2776 61.4688 82.2747 61.4672C82.2719 61.4657 82.2712 61.4653 82.2717 61.4656C82.2726 61.4661 82.2817 61.4711 82.2956 61.4793C82.3097 61.4877 82.3311 61.5007 82.3572 61.5183L80.124 64.8368ZM80.1791 64.8317L83.9354 68.2878L86.6438 65.3443L82.8875 61.8881L80.1791 64.8317ZM83.9225 68.2759C83.9506 68.3022 83.9699 68.3309 83.9821 68.3587L87.6474 66.757C87.4155 66.2264 87.0776 65.7504 86.6567 65.3562L83.9225 68.2759ZM83.9821 68.3587C83.9942 68.3864 83.9997 68.4143 83.9997 68.4411H87.9997C87.9997 67.8608 87.8794 67.2878 87.6474 66.757L83.9821 68.3587ZM83.9997 68.4411C83.9997 68.4678 83.9942 68.4957 83.9821 68.5234L87.6474 70.1251C87.8794 69.5943 87.9997 69.0213 87.9997 68.4411H83.9997ZM83.9821 68.5234C83.9699 68.5512 83.9506 68.5799 83.9225 68.6062L86.6567 71.5259C87.0776 71.1317 87.4155 70.6557 87.6474 70.1251L83.9821 68.5234ZM83.935 68.5946L81.3121 71.0093L84.0213 73.9521L86.6442 71.5375L83.935 68.5946ZM80.6667 72.4807V77.375H84.6667V72.4807H80.6667ZM80.6667 77.375C80.6667 78.353 81.0656 79.2804 81.7586 79.9561L84.551 77.092C84.6189 77.1582 84.6667 77.259 84.6667 77.375H80.6667ZM81.7586 79.9561C82.4499 80.6301 83.377 81 84.3333 81V77C84.4056 77 84.4848 77.0275 84.551 77.092L81.7586 79.9561ZM84.3333 81H87.6667V77H84.3333V81ZM87.6667 81C88.623 81 89.5501 80.6301 90.2414 79.9561L87.449 77.092C87.5152 77.0275 87.5944 77 87.6667 77V81ZM90.2414 79.9561C90.9344 79.2804 91.3333 78.353 91.3333 77.375H87.3333C87.3333 77.259 87.3811 77.1583 87.449 77.092L90.2414 79.9561ZM91.3333 77.375V70.875H87.3333V77.375H91.3333ZM89.3333 72.875C90.2897 72.875 91.2167 72.5051 91.908 71.8311L89.1156 68.967C89.1818 68.9025 89.261 68.875 89.3333 68.875V72.875ZM91.908 71.8311C92.6011 71.1554 93 70.228 93 69.25H89C89 69.134 89.0477 69.0333 89.1156 68.967L91.908 71.8311ZM93 69.25V64.375H89V69.25H93ZM93 64.375C93 62.966 92.4255 61.6253 91.4199 60.6449L88.6275 63.5089C88.8722 63.7475 89 64.0601 89 64.375H93ZM91.4199 60.6449C90.416 59.6661 89.065 59.125 87.6667 59.125V63.125C88.0364 63.125 88.3811 63.2687 88.6275 63.5089L91.4199 60.6449ZM85.5 66.526L81.7438 63.0698L79.0354 66.0133L82.7916 69.4695L85.5 66.526ZM81.7512 63.0766C81.3762 62.7281 80.9104 62.4998 80.4138 62.4128L79.7238 66.3529C79.4684 66.3081 79.2256 66.1902 79.028 66.0065L81.7512 63.0766ZM80.4138 62.4128C79.9174 62.3259 79.4049 62.3827 78.9382 62.5783L80.4847 66.2673C80.243 66.3686 79.9791 66.3976 79.7238 66.3529L80.4138 62.4128ZM78.9382 62.5783C78.471 62.7742 78.0652 63.1029 77.7769 63.5312L81.0948 65.7652C80.9409 65.9938 80.7268 66.1658 80.4847 66.2673L78.9382 62.5783ZM77.7769 63.5312C77.4881 63.96 77.3318 64.4675 77.3333 64.9902L81.3333 64.9785C81.3342 65.2624 81.2492 65.5361 81.0948 65.7652L77.7769 63.5312ZM77.3333 64.9844V66.8125H81.3333V64.9844H77.3333ZM79.3333 64.8125H72.6667V68.8125H79.3333V64.8125ZM74.6667 66.8125V64.9844H70.6667V66.8125H74.6667ZM74.6667 64.992C74.6686 64.469 74.5127 63.9612 74.224 63.532L70.9047 65.764C70.7504 65.5346 70.6656 65.2608 70.6667 64.9768L74.6667 64.992ZM74.224 63.532C73.9359 63.1034 73.53 62.7744 73.0628 62.5783L71.5148 66.2666C71.2727 66.1649 71.0585 65.9928 70.9047 65.764L74.224 63.532ZM73.0628 62.5783C72.596 62.3823 72.0833 62.3254 71.5867 62.4122L72.2759 66.3524C72.0205 66.3971 71.7565 66.368 71.5148 66.2666L73.0628 62.5783ZM71.5867 62.4122C71.0899 62.4991 70.6239 62.7275 70.2488 63.0761L72.972 66.006C72.7743 66.1898 72.5315 66.3077 72.2759 66.3524L71.5867 62.4122ZM70.2561 63.0694L66.4999 66.5261L69.2085 69.4694L72.9647 66.0127L70.2561 63.0694ZM66.4526 66.571C65.9552 67.0596 65.6667 67.7308 65.6667 68.4413H69.6667C69.6667 68.8194 69.513 69.1718 69.2558 69.4245L66.4526 66.571ZM65.6667 68.4413C65.6667 69.1518 65.9552 69.823 66.4526 70.3116L69.2558 67.4582C69.513 67.7108 69.6667 68.0632 69.6667 68.4413H65.6667ZM66.4999 70.3566L70.2561 73.8132L72.9647 70.8699L69.2085 67.4132L66.4999 70.3566ZM70.2488 73.8065C70.6241 74.1553 71.0903 74.3837 71.5873 74.4705L72.2756 70.5302C72.5313 70.5748 72.7742 70.6928 72.972 70.8766L70.2488 73.8065ZM71.5873 74.4705C72.084 74.5573 72.5969 74.5002 73.0638 74.304L71.5143 70.6163C71.7561 70.5147 72.0202 70.4855 72.2756 70.5302L71.5873 74.4705ZM73.0638 74.304C73.5311 74.1076 73.9369 73.7782 74.225 73.3492L70.9042 71.1193C71.0579 70.8904 71.2721 70.718 71.5143 70.6163L73.0638 74.304ZM74.225 73.3492C74.5134 72.9197 74.6691 72.4116 74.6666 71.8884L70.6667 71.907C70.6654 71.623 70.75 71.3489 70.9042 71.1193L74.225 73.3492ZM74.6667 71.8977V70.0625H70.6667V71.8977H74.6667ZM72.6667 72.0625H79.3333V68.0625H72.6667V72.0625ZM77.3333 70.0625V71.8977H81.3333V70.0625H77.3333ZM77.3334 71.8884C77.3309 72.4116 77.4866 72.9197 77.775 73.3492L81.0958 71.1193C81.25 71.3489 81.3346 71.623 81.3333 71.907L77.3334 71.8884ZM77.775 73.3492C78.0631 73.7782 78.4689 74.1076 78.9362 74.304L80.4857 70.6163C80.7279 70.718 80.9421 70.8904 81.0958 71.1193L77.775 73.3492ZM78.9362 74.304C79.4031 74.5002 79.916 74.5573 80.4127 74.4705L79.7244 70.5302C79.9798 70.4855 80.2439 70.5147 80.4857 70.6163L78.9362 74.304ZM80.4127 74.4705C80.9097 74.3837 81.3759 74.1553 81.7512 73.8065L79.028 70.8766C79.2258 70.6928 79.4687 70.5748 79.7244 70.5302L80.4127 74.4705ZM81.7439 73.8132L85.5001 70.3566L82.7915 67.4132L79.0353 70.8699L81.7439 73.8132ZM85.5474 70.3116C86.0447 69.823 86.3333 69.1518 86.3333 68.4413H82.3333C82.3333 68.0632 82.487 67.7108 82.7442 67.4582L85.5474 70.3116ZM86.3333 68.4413C86.3333 67.7308 86.0448 67.0596 85.5474 66.571L82.7442 69.4245C82.487 69.1718 82.3333 68.8194 82.3333 68.4413H86.3333Z"
                                        fill="black" mask="url(#path-2-inside-1_28_428)" />
                                    <defs>
                                        <filter id="filter0_d_28_428" x="0.0410156" y="0.852783" width="150.691"
                                            height="144.3" filterUnits="userSpaceOnUse"
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
                            <div class="col titleMarginAuto">
                                <div class="pb-3">
                                    <span class="secondGreyBorderDashSpan">Mitarbeiterbesprechungen</span>
                                </div>
                            </div>
                        </div>
                        <div class="overFlowDivDashboard" style="margin-top: -1.5rem;">
                            @if ($consultation->count() == 0)
                                <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                    style="color: #9F9F9F">
                                    Keine Mitarbeiterbesprechungen
                                </div>
                            @else
                                @foreach ($consultation as $consult)
                                    <div class="thirdBorderDivDash ps-2 py-2 my-2">
                                        <ul class="ps-0 mb-0" style="list-style-type: none">
                                            @foreach ($consult->siblingsApp as $item)
                                                <li>
                                                    <div class="input-group pb-2">
                                                        <div class="col-auto pe-2 ms-1 my-auto">
                                                            <svg width="21" height="21" viewBox="0 0 21 21"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.49158 12.7802L9.15599 17.4404L9.99333 14.6742L9.58321 14.2462C9.39865 13.9891 9.35764 13.7646 9.46017 13.571C9.68232 13.1528 10.142 13.2309 10.5709 13.2309C11.0203 13.2309 11.5774 13.1495 11.7176 13.6865C11.7654 13.8655 11.7056 14.0542 11.574 14.2462L11.1639 14.6742L12.0012 17.4404L13.5084 12.7802C14.5952 13.7109 17.813 13.898 19.0109 14.5342C19.3903 14.736 19.732 14.9915 20.0072 15.3364C20.4241 15.862 20.6804 16.5471 20.7505 17.4176L21 18.9357C20.9385 19.5508 20.5728 19.9055 19.8499 19.9592H10.5778H1.15005C0.427211 19.9072 0.0615184 19.5524 0 18.9357L0.249491 17.4176C0.319554 16.5471 0.575881 15.862 0.992839 15.3364C1.26796 14.9899 1.60973 14.7344 1.9891 14.5342C3.187 13.898 6.40475 13.7109 7.49158 12.7802ZM6.73798 6.11039C6.53121 6.11853 6.3757 6.15921 6.26975 6.22755C6.20823 6.2666 6.16381 6.31704 6.13476 6.37562C6.10229 6.44071 6.08862 6.52044 6.09032 6.61319C6.09887 6.8833 6.24754 7.23477 6.53292 7.63993L6.53633 7.64644L7.46595 9.05557C7.83847 9.6202 8.2298 10.1962 8.71511 10.6193C9.18163 11.0261 9.74896 11.3011 10.4991 11.3027C11.3108 11.3043 11.9055 11.0179 12.3857 10.5884C12.8864 10.1409 13.2829 9.52908 13.6725 8.91726L14.72 7.27382C14.9148 6.84913 14.9866 6.566 14.9421 6.3984C14.9148 6.29914 14.8003 6.25033 14.6055 6.24219C14.5645 6.24057 14.5218 6.24057 14.4773 6.24057C14.4312 6.24219 14.3816 6.24545 14.3304 6.2487C14.303 6.25033 14.2757 6.2487 14.2501 6.24382C14.1561 6.2487 14.0604 6.24219 13.963 6.22918L14.3218 4.71753C12.4062 4.69475 11.0955 4.37746 9.54561 3.4337C9.03637 3.12454 8.88258 2.76981 8.37334 2.80398C7.98885 2.87395 7.66588 3.0383 7.40784 3.3019C7.16177 3.55411 6.97551 3.89907 6.85418 4.34003L7.05753 6.12178C6.94475 6.12829 6.83709 6.12504 6.73798 6.11039ZM14.9644 5.79309C15.2224 5.86794 15.3882 6.02415 15.4548 6.27636C15.53 6.55624 15.448 6.94838 15.2002 7.48535C15.1951 7.49511 15.1899 7.50488 15.1848 7.51464L14.1253 9.17761C13.7169 9.81871 13.3017 10.4598 12.748 10.9545C12.1755 11.4654 11.4681 11.8055 10.5026 11.8039C9.60029 11.8022 8.92188 11.4735 8.3648 10.9886C7.82651 10.52 7.41468 9.91471 7.02335 9.32242L6.09374 7.91492C5.75368 7.43165 5.57767 6.99069 5.56571 6.62783C5.56058 6.45698 5.59134 6.3024 5.65628 6.16734C5.72634 6.02415 5.83229 5.90537 5.97583 5.81425C6.04248 5.77194 6.11767 5.73452 6.2014 5.70523C6.14159 4.94208 6.11767 3.9788 6.15697 3.17335C6.17748 2.98297 6.21507 2.79097 6.27146 2.59896C6.50899 1.79026 7.10538 1.13939 7.8436 0.691917C8.10334 0.534081 8.38872 0.403908 8.68948 0.299769C10.4752 -0.318556 12.8437 0.0182683 14.1116 1.32326C14.6277 1.85534 14.9524 2.56153 15.0225 3.4939L14.9644 5.79309Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </div>
                                                        <span class=" fs-6">
                                                            {{ ucfirst(App\Models\Admins::find($item->user_id)->name) }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li>
                                                <div class="input-group pb-2">
                                                    <div class="col-auto pe-2 ms-1 my-auto">
                                                        <svg width="18" height="19" viewBox="0 0 18 19"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.2927 0.00655353C10.2768 0.00514167 10.263 0.00714181 10.2479 0.00694572C10.2469 0.00694572 10.2457 0.00655353 10.2447 0.00655353C5.75927 -0.148712 1.04486 2.45798 1.45253 7.50155C1.45414 7.52198 1.4592 7.54006 1.46289 7.55912C1.457 7.61128 1.457 7.66595 1.46967 7.72529C1.71561 8.87627 1.33813 9.88815 0.393244 10.5938C0.349829 10.6262 0.316572 10.6631 0.287904 10.7015C0.192407 10.7644 0.11695 10.8606 0.0763986 10.9771C-0.100633 11.4857 0.0338073 12.0035 0.440149 12.3572C0.507252 12.4155 0.585022 12.4552 0.665577 12.4765C0.927948 12.6215 1.20228 12.7178 1.48716 12.7852C1.42861 13.101 1.4574 13.4205 1.60956 13.7212C1.32547 14.2748 1.51407 14.8856 2.07489 15.219C2.10654 15.2377 2.13811 15.252 2.16905 15.263C2.26435 15.3763 2.27353 15.5583 2.23847 15.7334C2.22761 15.7869 2.22623 15.8403 2.23031 15.8925C2.22784 15.9401 2.22933 15.9883 2.23847 16.0367C2.38652 16.8124 3.04861 17.2405 3.80666 17.2543C3.84741 17.2551 3.88513 17.2509 3.92067 17.2437C3.95573 17.2453 3.99248 17.2431 4.0304 17.2372C5.24762 17.0398 6.63352 17.1499 7.09077 18.487C7.18207 18.7541 7.42644 18.8447 7.6452 18.8095C7.71889 18.8646 7.81596 18.8963 7.93848 18.8877C10.1444 18.7335 12.3306 18.4131 14.5207 18.119C14.5982 18.1086 14.6653 18.0835 14.723 18.0483C14.9887 17.9654 15.2032 17.6681 15.0315 17.3481C13.568 14.6197 16.5349 11.6432 17.0977 9.0222C17.1099 8.96557 17.11 8.91306 17.1052 8.86306C17.7005 4.55801 14.7216 0.405444 10.2927 0.00655353ZM16.1712 8.67088C16.1653 8.71073 16.1645 8.74885 16.1669 8.78548C15.5553 11.59 12.8733 14.3012 13.9352 17.2376C11.9408 17.5083 9.9474 17.7865 7.93852 17.9271C7.92408 17.9281 7.91181 17.9319 7.8982 17.9341C7.18015 16.3359 5.50941 16.0493 3.85635 16.2995C3.83984 16.2977 3.8245 16.294 3.80674 16.2935C3.61857 16.2901 3.52036 16.2706 3.37341 16.1808C3.38624 16.1849 3.29792 16.1145 3.29894 16.1156C3.28631 16.1029 3.27843 16.0953 3.27266 16.0903C3.27266 16.0865 3.2676 16.0752 3.24905 16.0451C3.22109 16.0003 3.20046 15.9372 3.18332 15.8659C3.26854 15.2772 3.10139 14.7658 2.6081 14.3894C2.56845 14.3594 2.52406 14.3425 2.47817 14.3313C2.46394 14.3193 2.45009 14.3078 2.43515 14.2927C2.43782 14.2939 2.43535 14.2879 2.42676 14.2741C2.42676 14.2618 2.42597 14.258 2.42456 14.2592C2.43044 14.2337 2.43613 14.2082 2.44507 14.1835C2.44527 14.1825 2.51688 14.0714 2.54057 14.0379C2.60697 13.9445 2.62054 13.8312 2.59952 13.7223C2.61924 13.6145 2.6052 13.5024 2.54057 13.4088C2.35883 13.1455 2.3948 12.9215 2.54057 12.6447C2.74957 12.2484 2.37326 11.887 2.03952 11.9238C2.03603 11.9233 2.03297 11.9224 2.02955 11.9218C1.69122 11.8771 1.3641 11.7782 1.07086 11.6029C1.04984 11.5906 1.02925 11.5828 1.00862 11.5736C0.993992 11.5523 0.980344 11.5306 0.968108 11.5079C0.966029 11.5019 0.964421 11.4966 0.961558 11.4878C0.959166 11.4766 0.95748 11.4693 0.955872 11.4621C0.955087 11.44 0.95548 11.4183 0.956695 11.3962C0.958303 11.3902 0.961362 11.3764 0.96548 11.355C2.18576 10.4016 2.70992 9.09099 2.41299 7.55916C2.41339 7.53994 2.41558 7.52202 2.41397 7.50159C2.04701 2.96802 6.26483 0.829631 10.2445 0.967444C10.2573 0.967836 10.2682 0.96564 10.2806 0.965248C10.2848 0.96564 10.2881 0.967013 10.2928 0.967444C14.071 1.30778 16.7093 4.99267 16.1712 8.67088Z"
                                                                fill="#323232" />
                                                            <path
                                                                d="M9.27769 11.8237C8.19259 11.8237 8.19259 13.5063 9.27769 13.5063C10.3629 13.5064 10.3629 11.8237 9.27769 11.8237Z"
                                                                fill="#323232" />
                                                            <path
                                                                d="M5.76792 4.46031C5.40475 4.73865 5.2125 5.17836 5.46613 5.61133C5.67622 5.96979 6.25226 6.19294 6.61731 5.91312C7.72837 5.06145 9.37334 4.7652 10.5483 5.68142C10.7883 5.86861 10.9078 6.00873 11.0357 6.24373C11.0813 6.32727 11.0841 6.44496 11.0708 6.52732C11.0655 6.50332 10.9729 6.72208 11.0206 6.66196C10.9256 6.78204 10.8122 6.87268 10.6856 6.95519C10.2554 7.23639 9.73643 7.35491 9.24075 7.46036C9.12325 7.48527 9.02728 7.52966 8.94543 7.58453C8.61811 7.66877 8.34261 7.92679 8.34261 8.36517V9.76739C8.34261 10.8524 10.0254 10.8524 10.0254 9.76739V9.00463C11.0102 8.75787 12.0637 8.3105 12.5409 7.37318C13.0057 6.45986 12.6737 5.4936 12.0345 4.76908C10.4756 3.00166 7.52463 3.11379 5.76792 4.46031Z"
                                                                fill="#323232" />
                                                        </svg>
                                                    </div>
                                                    <span class=" fs-6">{{ $consult->title }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group">
                                                    <div class="col-auto my-auto ms-1 pb-2 pe-2">
                                                        <svg width="22" height="22" viewBox="0 0 22 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.8874 14.4984C13.6724 14.4984 13.4978 14.677 13.4978 14.897V18.5408H0.779274V1.37308H13.4975V4.40273C13.4975 4.62304 13.6721 4.80137 13.8872 4.80137C14.1023 4.80137 14.2768 4.62304 14.2768 4.40273V0.974443C14.2768 0.75413 14.1023 0.575806 13.8872 0.575806H0.389637C0.174298 0.575806 0 0.75413 0 0.974443V18.9392C0 19.1592 0.174298 19.3378 0.389637 19.3378H13.8872C14.1023 19.3378 14.2768 19.1592 14.2768 18.9392V14.897C14.2771 14.6767 14.1025 14.4984 13.8874 14.4984Z"
                                                                fill="black" />
                                                            <path
                                                                d="M20.9925 1.63805C20.9718 1.5344 20.9115 1.44351 20.8253 1.38531L18.869 0.0655535C18.7828 0.00761813 18.6781 -0.0128453 18.5758 0.00788389C18.4745 0.0291446 18.3859 0.0908006 18.329 0.179298L16.8969 2.40556C16.8821 2.42868 16.8699 2.45286 16.8603 2.47758L9.28474 14.2382C9.26889 14.2629 9.25642 14.2895 9.24629 14.3169C9.20239 14.3697 9.17018 14.4341 9.15823 14.5074L8.66651 17.5139C8.64054 17.6723 8.71015 17.8307 8.84263 17.9168C8.90627 17.9577 8.97848 17.9782 9.05069 17.9782C9.12888 17.9782 9.20707 17.954 9.27383 17.9062L11.7137 16.162C11.7371 16.1453 11.7579 16.1261 11.7766 16.1054C11.8197 16.0764 11.8592 16.0408 11.8893 15.9941L19.4691 4.2276C19.4841 4.20394 19.4963 4.17896 19.5062 4.15318L20.9357 1.93809C20.9928 1.84959 21.0133 1.74196 20.9925 1.63805ZM9.85179 15.0979L10.876 15.7884L9.58813 16.7089L9.85179 15.0979ZM11.4532 15.2226L10.1497 14.344L17.3006 3.24296L18.6041 4.12183L11.4532 15.2226ZM19.0254 3.45105L17.7225 2.57245L18.7656 0.950795L20.0707 1.83125L19.0254 3.45105Z"
                                                                fill="black" />
                                                            <path
                                                                d="M9.66969 5.61246C9.88503 5.61246 10.0593 5.43414 10.0593 5.21382C10.0593 4.99351 9.88503 4.81519 9.66969 4.81519H2.42089C2.20555 4.81519 2.03125 4.99351 2.03125 5.21382C2.03125 5.43414 2.20555 5.61246 2.42089 5.61246H9.66969Z"
                                                                fill="black" />
                                                            <path
                                                                d="M2.51171 8.89615H9.75869C9.97403 8.89615 10.1483 8.71783 10.1483 8.49751C10.1483 8.2772 9.97403 8.09888 9.75869 8.09888H2.51171C2.29637 8.09888 2.12207 8.2772 2.12207 8.49751C2.12207 8.71783 2.29637 8.89615 2.51171 8.89615Z"
                                                                fill="black" />
                                                        </svg>
                                                    </div>
                                                    <span class=" fs-6">{{ $consult->comment }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group pb-2">
                                                    <div class="col-auto my-auto ms-1 pe-2">
                                                        <svg width="22" height="22" viewBox="0 0 22 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.49984 0C4.12911 0 0.573242 3.55586 0.573242 7.92654C0.573242 9.73327 1.84383 12.4104 4.34976 15.8833C6.17913 18.4187 8.03511 20.4842 8.05361 20.5048L8.49978 21L8.94595 20.5048C8.96451 20.4843 10.8204 18.4188 12.6498 15.8833C15.1557 12.4103 16.4263 9.73327 16.4263 7.92654C16.4264 3.55586 12.8705 0 8.49984 0ZM8.49978 19.1956C6.27414 16.6316 1.77447 10.8446 1.77447 7.92654C1.77441 4.21819 4.79143 1.20116 8.49984 1.20116C12.2083 1.20116 15.2252 4.21819 15.2252 7.92654C15.2252 10.8429 10.7254 16.631 8.49978 19.1956Z"
                                                                fill="#323232" />
                                                            <path
                                                                d="M8.50028 10.9112C10.1487 10.9112 11.4849 9.57492 11.4849 7.92654C11.4849 6.27817 10.1487 4.94189 8.50028 4.94189C6.8519 4.94189 5.51562 6.27817 5.51562 7.92654C5.51562 9.57492 6.8519 10.9112 8.50028 10.9112Z"
                                                                fill="#323232" />
                                                        </svg>

                                                    </div>
                                                    <span class=" fs-6">{{ $consult->address }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-group pb-2">
                                                    <div class="col-auto pe-2 ms-1 my-auto">
                                                        <svg width="22" height="22" viewBox="0 0 23 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.7889 0.762314C12.7895 0.354591 13.1922 0.0204328 13.6954 0.0212139C14.1968 0.0219922 14.6003 0.353661 14.5997 0.765125L14.5946 4.01008C14.594 4.41781 14.1913 4.75196 13.6881 4.75118C13.1867 4.7504 12.7832 4.41874 12.7838 4.00727L12.7889 0.762314ZM2.47762 10.5074C2.42711 10.5073 2.3807 10.2828 2.38113 10.006C2.38156 9.72919 2.42306 9.50669 2.47917 9.50678L4.94844 9.51061C4.99895 9.51069 5.04537 9.7352 5.04494 10.0101C5.04451 10.2869 5.00301 10.5113 4.94689 10.5112L2.47762 10.5074ZM6.41348 10.5135C6.36297 10.5134 6.31656 10.2889 6.31699 10.0121C6.31741 9.7353 6.35891 9.5128 6.41503 9.51289L8.8843 9.51672C8.93481 9.5168 8.98123 9.74131 8.9808 10.0162C8.98037 10.293 8.93887 10.5174 8.88275 10.5173L6.41348 10.5135ZM10.3493 10.5196C10.2988 10.5195 10.2524 10.295 10.2528 10.0182C10.2533 9.74141 10.2929 9.51891 10.3509 9.519L12.8202 9.52283C12.8707 9.52291 12.9171 9.74555 12.9167 10.0205C12.6695 10.1735 12.4317 10.3414 12.2032 10.5225L10.3493 10.5196ZM2.47877 13.3802C2.42827 13.3801 2.38185 13.1556 2.38228 12.8788C2.38271 12.602 2.42421 12.3776 2.48033 12.3777L4.9496 12.3815C5.0001 12.3816 5.04652 12.6061 5.04609 12.8829C5.04566 13.1597 5.00416 13.3841 4.94804 13.384L2.47877 13.3802ZM6.41463 13.3863C6.36413 13.3862 6.31771 13.1617 6.31814 12.8849C6.31857 12.6081 6.36007 12.3837 6.41619 12.3838L8.88546 12.3876C8.93596 12.3877 8.98238 12.6122 8.98195 12.889C8.98152 13.1658 8.94002 13.3902 8.8839 13.3901L6.41463 13.3863ZM2.47993 16.2529C2.42942 16.2529 2.383 16.0284 2.38343 15.7516C2.38386 15.4747 2.42536 15.2504 2.48148 15.2505L4.95075 15.2543C5.00126 15.2544 5.04767 15.4789 5.04724 15.7557C5.04681 16.0325 5.00531 16.2569 4.94919 16.2568L2.47993 16.2529ZM6.41579 16.259C6.36528 16.259 6.31886 16.0345 6.31929 15.7577C6.31972 15.4809 6.36122 15.2565 6.41734 15.2566L8.88661 15.2604C8.93712 15.2605 8.98353 15.485 8.9831 15.7618C8.98267 16.0386 8.94117 16.263 8.88505 16.2629L6.41579 16.259ZM4.66086 0.749696C4.6615 0.340102 5.06608 0.00781765 5.56741 0.00859593C6.06875 0.00937421 6.4723 0.341043 6.47166 0.752507L6.46662 3.99746C6.46599 4.40519 6.06141 4.73934 5.56007 4.73856C5.05874 4.73779 4.65519 4.40612 4.65583 3.99465L4.66086 0.749696V0.749696ZM1.01632 7.09557L18.2488 7.12232L18.2546 3.38734C18.2548 3.25829 18.2026 3.14787 18.1223 3.06545C18.0401 2.98303 17.9223 2.93235 17.8007 2.93216L16.1489 2.92959C15.8721 2.92916 15.648 2.70438 15.6484 2.42758C15.6488 2.15077 15.8755 1.92669 16.1505 1.92712L17.8023 1.92968C18.2064 1.93031 18.569 2.09359 18.8342 2.35958C19.0995 2.62557 19.2616 2.98866 19.261 3.39265L19.2518 9.32334C18.9227 9.20874 18.5843 9.11657 18.2365 9.0487L18.2379 8.12291L18.2491 8.12293L1.01477 8.09617L0.99975 17.7693C0.99955 17.8984 1.04989 18.0088 1.13207 18.0912C1.21425 18.1736 1.33202 18.2243 1.45361 18.2245L9.64335 18.2372C9.73634 18.5852 9.85366 18.9239 9.99345 19.2515L1.46139 19.2382C1.0592 19.2376 0.694677 19.0743 0.429456 18.8083C0.164233 18.5442 0.00204885 18.1811 0.002676 17.7771L0.025053 3.36279C0.0256773 2.96067 0.18899 2.59622 0.455036 2.33105C0.721081 2.06588 1.08424 1.90373 1.4883 1.90436L3.25233 1.90709C3.52919 1.90752 3.75332 2.13231 3.75289 2.40911C3.75246 2.68591 3.52763 2.91 3.25078 2.90957L1.48675 2.90683C1.35767 2.90663 1.24722 2.95696 1.16479 3.03912C1.08235 3.12129 1.03166 3.23904 1.03147 3.36061L1.02567 7.09558L1.01632 7.09557ZM7.91432 2.91494C7.63747 2.91451 7.41334 2.68973 7.41377 2.41292C7.4142 2.13612 7.63902 1.91203 7.91588 1.91246L11.2793 1.91768C11.5562 1.91811 11.7803 2.1429 11.7799 2.4197C11.7794 2.6965 11.5546 2.92059 11.2778 2.92016L7.91432 2.91494Z"
                                                                fill="#393939" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.9599 10.1023C17.7643 10.1035 18.5341 10.2648 19.2352 10.5576C19.9667 10.8599 20.6198 11.3031 21.1679 11.853C21.7142 12.4009 22.1554 13.0592 22.4573 13.7878C22.7479 14.4917 22.9068 15.2601 22.9056 16.0645C22.9043 16.8689 22.743 17.6388 22.4503 18.3398C22.146 19.0694 21.7047 19.7245 21.1549 20.2726C20.605 20.8188 19.9486 21.26 19.22 21.562C18.5161 21.8526 17.7477 22.0115 16.9433 22.0102C16.1389 22.009 15.369 21.8477 14.668 21.5549C13.9384 21.2507 13.2834 20.8094 12.7352 20.2595C12.1871 19.7116 11.7478 19.0533 11.4458 18.3227C11.1553 17.6189 10.9963 16.8505 10.9976 16.0461C10.9988 15.2416 11.1602 14.4737 11.4529 13.7708C11.7571 13.0412 12.1985 12.3861 12.7483 11.838C13.2962 11.2918 13.9545 10.8505 14.6832 10.5486C15.387 10.2599 16.1535 10.101 16.9599 10.1023ZM16.3328 13.7421C16.3329 13.6487 16.3521 13.5592 16.3866 13.4753C16.4229 13.3896 16.4745 13.3134 16.5375 13.2487C16.6005 13.184 16.6788 13.1327 16.7646 13.0985C16.8485 13.0643 16.9381 13.0454 17.0315 13.0455C17.125 13.0457 17.2145 13.0649 17.2983 13.0993C17.386 13.1357 17.4621 13.1873 17.5249 13.2503C17.5877 13.3133 17.641 13.3915 17.6752 13.4773C17.7094 13.5594 17.7283 13.6509 17.7281 13.7443L17.7242 16.249L19.3013 17.0864C19.3146 17.094 19.3279 17.1036 19.3413 17.1112C19.4136 17.159 19.4726 17.2182 19.5202 17.2831C19.5715 17.3537 19.6076 17.4338 19.6285 17.5177C19.6493 17.6035 19.6549 17.695 19.6433 17.7846C19.6317 17.8722 19.603 17.958 19.5571 18.0361L19.5399 18.0646L19.5266 18.0818C19.4788 18.1503 19.4215 18.2093 19.3586 18.2531C19.2879 18.3044 19.2078 18.3405 19.1258 18.3614C19.04 18.3822 18.9485 18.3878 18.8589 18.3762C18.7713 18.3646 18.6855 18.3359 18.6075 18.29L16.6952 17.2634C16.64 17.2347 16.5905 17.1984 16.5486 17.1564C16.5048 17.1144 16.4649 17.0667 16.4326 17.0133L16.4288 17.0057C16.3964 16.9522 16.3717 16.8969 16.3547 16.8378C16.3376 16.7768 16.3282 16.7139 16.3283 16.6491L16.3328 13.7421Z"
                                                                fill="#323232" />
                                                        </svg>

                                                    </div>
                                                    <span
                                                        class=" fs-6">{{ Carbon\Carbon::parse($consult->date)->format('d.m.Y') }},
                                                        {{ $consult->time }}</span>
                                                </div>
                                            </li>



                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="text-end" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                            style="cursor:pointer;">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 35.0005C7.85197 35.0005 0 27.1485 0 17.5005C0 7.85246 7.85197 0.000488281 17.5 0.000488281C27.148 0.000488281 35 7.85246 35 17.5005C35 27.1485 27.148 35.0005 17.5 35.0005Z"
                                    fill="#5288F5" />
                                <path
                                    d="M25.0588 19.0005H10.9412C10.4211 19.0005 10 18.5531 10 18.0005C10 17.4479 10.4211 17.0005 10.9412 17.0005H25.0588C25.5789 17.0005 26 17.4479 26 18.0005C26 18.5531 25.5789 19.0005 25.0588 19.0005Z"
                                    fill="white" />
                                <path
                                    d="M18 26.0005C17.4474 26.0005 17 25.5794 17 25.0593V18.0005V10.9417C17 10.4215 17.4474 10.0005 18 10.0005C18.5526 10.0005 19 10.4215 19 10.9417V25.0593C19 25.5794 18.5526 26.0005 18 26.0005Z"
                                    fill="white" />
                            </svg>
                        </div>

                    </div>
                </div>
                {{-- Modali --}}
                <div class="modal fade" style="top: 1% !important;" id="exampleModal2" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-3" style="border-radius: 23px !important;">
                            <div class="modal-header" style="border-bottom: 0 !important;">
                                <span class="modal-title mx-2 fs-5" id="exampleModalLabel"
                                    style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343;">Mitarbeiterbesprechungen</span>
                                <button type="button"
                                    style="opacity: 1 !important;border: none; background-color: transparent;"
                                    data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="#434343" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg></button>
                            </div>
                            <div class="modal-body px-5 pb-0">
                                <form class="" action="{{ route('addPersonalAppointment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="apporconId" value="2">
                                    <div class="px-2">
                                        <label
                                            style="font-family: 'Montserrat' !important;font-weight: 600;color: #434343">Titel</label>
                                        <input type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="title" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Datum</label>
                                        <input type="date"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="date" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Zeit</label>
                                        <select id="hours2" name="time" class="form-select"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            required>
                                        </select>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Ort</label>
                                        <input type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            name="address" class="form-control mb-3" required>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Kommentar</label>
                                        <textarea type="text"
                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                            rows="3" name="comment" class="form-control mb-3" required>
                                                    </textarea>
                                        <label
                                            style="font-family: 'Montserrat' !important; font-weight: 600;color: #434343;">Zuweisen</label>
                                        <div onclick="toggleDropdown()" class="row g-0 multipleSelectInputDiv">
                                            <div class="col">
                                                <input disabled style="border: none;background:transparent"
                                                    class="" type="text" name=""
                                                    id="multipleSelectInput1">
                                            </div>
                                            <div class="col-auto my-auto">
                                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>

                                            <div id="multipleSelectDropdown1" class="multipleSelectDropdown p-2"
                                                style="z-index: 10">

                                                @foreach ($admins as $admin)
                                                    <label for="checkbox1{{ $admin->id }}" class="memberLabel">
                                                        <input onchange="checkboxes()"
                                                            id="checkbox1{{ $admin->id }}"
                                                            value="{{ $admin->id }}" class="memberCheckmarkselect1"
                                                            type="checkbox" name="roleid[]">{{ ucfirst($admin->name) }}
                                                        <span class="memberCheckmark"></span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <script>
                                            var x = document.querySelectorAll('.memberCheckmarkselect1:checked').length;
                                            document.getElementById('multipleSelectInput1').placeholder = x + ' Optionen ausgewählt';

                                            function toggleDropdown() {
                                                if (document.getElementById('multipleSelectDropdown1').style.display == "block") {
                                                    document.getElementById('multipleSelectDropdown1').style.display = "none";
                                                } else {
                                                    document.getElementById('multipleSelectDropdown1').style.display = "block";

                                                }
                                            }

                                            function checkboxes() {
                                                var x = document.querySelectorAll('.memberCheckmarkselect1:checked').length;
                                                document.getElementById('multipleSelectInput1').placeholder = x + ' Optionen ausgewählt';
                                            }
                                        </script>
                                    </div>
                                    <div class="modal-footer px-1 pt-4 pb-0"
                                        style="border-top: 0 !important; justify-content: flex-start !important;">
                                        <div class="row" style="width: 100%;">
                                            <div class="col-6 ps-0 pe-1">
                                                <div>
                                                    <button type="submit" class="btn py-1" data-bs-dismiss="modal"
                                                        style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid rgb(12, 113, 195); font-size: 16px !important; background-color: #fff; color: rgb(12, 113, 195); border-radius: 9px;">
                                                        Schliessen
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-6 ps-1 pe-0">
                                                <div>
                                                    <input type="submit"
                                                        style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid rgb(12, 113, 195); font-weight: 600 !important; font-size: 16px !important; background-color: rgb(12, 113, 195); color: #fff; border-radius: 9px;"
                                                        class="btn py-1" value="Speichern">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            @endif
        </div>
    @endif
    @if (in_array('salesmanager', $urole))
        <div class="modal fade" id="finstatus" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #f8f8f8; border-radius: 43px">
                    <div class="modal-header mx-3 pt-4" style="border-bottom: none !important;">
                        <h4>Status</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="opacity: 1 !important;"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center my-1 fw-bold"
                                    style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                    {{ $zuruckCount }}
                                    <br>
                                    Zuruckgezogen
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center my-1 fw-bold"
                                    style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                    {{ $abgCount }}
                                    <br>
                                    Abgelehnt
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="text-center my-1 fw-bold"
                                    style="padding: 15px;background-color: #eeeeee;border-radius: 15px">
                                    {{ $offenCount }}
                                    <br>
                                    Offen
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center my-1 fw-bold"
                                    style="padding: 15px;background-color: #eeeeee; border-radius: 15px">
                                    {{ $aufgenomenCount }}
                                    <br>
                                    Aufgenomen
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="text-center fw-bold"
                                    style="padding: 15px;background-color: #198754;border-radius: 15px">
                                    {{ $provisionertCount }}
                                    <br>
                                    Provisionert
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none !important; display: block;">
                        <div class="row mx-4 pb-4">
                            <div class="col mx-auto">
                                <button type="button" class="btn w-100 px-3"
                                    style=" color: #ffffff !important; background-color: #6C757D !important;border-radius: 8px !important;"
                                    data-bs-dismiss="modal"><b>Schliessen</b></button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="my-4">
            <div class="row mx-4 gx-0 gx-md-4">
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="row g-0 h-100">
                        <div class="col">
                            <div class="">
                                <div class="mb-4">
                                    <div class="">
                                        <div class="row g-0">
                                            <div class="col-12  h-auto">
                                                <div class=" h-100">
                                                    <div class="greyBgStats h-100 p-3 p-md-4">
                                                        <div>
                                                            <div class="row g-0 justify-content-between"
                                                                style="position: relative;">
                                                                <div class="col my-auto">
                                                                    <div>
                                                                        <span class="statsTitleSpan fs-3">Status vom
                                                                            Vertrag</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto my-auto">
                                                                    <div class="statsSelectStyle py-1"
                                                                        onclick="openDropDownSelect()"
                                                                        style="cursor: pointer;">
                                                                        <div class="row g-0">
                                                                            <div class="col ms-2">
                                                                                <div>
                                                                                    <span id="activeDropDownItem">Gesamter
                                                                                        Zeitraum</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto my-auto mx-2 me-1">
                                                                                <div>
                                                                                    <svg width="10" height="6"
                                                                                        viewBox="0 0 10 6"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M9 1L5 5L1 1"
                                                                                            stroke="black"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="statsSelectStyleDropdown"
                                                                        id="dropdownSelectId" style="display: none;">
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,1)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span id="rtest">Heute</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,7)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg class=""
                                                                                            width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Letzte 7 Tage</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,30)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Letzte 30 Tage</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,120)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Letztes Quartal</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,365)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Letztes Jahr</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="py-2">
                                                                            <div class="row g-0"
                                                                                onclick="makeSelectActive(this,0)">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg class="activeSvg"
                                                                                            width="19"
                                                                                            height="19"
                                                                                            viewBox="0 0 19 19"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="9.5"
                                                                                                cy="9.5"
                                                                                                r="9"
                                                                                                fill="#fff"
                                                                                                stroke="#E0E0E0" />
                                                                                            <ellipse cx="9.5"
                                                                                                cy="9.416"
                                                                                                rx="5.5"
                                                                                                ry="5"
                                                                                                fill="white" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Gesamter Zeitraum</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="py-2"
                                                                            style="border-top: 1px solid #E8E8E8;">
                                                                            <div class="row g-0"
                                                                                onclick="statusvomvertragCostum()"
                                                                                style="cursor: pointer">
                                                                                <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <svg width="18"
                                                                                            height="12"
                                                                                            viewBox="0 0 12 12"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                fill="black" />
                                                                                        </svg>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col my-auto ps-2 pe-5">
                                                                                    <div>
                                                                                        <span>Individueller Zeitraum</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="statusvomvertragCostum"
                                                                            style="display: none">
                                                                            <div class="py-2">
                                                                                <div class="row g-0">
                                                                                    {{-- <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <span class="fs-6">Aus</span>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    <div class="col my-auto ps-2 pe-2">
                                                                                        <div>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="statusvomvertragFrom">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pt-1">
                                                                                <div class="row g-0">
                                                                                    {{-- <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <span class="fs-6">Zu</span>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    <div class="col my-auto ps-2 pe-2">
                                                                                        <div>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="statusvomvertragTo">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pb-2 pt-2">
                                                                                <div class="row g-0">
                                                                                    <div class="col my-auto ps-2 pe-2">
                                                                                        <div>
                                                                                            <input
                                                                                                onclick="makeSelectActive(this,100)"
                                                                                                class="col-12 py-1"
                                                                                                type="button"
                                                                                                value="Suche"
                                                                                                style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="greyBorderDivStats p-2">
                                                                <div class="row g-0">
                                                                    <div class="col pe-2">
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <select
                                                                                    class="form-select greySelectStats py-1 px-1"
                                                                                    aria-label="Default select example"
                                                                                    name="berater" id="berater">
                                                                                    <option value="all">Alle</option>
                                                                                    @foreach ($adminsStat as $admin)
                                                                                        <option
                                                                                            value="{{ $admin->id }}">
                                                                                            {{ ucfirst($admin->name) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pe-2">
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <select
                                                                                    class="form-select greySelectStats py-1 px-1"
                                                                                    aria-label="Default select example"
                                                                                    name="model" id="model">
                                                                                    <option value="all">Alle</option>
                                                                                    <option value="Grundversicherung">
                                                                                        Grundversicherung</option>
                                                                                    <option value="Zusatzversicherung">
                                                                                        Zusatzversicherung</option>
                                                                                    <option value="Autoversicherung">
                                                                                        Autoversicherung</option>
                                                                                    <option value="Hasurat">Hausrat
                                                                                    </option>
                                                                                    <option value="Vorsorge">Vorsorge
                                                                                    </option>
                                                                                    <option value="Rechtsschutz">
                                                                                        Rechtsschutz</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pe-2">
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <select
                                                                                    class="form-select greySelectStats py-1 px-1"
                                                                                    aria-label="Default select example"
                                                                                    name="gesellschaft"
                                                                                    id="gesellschaft">
                                                                                    <option value="all">Alle</option>
                                                                                    <option value="Sympany">Sympany
                                                                                    </option>
                                                                                    <option value="Helsana">Helsana
                                                                                    </option>
                                                                                    <option value="Swica">Swica</option>
                                                                                    <option value="GM">GM</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button
                                                                        style="border: none;background-color: transparent"
                                                                        onclick="statisticContrats()"
                                                                        class="col-auto my-auto">
                                                                        <svg width="17" height="17"
                                                                            viewBox="0 0 19 19" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M18.3312 17.2279L13.0046 11.8974C14.0547 10.6381 14.6863 9.02865 14.6863 7.27086C14.6863 3.26066 11.3952 0 7.34696 0C3.29871 0 0 3.26447 0 7.27467C0 11.2849 3.2911 14.5455 7.33935 14.5455C9.05909 14.5455 10.6419 13.9558 11.8974 12.9704L17.2431 18.316C17.5551 18.628 18.0193 18.628 18.3312 18.316C18.6432 18.004 18.6432 17.5399 18.3312 17.2279ZM1.55994 7.27467C1.55994 4.12434 4.15478 1.56375 7.33935 1.56375C10.5239 1.56375 13.1187 4.12434 13.1187 7.27467C13.1187 10.425 10.5239 12.9856 7.33935 12.9856C4.15478 12.9856 1.55994 10.4212 1.55994 7.27467Z"
                                                                                fill="#5E5A5A" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3 row g-0">
                                                            <div class="col-12 col-sm-6 my-auto">
                                                                <div id="chart1" style="height: 300px;">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-12 col-sm-6 my-auto ps-0 ps-sm-4 pt-4 pt-sm-0">
                                                                <div class="">
                                                                    <div class="row g-0 pb-3">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="18" height="17"
                                                                                viewBox="0 0 18 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <ellipse cx="9" cy="8.5"
                                                                                    rx="9" ry="8.5"
                                                                                    fill="#43B21C" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <span
                                                                                style="font-weight: 500;">Provisionert</span>
                                                                        </div>
                                                                        <div class="col-2 text-end">
                                                                            <span style="font-weight: 700;"
                                                                                id="provisionert"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row g-0 pb-3">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="18" height="17"
                                                                                viewBox="0 0 18 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <ellipse cx="9" cy="8.5"
                                                                                    rx="9" ry="8.5"
                                                                                    fill="#9FD78C" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <span
                                                                                style="font-weight: 500;">Aufgenommen</span>
                                                                        </div>
                                                                        <div class="col-2 text-end">
                                                                            <span style="font-weight: 700;"
                                                                                id="aufgenommen"></span>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="row g-0 pb-3">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5" fill="#F79C42"/>
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <span style="font-weight: 500;">Offen (Berater)</span>
                                                                        </div>
                                                                        <div class="col-2 text-end">
                                                                            <span style="font-weight: 700;" id="offenBerater"></span>
                                                                        </div>
                                                                    </div> --}}
                                                                    {{-- <div class="row g-0 pb-3"> --}}
                                                                    {{-- <div class="col-auto my-auto me-2"> --}}
                                                                    {{-- <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                                                    {{-- <ellipse cx="9" cy="8.5" rx="9" ry="8.5" fill="#F79C42"/> --}}
                                                                    {{-- </svg> --}}
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="col"> --}}
                                                                    {{-- <span style="font-weight: 500;">Offen (Innendienst)</span> --}}
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="col-2 text-end"> --}}
                                                                    {{-- <span style="font-weight: 700;" id="offenInnendienst"></span> --}}
                                                                    {{-- </div> --}}
                                                                    {{-- </div> --}}
                                                                    <div class="row g-0 pb-3">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="18" height="17"
                                                                                viewBox="0 0 18 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <ellipse cx="9" cy="8.5"
                                                                                    rx="9" ry="8.5"
                                                                                    fill="#C4C4C4" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <span
                                                                                style="font-weight: 500;">Eingereicht</span>
                                                                        </div>
                                                                        <div class="col-2 text-end">
                                                                            <span style="font-weight: 700;"
                                                                                id="eingereicht"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row g-0 pb-3">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="18" height="17"
                                                                                viewBox="0 0 18 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <ellipse cx="9" cy="8.5"
                                                                                    rx="9" ry="8.5"
                                                                                    fill="#DB5437" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <span
                                                                                style="font-weight: 500;">Abgelehnt</span>
                                                                        </div>
                                                                        <div class="col-2 text-end">
                                                                            <span style="font-weight: 700;"
                                                                                id="abgelehnt"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-0 mt-md-2 mb-4 mb-md-0">
                                                <div class="ms-0 mt-4 mt-md-0 greyBgStats h-100 p-3 p-md-4">
                                                    <div>
                                                        <div class="row g-0 justify-content-between"
                                                            style="position: relative;">
                                                            <div class="col my-auto">
                                                                <div>
                                                                    <span class="statsTitleSpan fs-3">Vertrag</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="statsSelectStyle py-1"
                                                                    onclick="openDropDownSelect1()"
                                                                    style="cursor: pointer;">
                                                                    <div class="row g-0">
                                                                        <div class="col ms-2">
                                                                            <div>
                                                                                <span id="activeDropDownItem1">Gesamter
                                                                                    Zeitraum</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto my-auto mx-2 me-1">
                                                                            <div>
                                                                                <svg width="10" height="6"
                                                                                    viewBox="0 0 10 6" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9 1L5 5L1 1"
                                                                                        stroke="black" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="statsSelectStyleDropdown"
                                                                    id="dropdownSelectId1" style="display: none;">
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,1)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Heute</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,7)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg class="activeSvg1"
                                                                                        width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Letzte 7 Tage</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,30)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Letzte 30 Tage</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,120)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Letztes Quartal</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,365)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Letztes Jahr</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2">
                                                                        <div class="row g-0"
                                                                            onclick="makeSelectActive1(this,0)">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="19" height="19"
                                                                                        viewBox="0 0 19 19"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <circle cx="9.5"
                                                                                            cy="9.5"
                                                                                            r="9"
                                                                                            fill="#fff"
                                                                                            stroke="#E0E0E0" />
                                                                                        <ellipse cx="9.5"
                                                                                            cy="9.416"
                                                                                            rx="5.5"
                                                                                            ry="5"
                                                                                            fill="white" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Gesamter Zeitraum</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="py-2"
                                                                        style="border-top: 1px solid #E8E8E8;">
                                                                        <div class="row g-0" onclick="vertragCostum()"
                                                                            style="cursor: pointer">
                                                                            <div class="col-auto my-auto ps-3">
                                                                                <div>
                                                                                    <svg width="18" height="12"
                                                                                        viewBox="0 0 12 12"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                            fill="black" />
                                                                                    </svg>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col my-auto ps-2 pe-5">
                                                                                <div>
                                                                                    <span>Individueller Zeitraum</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="vertragCostum" style="display: none">
                                                                        <div class="py-2">
                                                                            <div class="row g-0">
                                                                                {{-- <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <span class="fs-6">Aus</span>
                                                                                    </div>
                                                                                </div> --}}
                                                                                <div class="col my-auto ps-2 pe-2">
                                                                                    <div>
                                                                                        <input class="form-control"
                                                                                            type="date"
                                                                                            id="vertragFrom">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <div class="row g-0">
                                                                                {{-- <div class="col-auto my-auto ps-3">
                                                                                    <div>
                                                                                        <span class="fs-6">Zu</span>
                                                                                    </div>
                                                                                </div> --}}
                                                                                <div class="col my-auto ps-2 pe-2">
                                                                                    <div>
                                                                                        <input class="form-control"
                                                                                            type="date"
                                                                                            id="vertragTo">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pb-2 pt-2">
                                                                            <div class="row g-0">
                                                                                <div class="col my-auto ps-2 pe-2">
                                                                                    <div>
                                                                                        <input
                                                                                            onclick="makeSelectActive1(this,100)"
                                                                                            class="col-12 py-1"
                                                                                            type="button"
                                                                                            value="Suche"
                                                                                            style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3">
                                                        <div class="row g-2">
                                                            {{-- grund --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#FEE4CB" />
                                                                                <path
                                                                                    d="M50.3199 18.0194C49.8904 17.6965 49.334 17.595 48.8182 17.7456C47.8719 18.0217 46.9065 18.1617 45.949 18.1617C43.1999 18.1617 40.4774 17.3564 38.4799 15.9521C36.716 14.7123 35.7044 13.164 35.7044 11.7044C35.7044 10.7631 34.9412 10 33.9999 10C33.0586 10 32.2955 10.7631 32.2955 11.7044C32.2955 13.164 31.2839 14.7123 29.5201 15.9522C27.5226 17.3564 24.8003 18.1617 22.0511 18.1617C21.0935 18.1617 20.1281 18.0217 19.1819 17.7456C18.6659 17.595 18.1096 17.6966 17.6802 18.0194C17.2508 18.3424 16.9988 18.8488 17 19.386C17.0231 28.4503 21.0068 35.5822 23.3793 39.0267C25.0388 41.4357 26.897 43.5138 28.7535 45.0363C30.1223 46.159 32.1438 47.4974 33.9999 47.4974C35.8561 47.4974 37.8775 46.159 39.2465 45.0363C41.103 43.5138 42.9612 41.4357 44.6206 39.0267C46.9932 35.5822 50.9769 28.4503 51 19.386C51.0014 18.8488 50.7493 18.3424 50.3199 18.0194ZM41.8133 37.093C38.4082 42.0365 35.0442 44.0885 33.9999 44.0885C32.9557 44.0885 29.5917 42.0365 26.1865 37.0931C24.226 34.2467 21.0507 28.6285 20.4934 21.4794C21.0119 21.5401 21.5318 21.5707 22.051 21.5707C25.5359 21.5707 28.8847 20.5657 31.4805 18.741C32.4887 18.0322 33.3357 17.2276 33.9999 16.3625C34.6643 17.2277 35.5111 18.0322 36.5194 18.741C39.1152 20.5657 42.464 21.5707 45.9489 21.5707C46.4679 21.5707 46.9879 21.5401 47.5064 21.4794C46.9491 28.6285 43.7739 34.2466 41.8133 37.093Z"
                                                                                    fill="#FF9B37" />
                                                                                <path
                                                                                    d="M34.0003 29.1156C36.2981 29.1156 38.1608 27.2529 38.1608 24.9551C38.1608 22.6573 36.2981 20.7946 34.0003 20.7946C31.7026 20.7946 29.8398 22.6573 29.8398 24.9551C29.8398 27.2529 31.7026 29.1156 34.0003 29.1156Z"
                                                                                    fill="#FF9B37" />
                                                                                <path
                                                                                    d="M34 29.1156C30.4258 29.1156 27.5283 32.0129 27.5283 35.5874H40.4717C40.4717 32.0129 37.5742 29.1156 34 29.1156Z"
                                                                                    fill="#FF9B37" />
                                                                            </svg>

                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Grundversicherung</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="grund"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- zuzat --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#D3E2CD" />
                                                                                <path
                                                                                    d="M50.3199 18.0194C49.8904 17.6965 49.334 17.595 48.8182 17.7456C47.8719 18.0217 46.9065 18.1617 45.949 18.1617C43.1999 18.1617 40.4774 17.3564 38.4799 15.9521C36.716 14.7123 35.7044 13.164 35.7044 11.7044C35.7044 10.7631 34.9412 10 33.9999 10C33.0586 10 32.2955 10.7631 32.2955 11.7044C32.2955 13.164 31.2839 14.7123 29.5201 15.9522C27.5226 17.3564 24.8003 18.1617 22.0511 18.1617C21.0935 18.1617 20.1281 18.0217 19.1819 17.7456C18.6659 17.595 18.1096 17.6966 17.6802 18.0194C17.2508 18.3424 16.9988 18.8488 17 19.386C17.0231 28.4503 21.0068 35.5822 23.3793 39.0267C25.0388 41.4357 26.897 43.5138 28.7535 45.0363C30.1223 46.159 32.1438 47.4974 33.9999 47.4974C35.8561 47.4974 37.8775 46.159 39.2465 45.0363C41.103 43.5138 42.9612 41.4357 44.6206 39.0267C46.9932 35.5822 50.9769 28.4503 51 19.386C51.0014 18.8488 50.7493 18.3424 50.3199 18.0194ZM41.8133 37.093C38.4082 42.0365 35.0442 44.0885 33.9999 44.0885C32.9557 44.0885 29.5917 42.0365 26.1865 37.0931C24.226 34.2467 21.0507 28.6285 20.4934 21.4794C21.0119 21.5401 21.5318 21.5707 22.051 21.5707C25.5359 21.5707 28.8847 20.5657 31.4805 18.741C32.4887 18.0322 33.3357 17.2276 33.9999 16.3625C34.6643 17.2277 35.5111 18.0322 36.5194 18.741C39.1152 20.5657 42.464 21.5707 45.9489 21.5707C46.4679 21.5707 46.9879 21.5401 47.5064 21.4794C46.9491 28.6285 43.7739 34.2466 41.8133 37.093Z"
                                                                                    fill="#228400" />
                                                                                <path
                                                                                    d="M34.0003 29.1156C36.2981 29.1156 38.1608 27.2529 38.1608 24.9551C38.1608 22.6573 36.2981 20.7946 34.0003 20.7946C31.7026 20.7946 29.8398 22.6573 29.8398 24.9551C29.8398 27.2529 31.7026 29.1156 34.0003 29.1156Z"
                                                                                    fill="#228400" />
                                                                                <path
                                                                                    d="M34 29.1156C30.4258 29.1156 27.5283 32.0129 27.5283 35.5874H40.4717C40.4717 32.0129 37.5742 29.1156 34 29.1156Z"
                                                                                    fill="#228400" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Zusatzversicherung</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="zus"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- Auto --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#D3E2CD" />
                                                                                <path
                                                                                    d="M40.46 11C43.1922 11 45.5741 12.7541 46.2383 15.2554L46.9443 17.9201H48.6178C49.3138 17.9201 49.8889 18.4082 49.98 19.0416L49.9925 19.2176C49.9925 19.8745 49.4752 20.4174 48.8044 20.5033L48.6178 20.5152H47.6354L48.0166 21.945C49.2058 22.628 50 23.8628 50 25.2727V39.9724C50 41.6445 48.5639 43 46.7924 43H44.0355C42.264 43 40.8279 41.6445 40.8279 39.9724L40.8261 37.8154H26.1719L26.1721 39.9724C26.1721 41.6445 24.736 43 22.9645 43H20.2076C18.4361 43 17 41.6445 17 39.9724V25.2727C17 23.8631 17.7939 22.6284 18.9828 21.9453L19.3626 20.5152H18.3747C17.6787 20.5152 17.1036 20.027 17.0126 19.3937L17 19.2176C17 18.5607 17.5172 18.0179 18.1882 17.932L18.3747 17.9201H20.0481L20.7556 15.2589C21.4186 12.7559 23.8013 11 26.5347 11H40.46ZM23.4225 37.8154H19.7475L19.7494 39.9724C19.7494 40.2112 19.9545 40.405 20.2076 40.405H22.9645C23.2175 40.405 23.4227 40.2112 23.4227 39.9724L23.4225 37.8154ZM47.2504 37.8154H43.5754L43.5773 39.9724C43.5773 40.2112 43.7824 40.405 44.0355 40.405H46.7924C47.0455 40.405 47.2506 40.2112 47.2506 39.9724L47.2504 37.8154ZM45.8759 23.9752H21.1241C20.3648 23.9752 19.7494 24.5562 19.7494 25.2727V35.2204H47.2506V25.2727C47.2506 24.5562 46.6351 23.9752 45.8759 23.9752ZM30.2868 30.0303H36.7051C37.4645 30.0303 38.0798 30.6113 38.0798 31.3278C38.0798 31.9847 37.5627 32.5276 36.8917 32.6136L36.7051 32.6254H30.2868C29.5276 32.6254 28.9121 32.0444 28.9121 31.3278C28.9121 30.6709 29.4293 30.1281 30.1002 30.0421L30.2868 30.0303ZM42.6608 26.5703C43.673 26.5703 44.4936 27.3448 44.4936 28.3003C44.4936 29.2556 43.673 30.0301 42.6608 30.0301C41.6485 30.0301 40.8279 29.2556 40.8279 28.3003C40.8279 27.3448 41.6485 26.5703 42.6608 26.5703ZM24.3316 26.5703C25.3439 26.5703 26.1645 27.3448 26.1645 28.3003C26.1645 29.2556 25.3439 30.0301 24.3316 30.0301C23.3193 30.0301 22.4987 29.2556 22.4987 28.3003C22.4987 27.3448 23.3193 26.5703 24.3316 26.5703ZM40.46 13.595H26.5347C25.0628 13.595 23.7799 14.5405 23.4229 15.8883L21.9683 21.3802H45.0306L43.5714 15.8864C43.2138 14.5396 41.9311 13.595 40.46 13.595Z"
                                                                                    fill="#238400" />
                                                                            </svg>

                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Autoversicherung</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="auto"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- vorsorge --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#C0C4DC" />
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M28.273 13.5693C28.273 12.0544 29.4698 10.827 30.9454 10.827C32.421 10.827 33.6179 12.0544 33.6179 13.5693C33.6179 15.0841 32.421 16.3115 30.9454 16.3115C29.4698 16.3115 28.273 15.0841 28.273 13.5693ZM30.9454 9C28.4852 9 26.4914 11.0461 26.4914 13.5693C26.4914 14.0477 26.5631 14.5089 26.696 14.9424H26.1645C25.7531 14.9424 25.2966 15.1129 24.9013 15.3256C24.4784 15.5531 24.0212 15.885 23.5978 16.3189C22.7463 17.1912 22 18.512 22 20.2503C22 22.389 22.6916 23.9514 23.547 24.9896C23.9701 25.5033 24.4319 25.8868 24.8653 26.1469C24.9964 26.2255 25.1336 26.2982 25.2738 26.3604V43.5932C25.2738 44.919 26.3278 46 27.6206 46L27.6239 45.9999H27.6345L27.6377 46C28.9305 46 29.9846 44.919 29.9846 43.5932V33.8624H31.9888V43.5932C31.9888 44.919 33.0429 46 34.3357 46L34.339 45.9999H34.3496L34.3528 46C35.6456 46 36.6997 44.919 36.6997 43.5932V26.4781L36.9145 27.1093C37.2163 27.9966 37.9983 28.5717 38.8576 28.6354C38.1332 29.1257 37.6552 29.9679 37.6552 30.9245V31.5336C37.6552 32.0381 38.0541 32.4471 38.546 32.4471C39.038 32.4471 39.4368 32.0381 39.4368 31.5336V30.9245C39.4368 30.42 39.8356 30.011 40.3276 30.011C40.8196 30.011 41.2184 30.42 41.2184 30.9245V43.7138C41.2184 44.2184 41.6172 44.6273 42.1092 44.6273C42.6012 44.6273 43 44.2184 43 43.7138V30.9245C43 29.42 41.8178 28.1987 40.3541 28.184C41.1094 27.6031 41.4473 26.5675 41.1198 25.6045L38.222 17.0872C37.7851 15.8034 36.6042 14.9433 35.2782 14.9433H35.1946C35.3277 14.5095 35.3995 14.048 35.3995 13.5693C35.3995 11.0461 33.4057 9 30.9454 9ZM26.1645 16.7694H27.7662C28.5744 17.6143 29.7002 18.1385 30.9454 18.1385C32.1902 18.1385 33.3157 17.6147 34.1238 16.7703H35.2782C35.8465 16.7703 36.3525 17.1389 36.5398 17.6891L39.4376 26.2065C39.5187 26.4446 39.3961 26.7051 39.1638 26.7882C38.9316 26.8713 38.6776 26.7455 38.5965 26.5074L36.65 20.786L34.9181 21.0869V43.5932C34.9181 43.91 34.6617 44.173 34.3528 44.173L34.3496 44.1729H34.339L34.3357 44.173C34.0269 44.173 33.7704 43.91 33.7704 43.5932V32.9489V32.0354H32.8796H29.0938H28.203V32.9489V43.5932C28.203 43.91 27.9467 44.173 27.6377 44.173L27.6345 44.1729H27.6239L27.6206 44.173C27.3118 44.173 27.0553 43.91 27.0553 43.5932V25.6628V24.7493H27.0528V19.9623H25.2712V24.1955C25.151 24.0849 25.0284 23.9569 24.9078 23.8106C24.3265 23.1049 23.7816 21.961 23.7816 20.2503C23.7816 19.0875 24.2718 18.2109 24.857 17.6114C25.1519 17.3093 25.4631 17.0865 25.729 16.9434C25.9842 16.8062 26.1331 16.7761 26.1605 16.7705C26.1646 16.7697 26.166 16.7694 26.1645 16.7694Z"
                                                                                    fill="#515C9F" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Vorsorge
                                                                                        3a&3b</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="vor"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- reschutz --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158V12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514V2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435V1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351V25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8593 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318V54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#FBEBEB" />
                                                                                <path
                                                                                    d="M22.8929 27.5H19.4142C18.5233 27.5 18.0771 26.4229 18.7071 25.7929L32.7929 11.7071C33.1834 11.3166 33.8166 11.3166 34.2071 11.7071L48.2929 25.7929C48.9229 26.4229 48.4767 27.5 47.5858 27.5H43.7143"
                                                                                    stroke="#FF9797" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M21.3213 28.2857V42.0357"
                                                                                    stroke="#FF9797" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M46.0713 28.2857V42.0357"
                                                                                    stroke="#FF9797" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M48.7627 42.4285L19.0627 42.4285"
                                                                                    stroke="#FF9797" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path
                                                                                    d="M36.3379 29.4462C37.095 28.689 37.5134 27.6794 37.5134 26.6081C37.5134 25.5368 37.095 24.5272 36.3379 23.7701C35.5789 23.0129 34.5711 22.5946 33.4998 22.5946C32.4285 22.5946 31.4207 23.0129 30.6618 23.7701C29.9046 24.5272 29.4863 25.5368 29.4863 26.6081C29.4863 27.6794 29.9046 28.6872 30.6618 29.4462C31.1524 29.9368 31.7472 30.2845 32.3967 30.468V33.8303V36.6842V38.038C32.3967 38.6469 32.8909 39.141 33.4998 39.141C34.1087 39.141 34.6029 38.6469 34.6029 38.038V37.7873H35.2348C35.8437 37.7873 36.3379 37.2931 36.3379 36.6842C36.3379 36.0753 35.8437 35.5811 35.2348 35.5811H34.6029V34.9334H35.2348C35.8437 34.9334 36.3379 34.4392 36.3379 33.8303C36.3379 33.2214 35.8437 32.7272 35.2348 32.7272H34.6029V30.4681C35.2524 30.2845 35.8472 29.9368 36.3379 29.4462ZM31.6925 26.6081C31.6925 25.6109 32.5026 24.8008 33.4998 24.8008C34.497 24.8008 35.3071 25.6109 35.3071 26.6081C35.3071 27.6053 34.497 28.4154 33.4998 28.4154C32.5026 28.4154 31.6925 27.6035 31.6925 26.6081Z"
                                                                                    fill="#FF9797" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Rechtsschutz</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="rechts"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- hausrat --}}
                                                            <div
                                                                class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                                    <div class="row g-0">
                                                                        <div class="col-auto">
                                                                            <svg width="66" height="56"
                                                                                viewBox="0 0 66 56" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158V12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514V2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435V1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351V25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8593 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318V54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                                    fill="#DCEBFF" />
                                                                                <path
                                                                                    d="M21.8571 26.4H18.4142C17.5233 26.4 17.0771 25.3229 17.7071 24.6929L31.6929 10.7071C32.0834 10.3166 32.7166 10.3166 33.1071 10.7071L47.0929 24.6929C47.7229 25.3229 47.2767 26.4 46.3858 26.4H42.5524"
                                                                                    stroke="#3670BD" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M20.2949 27.181V40.8476"
                                                                                    stroke="#3670BD" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M44.8955 27.181V40.8476"
                                                                                    stroke="#3670BD" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <path d="M47.5703 41.238L18.0503 41.238"
                                                                                    stroke="#3670BD" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <line x1="26.9557" y1="35.4737"
                                                                                    x2="37.8374" y2="24.816"
                                                                                    stroke="#3670BD" stroke-width="3"
                                                                                    stroke-linecap="round" />
                                                                                <circle cx="37.0857" cy="34.2096"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="37.0857" cy="34.2096"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="37.0857" cy="34.2096"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="37.0857" cy="34.2096"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="28.4949" cy="26.4001"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="28.4949" cy="26.4001"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="28.4949" cy="26.4001"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                                <circle cx="28.4949" cy="26.4001"
                                                                                    r="2.12381" stroke="#3670BD"
                                                                                    stroke-width="2" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="text-end">
                                                                                <div>
                                                                                    <span
                                                                                        class="contractsFirstSpan">Hausrat</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="contractsSecondSpan fs-4"
                                                                                        id="haus"></span>
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
                                            <div class="col-12 mt-2">
                                                <div class="greyBgStats p-3 p-md-4">
                                                    <div>
                                                        <div style="position: relative;">
                                                            <div class="col my-auto">
                                                                <div>
                                                                    <span class="statsTitleSpan fs-3">Leads</span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="row g-0">
                                                                        <div class="col-12 h-auto"
                                                                            style="position: relative;">
                                                                            <div
                                                                                class="whiteBgGraph d-flex flex-column h-100 p-3 justify-content-center">
                                                                                <div class="row g-0 justify-content-end">
                                                                                    <div class="col-auto my-auto mt-3">
                                                                                        <div class="statsSelectStyle py-1"
                                                                                            onclick="openDropDownSelect5()"
                                                                                            style="cursor: pointer;top: -1rem;">
                                                                                            <div class="row g-0">
                                                                                                <div class="col ms-2">
                                                                                                    <div>
                                                                                                        <span
                                                                                                            id="activeDropDownItem5">Gesamter
                                                                                                            Zeitraum</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-auto my-auto mx-2 me-1">
                                                                                                    <div>
                                                                                                        <svg width="10"
                                                                                                            height="6"
                                                                                                            viewBox="0 0 10 6"
                                                                                                            fill="none"
                                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                                            <path
                                                                                                                d="M9 1L5 5L1 1"
                                                                                                                stroke="black"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round" />
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="statsSelectStyleDropdown"
                                                                                            id="dropdownSelectId5"
                                                                                            style="display: none;right: 1rem;top: 3.3rem;">
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,1)">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span
                                                                                                                id="rtest">Letzte
                                                                                                                Tage</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,7)">

                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Letzte 7
                                                                                                                Tage</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,30)">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Letzte 30
                                                                                                                Tage</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,120)">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Letztes
                                                                                                                Quartal</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,365)">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Letztes
                                                                                                                Jahr</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2">
                                                                                                <div class="row g-0"
                                                                                                    onclick="makeSelectActive5(this,0)">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg class="activeSvg5"
                                                                                                                width="19"
                                                                                                                height="19"
                                                                                                                viewBox="0 0 19 19"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <circle
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.5"
                                                                                                                    r="9"
                                                                                                                    fill="#fff"
                                                                                                                    stroke="#E0E0E0" />
                                                                                                                <ellipse
                                                                                                                    cx="9.5"
                                                                                                                    cy="9.416"
                                                                                                                    rx="5.5"
                                                                                                                    ry="5"
                                                                                                                    fill="white" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Gesamter
                                                                                                                Zeitraum</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="py-2"
                                                                                                style="border-top: 1px solid #E8E8E8;">
                                                                                                <div class="row g-0"
                                                                                                    onclick="leadsCostum()"
                                                                                                    style="cursor: pointer">
                                                                                                    <div
                                                                                                        class="col-auto my-auto ps-3">
                                                                                                        <div>
                                                                                                            <svg width="18"
                                                                                                                height="12"
                                                                                                                viewBox="0 0 12 12"
                                                                                                                fill="none"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <path
                                                                                                                    d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                                    fill="black" />
                                                                                                            </svg>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col my-auto ps-2 pe-5">
                                                                                                        <div>
                                                                                                            <span>Individueller
                                                                                                                Zeitraum</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div id="leadsCostum"
                                                                                                style="display: none">
                                                                                                <div class="py-2">
                                                                                                    <div class="row g-0">
                                                                                                        {{-- <div class="col-auto my-auto ps-3">
                                                                                                            <div>
                                                                                                                <span class="fs-6">Aus</span>
                                                                                                            </div>
                                                                                                        </div> --}}
                                                                                                        <div
                                                                                                            class="col my-auto ps-2 pe-2">
                                                                                                            <div>
                                                                                                                <input
                                                                                                                    class="form-control"
                                                                                                                    type="date"
                                                                                                                    id="leadsFrom">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="pt-1">
                                                                                                    <div class="row g-0">
                                                                                                        {{-- <div class="col-auto my-auto ps-3">
                                                                                                            <div>
                                                                                                                <span class="fs-6">Zu</span>
                                                                                                            </div>
                                                                                                        </div> --}}
                                                                                                        <div
                                                                                                            class="col my-auto ps-2 pe-2">
                                                                                                            <div>
                                                                                                                <input
                                                                                                                    class="form-control"
                                                                                                                    type="date"
                                                                                                                    id="leadsTo">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="pb-2 pt-2">
                                                                                                    <div class="row g-0">
                                                                                                        <div
                                                                                                            class="col my-auto ps-2 pe-2">
                                                                                                            <div>
                                                                                                                <input
                                                                                                                    onclick="makeSelectActive5(this,100)"
                                                                                                                    class="col-12 py-1"
                                                                                                                    type="button"
                                                                                                                    value="Suche"
                                                                                                                    style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row g-0">
                                                                                    <div class="" id="chart3">
                                                                                    </div>
                                                                                    {{-- <div class="col-12 col-sm-6 my-auto ps-0 ps-sm-4 pt-0 pt-sm-0">
                                                                                        <div class="">
                                                                                            <div class="row g-0 pb-3">
                                                                                                <div class="col-auto my-auto me-2">
                                                                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                        <ellipse cx="9" cy="8.5" rx="9" ry="8.5" fill="#43B21C"/>
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <span style="font-weight: 500;">Nicht abgeschlossen</span>
                                                                                                </div>
                                                                                                <div class="col-2 text-end">
                                                                                                    <span style="font-weight: 700;"id="notTerminated"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row g-0 pb-3">
                                                                                                <div class="col-auto my-auto me-2">
                                                                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                        <ellipse cx="9" cy="8.5" rx="9" ry="8.5" fill="#DB5437"/>
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <span style="font-weight: 500;">Abgeschlossen</span>
                                                                                                </div>
                                                                                                <div class="col-2 text-end">
                                                                                                    <span style="font-weight: 700;" id="terminated"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
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
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-lg-6 col-xl-6 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path
                                                    d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                                    fill="#DCE4F9" />
                                            </g>
                                            <mask id="path-2-inside-1_28_428" fill="white">
                                                <path
                                                    d="M66 59.5C66.6593 59.5 67.3037 59.3094 67.8519 58.9523C68.4001 58.5952 68.8273 58.0876 69.0796 57.4937C69.3319 56.8999 69.3979 56.2464 69.2693 55.616C69.1407 54.9855 68.8232 54.4064 68.357 53.9519C67.8908 53.4974 67.2969 53.1879 66.6503 53.0624C66.0037 52.937 65.3335 53.0014 64.7244 53.2474C64.1153 53.4934 63.5947 53.9099 63.2284 54.4444C62.8622 54.9789 62.6667 55.6072 62.6667 56.25C62.6667 57.112 63.0179 57.9386 63.643 58.5481C64.2681 59.1576 65.1159 59.5 66 59.5ZM66 68.4416C65.9993 68.1379 66.0619 67.8373 66.184 67.5579C66.3061 67.2786 66.4852 67.0263 66.7104 66.8166L70.4672 63.3594C70.5531 63.2807 70.6635 63.2421 70.7594 63.1781C70.5143 62.5731 70.0884 62.0539 69.5369 61.6878C68.9854 61.3217 68.3338 61.1256 67.6667 61.125H64.3333C63.4493 61.125 62.6014 61.4674 61.9763 62.0769C61.3512 62.6864 61 63.513 61 64.375V69.25C61 69.681 61.1756 70.0943 61.4882 70.399C61.8007 70.7038 62.2246 70.875 62.6667 70.875V77.375C62.6667 77.806 62.8423 78.2193 63.1548 78.524C63.4674 78.8288 63.8913 79 64.3333 79H67.6667C68.1087 79 68.5326 78.8288 68.8452 78.524C69.1577 78.2193 69.3333 77.806 69.3333 77.375V72.4802L66.7104 70.0666C66.4851 69.8569 66.306 69.6046 66.1838 69.3253C66.0617 69.0459 65.9992 68.7452 66 68.4416ZM86 59.5C86.6593 59.5 87.3037 59.3094 87.8519 58.9523C88.4001 58.5952 88.8273 58.0876 89.0796 57.4937C89.3319 56.8999 89.3979 56.2464 89.2693 55.616C89.1407 54.9855 88.8232 54.4064 88.357 53.9519C87.8908 53.4974 87.2969 53.1879 86.6503 53.0624C86.0037 52.937 85.3335 53.0014 84.7244 53.2474C84.1153 53.4934 83.5947 53.9099 83.2284 54.4444C82.8622 54.9789 82.6667 55.6072 82.6667 56.25C82.6667 57.112 83.0179 57.9386 83.643 58.5481C84.2681 59.1576 85.1159 59.5 86 59.5ZM87.6667 61.125H84.3333C83.6662 61.1256 83.0147 61.3216 82.4632 61.6876C81.9118 62.0536 81.4858 62.5727 81.2406 63.1776C81.3365 63.2421 81.449 63.2791 81.5333 63.3599L85.2896 66.8161C85.5141 67.0263 85.6927 67.2786 85.8148 67.5579C85.9368 67.8371 85.9997 68.1375 85.9997 68.4411C85.9997 68.7446 85.9368 69.045 85.8148 69.3242C85.6927 69.6035 85.5141 69.8558 85.2896 70.0661L82.6667 72.4807V77.375C82.6667 77.806 82.8423 78.2193 83.1548 78.524C83.4674 78.8288 83.8913 79 84.3333 79H87.6667C88.1087 79 88.5326 78.8288 88.8452 78.524C89.1577 78.2193 89.3333 77.806 89.3333 77.375V70.875C89.7754 70.875 90.1993 70.7038 90.5118 70.399C90.8244 70.0943 91 69.681 91 69.25V64.375C91 63.513 90.6488 62.6864 90.0237 62.0769C89.3986 61.4674 88.5507 61.125 87.6667 61.125ZM84.1458 67.9977L80.3896 64.5416C80.3009 64.4592 80.1894 64.404 80.0688 64.3829C79.9482 64.3617 79.824 64.3756 79.7114 64.4228C79.5989 64.47 79.5031 64.5484 79.4359 64.6482C79.3686 64.748 79.333 64.8649 79.3333 64.9844V66.8125H72.6667V64.9844C72.6671 64.8649 72.6315 64.7479 72.5644 64.648C72.4972 64.5481 72.4013 64.4696 72.2888 64.4224C72.1762 64.3752 72.0519 64.3612 71.9313 64.3823C71.8107 64.4034 71.6991 64.4586 71.6104 64.5411L67.8542 67.9977C67.7341 68.1157 67.6667 68.2751 67.6667 68.4413C67.6667 68.6075 67.7341 68.7669 67.8542 68.8849L71.6104 72.3416C71.6991 72.424 71.8108 72.4792 71.9314 72.5003C72.0521 72.5214 72.1765 72.5074 72.289 72.4601C72.4016 72.4128 72.4974 72.3343 72.5646 72.2343C72.6317 72.1343 72.6672 72.0173 72.6667 71.8977V70.0625H79.3333V71.8977C79.3328 72.0173 79.3683 72.1343 79.4354 72.2343C79.5026 72.3343 79.5984 72.4128 79.711 72.4601C79.8235 72.5074 79.9479 72.5214 80.0686 72.5003C80.1892 72.4792 80.3009 72.424 80.3896 72.3416L84.1458 68.8849C84.2659 68.7669 84.3333 68.6075 84.3333 68.4413C84.3333 68.2751 84.2659 68.1157 84.1458 67.9977Z" />
                                            </mask>
                                            <path
                                                d="M66 59.5V57.5V59.5ZM62.6667 56.25H60.6667H62.6667ZM66 68.4416L68 68.4471L68 68.4367L66 68.4416ZM66.7104 66.8166L65.3561 65.3449L65.3473 65.3531L66.7104 66.8166ZM70.4672 63.3594L69.1163 61.8845L69.1129 61.8877L70.4672 63.3594ZM70.7594 63.1781L71.8699 64.8414L73.2247 63.9369L72.613 62.4271L70.7594 63.1781ZM67.6667 61.125L67.6685 59.125H67.6667V61.125ZM64.3333 61.125V59.125V61.125ZM61 64.375H59H61ZM61 69.25H59H61ZM62.6667 70.875H64.6667V68.875H62.6667V70.875ZM62.6667 77.375H60.6667H62.6667ZM69.3333 72.4802H71.3333V71.6027L70.6876 71.0085L69.3333 72.4802ZM66.7104 70.0666L65.3477 71.5305L65.3561 71.5383L66.7104 70.0666ZM86 59.5V57.5V59.5ZM87.6667 61.125V59.125V61.125ZM84.3333 61.125V59.125L84.3316 59.125L84.3333 61.125ZM81.2406 63.1776L79.3871 62.4263L78.7773 63.9306L80.124 64.8368L81.2406 63.1776ZM81.5333 63.3599L80.1506 64.8049L80.1647 64.8184L80.1791 64.8317L81.5333 63.3599ZM85.2896 66.8161L86.6567 65.3562L86.6503 65.3502L86.6438 65.3443L85.2896 66.8161ZM85.2896 70.0661L86.6442 71.5375L86.6504 71.5317L86.6567 71.5259L85.2896 70.0661ZM82.6667 72.4807L81.3121 71.0093L80.6667 71.6034V72.4807H82.6667ZM89.3333 70.875V68.875H87.3333V70.875H89.3333ZM84.1458 67.9977L85.5474 66.571L85.5241 66.5481L85.5 66.526L84.1458 67.9977ZM80.3896 64.5416L79.028 66.0065L79.0354 66.0133L80.3896 64.5416ZM79.3333 64.9844H81.3333L81.3333 64.9785L79.3333 64.9844ZM79.3333 66.8125V68.8125H81.3333V66.8125H79.3333ZM72.6667 66.8125H70.6667V68.8125H72.6667V66.8125ZM72.6667 64.9844L70.6667 64.9768V64.9844H72.6667ZM71.6104 64.5411L72.9647 66.0128L72.972 66.006L71.6104 64.5411ZM67.8542 67.9977L66.4999 66.5261L66.4759 66.5481L66.4526 66.571L67.8542 67.9977ZM67.6667 68.4413H69.6667H67.6667ZM67.8542 68.8849L66.4526 70.3116L66.4759 70.3345L66.4999 70.3566L67.8542 68.8849ZM71.6104 72.3416L72.9721 70.8766L72.9647 70.8699L71.6104 72.3416ZM72.6667 71.8977H70.6666L70.6667 71.907L72.6667 71.8977ZM72.6667 70.0625V68.0625H70.6667V70.0625H72.6667ZM79.3333 70.0625H81.3333V68.0625H79.3333V70.0625ZM79.3333 71.8977L81.3333 71.907V71.8977H79.3333ZM80.3896 72.3416L79.0353 70.8699L79.028 70.8766L80.3896 72.3416ZM84.1458 68.8849L85.5001 70.3566L85.5241 70.3345L85.5474 70.3116L84.1458 68.8849ZM66 61.5C67.0437 61.5 68.068 61.1985 68.9436 60.628L66.7602 57.2765C66.5395 57.4203 66.2748 57.5 66 57.5V61.5ZM68.9436 60.628C69.8198 60.0573 70.5104 59.2407 70.9204 58.2757L67.2388 56.7117C67.1442 56.9345 66.9804 57.1331 66.7602 57.2765L68.9436 60.628ZM70.9204 58.2757C71.3306 57.3102 71.4387 56.2447 71.2289 55.2162L67.3096 56.0157C67.3571 56.2481 67.3332 56.4895 67.2388 56.7117L70.9204 58.2757ZM71.2289 55.2162C71.0192 54.188 70.5028 53.2507 69.7532 52.5199L66.9608 55.3839C67.1436 55.5621 67.2622 55.783 67.3096 56.0157L71.2289 55.2162ZM69.7532 52.5199C69.0042 51.7896 68.056 51.2978 67.0311 51.099L66.2695 55.0259C66.5378 55.0779 66.7775 55.2051 66.9608 55.3839L69.7532 52.5199ZM67.0311 51.099C66.0064 50.9003 64.9437 51.0019 63.9754 51.3929L65.4733 55.1019C65.7232 55.0009 66.001 54.9738 66.2695 55.0259L67.0311 51.099ZM63.9754 51.3929C63.0068 51.7841 62.1707 52.4499 61.5787 53.3138L64.8782 55.575C65.0187 55.37 65.2238 55.2026 65.4733 55.1019L63.9754 51.3929ZM61.5787 53.3138C60.9862 54.1783 60.6667 55.2002 60.6667 56.25H64.6667C64.6667 56.0142 64.7381 55.7794 64.8782 55.575L61.5787 53.3138ZM60.6667 56.25C60.6667 57.659 61.2412 58.9997 62.2468 59.9801L65.0392 57.1161C64.7945 56.8776 64.6667 56.5649 64.6667 56.25H60.6667ZM62.2468 59.9801C63.2506 60.9589 64.6016 61.5 66 61.5V57.5C65.6303 57.5 65.2856 57.3563 65.0392 57.1161L62.2468 59.9801ZM68 68.4367C67.9999 68.4115 68.005 68.3853 68.0165 68.359L64.3514 66.7568C64.1187 67.2892 63.9986 67.8643 64 68.4465L68 68.4367ZM68.0165 68.359C68.028 68.3327 68.0465 68.3053 68.0736 68.2801L65.3473 65.3531C64.9239 65.7474 64.5842 66.2244 64.3514 66.7568L68.0165 68.359ZM68.0647 68.2882L71.8215 64.8311L69.1129 61.8877L65.3561 65.3449L68.0647 68.2882ZM71.818 64.8342C71.7424 64.9035 71.6754 64.9511 71.632 64.9796C71.6102 64.9938 71.5929 65.0042 71.5825 65.0103C71.5723 65.0163 71.5664 65.0195 71.5682 65.0185C71.5713 65.0168 71.5752 65.0147 71.5905 65.0065C71.6028 65 71.6251 64.9881 71.6493 64.9747C71.6744 64.9609 71.7068 64.9427 71.7434 64.9211C71.7801 64.8993 71.823 64.8727 71.8699 64.8414L69.6488 61.5148C69.6717 61.4994 69.6903 61.4881 69.7023 61.481C69.7084 61.4774 69.7132 61.4746 69.7163 61.4728C69.7194 61.4711 69.7213 61.47 69.7214 61.47C69.7215 61.4699 69.7204 61.4705 69.7175 61.4721C69.7144 61.4738 69.7106 61.4758 69.7044 61.4791C69.6944 61.4844 69.673 61.4959 69.6509 61.5079C69.5705 61.5518 69.3451 61.675 69.1163 61.8845L71.818 64.8342ZM72.613 62.4271C72.2144 61.4431 71.5251 60.6071 70.643 60.0215L68.4307 63.354C68.6516 63.5006 68.8142 63.7031 68.9057 63.9291L72.613 62.4271ZM70.643 60.0215C69.7615 59.4363 68.7253 59.126 67.6685 59.125L67.6648 63.125C67.9424 63.1253 68.2093 63.2071 68.4307 63.354L70.643 60.0215ZM67.6667 59.125H64.3333V63.125H67.6667V59.125ZM64.3333 59.125C62.935 59.125 61.584 59.6661 60.5801 60.6449L63.3725 63.5089C63.6189 63.2687 63.9636 63.125 64.3333 63.125V59.125ZM60.5801 60.6449C59.5745 61.6253 59 62.966 59 64.375H63C63 64.0601 63.1278 63.7475 63.3725 63.5089L60.5801 60.6449ZM59 64.375V69.25H63V64.375H59ZM59 69.25C59 70.228 59.3989 71.1554 60.092 71.8311L62.8844 68.967C62.9523 69.0332 63 69.134 63 69.25H59ZM60.092 71.8311C60.7833 72.5051 61.7103 72.875 62.6667 72.875V68.875C62.739 68.875 62.8182 68.9025 62.8844 68.967L60.092 71.8311ZM60.6667 70.875V77.375H64.6667V70.875H60.6667ZM60.6667 77.375C60.6667 78.353 61.0656 79.2804 61.7586 79.9561L64.551 77.092C64.6189 77.1582 64.6667 77.259 64.6667 77.375H60.6667ZM61.7586 79.9561C62.4499 80.6301 63.377 81 64.3333 81V77C64.4056 77 64.4848 77.0275 64.551 77.092L61.7586 79.9561ZM64.3333 81H67.6667V77H64.3333V81ZM67.6667 81C68.623 81 69.5501 80.6301 70.2414 79.9561L67.449 77.092C67.5152 77.0275 67.5944 77 67.6667 77V81ZM70.2414 79.9561C70.9344 79.2804 71.3333 78.353 71.3333 77.375H67.3333C67.3333 77.259 67.3811 77.1582 67.449 77.092L70.2414 79.9561ZM71.3333 77.375V72.4802H67.3333V77.375H71.3333ZM70.6876 71.0085L68.0647 68.5949L65.3561 71.5383L67.9791 73.9519L70.6876 71.0085ZM68.0731 68.6027C68.0462 68.5776 68.0278 68.5503 68.0164 68.5241L64.3513 70.1264C64.5841 70.659 64.9241 71.1361 65.3477 71.5305L68.0731 68.6027ZM68.0164 68.5241C68.005 68.4981 67.9999 68.472 68 68.4471L64 68.4361C63.9984 69.0185 64.1185 69.5938 64.3513 70.1264L68.0164 68.5241ZM86 61.5C87.0437 61.5 88.068 61.1985 88.9436 60.628L86.7602 57.2765C86.5395 57.4203 86.2748 57.5 86 57.5V61.5ZM88.9436 60.628C89.8198 60.0573 90.5104 59.2407 90.9204 58.2757L87.2388 56.7117C87.1442 56.9345 86.9804 57.1331 86.7602 57.2765L88.9436 60.628ZM90.9204 58.2757C91.3306 57.3102 91.4387 56.2447 91.2289 55.2162L87.3097 56.0157C87.3571 56.2481 87.3332 56.4895 87.2388 56.7117L90.9204 58.2757ZM91.2289 55.2162C91.0192 54.188 90.5028 53.2507 89.7532 52.5199L86.9608 55.3839C87.1436 55.5621 87.2622 55.783 87.3097 56.0157L91.2289 55.2162ZM89.7532 52.5199C89.0042 51.7896 88.056 51.2978 87.0311 51.099L86.2695 55.0259C86.5378 55.0779 86.7775 55.2051 86.9608 55.3839L89.7532 52.5199ZM87.0311 51.099C86.0064 50.9003 84.9437 51.0019 83.9754 51.3929L85.4733 55.1019C85.7232 55.0009 86.001 54.9738 86.2695 55.0259L87.0311 51.099ZM83.9754 51.3929C83.0068 51.7841 82.1707 52.4499 81.5787 53.3138L84.8782 55.575C85.0187 55.37 85.2238 55.2026 85.4733 55.1019L83.9754 51.3929ZM81.5787 53.3138C80.9862 54.1783 80.6667 55.2002 80.6667 56.25H84.6667C84.6667 56.0142 84.7381 55.7794 84.8782 55.575L81.5787 53.3138ZM80.6667 56.25C80.6667 57.659 81.2412 58.9997 82.2468 59.9801L85.0392 57.1161C84.7945 56.8776 84.6667 56.5649 84.6667 56.25H80.6667ZM82.2468 59.9801C83.2506 60.9589 84.6016 61.5 86 61.5V57.5C85.6303 57.5 85.2856 57.3563 85.0392 57.1161L82.2468 59.9801ZM87.6667 59.125H84.3333V63.125H87.6667V59.125ZM84.3316 59.125C83.275 59.1259 82.2388 59.4361 81.3573 60.0212L83.5692 63.354C83.7906 63.207 84.0575 63.1252 84.3351 63.125L84.3316 59.125ZM81.3573 60.0212C80.4752 60.6066 79.7859 61.4425 79.3871 62.4263L83.0941 63.9289C83.1857 63.7029 83.3484 63.5005 83.5692 63.354L81.3573 60.0212ZM80.124 64.8368C80.1741 64.8705 80.2199 64.8989 80.2589 64.9219C80.2976 64.9448 80.3319 64.9639 80.3581 64.9782C80.3713 64.9854 80.3833 64.9918 80.3933 64.9971C80.4031 65.0023 80.4122 65.0072 80.4186 65.0106C80.4259 65.0144 80.4299 65.0165 80.4339 65.0187C80.4375 65.0205 80.4389 65.0213 80.4391 65.0214C80.4398 65.0218 80.432 65.0176 80.4194 65.0102C80.4066 65.0027 80.3862 64.9905 80.361 64.9738C80.3106 64.9404 80.2346 64.8853 80.1506 64.8049L82.9161 61.9149C82.6725 61.6818 82.4275 61.5493 82.3435 61.5039C82.3201 61.4912 82.2977 61.4794 82.2876 61.4741C82.2813 61.4707 82.2776 61.4688 82.2747 61.4672C82.2719 61.4657 82.2712 61.4653 82.2717 61.4656C82.2726 61.4661 82.2817 61.4711 82.2956 61.4793C82.3097 61.4877 82.3311 61.5007 82.3572 61.5183L80.124 64.8368ZM80.1791 64.8317L83.9354 68.2878L86.6438 65.3443L82.8875 61.8881L80.1791 64.8317ZM83.9225 68.2759C83.9506 68.3022 83.9699 68.3309 83.9821 68.3587L87.6474 66.757C87.4155 66.2264 87.0776 65.7504 86.6567 65.3562L83.9225 68.2759ZM83.9821 68.3587C83.9942 68.3864 83.9997 68.4143 83.9997 68.4411H87.9997C87.9997 67.8608 87.8794 67.2878 87.6474 66.757L83.9821 68.3587ZM83.9997 68.4411C83.9997 68.4678 83.9942 68.4957 83.9821 68.5234L87.6474 70.1251C87.8794 69.5943 87.9997 69.0213 87.9997 68.4411H83.9997ZM83.9821 68.5234C83.9699 68.5512 83.9506 68.5799 83.9225 68.6062L86.6567 71.5259C87.0776 71.1317 87.4155 70.6557 87.6474 70.1251L83.9821 68.5234ZM83.935 68.5946L81.3121 71.0093L84.0213 73.9521L86.6442 71.5375L83.935 68.5946ZM80.6667 72.4807V77.375H84.6667V72.4807H80.6667ZM80.6667 77.375C80.6667 78.353 81.0656 79.2804 81.7586 79.9561L84.551 77.092C84.6189 77.1582 84.6667 77.259 84.6667 77.375H80.6667ZM81.7586 79.9561C82.4499 80.6301 83.377 81 84.3333 81V77C84.4056 77 84.4848 77.0275 84.551 77.092L81.7586 79.9561ZM84.3333 81H87.6667V77H84.3333V81ZM87.6667 81C88.623 81 89.5501 80.6301 90.2414 79.9561L87.449 77.092C87.5152 77.0275 87.5944 77 87.6667 77V81ZM90.2414 79.9561C90.9344 79.2804 91.3333 78.353 91.3333 77.375H87.3333C87.3333 77.259 87.3811 77.1583 87.449 77.092L90.2414 79.9561ZM91.3333 77.375V70.875H87.3333V77.375H91.3333ZM89.3333 72.875C90.2897 72.875 91.2167 72.5051 91.908 71.8311L89.1156 68.967C89.1818 68.9025 89.261 68.875 89.3333 68.875V72.875ZM91.908 71.8311C92.6011 71.1554 93 70.228 93 69.25H89C89 69.134 89.0477 69.0333 89.1156 68.967L91.908 71.8311ZM93 69.25V64.375H89V69.25H93ZM93 64.375C93 62.966 92.4255 61.6253 91.4199 60.6449L88.6275 63.5089C88.8722 63.7475 89 64.0601 89 64.375H93ZM91.4199 60.6449C90.416 59.6661 89.065 59.125 87.6667 59.125V63.125C88.0364 63.125 88.3811 63.2687 88.6275 63.5089L91.4199 60.6449ZM85.5 66.526L81.7438 63.0698L79.0354 66.0133L82.7916 69.4695L85.5 66.526ZM81.7512 63.0766C81.3762 62.7281 80.9104 62.4998 80.4138 62.4128L79.7238 66.3529C79.4684 66.3081 79.2256 66.1902 79.028 66.0065L81.7512 63.0766ZM80.4138 62.4128C79.9174 62.3259 79.4049 62.3827 78.9382 62.5783L80.4847 66.2673C80.243 66.3686 79.9791 66.3976 79.7238 66.3529L80.4138 62.4128ZM78.9382 62.5783C78.471 62.7742 78.0652 63.1029 77.7769 63.5312L81.0948 65.7652C80.9409 65.9938 80.7268 66.1658 80.4847 66.2673L78.9382 62.5783ZM77.7769 63.5312C77.4881 63.96 77.3318 64.4675 77.3333 64.9902L81.3333 64.9785C81.3342 65.2624 81.2492 65.5361 81.0948 65.7652L77.7769 63.5312ZM77.3333 64.9844V66.8125H81.3333V64.9844H77.3333ZM79.3333 64.8125H72.6667V68.8125H79.3333V64.8125ZM74.6667 66.8125V64.9844H70.6667V66.8125H74.6667ZM74.6667 64.992C74.6686 64.469 74.5127 63.9612 74.224 63.532L70.9047 65.764C70.7504 65.5346 70.6656 65.2608 70.6667 64.9768L74.6667 64.992ZM74.224 63.532C73.9359 63.1034 73.53 62.7744 73.0628 62.5783L71.5148 66.2666C71.2727 66.1649 71.0585 65.9928 70.9047 65.764L74.224 63.532ZM73.0628 62.5783C72.596 62.3823 72.0833 62.3254 71.5867 62.4122L72.2759 66.3524C72.0205 66.3971 71.7565 66.368 71.5148 66.2666L73.0628 62.5783ZM71.5867 62.4122C71.0899 62.4991 70.6239 62.7275 70.2488 63.0761L72.972 66.006C72.7743 66.1898 72.5315 66.3077 72.2759 66.3524L71.5867 62.4122ZM70.2561 63.0694L66.4999 66.5261L69.2085 69.4694L72.9647 66.0127L70.2561 63.0694ZM66.4526 66.571C65.9552 67.0596 65.6667 67.7308 65.6667 68.4413H69.6667C69.6667 68.8194 69.513 69.1718 69.2558 69.4245L66.4526 66.571ZM65.6667 68.4413C65.6667 69.1518 65.9552 69.823 66.4526 70.3116L69.2558 67.4582C69.513 67.7108 69.6667 68.0632 69.6667 68.4413H65.6667ZM66.4999 70.3566L70.2561 73.8132L72.9647 70.8699L69.2085 67.4132L66.4999 70.3566ZM70.2488 73.8065C70.6241 74.1553 71.0903 74.3837 71.5873 74.4705L72.2756 70.5302C72.5313 70.5748 72.7742 70.6928 72.972 70.8766L70.2488 73.8065ZM71.5873 74.4705C72.084 74.5573 72.5969 74.5002 73.0638 74.304L71.5143 70.6163C71.7561 70.5147 72.0202 70.4855 72.2756 70.5302L71.5873 74.4705ZM73.0638 74.304C73.5311 74.1076 73.9369 73.7782 74.225 73.3492L70.9042 71.1193C71.0579 70.8904 71.2721 70.718 71.5143 70.6163L73.0638 74.304ZM74.225 73.3492C74.5134 72.9197 74.6691 72.4116 74.6666 71.8884L70.6667 71.907C70.6654 71.623 70.75 71.3489 70.9042 71.1193L74.225 73.3492ZM74.6667 71.8977V70.0625H70.6667V71.8977H74.6667ZM72.6667 72.0625H79.3333V68.0625H72.6667V72.0625ZM77.3333 70.0625V71.8977H81.3333V70.0625H77.3333ZM77.3334 71.8884C77.3309 72.4116 77.4866 72.9197 77.775 73.3492L81.0958 71.1193C81.25 71.3489 81.3346 71.623 81.3333 71.907L77.3334 71.8884ZM77.775 73.3492C78.0631 73.7782 78.4689 74.1076 78.9362 74.304L80.4857 70.6163C80.7279 70.718 80.9421 70.8904 81.0958 71.1193L77.775 73.3492ZM78.9362 74.304C79.4031 74.5002 79.916 74.5573 80.4127 74.4705L79.7244 70.5302C79.9798 70.4855 80.2439 70.5147 80.4857 70.6163L78.9362 74.304ZM80.4127 74.4705C80.9097 74.3837 81.3759 74.1553 81.7512 73.8065L79.028 70.8766C79.2258 70.6928 79.4687 70.5748 79.7244 70.5302L80.4127 74.4705ZM81.7439 73.8132L85.5001 70.3566L82.7915 67.4132L79.0353 70.8699L81.7439 73.8132ZM85.5474 70.3116C86.0447 69.823 86.3333 69.1518 86.3333 68.4413H82.3333C82.3333 68.0632 82.487 67.7108 82.7442 67.4582L85.5474 70.3116ZM86.3333 68.4413C86.3333 67.7308 86.0448 67.0596 85.5474 66.571L82.7442 69.4245C82.487 69.1718 82.3333 68.8194 82.3333 68.4413H86.3333Z"
                                                fill="black" mask="url(#path-2-inside-1_28_428)" />
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0410156" y="0.852783"
                                                    width="150.691" height="144.3" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                        result="hardAlpha" />
                                                    <feOffset dy="4" />
                                                    <feGaussianBlur stdDeviation="18.5" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_28_428" />
                                                    <feBlend mode="normal" in="SourceGraphic"
                                                        in2="effect1_dropShadow_28_428" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>

                                    </div>
                                    <div class="col titleMarginAuto">
                                        <div class="pb-3">
                                            <span class="secondGreyBorderDashSpan">Mitarbeiterbesprechungen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="overFlowDivDashboard">
                                    @if ($consultation->count() == 0)
                                        <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                            style="color: #9F9F9F">
                                            Keine Mitarbeiterbesprechungen
                                        </div>
                                    @else
                                        @foreach ($consultation as $consultation1)
                                            <div class="thirdBorderDivDash ps-2 py-2 my-2">
                                                <ul class="ps-0 mb-0" style="list-style-type: none">
                                                    @foreach ($consultation1 as $consult)
                                                        <li>
                                                            <div class="input-group pb-2">
                                                                <div class="col-auto pe-2 ms-1 my-auto">
                                                                    <svg width="21" height="21"
                                                                        viewBox="0 0 21 21" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M7.49158 12.7802L9.15599 17.4404L9.99333 14.6742L9.58321 14.2462C9.39865 13.9891 9.35764 13.7646 9.46017 13.571C9.68232 13.1528 10.142 13.2309 10.5709 13.2309C11.0203 13.2309 11.5774 13.1495 11.7176 13.6865C11.7654 13.8655 11.7056 14.0542 11.574 14.2462L11.1639 14.6742L12.0012 17.4404L13.5084 12.7802C14.5952 13.7109 17.813 13.898 19.0109 14.5342C19.3903 14.736 19.732 14.9915 20.0072 15.3364C20.4241 15.862 20.6804 16.5471 20.7505 17.4176L21 18.9357C20.9385 19.5508 20.5728 19.9055 19.8499 19.9592H10.5778H1.15005C0.427211 19.9072 0.0615184 19.5524 0 18.9357L0.249491 17.4176C0.319554 16.5471 0.575881 15.862 0.992839 15.3364C1.26796 14.9899 1.60973 14.7344 1.9891 14.5342C3.187 13.898 6.40475 13.7109 7.49158 12.7802ZM6.73798 6.11039C6.53121 6.11853 6.3757 6.15921 6.26975 6.22755C6.20823 6.2666 6.16381 6.31704 6.13476 6.37562C6.10229 6.44071 6.08862 6.52044 6.09032 6.61319C6.09887 6.8833 6.24754 7.23477 6.53292 7.63993L6.53633 7.64644L7.46595 9.05557C7.83847 9.6202 8.2298 10.1962 8.71511 10.6193C9.18163 11.0261 9.74896 11.3011 10.4991 11.3027C11.3108 11.3043 11.9055 11.0179 12.3857 10.5884C12.8864 10.1409 13.2829 9.52908 13.6725 8.91726L14.72 7.27382C14.9148 6.84913 14.9866 6.566 14.9421 6.3984C14.9148 6.29914 14.8003 6.25033 14.6055 6.24219C14.5645 6.24057 14.5218 6.24057 14.4773 6.24057C14.4312 6.24219 14.3816 6.24545 14.3304 6.2487C14.303 6.25033 14.2757 6.2487 14.2501 6.24382C14.1561 6.2487 14.0604 6.24219 13.963 6.22918L14.3218 4.71753C12.4062 4.69475 11.0955 4.37746 9.54561 3.4337C9.03637 3.12454 8.88258 2.76981 8.37334 2.80398C7.98885 2.87395 7.66588 3.0383 7.40784 3.3019C7.16177 3.55411 6.97551 3.89907 6.85418 4.34003L7.05753 6.12178C6.94475 6.12829 6.83709 6.12504 6.73798 6.11039ZM14.9644 5.79309C15.2224 5.86794 15.3882 6.02415 15.4548 6.27636C15.53 6.55624 15.448 6.94838 15.2002 7.48535C15.1951 7.49511 15.1899 7.50488 15.1848 7.51464L14.1253 9.17761C13.7169 9.81871 13.3017 10.4598 12.748 10.9545C12.1755 11.4654 11.4681 11.8055 10.5026 11.8039C9.60029 11.8022 8.92188 11.4735 8.3648 10.9886C7.82651 10.52 7.41468 9.91471 7.02335 9.32242L6.09374 7.91492C5.75368 7.43165 5.57767 6.99069 5.56571 6.62783C5.56058 6.45698 5.59134 6.3024 5.65628 6.16734C5.72634 6.02415 5.83229 5.90537 5.97583 5.81425C6.04248 5.77194 6.11767 5.73452 6.2014 5.70523C6.14159 4.94208 6.11767 3.9788 6.15697 3.17335C6.17748 2.98297 6.21507 2.79097 6.27146 2.59896C6.50899 1.79026 7.10538 1.13939 7.8436 0.691917C8.10334 0.534081 8.38872 0.403908 8.68948 0.299769C10.4752 -0.318556 12.8437 0.0182683 14.1116 1.32326C14.6277 1.85534 14.9524 2.56153 15.0225 3.4939L14.9644 5.79309Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </div>
                                                                <span
                                                                    class=" fs-6">{{ ucfirst(App\Models\Admins::find($consult->user_id)->name) }}</span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    <li>
                                                        <div class="input-group pb-2">
                                                            <div class="col-auto pe-2 ms-1 my-auto">
                                                                <svg width="18" height="19" viewBox="0 0 18 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.2927 0.00655353C10.2768 0.00514167 10.263 0.00714181 10.2479 0.00694572C10.2469 0.00694572 10.2457 0.00655353 10.2447 0.00655353C5.75927 -0.148712 1.04486 2.45798 1.45253 7.50155C1.45414 7.52198 1.4592 7.54006 1.46289 7.55912C1.457 7.61128 1.457 7.66595 1.46967 7.72529C1.71561 8.87627 1.33813 9.88815 0.393244 10.5938C0.349829 10.6262 0.316572 10.6631 0.287904 10.7015C0.192407 10.7644 0.11695 10.8606 0.0763986 10.9771C-0.100633 11.4857 0.0338073 12.0035 0.440149 12.3572C0.507252 12.4155 0.585022 12.4552 0.665577 12.4765C0.927948 12.6215 1.20228 12.7178 1.48716 12.7852C1.42861 13.101 1.4574 13.4205 1.60956 13.7212C1.32547 14.2748 1.51407 14.8856 2.07489 15.219C2.10654 15.2377 2.13811 15.252 2.16905 15.263C2.26435 15.3763 2.27353 15.5583 2.23847 15.7334C2.22761 15.7869 2.22623 15.8403 2.23031 15.8925C2.22784 15.9401 2.22933 15.9883 2.23847 16.0367C2.38652 16.8124 3.04861 17.2405 3.80666 17.2543C3.84741 17.2551 3.88513 17.2509 3.92067 17.2437C3.95573 17.2453 3.99248 17.2431 4.0304 17.2372C5.24762 17.0398 6.63352 17.1499 7.09077 18.487C7.18207 18.7541 7.42644 18.8447 7.6452 18.8095C7.71889 18.8646 7.81596 18.8963 7.93848 18.8877C10.1444 18.7335 12.3306 18.4131 14.5207 18.119C14.5982 18.1086 14.6653 18.0835 14.723 18.0483C14.9887 17.9654 15.2032 17.6681 15.0315 17.3481C13.568 14.6197 16.5349 11.6432 17.0977 9.0222C17.1099 8.96557 17.11 8.91306 17.1052 8.86306C17.7005 4.55801 14.7216 0.405444 10.2927 0.00655353ZM16.1712 8.67088C16.1653 8.71073 16.1645 8.74885 16.1669 8.78548C15.5553 11.59 12.8733 14.3012 13.9352 17.2376C11.9408 17.5083 9.9474 17.7865 7.93852 17.9271C7.92408 17.9281 7.91181 17.9319 7.8982 17.9341C7.18015 16.3359 5.50941 16.0493 3.85635 16.2995C3.83984 16.2977 3.8245 16.294 3.80674 16.2935C3.61857 16.2901 3.52036 16.2706 3.37341 16.1808C3.38624 16.1849 3.29792 16.1145 3.29894 16.1156C3.28631 16.1029 3.27843 16.0953 3.27266 16.0903C3.27266 16.0865 3.2676 16.0752 3.24905 16.0451C3.22109 16.0003 3.20046 15.9372 3.18332 15.8659C3.26854 15.2772 3.10139 14.7658 2.6081 14.3894C2.56845 14.3594 2.52406 14.3425 2.47817 14.3313C2.46394 14.3193 2.45009 14.3078 2.43515 14.2927C2.43782 14.2939 2.43535 14.2879 2.42676 14.2741C2.42676 14.2618 2.42597 14.258 2.42456 14.2592C2.43044 14.2337 2.43613 14.2082 2.44507 14.1835C2.44527 14.1825 2.51688 14.0714 2.54057 14.0379C2.60697 13.9445 2.62054 13.8312 2.59952 13.7223C2.61924 13.6145 2.6052 13.5024 2.54057 13.4088C2.35883 13.1455 2.3948 12.9215 2.54057 12.6447C2.74957 12.2484 2.37326 11.887 2.03952 11.9238C2.03603 11.9233 2.03297 11.9224 2.02955 11.9218C1.69122 11.8771 1.3641 11.7782 1.07086 11.6029C1.04984 11.5906 1.02925 11.5828 1.00862 11.5736C0.993992 11.5523 0.980344 11.5306 0.968108 11.5079C0.966029 11.5019 0.964421 11.4966 0.961558 11.4878C0.959166 11.4766 0.95748 11.4693 0.955872 11.4621C0.955087 11.44 0.95548 11.4183 0.956695 11.3962C0.958303 11.3902 0.961362 11.3764 0.96548 11.355C2.18576 10.4016 2.70992 9.09099 2.41299 7.55916C2.41339 7.53994 2.41558 7.52202 2.41397 7.50159C2.04701 2.96802 6.26483 0.829631 10.2445 0.967444C10.2573 0.967836 10.2682 0.96564 10.2806 0.965248C10.2848 0.96564 10.2881 0.967013 10.2928 0.967444C14.071 1.30778 16.7093 4.99267 16.1712 8.67088Z"
                                                                        fill="#323232" />
                                                                    <path
                                                                        d="M9.27769 11.8237C8.19259 11.8237 8.19259 13.5063 9.27769 13.5063C10.3629 13.5064 10.3629 11.8237 9.27769 11.8237Z"
                                                                        fill="#323232" />
                                                                    <path
                                                                        d="M5.76792 4.46031C5.40475 4.73865 5.2125 5.17836 5.46613 5.61133C5.67622 5.96979 6.25226 6.19294 6.61731 5.91312C7.72837 5.06145 9.37334 4.7652 10.5483 5.68142C10.7883 5.86861 10.9078 6.00873 11.0357 6.24373C11.0813 6.32727 11.0841 6.44496 11.0708 6.52732C11.0655 6.50332 10.9729 6.72208 11.0206 6.66196C10.9256 6.78204 10.8122 6.87268 10.6856 6.95519C10.2554 7.23639 9.73643 7.35491 9.24075 7.46036C9.12325 7.48527 9.02728 7.52966 8.94543 7.58453C8.61811 7.66877 8.34261 7.92679 8.34261 8.36517V9.76739C8.34261 10.8524 10.0254 10.8524 10.0254 9.76739V9.00463C11.0102 8.75787 12.0637 8.3105 12.5409 7.37318C13.0057 6.45986 12.6737 5.4936 12.0345 4.76908C10.4756 3.00166 7.52463 3.11379 5.76792 4.46031Z"
                                                                        fill="#323232" />
                                                                </svg>
                                                            </div>
                                                            <span class=" fs-6">{{ $consult->title }}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-group">
                                                            <div class="col-auto my-auto pb-2 ms-1 pe-2">
                                                                <svg width="22" height="22" viewBox="0 0 22 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M13.8874 14.4984C13.6724 14.4984 13.4978 14.677 13.4978 14.897V18.5408H0.779274V1.37308H13.4975V4.40273C13.4975 4.62304 13.6721 4.80137 13.8872 4.80137C14.1023 4.80137 14.2768 4.62304 14.2768 4.40273V0.974443C14.2768 0.75413 14.1023 0.575806 13.8872 0.575806H0.389637C0.174298 0.575806 0 0.75413 0 0.974443V18.9392C0 19.1592 0.174298 19.3378 0.389637 19.3378H13.8872C14.1023 19.3378 14.2768 19.1592 14.2768 18.9392V14.897C14.2771 14.6767 14.1025 14.4984 13.8874 14.4984Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M20.9925 1.63805C20.9718 1.5344 20.9115 1.44351 20.8253 1.38531L18.869 0.0655535C18.7828 0.00761813 18.6781 -0.0128453 18.5758 0.00788389C18.4745 0.0291446 18.3859 0.0908006 18.329 0.179298L16.8969 2.40556C16.8821 2.42868 16.8699 2.45286 16.8603 2.47758L9.28474 14.2382C9.26889 14.2629 9.25642 14.2895 9.24629 14.3169C9.20239 14.3697 9.17018 14.4341 9.15823 14.5074L8.66651 17.5139C8.64054 17.6723 8.71015 17.8307 8.84263 17.9168C8.90627 17.9577 8.97848 17.9782 9.05069 17.9782C9.12888 17.9782 9.20707 17.954 9.27383 17.9062L11.7137 16.162C11.7371 16.1453 11.7579 16.1261 11.7766 16.1054C11.8197 16.0764 11.8592 16.0408 11.8893 15.9941L19.4691 4.2276C19.4841 4.20394 19.4963 4.17896 19.5062 4.15318L20.9357 1.93809C20.9928 1.84959 21.0133 1.74196 20.9925 1.63805ZM9.85179 15.0979L10.876 15.7884L9.58813 16.7089L9.85179 15.0979ZM11.4532 15.2226L10.1497 14.344L17.3006 3.24296L18.6041 4.12183L11.4532 15.2226ZM19.0254 3.45105L17.7225 2.57245L18.7656 0.950795L20.0707 1.83125L19.0254 3.45105Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M9.66969 5.61246C9.88503 5.61246 10.0593 5.43414 10.0593 5.21382C10.0593 4.99351 9.88503 4.81519 9.66969 4.81519H2.42089C2.20555 4.81519 2.03125 4.99351 2.03125 5.21382C2.03125 5.43414 2.20555 5.61246 2.42089 5.61246H9.66969Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M2.51171 8.89615H9.75869C9.97403 8.89615 10.1483 8.71783 10.1483 8.49751C10.1483 8.2772 9.97403 8.09888 9.75869 8.09888H2.51171C2.29637 8.09888 2.12207 8.2772 2.12207 8.49751C2.12207 8.71783 2.29637 8.89615 2.51171 8.89615Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </div>
                                                            <span class=" fs-6">{{ $consult->comment }}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-group pb-2">
                                                            <div class="col-auto my-auto ms-1 pe-2">
                                                                <svg width="22" height="22" viewBox="0 0 22 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.49984 0C4.12911 0 0.573242 3.55586 0.573242 7.92654C0.573242 9.73327 1.84383 12.4104 4.34976 15.8833C6.17913 18.4187 8.03511 20.4842 8.05361 20.5048L8.49978 21L8.94595 20.5048C8.96451 20.4843 10.8204 18.4188 12.6498 15.8833C15.1557 12.4103 16.4263 9.73327 16.4263 7.92654C16.4264 3.55586 12.8705 0 8.49984 0ZM8.49978 19.1956C6.27414 16.6316 1.77447 10.8446 1.77447 7.92654C1.77441 4.21819 4.79143 1.20116 8.49984 1.20116C12.2083 1.20116 15.2252 4.21819 15.2252 7.92654C15.2252 10.8429 10.7254 16.631 8.49978 19.1956Z"
                                                                        fill="#323232" />
                                                                    <path
                                                                        d="M8.50028 10.9112C10.1487 10.9112 11.4849 9.57492 11.4849 7.92654C11.4849 6.27817 10.1487 4.94189 8.50028 4.94189C6.8519 4.94189 5.51562 6.27817 5.51562 7.92654C5.51562 9.57492 6.8519 10.9112 8.50028 10.9112Z"
                                                                        fill="#323232" />
                                                                </svg>

                                                            </div>
                                                            <span class=" fs-6">{{ $consult->address }}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-group pb-2">
                                                            <div class="col-auto pe-2 ms-1 my-auto">
                                                                <svg width="22" height="22" viewBox="0 0 23 22"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M12.7889 0.762314C12.7895 0.354591 13.1922 0.0204328 13.6954 0.0212139C14.1968 0.0219922 14.6003 0.353661 14.5997 0.765125L14.5946 4.01008C14.594 4.41781 14.1913 4.75196 13.6881 4.75118C13.1867 4.7504 12.7832 4.41874 12.7838 4.00727L12.7889 0.762314ZM2.47762 10.5074C2.42711 10.5073 2.3807 10.2828 2.38113 10.006C2.38156 9.72919 2.42306 9.50669 2.47917 9.50678L4.94844 9.51061C4.99895 9.51069 5.04537 9.7352 5.04494 10.0101C5.04451 10.2869 5.00301 10.5113 4.94689 10.5112L2.47762 10.5074ZM6.41348 10.5135C6.36297 10.5134 6.31656 10.2889 6.31699 10.0121C6.31741 9.7353 6.35891 9.5128 6.41503 9.51289L8.8843 9.51672C8.93481 9.5168 8.98123 9.74131 8.9808 10.0162C8.98037 10.293 8.93887 10.5174 8.88275 10.5173L6.41348 10.5135ZM10.3493 10.5196C10.2988 10.5195 10.2524 10.295 10.2528 10.0182C10.2533 9.74141 10.2929 9.51891 10.3509 9.519L12.8202 9.52283C12.8707 9.52291 12.9171 9.74555 12.9167 10.0205C12.6695 10.1735 12.4317 10.3414 12.2032 10.5225L10.3493 10.5196ZM2.47877 13.3802C2.42827 13.3801 2.38185 13.1556 2.38228 12.8788C2.38271 12.602 2.42421 12.3776 2.48033 12.3777L4.9496 12.3815C5.0001 12.3816 5.04652 12.6061 5.04609 12.8829C5.04566 13.1597 5.00416 13.3841 4.94804 13.384L2.47877 13.3802ZM6.41463 13.3863C6.36413 13.3862 6.31771 13.1617 6.31814 12.8849C6.31857 12.6081 6.36007 12.3837 6.41619 12.3838L8.88546 12.3876C8.93596 12.3877 8.98238 12.6122 8.98195 12.889C8.98152 13.1658 8.94002 13.3902 8.8839 13.3901L6.41463 13.3863ZM2.47993 16.2529C2.42942 16.2529 2.383 16.0284 2.38343 15.7516C2.38386 15.4747 2.42536 15.2504 2.48148 15.2505L4.95075 15.2543C5.00126 15.2544 5.04767 15.4789 5.04724 15.7557C5.04681 16.0325 5.00531 16.2569 4.94919 16.2568L2.47993 16.2529ZM6.41579 16.259C6.36528 16.259 6.31886 16.0345 6.31929 15.7577C6.31972 15.4809 6.36122 15.2565 6.41734 15.2566L8.88661 15.2604C8.93712 15.2605 8.98353 15.485 8.9831 15.7618C8.98267 16.0386 8.94117 16.263 8.88505 16.2629L6.41579 16.259ZM4.66086 0.749696C4.6615 0.340102 5.06608 0.00781765 5.56741 0.00859593C6.06875 0.00937421 6.4723 0.341043 6.47166 0.752507L6.46662 3.99746C6.46599 4.40519 6.06141 4.73934 5.56007 4.73856C5.05874 4.73779 4.65519 4.40612 4.65583 3.99465L4.66086 0.749696V0.749696ZM1.01632 7.09557L18.2488 7.12232L18.2546 3.38734C18.2548 3.25829 18.2026 3.14787 18.1223 3.06545C18.0401 2.98303 17.9223 2.93235 17.8007 2.93216L16.1489 2.92959C15.8721 2.92916 15.648 2.70438 15.6484 2.42758C15.6488 2.15077 15.8755 1.92669 16.1505 1.92712L17.8023 1.92968C18.2064 1.93031 18.569 2.09359 18.8342 2.35958C19.0995 2.62557 19.2616 2.98866 19.261 3.39265L19.2518 9.32334C18.9227 9.20874 18.5843 9.11657 18.2365 9.0487L18.2379 8.12291L18.2491 8.12293L1.01477 8.09617L0.99975 17.7693C0.99955 17.8984 1.04989 18.0088 1.13207 18.0912C1.21425 18.1736 1.33202 18.2243 1.45361 18.2245L9.64335 18.2372C9.73634 18.5852 9.85366 18.9239 9.99345 19.2515L1.46139 19.2382C1.0592 19.2376 0.694677 19.0743 0.429456 18.8083C0.164233 18.5442 0.00204885 18.1811 0.002676 17.7771L0.025053 3.36279C0.0256773 2.96067 0.18899 2.59622 0.455036 2.33105C0.721081 2.06588 1.08424 1.90373 1.4883 1.90436L3.25233 1.90709C3.52919 1.90752 3.75332 2.13231 3.75289 2.40911C3.75246 2.68591 3.52763 2.91 3.25078 2.90957L1.48675 2.90683C1.35767 2.90663 1.24722 2.95696 1.16479 3.03912C1.08235 3.12129 1.03166 3.23904 1.03147 3.36061L1.02567 7.09558L1.01632 7.09557ZM7.91432 2.91494C7.63747 2.91451 7.41334 2.68973 7.41377 2.41292C7.4142 2.13612 7.63902 1.91203 7.91588 1.91246L11.2793 1.91768C11.5562 1.91811 11.7803 2.1429 11.7799 2.4197C11.7794 2.6965 11.5546 2.92059 11.2778 2.92016L7.91432 2.91494Z"
                                                                        fill="#393939" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M16.9599 10.1023C17.7643 10.1035 18.5341 10.2648 19.2352 10.5576C19.9667 10.8599 20.6198 11.3031 21.1679 11.853C21.7142 12.4009 22.1554 13.0592 22.4573 13.7878C22.7479 14.4917 22.9068 15.2601 22.9056 16.0645C22.9043 16.8689 22.743 17.6388 22.4503 18.3398C22.146 19.0694 21.7047 19.7245 21.1549 20.2726C20.605 20.8188 19.9486 21.26 19.22 21.562C18.5161 21.8526 17.7477 22.0115 16.9433 22.0102C16.1389 22.009 15.369 21.8477 14.668 21.5549C13.9384 21.2507 13.2834 20.8094 12.7352 20.2595C12.1871 19.7116 11.7478 19.0533 11.4458 18.3227C11.1553 17.6189 10.9963 16.8505 10.9976 16.0461C10.9988 15.2416 11.1602 14.4737 11.4529 13.7708C11.7571 13.0412 12.1985 12.3861 12.7483 11.838C13.2962 11.2918 13.9545 10.8505 14.6832 10.5486C15.387 10.2599 16.1535 10.101 16.9599 10.1023ZM16.3328 13.7421C16.3329 13.6487 16.3521 13.5592 16.3866 13.4753C16.4229 13.3896 16.4745 13.3134 16.5375 13.2487C16.6005 13.184 16.6788 13.1327 16.7646 13.0985C16.8485 13.0643 16.9381 13.0454 17.0315 13.0455C17.125 13.0457 17.2145 13.0649 17.2983 13.0993C17.386 13.1357 17.4621 13.1873 17.5249 13.2503C17.5877 13.3133 17.641 13.3915 17.6752 13.4773C17.7094 13.5594 17.7283 13.6509 17.7281 13.7443L17.7242 16.249L19.3013 17.0864C19.3146 17.094 19.3279 17.1036 19.3413 17.1112C19.4136 17.159 19.4726 17.2182 19.5202 17.2831C19.5715 17.3537 19.6076 17.4338 19.6285 17.5177C19.6493 17.6035 19.6549 17.695 19.6433 17.7846C19.6317 17.8722 19.603 17.958 19.5571 18.0361L19.5399 18.0646L19.5266 18.0818C19.4788 18.1503 19.4215 18.2093 19.3586 18.2531C19.2879 18.3044 19.2078 18.3405 19.1258 18.3614C19.04 18.3822 18.9485 18.3878 18.8589 18.3762C18.7713 18.3646 18.6855 18.3359 18.6075 18.29L16.6952 17.2634C16.64 17.2347 16.5905 17.1984 16.5486 17.1564C16.5048 17.1144 16.4649 17.0667 16.4326 17.0133L16.4288 17.0057C16.3964 16.9522 16.3717 16.8969 16.3547 16.8378C16.3376 16.7768 16.3282 16.7139 16.3283 16.6491L16.3328 13.7421Z"
                                                                        fill="#323232" />
                                                                </svg>

                                                            </div>
                                                            <span
                                                                class=" fs-6">{{ Carbon\Carbon::parse($consult->date)->format('d.m.Y') }},
                                                                {{ $consult->time }}</span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="text-end" data-bs-toggle="modal" data-bs-target="#consultmodal"
                                    style="cursor:pointer;">
                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5 35.0005C7.85197 35.0005 0 27.1485 0 17.5005C0 7.85246 7.85197 0.000488281 17.5 0.000488281C27.148 0.000488281 35 7.85246 35 17.5005C35 27.1485 27.148 35.0005 17.5 35.0005Z"
                                            fill="#5288F5" />
                                        <path
                                            d="M25.0588 19.0005H10.9412C10.4211 19.0005 10 18.5531 10 18.0005C10 17.4479 10.4211 17.0005 10.9412 17.0005H25.0588C25.5789 17.0005 26 17.4479 26 18.0005C26 18.5531 25.5789 19.0005 25.0588 19.0005Z"
                                            fill="white" />
                                        <path
                                            d="M18 26.0005C17.4474 26.0005 17 25.5794 17 25.0593V18.0005V10.9417C17 10.4215 17.4474 10.0005 18 10.0005C18.5526 10.0005 19 10.4215 19 10.9417V25.0593C19 25.5794 18.5526 26.0005 18 26.0005Z"
                                            fill="white" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- Modali --}}
                    <div class="modal fade" id="consultmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-3" style="border-radius: 23px !important;">
                                <div class="modal-header" style="border-bottom: 0 !important;">
                                    <h5 class="modal-title mx-2"
                                        style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343;"
                                        id="exampleModalLabel">Mitarbeiterbesprechungen
                                    </h5>
                                    <button type="button"
                                        style="opacity: 1 !important;background-color: transparent; border: none;"
                                        class="" data-bs-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#434343" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body px-5 pb-0">
                                    <form class="" action="{{ route('addPersonalAppointment') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="apporconId" value="2">
                                        <div class="px-2">
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Titel</label>
                                            <input type="text"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important;"
                                                name="title" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Datum</label>
                                            <input type="date"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                                name="date" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Zeit</label>
                                            <!-- <input type="time"
                                                       style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important;"
                                                       name="time" class="form-control mb-3"
                                                       required> -->
                                            <select id="hours1" name="time" class="form-select"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                                required>

                                            </select>
                                            </select>
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Ort</label>
                                            <input type="text"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important;"
                                                name="address" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Kommentar</label>
                                            <textarea type="text" name="comment"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important;"
                                                class="form-control mb-3" required></textarea>
                                            <label
                                                style="font-family: 'Montserrat' !important;color: #434343;font-weight: 600">Zuweisen</label>
                                            <div onclick="toggleDropdown()" class="row g-0 multipleSelectInputDiv">
                                                <div class="col">
                                                    <input disabled style="border: none;background:transparent"
                                                        class="" type="text" name=""
                                                        id="multipleSelectInput11">
                                                </div>
                                                <div class="col-auto my-auto">
                                                    <svg width="10" height="6" viewBox="0 0 10 6"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>

                                                <div id="multipleSelectDropdown11" class="multipleSelectDropdown p-2"
                                                    style="z-index: 10">

                                                    @foreach ($admins as $admin)
                                                        <label for="checkbox1{{ $admin->id }}2" class="memberLabel">
                                                            <input onchange="checkboxes()"
                                                                id="checkbox1{{ $admin->id }}2"
                                                                value="{{ $admin->id }}"
                                                                class="memberCheckmarkselect1" type="checkbox"
                                                                name="roleid[]">{{ ucfirst($admin->name) }}
                                                            <span class="memberCheckmark"></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <script>
                                                var x = document.querySelectorAll('.memberCheckmarkselect1:checked').length;
                                                document.getElementById('multipleSelectInput11').placeholder = x + ' Optionen ausgewählt';

                                                function toggleDropdown() {
                                                    if (document.getElementById('multipleSelectDropdown11').style.display == "block") {
                                                        document.getElementById('multipleSelectDropdown11').style.display = "none";
                                                    } else {
                                                        document.getElementById('multipleSelectDropdown11').style.display = "block";

                                                    }
                                                }

                                                function checkboxes() {
                                                    var x = document.querySelectorAll('.memberCheckmarkselect1:checked').length;
                                                    document.getElementById('multipleSelectInput11').placeholder = x + ' Optionen ausgewählt';
                                                }
                                            </script>
                                        </div>

                                        <div class="modal-footer px-1 pt-3 pb-0"
                                            style="border-top: 0 !important; justify-content: flex-start !important;">
                                            <div class="row g-0" style="width: 100%;">
                                                <div class="col-6 pe-1">
                                                    <div>
                                                        <button type="submit" class="btn py-1"
                                                            style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #2F60DC; background-color: #fff; color: #2F60DC; border-radius: 8px;"
                                                            data-bs-dismiss="modal">
                                                            Abbrechen
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <div>
                                                        <input type="submit"
                                                            style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #2F60DC; font-weight: 600 !important; background-color: #2F60DC; color: #fff; border-radius: 8px;"
                                                            class="btn py-1" value="Speichern">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12">
                            <div class="secondGreyBorderDash h-100 p-3 p-md-4">
                                <div class="row g-0">
                                    <div class="col-auto cornerSvgToDoList">
                                        <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_28_428)">
                                                <path
                                                    d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9458 34.3263L63.3655 34.608C58.8416 34.6805 54.4021 35.8453 50.4253 38.0032L47.8184 39.4178C43.6749 41.6661 40.4607 45.3082 38.745 49.6991C37.8801 51.9128 37.4173 54.2631 37.3786 56.6394L37.0413 77.3271Z"
                                                    fill="#DCE4F9" />
                                            </g>
                                            <path
                                                d="M91.4577 53.2988C91.4324 52.9085 91.2234 52.6573 90.9683 52.5402C90.8628 52.4723 90.7373 52.4292 90.5861 52.4292C90.1849 52.4288 89.7833 52.4245 89.3821 52.4233C89.3396 51.7595 89.2378 51.1016 89.0973 50.4542C88.9977 49.9968 88.6693 49.8229 88.3475 49.8582C88.2974 49.8462 88.245 49.8381 88.1879 49.8369C83.4446 49.7329 78.7016 49.6445 73.9589 49.8305C73.8192 49.4228 73.6777 49.0431 73.5354 48.7573C73.4252 48.536 73.2707 48.4135 73.1047 48.3617C72.9906 48.2733 72.8483 48.2177 72.6733 48.2177C69.3853 48.2177 64.1612 48.2076 60.8743 48.1323C60.7562 48.0501 60.6193 48 60.4728 48H59.1168C58.7448 48 58.4282 48.307 58.3573 48.7039C58.2998 48.8132 58.258 48.9392 58.2451 49.0876C57.6158 56.4745 58.4042 66.8846 58.3419 74.2815C58.337 74.8725 58.764 75.1484 59.1711 75.1167C59.2158 75.1315 59.2606 75.1447 59.3106 75.1512C69.0507 76.432 80.7978 76.5718 90.5868 76.9992C91.0298 77.0185 91.2746 76.6869 91.3244 76.3087C91.4086 76.178 91.4598 76.0103 91.458 75.8032C91.3878 69.0238 91.9007 60.0717 91.4577 53.2988ZM87.7695 51.5099C87.82 51.81 87.8592 52.1108 87.8819 52.4152C83.5083 52.3866 79.1351 52.3075 74.7623 52.22C74.6788 52.014 74.5913 51.7633 74.5018 51.4934C78.9235 51.3394 83.3464 51.4139 87.7695 51.5099ZM89.9081 75.2317C80.5394 74.8347 69.2168 74.6678 59.8931 73.4848C59.8965 66.6046 59.2412 56.7122 59.7395 49.8413C59.7582 49.8432 59.7751 49.8485 59.7947 49.8489C63.3371 49.9465 68.8169 49.9568 72.3606 49.9577C72.7587 50.7438 73.1688 52.3672 73.4755 53.2044C73.5361 53.3698 73.623 53.516 73.7322 53.627C73.8567 53.8141 74.0505 53.9466 74.3194 53.9515C79.5321 54.0559 84.7442 54.154 89.9584 54.1659C90.2962 60.4594 89.8723 68.9317 89.9081 75.2317Z"
                                                fill="#323232" />
                                            <path
                                                d="M80.4295 61.695C80.2891 61.5867 80.1155 61.5277 79.9138 61.5205L79.7781 61.5159C79.5594 61.5082 79.5594 61.5082 79.5094 59.895C79.4927 59.3643 79.4723 58.704 79.4577 58.6048C79.3053 57.5586 78.8633 56.1564 77.6281 55.418C77.0286 55.0591 76.2742 54.8848 75.3236 54.8848C74.8062 54.8848 74.2938 54.9316 73.6835 55.0021C72.3667 55.1539 71.4399 55.3335 70.5876 56.3982C69.6965 57.5111 69.197 58.8421 69.1433 60.2472C69.1137 61.0112 69.0486 61.3751 68.7551 61.3785L68.5541 61.382C68.3058 61.3897 68.1011 61.4749 67.9475 61.6357C67.713 61.8817 67.6796 62.2441 67.6667 62.3799C67.6667 62.3837 67.6617 62.4282 67.6613 62.4316C67.6552 62.4719 67.6523 62.5124 67.6523 62.5557V70.6002C67.6523 70.7365 67.6765 70.8606 67.724 70.9698C68.186 72.0233 68.9896 72.075 70.1025 72.1458L70.3304 72.1608C71.4375 72.2367 72.5451 72.3003 73.6534 72.3574C74.7596 72.4144 75.8665 72.4649 76.9733 72.5128C77.2524 72.5253 77.5166 72.5478 77.7674 72.5703C78.9159 72.6694 79.7195 72.7673 80.4255 71.5234C80.4896 71.4097 80.5293 71.2792 80.5413 71.1368C80.7962 68.2578 80.8175 65.3189 80.818 62.5557C80.818 62.4857 80.8112 62.4195 80.7996 62.357C80.7749 62.234 80.6616 61.8745 80.4295 61.695ZM71.7969 57.7808C72.139 57.2909 72.9206 56.9079 73.4482 56.8338C74.2414 56.7219 75.0653 56.6623 75.8973 56.6559C75.9077 56.6547 75.9365 56.6516 75.9468 56.6516C76.0293 56.6516 76.3733 56.719 76.692 56.9246C76.9857 57.1146 77.2311 57.4118 77.2523 57.5197C77.7464 58.6993 77.8868 59.8613 77.6744 61.0502C77.6697 61.0779 77.6665 61.106 77.6644 61.1337C77.6494 61.3498 77.4444 61.4126 76.7521 61.4126C76.6775 61.4126 76.5997 61.4113 76.5192 61.4092C74.8763 61.364 73.4287 61.3401 72.0943 61.3372C71.7659 61.3368 71.4501 61.1988 71.2279 60.9592C71.0275 60.7429 70.9288 60.4687 70.9498 60.1867C71.0162 59.3007 71.3011 58.4911 71.7969 57.7808ZM78.8536 69.6657C78.8153 70.2731 78.3058 70.7497 77.6935 70.7497C77.6905 70.7497 77.6473 70.7489 77.6442 70.7489C74.7786 70.6288 72.5953 70.5147 70.5649 70.3798C69.9467 70.3381 69.4442 69.7999 69.4442 69.1796V64.2932C69.4442 63.6655 69.9532 63.1493 70.5789 63.143C71.0225 63.138 71.4662 63.1354 71.9094 63.1354C73.6634 63.1354 75.5642 63.1701 77.8925 63.2446C78.5173 63.2655 79.0219 63.7898 79.0177 64.4144C79.002 66.4714 78.9499 68.1402 78.8536 69.6657Z"
                                                fill="#323232" />
                                            <path
                                                d="M74.4626 64.5029C72.7784 64.5029 72.5674 66.7875 73.8296 67.3598C73.8219 67.4015 73.8195 67.4448 73.8228 67.489C73.8619 67.9897 73.8338 68.4787 73.7393 68.9719C73.673 69.3135 73.8305 69.6609 74.1861 69.7585C74.5018 69.8459 74.9067 69.6547 74.973 69.3119C75.0896 68.7079 75.1508 68.1031 75.1025 67.4885C75.0992 67.4456 75.093 67.4044 75.083 67.3639C76.3585 66.8017 76.1523 64.5029 74.4626 64.5029Z"
                                                fill="#323232" />
                                            <defs>
                                                <filter id="filter0_d_28_428" x="0.0410156" y="0.852783"
                                                    width="150.691" height="144.3" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                        result="hardAlpha" />
                                                    <feOffset dy="4" />
                                                    <feGaussianBlur stdDeviation="18.5" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_28_428" />
                                                    <feBlend mode="normal" in="SourceGraphic"
                                                        in2="effect1_dropShadow_28_428" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col titleMarginAuto">
                                        <div class="pb-3">
                                            <span class="secondGreyBorderDashSpan">Private Termine</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="overFlowDivDashboard">
                                    @if ($personalApp->count() == 0)
                                        <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center"
                                            style="color: #9F9F9F">
                                            keine privaten Termine
                                        </div>
                                    @else
                                        @foreach ($personalApp as $perApp)
                                            <div class="thirdBorderDivDash py-2 mb-2">
                                                <div class="row g-0 ps-2 pb-2">
                                                    <div class="col-auto my-auto ms-1 me-2">
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.49158 12.7802L9.15599 17.4404L9.99333 14.6742L9.58321 14.2462C9.39865 13.9891 9.35764 13.7646 9.46017 13.571C9.68232 13.1528 10.142 13.2309 10.5709 13.2309C11.0203 13.2309 11.5774 13.1495 11.7176 13.6865C11.7654 13.8655 11.7056 14.0542 11.574 14.2462L11.1639 14.6742L12.0012 17.4404L13.5084 12.7802C14.5952 13.7109 17.813 13.898 19.0109 14.5342C19.3903 14.736 19.732 14.9915 20.0072 15.3364C20.4241 15.862 20.6804 16.5471 20.7505 17.4176L21 18.9357C20.9385 19.5508 20.5728 19.9055 19.8499 19.9592H10.5778H1.15005C0.427211 19.9072 0.0615184 19.5524 0 18.9357L0.249491 17.4176C0.319554 16.5471 0.575881 15.862 0.992839 15.3364C1.26796 14.9899 1.60973 14.7344 1.9891 14.5342C3.187 13.898 6.40475 13.7109 7.49158 12.7802ZM6.73798 6.11039C6.53121 6.11853 6.3757 6.15921 6.26975 6.22755C6.20823 6.2666 6.16381 6.31704 6.13476 6.37562C6.10229 6.44071 6.08862 6.52044 6.09032 6.61319C6.09887 6.8833 6.24754 7.23477 6.53292 7.63993L6.53633 7.64644L7.46595 9.05557C7.83847 9.6202 8.2298 10.1962 8.71511 10.6193C9.18163 11.0261 9.74896 11.3011 10.4991 11.3027C11.3108 11.3043 11.9055 11.0179 12.3857 10.5884C12.8864 10.1409 13.2829 9.52908 13.6725 8.91726L14.72 7.27382C14.9148 6.84913 14.9866 6.566 14.9421 6.3984C14.9148 6.29914 14.8003 6.25033 14.6055 6.24219C14.5645 6.24057 14.5218 6.24057 14.4773 6.24057C14.4312 6.24219 14.3816 6.24545 14.3304 6.2487C14.303 6.25033 14.2757 6.2487 14.2501 6.24382C14.1561 6.2487 14.0604 6.24219 13.963 6.22918L14.3218 4.71753C12.4062 4.69475 11.0955 4.37746 9.54561 3.4337C9.03637 3.12454 8.88258 2.76981 8.37334 2.80398C7.98885 2.87395 7.66588 3.0383 7.40784 3.3019C7.16177 3.55411 6.97551 3.89907 6.85418 4.34003L7.05753 6.12178C6.94475 6.12829 6.83709 6.12504 6.73798 6.11039ZM14.9644 5.79309C15.2224 5.86794 15.3882 6.02415 15.4548 6.27636C15.53 6.55624 15.448 6.94838 15.2002 7.48535C15.1951 7.49511 15.1899 7.50488 15.1848 7.51464L14.1253 9.17761C13.7169 9.81871 13.3017 10.4598 12.748 10.9545C12.1755 11.4654 11.4681 11.8055 10.5026 11.8039C9.60029 11.8022 8.92188 11.4735 8.3648 10.9886C7.82651 10.52 7.41468 9.91471 7.02335 9.32242L6.09374 7.91492C5.75368 7.43165 5.57767 6.99069 5.56571 6.62783C5.56058 6.45698 5.59134 6.3024 5.65628 6.16734C5.72634 6.02415 5.83229 5.90537 5.97583 5.81425C6.04248 5.77194 6.11767 5.73452 6.2014 5.70523C6.14159 4.94208 6.11767 3.9788 6.15697 3.17335C6.17748 2.98297 6.21507 2.79097 6.27146 2.59896C6.50899 1.79026 7.10538 1.13939 7.8436 0.691917C8.10334 0.534081 8.38872 0.403908 8.68948 0.299769C10.4752 -0.318556 12.8437 0.0182683 14.1116 1.32326C14.6277 1.85534 14.9524 2.56153 15.0225 3.4939L14.9644 5.79309Z"
                                                                fill="black" />
                                                        </svg>

                                                    </div>

                                                    <div class="col-auto my-auto ms-1">
                                                        <span class=" fs-6">{{ $perApp->title }}</span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 ps-2 pb-2">
                                                    <div class="col-auto my-auto ms-1 me-2">
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.49984 0C4.12911 0 0.573242 3.55586 0.573242 7.92654C0.573242 9.73327 1.84383 12.4104 4.34976 15.8833C6.17913 18.4187 8.03511 20.4842 8.05361 20.5048L8.49978 21L8.94595 20.5048C8.96451 20.4843 10.8204 18.4188 12.6498 15.8833C15.1557 12.4103 16.4263 9.73327 16.4263 7.92654C16.4264 3.55586 12.8705 0 8.49984 0ZM8.49978 19.1956C6.27414 16.6316 1.77447 10.8446 1.77447 7.92654C1.77441 4.21819 4.79143 1.20116 8.49984 1.20116C12.2083 1.20116 15.2252 4.21819 15.2252 7.92654C15.2252 10.8429 10.7254 16.631 8.49978 19.1956Z"
                                                                fill="#323232" />
                                                            <path
                                                                d="M8.50028 10.9112C10.1487 10.9112 11.4849 9.57492 11.4849 7.92654C11.4849 6.27817 10.1487 4.94189 8.50028 4.94189C6.8519 4.94189 5.51562 6.27817 5.51562 7.92654C5.51562 9.57492 6.8519 10.9112 8.50028 10.9112Z"
                                                                fill="#323232" />
                                                        </svg>


                                                    </div>
                                                    <div class="col-auto my-auto ms-1">
                                                        <span class="fs-6"> {{ $perApp->address }}</span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 ps-2">
                                                    <div class="col-auto my-auto ms-1 me-2">
                                                        <svg width="21" height="21" viewBox="0 0 23 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.7889 0.762314C12.7895 0.354591 13.1922 0.0204328 13.6954 0.0212139C14.1968 0.0219922 14.6003 0.353661 14.5997 0.765125L14.5946 4.01008C14.594 4.41781 14.1913 4.75196 13.6881 4.75118C13.1867 4.7504 12.7832 4.41874 12.7838 4.00727L12.7889 0.762314ZM2.47762 10.5074C2.42711 10.5073 2.3807 10.2828 2.38113 10.006C2.38156 9.72919 2.42306 9.50669 2.47917 9.50678L4.94844 9.51061C4.99895 9.51069 5.04537 9.7352 5.04494 10.0101C5.04451 10.2869 5.00301 10.5113 4.94689 10.5112L2.47762 10.5074ZM6.41348 10.5135C6.36297 10.5134 6.31656 10.2889 6.31699 10.0121C6.31741 9.7353 6.35891 9.5128 6.41503 9.51289L8.8843 9.51672C8.93481 9.5168 8.98123 9.74131 8.9808 10.0162C8.98037 10.293 8.93887 10.5174 8.88275 10.5173L6.41348 10.5135ZM10.3493 10.5196C10.2988 10.5195 10.2524 10.295 10.2528 10.0182C10.2533 9.74141 10.2929 9.51891 10.3509 9.519L12.8202 9.52283C12.8707 9.52291 12.9171 9.74555 12.9167 10.0205C12.6695 10.1735 12.4317 10.3414 12.2032 10.5225L10.3493 10.5196ZM2.47877 13.3802C2.42827 13.3801 2.38185 13.1556 2.38228 12.8788C2.38271 12.602 2.42421 12.3776 2.48033 12.3777L4.9496 12.3815C5.0001 12.3816 5.04652 12.6061 5.04609 12.8829C5.04566 13.1597 5.00416 13.3841 4.94804 13.384L2.47877 13.3802ZM6.41463 13.3863C6.36413 13.3862 6.31771 13.1617 6.31814 12.8849C6.31857 12.6081 6.36007 12.3837 6.41619 12.3838L8.88546 12.3876C8.93596 12.3877 8.98238 12.6122 8.98195 12.889C8.98152 13.1658 8.94002 13.3902 8.8839 13.3901L6.41463 13.3863ZM2.47993 16.2529C2.42942 16.2529 2.383 16.0284 2.38343 15.7516C2.38386 15.4747 2.42536 15.2504 2.48148 15.2505L4.95075 15.2543C5.00126 15.2544 5.04767 15.4789 5.04724 15.7557C5.04681 16.0325 5.00531 16.2569 4.94919 16.2568L2.47993 16.2529ZM6.41579 16.259C6.36528 16.259 6.31886 16.0345 6.31929 15.7577C6.31972 15.4809 6.36122 15.2565 6.41734 15.2566L8.88661 15.2604C8.93712 15.2605 8.98353 15.485 8.9831 15.7618C8.98267 16.0386 8.94117 16.263 8.88505 16.2629L6.41579 16.259ZM4.66086 0.749696C4.6615 0.340102 5.06608 0.00781765 5.56741 0.00859593C6.06875 0.00937421 6.4723 0.341043 6.47166 0.752507L6.46662 3.99746C6.46599 4.40519 6.06141 4.73934 5.56007 4.73856C5.05874 4.73779 4.65519 4.40612 4.65583 3.99465L4.66086 0.749696V0.749696ZM1.01632 7.09557L18.2488 7.12232L18.2546 3.38734C18.2548 3.25829 18.2026 3.14787 18.1223 3.06545C18.0401 2.98303 17.9223 2.93235 17.8007 2.93216L16.1489 2.92959C15.8721 2.92916 15.648 2.70438 15.6484 2.42758C15.6488 2.15077 15.8755 1.92669 16.1505 1.92712L17.8023 1.92968C18.2064 1.93031 18.569 2.09359 18.8342 2.35958C19.0995 2.62557 19.2616 2.98866 19.261 3.39265L19.2518 9.32334C18.9227 9.20874 18.5843 9.11657 18.2365 9.0487L18.2379 8.12291L18.2491 8.12293L1.01477 8.09617L0.99975 17.7693C0.99955 17.8984 1.04989 18.0088 1.13207 18.0912C1.21425 18.1736 1.33202 18.2243 1.45361 18.2245L9.64335 18.2372C9.73634 18.5852 9.85366 18.9239 9.99345 19.2515L1.46139 19.2382C1.0592 19.2376 0.694677 19.0743 0.429456 18.8083C0.164233 18.5442 0.00204885 18.1811 0.002676 17.7771L0.025053 3.36279C0.0256773 2.96067 0.18899 2.59622 0.455036 2.33105C0.721081 2.06588 1.08424 1.90373 1.4883 1.90436L3.25233 1.90709C3.52919 1.90752 3.75332 2.13231 3.75289 2.40911C3.75246 2.68591 3.52763 2.91 3.25078 2.90957L1.48675 2.90683C1.35767 2.90663 1.24722 2.95696 1.16479 3.03912C1.08235 3.12129 1.03166 3.23904 1.03147 3.36061L1.02567 7.09558L1.01632 7.09557ZM7.91432 2.91494C7.63747 2.91451 7.41334 2.68973 7.41377 2.41292C7.4142 2.13612 7.63902 1.91203 7.91588 1.91246L11.2793 1.91768C11.5562 1.91811 11.7803 2.1429 11.7799 2.4197C11.7794 2.6965 11.5546 2.92059 11.2778 2.92016L7.91432 2.91494Z"
                                                                fill="#393939" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.9599 10.1023C17.7643 10.1035 18.5341 10.2648 19.2352 10.5576C19.9667 10.8599 20.6198 11.3031 21.1679 11.853C21.7142 12.4009 22.1554 13.0592 22.4573 13.7878C22.7479 14.4917 22.9068 15.2601 22.9056 16.0645C22.9043 16.8689 22.743 17.6388 22.4503 18.3398C22.146 19.0694 21.7047 19.7245 21.1549 20.2726C20.605 20.8188 19.9486 21.26 19.22 21.562C18.5161 21.8526 17.7477 22.0115 16.9433 22.0102C16.1389 22.009 15.369 21.8477 14.668 21.5549C13.9384 21.2507 13.2834 20.8094 12.7352 20.2595C12.1871 19.7116 11.7478 19.0533 11.4458 18.3227C11.1553 17.6189 10.9963 16.8505 10.9976 16.0461C10.9988 15.2416 11.1602 14.4737 11.4529 13.7708C11.7571 13.0412 12.1985 12.3861 12.7483 11.838C13.2962 11.2918 13.9545 10.8505 14.6832 10.5486C15.387 10.2599 16.1535 10.101 16.9599 10.1023ZM16.3328 13.7421C16.3329 13.6487 16.3521 13.5592 16.3866 13.4753C16.4229 13.3896 16.4745 13.3134 16.5375 13.2487C16.6005 13.184 16.6788 13.1327 16.7646 13.0985C16.8485 13.0643 16.9381 13.0454 17.0315 13.0455C17.125 13.0457 17.2145 13.0649 17.2983 13.0993C17.386 13.1357 17.4621 13.1873 17.5249 13.2503C17.5877 13.3133 17.641 13.3915 17.6752 13.4773C17.7094 13.5594 17.7283 13.6509 17.7281 13.7443L17.7242 16.249L19.3013 17.0864C19.3146 17.094 19.3279 17.1036 19.3413 17.1112C19.4136 17.159 19.4726 17.2182 19.5202 17.2831C19.5715 17.3537 19.6076 17.4338 19.6285 17.5177C19.6493 17.6035 19.6549 17.695 19.6433 17.7846C19.6317 17.8722 19.603 17.958 19.5571 18.0361L19.5399 18.0646L19.5266 18.0818C19.4788 18.1503 19.4215 18.2093 19.3586 18.2531C19.2879 18.3044 19.2078 18.3405 19.1258 18.3614C19.04 18.3822 18.9485 18.3878 18.8589 18.3762C18.7713 18.3646 18.6855 18.3359 18.6075 18.29L16.6952 17.2634C16.64 17.2347 16.5905 17.1984 16.5486 17.1564C16.5048 17.1144 16.4649 17.0667 16.4326 17.0133L16.4288 17.0057C16.3964 16.9522 16.3717 16.8969 16.3547 16.8378C16.3376 16.7768 16.3282 16.7139 16.3283 16.6491L16.3328 13.7421Z"
                                                                fill="#323232" />
                                                        </svg>

                                                    </div>
                                                    <div class="col-auto my-auto ms-1">
                                                        <span
                                                            class="fs-6">{{ Carbon\Carbon::parse($perApp->date)->format('d.m.Y') }},
                                                            {{ $perApp->time }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="text-end" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="cursor: pointer">
                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5 35.0005C7.85197 35.0005 0 27.1485 0 17.5005C0 7.85246 7.85197 0.000488281 17.5 0.000488281C27.148 0.000488281 35 7.85246 35 17.5005C35 27.1485 27.148 35.0005 17.5 35.0005Z"
                                            fill="#5288F5" />
                                        <path
                                            d="M25.0588 19.0005H10.9412C10.4211 19.0005 10 18.5531 10 18.0005C10 17.4479 10.4211 17.0005 10.9412 17.0005H25.0588C25.5789 17.0005 26 17.4479 26 18.0005C26 18.5531 25.5789 19.0005 25.0588 19.0005Z"
                                            fill="white" />
                                        <path
                                            d="M18 26.0005C17.4474 26.0005 17 25.5794 17 25.0593V18.0005V10.9417C17 10.4215 17.4474 10.0005 18 10.0005C18.5526 10.0005 19 10.4215 19 10.9417V25.0593C19 25.5794 18.5526 26.0005 18 26.0005Z"
                                            fill="white" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-3" style="border-radius: 23px !important;">
                                <div class="modal-header" style="border-bottom: 0 !important;">
                                    <h5 class="modal-title mx-2" id="exampleModalLabel"
                                        style="font-family: 'Montserrat' !important;font-weight: 700;color: #434343;">
                                        Private
                                        Termin Hinzufügen</h5>
                                    <button type="button" class=""
                                        style="background-color: transparent;border: none; opacity: 1"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#434343" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <form class="" action="{{ route('addPersonalAppointment') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="apporconId" value="1">
                                        <input type="hidden" name="roleid[]" value="1">
                                        <div class="px-2">
                                            <label
                                                style="font-family: 'Montserrat';font-weight: 600;color: #434343;">Titel</label>
                                            <input type="text"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';"
                                                name="title" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat' !important;font-weight: 600;color: #434343;">Datum</label>
                                            <input type="date"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                                name="date" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat';font-weight: 600;color: #434343;">Zeit</label>
                                            <!-- <input type="time"
                                                       style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';"
                                                       name="time" class="form-control mb-3"
                                                       required> -->
                                            <select required
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;"
                                                id="hours3" name="time" class="form-select mb-3">
                                            </select>
                                            <label
                                                style="font-family: 'Montserrat';font-weight: 600;color: #434343;">Ort</label>
                                            <input type="text"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';"
                                                name="address" class="form-control mb-3" required>
                                            <label
                                                style="font-family: 'Montserrat';font-weight: 600;color: #434343;">Kommentar</label>
                                            <textarea type="text"
                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; font-family: 'Montserrat';"
                                                name="comment" class="form-control mb-3" required></textarea>
                                        </div>

                                        <div class="modal-footer px-1 pt-2 pb-0"
                                            style="border-top: 0 !important; justify-content: flex-start !important;">
                                            <div class="row g-0" style="width: 100%;">
                                                <div class="col-6 pe-1">
                                                    <div>
                                                        <button type="button" class="btn py-1"
                                                            data-bs-dismiss="modal"
                                                            style="font-family: 'Montserrat' !important; width: 100%; border: 1px solid #2F60DC; font-weight: 600 !important; font-size: 16px !important; background-color: #fff; color: #2F60DC; border-radius: 8px;">
                                                            Schliessen
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <div>
                                                        <input type="submit"
                                                            style="font-family: 'Montserrat' !important; width: 100%; font-weight: 600 !important; border: 1px solid #2F60DC; font-size: 16px !important; background-color: #2F60DC; color: #fff; border-radius: 8px;"
                                                            class="btn py-1" value="Sparen">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="pe-0 pe-lg-0">
                            <div class="row g-0">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="weiteresGreyBgDiv"
                                        onclick="window.location.href='{{ route('leads') }}'" style="cursor: pointer">
                                        <div class="row g-0 ps-3">
                                            <div class="col-auto my-auto">
                                                <svg width="37" height="40" viewBox="0 0 42 34"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M42 32.0491C42 33.1265 41.0728 34 39.9291 34C38.7853 34 37.8581 33.1265 37.8581 32.0491C37.8581 32.0368 37.8617 32.0256 37.8619 32.0133H37.849C37.8495 31.9683 37.8561 31.9248 37.8561 31.8796C37.8561 28.6948 36.5188 25.8106 34.3556 23.6936L34.3681 23.6818C33.9995 23.342 33.7693 22.8694 33.7693 22.3451C33.7693 21.311 34.6592 20.4728 35.7568 20.4728C36.3134 20.4728 36.8151 20.6895 37.176 21.0368L37.1796 21.0333C40.1579 23.8461 41.9999 27.7269 41.9999 32.0134H41.9962C41.9964 32.0256 42 32.0368 42 32.0491ZM25.5234 20.1213V20.1262C25.5132 20.1261 25.5033 20.1247 25.493 20.1247C18.6652 20.1247 13.1301 25.3875 13.1301 31.8796C13.1301 31.9114 13.133 31.9425 13.1352 31.9739C13.1361 31.9994 13.1432 32.0233 13.1432 32.0491C13.1432 33.1266 12.216 34 11.0723 34C9.92845 34 9.00125 33.1266 9.00125 32.0491C9.00125 32.0369 9.00483 32.0256 9.00503 32.0134H8.9861C8.9861 25.7007 12.9864 20.2784 18.7233 17.8422C16.336 15.9971 14.8121 13.1972 14.8121 10.0613C14.8121 4.5045 19.5942 0 25.4931 0C31.392 0 36.174 4.50445 36.174 10.0613C36.174 15.6083 31.4081 20.1056 25.5234 20.1213ZM25.493 3.64586C21.7392 3.64586 18.6962 6.51243 18.6962 10.0486C18.6962 13.5847 21.7392 16.4512 25.493 16.4512C29.2469 16.4512 32.29 13.5847 32.29 10.0486C32.29 6.51243 29.2469 3.64586 25.493 3.64586ZM12.8702 5.41648C10.6005 6.00626 8.93398 7.93346 8.93398 10.226C8.93398 12.1464 10.1034 13.8105 11.8171 14.6468C12.5107 14.9853 13.1846 15.6269 13.2951 16.7443C13.3909 17.7133 13.0857 19.1678 11.7251 19.5212C7.17509 20.7028 3.81682 24.5031 3.65222 29.0617C3.66232 29.1351 3.676 29.2076 3.676 29.2836C3.676 30.2387 2.85417 31.013 1.84013 31.013C0.826293 31.013 0.00436414 30.2387 0.00436414 29.2836C0.00436414 29.2668 0.00921804 29.2511 0.00970836 29.2343L0 29.2342C0 23.43 3.65786 18.8111 8.7986 16.8106C6.67104 15.279 5.29632 12.8914 5.29632 10.2008C5.29632 6.81769 7.46331 3.90978 10.5796 2.59199C12.037 1.9756 13.0986 2.71161 13.3556 3.65861C13.6635 4.79331 12.8702 5.41648 12.8702 5.41648Z"
                                                        fill="black" fill-opacity="0.86" />
                                                </svg>
                                            </div>
                                            <div class="col ">
                                                <div class="text-center py-2">
                                                    <div>
                                                        <span
                                                            class="weiteresfirstSpanText fs-3">{{ $leadscount }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="fs-5 weiteresSecondSpanText">Neue Leads</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="weiteresGreyBgDiv mt-3 mt-md-0 mt-lg-3 ms-0 ms-md-3 ms-lg-0"
                                        onclick="window.location.href='{{ route('Appointments') }}'"
                                        style="cursor: pointer">
                                        <div class="row g-0 ps-3">
                                            <div class="col-auto my-auto">
                                                <svg width="37" height="40" viewBox="0 0 40 37"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M36.7265 13.4614H36.5805V15.9468C36.5805 15.9686 36.5794 15.99 36.5788 16.0117H36.7265C37.125 16.0117 37.4491 16.3359 37.4491 16.7343V32.7424C37.4491 33.1408 37.125 33.465 36.7265 33.465H12.5824C12.184 33.465 11.8599 33.1408 11.8599 32.7424V28.0783H9.30957V32.7424C9.30957 34.5471 10.7778 36.0153 12.5824 36.0153H36.7266C38.5313 36.0153 39.9995 34.5471 39.9995 32.7424V16.7343C39.9994 14.9295 38.5313 13.4614 36.7265 13.4614Z"
                                                        fill="black" />
                                                    <path
                                                        d="M34.0389 16.7875C34.5031 16.7875 34.8795 16.4111 34.8795 15.9469V10.9029C34.8795 10.4387 34.5032 10.0623 34.0389 10.0623C33.665 10.0623 33.3485 10.3065 33.2393 10.644V16.2058C33.3486 16.5433 33.665 16.7875 34.0389 16.7875Z"
                                                        fill="black" />
                                                    <path
                                                        d="M33.9634 28.0536C34.6676 28.0536 35.2385 27.4827 35.2385 26.7784C35.2385 26.0742 34.6676 25.5033 33.9634 25.5033H32.247C31.2919 26.9191 29.731 27.8932 27.9395 28.0536H33.9634Z"
                                                        fill="black" />
                                                    <path
                                                        d="M33.9638 29.4155H15.7537C15.0494 29.4155 14.4785 29.9865 14.4785 30.6907C14.4785 31.3949 15.0494 31.9658 15.7537 31.9658H33.9638C34.668 31.9658 35.239 31.3949 35.239 30.6907C35.239 29.9865 34.668 29.4155 33.9638 29.4155Z"
                                                        fill="black" />
                                                    <path
                                                        d="M30.6899 22.2552V6.24705C30.6899 4.44238 29.2217 2.97418 27.417 2.97418H26.8048V5.52447H27.417C27.8154 5.52447 28.1396 5.84869 28.1396 6.24705V22.2552C28.1396 22.6535 27.8154 22.9778 27.417 22.9778H3.27287C2.87443 22.9778 2.55029 22.6535 2.55029 22.2552V6.24705C2.55029 5.84869 2.87443 5.52447 3.27287 5.52447H3.84388V2.97418H3.27287C1.4682 2.97418 0 4.4423 0 6.24705V22.2551C0 24.0722 1.48138 25.528 3.27287 25.528H27.4169C29.2212 25.5281 30.6899 24.0604 30.6899 22.2552Z"
                                                        fill="black" />
                                                    <path
                                                        d="M18.3045 6.72527C18.7688 6.72527 19.1452 6.34885 19.1452 5.88462V0.840659C19.1452 0.376337 18.7688 0 18.3045 0C17.8403 0 17.4639 0.376337 17.4639 0.840659V5.88462C17.4639 6.34894 17.8403 6.72527 18.3045 6.72527Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12.3446 6.72527C12.8088 6.72527 13.1852 6.34885 13.1852 5.88462V0.840659C13.1852 0.376337 12.8088 0 12.3446 0C11.8802 0 11.5039 0.376337 11.5039 0.840659V5.88462C11.5039 6.34894 11.8802 6.72527 12.3446 6.72527Z"
                                                        fill="black" />
                                                    <path
                                                        d="M6.38558 6.72527C6.84982 6.72527 7.22624 6.34885 7.22624 5.88462V0.840659C7.22624 0.376337 6.8499 0 6.38558 0C5.92134 0 5.54492 0.376337 5.54492 0.840659V5.88462C5.54484 6.34894 5.92126 6.72527 6.38558 6.72527Z"
                                                        fill="black" />
                                                    <path
                                                        d="M24.2635 6.72527C24.7278 6.72527 25.1042 6.34885 25.1042 5.88462V0.840659C25.1042 0.376337 24.7277 0 24.2635 0C23.7993 0 23.4229 0.376337 23.4229 0.840659V5.88462C23.4229 6.34894 23.7992 6.72527 24.2635 6.72527Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.95874 12.1689H15.0845C15.7887 12.1689 16.3597 11.598 16.3597 10.8937C16.3597 10.1895 15.7887 9.61859 15.0845 9.61859H5.95874C5.25452 9.61859 4.68359 10.1895 4.68359 10.8937C4.68359 11.598 5.25452 12.1689 5.95874 12.1689Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.95874 16.1688H24.5779C25.2821 16.1688 25.853 15.5979 25.853 14.8937C25.853 14.1895 25.2821 13.6185 24.5779 13.6185H5.95874C5.25452 13.6185 4.68359 14.1895 4.68359 14.8937C4.68359 15.5979 5.25452 16.1688 5.95874 16.1688Z"
                                                        fill="black" />
                                                    <path
                                                        d="M5.95874 20.1687H24.5779C25.2821 20.1687 25.853 19.5978 25.853 18.8936C25.853 18.1893 25.2821 17.6184 24.5779 17.6184H5.95874C5.25452 17.6184 4.68359 18.1893 4.68359 18.8936C4.68359 19.5978 5.25452 20.1687 5.95874 20.1687Z"
                                                        fill="black" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-center py-2">
                                                    <div>
                                                        <span
                                                            class="fs-3 weiteresfirstSpanText">{{ $todayAppointCount }}</span>
                                                    </div>
                                                    <div class="">
                                                        <span class="fs-5 weiteresSecondSpanText">Termine (Heute)</span>
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
            </div>

        </section>
    @endif
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        function salesCostum() {
            $('#salesCostum').slideToggle()
            $("#activeDropDownItem9").html("Individueller Zeitraum")
        }
        function grupPerformance(){
            var options = {
          series: [{
          name:'',
          data: [
            @foreach($groups2 as $group)
            {{$group > 0.1 ? $group : 0}},
            @endforeach
        ]
         
        }],
          chart: {
          height: 320,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 6,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return '';
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: [
            @foreach($groups1 as $group)
            '{{App\Models\Group::find($group)->name}}',
            @endforeach
          ],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.6,
                opacityTo: 8,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + " personen";
            }
          }
        
        },
        title: {
          text: '',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart9"), options);
        chart.render();
        }
        
        function openDropDownSelect9() {
            var x = document.getElementById("dropdownSelectId9");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function makeSelectActive9(x, number) {
            dateFrom = document.getElementById('salesFrom').value
            dateTo = document.getElementById('salesTo').value
            axios.get('salesoverview?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {

                document.getElementById('Grundversicherung').innerHTML = response.data[0] + ' CHF'
                document.getElementById('Zusatzversicherung').innerHTML = response.data[1] + ' CHF'
                document.getElementById('Autoversicherung').innerHTML = response.data[2] + ' CHF'
                document.getElementById('Vorsorge').innerHTML = response.data[3] + ' CHF'
                document.getElementById('Rechtschutz').innerHTML = response.data[4] + ' CHF'
                document.getElementById('Hausrat').innerHTML = response.data[5] + ' CHF'
                document.getElementById('totaleran').innerHTML = response.data[0] + response.data[1] + response
                    .data[2] + response.data[3] + response.data[4] + response.data[5] + ' CHF'

                for (let i = 0; i < 6; i++) {
                    if (response.data[i] == 0) {
                        response.data[i] = null;
                    }
                }
                $(function() {
                    var data = [{
                        "id": "idData",
                        "name": "Data",
                        "data": [{
                                name: 'Grundversicherung',
                                y: response.data[0],
                                color: 'rgb(34, 132, 0)'
                            },
                            {
                                name: 'Zusatzversicherung',
                                y: response.data[1],
                                color: 'rgb(255, 155, 55)'
                            },
                            {
                                name: 'Autoversicherung',
                                y: response.data[2],
                                color: 'rgb(135, 212, 106)'
                            },
                            {
                                name: 'Vorsorge 3a&3b',
                                y: response.data[3],
                                color: 'rgb(81, 92, 159)'
                            },
                            {
                                name: 'Rechtschutz',
                                y: response.data[4],
                                color: 'rgb(255, 151, 151)'
                            },
                            {
                                name: 'Hausrat',
                                y: response.data[5],
                                color: 'rgb(61, 102, 206)'
                            },
                        ]
                    }];
                    window.mychart = Highcharts.chart('chart8', {
                        chart: {
                            type: 'pie',
                            plotShadow: false,
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                innerSize: '98%',
                                borderWidth: 38,
                                borderColor: null,
                                slicedOffset: 10,
                                dataLabels: {
                                    connectorWidth: 0,
                                    enabled: false,
                                },
                            }
                        },
                        title: {
                            verticalAlign: 'middle',
                            floating: false,
                            text: response.data[0] + response.data[1] + response.data[2] + response
                                .data[3] + response.data[4] + response.data[5] + 'CHF'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                        },
                        enabled: true,
                        series: data,
                    });
                    $('input[type="radio"]').on('click', function(event) {
                        var value = $(this).val();
                        window.mychart.series[0].setData([data[0].data[value]]);
                        window.mychart.redraw();
                    });
                });
            });
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg9");
            $(activeSvg).removeClass("activeSvg9");
            $(svg).addClass("activeSvg9");
            $("#activeDropDownItem9").html(y)
            $("#dropdownSelectId9").hide()
        }
        $(document).ready(function() {  
            makeSelectActive9(6, 0);
            grupPerformance();
        });

        $(document).ready(function(){
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: new google.maps.LatLng(46.818188, 8.227512),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#444444"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "weight": "0.40"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "saturation": "-40"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#333366"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                            "hue": "#ff0000"
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        },
                        {
                            "weight": "1.25"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#dddcdc"
                        }
                    ]
                }
            ]


            });
            var infoWindow = new google.maps.InfoWindow(),
                marker, i;

                @foreach ($appointmm as $app)
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng({{$app->latitude}}, {{$app->longitude}}),
                    map: map,
                    
                });
            

                marker.setIcon('imgs/blue-dot.png');

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent('Pini u bo ');
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
                @endforeach
            var gmarkers = [];

            var mediaQuery = window.matchMedia("(max-width: 700px)");
            if (mediaQuery.matches) {

                let x = document.getElementsByClassName('therapistCardOne');
                var pointMapTo = new google.maps.LatLng(x[0].getAttribute("data-geo-lat"), x[0].getAttribute("data-geo-long"));
                map.setCenter(pointMapTo);


                markermap = new google.maps.Marker({
                    position: new google.maps.LatLng(x[0].getAttribute("data-geo-lat"), x[0].getAttribute("data-geo-long")),
                    map: map
                });
                gmarkers.push(markermap);
            }


            })
    </script>

    <script>
        function createOption(value, text) {
            var option = document.createElement('option');
            if (value.charAt(0) == '1' || value.charAt(0) == '2') {
                option.text = text;
                option.value = value;
            } else {
                option.text = "0" + text;
                option.value = "0" + value;
            }
            return option;
        }
        var z;
        var hourSelect = document.getElementById('hours');
        var hourSelect1 = document.getElementById('hours1');
        var hourSelect2 = document.getElementById('hours2');
        var hourSelect3 = document.getElementById('hours3');

        if (hourSelect) {
            for (var i = 8; i <= 19; i++) {
                for (var j = 0; j < 60; j += 15) {
                    if (j == 0) {
                        z = i + ':' + j + '0'
                    } else {
                        z = i + ':' + j
                    }
                    hourSelect.add(createOption(z, z));
                }

            }
            hourSelect.add(createOption("20:00", "20:00"));
        }
        if (hourSelect1) {
            for (var i = 8; i <= 19; i++) {

                for (var j = 0; j < 60; j += 15) {
                    if (j == 0) {
                        z = i + ':' + j + '0'
                    } else {
                        z = i + ':' + j
                    }
                    hourSelect1.add(createOption(z, z));
                }
            }
            hourSelect1.add(createOption("20:00", "20:00"));
        }
        if (hourSelect2) {
            for (var i = 8; i <= 19; i++) {

                for (var j = 0; j < 60; j += 15) {
                    if (j == 0) {
                        z = i + ':' + j + '0'
                    } else {
                        z = i + ':' + j
                    }
                    hourSelect2.add(createOption(z, z));
                }
            }
            hourSelect2.add(createOption("20:00", "20:00"));
        }
        if (hourSelect3) {
            for (var i = 8; i <= 19; i++) {
                for (var j = 0; j < 60; j += 15) {
                    if (j == 0) {
                        z = i + ':' + j + '0'
                    } else {
                        z = i + ':' + j
                    }
                    hourSelect3.add(createOption(z, z));
                }
            }
            hourSelect3.add(createOption("20:00", "20:00"));
        }
    </script>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<style>
        #map {
            height: 45vh !important;
        }
        .adminHrGreyBg {
            background: #ffffff;
            border: 1px solid #FAFAFA;
            box-shadow: 0px 4px 4px rgba(214, 214, 214, 0.25);
            border-radius: 13px;
        
        }
        .greyBgStats {
            background: #F9FAFC;
            box-shadow: 0px 4px 4px rgba(118, 118, 118, 0.17);
            border-radius: 23px;
        }

        .statsTitleSpan {
            font-weight: 700;
            color: rgba(0, 0, 0, 0.8);
        }

        .statsSelectStyle {
            border: 2px solid rgba(47, 96, 220, 0.28);
            border-radius: 6px;
            position: relative;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .statsSelectStyleDropdown {
            border: 2px solid rgba(47, 96, 220, 0.28);
            border-radius: 6px;
            position: absolute;
            background-color: #fff;
            margin-top: 3px;
            right: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 5;
        }

        .activeSvg circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }

        .activeSvg9 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }

        .greyBorderDivStats {
            border: 2px solid rgba(47, 96, 220, 0.1);
            box-sizing: border-box;
            border-radius: 6px;
        }

        .greySelectStats {
            background-color: rgba(196, 196, 196, 0.23);
            border-radius: 6px;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 1;
        }

        .apexcharts-legend-text {
            font-weight: 500;
            font-size: 18px !important;
            color: #000000;
            line-height: 27px;
            letter-spacing: -1px;
        }
    .add-a-task-header {
        height: 60px;
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

    .dateee {
        border-radius: 15px;
        border: #4CC590 1px solid;
        color: #000;
        background-color: #fff;
    }

    .dateee:hover {
        background-color: #4CC590;
        border-radius: 15px;
        color: #fff;
    }

    .dateee:focus {
        background-color: #4CC590;
        border-radius: 15px;
        color: #fff;
    }

    .box-1 {
        background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='18' ry='18' stroke='black' stroke-width='1' stroke-dasharray='7%2c 11' stroke-dashoffset='63' stroke-linecap='square'/%3e%3c/svg%3e");
        border-radius: 18px;
    }

    body {
        overflow-x: hidden !important;
    }
</style>
<style>
    .to-do-headerrrrr {
        height: 60px;
    }

    /* overflow 1 */
    .overflow-div1::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .overflow-div1::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div1::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div1::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    /* ........................................................... */
    /* overflow 2 */

    .overflow-div2::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .overflow-div2::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div2::-webkit-scrollbar-thumb {
        background: #fff;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div2::-webkit-scrollbar-thumb:hover {
        background: #fff1ff;
        border-radius: 10px;
    }

    /* ........................................................... */
    /* overflow 3 */

    .overflow-div3::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .overflow-div3::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div3::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div3::-webkit-scrollbar-thumb:hover {
        background: #707070;
    }

    /* ...................................................... */
    /* overflow 4 */

    .overflow-div4::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .overflow-div4::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    /* Handle */
    .overflow-div4::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    /* Handle on hover */
    .overflow-div4::-webkit-scrollbar-thumb:hover {
        background: #707070;
    }


    /* ................................................. */

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


    .accordion-button:not(.collapsed) {
        color: #7DBF9A;
        background-color: #fff;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000000'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        /* background-color: transparent !important; */
    }

    .accordion-button:not(.show)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000000'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        /* background-color: transparent !important; */
    }

    .accordion-button.green-acc:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000000'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        /* background-color: transparent !important; */
    }

    .accordion-button.green-acc:not(.show)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000000'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        /* background-color: transparent !important; */
    }

    .accordion-button:focus {
        border-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }

    .name-spnnnn {
        font-weight: 600;
    }

    .fw-600 {
        font-weight: 600;
    }

    .spn-muted {
        color: #707070;
        font-weight: 600;
        font-size: 14px !important;
    }

    .spn-normal {
        font-weight: 600;
        font-size: 14px !important;
    }

    .activedate {
        background-color: #4CC590 !important;
        color: #ffffff !important;
    }
</style>
<style scoped>
    /*.form-control {*/
    /*    border: transparent !important;*/
    /*    font-family: 'Montserrat';*/
    /*}*/
</style>
<style>
    /*Per Notification */
    .coloriii a {
        color: #7F00FF !important;
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

    .number-item {
        background-color: #EFEFEF;
        border-radius: 8px;
    }

    .answer-item {
        background-color: #EFF8FF;
        border-radius: 8px;
    }

    .open-month-items {
        background-color: #FFC428;
        border-radius: 8px;
    }

    .personal-app-items {
        background-color: #fff;
        border: 1px solid #70707080;
        border-radius: 8px;
    }

    .fw-600 {
        font-weight: 600;
    }

    .add-text {
        background-color: #0C71C3;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        font-weight: 650;
        color: #fff;
        display: flex;
        align-items: center;
    }


    /* overflow-scroll divvvvvvvvv */
    .overflow-div {
        padding-right: 15px;
    }

    .overflow-div::-webkit-scrollbar {
        width: 7px;
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


    .to-do-div-new {}

    .to-do-div-new .header {
        border-bottom: 1px solid #70707050;
        border-top: 1px solid #70707050;
        border-left: 1px solid #70707050;
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #D1EBFF;
    }

    .to-do-div-new .content {
        height: 60vh;
    }

    .to-do-div-new .content .overflow-div {
        overflow: auto;
        height: 50vh;

    }

    .to-do-div-new .content .button-div button {
        background-color: #0C71C3;
        font-weight: 700;
        color: #fff;
        border: none;
        border-radius: 8px;
    }

    .to-do-div-new .content label {
        font-weight: 500;
    }

    .to-do-div-new input {
        border: solid 1px #707070 !important;
    }

    .to-do-div-new textarea {
        border: solid 1px #707070 !important;
    }

    .to-do-div-new select {
        border: solid 1px #707070 !important;
    }




    .informational-numbers {}

    .informational-numbers .header {
        border-bottom: 1px solid #70707050;
        border-top: 1px solid #70707050;
        border-right: 1px solid #70707050;
        border-left: 1px solid #70707050;
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #D1EBFF;
    }

    .informational-numbers .content {
        height: 60vh;
        border-left: 1px solid #70707050;
    }

    .informational-numbers .content input {
        border: solid 1px #707070 !important;
    }

    .informational-numbers .content .overflow-div {
        height: 50vh;
        overflow: auto;
    }

    .informational-numbers .content .overflow-div span {
        font-size: 18px;
    }


    .answered-pendencies {}

    .answered-pendencies .header {
        border-bottom: 1px solid #70707050;
        border-top: 1px solid #70707050;
        /* border-right: 1px solid #70707050; */
        border-left: 1px solid #70707050;
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #EFEFEF;
    }

    .answered-pendencies .content {
        height: 60vh;
    }

    .answered-pendencies .content .overflow-div {
        overflow: auto;
        height: 50vh;
    }


    .open-for-month {}

    .open-for-month .header {
        border-bottom: 1px solid #70707050;
        border-top: 1px solid #70707050;
        border-right: 1px solid #70707050;
        border-left: 1px solid #70707050;
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #EFEFEF;
    }

    .open-for-month .content {
        height: 60vh;
        border-left: 1px solid #70707050;

    }

    .open-for-month .content .overflow-div {
        overflow: auto;
        height: 50vh;
    }


    .personal-appointments {}

    .personal-appointments .header {
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

    .personal-appointments .content {
        height: 520px;
        background-color: #EEEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .personal-appointments .content .overflow-div {
        height: 400px;
        overflow: auto;

    }

    .fw-500 {
        font-weight: 500;
    }

    .tablee-123 tr td:first-child {
        border-top-left-radius: 10px;
    }

    .tablee-123 tr td:last-child {
        border-top-right-radius: 10px;
    }

    .tablee-123 tr td:first-child {
        border-bottom-left-radius: 10px;
    }

    .tablee-123 tr td:last-child {
        border-bottom-right-radius: 10px;
    }

    .answw-task .header {
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .answw-task .content {
        /* height: 60vh; */
        min-height: 520px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .answw-task .content .overflow-div {
        overflow: auto;
        height: 440px;
        background-color: #EFEFEF;
        padding: 0 !important;
    }

    .answw-task tr {
        background-color: #fff;
        border-bottom: 5px #EFEFEF solid;
    }

    .sticky-class1 {
        font-weight: 500 !important;
        color: #767676 !important;
        position: sticky !important;
        top: 0;
        background-color: #EFEFEF !important;
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
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

    .fw-600 {
        font-weight: 600;
    }

    .terminSvgResponsiveSize {
        height: 20px;
        width: 20px;
    }

    .calendarResponsiveText1 {
        font-size: 20px;
    }

    .calendarResponsiveText2 {
        font-size: 16px;
    }

    .calendarResponsiveText3 {
        font-size: 20px;
    }

    .hr-req-item {
        border-radius: 8px;
        border: #70707060 2px solid;
    }

    .info-nr-item {
        border-radius: 8px;
        border: #70707060 2px solid;
    }

    .answered-task-item {
        border-radius: 8px;
        border: #70707060 2px solid;
    }

    .open-a-month-item {
        border-radius: 8px;
        border: #dfa92a 2px solid;
    }

    .status-check-item {
        border-radius: 8px;
        border: #70707060 2px solid;
    }

    .txt-01 {
        font-size: 1.1rem;
        font-weight: 600;
        padding-top: 0.3rem;
        padding-bottom: 0.3rem;
    }

    .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }

    .add-a-task-div textarea {
        resize: none;
        border: #70707080 1px solid;
        border-radius: 8px;
    }

    .add-a-task-div input {
        border: #70707080 1px solid;
        border-radius: 8px;
    }


    .add-a-task-content {
        background-color: #EEEFEF;
        border-radius: 8px;
        /* height: 60vh; */
        min-height: 520px !important;

    }

    .answered-task-content {
        background-color: #EEEFEF;
        border-radius: 8px;
        border-top-right-radius: 0px;
        /* height: 60vh; */
        min-height: 520px !important;


    }

    .informational-nr-content {
        background-color: #EEEFEF;
        border-radius: 8px;
        border-top-right-radius: 0px !important;
        /* height: 60vh; */
        min-height: 520px !important;


    }

    .status-check-content {
        background-color: #EEEFEF !important;
        border-radius: 8px !important;
        border-top-right-radius: 0px !important;
        /* height: 60vh !important; */
        min-height: 520px !important;

    }

    .open-a-month-content {
        background-color: #EEEFEF !important;
        border-radius: 8px !important;
        border-top-right-radius: 0px !important;
        /* height: 60vh !important; */
        min-height: 520px !important;
    }

    .hr-req-content {
        background-color: #EEEFEF !important;
        border-radius: 8px !important;
        border-top-right-radius: 0px !important;
        /* height: 60vh !important; */
        min-height: 520px !important;
    }

    .search-button-task {
        background-color: #0C71C3 !important;
        border: 0 !important;
        border-radius: 8px !important;
        color: #fff !important;
        font-weight: 600 !important;
    }

    .assign-pdnc {
        background-color: #0C71C3 !important;
        border: 0 !important;
        border-radius: 8px !important;
        color: #fff !important;
        font-weight: 600 !important;
    }

    .info-nr-button {
        background-color: #0C71C3 !important;
        border: 0 !important;
        border-radius: 8px !important;
        color: #fff !important;
        font-weight: 600 !important;
    }

    .search-icon {
        color: #0C71C3 !important;
        background-color: #fff !important;
        border: 1px solid #707070 !important;
        border-right: none !important;
        border-top-left-radius: 10px !important;
        border-bottom-left-radius: 10px !important;

    }

    .answered-task-content input {
        border-color: #707070 !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-left: none !important;
    }

    .open-a-month-content input {
        border-color: #707070 !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-left: none !important;
    }

    .status-check-item {
        background-color: #fff !important;
        border-radius: 8px !important;
    }

    .open-a-month-overflow {
        /* height: 50vh; */
        overflow: auto;
        height: 420px;
    }

    .open-a-month-overflow::-webkit-scrollbar {
        width: 4px;
    }

    .open-a-month-overflow::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    .open-a-month-overflow::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    .open-a-month-overflow::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .hr-req-overflow {
        /* height: 50vh; */
        overflow: auto;
        height: 420px;
    }

    .hr-req-overflow::-webkit-scrollbar {
        width: 4px;
    }

    .hr-req-overflow::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    .hr-req-overflow::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    .hr-req-overflow::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .status-check-overflow {
        /* height: 50vh; */
        overflow: auto;
        height: 420px;

    }

    .status-check-overflow::-webkit-scrollbar {
        width: 4px;
    }

    .status-check-overflow::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    .status-check-overflow::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    .status-check-overflow::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .info-nr-overflow-div {
        /* height: 50vh; */
        overflow: auto;
        height: 439px;
    }

    .info-nr-overflow-div::-webkit-scrollbar {
        width: 4px;
    }

    .info-nr-overflow-div::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    .info-nr-overflow-div::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    .info-nr-overflow-div::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }

    .answered-tasks-overflow-content {
        /* height: 45vh; */
        overflow: auto;
        height: 420px;

    }

    .answered-tasks-overflow-content::-webkit-scrollbar {
        width: 4px;
    }

    .answered-tasks-overflow-content::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px;
    }

    .answered-tasks-overflow-content::-webkit-scrollbar-thumb {
        background: #c9cad8;
        border-radius: 10px;
    }

    .answered-tasks-overflow-content::-webkit-scrollbar-thumb:hover {
        background: #707070;
        border-radius: 10px;
    }
</style>
<style>
    .add-button {
        background-color: #0C71C3;
        color: #fff;
        border: none;
        border-radius: 10px;
    }

    .input-group-append input[type=checkbox] {
        border-radius: 0.25em;
        height: 29px;
        width: 29px;
    }

    .container1 {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container1 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: 6px;
        left: 5px;
        height: 25px;
        width: 25px;
        background-color: #fff;
        border: 6px solid #2196F3;
        border-radius: 50%;
    }

    .container1 input:checked~.checkmark {
        background-color: #2196F3;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container input:checked~.checkmark:after {
        display: block;
    }

    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .addRowBtn {
        background-color: #2196F3;
        color: #fff;
        border: 1px solid #2196F3;
        border-radius: 10px;
        margin-left: 5px;
    }

    .to-do-new .ovrflw {
        /* height: 50vh; */
        overflow: auto;
        height: 446px;
    }

    .to-do-new .content {
        background-color: #eee;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        /* height: 60vh !important; */
        min-height: 520px !important;
    }


    .ovrflw::-webkit-scrollbar {
        width: 6px;
    }

    .ovrflw::-webkit-scrollbar-track {
        background: transparent;
    }

    .ovrflw::-webkit-scrollbar-thumb {
        background: #2196F3;
        border-radius: 6px;
    }

    .ovrflw::-webkit-scrollbar-thumb:hover {
        background: #2196F350;
    }


    .fw-600 {
        font-weight: 600;
    }

    .tablee-123 tr td:first-child {
        border-top-left-radius: 10px;
    }

    .tablee-123 tr td:last-child {
        border-top-right-radius: 10px;
    }

    .tablee-123 tr td:first-child {
        border-bottom-left-radius: 10px;
    }

    .tablee-123 tr td:last-child {
        border-bottom-right-radius: 10px;
    }


    .tablee-12345 tr td:first-child {
        border-top-left-radius: 10px;
    }

    .tablee-12345 tr td:last-child {
        border-top-right-radius: 10px;
    }

    .tablee-12345 tr td:first-child {
        border-bottom-left-radius: 10px;
    }

    .tablee-12345 tr td:last-child {
        border-bottom-right-radius: 10px;
    }


    .tablee-123456 tr td:first-child {
        border-top-left-radius: 10px;
    }

    .tablee-123456 tr td:last-child {
        border-top-right-radius: 10px;
    }

    .tablee-123456 tr td:first-child {
        border-bottom-left-radius: 10px;
    }

    .tablee-123456 tr td:last-child {
        border-bottom-right-radius: 10px;
    }


    .answw-task .header {
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    /* .answw-task .content {
        height: 450px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    } */

    .answw-task .content .overflow-div {
        overflow: auto;
        height: 440px;
        background-color: #EFEFEF;
        padding: 0 !important;
    }

    .answw-task tr {
        background-color: #fff;
        border-bottom: 5px #EFEFEF solid;
    }


    .answw-task123 .header {
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .answw-task123 .content {
        /* height: 60vh; */
        min-height: 520px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .answw-task123 .content .overflow-div {
        overflow: auto;
        height: 440px;
        background-color: #EFEFEF;
        padding: 0 !important;
    }

    .answw-task123 tr {
        background-color: #fff;
        border-bottom: 5px #EFEFEF solid;
    }


    .answw-task12345 .header {
        display: flex;
        align-items: center;
        font-weight: bold;
        height: 60px;
        background-color: #fff;
    }

    .answw-task12345 .content {
        /* height: 60vh; */
        min-height: 520px;
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .answw-task12345 .content .overflow-div {
        overflow: auto;
        height: 440px;
        background-color: #EFEFEF;
        padding: 0 !important;
    }

    .answw-task12345 tr {
        background-color: #fff;
        border-bottom: 5px #EFEFEF solid;
    }


    .sticky-class1 {
        font-weight: 500 !important;
        color: #767676 !important;
        position: sticky !important;
        top: 0;
        background-color: #EFEFEF !important;
    }

    .statuscheck-mobb {
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .dsdsdsw3 {
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .mobby-dk {
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
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

    .mob-sect {
        display: none;
    }

    .desk-sect {
        display: block;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 45px;
        height: 20px;
        top: -15px;
        left: 5px
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 12px;
        width: 12px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .mobile-sswr {
        background-color: #EFEFEF;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .cornerSvgToDoList {
        margin-top: -3.75rem !important;
        margin-left: -3.9rem !important;
    }

    .titleMarginAuto {
        margin-top: -0.8rem !important;
        margin-left: -1rem;
    }

    @media (max-width: 767.98px) {
        .mob-sect {
            display: block;
        }

        .desk-sect {
            display: none;
        }

        .cornerSvgToDoList {
            margin-top: -3.28rem !important;
            margin-left: -3.4rem !important;
        }

        .removeGuttersMobile {
            --bs-gutter-x: 0rem !important;
        }

        .titleMarginAuto {
            margin-top: -0.4rem !important;
            margin-left: -1rem;
        }

        @media (max-width: 578.98px) {
            .cornerSvgToDoList svg {
                width: 100px;
                height: auto;
            }

            .hideOnMobile {
                display: none !important;
            }

            .cornerSvgToDoList {
                margin-top: -2.5rem !important;
                margin-left: -2.7rem !important;
            }

        }
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>
<script>
 
    var date = 0;
    ///////////////////////////////////////////
    function firstDivToggleFunct1a() {
        $('#firstDivToggle1a').slideUp(200);
        $('#secondDivToggle1a').slideDown(200);
    }

    function secondDivToggleFunct1a() {
        $('#secondDivToggle1a').slideUp(200);
        $('#firstDivToggle1a').slideDown(200);
    }


    //////////////////funct////////////////

    function firstDivToggleFunct2a() {
        $('#firstDivToggle2a').slideUp(200);
        $('#secondDivToggle2a').slideDown(200);
    }

    function secondDivToggleFunct2a() {
        $('#secondDivToggle2a').slideUp(200);
        $('#firstDivToggle2a').slideDown(200);
    }

    ////////////////////funct///////////////

    function firstDivToggleFunct3a() {
        $('#firstDivToggle3a').slideUp(200);
        $('#secondDivToggle3a').slideDown(200);
    }

    function secondDivToggleFunct3a() {
        $('#secondDivToggle3a').slideUp(200);
        $('#firstDivToggle3a').slideDown(200);
    }

    ////////////////////funct///////////////

    function firstDivToggleFunct4a() {
        $('#firstDivToggle4a').slideUp(200);
        $('#secondDivToggle4a').slideDown(200);
    }

    function secondDivToggleFunct4a() {
        $('#secondDivToggle4a').slideUp(200);
        $('#firstDivToggle4a').slideDown(200);
    }

    //////////////////////funct/////////////

    function firstDivToggleFunct5a() {
        $('#firstDivToggle5a').slideUp(200);
        $('#secondDivToggle5a').slideDown(200);
    }

    function secondDivToggleFunct5a() {
        $('#secondDivToggle5a').slideUp(200);
        $('#firstDivToggle5a').slideDown(200);
    }

    /////////////////////////////////////////


    function firstDivToggleFunct6a() {
        $('#firstDivToggle6a').slideUp(200);
        $('#secondDivToggle6a').slideDown(200);
    }

    function secondDivToggleFunct6a() {
        $('#secondDivToggle6a').slideUp(200);
        $('#firstDivToggle6a').slideDown(200);
    }
    //     $(document).ready(function(){
    //         sortbydate();
    //     });
    //
    // function sortbydate(x2){
    //
    //     axios.get('provisionert/date='+ x2).then((response) => {
    //
    //         $('#grund').html(response.data[0]);
    //         $('#rechts').html(response.data[1]);
    //         $('#vor').html(response.data[2]);
    //         $('#auto').html(response.data[3]);
    //         $('#zus').html(response.data[4]);
    //         $('#haus').html(response.data[5]);
    //     })
    // }
</script>
<style>
    .sideBarStyle {
        left: 0px;
        top: 0px;
        height: 100%;
        background: #f7f7f7;
    }

    .bluePageIndicator {
        visibility: hidden;
    }

    .activePage {
        visibility: visible;

    }

    .passiveSvg {
        stroke: #A7A4A4 !important;
        fill: #A7A4A4 !important;
    }

    .activeSvgIndicator svg {
        stroke: #2F60DC !important;
        /* fill: #2F60DC !important; */

    }

    .activePageIndicator {
        font-size: 17px;
        color: #2F60DC;
        font-weight: 500;
    }

    .passivePageIndicator {
        font-size: 17px;
        color: #A7A4A4;
        cursor: pointer;
        font-weight: 400;

    }

    .navbarFirstHr {
        background-color: rgba(196, 196, 196, 0.9);
    }

    .removeTextOnMobile {
        display: block;
    }

    .noselectTextDash {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Old versions of Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
        user-select: none;
        /* Non-prefixed version, currently
                                         supported by Chrome, Edge, Opera and Firefox */
    }

    @media (max-width: 991.98px) {
        .removeTextOnMobile {
            display: none;
        }
    }
</style>
<style>
    .greenBorderDiv {
        border: 3px solid #CAE9BF;
        box-sizing: border-box;
        border-radius: 23px;
        position: relative;
    }

    .yellowBorderDiv {
        border: 3px solid #FDF5AC;
        box-sizing: border-box;
        border-radius: 23px;
        position: relative;
    }

    .orangeBorderDiv {
        border: 3px solid #FDE4CB;
        box-sizing: border-box;
        border-radius: 23px;
        position: relative;
    }

    .greyBorderDiv {
        border: 3px solid #EDF0F8;
        box-sizing: border-box;
        border-radius: 23px;
        position: relative;
    }

    .cornerSvgDash {
        position: absolute;
        top: -2.2rem;
        left: -2.5rem;
    }

    .cornerSvgDash svg {
        width: 150px;
    }

    .textDivDash {
        line-height: 1.2;
    }

    .bigTitleDash {
        font-weight: 700;
        font-size: 43px
    }

    @media (max-width: 576px) {
        .smallTitleDash {
            font-weight: 700;
            font-size: 16px
        }
    }

    @media (min-width: 576px) {
        .smallTitleDash {
            font-weight: 700;
            font-size: 20px
        }
    }


    .dashboardSubTitle {
        font-weight: 700;
    }

    .termineBorderDiv {
        background: rgba(229, 233, 243, 0.24);
        border: 2px solid rgba(54, 112, 189, 0.12);
        box-sizing: border-box;
        border-radius: 13px;
    }

    .termineDateStyle {
        font-weight: 700;
        color: #767678;
    }

    .termineWeekDayStyle {
        color: rgba(124, 124, 124, 0.75);
        font-weight: 500;

    }

    .termineGreyBgDiv {
        background: rgba(229, 233, 243, 0.24);
        border-radius: 23px;
    }

    .termineGreyBgSpan {
        font-weight: 500;
        color: rgba(124, 124, 124, 0.75);
    }

    .weiteresGreyBgDiv {
        background-color: #2F60DC1A;
        border-radius: 23px;
        position: relative;
    }

    .smallCornerSvg {
        position: absolute;
        top: 1rem;
        left: 1rem;
    }

    .weiteresfirstSpanText {
        font-weight: 700;
    }

    .weiteresSecondSpanText {
        font-weight: 700;

    }

    .addMoreDash {
        font-weight: 500;
        font-size: 22px;
        color: rgba(0, 0, 0, 0.73);
    }

    .secondGreyBorderDash {
        background: rgba(220, 228, 249, 0.09);
        border: 2px solid rgba(47, 96, 220, 0.17);
        border-radius: 23px;
        -webkit-logical-height: -webkit-fill-available;
    }

    .secondGreyBorderDashSpan {
        font-weight: 600;
    }

    .thirdBorderDivDash {
        border: 1px solid #DCE4F9;
        box-sizing: border-box !important;
        border-radius: 11px !important;
    }

    .container1 {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        font-weight: 500;
        color: #5A5A5A;
    }

    .container1 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark1 {
        position: absolute;
        top: 0px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 4px;
    }

    .container1:hover input~.checkmark1 {
        background-color: #ccc;
    }

    .container1 input:checked~.checkmark1 {
        background: #2F60DC;
        border-radius: 4px;
    }

    .checkmark1:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container1 input:checked~.checkmark1:after {
        display: block;
    }

    .toDoListeInput {
        border: 1px solid #f3f3f3 !important;
    }

    .toDoListeInput::placeholder {
        color: #CBCBCB !important;
    }

    .container1 .checkmark1:after {
        left: 9px;
        top: 5px;
        width: 7px;
        height: 13px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .overFlowDivDashboard {
        height: 23vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .anfragenTitleSpans {
        font-size: 16px !important;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.73)
    }

    .kontaktBtnDash {
        background: #5288F5;
        border-radius: 13px;
        border: none;
        font-weight: 600;
        color: #FFFFFF;
    }

    .beraterDropDown {
        position: absolute;
        z-index: 10;
        width: 100%;
        top: 2.7rem;
        display: none;
    }

    .switch5 {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 24px;
    }

    .switch5 input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #5288F5;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #5288F5;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .selectDashBoardStyle {
        border: none !important;
        background: url("imgs/blueArrow.svg") no-repeat !important;
        background-position: calc(100% - 0.5rem) center !important;
        background-size: contain !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        appearance: none !important;
        padding-right: 1.5rem !important;
    }

    .selectDashBoardStyle2 {
        border: none !important;
        background-position: calc(100% - 0.5rem) center !important;
        background-size: contain;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        appearance: none !important;
        padding-right: 1.5rem !important;
        box-shadow: none !important;
    }

    .kundeSelectStyle {
        border-radius: 11px !important;
        background-color: rgba(229, 233, 243, 0.24) !important;
        background-image: url('imgs/blueArrow2.svg') !important;
        background-size: 30px 100% !important;
        background-position: right 0px !important;
    }

    .kundeSelectStyle:disabled {
        background-color: rgba(229, 233, 243, 0.24) !important;
        background-image: url('imgs/greyArrow.svg') !important;
    }

    .inputStyleDash {
        border: 1px solid #f3f3f3 !important;
        box-sizing: border-box;
        border-radius: 11px;
    }

    .grundBesInputStyle {
        border-radius: 8px !important;
    }

    .orangeDivPendenzen {
        background: #FEAF61;
        border-radius: 6px;
        font-weight: 500;
        color: #FFFFFF;
        width: 90%;
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

    .secondGreyBorderDash {
        background: rgba(220, 228, 249, 0.09);
        border: 2px solid rgba(47, 96, 220, 0.17);
        border-radius: 23px;
        -webkit-logical-height: -webkit-fill-available;
    }

    .secondGreyBorderDashSpan {
        font-size: 23px;
    }

    @media (max-width: 578.98px) {

        .secondGreyBorderDashSpan {
            font-size: 18px;
        }

        .calendarResponsiveText1 {
            font-size: 16px;
        }

        .calendarResponsiveText2 {
            font-size: 14px;
        }

        .calendarResponsiveText3 {
            font-size: 14px;
        }

        .terminSvgResponsiveSize {
            height: 16px;
            width: 14px;
        }
    }
</style>
<style>
    .sideBarStyle {
        left: 0px;
        top: 0px;
        height: 100%;
        background: #f7f7f7;
    }

    .highcharts-title {
        font-family: montserrat;
        font-weight: bold;
        font-size: 20px !important;
    }

    .bluePageIndicator {
        visibility: hidden;
    }

    .activePage {
        visibility: visible;

    }

    .passiveSvg {
        stroke: #A7A4A4 !important;
        fill: #A7A4A4 !important;
    }

    .activeSvgIndicator svg {
        stroke: #2F60DC !important;
        /* fill: #2F60DC !important; */

    }

    .activePageIndicator {
        font-size: 17px;
        color: #2F60DC;
        font-weight: 500;
    }

    .passivePageIndicator {
        font-size: 17px;
        color: #A7A4A4;
        cursor: pointer;
        font-weight: 400;

    }

    .navbarFirstHr {
        background-color: rgba(196, 196, 196, 0.9);
    }

    .removeTextOnMobile {
        display: block;
    }

    @media (max-width: 991.98px) {
        .removeTextOnMobile {
            display: none;
        }
    }
</style>
<style>
    .greyBgStats {
        background: #F9FAFC;
        box-shadow: 0px 4px 4px rgba(118, 118, 118, 0.17);
        border-radius: 23px;
    }

    .statsTitleSpan {
        font-weight: 700;
        color: rgba(0, 0, 0, 0.8);
    }

    .statsSelectStyle {
        border: 2px solid rgba(47, 96, 220, 0.28);
        border-radius: 6px;
        position: relative;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .statsSelectStyleDropdown {
        border: 2px solid rgba(47, 96, 220, 0.28);
        border-radius: 6px;
        position: absolute;
        background-color: #fff;
        margin-top: 3px;
        right: 0;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        z-index: 5;
        width: 300px;
    }

    .activeSvg circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg1 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg2 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg3 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg4 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg5 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg6 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .activeSvg7 circle {
        fill: #2F60DC;
        stroke: #2F60DC;
    }

    .greyBorderDivStats {
        border: 2px solid rgba(47, 96, 220, 0.1);
        box-sizing: border-box;
        border-radius: 6px;
    }

    .greySelectStats {
        background-color: rgba(196, 196, 196, 0.23) !important;
        border-radius: 6px !important;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        z-index: 1;
    }

    .apexcharts-legend-text {
        font-weight: 500;
        font-size: 18px !important;
        color: #000000;
        line-height: 27px;
        letter-spacing: -1px;
    }

    .contractsWhiteBgDiv {
        background: #FFFFFF;
        border: 1px solid #EAE9E9;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .contractsSecondSpan {
        font-weight: 600;
        line-height: 30px;
    }

    .whiteBgGraph {
        background: #FFFFFF;
        border: 1px solid #EAE9E9;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .apexcharts-menu-icon {
        display: none !important;
    }

    .ltBlueSmallDiv {
        background: #AFD9F1;
        border-radius: 7px;
        color: #fff;
    }

    .ltPinkSmallDiv {
        background: #FFC9C9;
        border-radius: 7px;
        color: #fff;
    }

    .BlueSmallDiv {
        background: #92B4F9;
        border-radius: 7px;
        color: #fff;
    }

    .BlueSmallDiv {
        background: #92B4F9;
        border-radius: 7px;
        color: #fff;
    }

    .greenSmallDiv {
        background: #B5D7A9;
        border-radius: 7px;
        color: #fff;
    }

    .darkBlueSmallDiv {
        background: #576997;
        border-radius: 7px;
        color: #fff;
    }

    .orangeSmallDiv {
        background: #FBCA99;
        border-radius: 7px;
        color: #fff;
    }



    .greyBgImpressions {
        background: #BAC7D3;
        border-radius: 7px;
        color: #fff;
        line-height: 1.1;
    }

    .yellowClicksBg {
        background: #FEDC7B;
        border-radius: 7px;
        color: #fff;
        line-height: 1.1;
    }

    .highcharts-background {
        fill: transparent;
    }

    .canvasjs-chart-credit {
        display: none !important;
    }

    .apexcharts-canvas {
        margin: auto;
    }

    .customResponsiveHeight {
        height: 100% !important;
    }

    .customResponsiveMargin {
        margin-top: -1.5rem;
    }

    @media (max-width: 1399.98px) {
        .contractsWhiteBgDiv svg {
            width: 60px;
        }
    }

    @media (max-width: 1199.98px) {
        .contractsWhiteBgDiv svg {
            width: 55px;
        }

        .customResponsiveHeight {
            height: 23vh !important;
        }

        .customResponsiveMargin {
            margin-top: 0%;
        }
    }

    @media (max-width: 991.98px) {
        .contractsWhiteBgDiv svg {
            width: 45px;
        }

        #chart6 {
            margin: auto;
            width: 70% !important;
        }
    }

    @media (max-width: 767.98px) {
        #chart6 {
            margin: auto;
            width: 80% !important;
        }
    }

    @media (max-width: 575.98px) {
        .greyBgStats {
            height: auto !important;
        }

        #chart6 {
            margin: auto;
            width: 100% !important;
        }

        #chart6 .apexcharts-legend {
            display: none;
        }

        #chart6 {
            padding-top: 2rem;
        }
    }
</style>
<script>
    function openDropDownSelect() {
        var x = document.getElementById("dropdownSelectId");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect1() {
        var x = document.getElementById("dropdownSelectId1");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect2() {
        var x = document.getElementById("dropdownSelectId2");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect3() {
        var x = document.getElementById("dropdownSelectId3");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect4() {
        var x = document.getElementById("dropdownSelectId4");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect5() {
        var x = document.getElementById("dropdownSelectId5");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect6() {
        var x = document.getElementById("dropdownSelectId6");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function openDropDownSelect7() {
        var x = document.getElementById("dropdownSelectId7");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function statisticContrats() {
        berater = document.getElementById('berater')
        model = document.getElementById('model')
        gesellschaft = document.getElementById('gesellschaft')

        axios.get('statistic?berater=' + berater.value + '&model=' + model.value + '&gesellschaft=' + gesellschaft
            .value).then(response => {
            var totali = 0

            if (response.data['Provisionert'] != null) {
                document.getElementById('provisionert').innerHTML = response.data['Provisionert']
                totali += response.data['Provisionert']
            } else {
                document.getElementById('provisionert').innerHTML = 0
            }
            if (response.data['Aufgenommen'] != null) {
                document.getElementById('aufgenommen').innerHTML = response.data['Aufgenommen']
                totali += response.data['Aufgenommen']
            } else {
                document.getElementById('aufgenommen').innerHTML = 0
            }
            if (response.data['Eingereicht'] != null) {
                document.getElementById('eingereicht').innerHTML = response.data['Eingereicht']
                totali += response.data['Eingereicht']
            } else {
                document.getElementById('eingereicht').innerHTML = 0
            }
            if (response.data['Abgelehnt'] != null) {
                document.getElementById('abgelehnt').innerHTML = response.data['Abgelehnt']
                totali += response.data['Abgelehnt']
            } else {
                document.getElementById('abgelehnt').innerHTML = 0
            }



            $(function() {
                var data = [{
                    "id": "idData",
                    "name": "Data",
                    "data": [{
                            name: 'Provisionert',
                            y: response.data['Provisionert'],
                            color: '#43B21C'
                        },
                        {
                            name: 'Aufgenommen',
                            y: response.data['Aufgenommen'],
                            color: '#9FD78C'
                        },
                        {
                            name: 'Eingereicht',
                            y: response.data['Eingereicht'],
                            color: '#C4C4C4'
                        },
                        {
                            name: 'Abgelehnt',
                            y: response.data['Abgelehnt'],
                            color: '#DB5437'
                        },
                        {
                            name: 'Offen Berater',
                            y: response.data['Offen (Berater)'],
                            color: '#F79C42'
                        },

                    ]
                }];
                window.mychart = Highcharts.chart('chart1', {
                    chart: {
                        type: 'pie',
                        plotShadow: false,
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        pie: {
                            innerSize: '98%',
                            borderWidth: 38,
                            borderColor: null,
                            slicedOffset: 10,
                            dataLabels: {
                                connectorWidth: 0,
                                enabled: false,
                            },

                        }
                    },
                    title: {
                        verticalAlign: 'middle',
                        floating: false,
                        text: totali,
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                    },
                    enabled: true,
                    series: data,
                });
                $('input[type="radio"]').on('click', function(event) {
                    var value = $(this).val();
                    window.mychart.series[0].setData([data[0].data[value]]);
                    window.mychart.redraw();
                });
            });
        })
    }


    $(document).ready(function() {
        makeSelectActive5(6, 0);
        makeSelectActive(6, 0);
        makeSelectActive1(6, 0)
    });


    function makeSelectActive(x, number) {
        dateFrom = document.getElementById('statusvomvertragFrom').value
        dateTo = document.getElementById('statusvomvertragTo').value

        axios.get('filtercontract?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {

            document.getElementById('provisionert').innerHTML = response.data[0]
            document.getElementById('aufgenommen').innerHTML = response.data[1]
            document.getElementById('eingereicht').innerHTML = response.data[2]
            document.getElementById('abgelehnt').innerHTML = response.data[3]
            // document.getElementById('offenBerater').innerHTML = response.data[4]
            for (let i = 0; i < 4; i++) {
                if (response.data[i] == 0) {
                    response.data[i] = null;
                }

            }

            $(function() {
                var data = [{
                    "id": "idData",
                    "name": "Data",
                    "data": [{
                            name: 'Provisionert',
                            y: response.data[0],
                            color: '#43B21C'
                        },
                        {
                            name: 'Aufgenommen',
                            y: response.data[1],
                            color: '#9FD78C'
                        },
                        {
                            name: 'Eingereicht',
                            y: response.data[2],
                            color: '#C4C4C4'
                        },
                        {
                            name: 'Abgelehnt',
                            y: response.data[3],
                            color: '#DB5437'
                        },
                        // { name:'Offen Berater', y: response.data[4], color: '#F79C42' },

                    ]
                }];
                window.mychart = Highcharts.chart('chart1', {
                    chart: {
                        type: 'pie',
                        plotShadow: false,
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        pie: {
                            innerSize: '98%',
                            borderWidth: 38,
                            borderColor: null,
                            slicedOffset: 10,
                            dataLabels: {
                                connectorWidth: 0,
                                enabled: false,
                            },

                        }
                    },
                    title: {
                        verticalAlign: 'middle',
                        floating: false,
                        text: response.data[0] + response.data[1] + response.data[2] + response
                            .data[3],
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                    },
                    enabled: true,
                    series: data,
                });
                $('input[type="radio"]').on('click', function(event) {
                    var value = $(this).val();
                    window.mychart.series[0].setData([data[0].data[value]]);
                    window.mychart.redraw();
                });
            });

        })


        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg");
        $(activeSvg).removeClass("activeSvg");
        $(svg).addClass("activeSvg");
        $("#activeDropDownItem").html(y)
        $("#dropdownSelectId").hide()
    }

    function makeSelectActive1(x, numberi) {
        dateFrom = document.getElementById('vertragFrom').value
        dateTo = document.getElementById('vertragTo').value
        axios.get('provisionert?numberi=' + numberi + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {

            $('#grund').html(response.data[0]);
            $('#rechts').html(response.data[1]);
            $('#vor').html(response.data[2]);
            $('#auto').html(response.data[3]);
            $('#zus').html(response.data[4]);
            $('#haus').html(response.data[5]);
        })

        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg1");
        $(activeSvg).removeClass("activeSvg1");
        $(svg).addClass("activeSvg1");
        $("#activeDropDownItem1").html(y)
        $("#dropdownSelectId1").hide()
    }

    function makeSelectActive2(x) {
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg2");
        $(activeSvg).removeClass("activeSvg2");
        $(svg).addClass("activeSvg2");
        $("#activeDropDownItem2").html(y)
        $("#dropdownSelectId2").hide()
    }

    function makeSelectActive3(x) {
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg3");
        $(activeSvg).removeClass("activeSvg3");
        $(svg).addClass("activeSvg3");
        $("#activeDropDownItem3").html(y)
        $("#dropdownSelectId3").hide()
    }

    function makeSelectActive4(x) {
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg4");
        $(activeSvg).removeClass("activeSvg4");
        $(svg).addClass("activeSvg4");
        $("#activeDropDownItem4").html(y)
        $("#dropdownSelectId4").hide()
    }

    function makeSelectActive5(x, number) {

        dateFrom = document.getElementById('leadsFrom').value
        dateTo = document.getElementById('leadsTo').value

        axios.get('filterLead?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
            // document.getElementById('notTerminated').innerHTML = response.data[0]
            // document.getElementById('terminated').innerHTML = response.data[1]



            if (response.data[0] + response.data[1] + response.data[2] == 0) {
                document.querySelector("#chart3").innerHTML =
                    '<div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #9F9F9F">' +
                    '<div class="py-5">Keine Data</div></div>';
            } else {

                var options = {
                    colors: ['#001C62', '#3D66CE', '#74A3E1'],

                    series: [response.data[1], response.data[0], response.data[2]],
                    chart: {
                        width: 380,
                        type: 'pie',
                    },
                    stroke: {
                        width: 0

                    },
                    fill: {
                        colors: ['#001C62', '#3D66CE', '#74A3E1']
                    },
                    dataLabels: {
                        enabled: false
                    },
                    labels: ['Abgeschlossen', 'Nicht abgeschlossen', 'Won Leads'],
                    legend: {

                        offsetY: -10,


                    },
                    responsive: [{
                        breakpoint: 1400,
                        options: {
                            chart: {
                                width: "100%",

                            },
                            legend: {
                                position: 'bottom',
                                offsetY: 0,

                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#chart3"), options);
                chart.render();
                chart.updateSeries([response.data[1], response.data[0], response.data[2]]);
            }
            // $(function () {
            //     var data = [{
            //         "id": "idData",
            //         "name": "Data",
            //         "data":[
            //             {name: 'Nicht abgeschlossen', y: response.data[0], color: '#43B21C'},
            //             {name: 'Abgeschlossen', y: response.data[1], color: '#DB5437'},

            //         ]
            //     }];
            //     window.mychart = Highcharts.chart('chart3', {
            //         chart: {
            //             type: 'pie',
            //             plotShadow: false,
            //         },
            //         height: 300,
            //         credits: {
            //             enabled: false
            //         },
            //         plotOptions: {
            //             pie: {
            //                 innerSize: '98%',
            //                 borderWidth: 38,
            //                 borderColor: null,
            //                 slicedOffset: 10,
            //                 dataLabels: {
            //                     connectorWidth: 0,
            //                     enabled: false,
            //                 },

            //             }
            //         },
            //         title: {
            //             verticalAlign: 'middle',
            //             floating: false,
            //             text: response.data[0] + response.data[1],
            //         },
            //         legend: {
            //             layout: 'vertical',
            //             align: 'right',
            //             verticalAlign: 'middle',
            //         },
            //         enabled: true,
            //         series: data,
            //     });
            //     $('input[type="radio"]').on('click', function (event) {
            //         var value = $(this).val();
            //         window.mychart.series[0].setData([data[0].data[value]]);
            //         window.mychart.redraw();
            //     });
            // });



        });
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg5");
        $(activeSvg).removeClass("activeSvg5");
        $(svg).addClass("activeSvg5");
        $("#activeDropDownItem5").html(y)
        $("#dropdownSelectId5").hide()
    }

    function makeSelectActive6(x) {
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg6");
        $(activeSvg).removeClass("activeSvg6");
        $(svg).addClass("activeSvg6");
        $("#activeDropDownItem6").html(y)
        $("#dropdownSelectId6").hide()
    }

    function makeSelectActive7(x) {
        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg7");
        $(activeSvg).removeClass("activeSvg7");
        $(svg).addClass("activeSvg7");
        $("#activeDropDownItem7").html(y)
        $("#dropdownSelectId7").hide()
    }
</script>
<script>
    $('select').selectpicker();
</script>


<script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("chart3", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"

            }
        }
    });
    chart.render();
</script>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("funnel", {
            animationEnabled: true,
            credits: {
                enabled: false,
            },

            title: {
                text: ""
            },

            data: [{
                type: "funnel",
                indexLabel: "{label} - {y}",
                toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                neckWidth: 50,
                neckHeight: 0,
                valueRepresents: "area",
                dataPoints: [{
                        y: 500,
                        label: "Screened",
                    },
                    {
                        y: 200,
                        label: "",
                        color: "#fff"
                    },
                    {
                        y: 308,
                        label: "Interviewed"
                    },
                    {
                        y: 150,
                        label: "",
                        color: "#fff"
                    },
                    {
                        y: 151,
                        label: "Filled"
                    },

                ],

            }]
        });
        calculatePercentage();
        chart.render();

        function calculatePercentage() {
            var dataPoint = chart.options.data[0].dataPoints;
            var total = dataPoint[0].y;
            for (var i = 0; i < dataPoint.length; i++) {
                if (i == 0) {
                    chart.options.data[0].dataPoints[i].percentage = 100;
                } else {
                    chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
                }
            }
        }

    }

    function statusvomvertragCostum() {
        $('#statusvomvertragCostum').slideToggle()
        $("#activeDropDownItem").html("Individueller Zeitraum")
    }

    function vertragCostum() {
        $('#vertragCostum').slideToggle()
        $("#activeDropDownItem1").html("Individueller Zeitraum")
    }

    function leadsCostum() {
        $('#leadsCostum').slideToggle()
        $("#activeDropDownItem5").html("Individueller Zeitraum")
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
