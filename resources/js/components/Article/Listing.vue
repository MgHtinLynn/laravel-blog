<script>
import BaseListing from "../../mixins/BaseListing";

export default {
    mixins: [BaseListing],
    name: "Listing",
    data() {
        return {
            fields: [
                {key: 'title', label: 'Title', sortable: true, sortDirection: 'desc'},
                {key: 'user_name', label: 'Author', sortable: true, sortDirection: 'desc'},
                {key: 'actions', label: 'Actions'}
            ],
            selected: 5,
            options: [
                {value: 5, text: '5'},
                {value: 10, text: '10'},
                {value: 20, text: '20'},
                {value: 30, text: '30'}
            ],
            selectedFilter: 0,
            filterOptions: [
                {value: 0, text: 'pending'},
                {value: 1, text: 'accept'},
                {value: 2, text: 'reject'}
            ],
        }
    }
}
</script>

<style scoped>

</style>
