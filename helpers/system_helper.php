<?php
function redirect($page = false, $message = null, $message_type = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    if ($message != null) {
        $_SESSION['message'] = $message;
    }

    if ($message_type != null) {
        $_SESSION['message_type'] = $message_type;
    }
    header("location:" . $location);

}

function displayMessage()
{
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            $message_type = $_SESSION['message_type'];

            if ($message == 'error') {
                echo '<div class="alert alert-danger alert-dismissible fade show"> ' . $message . '</div>';

            } else {
                echo '<div class="alert alert-success  alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>' . $message . '</div>';
            }

        }
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}