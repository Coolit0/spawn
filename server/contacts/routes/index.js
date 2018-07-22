const Contacts = require('../index'),
    _ = require('lodash');

function get(req, res) {
    
    res.send('test')
}

module.exports = (app) => {
    app.get('/api/contacts',
        get
    );
};
