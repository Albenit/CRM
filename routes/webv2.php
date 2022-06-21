<?php

use App\Http\Controllers\RouteController;

route::get("testtt",[RouteController::class,"testtt"])->name("testtt");
route::get("testtt2",[RouteController::class,"testtt2"])->name("testtt2");
route::get("testtt3",[RouteController::class,"testtt3"])->name("testtt3");
route::get("niti",[RouteController::class,"niti"])->name("niti");
