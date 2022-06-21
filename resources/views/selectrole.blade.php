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
            width: 400px !important;
        }
    </style>
    <title>Role</title>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>
<body>
<section class="section_">
    <div class="my-auto px-4 px-sm-5 py-5 div_">
        <div class="">
            <form action="{{route('loginas')}}" method="post" class="form1 mb-0">
                @csrf
                <div class="text-start mb-3">
                    <div class="">
              <span class="lh-1 text-center fs-5" id="span_hello_" style="font-family: 'Montserrat' !important;font-weight: 600;font-size: 24px;color: #434343">
                Rolle auswählen
              </span>
                    </div>
                </div>
<select name="role" class="form-select" style="background-color: #FFFFFF !important;
border: 1px solid #E7EEF4 !important;
border-radius: 8px !important;">
    @foreach($roles as $role)
        @if($role == 'fs')
        <option value="{{$role}}">Aussendienst</option>
        @elseif($role == 'salesmanager')
            <option value="{{$role}}">Verkaufsleiter</option>
        @elseif($role == 'backoffice')
            <option value="{{$role}}">Innendienst</option>
        @elseif($role == 'finance')
            <option value="{{$role}}">Finanzen</option>
        @elseif($role == 'digital')
            <option value="{{$role}}">Digital</option>
        @else
            <option value="{{$role}}">{{ucfirst($role)}}</option>
        @endif
            @endforeach
</select>
                <div class="pt-3">
                    <button type="submit" class="py-2 w-100 border-0" style="font-family: 'Montserrat' !important;background: #2F60DC;border-radius: 8px;color: #fff; font-weight: 600">
                        Anmelden
                    </button>
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
    body {
        padding: 0 !important;
    }
    @media (max-width: 575.98px) {
        .div_ {
            box-shadow:none;
        }
    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}
</style>