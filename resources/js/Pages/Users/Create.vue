<script>
import {defineComponent} from 'vue'
import {Head, Link, useForm} from "@inertiajs/vue3";
export default defineComponent({
    props: {
        title: String,
    },
    components: {
        Head,
        Link,
    },
    methods: {
    },
    setup() {
        const form = useForm({
            name: null,
            email: null,
            password: null,
        })

        function store() {
            form.post(route('users.store'))
        }

        return {form, store}
    }
})
</script>

<template>
    <Head :title="title"/>
    <h1 class="text-center font-bold text-lg">{{ title }}</h1>

    <div class="flex flex-col gap-2">
        <Link :href="route('users.index')" class="btn self-start">Назад</Link>
        <form class="flex flex-col items-center" @submit.prevent="store">
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Имя</span>
                </label>
                <input type="text" placeholder="Name" v-model="form.name" class="input input-bordered w-full max-w-xs" :class="{'border-error' : form.errors.name}"/>
                <label class="label">
                    <span class="label-text-alt text-error" v-show="form.errors.name">{{ form.errors.name }}</span>
                </label>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" placeholder="Email" v-model="form.email" class="input input-bordered w-full max-w-xs" :class="{'border-error' : form.errors.email}"/>
                <label class="label">
                    <span class="label-text-alt text-error" v-show="form.errors.email">{{ form.errors.email }}</span>
                </label>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Пароль</span>
                </label>
                <input type="password" placeholder="Password" v-model="form.password" class="input input-bordered w-full max-w-xs" :class="{'border-error' : form.errors.password}"/>
                <label class="label">
                    <span class="label-text-alt text-error" v-show="form.errors.password">{{ form.errors.password }}</span>
                </label>
            </div>
            <button class="btn">Создать</button>
        </form>
    </div>

</template>
