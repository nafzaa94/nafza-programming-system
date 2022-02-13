<template>
  <div class="container-fluid">
    <h1 class="text-center mb-5" style="font-family: 'Lobster', cursive">
      STORY PROJECT WITH NAFZA PROGRAMMING
    </h1>

    <section
      v-for="data in datacard"
      :key="data.Id"
      class="container mb-5"
      style="background-color: #e0c3fc; padding: 20px"
    >
      <h3 class="text-center">TITLE PROJECT: {{ data.Title_Project }}</h3>
      <div class="d-flex justify-content-around mt-4">
        <div class="col-5.5">
          <div>
            <iframe
              width="560"
              height="315"
              :src="data.Link_Video_Project"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <div class="col-1"></div>
        <div class="col-5.5">
          <div
            class="accordion accordion-flush"
            id="accordionFlushExample"
            style="width: 450px"
          >
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="data.id_projectfrom_taget"
                  aria-expanded="false"
                  aria-controls="flush-collapseOne"
                >
                  PROJECT FROM
                </button>
              </h2>
              <div
                :id="data.id_projectfrom"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <h4>{{ data.Project_From }}</h4>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="data.id_projecttypeprogramming_taget"
                  aria-expanded="false"
                  aria-controls="flush-collapseTwo"
                >
                  TYPE PROGRAMMING
                </button>
              </h2>
              <div
                :id="data.id_projecttypeprogramming"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <h6 class="text-uppercase">
                    {{ data.Type_Programming_project }}
                  </h6>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="data.id_projectlink_taget"
                  aria-expanded="false"
                  aria-controls="flush-collapseThree"
                >
                  LINK PROJECT
                </button>
              </h2>
              <div
                :id="data.id_projectlink"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <a :href="data.Link_File_Project">{{
                    data.Link_File_Project
                  }}</a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="data.id_projectfeedback_taget"
                  aria-expanded="false"
                  aria-controls="flush-collapseFour"
                >
                  FEEDBACK
                </button>
              </h2>
              <div
                :id="data.id_projectfeedback"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <h5>{{ data.FeedbacK_project }}</h5>
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
      datacard: [],
    };
  },
  methods: {
    async fetchApi() {
      let data = [];
      await axios.get("/api/datastory").then((response) => {
        data = response.data;
        //console.log(datajson);
        this.datacard = response.data;
      });
    },
  },
  mounted() {
    this.fetchApi();
  },
};
</script>
