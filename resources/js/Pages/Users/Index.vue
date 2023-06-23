<script>
import {defineComponent} from 'vue'
import {Head, Link} from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue";
export default defineComponent({
    props: {
        title: String,
        users: Array,
    },
    components: {
        Pagination,
        Head,
        Link,
    },
    methods: {
        destroy(id) {
            if (confirm('Удалить пользователя?')) {
                this.$inertia.delete(this.route('users.destroy', id))
            }
        }
    }
})
</script>

<template>
    <Head :title="title"/>
    <h1 class="text-center font-bold text-lg">{{ title }}</h1>

    <div class="flex flex-col gap-2">
        <Link :href="route('users.create')" class="btn self-end">Создать пользователя</Link>
        <table class="table" v-if="users.total > 0">
            <!-- head -->
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data" :key="user.id">
                <th>{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td class="flex gap-2">
                    <Link :href="route('users.edit', user.id)" class="btn btn-ghost text-accent">Редактировать</Link>
                    <button class="btn btn-ghost text-error" @click="destroy(user.id)">Удалить</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="text-center py-12" v-else>Пользователей пока нет</div>
    </div>

    <Pagination :links="users.links"/>

</template>
