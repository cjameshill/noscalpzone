var Dropzone = require('../../../node_modules/dropzone');

Dropzone.options.ticketPdf = {
    paramName: "ticket",
    maxFilesize: 10,
    uploadMultiple: false,

    init: function() {
        this.on("success", function(file) {
            document.getElementById('ticket-upload').style.display = 'block';
        });
    }
};
