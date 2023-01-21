<template>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col items-start gap-4">
            <h3 class="text-gray-700 font-semibold text-xl">My Forms</h3>
            <button @click.prevent="this.$emit('open-form')" class="flex items-center justify-between gap-2 text-white rounded-sm py-1 px-2 bg-gray-900">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="font-sm">Create form</span>
            </button>
            <div class="border-b border-slate-300 w-full"></div>
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created at</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="form in forms" :key="form.id">
                    <td class="px-3 py-4 text-sm text-gray-500">{{ form.name}}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">{{ form.description}}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">{{ form.created_at}}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">
                        <a @click.prevent="this.$emit('open-form')" class="text-indigo-500" :href="'api/forms/'+ form.id">view</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Forms",
    data(){
        return {
            forms: []
        }
    },
    mounted() {
        axios.get('api/forms')
            .then((response) => {
                this.forms = response.data.data
            })
            .catch((error) => {
                console.log(error)
            })
    },
}
</script>

<style scoped>

</style>
