$(document).ready(function() {
  messageCount();
  showData();
  showMessageBoard();

  function messageCount() {
    $.ajax({
      cache: false,
      url: "chatActions.php",
      type: "POST",
      data: { action: "viewMessageNumber" },
      success: function(response) {
        $("#messageCount").html(response);
      },
      complete: function() {
        setTimeout(messageCount, "3000");
      }
    });
  }
  function showData() {
    $.ajax({
      cache: false,
      url: "chatActions.php",
      type: "POST",
      data: { action: "viewChatmessages" },
      success: function(response) {
        console.log(response);
        $("#dropmssages").html(response);
        if (response !== "") {
          toastr.error("ongelezen berichten");
        }
      },
      complete: function() {
        setTimeout(showData, "10000");
      }
    });
  }

  function showMessageBoard() {
    $.ajax({
      cache: false,
      url: "chatActions.php",
      type: "POST",
      data: { action: "viewMessageBoard" },
      success: function(response) {
        $(".chatarea").html(response);
        $(".chatarea").scrollTop(5000);
      },
      complete: function() {
        setTimeout(showMessageBoard, "10000");
      }
    });
  }

  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-bottom-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
  };
});
