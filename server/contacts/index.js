const create = require('./create'), 
  get = require('./get'),
  update = require('./update'),
  del = require('./delete');

class Contacts {}
Contacts.prototype.create = create;
Contacts.prototype.get = get;
Contacts.prototype.update = update;
Contacts.prototype.delete = del;

module.exports = Contacts;