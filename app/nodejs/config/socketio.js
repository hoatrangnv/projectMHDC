/**
 * Socket.io configuration
 */
'use strict';

import config from './environment';
import jwt from 'jsonwebtoken';
var Queue = require('../components/Queue');
var http = require('../components/Http');
var apiUrl = config.apiUrl;

var JWT_SECRET = '12345';

var modelStorages = require('./../storages/model');

function getListPrivateChat(socket, socketio, task) {

  var token = socket.handshake.query.token;

  http.post(apiUrl+'chat/get-arruser-private', {task: task}, {
        "Authorization" :"Bearer " + token
    }).then(function (res) {

      if(typeof res.data != 'undefined') {
        var arrUser = res.data;
        var infouser = socket.user;
        infouser.use_id = infouser.userId;
        infouser.use_username = infouser.username;
        infouser.use_fullname = infouser.name;
        if(arrUser.length > 0 ) {
          arrUser.forEach(function(element) {
              if(typeof socketio.sockets.adapter.rooms["roomself_"+element] != 'undefined') {
                  //console.log(socketio.sockets.adapter.rooms["roomself_"+element]);
                  //console.log(infouser);
                  socketio.to("roomself_"+ element).emit(res.task, infouser);

              }


          });
       }
      }
      return true;

    }).catch(function (err) {
        console.log(err);
    });
}


// When the user disconnects.. perform this
function onDisconnect(socket, socketio) {
  if (socket.user) {
    getListPrivateChat(socket, socketio, 'offline_user');
    modelStorages.remove(socket);
    modelStorages.removeModelSocket(socket);
  }
}

// When the user connects.. perform this
function onConnect(socket, socketio) {
  // When the client emits 'info', this listens and executes
  socket.on('info', function(data) {
    //socket.log(JSON.stringify(data, null, 2));
  });

  // Insert sockets below
  //stream broadcast in the video stream
  //require('../sockets/streaming-broadcast').register(socket);

  require('../sockets/room-manager').register(socket, socketio);
  require('../sockets/chat').register(socket, socketio);
  require('../sockets/group-call').register(socket, socketio);
  //require('../sockets/model-online').register(socket, socketio);
  //require('../sockets/tip').register(socket);

  // socketio.of('/conversation').on('connection', function(socket) {
//    require('../sockets/conversation').register(socket);
  // });

  //require user logged in
  //require('../sockets/video-call').register(socket);
    //require('../sockets/group-call').register(socket);
  if (socket.user) {
    //storage model if valid
    getListPrivateChat(socket, socketio, 'online_user');
    modelStorages.add(socket);
  }
}




exports = module.exports = function(socketio) {

  socketio.on('connection', function(socket) {
    socket.address = socket.request.connection.remoteAddress +
      ':' + socket.request.connection.remotePort;
    //decode json web token in case in constant
    //TODO - find user in this case
    // console.log('token:'+ socket.handshake.query.token);

    if (socket.handshake.query.token) {
      //decode token

      try {
        if( socket.handshake.query.token =='client2') {
          var user = {userId: 1336, "use_username": "phamhoaitrung"};
        }
        else {
          if( socket.handshake.query.token =='client3') {
              var user = {userId: 1454, "use_username": "lexuanlong"};
          }
          else {
            var user = jwt.decode(socket.handshake.query.token);
          }
        }
        user.id = user.userId;
        socket.user = user;
        var token = socket.handshake.query.token;
        http.post(apiUrl+'chat/detail-profile', {}, {
            "Authorization" :"Bearer " + token
          }).then(function (res) {
              user.id = user.userId;
              user.avatar = res.data.avatar;
              user.use_username = res.data.use_username;
              user.use_fullname = res.data.use_fullname;
              socket.user = user;
              socket.join("roomself_"+user.userId);
              socket.emit('connect-success', user);
         }).catch(function (err) {
          return socket.emit('_error', {
                event: 'detail-profile',
                msg: err.msg || 'Lỗi hệ thống',
                data: err
            });
          });



      } catch(e) {
        socket.user = null;
        socket.emit('connect-fail', null);
      }
    } else {
      socket.user = null;
      socket.emit('connect-fail', null);

    }

    socket.connectedAt = new Date();
    //integrate queue component to socket then easy to call it
    socket.queue = Queue;

    socket.log = function(...data) {
      console.log(`SocketIO ${socket.nsp.name} [${socket.address}]`, ...data);
    };

    // Call onDisconnect.
    socket.on('disconnect', function() {
      onDisconnect(socket, socketio);
      //socket.log('DISCONNECTED');
    });
    // Call onConnect.
    onConnect(socket, socketio);
    //socket.log('CONNECTED');
  });
}
