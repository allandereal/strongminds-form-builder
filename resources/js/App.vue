<template>
    <div class="min-h-screen bg-white py-4 sm:pt-0">
        <Forms v-show="!showNewForm" @open-form="toggleOpenForm()"/>
        <NewForm v-show="showNewForm" @show-all-forms="toggleOpenForm()"/>
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
        }
    },
    methods: {
        toggleOpenForm(){
            this.showNewForm = !this.showNewForm
        },
    },
    components: {
        Forms,
        NewForm,
    }
}
</script>

<style scoped>

</style>
