<div class="span9">
    <div class="well" >

        <div class="modal-body" >
<table class="table">
    <tr><td>
            Date
        </td>
        <td>Statut</td><td>Detail</td></tr>
    
                     <?php
                     foreach ($list_commandes as $key => $value) {
                         echo '<tr><td>'.$value['Date_Commande'].'</td><td>'.$value['Statut_Commande'].'</td><td><a href="'. __SITE_URL .'/membre/commande/'.$value['ID_Commande'].'" title="voir detail">Detail</a></td></tr>';
                         
                     }
                     ?>
        
</table>
        </div>