var Message = require('./../models/message');

function getAll( req, res ){
    Message.find( function(err, messages){
        res.send(messages);
    } );
   res.send("GET messages"); 
}

module.exports.getAll = getAll;

function create( req, res ){
    
    var m = new Message();
    m.user = req.body.user;
    m.message = req.body.message;
    
    m.save(function (err, message) {
        if (err) return console.error(err);
        result.send(message);
    });
    
}

module.exports.create = create;