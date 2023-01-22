<template>
    <div class="flex flex-col space-y-2">
        <label>{{ label }} <span v-if="required" class="font-semibold text-red-600">*</span></label>
        <div class="flex items-center justify-start space-x-2" v-for="fieldOption in formField.fieldOptions">
            <input :name="formField.id+'_radio_'" type="radio" />
            <span>{{ fieldOption.value }}</span>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Radio',
    props: ['label', 'formField','required'],
}
</script>
