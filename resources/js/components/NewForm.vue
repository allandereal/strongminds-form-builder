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
            <div class="w-4/6 p-4 h-screen border-l border-gray-300 bg-gray-200">
                <div class="w-full p-4 bg-white rounded">
                    <div>
                        Rendered form
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

export default {
    name: "Forms",
    props: ['form'],
    components: {FormFieldDetails, SelectFieldMenu},
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
