const state = {
    items: [],
};

const getters = {
    items(state) {
        return state.items;
    }
};
const mutations = {

    ADD_ITEM(state, item) {

        return (state.items.push(item));
    }
};

const actions = {
    addItem({
        commit
    }, item) {
        commit('ADD_ITEM', item);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
}
