<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{config('app.name')}}</title>
    <style>
        .div_{
            width: 400px ;
        }
    </style>
    <title>Forgot Password</title>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>

<body>
<div class="section_">
    <div class="my-auto py-5 px-4 px-md-5 mx-0 mx-sm-0 div_">
        <div class="">
            <form action="{{route('forgot_password')}}" method="post" class="form1 mb-0">
                @csrf
                <div class="text-center mb-3">
                    <span class="" id="span_meldedich_" style="font-family: 'Montserrat' !important;color: #3F4852;font-size: 18px">
                        Passwort vergessen
                    </span>
                </div>
                @if(Illuminate\Support\Facades\Session::has('message'))
                    <div class="text-center">
                        <span  style="color: red; font-size: 14px;">**{!! Illuminate\Support\Facades\Session::get('message') !!}!</span>
                    </div>
                @endif
                <div class="input-group mb-3 loginForms ps-2">
                    <i class="my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E7EEF4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </i>
                    <input placeholder="Email" type="email" id="typeEmailX-2" name="email" style="font-family: 'Montserrat' !important;border-bottom: none !important;border: none !important;" class="form-control py-2 loginForms form-control-sm border-0" />
                    
                </div>
                <div class="pt-2">
                    <button type="submit" class="py-2 w-100 border-0" style="font-family: 'Montserrat' !important;background: #2F60DC;border-radius: 8px;color: #fff;font-weight: 600">
                        Senden
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>


<style>
    .section_ {
        align-items: center;
    }
    .loginForms {
        background: #FFFFFF !important;
        border: 1px solid #E7EEF4 !important;
        border-radius: 8px !important;
    }
    .loginForms::placeholder {
        color: #94A2AB;
        font-weight: 400;
    }
    body {
        padding: 0 !important;
    }
    @media (max-width: 575.98px) {
        .div_ {
            box-shadow:none;
        }
        .div_{
            width: 100% ;
        }
    }
</style>
