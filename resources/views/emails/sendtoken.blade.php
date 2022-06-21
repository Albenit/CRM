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
    <link rel="icon" type="image/png" href="{{config('app.url')}}imgs/Favicon.png">
</head>

<body>
<section class="section_">
    <div class="my-auto p-5 div_">
        <div class="">
                <div class="pt-2">
                    <a href="{{route('changepasswrd',[$token,$id])}}">
                        Click here To change Password
                    </a>
                </div>
        </div>
    </div>
</section>
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
