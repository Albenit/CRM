@extends('template.navbar')
@section('content')
@if($errors->any())
            <div class="text-center">
                {!! implode('<br />', $errors->all(':message')) !!}
            </div>
        @endif
<title>Finance Status</title>
    <div class="row g-0">
        <div class="col">

            <div class="p-4 p-lg-5">
            <div class="col-auto pe-5 pb-4 my-auto">
                            <a style="text-decoration: none" href="{{route('finance')}}">
                                <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L2 12L12 22" stroke="#656565" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                <div class="pt-0">
                <div class="pb-4 mb-3">
                            <div class="row g-2">
@foreach($companies as $company)
<div class="modal fade" id="modali{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document " style="max-width: 700px">
        <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
            <div class="p-4" style="background-color: #2F60DC80; border-radius:15px 15px 0 0">
                <div class="row g-0">
                    <div class="col text-center" style="margin-right: -17px;">

                        <span class="fs-5" style="font-weight: 600;color: #fff;" id="exampleModalLabel">Mitarbeiterbesprechungen</span>

                    </div>
                    <div class="col-auto my-auto d-none" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                        <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                        </svg>
                    </div>
                </div>
            </div>
                <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">
                    <form action="{{route('updatecompany',$company->id)}}" method="POST">
                        @csrf
                        <div class="row g-1">
                            <div class="col-6">
                                <input style="border: 1px solid #E7EEF4 !important;border-radius: 8px !important;" type="text" class="form-control mb-2" value="{{$company->provision_percent}}" name="percent">
                            </div>
                            <div class="col-6">
                                <input style="border: 1px solid #E7EEF4 !important;border-radius: 8px !important;" type="text" class="form-control mb-2" value="{{100 - $company->provision_percent}}">
                            </div>
                        </div>
                        <div class="col-12 pt-2">
                            <div class="row g-0 justify-content-center">
                                <div class="col-12 col-sm-4">
                                    <input type="submit" class="btn w-100 btn-success text-center d-flex justify-content-center" style="border-radius: 8px; background:#2F60DC;border: none;font-weight: 600 !important" value="Aktualisieren">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
    @endforeach
                            @foreach(App\Models\Provisions::find($id)->groups as $group)
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="p-3 pb-1" style="background: #F9FAFC;border-radius: 11px;color: #434343;border: 1px solid #DCE4F9;">
                                        <div class="pb-2">
                                            <span style="font-weight: 700;font-size: 18px;">Gruppenname</span>
                                        </div>
                                        <div class="">
                                            <span style="font-weight: 500;font-size: 16px;">{{$group->name}}</span>
                                        </div>
                                        <hr class="my-2" style="background-color: #cccccc; margin-left: -1rem;margin-right: -1rem;">
                                        <div class="pb-2">
                                            <span style="font-weight: 700;">Mitarbeiter</span>
                                        </div>
                                        @foreach ($group->members as $member)
                                            <div class="pb-2">
                                                <span class="fw-500">{{$member->name}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            </div>
                        </div>
                    <div class="pb-4">
                        <div class="row g-0">
                            <div class="col-auto my-auto">
                                <div class="pe-3">
                                    <span class="firstTitleSpan fs-4">Krankenkasse</span>
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div>
                                    <span class="svgSpan">
                                        <svg width="45" height="45" viewBox="0 0 52 52" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M45.5721 52H6.4282C4.7185 51.9927 3.08152 51.3075 1.8764 50.0947C0.671289 48.882 -0.00352653 47.2407 1.38608e-05 45.531V11.8786C-0.00352653 10.1689 0.671289 8.52759 1.8764 7.31481C3.08152 6.10204 4.7185 5.41684 6.4282 5.40955H9.61815V9.36929H6.4282C5.76497 9.37207 5.12993 9.63783 4.6624 10.1083C4.19488 10.5787 3.93305 11.2154 3.93437 11.8786V45.531C3.93313 46.1942 4.19498 46.8308 4.66248 47.3013C5.12997 47.7718 5.76497 48.0376 6.4282 48.0406H45.5721C46.2353 48.0376 46.8703 47.7718 47.3377 47.3013C47.8052 46.8308 48.067 46.1942 48.0656 45.531V11.8786C48.067 11.2154 47.8052 10.5788 47.3377 10.1084C46.8702 9.63795 46.2353 9.37215 45.5721 9.36929H41.9129V5.41017H45.5721C47.2816 5.41754 48.9185 6.10269 50.1235 7.31532C51.3285 8.52796 52.0034 10.169 52 11.8786V45.531C52.0035 47.2406 51.3288 48.8819 50.1237 50.0946C48.9187 51.3074 47.2818 51.9926 45.5721 52ZM32.2118 13.7939H19.4208C17.5996 13.7817 15.8571 13.0497 14.5737 11.7576C13.2902 10.4655 12.5699 8.71819 12.5699 6.89696C12.5699 5.07574 13.2902 3.32843 14.5737 2.03633C15.8571 0.74422 17.5996 0.0122004 19.4208 0H32.2118C34.033 0.0122004 35.7755 0.74422 37.0589 2.03633C38.3424 3.32843 39.0627 5.07574 39.0627 6.89696C39.0627 8.71819 38.3424 10.4655 37.0589 11.7576C35.7755 13.0497 34.033 13.7817 32.2118 13.7939ZM19.4208 3.95912C18.6468 3.96706 17.9073 4.28008 17.3628 4.83017C16.8183 5.38026 16.5129 6.12298 16.5129 6.89696C16.5129 7.67095 16.8183 8.41366 17.3628 8.96375C17.9073 9.51384 18.6468 9.82686 19.4208 9.83481H32.2118C32.9858 9.82686 33.7253 9.51384 34.2698 8.96375C34.8143 8.41366 35.1197 7.67095 35.1197 6.89696C35.1197 6.12298 34.8143 5.38026 34.2698 4.83017C33.7253 4.28008 32.9858 3.96706 32.2118 3.95912H19.4208Z"
                                                fill="#5288F5" />
                                            <path
                                                d="M35 29.0284H27.8807V22H24.1205V29.0284H17V32.9713H24.1205V40H27.8807V32.9722H35V29.0293V29.0284Z"
                                                fill="#F79C42" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="provisionGreyBg p-4 mb-5">

                        <div>
                            <div class="pb-3">
                                <span class="Grungversicherung fs-5">Grundversicherung</span>
                            </div>
                            <form action="{{route('companies.register',['id' => $id,'field'=> 'Grund'])}}" method="post" class="mb-0">
                                @csrf
                                <input type="number" hidden id="grundnr" name="cnt" value="0">
                            <div class="overflowFirstTable" id="overflowFirstTable">
                                <table class="table table-light text-center secondTable fs-6">
                                    <thead>
                                    <tr>
                                        <th>Versicherer</th>
                                        <th>Provision Firma</th>
                                        <th>Provision Berater</th>
                                    </tr>
                                    </thead>
                                    <tbody id="firstTableBody">
                                    @foreach($companies as $company)

                                    <div class="modal fade" id="modali{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog " role="document " style="max-width: 700px">
                                            <div class="modal-content" style="border: none !important;border-radius: 15px !important;">
                                                <div class="p-4" style="background-color: #2F60DC80; border-radius:15px 15px 0 0">
                                                    <div class="row g-0">
                                                        <div class="col text-center" style="margin-right: -17px;">

                                                            <span class="fs-5" style="font-weight: 600;color: #fff;" id="exampleModalLabel">Mitarbeiterbesprechungen</span>

                                                        </div>
                                                        <div class="col-auto my-auto d-none" style="cursor: pointer" onclick='document.getElementById("change_fs").style.display = "block" ;'>
                                                            <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15.24 0.839305C16.359 1.95838 16.359 3.77275 15.24 4.89183L5.65584 14.4759C5.43412 14.6977 5.15838 14.8577 4.85587 14.9402L0.759282 16.0574C0.31094 16.1797 -0.100449 15.7683 0.0218259 15.32L1.13908 11.2234C1.22158 10.9209 1.3816 10.6451 1.60332 10.4234L11.1874 0.839305C12.3065 -0.279768 14.1209 -0.279768 15.24 0.839305ZM10.4111 3.31447L2.45268 11.2728C2.37878 11.3467 2.32544 11.4386 2.29794 11.5394L1.45723 14.622L4.53982 13.7813C4.64066 13.7538 4.73257 13.7005 4.80648 13.6266L12.7646 5.66799L10.4111 3.31447ZM12.0368 1.68867L11.2599 2.46483L13.6134 4.81915L14.3906 4.04246C15.0406 3.39248 15.0406 2.33865 14.3906 1.68867C13.7406 1.03869 12.6868 1.03869 12.0368 1.68867Z" fill="white"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="p-4" style="background-color: #fff;border-radius: 0 0 15px 15px">
                                                        <form action="" method="POST">
                                                            <div class="row g-1">
                                                                <div class="col-6">
                                                                    <input style="border: 1px solid #E7EEF4 !important;border-radius: 8px !important;" type="text" class="form-control mb-2" value="{{$company->provision_percent}}" name="percent">
                                                                </div>
                                                                <div class="col-6">
                                                                    <input style="border: 1px solid #E7EEF4 !important;border-radius: 8px !important;" type="text" class="form-control mb-2" value="{{100 - $company->provision_percent}}" name="percent">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-2">
                                                                <div class="row g-0 justify-content-center">
                                                                    <div class="col-12 col-sm-4">
                                                                        <input type="submit" class="btn w-100 btn-success text-center d-flex justify-content-center" style="border-radius: 8px; background:#2F60DC;border: none;font-weight: 600 !important">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>
          
            

                                                </div>
                                            </div>

                                        @if($company->field == 'Grund')
                                            <tr class="">
                                                <td scope="row">{{$company->company_name}}</td>
                                                <td>{{$company->provision_percent}}</td>
                                                <td><div class="row g-0">
                                                    <div class="col">
                                                        {{ 100 - (int) $company->provision_percent }}
                                                    </div>
                                                    <div class="col-auto" onclick="updatee({{$company->id}})">
                                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.1038 0.668476C12.3158 0.456543 12.5674 0.288429 12.8443 0.173731C13.1212 0.0590338 13.418 2.23308e-09 13.7177 0C14.0174 -2.23308e-09 14.3142 0.0590338 14.5911 0.173731C14.868 0.288429 15.1196 0.456543 15.3315 0.668476C15.5435 0.880409 15.7116 1.13201 15.8263 1.40891C15.941 1.68582 16 1.9826 16 2.28232C16 2.58204 15.941 2.87882 15.8263 3.15573C15.7116 3.43263 15.5435 3.68423 15.3315 3.89617L4.43807 14.7896L0 16L1.21038 11.5619L12.1038 0.668476Z" fill="white"/>
                                                            <path d="M10.49 0.635254L14.9281 5.4768" stroke="#B2C4ED"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                     </td>
                                            </tr>
                                        @endif
                                     @endforeach
                                    </tbody>
                                </table>
                                <div class="mobileOnlyTable1 p-3 mb-2">
                                    <div class="row g-0 pb-2">
                                        <div class="col-6">
                                            <span class="fw-600">Versicherer</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>Helsana</span>
                                        </div>
                                    </div>
                                    <div class="row g-0 pb-2">
                                        <div class="col-6">
                                            <span class="fw-600">Provision Firma</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>1%</span>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-6">
                                            <span class="fw-600">Provision Berater</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>99%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 justify-content-end py-3">
                                <div class="col-6 col-md-5 col-lg-3">
                                    <button style="display: none" id="akt1" type="submit" class="finStatusSubmitBtn py-1 w-100">Aktualisieren</button>
                                </div>
                            </div>
                        </form>
                            <div>
                                <div class="row g-0 justify-content-end">

                                    <div class="col-auto my-auto pe-2" style="cursor: pointer;" onclick="addFirstTableRow()">
                                        <span class="addMoreBtn">Grundversicherung</span>

                                    </div>
                                    <div class="col-auto my-auto" style="cursor: pointer;" onclick="addFirstTableRow()">
                                        <svg width="30" height="30" viewBox="0 0 35 35" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.5 35C7.85197 35 0 27.148 0 17.5C0 7.85197 7.85197 0 17.5 0C27.148 0 35 7.85197 35 17.5C35 27.148 27.148 35 17.5 35Z"
                                                fill="#2F60DC" />
                                            <path
                                                d="M25.0588 19H10.9412C10.4211 19 10 18.5526 10 18C10 17.4474 10.4211 17 10.9412 17H25.0588C25.5789 17 26 17.4474 26 18C26 18.5526 25.5789 19 25.0588 19Z"
                                                fill="white" />
                                            <path
                                                d="M18 26C17.4474 26 17 25.5789 17 25.0588V18V10.9412C17 10.4211 17.4474 10 18 10C18.5526 10 19 10.4211 19 10.9412V25.0588C19 25.5789 18.5526 26 18 26Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="pb-3">
                                <span class="Grungversicherung fs-5">Zusatzversicherung</span>
                            </div>
                            <form action="{{route('companies.register',['id' => $id,'field' => 'Zusat'])}}" method="post" class="mb-0">
                                @csrf
                                <input type="number" hidden id="zusnr" name="cnt" value="0">
                            <div class="overflowFirstTable" id="overflowSecondTable">
                                <table class="table table-light text-center thirdTableBgColor secondTable fs-6">
                                    <thead>
                                    <tr>
                                        <th>Versicherer</th>
                                        <th>Provision Firma</th>
                                        <th>Provision Berater</th>
                                    </tr>
                                    </thead>
                                    <tbody id="secondTableBody" style="position: relative">
                                        @foreach($companies as $company)
                                        
                                            @if($company->field == 'Zusat')
                                                    <tr class="">
                                                        <td scope="row">{{$company->company_name}}</td>
                                                        <td>{{$company->provision_percent}}</td>
                                                        <td><div class="row g-0">
                                                    <div class="col">
                                                        {{ 100 - (int) $company->provision_percent }}
                                                    </div>
                                                    <div class="col-auto" onclick="updatee({{$company->id}})">
                                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.1038 0.668476C12.3158 0.456543 12.5674 0.288429 12.8443 0.173731C13.1212 0.0590338 13.418 2.23308e-09 13.7177 0C14.0174 -2.23308e-09 14.3142 0.0590338 14.5911 0.173731C14.868 0.288429 15.1196 0.456543 15.3315 0.668476C15.5435 0.880409 15.7116 1.13201 15.8263 1.40891C15.941 1.68582 16 1.9826 16 2.28232C16 2.58204 15.941 2.87882 15.8263 3.15573C15.7116 3.43263 15.5435 3.68423 15.3315 3.89617L4.43807 14.7896L0 16L1.21038 11.5619L12.1038 0.668476Z" fill="white"/>
                                                            <path d="M10.49 0.635254L14.9281 5.4768" stroke="#B2C4ED"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                     </td>
                                                        
                                                    </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mobileOnlyTable2 p-3 mb-2">
                                    <div class="row g-0 pb-2">
                                        <div class="col-6">
                                            <span class="fw-600">Versicherer</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>Helsana</span>
                                        </div>
                                    </div>
                                    <div class="row g-0 pb-2">
                                        <div class="col-6">
                                            <span class="fw-600">Provision Firma</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>1%</span>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-6">
                                            <span class="fw-600">Provision Berater</span>
                                        </div>
                                        <div class="col my-auto">
                                            <span>99%</span>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var first = 0;
                                    var second = 0;
                                    function addFirstTableRow(){
                                        first++;
                                        var x = document.getElementById('firstTableBody');
                                        var y = document.getElementById('overflowFirstTable');
                                        let mql = window.matchMedia('(max-width: 576px)');

                                        if (mql.matches) {
                                            y.innerHTML += '<div class="mobileOnlyTable1 p-3 mb-2">'
                                            +        '<div class="row g-0 pb-2">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Versicherer</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" list="companies" placeholder="" class="form-select py-1 provisionProfileInput1 pe-1" onblur="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'none' + '" onfocus="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'block ' + '"  id="company' + first + '" name="company' + first + '"></td>'
                                            +           '</div>'
                                            +       '</div>'
                                            +       '<div class="row g-0 pb-2">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Provision Firma</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" placeholder="Enter %" class="form-control py-1 provisionProfileInput1" id="percent" name="percent' + first + '"">'
                                            +           '</div>'
                                            +       '</div>'
                                            +       '<div class="row g-0">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Provision Berater</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" placeholder="Enter %" class="form-control py-1 provisionProfileInput1" onclick="insertCompany()" id="secondpercent" name="secondpercent' + first + '"">'
                                            +           '</div>'
                                            +       '</div>'
                                            +   '</div>';
                                        }
                                        else if(!mql.matches) {
                                            x.innerHTML += '<tr>'
                                            +    '<td scope="row">' +           '<input type="text" list="companies" placeholder="" class="form-select py-1 provisionProfileInput1 pe-1" onblur="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'none' + '" onfocus="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'block ' + '"  id="company' + first + '" name="company' + first + '"></td>'
                                            +    '<td><input type="number" required placeholder="Prozentsatz eingeben" class="form-control py-1 provisionProfileInput1" id="percent" name="percent' + first + '""></td>'
                                            +    '<td><input type="number" placeholder="Prozentsatz eingeben" class="form-control py-1 provisionProfileInput1" onclick="insertCompany()" id="secondpercent" name="secondpercent' + first + '""></td>'
                                            +    '</tr>';
                                        }
                                        document.getElementById('grundnr').value = parseInt(document.getElementById('grundnr').value) + 1;
                                        $('#akt1').show();
                                        $("#overflowFirstTable").scrollTop($("#overflowFirstTable")[0].scrollHeight);
                                    }
                                    function addSecondTableRow(){
                                        second++;
                                        var x = document.getElementById('secondTableBody');
                                        var y = document.getElementById('overflowSecondTable');
                                        let mql1 = window.matchMedia('(max-width: 576px)');
                                        if (mql1.matches) {
                                            y.innerHTML += '<div class="mobileOnlyTable2 p-3 mb-2">'
                                            +        '<div class="row g-0 pb-2">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Versicherer</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" list="companies" placeholder="" class="form-select py-1 provisionProfileInput pe-1" onblur="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'none' + '" onfocus="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'block ' + '"  id="company' + second + '" name="company' + second + '"></td>'
                                            +           '</div>'
                                            +       '</div>'
                                            +       '<div class="row g-0 pb-2">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Provision Firma</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" placeholder="Enter %" class="form-control py-1 provisionProfileInput" id="percent" name="percent' + second + '"">'
                                            +           '</div>'
                                            +       '</div>'
                                            +       '<div class="row g-0">'
                                            +           '<div class="col-6">'
                                            +               '<span class="fw-600">Provision Berater</span>'
                                            +           '</div>'
                                            +           '<div class="col my-auto">'
                                            +               '<input type="text" placeholder="Enter %" class="form-control py-1 provisionProfileInput" onclick="insertCompany()" id="secondpercent" name="secondpercent' + second + '"">'
                                            +           '</div>'
                                            +       '</div>'
                                            +   '</div>';
                                        }
                                        else if(!mql1.matches) {
                                            x.innerHTML += '<tr>'
                                            +    '<td scope="row">'
                                            +    '<input type="text" placeholder="Versicherungsgesellschaft auswählen" list="companies" name="company' + second  +'" class="form-select py-1 provisionProfileInput pe-1" onblur="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'none' + '" onfocus="document.getElementById(' + 'openOnFocus' + ').style.display:' +  'block ' + '"  id="company"></td>'
                                            +    '<td><input placeholder="Prozentsatz eingeben" type="number" required class="form-control py-1 provisionProfileInput" id="percent" name="percent' + second + '"></td>'
                                            +    '<td><input placeholder="Prozentsatz eingeben" type="number" class="form-control py-1 provisionProfileInput" onclick="insertCompany()" id="secondpercent" name="secondpercent' + second + '""></td>'
                                            +    '</tr>';
                                        }
                                        $('#akt2').show();
                                        document.getElementById('zusnr').value = parseInt(document.getElementById('zusnr').value) + 1;
                                        $("#overflowSecondTable").scrollTop($("#overflowSecondTable")[0].scrollHeight);
                                    }
                                    function insertgrund(){
                                        var company = $('#company' + first);
                                        alert(company.val());
{{--                                        axios.get('{{config('app.url')}}register/' + {{$id}} + '/grund?company=' + )--}}
                                    }
                                    function updatee(id){ 
                                        $('#modali' + id).modal('show')
                                    }
                                </script>
                            </div>
                            <div class="row g-0 justify-content-end py-3">
                                <div class="col-6 col-md-5 col-lg-3">
                                    <button style="display: none" id="akt2" type="submit" class="finStatusSubmitBtn py-1 w-100">Aktualisieren</button>
                                </div>
                            </div>
                        </form>
                            <div>
                                <div class="row g-0 justify-content-end">

                                    <div class="col-auto my-auto pe-2" style="cursor: pointer;" onclick="addSecondTableRow()">
                                        <span class="addMoreBtn">Zusatzversicherung</span>

                                    </div>
                                    <div class="col-auto my-auto" style="cursor: pointer;" onclick="addSecondTableRow()">
                                        <svg width="30" height="30" viewBox="0 0 35 35" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.5 35C7.85197 35 0 27.148 0 17.5C0 7.85197 7.85197 0 17.5 0C27.148 0 35 7.85197 35 17.5C35 27.148 27.148 35 17.5 35Z"
                                                fill="#2F60DC" />
                                            <path
                                                d="M25.0588 19H10.9412C10.4211 19 10 18.5526 10 18C10 17.4474 10.4211 17 10.9412 17H25.0588C25.5789 17 26 17.4474 26 18C26 18.5526 25.5789 19 25.0588 19Z"
                                                fill="white" />
                                            <path
                                                d="M18 26C17.4474 26 17 25.5789 17 25.0588V18V10.9412C17 10.4211 17.4474 10 18 10C18.5526 10 19 10.4211 19 10.9412V25.0588C19 25.5789 18.5526 26 18 26Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
            <datalist id="companies">
            <option value="Helsana">Helsana</option>
                <option value="Sympany">Sympany</option>
                <option value="Swica">Swica</option>
                <option value="GM">GM</option>

        </datalist>
    </div>

@endsection
<style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    .finStatusSubmitBtn {
        background: #2F60DC;
        border-radius: 13px;
        color: #FFFFFF;
        font-weight: 600;
        border: none;
    }
    .sideBarStyle {
        left: 0px;
        top: 0px;
        height: 100%;
        background: #f7f7f7;
    }
    .addMoreBtn {
        font-size: 14px;
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
    .mobileOnlyTable1 {
        background: rgba(90, 129, 225, 0.5);
        border-radius: 13px;
        display: none;
    }
    .mobileOnlyTable2 {
        background: #5A81E1;
        border-radius: 13px;
        display: none;
    }
    .activePageIndicator {
        font-size: 17px;
        color: #2F60DC;
    }

    .passivePageIndicator {
        font-size: 17px;
        color: #A7A4A4;
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
    .firstTitleSpan {
        font-weight: 600;
        color: #242424;
    }

    .firstTable th {
        font-weight: 600;

    }

    .firstTable {
        border: none;
        border-bottom: 1px solid rgba(255, 254, 254, 0.21) !important ;
        border-spacing: 0px;
        border-collapse: separate;
        --bs-table-bg: #F5F5F5;
        margin-bottom: 0% !important;
        vertical-align: middle;
        padding: 0% !important;
    }

    .firstTable th {
        border-right: 1px solid rgba(255, 254, 254, 0.21) !important;
        vertical-align: middle;
    }

    .firstTable th:first-child {
        border-radius: 13px 0 0 0;
    }

    .firstTable th:last-child {
        border-radius: 0 13px 0 0;
    }

    .firstTable th:last-child {
        border-right: none;
    }

    .firstTableSecondRow td:first-child {
        border-radius: 0 0 0 13px;

    }

    .firstTableSecondRow td:last-child {
        border-radius: 0 0 13px 0;

    }

    .firstTableSecondRow td {
        border-bottom: 1px solid rgba(255, 254, 254, 0.21)  !important;
    }

    .overflowFirstTable {
        overflow: auto;

        max-height: 250px;
    }
    .overflowFirstTable::-webkit-scrollbar {
        width: 6px;
    }

    .overflowFirstTable::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    .overflowFirstTable::-webkit-scrollbar-thumb {
        background: #2F60DC80;

        border-radius: 10px;

    }

    .overflowFirstTable::-webkit-scrollbar-thumb:hover {
        background: #2F60DC;

    }
    .svgSpan {
        line-height: 1;
    }

    .blueBGDiv {
        background: #2F60DC;
        border-radius: 18px;
        font-weight: 500;
        color: #fff;
    }

    .provisionGreyBg {
        background: #F5F5F5;
        border-radius: 13px;
    }

    .Grungversicherung {
        font-weight: 600;
        color: #000000;
    }

    .lightBlueBg {
        background: rgba(90, 129, 225, 0.5);
        border-radius: 13px;
    }

    .secondTable th {
        font-weight: 600;

    }

    .secondTable {
        border: none !important;
        border-bottom: none !important;
        border-spacing: 0px !important;
        border-collapse: separate !important;
        --bs-table-bg: rgba(90, 129, 225, 0.5) !important;
        margin-bottom: 0% !important;
        vertical-align: middle !important;
        color: #fff !important;
        padding: 0% !important;
    }

    .secondTable th {
        border-right: 1px solid rgba(255, 254, 254, 0.21) !important;
        vertical-align: middle;
    }

    .secondTable th:first-child {
        border-radius: 13px 0 0 0;
    }

    .secondTable th:last-child {
        border-radius: 0 13px 0 0;
    }

    .secondTable th:last-child {
        border-right: none;
    }

    .secondTable tbody:last-child tr:last-child td:first-child {
        border-radius: 0 0 0 13px;

    }

    .secondTable tbody:last-child tr:last-child td:last-child {
        border-radius: 0 0 13px 0;

    }

    .secondTable td, tr {
        border-bottom: 1px solid rgba(255, 254, 254, 0.21) !important;
    }

    .table-light th {
        padding: 1rem 1rem !important;
    }
    .table-light td {
        padding: 1rem 1rem !important;
    }

    .secondTable th {
        padding: 1rem 1rem;
    }

    .secondTable td {
        padding: 1rem 1rem;
    }

    .thirdTableBgColor {
        --bs-table-bg: #5A81E1 !important;
    }
    .provisionProfileInput {
        background-color: rgba(50, 52, 57, 0.1) !important;
        border-radius: 6px !important;
        border: none !important;
        color: #fff !important;
        margin: auto;
    }
    .provisionProfileInput::placeholder {
        color: #fff !important;
        opacity: 0.5 !important;

    }
    .provisionProfileInput1 {
        background-color: #B2C4ED !important;
        border-radius: 6px !important;
        border: none !important;
        color: #fff !important;
        margin: auto;
    }
    .provisionProfileInput1::placeholder {
        color: #fff !important;
        opacity: 0.5 !important;
    }
    [list]::-webkit-calendar-picker-indicator {
        display: none !important;
    }
    @media (max-width: 1399.98px) {}

    @media (max-width: 1199.98px) {}

    @media (max-width: 991.98px) {}

    @media (max-width: 767.98px) {
        .blueBGDiv {
            width: 100% !important;
        }
    }

    @media (max-width: 575.98px) {
        .blueBGDiv {
            width: 100% !important;
        }
        .overflowFirstTable table {
            display: none;
        }
        .overflowFirstTable {
            overflow-x: hidden;
            overflow-y: auto;
        }
        .mobileOnlyTable1 {
            display: block;
            color: #fff;
        }
    .mobileOnlyTable2 {
            display: block;
            color: #fff;
        }
    }
</style>
