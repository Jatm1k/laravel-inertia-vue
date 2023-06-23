<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    components: {
        Link,
    }
})
</script>

<template>
<div class="container mx-auto">
    <div class="alert alert-success fixed right-10 top-10 w-max" v-if="$page.props.message">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ $page.props.message }}</span>
    </div>
    <div class="navbar bg-base-100">
        <Link :href="route('home')" class="btn btn-ghost normal-case text-xl">Home</Link>
        <Link :href="route('login')" class="btn btn-ghost normal-case text-xl" v-if="!$page.props.user">Login</Link>
        <Link :href="route('users.index')" class="btn btn-ghost normal-case text-xl" v-if="$page.props.user">Users</Link>
        <Link :href="route('logout')" class="btn btn-ghost normal-case text-xl" v-if="$page.props.user">Logout</Link>
    </div>
    <slot/>
</div>
</template>
