<template>
<div>
    <p class="mb-2 text-grey-darker">Select Your size</p>

    <div class="flex">   
      <p v-show="availableSizes.length == 0" class="text-black text-sm">Please select a color</p>  
      <button v-for="size in availableSizes"
              :key="size"
              class=" mr-4 p-4 w-16 rounded uppercase" 
              :class="[selectedSize === size ? 'bg-blue text-white' : 'bg-white text-black']" 
              @click="selectSize(size)"
      >{{size}}</button>

    </div>
</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  props: {
    product: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedSize: null
    };
  },

  computed: {
    ...mapGetters("product", ["selectedColor"]),

    availableSizes() {
      let inventory = this.product.inventory.filter(product => {
        return product.color === this.selectedColor;
      });

      return Object.keys(_.groupBy(inventory, "size"));
    }
  },
  watch: {
    selectedColor() {
      this.selectedSize = null;
    }
  },
  methods: {
    ...mapActions("product", ["selectProduct"]),
    selectSize(size) {
      if (size === this.selectedSize) {
        this.selectProduct(null);
        return (this.selectedSize = null);
      }
      this.selectProduct(this.product);
      return (this.selectedSize = size);
    }
  }
};
</script>

