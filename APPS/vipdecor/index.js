var express = require('express'),
  app = express(),
  bodyParser = require('body-parser'),
  loki = require('lokijs')
lo = require('lodash')
db = require('diskdb');

var _ = lo

db = db.connect('databases', ['decorations', 'matos', 'photos', 'prix']);


// ----- essai lokijs -------
/*
var doctors;
var database = new loki(__dirname + '/databases/database.json')
matos = database.addCollection('matos', {
  indices: ['name']
});
decorations = database.addCollection('decorations', {
  indices: ['name']
});
photos = database.addCollection('photos', {
  indices: ['name']
});
doctors = database.addCollection('doctors', {
  indices: ['name']
});

doctors.insert({
  name: 'David Tennant',
  doctor: 10
});
doctors.insert({
  name: 'Matt Smith',
  doctor: 11
});
doctors.insert({
  name: 'Peter Capaldi',
  doctor: 12
});
database.saveDatabase();
*/
// ----- // end essai loki -----

app.use(express.static(__dirname + '/public'));
app
// https://scotch.io/tutorials/use-expressjs-to-get-url-and-post-parameters
  .use(bodyParser.json()) // support json encoded bodies
  .use(bodyParser.urlencoded({
    extended: true
  })) // support encoded bodies

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
  response.render('index');
});

// Route for page
app.get('/views/:page', function(request, response) {
  response.render(request.params.page);
});

// Route for API
app.get('/api/decorations', function(request, response) {
  var decorations = db.decorations.find();
  response.json(decorations);
});
app.post('/api/decorations', function(request, response) {
  let deco = request.body.deco;
  var query = {
    _id: deco._id
  };
  var options = {
    multi: false,
    upsert: true
  };
  var updated = db.decorations.update(query, deco, options);
  console.log(updated);
  response.json(updated);
});

app.get('/api/decorations/:id/delete', function(request, response) {
  let id = request.params.id;
  response.json(db.decorations.remove({
    _id: id
  }, true));
});
app.get('/api/decorations/:id/photos', function(request, response) {
  var decorations = db.decorations.find({
    _id: request.params.id
  });
  response.json(decorations.photos);
});

app.post('/api/photos', function(request, response) {

  let photo = request.body.photo;
  let inserted = db.photos.save(photo);
  console.log(inserted);
  response.json(db.photos.find());
});
app.get('/api/photos/:id/delete', function(request, response) {
  let id = request.params.id;
  response.json(db.photos.remove({
    _id: id
  }, true));
});
app.get('/api/groupes/:nom/delete', function(request, response) {
  let photos = db.photos.find({
    groupe: request.params.nom
  });
  _.forEach(photos, (p) => {
    db.photos.remove({
      _id: p._id
    }, true);
  })
  response.json(true);
});

app.get('/api/matos/:id/delete', function(request, response) {
  let id = request.params.id;
  response.json(db.matos.remove({
    _id: id
  }, true));
});

app.get('/api/photos', function(request, response) {
  var photos = db.photos.find();
  response.json(photos);
});

app.get('/api/matos', function(request, response) {
  var matos = db.matos.find();
  response.json(matos);
});

// App start
app.set('port', (process.env.PORT || 5000));
app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});
