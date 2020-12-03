<?php

// mulai session
session_start();
// hapus session
session_destroy();

// alert
echo "
    <script>
        document.location.href = 'index.php';
    </script>
";

?>