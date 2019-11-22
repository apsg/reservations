import moment from 'moment';

export default {
    state: {
        start: '2019-09-01',
        end: '2019-09-08',
    },

    getters: {
        range (store) {

            return [];
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
