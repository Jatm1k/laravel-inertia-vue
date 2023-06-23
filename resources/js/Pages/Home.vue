<script>
import {defineComponent} from 'vue'
import {Head, Link, useForm} from "@inertiajs/vue3";
export default defineComponent({
    props: {
        title: String
    },
    components: {
        Head,
        Link,
    },
})
</script>

<template>
    <Head :title="title"/>
    <div class="hero min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md flex flex-col items-center">
                <h1 class="text-5xl font-bold w-max"><span class="text-error">Laravel</span> + <span class="text-primary">Inertia.js</span> + <span class="text-accent">Vue</span></h1>
                <p class="py-6">Приложение с CRUD и авторизацией</p>
                <Link :href="route('login')" class="btn btn-primary">Авторизоваться</Link>
            </div>
        </div>
    </div>
</template>
