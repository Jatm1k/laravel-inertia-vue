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
    setup() {
        const form = useForm({
            email: null,
            password: null,
        })

        function login() {
            form.post(route('auth'))
        }
        return {form, login}
    }
})
</script>

<template>
    <Head :title="title"/>
    <div class="hero min-h-screen">
        <div class="hero-content flex-col">
            <div class="text-center lg:text-left">
                <h1 class="text-2xl font-bold" id="auth">Авторизация</h1>
            </div>
            <div class="card flex-shrink-0 w-full shadow-2xl bg-base-200">
                <div class="card-body">
                    <form @submit.prevent="login">
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
                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>
