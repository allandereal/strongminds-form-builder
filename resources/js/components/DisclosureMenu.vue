<template>
    <div>
        <div class="flex items-center justify-between space-x-2" v-for="formField in form.formFields">
            <div class="w-full">
            <Disclosure v-slot="{ open }">
                <DisclosureButton
                    class="flex w-full justify-between rounded-lg bg-purple-100 mt-4 px-4 py-2 text-left text-sm font-medium text-purple-900 hover:bg-purple-200 focus:outline-none focus-visible:ring focus-visible:ring-purple-500 focus-visible:ring-opacity-75"
                >
                <span class="flex items-center justify-between space-x-4">
                    <span>{{ formField.name || 'unnamed!'}}</span>
                    <span class="text-xs bg-purple-500 text-purple-200 px-2 rounded-xl">{{ formField.field.name }}</span>
                </span>
                    <ChevronUpIcon
                        :class="open ? 'rotate-180 transform' : ''"
                        class="h-5 w-5 text-purple-500"
                    />
                </DisclosureButton>
                <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                    <form>
                        <label>Name</label>
                        <input @change="updateFormFieldName(formField)" class="border rounded-lg p-2 " v-model="formField.name">
                    </form>
                </DisclosurePanel>
            </Disclosure></div>
            <button @click="deleteFormField(formField)">
                <TrashIcon class="w-4 h-4 text-red-400 font-light text-sm" />
            </button>
        </div>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon} from '@heroicons/vue/20/solid'
import { TrashIcon } from '@heroicons/vue/24/outline'
import axios from "axios";

export default {
    name: "DisclosureMenu",
    props: ['form'],
    data() {
        return {}
    },

    methods: {
        updateFormFieldName(formField){
            axios.put('api/form-fields/' + formField.id, formField)
                .then()
                .catch()
        },
        deleteFormField(formField){
            axios.delete('api/form-fields/' + formField.id, formField)
                .then((response) => {
                    this.$parent.$emit('form-field-deleted', response.data.data)
                })
                .catch()
        }
    },
    components: {
        Disclosure, DisclosureButton, DisclosurePanel, ChevronUpIcon, TrashIcon
    }
}
</script>

<style scoped>

</style>
