<template>
   <div class="col text-start">
                                        <div class="plus-div  my-1">
                                            <div class="svg-div d-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" onclick="addContentFunct3()"
                                                     id="add-btn3" width="35"
                                                     class="img-fluid" viewBox="0 0 35 35"
                                                     style="cursor: pointer;background-color: #EFEFEF; border: 1.2px solid #707070; border-radius: 10px; padding:4px;">
                                                    <g id="Group_757" data-name="Group 757"
                                                       transform="translate(-458 -858)">
                                                        <line id="Line_43" data-name="Line 43" y2="34"
                                                              transform="translate(475.5 858.5)" fill="none"
                                                              stroke="#707070" stroke-linecap="round" stroke-width="2"/>
                                                        <path id="Path_345" data-name="Path 345" d="M34,0H0"
                                                              transform="translate(458.5 875.5)"
                                                              fill="none" stroke="#707070" stroke-linecap="round"
                                                              stroke-width="2"/>
                                                    </g>
                                                </svg>
                                                <div class="mx-3 my-auto">
                                                  <span>
                                                    Neue Aufgabe hinzufügen !
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    <div id="alrt3">
                                        </div>
                                        <div class="added-content" id="added-content3" style="display: none;">
                                            <div class="to-do-content mb-2 p-4"
                                                 style="background-color: #EFEFEF; border-radius: 13px;">
                                                <div class="py-2">
                                                    <div class="py-2">
                                                        <label for="">Kunden</label>
                                                        <input type="text" class="form-control"
                                                               :value="client.first_name" readonly>
                                                    </div>
                                                    <label for="">Außendienst:</label>
                                                    <select class="form-select" aria-label="Default select example" @change="onChangeSelect($event)">
                                                        <option :value="admins.id">{{admins.name}}</option>
                                                    </select>
                                                </div>
                                                <div class="py-2">
                                                    <label for="">Titel</label>
                                                    <input type="text" id="title3" class="form-control">
                                                </div>
                                                <div class="py-2">
                                                    <label for="Textarea1" class="form-label">Kommentar</label>
                                                    <textarea class="form-control" id="description3" rows="4"></textarea>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <button type="button" class="btn text-dark col-auto rounded" onclick="saveContentFunct3()" id="save-btn"
                                                            style="background-color: #fff;border:1px solid #000">
                                                        Abbrechen
                                                    </button>
                                                    <button @click="asign" onclick="saveContentFunct3()" type="button" class="btn text-white col-auto rounded" id="save-btn"
                                                            style="background-color: #5f5f5f;">
                                                        Senden
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
</template>
<script>
export default {
    data() {
        return {
client_id: this.$attrs['client_id'],
lead_id: this.$attrs['lead_id'],
url: this.$attrs['url'],
client: null,
admins: null,
admin: null
        };
    },
    methods:{
        getclient(){
            axios.get(this.url + 'costumer/' + this.client_id).then((response) => {this.client = response.data;});
        },
        asign(){
            var description = document.getElementById('description3').value;
            var title = document.getElementById('title3').value;
            axios.get(this.url + 'assignpendency?admin=' + this.admin + '&id=' + this.client_id + '&desc=' + description + '&title=' + title);
             document.getElementById('alrt3').innerHTML = "";
            document.getElementById('alrt3').innerHTML += '<div class="alert alert-success alert-dismissible fade show m-3" role="alert">\n' +
                '                   <strong>Erfolgreich Zugewiesen</strong>\n' +
                '                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n' +
                '                </div> ';
            },
         onChangeSelect(event) {
            this.admin = parseInt(event.target.value);
        },

    },
    mounted(){
    this.getclient();
   axios.get(this.url + 'fsadmins?admin_id=' + this.$attrs['admin_id']).then((response) => {this.admins = response.data; this.admin = response.data.id});
},
props:{
    url: {required:false}
}
}
</script>
