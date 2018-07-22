const createError = require('http-errors'),
  express = require('express'),
  path = require('path'),
  favicon = require('serve-favicon'),
  logger = require('morgan'),  
  bodyParser = require('body-parser'),

  app = express(),
  routes = require('./routes')(app);

app.use(bodyParser.json());
app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, '../dist/spawn')));
app.use('/', express.static(path.join(__dirname, '../dist/spawn')));

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.send(err.status);
});

module.exports = app;