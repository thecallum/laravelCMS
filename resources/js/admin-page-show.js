import Vue from "vue";
import axios from "axios";
import TextareaAutosize from "vue-textarea-autosize";

Vue.use(TextareaAutosize);

new Vue({
    el: "#app",
    beforeMount() {
        console.log("before mount", { page });

        this.id = page.id;
        this.name = page.name;
        this.title = page.title;
        this.slug = page.slug;
        this.content = page.content;
    },
    data: {
        name: "",
        title: "",
        slug: "",
        content: ""
    },

    methods: {
        submit(e) {
            e.preventDefault();

            console.log("submit form");

            const data = JSON.stringify({
                ...this.$data,
                _method: "patch"
            });

            console.log({ data });

            const csrfToken = document.head.querySelector(
                "[name~=csrf-token][content]"
            ).content;

            axios({
                url: `/admin/pages/${this.id}`,
                method: "post",
                responseType: "json",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": csrfToken
                },
                data: data
            })
                // .then(response => {
                //     console.log({ response });
                //     return response.json();
                // })
                .then(response => {
                    console.log({ response });
                })
                .catch(error => {
                    console.log({ error });

                    console.table(error.response.data.errors);
                });
        }
    }
});
