<?php

use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

route::get('leadStatistic',[\App\Http\Controllers\StatisticController::class,'leadStatistic']);
route::get('contractperdate',[\App\Http\Controllers\StatisticController::class,'contractperdate'])->name('contractperdate');



route::get('statistic',[\App\Http\Controllers\StatisticController::class,'statistic'])->name('statistic')->middleware('role:salesmanager|admin|fs|backoffice');

route::get('filterLead',[\App\Http\Controllers\StatisticController::class,'filterLead']);

route::get('filtercontract',[\App\Http\Controllers\StatisticController::class,'filtercontract']);
route::get('statisticCon',[\App\Http\Controllers\StatisticController::class,'statisticCon']);


route::get('provisionert',[\App\Http\Controllers\StatisticController::class,'provisionert']);
route::get('statistics',[\App\Http\Controllers\StatisticController::class,'statistics'])->name('statistics');


route::get('durationOfLead',[\App\Http\Controllers\StatisticController::class,'durationOfLead']);

route::get('holidayReason',[\App\Http\Controllers\StatisticController::class,'holidayReason']);
route::get('costumersFilter',[\App\Http\Controllers\StatisticController::class,'costumersFilter']);

route::get('appointmentStat',[\App\Http\Controllers\StatisticController::class,'appointmentStat']);


route::get('soldProducts',[\App\Http\Controllers\StatisticController::class,'soldProducts']);

route::get('salesoverview',[\App\Http\Controllers\StatisticController::class,'salesoverview']);

?>
