@extends('template.navbar')
@section('content')
    @if(Auth::guard('admins')->user()->hasRole('admin'))
        @if($errors->any())
            <div class="text-center">
                {!! implode('<br />', $errors->all(':message')) !!}
            </div>
        @endif
        <title>Einstellungen</title>
        <section class="p-4 p-md-5">
            <div class="row gx-0 gx-md-3">
                <div class="col-12 col-sm-12 col-md-6 ">
                    <div class="p-4 p-sm-5 boxShadowMob">
                        <form class="form1" method="post" action="{{route('registernewuser')}}" onsubmit ="return verifyPassword()">
                            @csrf
                            <div class="text-center">
                                <div class="">
                                    <span class="fs-5" style="color: #313131;font-weight: 700">
                                        Registrieren
                                    </span>
                                </div>
                            </div>
                            <input name="addedroles" id="addedroles" style="display:none" type="number" value="0">
                            <br>
                            <div class="input-group mb-3">
                                <input placeholder="Vorname" autocomplete="off" type="text" name="user_name" class="form-control py-2"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <input placeholder="Email" autocomplete="off" type="text" name="user_email" class="form-control py-2"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <input placeholder="Telefonnummer" autocomplete="off" type="number" name="phone_number" class="form-control py-2"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <span id = "message" style="color:red"> </span>
                            <div class="input-group mb-3">
                                <input placeholder="Passwort" type="password" name="user_password" class="form-control py-2"
                                    aria-describedby="basic-addon1"  id = "pswd" autocomplete="off" required>
                            </div>
                            <div class="input-group mb-3">
                                <input placeholder=" Retype Passwort" type="password" name="retype_password" class="form-control py-2"
                                    aria-describedby="basic-addon1" id="password" autocomplete="off" required>
                            </div>
                            <div class="mb-3" id="roles">
                                <select name="role_name" class="form-select py-2 w-100">
                                    @foreach($roles as $role)
                                            
                                        @if ($role->name == 'admin')
                                            <option value="{{$role->name}}">Admin</option>
                                        @elseif($role->name == 'fs')
                                            <option value="{{$role->name}}">Aussendienst</option>
                                        @elseif($role->name == 'salesmanager')
                                            <option value="{{$role->name}}">Verkaufsleiter</option>
                                        @elseif($role->name == 'backoffice')
                                            <option value="{{$role->name}}">Innendienst</option>
                                        @elseif($role->name == 'finance')
                                            <option value="{{$role->name}}">Finanzen</option>
                                        @elseif ($role->name == 'callagent')
                                            <option value="{{$role->name}}">Call Agent</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="roles" onclick="addanother()">
                                <div name="role_name" class="form-select addAnotherDiv py-2 w-100">
                                    Weitere Rolle zuweisen
                                </div>
                            </div>

                            <div class="row g-0 justify-content-center">
                                <div class="pt-2 col-12">
                                    <input type="submit" class="py-2 w-100 border-0 fw-bold" value="Registrieren">
                                </div>
                            </div>

                        </form>
                            
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6  ">
                    <div class="p-4 p-sm-5 boxShadowMob">
                        <form class="form1" method="post" action="{{route('addrole')}}" onsubmit ="return verifyPassword()">
                            @csrf
                            <input name="addedroles2" id="addedroles2" style="display:none" type="number" value="0">
                            <div class="text-center">
                                <div class="">
                                    <span class="fs-5" style="color: #313131;font-weight: 700">
                                        Rolle aktualisieren
                                    </span>
                                </div>
                            </div>
                            <input name="addedroles" id="addedroles" style="display:none" type="number" value="0">
                            <br>
                            <span id = "message" style="color:red"> </span>
                        
                            <div class="input-group mb-3">
                                <select class="form-control py-2"
                                    name="admin">
                                    <option disabled selected>Berater</option> 
                                    @foreach($admins as $admin)
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="roless">
                                <select name="role_name" class="form-select py-2 w-100">
                                       
                                    @foreach($roles as $role)
                                        @if ($role->name == 'admin')
                                            <option value="{{$role->name}}">Admin</option>
                                        @elseif($role->name == 'fs')
                                            <option value="{{$role->name}}">Aussendienst</option>
                                        @elseif($role->name == 'salesmanager')
                                            <option value="{{$role->name}}">Verkaufsleiter</option>
                                        @elseif($role->name == 'backoffice')
                                            <option value="{{$role->name}}">Innendienst</option>
                                        @elseif($role->name == 'finance')
                                            <option value="{{$role->name}}">Finanzen</option>
                                        @elseif ($role->name == 'callagent')
                                            <option value="{{$role->name}}">Call Agent</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="roles2" onclick="addanother2()">
                                <div name="role_name" class="form-select addAnotherDiv py-2 w-100">
                                    Weitere Rolle zuweisen
                                </div>
                            </div>

                            <div class="row g-0 justify-content-center">
                                <div class="pt-2 col-12">
                                    <input type="submit" class="py-2 w-100 border-0 fw-bold" value="Aktualisieren">
                                </div>
                            </div>

                        </form>
                            
                    </div>
                </div>
            </div>
        </section>
    @else
        <section style="display:flex; flex-direction: column; justify-content: center; width: 100%;height: 100%; align-items: center">
            <div class="col-11 col-sm-11 col-md-9 col-lg-9 col-xl-6 my-auto px-4 pb-4 px-sm-5 pb-sm-5 pt-3 pt-sm-4 boxShadowMob">
                <div class="">
                    <form class="form1 mb-0" method="post" action="{{route('changePassword')}}" onsubmit ="return verifyPasswordChange()">
                        @csrf
                        <div class="text-center">
                            <div class="pb-3">
                                <span class="fs-5" style="color: #313131;font-weight: 700">
                                    Passwort ändern
                                </span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input placeholder="Aktuelles Passwort" type="password" name="current_password" class="form-control py-2"
                                aria-describedby="basic-addon1"  id="current_password" autocomplete="off">      
                        </div>
                        <span id="curr_msg" style="color:red"> </span>
                        <div class="input-group mb-3">
                            <input placeholder="Neues Passwort" type="password" name="new_password" class="form-control py-2"
                                aria-describedby="basic-addon1"  id="new_password" autocomplete="off">
                        </div>
                        <span id="nue_msg" style="color:red"> </span>
                        <div class="input-group mb-3">
                            <input placeholder="Passwort erneut eingeben" type="password" name="retype_password" class="form-control py-2"
                                aria-describedby="basic-addon1" id="retype_password" autocomplete="off">
                        </div>
                        <span id="message" style="color:red"> </span>
                        <div class="row g-0 justify-content-center">
                            <div class="pt-2 col-12">
                                <input type="submit" class="py-2 w-100 border-0 fw-bold" value="Ändern" style="border-radius: 8px !important">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    @endif


    @endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <script>
            var cnt = 1;
            var cnt2 = 1;
            function addanother(){

               var x = document.getElementById('roles');
               $("#roles").append("<select class='form-select py-2 w-100 mt-3' name='role_name" + cnt + "' id='" + cnt + "'>");
               @foreach($roles as $role)
                document.getElementById(cnt.toString()).innerHTML +=
                            '@if ($role->name == "admin")'+
                            '<option value="{{$role->name}}">Admin</option>'+
                            '@elseif($role->name == "fs")'+
                                '<option value="{{$role->name}}">Aussendienst</option>'+
                            '@elseif($role->name == "salesmanager")'+
                                '<option value="{{$role->name}}">Verkaufsleiter</option>'+
                            '@elseif($role->name == "backoffice")'+
                                '<option value="{{$role->name}}">Innendienst</option>'+
                            '@elseif($role->name == "finance")'+
                                '<option value="{{$role->name}}">Finanzen</option>'+
                            '@elseif ($role->name == "callagent")'+
                                '<option value="{{$role->name}}">Call Agent</option>'+
                            '@endif';
                @endforeach
                    document.getElementById('addedroles').value = cnt;
                cnt++;
            }
            function addanother2(){

var x = document.getElementById('roles2');
$("#roless").append("<select class='form-select py-2 w-100 mt-3' name='role_name" + cnt2 + "' id='" + cnt2 + "c'>");
@foreach($roles as $role)
 document.getElementById(cnt2.toString() + 'c').innerHTML +=
             '@if ($role->name == "admin")'+
             '<option value="{{$role->name}}">Admin</option>'+
             '@elseif($role->name == "fs")'+
                 '<option value="{{$role->name}}">Aussendienst</option>'+
             '@elseif($role->name == "salesmanager")'+
                 '<option value="{{$role->name}}">Verkaufsleiter</option>'+
             '@elseif($role->name == "backoffice")'+
                 '<option value="{{$role->name}}">Innendienst</option>'+
             '@elseif($role->name == "finance")'+
                 '<option value="{{$role->name}}">Finanzen</option>'+
             '@elseif ($role->name == "callagent")'+
                 '<option value="{{$role->name}}">Call Agent</option>'+
             '@endif';
 @endforeach
     document.getElementById('addedroles2').value = cnt2;
 cnt2++;
}


        </script>


