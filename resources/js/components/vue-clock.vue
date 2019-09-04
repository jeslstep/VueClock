<template class="app">
  <div class="hours">
    <div class="clock">
      <div class="clock-face">
        <div class="hand hour-hand" :style="cssTransformHands(hourHandDegrees)"></div>
        <div class="hand min-hand" :style="cssTransformHands(minuteHandDegrees)"></div>
        <div class="hand second-hand" :style="cssTransformHands(secondHandDegrees)"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data: function () {
            return {
                now: null,
                second: null,
                minute: null,
                hour: null,
            }
    },
    created: function(){
      this.setDate();
    },
    mounted: function() {
        console.log('method gives access to templates and enables interaction with the DOM.')
        setInterval(this.setDate, 1000);
    },
    methods: {
        setDate: function () {
            this.now = new Date();
            this.second = this.now.getSeconds();
            this.minute = this.now.getMinutes();
            this.hour = this.now.getHours();
        },
        cssTransformHands: function(degrees){
            return { transform: `rotate(${degrees}deg)`};
        }
    },
    computed: {
          secondHandDegrees(){
              return ((this.second / 60) * 360) + 90;
          },
          minuteHandDegrees(){
              return ((this.minute / 60) * 360) + ((this.second / 60) * 6) + 90;
          },
          hourHandDegrees(){
              return ((this.hour / 12) * 360) + ((this.minute / 60) * 30) + 90;
          }
    }
}
</script>

<style>

    html {
        background: url('../../images/radial-gradient.png');
        background-position: center;
        background-repeat:no-repeat;
        background-size: cover;
     
    }
    .clock {
      width: 30rem;
      height: 30rem;
      border: 20px solid rgba(0,0,0,0.7);
      border-radius: 50%;
      margin: 75px auto;
      position: relative;
      padding: 2rem;
      box-shadow:
        0 0 0 4px rgba(0,0,0,0.1),
        inset 0 0 0 3px #EFEFEF,
        inset 0 0 10px black,
        0 0 10px rgba(0,0,0,0.2);
      background: url('../../images/salvador-dali-the-persistence-of-memory.jpg');
      background-size: cover;
    }
    .clock-face {
      position: relative;
      width: 100%;
      height: 100%;
      transform: translateY(-3px); /* account for the height of the clock hands */
    }
    .hand {
      width: 50%;
      height: 6px;
      background: white;
      position: absolute;
      top: 50%;
      transform-origin: 100%;
      transform: rotate(90deg);
      transition: all 0.05s;
      transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
    }

</style>