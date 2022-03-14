<template>
    <div class="row">
        <div class="col-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Arduino" aria-expanded="false" aria-controls="collapseTwo">
                        Arduino
                    </button>
                    </h2>
                    <div id="Arduino" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div v-for="data in datavideoarduino" :key="data.id">
                            <button class="m-2" v-on:click="getdatavideoid(id = data.Id_video)" ><i class="bi bi-play-circle"></i> {{ data.Title_video }}</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Javascritp" aria-expanded="false" aria-controls="collapseTwo">
                        Javascritp
                    </button>
                    </h2>
                    <div id="Javascritp" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div v-for="data in datavideojavascritp" :key="data.id">
                            <button class="m-2" v-on:click="getdatavideoid(id = data.Id_video)" ><i class="bi bi-play-circle"></i> {{ data.Title_video }}</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#php" aria-expanded="false" aria-controls="collapseTwo">
                        PHP
                    </button>
                    </h2>
                    <div id="php" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div v-for="data in datavideophp" :key="data.id">
                            <button class="m-2" v-on:click="getdatavideoid(id = data.Id_video)" ><i class="bi bi-play-circle"></i> {{ data.Title_video }}</button>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div v-if="showvideo" class="col-8">
            <div v-for="data in datashowvideo" :key="data.id">
                <h1 class="text-center fw-bold">
                    {{ data.Title_video }}
                </h1>
                <div class="d-flex justify-content-center">
                    <iframe class="mt-5" width="560" height="315" :src="data.Link_video" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div v-if="showselect" class="col-8">
            <div>
                <h1 class="text-center fw-bold">
                    SELECT VIDEO
                </h1>
                <div class="d-flex justify-content-center"> 
                      <div class="spinner-border text-primary mt-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div> 
                </div>
                <div class="d-flex justify-content-center">
                    <div class="mt-5">
                        <img src="images/left-arrow.png" width="200" alt=""> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>


<script>
export default {
  data() {
    return {
      datavideoarduino: [],
      datavideojavascritp: [],
      datavideophp: [],
      datashowvideo: [],
      showselect: true,
      showvideo: false,
    };
  },
  methods: {
    async fetchApi() {
        let DataArduino;
        let DataJavascritp;
        let DataPhp;

        await axios({
            method: 'post',
            url: '/api/Video/categories',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: {
                categories: 'Arduino',
            },
        })
        .then((response) => {
            DataArduino = response.data;
            //console.log(data);
            this.datavideoarduino = DataArduino;
        });

        await axios({
            method: 'post',
            url: '/api/Video/categories',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: {
                categories: 'Javascript',
            },
        })
        .then((response) => {
            DataJavascritp = response.data;
            //console.log(data);
            this.datavideojavascritp = DataJavascritp;
        });

        await axios({
            method: 'post',
            url: '/api/Video/categories',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: {
                categories: 'PHP',
            },
        })
        .then((response) => {
            DataPhp = response.data;
            //console.log(data);
            this.datavideophp = DataPhp;
        });
    },

    async getdatavideoid(id){
        let datavideo;
        await axios.get("/api/Video/detail/" + id).then((response) => {
            datavideo = response.data;
            //console.log(datavideo);
            this.datashowvideo = datavideo;
            this.showselect = false;
            this.showvideo = true;
        });
    }
  },
  mounted() {
    this.fetchApi();
  },
};
</script>