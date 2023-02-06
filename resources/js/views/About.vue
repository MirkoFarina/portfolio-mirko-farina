<script>
export default {
    name: 'About',
    data() {
    return {
      items: [
      { date: '1998', event: 'Nascita' },
      { date: '2017', event: 'Diploma all\'istituto superiore ....' },
      { date: '2024', event: 'Nascita' },
      { date: '2025', event: 'Nascita' },
      { date: '2026', event: 'Nascita' },
      { date: '2029', event: 'Nascita' },
      ],
      selectedEvent: ''
    };
  },
  methods: {
    showEvent(index) {
       this.selectedEvent = this.items[index].event;
     }
  }
};
//     data() {
//     return {
//       items: [
//         { date: '2022', event: 'Nascita' },
//         { date: '2021', event: 'Prima esperienza' },
//         { date: '2020', event: 'Evento 3' },
//       ],
//       selectedEvent: ''
//     }
//   },
//   methods: {
//     showEvent(index) {
//       this.selectedEvent = this.items[index].event;
//     }
//   }
// }
</script>



<template>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div id="timeline">
                        <div class="timeline-item" v-for="(item, index) in items" :key="index"  @click="showEvent(index)">
                            <div class="timeline-point"></div>
                            <div class="timeline-content">{{ item.date  }}</div>
                        </div>
                        <div class="timeline-connector"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-center text-lg-left h-100 ">
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <h3>
                            PREMI SULLE DATE E SCOPRI LA MIA STORIA !
                        </h3>
                    </div>
                    <div v-if="selectedEvent" class="selected-event">
                        {{ selectedEvent }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </template>




<style lang="scss" scoped>
@use '../../scss/partials/variables' as *;
.content {
    padding: 100px 0;
    background-color: $bg-user;
    height: 100vh;
    color: $secondary-color;
}

#timeline {
    display: flex;
    flex-direction: column;
    width: 20%;
    margin: 20px auto;
    position: relative;
    .timeline-item:last-of-type{
    margin: 0;
  }
  }

  .timeline-item {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    position: relative;
    cursor: pointer;
  }


  .timeline-point {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: gray;
    border: 2px solid white;
    position: absolute;
    left: -5px;
    top: 50%;
    transform: translateY(-50%);
  }

  .timeline-content {
    padding-left: 20px;
  }

  .timeline-connector {
    width: 2px;
    height: 100%;
    background-color: gray;
    position: absolute;
    left: -1px;
    top: 0;
  }

  .timeline-item + .timeline-item .timeline-connector {
    height: calc(50% - 5px);
    top: 50%;
  }

  .timeline-item + .timeline-item .timeline-point {
    margin-top: -5px;
  }
</style>
