<template>
    <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" @submit="handleSubmit">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
                <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
                <div class="mt-2.5">
                    <input type="text" v-model="firstName" name="first_name" id="first-name" autocomplete="given-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
            </div>
            <div>
                <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
                <div class="mt-2.5">
                    <input type="text" v-model="lastName" name="last_name" id="last-name" autocomplete="family-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                <div class="mt-2.5">
                    <input type="email" v-model="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Department</label>
                <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                    <select :disabled="isLoading" :class="{'opacity-50 cursor-not-allowed': isLoading}" id="department" v-model="department" name="department" class="cursor-pointer col-start-1 row-start-1 w-full appearance-none rounded-md outline-1 -outline-offset-1 outline-gray-300 py-2 pr-7 pl-3.5 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option v-for="department in departments" :key="department.id" :value="department.id">
                            {{ department.name }}
                        </option>
                    </select>
                    <ChevronDownIcon class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" aria-hidden="true" />
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
                <div class="mt-2.5">
                    <textarea name="message" v-model="message" id="message" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
            </div>
            <SwitchGroup as="div" class="flex gap-x-4 sm:col-span-2">
                <div class="flex h-6 items-center">
                    <Switch v-model="agreed" :class="[agreed ? 'bg-indigo-600' : 'bg-gray-200', 'flex w-8 flex-none cursor-pointer rounded-full p-px ring-1 ring-gray-900/5 transition-colors duration-200 ease-in-out ring-inset focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']">
                        <span class="sr-only">Agree to policies</span>
                        <span aria-hidden="true" :class="[agreed ? 'translate-x-3.5' : 'translate-x-0', 'size-4 transform rounded-full bg-white shadow-xs ring-1 ring-gray-900/5 transition duration-200 ease-in-out']" />
                    </Switch>
                </div>
                <SwitchLabel class="text-sm/6 text-gray-600">
                    By selecting this, you agree to our
                    <a href="#" class="font-semibold text-indigo-600">privacy&nbsp;policy</a>.
                </SwitchLabel>
            </SwitchGroup>
        </div>
        <div class="mt-10">
            <button
                type="submit"
                :disabled="canSubmit"
                class="disabled:opacity-50 disabled:cursor-not-allowed block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >{{ ctaText }}</button>
        </div>
    </form>
</template>

<script setup>
import { ref, onMounted, defineEmits, computed } from 'vue';
import axios from 'axios';
import { ChevronDownIcon } from '@heroicons/vue/16/solid';
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue';
const agreed = ref(false);
const firstName = ref('');
const lastName = ref('');
const email = ref('');
const department = ref('');
const message = ref('');
const departments = ref([]);
const isLoading = ref(false);

const canSubmit = computed(() => {
    return firstName.value && lastName.value && email.value && department.value && message.value && !agreed.value;
});

const ctaText = computed(() => {
    return isLoading.value ? 'Submitting...' : 'Submit';
});

const emit = defineEmits(['success', 'error']);

const loadDepartments = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get(`/api/departments`);
        departments.value = response.data;
        department.value = departments.value[0]?.id || '';
    } catch (error) {
        console.error('Error loading plans:', error);
    } finally {
        isLoading.value = false;
    }
};

const handleSubmit = async (event) => {
    event.preventDefault();
    const formData = {
        first_name: firstName.value,
        last_name: lastName.value,
        email: email.value,
        department: department.value,
        message: message.value,
    };

    // TODO: Add the API call to the backend
    console.log('Submitting form:', formData);
    emit('success', formData);
};

onMounted(() => {
    loadDepartments();
});
</script>
