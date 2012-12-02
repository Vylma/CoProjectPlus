
<table class="projet_table">
    <thead>
		<tr>
			<th>Code</th>
			<th>Nom</th>
			<th>Priorité</th>
		</tr>
	</thead>
    <tbody>

    <?php foreach($projets as $projet) { ?>
    <tr>
        <td><?php echo $projet->getCode(); ?></td>
        <td><a href="<?php echo WEBROOT; ?>projets/realisation/<?php echo $projet->getCode(); ?>"><?php echo $projet->getNom();?></a></td>
        <td><?php echo $projet->getPriorite(); ?></td>
    </tr>
    <?php } ?>
   

 </tbody>
</table>
