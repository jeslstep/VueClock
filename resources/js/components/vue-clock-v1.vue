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
        this.now = new Date
        setInterval(() => this.now = new Date, 1000)
    },
    methods: {
        cssTransformHands: function(degrees){
            return { transform: `rotate(${degrees}deg)`};
        }
    },
    computed: {
        secondHandDegrees(){
            this.second = this.now.getSeconds();
            return ((this.second / 60) * 360) + 90;
        },
        minuteHandDegrees(){
            this.minute = this.now.getMinutes();
            return ((this.minute / 60) * 360) + ((this.second / 60) * 6) + 90;
        },
        hourHandDegrees(){
            this.hour = this.now.getHours();
            return ((this.hour / 12) * 360) + ((this.minute / 60) * 30) + 90;
        }
    }
}
</script>