<script>
    function verifyPasswordChange() {
        var cw = document.getElementById('current_password').value
        var pw = document.getElementById("new_password").value;
        var pw2 = document.getElementById("retype_password").value;
        //check empty password field
        if(cw == "") {
            document.getElementById("curr_msg").innerHTML = "**Geben Sie bitte das Jetziges Passwort ein!";
            return false;
        }
        if(pw == "") {
            document.getElementById("nue_msg").innerHTML = "**Geben Sie bitte das Nue Passwort ein!";
            return false;
        }

        if(pw.length < 8) {
            document.getElementById("message").innerHTML = "**Die Passwortlänge muss mindestens 8 Zeichen betragen";
            return false;
        }
        if(pw.length > 15) {
            document.getElementById("message").innerHTML = "**Die Passwortlänge darf 15 Zeichen nicht überschreiten";
            return false;
        }
        if(pw != pw2){
            document.getElementById("message").innerHTML = "**Passwort stimmt nicht überein";
            return false;
        }
    }

    function verifyPassword() {
        var pw = document.getElementById("pswd").value;
        var pw2 = document.getElementById("password").value;
        if(pw == "") {
            document.getElementById("message").innerHTML = "**Geben Sie bitte das Passwort ein!";
            return false;
        }
        if(pw.length < 8) {
            document.getElementById("message").innerHTML = "**Die Passwortlänge muss mindestens 8 Zeichen betragen";
            return false;
        }
        if(pw.length > 15) {
            document.getElementById("message").innerHTML = "**Die Passwortlänge darf 15 Zeichen nicht überschreiten";
            return false;
        }
        if(pw != pw2){
            document.getElementById("message").innerHTML = "**Passwort stimmt nicht überein";
            return false;
        }
    }

</script>
<style>
    .form1 input {
        background: #FFFFFF !important;
        border: 1px solid #E5EBF9 !important;
        box-shadow: 0px 4px 4px rgba(238, 238, 238, 0.25) !important;
        border-radius: 11px !important;
    }
    .form1 input::placeholder {
        font-weight: 400 !important;
        color: #94A2AB !important;
    }
    .form1 input[type="submit"] {
        background: #2F60DC !important;
        border-radius: 5px !important;
        color: #fff !important;
    }

    .form1 select {
        background-color: #FFFFFF !important;
        border: 1px solid #E5EBF9 !important;
        border-radius: 11px !important;
    }
    .form1 select {
        font-weight: 400 !important;
        color: #757373 !important;
    }
    .addAnotherDiv {
        background-color: #FFFFFF !important;
        border: 1px solid #E5EBF9 !important;
        border-radius: 11px !important;
        color: #94A2AB !important;
    }
    .boxShadowMob {
            background: #F9FAFC;
            box-shadow: 0px 4px 4px rgba(213, 213, 213, 0.25);
            border-radius: 13px;
        }
    @media (max-width: 575.98px) {

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


