import Vue from "vue";

export default Vue.extend({
    props: {
        errors: Object,
        name: String
    },
    data() {
        return {};
    },
    computed: {
        releventErrors() {
            if (this.errors === null) return null;
            if (!this.errors.hasOwnProperty(this.name)) return null;

            return this.errors[this.name];
        }
    },
    template: `
        <div class="alert alert-danger" v-cloak v-if="releventErrors !== null">
            <ul>
                <li v-for="error in releventErrors">
                    {{ error }}
                </li>
            </ul>
        </div>
    `
});
