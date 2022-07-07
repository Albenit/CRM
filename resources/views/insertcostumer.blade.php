@extends('template.navbar')
@section('content')
        <title>Termin Einfügen</title>
    <section>
        <div class="">
            <div class="form-div my-5 py-4 mx-3 mx-sm-5" style="background: #F9FAFC;
                    box-shadow: 0px 4px 4px rgba(213, 213, 213, 0.25);
                    border-radius: 13px;">
                <form action="{{route('savecostumer')}}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="cnt" id="cnt">
                    <div class="row mx-0 mx-md-3 GrundversicherungSpans">
                    <div class="col" >
                        <div class="mx-2">
                            <div class="row gy-0 mx-0 px-0 gx-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Vorname</label>
                                        <input type="text" name="fname[]" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Nachname</label>
                                        <input type="text" name="lname[]" class="form-control GrundversicherungInput" required>
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
                                        <input type="date" name="birthdate[]" class="form-control GrundversicherungInput" required>
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
                                        <label for="" class="mb-1">Strasse</label>
                                        <input type="text" name="address" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">PLZ</label>
                                        <input type="number" name="postal_code" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Ort</label>
                                        <input type="text" name="city" class="form-control GrundversicherungInput" required>
                                    </div>
                                </div>
                                <div id="addid">
                                    
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="mb-1">Berater</label>
                                        <select name="berater" class="form-control" required>
                                            @foreach($admins as $admin)
                                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="my-4 mx-3">
                                    <button class="py-2 px-5 w-100 border-0 fw-bold"
                                        style="background: #2F60DC;border-radius: 5px;color: #fff;">Kunde erstellen</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="pt-4" style="cursor: pointer;" onclick="insertanother()">
                        <div class="row g-0 justify-content-center pt-3 pt-md-0">
                            <div class="col-auto my-auto">
                            <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.4961 35.0005C8.84807 35.0005 0.996094 27.1485 0.996094 17.5005C0.996094 7.85246 8.84807 0.000488281 18.4961 0.000488281C28.1441 0.000488281 35.9961 7.85246 35.9961 17.5005C35.9961 27.1485 28.1441 35.0005 18.4961 35.0005Z" fill="#5288F5"/>
                                <path d="M26.0549 19.0005H11.9373C11.4171 19.0005 10.9961 18.5531 10.9961 18.0005C10.9961 17.4479 11.4171 17.0005 11.9373 17.0005H26.0549C26.575 17.0005 26.9961 17.4479 26.9961 18.0005C26.9961 18.5531 26.575 19.0005 26.0549 19.0005Z" fill="white"/>
                                <path d="M18.9961 26.0005C18.4435 26.0005 17.9961 25.5794 17.9961 25.0593V18.0005V10.9417C17.9961 10.4215 18.4435 10.0005 18.9961 10.0005C19.5487 10.0005 19.9961 10.4215 19.9961 10.9417V25.0593C19.9961 25.5794 19.5487 26.0005 18.9961 26.0005Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="col-auto my-auto ps-2">
                                    <div>
                                        <span class="text-dark">Neue</span>
                                    </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </section>

@endsection
<script>

    document.getElementById('addid').innerHTML =+ '<div class="row gy-0 mx-0 px-0 gx-3">';
    function insertanother(){
        document.getElementById('cnt').value = parseInt(document.getElementById('cnt').value) +1
        
        document.getElementById('addid').innerHTML +=  
                        '<div class="">'+
                                '<div class="col-12">' + 
                                        '<label for="" class="mb-1">Vorname</label>' + 
                                        '<input type="text" name="fname[]" class="form-control GrundversicherungInput" required>' + 
                                    '</div>' + 
                                '</div>' + 
                                '<div class="col-12">' + 
                                    '<div class="mb-2">' + 
                                        '<label for="" class="mb-1">Nachname</label>' + 
                                        '<input type="text" name="lname[]" class="form-control GrundversicherungInput" required>' + 
                                    '</div>' + 
                                '</div>' + 
                                '<div class="col-12">' + 
                                   '<div class="mb-2">' + 
                                        '<label for="" class="mb-1">Geburtstag</label>' + 
                                        '<input type="date" name="birthdate[]" class="form-control GrundversicherungInput" >' + 
                                    '</div>' + 
                                '</div>'+
                            '<hr>';
     
    }

    </script>
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

