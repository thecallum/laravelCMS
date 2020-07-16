import Vue from "vue";
import axios from "axios";
import TextareaAutosize from "vue-textarea-autosize";

Vue.use(TextareaAutosize);

new Vue({
    el: "#app",
    data: {
        name: "",
        title: "",
        slug: "",
        content: "",

        errors: null
    },
    methods: {
        submit(e) {
            e.preventDefault();

            const data = JSON.stringify({
                ...this.$data
                // _method: "patch"
            });

            const csrfToken = document.head.querySelector(
                "[name~=csrf-token][content]"
            ).content;

            axios({
                url: `/admin/pages/`,
                method: "post",
                responseType: "json",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": csrfToken
                },
                data: data
            })
                .then(response => {
                    console.log({ response });
                })
                .catch(error => {
                    console.log({ error });

                    console.table(error.response.data.errors);

                    this.errors = error.response.data.errors;
                });
        }
    }
});
