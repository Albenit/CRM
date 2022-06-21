@if(Auth::guard('admins')->user()->hasRole('backoffice') || Auth::guard('admins')->user()->hasRole('admin'))
@extends('template.navbar')
@section('content')
    <title>Status</title>
<section>
    <div class="">
        <div class="row my-3">
            <div class="col mb-3">
                <div class="leads-div py-3 px-4" style="height: 650px;">
                    <div class="leads-header my-2">
                        <span class="fs-4 fw-600 header-text">Mails</span>
                    </div>
                    <div class="assigned-leads">
                        <div class="assigned-leads-header text-center" style="overflow-y: scroll; height: 550px;">
                            <span class="fw-600 fs-5 header-text">Mailbox</span>
                            @foreach($msgs as $msg)
                                {!!$msg['subject']!!}<br>
                                @if($msg['attachments'] != 0)
                                    {!!$msg['attachments']!!}
                                    <br>
                                @endif
                                {!!$msg['body']!!}
                                <hr class="hr">
                            @endforeach
                        </div>
                        <div class="assigned-leads-content">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                <div class="statistics-div">
                    <div class="statistics-header mx-4 py-3">
                            <span class="fs-4 fw-600 header-text">
                                Clients
                            </span>
                    </div>
                    <div class="statistics-content mx-4 overflow-div2">
                        @foreach($clientss as $client)
                            <div class="py-2 my-2" style="background-color: #4EC590; border-radius: 15px; color: #fff;">
                                <div class="mx-3 ">
                                    <div class="row">
                                        <div class="col">
                                            <span class="fw-bold fs-5">
                                                {{$client->first_name}} {{$client->last_name}}
                                            </span>
                                        </div>
                                        @php
                                            $leadss = $client->id * 1244;
                                            $clientId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
                                        @endphp
                                        <div class="col-2 text-end">
                                            <span>
                                                <a href="{{route('editclientdata',$clientId)}}" style="cursor: pointer">
                                                <svg id="Group_641" data-name="Group 641"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="15.505"
                                                     height="15.348" viewBox="0 0 15.505 15.348">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <rect id="Rectangle_241" data-name="Rectangle 241"
                                                                  width="15.505" height="15.348" fill="#fff"/>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Group_384" data-name="Group 384" transform="translate(0 0)"
                                                       clip-path="url(#clip-path)">
                                                        <path id="Path_266" data-name="Path 266"
                                                              d="M15.175,1.524a.528.528,0,0,1,0,.747l-1.1,1.105L11.954,1.26l1.1-1.105a.53.53,0,0,1,.748,0l1.369,1.369Zm-1.852,2.6L11.205,2.007,3.994,9.219a.534.534,0,0,0-.128.207l-.852,2.555a.265.265,0,0,0,.334.334L5.9,11.464a.52.52,0,0,0,.207-.127l7.211-7.212Z"
                                                              transform="translate(0.175 0)" fill="#fff"/>
                                                        <path id="Path_267" data-name="Path 267"
                                                              d="M0,13.731a1.588,1.588,0,0,0,1.588,1.588H13.231a1.588,1.588,0,0,0,1.588-1.588V7.38a.529.529,0,1,0-1.058,0v6.351a.529.529,0,0,1-.529.529H1.588a.529.529,0,0,1-.529-.529V2.088a.529.529,0,0,1,.529-.529h6.88A.529.529,0,0,0,8.468.5H1.588A1.588,1.588,0,0,0,0,2.088Z"
                                                              transform="translate(0 0.029)" fill="#fff"
                                                              fill-rule="evenodd"/>
                                                    </g>
                                                </svg>
                                            </a>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="">
                                        <span>
                                          Status: {{$client->status}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <nav role="navigation" aria-label="Pagination Navigation"
                                     class="flex items-center justify-between">
                                    @if($clientss->currentPage() > 1)
                                        <span> <a href="{{route('status',['page' => $clientss->currentPage() -1 ])}}"
                                                  class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"></span>
                                    @endif
                                    « Previous
                                    </span> <a href="{{route('status',['page' => $clientss->currentPage() +1])}}"
                                               class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                        Next »
                                    </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div><p class="text-sm text-gray-700 leading-5">

                                    </p></div>
                                <div></div>
                            </div>
                            </nav></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




{{--                       @foreach($clients as $client)--}}
{{--                           <div>--}}
{{--                               <tr>--}}
{{--                                   <td>{{$client->first_name}}</td>--}}
{{--                                   <td>{{$client->status}}</td>--}}
{{--                                   <td>--}}
{{--                                       <a class="btn btn-info" href="{{route('editclientdata',$client->id)}}">Edit</a>--}}
{{--                                   </td>--}}

{{--                               </tr>--}}
{{--                           </div>--}}
{{--                       @endforeach--}}

@endsection

<style>
    .statistics-div {
        background-color: #EFEFEF;
        border-radius: 35px;
        height: 97vh;

    }

    .statistics-content {
        height: 80vh !important;
        overflow-y: scroll;
    }

    .leads-div {
        background-color: #EFEFEF;
        border-radius: 35px;
    }

    .info-content {
        background-color: #fff;
        border-radius: 22px;
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

    .header-text {
        color: #525353;
    }

    /* overflow 1 */
    .overflow-div2::-webkit-scrollbar {
        width: 7px !important;
    }

    /* Track */
    .overflow-div2::-webkit-scrollbar-track {
        background: transparent !important;
        border-radius: 10px !important;
    }

    /* Handle */
    .overflow-div2::-webkit-scrollbar-thumb {
        background: #ababac !important;
        border-radius: 10px !important;
    }

    /* Handle on hover */
    .overflow-div2::-webkit-scrollbar-thumb:hover {
        background: #707070 !important;
        border-radius: 10px !important;
    }

    body {
        overflow-x: hidden !important;
    }
</style>
<style>
    /*Per Notification */
    .coloriii a{
        color: black !important;
    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>

@endif
