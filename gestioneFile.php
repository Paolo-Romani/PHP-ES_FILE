<?php
    include ("lib/funzioni.php");
    echo "
        <form action ='' method='POST'>
            <p>PATH</br><input type='text' name='path' required></p>
            <p>NOME FILE</br><input type='text' name='nome' required></p>
            <p>TESTO</br><textarea name='testo'></textarea></p>
            <p><input type='submit' value = 'crea file'></p>
        </form>
    ";
    $sms = "<p style='color: red'>INSERIRE PATH e NOME DEL FILE</p>";
    if(!empty($_POST)){
        if(is_dir($_POST['path'])){
            if(!is_file($_POST['path']."/".$_POST['nome'])){
                $f = fopen($_POST['path']."/".$_POST['nome'],"w");
                fwrite($f, $_POST["testo"]);
                fclose($f);
                $sms ="<p style='color: blue'>FILE SCRITTO</p>";
            }else
                $sms ="<p style='color: red'>IL FILE ESISTE</p>";
        }else
            $sms="<p style='color: red'>PATH ERRATO</p>";
    }
        echo $sms;
?>