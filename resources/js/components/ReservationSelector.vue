<template>
    <div>

        <h2 class="heading">
            <span>Krok 1</span>
            Wybierz datę:
        </h2>
        <v-date-picker
            ref="picker"
            :min-date="new Date()"
            mode="range"
            is-inline
            v-model="range"
            :columns="$screens({ default: 1, md: 2, lg: 3 })"
            :is-expanded="$screens({ default: true, xl: false })"
            :disabled-dates="datesToObjects(dates)"
        ></v-date-picker>
        <div v-if="step > 0" class="my-3">
            <strong>Wybrano datę:</strong>
            od {{ formatDate(range.start) }} do {{ formatDate(range.end) }}
        </div>

        <div v-if="step > 0">
            <h2 class="heading">
                <span>Krok 2</span>
                Podaj liczbę osób:
            </h2>

            <plus-minus :value="people" :min="1" :max="10" @input="v => people = v"></plus-minus>

            <div>Wybrano: {{ people }}</div>


            <button
                class="btn btn-primary"
                @click.prevent="check"
            >Sprawdź <i class="fa fa-search"></i></button>
        </div>

    </div>
</template>

<script>
    import PlusMinus from "./PlusMinus";

    export default {
        name: "ReservationSelector",
        components: {PlusMinus},
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
                people: 1,
            };
        },

        methods: {
            datesToObjects (dates) {
                return dates.map(function (d) {
                    return {
                        start: new Date(d),
                        end: new Date(d)
                    };
                });
            },

            /**
             * @param Date date
             */
            formatDate (date) {
                return date.getFullYear() + '-'
                    + (date.getMonth() + 1) + '-'
                    + date.getDate();
            },

            check () {

                axios.post('/a/check-dates', {
                    from: this.formatDate(this.range.start),
                    to: this.formatDate(this.range.end),
                    people: this.people
                }).then(() => {
                });

            }
        },

        computed: {
            step () {

                if (this.range.start != null)
                    return 1;

                return 0;
            }
        }
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
