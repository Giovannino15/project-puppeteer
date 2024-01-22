<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import axios from "axios";

const form = useForm({
    email: '',
    password: '',
    password_confirmation: '',
    first_name: '',
    last_name: '',
    company: '',
    phone_number: '',
    security_question: '',
});


const submit = () => {
    form.post(route('bill_store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};

async function download() {
    try {
        let response = await axios({
            url: '/download',
            method: 'GET',
            responseType: 'blob',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const url = window.URL.createObjectURL(new Blob([response.data], { type: 'application/pdf' }));
        window.open(url);
    } catch (error) {
        console.log(error);
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Creando Factura</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white mx-auto overflow-hidden shadow-sm sm:rounded-lg px-8 py-14">
                    <form @submit.prevent="submit">
                        <!-- email -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="email" value="E-mail" />
                            <TextInput id="email_bill" type="text" class="mt-1 block w-full" v-model="form.email" required
                                autofocus />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <!-- end email -->

                        <!-- password -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="password" value="Clave" />

                            <TextInput id="password_bill" type="password" class="mt-1 block w-full" v-model="form.password"
                                required  />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <!-- end password -->

                        <!-- password_confirmation -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="password_confirmation" value="Confirmación de Clave" />

                            <TextInput id="password_confirmation_bill" type="password" class="mt-1 block w-full"
                                v-model="form.password_confirmation" required  />

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                        <!-- end password_confirmation -->

                        <!-- first_name -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="first_name" value="Primer nombre" />

                            <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name"
                                required />

                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>
                        <!-- end first_name -->

                        <!-- last_name -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="last_name" value="Apellido" />

                            <TextInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name"
                                required />

                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                        <!-- end last_name -->

                        <!-- company -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="company" value="Empresa (Opcional)" />

                            <TextInput id="company" type="text" class="mt-1 block w-full" v-model="form.company"
                                 />

                            <InputError class="mt-2" :message="form.errors.company" />
                        </div>
                        <!-- end company -->

                        <!-- phone_number -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="phone_number" value="Teléfono"  />

                            <TextInput id="phone_number" type="tel" class="mt-1 block w-full" v-model="form.phone_number"
                                required  />

                            <InputError class="mt-2" :message="form.errors.phone_number" />
                        </div>
                        <!-- end phone_number -->

                        <!-- security_questionurity -->
                        <div class="w-[77%] mb-4">
                            <InputLabel for="security_question" value="Pregunta de Seguridad" />

                            <div>
                                <select id="security_question" v-model="form.security_question"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled selected>¿Cuál es el apellido de su mejor amigo del colegio?
                                    </option>
                                    <option id="pepito">
                                        Pepito
                                    </option>
                                    <option id="juanito">
                                        Juanito
                                    </option>
                                    <option id="pablito">
                                        Pablito
                                    </option>
                                    <option id="pedrito">
                                        Pedrito
                                    </option>
                                </select>
                            </div>

                            <InputError class="mt-2" :message="form.errors.security_question" />
                        </div>
                        <!-- end security_questionurity -->
                        <PrimaryButton class="mr-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            id="process_bill">
                            Cargar Factura
                        </PrimaryButton>
                        <PrimaryButton @click="download" id="download_bill">
                            Descargar PDF
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
