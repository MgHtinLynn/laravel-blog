<template>
    <div>
        <spinner v-if="isBusy" class="mt-10"></spinner>
        <b-card
            :title="item.title"
            :img-src="item.cover_photo"
            img-alt="Image"
            img-top
            tag="article"
            style="max-width: 20rem;"
            class="overflow-hidden mb-3"
            v-for="item in items" :key="item.id"
        >
            <a href="#">Detail</a>
        </b-card>
    </div>
</template>

<script>
export default {
    name: "RecommendList",
    props: ['url'],
    data() {
        return {
            items: null,
            isBusy: false,
        }
    },
    created() {
        //getting results from item list api
        this.getResults();
    },
    methods: {
        getResults() {
            this.isBusy = true
            axios.get(this.url).then(response => {
                this.isBusy = false
                this.items = response.data.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
