<?php

require '../function.php';

if(isset($_GET["id-pembangunan"])) :
    if (delete_pembangunan($_GET) > 0) :
    echo "
        <script>
        alert('Data pembangunan berhasil dihapus!');
        document.location.href = './data-pembangunan.php';
        </script>
        ";
    else :
        echo "
            <script>
            alert('Data pembangunan gagal dihapus!');
            document.location.href = './data-pembangunan.php';
            </script>
        ";
    endif;
endif;

?>