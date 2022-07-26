<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Statistik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Statistik</title>
    <link rel="icon" type="image/png" href="{{config('app.url')}}crmFav.png">
</head>

<body>


    <?php
    $activePage = basename($_SERVER['PHP_SELF'], '.php');
    ?>
    @php
        $user = auth()->user();
        $urole = $user->getRoleNames()->toArray();
    @endphp
    {{-- nav style --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@200;800;900&display=swap');
        
        .sideBarStyle {
            position: fixed;
            left: 0px;
            top: 0px;
            height: 100%;
            background: #f7f7f7;
        }
        .bluePageIndicator {
            visibility: hidden;
        }
        
        .activePage {
            visibility: visible;
        }
        .passiveSvg {
            stroke: #A7A4A4 !important;
            fill: #A7A4A4 !important;
        }
        .activeSvgIndicator svg {
            stroke: #2F60DC !important;
            /* fill: #2F60DC !important; */
        }
        .activePageIndicator {
            font-size: 17px;
            color: #2F60DC;
            font-weight: 500;
        }
        .passivePageIndicator {
            font-size: 17px;
            color: #A7A4A4;
            cursor: pointer;
            font-weight: 400;
        }
        .navbarFirstHr {
            background-color: rgba(196, 196, 196, 0.9);
        }
        .removeTextOnMobile {
            display: block;
        }
        @media (max-width: 991.98px) {
            .removeTextOnMobile {
                display: none;
            }
            .bluePageIndicator svg {
            margin-left: -0.25rem;
        }
        }
        @media (max-width: 767.98px) {
            .hideNavBarMobile {
                display: none;
            }
        }
    </style>
    <style>
        div,
        button,
        span,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        input,
        a {
            font-family: 'Montserrat';
        }
        .notification-divvv22 a {
            color: black;
        }
        .nav-itemsss {
            height: 90vh !important;
            overflow-y: scroll !important;
            /* overflow-x: hidden !important; */
        }
        /* .nav-link {
        padding-right: 1.8rem !important;
        padding-left: 1.8rem !important;
    } */
        .nav-itemsss a:hover {
            background-color: #fff;
            color: #0C71C3;
        }
        .activeClassNav__,
        .activeClassNav__ span,
        .activeClassNav__ svg {
            background-color: #fff;
            color: #0C71C3 !important;
            fill: #0C71C3 !important;
        }
        .activeClassNavMob__,
        .activeClassNavMob__ svg path {
            background-color: transparent;
            color: #2f60dc !important;
            fill: #2f60dc !important;
            stroke: #2f60dc !important;
        }
        .activeClassNavMob__ span circle {
            background-color: transparent;
            fill: #2f60dc !important;
        }
        .activeClassNavMob__ .active-dot {
            visibility: visible !important;
        }
        .nav-itemsss a:hover span {
            color: #0C71C3;
        }
        .nav-itemsss a:hover svg {
            fill: #0C71C3;
        }
        .nav-itemsss a:focus,
        .nav-itemsss a:focus svg,
        .nav-itemsss a:focus span {
            background-color: #fff;
            color: #0C71C3;
            fill: #0C71C3;
        }
        @media (max-width: 999.98px) {
            .nav-texttt {
                display: none;
            }
            .navvv {
                width: fit-content !important;
                text-align: center !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            /* .user-drop {
            position: fixed !important;
            bottom: 0;
            width: fit-content !important;
        } */
        }
        .dateee {
            border-radius: 15px;
            border: #4CC590 1px solid;
            color: #000;
            background-color: #fff;
        }
        .dateee:hover {
            background-color: #4CC590;
            border-radius: 15px;
            color: #fff;
        }
        .dateee:focus {
            background-color: #4CC590;
            border-radius: 15px;
            color: #fff;
        }
        .box-1 {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='18' ry='18' stroke='black' stroke-width='1' stroke-dasharray='7%2c 11' stroke-dashoffset='63' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 18px;
        }
        /* overflow 1 */
        .overflow-div1::-webkit-scrollbar {
            width: 0px !important;
        }
        /* Track */
        .overflow-div1::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div1::-webkit-scrollbar-thumb {
            background: #c9cad8;
            border-radius: 10px;
        }
        .collapse2___::-webkit-scrollbar {
            width: 5pt !important;
        }
        /* Track */
        .collapse2___::-webkit-scrollbar-track {
            background: #E3E3E3 !important;
            border-radius: 5px;
        }
        /* Handle */
        .collapse2___::-webkit-scrollbar-thumb {
            background: #4EC590;
            border-radius: 10px;
        }
        .collapse23___::-webkit-scrollbar {
            width: 5pt !important;
        }
        /* Track */
        .collapse23___::-webkit-scrollbar-track {
            background: #E3E3E3 !important;
            border-radius: 5px;
        }
        /* Handle */
        .collapse23___::-webkit-scrollbar-thumb {
            background: #EF696A;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div1::-webkit-scrollbar-thumb:hover {
            background: #707070;
            border-radius: 10px;
        }
        .dateee {
            border-radius: 15px;
            border: #0C71C3 1px solid;
            color: #000;
            background-color: #fff;
        }
        .dateee:hover {
            background-color: #0C71C3;
            border-radius: 15px;
            color: #fff;
        }
        .dateee:focus {
            background-color: #0C71C3;
            border-radius: 15px;
            color: #fff;
        }
        .scroll-2 {
            height: 250px;
            overflow-x: auto;
            /* overflow-y: scroll; */
            /* overflow-x: hidden !important; */
        }
        .scroll-2::-webkit-scrollbar {
            width: 6px !important;
        }
        /* Track */
        .scroll-2::-webkit-scrollbar-track {
            background: #fff !important;
            border-radius: 10px;
        }
        /* Handle */
        .scroll-2::-webkit-scrollbar-thumb {
            background: #0C71C3;
            border-radius: 10px;
        }
        /* Handle on hover */
        .scroll-2::-webkit-scrollbar-thumb:hover {
            background: #0C71C3;
        }
        .person-box {
            color: #fff;
            font-weight: 600;
            border-radius: 15px;
            background-color: #0C71C3;
        }
        .text-color123 {
            color: grey;
        }
        /* overflow 1 */
        .overflow-div1::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        .overflow-div1::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div1::-webkit-scrollbar-thumb {
            background: #c9cad8;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div1::-webkit-scrollbar-thumb:hover {
            background: #707070;
            border-radius: 10px;
        }
        /* ........................................................... */
        /* overflow 2 */
        .overflow-div2::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        .overflow-div2::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div2::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div2::-webkit-scrollbar-thumb:hover {
            background: #fff1ff;
            border-radius: 10px;
        }
        /* ........................................................... */
        /* overflow 3 */
        .overflow-div3::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        .overflow-div3::-webkit-scrollbar-track {
            background: #E3E3E3 !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div3::-webkit-scrollbar-thumb {
            background: #4EC590;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div3::-webkit-scrollbar-thumb:hover {
            background: #4EC590;
        }
        /* ...................................................... */
        /* overflow 4 */
        .overflow-div4::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        .overflow-div4::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div4::-webkit-scrollbar-thumb {
            background: #c9cad8;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div4::-webkit-scrollbar-thumb:hover {
            background: #707070;
        }
        /* ................................................. */
        .collapsed .d-btnn {
            background-color: #c8ddd1;
            opacity: 0.4;
        }
        .d-btnn {
            opacity: 1;
        }
        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
        }
        .accordion-button {
            color: #7DBF9A;
            font-weight: bold;
            border-radius: 15px !important;
        }
        .accordion-item {
            border-radius: 15px !important;
        }
        .hr-style {
            color: #fff !important;
            height: 3px !important;
            border-radius: 50px;
            opacity: 1;
            display: none;
        }
        .border-left-div {
            border: none !important;
            border-left: 3px solid #fff !important;
        }
        @media (max-width: 991.98px) {
            .hr-style {
                display: block;
            }
            .border-left-div {
                border: none !important;
                border-left: none !important;
            }
        }
        .dot-styleee {
            z-index: 999;
            top: 10px;
            left: auto;
            right: -7px;
            border-radius: 50% !important;
            padding: 7px 10px;
        }
        .accepted-section {
            background-color: #7DBF9A;
            border-radius: 19px;
        }
        .decline-btn {
            border: 2px solid #FF0D13;
            border-radius: 13px !important;
            background-color: #fff;
            color: #FF0D13;
        }
        .decline-btn:hover {
            background-color: #FF0D13;
            color: #fff !important;
        }
        .accept-btn {
            border: 2px solid #63D4A4;
            border-radius: 13px !important;
            background-color: #fff;
            color: #63D4A4 !important;
        }
        .accept-btn:hover {
            border: 2px solid #63D4A4;
            background-color: #63D4A4;
            color: #fff !important;
        }
        .text-color-header1 {
            color: #fff;
        }
        .people-icon-div {
            background-color: #525353;
            margin: 3px;
        }
        .static-btn1 {
            background-color: #fff !important;
            border-radius: 8px !important;
        }
        .people-svg-span {
            border-radius: 8px;
        }
        .accordion-button:not(.collapsed) {
            color: #7DBF9A;
            background-color: #fff;
            box-shadow: none;
        }
        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-color: transparent !important;
        }
        .accordion-button:focus {
            border-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        .priority-spnn {
            background-color: #ad2b2b;
            border-radius: 35px;
            color: #fff;
        }
        .open-task-box {
            border-radius: 35px !important;
            background-color: #fff;
            border: #707070 1px solid;
        }
        .pendzen-box {
            border-radius: 35px !important;
            background-color: #EAECF0;
            border: none;
        }
        .third-box {
            border-radius: 35px !important;
            background-color: #fff;
            border: #707070 1px solid;
        }
        .task-box {
            background-color: #F7F7F7;
            border-radius: 12px;
        }
        .name-spnnnn {
            font-weight: 600;
        }
        .fw-600 {
            font-weight: 600;
        }
        .spn-muted {
            color: #707070;
            font-weight: 600;
            font-size: 14px !important;
        }
        .spn-normal {
            font-weight: 600;
            font-size: 14px !important;
        }
        .nav-texttt {
            font-family: 'Poppins';
            color: #fff;
        }
        @media (max-width: 978px) {
            #logo__311 {
                content: url('https://crm.kutiza.com/public/imgs/Logo%20gjys.png');
                width: 20% !important;
            }
        }
        .openLeadsSpanText {
            font-size: 17px;
            font-weight: 500;
        }
        .redBorderDiv {
            border: 5px solid #FF6262;
            border-left: none;
            border-top-right-radius: 59px;
            border-bottom-right-radius: 59px;
            height: 100%;
            vertical-align: middle;
            background-color: white;
        }
        .receivedDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .assignedToDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .lostDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .wonDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
        }
        .openLeadsFirstDiv {
            z-index: 5;
        }
        .receivedCol {
            z-index: 4;
            margin-left: -6%;
        }
        .assignedToCol {
            z-index: 3;
            margin-left: -9%;
        }
        .lostCol {
            z-index: 2;
            margin-left: -9%;
        }
        .wonCol {
            z-index: 1;
            margin-left: -12%;
        }
        #chart7 .apexcharts-legend {
            display: none !important;
        }
        /* new navbar styling */
        .rolle-style {
            border-radius: 0 !important;
            border-bottom: 1.5px solid white;
        }
        /* overflow 1 */
        .column-v::-webkit-scrollbar {
            width: 0px;
            height: 0pc;
        }
        /* Track */
        .column-v::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .column-v::-webkit-scrollbar-thumb {
            background-clip: padding-box;
            background: #fff;
            border-radius: 10px;
            border: 1px rgb(46, 31, 131) solid;
        }
        /* Handle on hover */
        .column-v::-webkit-scrollbar-thumb:hover {
            background: #39AAFF;
            border-radius: 10px;
        }
        .hr-1 {
            opacity: 1 !important;
            height: 2.5px;
            background-color: #fff;
        }
        .log-out-div {
            /* position: fixed; */
            /* display: flex; */
            /* left: 30px !important; */
            bottom: 10px;
            left: 0;
            background-color: #0C71C3;
            /* width: 215px; */
        }
        .logg {
            position: relative;
            width: 100%;
        }
        .logg button {
            background-color: transparent;
            box-shadow: none !important;
            color: #fff !important;
            border-radius: 0;
            border: none;
            /*border: 1.5px #fff solid;*/
        }
        .column-v {
            /* max-width: 200px; */
            padding-left: 10px;
            display: block !important;
            height: 73vh;
            overflow-y: scroll;
            /* direction: rtl; */
            text-align: left !important;
            margin-left: 7px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow-x: visible;
        }
        .nav-styling {
            /* max-width: 215px; */
            /* width: 100% !important; */
            height: 100vh !important;
            background-color: #0C71C3;
        }
        .nav-link {
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            color: #fff !important;
            border-top-right-radius: 0px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 10px;
            direction: initial;
        }
        /* .nav-link.active {
        color: #434343 !important;
        border-top-right-radius: 0px;
        border-top-left-radius: 10px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 10px;
    } */
        .nav-link:hover {
            background-color: #39AAFF !important;
            border-top-right-radius: 0px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 10px;
        }
        .nav-link.activeClassNav__:hover {
            background-color: #fff !important;
            border-top-right-radius: 0px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 10px;
        }
        .img-normal {
            display: block;
        }
        .img-collapsed {
            display: none
        }
        body {
            font-family: 'Montserrat', sans-serif;
        }
        @media (max-width: 991.98px) {
            .column-v {
                width: 80px;
                margin-left: 0;
                padding-left: 0;
            }
            .txt-dn {
                display: none;
            }
            .nav-link:hover .txt-dn {
                /* display: inline !important;
            justify-content: center;
            padding-top: 3px; */
                display: none;
                /* position: relative; */
            }
            .nav-link {
                text-align: center;
            }
            .log-out-div:hover .txt-dn {
                /* display: flex;
            justify-content: center;
            padding-top: 3px; */
                display: none;
                /* position: relative; */
                /* white-space: nowrap; */
            }
            .nav-styling {
                width: 80px;
            }
            .log-out-div {
                width: 80px;
            }
            .img-normal {
                display: none;
            }
            .img-collapsed {
                display: block;
            }
        }
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
    if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }
        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }
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
    </style>
    <style>
        /* .firstHr {
        width: 5px;
        height: 3px;
        transition: all 0.2s ease-in-out;
        text-align: center;
    }
    .m-burger:hover .firstHr {
        width: 20px;
    } */
        .bottom-burger-modal {
            width: 100%;
            height: 100%;
            overflow: scroll;
            background: #F1F1F1;
            position: absolute;
            margin: 0;
            padding: 0;
            z-index: 3;
            position: fixed;
            bottom: 0;
            animation: myfirst 0.6s;
            animation-direction: reverse;
        }
        @keyframes myfirst {
            0% {
                left: 0px;
                top: 0px;
            }
            100% {
                left: 0px;
                top: 100%;
            }
        }
        .item-nvm {
            border: none;
            border-bottom: 1px solid #a7a7a7
        }
        .item-nvm:hover {
            background-color: #f3f3f3;
        }
        .m-nav .dropup .dropdown-toggle::after {
            display: none !important;
        }
        .mobile-nav {
            z-index: 1000;
            background: #F1F1F1;
            position: fixed;
            bottom: 0;
            height: 65px;
            border: none;
            margin-top: auto !important;
            margin-bottom: auto !important;
            width: 100% !important;
            display: flex;
            align-items: center !important;
            justify-content: space-evenly !important;
            vertical-align: middle !important;
        }
        .mobile-nav a {
            text-decoration: none !important;
            color: #000;
        }
        .active-dot {
            visibility: hidden;
        }
        .mobile-nav {
            display: none;
        }
        .first-col1 {
            display: block;
        }
        @media (max-width: 767.98px) {
            .mobile-nav {
                display: flex;
            }
        }
        @media (max-width: 575.99px) {
            .first-col1 {
                display: none;
            }
            .se-pre-con {
                background-size: 100px;
            }
            body {
                padding-bottom: 65px;
            }
            .dot-styleee {
                z-index: 999;
                top: 5px;
                left: auto;
                right: -7px;
                border-radius: 50% !important;
                /*padding: 7px 10px;*/
                padding: 3px 6px;
            }
        }
        a {
            text-decoration: none;
        }
    </style>
    <style>
        /*Per Notification */
        .coloriii a {
            color: #7F00FF !important;
        }
        .grayyy1 {
            color: #88889D;
        }
        .assigned-leads-div {
            border-radius: 25px;
        }
        .t {
            color: #88889D;
        }
        .fw-600 {
            font-weight: 600;
        }
        .fw-500 {
            font-weight: 500;
        }
        .whiteee {
            background-color: #fff;
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            border-top-left-radius: 30px !important;
            border-top-right-radius: 30px !important;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
        .lead-offnen {
            background-color: #88889D;
            color: #fff;
            border-bottom-left-radius: 30px !important;
            border-bottom-right-radius: 30px !important;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
        }
        .overflow-divvv::-webkit-scrollbar {
            width: 0px;
        }
        /* Track */
        .overflow-divvv::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-divvv::-webkit-scrollbar-thumb {
            background: #c9cad8;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-divvv::-webkit-scrollbar-thumb:hover {
            background: #707070;
            border-radius: 10px;
        }
        /*.lead-statistics-header {*/
        /*    background-color: #F7F7F7;*/
        /*    border-bottom-left-radius: 0px !important;*/
        /*    border-bottom-right-radius: 0px !important;*/
        /*    border-top-left-radius: 30px !important;*/
        /*    border-top-right-radius: 30px !important;*/
        /*}*/
        /*.lead-statistics {*/
        /*    background-color: #F7F7F7;*/
        /*    border-bottom-left-radius: 30px !important;*/
        /*    border-bottom-right-radius: 30px !important;*/
        /*    border-top-left-radius: 0px !important;*/
        /*    border-top-right-radius: 0px !important;*/
        /*}*/
        .openLeadsSpanText {
            font-size: 17px;
            font-weight: 500;
        }
        .redBorderDiv {
            border: 5px solid #FF6262;
            border-left: none;
            border-top-right-radius: 59px;
            border-bottom-right-radius: 59px;
            height: 100%;
            vertical-align: middle;
            background-color: #FF6262;
        }
        .receivedDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .assignedToDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .lostDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
        }
        .wonDiv {
            vertical-align: middle;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            font-weight: bold;
        }
        .openLeadsFirstDiv {
            z-index: 5;
        }
        .receivedCol {
            z-index: 4;
            margin-left: -6%;
        }
        .assignedToCol {
            z-index: 3;
            margin-left: -9%;
        }
        .lostCol {
            z-index: 2;
            margin-left: -9%;
        }
        .wonCol {
            z-index: 1;
            margin-left: -12%;
        }
        .flexDirRow {
            flex-direction: row;
        }
        @media (max-width: 899.98px) {
            .flexDirRow {
                flex-direction: column;
            }
            .openLeadsFirstDiv {
                width: 100% !important;
            }
            .hideTextMob {
                display: none;
            }
            .redBorderDiv {
                border-radius: 0;
                border-bottom-right-radius: 59px;
                border-bottom-left-radius: 59px;
            }
            .receivedCol {
                margin: auto;
                width: 85%;
            }
            .assignedToCol {
                margin: auto;
                margin-top: -15%;
                width: 85%;
            }
            .lostCol {
                margin: auto;
                margin-top: -15%;
                width: 85%;
            }
            .wonCol {
                margin: auto;
                margin-top: -18%;
                width: 85%;
            }
        }
    </style>
    <style>
        .nottif-item {
            border: #70707060 1px solid;
            border-radius: 5px;
        }
        .overflow-div2212 {
            max-height: 25rem;
            overflow: auto;
        }
        .notification-divvv22 .dropdown-menu {
            max-width: 50rem;
            height: 27rem;
            z-index: 999;
            width: 50rem;
            box-shadow: 0px 4px 4px rgba(143, 143, 143, 0.25);
        }
        .notification-divvv22 .dropup .dropdown-toggle::after {
            display: none;
        }
        .notif-div-content {
            width: 340px;
            position: fixed;
            display: block;
            bottom: 110px;
            right: 30px;
            background-color: #fff;
        }
        .notification-divvv22 {
            z-index: 999;
            position: fixed;
            display: flex;
            bottom: 30px;
            right: 30px;
            background-color: #fff;
            box-shadow: 0px 4px 40px rgba(143, 143, 143, 0.25);
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .rounded-notid-icon {
            background-color: #0C71C3;
            border-radius: 50px;
            color: #fff;
            padding: 20px;
            border: none;
        }
        .hover-visible-div {
            background-color: #fff;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            display: none;
            align-items: center;
            padding-right: 2rem;
        }
        .txt-notif {
            padding-left: 25px;
            padding-right: 15px;
            font-weight: 500;
        }
        .notification-divvv22:hover .hover-visible-div {
            display: flex;
        }
        /* overflow 1 */
        .overflow-div2212::-webkit-scrollbar {
            width: 6px;
        }
        /* Track */
        .overflow-div2212::-webkit-scrollbar-track {
            background: transparent !important;
            border-radius: 10px;
        }
        /* Handle */
        .overflow-div2212::-webkit-scrollbar-thumb {
            background: #2F60DC80;
            border-radius: 10px;
        }
        /* Handle on hover */
        .overflow-div2212::-webkit-scrollbar-thumb:hover {
            background: #2F60DC;
            border-radius: 10px;
        }
        .notification-divvv22 .bluefont {
            background-color: #eaf5ff;
        }
        .notification-divvv22 .bluefont a {
            color: #0c71c3;
        }
        @media (max-width: 912.98px) {
            .notification-divvv22 .dropdown-menu {
                width: 63vw;
            }
        }
        @media (max-width: 767.98px) {
            body {
                padding-bottom: 30%;
            }
            .overflow-div2212 {
                height: 47vh;
                overflow: auto;
            }
            .notification-divvv22 .dropdown-menu {
                width: 99vw;
                box-shadow: 0px 4px 40px rgba(143, 143, 143, 0.25);
            }
            .notification-divvv22 {
                position: fixed;
                display: flex;
                bottom: 80px;
                right: 10px;
            }
            .rounded-notid-icon svg {
                width: 25px;
            }
            .hover-visible-div {
                display: none;
            }
            .notification-divvv22:hover .hover-visible-div {
                display: none;
            }
            .rounded-notid-icon {
                background-color: #0C71C350;
                padding: 10px;
            }
            .rounded-notid-icon:hover {
                background-color: #0C71C3;
            }
        }
    </style>
    {{-- endnav --}}
    <style>
        .sideBarStyle {
            left: 0px;
            top: 0px;
            height: 100%;
            background: #f7f7f7;
        }
        .highcharts-title {
            font-family: montserrat;
            font-weight: bold;
            font-size: 20px !important;
        }
        .bluePageIndicator {
            visibility: hidden;
        }
        .activePage {
            visibility: visible;
        }
        .passiveSvg {
            stroke: #A7A4A4 !important;
            fill: #A7A4A4 !important;
        }
        .activeSvgIndicator svg {
            stroke: #2F60DC !important;
            /* fill: #2F60DC !important; */
        }
        .activePageIndicator {
            font-size: 17px;
            color: #2F60DC;
            font-weight: 500;
        }
        .passivePageIndicator {
            font-size: 17px;
            color: #A7A4A4;
            cursor: pointer;
            font-weight: 400;
        }
        .navbarFirstHr {
            background-color: rgba(196, 196, 196, 0.9);
        }
        .removeTextOnMobile {
            display: block;
        }
        @media (max-width: 991.98px) {
            .removeTextOnMobile {
                display: none;
            }
        }
    </style>
    <style>
        .greyBgStats {
            background: #F9FAFC;
            box-shadow: 0px 4px 4px rgba(118, 118, 118, 0.17);
            border-radius: 23px;
        }
        .statsTitleSpan {
            font-weight: 700;
            color: rgba(0, 0, 0, 0.8);
        }
        .statsSelectStyle {
            border: 2px solid rgba(47, 96, 220, 0.28);
            border-radius: 6px;
            position: relative;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .statsSelectStyleDropdown {
            border: 2px solid rgba(47, 96, 220, 0.28);
            border-radius: 6px;
            position: absolute;
            background-color: #fff;
            margin-top: 3px;
            right: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 5;
        }
        .activeSvg circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg1 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg2 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg3 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg4 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg5 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg6 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg7 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .activeSvg8 circle {
            fill: #2F60DC;
            stroke: #2F60DC;
        }
        .greyBorderDivStats {
            border: 2px solid rgba(47, 96, 220, 0.1);
            box-sizing: border-box;
            border-radius: 6px;
        }
        .greySelectStats {
            background-color: rgba(196, 196, 196, 0.23);
            border-radius: 6px;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 1;
        }
        .apexcharts-legend-text {
            font-weight: 500;
            font-size: 18px !important;
            color: #000000;
            line-height: 27px;
            letter-spacing: -1px;
        }
        .contractsWhiteBgDiv {
            background: #FFFFFF;
            border: 1px solid #EAE9E9;
            box-sizing: border-box;
            border-radius: 10px;
        }
        .contractsSecondSpan {
            font-weight: 600;
            line-height: 30px;
        }
        .whiteBgGraph {
            background: #FFFFFF;
            border: 1px solid #EAE9E9;
            box-sizing: border-box;
            border-radius: 10px;
        }
        .apexcharts-menu-icon {
            display: none !important;
        }
        .ltBlueSmallDiv {
            background: #AFD9F1;
            border-radius: 7px;
            color: #fff;
        }
        .ltPinkSmallDiv {
            background: #FFC9C9;
            border-radius: 7px;
            color: #fff;
        }
        .BlueSmallDiv {
            background: #92B4F9;
            border-radius: 7px;
            color: #fff;
        }
        .BlueSmallDiv {
            background: #92B4F9;
            border-radius: 7px;
            color: #fff;
        }
        .greenSmallDiv {
            background: #B5D7A9;
            border-radius: 7px;
            color: #fff;
        }
        .darkBlueSmallDiv {
            background: #576997;
            border-radius: 7px;
            color: #fff;
        }
        .orangeSmallDiv {
            background: #FBCA99;
            border-radius: 7px;
            color: #fff;
        }
        .greyBgImpressions {
            background: #BAC7D3;
            border-radius: 7px;
            color: #fff;
            line-height: 1.1;
        }
        .yellowClicksBg {
            background: #FEDC7B;
            border-radius: 7px;
            color: #fff;
            line-height: 1.1;
        }
        .highcharts-background {
            fill: transparent;
        }
        .canvasjs-chart-credit {
            display: none !important;
        }
        .apexcharts-canvas {
            margin: auto;
        }
        @media (max-width: 1399.98px) {
            .contractsWhiteBgDiv svg {
                width: 60px;
            }
        }
        @media (max-width: 1199.98px) {
            .contractsWhiteBgDiv svg {
                width: 55px;
            }
        }
        @media (max-width: 991.98px) {
            .contractsWhiteBgDiv svg {
                width: 45px;
            }
            #chart6 {
                margin: auto;
                width: 70% !important;
            }
        }
        @media (max-width: 767.98px) {
            #chart6 {
                margin: auto;
                width: 80% !important;
            }
            .greyBgStats {
                border-radius: 13px;
            }
        }
        @media (max-width: 575.98px) {
            .greyBgStats {
                height: auto !important;
            }
            #chart6 {
                margin: auto;
                width: 100% !important;
            }
            #chart6 {
                padding-top: 2rem;
            }
            .apexcharts-legend-text {
                font-size: 14px !important;
            }
            #chart6 .apexcharts-legend {
                padding: 0% !important;
            }
        }
    </style>
    <div class="row g-0 h-100">
        <div class="col-1 col-md-1 col-lg-2 h-100 hideNavBarMobile">
            <div class="sideBarStyle col-1 col-md-1 col-lg-2 px-1 px-lg-0">
                <div class="mx-4 mx-md-0">
                    <div class="text-center mx-auto py-4 d-flex justify-content-center">
                        <svg style="min-width: 40px; max-width: 80px" class="img-fluid" viewBox="0 0 82 67" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M40.9994 23.0175L60.3103 55.386H21.6886L40.9994 23.0175Z" fill="#2F60DC" />
                            <path d="M62.5789 50.3509L45.7598 21.2193L79.3981 21.2193L62.5789 50.3509Z"
                                  fill="#2F60DC" />
                            <path d="M19.4207 50.3509L2.60162 21.2193L36.2399 21.2193L19.4207 50.3509Z"
                                  fill="#2F60DC" />
                            <circle cx="41.7195" cy="8.63158" r="8.63158" fill="#2F60DC" />
                            <circle cx="63.2985" cy="10.0702" r="7.19298" fill="#2F60DC" />
                            <circle cx="20.1402" cy="10.0702" r="7.19298" fill="#2F60DC" />
                        </svg>

                    </div>

                </div>
                <div>
                    <div class="row g-0">
                        <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('/') ? 'activePage' : 'passivePageIndicator' }}">
                            <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                    </svg>

                            </span>
                        </div>

                        <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                            <div class="mx-auto text-center">
                                @if(request()->is('/'))
                                    <svg style="min-width: 20px; max-width: 25px" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.91637 12.6H9.01637V13.5V19.75C9.01637 19.9128 8.8661 20.1 8.6247 20.1H4.7497C4.50829 20.1 4.35803 19.9128 4.35803 19.75V11V10.1H3.45803H1.99054L12.2234 1.18035C12.2237 1.18012 12.2239 1.17989 12.2242 1.17966C12.3767 1.0484 12.6227 1.0484 12.7752 1.17966C12.7755 1.17989 12.7757 1.18012 12.776 1.18035L23.0089 10.1H21.5414H20.6414V11V19.75C20.6414 19.9128 20.4911 20.1 20.2497 20.1H16.3747C16.1333 20.1 15.983 19.9128 15.983 19.75V13.5V12.6H15.083H9.91637Z" fill="#2F60DC" stroke="#2F60DC" stroke-width="1.8"/>
                                    </svg>
                                @else
                                    <a href="{{route('dashboard')}}" class="{{request()->is('/')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">
                                        <svg style="min-width: 20px; max-width: 25px;"  class="img-fluid" viewBox="0 0 25 21"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.91637 12.6H9.01637V13.5V19.75C9.01637 19.9128 8.8661 20.1 8.6247 20.1H4.7497C4.50829 20.1 4.35803 19.9128 4.35803 19.75V11V10.1H3.45803H1.99054L12.2234 1.18035C12.2237 1.18012 12.2239 1.17989 12.2242 1.17966C12.3767 1.0484 12.6227 1.0484 12.7752 1.17966C12.7755 1.17989 12.7757 1.18012 12.776 1.18035L23.0089 10.1H21.5414H20.6414V11V19.75C20.6414 19.9128 20.4911 20.1 20.2497 20.1H16.3747C16.1333 20.1 15.983 19.9128 15.983 19.75V13.5V12.6H15.083H9.91637Z"
                                        stroke="#A7A4A4" stroke-width="1.8" />
                                </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col my-auto removeTextOnMobile">
                            <div>
                                <a href="{{route('dashboard')}}" class="{{request()->is('/')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Startseite</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->hasRole('backoffice') ||
                    Auth::user()->hasRole('fs') || Auth::user()->hasRole('admin'))
                <div class="pt-3">
                    <div class="row g-0">
                        <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('tasks') ? 'activePage' : '' }}">
                                <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                </svg>
                            </span>
                        </div>
                        <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                            <div class="mx-auto text-center ">
                                @if(request()->is('tasks'))
                                    <svg style="min-width: 15px; max-width: 25px;" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_197_3288)">
                                            <rect x="4" y="2" width="17" height="18" fill="#2F60DC"/>
                                            <path d="M19.2756 0.953899H15.3806L15.2222 0.356418C15.1679 0.148233 14.9476 0 14.6937 0H10.3063C10.0523 0 9.83295 0.148233 9.77772 0.356418L9.62016 0.953899H5.72439C4.29932 0.953899 3.14062 1.92756 3.14062 3.12462V18.8293C3.14062 20.0264 4.29932 21 5.72439 21H19.2756C20.7007 21 21.8602 20.0264 21.8602 18.8293V3.12462C21.8602 1.92756 20.7006 0.953899 19.2756 0.953899ZM20.1712 18.8293C20.1712 19.2439 19.7696 19.5813 19.2756 19.5813H5.72433C5.23115 19.5813 4.82952 19.2439 4.82952 18.8293V3.12462C4.82952 2.70998 5.23115 2.37266 5.72433 2.37266H9.24487L9.15501 2.71208C9.11869 2.8468 9.15831 2.98812 9.26059 3.09553C9.36361 3.20326 9.51952 3.26593 9.68357 3.26593H15.317C15.4812 3.26593 15.637 3.20326 15.7393 3.09553C15.8424 2.9878 15.882 2.84684 15.8457 2.71208L15.7558 2.37266H19.2756C19.7696 2.37266 20.1712 2.71003 20.1712 3.12462V18.8293Z" fill="#2F60DC"/>
                                            <path d="M9.07262 10.5013H11.3693L10.8235 10.1882C10.0531 9.74661 9.85528 8.86364 10.3814 8.21665C10.9068 7.57032 11.9582 7.40304 12.7285 7.84533L12.8184 7.89694V7.35558C12.8184 7.00469 12.4795 6.72 12.0621 6.72H9.07262C8.65537 6.72 8.31641 7.00473 8.31641 7.35558V9.86572C8.31641 10.2166 8.65537 10.5013 9.07262 10.5013Z" fill="#F7F7F7"/>
                                            <path d="M16.1054 7.01682L13.4581 9.12206L12.2524 8.43108C11.8689 8.20973 11.3427 8.29355 11.0788 8.61674C10.8157 8.94019 10.9147 9.3815 11.3007 9.60248L13.068 10.6163C13.2124 10.6994 13.3781 10.7399 13.5439 10.7399C13.7542 10.7399 13.9628 10.6742 14.1245 10.5456L17.2666 8.04696C17.6055 7.77784 17.6194 7.32859 17.2995 7.04421C16.9779 6.75984 16.4442 6.7477 16.1054 7.01682Z" fill="#F7F7F7"/>
                                            <path d="M11.7457 12.176H8.75621C8.33897 12.176 8 12.4607 8 12.8116V15.3217C8 15.6725 8.33897 15.9573 8.75621 15.9573H11.7457C12.163 15.9573 12.502 15.6725 12.502 15.3217V12.8116C12.502 12.4607 12.163 12.176 11.7457 12.176Z" fill="#F7F7F7"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_197_3288">
                                                <rect width="25" height="21" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                @else
                                    <a href="{{route('tasks')}}" class="text-decoration-none {{request()->is('tasks')  ? 'activePageIndicator' : 'passivePageIndicator' }}">
                                        <svg style="min-width: 20px; max-width: 25px;" viewBox="0 0 25 21" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_171_588)">
                                        <path
                                            d="M19.2756 0.953899H15.3806L15.2222 0.356418C15.1679 0.148233 14.9476 0 14.6937 0H10.3063C10.0523 0 9.83295 0.148233 9.77772 0.356418L9.62016 0.953899H5.72439C4.29932 0.953899 3.14062 1.92756 3.14062 3.12462V18.8293C3.14062 20.0264 4.29932 21 5.72439 21H19.2756C20.7007 21 21.8602 20.0264 21.8602 18.8293V3.12462C21.8602 1.92756 20.7006 0.953899 19.2756 0.953899ZM20.1712 18.8293C20.1712 19.2439 19.7696 19.5813 19.2756 19.5813H5.72433C5.23115 19.5813 4.82952 19.2439 4.82952 18.8293V3.12462C4.82952 2.70998 5.23115 2.37266 5.72433 2.37266H9.24487L9.15501 2.71208C9.11869 2.8468 9.15831 2.98812 9.26059 3.09553C9.36361 3.20326 9.51953 3.26593 9.68357 3.26593H15.317C15.4812 3.26593 15.637 3.20326 15.7393 3.09553C15.8424 2.9878 15.882 2.84684 15.8457 2.71208L15.7558 2.37266H19.2756C19.7696 2.37266 20.1712 2.71003 20.1712 3.12462V18.8293Z"
                                            fill="#A7A4A4" />
                                        <path
                                            d="M9.07262 10.5013H11.3693L10.8235 10.1882C10.0531 9.74661 9.85528 8.86364 10.3814 8.21665C10.9068 7.57032 11.9582 7.40304 12.7285 7.84533L12.8184 7.89694V7.35558C12.8184 7.00469 12.4795 6.72 12.0621 6.72H9.07262C8.65537 6.72 8.31641 7.00473 8.31641 7.35558V9.86572C8.31641 10.2166 8.65537 10.5013 9.07262 10.5013Z"
                                            fill="#A7A4A4" />
                                        <path
                                            d="M16.1054 7.01682L13.4581 9.12206L12.2524 8.43108C11.8689 8.20973 11.3427 8.29355 11.0788 8.61674C10.8157 8.94019 10.9147 9.3815 11.3007 9.60248L13.068 10.6163C13.2124 10.6994 13.3781 10.7399 13.5439 10.7399C13.7542 10.7399 13.9628 10.6742 14.1245 10.5456L17.2666 8.04696C17.6055 7.77784 17.6194 7.32859 17.2995 7.04421C16.9779 6.75984 16.4442 6.7477 16.1054 7.01682Z"
                                            fill="#A7A4A4" />
                                        <path
                                            d="M11.7457 12.176H8.75621C8.33897 12.176 8 12.4607 8 12.8116V15.3217C8 15.6725 8.33897 15.9573 8.75621 15.9573H11.7457C12.163 15.9573 12.502 15.6725 12.502 15.3217V12.8116C12.502 12.4607 12.163 12.176 11.7457 12.176Z"
                                            fill="#A7A4A4" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_171_588">
                                            <rect width="25" height="21" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                    </a>
                                @endif

                            </div>
                        </div>
                        <div class="col my-auto removeTextOnMobile">
                            <div>
                                <a href="{{route('tasks')}}" class="text-decoration-none {{request()->is('tasks')  ? 'activePageIndicator' : 'passivePageIndicator' }}">Pendenzen</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->hasRole('admin') ||
                    Auth::user()->hasRole('fs') ||
                    Auth::user()->hasRole('salesmanager')
                    ||Auth::user()->hasRole('menagment'))
                    <div class="pt-3">
                        <div class="row g-0">
                            <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('leads')  ? 'activePage' : '' }}">
                                <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                </svg>
                            </span>
                            </div>
                            <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                <div class="mx-auto text-center ">
                                    @if(request()->is('leads'))
                                        <a href="{{route('leads')}}" class="{{ request()->is('leads')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">

                                        <svg xmlns="http://www.w3.org/2000/svg" style="min-width: 15px; max-width: 22px;" fill="currentColor" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                                            <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                                            <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                            <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                        </svg>
                                        </a>

                                    @else
                                        <a href="{{route('leads')}}" class="{{ request()->is('leads')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="min-width: 15px; max-width: 22px;" fill="currentColor" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                                                <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                                                <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                                <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col my-auto removeTextOnMobile">
                                <div>
                                    <a href="{{route('leads')}}" class="{{ request()->is('leads')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Leads</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::check())
                    @if(!auth()->user()->hasRole('callagent'))
                <div class="pt-3">
                    <div class="row g-0">
                        <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('costumers')  ? 'activePage' : '' }}">
                                <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                </svg>
                            </span>
                        </div>
                        <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                            <div class="mx-auto text-center ">
                                @if(request()->is('costumers'))
                                    <svg style="min-width: 15px; max-width: 25px;" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6364 16.3418C15.5814 15.3135 16.1605 13.9336 16.1605 12.4189C16.1605 9.24902 13.6252 6.6709 10.5079 6.6709C7.39069 6.6709 4.8554 9.24902 4.8554 12.4189C4.8554 13.9395 5.44025 15.3223 6.39098 16.3535C5.78597 16.7109 5.22417 17.1533 4.71424 17.6689C3.16425 19.2451 2.30859 21.3428 2.30859 23.5752C2.30859 24.9287 2.63703 25.8897 3.3083 26.5078C4.38868 27.501 5.99628 27.3311 7.85453 27.1377C8.70731 27.0498 9.5889 26.9561 10.5195 26.9561C11.45 26.9561 12.3316 27.0469 13.1844 27.1377C13.9104 27.2139 14.599 27.2842 15.2328 27.2842C16.221 27.2842 17.0738 27.1113 17.7306 26.5049C18.4048 25.8867 18.7303 24.9287 18.7303 23.5723C18.7303 21.3428 17.8747 19.2451 16.3247 17.666C15.8176 17.1445 15.2472 16.7021 14.6364 16.3418ZM10.5079 8.5459C12.6082 8.5459 14.3166 10.2832 14.3166 12.4189C14.3166 14.5547 12.6082 16.292 10.5079 16.292C8.40769 16.292 6.69925 14.5547 6.69925 12.4189C6.70213 10.2832 8.41057 8.5459 10.5079 8.5459ZM16.5004 25.1133C16.028 25.5469 14.7401 25.4121 13.3774 25.2715C12.5189 25.1836 11.548 25.0811 10.5252 25.0811C9.50247 25.0811 8.53157 25.1836 7.67303 25.2715C6.31031 25.4121 5.0225 25.5469 4.55002 25.1133C4.29073 24.8731 4.1582 24.3574 4.1582 23.5723C4.1582 20.8887 5.77445 18.5801 8.06773 17.5986C8.80815 17.9619 9.63788 18.1641 10.5137 18.1641C11.4673 18.1641 12.3662 17.9209 13.1556 17.4961C13.1239 17.54 13.0893 17.584 13.0519 17.625C15.3106 18.6211 16.8951 20.9121 16.8951 23.5693C16.8923 24.3545 16.7597 24.8731 16.5004 25.1133Z" fill="#2F60DC"/>
                                        <path d="M24.7417 13.6728C24.2289 13.1514 23.6585 12.709 23.0477 12.3457C24.0071 11.3027 24.5891 9.89648 24.5718 8.35546C24.5631 7.68163 24.4421 7.0371 24.2232 6.43652C24.2232 6.43359 24.2203 6.43066 24.2203 6.4248C24.2116 6.40429 24.2059 6.38378 24.1972 6.36328C23.3906 4.21581 21.3508 2.6748 18.9653 2.65429C16.9861 2.63671 15.2373 3.65624 14.2117 5.21484C13.8026 5.83886 14.2405 6.67382 14.978 6.67382C15.2863 6.67382 15.5715 6.51855 15.7444 6.25781C15.8913 6.03515 16.0613 5.82714 16.2485 5.63964C16.2975 5.61035 16.3465 5.57519 16.3926 5.53417C17.084 4.91015 17.9973 4.53515 18.997 4.55566C20.6306 4.58789 22.0192 5.67773 22.5263 7.17773C22.6645 7.59374 22.7337 8.04199 22.7222 8.50488C22.6732 10.4853 21.1405 12.126 19.1958 12.2666C19.1036 12.2725 19.0114 12.2754 18.9221 12.2783C18.8616 12.2783 18.8011 12.2842 18.7435 12.2959C18.3142 12.2959 17.9397 12.6035 17.8533 13.0342C17.8533 13.04 17.8504 13.0459 17.8504 13.0518C17.7351 13.6113 18.1414 14.1445 18.7032 14.168C18.7752 14.1709 18.8472 14.1709 18.9221 14.1709C19.8066 14.1709 20.6421 13.9629 21.3883 13.5937C23.647 14.5898 25.3064 16.9189 25.3064 19.5762C25.3064 20.3584 25.1739 20.8769 24.9146 21.1172C24.4421 21.5508 23.1543 21.416 21.7916 21.2754C21.5323 21.249 20.9676 21.1963 20.9561 21.2021C20.4548 21.2109 20.0515 21.6269 20.0515 22.1367C20.0515 22.6465 20.4519 23.0596 20.9475 23.0713C20.9503 23.0742 21.3911 23.1182 21.6015 23.1416C22.3275 23.2178 23.016 23.2881 23.6498 23.2881C24.638 23.2881 25.4908 23.1152 26.1477 22.5088C26.8218 21.8906 27.1474 20.9326 27.1474 19.5762C27.1474 17.3467 26.2917 15.249 24.7417 13.6728Z" fill="#2F60DC"/>
                                        <path d="M15 12.5C15 14.9853 12.4853 25.5 10 25.5C7.51472 25.5 6 14.9853 6 12.5C6 10.0147 8.01472 8 10.5 8C12.9853 8 15 10.0147 15 12.5Z" fill="#2F60DC"/>
                                        <path d="M6.35862 17.6272C8.21545 17.3161 15 16 16.8975 20.9312C20.5 28.5 7.85473 26.1888 5.99791 26.4999C4.14108 26.811 4.15078 25.0798 3.74011 22.6286C3.32945 20.1775 4.5018 17.9383 6.35862 17.6272Z" fill="#2F60DC"/>
                                    </svg>
                                @else
                                    <a href="{{route('costumers')}}" class="text-decoration-none {{request()->is('costumers')  ? 'activePageIndicator' : 'passivePageIndicator' }}">
                                        <svg style="min-width: 15px; max-width: 25px;" viewBox="0 0 30 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6364 16.3418C15.5814 15.3135 16.1605 13.9336 16.1605 12.4189C16.1605 9.24902 13.6252 6.6709 10.5079 6.6709C7.39069 6.6709 4.8554 9.24902 4.8554 12.4189C4.8554 13.9395 5.44025 15.3223 6.39098 16.3535C5.78597 16.7109 5.22417 17.1533 4.71424 17.6689C3.16425 19.2451 2.30859 21.3428 2.30859 23.5752C2.30859 24.9287 2.63703 25.8897 3.3083 26.5078C4.38868 27.501 5.99628 27.3311 7.85453 27.1377C8.70731 27.0498 9.5889 26.9561 10.5195 26.9561C11.45 26.9561 12.3316 27.0469 13.1844 27.1377C13.9104 27.2139 14.599 27.2842 15.2328 27.2842C16.221 27.2842 17.0738 27.1113 17.7306 26.5049C18.4048 25.8867 18.7303 24.9287 18.7303 23.5723C18.7303 21.3428 17.8747 19.2451 16.3247 17.666C15.8176 17.1445 15.2472 16.7021 14.6364 16.3418ZM10.5079 8.5459C12.6082 8.5459 14.3166 10.2832 14.3166 12.4189C14.3166 14.5547 12.6082 16.292 10.5079 16.292C8.40769 16.292 6.69925 14.5547 6.69925 12.4189C6.70213 10.2832 8.41057 8.5459 10.5079 8.5459ZM16.5004 25.1133C16.028 25.5469 14.7401 25.4121 13.3774 25.2715C12.5189 25.1836 11.548 25.0811 10.5252 25.0811C9.50247 25.0811 8.53157 25.1836 7.67303 25.2715C6.31031 25.4121 5.0225 25.5469 4.55002 25.1133C4.29073 24.8731 4.1582 24.3574 4.1582 23.5723C4.1582 20.8887 5.77445 18.5801 8.06773 17.5986C8.80815 17.9619 9.63788 18.1641 10.5137 18.1641C11.4673 18.1641 12.3662 17.9209 13.1556 17.4961C13.1239 17.54 13.0893 17.584 13.0519 17.625C15.3106 18.6211 16.8951 20.9121 16.8951 23.5693C16.8923 24.3545 16.7597 24.8731 16.5004 25.1133Z"
                                        fill="#A7A4A4" />
                                    <path
                                        d="M24.7417 13.6729C24.2289 13.1514 23.6585 12.709 23.0477 12.3457C24.0071 11.3027 24.5891 9.89649 24.5718 8.35548C24.5631 7.68165 24.4421 7.03712 24.2232 6.43653C24.2232 6.4336 24.2203 6.43067 24.2203 6.42481C24.2116 6.40431 24.2059 6.3838 24.1972 6.36329C23.3906 4.21583 21.3508 2.67481 18.9653 2.65431C16.9861 2.63673 15.2373 3.65626 14.2117 5.21485C13.8026 5.83888 14.2405 6.67384 14.978 6.67384C15.2863 6.67384 15.5715 6.51856 15.7444 6.25782C15.8913 6.03517 16.0613 5.82716 16.2485 5.63966C16.2975 5.61036 16.3465 5.5752 16.3926 5.53419C17.084 4.91017 17.9973 4.53517 18.997 4.55567C20.6306 4.5879 22.0192 5.67774 22.5263 7.17774C22.6645 7.59376 22.7337 8.042 22.7222 8.50489C22.6732 10.4854 21.1405 12.126 19.1958 12.2666C19.1036 12.2725 19.0114 12.2754 18.9221 12.2783C18.8616 12.2783 18.8011 12.2842 18.7435 12.2959C18.3142 12.2959 17.9397 12.6035 17.8533 13.0342C17.8533 13.04 17.8504 13.0459 17.8504 13.0518C17.7351 13.6113 18.1414 14.1445 18.7032 14.168C18.7752 14.1709 18.8472 14.1709 18.9221 14.1709C19.8066 14.1709 20.6421 13.9629 21.3883 13.5938C23.647 14.5899 25.3064 16.919 25.3064 19.5762C25.3064 20.3584 25.1739 20.877 24.9146 21.1172C24.4421 21.5508 23.1543 21.416 21.7916 21.2754C21.5323 21.249 20.9676 21.1963 20.9561 21.2022C20.4548 21.2109 20.0515 21.627 20.0515 22.1367C20.0515 22.6465 20.4519 23.0596 20.9475 23.0713C20.9503 23.0742 21.3911 23.1182 21.6015 23.1416C22.3275 23.2178 23.016 23.2881 23.6498 23.2881C24.638 23.2881 25.4908 23.1152 26.1477 22.5088C26.8218 21.8906 27.1474 20.9326 27.1474 19.5762C27.1474 17.3467 26.2917 15.249 24.7417 13.6729Z"
                                        fill="#A7A4A4" />
                                </svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col my-auto removeTextOnMobile">
                            <div>
                                <a href="{{route('costumers')}}" class="text-decoration-none {{request()->is('costumers')  ? 'activePageIndicator' : 'passivePageIndicator' }}">Kunden</a>
                            </div>
                        </div>

                    </div>
                </div>
                @endif
                @endif
                @if(Auth::user()->hasRole('fs') ||
                    Auth::user()->hasRole('salesmanager') ||
                    Auth::user()->hasRole('menagment') ||
                    Auth::user()->hasRole('admin'))
                <div class="pt-3">
                    <div class="row g-0">
                        <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('Appointments')  ? 'activePage' : '' }}">
                                <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                </svg>
                            </span>
                        </div>
                        <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                            <div class="mx-auto text-center ">
                                @if(request()->is('Appointments'))
                                <svg width="21" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1.33594" y="5.63005" width="14.5325" height="12.3154" fill="#2F60DC"/>
                                    <path d="M15.4942 6.33333V17.4167H1.54942V6.33333H15.4942ZM15.4942 4.75H1.54942C0.694141 4.75 0 5.45775 0 6.33333V17.4167C0 18.2923 0.694141 19 1.54942 19H15.4942C16.351 19 17.0436 18.2923 17.0436 17.4167V6.33333C17.0436 5.45775 16.351 4.75 15.4942 4.75ZM16.2689 1.58333H13.9448V0.791667C13.9448 0.354667 13.5977 0 13.1701 0C12.7424 0 12.3954 0.354667 12.3954 0.791667V1.58333H4.64827V0.791667C4.64827 0.354667 4.3012 0 3.87355 0C3.44591 0 3.09884 0.354667 3.09884 0.791667V1.58333H0.774711C0.347071 1.58333 0 1.938 0 2.375C0 2.812 0.347071 3.16667 0.774711 3.16667H16.2689C16.6966 3.16667 17.0436 2.812 17.0436 2.375C17.0436 1.938 16.6966 1.58333 16.2689 1.58333ZM4.64827 7.91667H3.09884V9.5H4.64827V7.91667ZM7.74711 7.91667H6.19769V9.5H7.74711V7.91667ZM10.846 7.91667H9.29653V9.5H10.846V7.91667ZM13.9448 7.91667H12.3954V9.5H13.9448V7.91667ZM4.64827 11.0833H3.09884V12.6667H4.64827V11.0833ZM7.74711 11.0833H6.19769V12.6667H7.74711V11.0833ZM10.846 11.0833H9.29653V12.6667H10.846V11.0833ZM13.9448 11.0833H12.3954V12.6667H13.9448V11.0833ZM4.64827 14.25H3.09884V15.8333H4.64827V14.25ZM7.74711 14.25H6.19769V15.8333H7.74711V14.25ZM10.846 14.25H9.29653V15.8333H10.846V14.25ZM13.9448 14.25H12.3954V15.8333H13.9448V14.25Z" fill="#2F60DC"/>
                                    <rect x="2.63867" y="8.26906" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="2.63867" y="10.9081" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="2.63867" y="13.5471" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="6.1582" y="8.26906" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="6.1582" y="10.9081" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="6.1582" y="13.5471" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="9.67773" y="8.26906" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="9.67773" y="10.9081" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="9.67773" y="13.5471" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="13.1953" y="8.26906" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="13.1953" y="10.9081" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    <rect x="13.1953" y="13.5471" width="1.75934" height="1.75934" fill="#F7F7F7"/>
                                    </svg>

                                @else
                                <a href="{{route('Appointments')}}" class="{{ request()->is('Appointments')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">
                                <svg width="21" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4942 6.33333V17.4167H1.54942V6.33333H15.4942ZM15.4942 4.75H1.54942C0.694141 4.75 0 5.45775 0 6.33333V17.4167C0 18.2923 0.694141 19 1.54942 19H15.4942C16.351 19 17.0436 18.2923 17.0436 17.4167V6.33333C17.0436 5.45775 16.351 4.75 15.4942 4.75ZM16.2689 1.58333H13.9448V0.791667C13.9448 0.354667 13.5977 0 13.1701 0C12.7424 0 12.3954 0.354667 12.3954 0.791667V1.58333H4.64827V0.791667C4.64827 0.354667 4.3012 0 3.87355 0C3.44591 0 3.09884 0.354667 3.09884 0.791667V1.58333H0.774711C0.347071 1.58333 0 1.938 0 2.375C0 2.812 0.347071 3.16667 0.774711 3.16667H16.2689C16.6966 3.16667 17.0436 2.812 17.0436 2.375C17.0436 1.938 16.6966 1.58333 16.2689 1.58333ZM4.64827 7.91667H3.09884V9.5H4.64827V7.91667ZM7.74711 7.91667H6.19769V9.5H7.74711V7.91667ZM10.846 7.91667H9.29653V9.5H10.846V7.91667ZM13.9448 7.91667H12.3954V9.5H13.9448V7.91667ZM4.64827 11.0833H3.09884V12.6667H4.64827V11.0833ZM7.74711 11.0833H6.19769V12.6667H7.74711V11.0833ZM10.846 11.0833H9.29653V12.6667H10.846V11.0833ZM13.9448 11.0833H12.3954V12.6667H13.9448V11.0833ZM4.64827 14.25H3.09884V15.8333H4.64827V14.25ZM7.74711 14.25H6.19769V15.8333H7.74711V14.25ZM10.846 14.25H9.29653V15.8333H10.846V14.25ZM13.9448 14.25H12.3954V15.8333H13.9448V14.25Z" fill="#A7A4A4"/>
                                </svg>

                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col my-auto removeTextOnMobile">
                            <div>
                                <a href="{{route('Appointments')}}" class="{{ request()->is('Appointments')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Kalender</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::check() && !auth()->user()->hasRole('callagent'))
                <div class="pt-3">
                    <div class="row g-0">
                        <div class="col-auto pe-0 pe-lg-3">
                            <span class="bluePageIndicator {{request()->is('hr_view') ? 'activePage' : 'passivePageIndicator' }}">
                                <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                        </svg>
                                </span>
                        </div>
                        <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                            <div class="mx-auto text-center ">
                                @if(request()->is('hr_view'))

                                    <svg width="21" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8852 6H16.9154C15.6615 6 14.6441 6.81297 14.6441 7.81565V7.94884L17.5114 6.32089C17.514 6.3194 17.5173 6.31914 17.5201 6.31766C17.5173 6.3194 17.5147 6.3198 17.5123 6.3215L13.7258 9.10456L9.84322 10.4264C9.26974 10.6212 9.00269 11.1511 9.24654 11.6094C9.42991 11.9525 9.84688 12.1583 10.2857 12.1583C10.4331 12.1583 10.5829 12.135 10.7264 12.0857L14.7879 10.7034C14.9069 10.6632 15.0152 10.6071 15.1097 10.5374L19.0388 7.64895C19.0421 7.64655 19.0431 7.64292 19.0465 7.64052C19.0432 7.64332 19.0422 7.64681 19.0394 7.64964L15.5679 10.9358C15.4674 11.0309 15.3451 11.1018 15.2109 11.1479L15.0531 11.2015L14.6441 11.3406L14.6458 21.9177C14.6458 22.5155 15.2524 23 15.9997 23C16.3083 23 16.5903 22.914 16.8174 22.7745C16.6438 22.5187 16.5355 22.2299 16.5355 21.9177V15.4684H17.4382V21.9177C17.4382 22.5155 18.0446 23 18.7921 23C19.5393 23 20.1455 22.5155 20.1455 21.9177C20.1455 21.9177 20.1562 12.8188 20.1562 7.81561C20.1563 6.81297 19.1393 6 17.8852 6Z" fill="#2F60DC"/>
                                        <path d="M17.5802 5.46087C19.0893 5.46087 20.311 4.23884 20.311 2.73069C20.311 1.22203 19.0894 0 17.5802 0C16.0723 0 14.8496 1.22203 14.8496 2.73069C14.8496 4.23884 16.0724 5.46087 17.5802 5.46087Z" fill="#2F60DC"/>
                                        <path d="M2.73063 5.46087C4.23861 5.46087 5.46138 4.23884 5.46138 2.73069C5.46138 1.22203 4.23861 0 2.73063 0C1.2217 0 0 1.22203 0 2.73069C0 4.23884 1.2217 5.46087 2.73063 5.46087Z" fill="#2F60DC"/>
                                        <path d="M6.36673 8.96265L3.28682 6.64107L5.7952 8.15382V7.81565C5.7952 6.81297 4.75445 6 3.47172 6H2.47973C1.19655 6 0.15625 6.81297 0.15625 7.81565C0.15625 12.9789 0.167196 21.9177 0.167196 21.9177C0.167196 22.5155 0.787479 23 1.55179 23C2.31649 23 2.93677 22.5155 2.93677 21.9177V15.4684H3.86025V21.9177C3.86025 22.2298 3.74911 22.5187 3.57152 22.7745C3.80434 22.9139 4.09268 23 4.40849 23C5.1728 23 5.79347 22.5155 5.79347 21.9177L5.7952 11.3279L4.87352 10.8157L4.57893 10.6522C4.56179 10.6424 4.54531 10.6304 4.53196 10.618L1.68353 7.93955L4.87173 10.3425C4.94405 10.3964 5.02436 10.4433 5.11181 10.4811L8.91661 12.1374C8.82089 12.0416 8.7355 11.9384 8.67139 11.8215C8.35117 11.2335 8.57405 10.5776 9.15625 10.1774L6.36673 8.96265Z" fill="#2F60DC"/>
                                        </svg>
                                @else
                                    <a href="{{route('hr_view')}}" class="{{ request()->is('hr_view')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">

                                    <svg width="21" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.4575 7.92442C19.456 7.92668 19.4542 7.92927 19.4523 7.93207C19.4424 7.94637 19.425 7.97011 19.3997 7.99633L19.3916 8.00474L19.3832 8.01276L15.9116 11.299L15.9116 11.299C15.7539 11.4482 15.5678 11.554 15.3734 11.6208L15.3717 11.6213L15.2141 11.6749L15.2139 11.6749L15.1442 11.6986L15.1458 21.9176V21.9177C15.1458 22.1406 15.4182 22.5 15.9997 22.5C16.0429 22.5 16.0852 22.4976 16.1264 22.493C16.0687 22.3128 16.0355 22.1205 16.0355 21.9177V15.4684V14.9684H16.5355H17.4382H17.9382V15.4684V21.9177C17.9382 22.1406 18.2104 22.5 18.7921 22.5C19.3734 22.5 19.6455 22.1407 19.6455 21.9177V21.9171L20.1455 21.9177C19.6455 21.9171 19.6455 21.9171 19.6455 21.917V21.9167L19.6456 21.9154L19.6456 21.9105L19.6456 21.8908L19.6457 21.8137L19.646 21.5164L19.6472 20.4173C19.6482 19.4861 19.6496 18.1924 19.6509 16.7424C19.6536 13.8423 19.6562 10.317 19.6562 7.81561V7.81558C19.6563 7.18777 18.9734 6.5 17.8852 6.5H17.6484L17.6683 6.5337L17.8084 6.72438L17.8058 6.72629M19.4575 7.92442C19.4597 7.92105 19.4614 7.91843 19.4624 7.91699L19.4624 7.91687C19.4615 7.9184 19.4598 7.92098 19.4575 7.92442ZM19.4575 7.92442C19.4521 7.93245 19.4431 7.9452 19.4305 7.96041C19.4343 7.95573 19.4373 7.95174 19.4397 7.9487L19.4447 7.94192L19.4404 7.9476C19.4363 7.95296 19.4296 7.96156 19.4207 7.97175C19.4145 7.97878 19.4072 7.98675 19.3986 7.99529C19.3946 7.99932 19.3903 8.00348 19.3857 8.00773C19.3845 8.00893 19.3831 8.01013 19.3818 8.01134C19.3774 8.01539 19.3727 8.01948 19.3678 8.02359L19.2547 7.87707L19.1939 7.79828L18.7573 7.23267C18.741 7.24421 18.7264 7.256 18.7134 7.26759L14.8136 10.1345L14.8128 10.1351C14.7622 10.1724 14.7006 10.2051 14.6279 10.2297L14.6268 10.23L10.5653 11.6124L10.564 11.6128C10.4755 11.6432 10.3809 11.6583 10.2857 11.6583C9.9812 11.6583 9.7629 11.5143 9.68774 11.3742C9.64528 11.2941 9.6472 11.2189 9.68483 11.1442C9.72603 11.0625 9.824 10.961 10.004 10.8999L10.0044 10.8997L13.8869 9.57788L13.9598 9.55306L14.0219 9.50745L17.7841 6.74224C17.7859 6.74115 17.7877 6.74003 17.7895 6.73888L17.7892 6.7385L17.8058 6.72629M17.8058 6.72629L17.6775 6.54938L17.7889 6.738C17.7944 6.73436 17.8001 6.73047 17.8058 6.72629ZM19.0388 7.64895L18.6957 7.28653L18.6758 7.30537M19.0388 7.64895L18.6728 7.3082M19.0388 7.64895L19.0387 7.64897L19.0388 7.64895ZM18.6758 7.30537C18.689 7.29131 18.7057 7.27516 18.7263 7.25867L18.726 7.25833L18.714 7.26715C18.6983 7.28115 18.6845 7.29514 18.6728 7.3082M18.6758 7.30537C18.671 7.31047 18.6667 7.3153 18.6628 7.31976C18.6609 7.32201 18.6591 7.32417 18.6573 7.32623C18.662 7.3205 18.6672 7.31446 18.6728 7.3082M18.6758 7.30537L18.6728 7.3082M19.4638 7.91473C19.464 7.91444 19.4635 7.91516 19.463 7.91606L19.4634 7.91541L19.4638 7.91473Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M19.811 2.73067V2.73069C19.811 3.96267 18.8132 4.96087 17.5802 4.96087C16.3484 4.96087 15.3496 3.96255 15.3496 2.73069C15.3496 1.49825 16.3484 0.5 17.5802 0.5C18.8132 0.5 19.811 1.49815 19.811 2.73067Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M4.96138 2.73069C4.96138 3.96254 3.96262 4.96087 2.73063 4.96087C1.49783 4.96087 0.5 3.96268 0.5 2.73069C0.5 1.49813 1.49789 0.5 2.73063 0.5C3.96256 0.5 4.96138 1.49827 4.96138 2.73069Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M6.06577 9.36192L6.11294 9.39748L6.16711 9.42107L8.30056 10.3501C8.13494 10.6081 8.0359 10.8998 8.02418 11.2036L5.31139 10.0226L5.31016 10.0221C5.25915 10 5.21278 9.97295 5.17136 9.94223L1.98448 7.54026L1.34101 8.3038L4.18945 10.9823L4.18944 10.9823L4.19238 10.985C4.23508 11.0245 4.28269 11.0588 4.33127 11.0865L4.33126 11.0866L4.33622 11.0893L4.63064 11.2528L4.63081 11.2529L5.29516 11.6221L5.29347 21.9176V21.9177C5.29347 22.1314 5.01866 22.5 4.40849 22.5C4.36046 22.5 4.3136 22.4972 4.26809 22.4919C4.32652 22.3123 4.36025 22.1203 4.36025 21.9177V15.4684V14.9684H3.86025H2.93677H2.43677V15.4684V21.9177C2.43677 22.1315 2.16225 22.5 1.55179 22.5C0.941821 22.5 0.667196 22.1316 0.667196 21.9177L0.667195 21.9171L0.167196 21.9177C0.667195 21.9171 0.667195 21.9171 0.667195 21.917L0.667195 21.9167L0.667193 21.9155L0.667188 21.9106L0.667164 21.8913L0.667073 21.8155L0.666725 21.523L0.665485 20.4398C0.664459 19.5211 0.663091 18.2424 0.661723 16.8024C0.658986 13.9223 0.65625 10.397 0.65625 7.81565C0.65625 7.1969 1.35087 6.5 2.47973 6.5H3.35102L2.98585 7.04035L6.06577 9.36192ZM4.19998 6.60789C4.51856 6.70891 4.77604 6.8731 4.96111 7.06691L4.19998 6.60789Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    </svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col my-auto removeTextOnMobile">
                            <div>
                                <a href="{{route('hr_view')}}" class="{{ request()->is('hr_view')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">HR</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(!auth()->user()->hasRole('callagent') && !auth()->user()->hasRole('fs') && !auth()->user()->hasRole('salesmanager') && !auth()->user()->hasRole('backoffice'))
                    <div class="pt-3">
                        <div class="row g-0">
                            <div class="col-auto pe-0 pe-lg-3">
                                <span class="bluePageIndicator {{request()->is('finance') ? 'activePage' : 'passivePageIndicator' }}">
                                    <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                            </svg>
                                    </span>
                            </div>
                            <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                <div class="mx-auto text-center ">
                                    @if(request()->is('finance'))
                                        <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="4" width="18" height="9" fill="#2F60DC"/>
                                            <path d="M20.2927 0H5.14407C3.71769 0 2.55754 1.06117 2.55754 2.36567V2.57302C1.14468 2.58773 0 3.64193 0 4.93727V12.2971C0 13.6016 1.16038 14.6628 2.58654 14.6628H17.7352C19.1614 14.6628 20.3217 13.6016 20.3217 12.2971V12.0898C21.7343 12.0754 22.8793 11.0212 22.8793 9.72551V2.36578C22.8796 1.06128 21.7189 0 20.2927 0ZM18.6632 12.2971C18.6632 12.6803 18.2384 13.0038 17.7355 13.0038H2.58686C2.08397 13.0038 1.65924 12.6803 1.65924 12.2971V4.93738C1.65924 4.5544 2.08419 4.23073 2.58686 4.23073H17.7355C18.2384 4.23073 18.6632 4.55451 18.6632 4.93738V12.2971ZM20.3221 10.4299V4.93727C20.3221 3.63277 19.1617 2.5716 17.7355 2.5716H4.21645V2.36567C4.21645 1.98269 4.6414 1.65902 5.14407 1.65902H20.2927C20.7956 1.65902 21.2204 1.9828 21.2204 2.36567V9.72551H21.2207C21.2206 10.101 20.8118 10.4174 20.3221 10.4299Z" fill="#2F60DC"/>
                                            <path d="M10.1907 7.99572C9.49256 7.91254 9.13814 7.81301 9.13814 7.49883C9.13814 7.01217 9.84261 6.95963 10.1457 6.95963C10.5917 6.95963 11.0849 7.17526 11.2455 7.44039L11.3094 7.54625L12.3283 7.07486L12.2661 6.94796C11.9075 6.21559 11.2718 5.99439 10.781 5.90445V5.25635H9.58926V5.90107C8.53975 6.06449 7.91737 6.65558 7.91737 7.49861C7.91737 8.88574 9.21849 9.03117 10.0786 9.12765C10.8605 9.21998 11.2249 9.40771 11.2249 9.71819C11.2249 10.3188 10.3767 10.3654 10.1165 10.3654C9.53311 10.3654 8.97124 10.0765 8.80978 9.69301L8.75582 9.56557L7.65039 10.0339L7.7049 10.1613C8.01592 10.8896 8.68256 11.3489 9.58893 11.4633V12.162H10.7806V11.4284C11.6504 11.3212 12.4885 10.7649 12.4885 9.71786C12.4888 8.27917 11.1061 8.10877 10.1907 7.99572Z" fill="#F7F7F7"/>
                                        </svg>
                                    @else
                                        <a href="{{route('finance')}}" class="{{ request()->is('finance')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">

                                            <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.2927 0H5.14407C3.71769 0 2.55754 1.06117 2.55754 2.36567V2.57302C1.14468 2.58773 0 3.64193 0 4.93727V12.2971C0 13.6016 1.16038 14.6628 2.58654 14.6628H17.7352C19.1614 14.6628 20.3217 13.6016 20.3217 12.2971V12.0898C21.7343 12.0754 22.8793 11.0212 22.8793 9.72551V2.36578C22.8796 1.06128 21.7189 0 20.2927 0ZM18.6632 12.2971C18.6632 12.6803 18.2384 13.0038 17.7355 13.0038H2.58686C2.08397 13.0038 1.65924 12.6803 1.65924 12.2971V4.93738C1.65924 4.5544 2.08419 4.23073 2.58686 4.23073H17.7355C18.2384 4.23073 18.6632 4.55451 18.6632 4.93738V12.2971ZM20.3221 10.4299V4.93727C20.3221 3.63277 19.1617 2.5716 17.7355 2.5716H4.21645V2.36567C4.21645 1.98269 4.6414 1.65902 5.14407 1.65902H20.2927C20.7956 1.65902 21.2204 1.9828 21.2204 2.36567V9.72551H21.2207C21.2206 10.101 20.8118 10.4174 20.3221 10.4299Z" fill="#A7A4A4"/>
                                                <path d="M10.1907 7.99572C9.49256 7.91254 9.13814 7.81301 9.13814 7.49883C9.13814 7.01217 9.84261 6.95963 10.1457 6.95963C10.5917 6.95963 11.0849 7.17526 11.2455 7.44039L11.3094 7.54625L12.3283 7.07486L12.2661 6.94796C11.9075 6.21559 11.2718 5.99439 10.781 5.90445V5.25635H9.58926V5.90107C8.53975 6.06449 7.91737 6.65558 7.91737 7.49861C7.91737 8.88574 9.21849 9.03117 10.0786 9.12765C10.8605 9.21998 11.2249 9.40771 11.2249 9.71819C11.2249 10.3188 10.3767 10.3654 10.1165 10.3654C9.53311 10.3654 8.97124 10.0765 8.80978 9.69301L8.75582 9.56557L7.65039 10.0339L7.7049 10.1613C8.01592 10.8896 8.68256 11.3489 9.58893 11.4633V12.162H10.7806V11.4284C11.6504 11.3212 12.4885 10.7649 12.4885 9.71786C12.4888 8.27917 11.1061 8.10877 10.1907 7.99572Z" fill="#A7A4A4"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="col my-auto removeTextOnMobile">
                                <div>
                                    <a href="{{route('finance')}}" class="{{ request()->is('finance')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Finanzen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::check() && !auth()->user()->hasRole('callagent'))
                    <div class="pt-3">
                        <div class="row g-0">
                            <div class="col-auto pe-0 pe-lg-3">
                                <span class="bluePageIndicator {{request()->is('statistics') ? 'activePage' : 'passivePageIndicator' }}">
                                    <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                            </svg>
                                    </span>
                            </div>
                            <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                <div class="mx-auto text-center ">
                                    @if(request()->is('statistics'))
                                        <svg style="min-width: 8px; max-width: 20px;" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.3571 18.7143H15.8401V11.3353C15.8401 10.9802 15.5524 10.6924 15.1973 10.6924H13.007C12.6519 10.6924 12.3641 10.9802 12.3641 11.3353V18.7143H11.0855V8.23843C11.0855 7.88336 10.7977 7.59557 10.4426 7.59557H8.25236C7.89729 7.59557 7.6095 7.88336 7.6095 8.23843V18.7143H6.33093V5.11093C6.33093 4.75586 6.04314 4.46807 5.68807 4.46807H3.49779C3.14271 4.46807 2.85493 4.75586 2.85493 5.11093V18.7143H1.28571V0.642857C1.28571 0.287786 0.997929 0 0.642857 0C0.287786 0 0 0.287786 0 0.642857V19.3571C0 19.7122 0.287786 20 0.642857 20H19.3571C19.7122 20 20 19.7122 20 19.3571C20 19.0021 19.7122 18.7143 19.3571 18.7143ZM13.6499 11.9781H14.5544V18.7143H13.6499V11.9781ZM8.89529 8.88129H9.79986V18.7143H8.89529V8.88129ZM4.14064 5.75379H5.04521V18.7143H4.14064V5.75379Z" fill="#2F60DC"/>
                                            <rect x="3.63672" y="5.45453" width="1.81818" height="13.6364" fill="#2F60DC"/>
                                            <rect x="8.18359" y="8.18182" width="1.81818" height="10.9091" fill="#2F60DC"/>
                                            <rect x="13.6367" y="11.8182" width="1.81818" height="7.27273" fill="#2F60DC"/>
                                        </svg>
                                    @else
                                        <a href="{{route('statistics')}}" class="{{ request()->is('statistics')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">
                                            <svg style="min-width: 8px; max-width: 20px;" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.3571 18.7143H15.8401V11.3353C15.8401 10.9802 15.5524 10.6924 15.1973 10.6924H13.007C12.6519 10.6924 12.3641 10.9802 12.3641 11.3353V18.7143H11.0855V8.23843C11.0855 7.88336 10.7977 7.59557 10.4426 7.59557H8.25236C7.89729 7.59557 7.6095 7.88336 7.6095 8.23843V18.7143H6.33093V5.11093C6.33093 4.75586 6.04314 4.46807 5.68807 4.46807H3.49779C3.14271 4.46807 2.85493 4.75586 2.85493 5.11093V18.7143H1.28571V0.642857C1.28571 0.287786 0.997929 0 0.642857 0C0.287786 0 0 0.287786 0 0.642857V19.3571C0 19.7122 0.287786 20 0.642857 20H19.3571C19.7122 20 20 19.7122 20 19.3571C20 19.0021 19.7122 18.7143 19.3571 18.7143ZM13.6499 11.9781H14.5544V18.7143H13.6499V11.9781ZM8.89529 8.88129H9.79986V18.7143H8.89529V8.88129ZM4.14064 5.75379H5.04521V18.7143H4.14064V5.75379Z" fill="#A7A4A4"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col my-auto removeTextOnMobile">
                                <div>
                                    <a href="{{route('statistics')}}" class="{{ request()->is('statistics')  ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Statistik</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <hr class="navbarFirstHr my-3">
                </div>
                <div>
                    @if(Auth::check())
                    <div class="">
                        <div class="row g-0">
                            <div class="col-auto pe-0 pe-lg-3">
                                <span class="bluePageIndicator {{request()->is('addnewuser') ? 'activePage' : '' }}">
                                    <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                <div class="mx-auto text-center">
                                    @if(request()->is('addnewuser'))
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.1 13.25C16.9835 13.5139 16.9488 13.8067 17.0002 14.0905C17.0517 14.3744 17.187 14.6363 17.3887 14.8425L17.4413 14.895C17.604 15.0575 17.733 15.2505 17.8211 15.463C17.9092 15.6754 17.9545 15.9031 17.9545 16.1331C17.9545 16.3631 17.9092 16.5908 17.8211 16.8033C17.733 17.0157 17.604 17.2087 17.4413 17.3712C17.2787 17.534 17.0857 17.663 16.8733 17.7511C16.6608 17.8392 16.4331 17.8845 16.2031 17.8845C15.9731 17.8845 15.7454 17.8392 15.533 17.7511C15.3205 17.663 15.1275 17.534 14.965 17.3712L14.9125 17.3187C14.7063 17.117 14.4444 16.9817 14.1605 16.9302C13.8767 16.8788 13.5839 16.9135 13.32 17.03C13.0612 17.1409 12.8405 17.3251 12.685 17.5598C12.5296 17.7946 12.4461 18.0697 12.445 18.3512V18.5C12.445 18.9641 12.2606 19.4092 11.9324 19.7374C11.6042 20.0656 11.1591 20.25 10.695 20.25C10.2309 20.25 9.78575 20.0656 9.45756 19.7374C9.12937 19.4092 8.945 18.9641 8.945 18.5V18.4212C8.93823 18.1316 8.84448 17.8507 8.67595 17.6151C8.50741 17.3795 8.27189 17.2 8 17.1C7.73609 16.9835 7.44333 16.9488 7.15949 17.0002C6.87564 17.0517 6.61372 17.187 6.4075 17.3887L6.355 17.4413C6.19247 17.604 5.99947 17.733 5.78702 17.8211C5.57457 17.9092 5.34685 17.9545 5.11687 17.9545C4.8869 17.9545 4.65918 17.9092 4.44673 17.8211C4.23428 17.733 4.04128 17.604 3.87875 17.4413C3.71604 17.2787 3.58696 17.0857 3.4989 16.8733C3.41083 16.6608 3.3655 16.4331 3.3655 16.2031C3.3655 15.9731 3.41083 15.7454 3.4989 15.533C3.58696 15.3205 3.71604 15.1275 3.87875 14.965L3.93125 14.9125C4.13297 14.7063 4.26829 14.4444 4.31975 14.1605C4.37122 13.8767 4.33648 13.5839 4.22 13.32C4.10908 13.0612 3.92491 12.8405 3.69016 12.685C3.4554 12.5296 3.18031 12.4461 2.89875 12.445H2.75C2.28587 12.445 1.84075 12.2606 1.51256 11.9324C1.18437 11.6042 1 11.1591 1 10.695C1 10.2309 1.18437 9.78575 1.51256 9.45756C1.84075 9.12937 2.28587 8.945 2.75 8.945H2.82875C3.11837 8.93823 3.39925 8.84448 3.63489 8.67595C3.87052 8.50741 4.05 8.27189 4.15 8C4.26648 7.73609 4.30122 7.44333 4.24975 7.15949C4.19829 6.87564 4.06297 6.61372 3.86125 6.4075L3.80875 6.355C3.64604 6.19247 3.51696 5.99947 3.4289 5.78702C3.34083 5.57457 3.2955 5.34685 3.2955 5.11687C3.2955 4.8869 3.34083 4.65918 3.4289 4.44673C3.51696 4.23428 3.64604 4.04128 3.80875 3.87875C3.97128 3.71604 4.16428 3.58696 4.37673 3.4989C4.58918 3.41083 4.8169 3.3655 5.04688 3.3655C5.27685 3.3655 5.50457 3.41083 5.71702 3.4989C5.92947 3.58696 6.12247 3.71604 6.285 3.87875L6.3375 3.93125C6.54372 4.13297 6.80564 4.26829 7.08948 4.31975C7.37333 4.37122 7.66609 4.33648 7.93 4.22H8C8.2588 4.10908 8.47951 3.92491 8.63498 3.69016C8.79045 3.4554 8.87388 3.18031 8.875 2.89875V2.75C8.875 2.28587 9.05937 1.84075 9.38756 1.51256C9.71575 1.18437 10.1609 1 10.625 1C11.0891 1 11.5342 1.18437 11.8624 1.51256C12.1906 1.84075 12.375 2.28587 12.375 2.75V2.82875C12.3761 3.11031 12.4596 3.3854 12.615 3.62016C12.7705 3.85491 12.9912 4.03908 13.25 4.15C13.5139 4.26648 13.8067 4.30122 14.0905 4.24975C14.3744 4.19829 14.6363 4.06297 14.8425 3.86125L14.895 3.80875C15.0575 3.64604 15.2505 3.51696 15.463 3.4289C15.6754 3.34083 15.9031 3.2955 16.1331 3.2955C16.3631 3.2955 16.5908 3.34083 16.8033 3.4289C17.0157 3.51696 17.2087 3.64604 17.3712 3.80875C17.534 3.97128 17.663 4.16428 17.7511 4.37673C17.8392 4.58918 17.8845 4.8169 17.8845 5.04688C17.8845 5.27685 17.8392 5.50457 17.7511 5.71702C17.663 5.92947 17.534 6.12247 17.3712 6.285L17.3187 6.3375C17.117 6.54372 16.9817 6.80564 16.9302 7.08948C16.8788 7.37333 16.9135 7.66609 17.03 7.93V8C17.1409 8.2588 17.3251 8.47951 17.5598 8.63498C17.7946 8.79045 18.0697 8.87388 18.3512 8.875H18.5C18.9641 8.875 19.4092 9.05937 19.7374 9.38756C20.0656 9.71575 20.25 10.1609 20.25 10.625C20.25 11.0891 20.0656 11.5342 19.7374 11.8624C19.4092 12.1906 18.9641 12.375 18.5 12.375H18.4212C18.1397 12.3761 17.8646 12.4596 17.6298 12.615C17.3951 12.7705 17.2109 12.9912 17.1 13.25V13.25Z" fill="#2F60DC" stroke="#2F60DC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.625 13.25C12.0747 13.25 13.25 12.0747 13.25 10.625C13.25 9.17525 12.0747 8 10.625 8C9.17525 8 8 9.17525 8 10.625C8 12.0747 9.17525 13.25 10.625 13.25Z" stroke="#F7F6F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    @else
                                        <a href="{{route('addnewuser')}}" class="{{request()->is('addnewuser') ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 13.125C11.9497 13.125 13.125 11.9497 13.125 10.5C13.125 9.05025 11.9497 7.875 10.5 7.875C9.05025 7.875 7.875 9.05025 7.875 10.5C7.875 11.9497 9.05025 13.125 10.5 13.125Z" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.975 13.125C16.8585 13.3889 16.8238 13.6817 16.8752 13.9655C16.9267 14.2494 17.062 14.5113 17.2637 14.7175L17.3163 14.77C17.479 14.9325 17.608 15.1255 17.6961 15.338C17.7842 15.5504 17.8295 15.7781 17.8295 16.0081C17.8295 16.2381 17.7842 16.4658 17.6961 16.6783C17.608 16.8907 17.479 17.0837 17.3163 17.2462C17.1537 17.409 16.9607 17.538 16.7483 17.6261C16.5358 17.7142 16.3081 17.7595 16.0781 17.7595C15.8481 17.7595 15.6204 17.7142 15.408 17.6261C15.1955 17.538 15.0025 17.409 14.84 17.2462L14.7875 17.1937C14.5813 16.992 14.3194 16.8567 14.0355 16.8052C13.7517 16.7538 13.4589 16.7885 13.195 16.905C12.9362 17.0159 12.7155 17.2001 12.56 17.4348C12.4046 17.6696 12.3211 17.9447 12.32 18.2262V18.375C12.32 18.8391 12.1356 19.2842 11.8074 19.6124C11.4792 19.9406 11.0341 20.125 10.57 20.125C10.1059 20.125 9.66075 19.9406 9.33256 19.6124C9.00437 19.2842 8.82 18.8391 8.82 18.375V18.2962C8.81323 18.0066 8.71948 17.7257 8.55095 17.4901C8.38241 17.2545 8.14689 17.075 7.875 16.975C7.61109 16.8585 7.31833 16.8238 7.03449 16.8752C6.75064 16.9267 6.48872 17.062 6.2825 17.2637L6.23 17.3163C6.06747 17.479 5.87447 17.608 5.66202 17.6961C5.44957 17.7842 5.22185 17.8295 4.99187 17.8295C4.7619 17.8295 4.53418 17.7842 4.32173 17.6961C4.10928 17.608 3.91628 17.479 3.75375 17.3163C3.59104 17.1537 3.46196 16.9607 3.3739 16.7483C3.28583 16.5358 3.2405 16.3081 3.2405 16.0781C3.2405 15.8481 3.28583 15.6204 3.3739 15.408C3.46196 15.1955 3.59104 15.0025 3.75375 14.84L3.80625 14.7875C4.00797 14.5813 4.14329 14.3194 4.19475 14.0355C4.24622 13.7517 4.21148 13.4589 4.095 13.195C3.98408 12.9362 3.79991 12.7155 3.56516 12.56C3.3304 12.4046 3.05531 12.3211 2.77375 12.32H2.625C2.16087 12.32 1.71575 12.1356 1.38756 11.8074C1.05937 11.4792 0.875 11.0341 0.875 10.57C0.875 10.1059 1.05937 9.66075 1.38756 9.33256C1.71575 9.00437 2.16087 8.82 2.625 8.82H2.70375C2.99337 8.81323 3.27425 8.71948 3.50989 8.55095C3.74552 8.38241 3.925 8.14689 4.025 7.875C4.14148 7.61109 4.17622 7.31833 4.12475 7.03449C4.07329 6.75064 3.93797 6.48872 3.73625 6.2825L3.68375 6.23C3.52104 6.06747 3.39196 5.87447 3.3039 5.66202C3.21583 5.44957 3.1705 5.22185 3.1705 4.99187C3.1705 4.7619 3.21583 4.53418 3.3039 4.32173C3.39196 4.10928 3.52104 3.91628 3.68375 3.75375C3.84628 3.59104 4.03928 3.46196 4.25173 3.3739C4.46418 3.28583 4.6919 3.2405 4.92188 3.2405C5.15185 3.2405 5.37957 3.28583 5.59202 3.3739C5.80447 3.46196 5.99747 3.59104 6.16 3.75375L6.2125 3.80625C6.41872 4.00797 6.68064 4.14329 6.96448 4.19475C7.24833 4.24622 7.54109 4.21148 7.805 4.095H7.875C8.1338 3.98408 8.35451 3.79991 8.50998 3.56516C8.66545 3.3304 8.74888 3.05531 8.75 2.77375V2.625C8.75 2.16087 8.93437 1.71575 9.26256 1.38756C9.59075 1.05937 10.0359 0.875 10.5 0.875C10.9641 0.875 11.4092 1.05937 11.7374 1.38756C12.0656 1.71575 12.25 2.16087 12.25 2.625V2.70375C12.2511 2.98531 12.3346 3.2604 12.49 3.49516C12.6455 3.72991 12.8662 3.91408 13.125 4.025C13.3889 4.14148 13.6817 4.17622 13.9655 4.12475C14.2494 4.07329 14.5113 3.93797 14.7175 3.73625L14.77 3.68375C14.9325 3.52104 15.1255 3.39196 15.338 3.3039C15.5504 3.21583 15.7781 3.1705 16.0081 3.1705C16.2381 3.1705 16.4658 3.21583 16.6783 3.3039C16.8907 3.39196 17.0837 3.52104 17.2462 3.68375C17.409 3.84628 17.538 4.03928 17.6261 4.25173C17.7142 4.46418 17.7595 4.6919 17.7595 4.92188C17.7595 5.15185 17.7142 5.37957 17.6261 5.59202C17.538 5.80447 17.409 5.99747 17.2462 6.16L17.1937 6.2125C16.992 6.41872 16.8567 6.68064 16.8052 6.96448C16.7538 7.24833 16.7885 7.54109 16.905 7.805V7.875C17.0159 8.1338 17.2001 8.35451 17.4348 8.50998C17.6696 8.66545 17.9447 8.74888 18.2262 8.75H18.375C18.8391 8.75 19.2842 8.93437 19.6124 9.26256C19.9406 9.59075 20.125 10.0359 20.125 10.5C20.125 10.9641 19.9406 11.4092 19.6124 11.7374C19.2842 12.0656 18.8391 12.25 18.375 12.25H18.2962C18.0147 12.2511 17.7396 12.3346 17.5048 12.49C17.2701 12.6455 17.0859 12.8662 16.975 13.125V13.125Z" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col my-auto removeTextOnMobile">
                                <div>
                                    <a href="{{route('addnewuser')}}" class="{{request()->is('addnewuser') ? 'activePageIndicator' : 'passivePageIndicator' }} text-decoration-none">Einstellungen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                        @if(auth()->user()->admin_id != null)
                        <div class="pt-3">
                            <div class="row g-0">
                                <div class="col-auto pe-0 pe-lg-3">
                                <span class="bluePageIndicator">
                                    <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                    </svg>
                                </span>
                                </div>
                                <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                    <div class="mx-auto text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" viewBox="0 0 24 24" fill="none" stroke="#A7A4A4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    </div>
                                </div>
                                <div class="col my-auto removeTextOnMobile">
                                    <div>
                                        <a href="{{action('App\Http\Controllers\UserController@changerole')}}" class="passivePageIndicator text-decoration-none">Rolle wechseln</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="pt-3">
                        <div class="row g-0">
                            <div class="col-auto pe-0 pe-lg-3">
                                <span class="bluePageIndicator">
                                    <svg style="min-width: 8px;" viewBox="0 0 10 49" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L10 24L0 49V0Z" fill="#2F60DC" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col col-lg-2 me-0 me-lg-2 my-auto" style="margin-left: -8px;">
                                <div class="mx-auto text-center">

                                    <svg style="min-width: 15px; max-width: 21px;" viewBox="0 0 18 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.80469 15.3333H2.13802C1.1255 15.3333 0.304688 14.5125 0.304688 13.5V2.49999C0.304688 1.48747 1.1255 0.666656 2.13802 0.666656H5.80469V2.49999H2.13802V13.5H5.80469V15.3333Z"
                                            fill="#A7A4A4" />
                                        <path
                                            d="M10.6877 12.9363L11.9896 11.6454L8.39698 8.02219H16.778C17.2842 8.02219 17.6946 7.6118 17.6946 7.10552C17.6946 6.59925 17.2842 6.18885 16.778 6.18885H8.37938L12.0281 2.57095L10.7372 1.2691L4.87891 7.07793L10.6877 12.9363Z"
                                            fill="#A7A4A4" />
                                    </svg>

                                </div>
                            </div>
                            <div class="col my-auto removeTextOnMobile">
                                <div>
                                    <a href="{{route('logout')}}" class=" passivePageIndicator text-decoration-none">Abmelden</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-11 col-lg-10">
            <div class="p-3 p-sm-4">
                <div class="mb-4">
                    <div class="">
                        <div class="row g-0">
                            <div class="col-12 col-lg-6 col-xl-5 h-auto">
                                <div class=" h-100">
                                    <div class="greyBgStats h-100 p-3 p-sm-4">
                                        <div>
                                            <div class="row g-0 justify-content-between" style="position: relative;">
                                                <div class="col my-auto">
                                                    <div>
                                                        <span class="statsTitleSpan fs-3">Status vom Vertrag</span>
                                                    </div>
                                                </div>
                                                <div class="col-auto my-auto">
                                                    <div class="statsSelectStyle py-1" onclick="openDropDownSelect()"
                                                        style="cursor: pointer;">
                                                        <div class="row g-0">
                                                            <div class="col ms-2">
                                                                <div>
                                                                    <span id="activeDropDownItem">Gesamter Zeitraum</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto my-auto mx-2 me-1">
                                                                <div>
                                                                    <svg width="10" height="6" viewBox="0 0 10 6"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9 1L5 5L1 1" stroke="black"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="statsSelectStyleDropdown" id="dropdownSelectId"
                                                        style="display: none;">
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,1)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg width="19" height="19" viewBox="0 0 19 19"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span id="rtest">Heute</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,7)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg class="" width="19"
                                                                            height="19" viewBox="0 0 19 19" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Letzte 7 Tage</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,30)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg width="19" height="19" viewBox="0 0 19 19"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Letzte 30 Tage</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,120)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg width="19" height="19" viewBox="0 0 19 19"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Letztes Quartal</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,365)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg width="19" height="19" viewBox="0 0 19 19"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Letztes Jahr</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2">
                                                            <div class="row g-0"
                                                                onclick="makeSelectActive(this,0)">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg class="activeSvg" width="19"
                                                                            height="19" viewBox="0 0 19 19" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                stroke="#E0E0E0" />
                                                                            <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Gesamter Zeitraum</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2"
                                                            style="border-top: 1px solid #E8E8E8;">
                                                            <div class="row g-0" onclick="statusvomvertragCostum()" style="cursor: pointer">
                                                                <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <svg width="18" height="12" viewBox="0 0 12 12"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                fill="black" />
                                                                        </svg>

                                                                    </div>
                                                                </div>
                                                                <div class="col my-auto ps-2 pe-5">
                                                                    <div>
                                                                        <span>Individueller Zeitraum</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="statusvomvertragCostum" style="display: none">
                                                            <div class="py-2">
                                                                <div class="row g-0">
                                                                    {{-- <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <span class="fs-6">Aus</span>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="col my-auto ps-2 pe-2">
                                                                        <div>
                                                                            <input class="form-control" type="date" id="statusvomvertragFromm" name="statusvomvertragFrom">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1">
                                                                <div class="row g-0">
                                                                    {{-- <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <span class="fs-6">Zu</span>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="col my-auto ps-2 pe-2">
                                                                        <div>
                                                                           <input class="form-control" type="date" id="statusvomvertragToo" name="statusvomvertragTo">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pb-2 pt-2">
                                                                <div class="row g-0">
                                                                    <div class="col my-auto ps-2 pe-2">
                                                                        <div>
                                                                           <input onclick="makeSelectActive(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <div class="greyBorderDivStats p-2">
                                                <div class="row g-0">
                                                    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('backoffice') || Auth::user()->hasRole('salesmanager'))
                                                        <div class="col pe-2">
                                                            <div class="">
                                                                <div class="row g-0">
                                                                    <select class="form-select greySelectStats"
                                                                        style="border: none !important;"
                                                                        aria-label="Default select example"
                                                                        name="berater" id="berater">
                                                                        <option value="all">Alle</option>
                                                                        @foreach ($adminsStat as $admin)
                                                                            <option value="{{ $admin->id }}">
                                                                                {{ ucfirst($admin->name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col pe-2">
                                                        <div class="">
                                                            <div class="row g-0">
                                                                <select class="form-select greySelectStats"
                                                                    style="border: none !important;"
                                                                    aria-label="Default select example" name="model"
                                                                    id="model">
                                                                    <option value="all">Alle</option>
                                                                    <option value="Grundversicherung">Grundversicherung
                                                                    </option>
                                                                    <option value="Zusatzversicherung">
                                                                        Zusatzversicherung</option>
                                                                    <option value="Autoversicherung">Autoversicherung
                                                                    </option>
                                                                    <option value="Hasurat">Hausrat</option>
                                                                    <option value="Vorsorge">Vorsorge</option>
                                                                    <option value="Rechtsschutz">Rechtsschutz</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pe-2">
                                                        <div class="">
                                                            <div class="row g-0">
                                                                <select class="form-select greySelectStats"
                                                                    style="border: none !important;"
                                                                    aria-label="Default select example"
                                                                    name="gesellschaft" id="gesellschaft">
                                                                    <option value="all">Alle</option>
                                                                    <option value="Sympany">Sympany</option>
                                                                    <option value="Helsana">Helsana</option>
                                                                    <option value="Swica">Swica</option>
                                                                    <option value="GM">GM</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button style="border: none;background-color: transparent"
                                                        onclick="statisticContrats()" class="col-auto my-auto">
                                                        <svg width="17" height="17" viewBox="0 0 19 19" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M18.3312 17.2279L13.0046 11.8974C14.0547 10.6381 14.6863 9.02865 14.6863 7.27086C14.6863 3.26066 11.3952 0 7.34696 0C3.29871 0 0 3.26447 0 7.27467C0 11.2849 3.2911 14.5455 7.33935 14.5455C9.05909 14.5455 10.6419 13.9558 11.8974 12.9704L17.2431 18.316C17.5551 18.628 18.0193 18.628 18.3312 18.316C18.6432 18.004 18.6432 17.5399 18.3312 17.2279ZM1.55994 7.27467C1.55994 4.12434 4.15478 1.56375 7.33935 1.56375C10.5239 1.56375 13.1187 4.12434 13.1187 7.27467C13.1187 10.425 10.5239 12.9856 7.33935 12.9856C4.15478 12.9856 1.55994 10.4212 1.55994 7.27467Z"
                                                                fill="#5E5A5A" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 row g-0">
                                            <div class="col-12 col-sm-6 my-auto">
                                                <div id="chart1" style="height: 300px;">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 my-auto ps-0 ps-sm-4 pt-4 pt-sm-0">
                                                <div class="">
                                                    <div class="row g-0 pb-3">
                                                        <div class="col-auto my-auto me-2">
                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                    fill="#43B21C" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="font-weight: 500;">Provisionert</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <span style="font-weight: 700;" id="provisionert"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row g-0 pb-3">
                                                        <div class="col-auto my-auto me-2">
                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                    fill="#9FD78C" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="font-weight: 500;">Aufgenommen</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <span style="font-weight: 700;" id="aufgenommen"></span>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row g-0 pb-3">
                                                        <div class="col-auto my-auto me-2">
                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                    fill="#F79C42" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="font-weight: 500;">Offen (Berater)</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <span style="font-weight: 700;" id="offenBerater"></span>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="row g-0 pb-3"> --}}
                                                    {{-- <div class="col-auto my-auto me-2"> --}}
                                                    {{-- <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                                    {{-- <ellipse cx="9" cy="8.5" rx="9" ry="8.5" fill="#F79C42"/> --}}
                                                    {{-- </svg> --}}
                                                    {{-- </div> --}}
                                                    {{-- <div class="col"> --}}
                                                    {{-- <span style="font-weight: 500;">Offen (Innendienst)</span> --}}
                                                    {{-- </div> --}}
                                                    {{-- <div class="col-2 text-end"> --}}
                                                    {{-- <span style="font-weight: 700;" id="offenInnendienst"></span> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    <div class="row g-0 pb-3">
                                                        <div class="col-auto my-auto me-2">
                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                    fill="#C4C4C4" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="font-weight: 500;">Eingereicht</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <span style="font-weight: 700;" id="eingereicht"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row g-0 pb-3">
                                                        <div class="col-auto my-auto me-2">
                                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                    fill="#DB5437" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <span style="font-weight: 500;">Abgelehnt</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <span style="font-weight: 700;" id="abgelehnt"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-7 pb-0 pb-sm-4 pb-lg-0 h-auto">
                                <div class="ms-0 ms-lg-4 mt-3 mt-sm-4 mt-lg-0 greyBgStats h-100 p-3 p-sm-4">
                                    <div>
                                        <div class="row g-0 justify-content-between" style="position: relative;">
                                            <div class="col my-auto">
                                                <div>
                                                    <span class="statsTitleSpan fs-3">Verträge</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div class="statsSelectStyle py-1" onclick="openDropDownSelect1()"
                                                    style="cursor: pointer;">
                                                    <div class="row g-0">
                                                        <div class="col ms-2">
                                                            <div>
                                                                <span id="activeDropDownItem1">Gesamter Zeitraum</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto my-auto mx-2 me-1">
                                                            <div>
                                                                <svg width="10" height="6" viewBox="0 0 10 6"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 1L5 5L1 1" stroke="black"
                                                                        stroke-width="2" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="statsSelectStyleDropdown" id="dropdownSelectId1"
                                                    style="display: none;">
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,1)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg width="19" height="19" viewBox="0 0 19 19"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Heute</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,7)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg class="activeSvg1" width="19" height="19"
                                                                        viewBox="0 0 19 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Letzte 7 Tage</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,30)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg width="19" height="19" viewBox="0 0 19 19"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Letzte 30 Tage</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,120)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg width="19" height="19" viewBox="0 0 19 19"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Letztes Quartal</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,365)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg width="19" height="19" viewBox="0 0 19 19"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Letztes Jahr</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-2">
                                                        <div class="row g-0"
                                                            onclick="makeSelectActive1(this,0)">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg  width="19" height="19"
                                                                        viewBox="0 0 19 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                            stroke="#E0E0E0" />
                                                                        <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                            fill="white" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Gesamter Zeitraum</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="py-2" style="border-top: 1px solid #E8E8E8;">
                                                        <div class="row g-0" onclick="vertrageCostum()" style="cursor: pointer">
                                                            <div class="col-auto my-auto ps-3">
                                                                <div>
                                                                    <svg width="18" height="12" viewBox="0 0 12 12"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                            fill="black" />
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                            <div class="col my-auto ps-2 pe-5">
                                                                <div>
                                                                    <span>Individueller Zeitraum</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="vertrageCostum" style="display: none">
                                                        <div class="py-2">
                                                            <div class="row g-0">
                                                                {{-- <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <span class="fs-6">Aus</span>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col my-auto ps-2 pe-2">
                                                                    <div>
                                                                        <input class="form-control" type="date" id="vertrageFrom">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pt-1">
                                                            <div class="row g-0">
                                                                {{-- <div class="col-auto my-auto ps-3">
                                                                    <div>
                                                                        <span class="fs-6">Zu</span>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col my-auto ps-2 pe-2">
                                                                    <div>
                                                                       <input class="form-control" type="date" id="vertrageTo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-2 pt-2">
                                                            <div class="row g-0">
                                                                <div class="col my-auto ps-2 pe-2">
                                                                    <div>
                                                                       <input onclick="makeSelectActive1(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class="row g-2">
                                            {{-- grund --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#D3E2CD" />
                                                                <path
                                                                    d="M50.3199 18.0194C49.8904 17.6965 49.334 17.595 48.8182 17.7456C47.8719 18.0217 46.9065 18.1617 45.949 18.1617C43.1999 18.1617 40.4774 17.3564 38.4799 15.9521C36.716 14.7123 35.7044 13.164 35.7044 11.7044C35.7044 10.7631 34.9412 10 33.9999 10C33.0586 10 32.2955 10.7631 32.2955 11.7044C32.2955 13.164 31.2839 14.7123 29.5201 15.9522C27.5226 17.3564 24.8003 18.1617 22.0511 18.1617C21.0935 18.1617 20.1281 18.0217 19.1819 17.7456C18.6659 17.595 18.1096 17.6966 17.6802 18.0194C17.2508 18.3424 16.9988 18.8488 17 19.386C17.0231 28.4503 21.0068 35.5822 23.3793 39.0267C25.0388 41.4357 26.897 43.5138 28.7535 45.0363C30.1223 46.159 32.1438 47.4974 33.9999 47.4974C35.8561 47.4974 37.8775 46.159 39.2465 45.0363C41.103 43.5138 42.9612 41.4357 44.6206 39.0267C46.9932 35.5822 50.9769 28.4503 51 19.386C51.0014 18.8488 50.7493 18.3424 50.3199 18.0194ZM41.8133 37.093C38.4082 42.0365 35.0442 44.0885 33.9999 44.0885C32.9557 44.0885 29.5917 42.0365 26.1865 37.0931C24.226 34.2467 21.0507 28.6285 20.4934 21.4794C21.0119 21.5401 21.5318 21.5707 22.051 21.5707C25.5359 21.5707 28.8847 20.5657 31.4805 18.741C32.4887 18.0322 33.3357 17.2276 33.9999 16.3625C34.6643 17.2277 35.5111 18.0322 36.5194 18.741C39.1152 20.5657 42.464 21.5707 45.9489 21.5707C46.4679 21.5707 46.9879 21.5401 47.5064 21.4794C46.9491 28.6285 43.7739 34.2466 41.8133 37.093Z"
                                                                    fill="#228400" />
                                                                <path
                                                                    d="M34.0003 29.1156C36.2981 29.1156 38.1608 27.2529 38.1608 24.9551C38.1608 22.6573 36.2981 20.7946 34.0003 20.7946C31.7026 20.7946 29.8398 22.6573 29.8398 24.9551C29.8398 27.2529 31.7026 29.1156 34.0003 29.1156Z"
                                                                    fill="#228400" />
                                                                <path
                                                                    d="M34 29.1156C30.4258 29.1156 27.5283 32.0129 27.5283 35.5874H40.4717C40.4717 32.0129 37.5742 29.1156 34 29.1156Z"
                                                                    fill="#228400" />
                                                            </svg>


                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Grundversicherung</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                    id="grund" ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            {{-- zuzat --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#FEE4CB" />
                                                                <path
                                                                    d="M50.3199 18.0194C49.8904 17.6965 49.334 17.595 48.8182 17.7456C47.8719 18.0217 46.9065 18.1617 45.949 18.1617C43.1999 18.1617 40.4774 17.3564 38.4799 15.9521C36.716 14.7123 35.7044 13.164 35.7044 11.7044C35.7044 10.7631 34.9412 10 33.9999 10C33.0586 10 32.2955 10.7631 32.2955 11.7044C32.2955 13.164 31.2839 14.7123 29.5201 15.9522C27.5226 17.3564 24.8003 18.1617 22.0511 18.1617C21.0935 18.1617 20.1281 18.0217 19.1819 17.7456C18.6659 17.595 18.1096 17.6966 17.6802 18.0194C17.2508 18.3424 16.9988 18.8488 17 19.386C17.0231 28.4503 21.0068 35.5822 23.3793 39.0267C25.0388 41.4357 26.897 43.5138 28.7535 45.0363C30.1223 46.159 32.1438 47.4974 33.9999 47.4974C35.8561 47.4974 37.8775 46.159 39.2465 45.0363C41.103 43.5138 42.9612 41.4357 44.6206 39.0267C46.9932 35.5822 50.9769 28.4503 51 19.386C51.0014 18.8488 50.7493 18.3424 50.3199 18.0194ZM41.8133 37.093C38.4082 42.0365 35.0442 44.0885 33.9999 44.0885C32.9557 44.0885 29.5917 42.0365 26.1865 37.0931C24.226 34.2467 21.0507 28.6285 20.4934 21.4794C21.0119 21.5401 21.5318 21.5707 22.051 21.5707C25.5359 21.5707 28.8847 20.5657 31.4805 18.741C32.4887 18.0322 33.3357 17.2276 33.9999 16.3625C34.6643 17.2277 35.5111 18.0322 36.5194 18.741C39.1152 20.5657 42.464 21.5707 45.9489 21.5707C46.4679 21.5707 46.9879 21.5401 47.5064 21.4794C46.9491 28.6285 43.7739 34.2466 41.8133 37.093Z"
                                                                    fill="#FF9B37" />
                                                                <path
                                                                    d="M34.0003 29.1156C36.2981 29.1156 38.1608 27.2529 38.1608 24.9551C38.1608 22.6573 36.2981 20.7946 34.0003 20.7946C31.7026 20.7946 29.8398 22.6573 29.8398 24.9551C29.8398 27.2529 31.7026 29.1156 34.0003 29.1156Z"
                                                                    fill="#FF9B37" />
                                                                <path
                                                                    d="M34 29.1156C30.4258 29.1156 27.5283 32.0129 27.5283 35.5874H40.4717C40.4717 32.0129 37.5742 29.1156 34 29.1156Z"
                                                                    fill="#FF9B37" />
                                                            </svg>

                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Zusatzversicherung</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                    id="zus"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Auto --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#D3E2CD" />
                                                                <path
                                                                    d="M40.46 11C43.1922 11 45.5741 12.7541 46.2383 15.2554L46.9443 17.9201H48.6178C49.3138 17.9201 49.8889 18.4082 49.98 19.0416L49.9925 19.2176C49.9925 19.8745 49.4752 20.4174 48.8044 20.5033L48.6178 20.5152H47.6354L48.0166 21.945C49.2058 22.628 50 23.8628 50 25.2727V39.9724C50 41.6445 48.5639 43 46.7924 43H44.0355C42.264 43 40.8279 41.6445 40.8279 39.9724L40.8261 37.8154H26.1719L26.1721 39.9724C26.1721 41.6445 24.736 43 22.9645 43H20.2076C18.4361 43 17 41.6445 17 39.9724V25.2727C17 23.8631 17.7939 22.6284 18.9828 21.9453L19.3626 20.5152H18.3747C17.6787 20.5152 17.1036 20.027 17.0126 19.3937L17 19.2176C17 18.5607 17.5172 18.0179 18.1882 17.932L18.3747 17.9201H20.0481L20.7556 15.2589C21.4186 12.7559 23.8013 11 26.5347 11H40.46ZM23.4225 37.8154H19.7475L19.7494 39.9724C19.7494 40.2112 19.9545 40.405 20.2076 40.405H22.9645C23.2175 40.405 23.4227 40.2112 23.4227 39.9724L23.4225 37.8154ZM47.2504 37.8154H43.5754L43.5773 39.9724C43.5773 40.2112 43.7824 40.405 44.0355 40.405H46.7924C47.0455 40.405 47.2506 40.2112 47.2506 39.9724L47.2504 37.8154ZM45.8759 23.9752H21.1241C20.3648 23.9752 19.7494 24.5562 19.7494 25.2727V35.2204H47.2506V25.2727C47.2506 24.5562 46.6351 23.9752 45.8759 23.9752ZM30.2868 30.0303H36.7051C37.4645 30.0303 38.0798 30.6113 38.0798 31.3278C38.0798 31.9847 37.5627 32.5276 36.8917 32.6136L36.7051 32.6254H30.2868C29.5276 32.6254 28.9121 32.0444 28.9121 31.3278C28.9121 30.6709 29.4293 30.1281 30.1002 30.0421L30.2868 30.0303ZM42.6608 26.5703C43.673 26.5703 44.4936 27.3448 44.4936 28.3003C44.4936 29.2556 43.673 30.0301 42.6608 30.0301C41.6485 30.0301 40.8279 29.2556 40.8279 28.3003C40.8279 27.3448 41.6485 26.5703 42.6608 26.5703ZM24.3316 26.5703C25.3439 26.5703 26.1645 27.3448 26.1645 28.3003C26.1645 29.2556 25.3439 30.0301 24.3316 30.0301C23.3193 30.0301 22.4987 29.2556 22.4987 28.3003C22.4987 27.3448 23.3193 26.5703 24.3316 26.5703ZM40.46 13.595H26.5347C25.0628 13.595 23.7799 14.5405 23.4229 15.8883L21.9683 21.3802H45.0306L43.5714 15.8864C43.2138 14.5396 41.9311 13.595 40.46 13.595Z"
                                                                    fill="#238400" />
                                                            </svg>

                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Autoversicherung</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                        id="auto"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- vorsorge --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8592 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#C0C4DC" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M28.273 13.5693C28.273 12.0544 29.4698 10.827 30.9454 10.827C32.421 10.827 33.6179 12.0544 33.6179 13.5693C33.6179 15.0841 32.421 16.3115 30.9454 16.3115C29.4698 16.3115 28.273 15.0841 28.273 13.5693ZM30.9454 9C28.4852 9 26.4914 11.0461 26.4914 13.5693C26.4914 14.0477 26.5631 14.5089 26.696 14.9424H26.1645C25.7531 14.9424 25.2966 15.1129 24.9013 15.3256C24.4784 15.5531 24.0212 15.885 23.5978 16.3189C22.7463 17.1912 22 18.512 22 20.2503C22 22.389 22.6916 23.9514 23.547 24.9896C23.9701 25.5033 24.4319 25.8868 24.8653 26.1469C24.9964 26.2255 25.1336 26.2982 25.2738 26.3604V43.5932C25.2738 44.919 26.3278 46 27.6206 46L27.6239 45.9999H27.6345L27.6377 46C28.9305 46 29.9846 44.919 29.9846 43.5932V33.8624H31.9888V43.5932C31.9888 44.919 33.0429 46 34.3357 46L34.339 45.9999H34.3496L34.3528 46C35.6456 46 36.6997 44.919 36.6997 43.5932V26.4781L36.9145 27.1093C37.2163 27.9966 37.9983 28.5717 38.8576 28.6354C38.1332 29.1257 37.6552 29.9679 37.6552 30.9245V31.5336C37.6552 32.0381 38.0541 32.4471 38.546 32.4471C39.038 32.4471 39.4368 32.0381 39.4368 31.5336V30.9245C39.4368 30.42 39.8356 30.011 40.3276 30.011C40.8196 30.011 41.2184 30.42 41.2184 30.9245V43.7138C41.2184 44.2184 41.6172 44.6273 42.1092 44.6273C42.6012 44.6273 43 44.2184 43 43.7138V30.9245C43 29.42 41.8178 28.1987 40.3541 28.184C41.1094 27.6031 41.4473 26.5675 41.1198 25.6045L38.222 17.0872C37.7851 15.8034 36.6042 14.9433 35.2782 14.9433H35.1946C35.3277 14.5095 35.3995 14.048 35.3995 13.5693C35.3995 11.0461 33.4057 9 30.9454 9ZM26.1645 16.7694H27.7662C28.5744 17.6143 29.7002 18.1385 30.9454 18.1385C32.1902 18.1385 33.3157 17.6147 34.1238 16.7703H35.2782C35.8465 16.7703 36.3525 17.1389 36.5398 17.6891L39.4376 26.2065C39.5187 26.4446 39.3961 26.7051 39.1638 26.7882C38.9316 26.8713 38.6776 26.7455 38.5965 26.5074L36.65 20.786L34.9181 21.0869V43.5932C34.9181 43.91 34.6617 44.173 34.3528 44.173L34.3496 44.1729H34.339L34.3357 44.173C34.0269 44.173 33.7704 43.91 33.7704 43.5932V32.9489V32.0354H32.8796H29.0938H28.203V32.9489V43.5932C28.203 43.91 27.9467 44.173 27.6377 44.173L27.6345 44.1729H27.6239L27.6206 44.173C27.3118 44.173 27.0553 43.91 27.0553 43.5932V25.6628V24.7493H27.0528V19.9623H25.2712V24.1955C25.151 24.0849 25.0284 23.9569 24.9078 23.8106C24.3265 23.1049 23.7816 21.961 23.7816 20.2503C23.7816 19.0875 24.2718 18.2109 24.857 17.6114C25.1519 17.3093 25.4631 17.0865 25.729 16.9434C25.9842 16.8062 26.1331 16.7761 26.1605 16.7705C26.1646 16.7697 26.166 16.7694 26.1645 16.7694Z"
                                                                    fill="#515C9F" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Vorsorge
                                                                        3a&3b</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                        id="vor"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- reschutz --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158V12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514V2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435V1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351V25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8593 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318V54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#FBEBEB" />
                                                                <path
                                                                    d="M22.8929 27.5H19.4142C18.5233 27.5 18.0771 26.4229 18.7071 25.7929L32.7929 11.7071C33.1834 11.3166 33.8166 11.3166 34.2071 11.7071L48.2929 25.7929C48.9229 26.4229 48.4767 27.5 47.5858 27.5H43.7143"
                                                                    stroke="#FF9797" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                                <path d="M21.3213 28.2857V42.0357" stroke="#FF9797"
                                                                    stroke-width="3" stroke-linecap="round" />
                                                                <path d="M46.0713 28.2857V42.0357" stroke="#FF9797"
                                                                    stroke-width="3" stroke-linecap="round" />
                                                                <path d="M48.7627 42.4285L19.0627 42.4285"
                                                                    stroke="#FF9797" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                                <path
                                                                    d="M36.3379 29.4462C37.095 28.689 37.5134 27.6794 37.5134 26.6081C37.5134 25.5368 37.095 24.5272 36.3379 23.7701C35.5789 23.0129 34.5711 22.5946 33.4998 22.5946C32.4285 22.5946 31.4207 23.0129 30.6618 23.7701C29.9046 24.5272 29.4863 25.5368 29.4863 26.6081C29.4863 27.6794 29.9046 28.6872 30.6618 29.4462C31.1524 29.9368 31.7472 30.2845 32.3967 30.468V33.8303V36.6842V38.038C32.3967 38.6469 32.8909 39.141 33.4998 39.141C34.1087 39.141 34.6029 38.6469 34.6029 38.038V37.7873H35.2348C35.8437 37.7873 36.3379 37.2931 36.3379 36.6842C36.3379 36.0753 35.8437 35.5811 35.2348 35.5811H34.6029V34.9334H35.2348C35.8437 34.9334 36.3379 34.4392 36.3379 33.8303C36.3379 33.2214 35.8437 32.7272 35.2348 32.7272H34.6029V30.4681C35.2524 30.2845 35.8472 29.9368 36.3379 29.4462ZM31.6925 26.6081C31.6925 25.6109 32.5026 24.8008 33.4998 24.8008C34.497 24.8008 35.3071 25.6109 35.3071 26.6081C35.3071 27.6053 34.497 28.4154 33.4998 28.4154C32.5026 28.4154 31.6925 27.6035 31.6925 26.6081Z"
                                                                    fill="#FF9797" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Rechtschutz</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                        id="rechts"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- hausrat --}}
                                            <div class="col-12 col-sm-6 col-md-6 col-xl-6 col-xxl-6 h-auto">
                                                <div class="contractsWhiteBgDiv h-100 p-2">
                                                    <div class="row g-0">
                                                        <div class="col-auto">
                                                            <svg width="66" height="56" viewBox="0 0 66 56" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.35752 16.0794C7.21124 15.0923 7.97885 14.0339 8.65194 12.9158V12.9158C13.3686 5.08053 22.3319 0.814898 31.3914 2.06514V2.06514C34.3686 2.47601 37.4069 2.29858 40.3152 1.54046L43.0759 0.820823C45.1112 0.29027 47.2678 0.486016 49.1743 1.37435V1.37435C57.1345 5.08333 62.7629 12.4682 64.2287 21.1269L64.9438 25.351V25.351C66.726 32.9666 62.9412 40.7915 55.8644 44.1221L52.8593 45.5364C50.9936 46.4145 49.27 47.5671 47.7458 48.9559L44.5541 51.8641C40.4598 55.5948 34.5515 56.5621 29.4813 54.3318V54.3318C26.9477 53.2173 24.1407 52.8785 21.4146 53.3582L20.8936 53.4498C14.5122 54.5727 8.09426 51.6732 4.71881 46.1424L3.01034 43.3431C1.04159 40.1173 0 36.4112 0 32.6321V28.0689C0 25.077 1.07708 22.1851 3.03423 19.9221L6.35752 16.0794Z"
                                                                    fill="#DCEBFF" />
                                                                <path
                                                                    d="M21.8571 26.4H18.4142C17.5233 26.4 17.0771 25.3229 17.7071 24.6929L31.6929 10.7071C32.0834 10.3166 32.7166 10.3166 33.1071 10.7071L47.0929 24.6929C47.7229 25.3229 47.2767 26.4 46.3858 26.4H42.5524"
                                                                    stroke="#3670BD" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                                <path d="M20.2949 27.181V40.8476" stroke="#3670BD"
                                                                    stroke-width="3" stroke-linecap="round" />
                                                                <path d="M44.8955 27.181V40.8476" stroke="#3670BD"
                                                                    stroke-width="3" stroke-linecap="round" />
                                                                <path d="M47.5703 41.238L18.0503 41.238"
                                                                    stroke="#3670BD" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                                <line x1="26.9557" y1="35.4737" x2="37.8374" y2="24.816"
                                                                    stroke="#3670BD" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                                <circle cx="37.0857" cy="34.2096" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="37.0857" cy="34.2096" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="37.0857" cy="34.2096" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="37.0857" cy="34.2096" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="28.4949" cy="26.4001" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="28.4949" cy="26.4001" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="28.4949" cy="26.4001" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                                <circle cx="28.4949" cy="26.4001" r="2.12381"
                                                                    stroke="#3670BD" stroke-width="2" />
                                                            </svg>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-end">
                                                                <div>
                                                                    <span class="contractsFirstSpan">Hausrat</span>
                                                                </div>
                                                                <div>
                                                                    <span class="contractsSecondSpan fs-4"
                                                                        id="haus"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="my-3 my-sm-4">
                        <div class="row g-0">
                            <div class="col-12 col-lg-6 col-xl-7">
                                <div class="">
                                    <div class="h-100">
                                        <div class="greyBgStats h-100 p-3 p-sm-4">
                                            <div>
                                                <div class="row g-0 justify-content-between"
                                                    style="position: relative;">
                                                    <div class="col my-auto">
                                                        <div>
                                                            <span class="statsTitleSpan fs-3">Kunden</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto my-auto">
                                                        <div class="statsSelectStyle py-1"
                                                            onclick="openDropDownSelect2()" style="cursor: pointer;">
                                                            <div class="row g-0">
                                                                <div class="col ms-2">
                                                                    <div>
                                                                        <span id="activeDropDownItem2">Gesamter Zeitraum</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto my-auto mx-2 me-1">
                                                                    <div>
                                                                        <svg width="10" height="6" viewBox="0 0 10 6"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 1L5 5L1 1" stroke="black"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="statsSelectStyleDropdown" id="dropdownSelectId2"
                                                            style="display: none;">
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,1)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19"
                                                                                viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span id="rtest">Heute</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,7)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19"
                                                                                height="19" viewBox="0 0 19 19"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes 7 Tage</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,30)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19"
                                                                                viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes 30 Tage</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,120)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19"
                                                                                viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes Quartal</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,365)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19"
                                                                                viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes Jahr</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive2(this,0)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19"
                                                                                viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9"
                                                                                    fill="#fff" stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5"
                                                                                    ry="5" fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>Gesamter Zeitraum</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="py-2"
                                                                style="border-top: 1px solid #E8E8E8;">
                                                                <div class="row g-0">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="18" height="12"
                                                                                viewBox="0 0 12 12" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>Individueller Zeitraum</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-3">
                                                <div class="greyBorderDivStats p-2">
                                                    <div class="row g-0">
                                                        <div class="col col-sm-5 pe-2">
                                                            <div class="greySelectStats py-1 px-2">
                                                                <div class="row g-0">
                                                                    <div class="col my-auto">
                                                                        <div>
                                                                            <span>Mitarbeiter</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto my-auto">
                                                                        <svg width="10" height="6" viewBox="0 0 10 6"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 1L5 5L1 1" stroke="black"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col col-sm-5 pe-2">
                                                            <div class="greySelectStats py-1 px-2">
                                                                <div class="row g-0">
                                                                    <div class="col my-auto">
                                                                        <div>
                                                                            <span>Gesellschaft</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto my-auto">
                                                                        <svg width="10" height="6" viewBox="0 0 10 6"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 1L5 5L1 1" stroke="black"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto col-sm-2 my-auto text-end">
                                                            <svg width="17" height="17" viewBox="0 0 19 19" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M18.3312 17.2279L13.0046 11.8974C14.0547 10.6381 14.6863 9.02865 14.6863 7.27086C14.6863 3.26066 11.3952 0 7.34696 0C3.29871 0 0 3.26447 0 7.27467C0 11.2849 3.2911 14.5455 7.33935 14.5455C9.05909 14.5455 10.6419 13.9558 11.8974 12.9704L17.2431 18.316C17.5551 18.628 18.0193 18.628 18.3312 18.316C18.6432 18.004 18.6432 17.5399 18.3312 17.2279ZM1.55994 7.27467C1.55994 4.12434 4.15478 1.56375 7.33935 1.56375C10.5239 1.56375 13.1187 4.12434 13.1187 7.27467C13.1187 10.425 10.5239 12.9856 7.33935 12.9856C4.15478 12.9856 1.55994 10.4212 1.55994 7.27467Z"
                                                                    fill="#5E5A5A" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-3">
                                                <div class="row g-0">
                                                    <div class="col-12">
                                                        <div class="whiteBgGraph p-4">
                                                            <div id="chart2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::user()->hasRole('fs'))
                                <div class="col-12 col-lg-6 col-xl-5 pt-3 pt-sm-4 pt-lg-0">
                                    <div class="h-100 ms-0 ms-lg-4">
                                        <div class="greyBgStats h-100 p-3 p-sm-4">
                                            <div class="pb-3">
                                                <div class="row g-0 justify-content-between" style="position: relative;">
                                                    <div class="col my-auto">
                                                        <div>
                                                            <span class="statsTitleSpan fs-3">Marketing</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-0 ">
                                                <div class="col-12 col-md-6">
                                                    <div class="col-9 my-auto pb-2" style="position: relative;">
                                                        <div class="statsSelectStyle py-1" onclick="openDropDownSelect3()"
                                                            style="cursor: pointer;">
                                                            <div class="row g-0">
                                                                <div class="col ms-2">
                                                                    <div>
                                                                        <span id="activeDropDownItem3"> letztes 7
                                                                            Tage</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto my-auto mx-2 me-1">
                                                                    <div>
                                                                        <svg width="10" height="6" viewBox="0 0 10 6"
                                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 1L5 5L1 1" stroke="black"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="statsSelectStyleDropdown" id="dropdownSelectId3"
                                                            style="display: none;left: 0;right: auto;">
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive3(this)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19" viewBox="0 0 19 19"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                    stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span id="rtest">Heute</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive3(this)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg class="activeSvg3" width="19"
                                                                                height="19" viewBox="0 0 19 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                    stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes 7 Tage</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive3(this)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19" viewBox="0 0 19 19"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                    stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes 30 Tage</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive3(this)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19" viewBox="0 0 19 19"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                    stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes Quartal</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="py-2">
                                                                <div class="row g-0"
                                                                    onclick="makeSelectActive3(this)">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="19" height="19" viewBox="0 0 19 19"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="9.5" cy="9.5" r="9" fill="#fff"
                                                                                    stroke="#E0E0E0" />
                                                                                <ellipse cx="9.5" cy="9.416" rx="5.5" ry="5"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>letztes Jahr</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="py-2"
                                                                style="border-top: 1px solid #E8E8E8;">
                                                                <div class="row g-0">
                                                                    <div class="col-auto my-auto ps-3">
                                                                        <div>
                                                                            <svg width="18" height="12" viewBox="0 0 12 12"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col my-auto ps-2 pe-5">
                                                                        <div>
                                                                            <span>Individueller Zeitraum</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="contractsWhiteBgDiv py-3 ps-4">
                                                        <div class="row g-0">
                                                            <div class="col-2 col-md-3 col-xl-2 my-auto">
                                                                <svg class="img-fluid" viewBox="0 0 44 54" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="16.9307" cy="9.87606" r="8.37606"
                                                                        stroke="black" stroke-width="3" />
                                                                    <path
                                                                        d="M32.3608 41.2755C32.3608 42.7019 32.2448 43.6625 32.0715 44.2872C31.8971 44.9153 31.7143 45.0317 31.7125 45.0329L31.7121 45.0331C31.7082 45.0357 31.6913 45.047 31.635 45.0539C31.5672 45.0622 31.4454 45.063 31.2504 45.0258C30.841 44.9477 30.2918 44.74 29.5565 44.3835C28.9488 44.0887 28.2922 43.7321 27.5542 43.3314C27.4095 43.2528 27.2616 43.1725 27.1104 43.0906C26.2052 42.6006 25.2062 42.0699 24.1456 41.5836C22.033 40.615 19.5781 39.7755 16.9304 39.7755C14.2828 39.7755 11.8278 40.615 9.71518 41.5836C8.65456 42.0699 7.65558 42.6006 6.75041 43.0906C6.59922 43.1725 6.4514 43.2527 6.30671 43.3313C5.56866 43.7321 4.91206 44.0887 4.30426 44.3835C3.56897 44.74 3.01976 44.9477 2.61037 45.0258C2.41541 45.063 2.29356 45.0622 2.22578 45.0539C2.16952 45.047 2.15262 45.0357 2.14872 45.0331L2.14831 45.0329L2.14828 45.0328C2.14518 45.0308 1.96305 44.9131 1.78933 44.2872C1.61595 43.6625 1.5 42.7019 1.5 41.2755C1.5 29.8615 8.72391 21.2521 16.9304 21.2521C25.1369 21.2521 32.3608 29.8615 32.3608 41.2755Z"
                                                                        stroke="black" stroke-width="3" />
                                                                    <circle cx="31.0396" cy="40.915" r="11.1978"
                                                                        fill="white" stroke="black" stroke-width="3" />
                                                                    <path
                                                                        d="M31.0385 37.0383C32.0813 37.0674 33.216 37.5328 33.8603 38.2019L31.0385 37.0383ZM31.0385 37.0383C29.7978 37.0036 28.6871 37.5865 28.6871 39.1786C28.6871 42.1089 33.8603 40.6438 33.8603 43.574C33.8603 45.2453 32.4834 45.9633 31.0385 45.9095M31.0385 37.0383V45.9095M31.0385 37.0383V35.2716M31.0385 45.9095C29.9501 45.8688 28.823 45.3901 28.2168 44.5508L31.0385 45.9095ZM31.0385 45.9095V47.9694"
                                                                        stroke="#2E7914" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="col-auto my-auto ps-4 ps-xl-5"
                                                                style="line-height: 1.2;">
                                                                <div>
                                                                    <span style="font-weight: 600;"
                                                                        class="fs-2">5
                                                                        CHF</span>
                                                                </div>
                                                                <div>
                                                                    <span style="font-weight: 500;"
                                                                        class="fs-6">Lead
                                                                        Costs</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="contractsWhiteBgDiv py-3 ps-4 mt-2">
                                                        <div class="row g-0">
                                                            <div class="col-2 col-md-3 col-xl-2 my-auto">
                                                                <svg class="img-fluid" viewBox="0 0 38 37" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M14 29V22.7239C14 20.3086 13.2051 17.9605 11.7379 16.0419L2.22923 3.60745C1.72604 2.94944 2.19523 2 3.02358 2H34.9764C35.8048 2 36.274 2.94944 35.7708 3.60745L26.2621 16.0419C24.7949 17.9605 24 20.3086 24 22.7239V35"
                                                                        stroke="black" stroke-width="3"
                                                                        stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="col-auto my-auto ps-4 ps-xl-5"
                                                                style="line-height: 1.2;">
                                                                <div>
                                                                    <span style="font-weight: 600;"
                                                                        class="fs-2">18%</span>
                                                                </div>
                                                                <div>
                                                                    <span style="font-weight: 500;"
                                                                        class="fs-6">Conversion
                                                                        Rate</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 pt-4 pt-md-0">
                                                    <div id="funnel" style="height: 250px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="pt-3">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="greyBgStats p-3 p-sm-4 mb-4">
                                    <div>
                                        <div style="position: relative;">
                                            <div class="col my-auto">
                                                <div>
                                                    <span class="statsTitleSpan fs-3">Leads</span>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row g-3">
                                                        <div class="col-12 col-md-6 h-auto"
                                                            style="position: relative;">

                                                            <div
                                                                class="whiteBgGraph d-flex flex-column h-100 p-3 justify-content-center">
                                                                <div class="row g-0 justify-content-end">
                                                                    <div class="col-auto my-auto mt-3">
                                                                        <div class="statsSelectStyle py-1"
                                                                            onclick="openDropDownSelect5()"
                                                                            style="cursor: pointer;top: -1rem;">
                                                                            <div class="row g-0">
                                                                                <div class="col ms-2">
                                                                                    <div>
                                                                                        <span
                                                                                            id="activeDropDownItem5">Gesamter Zeitraum</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-auto my-auto mx-2 me-1">
                                                                                    <div>
                                                                                        <svg width="10" height="6"
                                                                                            viewBox="0 0 10 6"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M9 1L5 5L1 1"
                                                                                                stroke="black"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="statsSelectStyleDropdown"
                                                                            id="dropdownSelectId5"
                                                                            style="display: none;right: 1rem;top: 3.3rem;">
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,1)">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span id="rtest">Heute</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,7)">

                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Letzte 7 Tage</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,30)">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Letzte 30 Tage</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,120)">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Letztes Quartal</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,365)">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Letztes Jahr</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2">
                                                                                <div class="row g-0"
                                                                                    onclick="makeSelectActive5(this,0)">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg class="activeSvg5"
                                                                                                width="19" height="19"
                                                                                                viewBox="0 0 19 19"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <circle cx="9.5"
                                                                                                    cy="9.5" r="9"
                                                                                                    fill="#fff"
                                                                                                    stroke="#E0E0E0" />
                                                                                                <ellipse cx="9.5"
                                                                                                    cy="9.416" rx="5.5"
                                                                                                    ry="5"
                                                                                                    fill="white" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Gesamter Zeitraum</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2"
                                                                                style="border-top: 1px solid #E8E8E8;">
                                                                                <div class="row g-0" onclick="leadsCostum()" style="cursor: pointer">
                                                                                    <div class="col-auto my-auto ps-3">
                                                                                        <div>
                                                                                            <svg width="18" height="12"
                                                                                                viewBox="0 0 12 12"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path
                                                                                                    d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                    fill="black" />
                                                                                            </svg>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col my-auto ps-2 pe-5">
                                                                                        <div>
                                                                                            <span>Individueller Zeitraum</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="leadsCostum" style="display: none">
                                                                                <div class="py-2">
                                                                                    <div class="row g-0">
                                                                                        {{-- <div class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <span class="fs-6">Aus</span>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                        <div class="col my-auto ps-2 pe-2">
                                                                                            <div>
                                                                                                <input class="form-control" type="date" id="leadsFrom">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="pt-1">
                                                                                    <div class="row g-0">
                                                                                        {{-- <div class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <span class="fs-6">Zu</span>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                        <div class="col my-auto ps-2 pe-2">
                                                                                            <div>
                                                                                               <input class="form-control" type="date" id="leadsTo">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="pb-2 pt-2">
                                                                                    <div class="row g-0">
                                                                                        <div class="col my-auto ps-2 pe-2">
                                                                                            <div>
                                                                                               <input onclick="makeSelectActive5(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-3 row g-0">
                                                                    <div class="col-12 col-sm-6 my-auto">
                                                                        <div id="chart3" style="height: 300px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6 my-auto ps-0 ps-sm-4 pt-4 pt-sm-0">
                                                                        <div class="">
                                                                            <div class="row g-0 pb-3">
                                                                                <div class="col-auto my-auto me-2">
                                                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                                            fill="#001c62" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <span style="font-weight: 500;">Abgeschlossen</span>
                                                                                </div>
                                                                                <div class="col-2 text-end">
                                                                                    <span style="font-weight: 700;" id="abgeschlossen"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row g-0 pb-3">
                                                                                <div class="col-auto my-auto me-2">
                                                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                                            fill="#3d66ce" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <span style="font-weight: 500;">Nicht abgeschlossen</span>
                                                                                </div>
                                                                                <div class="col-2 text-end">
                                                                                    <span style="font-weight: 700;" id="nichtabgeschlossen"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row g-0 pb-3">
                                                                                <div class="col-auto my-auto me-2">
                                                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <ellipse cx="9" cy="8.5" rx="9" ry="8.5"
                                                                                            fill="#74a3e1" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <span style="font-weight: 500;">Won Leads</span>
                                                                                </div>
                                                                                <div class="col-2 text-end">
                                                                                    <span style="font-weight: 700;" id="wonleads"></span>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (!Auth::user()->hasRole('fs'))
                                                        <div class="col-12 col-md-6 h-auto">
                                                            <div class="whiteBgGraph h-100 p-3">
                                                                <div class="pb-2">
                                                                    <span style="font-weight: 600;"
                                                                        class="fs-5">Quellen</span>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3">

                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 23 23" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M16.4 22H6.6C3.52 22 1 19.48 1 16.4V6.6C1 3.52 3.52 1 6.6 1H16.4C19.48 1 22 3.52 22 6.6V16.4C22 19.48 19.48 22 16.4 22Z"
                                                                                    stroke="#2D9CDB" stroke-width="1.3"
                                                                                    stroke-miterlimit="10"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M15 6H13.0909C12.247 6 11.4377 6.31607 10.841 6.87868C10.2443 7.44129 9.90909 8.20435 9.90909 9V10.8H8V13.2H9.90909V18H12.4545V13.2H14.3636L15 10.8H12.4545V9C12.4545 8.84087 12.5216 8.68826 12.6409 8.57573C12.7603 8.46322 12.9221 8.4 13.0909 8.4H15V6Z"
                                                                                    stroke="#2D9CDB"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">Facebook</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div
                                                                                class="ltBlueSmallDiv text-center px-2">
                                                                                <span>{{ $leads['facebook'] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3 pt-1">

                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 23 23" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M16.4 22H6.6C3.52 22 1 19.48 1 16.4V6.6C1 3.52 3.52 1 6.6 1H16.4C19.48 1 22 3.52 22 6.6V16.4C22 19.48 19.48 22 16.4 22Z"
                                                                                    stroke="#B75B92" stroke-width="1.3"
                                                                                    stroke-miterlimit="10"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M11.5 16C13.9853 16 16 13.9853 16 11.5C16 9.01472 13.9853 7 11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16Z"
                                                                                    stroke="#B75B92" stroke-width="1.3"
                                                                                    stroke-miterlimit="10"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M17 6C17.5523 6 18 5.55228 18 5C18 4.44772 17.5523 4 17 4C16.4477 4 16 4.44772 16 5C16 5.55228 16.4477 6 17 6Z"
                                                                                    stroke="#B75B92" stroke-width="1.3"
                                                                                    stroke-miterlimit="10"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">Instagram</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div
                                                                                class="ltPinkSmallDiv text-center px-2">
                                                                                <span>{{ $leads['instagram'] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3 pt-1">

                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 25 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M24 11.999C24 11.997 24 11.995 24 11.993C24 8.442 22.454 5.253 19.999 3.06L19.987 3.05C19.956 3.017 19.923 2.988 19.886 2.963L19.884 2.962C17.789 1.122 15.025 0 11.998 0C8.966 0 6.198 1.126 4.088 2.984L4.101 2.973C4.075 2.993 4.052 3.014 4.031 3.038V3.039C1.553 5.244 0 8.442 0 12.002C0 15.552 1.544 18.741 3.997 20.935L4.009 20.945C4.009 20.948 4.011 20.95 4.014 20.95C4.045 20.985 4.079 21.015 4.115 21.042L4.117 21.043C6.211 22.88 8.974 24.001 11.998 24.001C15.03 24.001 17.799 22.875 19.909 21.017L19.896 21.028C19.926 21.006 19.952 20.983 19.976 20.958C22.451 18.756 24.002 15.563 24.002 12.007C24.002 12.005 24.002 12.002 24.002 12L24 11.999ZM19.538 19.804C18.962 19.336 18.315 18.907 17.629 18.542L17.564 18.51C18.177 16.743 18.546 14.706 18.581 12.587V12.571H22.842C22.686 15.423 21.451 17.959 19.541 19.801L19.538 19.804ZM12.572 18.299C13.855 18.368 15.054 18.65 16.16 19.109L16.088 19.083C15.202 21.103 13.955 22.491 12.572 22.796V18.299ZM12.572 17.155V12.571H17.44C17.397 14.532 17.057 16.399 16.464 18.149L16.503 18.018C15.346 17.534 14.005 17.223 12.6 17.156L12.573 17.155H12.572ZM12.572 11.427V6.843C14.003 6.774 15.344 6.464 16.579 5.952L16.5 5.981C17.055 7.6 17.396 9.466 17.44 11.406V11.427H12.572ZM12.572 5.699V1.204C13.955 1.509 15.202 2.891 16.088 4.917C15.054 5.347 13.855 5.628 12.601 5.698L12.572 5.699ZM15.426 1.699C16.664 2.118 17.738 2.708 18.684 3.451L18.661 3.433C18.218 3.781 17.721 4.109 17.197 4.394L17.141 4.422C16.692 3.375 16.116 2.475 15.417 1.685L15.426 1.696V1.699ZM11.426 1.207V5.699C10.143 5.63 8.944 5.349 7.838 4.889L7.91 4.915C8.8 2.895 10.045 1.508 11.428 1.203L11.426 1.207ZM6.858 4.419C6.278 4.104 5.781 3.777 5.314 3.412L5.338 3.43C6.261 2.704 7.334 2.115 8.496 1.718L8.572 1.695C7.883 2.473 7.307 3.373 6.883 4.353L6.858 4.418V4.419ZM11.428 6.842V11.426H6.56C6.604 9.465 6.945 7.599 7.539 5.849L7.5 5.98C8.656 6.463 9.997 6.774 11.401 6.841L11.428 6.842ZM11.428 12.57V17.154C9.997 17.223 8.656 17.533 7.421 18.045L7.5 18.016C6.945 16.398 6.604 14.531 6.56 12.591V12.57H11.428ZM11.428 18.298V22.793C10.045 22.488 8.798 21.106 7.912 19.08C8.946 18.65 10.145 18.37 11.399 18.3L11.428 18.299V18.298ZM8.578 22.298C7.34 21.88 6.267 21.292 5.32 20.55L5.344 20.568C5.787 20.22 6.284 19.892 6.808 19.607L6.864 19.579C7.309 20.626 7.886 21.526 8.587 22.312L8.578 22.302V22.298ZM17.142 19.578C17.722 19.893 18.219 20.22 18.686 20.585L18.662 20.567C17.739 21.293 16.666 21.882 15.504 22.279L15.428 22.302C16.117 21.524 16.693 20.625 17.117 19.645L17.142 19.58V19.578ZM22.842 11.427H18.581C18.546 9.292 18.177 7.255 17.523 5.349L17.564 5.487C18.315 5.088 18.961 4.659 19.561 4.175L19.537 4.193C21.45 6.038 22.685 8.574 22.84 11.398L22.841 11.426L22.842 11.427ZM4.462 4.194C5.038 4.662 5.685 5.091 6.371 5.456L6.436 5.488C5.823 7.255 5.454 9.292 5.419 11.411V11.427H1.157C1.313 8.575 2.548 6.039 4.458 4.197L4.461 4.194H4.462ZM1.158 12.571H5.419C5.454 14.706 5.823 16.743 6.477 18.649L6.436 18.511C5.685 18.91 5.039 19.339 4.439 19.823L4.463 19.805C2.55 17.96 1.315 15.424 1.16 12.6L1.159 12.572L1.158 12.571Z"
                                                                                    fill="#5288F5" />
                                                                            </svg>



                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">Finanu</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div class="BlueSmallDiv text-center px-2">
                                                                                <span>--</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3 pt-1">
                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 25 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M24 11.999C24 11.997 24 11.995 24 11.993C24 8.442 22.454 5.253 19.999 3.06L19.987 3.05C19.956 3.017 19.923 2.988 19.886 2.963L19.884 2.962C17.789 1.122 15.025 0 11.998 0C8.966 0 6.198 1.126 4.088 2.984L4.101 2.973C4.075 2.993 4.052 3.014 4.031 3.038V3.039C1.553 5.244 0 8.442 0 12.002C0 15.552 1.544 18.741 3.997 20.935L4.009 20.945C4.009 20.948 4.011 20.95 4.014 20.95C4.045 20.985 4.079 21.015 4.115 21.042L4.117 21.043C6.211 22.88 8.974 24.001 11.998 24.001C15.03 24.001 17.799 22.875 19.909 21.017L19.896 21.028C19.926 21.006 19.952 20.983 19.976 20.958C22.451 18.756 24.002 15.563 24.002 12.007C24.002 12.005 24.002 12.002 24.002 12L24 11.999ZM19.538 19.804C18.962 19.336 18.315 18.907 17.629 18.542L17.564 18.51C18.177 16.743 18.546 14.706 18.581 12.587V12.571H22.842C22.686 15.423 21.451 17.959 19.541 19.801L19.538 19.804ZM12.572 18.299C13.855 18.368 15.054 18.65 16.16 19.109L16.088 19.083C15.202 21.103 13.955 22.491 12.572 22.796V18.299ZM12.572 17.155V12.571H17.44C17.397 14.532 17.057 16.399 16.464 18.149L16.503 18.018C15.346 17.534 14.005 17.223 12.6 17.156L12.573 17.155H12.572ZM12.572 11.427V6.843C14.003 6.774 15.344 6.464 16.579 5.952L16.5 5.981C17.055 7.6 17.396 9.466 17.44 11.406V11.427H12.572ZM12.572 5.699V1.204C13.955 1.509 15.202 2.891 16.088 4.917C15.054 5.347 13.855 5.628 12.601 5.698L12.572 5.699ZM15.426 1.699C16.664 2.118 17.738 2.708 18.684 3.451L18.661 3.433C18.218 3.781 17.721 4.109 17.197 4.394L17.141 4.422C16.692 3.375 16.116 2.475 15.417 1.685L15.426 1.696V1.699ZM11.426 1.207V5.699C10.143 5.63 8.944 5.349 7.838 4.889L7.91 4.915C8.8 2.895 10.045 1.508 11.428 1.203L11.426 1.207ZM6.858 4.419C6.278 4.104 5.781 3.777 5.314 3.412L5.338 3.43C6.261 2.704 7.334 2.115 8.496 1.718L8.572 1.695C7.883 2.473 7.307 3.373 6.883 4.353L6.858 4.418V4.419ZM11.428 6.842V11.426H6.56C6.604 9.465 6.945 7.599 7.539 5.849L7.5 5.98C8.656 6.463 9.997 6.774 11.401 6.841L11.428 6.842ZM11.428 12.57V17.154C9.997 17.223 8.656 17.533 7.421 18.045L7.5 18.016C6.945 16.398 6.604 14.531 6.56 12.591V12.57H11.428ZM11.428 18.298V22.793C10.045 22.488 8.798 21.106 7.912 19.08C8.946 18.65 10.145 18.37 11.399 18.3L11.428 18.299V18.298ZM8.578 22.298C7.34 21.88 6.267 21.292 5.32 20.55L5.344 20.568C5.787 20.22 6.284 19.892 6.808 19.607L6.864 19.579C7.309 20.626 7.886 21.526 8.587 22.312L8.578 22.302V22.298ZM17.142 19.578C17.722 19.893 18.219 20.22 18.686 20.585L18.662 20.567C17.739 21.293 16.666 21.882 15.504 22.279L15.428 22.302C16.117 21.524 16.693 20.625 17.117 19.645L17.142 19.58V19.578ZM22.842 11.427H18.581C18.546 9.292 18.177 7.255 17.523 5.349L17.564 5.487C18.315 5.088 18.961 4.659 19.561 4.175L19.537 4.193C21.45 6.038 22.685 8.574 22.84 11.398L22.841 11.426L22.842 11.427ZM4.462 4.194C5.038 4.662 5.685 5.091 6.371 5.456L6.436 5.488C5.823 7.255 5.454 9.292 5.419 11.411V11.427H1.157C1.313 8.575 2.548 6.039 4.458 4.197L4.461 4.194H4.462ZM1.158 12.571H5.419C5.454 14.706 5.823 16.743 6.477 18.649L6.436 18.511C5.685 18.91 5.039 19.339 4.439 19.823L4.463 19.805C2.55 17.96 1.315 15.424 1.16 12.6L1.159 12.572L1.158 12.571Z"
                                                                                    fill="#87BE74" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">Sana
                                                                                    Scout</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div
                                                                                class="greenSmallDiv text-center px-2">
                                                                                <span>{{ $leads['sanascout'] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3 pt-1">
                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 25 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M24 11.999C24 11.997 24 11.995 24 11.993C24 8.442 22.454 5.253 19.999 3.06L19.987 3.05C19.956 3.017 19.923 2.988 19.886 2.963L19.884 2.962C17.789 1.122 15.025 0 11.998 0C8.966 0 6.198 1.126 4.088 2.984L4.101 2.973C4.075 2.993 4.052 3.014 4.031 3.038V3.039C1.553 5.244 0 8.442 0 12.002C0 15.552 1.544 18.741 3.997 20.935L4.009 20.945C4.009 20.948 4.011 20.95 4.014 20.95C4.045 20.985 4.079 21.015 4.115 21.042L4.117 21.043C6.211 22.88 8.974 24.001 11.998 24.001C15.03 24.001 17.799 22.875 19.909 21.017L19.896 21.028C19.926 21.006 19.952 20.983 19.976 20.958C22.451 18.756 24.002 15.563 24.002 12.007C24.002 12.005 24.002 12.002 24.002 12L24 11.999ZM19.538 19.804C18.962 19.336 18.315 18.907 17.629 18.542L17.564 18.51C18.177 16.743 18.546 14.706 18.581 12.587V12.571H22.842C22.686 15.423 21.451 17.959 19.541 19.801L19.538 19.804ZM12.572 18.299C13.855 18.368 15.054 18.65 16.16 19.109L16.088 19.083C15.202 21.103 13.955 22.491 12.572 22.796V18.299ZM12.572 17.155V12.571H17.44C17.397 14.532 17.057 16.399 16.464 18.149L16.503 18.018C15.346 17.534 14.005 17.223 12.6 17.156L12.573 17.155H12.572ZM12.572 11.427V6.843C14.003 6.774 15.344 6.464 16.579 5.952L16.5 5.981C17.055 7.6 17.396 9.466 17.44 11.406V11.427H12.572ZM12.572 5.699V1.204C13.955 1.509 15.202 2.891 16.088 4.917C15.054 5.347 13.855 5.628 12.601 5.698L12.572 5.699ZM15.426 1.699C16.664 2.118 17.738 2.708 18.684 3.451L18.661 3.433C18.218 3.781 17.721 4.109 17.197 4.394L17.141 4.422C16.692 3.375 16.116 2.475 15.417 1.685L15.426 1.696V1.699ZM11.426 1.207V5.699C10.143 5.63 8.944 5.349 7.838 4.889L7.91 4.915C8.8 2.895 10.045 1.508 11.428 1.203L11.426 1.207ZM6.858 4.419C6.278 4.104 5.781 3.777 5.314 3.412L5.338 3.43C6.261 2.704 7.334 2.115 8.496 1.718L8.572 1.695C7.883 2.473 7.307 3.373 6.883 4.353L6.858 4.418V4.419ZM11.428 6.842V11.426H6.56C6.604 9.465 6.945 7.599 7.539 5.849L7.5 5.98C8.656 6.463 9.997 6.774 11.401 6.841L11.428 6.842ZM11.428 12.57V17.154C9.997 17.223 8.656 17.533 7.421 18.045L7.5 18.016C6.945 16.398 6.604 14.531 6.56 12.591V12.57H11.428ZM11.428 18.298V22.793C10.045 22.488 8.798 21.106 7.912 19.08C8.946 18.65 10.145 18.37 11.399 18.3L11.428 18.299V18.298ZM8.578 22.298C7.34 21.88 6.267 21.292 5.32 20.55L5.344 20.568C5.787 20.22 6.284 19.892 6.808 19.607L6.864 19.579C7.309 20.626 7.886 21.526 8.587 22.312L8.578 22.302V22.298ZM17.142 19.578C17.722 19.893 18.219 20.22 18.686 20.585L18.662 20.567C17.739 21.293 16.666 21.882 15.504 22.279L15.428 22.302C16.117 21.524 16.693 20.625 17.117 19.645L17.142 19.58V19.578ZM22.842 11.427H18.581C18.546 9.292 18.177 7.255 17.523 5.349L17.564 5.487C18.315 5.088 18.961 4.659 19.561 4.175L19.537 4.193C21.45 6.038 22.685 8.574 22.84 11.398L22.841 11.426L22.842 11.427ZM4.462 4.194C5.038 4.662 5.685 5.091 6.371 5.456L6.436 5.488C5.823 7.255 5.454 9.292 5.419 11.411V11.427H1.157C1.313 8.575 2.548 6.039 4.458 4.197L4.461 4.194H4.462ZM1.158 12.571H5.419C5.454 14.706 5.823 16.743 6.477 18.649L6.436 18.511C5.685 18.91 5.039 19.339 4.439 19.823L4.463 19.805C2.55 17.96 1.315 15.424 1.16 12.6L1.159 12.572L1.158 12.571Z"
                                                                                    fill="#001C62" />
                                                                            </svg>

                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">Gewinne
                                                                                    Einfach</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div
                                                                                class="DarkBlueSmallDiv text-center px-2">
                                                                                <span>--</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-2 ps-lg-3 pt-1">
                                                                    <div class="row">
                                                                        <div class="col-auto my-auto me-2">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 18 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M15.4167 9.16667V14.6667C15.4167 15.6796 14.5963 16.5 13.5833 16.5H2.58333C1.57042 16.5 0.75 15.6796 0.75 14.6667V3.66667C0.75 2.65375 1.57042 1.83333 2.58333 1.83333H8.08333V3.66667H2.58333V14.6667H13.5833V9.16667H15.4167ZM9.91667 0V1.83333H14.1205L6.97692 8.97692L8.27308 10.2731L15.4167 3.1295V7.33333H17.25V0H9.91667Z"
                                                                                    fill="#F79C42" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="col px-0">
                                                                            <div>
                                                                                <span class="fs-6"
                                                                                    style="font-weight: 500;">External</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0">
                                                                            <div
                                                                                class="orangeSmallDiv text-center px-2">
                                                                                <span>--</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if (!Auth::user()->hasRole('fs'))
                                                        {{-- <div class="col-12 col-md-6 h-auto">
                                                            <div class="whiteBgGraph h-100 p-3">
                                                                <div class="pb-2">
                                                                    <div class="row g-0"
                                                                        style="position: relative;">
                                                                        <div class="col">
                                                                            <span style="font-weight: 600;"
                                                                                class="fs-5">Kampagnen</span>
                                                                        </div>
                                                                        <div class="col-auto my-auto">
                                                                            <div class="statsSelectStyle py-1"
                                                                                onclick="openDropDownSelect4()"
                                                                                style="cursor: pointer;">
                                                                                <div class="row g-0">
                                                                                    <div class="col ms-2">
                                                                                        <div>
                                                                                            <span
                                                                                                id="activeDropDownItem4">
                                                                                                letztes 7 Tage</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-auto my-auto mx-2 me-1">
                                                                                        <div>
                                                                                            <svg width="10" height="6"
                                                                                                viewBox="0 0 10 6"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M9 1L5 5L1 1"
                                                                                                    stroke="black"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="statsSelectStyleDropdown"
                                                                                id="dropdownSelectId4"
                                                                                style="display: none;right: 0;">
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive4(this)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span id="rtest">letzte
                                                                                                    Tag</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive4(this)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg class="activeSvg4"
                                                                                                    width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>letztes 7 Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive4(this)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>letztes 30
                                                                                                    Tags</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive4(this)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>letztes
                                                                                                    Quartal</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive4(this)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>letztes Jahr</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> --}}
                                                                                {{-- <div class="py-2"
                                                                                    style="border-top: 1px solid #E8E8E8;">
                                                                                    <div class="row g-0">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="18"
                                                                                                    height="12"
                                                                                                    viewBox="0 0 12 12"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path
                                                                                                        d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                        fill="black" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Individueller Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> --}}
                                                                            {{-- </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-0 pb-2">
                                                                    <div class="col-6 col-sm-5 pe-1">
                                                                        <div class="greyBgImpressions p-1 text-center">
                                                                            <div class="text-center">
                                                                                <span class="fs-5"
                                                                                    style="font-weight: 500;">33,232</span>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <span>Impressions</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 col-sm-5 ps-1">
                                                                        <div class="yellowClicksBg p-1 text-center">
                                                                            <div class="text-center">
                                                                                <span class="fs-5"
                                                                                    style="font-weight: 500;">33,232</span>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <span>Clicks</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="chart4" style="margin-left: -1.3rem;">
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        @endif
                                                        <div class="col-12 col-md-6"
                                                            style="position: relative;">
                                                            <div class="">
                                                                <div class="whiteBgGraph h-100 p-3">
                                                                    <div class="row g-0">
                                                                        <div class="col">
                                                                            <div class="pb-2">
                                                                                <span style="font-weight: 600;"
                                                                                    class="fs-5">Dauer vom Lead</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto my-auto">
                                                                            <div class="statsSelectStyle py-1"
                                                                                onclick="openDropDownSelect6()"
                                                                                style="cursor: pointer;">
                                                                                <div class="row g-0">
                                                                                    <div class="col ms-2">
                                                                                        <div>
                                                                                            <span
                                                                                                id="activeDropDownItem6">
                                                                                                Gesamter Zeitraum</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-auto my-auto mx-2 me-1">
                                                                                        <div>
                                                                                            <svg width="10" height="6"
                                                                                                viewBox="0 0 10 6"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M9 1L5 5L1 1"
                                                                                                    stroke="black"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="statsSelectStyleDropdown"
                                                                                id="dropdownSelectId6"
                                                                                style="display: none;right: 1.5rem;">
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,1)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span id="rtest">Heute</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,7)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 7 Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,30)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 30
                                                                                                    Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,120)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes
                                                                                                    Quartal</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,365)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes Jahr</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive6(this,0)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg class="activeSvg6"
                                                                                                    width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Gesamter Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2"
                                                                                    style="border-top: 1px solid #E8E8E8;">
                                                                                    <div class="row g-0" onclick="dauervomleadCostum()" style="cursor: pointer">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="18"
                                                                                                    height="12"
                                                                                                    viewBox="0 0 12 12"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path
                                                                                                        d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                        fill="black" />
                                                                                                </svg>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Individueller Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="dauervomleadCostum" style="display: none">
                                                                                    <div class="py-2">
                                                                                        <div class="row g-0">
                                                                                            {{-- <div class="col-auto my-auto ps-3">
                                                                                                <div>
                                                                                                    <span class="fs-6">Aus</span>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                    <input class="form-control" type="date" id="dauervomleadFrom">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pt-1">
                                                                                        <div class="row g-0">
                                                                                            {{-- <div class="col-auto my-auto ps-3">
                                                                                                <div>
                                                                                                    <span class="fs-6">Zu</span>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input class="form-control" type="date" id="dauervomleadTo">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pb-2 pt-2">
                                                                                        <div class="row g-0">
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input onclick="makeSelectActive6(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div id="chart5" class="mt-auto">

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!Auth::user()->hasRole('fs'))

                    <div class="">
                        <div class="row g-4">
                            <div class="col-12 col-lg-6">
                                <div class="greyBgStats p-3 p-sm-4 h-100">
                                    <div>
                                        <div style="position: relative;">
                                            <div class="col my-auto">
                                                <div>
                                                    <span class="statsTitleSpan fs-3">HR</span>
                                                </div>
                                                <div>
                                                    <div class="row g-0">
                                                        <div class="col-12"
                                                            style="position: relative;">
                                                            <div class="">
                                                                <div class="whiteBgGraph h-100 p-3">
                                                                    <div class="row g-0">
                                                                        <div class="col">
                                                                            <div class="pb-2">
                                                                                <span style="font-weight: 600;"
                                                                                    class="fs-5">Grund</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto my-auto">
                                                                            <div class="statsSelectStyle py-1"
                                                                                onclick="openDropDownSelect7()"
                                                                                style="cursor: pointer;">
                                                                                <div class="row g-0">
                                                                                    <div class="col ms-2">
                                                                                        <div>
                                                                                            <span
                                                                                                id="activeDropDownItem7">
                                                                                                Gesamter Zeitraum</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-auto my-auto mx-2 me-1">
                                                                                        <div>
                                                                                            <svg width="10" height="6"
                                                                                                viewBox="0 0 10 6"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M9 1L5 5L1 1"
                                                                                                    stroke="black"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="statsSelectStyleDropdown"
                                                                                id="dropdownSelectId7"
                                                                                style="display: none;right: 1rem;">
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,1)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span id="rtest">Heute</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,7)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 7 Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,30)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 30
                                                                                                    Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,120)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes
                                                                                                    Quartal</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,365)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes Jahr</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive7(this,0)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg class="activeSvg7"
                                                                                                    width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Gesamter Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2"
                                                                                    style="border-top: 1px solid #E8E8E8;">
                                                                                    <div class="row g-0" onclick="hrCostum()" style="cursor: pointer">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="18"
                                                                                                    height="12"
                                                                                                    viewBox="0 0 12 12"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path
                                                                                                        d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                        fill="black" />
                                                                                                </svg>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Individueller Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="hrCostum" style="display: none">
                                                                                    <div class="py-2">
                                                                                        <div class="row g-0">
                                                                                            {{-- <div class="col-auto my-auto ps-3">
                                                                                                <div>
                                                                                                    <span class="fs-6">Aus</span>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                    <input class="form-control" type="date" id="hrFrom">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pt-1">
                                                                                        <div class="row g-0">
                                                                                            {{-- <div class="col-auto my-auto ps-3">
                                                                                                <div>
                                                                                                    <span class="fs-6">Zu</span>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input class="form-control" type="date" id="hrTo">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pb-2 pt-2">
                                                                                        <div class="row g-0">
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input onclick="makeSelectActive7(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="chart6">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-5 mb-md-0">
                                <div class="greyBgStats p-3 p-sm-4">
                                    <div>
                                        <div style="position: relative;">
                                            <div class="col my-auto">
                                                <div>
                                                    <span class="statsTitleSpan fs-3">Termine</span>
                                                </div>
                                                <div>
                                                    <div class="row g-0">
                                                        <div class="col-12"
                                                            style="position: relative;">
                                                            <div class="">
                                                                <div class="whiteBgGraph h-100 p-3" >
                                                                    <div class="row g-0">
                                                                        <div class="col">
                                                                            <div class="pb-2">
                                                                                <span style="font-weight: 600;"
                                                                                    class="fs-5"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto my-auto">
                                                                            <div class="statsSelectStyle py-1"
                                                                                onclick="openDropDownSelect8()"
                                                                                style="cursor: pointer;">
                                                                                <div class="row g-0">
                                                                                    <div class="col ms-2">
                                                                                        <div>
                                                                                            <span
                                                                                                id="activeDropDownItem8">
                                                                                                Gesamter Zeitraum</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-auto my-auto mx-2 me-1">
                                                                                        <div>
                                                                                            <svg width="10" height="6"
                                                                                                viewBox="0 0 10 6"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M9 1L5 5L1 1"
                                                                                                    stroke="black"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="statsSelectStyleDropdown"
                                                                                id="dropdownSelectId8"
                                                                                style="display: none;right: 1rem;">
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,1)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span id="rtest">Heute</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,7)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 7 Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,30)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letzte 30
                                                                                                    Tage</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,120)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes
                                                                                                    Quartal</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,365)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Letztes Jahr</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2">
                                                                                    <div class="row g-0"
                                                                                        onclick="makeSelectActive8(this,0)">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg class="activeSvg8"
                                                                                                    width="19"
                                                                                                    height="19"
                                                                                                    viewBox="0 0 19 19"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <circle cx="9.5"
                                                                                                        cy="9.5" r="9"
                                                                                                        fill="#fff"
                                                                                                        stroke="#E0E0E0" />
                                                                                                    <ellipse cx="9.5"
                                                                                                        cy="9.416"
                                                                                                        rx="5.5" ry="5"
                                                                                                        fill="white" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Gesamter Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="py-2"
                                                                                    style="border-top: 1px solid #E8E8E8;">
                                                                                    <div class="row g-0" onclick="terminCostum()" style="cursor: pointer">
                                                                                        <div
                                                                                            class="col-auto my-auto ps-3">
                                                                                            <div>
                                                                                                <svg width="18"
                                                                                                    height="12"
                                                                                                    viewBox="0 0 12 12"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path
                                                                                                        d="M12 5.6044H6.3956V0H5.6044V5.6044H0V6.3956H5.6044V12H6.3956V6.3956H12V5.6044Z"
                                                                                                        fill="black" />
                                                                                                </svg>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col my-auto ps-2 pe-5">
                                                                                            <div>
                                                                                                <span>Individueller Zeitraum</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="terminCostum" style="display: none">
                                                                                    <div class="py-2">
                                                                                        <div class="row g-0">
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                    <input class="form-control" type="date" id="terminFrom">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pt-1">
                                                                                        <div class="row g-0">
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input class="form-control" type="date" id="terminTo">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="pb-2 pt-2">
                                                                                        <div class="row g-0">
                                                                                            <div class="col my-auto ps-2 pe-2">
                                                                                                <div>
                                                                                                   <input onclick="makeSelectActive8(this,100)" class="col-12 py-1" type="button" value="Suche" style="background-color:#2F60DC; color:#fff;border:#2F60DC; border-radius:8px;font-weight:700">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="pt-3">
                                                                        <div class="row g-0">
                                                                            <div class="col-12 col-sm mx-auto" style="max-width: 300px;min-width: 270px;">
                                                                                <div id="chart7"></div>
                                                                            </div>
                                                                            <div class="col-12 col-sm my-auto ps-0 ps-sm-5 pt-4 pt-sm-0">
                                                                                <div>
                                                                                    <div class="row g-0 pb-2">
                                                                                        <div class="col-auto my-auto me-2">
                                                                                            <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                <rect width="26" height="9" rx="4.5" fill="#79B887"/>
                                                                                            </svg>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <span style="font-weight: 500;">Abschluss</span>
                                                                                        </div>
                                                                                        <div class="col-2 text-end">
                                                                                            <span style="font-weight: 700;" id="teraccepted"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div class="row g-0 pb-2">
                                                                                        <div class="col-auto my-auto me-2">
                                                                                        <svg width="26" height="10" viewBox="0 0 26 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <rect width="26" height="10" rx="5" fill="#d9d9d9"/>
                                                                                        </svg>

                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <span style="font-weight: 500;">Pending</span>
                                                                                        </div>
                                                                                        <div class="col-2 text-end">
                                                                                            <span style="font-weight: 700;" id="terpending"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div class="row g-0 pb-2">
                                                                                        <div class="col-auto my-auto me-2">
                                                                                        <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <rect width="26" height="9" rx="4.5" fill="#C74E46"/>
                                                                                        </svg>


                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <span style="font-weight: 500;">Kein Abschluss                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-2 text-end">
                                                                                            <span style="font-weight: 700;" id="terrejected"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="pb-3">
                                                                                    <div class="row g-0 pb-2">
                                                                                        <div class="col-auto my-auto me-2">
                                                                                        <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <rect width="26" height="9" rx="4.5" fill="#FFBF00"/>
                                                                                        </svg>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <span style="font-weight: 500;">Folget</span>
                                                                                        </div>
                                                                                        <div class="col-2 text-end">
                                                                                            <span style="font-weight: 700;" id="terfolget"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div class="row g-0 ">
                                                                                        <div class="col-auto my-auto me-2">
                                                                                        <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect width="26" height="9" rx="4.5" fill="#040404"/>
                                                                                        </svg>



                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <span style="font-weight: 500;">Total</span>
                                                                                        </div>
                                                                                        <div class="col-2 text-end">
                                                                                            <span style="font-weight: 700;" id="tertotal"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                               
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-5 mb-md-0">
                                <div id="chart8"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @php
    $user = auth()->user();
    $urole = $user->getRoleNames()->toArray();
    @endphp
    {{--        Mobile--}}
    <div class="mobile-nav" id="mobile-nav">
        <a href="{{route('dashboard')}}" class="m-nav {{ (request()->is('/')) ? 'activeClassNavMob__' : '' }}">
        <span>
            <svg class="img-fluid " width="26" viewBox="0 0 25 21"
                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.91637 12.6H9.01637V13.5V19.75C9.01637 19.9128 8.8661 20.1 8.6247 20.1H4.7497C4.50829 20.1 4.35803 19.9128 4.35803 19.75V11V10.1H3.45803H1.99054L12.2234 1.18035C12.2237 1.18012 12.2239 1.17989 12.2242 1.17966C12.3767 1.0484 12.6227 1.0484 12.7752 1.17966C12.7755 1.17989 12.7757 1.18012 12.776 1.18035L23.0089 10.1H21.5414H20.6414V11V19.75C20.6414 19.9128 20.4911 20.1 20.2497 20.1H16.3747C16.1333 20.1 15.983 19.9128 15.983 19.75V13.5V12.6H15.083H9.91637Z"
                                    stroke="#A7A4A4" stroke-width="1.8" />
                            </svg>
        </span>
        </a>
        @if(in_array('backoffice',$urole) ||
        in_array('fs',$urole) || in_array('admin',$urole))
            <a href="{{route('tasks')}}" class="m-nav {{ (request()->is('tasks')) ? 'activeClassNavMob__' : '' }}">
                <span>
                    <svg width="26" viewBox="0 0 25 21" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_171_588)">
                                    <path
                                        d="M19.2756 0.953899H15.3806L15.2222 0.356418C15.1679 0.148233 14.9476 0 14.6937 0H10.3063C10.0523 0 9.83295 0.148233 9.77772 0.356418L9.62016 0.953899H5.72439C4.29932 0.953899 3.14062 1.92756 3.14062 3.12462V18.8293C3.14062 20.0264 4.29932 21 5.72439 21H19.2756C20.7007 21 21.8602 20.0264 21.8602 18.8293V3.12462C21.8602 1.92756 20.7006 0.953899 19.2756 0.953899ZM20.1712 18.8293C20.1712 19.2439 19.7696 19.5813 19.2756 19.5813H5.72433C5.23115 19.5813 4.82952 19.2439 4.82952 18.8293V3.12462C4.82952 2.70998 5.23115 2.37266 5.72433 2.37266H9.24487L9.15501 2.71208C9.11869 2.8468 9.15831 2.98812 9.26059 3.09553C9.36361 3.20326 9.51953 3.26593 9.68357 3.26593H15.317C15.4812 3.26593 15.637 3.20326 15.7393 3.09553C15.8424 2.9878 15.882 2.84684 15.8457 2.71208L15.7558 2.37266H19.2756C19.7696 2.37266 20.1712 2.71003 20.1712 3.12462V18.8293Z"
                                        fill="#A7A4A4" />
                                    <path
                                        d="M9.07262 10.5013H11.3693L10.8235 10.1882C10.0531 9.74661 9.85528 8.86364 10.3814 8.21665C10.9068 7.57032 11.9582 7.40304 12.7285 7.84533L12.8184 7.89694V7.35558C12.8184 7.00469 12.4795 6.72 12.0621 6.72H9.07262C8.65537 6.72 8.31641 7.00473 8.31641 7.35558V9.86572C8.31641 10.2166 8.65537 10.5013 9.07262 10.5013Z"
                                        fill="#A7A4A4" />
                                    <path
                                        d="M16.1054 7.01682L13.4581 9.12206L12.2524 8.43108C11.8689 8.20973 11.3427 8.29355 11.0788 8.61674C10.8157 8.94019 10.9147 9.3815 11.3007 9.60248L13.068 10.6163C13.2124 10.6994 13.3781 10.7399 13.5439 10.7399C13.7542 10.7399 13.9628 10.6742 14.1245 10.5456L17.2666 8.04696C17.6055 7.77784 17.6194 7.32859 17.2995 7.04421C16.9779 6.75984 16.4442 6.7477 16.1054 7.01682Z"
                                        fill="#A7A4A4" />
                                    <path
                                        d="M11.7457 12.176H8.75621C8.33897 12.176 8 12.4607 8 12.8116V15.3217C8 15.6725 8.33897 15.9573 8.75621 15.9573H11.7457C12.163 15.9573 12.502 15.6725 12.502 15.3217V12.8116C12.502 12.4607 12.163 12.176 11.7457 12.176Z"
                                        fill="#A7A4A4" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_171_588">
                                        <rect width="25" height="21" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                </span>

            </a>
        @endif
        @if(Auth::guard('admins')->check())
            <a href="{{route('costumers')}}"
               class="m-nav {{ (request()->is('costumers')) ? 'activeClassNavMob__' : '' }}">
        <span>
            <svg width="26" viewBox="0 0 30 30" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.6364 16.3418C15.5814 15.3135 16.1605 13.9336 16.1605 12.4189C16.1605 9.24902 13.6252 6.6709 10.5079 6.6709C7.39069 6.6709 4.8554 9.24902 4.8554 12.4189C4.8554 13.9395 5.44025 15.3223 6.39098 16.3535C5.78597 16.7109 5.22417 17.1533 4.71424 17.6689C3.16425 19.2451 2.30859 21.3428 2.30859 23.5752C2.30859 24.9287 2.63703 25.8897 3.3083 26.5078C4.38868 27.501 5.99628 27.3311 7.85453 27.1377C8.70731 27.0498 9.5889 26.9561 10.5195 26.9561C11.45 26.9561 12.3316 27.0469 13.1844 27.1377C13.9104 27.2139 14.599 27.2842 15.2328 27.2842C16.221 27.2842 17.0738 27.1113 17.7306 26.5049C18.4048 25.8867 18.7303 24.9287 18.7303 23.5723C18.7303 21.3428 17.8747 19.2451 16.3247 17.666C15.8176 17.1445 15.2472 16.7021 14.6364 16.3418ZM10.5079 8.5459C12.6082 8.5459 14.3166 10.2832 14.3166 12.4189C14.3166 14.5547 12.6082 16.292 10.5079 16.292C8.40769 16.292 6.69925 14.5547 6.69925 12.4189C6.70213 10.2832 8.41057 8.5459 10.5079 8.5459ZM16.5004 25.1133C16.028 25.5469 14.7401 25.4121 13.3774 25.2715C12.5189 25.1836 11.548 25.0811 10.5252 25.0811C9.50247 25.0811 8.53157 25.1836 7.67303 25.2715C6.31031 25.4121 5.0225 25.5469 4.55002 25.1133C4.29073 24.8731 4.1582 24.3574 4.1582 23.5723C4.1582 20.8887 5.77445 18.5801 8.06773 17.5986C8.80815 17.9619 9.63788 18.1641 10.5137 18.1641C11.4673 18.1641 12.3662 17.9209 13.1556 17.4961C13.1239 17.54 13.0893 17.584 13.0519 17.625C15.3106 18.6211 16.8951 20.9121 16.8951 23.5693C16.8923 24.3545 16.7597 24.8731 16.5004 25.1133Z"
                                    fill="#A7A4A4" />
                                <path
                                    d="M24.7417 13.6729C24.2289 13.1514 23.6585 12.709 23.0477 12.3457C24.0071 11.3027 24.5891 9.89649 24.5718 8.35548C24.5631 7.68165 24.4421 7.03712 24.2232 6.43653C24.2232 6.4336 24.2203 6.43067 24.2203 6.42481C24.2116 6.40431 24.2059 6.3838 24.1972 6.36329C23.3906 4.21583 21.3508 2.67481 18.9653 2.65431C16.9861 2.63673 15.2373 3.65626 14.2117 5.21485C13.8026 5.83888 14.2405 6.67384 14.978 6.67384C15.2863 6.67384 15.5715 6.51856 15.7444 6.25782C15.8913 6.03517 16.0613 5.82716 16.2485 5.63966C16.2975 5.61036 16.3465 5.5752 16.3926 5.53419C17.084 4.91017 17.9973 4.53517 18.997 4.55567C20.6306 4.5879 22.0192 5.67774 22.5263 7.17774C22.6645 7.59376 22.7337 8.042 22.7222 8.50489C22.6732 10.4854 21.1405 12.126 19.1958 12.2666C19.1036 12.2725 19.0114 12.2754 18.9221 12.2783C18.8616 12.2783 18.8011 12.2842 18.7435 12.2959C18.3142 12.2959 17.9397 12.6035 17.8533 13.0342C17.8533 13.04 17.8504 13.0459 17.8504 13.0518C17.7351 13.6113 18.1414 14.1445 18.7032 14.168C18.7752 14.1709 18.8472 14.1709 18.9221 14.1709C19.8066 14.1709 20.6421 13.9629 21.3883 13.5938C23.647 14.5899 25.3064 16.919 25.3064 19.5762C25.3064 20.3584 25.1739 20.877 24.9146 21.1172C24.4421 21.5508 23.1543 21.416 21.7916 21.2754C21.5323 21.249 20.9676 21.1963 20.9561 21.2022C20.4548 21.2109 20.0515 21.627 20.0515 22.1367C20.0515 22.6465 20.4519 23.0596 20.9475 23.0713C20.9503 23.0742 21.3911 23.1182 21.6015 23.1416C22.3275 23.2178 23.016 23.2881 23.6498 23.2881C24.638 23.2881 25.4908 23.1152 26.1477 22.5088C26.8218 21.8906 27.1474 20.9326 27.1474 19.5762C27.1474 17.3467 26.2917 15.249 24.7417 13.6729Z"
                                    fill="#A7A4A4" />
                            </svg>
        </span>
            </a>
        @endif
        @if(in_array('admin',$urole) ||
        in_array('fs',$urole) ||
        in_array('salesmanager',$urole)
        ||in_array('menagment',$urole))
            <a href="{{route('leads')}}" class="m-nav {{ (request()->is('leads')) ? 'activeClassNavMob__' : '' }}">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" fill="none" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                   <path fill="#A7A4A4" d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                   <path fill="#A7A4A4" d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                   <path fill="#A7A4A4" d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg>
        </span>
            </a>
        @endif
        <div class="m-nav" onclick="openBurgerFunct()">
        <span>
        <svg width="26" height="26" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7H19" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1 1H19" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1 13H19" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
        </div>
    </div>
    <div class="bottom-burger-modal" id="bottom-burger" style="display: none; text-decoration: none !important;">
        <div class="my-2">
            <div class="row">
                <div class="col">
                    <img src="" class="img-fluid" alt="">
                </div>
                <div class="col me-2 mt-2">
                    <div class="my-auto text-end pe-2">
                    <svg onclick="openBurgerFunct()"  width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 2L2 18" stroke="#434343" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 2L18 18" stroke="#434343" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-of-burger col-9 mx-auto">
            <div class="my-3 m-burger">
                @if(in_array('fs',$urole) ||
                    in_array('salesmanager',$urole) ||
                    in_array('menagment',$urole) ||
                    in_array('admin',$urole))
                    <a href="{{route('Appointments')}}"
                       class="m-nav text-decoration-none {{ (request()->is('Appointments')) ? 'activeClassNavMob__' : '' }}">
                        <div class="row g-0">
                            <div class="col-auto my-auto me-3">
                                <svg width="22"
                                    viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.5625 7.79948V20.3989H2.25V7.79948H18.5625ZM18.5625 5.99956H2.25C1.2495 5.99956 0.4375 6.80413 0.4375 7.79948V20.3989C0.4375 21.3942 1.2495 22.1988 2.25 22.1988H18.5625C19.5648 22.1988 20.375 21.3942 20.375 20.3989V7.79948C20.375 6.80413 19.5648 5.99956 18.5625 5.99956ZM19.4688 2.39974H16.75V1.49978C16.75 1.003 16.344 0.599823 15.8438 0.599823C15.3435 0.599823 14.9375 1.003 14.9375 1.49978V2.39974H5.875V1.49978C5.875 1.003 5.469 0.599823 4.96875 0.599823C4.4685 0.599823 4.0625 1.003 4.0625 1.49978V2.39974H1.34375C0.8435 2.39974 0.4375 2.80292 0.4375 3.29969C0.4375 3.79647 0.8435 4.19965 1.34375 4.19965H19.4688C19.969 4.19965 20.375 3.79647 20.375 3.29969C20.375 2.80292 19.969 2.39974 19.4688 2.39974ZM5.875 9.59939H4.0625V11.3993H5.875V9.59939ZM9.5 9.59939H7.6875V11.3993H9.5V9.59939ZM13.125 9.59939H11.3125V11.3993H13.125V9.59939ZM16.75 9.59939H14.9375V11.3993H16.75V9.59939ZM5.875 13.1992H4.0625V14.9991H5.875V13.1992ZM9.5 13.1992H7.6875V14.9991H9.5V13.1992ZM13.125 13.1992H11.3125V14.9991H13.125V13.1992ZM16.75 13.1992H14.9375V14.9991H16.75V13.1992ZM5.875 16.799H4.0625V18.599H5.875V16.799ZM9.5 16.799H7.6875V18.599H9.5V16.799ZM13.125 16.799H11.3125V18.599H13.125V16.799ZM16.75 16.799H14.9375V18.599H16.75V16.799Z"
                                        fill="#A7A4A4" />
                                </svg>
                            </div>

                            <div class="col my-auto">
                                <div>
                                    <span class="fs-6 {{ (request()->is('Appointments')) ? 'activeClassNavMob__' : '' }}" style="color: #A7A4A4;font-weight: 500">
                                        Kalender
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        <div class="my-3 m-burger">
            <a href="{{route('hr_view')}}" class="m-nav text-decoration-none {{ (request()->is('hr_view')) ? 'activeClassNavMob__' : '' }}">
                    <div class="row g-0">
                        <div class="col-auto my-auto pe-3">
                            <svg width="22" height="24" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8757 6.77321L18.8782 6.77093L18.7214 6.60039L18.6374 6.48654H18.9258C19.9479 6.48654 20.7768 7.31541 20.7767 8.33758V8.3376C20.7767 11.5768 20.774 16.1418 20.7712 19.8972C20.7698 21.7749 20.7684 23.4501 20.7674 24.6559L20.7661 26.0792L20.7658 26.4642L20.7657 26.5641L20.7657 26.5895L20.7657 26.5959L20.7657 26.5976L20.7657 26.598C20.7657 26.5981 20.7657 26.5981 21.2657 26.5986L20.7657 26.5981V26.5986C20.7657 27.0966 20.3619 27.5 19.8646 27.5C19.3669 27.5 18.9631 27.0964 18.9631 26.5986V18.2472V17.7472H18.4631H17.5287H17.0287V18.2472V26.5986C17.0287 26.9096 17.0826 27.2036 17.1749 27.4763C17.11 27.4919 17.0428 27.5001 16.974 27.5001C16.4765 27.5001 16.0725 27.0964 16.0725 26.5986V26.5986L16.0708 13.2328L16.1896 13.1822L16.1899 13.1821L16.353 13.1128L16.353 13.1128L16.3549 13.112C16.5642 13.0221 16.7542 12.8839 16.909 12.7007L16.909 12.7006L20.5026 8.44529L20.51 8.43659L20.5169 8.42756C20.5382 8.39988 20.5524 8.37559 20.5599 8.36195C20.5637 8.35511 20.5666 8.34956 20.5678 8.34716L20.5684 8.3461C20.5668 8.3491 20.5592 8.36398 20.5477 8.38207C20.546 8.38475 20.5442 8.38755 20.5422 8.39045C20.5456 8.38529 20.5483 8.38092 20.5502 8.37769L20.5543 8.37084L20.5554 8.36901L20.5555 8.36882M18.8757 6.77321L18.7322 6.61495L18.8594 6.78734C18.8648 6.78291 18.8702 6.7782 18.8757 6.77321ZM18.8757 6.77321L18.8598 6.78785L18.8602 6.78833C18.8581 6.78996 18.8561 6.79156 18.8541 6.79312L14.9585 10.3748L14.8952 10.433L14.816 10.4667L10.7969 12.1784L10.7966 12.1786C10.4575 12.3227 10.2992 12.7147 10.4433 13.0542C10.552 13.3081 10.7985 13.4611 11.0591 13.4611C11.1455 13.4611 11.2332 13.444 11.3179 13.4077L11.3194 13.407L15.5237 11.617L15.525 11.6164C15.5945 11.587 15.6578 11.5462 15.7136 11.4947L15.7143 11.494L19.7532 7.77978C19.7654 7.76611 19.7796 7.75153 19.7962 7.73683L20.3061 8.26537L20.3787 8.34063L20.4899 8.45584C20.4937 8.45176 20.4974 8.44774 20.5009 8.44382C20.5062 8.43781 20.5111 8.43201 20.5156 8.4265C20.5236 8.41659 20.5302 8.40761 20.5355 8.40003C20.5427 8.38966 20.5481 8.38105 20.5513 8.37591C20.5532 8.37282 20.5548 8.37007 20.5555 8.36882M20.5555 8.36882C20.5559 8.36817 20.556 8.36793 20.5558 8.36826L20.5555 8.36882ZM20.1207 8.1226L20.1212 8.12309L20.1213 8.12327L20.4584 8.48982L20.4582 8.49004L17.5586 11.1565L16.527 12.378C16.423 12.5012 16.2964 12.5929 16.1575 12.6526L20.1207 8.1226ZM20.1207 8.1226C20.1219 8.12102 20.1228 8.1193 20.1237 8.11756C20.1248 8.11525 20.126 8.11292 20.128 8.11088C20.1262 8.11245 20.1251 8.11441 20.1239 8.11638C20.1228 8.11831 20.1217 8.12024 20.12 8.12178L20.1207 8.1226ZM19.7851 7.7504L19.7815 7.75375L19.7852 7.75042L19.7851 7.7504ZM19.716 7.82689L17.1969 10.8098L16.0527 11.862C15.9549 11.9524 15.8427 12.025 15.7196 12.077L11.5153 13.867C11.3667 13.9309 11.2117 13.9611 11.0591 13.9611C10.6048 13.9611 10.1732 13.6946 9.98336 13.2503L19.716 7.82689ZM17.4825 6.53904L16.369 7.32988C16.6224 6.94042 17.0182 6.65214 17.4825 6.53904Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M20.6555 2.73067V2.73069C20.6555 3.96267 19.6577 4.96087 18.4247 4.96087C17.1929 4.96087 16.1941 3.96255 16.1941 2.73069C16.1941 1.49825 17.1929 0.5 18.4247 0.5C19.6577 0.5 20.6555 1.49815 20.6555 2.73067Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M5.80586 2.73069C5.80586 3.96254 4.80711 4.96087 3.57512 4.96087C2.34231 4.96087 1.34448 3.96268 1.34448 2.73069C1.34448 1.49813 2.34237 0.5 3.57512 0.5C4.80705 0.5 5.80586 1.49827 5.80586 2.73069Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                    <path d="M6.66035 10.1828L6.70721 10.228L6.76409 10.2597L9.05835 11.5382C8.81058 11.9305 8.67934 12.3912 8.69168 12.8624L5.98097 11.3523L5.97961 11.3516C5.93141 11.3249 5.88472 11.2906 5.84061 11.2487L2.6157 8.13821L1.88404 8.81765L4.76635 12.286L4.76633 12.286L4.76889 12.2891C4.80797 12.3353 4.8539 12.3783 4.9037 12.4146L4.90368 12.4147L4.90881 12.4183L5.20673 12.63L5.20691 12.6301L5.92912 13.1437L5.9274 26.5985V26.5986C5.9274 27.0963 5.52336 27.5 5.02595 27.5C4.95702 27.5 4.88973 27.4918 4.82476 27.4762C4.91713 27.2036 4.97119 26.9096 4.97119 26.5986V18.2472V17.7472H4.47119H3.53673H3.03673V18.2472V26.5986C3.03673 27.0965 2.633 27.5001 2.13528 27.5001C1.63805 27.5001 1.23422 27.0966 1.23422 26.5986L1.23422 26.5981L0.73422 26.5986C1.23422 26.5981 1.23422 26.5981 1.23422 26.598L1.23422 26.5976L1.23422 26.596L1.23421 26.5897L1.23419 26.5647L1.2341 26.4665L1.23374 26.0877L1.23249 24.6851C1.23145 23.4955 1.23007 21.8397 1.22868 19.975C1.22591 16.2455 1.22314 11.6804 1.22314 8.33765C1.22314 7.31541 2.05197 6.48654 3.07425 6.48654H4.07804C4.09839 6.48654 4.11866 6.48687 4.13884 6.48752L3.54381 7.17654L6.66035 10.1828ZM4.29837 6.49953C4.98439 6.58096 5.55567 7.03785 5.80069 7.65895L4.29837 6.49953Z" fill="#A7A4A4" stroke="#A7A4A4"/>
                                </svg>
                        </div>
                        <div class="col my-auto">
                            <div>
                                <span class="fs-6 {{ (request()->is('hr_view')) ? 'activeClassNavMob__' : '' }}" style="color: #A7A4A4;font-weight: 500">
                                    HR
                                </span>
                            </div>

                        </div>
                    </div>
            </a>
            </div>
            <div class="my-3 m-burger">
            @if(Auth::check() && !auth()->user()->hasRole('callagent')  && !auth()->user()->hasRole('fs') && !auth()->user()->hasRole('salesmanager') && !auth()->user()->hasRole('backoffice'))
                <a href="{{route('finance')}}" class="m-nav text-decoration-none {{ (request()->is('finance')) ? 'activeClassNavMob__' : '' }}">
                    <div class="row g-0">
                        <div class="col-auto pe-3">
                            <svg width="22" height="24" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.2927 0H5.14407C3.71769 0 2.55754 1.06117 2.55754 2.36567V2.57302C1.14468 2.58773 0 3.64193 0 4.93727V12.2971C0 13.6016 1.16038 14.6628 2.58654 14.6628H17.7352C19.1614 14.6628 20.3217 13.6016 20.3217 12.2971V12.0898C21.7343 12.0754 22.8793 11.0212 22.8793 9.72551V2.36578C22.8796 1.06128 21.7189 0 20.2927 0ZM18.6632 12.2971C18.6632 12.6803 18.2384 13.0038 17.7355 13.0038H2.58686C2.08397 13.0038 1.65924 12.6803 1.65924 12.2971V4.93738C1.65924 4.5544 2.08419 4.23073 2.58686 4.23073H17.7355C18.2384 4.23073 18.6632 4.55451 18.6632 4.93738V12.2971ZM20.3221 10.4299V4.93727C20.3221 3.63277 19.1617 2.5716 17.7355 2.5716H4.21645V2.36567C4.21645 1.98269 4.6414 1.65902 5.14407 1.65902H20.2927C20.7956 1.65902 21.2204 1.9828 21.2204 2.36567V9.72551H21.2207C21.2206 10.101 20.8118 10.4174 20.3221 10.4299Z" fill="#A7A4A4"/>
                                <path d="M10.1907 7.99572C9.49256 7.91254 9.13814 7.81301 9.13814 7.49883C9.13814 7.01217 9.84261 6.95963 10.1457 6.95963C10.5917 6.95963 11.0849 7.17526 11.2455 7.44039L11.3094 7.54625L12.3283 7.07486L12.2661 6.94796C11.9075 6.21559 11.2718 5.99439 10.781 5.90445V5.25635H9.58926V5.90107C8.53975 6.06449 7.91737 6.65558 7.91737 7.49861C7.91737 8.88574 9.21849 9.03117 10.0786 9.12765C10.8605 9.21998 11.2249 9.40771 11.2249 9.71819C11.2249 10.3188 10.3767 10.3654 10.1165 10.3654C9.53311 10.3654 8.97124 10.0765 8.80978 9.69301L8.75582 9.56557L7.65039 10.0339L7.7049 10.1613C8.01592 10.8896 8.68256 11.3489 9.58893 11.4633V12.162H10.7806V11.4284C11.6504 11.3212 12.4885 10.7649 12.4885 9.71786C12.4888 8.27917 11.1061 8.10877 10.1907 7.99572Z" fill="#A7A4A4"/>
                            </svg>
                        </div>
                        <div class="col">
                            <div>
                            <span class="fs-6 {{ (request()->is('finance')) ? 'activeClassNavMob__' : '' }} " style="color: #A7A4A4;font-weight: 500">
                                Finanzen
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
            </div>
            <div class="my-3 m-burger">
                @if(Auth::check() && !auth()->user()->hasRole('callagent'))
                    <a href="{{route('statistics')}}" class="m-nav text-decoration-none {{ (request()->is('statistics')) ? 'activeClassNavMob__' : '' }}">
                        <div class="row g-0">
                            <div class="col-auto pe-3">
                                <svg width="22" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.3571 18.7143H15.8401V11.3353C15.8401 10.9802 15.5524 10.6924 15.1973 10.6924H13.007C12.6519 10.6924 12.3641 10.9802 12.3641 11.3353V18.7143H11.0855V8.23843C11.0855 7.88336 10.7977 7.59557 10.4426 7.59557H8.25236C7.89729 7.59557 7.6095 7.88336 7.6095 8.23843V18.7143H6.33093V5.11093C6.33093 4.75586 6.04314 4.46807 5.68807 4.46807H3.49779C3.14271 4.46807 2.85493 4.75586 2.85493 5.11093V18.7143H1.28571V0.642857C1.28571 0.287786 0.997929 0 0.642857 0C0.287786 0 0 0.287786 0 0.642857V19.3571C0 19.7122 0.287786 20 0.642857 20H19.3571C19.7122 20 20 19.7122 20 19.3571C20 19.0021 19.7122 18.7143 19.3571 18.7143ZM13.6499 11.9781H14.5544V18.7143H13.6499V11.9781ZM8.89529 8.88129H9.79986V18.7143H8.89529V8.88129ZM4.14064 5.75379H5.04521V18.7143H4.14064V5.75379Z" fill="#A7A4A4"/>
                                </svg>
                            </div>
                            <div class="col">
                                <div>
                                <span class="fs-6 {{ (request()->is('statistics')) ? 'activeClassNavMob__' : '' }}" style="color: #A7A4A4;font-weight: 500" >
                                    Statistik
                        </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            <div class="my-3 m-burger">
                @if(auth()->check())
                    <a href="{{route('addnewuser')}}"
                       class="m-nav text-decoration-none {{ (request()->is('addnewuser')) ? 'activeClassNavMob__' : '' }}">
                        <div class="row g-0">
                            <div class="col-auto pe-3">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 13.125C11.9497 13.125 13.125 11.9497 13.125 10.5C13.125 9.05025 11.9497 7.875 10.5 7.875C9.05025 7.875 7.875 9.05025 7.875 10.5C7.875 11.9497 9.05025 13.125 10.5 13.125Z" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.975 13.125C16.8585 13.3889 16.8238 13.6817 16.8752 13.9655C16.9267 14.2494 17.062 14.5113 17.2637 14.7175L17.3163 14.77C17.479 14.9325 17.608 15.1255 17.6961 15.338C17.7842 15.5504 17.8295 15.7781 17.8295 16.0081C17.8295 16.2381 17.7842 16.4658 17.6961 16.6783C17.608 16.8907 17.479 17.0837 17.3163 17.2462C17.1537 17.409 16.9607 17.538 16.7483 17.6261C16.5358 17.7142 16.3081 17.7595 16.0781 17.7595C15.8481 17.7595 15.6204 17.7142 15.408 17.6261C15.1955 17.538 15.0025 17.409 14.84 17.2462L14.7875 17.1937C14.5813 16.992 14.3194 16.8567 14.0355 16.8052C13.7517 16.7538 13.4589 16.7885 13.195 16.905C12.9362 17.0159 12.7155 17.2001 12.56 17.4348C12.4046 17.6696 12.3211 17.9447 12.32 18.2262V18.375C12.32 18.8391 12.1356 19.2842 11.8074 19.6124C11.4792 19.9406 11.0341 20.125 10.57 20.125C10.1059 20.125 9.66075 19.9406 9.33256 19.6124C9.00437 19.2842 8.82 18.8391 8.82 18.375V18.2962C8.81323 18.0066 8.71948 17.7257 8.55095 17.4901C8.38241 17.2545 8.14689 17.075 7.875 16.975C7.61109 16.8585 7.31833 16.8238 7.03449 16.8752C6.75064 16.9267 6.48872 17.062 6.2825 17.2637L6.23 17.3163C6.06747 17.479 5.87447 17.608 5.66202 17.6961C5.44957 17.7842 5.22185 17.8295 4.99187 17.8295C4.7619 17.8295 4.53418 17.7842 4.32173 17.6961C4.10928 17.608 3.91628 17.479 3.75375 17.3163C3.59104 17.1537 3.46196 16.9607 3.3739 16.7483C3.28583 16.5358 3.2405 16.3081 3.2405 16.0781C3.2405 15.8481 3.28583 15.6204 3.3739 15.408C3.46196 15.1955 3.59104 15.0025 3.75375 14.84L3.80625 14.7875C4.00797 14.5813 4.14329 14.3194 4.19475 14.0355C4.24622 13.7517 4.21148 13.4589 4.095 13.195C3.98408 12.9362 3.79991 12.7155 3.56516 12.56C3.3304 12.4046 3.05531 12.3211 2.77375 12.32H2.625C2.16087 12.32 1.71575 12.1356 1.38756 11.8074C1.05937 11.4792 0.875 11.0341 0.875 10.57C0.875 10.1059 1.05937 9.66075 1.38756 9.33256C1.71575 9.00437 2.16087 8.82 2.625 8.82H2.70375C2.99337 8.81323 3.27425 8.71948 3.50989 8.55095C3.74552 8.38241 3.925 8.14689 4.025 7.875C4.14148 7.61109 4.17622 7.31833 4.12475 7.03449C4.07329 6.75064 3.93797 6.48872 3.73625 6.2825L3.68375 6.23C3.52104 6.06747 3.39196 5.87447 3.3039 5.66202C3.21583 5.44957 3.1705 5.22185 3.1705 4.99187C3.1705 4.7619 3.21583 4.53418 3.3039 4.32173C3.39196 4.10928 3.52104 3.91628 3.68375 3.75375C3.84628 3.59104 4.03928 3.46196 4.25173 3.3739C4.46418 3.28583 4.6919 3.2405 4.92188 3.2405C5.15185 3.2405 5.37957 3.28583 5.59202 3.3739C5.80447 3.46196 5.99747 3.59104 6.16 3.75375L6.2125 3.80625C6.41872 4.00797 6.68064 4.14329 6.96448 4.19475C7.24833 4.24622 7.54109 4.21148 7.805 4.095H7.875C8.1338 3.98408 8.35451 3.79991 8.50998 3.56516C8.66545 3.3304 8.74888 3.05531 8.75 2.77375V2.625C8.75 2.16087 8.93437 1.71575 9.26256 1.38756C9.59075 1.05937 10.0359 0.875 10.5 0.875C10.9641 0.875 11.4092 1.05937 11.7374 1.38756C12.0656 1.71575 12.25 2.16087 12.25 2.625V2.70375C12.2511 2.98531 12.3346 3.2604 12.49 3.49516C12.6455 3.72991 12.8662 3.91408 13.125 4.025C13.3889 4.14148 13.6817 4.17622 13.9655 4.12475C14.2494 4.07329 14.5113 3.93797 14.7175 3.73625L14.77 3.68375C14.9325 3.52104 15.1255 3.39196 15.338 3.3039C15.5504 3.21583 15.7781 3.1705 16.0081 3.1705C16.2381 3.1705 16.4658 3.21583 16.6783 3.3039C16.8907 3.39196 17.0837 3.52104 17.2462 3.68375C17.409 3.84628 17.538 4.03928 17.6261 4.25173C17.7142 4.46418 17.7595 4.6919 17.7595 4.92188C17.7595 5.15185 17.7142 5.37957 17.6261 5.59202C17.538 5.80447 17.409 5.99747 17.2462 6.16L17.1937 6.2125C16.992 6.41872 16.8567 6.68064 16.8052 6.96448C16.7538 7.24833 16.7885 7.54109 16.905 7.805V7.875C17.0159 8.1338 17.2001 8.35451 17.4348 8.50998C17.6696 8.66545 17.9447 8.74888 18.2262 8.75H18.375C18.8391 8.75 19.2842 8.93437 19.6124 9.26256C19.9406 9.59075 20.125 10.0359 20.125 10.5C20.125 10.9641 19.9406 11.4092 19.6124 11.7374C19.2842 12.0656 18.8391 12.25 18.375 12.25H18.2962C18.0147 12.2511 17.7396 12.3346 17.5048 12.49C17.2701 12.6455 17.0859 12.8662 16.975 13.125V13.125Z" stroke="#A7A4A4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                            </div>
                            <div class="col ">
                                <div>
                                <span class="fs-6 {{ (request()->is('addnewuser')) ? 'activeClassNavMob__' : '' }}" style="color: #A7A4A4;font-weight: 500">
                                    Einstellungen
                                </span>
                                </div>
                            </div>
                        </div>            
                    </a>
                @endif
            </div>
            <div class="my-3 m-burger">
                @if(auth()->user()->admin_id != null)
                    <a href="{{action('App\Http\Controllers\UserController@changerole')}}" class="m-nav text-decoration-none">
                    <div class="row g-0">
                        <div class="col-auto pe-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" fill="#a7a4a4" class="bi bi-person-check" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                        </div>
                        <div class="col">
                            <div>
                            <span class="fs-6 " style="color: #A7A4A4;font-weight: 500">
                                Rolle Wechseln
                            </span>
                            </div>
                        </div>
                    </div>
                    </a>
                @endif
            </div>
            <div class="my-3 m-burger">
                <a href="{{route('logout')}}" class="m-nav text-decoration-none">
                    <div class="row g-0">
                        <div class="col-auto pe-3">
                            <svg width="22" height="24" viewBox="0 0 18 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.80469 15.3333H2.13802C1.1255 15.3333 0.304688 14.5125 0.304688 13.5V2.49999C0.304688 1.48747 1.1255 0.666656 2.13802 0.666656H5.80469V2.49999H2.13802V13.5H5.80469V15.3333Z"
                                        fill="#A7A4A4" />
                                    <path
                                        d="M10.6877 12.9363L11.9896 11.6454L8.39698 8.02219H16.778C17.2842 8.02219 17.6946 7.6118 17.6946 7.10552C17.6946 6.59925 17.2842 6.18885 16.778 6.18885H8.37938L12.0281 2.57095L10.7372 1.2691L4.87891 7.07793L10.6877 12.9363Z"
                                        fill="#A7A4A4" />
                            </svg>
                        </div>
                        <div class="col">
                            <div>
                            <span class="fs-6 " style="color: #A7A4A4;font-weight: 500">
                                Abmelden
                            </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    </div>
    <script>
        function openDropDownSelect() {
            var x = document.getElementById("dropdownSelectId");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect1() {
            var x = document.getElementById("dropdownSelectId1");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect2() {
            var x = document.getElementById("dropdownSelectId2");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect3() {
            var x = document.getElementById("dropdownSelectId3");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect4() {
            var x = document.getElementById("dropdownSelectId4");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect5() {
            var x = document.getElementById("dropdownSelectId5");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect6() {
            var x = document.getElementById("dropdownSelectId6");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect7() {
            var x = document.getElementById("dropdownSelectId7");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function openDropDownSelect8() {
            var x = document.getElementById("dropdownSelectId8");
            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function makeSelectActive(x, number) {
            dateFrom = document.getElementById('statusvomvertragFromm').value
            dateTo = document.getElementById('statusvomvertragToo').value
            axios.get('filtercontract?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
                document.getElementById('provisionert').innerHTML = response.data[0]
                document.getElementById('aufgenommen').innerHTML = response.data[1]
                document.getElementById('eingereicht').innerHTML = response.data[2]
                document.getElementById('abgelehnt').innerHTML = response.data[3]
                // document.getElementById('offenBerater').innerHTML = response.data[4]
                for (let i = 0; i < 4; i++) {
                    if(response.data[i]==0){
                        response.data[i]=null;
                    }
                    console.log(response.data[i]);
                }
                $(function() {
                    var data = [{
                        "id": "idData",
                        "name": "Data",
                        "data": [{
                                name: 'Provisionert',
                                y: response.data[0],
                                color: '#43B21C'
                            },
                            {
                                name: 'Aufgenommen',
                                y: response.data[1],
                                color: '#9FD78C'
                            },
                            {
                                name: 'Eingereicht',
                                y: response.data[2],
                                color: '#C4C4C4'
                            },
                            {
                                name: 'Abgelehnt',
                                y: response.data[3],
                                color: '#DB5437'
                            },
                            // {
                            //     name: 'Offen Berater',
                            //     y: response.data[4],
                            //     color: '#F79C42'
                            // },
                        ]
                    }];
                    window.mychart = Highcharts.chart('chart1', {
                        chart: {
                            type: 'pie',
                            plotShadow: false,
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                innerSize: '98%',
                                borderWidth: 38,
                                borderColor: null,
                                slicedOffset: 10,
                                dataLabels: {
                                    connectorWidth: 0,
                                    enabled: false,
                                },
                            }
                        },
                        title: {
                            verticalAlign: 'middle',
                            floating: false,
                            text: response.data[0] + response.data[1] + response.data[2] + response
                                .data[3] ,
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                        },
                        enabled: true,
                        series: data,
                    });
                    $('input[type="radio"]').on('click', function(event) {
                        var value = $(this).val();
                        window.mychart.series[0].setData([data[0].data[value]]);
                        window.mychart.redraw();
                    });
                });
            }).catch((error) =>{console.log(error)})
    
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg");
            $(activeSvg).removeClass("activeSvg");
            $(svg).addClass("activeSvg");
            $("#activeDropDownItem").html(y)
            $("#dropdownSelectId").hide()
        }
        function statisticContrats() {
            model = document.getElementById('model')
            gesellschaft = document.getElementById('gesellschaft')
            axios.get('statistic?model=' + model.value + '&gesellschaft=' + gesellschaft.value).then(response => {
                var totali = 0
                if (response.data['Provisionert'] != null) {
                    document.getElementById('provisionert').innerHTML = response.data['Provisionert']
                    totali += response.data['Provisionert']
                } else {
                    document.getElementById('provisionert').innerHTML = 0
                }
                if (response.data['Aufgenommen'] != null) {
                    document.getElementById('aufgenommen').innerHTML = response.data['Aufgenommen']
                    totali += response.data['Aufgenommen']
                } else {
                    document.getElementById('aufgenommen').innerHTML = 0
                }
                if (response.data['Eingereicht'] != null) {
                    document.getElementById('eingereicht').innerHTML = response.data['Eingereicht']
                    totali += response.data['Eingereicht']
                } else {
                    document.getElementById('eingereicht').innerHTML = 0
                }
                if (response.data['Abgelehnt'] != null) {
                    document.getElementById('abgelehnt').innerHTML = response.data['Abgelehnt']
                    totali += response.data['Abgelehnt']
                } else {
                    document.getElementById('abgelehnt').innerHTML = 0
                }
                // if (response.data['Offen (Berater)'] != null) {
                //     document.getElementById('offenBerater').innerHTML = response.data['Offen (Berater)']
                //     totali += response.data['Offen (Berater)']
                // } else {
                //     document.getElementById('offenBerater').innerHTML = 0
                // }
                $(function() {
                    var data = [{
                        "id": "idData",
                        "name": "Data",
                        "data": [{
                                name: 'Provisionert',
                                y: response.data['Provisionert'],
                                color: '#43B21C'
                            },
                            {
                                name: 'Aufgenommen',
                                y: response.data['Aufgenommen'],
                                color: '#9FD78C'
                            },
                            {
                                name: 'Eingereicht',
                                y: response.data['Eingereicht'],
                                color: '#C4C4C4'
                            },
                            {
                                name: 'Abgelehnt',
                                y: response.data['Abgelehnt'],
                                color: '#DB5437'
                            },
                            // {
                            //     name: 'Offen Berater',
                            //     y: response.data['Offen (Berater)'],
                            //     color: '#F79C42'
                            // },
                        ]
                    }];
                    window.mychart = Highcharts.chart('chart1', {
                        chart: {
                            type: 'pie',
                            plotShadow: false,
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                innerSize: '98%',
                                borderWidth: 38,
                                borderColor: null,
                                slicedOffset: 10,
                                dataLabels: {
                                    connectorWidth: 0,
                                    enabled: false,
                                },
                            }
                        },
                        title: {
                            verticalAlign: 'middle',
                            floating: false,
                            text: totali,
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                        },
                        enabled: true,
                        series: data,
                    });
                    $('input[type="radio"]').on('click', function(event) {
                        var value = $(this).val();
                        window.mychart.series[0].setData([data[0].data[value]]);
                        window.mychart.redraw();
                    });
                });
            })
        }
        function makeSelectActive1(x, numberi) {
            dateFrom = document.getElementById('vertrageFrom').value
            dateTo = document.getElementById('vertrageTo').value
            axios.get('provisionert?numberi=' + numberi + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
                $('#grund').html(response.data[0]);
                $('#rechts').html(response.data[1]);
                $('#vor').html(response.data[2]);
                $('#auto').html(response.data[3]);
                $('#zus').html(response.data[4]);
                $('#haus').html(response.data[5]);
            })
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg1");
            $(activeSvg).removeClass("activeSvg1");
            $(svg).addClass("activeSvg1");
            $("#activeDropDownItem1").html(y)
            $("#dropdownSelectId1").hide()
        }
        function makeSelectActive2(x,number) {
            axios.get('costumersFilter?number=' + number).then( response => {
                console.log(response.data)
            })
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg2");
            $(activeSvg).removeClass("activeSvg2");
            $(svg).addClass("activeSvg2");
            $("#activeDropDownItem2").html(y)
            $("#dropdownSelectId2").hide()
        }
        function makeSelectActive3(x) {
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg3");
            $(activeSvg).removeClass("activeSvg3");
            $(svg).addClass("activeSvg3");
            $("#activeDropDownItem3").html(y)
            $("#dropdownSelectId3").hide()
        }
        function makeSelectActive4(x) {
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg4");
            $(activeSvg).removeClass("activeSvg4");
            $(svg).addClass("activeSvg4");
            $("#activeDropDownItem4").html(y)
            $("#dropdownSelectId4").hide()
        }
        function makeSelectActive5(x, number) {
            dateFrom = document.getElementById('leadsFrom').value
            dateTo = document.getElementById('leadsTo').value
            axios.get('filterLead?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
                document.getElementById('abgeschlossen').innerHTML = response.data[1]
                document.getElementById('nichtabgeschlossen').innerHTML = response.data[0]
                document.getElementById('wonleads').innerHTML = response.data[2]
                
                if(response.data[0] + response.data[1] + response.data[2] == 0){
                    document.querySelector("#chart3").innerHTML = '<div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #d1d1d1">'+
                                                '<div class="py-5">Keine Data</div></div>';
                }else{
                    $(function() {
                    var data = [{
                        "id": "idData",
                        "name": "Data",
                        "data": [{
                                name: 'Abgeschlossen',
                                y: response.data[1],
                                color: '#001c62'
                            },
                            {
                                name: 'Nicht abgeschlossen',
                                y: response.data[0],
                                color: '#3d66ce'
                            },
                            {
                                name: 'Won Leads',
                                y: response.data[2],
                                color: '#74a3e1'
                            }
                        ]
                    }];
                    window.mychart = Highcharts.chart('chart3', {
                        chart: {
                            type: 'pie',
                            plotShadow: false,
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                innerSize: '98%',
                                borderWidth: 38,
                                borderColor: null,
                                slicedOffset: 10,
                                dataLabels: {
                                    connectorWidth: 0,
                                    enabled: false,
                                },
                            }
                        },
                        title: {
                            verticalAlign: 'middle',
                            floating: false,
                            text: response.data[0] + response.data[1] + response.data[2] 
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                        },
                        enabled: true,
                        series: data,
                    });
                    $('input[type="radio"]').on('click', function(event) {
                        var value = $(this).val();
                        window.mychart.series[0].setData([data[0].data[value]]);
                        window.mychart.redraw();
                    });
                });
            }
            });
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg5");
            $(activeSvg).removeClass("activeSvg5");
            $(svg).addClass("activeSvg5");
            $("#activeDropDownItem5").html(y)
            $("#dropdownSelectId5").hide()
        }
        function makeSelectActive6(x, number) {
            dateFrom = document.getElementById('dauervomleadFrom').value
            dateTo = document.getElementById('dauervomleadTo').value
            axios.get('durationOfLead?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
                if(response.data[0] + response.data[1] + response.data[2] + response.data[3] + response.data[4] + response.data[5] + response.data[6] + response.data[7] + response.data[8] + response.data[9] + response.data[10] + response.data[11] == 0){
                    document.querySelector("#chart5").innerHTML = '<div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #d1d1d1">'+
                                                '<div class="py-5">Keine Data</div></div>';
                }else{
                var options = {
                    colors: ['#C74E46'],
                    series: [{
                        name: "Days",
                        data: [response.data[0], response.data[1], response.data[2], response.data[3],
                            response.data[4], response.data[5], response.data[6], response.data[7],
                            response.data[8], response.data[9], response.data[10], response.data[11]
                        ],
                        colors: ['#C74E46']
                    }],
                    chart: {
                        height: 200,
                        width: "100%",
                        type: 'line',
                        zoom: {
                            enabled: false
                        },
                        colors: ['#C74E46']
                    },
                    tooltip: {
                        colors: ['#C74E46'],
                        markers: {
                            colors: ['#C74E46'],
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight',
                        colors: ['#C74E46'],
                        width: 2,
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#f4f4f4',
                        row: {
                            colors: ['#fff']
                        },
                        column: {
                            colors: ['#fff']
                        },
                        xaxis: {
                            lines: {
                                show: true,
                            }
                        },
                        yaxis: {
                            lines: {
                                show: true,
                            }
                        }
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ],
                        borderColor: '#F4F4F4',
                    },
                    responsive: [{
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: '95%'
                            },
                            legend: {
                                show: false,
                            }
                        }
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart5"), options);
                chart.render();
                chart.updateSeries([response.data[0], response.data[1], response.data[2], response.data[3],
                            response.data[4], response.data[5], response.data[6], response.data[7],
                            response.data[8], response.data[9], response.data[10], response.data[11]]);
            }
            
            })
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg6");
            $(activeSvg).removeClass("activeSvg6");
            $(svg).addClass("activeSvg6");
            $("#activeDropDownItem6").html(y)
            $("#dropdownSelectId6").hide()
        }
        async function makeSelectActive7(x, number) {
            dateFrom = document.getElementById('hrFrom').value
            dateTo = document.getElementById('hrTo').value
            await axios.get('holidayReason?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then(response => {
                if(response.data[0] + response.data[1] + response.data[2] + response.data[3] == 0){
                
                    document.querySelector("#chart6").innerHTML = '<div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #d1d1d1">'+
                                                '<div class="py-5">Keine Data</div></div>';
            }else{
                    var options = {
                    colors: ['#DB5437', '#F79C42', '#EBCB38', '#A2B969'],
                    series: [response.data[0], response.data[1], response.data[2], response.data[3]],
                    chart: {
                        width: "60%",
                        type: 'pie',
                    },
                    fill: {
                        colors: ['#DB5437', '#F79C42', '#EBCB38', '#A2B969']
                    },
                    dataLabels: {
                        enabled: false
                    },
                    labels: ['Urlaub', 'Krankheit / Unfall', 'Weiterbildun', 'Other'],
                    legend: {
                        offsetY: 0,
                    },
                    stroke: {
                        width: 0
                    },
                    responsive: [{
                        breakpoint: 1250,
                        options: {
                            chart: {
                                width: "100%",
                            },
                            legend: {
                                show: true,
                                position: "bottom"
                            },
                        },
                    }]
                };
                var chart = new ApexCharts(document.querySelector("#chart6"), options);
                chart.render();
                chart.updateSeries([response.data[0], response.data[1], response.data[2], response.data[3]])
                }
                
            })
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg7");
            $(activeSvg).removeClass("activeSvg7");
            $(svg).addClass("activeSvg7");
            $("#activeDropDownItem7").html(y)
            $("#dropdownSelectId7").hide()
        }
        function makeSelectActive8(x, number) {
            
            dateFrom = document.getElementById('terminFrom').value
            dateTo = document.getElementById('terminTo').value
            axios.get('appointmentStat?number=' + number + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo).then( response => {
                document.getElementById('teraccepted').innerHTML = response.data[0]
                document.getElementById('terpending').innerHTML = response.data[1]
                document.getElementById('terrejected').innerHTML = response.data[2]
                document.getElementById('terfolget').innerHTML = response.data[3]
                 document.getElementById('tertotal').innerHTML = response.data[0] + response.data[1] + response.data[2] + response.data[3]
                 if(response.data[0] + response.data[1] + response.data[2] + response.data[3] == 0){
                    document.querySelector("#chart7").innerHTML = '<div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center py-5" style="color: #d1d1d1">'+
                                                '<div class="py-5">Keine Data</div></div>';
                }else{

                var options = {
                    colors: ['','',''],
                    series: [response.data[0], response.data[1], response.data[2],response.data[3]],
                    chart: {
                        width: "120%",
                        type: 'pie',
                    },
                    fill: {
                        colors: ['#79B887', '#d9d9d9', '#C74E46','#FFBF00']
                    },
                    dataLabels: {
                        enabled: false
                    },
                    labels: ['Abschluss','Pending','Kein Abschluss','Folget'],
                    legend: {
                        offsetY: 0,
                    },
                    stroke: {
                        width: 0
                    },
                    responsive: [{
                        breakpoint: 1250,
                        options: {
                            chart: {
                                width: "100%",
                            },
                            legend: {
                                show: true,
                                position: "bottom"
                            },
                        },
                    }]
                };
                var chart = new ApexCharts(document.querySelector("#chart7"), options);
                chart.render();
                chart.updateSeries([response.data[0], response.data[1], response.data[2],response.data[3]])
            }
            })
           
            var y = $(x).find("span").html();
            var svg = $(x).find("svg");
            var activeSvg = document.querySelector(".activeSvg8");
            $(activeSvg).removeClass("activeSvg8");
            $(svg).addClass("activeSvg8");
            $("#activeDropDownItem8").html(y)
            $("#dropdownSelectId8").hide()
        }
        $(document).ready(function() {
            makeSelectActive(6, 0);
            makeSelectActive1(6, 0);
            makeSelectActive5(6, 0);
            makeSelectActive6(6, 0);
            makeSelectActive7(6, 0);
            makeSelectActive8(6,0);
        });
    </script>

    <script>
        var options = {
            colors: ['#FF6565', '#32659F'],
            series: [{
                    name: 'Satisfaction',
                    data: [44, 55, 57, 56, 61]
                },
                {
                    name: 'Products per costumer',
                    data: [35, 41, 36, 26, 45]
                }
            ],
            chart: {
                type: 'bar',
                height: 250,
                width: "100%"
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 0,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['', '', '', '', ''],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1,
                colors: ['#FF6565', '#32659F']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            },
            legend: {
                position: 'right',
                offsetY: 150,
                height: 0,
            },
            responsive: [{
                breakpoint: 1250,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        offsetY: 0,
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                    data: [38, 25, 33, 45, 22, 50, 43, 30, 50, 35]
                },
                {
                    data: [25, 11, 28, 5, 10, 25, 13, 20, 10, 25]
                }
            ],
            chart: {
                height: 140,
                type: 'line',
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#BAC6D3', '#FEDC7B'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            grid: {
                borderColor: '#fff',
                row: {
                    colors: ['#fff', 'transparent'],
                },
            },
            markers: {
                size: 0
            },
            xaxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                labels: {
                    show: true,
                    minHeight: undefined,
                    maxHeight: 120,
                    style: {
                        colors: '#C4C4C6',
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    }
                }
            },
            yaxis: {
                dataLabels: {
                    enabled: false,
                },
                labels: {
                    show: false
                }
            },
            legend: {
                enabled: false,
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();
    </script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("funnel", {
                animationEnabled: true,
                credits: {
                    enabled: false,
                },
                title: {
                    text: ""
                },
                data: [{
                    type: "funnel",
                    indexLabel: "{label} - {y}",
                    toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                    neckWidth: 50,
                    neckHeight: 0,
                    valueRepresents: "area",
                    dataPoints: [{
                            y: 500,
                            label: "Screened",
                        },
                        {
                            y: 200,
                            label: "",
                            color: "#fff"
                        },
                        {
                            y: 308,
                            label: "Interviewed"
                        },
                        {
                            y: 150,
                            label: "",
                            color: "#fff"
                        },
                        {
                            y: 151,
                            label: "Filled"
                        },
                    ],
                }]
            });
            calculatePercentage();
            chart.render();
            function calculatePercentage() {
                var dataPoint = chart.options.data[0].dataPoints;
                var total = dataPoint[0].y;
                for (var i = 0; i < dataPoint.length; i++) {
                    if (i == 0) {
                        chart.options.data[0].dataPoints[i].percentage = 100;
                    } else {
                        chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
                    }
                }
            }
        }
    </script>

    <script>
               
    </script>
    <script>
        function openBurgerFunct() {
            $("#bottom-burger").slideToggle();
        }
        function statusvomvertragCostum(){
            $("#statusvomvertragCostum").slideToggle()
            $("#activeDropDownItem").html("Individueller Zeitraum")
        }
        function vertrageCostum(){
            $("#vertrageCostum").slideToggle()
            $("#activeDropDownItem1").html("Individueller Zeitraum")
        }
        function leadsCostum(){
            $('#leadsCostum').slideToggle()
            $("#activeDropDownItem5").html("Individueller Zeitraum")
        }
        function dauervomleadCostum(){
            $('#dauervomleadCostum').slideToggle()
            $("#activeDropDownItem6").html("Individueller Zeitraum")
        }
        function hrCostum(){
            $('#hrCostum').slideToggle()
            $("#activeDropDownItem7").html("Individueller Zeitraum")
        }
        function terminCostum(){
            $('#terminCostum').slideToggle()
            $("#activeDropDownItem8").html("Individueller Zeitraum")
        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</body>



</html>

