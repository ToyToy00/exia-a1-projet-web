<?php

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

</script>
</head>

<body>
    <div class="modal-form container">
        <center>
            <table>
                <tr>
                    <td>
                        <form class="form-signin" action="envoi" method="POST" name="formEnvoiMail" style="display:inline-block;">
                            <h2 class="form-signin-heading">Nous contacter</h2>
                            Destinataire
                            <input type="text" class="input-block-level" disabled value="admin@exiastore.fr">
                            Sujet
                            <input type="text" class="input-block-level"  placeholder="Sujet" name="sujet" >
                            Message (20 caractères minimum)
                            <textarea style="height:400px" class="input-block-level" name="cmail" > </textarea>
                           
                            <button class="btn btn-large btn-primary" type="submit" >Envoyer</button>
                        </form>  
                    </td>
                </tr>
            </table>
        </center>



    </div> <!-- /container -->
