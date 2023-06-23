<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    props: {
        links: Array
    },
    components: {
        Link
    },
    mounted() {
        console.log(this.links)
    }
})
</script>

<template>
    <div class="join" v-if="links.length > 3">
        <Link
            class="join-item btn"
            v-for="(link, k) in links"
            :key="k"
            v-html="link.label"
            :href="link.url"
            :class="{'btn-active': link.active, 'btn-disabled':link.url === null}"/>
    </div>
</template>

<style scoped>

</style>
