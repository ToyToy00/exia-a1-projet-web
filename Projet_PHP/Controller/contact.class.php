<?php

class contact_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        if (isset($_SESSION['user'])) {
            
            $this->registry->template->show('contact');
        } else {
            $this->registry->template->message = "Vous n'êtes pas connecté";
            $this->registry->template->show('message');
        }
    }

    function logout() {
        session_unset();
        session_destroy();
        $this->registry->template->message = "Vous êtes déconnecté";
        $this->registry->template->show('message');
    }

    function envoi() {
        if (isset($_SESSION['user'])) {

            $exia = 'admin@exiastore.fr';
            $email = ($_POST['email']);
            $sujet = ($_POST['sujet']);
            $cmail = ($_POST['cmail']);
            
            if( $email != '' && $sujet != '' && $cmail != '' && strlen($cmail) >= 20){
                @mail($email, $exia, $sujet, $cmail);
                echo "<script> alert('Succès') </script>";
                $this->registry->template->show('contact');
            }
            else{
                echo "<script> alert('Champs non remplis ou pas assez complet') </script>";
                $this->registry->template->show('contact');
                
            }
        }
    }

}
?>


