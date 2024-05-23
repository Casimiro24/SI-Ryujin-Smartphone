<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Logout Berhasil, Sampai Jumpa Lagi');
            window.location = 'login.php';
        </script>
    ";
?>
