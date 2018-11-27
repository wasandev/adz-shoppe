<template>
   <button class="px-6 py-4 rounded bg-orange text-white hover:bg-orange-dark transition" @click="addToCart" >Add To cart</button>
    
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data: function() {
    return {};
  },
  computed: {
    ...mapGetters("product", ["selectedProduct"])
  },
  methods: {
    ...mapActions("cart", ["addItem"]),
    addToCart() {
      this.addItem(this.selectedProduct);
    }
  }
};
</script>
