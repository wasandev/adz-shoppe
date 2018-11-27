import {
    shallowMount
} from '@vue/test-utils'
import ExampleComponent from './../components/ExampleComponent'

describe('ExampleComponent.vue', () => {
    it('is a Vue instance', () => {
        const wrapper = shallowMount(ExampleComponent)
        expect(wrapper.isVueInstance()).toBeTruthy()
    })
})
