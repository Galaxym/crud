<?php echo validation_errors(); ?>

<!--Formulaire d'un item à modifier-->
<?php   if(isset($item['item_name']) && !empty($item['item_name']))
		{ ?>

			<?php echo form_open('stock/save/'. $item['item_id']); ?>

			<table class="formadd">
				<tr>
					<td><label for="item_name">Nom :</label></td>
					<td><input type="text" name="item_name" value="<?php echo $item['item_name']; ?>"></td>
				</tr>
				<tr>
					<td><label for="item_inventory_nb">No d'inventaire :</label></td>
					<td><input type="text" name="item_inventory_nb" value="<?php echo $item['item_inventory_nb']; ?>"></td>
				</tr>
				<tr>
					<td><label for="item_buying_date">Date d'achat :</label></td>
					<td><input type="text" name="item_buying_date" value="<?php echo $item['item_buying_date']; ?>"></td>
				</tr>
				<tr>
					<td><label for="item_warranty_duration">Durée de garantie :</label></td>
					<td><input type="text" name="item_warranty_duration" value="<?php echo $item['item_warranty_duration']; ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit_but" value="Enregistrer"></td>
				</tr>
			</table>

			</form>

<?php   }
		else
		{ ?>
  			
  			<!--Formulaire d'un item à créer-->
			<?php echo form_open('stock/save'); ?>
			
			<table class="formadd">
				<tr>
					<td><label for="item_name">Nom :</label></td>
					<td><input type="text" name="item_name"></td>
				</tr>
				<tr>
					<td><label for="item_inventory_nb">No d'inventaire :</label></td>
					<td><input type="text" name="item_inventory_nb"></td>
				</tr>
				<tr>
					<td><label for="item_buying_date">Date d'achat :</label></td>
					<td><input type="text" name="item_buying_date"></td>
				</tr>
				<tr>
					<td><label for="item_warranty_duration">Durée de garantie :</label></td>
					<td><input type="text" name="item_warranty_duration"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit_but" value="Enregistrer"></td>
				</tr>
			</table>

			</form>




<?php   } ?>
