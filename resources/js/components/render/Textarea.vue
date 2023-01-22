<template>
    <div class="flex flex-col space-y-2">
        <label>{{ label }} <span v-if="isRequired()" class="font-semibold text-red-600">*</span></label>
        <textarea class="rounded border border-gray-300"></textarea>
    </div>
</template>
<script>
export default {
    name: 'Textarea',
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
