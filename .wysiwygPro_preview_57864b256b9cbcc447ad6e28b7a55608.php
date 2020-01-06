<?php
if ($_GET['randomId'] != "Bodx_mWLnoZXcl182bsMQoWyiFgb8xrTKDawAuOp3lY1Ds2UIPgGIPBu9n4iq5IX") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
