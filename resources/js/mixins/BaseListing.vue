<script>
export default {
    props: ['url'],
    created() {
        this.getResults();
    },
    watch: {
        search_keyword(newKeyword, oldKeyword) {
            if (newKeyword.length === 0) {
                this.getResults()
            }
        }
    },
    data() {
        return {
            items: null,
            pagination: [],
            fields: [],
            isBusy: false,
            isResourceCollection: true,
            per_page: 20
        }
    },
    methods: {
        setPagination(response) {
            this.pagination = this.isResourceCollection ? response.data.meta : response.data;
        },
		getResults(page = 1) {

            this.isBusy = true

            let params = {
                page,
                per_page: this.per_page,
                filter: this.selectedFilter
            }

			axios.get(this.url, {params}).then(response => {
                this.isBusy = false
                this.items = response.data.data;
                this.setPagination(response);
            });
        },
        filter(payload) {
            this.filter_keyword = payload;
            this.getResults();
        }
	}
}
</script>

<style scoped>
    input[type="search"]::-webkit-search-cancel-button {
        -webkit-appearance: searchfield-cancel-button;
    }
</style>
