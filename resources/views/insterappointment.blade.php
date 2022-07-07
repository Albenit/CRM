@extends('template.navbar')
@section('content')
        <title>Termin Einfügen</title>
    <section>
        <div class="">
        @if($errors->any())
        <div class="text-center">
            {!! implode('<br />', $errors->all(':message')) !!}
        </div>
    @endif
            @php $user = auth()->user()->getRoleNames()->toArray(); @endphp
            <div class="form-div my-5 py-4 mx-3 mx-sm-5" style="background: #F9FAFC;
                    box-shadow: 0px 4px 4px rgba(213, 213, 213, 0.25);
                    border-radius: 13px;
">
                <form action="{{route('addappointment')}}" method="post">
                    @csrf
                <div class="row mx-0 mx-md-3 GrundversicherungSpans">
                    <div class="col">
                        <div class="mx-2">
                            <div class="row gy-0 mx-0 px-0 gx-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                    @if(in_array('fs',$user) || in_array('callagent',$user))
                                    <label for="" class="mb-1">Agent</label>
                                    <input type="text"  class="form-control GrundversicherungInput" value="" disabled name="agent">
                                    @else
                                        <label for="" class="mb-1">Agent</label>
                                        <input type="text"  class="form-control GrundversicherungInput" value="" name="agent">
                                    @endif
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            @if(in_array('fs',$user) || in_array('callagent',$user))
                                                <label for="" class="mb-1">Qualität</label>
                                                <input type="text" class="form-control GrundversicherungInput" value="" disabled name="berater" >
                                            @else
                                                <label for="" class="mb-1">Qualität</label>
                                                <input type="text" class="form-control GrundversicherungInput" value="" name="berater" >
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Vorname</label>
                                        <input type="text" name="fname" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Nachname</label>
                                        <input type="text" name="lname" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Nationalität</label>
                                        <input type="text" name="country" class="form-control GrundversicherungInput" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Geburstag</label>
                                        <input type="date" name="birthdate" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Strasse</label>
                                        <input type="text" name="address" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Nr</label>
                                        <input type="text" name="nr" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                            <label for="" class="mb-1">PLZ</label>
                                            <input type="number" name="postal" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Ort</label>
                                        <input type="text" name="location" class="form-control GrundversicherungInput" required>
                                    </div> 
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Sprache</label>
                                        <input type="text" name="sprache" class="form-control GrundversicherungInput" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Telefon</label>
                                        <input type="number" name="phone" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Personen</label>
                                        <input type="number" name="count" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">aktuelle Krankenkasse</label>
                                        <input type="text" name="zufriedenheit" class="form-control GrundversicherungInput" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Datum</label>
                                        <input type="date" placeholder="dd-mm-yyyy" class="form-control GrundversicherungInput" name="appdate" required>
                                    </div>

                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Zeit</label>
                                        <!-- <input type='time' min="01:30" max="19:30" class="form-control GrundversicherungInput" name="apptime"> -->
                                        <select name="apptime" required
                                            id="hours" class="form-select GrundversicherungInput" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label mb-1">Bemerkung</label>
                                        <textarea class="form-control GrundversicherungInput" name="bemerkung" id="exampleFormControlTextarea1" rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        @if(Auth::guard('admins')->user()->hasRole('fs') || in_array('callagent',$user))
                                            <label hidden for="" class="mb-1">Zuweisen</label>
                                            @if(in_array('fs',$user) || in_array('callagent',$user))
                                                <select hidden name="admin" class="form-control GrundversicherungInput" disabled>
                                                    <option value="{{$admins->id}}">{{ucfirst($admins->name)}}</option>
                                                </select>
                                            @else
                                                <select name="admin" class="form-control GrundversicherungInput">
                                                    <option value="{{$admins->id}}">{{ucfirst($admins->name)}}</option>
                                                </select>
                                            @endif
                                        @elseif(Auth::user()->hasRole('salesmanager'))

                                        @else
                                            <label for="" class="mb-1">Besprechungsformular</label>
                                            <select onchange="hideadmin()" name="online" id="selecti" class="form-select" style="border: 1px solid #EDEDED !important;border-radius:11px !important;">
                                                <option value="no">Physisch</option>
                                                <option value="yes">Online</option>
                                            </select>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div id="admin col-6">
                                        <label for="admin" class="mb-1">Zuweisen</label>
                                        <br>
                                        <select name="admin" class="form-select" style="border: 1px solid #EDEDED !important;border-radius:11px !important;">
                                            @foreach($admins as $admin)
                                                @if(!$admin->hasRole('digital'))

                                                @if ($admin->admin_id == null)
                                                    <option value="{{$admin->id}}">{{ucfirst($admin->personaldata->name)}} {{ucfirst($admin->personaldata->prename)}}</option>
                                                @else
                                                    <option value="{{$admin->id}}">{{ucfirst($admin->headadmin->personaldata->name)}} {{ucfirst($admin->headadmin->personaldata->prename)}}</option>
                                                @endif
                                                    
                                                @endif
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="my-4 mx-3">
                                    <button class="py-2 px-5 w-100 border-0 fw-bold"
                                        style="background: #2F60DC;border-radius: 5px;color: #fff;">Termin erstellen</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                </form>
            </div>
        </div>
    </section>

        <section>
            @if(!auth()->user()->hasRole('callagent') && !auth()->user()->hasRole('fs') )
            <div class="">
                <div class="form-div my-5 py-4 mx-3  mx-sm-5" style="background: #F9FAFC;
                    box-shadow: 0px 4px 4px rgba(213, 213, 213, 0.25);
                    border-radius: 13px;">
                    <div class="mb-4 mx-4">
                        <span class="fs-5 fw-600">Oder per Datei hochladen</span>
                    </div>
                    <form method="post" action="{{route('addappointmentfile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-0 px-4">
                                            <div class="col-12 col-md pb-2 pb-lg-0 pe-0 pe-lg-2">
                                                <label for="file" class="leadsCustomFileInput form-control">
                                                    <div class="row g-0">
                                                        <div class="col my-auto ps-2">
                                                            <span style="color: #cbcbcb !important;font-weight:400" id="afterUploadTextKunden">keine Datei ausgewählt</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="leadOffnenBtnStyle w-100 py-1 px-2 px-md-4 leadOffnenBtnStyle2">Datei auswählen</div>
                                                        </div>
                                                    </div>
                                                    <input onchange="changeUploadText()" class="d-none" type="file" name="file" id="file">
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
                                            <div class="col-12 col-lg-auto my-auto">
                                                <input class="leadOffnenBtnStyle w-100 py-1 px-4" type="submit" class="mt-2 btn py-2" value="Hochladen">

                                            </div>
                                        </div>
                    </form>
                    {{-- <div onclick="openExamplePic()">
                        <span class="btn fw-600 mx-5" style="border: 1px solid #434343;border-radius: 5px">Beispiel</span>
                    </div>
                    <br>
                    <div style="display: none" class="w-100" id="picture">
                        <img src="exceExample.png" alt="pic" class="img-fluid">
                    </div> --}}
                </div>
            </div>
            @endif
        </section>






        <script>

