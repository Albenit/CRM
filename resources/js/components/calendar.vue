<template>
    <div class="mx-lg-2 mb-2 calendar-divider noselectTextDash">
        <span class="fs-5" style="font-family: 'Montserrat'"><b>Termine</b></span>
        <div class="row text-center px-1 noselectTextDash pt-3" >
            <div class="g-0 col-md-3 col-3 calendarspan">
                <div style="background-color: #0C71C3; color: white;" class="dayy this-month dateee p-2 mx-2 " v-bind:id="lista[0].date" @click="searchapp(lista[0].date); ffirst()" >
                        <span
                            class="monthh p-0" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[0].day }} {{ lista[0].month }}, {{ lista[0].year }}</b></span>
                    <br>
                    <span
                        class="not-this-month  text-center" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[0].dayn }}</b>
                        </span>
                    <br>
                </div>
            </div>
            <div class="g-0 col-md-3 col-3 calendarspan">
                <div class="dayy this-month dateee p-2 mx-2" v-bind:id="lista[1].date" @click="searchapp(lista[1].date); ssecond();" style="cursor: pointer">
                        <span
                            class="monthh p-0" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[1].day }} {{ lista[1].month }}, {{ lista[1].year }}</b></span>
                    <br>
                    <span
                        class="not-this-month  text-center" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[1].dayn }}</b>
                        </span>
                    <br>
                </div>
            </div>
            <div class="g-0 col-md-3 col-3 calendarspan">
                <div class="dayy this-month dateee p-2 mx-2" v-bind:id="lista[2].date" @click="searchapp(lista[2].date); ssecond();" style="cursor: pointer">
                        <span
                            class="monthh p-0" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[2].day }} {{ lista[2].month }}, {{ lista[2].year }}</b></span>
                    <br>
                    <span
                        class="not-this-month  text-center" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[2].dayn }}</b>
                        </span>
                    <br>
                </div>
            </div>
            <div class="g-0 col-md-3 col-3 calendarspan">
                <div class="dayy this-month dateee p-2 mx-2" v-bind:id="lista[3].date" @click="searchapp(lista[3].date); ssecond();" style="cursor: pointer">
                          <span
                              class="monthh p-0" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[3].day }} {{ lista[3].month }}, {{ lista[3].year }}</b>
                          </span>
                    <br>
                    <span
                        class="not-this-month  text-center" style="font-family: 'Montserrat'; font-size: 15px;"><b>{{ lista[3].dayn }}</b>
                        </span>
                    <br>
                </div>
            </div>
        </div>
        <div class="row text-center my-3">
            <div class="col-6 col-md-6">
                <i @click="searchfor()" class="hoveri-butonit px-1 pb-1" style="cursor:pointer;">
                    <svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18.0001" r="18" fill="#2F60DC"/>
                        <path d="M20 25L14 18.5L20 12" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </i>
            </div>
            <div class="col-6 col-md-6">
                <i  class=" px-1 pb-1 hoveri-butonit" style=" cursor:pointer;" @click="searchfor2()">
                    <svg width="30" height="30" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18.9961" cy="18.0001" r="17.5" fill="#2F60DC"/>
                        <circle cx="18.9961" cy="18.0001" r="17.5" stroke="#3670BD"/>
                        <circle cx="18.9961" cy="18.0001" r="17.5" stroke="#3670BD"/>
                        <path d="M16.9961 12L22.9961 18.5L16.9961 25" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </i>
            </div>
        </div>
        <div class=" p-3 p-sm-3" style="height: 300px; background: rgba(229, 233, 243, 0.24); border-radius: 25px;  overflow:hidden !important; border-radius: 15px; font-family: 'Montserrat';">
            <div class="noselectTextDash text-center fs-6 fw-normal d-flex h-100 justify-content-center align-items-center" style="color: #CBCBCB;font-weight: 400 !important" v-if="today == null || today == ''">

                <span v-if="todayd == vvalue || vvalue == ''">Keine Termine für heute</span>
                <span v-else>Keine Termine für den {{ vvalue }}</span>
            </div>
            <div class="scroll-2" id="appscroll" v-else>
                <a style="text-decoration: none;" v-for="tod in today"  :href="'acceptappointment/'+tod.id">
                    <div  class="mb-2 text-white" style="min-height: 60px;cursor: pointer;">
                        <div class="person-box py-3 px-3">
                            <div class="row g-0">
                                <div class="col-12 col-md-9">
                                    <div class="calendarResponsiveText1">
                                        {{tod.first_name}} {{tod.last_name}} ({{tod.number_of_persons}} Personen)
                                    </div>
                                    <div class="calendarResponsiveText2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        {{tod.address}} {{tod.nr}},
                                        {{tod.postal_code}} {{tod.city}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-auto">
                                    <div class="row g-0">
                                        <div class="col-auto"></div>
                                        <div class="col-10">
                                            <div class="my-2 input-group">
                                                <div class="my-auto pe-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-clock terminSvgResponsiveSize" viewBox="0 0 16 16">
                                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="ms-1 my-auto">
                                                    <span class="calendarResponsiveText3" >{{tod.time}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div v-if="newappcnt > 0" class="mt-2 text-center p-1" style="background: #DDDADA; border-radius: 20px; cursor: pointer; font-family: 'Montserrat';" @click="loadmore()">
                    Mehr laden <i class="fas fa-caret-down"></i>
                </div>
            </div>
        </div>
        <br>
    </div>
</template>
<script>
export default {
    mounted() {
        var a = new Date();
        this.sod = a.getDay();
        this.date_function();
        axios.get('vuedate?page=' + this.lpage).then(
            (response) => { this.lista = response.data;}
        );
        axios.get('todayappointments?page=' + this.apage).then(
            (response) => { this.today = response.data; console.log(response)}
        );
        this.newload();
    },
    data(){
        return{
            today: null,
            date: [],
            month: null,
            day: null,
            year: null,
            todayd: null,
            days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday'],
            sot: null,
            sod: null,
            lista: null,
            cnt: 1,
            lpage: 4,
            apage:1,
            newappcnt: 0,
            secondd: false,
            vvalue: ''
        }
    },
    methods:{
        date_function: function () {
            var currentDate = new Date();
            var formatted_date = new Date().toISOString().slice(0, 10);
            this.todayd = formatted_date;
            this.year = parseInt(formatted_date.slice(0,4));
            this.month = parseInt(formatted_date.slice(5,7));
            this.day = parseInt(formatted_date.slice(8,10));
        },
        ssecond(){
        this.secondd = true;
        },
        ffirst(){
            this.secondd = false;
        },
        searchfor2(){
            this.lpage += 4;
            axios.get('vuedate?page=' + this.lpage).then(
                (response) => { this.lista = response.data;}
            );
        },
        searchfor(){
            if(this.lpage > 4){
                this.lpage -= 4;
                axios.get('vuedate?page=' + this.lpage).then(
                    (response) => { this.lista = response.data;}
                );
            }
        },
        searchapp(vall){
            var idForStyle = document.getElementById(vall).id;
            var ele = document.getElementsByClassName('dateee');
            for (var i = 0; i < ele.length; i++ ) {
                ele[i].style = "background-color: #fff; color: #000; cursor: pointer;";
            }
            document.getElementById(idForStyle).style = 'background-color: #0C71C3; color: white;  cursor: pointer;';
            axios.get('todayappointments?date=' + vall + '?page=' + this.apage).then(
                (response) => { this.today = response.data; }
            );
            this.vvalue = vall;
            this.vvalue = this.lista.find(e => e.date == this.vvalue);
            this.vvalue = this.vvalue.day + " " + this.vvalue.month + "," + this.vvalue.year;
            console.log(this.vvalue);
         
        },
        loadmore:function(){
            this.apage++;
            axios.get('todayappointments?page=' + this.apage).then(
                (response) => {
                    for (let i = 0; i < response.data.length; i++) {this.today.push(response.data[i]);}
                }
            );
        },
        newload:function(){
            this.apage++;
            axios.get('todayappointments?page=' + this.apage).then(
                (response) => {
                    this.newappcnt = response.data.length;
                }
            );
        }
    }
}
</script>
