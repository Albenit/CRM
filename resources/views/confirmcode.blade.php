<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Confirm Code</title>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>

<body>
<form action="{{route('confirmcode')}}" method="post" class="form3">
    @csrf
<section style="display:flex; justify-content: center; width: 100%;">
    <div class="my-auto p-5"
         style="border-radius: 39px;width: 380px; position: absolute; top: 27%;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
        <div class="">

                <input type="text" maxlength=1 name="c1"/>
                <input type="text" maxlength=1 name="c2"/>
                <input type="text" maxlength=1 name="c3"/>
                <input type="text" maxlength=1 name="c4"/>

            <div id="code-block" class="fs-6 fw-bold my-2 text-end pe-3">
                <i onclick="reset()">Reset
                </i>
            </div>
            <div class="mx-2">
          <span class="fs-6" style="color: #ACACAC;">
            Bitte geben Sie den 4 - stelligen Code
            Ein, den wir als SMS an Ihre Nummer
            geschickt haben
          </span>
            </div>
            <div class="my-2 mt-4">
                <button class="w-100 border-0 py-2 fw-bold" type="submit"
                        style="background-color: #3CD598; border-radius: 14px; color: #fff;">
                    Weiter
                    <span class="ps-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="25.238" height="11.043" viewBox="0 0 25.238 11.043">
                <g id="Group_453" data-name="Group 453" transform="translate(0.01)">
                  <line id="Line_16" data-name="Line 16" x2="21.533" y2="0.22" transform="translate(0 5.302)"
                        fill="none" stroke="#fff" stroke-width="2" />
                  <path id="Polygon_2" data-name="Polygon 2" d="M5.521,0l5.521,9.662H0Z"
                        transform="translate(25.228) rotate(90)" fill="#fff" />
                </g>
              </svg>

            </span>
                </button>

            </div>

        </div>
    </div>
</section>
</form>

<style>
    /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 99999;
	background: url(https://c.tenor.com/b8F9BMmvXlcAAAAi/loading-round.gif) center no-repeat #fff;
    background-size: 200px;
}

@media (max-width: 575.98px) { 
    .se-pre-con {
        background-size: 100px;
    }

 }
    #code-block i {
        font-style: normal !important;
        cursor: pointer;
        border: 1px solid #7B7B7B;
        border-radius: 3px;
        padding: 1px;
    }
    #code-block i:hover {
        background-color: #7b7b7b;
        color: #fff;
    }

    form {
        display: flex;
        justify-content: center;
    }

    input {
        margin: 0 0.5rem;

        border: 1px solid #333;
        width: 50px;
        height: 50px;
        text-align: center;
        font-size: 3rem;
    }

    .special {
        margin-top: 2rem;
        font-size: 2rem;
        opacity: 1;
        visibility: visible;
        transition: all 0.3s ease;
    }

    .hidden {
        opacity: 0;
        visibility: hidden;
    }

    .form3 input {
        border: none;
        border-bottom: 2px #7B7B7B solid;
        border-radius: 0;
    }

    .form3 .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
    }

    .form3 input::placeholder {
        font-size: 25px;
        text-align: center;
    }

    .form3 input:focus-visible {
        outline: none;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>


<script>
    var cnt = 0;
    const inputs = document.querySelectorAll("input");
    const codeBlock = document.getElementById("code-block");
    const code = document.getElementById("code");
    const form = document.querySelector("form");

    inputs.forEach((input, key) => {
        if (key !== 0) {
            input.addEventListener("click", function () {
                inputs[0].focus();
            });
        }
        input.addEventListener("keyup", function () {
            if (input.value) {
                if (key === 4) {
                    // Last one tadaa
                    const userCode = [...inputs].map((input) => input.value).join("");
                    codeBlock.classList.remove("hidden");
                    code.innerText = userCode;
                } else {
                    inputs[key + 1].focus();
                }
            }
        });
    });

    const reset = () => {
        form.reset();
        codeBlock.classList.add("hidden");
        code.innerText = "";
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>
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

