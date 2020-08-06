var vm = new Vue({
  el: "#app",

  data: {
    num1: 0,
    num2: 0,
    espacio_blanco: /^[0-9]/,
  },

  computed: {
    validateNum: function () {
      if (
        this.espacio_blanco.test(this.num1) &&
        this.espacio_blanco.test(this.num2)
      ) {
        return false;
      } else {
        return true;
      }
    },
  },

  methods: {
    clicked() {
      $.request("onTest", {
        update: { mypartial: "#myDiv" },
        data: {value1: this.num1, value2: this.num2}
      });
    },
  },
});


// <div id="app">
// <!-- AJAX enabled form -->
// <form>

//   <!-- Input two values -->
//   <input name="value1" v-model="num1" type="number"> +
//   <input name="value2" v-model="num2" type="number">

//   <!-- Action button -->

// </form>

// <!-- Result container -->
// <div id="myDiv"></div>
// <button @click="clicked" >click me</button>

// </div>