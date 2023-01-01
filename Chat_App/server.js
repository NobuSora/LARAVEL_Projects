const express = require('express');
const app = express();
const server = require('http').createServer(app);

const io = require('socket.io')(server, {
  cors: {origin: "*"}
});

io.on('connection', (socket)=>{
  console.log('Connected');

socket.on('sendChatToServer', (message) =>{
  console.log(message);

  // io.sockets.emit('sendChatToClient', (message));
  socket.broadcast.emit('sendChatToClient',(message));
});

socket.on('disconnect', (socket)=>{
  console.log("Disconnected");
});
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});