<!DOCTYPE html>
<html>
<body>

<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$RU85KDMhbh8pDhpvzL6C5.kD3qWpzXARZBzJ5oJ2mFoW7Ren.apC2';

if (password_verify('jackie123', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
 
 
</body>
</html>