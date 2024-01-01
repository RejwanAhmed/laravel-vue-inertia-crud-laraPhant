<script setup>
import {
    router,
    Link
} from '@inertiajs/vue3';
defineProps({
    customers: Array
});

function destroy(id) {
    router.delete('/customers/' + id);
}

function edit(id) {
    router.get('/customers/' + id + '/edit');
}
</script>

<template>
<br><br>
<div class="card col-8 offset-2">
    <div>
        <Link class="btn btn-primary mb-3 mt-1" :href="route('customer.create')">Create</Link>
    </div>
    <div v-if="$page.props.flash.message" class = "alert alert-success">
        {{ $page.props.flash.message }}
    </div>
    <table class="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in customers" :key="customer">
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.phone }}</td>
                <td>
                    <button @click.prevent="edit(customer.id)" class="btn btn-outline-primary">Edit</button>
                    <button @click.prevent="destroy(customer.id)" class="btn btn-outline-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>
