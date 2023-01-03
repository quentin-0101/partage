

<?php

$data = "
    <form method='POST' action='?controller=utilisateur&action=validateEmail'>
       
        <div class='field required-field'>
            <label> Email </label>
            <input name='email' type='email' class='form-control' placeholder='Email'>
        </div>
        
        <div class='field required-field'>
            <label> Nonce </label>
            <input name='nonce' type='text' class='form-control' placeholder='Nonce'>
        </div>
    
        <button class='btn btn-orange' type='submit'>  Validate </button>
    </form>
";

extract([
        "data" => $data,
    ]
);
require("base_register.php");
