<br>
<br>
<br>
<?php
function buildBootstrapForm($labels, $inputs, $submit = 'Soumettre',$method = 'POST',$action = '#') {
    if (count($labels) !== count($inputs)) {
        echo "Erreur : Les tableaux de labels et d'inputs ne sont pas de même taille.";
        return;
    }
    
    echo '<form method = "'.$method.'" action="'.$action.'" >';
    
    for ($i = 0; $i < count($labels); $i++) {
        $label = $labels[$i];
        $input = $inputs[$i];
        
        echo '<div class="form-group">';
        echo '<label for="' . $input['id'] . '">' . $label . '</label>';
        
        // Vérification du type d'input (text, email, etc.)
        $inputType = isset($input['type']) ? $input['type'] : 'text';
        $inputID = $input['id'];
        $inputName = $input['name'];
        $inputPlaceholder = isset($input['placeholder']) ? $input['placeholder'] : '';
        $inputrRequired = isset($input['required']) && $input['required'] == true ? 'required' : '';
        
        echo '<input type="' . $inputType . '" class="form-control" id="' . $inputID . '" name="' . $inputName . '" placeholder="' . $inputPlaceholder . ' '.$inputrRequired.'">';
        echo '</div>';
    }
    
    echo '<button type="submit" class="btn btn-primary">'.$submit.'</button>';
    echo '</form>';
}

// Exemple d'utilisation
// $labels = ['Nom', 'Adresse email', 'Mot de passe'];
// $inputs = [
//     ['id' => 'nom', 'name' => 'nom', 'type' => 'text', 'placeholder' => 'Entrez votre nom', 'required' => true],
//     ['id' => 'email', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Entrez votre adresse email',  'required' => true],
//     ['id' => 'password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Entrez votre mot de passe',  'required' => true]
// ];

// include('formulaire.php'); 

// buildBootstrapForm($labels, $inputs);
