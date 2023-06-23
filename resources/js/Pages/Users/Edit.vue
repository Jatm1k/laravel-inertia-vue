<script>
import {defineComponent} from 'vue'
import {Head, Link, useForm} from "@inertiajs/vue3";
export default defineComponent({
    props: {
        title: String,
        user: Object,
    },
    components: {
        Head,
        Link,
    },
    methods: {
    },
    setup(props) {
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
        })

        function update() {
            form.patch(route('users.update', props.user.id))
        }

        return {form, update}
    }
})
</script>

<template>
    <Head :title="title"/>
    <h1 class="text-center font-bold text-lg">{{ title }}</h1>

    <div class="flex flex-col gap-2">
        <Link :href="route('users.index')" class="btn self-start">Назад</Link>
        <form class="flex flex-col items-center" @submit.prevent="update">
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
            <button :disabled="form.processing" class="btn">Сохранить</button>
        </form>
    </div>

</template>
