var modal = document.getElementById("chatbox");

var btn = document.getElementById("openchat");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
};

span.onclick = function() {
  modal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function chat() {
  this.update = updateChat;
  this.send = sendChat;
  this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat() {
  if (!instanse) {
    instanse = true;
    $.ajax({
      type: "POST",
      url: "",
      data: { function: "getState", file: file },
      dataType: "json",
      success: function(data) {
        state = data.state;
        instanse = false;
      }
    });
  }
}

//Updates the chat
function updateChat() {
  if (!instanse) {
    instanse = true;
    $.ajax({
      type: "POST",
      url: "",
      data: { function: "update", state: state, file: file },
      dataType: "json",
      success: function(data) {
        if (data.text) {
          for (var i = 0; i < data.text.length; i++) {
            $("#chatbox-content").append($("+ data.text[i] +"));
          }
        }
        document.getElementById(
          "chatbox-content"
        ).scrollTop = document.getElementById("chatbox-content").scrollHeight;
        instanse = false;
        state = data.state;
      }
    });
  } else {
    setTimeout(updateChat, 1500);
  }
}

//send the message
function sendChat(message, nickname) {
  updateChat();
  $.ajax({
    type: "POST",
    url: "",
    data: {
      function: "send",
      message: message,
      nickname: nickname,
      file: file
    },
    dataType: "json",
    success: function(data) {
      updateChat();
    }
  });
}
