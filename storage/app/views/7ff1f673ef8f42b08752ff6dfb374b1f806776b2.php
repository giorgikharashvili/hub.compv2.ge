<?php
$yoyo = \Clickfwd\Yoyo\Yoyo::getInstance();
if (Yoyo\is_spinning()) {
    echo $yoyo->mount('profile-edit-socials')->refresh();
} else {
    echo $yoyo->mount('profile-edit-socials')->render();
}
?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/profile-tabs/edit/social.blade.php ENDPATH**/ ?>