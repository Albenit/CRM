@extends('template.navbar')
@section('content')
    @if($errors->any())
        <div class="text-center">
            {!! implode('<br />', $errors->all(':message')) !!}
        </div>
    @endif
    <title>Zugewiesen Lead</title>

    <section>
        <div class="container">
            <div class="form-div mt-3 mb-5 py-4 mx-3 mx-sm-5" style="background: rgb(249, 250, 252); box-shadow: rgba(213, 213, 213, 0.25) 0px 4px 4px; border-radius: 13px;">
                <form action="{{route('asignlead',$lead->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="countt" id="countt">
                    <div class="row g-2 mx-4">
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                    <label for="" class="mb-1">Agent</label>
                                    <input type="text"  class="form-control GrundversicherungInput" value="{{$lead->agent}}" name="agent" >
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Qualität</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$admin->name}}" name="berater" >
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Vorname</label>
                                    <input type="text" name="name" class="form-control GrundversicherungInput" value="{{$lead->first_name}}" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Nachname</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$lead->last_name}}" name="lname" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Strasse</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$lead->address}}" name="address" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Nr</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="" name="nr" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Ort</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$lead->city}}" name="ort" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">PLZ</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$lead->postal_code}}" name="postal" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Nationalitat</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="{{$lead->nationality}}" name="nationality">
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Sprache</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="" name="sprache">
                                </div>  
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Datum</label>
                                    <input type="date" class="form-control GrundversicherungInput" name="appointmentdate" min="1900-01-01" max="9999-12-31" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                    <label for="" class="mb-1">Zeit</label>
                                    <!-- <input class="form-control GrundversicherungInput" type="time" name="apptime"> -->
                                    <select required id="hours" name="apptime" class="form-select GrundversicherungInput" required>
                                            </select>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                    <label for="" class="mb-1">Tel. Privat</label>
                                    <input type="text" class="form-control GrundversicherungInput" name="telephone" value="{{$lead->telephone}}" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-2">
                                    <label for="" class="mb-1">Personen</label>
                                    <input type="number" class="form-control GrundversicherungInput" value="{{$lead->number_of_persons}}" name="personen" required>
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                    <label for="" class="mb-1">Zufriedenheit</label>
                                    <input type="text" class="form-control GrundversicherungInput" value="" name="zufriedenheit">
                                </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                    <label for="exampleFormControlTextarea1" class="form-label">Bemerkung</label>
                                    <textarea class="form-control GrundversicherungInput" id="exampleFormControlTextarea1" rows="3" name="bemerkung"></textarea>
                                </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-5 col-xl-4">
                        <div class="my-4 mx-4 px-1">
                                <button class="py-2 px-5 w-100 border-0 fw-bold"
                                    style="background: #2F60DC;border-radius: 8px;color: #fff;">Annehmen
                                </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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

for(var i = 8; i <= 18; i++){
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

@endsection

<style>
    /*Per Notification */
    .coloriii a{
        color: black !important;
    }
    .GrundversicherungInput {
        background: #FFFFFF !important;
        border: 1px solid #f3f3f3 !important;

        box-sizing: border-box;
        border-radius: 8px !important;
    }
    .GrundversicherungSpans label, span, div  {
        font-weight: 600;
        color: rgba(29, 35, 70, 0.72) !important;
    }
</style>
