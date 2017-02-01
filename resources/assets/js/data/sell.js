export default {
    tickets: [
        { seat: ''}
    ],
    download: {},
    ticket: {
        is_ga: false,
        section: '',
        row: '',
        amount: 0,
        face_value: 0,
    },
    success: false,

    submit(event) {

        return new Promise((resolve, reject) => {
            Vue.$http.post('/api/event/'+ event + '/list', { tickets: this.tickets, ticket: this.ticket })
                .then((response) => {
                    this.success = true;
                    resolve(response);
                })
                .catch((response) => {
                    reject(response);
                });
        });
    },

    stash(event) {
        return new Promise((resolve, reject) => {
            Vue.$http.post('/api/event/' + event + '/list/stash', { tickets: this.tickets, ticket: this.ticket })
                .then((response) => {
                    resolve(response);
                })
                .catch((response) => {
                    reject(response);
                });
        });
    },

    resume(event) {

        return new Promise((resolve, reject) => {
            Vue.$http.get('/api/event/' + event + '/list/resume')
                .then((response) => {
                    if(response.data.ticketObjects){
                        this.tickets = response.data.ticketObjects[0];
                        this.ticket = response.data.ticketObjects[1];
                    }
                    if(response.data.downloadObjects){
                        this.download = response.data.downloadObjects;
                    }
                    resolve(response);
                })
                .catch((response) => {
                    reject(response);
                });
        });
    },

    next(page, list = null) {
        if(list == null){
            router.push(page);
        } else {
            router.push({ name: page, params: { list: list }});
        }
    }

}