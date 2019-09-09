export default {
    state: {
        start: '2019-09-01',
        end: '2019-09-08',
    },

    getters: {
        range (store) {
            if (store.start === null || store.end === null) {
                return [];
            }

            let start = moment(store.start);
            let end = moment(store.end);

            let range = moment().range(store.start, store.end);

            console.log(range);

            let days = [];

            return days;
        }
    },

    mixins: {
        start (store, date) {
            store.start = date;
        },

        end (store, date) {
            store.end = date;
        }
    }
}
