import {
    shallowMount
} from '@vue/test-utils'

import ColorSelectorComponent from './../components/ColorSelectorComponent'

describe('ColorSelectorComponent.vue', () => {

    let wrapper;

    beforeEach(() => {
        wrapper = shallowMount(ColorSelectorComponent, {
            propsData: {
                colors: [
                    'red',
                    'blue'
                ]
            }
        })
    })

    it('is a Vue instance', () => {
        const wrapper = shallowMount(ColorSelectorComponent)
        expect(wrapper.isVueInstance()).toBeTruthy()
    })

    it('renders colors correctly', () => {
        let length = wrapper.findAll('button').length;
        expect(length).toEqual(2);
    })

    it('can select a colors', () => {
        let button = wrapper.find('button');

        expect(button.text()).toBe('red');

        button.trigger('click');

        expect(wrapper.vm.$data.selectedColor).toBe('red');
    })
    it('can unselect a colors', () => {
        let button = wrapper.find('button');

        expect(button.text()).toBe('red');

        button.trigger('click');
        button.trigger('click');

        expect(wrapper.vm.$data.selectedColor).toBe(null);
    })
    it('can switch a colors', () => {
        let buttons = wrapper.findAll('button');

        buttons.at[0].trigger('click');
        expect(wrapper.vm.$data.selectedColor).toBe('red');

        buttons.at[1].trigger('click');
        expect(wrapper.vm.$data.selectedColor).toBe('blue');
    })
})
