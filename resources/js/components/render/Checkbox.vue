<template>
    <div class="flex flex-col space-y-2">
        <label>{{ label }} <span v-if="isRequired()" class="font-semibold text-red-600">*</span></label>
        <div class="flex items-center justify-start space-x-2" v-for="fieldOption in formField.fieldOptions">
            <input :name="formField.id+'_check_'" type="checkbox" />
            <span>{{ fieldOption.value}}</span>
        </div>

    </div>
</template>
<script>
export default {
    name: 'Checkbox',
    props: ['label', 'formField'],
    data(){
        return {}
    },
    methods: {
        isRequired(){
            return false;
        }
    }
}
</script>
