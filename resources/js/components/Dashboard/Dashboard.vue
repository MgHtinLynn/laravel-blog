<template>
    <div>
        <spinner v-if="isBusy" class="mt-10"></spinner>
        <b-card class="overflow-hidden" v-for="item in items" :key="item.id">
            <b-row>
                <b-col md="9">
                    <p class="p-3">{{ item.user_name }}</p>
                    <b-card-body :title="item.title">
                        <b-card-text>
                            {{ item.created_at }}
                        </b-card-text>
                    </b-card-body>
                </b-col>
                <b-col md="3">
                    <b-card-img :src="item.cover_photo" alt="Image" width="200" height="132" class="rounded-0"></b-card-img>
                </b-col>

            </b-row>
        </b-card>
    </div>
</template>

<script>

export default {
    props: ['url'],
    name: "Dashboard",
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
