<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Admins;
use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\family;
use App\Models\lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public $count;

    public function __construct()
    {
        $this->count = 0;
    }

    public function statistic(Request $req)
    {
        if (Auth::user()->hasRole('fs')){

            $gesellschaft = $req->gesellschaft;
            $model = $req->model;
            $admin = Admins::find(auth()->user()->id);
            $collection = collect();
            $start = microtime(true);
            if ($req->berater != 'all') {
                if ($model != 'all') {
                    if ($model == 'Grundversicherung') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                                    $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                                    return true;
                                }
                            } else {
                                if ($item->grund()->count() > 0) {
                                    $collection->push($item->grund()->get()->first()->status_PG);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Zusatzversicherung') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                                    $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                                    return true;
                                }
                            } else {
                                if ($item->zus()->count() > 0) {
                                    $collection->push($item->zus()->get()->first()->status_PZ);
                                    return true;
                                }
                            }

                        });
                    } elseif ($model == 'Autoversicherung') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                                    $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                                    return true;
                                }
                            } else {
                                if ($item->auto()->count() > 0) {
                                    $collection->push($item->auto()->get()->first()->status_PA);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Hasurat') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                                    $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                                    return true;
                                }
                            } else {
                                if ($item->hausrat()->count() > 0) {
                                    $collection->push($item->hausrat()->get()->first()->status_PH);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Vorsorge') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                                    $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                                    return true;
                                }
                            } else {
                                if ($item->vor()->count() > 0) {
                                    $collection->push($item->vor()->get()->first()->status_PV);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Rechtsschutz') {
                        $count = 0;
                        $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                                    $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                                    return true;
                                }
                            } else {
                                if ($item->rech()->count() > 0) {
                                    $collection->push($item->rech()->get()->first()->status_PR);
                                    return true;
                                }
                            }
                        });
                    }
                }
                else{
                    $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                                $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                            }
                            if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                                $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                            }
                            if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                                $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                            }
                            if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                                $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                            }
                            if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                                $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                            }
                            if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                                $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                            }

                        } else {
                            if ($item->grund()->count() > 0) {
                                $collection->push($item->grund()->get()->first()->status_PG);
                            }
                            if ($item->zus()->count() > 0) {
                                $collection->push($item->zus()->get()->first()->status_PZ);
                            }
                            if ($item->auto()->count() > 0) {
                                $collection->push($item->auto()->get()->first()->status_PA);
                            }
                            if ($item->hausrat()->count() > 0) {
                                $collection->push($item->hausrat()->get()->first()->status_PH);
                            }
                            if ($item->vor()->count() > 0) {
                                $collection->push($item->vor()->get()->first()->status_PV);
                            }
                            if ($item->rech()->count() > 0) {
                                $collection->push($item->rech()->get()->first()->status_PR);
                            }
                        }
                    });
                }
            } else {
                if ($model != 'all') {
                    if ($model == 'Grundversicherung') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                                    $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                                    return true;
                                }
                            } else {
                                if ($item->grund()->count() > 0) {
                                    $collection->push($item->grund()->get()->first()->status_PG);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Zusatzversicherung') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                                    $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                                    return true;
                                }

                            } else {
                                if ($item->zus()->count() > 0) {
                                    $collection->push($item->zus()->get()->first()->status_PZ);
                                    return true;
                                }

                            }

                        });
                    } elseif ($model == 'Autoversicherung') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                                    $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                                    return true;
                                }
                            } else {
                                if ($item->auto()->count() > 0) {
                                    $collection->push($item->auto()->get()->first()->status_PA);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Hasurat') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                                    $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                                    return true;
                                }
                            } else {
                                if ($item->hausrat()->count() > 0) {
                                    $collection->push($item->hausrat()->get()->first()->status_PH);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Vorsorge') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                                    $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                                    return true;
                                }
                            } else {
                                if ($item->vor()->count() > 0) {
                                    $collection->push($item->vor()->get()->first()->status_PV);
                                    return true;
                                }
                            }
                        });
                    } elseif ($model == 'Rechtsschutz') {
                        $count = 0;
                        $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                            if ($gesellschaft != 'all') {
                                if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                                    $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                                    return true;
                                }
                            } else {
                                if ($item->rech()->count() > 0) {
                                    $collection->push($item->rech()->get()->first()->status_PR);
                                    return true;
                                }
                            }
                        });
                    }
                } else {
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {

                        if ($gesellschaft != 'all') {
                            if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                                $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                            }
                            if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                                $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                            }
                            if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                                $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                            }
                            if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                                $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                            }
                            if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                                $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                            }
                            if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                                $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                            }
                        } else {

                            if ($item->grund()->count() > 0) {
                                $collection->push($item->grund()->get()->first()->status_PG);
                            }
                            if ($item->zus()->count() > 0) {
                                $collection->push($item->zus()->get()->first()->status_PZ);
                            }
                            if ($item->auto()->count() > 0) {
                                $collection->push($item->auto()->get()->first()->status_PA);
                            }
                            if ($item->hausrat()->count() > 0) {
                                $collection->push($item->hausrat()->get()->first()->status_PH);
                            }
                            if ($item->vor()->count() > 0) {
                                $collection->push($item->vor()->get()->first()->status_PV);
                            }
                            if ($item->rech()->count() > 0) {
                                $collection->push($item->rech()->get()->first()->status_PR);
                            }
                        }
                    });

                }

            }

            $col = $collection->countBy(function ($item) {
                return $item;
            });
            return $col;
        }
    if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('salesmanager') || Auth::user()->hasRole('backoffice')){


        $gesellschaft = $req->gesellschaft;
        $model = $req->model;
        $berater = $req->berater;
        $admin = Admins::find($berater);
        $collection = collect();
      $start = microtime(true);
        if ($req->berater != 'all' && isset($req->berater)) {
            if ($model != 'all') {
            if ($model == 'Grundversicherung') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                            $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                            return true;
                        }
                    } else {
                        if ($item->grund()->count() > 0) {
                            $collection->push($item->grund()->get()->first()->status_PG);
                            return true;
                        }
                    }
                });
            } elseif ($model == 'Zusatzversicherung') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                            $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                            return true;
                        }
                    } else {
                        if ($item->zus()->count() > 0) {
                            $collection->push($item->zus()->get()->first()->status_PZ);
                            return true;
                        }
                    }

                });
            } elseif ($model == 'Autoversicherung') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                            $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                            return true;
                        }
                    } else {
                        if ($item->auto()->count() > 0) {
                            $collection->push($item->auto()->get()->first()->status_PA);
                            return true;
                        }
                    }
                });
            } elseif ($model == 'Hasurat') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                            $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                            return true;
                        }
                    } else {
                        if ($item->hausrat()->count() > 0) {
                            $collection->push($item->hausrat()->get()->first()->status_PH);
                            return true;
                        }
                    }
                });
            } elseif ($model == 'Vorsorge') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                            $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                            return true;
                        }
                    } else {
                        if ($item->vor()->count() > 0) {
                            $collection->push($item->vor()->get()->first()->status_PV);
                            return true;
                        }
                    }
                });
            } elseif ($model == 'Rechtsschutz') {
                $count = 0;
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                            $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                            return true;
                        }
                    } else {
                        if ($item->rech()->count() > 0) {
                            $collection->push($item->rech()->get()->first()->status_PR);
                            return true;
                        }
                    }
                });
            }
        }
            else{
                $count = $admin->kunden->filter(function ($item) use ($gesellschaft, $collection) {
                    if ($gesellschaft != 'all') {
                        if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                            $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                        }
                        if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                            $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                        }
                        if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                            $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                        }
                        if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                            $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                        }
                        if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                            $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                        }
                        if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                            $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                        }

                    } else {
                        if ($item->grund()->count() > 0) {
                            $collection->push($item->grund()->get()->first()->status_PG);
                        }
                        if ($item->zus()->count() > 0) {
                            $collection->push($item->zus()->get()->first()->status_PZ);
                        }
                        if ($item->auto()->count() > 0) {
                            $collection->push($item->auto()->get()->first()->status_PA);
                        }
                        if ($item->hausrat()->count() > 0) {
                            $collection->push($item->hausrat()->get()->first()->status_PH);
                        }
                        if ($item->vor()->count() > 0) {
                            $collection->push($item->vor()->get()->first()->status_PV);
                        }
                        if ($item->rech()->count() > 0) {
                            $collection->push($item->rech()->get()->first()->status_PR);
                        }
                    }
                });
            }
        } else {
            if ($model != 'all') {
                if ($model == 'Grundversicherung') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                                $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                                return true;
                            }
                        } else {
                            if ($item->grund()->count() > 0) {
                                $collection->push($item->grund()->get()->first()->status_PG);
                                return true;
                            }
                        }
                    });
                } elseif ($model == 'Zusatzversicherung') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                                $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                                return true;
                            }

                        } else {
                            if ($item->zus()->count() > 0) {
                                $collection->push($item->zus()->get()->first()->status_PZ);
                                return true;
                            }

                        }

                    });
                } elseif ($model == 'Autoversicherung') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                                $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                                return true;
                            }
                        } else {
                            if ($item->auto()->count() > 0) {
                                $collection->push($item->auto()->get()->first()->status_PA);
                                return true;
                            }
                        }
                    });
                } elseif ($model == 'Hasurat') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                                $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                                return true;
                            }
                        } else {
                            if ($item->hausrat()->count() > 0) {
                                $collection->push($item->hausrat()->get()->first()->status_PH);
                                return true;
                            }
                        }
                    });
                } elseif ($model == 'Vorsorge') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                                $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                                return true;
                            }
                        } else {
                            if ($item->vor()->count() > 0) {
                                $collection->push($item->vor()->get()->first()->status_PV);
                                return true;
                            }
                        }
                    });
                } elseif ($model == 'Rechtsschutz') {
                    $count = 0;
                    $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {
                        if ($gesellschaft != 'all') {
                            if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                                $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                                return true;
                            }
                        } else {
                            if ($item->rech()->count() > 0) {
                                $collection->push($item->rech()->get()->first()->status_PR);
                                return true;
                            }
                        }
                    });
                }
            } else {
                $count = family::get()->filter(function ($item) use ($gesellschaft, $collection) {

                    if ($gesellschaft != 'all') {
                        if ($item->grund()->where('society_PG', $gesellschaft)->count() > 0) {
                            $collection->push($item->grund()->where('society_PG', $gesellschaft)->get()->first()->status_PG);
                        }
                        if ($item->zus()->where('society_PZ', $gesellschaft)->count() > 0) {
                            $collection->push($item->zus()->where('society_PZ', $gesellschaft)->get()->first()->status_PZ);
                        }
                        if ($item->auto()->where('society_PA', $gesellschaft)->count() > 0) {
                            $collection->push($item->auto()->where('society_PA', $gesellschaft)->get()->first()->status_PA);
                        }
                        if ($item->hausrat()->where('society_PH', $gesellschaft)->count() > 0) {
                            $collection->push($item->hausrat()->where('society_PH', $gesellschaft)->get()->first()->status_PH);
                        }
                        if ($item->vor()->where('society_PV', $gesellschaft)->count() > 0) {
                            $collection->push($item->vor()->where('society_PV', $gesellschaft)->get()->first()->status_PV);
                        }
                        if ($item->rech()->where('society_PR', $gesellschaft)->count() > 0) {
                            $collection->push($item->rech()->where('society_PR', $gesellschaft)->get()->first()->status_PR);
                        }
                    } else {

                        if ($item->grund()->count() > 0) {
                            $collection->push($item->grund()->get()->first()->status_PG);
                        }
                        if ($item->zus()->count() > 0) {
                            $collection->push($item->zus()->get()->first()->status_PZ);
                        }
                        if ($item->auto()->count() > 0) {
                            $collection->push($item->auto()->get()->first()->status_PA);
                        }
                        if ($item->hausrat()->count() > 0) {
                            $collection->push($item->hausrat()->get()->first()->status_PH);
                        }
                        if ($item->vor()->count() > 0) {
                            $collection->push($item->vor()->get()->first()->status_PV);
                        }
                        if ($item->rech()->count() > 0) {
                            $collection->push($item->rech()->get()->first()->status_PR);
                        }
                    }
                });

            }

        }

        $col = $collection->countBy(function ($item) {
            return $item;
        });
        return $col;
        }
    }



    public function leadStatistic(Request $request)
    {
        $data = $request->statInfo;

        if ($data === 'notTerminate') {
            $leads = lead::where('deleted_at', null)->get();
        } else {
            $leads = lead::withTrashed()->whereNotNull('deleted_at')->get();

        }

        return view('dates2', compact('leads'));
    }

    public function contractperdate(Request $request)
    {
        $date = $request->date;
        $modelName = $request->modelName;

        if ($modelName == 'all') {
            $datas = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count() +
                CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count() +
                CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count() +
                CostumerProduktHausrat::where('status_PH', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count() +
                CostumerProduktVorsorge::where('status_PV', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count() +
                CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Grundversicherung') {
            $datas = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Zusatzversicherung') {
            $datas = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Autoversicherung') {
            $datas = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Hasurat') {
            $datas = CostumerProduktHausrat::where('status_PH', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Vorsorge') {
            $datas = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } elseif ($modelName == 'Rechtsschutz') {
            $datas = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->where('updated_at', 'LIKE', '%' . $date . '%')->count();
        } else {
            $datas = 0;
        }

        return view('dates2', compact('datas'));

    }

    public function filterLead(Request $req)
    {
        $admin = auth()->user()->id;
        $data = Carbon::now()->subDays($req->number);

        $dateFrom = date('Y-m-d', strtotime($req->dateFrom));
        $dateTo = date('Y-m-d', strtotime($req->dateTo));

        if (Auth::user()->hasRole('fs')) {
            if ($req->number == 0) {
                $wonLeads = lead::whereNotNull('appointment_date')->where('assign_to_id',$admin)->count();
                $notTerminatedleads = lead::where('deleted_at', null)->where('assign_to_id',$admin )->where('completed', '0')->where('assigned', 0)->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->count();
            }elseif($req->number == 100){
                $wonLeads = lead::whereNotNull('appointment_date')->where('assign_to_id',$admin)->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $notTerminatedleads = lead::where('deleted_at', null)->where('assign_to_id', $admin)->where('completed', '0')->where('assigned', 0)->whereBetween('created_at', [$dateFrom , $dateTo])->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->whereBetween('created_at', [$dateFrom , $dateTo])->count();
            } else {
                $wonLeads = lead::whereNotNull('appointment_date')->where('assign_to_id',$admin)->where('created_at', '>', $data)->count();
                $notTerminatedleads = lead::where('deleted_at', null)->where('assign_to_id', $admin)->where('completed', '0')->where('assigned', 0)->where('created_at', '>', $data)->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->where('created_at', '>', $data)->count();
            }
        }
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('salesmanager') || Auth::user()->hasRole('backoffice')){

            if ($req->number == 0) {
                $wonLeads = lead::whereNotNull('appointment_date')->whereNotNull('assign_to_id')->count();
                $notTerminatedleads = lead::where('deleted_at', null)->where('completed', '0')->where('assigned', 0)->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->count();

            }elseif($req->number == 100){
                $wonLeads = lead::whereNotNull('appointment_date')->whereNotNull('assign_to_id')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $notTerminatedleads = lead::where('deleted_at', null)->whereBetween('created_at', [$dateFrom , $dateTo])->where('completed', '0')->where('assigned', 0)->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->whereBetween('created_at', [$dateFrom , $dateTo])->count();
            }else{
                $wonLeads = lead::whereNotNull('appointment_date')->whereNotNull('assign_to_id')->where('created_at', '>', $data)->count();
                $notTerminatedleads = lead::where('deleted_at', null)->where('created_at', '>', $data)->where('completed', '0')->where('assigned', 0)->where('rejected',0)->count();
                $terminatedleads = lead::withTrashed()->whereNotNull('deleted_at')->orWhere('rejected',1)->where('created_at', '>', $data)->count();
            }

        }



        $datas = collect([$notTerminatedleads, $terminatedleads, $wonLeads]);



        return $datas;
    }

    public function filtercontract(Request $req)
    {
        $data = Carbon::now()->subDays($req->number);

        $admin = auth()->user()->id;

        $dateFrom = date('Y-m-d', strtotime($req->dateFrom));
        $dateTo = date('Y-m-d', strtotime($req->dateTo));



        if (Auth::user()->hasRole('fs')){
            if ($req->number == 0){
                $countProvisionert = 
                    CostumerProduktGrundversicherung::where('status_PG','Provisionert')->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Provisionert')->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Provisionert')->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->where('admin_id', $admin)->count();
                $countAufgenommen = 
                    CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Aufgenommen')->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->where('admin_id', $admin)->count();
                $countEingereicht = 
                    CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Eingereicht')->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Eingereicht')->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->where('admin_id', $admin)->count();
                $countAbgelehnt = 
                    CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Abgelehnt')->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->where('admin_id', $admin)->count();
                $countOffenBerater = 
                    CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->where('admin_id', $admin)->count();
                    
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);

            }elseif( $req->number == 100){
             
                $countProvisionert = 
                    CostumerProduktGrundversicherung::where('status_PG','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count();
                $countAufgenommen = 
                    CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count();
                $countEingereicht = 
                    CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count();
                $countAbgelehnt = 
                    CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count();
                $countOffenBerater = 
                    CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->where('admin_id', $admin)->count();
                
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);
            }else{
                $countProvisionert = 
                    CostumerProduktGrundversicherung::where('status_PG','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->where('created_at', '>', $data)->where('admin_id', $admin)->count();
                $countAufgenommen = 
                    CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->where('created_at', '>', $data)->where('admin_id', $admin)->count();
                $countEingereicht = 
                    CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->where('created_at', '>', $data)->where('admin_id', $admin)->count();
                $countAbgelehnt = 
                    CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->where('created_at', '>', $data)->where('admin_id', $admin)->count();
                $countOffenBerater = 
                    CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count() 
                    + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->where('created_at', '>', $data)->where('admin_id', $admin)->count();
                
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);
            }
        }else{
            if ($req->number == 0){
                $countProvisionert = CostumerProduktGrundversicherung::where('status_PG','Provisionert')->count() + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->count() + CostumerProduktHausrat::where('status_PH','Provisionert')->count() + CostumerProduktVorsorge::where('status_PV','Provisionert')->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->count();
                $countAufgenommen = CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->count() + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->count() + CostumerProduktHausrat::where('status_PH','Aufgenommen')->count() + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->count();
                $countEingereicht = CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->count() + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->count() + CostumerProduktHausrat::where('status_PH','Eingereicht')->count() + CostumerProduktVorsorge::where('status_PV','Eingereicht')->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->count();
                $countAbgelehnt = CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->count() + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->count() + CostumerProduktHausrat::where('status_PH','Abgelehnt')->count() + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->count();
                $countOffenBerater = CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->count() + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->count() + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->count() + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->count();
                    
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);
                
            }elseif($req->number == 100){
                $countProvisionert = CostumerProduktGrundversicherung::where('status_PG','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktHausrat::where('status_PH','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktVorsorge::where('status_PV','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $countAufgenommen = CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktHausrat::where('status_PH','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $countEingereicht = CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktHausrat::where('status_PH','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktVorsorge::where('status_PV','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $countAbgelehnt = CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktHausrat::where('status_PH','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                $countOffenBerater = CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count() + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->whereBetween('created_at', [$dateFrom , $dateTo])->count();
                    
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);
            }else{
                $countProvisionert = CostumerProduktGrundversicherung::where('status_PG','Provisionert')->where('created_at', '>', $data)->count() + CostumerProduktZusatzversicherung::where('status_PZ','Provisionert')->where('created_at', '>', $data)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Provisionert')->where('created_at', '>', $data)->count() + CostumerProduktHausrat::where('status_PH','Provisionert')->where('created_at', '>', $data)->count() + CostumerProduktVorsorge::where('status_PV','Provisionert')->where('created_at', '>', $data)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Provisionert')->where('created_at', '>', $data)->count();
                $countAufgenommen = CostumerProduktGrundversicherung::where('status_PG','Aufgenommen')->where('created_at', '>', $data)->count() + CostumerProduktZusatzversicherung::where('status_PZ','Aufgenommen')->where('created_at', '>', $data)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Aufgenommen')->where('created_at', '>', $data)->count() + CostumerProduktHausrat::where('status_PH','Aufgenommen')->where('created_at', '>', $data)->count() + CostumerProduktVorsorge::where('status_PV','Aufgenommen')->where('created_at', '>', $data)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Aufgenommen')->where('created_at', '>', $data)->count();
                $countEingereicht = CostumerProduktGrundversicherung::where('status_PG','Eingereicht')->where('created_at', '>', $data)->count() + CostumerProduktZusatzversicherung::where('status_PZ','Eingereicht')->where('created_at', '>', $data)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Eingereicht')->where('created_at', '>', $data)->count() + CostumerProduktHausrat::where('status_PH','Eingereicht')->where('created_at', '>', $data)->count() + CostumerProduktVorsorge::where('status_PV','Eingereicht')->where('created_at', '>', $data)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Eingereicht')->where('created_at', '>', $data)->count();
                $countAbgelehnt = CostumerProduktGrundversicherung::where('status_PG','Abgelehnt')->where('created_at', '>', $data)->count() + CostumerProduktZusatzversicherung::where('status_PZ','Abgelehnt')->where('created_at', '>', $data)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Abgelehnt')->where('created_at', '>', $data)->count() + CostumerProduktHausrat::where('status_PH','Abgelehnt')->where('created_at', '>', $data)->count() + CostumerProduktVorsorge::where('status_PV','Abgelehnt')->where('created_at', '>', $data)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Abgelehnt')->where('created_at', '>', $data)->count();
                $countOffenBerater = CostumerProduktGrundversicherung::where('status_PG','Offen (Berater)')->where('created_at', '>', $data)->count() + CostumerProduktZusatzversicherung::where('status_PZ','Offen (Berater)')->where('created_at', '>', $data)->count()
                    + CostumerProduktRechtsschutz::where('status_PR','Offen (Berater)')->where('created_at', '>', $data)->count() + CostumerProduktHausrat::where('status_PH','Offen (Berater)')->where('created_at', '>', $data)->count() + CostumerProduktVorsorge::where('status_PV','Offen (Berater)')->where('created_at', '>', $data)->count()
                    + CostumerProduktAutoversicherung::where('status_PA','Offen (Berater)')->where('created_at', '>', $data)->count();
                    
                $countTotal = collect([$countProvisionert,$countAufgenommen,$countEingereicht,$countAbgelehnt,$countOffenBerater]);
                
            }
        }
        return $countTotal;
    }
    public function provisionert(Request $request){
        $admin = auth()->user()->id;
        $date = Carbon::now()->subDays($request->numberi);
        $dateFrom = date('Y-m-d', strtotime($request->dateFrom));
        $dateTo = date('Y-m-d', strtotime($request->dateTo));

        if (Auth::user()->hasRole('fs') ){

            if($request->numberi == 0) {
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->where('admin_id',$admin)->count();
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->where('admin_id',$admin)->count();
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->where('admin_id',$admin)->count();
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->where('admin_id',$admin)->count();
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->where('admin_id',$admin)->count();
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->where('admin_id',$admin)->count();
            }elseif($request->numberi == 100){
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->whereBetween('last_adjustment_PG',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->whereBetween('last_adjustment_PR',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->whereBetween('last_adjustment_PV',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->whereBetween('last_adjustment_PZ',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->whereBetween('last_adjustment_PA',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->whereBetween('last_adjustment_PH',[$dateFrom , $dateTo])->where('admin_id',$admin)->count();
            }else{
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->where('last_adjustment_PG', '>',$date)->where('admin_id',$admin)->count();
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->where('last_adjustment_PR', '>',$date)->where('admin_id',$admin)->count();
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->where('last_adjustment_PV', '>',$date)->where('admin_id',$admin)->count();
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->where('last_adjustment_PZ', '>',$date)->where('admin_id',$admin)->count();
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->where('last_adjustment_PA', '>',$date)->where('admin_id',$admin)->count();
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->where('last_adjustment_PH', '>',$date)->where('admin_id',$admin)->count();
            }

            $datas = collect([$grundversicherungP,$retchsschutzP,$vorsorgeP,$autoversicherungP,$zusatzversicherungP,$hausratP]);

        }
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('salesmanager') || Auth::user()->hasRole('backoffice')){


        if($request->numberi == 0) {
            $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->count();
            $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->count();
            $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->count();
            $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->count();
            $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->count();
            $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->count();
        }elseif($request->numberi == 100){
            $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->whereBetween('last_adjustment_PG',[$dateFrom , $dateTo])->count();
            $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->whereBetween('last_adjustment_PR',[$dateFrom , $dateTo])->count();
            $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->whereBetween('last_adjustment_PV',[$dateFrom , $dateTo])->count();
            $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->whereBetween('last_adjustment_PZ',[$dateFrom , $dateTo])->count();
            $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->whereBetween('last_adjustment_PA',[$dateFrom , $dateTo])->count();
            $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->whereBetween('last_adjustment_PH',[$dateFrom , $dateTo])->count();  
        }else{
            $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->where('last_adjustment_PG', '>',$date)->count();
            $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->where('last_adjustment_PR', '>',$date)->count();
            $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->where('last_adjustment_PV', '>',$date)->count();
            $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->where('last_adjustment_PZ', '>',$date)->count();
            $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->where('last_adjustment_PA', '>',$date)->count();
            $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->where('last_adjustment_PH', '>',$date)->count();
        }

        $datas = collect([$grundversicherungP,$retchsschutzP,$vorsorgeP,$autoversicherungP,$zusatzversicherungP,$hausratP]);

        }
        return $datas;
    }

    public function statistics(){

        $leads['leads'] = lead::with('campaign')->where('completed', '0')->where('assigned', 0)->where('rejected',0)->get();

        $instagram = 0;
        $sanascout = 0;
        $facebook = 0;
        for($i = 0; $i < count($leads['leads']); $i++){
            if($leads['leads'][$i]->campaign_id == 1){
                $instagram++;
            }elseif($leads['leads'][$i]->campaign_id == 2){
                $facebook++;
            }elseif ($leads['leads'][$i]->campaign_id == 3){
                $sanascout++;
            }
        }
        $leads['sanascout'] = $sanascout;
        $leads['instagram'] = $instagram;
        $leads['facebook'] = $facebook;


        $adminsStat = Admins::role(['fs'])->with('kunden')->get();
        return view('statistics', compact('leads','adminsStat'));
    }

    public function durationOfLead(Request $request){

        $date = Carbon::now()->subDays($request->number);

        if($request->number == 0){
            $leads = lead::get();
        }else{
            $leads = lead::where('created_at','>',$date)->get();
        }

    $iteration = 0;

    $jan = 0;
    $feb = 0;
    $mar = 0;
    $apr = 0;
    $may = 0;
    $jun = 0;
    $jul = 0;
    $aug = 0;
    $sep = 0;
    $oct = 0;
    $nov = 0;
    $dec = 0;

    foreach ($leads as $lead){

        if($lead->duration_time != null){

            $month = Carbon::parse($lead->created_at)->format('M');

            if ($month == 'Jan'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $jan += $length;
            }
            if ($month == 'Feb'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $feb += $length;
            }
            if ($month == 'Mar'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $mar += $length;
            }
            if ($month == 'Apr'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $apr += $length;
            }
            if ($month == 'May'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $may += $length;
            }
            if ($month == 'Jun'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $jun += $length;
            }
            if ($month == 'Jul'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $jul += $length;
            }
            if ($month == 'Aug'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $aug += $length;
            }
            if ($month == 'Sep'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $sep += $length;
            }
            if ($month == 'Oct'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $oct += $length;
            }
            if ($month == 'Nov'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $nov += $length;
            }
            if ($month == 'Dec'){
                $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->created_at);
                $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$lead->duration_time);

                $length = $duration_time->diffInDays($created_at);

                $dec += $length;
            }

            $iteration++;

        }else{
            $iteration++;
        }
    }

    $totalJan = $jan / $iteration;
    $totalFeb = $feb / $iteration;
    $totalMar = $mar / $iteration;
    $totalApr = $apr / $iteration;
    $totalMay = $may / $iteration;
    $totalJun = $jun / $iteration;
    $totalJul = $jul / $iteration;
    $totalAug = $aug / $iteration;
    $totalSep = $sep / $iteration;
    $totalOct = $sep / $iteration;
    $totalNov = $nov / $iteration;
    $totalDec = $dec / $iteration;


    $collect = array($totalJan,$totalFeb,$totalMar,$totalApr,$totalMay,$totalJun,$totalJul,$totalAug,$totalSep,$totalOct,$totalNov,$totalDec);



        return $collect;
    }

    public function holidayReason(Request $req){
        $date = Carbon::now()->subDays($req->number);
        $holidays = collect();

        $dateFrom = date('Y-m-d', strtotime($req->dateFrom));
        $dateTo = date('Y-m-d', strtotime($req->dateTo));

        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('salesmanager') || Auth::user()->hasRole('backoffice')){
            if($req->number == 0){
                $holidaysUrlaub = Absence::where('description','Urlaub')->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->where('type',1)->count();      
            }elseif($req->number == 100){
                $holidaysUrlaub = Absence::where('description','Urlaub')->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
            }else{
                $holidaysUrlaub = Absence::where('description','Urlaub')->where('created_at','>',$date)->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->where('created_at','>',$date)->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->where('created_at','>',$date)->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->where('created_at','>',$date)->where('type',1)->count();
            }
        }else{
            $admin = auth()->user()->id;
            if($req->number == 0){
                $holidaysUrlaub = Absence::where('description','Urlaub')->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->where('employee_id',$admin)->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->where('employee_id',$admin)->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->where('employee_id',$admin)->where('type',1)->count();
            }elseif($req->number == 100){
                $holidaysUrlaub = Absence::where('description','Urlaub')->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->where('employee_id',$admin)->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->where('employee_id',$admin)->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->where('employee_id',$admin)->whereBetween('created_at', [$dateFrom , $dateTo])->where('type',1)->count();
            }else{
                $holidaysUrlaub = Absence::where('description','Urlaub')->where('created_at','>',$date)->where('type',1)->count();
                $holidaysKrankheitUnfall = Absence::where('description','Krankheit / Unfall')->where('employee_id',$admin)->where('created_at','>',$date)->where('type',1)->count();
                $holidaysWeiterbildun = Absence::where('description','Weiterbildun')->where('employee_id',$admin)->where('created_at','>',$date)->where('type',1)->count();
                $holidaysOther = Absence::where('description','<>','Urlaub')->where('description','<>','Krankheit / Unfall')->where('description','<>','Weiterbildun')->where('employee_id',$admin)->where('created_at','>',$date)->where('type',1)->count();
            }
        }

        $holidays->push($holidaysUrlaub,$holidaysKrankheitUnfall,$holidaysWeiterbildun,$holidaysOther);

        return $holidays;

        
    }

    public function costumersFilter(Request $req){
        return $req->number;
    }


}
