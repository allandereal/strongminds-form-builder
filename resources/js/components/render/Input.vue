<template>
    <div class="flex flex-col space-y-2">
        <label>{{ label }} <span v-if="required" class="font-semibold text-red-600">*</span></label>
        <input :type="getType()" class="rounded border border-gray-300 h-10" :required="required" :disabled="formField.field.name === 'Calculated'"/>
    </div>
</template>
<script>
export default {
    name: 'Input',
    props: ['label', 'formField','required'],
    data(){
        return {}
    },
    methods: {
        getType(){
            let type = this.formField
                .field
                .html_tag
                .split(':')
                .pop();

            return type === 'input' ? 'text' : type;
        }
    }
}
</script>
