<template>
    <div class="min-h-screen bg-white py-4 sm:pt-0">
        <Forms v-show="!showNewForm" @create-form="toggleOpenForm()" @edit-form="editForm"/>
        <NewForm v-show="showNewForm" :form="activeForm" @show-all-forms="toggleOpenForm()"/>
    </div>
</template>

<script>
import Forms from "./components/Forms.vue";
import NewForm from "./components/NewForm.vue";

export default {
    name: "App",
    data(){
        return {
            showNewForm: false,
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

        }
    },
    components: {
        Forms,
        NewForm,
    }
}
</script>

<style scoped>

</style>
