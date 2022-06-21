@if(Auth::guard('admins')->user()->hasRole('backoffice') || Auth::guard('admins')->user()->hasRole('admin'))
@extends('template.navbar')
@section('content')
    <title>Mandant Bearbeiten</title>
    <div class="" style="margin-top: 20vh">

    <div class="test col-11 col-sm-11 col-md-9 col-lg-6 mx-auto my-3" >
        <div class="pt-3">
            <span class="fs-4 fw-600 ps-4">
                Mandant Bearbeiten
             </span>
        </div>
        @php
            $leadss = $client->id * 1244;
            $clientId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
        @endphp
        <form class="py-4 px-4" method="post" action="{{route('editclientform',$clientId)}}">
            @csrf
            <div class="py-2">
                <input class="form-control" type="text" name="first_name" value="{{$client->first_name}}">
            </div>
            <div class="py-2">
                <input class="form-control" type="text" name="last_name" value="{{$client->last_name}}">
            </div>
            <div class="py-2">
                <input class="form-control" type="date" name="birthdate" value="{{$client->birthdate}}">
            </div>
            <div class="py-2">
                <select class="form-control" name="status">
                    @if($client->status == 'Open')
                        <option>{{$client->status}}</option>
                        <option>Eingereicht</option>
                        <option>Getan</option>
                    @endif
                    @if($client->status == 'Done')
                        <option>{{$client->status}}</option>
                        <option>Eingereicht</option>
                        <option>Getan</option>
                    @endif
                    @if($client->status == 'Submited')
                        <option>{{$client->status}}</option>
                        <option>Eingereicht</option>
                        <option>Getan</option>
                    @endif
                </select>
            </div>
            <div class="text-center">
                    <input type="submit" value="Speichern" class="btn btn-secondary px-4 mt-3">
            </div>
        </form>
    </div>
    </div>
@endsection
<style>
    .test {
        background-color: #f8f8f8;
        border-radius: 25px !important;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
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
