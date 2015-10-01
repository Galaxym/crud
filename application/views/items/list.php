<table class="itemlist">

	<!--Affichage des en-têtes de la liste-->
	<tr><td></td>
		<td><strong>ID</strong></td>
		<td id="titname"><strong>Nom</strong></td>
		<td id="titnb"><strong>No inventaire</strong></td>
		<td id="titdate"><strong>Date d'achat</strong></td>
		<td id="titwar"><strong>Durée garantie</strong></td>
	</tr>


	<?php 	foreach ($items as $item) {		?>
				
				<!--Affichage de la liste des items-->
				<tr>
				<td class="del"><a href="<?php echo site_url('stock/delete/'.$item['item_id'].'/quest'); ?>">x</a></td>
				<td><?php echo $item['item_id']?></td>
				<td class="name"><a href="<?php echo site_url('stock/update/'.$item['item_id']); ?>"><?php echo $item['item_name']?></a></td>
				<td><?php echo $item['item_inventory_nb']?></td>
				<td><?php echo $item['item_buying_date']?></td>
				<td><?php echo $item['item_warranty_duration']?>ans</td>
				</tr>

	<?php	}	?>

</table>
<br>
	<!--Propose à l'utilisateur d'ajouter un nouvel item-->
	<strong><a id="additem" href="<?php echo site_url('stock/save');?>">Ajouter un nouvel item</a></strong>
