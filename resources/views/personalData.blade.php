@extends('template.navbar')
@section('content')
<title>HR Kunde</title>
    <div class="row g-0">

        <div class="col">
            <div class="p-4 p-sm-0 p-md-4 pt-sm-4">
                <div>
                    <div class="row g-0">
                        <div class="col-12 col-sm-4 col-md-5 col-lg-4 col-xl-3">
                            {{-- modali --}}
                            <div class="modal fade" id="editProfileModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content p-3" style="border-radius: 24px !important;">
                                        <div class="modal-header" style="border-bottom: 0 !important;">
                                            <div class="row g-0">
                                                <div class="col">
                                                    <span class="modal-title mx-2 fs-5" id="exampleModalLabel"
                                                        style="font-family: 'Montserrat' !important;font-weight:700;color: #434343">
                                                            Persönliche Daten
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="border-0"
                                                    style="opacity: 1 !important;background-color: transparent"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="#434343" stroke-width="3"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <form class="mb-0" action="{{ url('updatePersonalData') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="emp_id" value="{{ $personalData->admin_id }}">
                                                <div class="px-4">
                                                    <div>
                                                        <label for="profile_picture"
                                                            class="leadsCustomFileInput form-control px-0"
                                                            style="cursor: pointer;">
                                                            <span style="font-family: 'Montserrat' !important;font-weight: 600;color: #434343" class="fs-6">Picture</span>

                                                            <div class="row g-0 p-1"
                                                                style="border: 1px solid #F0F2F4;border-radius:10px">
                                                                <div class="col col-md my-auto ps-2">
                                                                    <span id="afterUploadTextKunden"
                                                                        style="font-size: 14px;">keine Datei ausgewählen</span>
                                                                </div>
                                                                <div class="col-auto col-md-auto">
                                                                    <div class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2"
                                                                        style="font-size: 14px;">Datei auswählen</div>
                                                                </div>
                                                            </div>
                                                            <input class="d-none" onchange="changeUploadText()"
                                                                type="file" name="profile_picture" id="profile_picture">
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
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Vorname</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="name" class="form-control mb-3" required
                                                            value="{{ $personalData->name }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Nachname</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="prename" class="form-control mb-3"
                                                            value="{{ $personalData->prename }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Email</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="email" class="form-control mb-3"
                                                            value="{{ $personalData->email }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Telefon</label>
                                                        <input type="number"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="phone" class="form-control mb-3"
                                                            value="{{ $personalData->phone }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Geburtsdatum</label>
                                                        <input type="date"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="birthdate" class="form-control mb-3"
                                                            value="{{ $personalData->birthdate }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Sprache</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="language" class="form-control mb-3"
                                                            value="{{ $personalData->language }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Stadt</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="city" class="form-control mb-3"
                                                            value="{{ $personalData->city }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Adress</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="address" class="form-control mb-3"
                                                            value="{{ $personalData->address }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Postleitzahl</label>
                                                        <input type="number"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="zip" class="form-control mb-3"
                                                            value="{{ $personalData->zip }}">
                                                    </div>

                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Berufliche
                                                            Stellung</label>
                                                        <input type="text"
                                                            style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                            name="job_position" class="form-control mb-3"
                                                            value="{{ $personalData->job_position }}">
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">Bank</label>
                                                        @if (isset($bankInfo->bank))
                                                            <input type="text"
                                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                                name="bank_name" class="form-control mb-3" required
                                                                value="{{ $bankInfo->bank }}">
                                                        @else
                                                            <input type="text"
                                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                                name="bank_name" class="form-control mb-3" required>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <label class="fs-6"
                                                            style="font-family: 'Montserrat' !important;font-weight:600">IBAN
                                                            Nummer</label>
                                                        @if (isset($bankInfo->iban))
                                                            <input type="number"
                                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                                name="iban_number" class="form-control mb-3" required
                                                                value="{{ $bankInfo->iban }}">
                                                        @else
                                                            <input type="number"
                                                                style="border-radius: 8px; background-color: #fff !important; border: 1px solid #f3f3f3 !important; box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px;"
                                                                name="iban_number" class="form-control mb-3" required>
                                                        @endif
                                                    </div>
                                                    <div class="row g-0 mx-0 px-0 pt-3">
                                                        <div class="col-6 p-0 pe-1">
                                                            <div>
                                                                <button type="button" class="btn w-100"
                                                                    data-bs-dismiss="modal"
                                                                    style="border-radius: 9px !important; background-color: rgb(255, 255, 255); color: rgb(12, 113, 195) !important;border: 1px solid rgb(12, 113, 195);  font-weight: 600 !important;">
                                                                    Schliessen
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 p-0 ps-1">
                                                            <div>
                                                                <input type="submit"
                                                                    style="border-radius: 9px !important; background-color: rgb(12, 113, 195); color: rgb(255, 255, 255) !important;border: 1px solid rgb(12, 113, 195); font-weight: 600 !important;"
                                                                    class="btn w-100" value="Speichern">
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
                                <div style="cursor:pointer;" class="text-end" data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                        height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <div class="pb-2">
                                        @if ($personalData->profile_picture == null)
                                        <svg width="100" height="100" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.766 0.000976562C10.194 0.000976562 0 10.193 0 22.766C0 35.339 10.193 45.531 22.766 45.531C35.34 45.531 45.532 35.339 45.532 22.766C45.532 10.193 35.34 0.000976562 22.766 0.000976562ZM22.766 6.80798C26.926 6.80798 30.297 10.18 30.297 14.338C30.297 18.497 26.926 21.868 22.766 21.868C18.608 21.868 15.237 18.497 15.237 14.338C15.237 10.18 18.608 6.80798 22.766 6.80798ZM22.761 39.579C18.612 39.579 14.812 38.068 11.881 35.567C11.167 34.958 10.755 34.065 10.755 33.128C10.755 28.911 14.168 25.536 18.386 25.536H27.148C31.367 25.536 34.767 28.911 34.767 33.128C34.767 34.066 34.357 34.957 33.642 35.566C30.712 38.068 26.911 39.579 22.761 39.579Z" fill="#D6D6D6"/>
                                        </svg> 
                                        @else
                                            <img width="130" height="130" style="border-radius: 130px "
                                                src="{{ route('showfile2',$personalData->profile_picture) }}"
                                                alt="Kein profilbild">
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
                                            <span class="fw-500 hrBlackTextStyle">{{ $personalData->birthdate }}</span>
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
                        <div class="col ps-0 pt-4 pt-sm-0 ps-sm-4">
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
                                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                            </svg>

                                                        </div>
                                                        <div class="col">
                                                            <span style="color: #686868;" class="hrGreyTextStyle">Pro Monat</span>
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
                                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="color: #686868;" class="hrGreyTextStyle">Pro Monat</span>
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
                                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="5.5" cy="5.5" r="5.5" fill="#2D9CDB" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="color: #686868;" class="hrGreyTextStyle">Pro Monat</span>
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
                                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

</style>
