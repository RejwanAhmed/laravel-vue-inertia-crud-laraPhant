<script setup>
    // The following two are packages.
    import { useForm } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';

    // To get errors
    defineProps({
        errors: Object
    });

    const form = useForm({
        name: null,
        email: null,
        phone: null,
    });

    function submit(){
        router.post('/customers', form)
    }
</script>

<template>
<div class="card col-6 offset-3">
    <div class="card-header">
        Add Customer
    </div>
    <div class="card-body">
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="form.name">
                <div class = "text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" v-model="form.email">
                <div class = "text-danger text-xs" v-if="errors.email">{{ errors.email }}</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" v-model="form.phone">
                <div class = "text-danger text-xs" v-if="errors.phone">{{ errors.phone }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</template>
