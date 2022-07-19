@if(!auth()->user()->hasRole('fs') && !auth()->user()->hasRole('salesmanager'))
@extends('template.navbar')
@section('content')
<title>Finanzen</title>
@if(auth()->user()->hasRole('admin'))
    <div class="provisionModal1" id="provisionModal1">
        <div class="provisionModalContent p-4 mx-4">
            <div class="px-3">
                <div class="row g-0 pb-4">
                    <div class="col">
                        <span class="modalHeaderSpan fs-5">Provisionssystem</span>
                    </div>
                    <div class="col-auto" style="cursor: pointer;"
                         onclick="document.getElementById('provisionModal1').style.display = 'none';document.getElementsByTagName('BODY')[0].style = 'overflow-y: auto'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="#434343" stroke-width="3" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </div>
                <form action="{{route('addProvision')}}" class="px-4" method="post">
                    <div class="pb-3">
                        @csrf
                        <div class="pb-1">
                            <span class="provisionModalSpan">Name der Provision</span>
                        </div>
                        <div class="pb-3">
                            <input type="text" class="form-control provisionModalInput py-1" name="name" required>
                        </div>
                        <div class="pb-1"> 
                            <span class="provisionModalSpan">Monat</span>
                        </div>
                        <div class="pb-3">
                            <input type="month" class="form-control provisionModalInput py-1" name="from" required>
                        </div>
                        <!-- {{-- <div>
                            <span class="provisionModalSpan">Zu</span>
                        </div>
                        <div>
                            <input type="month" class="form-control provisionModalInput py-1" name="to">
                        </div> --}} -->

                        <div class="pb-3">
                            <div class="pb-1">
                                <span class="provisionModalSpan">Gruppe</span>
                            </div>
                            <div class="pb-3">
                            <div onclick="toggleDropdown()" class="row g-0 multipleSelectInputDiv">
        <div class="col">
            <input disabled style="border: none;background:transparent" class="" type="text" name=""
                id="multipleSelectInput1">
        </div>
        <div class="col-auto my-auto">
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    
    <div id="multipleSelectDropdown1" class="multipleSelectDropdown p-2">
        @foreach($groups as $group)
        <label for="checkbox1{{$group->id}}4" class="memberLabel">
            <input onchange="checkboxes()" id="checkbox1{{$group->id}}4" value="{{$group->id}}" class="memberCheckmarkselect1" type="checkbox" name="groups[]">{{ucfirst($group->name)}}
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
            }
            else {
                document.getElementById('multipleSelectDropdown1').style.display = "block";

            }
        }
        function checkboxes(){
            var x = document.querySelectorAll('.memberCheckmarkselect1:checked').length;
        document.getElementById('multipleSelectInput1').placeholder = x + ' Optionen ausgewählt';
    }
    </script>
    
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="provisionModalBtn w-100 py-1">Aktualisieren</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="row g-0">
        <div class="col">
            <div class="p-4 p-lg-5">
                <div class="row g-0 justify-content-between">
                    @if (auth()->user()->hasRole('fs'))
                    <div class="col-12 col-md-6 pe-0 pe-md-4 pe-lg-5">
                        <div class="pb-3 ps-3 pt-5 pt-md-0">
                            <span class="firstTitle fs-4">Provisionssystem</span>
                        </div>
                        <div class="provisionGreyBg p-3">
                            <div class="provisionOverflowDiv">
                                @foreach($provisions as $prov)
                                    <a href="{{route('finstatus',$prov->id)}}" style="color: black">
                                <div class="whiteBgInsideGrey px-3 mb-3 pb-0 pt-3">
                                    <div class="pb-1">
                                        <span class="groupsSpanStyle fs-6">{{ucfirst($prov->name)}}</span>
                                    </div>
                                    <div class="pb-3">
                                        <span class="underTitleBlueText fs-6">Grundlohn + Spesen</span>
                                    </div>

                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto">
                                                <svg width="25" height="25" viewBox="0 0 28 31" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M25.5 10.9245V28.3364H3V10.9245H25.5ZM25.5 8.43707H3C1.62 8.43707 0.5 9.54894 0.5 10.9245V28.3364C0.5 29.7119 1.62 30.8238 3 30.8238H25.5C26.8825 30.8238 28 29.7119 28 28.3364V10.9245C28 9.54894 26.8825 8.43707 25.5 8.43707ZM26.75 3.46224H23V2.21853C23 1.532 22.44 0.974823 21.75 0.974823C21.06 0.974823 20.5 1.532 20.5 2.21853V3.46224H8V2.21853C8 1.532 7.44 0.974823 6.75 0.974823C6.06 0.974823 5.5 1.532 5.5 2.21853V3.46224H1.75C1.06 3.46224 0.5 4.01942 0.5 4.70594C0.5 5.39247 1.06 5.94965 1.75 5.94965H26.75C27.44 5.94965 28 5.39247 28 4.70594C28 4.01942 27.44 3.46224 26.75 3.46224ZM8 13.4119H5.5V15.8993H8V13.4119ZM13 13.4119H10.5V15.8993H13V13.4119ZM18 13.4119H15.5V15.8993H18V13.4119ZM23 13.4119H20.5V15.8993H23V13.4119ZM8 18.3867H5.5V20.8741H8V18.3867ZM13 18.3867H10.5V20.8741H13V18.3867ZM18 18.3867H15.5V20.8741H18V18.3867ZM23 18.3867H20.5V20.8741H23V18.3867ZM8 23.3615H5.5V25.849H8V23.3615ZM13 23.3615H10.5V25.849H13V23.3615ZM18 23.3615H15.5V25.849H18V23.3615ZM23 23.3615H20.5V25.849H23V23.3615Z"
                                                        fill="#A7A4A4" />
                                                </svg>
                                            </div>
                                            <div class="col my-auto ps-3">
                                                <span class="monthsTextStyle">{{\Carbon\Carbon::parse($prov->from)->format('M')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col-auto my-auto">
                                                <svg width="25" height="25" viewBox="0 0 28 31" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M25.5 10.9245V28.3364H3V10.9245H25.5ZM25.5 8.43707H3C1.62 8.43707 0.5 9.54894 0.5 10.9245V28.3364C0.5 29.7119 1.62 30.8238 3 30.8238H25.5C26.8825 30.8238 28 29.7119 28 28.3364V10.9245C28 9.54894 26.8825 8.43707 25.5 8.43707ZM26.75 3.46224H23V2.21853C23 1.532 22.44 0.974823 21.75 0.974823C21.06 0.974823 20.5 1.532 20.5 2.21853V3.46224H8V2.21853C8 1.532 7.44 0.974823 6.75 0.974823C6.06 0.974823 5.5 1.532 5.5 2.21853V3.46224H1.75C1.06 3.46224 0.5 4.01942 0.5 4.70594C0.5 5.39247 1.06 5.94965 1.75 5.94965H26.75C27.44 5.94965 28 5.39247 28 4.70594C28 4.01942 27.44 3.46224 26.75 3.46224ZM8 13.4119H5.5V15.8993H8V13.4119ZM13 13.4119H10.5V15.8993H13V13.4119ZM18 13.4119H15.5V15.8993H18V13.4119ZM23 13.4119H20.5V15.8993H23V13.4119ZM8 18.3867H5.5V20.8741H8V18.3867ZM13 18.3867H10.5V20.8741H13V18.3867ZM18 18.3867H15.5V20.8741H18V18.3867ZM23 18.3867H20.5V20.8741H23V18.3867ZM8 23.3615H5.5V25.849H8V23.3615ZM13 23.3615H10.5V25.849H13V23.3615ZM18 23.3615H15.5V25.849H18V23.3615ZM23 23.3615H20.5V25.849H23V23.3615Z"
                                                        fill="#A7A4A4" />
                                                </svg>

                                            </div>
                                            <div class="col my-auto ps-3">
                                                <span class="monthsTextStyle">{{\Carbon\Carbon::parse($prov->to)->format('M')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        @if(!auth()->user()->hasRole('fs'))
                                        @endif
                                    </div>
                                </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
@if(auth()->user()->hasRole('admin'))
                        <div class="row g-0 justify-content-start">
                            <div class="col-auto my-auto pe-2" style="cursor: pointer;"
                                 onclick="openProvisionModal1()">
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
                            <div class="col-auto my-auto" style="cursor: pointer;" onclick="openProvisionModal1()">
                                <span class="addMoreBtn">Hinzufügen</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif

                @if(!auth()->user()->hasRole('fs'))
                <div class="row g-0 g-md-3 px-0 mx-0 mt-0">
                    <div class="col-12 col-md-6">
                        <div class="row pb-2">
                            <div class="col-9">
                                <span class="firstTitle fs-4">Gruppen</span>
                            </div>
                    
                        </div>

                        <div class="provisionGreyBg p-3">
                            <div class="provisionOverflowDiv">
                               @foreach($groups as $group)
                                    <div class="provisionModal1" id="provisionModal1{{$group->id}}">
                                        <div class="provisionModalContent p-4 mx-4">
                                            <div class="px-3">
                                                <div class="row g-0 pb-4">
                                                    <div class="col">
                                                        <span class="modalHeaderSpan fs-5">{{ucfirst($group->name)}}</span>
                                                    </div>
                                                    <div class="col-auto" style="cursor: pointer;"
                                                         onclick="document.getElementById('provisionModal1{{$group->id}}').style.display = 'none';document.getElementsByTagName('BODY')[0].style = 'overflow-y: auto'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                             fill="none" stroke="#434343" stroke-width="3" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <form action="{{route('update.group',$group->id)}}" class="" method="post">
                                                    <div class="pb-3">
                                                        @csrf
                                                        <div class="pb-2">
                                                            <span class="provisionModalSpan">Mitglieder der Lohngruppe</span>
                                                        </div>
                                                        <div class="row g-0">
                                                            @foreach(App\Models\Admins::whereNull('admin_id')->role(['fs','salesmanager','callagent'])->orWhere('roless','<>',null)->get() as $member)
                                                                @if($group->members->contains($member->id))
                                                                    <div class="col-6">
                                                                        <input type="checkbox" id="checkbox{{$member->id}}1" checked value="{{$member->id}}" name="members[]">
                                                                        <label for="checkbox{{$member->id}}1">{{ucfirst($member->name)}}</label>
                                                                        {{-- <label for="checkbox{{$member->id}}1" class="memberLabel">
                                                                            <input id="checkbox{{$member->id}}1" type="checkbox" checked value="{{$member->id}}" name="members[]">{{ucfirst($member->name)}}
                                                                            <span class="memberCheckmark"></span>
                                                                        </label> --}}
                                                                    </div>
                                                                @else
                                                                    <div class="col-6"> 
                                                                        <input type="checkbox" id="checkbox{{$member->id}}1" value="{{$member->id}}" name="members[]">
                                                                        <label  for="checkbox{{$member->id}}1">{{ucfirst($member->name)}}</label>
                                                                        {{-- <label for="checkbox{{$member->id}}1" class="memberLabel">
                                                                            <input id="checkbox{{$member->id}}1" type="checkbox" value="{{$member->id}}" name="members[]">{{ucfirst($member->name)}}
                                                                            <span class="memberCheckmark"></span>
                                                                        </label> --}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        @csrf
                                                        <div class="pb-2">
                                                            <span class="provisionModalSpan">Name der Provision</span>
                                                        </div>
                                                        <!-- <span class="provisionModalSpan">Provision</span> -->
                                                        <div class="pb-3 customStyleSelect">
                                                            <div class="row g-0">
                                                                @foreach(App\Models\Provisions::get() as $prov)
                                                                    @if($prov->id == $group->provision_id)
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="prov" id="radio{{$group->provision_id}}" value="{{$group->provision_id}}" checked>
                                                                        <label for="radio{{$group->provision_id}}">{{ucfirst($prov->name)}}</label>
                                                                        {{-- <label class="memberLabel radioLabel" for="radio{{$group->provision_id}}" >
                                                                            <input type="checkbox" hidden name="prov" id="radio{{$group->provision_id}}" value="{{$group->provision_id}}" checked>{{ucfirst($prov->name)}}
                                                                            <span class="memberCheckmark radioCheckmark" style="border-radius: 50px !important;"></span>
                                                                        </label> --}}
                                                                    </div>
                                                                    @else
                                                                    <div class="col-6">
                                                                        <input type="checkbox" name="prov" id="rradio{{$prov->id}}" value="{{$prov->id}}">
                                                                        <label for="rradio{{$prov->id}}">{{ucfirst($prov->name)}}</label>
                                                                        {{-- <label class="memberLabel radioLabel" for="rradio{{$prov->id}}">
                                                                            <input type="radio" hidden name="prov" id="rradio{{$prov->id}}" value="{{$prov->id}}">{{ucfirst($prov->name)}}
                                                                            <span class="memberCheckmark radioCheckmark" style="border-radius: 50px !important;"></span>
                                                                        </label> --}}
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                                {{-- <input type="checkbox" value="{{$admin->id}}" name="admins[]">{{$admin->name}} --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mx-auto text-center">
                                                        <button class="provisionModalBtn w-75 py-1 mx-auto">Aktualisieren</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <div class="whiteBgInsideGrey mb-3 p-3"  onclick="openProvisionGroup({{$group->id}})">
                                    <div class="pb-4">
                                        <div class="row g-0">
                                            <div class="col">
                                                <div>
                                                    <span class="groupsSpanStyle fs-5">{{ucfirst($group->name)}}</span>

                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">

                                                <a href="{{route('group.delete',$group->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#a7a4a4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div class="text-end pt-3 ">
                                                    <span class="monthsTextStyle greenTextStyle">ACTIVE</span>
                                            </div> -->
                                    </div>

                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col my-auto">
                                                <span class="monthsTextStyle">Grundlohn</span>
                                            </div>
                                            <div class="col-auto my-auto ps-3">
                                                <span class="monthsTextStyle">{{$group->salary}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row g-0">
                                            <div class="col my-auto">
                                                <span class="monthsTextStyle">Spesen</span>
                                            </div>
                                            <div class="col-auto my-auto ps-3">
                                                <span class="monthsTextStyle">{{$group->expenses}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="row g-0">
                                            <div class="col my-auto">
                                                <span class="monthsTextStyle">Provisionssystem</span>
                                            </div>
                                            <div class="col-auto my-auto ps-3">
                                                @if($group->provision->name == 'Keines')
                                                <span class="monthsTextStyle redTextStyle">Verbunden: {{ucfirst($group->provision->name)}}</span>
                                                @else
                                                <span class="monthsTextStyle greenTextStyle">Verbunden: {{ucfirst($group->provision->name)}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                        @if(auth()->user()->hasRole('admin'))
                        <div class="pt-3">
                            <div class="row g-0 justify-content-start">
                                <div class="col-auto my-auto pe-2" style="cursor: pointer;"
                                     onclick="openProvisionModal()">
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
                                <div class="col-auto my-auto" style="cursor: pointer;" onclick="openProvisionModal()">
                                    <span class="addMoreBtn">Hinzufügen</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                        <div class="col-12 col-md-6">
                        <div class="row pb-2">
                            <div class="col-9">
                                <span class="firstTitle fs-4">Provisionssystem</span>
                            </div>
                            <div class="col-3">
                                <select class="GrundversicherungInput form-control" id="prv" onchange="prevprov()">
                                @if(request()->date == Carbon\Carbon::now()->subDays(30)->format('Y-m'))
                                    <option value="{{Carbon\Carbon::now()->subDays(30)->format('Y-m')}}" selected>Last month</option>
                                    @else
                                    <option value="{{Carbon\Carbon::now()->subDays(30)->format('Y-m')}}">Last month</option>
                                    @endif
                                    @if(request()->date == Carbon\Carbon::now()->subDays(90)->format('Y-m'))
                                    <option value="{{Carbon\Carbon::now()->subDays(90)->format('Y-m')}}" selected>Last 3 months</option>
                                    @else
                                    <option value="{{Carbon\Carbon::now()->subDays(90)->format('Y-m')}}">Last 3 months</option>
@endif
@if(request()->date == Carbon\Carbon::now()->subDays(120)->format('Y-m'))
                                    <option value="{{Carbon\Carbon::now()->subDays(120)->format('Y-m')}}" selected>Last 6 months</option>
                                    @else
                                    <option value="{{Carbon\Carbon::now()->subDays(120)->format('Y-m')}}">Last 6 months</option>
@endif
@if(request()->date == Carbon\Carbon::now()->subDays(360)->format('Y-m'))
                                    <option value="{{Carbon\Carbon::now()->subDays(360)->format('Y-m-d')}}" selected>Last year</option>
                                    @else
                                    <option value="{{Carbon\Carbon::now()->subDays(360)->format('Y-m-d')}}">Last year</option>
@endif
@if(request()->date == Carbon\Carbon::now()->subDays(720)->format('Y-m'))
                                    <option value="{{Carbon\Carbon::now()->subDays(720)->format('Y-m')}}" selected>Last 2 years</option>
                                    @else
                                    <option value="{{Carbon\Carbon::now()->subDays(720)->format('Y-m')}}">Last 2 years</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                            <div class="provisionGreyBg p-3">
                                <div class="provisionOverflowDiv">
                                    @foreach($provisions as $prov)
                                        <a href="{{route('finstatus',$prov->id)}}" style="color: black">
                                    <div class="whiteBgInsideGrey px-3 mb-3 pb-0 pt-3">
                                        <div class="pb-1">
                                            <span class="groupsSpanStyle fs-5">{{ucfirst($prov->name)}}</span>
                                        </div>
                                        <div class="pb-3">
                                            <span class="underTitleBlueText fs-6">Grundlohn + Spesen</span>
                                        </div>

                                        <div class="pb-3">
                                            <div class="row g-0">
                                                <div class="col-auto my-auto">
                                                    <svg width="25" height="25" viewBox="0 0 28 31" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M25.5 10.9245V28.3364H3V10.9245H25.5ZM25.5 8.43707H3C1.62 8.43707 0.5 9.54894 0.5 10.9245V28.3364C0.5 29.7119 1.62 30.8238 3 30.8238H25.5C26.8825 30.8238 28 29.7119 28 28.3364V10.9245C28 9.54894 26.8825 8.43707 25.5 8.43707ZM26.75 3.46224H23V2.21853C23 1.532 22.44 0.974823 21.75 0.974823C21.06 0.974823 20.5 1.532 20.5 2.21853V3.46224H8V2.21853C8 1.532 7.44 0.974823 6.75 0.974823C6.06 0.974823 5.5 1.532 5.5 2.21853V3.46224H1.75C1.06 3.46224 0.5 4.01942 0.5 4.70594C0.5 5.39247 1.06 5.94965 1.75 5.94965H26.75C27.44 5.94965 28 5.39247 28 4.70594C28 4.01942 27.44 3.46224 26.75 3.46224ZM8 13.4119H5.5V15.8993H8V13.4119ZM13 13.4119H10.5V15.8993H13V13.4119ZM18 13.4119H15.5V15.8993H18V13.4119ZM23 13.4119H20.5V15.8993H23V13.4119ZM8 18.3867H5.5V20.8741H8V18.3867ZM13 18.3867H10.5V20.8741H13V18.3867ZM18 18.3867H15.5V20.8741H18V18.3867ZM23 18.3867H20.5V20.8741H23V18.3867ZM8 23.3615H5.5V25.849H8V23.3615ZM13 23.3615H10.5V25.849H13V23.3615ZM18 23.3615H15.5V25.849H18V23.3615ZM23 23.3615H20.5V25.849H23V23.3615Z"
                                                            fill="#A7A4A4" />
                                                    </svg>
                                                </div>
                                                <div class="col my-auto ps-3">
                                                    <span class="monthsTextStyle">{{\Carbon\Carbon::parse($prov->from)->format('M')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="pb-3">
                                            <div class="row g-0">
                                                <div class="col-auto my-auto">
                                                    <svg width="25" height="25" viewBox="0 0 28 31" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M25.5 10.9245V28.3364H3V10.9245H25.5ZM25.5 8.43707H3C1.62 8.43707 0.5 9.54894 0.5 10.9245V28.3364C0.5 29.7119 1.62 30.8238 3 30.8238H25.5C26.8825 30.8238 28 29.7119 28 28.3364V10.9245C28 9.54894 26.8825 8.43707 25.5 8.43707ZM26.75 3.46224H23V2.21853C23 1.532 22.44 0.974823 21.75 0.974823C21.06 0.974823 20.5 1.532 20.5 2.21853V3.46224H8V2.21853C8 1.532 7.44 0.974823 6.75 0.974823C6.06 0.974823 5.5 1.532 5.5 2.21853V3.46224H1.75C1.06 3.46224 0.5 4.01942 0.5 4.70594C0.5 5.39247 1.06 5.94965 1.75 5.94965H26.75C27.44 5.94965 28 5.39247 28 4.70594C28 4.01942 27.44 3.46224 26.75 3.46224ZM8 13.4119H5.5V15.8993H8V13.4119ZM13 13.4119H10.5V15.8993H13V13.4119ZM18 13.4119H15.5V15.8993H18V13.4119ZM23 13.4119H20.5V15.8993H23V13.4119ZM8 18.3867H5.5V20.8741H8V18.3867ZM13 18.3867H10.5V20.8741H13V18.3867ZM18 18.3867H15.5V20.8741H18V18.3867ZM23 18.3867H20.5V20.8741H23V18.3867ZM8 23.3615H5.5V25.849H8V23.3615ZM13 23.3615H10.5V25.849H13V23.3615ZM18 23.3615H15.5V25.849H18V23.3615ZM23 23.3615H20.5V25.849H23V23.3615Z"
                                                            fill="#A7A4A4" />
                                                    </svg>

                                                </div>
                                                <div class="col my-auto ps-3">
                                                    <span class="monthsTextStyle">{{\Carbon\Carbon::parse($prov->to)->format('M')}}</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div>
                                            @if(!auth()->user()->hasRole('fs'))

                                            @endif
                                        </div>
                                    </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('admin'))
                            <div class="row g-0 justify-content-start pt-3">
                                <div class="col-auto my-auto pe-2 " style="cursor: pointer;"
                                     onclick="openProvisionModal1()">
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
                                <div class="col-auto my-auto" style="cursor: pointer;" onclick="openProvisionModal1()">
                                    <span class="addMoreBtn">Hinzufügen</span>
                                </div>
                            </div>
                            @endif
                        </div>

                </div>
                @endif
                </div>
            </div>
        </div>
    </div>


    <!-- ------------------modal-------------- -->
    @if(auth()->user()->hasRole('admin'))
    <div class="provisionModal" id="provisionModal">
        <div class="provisionModalContent p-4 mx-4">
            <div class="px-3">
                <div class="row g-0 pb-4">
                    <div class="col">
                        <span class="modalHeaderSpan fs-5">Gruppen</span>
                    </div>
                    <div class="col-auto" style="cursor: pointer;"
                         onclick="document.getElementById('provisionModal').style.display = 'none';document.getElementsByTagName('BODY')[0].style = 'overflow-y: auto'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="#434343" stroke-width="3" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </div>
                <form action="{{route('addGroup')}}" class="px-4" method="post">
                    <div class="pb-3">
                        @csrf
                        <div>
                            <span class="provisionModalSpan">Gruppenname</span>
                        </div>
                        <div>
                            <input type="text" class="form-control provisionModalInput py-1" name="name" required>
                        </div>
                    </div>
                    <div class="pb-3">
                        <div>
                            <span class="provisionModalSpan">Grundlohn</span>
                        </div>
                        <div>
                            <input type="number" class="form-control provisionModalInput py-1" name="salary" required>
                        </div>
                    </div>
                    <div class="pb-3">
                        <div>
                            <span class="provisionModalSpan">Spesen</span>
                        </div>
                        <div>
                            <input type="number" class="form-control provisionModalInput py-1" name="expenses" required>
                        </div>
                    </div>
                    <div>
                        <span class="provisionModalSpan">Verbunden</span>
                        <div onclick="toggleDropdown122()" class="row g-0 multipleSelectInputDiv">
                            <div class="col">
                                <input disabled style="border: none;background:transparent" class="" type="text" name=""
                                    id="multipleSelectInput122">
                            </div>
                            <div class="col-auto my-auto">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
    
                            <div id="multipleSelectDropdown122" class="multipleSelectDropdown p-2" style="height: 200px; overflow-y:scroll;">
                                @foreach(App\Models\Admins::whereNull('admin_id')->role(['fs','salesmanager','callagent'])->orWhere('roless','<>',null)->get() as $admin)
                                    <label for="checkbox1{{$admin->id}}22" class="memberLabel">
                                        <input onchange="checkboxes122()" id="checkbox1{{$admin->id}}22" value="{{$admin->id}}" class="memberCheckmarkselect122" type="checkbox" name="admins[]">{{ucfirst($admin->name)}}
                                        <span class="memberCheckmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
    <script>
            var x = document.querySelectorAll('.memberCheckmarkselect122:checked').length;
            document.getElementById('multipleSelectInput122').placeholder = x + ' Optionen ausgewählt';
        function toggleDropdown122() {
            if (document.getElementById('multipleSelectDropdown122').style.display == "block") {
                document.getElementById('multipleSelectDropdown122').style.display = "none";
                
            }
            else {
                document.getElementById('multipleSelectDropdown122').style.display = "block";
                document.getElementById('multipleSelectDropdown1222').style.display = "none";
            }
        }
        function checkboxes122(){
            var x = document.querySelectorAll('.memberCheckmarkselect122:checked').length;
        document.getElementById('multipleSelectInput122').placeholder = x + ' Optionen ausgewählt';
    }
    function prevprov(){
        var x = document.getElementById("prv").value;
        window.location.href = "{{route('finance')}}?date=" + x;
    }
    </script>
                    </div>
                    <div class="pb-3 customStyleSelect">
                   
                    </div>
                    <span class="provisionModalSpan">Provision</span>
                    <div class="pb-3 customStyleSelect">

                    <div onclick="toggleDropdown1222()" class="row g-0 multipleSelectInputDiv">
        <div class="col">
            <input disabled style="border: none;background:transparent" class="" type="text" name=""
                id="multipleSelectInput1222">
        </div>
        <div class="col-auto my-auto">
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    
    <div id="multipleSelectDropdown1222" class="multipleSelectDropdown p-2">
    @foreach(App\Models\Provisions::get() as $prov)
        <label for="checkbox1{{$prov->id}}222" class="memberLabel">
            <input onchange="checkboxes1222()" id="checkbox1{{$prov->id}}222" value="{{$prov->id}}" class="memberCheckmarkselect1222" type="checkbox" name="prov_id">{{ucfirst($prov->name)}}
            <span class="memberCheckmark"></span>
        </label>
  
      @endforeach
    </div>
    </div>
                    
                        <script>
            var x = document.querySelectorAll('.memberCheckmarkselect1222:checked').length;
            document.getElementById('multipleSelectInput1222').placeholder = x + ' Optionen ausgewählt';
        function toggleDropdown1222() {
            if (document.getElementById('multipleSelectDropdown1222').style.display == "block") {
                document.getElementById('multipleSelectDropdown1222').style.display = "none";
            }
            else {
                document.getElementById('multipleSelectDropdown1222').style.display = "block";

            }
        }
        function checkboxes1222(){
            var x = document.querySelectorAll('.memberCheckmarkselect1222:checked').length;
        document.getElementById('multipleSelectInput1222').placeholder = x + ' Optionen ausgewählt';
    }
    </script>
                    </div>
                    <div>
                        <button class="provisionModalBtn w-100 py-1">Aktualisieren</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endif
@endsection
<script>
    
    function openProvisionModal() {
        var x = document.getElementById('provisionModal');
        var y = document.getElementsByTagName("BODY")[0];
        x.style.display = "flex";
        y.style = "overflow-y: hidden"
    }
    function openProvisionModal1() {
        var x = document.getElementById('provisionModal1');
        var y = document.getElementsByTagName("BODY")[0];
        x.style.display = "flex";
        y.style = "overflow-y: hidden";
    }
    function openProvisionGroup(id) {
        var x = document.getElementById('provisionModal1' + id);
        var y = document.getElementsByTagName("BODY")[0];
        x.style.display = "flex";
        y.style = "overflow-y: hidden"
    }

    window.onclick = function (event) {
        if (event.target == document.getElementById('provisionModal')){
            document.getElementById('provisionModal').style.display = "none";
            document.getElementsByTagName("BODY")[0].style = "overflow-y: auto";
        }
    }
    function closethat(id){
        document.getElementById('provisionModal1' + id).style.display = "none";
        document.getElementsByTagName("BODY")[0].style = "overflow-y: auto";
    }
    $('select').selectpicker();
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<style>

​
        .multipleSelectInputDiv {
            position: relative;
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            background-color: rgb(255, 255, 255) !important;
            border: 1px solid rgb(243, 243, 243) !important;
            font-family: Montserrat;
            box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px !important;
        }
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
    .filter-option-inner-inner {
        border:none !important;
        background-color: #fff !important;
        outline: none !important;

    }
    .customStyleSelect select {
        border:1px solid rgb(243, 243, 243) !important;
        background-color: #fff !important;
        outline: none !important;
    }
    .customStyleSelect div {
        border:none !important;
        background-color: #fff !important;
        outline: none !important;
    }
    .bootstrap-select {
        border:none !important;
        background-color: #fff !important;
        outline: none !important;

    }
</style>

<style>
    .firstTitle {
        font-weight: 600;
        color: #242424;
    }

    .provisionGreyBg {
        background: #E5E9F3;
        border-radius: 13px;
    }

    .whiteBgInsideGrey {
        background: #FFFFFF;
        border-radius: 19px;
        cursor: pointer;
    }

    .groupsSpanStyle {
        font-weight: 600;
    }

    .underTitleBlueText {
        font-weight: 600;
        color: #4F7CA3;
    }

    .seeMoreBtn {
        font-weight: 600;
        color: #4F7CA3;

    }

    .monthsTextStyle {
        font-size: 16px !important;
    }

    .greenTextStyle {
        font-weight: 600;
        color: #43B21C;
    }
    .redTextStyle {
        font-weight: 600;
        color: red;
    }

    .provisionOverflowDiv {
        overflow-y: auto;
        height: 65vh;

    }
    .provisionOverflowDiv a {
        text-decoration: none !important;
    }
    .provisionOverflowDiv::-webkit-scrollbar {
        width: 6px;
    }

    .provisionOverflowDiv::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    .provisionOverflowDiv::-webkit-scrollbar-thumb {
        background: #2F60DC80;

        border-radius: 10px;

    }

    .provisionOverflowDiv::-webkit-scrollbar-thumb:hover {
        background: #2F60DC;

    }
    .provisionModal {
        display: none;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(29, 32, 34, 0.6);
        backdrop-filter: blur(15px);
        justify-content: center;
        align-items: center;
        z-index: 9999;
        left: 0;
        top: 0;
    }

    .provisionModalContent {
        background: #fff;
        border-radius: 23px;
        height: auto;
        width: 500px;
    }

    .modalHeaderSpan {
        font-weight: 700;
        color: rgb(67, 67, 67);
    }

    .provisionModalInput {
        border-radius: 8px !important;
        background-color: rgb(255, 255, 255) !important;
        border: 1px solid rgb(243, 243, 243) !important;
        font-family: Montserrat;
        box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px !important;

    }

    .provisionModalSpan {
        font-weight: 600;
        color: rgb(67, 67, 67);
    }
    .provisionModalBtn {
        background: #2F60DC;
        border: 1px solid #2F60DC;
        box-shadow: 0px 4px 4px rgba(210, 210, 210, 0.25);
        border-radius: 11px;
        color: #fff;
        font-weight: 600;
    }

    .provisionModal1 {
        display: none;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(29, 32, 34, 0.6);
        backdrop-filter: blur(15px);
        justify-content: center;
        align-items: center;
        z-index: 9999;
        left: 0;
        top: 0;
    }

    .provisionModal1Content {
        background: #fff;
        border-radius: 23px;
        height: auto;
        width: 500px;
    }

    .modalHeaderSpan {
        font-weight: 700;
        color: rgb(67, 67, 67);
    }

    .provisionModal1Input {
        border-radius: 8px;
        background-color: rgb(255, 255, 255) !important;
        border: 1px solid rgb(243, 243, 243) !important;
        font-family: Montserrat;
        box-shadow: rgb(238 238 238 / 25%) 0px 4px 4px !important;

    }

    .provisionModal1Span {
        font-weight: 600;
        color: rgb(67, 67, 67);
    }
    .provisionModal1Btn {
        background: #2F60DC;
        border: 1px solid #2F60DC;
        box-shadow: 0px 4px 4px rgba(210, 210, 210, 0.25);
        border-radius: 11px;
        color: #fff;
        font-weight: 600;
    }
</style>
@endif
<style>
/* The container */
.memberLabel {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 6px;
  cursor: pointer;
  font-size: 16px;
  color: #434343;
  font-weight: 400;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.GrundversicherungInput {
        background: #FFFFFF;
        border: 1px solid #EDEDED;
        box-sizing: border-box;
        border-radius: 11px;
    }

/* Hide the browser's default checkbox */
.memberLabel input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.memberCheckmark {
  position: absolute;
  top: 4px;
  left: 0;
  height: 17px;
  width: 17px;
  background-color: #fff;
  border-radius: 3px;
  border: 1px solid rgba(0, 0, 0, 0.33);
}

/* On mouse-over, add a grey background color */
.memberLabel:hover input ~ .memberCheckmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.memberLabel input:checked ~ .memberCheckmark {
  background-color: #2F60DC;
  border: none;
}

/* Create the checkmark/indicator (hidden when not checked) */
.memberCheckmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.memberLabel input:checked ~ .memberCheckmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.memberLabel .memberCheckmark:after {
    left: 6.5px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0px 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.radioLabel .radioCheckmark::after {
    top: 2.5px !important;
	left: 2.5px !important;
	width: 12px !important;
	height: 12px !important;
	border-radius: 50% !important;
	background: white !important;
}
</style>