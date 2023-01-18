<?php

require './function.php';

if(isset($_GET["id-information"])) :
    if (delete_informasi($_GET) > 0) :
    echo "
        <script>
        alert('Informasi berhasil dihapus!');
        document.location.href = './data-informasi.php';
        </script>
        ";
    else :
        echo "
            <script>
            alert('Informasi gagal dihapus!');
            document.location.href = './data-informasi.php';
            </script>
        ";
    endif;
endif;

?>