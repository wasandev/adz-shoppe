const state = {
    selectedColor: null,
    selectedProduct: null,
};

const getters = {
    selectedColor(state) {
        return state.selectedColor;
    },
    selectedProduct(state) {
        return state.selectedProduct;
    }

};
const mutations = {

    SELECT_COLOR(state, color) {
        if (color === state.selectedColor) {
            return (state.selectedColor = null);
        }
        return (state.selectedColor = color);
    },
    SELECT_PRODUCT(state, product) {
        if (product === state.selectedColor) {
            return (state.selectedProduct = null);
        }
        return (state.selectedProduct = product);
    }
};

const actions = {
    selectColor({
        commit
    }, color) {
        commit('SELECT_COLOR', color);
    },
    selectProduct({
        commit
    }, product) {
        commit('SELECT_PRODUCT', product);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
}
