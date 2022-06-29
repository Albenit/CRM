<template>
    <div class="notification-divvv22" @click="readall();">
        <div class="hover-visible-div pe-5" id="hoverVisibleDiv">
            <div v-if="notcnt < 1" class="txt-notif fs-6">
                Sie haben keine neue Benachrichtigung
            </div>
            <div v-else class="txt-notif fs-6">
                Du hast {{ notcnt }} neue Benachrichtigungen
            </div>
        </div>
        <div class="btn-group dropup">
            <button type="button" class="rounded-notid-icon dropdown-toggle" data-bs-toggle="dropdown"
                    id="dropdownFunct" aria-expanded="false">
                    <span v-if="notcnt > 0" class="position-absolute  translate-middle badge rounded-pill bg-danger dot-styleee" >
                    {{notcnt}}
                   </span>
<!--                <span v-if="notcnt > 0" class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" width="36" fill="currentColor" class="bi bi-bell"
                     viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                </svg>
            </button>
            <ul class="dropdown-menu px-2" aria-labelledby="dropdownFunct" style="border: none !important">
                <!-- <div class="fw-bold fs-5 py-2">Aktuelle Benachrichtigungen</div>
                <hr class="my-1 g-0 p-0"> -->
                <div class="overflow-div2212" >
                    <div v-for="notification in notifications">
                        <div class="row g-0 px-4">
        
                    
                        <div v-if="notification.read_at == null" class="col-auto my-auto"><svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M23 21C25.2091 21 27 19.2091 27 17C27 14.7909 25.2091 13 23 13C20.7909 13 19 14.7909 19 17C19 19.2091 20.7909 21 23 21Z" fill="#2F60DC"/>
<path d="M17 18H2L1.9966 2.9062L13.4307 10.8223C13.598 10.938 13.7966 11 14 11C14.2034 11 14.402 10.938 14.5693 10.8223L26 2.9087V12H28V2C27.9993 1.46979 27.7883 0.961493 27.4134 0.586576C27.0385 0.211657 26.5302 0.000714343 26 0H2C1.46975 0.000608734 0.9614 0.211518 0.586459 0.586459C0.211518 0.9614 0.000608734 1.46975 0 2V18C0.000714343 18.5302 0.211657 19.0385 0.586576 19.4134C0.961493 19.7883 1.46979 19.9993 2 20H17V18ZM23.7986 2L14 8.7837L4.2014 2H23.7986Z" fill="black"/>
</svg>
</div>
<div v-else class="col-auto my-auto">
    <svg width="28" height="21" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M23 21C25.2091 21 27 19.2091 27 17C27 14.7909 25.2091 13 23 13C20.7909 13 19 14.7909 19 17C19 19.2091 20.7909 21 23 21Z" fill="#DFDFDF"/>
<path d="M17 18H2L1.9966 2.9062L13.4307 10.8223C13.598 10.938 13.7966 11 14 11C14.2034 11 14.402 10.938 14.5693 10.8223L26 2.9087V12H28V2C27.9993 1.46979 27.7883 0.961493 27.4134 0.586576C27.0385 0.211657 26.5302 0.000714343 26 0H2C1.46975 0.000608734 0.9614 0.211518 0.586459 0.586459C0.211518 0.9614 0.000608734 1.46975 0 2V18C0.000714343 18.5302 0.211657 19.0385 0.586576 19.4134C0.961493 19.7883 1.46979 19.9993 2 20H17V18ZM23.7986 2L14 8.7837L4.2014 2H23.7986Z" fill="#DFDFDF"/>
</svg>
</div>
                        <div style="border-bottom: 1px solid #EDEDED;color: #333333" class="p-2 m-1 col" v-html="notification.data"></div>
                        <div class="fw-bold my-auto">{{ notification.time }}</div>
                    </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
<!--    <div class="">-->
<!--        <div type="button" class="notification-divvv22" @click="openNotifyFunct(); readall();">-->
<!--            <div class="hover-visible-div" id="hoverVisibleDiv">-->
<!--                <div class="txt-notif fs-6">-->
<!--                    You have {{ notcnt }} new notifications-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="rounded-notid-icon">-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="36" fill="currentColor" class="bi bi-bell"-->
<!--                     viewBox="0 0 16 16">-->
<!--                    <path-->
<!--                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />-->
<!--                </svg>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="btn-group dropdown dropdown-notifications sw-open" id="openNotification"-->
<!--             style="position: absolute; display:none; right: 1rem; top: 3.2rem;">-->
<!--            <div class="bg-white dropdown-container text-start" style="border: 1px solid black;border-radius: 8px; z-index: 150; min-width:368px;">-->
<!--                <div class="dropdown-toolbar" style="z-index: 150">-->
<!--                    <h3 class="dropdown-toolbar-title pt-2" style="padding-left:1rem; font-weight: 600">Aktuelle Meldungen</h3>-->
<!--                    <hr class="m-0 g-0 p-0">-->
<!--                    <div class="ms-3" style="z-index: 333; height: 42vh; overflow-y: scroll;">-->
<!--                        <div class="notifications text-decoration-none coloriii" style="list-style:none;">-->
<!--                            <div v-for="notification in notifications" v-html="notification.data"-->
<!--                                 style="border-bottom: 1px solid #C8C8C8;" class="py-3">-->
<!--                                {{ notification.time }}-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>&lt;!&ndash; /dropdown-toolbar &ndash;&gt;-->


<!--            </div>-->
<!--        </div>-->




        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

              <div class="text-center" v-for="notification in notifications" @click="readthat(notification.id)" v-if="notification.read_at == null" v-html="notification.data" style="text-decoration:none !important; background: #CCCCFF;">
                </div>
                <div v-else class="text-center" v-for="notification in notifications" @click="readthat(notification.id)" v-if="notification.read_at != null" v-html="notification.data" style="text-decoration:none !important;">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" @click="closenot" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div> -->



<!--    </div>-->
</template>

<script>
export default {
    mounted() {
        this.getnotifications();
        setInterval(() => {
            this.getnotifications()
        }, 120000);
    },
    data() {
        return {
            notifications: null,
            notf: false,
            notcnt: 0
        }
    },
    methods: {
        readall() {
            axios.get(this.url + 'readnotifications').then(this.getnotifications())
        },
        getnotifications() {
            axios.get(this.url + 'getnotifications').then((response) => {
                this.notifications = [];
                this.notifications = response.data.notifications;
                this.notcnt = response.data.cnt;
            });
        },
        openNotifyFunct: function () {
            $('#openNotification').slideToggle();
        }
    },
    props:{
        url: {required: false}
    }
}
</script>
