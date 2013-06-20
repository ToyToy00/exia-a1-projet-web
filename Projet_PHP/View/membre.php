<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<style type="text/css">
    body {
        margin-top: 20px;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        margin-right: 10px;
        padding: 7px 9px;
    }

</style>
<script>
    function valider() {
        // si la valeur du champ prenom est non vide
        var myRegExp = new RegExp("^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$");
        var myRegExpNomPrenom = new RegExp("^[a-zA-Z]{1,20}\\-[a-zA-Z]{1,20}$");
        var myRegExpCP = new RegExp("^[0-9]{2,5}$");

        if (document.formMembre.Email.value !== "" && myRegExp.test(document.formMembre.Email.value) === true) {
            // alors on envoie le formulaire
            document.getElementById("Emaili").className = "icon-ok";
        }
        else {
            // sinon on affiche un message
            document.getElementById("Emaili").className = "icon-remove";
        }
        if (document.formMembre.VerifEmail.value === document.formMembre.Email.value && document.formMembre.Email.value !== "") {
            document.getElementById("VerifEmaili").className = "icon-ok";
        }
        else {
            document.getElementById("VerifEmaili").className = "icon-remove";
        }

        if (document.formMembre.Nom.value !== "" /*&& myRegExpNomPrenom.test(document.formMembre.Nom.value) === true*/) {
            document.getElementById("Nomi").className = "icon-ok";
        }
        else {
            document.getElementById("Nomi").className = "icon-remove";
        }
        if (document.formMembre.Prenom.value !== ""/* && myRegExpNomPrenom.test(document.formInscription.Prenom.value) === true*/) {
            document.getElementById("Prenomi").className = "icon-ok";
        }
        else {
            document.getElementById("Prenomi").className = "icon-remove";
        }

        if (document.formMembre.Mdp.value !== "") {
            document.getElementById("Mdpi").className = "icon-ok";
        }
        else {
            document.getElementById("Mdpi").className = "icon-remove";
        }

        if (document.formMembre.VerifMdp.value === document.formMembre.Mdp.value && document.formMembre.VerifMdp.value !== "") {
            document.getElementById("VerifMdpi").className = "icon-ok";
        }
        else {
            document.getElementById("VerifMdpi").className = "icon-remove";
        }

        if (document.formMembre.Adresse.value !== "") {
            document.getElementById("Adressei").className = "icon-ok";
        }
        else {
            document.getElementById("Adressei").className = "icon-remove";
        }

        if (document.formMembre.Ville.value !== "") {
            document.getElementById("Villei").className = "icon-ok";
        }
        else {
            document.getElementById("Villei").className = "icon-remove";
        }
        if (document.formMembre.CP.value !== "" && myRegExpCP.test(document.formMembre.CP.value) === true) {
            document.getElementById("CPi").className = "icon-ok";
        }
        else {
            document.getElementById("CPi").className = "icon-remove";
        }
    }

</script>
</head>

<body>
    <div class="modal-form container">
        <center>
            <table>
                <tr>
                    <td> </td>
                    <td>
                        
                        <form class="form-signin" action="modificationClient" method="POST" name="formMembre" onsubmit="valider();" style="display:inline-block;">
                            <h2 class="form-signin-heading">Mes infos</h2>
                            <input type="text" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Adresse email" name="Email" value="<?php echo $_SESSION['user']['Email']?>">     
                            <i class="icon-remove" style="" id="Emaili"> </i>
                            <input type="text" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Verification email" name="VerifEmail" value="<?php echo $_SESSION['user']['Email']?>">
                            <i class="icon-remove" id="VerifEmaili"> </i>
                            <input type="text" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Nom" name="Nom" value="<?php echo $_SESSION['user']['Nom']?>">
                            <i class="icon-remove" id="Nomi" > </i>
                            <input type="text" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Prenom" name="Prenom" value="<?php echo $_SESSION['user']['Prenom']?>">
                            <i class="icon-remove" id="Prenomi" > </i>
                            <input type="password" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Password" name="Mdp" value="<?php echo $_SESSION['user']['Mdp']?>">
                            <i class="icon-remove" id="Mdpi" > </i>
                            <input type="password" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Verification Password" name="VerifMdp" value="<?php echo $_SESSION['user']['Mdp']?>">
                            <i class="icon-remove" id="VerifMdpi"  > </i>
                            <p></p>
                            <button class="btn btn-large btn-primary" type="submit" >Modifier</button>
                        </form>  
                        
                    </td>
                    <td>
                        <form class="form-signin" action="modificationAdresse" method="POST" name="formMembre" onsubmit="valider();" style="display:inline-block;">
                            <h2 class="form-signin-heading">Mes infos</h2>
                            
                            <input type="text" style="width: 90%;"  class="input-block-level" onchange="valider();" placeholder="Adresse" name="Adresse" value="<?php echo $_SESSION['user']['Adresse']?>">
                            <i class="icon-remove" id="Adressei" > </i>
                            <input type="text" style="width: 90%;"  class="input-block-level" onchange="valider();" placeholder="Ville"name="Ville" value="<?php echo $_SESSION['user']['Ville']?>">
                            <i class="icon-remove"  id="Villei" > </i>
                            <input type="text" style="width: 90%;" class="input-block-level" onchange="valider();" placeholder="Code Postal" name="CP" value="<?php echo $_SESSION['user']['CP']?>">
                            <i class="icon-remove" id="CPi" > </i>
                            <input type="text" style="width: 90%;" class="input-block-level"  placeholder="Pays" value="FRANCE" disabled>
                            
                            <button class="btn btn-large btn-primary" type="submit" >Modifier</button>
                        </form>  
                    </td>
                </tr>
            </table>
        </center>



    </div> <!-- /container -->
