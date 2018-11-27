import {
    shallowMount
} from '@vue/test-utils'

import SizeSelectorComponent from './../components/SizeSelectorComponent'
import {
    wrap
} from 'module';

describe('SizeSelectorComponent.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallowMount(SizeSelectorComponent, {
            propsData: {
                sizes: [
                    'm',
                    'l',
                    's'
                ]
            }
        })
    })


    it('is a Vue instance', () => {
        const wrapper = shallowMount(SizeSelectorComponent)
        expect(wrapper.isVueInstance()).toBeTruthy()
    })

    it('renders sizes correctly', () => {
        let length = wrapper.findAll('button').length;
        expect(length).toEqual(3);
    })

    it('can select a sizes', () => {
        let button = wrapper.find('button');

        expect(button.text()).toBe('m');

        button.trigger('click');

        expect(wrapper.vm.$data.selectedSize).toBe('m');
    })

    it('can unselect a sizes', () => {
        let button = wrapper.find('button');

        expect(button.text()).toBe('m');

        button.trigger('click');
        button.trigger('click');

        expect(wrapper.vm.$data.selectedSize).toBe(null);
    })

    it('can switch a sizes', () => {
        let buttons = wrapper.findAll('button');

        buttons.at[1].trigger('click');
        expect(wrapper.vm.$data.selectedSize).toBe('m');

        buttons.at[2].trigger('click');
        expect(wrapper.vm.$data.selectedSize).toBe('l');
    })
    it('only shows sizes that are associated with selected color', () => {

    })
})
