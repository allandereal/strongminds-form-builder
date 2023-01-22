<template>
    <div class="min-h-screen bg-white py-4 sm:pt-0">
        <Forms v-show="!showNewForm" :forms="forms" @create-form="toggleOpenForm()" @edit-form="editForm"/>
        <NewForm
            v-show="showNewForm"
            :form="activeForm"
            @show-all-forms="toggleOpenForm()"
            @form-field-deleted="updateForm"
            @form-created="updateForm"
            @form-field-option-added="addFormFieldOption"
            @field-option-deleted="updateForm"
        />
    </div>
</template>

<script>
import Forms from "./components/Forms.vue";
import NewForm from "./components/NewForm.vue";
import axios from "axios";

export default {
    name: "App",
    data(){
        return {
            showNewForm: false,
            forms: [],
            activeForm: {
                id: null,
                name: '',
                description: '',
                created_at: '',
                formFields: []
            },
        }
    },
    methods: {
        toggleOpenForm(){
            this.showNewForm = !this.showNewForm
        },
        editForm(form){
            this.activeForm = form
            this.showNewForm = true;

        },
        updateForm(form){
            this.activeForm = form
            this.forms.push(form)
        },
        fetchForms(){
            axios.get('api/forms')
                .then((response) => {
                    return this.forms = response.data.data
                })
                .catch((error) => {
                    console.log(error)
                    return []
                })
        },
        addFormFieldOption(form, formField){
            axios.post('api/field-options', {form_field_id: formField.id})
                .then((response) => {
                    this.fetchForms()
                    this.forms.map((f) => {
                        if (f.id === form.id){
                            this.activeForm = f
                        }
                    })
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.forms = this.fetchForms();
    },
    components: {
        Forms,
        NewForm,
    }
}
</script>

<style scoped>

</style>
