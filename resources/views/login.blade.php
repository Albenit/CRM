<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{config('app.name')}}</title>
    <style>
    <title>Anmelden</title>
    </style>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>
<body>
<div class="container-fluid col-12 col-sm-10 g-0" id="app">
    @if(Illuminate\Support\Facades\Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <strong>{!! Illuminate\Support\Facades\Session::get('msg') !!}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Illuminate\Support\Facades\Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <strong>{!! Illuminate\Support\Facades\Session::get('fail') !!}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<section class="section_">
    <div class="my-auto py-5 px-4 px-sm-5 div_">
        <div class="">
            <form action="{{route('trylogin')}}" method="post" class="form1">
                @csrf
                <div class="text-start my-3">
                    <div class="">
              <span class="" id="span_hello_" style="font-family: 'Montserrat' !important;color:#2F60DC;font-weight: 600;font-size: 24px">
                Hallo!
              </span>
                    </div>
                    <div class="">
              <span class="" id="span_meldedich_" style="font-family: 'Montserrat' !important;color: #3F4852;font-weight: 400;font-size: 18px">
                Melde dich an
              </span>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="row g-0 loginForms ps-2">
                        <div class="col-auto my-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E7EEF4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div class="col">
                            <input type="text" id="typeEmailX-2" name="email"
                            style="font-family: 'Montserrat' !important;border: none !important;"
                            class="form-control py-2 ps-2 form-control-sm loginForms" placeholder="Username"/>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="mb-2">
                    <div class="row g-0 loginForms px-2">
                        <div class="col-auto my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E7EEF4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        </div>
                        <div class="col">
                        <input type="password" id="typePasswordX-2" name="password"
                           style="font-family: 'Montserrat' !important;border: none !important;"
                           class="form-control form-control-sm loginForms ps-2 py-2" placeholder="Password"/>
                        </div>
                        <div class="col-auto my-auto">
                            <i onclick="showpw();return false;" style="cursor:pointer;" id="show">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12ZM17.7366 6.04606C19.4439 7.36485 20.8976 9.29455 21.9415 11.7091C22.0195 11.8933 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8933 2.05854 11.7091C4.14634 6.88 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM12.0012 14.4124C13.3378 14.4124 14.4304 13.3264 14.4304 11.9979C14.4304 10.6597 13.3378 9.57362 12.0012 9.57362C11.8841 9.57362 11.767 9.58332 11.6597 9.60272C11.6207 10.6694 10.7426 11.5227 9.65971 11.5227H9.61093C9.58166 11.6779 9.56215 11.833 9.56215 11.9979C9.56215 13.3264 10.6548 14.4124 12.0012 14.4124Z" fill="#0F597E"/>
                                </g>
                                </svg>

                            </i>
                        </div>
                    </div>
                    
            </span>
                </div>
                @if(Illuminate\Support\Facades\Session::has('message'))
                    <div class="text-center">
                        <span style="color: red; font-size: 14px;">**{!! Illuminate\Support\Facades\Session::get('message') !!}!</span>
                    </div>
                @endif
                <div class="text-end">
                    <span onclick="window.location.href='{{route('forgot_password_blade')}}'" class="forgot__"
                        style="font-family: 'Montserrat' !important; font-weight: 600;cursor: pointer;color: #A8BCF0 !important;font-size: 14px">
                    Passwort vergessen?
                    </span>
                </div>
                <div class="pt-4 pb-3">
                    <button type="submit" class="py-2 w-100 border-0 fw-bold loginBtn"
                            style="font-family: 'Montserrat' !important;">
                        Anmelden
                    </button>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                           style="border: 1px solid rgba(0,0,0,.25) !important;" id="remember" name="remember">
                    <label class="form-check-label" for="remember" style="font-family: 'Montserrat' !important;font-size: 14px;margin-left: -3px;color: #434343">Angemeldet
                        bleiben</label>
                </div>
                
            </form>
        </div>
    </div>
</section>

<script type="text/javascript">
    var cnt = 1;

    function showpw() {
        if (cnt % 2 == 1) {
            document.getElementsByName("password")[0].setAttribute('type', 'text');
        } else {
            document.getElementsByName("password")[0].setAttribute('type', 'password');
        }
        cnt++;
    }
</script>
</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
    }

</style>


<style>
    .div_ {
            width: 400px;
        }
    .form-check-input {
        width: 0.9em;
        height: 0.9em;
        margin-top: 0.17em;
        padding-right: 1px !important;
    }
    
    .loginBtn {
        background: #2F60DC;
        border-radius: 8px;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 16px;
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
            box-shadow: none;
            width: 100%;
        }
    }
</style>
