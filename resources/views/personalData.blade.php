@extends('template.navbar')
@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<title>HR Kunde</title>
<div class="row g-0">

    <div class="col">
        <div class="p-4 p-sm-0 p-md-4 pt-sm-4">
            <div>
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-xl-3">
                        {{-- modali --}}
                        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content p-3" style="border-radius: 24px !important;">
                                    <div class="modal-header" style="border-bottom: 0 !important;">
                                        <div class="row g-0">
                                            <div class="col">
                                                <span class="modal-title mx-2 fs-5" id="exampleModalLabel" style="font-family: 'Montserrat' !important;font-weight:700;color: #434343">
                                                    Persönliche Daten
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="border-0" style="opacity: 1 !important;background-color: transparent" data-bs-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#434343" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mb-0" action="{{ url('updatePersonalData') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="emp_id" value="{{ $personalData->admin_id }}">
                                            <div class="px-4">
                                                <div>
                                                    <label for="profile_picture" class="leadsCustomFileInput form-control px-0" style="cursor: pointer;">
                                                        <span style="font-family: 'Montserrat' !important;font-weight: 600;color: #434343" class="fs-6">Picture</span>

                                                        <div class="row g-0 p-1" style="border: 1px solid #F0F2F4;border-radius:10px">
                                                            <div class="col col-md my-auto ps-2">
                                                                <span id="afterUploadTextKunden" style="font-size: 14px;">keine Datei ausgewählen</span>
                                                            </div>
                                                            <div class="col-auto col-md-auto">
                                                                <div class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2" style="font-size: 14px;">Datei auswählen</div>
                                                            </div>
                                                        </div>
                                                        <input class="d-none" onchange="changeUploadText()" type="file" name="profile_picture" id="profile_picture">
                                                    </label>
                                                </div>
                                                <script>
                                                    function changeUploadText() {
                                                        var text = document.getElementById("profile_picture").value;
                                                        var text2 = text.split("\\").pop();
                                                        if (text == null || text == '') {
                                                            document.getElementById("afterUploadTextKunden").innerHTML = 'No File Selected';
                                                        } else {
                                                            document.getElementById("afterUploadTextKunden").innerHTML = text2;
                                                        }
                                                    }
                                                </script>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Vorname</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="name" class="form-control mb-3" required value="{{ $personalData->name }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Nachname</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="prename" class="form-control mb-3" value="{{ $personalData->prename }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Email</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="email" class="form-control mb-3" value="{{ $personalData->email }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Telefon</label>
                                                    <input type="number" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="phone" class="form-control mb-3" value="{{ $personalData->phone }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Geburtsdatum</label>
                                                    <input type="date" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="birthdate" class="form-control mb-3" value="{{ $personalData->birthdate }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Sprache</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="language" class="form-control mb-3" value="{{ $personalData->language }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Stadt</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="city" class="form-control mb-3" value="{{ $personalData->city }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Adress</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="address" class="form-control mb-3" value="{{ $personalData->address }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Postleitzahl</label>
                                                    <input type="number" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="zip" class="form-control mb-3" value="{{ $personalData->zip }}">
                                                </div>

                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Berufliche
                                                        Stellung</label>
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="job_position" class="form-control mb-3" value="{{ $personalData->job_position }}">
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">Bank</label>
                                                    @if (isset($bankInfo->bank))
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="bank_name" class="form-control mb-3" required value="{{ $bankInfo->bank }}">
                                                    @else
                                                    <input type="text" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="bank_name" class="form-control mb-3" required>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label class="fs-6" style="font-family: 'Montserrat' !important;font-weight:600">IBAN
                                                        Nummer</label>
                                                    @if (isset($bankInfo->iban))
                                                    <input type="number" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="iban_number" class="form-control mb-3" required value="{{ $bankInfo->iban }}">
                                                    @else
                                                    <input type="number" style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;" name="iban_number" class="form-control mb-3" required>
                                                    @endif
                                                </div>
                                                <div class="row g-0 mx-0 px-0 pt-3">
                                                    <div class="col-6 p-0 pe-1">
                                                        <div>
                                                            <button type="button" class="btn w-100" data-bs-dismiss="modal" style="border-radius: 9px !important; background-color: rgb(255, 255, 255); color: rgb(12, 113, 195) !important;border: 1px solid rgb(12, 113, 195);  font-weight: 600 !important;">
                                                                Schliessen
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 p-0 ps-1">
                                                        <div>
                                                            <input type="submit" style="border-radius: 9px !important; background-color: rgb(12, 113, 195); color: rgb(255, 255, 255) !important;border: 1px solid rgb(12, 113, 195); font-weight: 600 !important;" class="btn w-100" value="Speichern">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modali --}}
                        <div class="hrGreyBackground p-4">
                            <div style="cursor:pointer;" class="text-end" data-bs-toggle="modal" data-bs-target="#editProfileModal"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <div class="pb-2">
                                    @if ($personalData->profile_picture == null)
                                    <svg width="100" height="100" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.766 0.000976562C10.194 0.000976562 0 10.193 0 22.766C0 35.339 10.193 45.531 22.766 45.531C35.34 45.531 45.532 35.339 45.532 22.766C45.532 10.193 35.34 0.000976562 22.766 0.000976562ZM22.766 6.80798C26.926 6.80798 30.297 10.18 30.297 14.338C30.297 18.497 26.926 21.868 22.766 21.868C18.608 21.868 15.237 18.497 15.237 14.338C15.237 10.18 18.608 6.80798 22.766 6.80798ZM22.761 39.579C18.612 39.579 14.812 38.068 11.881 35.567C11.167 34.958 10.755 34.065 10.755 33.128C10.755 28.911 14.168 25.536 18.386 25.536H27.148C31.367 25.536 34.767 28.911 34.767 33.128C34.767 34.066 34.357 34.957 33.642 35.566C30.712 38.068 26.911 39.579 22.761 39.579Z" fill="#D6D6D6" />
                                    </svg>
                                    @else
                                    <img width="130" height="130" style="border-radius: 130px " src="{{ route('showfile2',$personalData->profile_picture) }}" alt="Kein profilbild">
                                    @endif
                                </div>
                                <div>

                                    <span class="fw-500">{{ $personalData->job_position }}</span>

                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Vollständiger Name
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{ $personalData->name }} {{ $personalData->prename }}</span>
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Email
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{ $personalData->email }}</span>
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Telefon
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{ $personalData->phone }}</span>
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Geburtsdatum
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{Carbon\Carbon::parse($personalData->birthdate)->format('d.m.Y')}}</span>
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Sprache
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{ $personalData->language }}</span>
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div>
                                        <span class="hrGreyTextStyle">
                                            Stadt
                                        </span>
                                    </div>
                                    <div>
                                        <span class="fw-500 hrBlackTextStyle">{{ $personalData->city }} {{ $personalData->address }} {{ $personalData->zip }}</span>
                                    </div>
                                </div>
                                {{-- <div class="pb-4">
                                        <div>
                                            <span class="hrGreyTextStyle">
                                                Adress
                                            </span>
                                        </div>
                                        <div>
                                            <span class="fw-500 hrBlackTextStyle">{{ $personalData->address }}</span>
                            </div>
                        </div>
                        <div class="pb-4">
                            <div>
                                <span class="hrGreyTextStyle">
                                    Postleitzahl
                                </span>
                            </div>
                            <div>
                                <span class="fw-500 hrBlackTextStyle">{{ $personalData->zip }}</span>
                            </div>
                        </div> --}}
                        <div class="pb-4">
                            <div>
                                <span class="hrGreyTextStyle">
                                    Name der Bank
                                </span>
                            </div>
                            <div>
                                <span class="fw-500 hrBlackTextStyle">
                                    @if (isset($bankInfo->bank))
                                    <span>{{ $bankInfo->bank }}</span>
                                    @else
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="">
                            <div>
                                <span class="hrGreyTextStyle">
                                    IBAN-Nummer
                                </span>
                            </div>
                            <div>
                                <span class="fw-500 hrBlackTextStyle">
                                    @if (isset($bankInfo->iban))
                                    <span>{{ $bankInfo->iban }}</span>
                                    @else
                                    <span></span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ps-0 pt-4 pt-xl-0 ps-xl-4">
                <div class="pb-4">
                    <div class="hrGreyBackground p-4">
                        <div class="row g-0">
                            <div class="col-12 col-xl">
                                <div class="py-3">
                                    <div class="pb-4">
                                        <span class="fs-5 fw-600" style="color: #3B3A3A">
                                            Gehalt
                                        </span>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto me-2">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                </svg>

                                            </div>
                                            <div class="col">
                                                <span style="color: #686868;" class="hrGreyTextStyle">Aktueller Monat {{Carbon\Carbon::now()->format('M')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="perMonthBlueDiv fs-5 text-center py-1 px-2">
                                        <span>{{ $person->salary ? $person->salary->salary : 0 }} CHF</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="hrCustomVr mx-4">

                                </div>
                            </div>
                            <div class="col-12 col-xl">
                                <div class="py-3">
                                    <div class="pb-4">
                                        <span class="fs-5 fw-600" style="color: #3B3A3A">
                                            Spesen
                                        </span>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto me-2">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <span style="color: #686868;" class="hrGreyTextStyle">Aktueller Monat {{Carbon\Carbon::now()->format('M')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="perMonthBlueDiv fs-5 text-center py-1 px-2">
                                        <span>{{ $person->salary ? (int) $person->salary->expenses : 0 }} CHF</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="hrCustomVr mx-4">

                                </div>
                            </div>
                            <div class="col-12 col-xl">
                                <div class="py-3">
                                    <div class="pb-4">
                                        <span class="fs-5 fw-600" style="color: #3B3A3A">
                                            Provision
                                        </span>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto me-2">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <span style="color: #686868;" class="hrGreyTextStyle">Aktueller Monat {{Carbon\Carbon::now()->format('M')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="perMonthBlueDiv fs-5 text-center py-1 px-2">
                                        <span>{{$rroga2}} CHF</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="hrCustomVr mx-4">
                                </div>
                            </div>
                            <div class="col-12 col-xl">
                                <div class="py-3">
                                    <div class="pb-4">
                                        <span class="fs-5 fw-600" style="color: #3B3A3A">
                                            Gesamt
                                        </span>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto me-2">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <span style="color: #686868;" class="hrGreyTextStyle">Gesamt</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="perMonthBlueDiv fs-5 text-center py-1 px-2">
                                        <span>{{$rroga}} CHF</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row g-4">
                        <div class="col-12 col-lg-7 col-xl-8">
                            <div class="hrGreyBackground p-4">
                                <div class="">
                                    <div class="row g-0" style="position: relative;">
                                        <div class="col">
                                            <div>
                                                <span class="fs-5 fw-600">Verträge</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="statsSelectStyle py-1" onclick="openDropDownSelect()" style="cursor: pointer;">
                                                <div class="row g-0">
                                                    <div class="col ms-2">
                                                        <div>
                                                            <span id="activeDropDownItem">Gesamter Zeitraum</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto my-auto mx-2 me-1">
                                                        <div>
                                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="statsSelectStyleDropdown" id="dropdownSelectId" style="display: none;">
                                                <div class="py-2">
                                                    <div class="row g-0" onclick="makeSelectActive(this,1,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                    <div class="row g-0" onclick="makeSelectActive(this,7,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg class="" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                    <div class="row g-0" onclick="makeSelectActive(this,30,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                    <div class="row g-0" onclick="makeSelectActive(this,120,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                    <div class="row g-0" onclick="makeSelectActive(this,365,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                    <div class="row g-0" onclick="makeSelectActive(this,0,{{$employeID}})">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg class="activeSvg" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9.5" cy="9.5" r="9" fill="#fff" stroke="#E0E0E0" />
                                                                    <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5" fill="white" />
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
                                                <div class="py-2" style="border-top: 1px solid #E8E8E8;">
                                                    <div class="row g-0" onclick="statusvomvertragCostum()" style="cursor: pointer">
                                                        <div class="col-auto my-auto ps-3">
                                                            <div>
                                                                <svg width="18" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z" fill="black" />
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
                                                <div id="statusvomvertragCostum" style="display: none">
                                                    <div class="py-2">
                                                        <div class="row g-0">
                                                            {{-- <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <span class="fs-6">Aus</span>
                                                                        </div>
                                                                    </div> --}}
                                                            <div class="col my-auto ps-2 pe-2">
                                                                <div>
                                                                    <input class="form-control" type="date" id="statusvomvertragFromm" name="statusvomvertragFrom">
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
                                                                    <input class="form-control" type="date" id="statusvomvertragToo" name="statusvomvertragTo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pb-2 pt-2">
                                                        <div class="row g-0">
                                                            <div class="col my-auto ps-2 pe-2">
                                                                <div>
                                                                    <input onclick="makeSelectActive(this,100,{{$employeID}})" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-4">
                                        <div>
                                            <div class="row g-2">
                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 66 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z" fill="#D3E2CD" />
                                                                    <path d="M50.3199 18.0194C49.8904 17.6965 49.334 17.595 48.8182 17.7456C47.8719 18.0217 46.9065 18.1617 45.949 18.1617C43.1999 18.1617 40.4774 17.3564 38.4799 15.9521C36.716 14.7123 35.7044 13.164 35.7044 11.7044C35.7044 10.7631 34.9412 10 33.9999 10C33.0586 10 32.2955 10.7631 32.2955 11.7044C32.2955 13.164 31.2839 14.7123 29.5201 15.9522C27.5226 17.3564 24.8003 18.1617 22.0511 18.1617C21.0935 18.1617 20.1281 18.0217 19.1819 17.7456C18.6659 17.595 18.1096 17.6966 17.6802 18.0194C17.2508 18.3424 16.9988 18.8488 17 19.386C17.0231 28.4503 21.0068 35.5822 23.3793 39.0267C25.0388 41.4357 26.897 43.5138 28.7535 45.0363C30.1223 46.159 32.1438 47.4974 33.9999 47.4974C35.8561 47.4974 37.8775 46.159 39.2465 45.0363C41.103 43.5138 42.9612 41.4357 44.6206 39.0267C46.9932 35.5822 50.9769 28.4503 51 19.386C51.0014 18.8488 50.7493 18.3424 50.3199 18.0194ZM41.8133 37.093C38.4082 42.0365 35.0442 44.0885 33.9999 44.0885C32.9557 44.0885 29.5917 42.0365 26.1865 37.0931C24.226 34.2467 21.0507 28.6285 20.4934 21.4794C21.0119 21.5401 21.5318 21.5707 22.051 21.5707C25.5359 21.5707 28.8847 20.5657 31.4805 18.741C32.4887 18.0322 33.3357 17.2276 33.9999 16.3625C34.6643 17.2277 35.5111 18.0322 36.5194 18.741C39.1152 20.5657 42.464 21.5707 45.9489 21.5707C46.4679 21.5707 46.9879 21.5401 47.5064 21.4794C46.9491 28.6285 43.7739 34.2466 41.8133 37.093Z" fill="#228400" />
                                                                    <path d="M34.0003 29.1156C36.2981 29.1156 38.1608 27.2529 38.1608 24.9551C38.1608 22.6573 36.2981 20.7946 34.0003 20.7946C31.7026 20.7946 29.8398 22.6573 29.8398 24.9551C29.8398 27.2529 31.7026 29.1156 34.0003 29.1156Z" fill="#228400" />
                                                                    <path d="M34 29.1156C30.4258 29.1156 27.5283 32.0129 27.5283 35.5874H40.4717C40.4717 32.0129 37.5742 29.1156 34 29.1156Z" fill="#228400" />
                                                                </svg>


                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Grundversicherung</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="grund"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 43 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.18416 10.7263C4.73843 10.0745 5.23618 9.37676 5.672 8.64051L5.73633 8.53183C8.79475 3.36513 14.6593 0.543484 20.6051 1.37793C22.5687 1.65351 24.5677 1.53374 26.4844 1.02564L28.246 0.558649C29.6068 0.197914 31.0513 0.330732 32.3235 0.933551C37.5324 3.40171 41.2027 8.26381 42.1493 13.9496L42.6452 16.9288C43.8182 22.0261 41.2981 27.255 36.5801 29.5131L34.704 30.411C33.4829 30.9954 32.3569 31.7606 31.3639 32.6807L29.234 34.6543C26.5661 37.1266 22.6797 37.7671 19.3595 36.2818C17.6965 35.5379 15.8482 35.3117 14.0549 35.6326L13.7085 35.6946C9.53308 36.4417 5.33024 34.5314 3.14751 30.8944L1.94128 28.8844C0.671017 26.7678 0 24.3457 0 21.8772V18.7473C0 16.7455 0.712085 14.809 2.00891 13.2841L4.18416 10.7263Z" fill="#FEE4CB" />
                                                                    <path d="M32.8794 12.0329C32.5974 11.8173 32.232 11.7495 31.8934 11.8501C31.272 12.0344 30.6381 12.1279 30.0093 12.1279C28.2041 12.1279 26.4164 11.5902 25.1047 10.6524C23.9465 9.82449 23.2822 8.79057 23.2822 7.81591C23.2822 7.18733 22.7811 6.67773 22.163 6.67773C21.5449 6.67773 21.0438 7.18733 21.0438 7.81591C21.0438 8.79057 20.3795 9.82449 19.2213 10.6525C17.9096 11.5902 16.122 12.1279 14.3168 12.1279C13.688 12.1279 13.054 12.0344 12.4327 11.8501C12.0939 11.7495 11.7286 11.8174 11.4466 12.0329C11.1647 12.2486 10.9992 12.5868 11 12.9455C11.0151 18.9984 13.631 23.7609 15.189 26.0611C16.2786 27.6698 17.4989 29.0575 18.7179 30.0742C19.6167 30.8239 20.9442 31.7176 22.163 31.7176C23.3818 31.7176 24.7092 30.8239 25.6081 30.0742C26.8272 29.0575 28.0474 27.6698 29.137 26.0611C30.695 23.7609 33.3109 18.9984 33.326 12.9455C33.3269 12.5868 33.1614 12.2486 32.8794 12.0329ZM27.2936 24.7698C25.0576 28.071 22.8487 29.4413 22.163 29.4413C21.4773 29.4413 19.2683 28.071 17.0323 24.7699C15.7449 22.8691 13.6599 19.1174 13.2939 14.3434C13.6344 14.3839 13.9758 14.4044 14.3167 14.4044C16.6051 14.4044 18.8041 13.7333 20.5086 12.5148C21.1706 12.0414 21.7268 11.5041 22.163 10.9265C22.5992 11.5042 23.1553 12.0414 23.8174 12.5148C25.5219 13.7333 27.7209 14.4044 30.0092 14.4044C30.35 14.4044 30.6915 14.3839 31.0319 14.3434C30.666 19.1174 28.581 22.869 27.2936 24.7698Z" fill="#FF9B37" />
                                                                    <path d="M22.1656 19.4426C23.6744 19.4426 24.8976 18.1987 24.8976 16.6643C24.8976 15.1299 23.6744 13.886 22.1656 13.886C20.6567 13.886 19.4336 15.1299 19.4336 16.6643C19.4336 18.1987 20.6567 19.4426 22.1656 19.4426Z" fill="#FF9B37" />
                                                                    <path d="M22.1637 19.443C19.8167 19.443 17.9141 21.3778 17.9141 23.7648H26.4133C26.4133 21.3778 24.5107 19.443 22.1637 19.443Z" fill="#FF9B37" />
                                                                </svg>
                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Zusatzversicherung</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="zus"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 44 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.20151 10.5413C4.77024 9.89024 5.28199 9.19154 5.73111 8.45289C8.85228 3.3197 14.8089 0.538062 20.7612 1.35132C22.7263 1.61981 24.7519 1.50666 26.6723 1.01104L28.5295 0.53175C29.862 0.187846 31.2725 0.314879 32.5221 0.891353C37.8006 3.32632 41.5406 8.20562 42.5203 13.9355L42.9775 16.6093C44.1553 21.5919 41.6714 26.7165 37.0306 28.8789L34.967 29.8404C33.7412 30.4116 32.6075 31.1625 31.6033 32.0684L29.4976 33.968C26.7759 36.4232 22.8699 37.0601 19.5093 35.5965C17.8322 34.8662 15.9776 34.6442 14.1755 34.9581L13.8333 35.0177C9.60148 35.7549 5.34738 33.8401 3.09326 30.1834L2.01359 28.432C0.69713 26.2964 0 23.8371 0 21.3284V18.3879C0 16.43 0.709844 14.5384 1.99796 13.0638L4.20151 10.5413Z" fill="#D3E2CD" />
                                                                    <path d="M27.64 7C29.4615 7 31.0494 8.15115 31.4922 9.79262L31.9629 11.5413H33.0785C33.5425 11.5413 33.9259 11.8617 33.9867 12.2773L33.995 12.3928C33.995 12.8239 33.6502 13.1802 33.2029 13.2365L33.0785 13.2443H32.4236L32.6777 14.1827C33.4705 14.6309 34 15.4412 34 16.3665V26.0132C34 27.1105 33.0426 28 31.8616 28H30.0237C28.8427 28 27.8853 27.1105 27.8853 26.0132L27.884 24.5976H18.1146L18.1147 26.0132C18.1147 27.1105 17.1573 28 15.9763 28H14.1384C12.9574 28 12 27.1105 12 26.0132V16.3665C12 15.4414 12.5293 14.6311 13.3219 14.1829L13.5751 13.2443H12.9165C12.4525 13.2443 12.0691 12.924 12.0084 12.5084L12 12.3928C12 11.9617 12.3448 11.6055 12.7921 11.5491L12.9165 11.5413H14.0321L14.5037 9.79491C14.9457 8.15233 16.5342 7 18.3565 7H27.64ZM16.2817 24.5976H13.8317L13.8329 26.0132C13.8329 26.1698 13.9697 26.297 14.1384 26.297H15.9763C16.145 26.297 16.2818 26.1698 16.2818 26.0132L16.2817 24.5976ZM32.167 24.5976H29.717L29.7182 26.0132C29.7182 26.1698 29.8549 26.297 30.0237 26.297H31.8616C32.0303 26.297 32.1671 26.1698 32.1671 26.0132L32.167 24.5976ZM31.2506 15.515H14.7494C14.2432 15.515 13.8329 15.8962 13.8329 16.3665V22.8946H32.1671V16.3665C32.1671 15.8962 31.7568 15.515 31.2506 15.515ZM20.8579 19.4886H25.1368C25.643 19.4886 26.0532 19.8699 26.0532 20.3401C26.0532 20.7712 25.7085 21.1275 25.2611 21.1839L25.1368 21.1916H20.8579C20.3517 21.1916 19.9414 20.8104 19.9414 20.3401C19.9414 19.9091 20.2862 19.5528 20.7335 19.4964L20.8579 19.4886ZM29.1072 17.218C29.782 17.218 30.329 17.7263 30.329 18.3533C30.329 18.9802 29.782 19.4885 29.1072 19.4885C28.4323 19.4885 27.8853 18.9802 27.8853 18.3533C27.8853 17.7263 28.4323 17.218 29.1072 17.218ZM16.8877 17.218C17.5626 17.218 18.1097 17.7263 18.1097 18.3533C18.1097 18.9802 17.5626 19.4885 16.8877 19.4885C16.2129 19.4885 15.6658 18.9802 15.6658 18.3533C15.6658 17.7263 16.2129 17.218 16.8877 17.218ZM27.64 8.703H18.3565C17.3752 8.703 16.5199 9.32348 16.2819 10.2079L15.3122 13.812H30.6871L29.7143 10.2067C29.4759 9.32284 28.6208 8.703 27.64 8.703Z" fill="#238400" />
                                                                </svg>

                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Autoversicherung</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="auto"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 44 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.20151 10.5413C4.77024 9.89024 5.28199 9.19154 5.73111 8.45289C8.85228 3.3197 14.8089 0.538062 20.7612 1.35132C22.7263 1.61981 24.7519 1.50666 26.6723 1.01104L28.5295 0.53175C29.862 0.187846 31.2725 0.314879 32.5221 0.891353C37.8006 3.32632 41.5406 8.20562 42.5203 13.9355L42.9775 16.6093C44.1553 21.5919 41.6714 26.7165 37.0306 28.8789L34.967 29.8404C33.7412 30.4116 32.6075 31.1625 31.6033 32.0684L29.4976 33.968C26.7759 36.4232 22.8699 37.0601 19.5093 35.5965C17.8322 34.8662 15.9776 34.6442 14.1755 34.9581L13.8333 35.0177C9.60148 35.7549 5.34738 33.8401 3.09326 30.1834L2.01359 28.432C0.69713 26.2964 0 23.8371 0 21.3284V18.3879C0 16.43 0.709844 14.5384 1.99796 13.0638L4.20151 10.5413Z" fill="#C0C4DC" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.182 9.08734C20.182 8.06379 20.9799 7.23449 21.9636 7.23449C22.9474 7.23449 23.7453 8.06379 23.7453 9.08734C23.7453 10.1109 22.9474 10.9402 21.9636 10.9402C20.9799 10.9402 20.182 10.1109 20.182 9.08734ZM21.9636 6C20.3234 6 18.9943 7.3825 18.9943 9.08734C18.9943 9.41059 19.0421 9.72223 19.1307 10.0151H18.7764C18.5021 10.0151 18.1978 10.1304 17.9342 10.274C17.6522 10.4278 17.3475 10.652 17.0652 10.9452C16.4975 11.5346 16 12.427 16 13.6015C16 15.0466 16.4611 16.1023 17.0313 16.8038C17.3134 17.1509 17.6212 17.41 17.9102 17.5857C17.9976 17.6389 18.0891 17.688 18.1825 17.73V29.3738C18.1825 30.2696 18.8852 31 19.7471 31L19.7493 30.9999H19.7564L19.7585 31C20.6204 31 21.3231 30.2696 21.3231 29.3738V22.7989H22.6592V29.3738C22.6592 30.2696 23.3619 31 24.2238 31L24.226 30.9999H24.2331L24.2352 31C25.0971 31 25.7998 30.2696 25.7998 29.3738V17.8096L25.943 18.236C26.1442 18.8355 26.6655 19.2242 27.2384 19.2672C26.7555 19.5984 26.4368 20.1675 26.4368 20.8139V21.2254C26.4368 21.5663 26.7027 21.8426 27.0307 21.8426C27.3587 21.8426 27.6246 21.5663 27.6246 21.2254V20.8139C27.6246 20.473 27.8904 20.1966 28.2184 20.1966C28.5464 20.1966 28.8123 20.473 28.8123 20.8139V29.4553C28.8123 29.7962 29.0781 30.0725 29.4061 30.0725C29.7341 30.0725 30 29.7962 30 29.4553V20.8139C30 19.7973 29.2119 18.9721 28.2361 18.9622C28.7396 18.5697 28.9649 17.8699 28.7465 17.2193L26.8146 11.4643C26.5234 10.5969 25.7361 10.0157 24.8521 10.0157H24.7964C24.8851 9.72266 24.933 9.41081 24.933 9.08734C24.933 7.3825 23.6038 6 21.9636 6ZM18.7764 11.2496H19.8441C20.3829 11.8205 21.1335 12.1747 21.9636 12.1747C22.7935 12.1747 23.5438 11.8207 24.0825 11.2502H24.8521C25.231 11.2502 25.5684 11.4993 25.6932 11.871L27.6251 17.626C27.6791 17.7869 27.5974 17.9629 27.4425 18.019C27.2877 18.0752 27.1184 17.9902 27.0644 17.8293L25.7667 13.9635L24.6121 14.1668V29.3738C24.6121 29.5878 24.4412 29.7655 24.2352 29.7655L24.2331 29.7654H24.226L24.2238 29.7655C24.0179 29.7655 23.8469 29.5878 23.8469 29.3738V22.1817V21.5644H23.2531H20.7292H20.1354V22.1817V29.3738C20.1354 29.5878 19.9644 29.7655 19.7585 29.7655L19.7564 29.7654H19.7493L19.7471 29.7655C19.5412 29.7655 19.3702 29.5878 19.3702 29.3738V17.2587V16.6414H19.3685V13.4069H18.1808V16.2672C18.1007 16.1925 18.019 16.106 17.9385 16.0071C17.551 15.5303 17.1877 14.7574 17.1877 13.6015C17.1877 12.8159 17.5145 12.2236 17.9046 11.8185C18.1013 11.6144 18.3088 11.4638 18.486 11.3672C18.6561 11.2745 18.7554 11.2541 18.7737 11.2503C18.7764 11.2498 18.7773 11.2496 18.7764 11.2496Z" fill="#515C9F" />
                                                                </svg>


                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Vorsorge 3a&3b</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="vor"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 44 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.20151 10.5413C4.77024 9.89024 5.28199 9.19154 5.73111 8.45289C8.85228 3.3197 14.8089 0.538062 20.7612 1.35132C22.7263 1.61981 24.7519 1.50666 26.6723 1.01104L28.5295 0.53175C29.862 0.187846 31.2725 0.314879 32.5221 0.891353C37.8006 3.32632 41.5406 8.20562 42.5203 13.9355L42.9775 16.6093C44.1553 21.5919 41.6714 26.7165 37.0306 28.8789L34.967 29.8404C33.7412 30.4116 32.6075 31.1625 31.6033 32.0684L29.4976 33.968C26.7759 36.4232 22.8699 37.0601 19.5093 35.5965C17.8322 34.8662 15.9776 34.6442 14.1755 34.9581L13.8333 35.0177C9.60148 35.7549 5.34738 33.8401 3.09326 30.1834L2.01359 28.432C0.69713 26.2964 0 23.8371 0 21.3284V18.3879C0 16.43 0.709844 14.5384 1.99796 13.0638L4.20151 10.5413Z" fill="#FBEBEB" />
                                                                    <path d="M15.8608 17.8103H14.4142C13.5233 17.8103 13.0771 16.7332 13.7071 16.1032L22.1032 7.70711C22.4938 7.31658 23.1269 7.31658 23.5175 7.70711L31.9136 16.1032C32.5435 16.7332 32.0974 17.8103 31.2065 17.8103H29.5025" stroke="#FF9797" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M14.8281 18.3254V27.334" stroke="#FF9797" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M31.0469 18.3254V27.334" stroke="#FF9797" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M32.8086 27.5915L13.35 27.5915" stroke="#FF9797" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Rechtschutz</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="rechts"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-xl-12 col-xxl-6">
                                                    <div class="contractsWhiteBgDiv h-100 p-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 me-3">
                                                                <svg viewBox="0 0 43 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.12063 10.5267C4.66842 9.88534 5.16551 9.19002 5.59654 8.46503C8.62224 3.37575 14.444 0.533052 20.3078 1.35242C22.2406 1.6225 24.2077 1.50509 26.0947 1.00705L27.8437 0.545411C29.1784 0.193133 30.5946 0.322907 31.843 0.911894C36.9804 3.33567 40.6037 8.12351 41.5405 13.7262L42.0225 16.6093C43.1776 21.6074 40.7032 26.7366 36.0723 28.9434L34.1987 29.8363C32.9944 30.4101 31.8834 31.162 30.9029 32.0666L28.8128 33.995C26.1786 36.4254 22.3507 37.0552 19.0766 35.5969C17.4378 34.867 15.6177 34.645 13.8515 34.9597L13.5112 35.0203C9.39295 35.754 5.24855 33.8732 3.08911 30.2906L1.92193 28.3542C0.664498 26.268 0 23.8783 0 21.4425V18.3925C0 16.4295 0.700463 14.5309 1.97539 13.0383L4.12063 10.5267Z" fill="#DCEBFF" />
                                                                    <path d="M14.8374 17.2966H13.4142C12.5233 17.2966 12.0771 16.2194 12.7071 15.5895L21.0377 7.25887C21.4282 6.86834 22.0614 6.86834 22.4519 7.25886L30.7825 15.5895C31.4125 16.2194 30.9663 17.2966 30.0754 17.2966H28.3964" stroke="#3670BD" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13.8125 17.8083V26.7623" stroke="#3670BD" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M29.9297 17.8083V26.7623" stroke="#3670BD" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M31.6836 27.0181L12.3429 27.0181" stroke="#3670BD" stroke-width="1.5" stroke-linecap="round" />
                                                                    <line x1="18.1751" y1="23.5707" x2="25.6371" y2="16.2624" stroke="#3670BD" stroke-width="1.5" stroke-linecap="round" />
                                                                    <circle cx="24.8123" cy="22.4137" r="1.29663" stroke="#3670BD" stroke-width="1.5" />
                                                                    <circle cx="19.1873" cy="17.2966" r="1.29663" stroke="#3670BD" stroke-width="1.5" />
                                                                </svg>

                                                            </div>
                                                            <div class="col my-auto">
                                                                <div class="text-start">
                                                                    <div>
                                                                        <span class="contractsFirstSpan">Hausrat</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto">
                                                                <div class="text-end">
                                                                    <span class="contractsSecondSpan fs-4" id="haus"></span>
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
                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="hrGreyBackground h-100 p-4">
                                <div class="">
                                    <div>
                                        <span class="fs-5 fw-600">Clients number</span>
                                    </div>
                                    <div class="pt-4">
                                        <div class="pb-2">
                                            <div class="row g-0">
                                                <div class="col-auto my-auto me-2">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                    </svg>

                                                </div>
                                                <div class="col">
                                                    <span style="color: #686868;" class="hrGreyTextStyle">Aktueller Monat</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contractsWhiteBgDiv p-2">
                                            <div>
                                                <span>120 Kunden</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <div class="pb-2">
                                            <div class="row g-0">
                                                <div class="col-auto my-auto me-2">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                    </svg>

                                                </div>
                                                <div class="col">
                                                    <span style="color: #686868;" class="hrGreyTextStyle">Per Year</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contractsWhiteBgDiv p-2">
                                            <div>
                                                <span>120 Kunden</span>
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
<script>

    function statusvomvertragCostum() {
        $("#statusvomvertragCostum").slideToggle()
        $("#activeDropDownItem").html("Individueller Zeitraum")
    }

    function makeSelectActive(x, numberi,empID) {
        console.log(empID)
        axios.get('http://127.0.0.1:8000/soldProducts?numberi=' + numberi + '&empID=' + empID).then( response => {
            console.log(response.data)
            $('#grund').html(response.data[0]);
                $('#rechts').html(response.data[1]);
                $('#vor').html(response.data[2]);
                $('#auto').html(response.data[3]);
                $('#zus').html(response.data[4]);
                $('#haus').html(response.data[5]);
        })

        var y = $(x).find("span").html();
        var svg = $(x).find("svg");
        var activeSvg = document.querySelector(".activeSvg");
        $(activeSvg).removeClass("activeSvg");
        $(svg).addClass("activeSvg");
        $("#activeDropDownItem").html(y)
        $("#dropdownSelectId").hide()
    }


    function openDropDownSelect() {
        var x = document.getElementById("dropdownSelectId");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(document).ready(function() {
            makeSelectActive(6, 0,{{$employeID}});

        });
</script>
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body,
    span,
    p,
    div {
        font-family: 'Montserrat', sans-serif;
    }

    .fw-400 {
        font-weight: 400 !important;
    }

    .fw-500 {
        font-weight: 500 !important;
    }

    .fw-600 {
        font-weight: 600 !important;
    }


    .contractsSecondSpan {
        font-weight: 600;
        line-height: 30px;
    }

    .contractsWhiteBgDiv {
        background: #FFFFFF;
        border: 1px solid #EAE9E9;
        box-sizing: border-box;
        border-radius: 10px;
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

    .hrSearchBarStyle {
        background: #F7F7F7;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 11px;
    }

    .hrSearchBarStyle input {
        border: none !important;
        background-color: transparent !important;
    }

    .hrSearchBarStyle input::placeholder {
        color: #CFCECE !important;
        font-size: 17px;
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

    .hrGreyBackground {
        background: #FAFAFA;
        border: 1px solid #FAFAFA;
        box-shadow: 0px 4px 4px rgba(214, 214, 214, 0.25);
        border-radius: 13px;
    }

    .hrGreyTextStyle {
        font-weight: 500;
        font-size: 16px;
        color: #C2C2C2;
    }

    .hrBlackTextStyle {
        color: #252525;
        font-size: 18px;
        word-break: break-all;
    }

    .perMonthBlueDiv {
        background: #2D9CDB;
        border-radius: 5px;
        font-weight: 600;
        color: #FFFFFF;
    }

    .provisionYellowDiv {
        background: #F2CD4A;
        border-radius: 5px;
        font-weight: 600;
        color: #FFFFFF;
    }

    .totalGreenDiv {
        background: #43B21C;
        border-radius: 5px;
        font-weight: 600;
        color: #FFFFFF;
    }

    .hrCustomVr {
        border: 1px solid #f3f3f3;
        height: 100%;
    }

    .hrWhiteBgDiv {
        background: #FFFFFF;
        border: 1px solid #F3F3F3;
        border-radius: 11px;
    }

    .hoverLabelClass:hover {
        background: rgba(47, 96, 220, 0.08);
    }

    .container2 {
        display: block;
        position: relative;
        padding-left: 37px;

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
        top: 4px;
        left: 0;
        height: 25px;
        width: 25px;
        border-radius: 50px;
        border: 1px solid rgba(219, 219, 219, 0.63);
        box-sizing: border-box;

    }

    .container2:hover input~.checkmark2 {
        background: rgba(219, 219, 219, 0.63);

    }

    .container2 input:checked~.checkmark2 {
        background-color: #2F60DC;
        border-radius: 50px;
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
        left: 2px;
        top: 2px;
        width: 19px;
        height: 19px;
        border: solid white;
        border-width: 2px;
        border-radius: 50px;
    }

    .container3 {
        display: block;
        position: relative;
        padding-left: 37px;

        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container3 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark3 {
        position: absolute;
        top: 4px;
        left: 0;
        height: 25px;
        width: 25px;
        border-radius: 5px;
        border: 1px solid rgba(219, 219, 219, 0.63);
        box-sizing: border-box;

    }

    .container3:hover input~.checkmark3 {
        background: rgba(219, 219, 219, 0.63);

    }

    .container3 input:checked~.checkmark3 {
        background-color: #2F60DC;
        border-radius: 7px;
    }

    .checkmark3:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container3 input:checked~.checkmark3:after {
        display: block;
    }

    .container3 .checkmark3:after {
        left: 8px;
        top: 3.5px;
        width: 7px;
        height: 12px;
        border: solid white;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .hrBlueSubmitBtn {
        background: #2F60DC;
        border-radius: 5px;
        color: #fff;
        border: none;
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        font-weight: 600;
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
    }

    @media (max-width: 991.98px) {
        .contractsWhiteBgDiv svg {
            width: 45px;
        }
    }
</style>