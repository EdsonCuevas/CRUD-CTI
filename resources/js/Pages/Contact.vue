<template>
    <Header/>
    <div class="min-h-screen bg-[#0000000] flex items-center justify-center p-6">
      <div class="w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="p-8">
          <h1 class="text-4xl font-bold text-[#072146] mb-2">Contact us</h1>
          <p class="text-[#97999B] mb-6">Please fill out this form in a decent manner.</p>
          
          <form @submit.prevent="submitForm" class="space-y-6">
  <div>
    <h3 class="text-lg font-semibold text-[#072146] mb-2">Full Name</h3>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <input v-model="form.firstName" type="text" placeholder="Name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-[#1973B8]">
        <div v-if="form.errors.firstName" class="text-red-500 text-sm">{{ form.errors.firstName }}</div>
      </div>
      <div>
        <input v-model="form.lastName" type="text" placeholder="Last name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-[#1973B8]">
        <div v-if="form.errors.lastName" class="text-red-500 text-sm">{{ form.errors.lastName }}</div>
      </div>
    </div>
  </div>

  <div>
    <h3 class="text-lg font-semibold text-[#072146] mb-2">E-mail</h3>
    <input v-model="form.email" type="email" placeholder="correo@correo.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-[#1973B8]">
    <div v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</div>
  </div>

  <div>
    <h3 class="text-lg font-semibold text-[#072146] mb-2">Message</h3>
    <textarea v-model="form.message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-[#1973B8]"></textarea>
    <div v-if="form.errors.message" class="text-red-500 text-sm">{{ form.errors.message }}</div>
  </div>

  <button type="submit" class="w-full bg-[#1973B8] text-white py-2 px-4 rounded-md hover:bg-[#1464A5] transition duration-300 ease-in-out">
    Send
  </button>
</form>

        </div>
      </div>
    </div>
    <Footer/>
  </template>
  
<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const form = useForm({
  firstName: '',
  lastName: '',
  email: '',
  message: '',
});

const submitForm = () => {
  form.post(route('contact.submit'), {
    onSuccess: () => {
      Swal.fire({
            title: 'Form submitted!',
            text: 'Your information has been sent successfully!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
          });
      form.reset(); // Limpia el formulario
    },
    onError: (errors) => {
      console.log(errors); // Manejar errores de validación
    },
  });
};


</script>