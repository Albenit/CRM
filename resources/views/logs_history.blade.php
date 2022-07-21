@extends('template.navbar')
@section('content')
    <div class="row g-0">
        <div class="col">
            <div class="p-4">
                <div class="adminHrSearchBar p-2">
                    <div class="row g-0">
                        <div class="col-auto pe-3 my-auto">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.00474 17.0095C13.4256 17.0095 17.0095 13.4256 17.0095 9.00474C17.0095 4.58385 13.4256 1 9.00474 1C4.58385 1 1 4.58385 1 9.00474C1 13.4256 4.58385 17.0095 9.00474 17.0095Z"
                                    stroke="#CBCBCB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.0127 19.075L14.6602 14.7224" stroke="#CBCBCB" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="col">
                            <form>
                                <input class="form-control p-0 " type="text" name="searchEmployes"
                                    placeholder="Suche History" style="margin-bottom: -15px">
                                <input type="submit" hidden>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="pt-4 px-3 d-none d-md-block">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="row g-3 h-100 justify-content-between my-auto">
                                <div class="col-12 col-sm-1 my-auto me-3">
                                    <span class="fw-bold">Edited By</span>
                                </div>
                                <div class="col-12 col-sm-2 my-3 my-sm-auto">
                                    <span class="fw-bold">Kunden</span>
                                </div>
                                <div class="col-12 col-sm-2 my-auto">
                                    <span class="fw-bold">Description</span>
                                </div>
                                <div class="col-12 col-sm-2 ">
                                    <span class="fw-bold">Type</span>
                                </div>
                                <div class="col-12 col-sm-2 ">
                                    <span class="fs-6" style="font-weight: 500;">
                                        <span class="fw-bold">Datum</span>
                                    </span>
                                </div>
                                <div class="col-12 col-sm-1 ">
                                    <span class="fs-6" style="font-weight: 500;">
                                        <span class="fw-bold">Time</span>
                                    </span>
                                </div>
                                <div class="col-12 col-sm-auto pt-3 pt-sm-0 my-auto ">
                                    <button class="adminViewProfileBtn w-100 py-1"
                                        style="visibility: hidden;">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($logsActivity as $logs)
                    <div class="pt-4">
                        <div class="row g-3" id="employes">
                            <div class="col-12">

                                <div class="adminHrGreyBg py-2 px-3">
                                    
                                    <div class="row g-3 h-100 justify-content-between my-auto">
                                        <div class="col-12 col-sm-1 my-auto me-3">
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Edited By</span>

                                                </div>
                                                <div class="col">
                                                    <span class="fs-6"
                                                        style="font-weight: 500;">{{ ucfirst(App\Models\Admins::find($logs->edited_from)->name) }}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-2 my-3 my-sm-auto">
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Kunden</span>

                                                </div>
                                                <div class="col">
                                                    <span class="fs-6"
                                                        style="font-weight: 500;">{{ $logs->family->first_name }}
                                                        {{ $logs->family->last_name }}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-2 my-auto">
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Description</span>
                                                </div>
                                                <div class="col">
                                                    <span class="fs-6"
                                                        style="font-weight: 500;">{{ $logs->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2 my-auto ">
                                            {{-- type 1 stand for form
                                         type 2 stand for products
                                         type 3 stand for edit personaldata
                                         type 4 stand for manualy inserted client 
                                         type 5 stand for inserted client from appoinment--}}
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Type</span>
                                                </div>
                                                <div class="col my-auto">
                                                    <span class="fs-6" style="font-weight: 500;">
                                                        @if ($logs->type == 1)
                                                            <span class="fs-6" style="font-weight: 500;">Document
                                                                Form</span>
                                                        @elseif ($logs->type == 2)
                                                            <span class="fs-6" style="font-weight: 500;">Produkts</span>
                                                        @elseif ($logs->type == 3)
                                                            <span class="fs-6" style="font-weight: 500;">Kunde Personal
                                                                Data</span>
                                                        @elseif ($logs->type == 4)
                                                            <span class="fs-6" style="font-weight: 500;">Kunden
                                                                Manualy</span>
                                                        @elseif ($logs->type == 5)
                                                            <span class="fs-6" style="font-weight: 500;">Kunde from Termine</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-2 my-auto">
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Datum</span>
                                                </div>
                                                <div class="col">
                                                    <span class="fs-6" style="font-weight: 500;">
                                                        {{ Str::substr($logs->created_at, 0, 11) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-1 my-auto">
                                            <div class="row g-0">
                                                <div class="col-4 d-block d-md-none">
                                                    <span class="fw-bold">Time</span>
                                                </div>
                                                <div class="col">
                                                    <span class="fs-6" style="font-weight: 500;">
                                                        {{ Str::substr($logs->created_at, 11, 19) }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-auto pt-3 pt-sm-0 my-auto">
                                            <div class="">
                                                <button class="adminViewProfileBtn w-100 py-1" data-bs-toggle="modal" data-bs-target="#detailsmodal{{$logs->id}}">Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modali --}}
                    <div class="modal fade" id="detailsmodal{{$logs->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" style="top: 7% !important;" aria-hidden="true">
                        <div class="modal-dialog historyModalContent">
                            <div class="modal-content p-3 "
                                    style="border-radius: 23px !important;border: none !important;">
                                <div class="modal-header"
                                        style="border-bottom: 0 !important;">
                                    <h5 class="modal-title mx-2"
                                        style="font-family: 'Montserrat' !important;font-weight: 600"
                                        id="exampleModalLabel">History of {{ $logs->family->first_name }} {{ $logs->family->last_name }}
                                    </h5>
                                    <button type="button" style="opacity: 1 !important;"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-center">
                                                <span class="fs-6 fw-600 " style="color:black;">Old Data</span>
                                            </div>
                                            <div class="" style="height: 500px; overflow-y:auto;">
                                                @foreach (json_decode($logs->old_data) as $key => $value)
                                                    @if (is_array($value))
                                                        @foreach ($value as $dd)
                                                        <div class="py-1">
                                                            <span>{{$key}} = {!!$dd!!}</span>
                                                        </div> 
                                                        @endforeach
                                                    @else
                                                        <div class="py-1">
                                                            <span>{{$key}} = {!!$value!!}</span>
                                                        </div> 
                                                    @endif
                                                @endforeach 
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center">
                                                <span class="fs-6 fw-600 " style="color:black;">New Data</span>
                                            </div>
                                            <div class="" style="height: 500px; overflow-y:auto;">
                                                @foreach (json_decode($logs->new_data) as $key => $value)
                                                    @if (is_array($value))
                                                        @foreach ($value as $dd)
                                                        <div class="py-1">
                                                            <span>{{$key}} = {!!$dd!!}</span>
                                                        </div> 
                                                        @endforeach
                                                    @else
                                                        <div class="py-1">
                                                            <span>{{$key}} = {!!$value!!}</span>
                                                        </div> 
                                                    @endif
                                                @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End modal --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection

<style>
    .historyModalContent {
        max-width: 800px !important;
    }
    .adminHrSearchBar {
        background: #F7F7F7;
        border: 1px solid rgba(100, 97, 97, 0.05);
        border-radius: 11px;
    }

    .adminHrSearchBar input {
        border: none;
        background-color: transparent;
    }

    .adminHrSearchBar input::placeholder {
        color: #CFCECE;
    }

    .adminHrGreyBg {
        background: #FAFAFA;
        border: 1px solid #FAFAFA;
        box-shadow: 0px 4px 4px rgba(214, 214, 214, 0.25);
        border-radius: 13px;
        height: 100%;
    }

    .adminViewProfileBtn {
        background: transparent;
        border: 1px solid #2F60DC;
        border-radius: 33px;
        font-weight: 600;
        color: #2F60DC;
        font-size: 16px;
        padding: 10px 30px;
    }

    @media (max-width: 575.98px) {
        .adminViewProfileBtn {
            font-size: 14px;
        }
    }
</style>
