<template>
    <div v-if="gati">
        <section v-if="role == 'fs'">
            <div class="row g-0 h-100">
                <div class="p-3 p-sm-4 pb-5 pb-md-4">
                    <div class="pb-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="greyBackgroundDivLeads">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="cornerSvgLeads">
                                                    <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_28_428)">
                                                            <path
                                                                d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9995 33.8527L65.249 33.8527C59.1464 33.8527 53.1076 35.0936 47.4995 37.5L46.4221 38.3288C42.8774 41.0554 40.1638 44.717 38.5863 48.9016C37.5647 51.6115 37.0413 54.4838 37.0413 57.38L37.0413 77.3271Z"
                                                                fill="#DCE4F9" />
                                                        </g>
                                                        <rect x="51.75" y="54.7133" width="23.687" height="8.87111" rx="1.25"
                                                              stroke="#313131" stroke-width="1.5" />
                                                        <path
                                                            d="M55.5856 59.2193C55.5856 59.6674 55.2223 60.0306 54.7742 60.0306C54.3261 60.0306 53.9629 59.6674 53.9629 59.2193C53.9629 58.7712 54.3256 58.4079 54.7737 58.4079C55.2218 58.4079 55.5856 58.7712 55.5856 59.2193Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M58.0192 59.2193C58.0192 59.6674 57.6559 60.0307 57.2078 60.0307C56.7597 60.0307 56.3965 59.6674 56.3965 59.2193C56.3965 58.7712 56.7597 58.4079 57.2078 58.4079C57.6559 58.4079 58.0192 58.7712 58.0192 59.2193Z"
                                                            fill="#313131" />
                                                        <rect x="69.5293" y="66.5659" width="23.687" height="8.87111" rx="1.25"
                                                              stroke="#313131" stroke-width="1.5" />
                                                        <path
                                                            d="M73.3649 71.072C73.3649 71.5201 73.0016 71.8833 72.5535 71.8833C72.1054 71.8833 71.7422 71.5201 71.7422 71.072C71.7422 70.6239 72.1049 70.2606 72.553 70.2606C73.0011 70.2606 73.3649 70.6239 73.3649 71.072Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M75.7985 71.072C75.7985 71.5201 75.4352 71.8834 74.9871 71.8834C74.539 71.8834 74.1758 71.5201 74.1758 71.072C74.1758 70.6239 74.539 70.2606 74.9871 70.2606C75.4352 70.2606 75.7985 70.6239 75.7985 71.072Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M77.8254 51H75.4411C75.0709 51 74.7715 51.2994 74.7715 51.6696C74.7715 52.0397 75.0709 52.3337 75.4411 52.3337H77.8254C79.9702 52.3337 81.7176 54.0811 81.7176 56.2259V59.5956L80.8357 58.7137C80.5744 58.4524 80.1553 58.4524 79.894 58.7137C79.6327 58.975 79.6327 59.3941 79.894 59.6554L81.9136 61.675C82.0388 61.8003 82.2075 61.871 82.3872 61.871C82.5614 61.871 82.7356 61.8003 82.8608 61.675L84.8804 59.6554C85.1417 59.3941 85.1417 58.975 84.8804 58.7137C84.6191 58.4524 84.1999 58.4524 83.9386 58.7137L83.0568 59.5956V56.2259C83.0513 53.3462 80.7051 51 77.8254 51Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M65.6537 77.6196H68.0381C68.4082 77.6196 68.7076 77.3202 68.7076 76.9501C68.7076 76.5799 68.4082 76.2859 68.0381 76.2859H65.6537C63.5089 76.2859 61.7615 74.5385 61.7615 72.3937V69.0241L62.6434 69.9059C62.774 70.0366 62.9428 70.1019 63.117 70.1019C63.2912 70.1019 63.4599 70.0366 63.5906 69.9059C63.8519 69.6446 63.8519 69.2255 63.5906 68.9642L61.571 66.9446C61.4458 66.8194 61.277 66.7486 61.0974 66.7486C60.9232 66.7486 60.749 66.8194 60.6238 66.9446L58.6042 68.9642C58.3429 69.2255 58.3429 69.6446 58.6042 69.9059C58.8655 70.1672 59.2846 70.1672 59.5459 69.9059L60.4278 69.0241V72.3937C60.4278 75.2734 62.774 77.6196 65.6537 77.6196Z"
                                                            fill="#313131" />
                                                        <defs>
                                                            <filter id="filter0_d_28_428" x="0.0410156" y="0.852741"
                                                                    width="150.691" height="144.3" filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                               result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="18.5" />
                                                                <feComposite in2="hardAlpha" operator="out" />
                                                                <feColorMatrix type="matrix"
                                                                               values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                         result="effect1_dropShadow_28_428" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                         in2="effect1_dropShadow_28_428" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="cornerSvgTitleLeads">
                                                    <span class="leadsTitleSpanStyle fs-5">Zugewiesene Leads</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-md-3 pb-3">
                                        <div class="leadsOverflowDiv">
                                            <div>
                                                <div class="row g-3" v-if="leads.length > 0">
                                                    <div class="col-12 col-lg-6" v-for="lead in leads">
                                                        <div class="modal fade" :id="lead.slug + 'r'" data-bs-backdrop="static"
                                                             data-bs-keyboard="false" tabindex="-1"
                                                             aria-labelledby="staticBackdropLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modaldialogg">
                                                                <form action="rejectedleads" method="post">
                                                                    <input type="hidden" name="_token" :value="csrf">
                                                                    <div class="modal-content" style="border-radius: 24px !important;">
                                                                        <div class="modal-header mx-4 pt-4"
                                                                             style="border-bottom: none !important;">
                                                                            <button type="button" :id="lead.slug + 'r.123'"
                                                                                    @click="closeFunc(this); reloadthis()"
                                                                                    class="btn-close" data-bs-dismiss="modal"
                                                                                    aria-label="Close"
                                                                                    style="opacity: 1 !important;"></button>
                                                                        </div>
                                                                        <div class="modal-body mx-5">
                                                                            <div class="row mb-3">
                                                                                <h5 class="modal-title" style="font-weight: 600" id="staticBackdropLabel">Abgelehnt
                                                                                    Lead</h5>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-12">
                                                                                    <input type="hidden" :value="lead.id"
                                                                                           name="leadsid">
                                                                                    <select class="form-select"
                                                                                            style="background-color: #fff !important; border: 1px solid #ededed !important;border-radius: 11px !important;"
                                                                                            name="reason">
                                                                                        <option value="Falsche Telefonnummer">Falsche Telefonnummer</option>
                                                                                        <option value="Mehrjahresvertrag">Mehrjahresvertrag</option>
                                                                                        <option value="Kein Interesse">Kein Interesse</option>
                                                                                        <!-- <option value="Krank">Krank</option> -->
                                                                                        <option value="Krankheit vorhanden">Krankheit vorhanden</option>
                                                                                        <option value="Kunde wurde bereits Terminiert">Kunde wurde bereits Terminiert</option>
                                                                                        <option value="Nicht erreicht (3x)">Nicht erreicht (3x)</option>
                                                                                        <option value="Weiteres">Weiteres</option>
                                                                                        <!-- <option value="Spater Anrufen">Spater Anrufen</option>
                                                                                        <option value="Terminiert">Terminiert</option> -->
                                                                                    </select>
                                                                                </div>
                                                                                <div class="modal-footer m-0"
                                                                                     style="border-top: none !important; display: block;margin:0 !important;">
                                                                                    <button type="submit" class="btn w-100 m-0 my-3"
                                                                                            style="background-color: #2F60DC; color: #fff !important;border-radius: 8px !important;font-weight: 600">
                                                                                        Sparen</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--                                    Rejecti Nalt Modal-->
                                                        <div class="modal fade" :id="lead.slug + 'rc'" data-bs-backdrop="static"
                                                             data-bs-keyboard="false" tabindex="-1"
                                                             aria-labelledby="staticBackdropLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modaldialogg">
                                                                <form action="pending_rejectedlead" method="post">
                                                                    <input type="hidden" name="_token" :value="csrf">
                                                                    <div class="modal-content" style="border-radius: 24px !important;">
                                                                        <div class="modal-header mx-4 pt-4"
                                                                             style="border-bottom: none !important;">
                                                                            <button type="button" :id="lead.slug + 'r.123'"
                                                                                    @click="closeFunc(this); reloadthis()"
                                                                                    class="btn-close" data-bs-dismiss="modal"
                                                                                    aria-label="Close"
                                                                                    style="opacity: 1 !important;"></button>
                                                                        </div>
                                                                        <div class="modal-body mx-5 py-0">
                                                                            <input type="hidden" :value="lead.id" name="leadsid">
                                                                            <div class="row mb-3">
                                                                                <h5 class="modal-title" style="font-weight: 600">Abgelehnt Lead</h5>
                                                                            </div>
                                                                            <div class="row py-1 ">
                                                                                <div class="col-12">
                                                                                    <label for="inputTxt4" class="col-form-label" style="font-weight: 500">Begrundung </label>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <textarea type="text" id="inputTxt5" name="reason"
                                                                                        class="form-control" style="border: 1px solid #f3f3f3 !important;"
                                                                                        aria-describedby="passwordHelpInline">
                                                                                    </textarea>
                                                                                </div>
                                                                                <div class="modal-footer m-0"
                                                                                     style="border-top: none !important; display: block;margin:0 !important;">
                                                                                    <button type="submit" class="btn w-100 m-0 my-3"
                                                                                            style="background-color: #2F60DC; color: #fff !important;font-weight: 600 !important;border-radius: 8px !important">
                                                                                        Sparen</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--                                    Pending Modal-->
                                                        <div class="modal fade" :id="lead.slug + 'rp'" data-bs-backdrop="static"
                                                             data-bs-keyboard="false" tabindex="-1"
                                                             aria-labelledby="staticBackdropLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modaldialogg">
                                                                <form action="pending_rejectedlead" method="post">
                                                                    <input type="hidden" name="_token" :value="csrf">
                                                                    <div class="modal-content" style="border-radius: 24px !important;">
                                                                        <div class="modal-header mx-4 pt-4"
                                                                             style="border-bottom: none !important;">
                                                                            <button type="button" :id="lead.slug + 'r.123'"
                                                                                    @click="closeFunc(this); reloadthis()"
                                                                                    class="btn-close" data-bs-dismiss="modal"
                                                                                    aria-label="Close"
                                                                                    style="opacity: 1 !important;"></button>
                                                                        </div>
                                                                        <div class="modal-body mx-5 py-0">
                                                                            <input type="hidden" :value="lead.id" name="leadsid">
                                                                            <input type="hidden" :value="1" name="pending">
                                                                            <div class="row mb-3">
                                                                                <h5 class="modal-title" style="font-weight: 600">Steht aus Lead</h5>
                                                                            </div>
                                                                            <div class="row py-1 ">
                                                                                <div class="col-12">
                                                                                    <label for="inputTxt4" class="col-form-label" style="font-weight: 500">Begrundung </label>
                                                                                </div>
                                                                                <div class="col-12">
                                                                <textarea type="text" id="inputTxt4" name="reason"
                                                                          class="form-control" style="border: 1px solid #f3f3f3 !important;"
                                                                          aria-describedby="passwordHelpInline"></textarea>
                                                                                </div>
                                                                                <div class="modal-footer col-12"
                                                                                     style="border-top: none !important; display: block;margin:0 !important;">
                                                                                    <button type="submit" class="btn w-100 m-0 my-3"
                                                                                            style="background-color: #2F60DC; color: #fff !important;font-weight: 600 !important;border-radius: 8px">
                                                                                        Sparen</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" :id="lead.slug" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content"
                                                                     style="background: #fff; border-radius: 24px;">
                                                                    <div class="modal-header ms-3 me-1 pb-0"
                                                                         style="border-bottom: none !important;">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"
                                                                                style="opacity: 1 !important;"></button>
                                                                    </div>
                                                                    <div class="modal-body p-0 p-sm-3">
                                                                        <div v-if="role == 'fs'" class="row g-4 g-md-4 mx-3 my-auto">
                                                                            <div class="col-12 col-md my-auto">
                                                                                <div class="">
                                                                                    <span class="fs-5 text-dark" style="color: #434343 !important;font-weight: 700">
                                                                                                                                                    {{ lead.first_name }}
                                                                                                                                                    </span>
                                                                                </div>


                                                                            </div>
                                                                            <div class="col-6 col-md-3 pt-2 pt-md-0 my-auto pe-1">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <a :href="'tel:' + lead.telephone"
                                                                                       class="btn w-100 py-1"
                                                                                       style="background-color:#fff;color: #fff;border: 2px solid #2F60DC; border-radius: 8px;font-weight:600">
                                                                                       <div class="row g-0">
                                                                                            <div class="col text-center my-auto">
                                                                                                <svg width="21" height="22" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path d="M20.9993 15.7225V18.8839C21.0005 19.1774 20.9403 19.4679 20.8225 19.7368C20.7047 20.0057 20.5319 20.247 20.3152 20.4454C20.0985 20.6438 19.8427 20.7949 19.5642 20.8889C19.2856 20.9829 18.9904 21.0179 18.6975 20.9914C15.4484 20.6391 12.3275 19.5311 9.58535 17.7563C7.03418 16.1384 4.87123 13.9798 3.2501 11.4336C1.46565 8.68454 0.355154 5.55458 0.00857022 2.29735C-0.0178155 2.00594 0.0168851 1.71225 0.110463 1.43496C0.20404 1.15767 0.354444 0.902866 0.552098 0.686769C0.749753 0.470672 0.990327 0.298016 1.2585 0.179795C1.52668 0.0615741 1.81659 0.000377709 2.10976 0.000102167H5.27738C5.78981 -0.00493117 6.28658 0.176167 6.67511 0.50964C7.06364 0.843114 7.31741 1.30621 7.38913 1.81261C7.52283 2.82431 7.77078 3.81767 8.12824 4.77374C8.2703 5.15091 8.30105 5.56082 8.21684 5.9549C8.13263 6.34898 7.93699 6.71071 7.6531 6.99722L6.31214 8.33552C7.81524 10.9737 10.004 13.1581 12.6474 14.6582L13.9883 13.3199C14.2754 13.0366 14.6379 12.8413 15.0327 12.7573C15.4276 12.6732 15.8383 12.7039 16.2162 12.8457C17.1742 13.2025 18.1695 13.4499 19.1832 13.5834C19.6962 13.6556 20.1646 13.9134 20.4994 14.3078C20.8343 14.7022 21.0122 15.2057 20.9993 15.7225Z" fill="#2F60DC"/>
                                                                                                </svg>


                                                                                            </div>
                                                                                            <!-- <div class="col text-center" style="margin-left: -15px">
                                                                                                    Anrufen
                                                                                            </div> -->
                                                                                       </div>
                                                                                        
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-md-3 pt-2 pt-md-0 my-auto ps-1">
                                                                                <div class="d-flex justify-content-start">
                                                                                    <button class="btn w-100 py-1"
                                                                                            data-bs-dismiss="modal"
                                                                                            data-bs-toggle="modal"
                                                                                            :data-bs-target="'#' + lead.slug + 'rc'"
                                                                                            style="background-color:#EB5757;color: #fff; border-radius: 8px;font-weight:600">
                                                                                        Lead ablehnen
                                                                                    </button>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <div class="mx-3 row">
                                                                                <div class="col-md-6 col-12 my-2">
                                                                                    <div class="text-dark text-left p-3 h-100"
                                                                                         style="border-radius: 9px; background:#fafafa;">
                                                                                        <div class="py-2">
                                                                                            <h6 style="font-weight: 700 !important; color:#434343 !important;">Herkunft vom Lead</h6>
                                                                                        </div>

                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Platform <span
                                                                                style="color: #88889D;font-weight: 500"></span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Kampagne <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.kampagne
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Grund <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.grund
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Teilnahme <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.teilnahme
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-12 my-2">
                                                                                    <div class="text-dark text-left p-3"
                                                                                         style="border-radius: 9px; background:#fafafa;">
                                                                                        <div class="py-1">
                                                                                            <h6 style="color: #434343 !important; font-weight: 700 !important;">Angaben</h6>
                                                                                        </div>

                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Gerburstdatum <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.birthdate
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Haushalt <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.number_of_persons
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Telefon <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.telephone
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">PLZ, Ort <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.postal_code
                                                                                }}, {{ lead.city }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Krankenkasse <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.krankenkasse
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Bewertung KK <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.bewertung
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Wichtig <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.wichtig
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer py-0"
                                                                         style="border-top: none !important; display: block;">
                                                                        <div v-if="role == 'fs'" class="row mx-4 pb-4 g-2 px-md-1">
                                                                            <div class="col-6 col-sm-3">
                                                                                <button type="button" class="btn w-100 fw-600 py-1"
                                                                                        style=" color: #ffffff !important; background-color: #c4c4c4 !important;border-radius: 8px !important;"
                                                                                        data-bs-dismiss="modal">Schliessen</button>
                                                                            </div>
                                                                            <div class="col-6 col-sm-3 ">
                                                                                <button class="btn fs-6 w-100 py-1"
                                                                                        data-bs-dismiss="modal" data-bs-toggle="modal"
                                                                                        :data-bs-target="'#' + lead.slug + 'rp'"
                                                                                        style="background-color:#FFAB57 !important;color: #fff !important; border-radius: 8px !important;font-weight: 600 !important">
                                                                                    Steht aus
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-6 col-sm-3">
                                                                                <button class="btn fs-6 w-100 py-1"
                                                                                        data-bs-dismiss="modal" data-bs-toggle="modal"
                                                                                        :data-bs-target="'#' + lead.slug + 'r'"
                                                                                        style="background-color:#EB5757 !important; color: #fff !important; border-radius: 8px !important;font-weight: 600 !important">
                                                                                    Lead Verloren
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-6 col-sm-3">
                                                                                <a :href="'alead/' + lead.id"
                                                                                   class="btn fs-6 w-100 py-1"
                                                                                   style="background-color:#219653 !important;color: #fff !important; border-radius: 8px !important;font-weight: 600 !important">
                                                                                    Lead gewonnen
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-0 h-100" >
                                                            <div class="col" data-bs-toggle="modal"
                                                                 :data-bs-target="'#' + lead.slug">
                                                                <div class="whiteBacgkroundLeads p-3" style="position: relative">
                                                                    <div class="pb-3">
                                                                        <span class="fs-5 LeadNameStyleSpan">{{ lead.first_name }} {{lead.last_name}}</span>
                                                                    </div>
                                                                    <div class="mb-5">
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-4">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Adresse</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.address }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-4">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Haushalt</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span class="fs-6 LeadRightSideSpanStyle">{{ lead.number_of_persons }}
                                                                                Personen</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-4">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Grund</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.grund }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-4">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Kampagne</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.kampagne }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-3 positionAbsDiv">
                                                                        <div class="row g-0 justify-content-center">
                                                                            <div class="col-12 col-md-6 col-lg-5">
                                                                                <button
                                                                                    class="leadOffnenBtnStyle leadOffnenBtnStyle3 w-100 py-1" data-toggle="modal"
                                                                                    :data-target="'#' + lead.slug">Lead
                                                                                    öffnen</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div v-else class="text-center">
                                                    <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" style="color: #D1D1D1;">
                                                        <span class="fs-6" style="color: #D1D1D1 !important">Keine Leads zugewiesen</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3 d-flex flex-column">
                                <div class="greyBackgroundDivLeads h-100" style="position: relative;">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="cornerSvgLeads">
                                                    <svg width="143" height="137" viewBox="0 0 143 137" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_28_428)">
                                                            <path
                                                                d="M37.3418 71.9433C39.8253 76.0769 46.8904 80.139 50.6616 83.0708C54.4327 86.0026 49.5284 94.3197 54.013 95.6033C58.4975 96.887 72.2831 91.112 76.7984 90.5521C81.3136 89.9921 85.6236 88.5107 89.4821 86.1924C93.3407 83.8741 96.6723 80.7644 99.2867 77.0407C101.901 73.317 103.747 69.0523 104.719 64.49C105.692 59.9278 105.771 55.1575 104.953 50.4513C104.135 45.7452 103.38 37.7225 102.631 33.2987L76.3687 33.7197L56.3148 34.041C55.1872 34.059 54.0636 34.1788 52.9576 34.3989C46.3097 35.7217 40.8942 40.5313 38.7954 46.9765L38.613 47.5366C38.0035 49.4083 37.6773 51.3606 37.6453 53.3288L37.3418 71.9433Z"
                                                                fill="#DCE4F9" />
                                                        </g>
                                                        <mask id="path-2-inside-1_28_428" fill="white">
                                                            <rect x="74.4785" y="43" width="7.30435" height="28" rx="1" />
                                                        </mask>
                                                        <rect x="74.4785" y="43" width="7.30435" height="28" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-2-inside-1_28_428)" />
                                                        <mask id="path-3-inside-2_28_428" fill="white">
                                                            <rect x="64.7383" y="51.5217" width="7.30435" height="19.4783"
                                                                  rx="1" />
                                                        </mask>
                                                        <rect x="64.7383" y="51.5217" width="7.30435" height="19.4783" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-3-inside-2_28_428)" />
                                                        <mask id="path-4-inside-3_28_428" fill="white">
                                                            <rect x="55" y="60.0434" width="7.30435" height="10.9565" rx="1" />
                                                        </mask>
                                                        <rect x="55" y="60.0434" width="7.30435" height="10.9565" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-4-inside-3_28_428)" />
                                                        <defs>
                                                            <filter id="filter0_d_28_428" x="0.341797" y="0.298691"
                                                                    width="142.172" height="136.49" filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                               result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="18.5" />
                                                                <feComposite in2="hardAlpha" operator="out" />
                                                                <feColorMatrix type="matrix"
                                                                               values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                         result="effect1_dropShadow_28_428" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                         in2="effect1_dropShadow_28_428" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="cornerSvgTitleLeads">
                                                    <span class="leadsTitleSpanStyle fs-5">Statistik Der Leads</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-3 ps-md-4 mb-5">
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.0814 22.8732H6.87387C3.6658 22.8732 1.04102 20.2484 1.04102 17.0404V6.83286C1.04102 3.62479 3.6658 1 6.87387 1H17.0814C20.2894 1 22.9142 3.62479 22.9142 6.83286V17.0404C22.9142 20.2484 20.2894 22.8732 17.0814 22.8732Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M15.6231 6.20791H13.6346C12.7557 6.20791 11.9127 6.53712 11.2912 7.12313C10.6697 7.70913 10.3205 8.50392 10.3205 9.33265V11.2075H8.33203V13.7073H10.3205V18.7069H12.9718V13.7073H14.9603L15.6231 11.2075H12.9718V9.33265C12.9718 9.16691 13.0417 9.00795 13.1659 8.89075C13.2902 8.77355 13.4588 8.70771 13.6346 8.70771H15.6231V6.20791Z"
                                                        stroke="#9B9C9C" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Facebook</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ facebook }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 24 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.0814 23.3702H6.87387C3.6658 23.3702 1.04102 20.7454 1.04102 17.5373V7.32981C1.04102 4.12173 3.6658 1.49695 6.87387 1.49695H17.0814C20.2894 1.49695 22.9142 4.12173 22.9142 7.32981V17.5373C22.9142 20.7454 20.2894 23.3702 17.0814 23.3702Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M11.9781 17.1207C14.5668 17.1207 16.6653 15.0222 16.6653 12.4336C16.6653 9.84493 14.5668 7.74644 11.9781 7.74644C9.38951 7.74644 7.29102 9.84493 7.29102 12.4336C7.29102 15.0222 9.38951 17.1207 11.9781 17.1207Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.7056 6.70486C18.2809 6.70486 18.7472 6.23853 18.7472 5.66328C18.7472 5.08803 18.2809 4.62169 17.7056 4.62169C17.1304 4.62169 16.6641 5.08803 16.6641 5.66328C16.6641 6.23853 17.1304 6.70486 17.7056 6.70486Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>



                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Instagram</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ instagram }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M24.9979 12.4984C24.9979 12.4964 24.9979 12.4943 24.9979 12.4922C24.9979 8.79338 23.3876 5.47165 20.8306 3.18737L20.8181 3.17695C20.7858 3.14258 20.7514 3.11237 20.7129 3.08633L20.7108 3.08529C18.5287 1.1687 15.6497 0 12.4969 0C9.33881 0 6.45571 1.17287 4.25798 3.1082L4.27152 3.09675C4.24444 3.11758 4.22048 3.13945 4.19861 3.16445V3.16549C1.61757 5.46227 0 8.79338 0 12.5016C0 16.1993 1.6082 19.5211 4.16319 21.8064L4.17569 21.8168C4.17569 21.8199 4.17778 21.822 4.1809 21.822C4.21319 21.8585 4.2486 21.8897 4.2861 21.9178L4.28818 21.9189C6.46925 23.8323 9.34714 25 12.4969 25C15.6549 25 18.5391 23.8271 20.7368 21.8918L20.7233 21.9033C20.7545 21.8803 20.7816 21.8564 20.8066 21.8303C23.3845 19.5367 25 16.2108 25 12.5068C25 12.5047 25 12.5016 25 12.4995L24.9979 12.4984ZM20.3504 20.6283C19.7504 20.1408 19.0765 19.694 18.362 19.3138L18.2943 19.2804C18.9328 17.4399 19.3171 15.3181 19.3536 13.1109V13.0942H23.7918C23.6293 16.065 22.3429 18.7065 20.3535 20.6252L20.3504 20.6283ZM13.0947 19.0607C14.4311 19.1325 15.6799 19.4263 16.8319 19.9044L16.7569 19.8773C15.8341 21.9814 14.5352 23.4271 13.0947 23.7448V19.0607ZM13.0947 17.869V13.0942H18.1652C18.1204 15.1369 17.7662 17.0816 17.1486 18.9044L17.1892 18.768C15.9841 18.2638 14.5873 17.9399 13.1239 17.8701L13.0958 17.869H13.0947ZM13.0947 11.9026V7.12783C14.5852 7.05596 15.982 6.73305 17.2684 6.19974L17.1861 6.22995C17.7641 7.91634 18.1193 9.86 18.1652 11.8808V11.9026H13.0947ZM13.0947 5.93621V1.25411C14.5352 1.57181 15.8341 3.01133 16.7569 5.12166C15.6799 5.56956 14.4311 5.86226 13.1249 5.93517L13.0947 5.93621ZM16.0674 1.76972C17.3569 2.20616 18.4755 2.82072 19.4609 3.59464L19.4369 3.57589C18.9755 3.93838 18.4578 4.28003 17.912 4.57689L17.8537 4.60606C17.3861 3.51548 16.7861 2.57802 16.058 1.75514L16.0674 1.76659V1.76972ZM11.9011 1.25724V5.93621C10.5647 5.86434 9.31589 5.57164 8.1639 5.0925L8.2389 5.11958C9.1659 3.0155 10.4627 1.57077 11.9032 1.25307L11.9011 1.25724ZM7.14315 4.60293C6.53904 4.27482 6.02137 3.93421 5.53496 3.55402L5.55995 3.57277C6.52133 2.81655 7.63895 2.20303 8.84926 1.78951L8.92842 1.76555C8.21077 2.57593 7.61082 3.5134 7.16919 4.53419L7.14315 4.60189V4.60293ZM11.9032 7.12679V11.9016H6.83276C6.87859 9.85896 7.23377 7.9153 7.85247 6.09245L7.81185 6.22891C9.01591 6.73201 10.4127 7.05596 11.8751 7.12574L11.9032 7.12679ZM11.9032 13.0932V17.868C10.4127 17.9399 9.01591 18.2628 7.72956 18.7961L7.81185 18.7659C7.23377 17.0805 6.87859 15.1358 6.83276 13.1151V13.0932H11.9032ZM11.9032 19.0596V23.7417C10.4627 23.424 9.16382 21.9845 8.24098 19.8742C9.31797 19.4263 10.5668 19.1346 11.873 19.0617L11.9032 19.0607V19.0596ZM8.93467 23.2261C7.6452 22.7907 6.52758 22.1782 5.5412 21.4054L5.5662 21.4241C6.02762 21.0616 6.54529 20.72 7.09108 20.4231L7.1494 20.3939C7.61291 21.4845 8.2139 22.422 8.94405 23.2407L8.93467 23.2303V23.2261ZM17.8548 20.3929C18.4589 20.721 18.9765 21.0616 19.463 21.4418L19.438 21.4231C18.4766 22.1793 17.359 22.7928 16.1487 23.2063L16.0695 23.2303C16.7871 22.4199 17.3871 21.4835 17.8287 20.4627L17.8548 20.395V20.3929ZM23.7918 11.9026H19.3536C19.3171 9.67876 18.9328 7.55698 18.2516 5.57164L18.2943 5.71539C19.0765 5.29978 19.7494 4.85292 20.3743 4.34878L20.3493 4.36753C22.3419 6.28932 23.6282 8.93088 23.7897 11.8724L23.7907 11.9016L23.7918 11.9026ZM4.64753 4.36857C5.24748 4.85605 5.92138 5.3029 6.6359 5.6831L6.70361 5.71643C6.06512 7.55698 5.68078 9.67876 5.64432 11.886V11.9026H1.20511C1.36759 8.93192 2.65395 6.29036 4.64336 4.37169L4.64649 4.36857H4.64753ZM1.20615 13.0942H5.64432C5.68078 15.3181 6.06512 17.4399 6.74631 19.4252L6.70361 19.2815C5.92138 19.6971 5.24852 20.144 4.62357 20.6481L4.64857 20.6293C2.65603 18.7076 1.36968 16.066 1.20823 13.1245L1.20719 13.0953L1.20615 13.0942Z"
                                                        fill="#9B9C9C" />
                                                </svg>


                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Sanascout</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ sanascout }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4 responsivePositionMobile">
                                        <div class="ps-4">
                                            <div class="row g-0 pb-2">
                                                <div class="col-auto my-auto me-2">
                                                    <div>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M15.2031 13.7402C16.3604 12.2596 16.9937 10.4371 17.004 8.55805C17.0143 6.67902 16.4009 4.84965 15.2599 3.35651C14.4182 2.25414 13.3191 1.3747 12.0589 0.795072C10.7987 0.215447 9.41568 -0.0467186 8.03072 0.0314946C6.64576 0.109708 5.30105 0.525919 4.11413 1.24374C2.92721 1.96157 1.93422 2.95915 1.22197 4.14929L1.21581 1.24651L0.00257296 1.24909L0.011578 5.49468L0.619483 6.09991L4.86582 6.0909L4.86324 4.87787L2.20747 4.88351C3.01498 3.48088 4.26648 2.38689 5.76462 1.77405C7.26276 1.16122 8.92231 1.06439 10.4816 1.49885C12.0408 1.93331 13.4111 2.87433 14.3763 4.17353C15.3415 5.47274 15.8467 7.0562 15.8123 8.67423C15.7779 10.2923 15.2057 11.8528 14.1862 13.1098C13.1666 14.3668 11.7575 15.2487 10.1812 15.6164C8.60483 15.9842 6.9509 15.8169 5.48019 15.1409C4.00947 14.4649 2.80564 13.3187 2.05852 11.883L0.98357 12.4457C1.64154 13.7046 2.60485 14.7783 3.78528 15.5685C4.96572 16.3588 6.32557 16.8404 7.74034 16.9692C9.15511 17.098 10.5796 16.8699 11.8834 16.3057C13.1871 15.7416 14.3286 14.8595 15.2031 13.7402ZM11.1229 12.5722L11.9801 11.7128L8.51014 8.25693L8.50038 3.65713L7.28715 3.6597L7.29744 8.51181L7.47548 8.94084L11.1229 12.5722Z"
                                                                  fill="#3670BD" />
                                                        </svg>

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a href="leadhistory" style="text-decoration: none;">
                                                        <span class="underlinedFirstTxt">Historie Der Leads</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row g-0 pb-2">
                                                <div class="col-auto my-auto me-2">
                                                    <div>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="9" cy="9" r="8.25" stroke="#C31F11"
                                                                    stroke-width="1.5" />
                                                            <path d="M12 6L6 12" stroke="#C31F11" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6 6L12 12" stroke="#C31F11" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a href="rleads" style="text-decoration: none;">
                                                        <span class="underlinedSecondtTxt">Abgelehnte Leads</span>
                                                    </a>
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
        </section>

        <section v-else>
            <div class="row g-0">
                <div class="p-3 p-md-4">
                    <div class="">
                        <div class="row g-3">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="greyBackgroundDivLeads">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="cornerSvgLeads">
                                                    <svg width="151" height="146" viewBox="0 0 151 146" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_28_428)">
                                                            <path
                                                                d="M37.0413 77.3271C39.8353 81.9774 47.7833 86.5471 52.0258 89.8453C56.2682 93.1435 50.751 102.5 55.796 103.944C60.8411 105.388 76.3496 98.8915 81.4291 98.2616C86.5087 97.6317 91.3573 95.9651 95.6981 93.3571C100.039 90.7491 103.787 87.2506 106.728 83.0615C109.669 78.8725 111.746 74.0747 112.84 68.9424C113.933 63.81 114.023 58.4434 113.103 53.1491C112.183 47.8547 111.333 38.8294 110.491 33.8527L80.9995 33.8527L65.249 33.8527C59.1464 33.8527 53.1076 35.0936 47.4995 37.5L46.4221 38.3288C42.8774 41.0554 40.1638 44.717 38.5863 48.9016C37.5647 51.6115 37.0413 54.4838 37.0413 57.38L37.0413 77.3271Z"
                                                                fill="#DCE4F9" />
                                                        </g>
                                                        <rect x="51.75" y="54.7133" width="23.687" height="8.87111" rx="1.25"
                                                              stroke="#313131" stroke-width="1.5" />
                                                        <path
                                                            d="M55.5856 59.2193C55.5856 59.6674 55.2223 60.0306 54.7742 60.0306C54.3261 60.0306 53.9629 59.6674 53.9629 59.2193C53.9629 58.7712 54.3256 58.4079 54.7737 58.4079C55.2218 58.4079 55.5856 58.7712 55.5856 59.2193Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M58.0192 59.2193C58.0192 59.6674 57.6559 60.0307 57.2078 60.0307C56.7597 60.0307 56.3965 59.6674 56.3965 59.2193C56.3965 58.7712 56.7597 58.4079 57.2078 58.4079C57.6559 58.4079 58.0192 58.7712 58.0192 59.2193Z"
                                                            fill="#313131" />
                                                        <rect x="69.5293" y="66.5659" width="23.687" height="8.87111" rx="1.25"
                                                              stroke="#313131" stroke-width="1.5" />
                                                        <path
                                                            d="M73.3649 71.072C73.3649 71.5201 73.0016 71.8833 72.5535 71.8833C72.1054 71.8833 71.7422 71.5201 71.7422 71.072C71.7422 70.6239 72.1049 70.2606 72.553 70.2606C73.0011 70.2606 73.3649 70.6239 73.3649 71.072Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M75.7985 71.072C75.7985 71.5201 75.4352 71.8834 74.9871 71.8834C74.539 71.8834 74.1758 71.5201 74.1758 71.072C74.1758 70.6239 74.539 70.2606 74.9871 70.2606C75.4352 70.2606 75.7985 70.6239 75.7985 71.072Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M77.8254 51H75.4411C75.0709 51 74.7715 51.2994 74.7715 51.6696C74.7715 52.0397 75.0709 52.3337 75.4411 52.3337H77.8254C79.9702 52.3337 81.7176 54.0811 81.7176 56.2259V59.5956L80.8357 58.7137C80.5744 58.4524 80.1553 58.4524 79.894 58.7137C79.6327 58.975 79.6327 59.3941 79.894 59.6554L81.9136 61.675C82.0388 61.8003 82.2075 61.871 82.3872 61.871C82.5614 61.871 82.7356 61.8003 82.8608 61.675L84.8804 59.6554C85.1417 59.3941 85.1417 58.975 84.8804 58.7137C84.6191 58.4524 84.1999 58.4524 83.9386 58.7137L83.0568 59.5956V56.2259C83.0513 53.3462 80.7051 51 77.8254 51Z"
                                                            fill="#313131" />
                                                        <path
                                                            d="M65.6537 77.6196H68.0381C68.4082 77.6196 68.7076 77.3202 68.7076 76.9501C68.7076 76.5799 68.4082 76.2859 68.0381 76.2859H65.6537C63.5089 76.2859 61.7615 74.5385 61.7615 72.3937V69.0241L62.6434 69.9059C62.774 70.0366 62.9428 70.1019 63.117 70.1019C63.2912 70.1019 63.4599 70.0366 63.5906 69.9059C63.8519 69.6446 63.8519 69.2255 63.5906 68.9642L61.571 66.9446C61.4458 66.8194 61.277 66.7486 61.0974 66.7486C60.9232 66.7486 60.749 66.8194 60.6238 66.9446L58.6042 68.9642C58.3429 69.2255 58.3429 69.6446 58.6042 69.9059C58.8655 70.1672 59.2846 70.1672 59.5459 69.9059L60.4278 69.0241V72.3937C60.4278 75.2734 62.774 77.6196 65.6537 77.6196Z"
                                                            fill="#313131" />
                                                        <defs>
                                                            <filter id="filter0_d_28_428" x="0.0410156" y="0.852741"
                                                                    width="150.691" height="144.3" filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                               result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="18.5" />
                                                                <feComposite in2="hardAlpha" operator="out" />
                                                                <feColorMatrix type="matrix"
                                                                               values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                         result="effect1_dropShadow_28_428" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                         in2="effect1_dropShadow_28_428" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="cornerSvgTitleLeads">
                                                    <span class="leadsTitleSpanStyle fs-5">Zugewiesene Leads</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-md-3 pb-3">
                                        <div class="leadsOverflowDiv">
                                            <div>
                                                <div class="row g-3" v-if="leads.length > 0">
                                                    <div class="col-12 col-lg-6" v-for="lead in leads">
                                                        <div class="modal fade" :id="lead.slug" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content"
                                                                     style="background: #fff; border-radius: 23px">
                                                                    <div class="modal-header mx-3 pb-0"
                                                                         style="border-bottom: none !important;">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"
                                                                                style="opacity: 1 !important;">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body p-1 p-sm-3">
                                                                        <div class="row mx-3 my-auto">
                                                                            <div class="col-12 col-md-4 my-auto">
                                                                                <span class="fs-4 fw-bold text-dark">
                                                                                {{ lead.first_name }} {{ lead.last_name }}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="mt-sm-3 mt-1">
                                                                            <div class="mx-0 pb-0 mx-sm-3 pb-sm-3 row">
                                                                                <div class="col-md-6 col-12 my-2">
                                                                                    <div class="text-dark text-left p-3 m-2 h-100"
                                                                                         style="border-radius: 9px; background:#fafafa;">
                                                                                        <div class="py-2">
                                                                                            <h6 style="font-weight: 700 !important; color:#434343 !important;">Herkunft vom Lead</h6>
                                                                                        </div>

                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Platform: <span
                                                                                style="color: #88889D;font-weight: 500">{{lead.campaign.name}} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span style="color: #434343; font-weight: 600;">Kampagne:
                                                                             <span style="color: #88889D;font-weight: 500"> {{lead.info.kampagne}}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Grund: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.grund
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Teilnahme: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.teilnahme
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-12  my-2">
                                                                                    <div class="text-dark text-left p-3 m-2"
                                                                                         style="border-radius: 9px; background:#fafafa;">
                                                                                        <div class="py-1">
                                                                                            <h6 style="color: #434343 !important; font-weight: 700 !important;">Angaben</h6>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Gerburstdatum: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                   lead.birthdate
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Haushalt: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.number_of_persons
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Telefon: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.telephone
                                                                                }}</span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">PLZ, Ort: <span
                                                                                style="color: #88889D;font-weight: 500"> {{lead.postal_code}} {{ lead.city }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Krankenkasse: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.krankenkasse
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Bewertung KK: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.bewertung
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                        <div class="py-1">
                                                                            <span
                                                                                style="color: #434343; font-weight: 600;">Wichtig: <span
                                                                                style="color: #88889D;font-weight: 500"> {{
                                                                                    lead.wichtig
                                                                                }} </span></span><br>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                         style="border-top: none !important; display: block;">
                                                                        <div class="text-center">
                                                                            <button @click="getit2(lead.id)" type="button"
                                                                                    class="py-2 px-5 fw-bold border-0 "
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#asign"
                                                                                    style="background-color: #0C71C3; color: #fff; border-radius: 13px;">
                                                                                Zuweisen
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-0 h-100">
                                                            <div class="col-auto" style="position: relative;">
                                                                <div>
                                                                    <label class="containerLeads">
                                                                        <input class="form-check-input" type="checkbox" :value="lead.id"
                                                                               name="jep" @change="getit($event)"
                                                                               id="flexCheckDefault">
                                                                        <span class="checkmarkLeads"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col" data-bs-toggle="modal"
                                                                 :data-bs-target="'#' + lead.slug">
                                                                <div class="whiteBacgkroundLeads p-3" style="position: relative">
                                                                    <div class="pb-3">
                                                                        <span class="fs-5 LeadNameStyleSpan">{{ lead.first_name }} {{ lead.last_name }}</span>
                                                                    </div>
                                                                    <div class="mb-5">
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-3 col-md-4 col-lg-5">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Adresse</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.address }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-3 col-md-4 col-lg-5">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Haushalt</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span class="fs-6 LeadRightSideSpanStyle">{{ lead.number_of_persons }} Personen</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-3 col-md-4 col-lg-5">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Grund</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.grund }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="row g-0">
                                                                                <div class="col-5 col-sm-3 col-md-4 col-lg-5">
                                                                            <span
                                                                                class="fs-6 LeadLeftSideSpanStyle">Kampagne</span>
                                                                                </div>
                                                                                <div class="col">
                                                                            <span
                                                                                class="fs-6 LeadRightSideSpanStyle">{{ lead.kampagne }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-3 positionAbsDiv">
                                                                        <div class="row g-0 justify-content-center" >
                                                                            <div class="col-12 col-md-6 col-lg-5">
                                                                                <button
                                                                                    class="leadOffnenBtnStyle leadOffnenBtnStyle3 w-100 py-1" data-bs-toggle="modal"
                                                                                    :data-bs-target="'#' + lead.slug">Lead öffnen</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center" v-else>
                                                    <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" >
                                                        <span class="fs-6" style="color: #D1D1D1 !important">Keine Leads zugewiesen</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3" v-if="role != 'fs' && leads.length > 0">
                                            <div class="row g-0">
                                                <div class="col-6 col-md-5 col-lg-3">
                                                    <button type="submit" class="leadOffnenBtnStyle w-100 py-1" data-bs-toggle="modal"
                                                            data-bs-target="#asign">Zuweisen</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="asign" tabindex="-1" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content p-3" style="border-radius: 23px !important;">
                                                    <div class="modal-header" style="border-bottom: none !important;">
                                                        <h5 style="font-weight: 600;" class="modal-title" id="exampleModalLabel">Zugewiesene
                                                            Leads</h5>
                                                        <button type="button" class="btn-close" @click="reloadthis()"
                                                                style="opacity: 1 !important;" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label style="font-weight: 500 !important;color: #434343">Aussendienst</label>
                                                        <select class="form-select"
                                                                style="background-color: #FFFFFF;border: 1px solid #E5EBF9 !important;box-shadow: 0px 4px 4px rgba(208, 208, 208, 0.25)!important;border-radius: 11px!important;"
                                                                @change="changeadmin($event)">
                                                            <option v-for="admin in admins" :value="admin.id">{{
                                                                admin.name
                                                                }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer py-0"
                                                         style="display: block !important; border-top: none !important;">
                                                         <div class="row g-0">
                                                            <div class="col-6 pe-1">
                                                             <button type="button" @click="reloadthis()" class="btn py-1 fw-600 w-100"
                                                                data-bs-dismiss="modal"
                                                                style="background-color: #fff !important; color: #2F60DC !important;border: 1px solid #2F60DC !important; border-radius: 8px !important;font-weight: 600 !important">
                                                            Schliessen
                                                        </button>

                                                            </div>
                                                         <div class="col-6 ps-1">
                                                             <button @click="assign" class="btn py-1 w-100"
                                                                style="background-color: #2F60DC !important; color: #fff !important; border-radius: 8px !important;font-weight: 600 !important">
                                                            Zuweisen</button>

                                                         </div>

                                                         </div>


                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3 d-flex flex-column">
                                <div class="greyBackgroundDivLeads h-100 iosWebkitHeight" style="position: relative;">
                                    <div>
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="cornerSvgLeads">
                                                    <svg width="143" height="137" viewBox="0 0 143 137" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_28_428)">
                                                            <path
                                                                d="M37.3418 71.9433C39.8253 76.0769 46.8904 80.139 50.6616 83.0708C54.4327 86.0026 49.5284 94.3197 54.013 95.6033C58.4975 96.887 72.2831 91.112 76.7984 90.5521C81.3136 89.9921 85.6236 88.5107 89.4821 86.1924C93.3407 83.8741 96.6723 80.7644 99.2867 77.0407C101.901 73.317 103.747 69.0523 104.719 64.49C105.692 59.9278 105.771 55.1575 104.953 50.4513C104.135 45.7452 103.38 37.7225 102.631 33.2987L76.3687 33.7197L56.3148 34.041C55.1872 34.059 54.0636 34.1788 52.9576 34.3989C46.3097 35.7217 40.8942 40.5313 38.7954 46.9765L38.613 47.5366C38.0035 49.4083 37.6773 51.3606 37.6453 53.3288L37.3418 71.9433Z"
                                                                fill="#DCE4F9" />
                                                        </g>
                                                        <mask id="path-2-inside-1_28_428" fill="white">
                                                            <rect x="74.4785" y="43" width="7.30435" height="28" rx="1" />
                                                        </mask>
                                                        <rect x="74.4785" y="43" width="7.30435" height="28" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-2-inside-1_28_428)" />
                                                        <mask id="path-3-inside-2_28_428" fill="white">
                                                            <rect x="64.7383" y="51.5217" width="7.30435" height="19.4783"
                                                                  rx="1" />
                                                        </mask>
                                                        <rect x="64.7383" y="51.5217" width="7.30435" height="19.4783" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-3-inside-2_28_428)" />
                                                        <mask id="path-4-inside-3_28_428" fill="white">
                                                            <rect x="55" y="60.0434" width="7.30435" height="10.9565" rx="1" />
                                                        </mask>
                                                        <rect x="55" y="60.0434" width="7.30435" height="10.9565" rx="1"
                                                              stroke="#313131" stroke-width="3"
                                                              mask="url(#path-4-inside-3_28_428)" />
                                                        <defs>
                                                            <filter id="filter0_d_28_428" x="0.341797" y="0.298691"
                                                                    width="142.172" height="136.49" filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                               result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="18.5" />
                                                                <feComposite in2="hardAlpha" operator="out" />
                                                                <feColorMatrix type="matrix"
                                                                               values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                         result="effect1_dropShadow_28_428" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                         in2="effect1_dropShadow_28_428" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="cornerSvgTitleLeads">
                                                    <span class="leadsTitleSpanStyle fs-5">Statistik Der Leads</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-3 ps-md-4 mb-5">
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.0814 22.8732H6.87387C3.6658 22.8732 1.04102 20.2484 1.04102 17.0404V6.83286C1.04102 3.62479 3.6658 1 6.87387 1H17.0814C20.2894 1 22.9142 3.62479 22.9142 6.83286V17.0404C22.9142 20.2484 20.2894 22.8732 17.0814 22.8732Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M15.6231 6.20791H13.6346C12.7557 6.20791 11.9127 6.53712 11.2912 7.12313C10.6697 7.70913 10.3205 8.50392 10.3205 9.33265V11.2075H8.33203V13.7073H10.3205V18.7069H12.9718V13.7073H14.9603L15.6231 11.2075H12.9718V9.33265C12.9718 9.16691 13.0417 9.00795 13.1659 8.89075C13.2902 8.77355 13.4588 8.70771 13.6346 8.70771H15.6231V6.20791Z"
                                                        stroke="#9B9C9C" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Facebook</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ facebook }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 24 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.0814 23.3702H6.87387C3.6658 23.3702 1.04102 20.7454 1.04102 17.5373V7.32981C1.04102 4.12173 3.6658 1.49695 6.87387 1.49695H17.0814C20.2894 1.49695 22.9142 4.12173 22.9142 7.32981V17.5373C22.9142 20.7454 20.2894 23.3702 17.0814 23.3702Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M11.9781 17.1207C14.5668 17.1207 16.6653 15.0222 16.6653 12.4336C16.6653 9.84493 14.5668 7.74644 11.9781 7.74644C9.38951 7.74644 7.29102 9.84493 7.29102 12.4336C7.29102 15.0222 9.38951 17.1207 11.9781 17.1207Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.7056 6.70486C18.2809 6.70486 18.7472 6.23853 18.7472 5.66328C18.7472 5.08803 18.2809 4.62169 17.7056 4.62169C17.1304 4.62169 16.6641 5.08803 16.6641 5.66328C16.6641 6.23853 17.1304 6.70486 17.7056 6.70486Z"
                                                        stroke="#9B9C9C" stroke-width="1.3" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>



                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Instagram</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ instagram }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 pb-3">
                                            <div class="col-auto my-auto me-3">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M24.9979 12.4984C24.9979 12.4964 24.9979 12.4943 24.9979 12.4922C24.9979 8.79338 23.3876 5.47165 20.8306 3.18737L20.8181 3.17695C20.7858 3.14258 20.7514 3.11237 20.7129 3.08633L20.7108 3.08529C18.5287 1.1687 15.6497 0 12.4969 0C9.33881 0 6.45571 1.17287 4.25798 3.1082L4.27152 3.09675C4.24444 3.11758 4.22048 3.13945 4.19861 3.16445V3.16549C1.61757 5.46227 0 8.79338 0 12.5016C0 16.1993 1.6082 19.5211 4.16319 21.8064L4.17569 21.8168C4.17569 21.8199 4.17778 21.822 4.1809 21.822C4.21319 21.8585 4.2486 21.8897 4.2861 21.9178L4.28818 21.9189C6.46925 23.8323 9.34714 25 12.4969 25C15.6549 25 18.5391 23.8271 20.7368 21.8918L20.7233 21.9033C20.7545 21.8803 20.7816 21.8564 20.8066 21.8303C23.3845 19.5367 25 16.2108 25 12.5068C25 12.5047 25 12.5016 25 12.4995L24.9979 12.4984ZM20.3504 20.6283C19.7504 20.1408 19.0765 19.694 18.362 19.3138L18.2943 19.2804C18.9328 17.4399 19.3171 15.3181 19.3536 13.1109V13.0942H23.7918C23.6293 16.065 22.3429 18.7065 20.3535 20.6252L20.3504 20.6283ZM13.0947 19.0607C14.4311 19.1325 15.6799 19.4263 16.8319 19.9044L16.7569 19.8773C15.8341 21.9814 14.5352 23.4271 13.0947 23.7448V19.0607ZM13.0947 17.869V13.0942H18.1652C18.1204 15.1369 17.7662 17.0816 17.1486 18.9044L17.1892 18.768C15.9841 18.2638 14.5873 17.9399 13.1239 17.8701L13.0958 17.869H13.0947ZM13.0947 11.9026V7.12783C14.5852 7.05596 15.982 6.73305 17.2684 6.19974L17.1861 6.22995C17.7641 7.91634 18.1193 9.86 18.1652 11.8808V11.9026H13.0947ZM13.0947 5.93621V1.25411C14.5352 1.57181 15.8341 3.01133 16.7569 5.12166C15.6799 5.56956 14.4311 5.86226 13.1249 5.93517L13.0947 5.93621ZM16.0674 1.76972C17.3569 2.20616 18.4755 2.82072 19.4609 3.59464L19.4369 3.57589C18.9755 3.93838 18.4578 4.28003 17.912 4.57689L17.8537 4.60606C17.3861 3.51548 16.7861 2.57802 16.058 1.75514L16.0674 1.76659V1.76972ZM11.9011 1.25724V5.93621C10.5647 5.86434 9.31589 5.57164 8.1639 5.0925L8.2389 5.11958C9.1659 3.0155 10.4627 1.57077 11.9032 1.25307L11.9011 1.25724ZM7.14315 4.60293C6.53904 4.27482 6.02137 3.93421 5.53496 3.55402L5.55995 3.57277C6.52133 2.81655 7.63895 2.20303 8.84926 1.78951L8.92842 1.76555C8.21077 2.57593 7.61082 3.5134 7.16919 4.53419L7.14315 4.60189V4.60293ZM11.9032 7.12679V11.9016H6.83276C6.87859 9.85896 7.23377 7.9153 7.85247 6.09245L7.81185 6.22891C9.01591 6.73201 10.4127 7.05596 11.8751 7.12574L11.9032 7.12679ZM11.9032 13.0932V17.868C10.4127 17.9399 9.01591 18.2628 7.72956 18.7961L7.81185 18.7659C7.23377 17.0805 6.87859 15.1358 6.83276 13.1151V13.0932H11.9032ZM11.9032 19.0596V23.7417C10.4627 23.424 9.16382 21.9845 8.24098 19.8742C9.31797 19.4263 10.5668 19.1346 11.873 19.0617L11.9032 19.0607V19.0596ZM8.93467 23.2261C7.6452 22.7907 6.52758 22.1782 5.5412 21.4054L5.5662 21.4241C6.02762 21.0616 6.54529 20.72 7.09108 20.4231L7.1494 20.3939C7.61291 21.4845 8.2139 22.422 8.94405 23.2407L8.93467 23.2303V23.2261ZM17.8548 20.3929C18.4589 20.721 18.9765 21.0616 19.463 21.4418L19.438 21.4231C18.4766 22.1793 17.359 22.7928 16.1487 23.2063L16.0695 23.2303C16.7871 22.4199 17.3871 21.4835 17.8287 20.4627L17.8548 20.395V20.3929ZM23.7918 11.9026H19.3536C19.3171 9.67876 18.9328 7.55698 18.2516 5.57164L18.2943 5.71539C19.0765 5.29978 19.7494 4.85292 20.3743 4.34878L20.3493 4.36753C22.3419 6.28932 23.6282 8.93088 23.7897 11.8724L23.7907 11.9016L23.7918 11.9026ZM4.64753 4.36857C5.24748 4.85605 5.92138 5.3029 6.6359 5.6831L6.70361 5.71643C6.06512 7.55698 5.68078 9.67876 5.64432 11.886V11.9026H1.20511C1.36759 8.93192 2.65395 6.29036 4.64336 4.37169L4.64649 4.36857H4.64753ZM1.20615 13.0942H5.64432C5.68078 15.3181 6.06512 17.4399 6.74631 19.4252L6.70361 19.2815C5.92138 19.6971 5.24852 20.144 4.62357 20.6481L4.64857 20.6293C2.65603 18.7076 1.36968 16.066 1.20823 13.1245L1.20719 13.0953L1.20615 13.0942Z"
                                                        fill="#9B9C9C" />
                                                </svg>


                                            </div>
                                            <div class="col-5 col-md-7 col-lg-7 col-xl-5 my-auto me-2 me-lg-3">
                                                <div>
                                                    <span class="socialMediaSpan">Sanascout</span>
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <div>
                                                    <span class="socialMediaSpan">{{ sanascout }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4 responsivePositionMobile">
                                        <div class="ps-4">
                                            <div class="row g-0 pb-2">
                                                <div class="col-auto my-auto me-2">
                                                    <div>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M15.2031 13.7402C16.3604 12.2596 16.9937 10.4371 17.004 8.55805C17.0143 6.67902 16.4009 4.84965 15.2599 3.35651C14.4182 2.25414 13.3191 1.3747 12.0589 0.795072C10.7987 0.215447 9.41568 -0.0467186 8.03072 0.0314946C6.64576 0.109708 5.30105 0.525919 4.11413 1.24374C2.92721 1.96157 1.93422 2.95915 1.22197 4.14929L1.21581 1.24651L0.00257296 1.24909L0.011578 5.49468L0.619483 6.09991L4.86582 6.0909L4.86324 4.87787L2.20747 4.88351C3.01498 3.48088 4.26648 2.38689 5.76462 1.77405C7.26276 1.16122 8.92231 1.06439 10.4816 1.49885C12.0408 1.93331 13.4111 2.87433 14.3763 4.17353C15.3415 5.47274 15.8467 7.0562 15.8123 8.67423C15.7779 10.2923 15.2057 11.8528 14.1862 13.1098C13.1666 14.3668 11.7575 15.2487 10.1812 15.6164C8.60483 15.9842 6.9509 15.8169 5.48019 15.1409C4.00947 14.4649 2.80564 13.3187 2.05852 11.883L0.98357 12.4457C1.64154 13.7046 2.60485 14.7783 3.78528 15.5685C4.96572 16.3588 6.32557 16.8404 7.74034 16.9692C9.15511 17.098 10.5796 16.8699 11.8834 16.3057C13.1871 15.7416 14.3286 14.8595 15.2031 13.7402ZM11.1229 12.5722L11.9801 11.7128L8.51014 8.25693L8.50038 3.65713L7.28715 3.6597L7.29744 8.51181L7.47548 8.94084L11.1229 12.5722Z"
                                                                  fill="#3670BD" />
                                                        </svg>

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a href="leadhistory" style="text-decoration: none;">
                                                        <span class="underlinedFirstTxt">Historie Der Leads</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row g-0 pb-2">
                                                <div class="col-auto my-auto me-2">
                                                    <div>
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="9" cy="9" r="8.25" stroke="#C31F11"
                                                                    stroke-width="1.5" />
                                                            <path d="M12 6L6 12" stroke="#C31F11" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6 6L12 12" stroke="#C31F11" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>


                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a  href="rleads" style="text-decoration: none;">
                                                        <span class="underlinedSecondtTxt">Abgelehnte Leads</span>
                                                    </a>
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
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            leads: null,
            admin: null,
            admins: null,
            array: [],
            role: null,
            instagram: null,
            facebook: null,
            sanascout: null,
            gati: false,
            cnt: 0
        };
    },
    mounted() {
        this.getleads();
    },
    methods: {
        reloadthis: function () {
            location.reload();
        },
        closeFunc: function (id) {
            $('.modal-backdrop').remove();
            // $('#'+id).modal('hide');

        },
        getleads: function () {
            axios.get("getleads").then((response) => {

                if (response.data != null) {
                    this.leads = response.data.leads.data;
                    this.admins = response.data.admins;

                    if (response.data.admins.length > 0) {
                        this.admin = response.data.admins[0].id;
                    }
                    this.role = response.data.admin[0];
                    this.instagram = response.data.instagram;
                    this.facebook = response.data.facebook;
                    this.sanascout = response.data.sanascout;
                    this.gati = true;
                    this.cnt = response.data.leads.total;

                }
            });
        },
        getit: function (event) {
            if (event.target.checked) {
                this.array.push(parseInt(event.target.value));
            } else {
                this.array.pop(parseInt(event.target.value));
            }
        },
        getit2: function (id) {
            this.array.push(id)
        },
        assign: function () {
            axios
                .get(
                    "assigntofs" + "/" + this.admin + "?array=" + this.array.toString()
                )
                .then(this.getleads(), this.array = [], this.hiq(), location.reload());
        },
        changeadmin(event) {
            this.admin = parseInt(event.target.value);
        },
        arrpush(val) {
            this.array.push(val);
        },
        hiq() {
            var checkboxes = document.getElementsByName('jep');
            for(var checkbox of checkboxes) {
                checkbox.checked = false;
            }

        }
    },

    props: {
        csrf: {
            default: () => window.data.csrf_token,
        },

    },
};
</script>

