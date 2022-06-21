<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{config('app.url')}}css/style.css">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Chat</title>
<link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">

<style>
       @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');

body {
    font-family: 'Montserrat', sans-serif;
    font-size: 17px;
}
        .new-message-divv {
            align-items: center;
            height: 119px;
            background-color: #fff;
            width: 320px
        }

        .send-button {
            background-color: #0C71C3;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
        }

        .send-button:hover {
            color: #fff;
        }

        .input-text-22 {
            max-height: 53px;
        }

        .button-new-msg {
            color: #535353;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            border: 1px #535353 solid;
            border-radius: 10px;
        }

        .sectionn {
            border-bottom: 1px solid #70707080
        }

        .overflow-11::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .overflow-11::-webkit-scrollbar-track {
            background: #EFEFEF !important;
            border-radius: 10px;
        }

        /* Handle */
        .overflow-11::-webkit-scrollbar-thumb {
            background: #0C71C380;
            border-radius: 10px;
        }

        /* Handle on hover */
        .overflow-11::-webkit-scrollbar-thumb:hover {
            background: #0C71C3;
            border-radius: 10px;
        }







        .overflow-22::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .overflow-22::-webkit-scrollbar-track {
            background: #EFEFEF !important;
            border-radius: 10px;
        }

        /* Handle */
        .overflow-22::-webkit-scrollbar-thumb {
            background: #0C71C380;
            border-radius: 10px;
        }

        /* Handle on hover */
        .overflow-22::-webkit-scrollbar-thumb:hover {
            background: #0C71C3;
            border-radius: 10px;
        }


        .status-time {
            font-weight: 600;
            font-size: 11px;
            color: #A7A7A7;
        }

        .search-notif {
            background-color: #EFEFEF;
            height: 65px;
            border-bottom: 1px solid #70707080;
        }

        .search-icon {
            color: #0C71C3;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-right: none;
            border-radius: 10px;
        }

        .form-control {
            border-color: #ced4da !important;
            box-shadow: none !important;
        }

        .send-file input[type="file"] {
            display: none;
        }

        body {
            font-family: montserrat;
        }

        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            /* margin-bottom: 30px; */
            border-radius: .55rem;
            position: relative;
            width: 100%;
            /* box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%); */
        }

        .chat-app .people-list {
            width: 320px;
            position: absolute;
            left: 0;
            top: 0;

            z-index: 7;
            background-color: #fff;
        }

        .chat-app .people-list ul li:hover {
            background-color: #EFEFEF;
        }

        .chat-app .chat {
            margin-left: 320px;
            border-left: 1px solid #70707080;
            height: 100vh;
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            height: 100vh;
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px;
        }

        .people-list .chat-list li:hover {
            background: #fff;
            cursor: pointer;
        }

        .people-list .chat-list li.active {
            background: #fff;
        }

        .people-list .chat-list li .name {
            font-size: 17px;
            color: #0C71C3;
            font-weight: 500;
        }


        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%;
        }

        .people-list img {
            float: left;
            border-radius: 50%;
        }

        .people-list .about {
            float: left;
            padding-left: 8px;
        }

        .people-list .status {
            color: #434343;
            font-size: 11px;
        }

        .chat .chat-header {
            height: 65px;
            border-bottom: 1px solid #70707080;
            background-color: #EFEFEF;
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px;
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px;
            font-weight: 500;
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff;
            background-color: #fff;
        }

        .chat .chat-history ul {
            padding: 0;
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px;
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px;
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px;
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px;
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px;
        }

        .chat .chat-history .message {
            color: #444;
            padding: 8px 20px;
            line-height: 1.5;
            font-size: 14px;
            border-radius: 8px;
            display: inline-block;
            position: relative;
            max-width: 65%;
        }

        /* .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        } */

        .chat .chat-history .my-message {
            background: #fff;
            border: 0.5px solid #70707080;
            border-radius: 8px;

        }

        /* .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        } */

        .chat .chat-history .other-message {
            background: #0C71C3;
            color: #fff;
            text-align: right;
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%;
        }

        .chat .chat-message {
            margin-left: 320px;
            height: 120px;
            background-color: #F7F7F7;
            border-top: 1px #70707080 solid;
            border-left: 1px #70707080 solid;
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle;
        }

        .online {
            color: #86c541;
        }

        .offline {
            color: #9b9b9b;
        }

        .me {
            color: #1d8ecd;
        }

        .float-right {
            float: right;
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        .desktop-send {
            display: block;
        }

        .mobile-send {
            display: none;
        }

        .message-page-button {
            display: none;
        }

        .notify-page-button {
            display: none;
        }

        .people-list {
            display: block;
        }

        .chat {
            display: block;
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                /* left: -400px; */
                display: none;
            }

            .chat {
                display: block;
            }

            .sectionn {
                width: 100% !important;
            }

            .search-notif {
                width: 100% !important;
            }

            .new-message-divv {
                width: 100%;
            }

            .chat-app .people-list.open {
                left: 0;
            }

            .desktop-send {
                display: none;
            }

            .mobile-send {
                display: block;
            }

            .notify-page-button {
                display: block;
            }

            .message-page-button {
                display: block;
            }

            .chat-app .chat {
                margin: 0;
                border: none;

            }

            .chat-app .chat .chat-header {
                /* border-radius: 0.55rem 0.55rem 0 0; */
                margin-left: 0 !important;
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto;
            }

            .chat .chat-history .message {
                max-width: 80%;
            }

            .chat-message {
                margin-left: 0 !important;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto;
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto;
            }
        }
        .chat-message input[type="file"] {
            display: none;
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto;
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto;
            }
        }
        body, html{
            overflow-y: hidden !important;
        }
    </style>


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        var booleanCahtTrueFalse = true;

        setInterval(() => {
            if(booleanCahtTrueFalse){
                document.getElementById('bchat').scroll({ top: document.getElementById('bchat').scrollHeight, behavior: 'smooth' });

                booleanCahtTrueFalse = false;
            }
        }, 850);


        function showMssgFunct() {
            document.getElementById('plist').style.display = "none";
            document.getElementById('chatt').style.display = "block";
        }
        function showNotifFunct() {
            document.getElementById('chatt').style.display = "none";
            document.getElementById("plist").style.display = "block";
        }
    </script>
<script> 
window.data = @json(compact('u1','u2','admin'))
</script>
<script>
function upload(x){

  var fullPath = x.value;
if (fullPath) {
    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
    var filename = fullPath.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
document.getElementById(x.id + 'c').value = filename;
}
}
</script>

<div id="app">
    <chat url="{{config('app.url')}}" admin="{{Auth::user()->id}}"></chat>
</div>
</body>
</html>

<style>
    /*Per Notification */
    .coloriii a{
        color: black !important;
    }
    a {
        text-decoration: none;
    }
    #msg{
        color: #84e184
    }
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
body {font-family: 'Montserrat', sans-serif;}

</style>


