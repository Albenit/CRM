<template>
    <div class="secondGreyBorderDash p-3 p-md-4 h-100" style="position: relative">
    <div class="row g-0">
        <div class="col-auto cornerSvgToDoList">
            <svg width="151" height="146" viewBox="0 0 151 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_28_428)">
                    <path d="M37.0423 77.3271C39.8362 81.9774 47.7843 86.5471 52.0268 89.8453C56.2692 93.1435 50.752 102.5 55.797 103.944C60.8421 105.388 76.3506 98.8915 81.4301 98.2616C86.5097 97.6317 91.3583 95.9651 95.6991 93.3571C100.04 90.7491 103.788 87.2506 106.729 83.0615C109.67 78.8725 111.747 74.0747 112.841 68.9424C113.934 63.81 114.024 58.4434 113.104 53.1491C112.184 47.8547 111.334 38.8294 110.492 33.8527L80.9468 34.3263L63.3665 34.608C58.8425 34.6805 54.4031 35.8453 50.4263 38.0032L47.8194 39.4178C43.6759 41.6661 40.4617 45.3082 38.746 49.6991C37.881 51.9128 37.4183 54.2631 37.3795 56.6394L37.0423 77.3271Z" fill="#DCE4F9"/>
                    </g>
                    <path d="M73.0962 59.3584L71.6977 57.9598L68.9006 60.7569L67.5021 59.3584L66.1035 60.7569L68.9006 63.554L73.0962 59.3584Z" fill="black"/>
                    <path d="M73.7256 60.6362H79.6609V61.6254H73.7256V60.6362Z" fill="black"/>
                    <path d="M73.0962 65.2937L71.6977 63.8951L68.9006 66.6922L67.5021 65.2937L66.1035 66.6922L68.9006 69.4893L73.0962 65.2937Z" fill="black"/>
                    <path d="M73.7256 66.5715H79.6609V67.5607H73.7256V66.5715Z" fill="black"/>
                    <rect x="62.001" y="53" width="22" height="24.5714" rx="2" stroke="black" stroke-width="2"/>
                    <defs>
                    <filter id="filter0_d_28_428" x="0.0419922" y="0.852722" width="150.691" height="144.3" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="18.5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0 0.875 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_28_428"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_28_428" result="shape"/>
                    </filter>
                    </defs>
                    </svg>


        </div>
        <div class="col titleMarginAuto">
            <div class="pb-3">
                <span class="fs-4 secondGreyBorderDashSpan">To-Do Liste</span>
            </div>
        </div>
    </div>
    
        
        <div class="overFlowDivDashboard" style="margin-top: -0.8rem">
            <div v-if="todos == 0">
                <div class="text-center fs-6 fw-400 d-flex h-100 justify-content-center align-items-center" style="color: #9F9F9F">
                    Keine To-Do Liste
                </div>
            </div>
            <div v-else class="thirdBorderDivDash p-2 mb-2" v-for="todo in todos">
                <label style="font-weight: 400" class="container1 mb-0 fs-6">{{todo.title}}
                    <input type="checkbox" @click="deleteToDo(todo.id)">
                    <span class="checkmark1"></span>
                </label>
            </div>
        </div>

        <div class="pt-2">
            <div class="row g-0">
                <div class="col-12 input-group">
                    <input type="text" placeholder="Neue Aufgabe" id="title" name="title" class="form-control thirdBorderDivDash m-input toDoListeInput" autocomplete="off" v-on:keyup.enter="addtodos" required>
                    <div class="mx-1 ms-3" id="addRow" @click="addtodos" style="cursor:pointer;">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 35C7.85197 35 0 27.148 0 17.5C0 7.85197 7.85197 0 17.5 0C27.148 0 35 7.85197 35 17.5C35 27.148 27.148 35 17.5 35Z"
                                fill="#5288F5" />
                            <path
                                d="M25.0588 19H10.9412C10.4211 19 10 18.5526 10 18C10 17.4474 10.4211 17 10.9412 17H25.0588C25.5789 17 26 17.4474 26 18C26 18.5526 25.5789 19 25.0588 19Z"
                                fill="white" />
                            <path
                                d="M18 26C17.4474 26 17 25.5789 17 25.0588V18V10.9412C17 10.4211 17.4474 10 18 10C18.5526 10 19 10.4211 19 10.9412V25.0588C19 25.5789 18.5526 26 18 26Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--    <div class="col-12 col-sm-12 col-md-6 col-lg-4 g-0 px-2 order-1 order-md-1">-->
<!--        <div class="to-do-new wrapper-of-todo mt-3">-->
<!--            <div class="d-flex justify-content-between" id="#firstDivToggle1a">-->
<!--            <div class="header d-flex">-->
<!--                <div class="col-auto my-2">-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-ui-radios" viewBox="0 0 16 16">-->
<!--                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>-->
<!--                    </svg>-->
<!--                </div>-->
<!--                <div class="txt-01 my-auto ps-2">-->
<!--                    Aufgaben-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="fs-5 count px-4 fw-bold">{{cnt}}</div>-->
<!--        </div>-->
<!--            <div class="content greyBg p-2">-->

<!--                        <div class="ovrflw pe-1">-->
<!--                            <div class="input-group mb-2" v-for="todo in todos">-->
<!--                                <div class="row g-0">-->
<!--                                    <div class="col-auto text-center" >-->
<!--                                        <label class="container1" >-->
<!--                                            <input  type="checkbox"-->
<!--                                                class="removeRow" @click="deleteToDo(todo.id)">-->
<!--                                            <span class="checkmark"></span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <input type="text" :value="todo.title"  class="form-control m-input" autocomplete="off" readonly>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="input-group">-->
<!--                                <div class="row mb-3 g-0">-->
<!--                                    <div class="col-auto text-center" >-->
<!--                                        <label class="container1" >-->
<!--                                            <input id="removeRow" type="checkbox"-->
<!--                                                class="removeRow">-->
<!--                                            <span class="checkmark"></span>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <input type="text" placeholder="neue Aufgabe" id="title" name="title" class="form-control m-input" autocomplete="off" v-on:keyup.enter="addtodos" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <button id="addRow" @click="addtodos"  type="button" class="px-5 py-2 my-2 add-button fw-bold text-center">-->
<!--                            Neue Erinnerung-->
<!--                        </button>-->
<!--            </div>-->
<!--         </div>-->
<!--     </div>-->


</template>

<script>
export default {
    mounted() {
        this.getToDo()
    },
    data(){
        return {
            todos:null,
            cnt: 0
        }
    },
    methods: {
        addtodos: function (){
            var title = document.getElementById('title');
            if (title.value.trim() != ''){
                axios.get('addToDoList?title=' + title.value).then(this.getToDo());
                title.value = "";
            }

        },
        getToDo(){
            axios.get('getToDo').then((response) => {
                this.todos = response.data;
                this.cnt = response.data.length;
            })
            var checkbx = document.getElementsByClassName('removeRow');
            for (var checkbox of checkbx) {
                checkbx.checked = true;
            }
        },
        deleteToDo: function (id){
            axios.get('deleteToDoList?id=' + id).then(this.getToDo());
        }
    },

}
</script>
