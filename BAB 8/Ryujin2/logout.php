<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Berhasil Logout, Sampai Jumpa Lagi');
            window.location = 'login.php';
        </script>
    ";
?>
