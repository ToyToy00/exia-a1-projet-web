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

        if (document.formInscription.Email.value !== "" && myRegExp.test(document.formInscription.Email.value) === true) {
            // alors on envoie le formulaire
            document.getElementById("Emaili").className = "icon-ok";
        }
        else {
            // sinon on affiche un message
            document.getElementById("Emaili").className = "icon-remove";
        }
        if (document.formInscription.VerifEmail.value === document.formInscription.Email.value && document.formInscription.Email.value !== "") {
            document.getElementById("VerifEmaili").className = "icon-ok";
        }
        else {
            document.getElementById("VerifEmaili").className = "icon-remove";
        }

        if (document.formInscription.Nom.value !== "" /*&& myRegExpNomPrenom.test(document.formInscription.Nom.value) === true*/) {
            document.getElementById("Nomi").className = "icon-ok";
        }
        else {
            document.getElementById("Nomi").className = "icon-remove";
        }
        if (document.formInscription.Prenom.value !== ""/* && myRegExpNomPrenom.test(document.formInscription.Prenom.value) === true*/) {
            document.getElementById("Prenomi").className = "icon-ok";
        }
        else {
            document.getElementById("Prenomi").className = "icon-remove";
        }

        if (document.formInscription.Mdp.value !== "") {
            document.getElementById("Mdpi").className = "icon-ok";
        }
        else {
            document.getElementById("Mdpi").className = "icon-remove";
        }

        if (document.formInscription.VerifMdp.value === document.formInscription.Mdp.value && document.formInscription.VerifMdp.value !== "") {
            document.getElementById("VerifMdpi").className = "icon-ok";
        }
        else {
            document.getElementById("VerifMdpi").className = "icon-remove";
        }

        if (document.formInscription.Adresse.value !== "") {
            document.getElementById("Adressei").className = "icon-ok";
        }
        else {
            document.getElementById("Adressei").className = "icon-remove";
        }

        if (document.formInscription.Ville.value !== "") {
            document.getElementById("Villei").className = "icon-ok";
        }
        else {
            document.getElementById("Villei").className = "icon-remove";
        }
        if (document.formInscription.CP.value !== "" && myRegExpCP.test(document.formInscription.CP.value) === true) {
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
                    <td>
                        <form class="form-signin" action="login" method="POST" style="display:inline-block;vertical-align:center;">
                            <h2 class="form-signin-heading">Connexion</h2>
                            <input type="text" class="input-block-level" placeholder="Email address" name="comail">
                            <input type="password" class="input-block-level" placeholder="Password" name="comdp">
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                            <button class="btn btn-large btn-primary" type="submit">Connexion</button>
                        </form>
                    </td>
                    <td> </td>
                    <td>
                        <form class="form-signin" action="inscription" method="POST" name="formInscription" onsubmit="valider();" style="display:inline-block;">
                            <h2 class="form-signin-heading">Inscription</h2>
                            <input type="text" class="input-block-level" onchange="valider();" placeholder="Adresse email" name="Email">     
                            <i class="icon-remove" style="" id="Emaili"> </i>
                            <input type="text" class="input-block-level" onchange="valider();" placeholder="Verification email" name="VerifEmail">
                            <i class="icon-remove" id="VerifEmaili"> </i>
                            <input type="text" class="input-block-level" onchange="valider();" placeholder="Nom" name="Nom">
                            <i class="icon-remove" id="Nomi" > </i>
                            <input type="text" class="input-block-level" onchange="valider();" placeholder="Prenom" name="Prenom">
                            <i class="icon-remove" id="Prenomi" > </i>
                            <input type="password"  class="input-block-level" onchange="valider();" placeholder="Password" name="Mdp">
                            <i class="icon-remove" id="Mdpi" > </i>
                            <input type="password"  class="input-block-level" onchange="valider();" placeholder="Verification Password" name="VerifMdp">
                            <i class="icon-remove" id="VerifMdpi"  > </i>
                            <input type="text"  class="input-block-level" onchange="valider();" placeholder="Adresse" name="Adresse">
                            <i class="icon-remove" id="Adressei" > </i>
                            <input type="text"   class="input-block-level" onchange="valider();" placeholder="Ville"name="Ville">
                            <i class="icon-remove"  id="Villei" > </i>
                            <input type="text"  class="input-block-level" onchange="valider();" placeholder="Code Postal" name="CP">
                            <i class="icon-remove" id="CPi" > </i>
                            <input type="text" class="input-block-level"  placeholder="Pays" value="FRANCE" disabled>
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me"> Conditions générales
                            </label>
                            <button class="btn btn-large btn-primary" type="submit" >S'inscrire</button>
                        </form>  
                    </td>
                </tr>
            </table>
        </center>



    </div> <!-- /container -->
