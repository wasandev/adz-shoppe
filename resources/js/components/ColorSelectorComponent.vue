<template>
  <div>
      <p class="mb-2 text-grey-darker">Select Your color</p>

      <div class="flex">    
        <button v-for="color in colors"
                :key="color"
                class=" mr-4 p-4 w-16 rounded uppercase" 
                :class="[selectedColor === color ? 'bg-blue text-white' : 'bg-white text-black']" 
                @click="selectColor(color)"
        >{{color}}</button>

      </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: {
    colors: {
      type: Array,
      required: true
    }
  },
  computed: {
    ...mapGetters("product", ["selectedColor"])
  },
  methods: {
    ...mapActions("product", ["selectColor"])
  }
};
</script>



