<div class="span9">
    <div class="well" >

        <div class="modal-body" >
<table class="table">
    <tr><td>
            Date
        </td>
        <td>Statut</td><td>Detail</td></tr>
    
                     <?php
                        echo $commandes;
                     ?>
        
</table>
            
        </div>
        <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Titre de la modale</h3>
     </div>
     <div class="modal-body"></div>
</div>