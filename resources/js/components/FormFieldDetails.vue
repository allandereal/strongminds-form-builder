<template>
    <div>
        <div class="flex items-start justify-between space-x-2" v-for="formField in form.formFields">
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
                    <form class="flex items-center justify-start space-x-2">
                        <label>Name</label>
                        <input @change="updateFormFieldName(formField)" class="border rounded-lg p-2 " v-model="formField.name">
                    </form>
                    <div v-if="fieldHasOptions(formField.field)">
                        <h4 class="py-4 font-semibold text-gray-700">Options</h4>
                        <ul>
                            <li class="rounded py-1 px-2 hover:bg-gray-300" v-for="fieldOption in formField.fieldOptions">
                                <div class="flex justify-between">
                                    <input @change="updateFieldOption(fieldOption)" class="px-2 rounded" v-model="fieldOption.value" />
                                    <button @click="deleteFieldOption(fieldOption)" class="rounded-full p-1 bg-red-200 flex items-center justify-center">
                                        <XMarkIcon class="w-3 h-3 text-red-600"/>
                                    </button>
                                </div>
                            </li>
                            <li class="px-2">
                                <button @click="this.$parent.$emit('form-field-option-added', form, formField)" class="text-indigo-600">add option</button>
                            </li>
                        </ul>
                    </div>
                    <div v-if="formField.field.name === 'Calculated'" class="w-full p-2 mt-4 rounded border border-gray-200 bg-gray-100">
                        <h4 class="py-2 font-semibold text-gray-700">Calculation</h4>
                        <form class="flex flex-col items-start justify-start space-y-2" @submit.prevent="calculateField(formField)" >
                            <div class="flex items-center justify-between space-x-2 w-full">
                                <div>First Field</div>
                                <select class="rounded h-8 py-1 border-gray-300" v-model="calcDetails.firstField" required>
                                    <option :value="innerFormField.id" v-for="innerFormField in form.formFields">{{ innerFormField.name }}</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between space-x-2 w-full">
                                <div>operator</div>
                                <select class="rounded h-8 py-1 border-gray-300"  v-model="calcDetails.operator" required>
                                    <option :value="op" v-for="op in operators">{{ op}}</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-between space-x-2 w-full">
                                <div>Second Field</div>
                                <select class="rounded h-8 py-1 border-gray-300" v-model="calcDetails.secondField" required>
                                    <option :value="innerFormField2.id" v-for="innerFormField2 in form.formFields">{{ innerFormField2.name }}</option>
                                </select>
                            </div>
                            <button class="py-1 px-2 text-white bg-indigo-600 rounded" type="submit">save</button>
                        </form>
                    </div>
                    <div>
                        <h4 class="py-4 font-semibold text-gray-700">Validation</h4>
                        <div class="flex items-center justify-between">
                            <span>Required?</span>
                            <SwitchButton :formField="formField"/>
                        </div>
                    </div>
                </DisclosurePanel>
            </Disclosure></div>
            <button class="mt-6" @click="deleteFormField(formField)">
                <TrashIcon class="w-4 h-4 text-red-400 font-light text-sm" />
            </button>
        </div>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon, XMarkIcon} from '@heroicons/vue/20/solid'
import { TrashIcon } from '@heroicons/vue/24/outline'
import axios from "axios";
import SwitchButton from "./SwitchButton.vue";

export default {
    name: "FormFieldDetails",
    props: ['form'],
    data() {
        return {
            calcDetails: {
                firstField: null,
                operator: null,
                secondField: null,
            },
            operators: ['+', '-', '*', '/'],
        }
    },

    methods: {
        updateFormFieldName(formField){
            axios.put('api/form-fields/' + formField.id, formField)
                .then()
                .catch()
        },
        deleteFormField(formField){
            axios.delete('api/form-fields/' + formField.id)
                .then((response) => {
                    this.$parent.$emit('form-field-deleted', response.data.data)
                })
                .catch()
        },
        updateFieldOption(fieldOption){
            axios.put('api/field-options/' + fieldOption.id, fieldOption)
                .then((response) => {

                })
                .catch((error) => {
                    console.log(error)
                })
        },
        deleteFieldOption(formField){
            axios.delete('api/field-options/' + formField.id)
                .then((response) => {
                    this.$parent.$emit('field-option-deleted', response.data.data)
                })
                .catch((error)=>{
                    console.log(error)
                })
        },
        fieldHasOptions(field){
            return ['input:checkbox', 'input:radio'].includes(field.html_tag);
        },
        calculateField(formField){
            let calcField = {
                'form_field_id': formField.id,
                'first_form_field_id': this.calcDetails.firstField,
                'operator': this.calcDetails.operator,
                'second_form_field_id': this.calcDetails.secondField,
            }
            console.log(calcField);
            axios.post('api/field-calculations', calcField)
            .then()
            .catch((error) => console.log(error))
        }
    },
    components: {
        SwitchButton,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ChevronUpIcon,
        TrashIcon,
        XMarkIcon
    }
}
</script>

<style scoped>

</style>
