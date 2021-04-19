<?php
session_start();
session_destroy();
echo "
    <script> 
        alert('Você está sendo deslogado.');
        window.location='../../';
    </script>
";
?>