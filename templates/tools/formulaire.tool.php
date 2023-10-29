<?php
function buildForm($title,$labels, $inputs, $submit = 'Soumettre',$method = 'POST',$action = '#') {
    if (count($labels) !== count($inputs)) {
        echo "Erreur : Les tableaux de labels et d'inputs ne sont pas de même taille.";
        return;
    }
    echo '<main class="flex-shrink-0">';
    echo '<div class="row">';
    echo '<div class="container rounded bg-light col-7">';
    echo '<div class="h4 pb-2 mb-4  border-bottom border-secondary text-center">';
    echo $title;
    echo '</div>';
    echo '<div class="row g-5 ">';
    echo '<div class="col-md-12 col-lg-12 ">';
    
    echo '<form method = "'.$method.'" action="'.$action.'" >';
    echo '<div class="row ">';

    for ($i = 0; $i < count($labels); $i++) {
        $label = $labels[$i];
        $input = $inputs[$i];
        $inputrRequired = isset($input['required']) && $input['required'] == true ? 'required' : '';
        $inputName = $input['name'];

        echo '<div class="form-group col-12  mx-auto mb-3">';
        echo '<label  for="' . $input['id'] . '">' . $label ;
        if($inputrRequired === 'required'){
            echo '<span class="';
            if ($method === 'POST') {
                echo isset($_POST["submit"]) ? (empty($_POST[$inputName]) ?  "text-danger" :  "") :  "";
            } elseif ($method === 'GET') {
                echo isset($_GET["submit"]) ? (empty($_GET[$inputName]) ?  "text-danger" :  "") :  "";
            }
            echo '">*</span>';
        }
        echo '</label>';
        
        // Vérification du type d'input (text, email, etc.)
        $inputType = isset($input['type']) ? $input['type'] : 'text';
        $inputID = $input['id'];
        $inputPlaceholder = isset($input['placeholder']) ? $input['placeholder'] : '';
        
        echo '<input type="' . $inputType . '" class="form-control ';
        if($inputrRequired === 'required'){
            if ($method === 'POST') {
                echo isset($_POST["submit"]) ? (empty($_POST[$inputName]) ?  "is-invalid" :  "") :  "";
            } elseif ($method === 'GET') {
                echo isset($_GET["submit"]) ? (empty($_GET[$inputName]) ?  "is-invalid" :  "") :  "";
            }
        }
        echo '" id="' . $inputID . '" name="' . $inputName . '" placeholder="' . $inputPlaceholder . '" value="';
        if ($method === 'POST') {
            echo isset($_POST["submit"]) ? (isset($_POST[$inputName]) && $inputName !== 'password' && $inputName !== 'password2' ?  $_POST[$inputName] :  "") :  "";
        } elseif ($method === 'GET') {
            echo isset($_GET["submit"]) ? (isset($_GET[$inputName]) ?  $_GET[$inputName] :  "") :  "";
        }
        echo '" '.$inputrRequired.'>';
        echo '</div>';
    }
    echo '</div>';
    
    echo '<input type="submit" class="w-100 btn btn-primary btn-lg mr-3 mb-3 " name="submit" value="'.$submit.'">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</main>';
}

// Exemple d'utilisation
// $labels = ['Nom', 'Adresse email', 'Mot de passe'];
// $inputs = [
//     ['id' => 'nom', 'name' => 'nom', 'type' => 'text', 'placeholder' => 'Entrez votre nom', 'required' => true],
//     ['id' => 'email', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Entrez votre adresse email',  'required' => true],
//     ['id' => 'password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Entrez votre mot de passe',  'required' => true]
// ];
//fromTool('formulaire');

// buildForm('Connexion',$labels, $inputs, $submit = 'Connexion',$method = 'POST',$action = '#');
