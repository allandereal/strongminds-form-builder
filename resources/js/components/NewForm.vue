<template>
    <div class="w-full py-2 flex flex-col">
        <div class="flex items-center justify-between px-4 border-b border-slate-300 w-full pb-2">
            <h3 class="font-semibold">Strongminds form builder</h3>
            <a href="/" @click.prevent="this.$emit('show-all-forms')" class="text-indigo-600">view all forms</a>
        </div>
        <div class="flex items-start justify-between h-screen w-full">
            <div class="w-2/6 py-4 px-4 h-screen">
                <div class="flex justify-between items-center" v-show="form.id !== null">
                    <div class="font-semibold">{{ form.name}}</div>
                    <SelectFieldMenu :fields="fields" @field-selected="fieldSelected"/>
                </div>
                <form @submit.prevent="saveForm" class="space-y-4" v-show="form.id === null">
                    <span>Create new form</span>
                    <div>
                        <label>Name</label>
                        <input class="w-full rounded" type="text" v-model="form.name" required>
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea class="w-full rounded" v-model="form.description"></textarea>
                    </div>
                    <button type="submit" class="rounded py-1 px-2 text-white bg-indigo-600">save</button>
                </form>
                <div class="mt-4 space-y-4">
                    <span class="py-1 px-4 rounded bg-gray-300 text-sm">Form fields</span>
                    <FormFieldDetails :form="form"/>
                </div>
            </div>
            <div class="w-4/6 p-4 h-screen border-l border-gray-300 bg-gray-200 overflow-auto">
                <div class="w-full p-4 bg-white rounded overflow-auto">
                    <h3 class="font-semibold text-lg ">Rendered form</h3>
                    <form :name="form.name.replace(/\W+/g, '-')"
                          class="flex flex-col space-y-4 mt-4"
                    >
                        <div v-for="formField in form.formFields">
                            <component
                                :is="fieldToRender(formField.field.html_tag)"
                                :label="formField.name"
                                :formField="formField"
                                :required="fieldIsRequired(formField)"
                            />
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <a class="ml-2 text-indigo-600" :href="'export-forms/'+form.id+'?file_type=csv'">export form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import SelectFieldMenu from "./SelectFieldMenu.vue";
import FormFieldDetails from "./FormFieldDetails.vue";
import Input from "./render/Input.vue";
import Radio from "./render/Radio.vue";
import Checkbox from "./render/Checkbox.vue";
import Textarea from "./render/Textarea.vue";

export default {
    name: "Forms",
    props: ['form'],
    components: {FormFieldDetails, SelectFieldMenu, Input, Radio, Checkbox, Textarea},
    data(){
        return {
            fields: [],
            selectedField: null,
            selectedFormField: null,
        }
    },
    methods: {
        saveForm(){
            axios.post('api/forms', this.form)
                .then((response) => {
                    this.$emit('form-created', response.data.data)
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        fieldSelected(field){
            this.selectedField = field;
            axios.post('api/form-fields', {name: 'unnamed!', form_id: this.form.id, field_id: field.id })
                .then((response) => {
                    this.form.formFields.push(response.data.data);
                    this.selectedFormField = response.data.data;
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        fieldToRender(html_tag){
            return {
                'input': Input,
                'input:number': Input,
                'input:date': Input,
                'textarea': Textarea,
                'input:radio': Radio,
                'input:checkbox': Checkbox,
            }[html_tag];
        },
        fieldIsRequired(formField){
            let required = false;
            formField.fieldValidations.map((v) => {
                if (v.value === 'required'){
                    required = true;
                }
            })

            return required;
        }
    },
    mounted() {
        axios.get('api/fields')
            .then((response) => {
                this.fields = response.data.data
            })
            .catch((error) => {
                console.log(error)
            })
    },
}
</script>

<style scoped>

</style>
