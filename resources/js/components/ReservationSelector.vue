<template>
    <div>

        <div>{{ range.start }} : {{ range.end }}</div>

        <v-date-picker
            :min-date="new Date()"
            mode="range"
            is-inline
            v-model="range"
            :columns="$screens({ default: 1, md: 2, lg: 3 })"
            :is-expanded="$screens({ default: true, xl: false })"
            :disabled-dates="['2019-12-12']"
        ></v-date-picker>
    </div>
</template>

<script>
    export default {
        name: "ReservationSelector",

        props: {
            dates: {
                required: true,
                type: Array
            }
        },

        data () {
            return {
                range: {
                    start: null,
                    end: null,
                },

                disabled_dates: {},
            };
        },

        mounted () {

            axios.get('/a/disabled-dates').then(r => this.disabled_dates = r.data);
        },

        methods: {}
    }
</script>

<style scoped lang="scss">
    .date-box {
        width: 30px;
        height: 30px;
        margin: 1px;
        border: 1px solid #333333;
        display: inline-block;
        transition: 0.3s;

        &:hover {
            background-color: lightblue;
        }
    }
</style>
