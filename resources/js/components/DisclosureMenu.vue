<template>
    <div>
        <Disclosure v-slot="{ open }" v-for="formField in formFields">
            <DisclosureButton
                class="flex w-full justify-between rounded-lg bg-purple-100 mt-4 px-4 py-2 text-left text-sm font-medium text-purple-900 hover:bg-purple-200 focus:outline-none focus-visible:ring focus-visible:ring-purple-500 focus-visible:ring-opacity-75"
            >
                <span class="flex items-center justify-between space-x-4">
                    <span>{{ formField.name || 'unnamed!'}}</span>
                    <span class="text-xs bg-purple-500 text-purple-200 px-2 rounded-xl">{{ formField.field.name }}</span>
                </span>
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="h-5 w-5 text-purple-500"
                />
            </DisclosureButton>
            <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                <form>
                    <label>Name</label>
                    <input class="border rounded-lg p-2 " v-model="formField.name">
                </form>
            </DisclosurePanel>
        </Disclosure>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/vue/20/solid'
export default {
    name: "DisclosureMenu",
    props: ['formFields'],
    components: {
        Disclosure, DisclosureButton, DisclosurePanel, ChevronUpIcon
    }
}
</script>

<style scoped>

</style>
