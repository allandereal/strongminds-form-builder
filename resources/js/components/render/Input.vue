<template>
    <div class="flex flex-col space-y-2">
        <label>{{ label }} <span v-if="isRequired()" class="font-semibold text-red-600">*</span></label>
        <input :type="getType()" class="rounded border border-gray-300 h-10"/>
    </div>
</template>
<script>
export default {
    name: 'Input',
    props: ['label', 'formField'],
    data(){
        return {}
    },
    methods: {
        isRequired(){
            return false;
        },
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
