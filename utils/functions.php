<?php
    /**
     * Fonction qui nettoie un input
     */
    function cleanInput($input){
        return htmlspecialchars(strip_tags(trim($input)));
    }

    /**
     * Fonction qui met la première lettre d'une chaine de caractère en majuscule 
     */
    function firstLetterToUpper($str){
        return ucfirst(mb_convert_case($str, MB_CASE_LOWER, "UTF-8"));
    }

    /**
     * Fonction qui redirige vers une page avec une durée d'attente en ms
     */
    function redirect($path, $duration){
        echo '
        <script>
            setTimeout(()=>{
                document.location.href="'.$path.'"; 
            }, '.$duration.');
        </script>';
    }
?>