import Vue from "vue";
import axios from "axios";
import TextareaAutosize from "vue-textarea-autosize";

import Error from "../components/error";

Vue.use(TextareaAutosize);

new Vue({
    el: "#app",
    components: {
        Error
    },
    beforeMount() {
        this.allPages = allPages;

        const allPagesMap = {};

        allPages.forEach((page, index) => {
            allPagesMap[page.id] = index;
        });

        this.allPagesMap = allPagesMap;
    },
    data: {
        name: "",
        title: "",
        slug: "",
        content: "",
        parentPageId: null,

        errors: null,

        allPages: [],
        allPagesMap: []
    },
    computed: {
        parentPage() {
            return this.allPages[this.allPagesMap[this.parentPageId]];
        },
        fullURL() {
            if (this.parentPageId == null) {
                return this.slug;
            }

            const parentPageURL = this.parentPage.fullURL;

            if (parentPageURL === "/") {
                // is homepage
                return `/${this.slug}/`;
            }

            // other page
            return `${this.parentPage.fullURL}/${this.slug}/`;
        }
    },
    methods: {
        submit(e) {
            e.preventDefault();

            const data = JSON.stringify({
                name: this.name,
                title: this.title,
                slug: this.slug,
                content: this.content,
                parent_page_id: this.parentPageId
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

                    const editURL = `/admin/pages/${response.data.id}`;

                    document.location.replace(editURL);
                })
                .catch(error => {
                    console.log({ error });

                    console.table(error.response.data.errors);

                    this.errors = error.response.data.errors;
                });
        }
    }
});
