<template>
    <div>

        <div>{{ range.start }} : {{ range.end }}</div>

        <range-selector
            :start-date.sync="range.start"
            :end-date.sync="range.end"
            :disabled-dates="disabled_dates">
        </range-selector>
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
