<template>
    <div>
        <Switch
            v-model="enabled"
            :class="enabled ? 'bg-violet-500' : 'bg-gray-300'"
            class="relative inline-flex h-5 w-14 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        >
            <span
                aria-hidden="true"
                :class="enabled ? 'translate-x-9' : 'translate-x-0'"
                class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
            />
        </Switch>
    </div>
</template>

<script>
import {Switch} from "@headlessui/vue";
import axios from "axios";

export default {
    name: "SwitchButton",
    props: ['formField'],
    data(){
        return {
            enabled: false,
        }
    },
    watch: {
        enabled: function(update, old) {
            axios.post('api/field-validations/crud', {
                action: update === true ? 'create' : 'delete',
                value: 'required',
                form_field_id: this.formField.id
            }).then((response) => {

            }).catch((error) => {
                console.log(error)
            })
        },
    },
    mounted() {
        this.formField.fieldValidations.map((v)=>{
            if(v.value === 'required'){
                this.enabled = true;
            }
        })
    },
    components: {Switch}
}
</script>

<style scoped>

</style>
