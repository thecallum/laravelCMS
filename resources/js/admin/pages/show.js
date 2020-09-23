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
        console.log("before mount", { page });

        this.id = page.id;
        this.name = page.name;
        this.title = page.title;
        this.slug = page.slug;
        this.content = page.content;

        this.allPages = allPages;

        const allPagesMap = {};

        allPages.forEach((page, index) => {
            allPagesMap[page.id] = index;
        });

        this.allPagesMap = allPagesMap;

        this.parentPageId = parseInt(page.parent_page_id) || null;

        this.initialState = this.getCurrentState();
    },
    data: {
        initialState: null,

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
        contentChanged() {
            return this.initialState !== this.getCurrentState();
        },
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
        getCurrentState() {
            return JSON.stringify({
                name: this.name,
                title: this.title,
                slug: this.slug,
                content: this.content,

                parentPageId: this.parentPageId
            });
        },
        submit(e) {
            e.preventDefault();

            if (!this.contentChanged) return;

            // console.log("submit form");

            const data = JSON.stringify({
                name: this.name,
                title: this.title,
                slug: this.slug,
                content: this.content,
                parent_page_id: this.parentPageId,

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
                .then(response => {
                    console.log({ response });

                    this.initialState = this.getCurrentState();
                })
                .catch(error => {
                    console.log({ error });

                    console.table(error.response.data.errors);

                    this.errors = error.response.data.errors;
                });
        },
        undoChanges() {
            const initialState = JSON.parse(this.initialState);

            this.name = initialState.name;
            this.title = initialState.title;
            this.slug = initialState.slug;
            this.content = initialState.content;
        }
    }
});