function createOption(value, text) {
    var option = document.createElement('option');
    if(value.charAt(0) == '1' || value.charAt(0) == '2'){
        option.text = text;
    option.value = value;
    }else{
    option.text = "0" + text;
    option.value = "0" + value;
}
return option;
}
var z;
var hourSelect = document.getElementById('hours');

for(var i = 8; i <= 19; i++){
    for(var j = 0; j < 60; j += 15) {
        if (j == 0){
            z = i + ':' + j + '0'
        }
        else {
            z = i + ':' + j 
        }
        hourSelect.add(createOption(z, z));
    }
}
    


</script>
    <script type="text/javascript">
        function openExamplePic() {
            var x = document.getElementById('picture');
            if (x.style.display == 'none') {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function hideadmin() {
            var x = document.getElementById('selecti').value;
            if (x == "no") {
                document.getElementById('admin').style.display = "inline";
            } else {
                document.getElementById('admin').style.display = "none";
            }
        }
    </script>
@endsection
<style>
    body {
        overflow-x: hidden;
    }
    .GrundversicherungInput {
        background: #FFFFFF !important;
        border: 1px solid #f3f3f3 !important;

        box-sizing: border-box;
        border-radius: 8px !important;
    }
    .GrundversicherungInput:disabled {
        background-color: #F0F2F4 !important;  
    }
    .GrundversicherungSpans label, span, div  {
        font-weight: 600;
        color: rgba(29, 35, 70, 0.72);
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

