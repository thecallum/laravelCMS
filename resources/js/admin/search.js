import Vue from "vue";
import VueBootstrapTable from "vue2-bootstrap-table2";

new Vue({
    el: "#app",
    components: {
        VueBootstrapTable: VueBootstrapTable
    },
    beforeMount() {
        console.log("before mount", { pages });

        this.values = pages;
    },
    methods: {
        handleRowFunction(e, entry) {
            console.log("row click", { entry });

            window.location.href = `/admin/pages/${entry.id}`;
        }
    },
    data: {
        columns: [
            {
                title: "id"
            },
            {
                title: "name",
                visible: true,
                editable: true
            },
            {
                title: "fullURL",
                visible: true,
                editable: true
            }
        ],
        values: []
    }
});
