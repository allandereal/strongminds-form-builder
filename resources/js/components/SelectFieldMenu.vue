<template>
    <div>
        <Menu as="div" class="relative inline-block text-left bg-indigo-500 rounded">
            <div>
                <MenuButton
                    class="inline-flex w-full justify-center rounded-md bg-black bg-opacity-20 px-2 py-1 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                >
                    <PlusIcon class="h-5 w-5 text-violet-200 hover:text-violet-100"/>
                </MenuButton>
            </div>

            <transition
                enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in"
                leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0"
            >
                <MenuItems
                    class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }" v-for="field in fields">
                            <button @click="this.$emit('field-selected', field)" :class="[ active ? 'bg-violet-500 text-white' : 'text-gray-900', 'group flex w-full items-center rounded-md px-2 py-2 text-sm',]"
                            >
                                {{ field.name }}
                            </button>
                        </MenuItem>
                    </div>

                </MenuItems>
            </transition>
        </Menu>
    </div>
</template>

<script>
import {Menu, MenuButton, MenuItems, MenuItem} from '@headlessui/vue'
import {ChevronDownIcon, PlusIcon} from '@heroicons/vue/20/solid'

export default {
    name: "SelectFieldMenu",
    props: ['fields'],

    components: {
        Menu, MenuButton, MenuItems, MenuItem, ChevronDownIcon, PlusIcon
    }
}


</script>
