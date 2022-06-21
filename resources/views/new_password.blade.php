<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .div_{
            width: 400px !important;
        }
    </style>
    <title>New Password</title>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>

<body>
<section class="section_  d-flex justify-content-center" style="align-items: center; height: 100vh">
    <div class="my-auto p-4 div_ ">
        <div class="">
            <form action="{{route('update_password',['token'=>$token,'id'=>$id])}}" method="post" class="form1"  onsubmit ="return verifyPassword()">
                @csrf
                <span id = "message" style="color:red"> </span>
                <div class="my-3">
                    <label class="mb-2">Neues Kennwort</label>
                    <div class="d-flex">
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <input type="password" name="password" id="pswd" class="form-control">
                    </div>

                </div>
                <div class="my-3">
                    <label class="mb-2">Bestätige das Passwort</label>
                    <div class="d-flex">
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35"  fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                            </svg>
                        </div>
                        <input type="password" name="repeat_password" id="password" class="form-control">
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" class="py-2 w-100 border-0 fw-bold btn_anmelden__" style="font-family: 'Montserrat' !important; border-radius: 8px; background-color: #3CD598; color: #fff;">
                        Passwort ändern
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    function verifyPassword() {
        var pw = document.getElementById("pswd").value;
        var pw2 = document.getElementById("password").value;
        //check empty password field
        if(pw == "") {
            document.getElementById("message").innerHTML = "**Geben Sie bitte das Passwort ein!";
            return false;
        }

        //minimum password length validation
        if(pw.length < 8) {
            document.getElementById("message").innerHTML = "**Die Passwortlänge muss mindestens 8 Zeichen betragen";
            return false;
        }

        //maximum length of password validation
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
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

    body {
        padding: 0 !important;
        font-family: 'Montserrat', sans-serif;
    }

    .div_ {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 20px;
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
