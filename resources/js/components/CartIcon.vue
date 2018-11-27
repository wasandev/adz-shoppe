<template>
  <a href="/cart" class="text-grey-darker hover:text-black no-underline text-lg">
    <font-awesome-layers full-width>
      <font-awesome-icon icon="shopping-cart"/>
      <font-awesome-layers-text class="fa-layers-counter bg-red text-white" transform="down-2 shrink-8" :value="items.length" />
    </font-awesome-layers>
    
    
  </a>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data: function() {
    return {
      //cartCount: 4
    };
  },
  computed: {
    ...mapGetters("cart", ["items"])
  }
};
</script>
