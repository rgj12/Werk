$(document).ready(function() {
  showData();
  function showData() {
    $.ajax({
      cache: false,
      url: "chatdropdown.php",
      type: "POST",
      data: { action: "viewChatmessages" },
      success: function(response) {
        // console.log(response);
        $("#dropmssages").html(response);
      },
      complete: function() {
        // Schedule the next request when the current one's complete
        setTimeout(showData, 5000);
      }
    });
  }
});
