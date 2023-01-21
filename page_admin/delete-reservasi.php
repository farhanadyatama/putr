<?php

require '../function.php';

if(isset($_GET["id-reservasi"])) :
    if (delete_reservasi($_GET) > 0) :
    echo "
        <script>
        alert('Data preservasi berhasil dihapus!');
        document.location.href = './data-reservasi.php';
        </script>
        ";
    else :
        echo "
            <script>
            alert('Data preservasi gagal dihapus!');
            document.location.href = './data-reservasi.php';
            </script>
        ";
    endif;
endif;

?>