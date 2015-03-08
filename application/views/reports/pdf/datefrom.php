<style type="text/css">
	table.data{
		border-collapse: collapse;
		border:1px solid #000;width:100%
	}
	table.data tr td{
		border:1px solid #000;
		padding: 2px 5px;
	}
</style>
<table style="width:55%;margin:0 auto">
	<tr>
		<td><img src="<?php echo base_url('assets/images/TSU.png')?>" style="width:100px;float:right"></td>
		<td style="text-align:center">
			<p>Republic of the Philippines</p>
			<p>TARLAC STATE UNIVERSITY</p>
			<p><?php echo $printfor->name;?></p>
			<p>Tarlac City</p>
		</td>
	</tr>
</table>
<hr>
<?php if($dates):?>
		<table style="width:100%">
			<tr>
				<td>Dean: <?php echo ucwords(strtolower($printfor->dean));?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	<?php foreach ($dates as $key => $value):
		$count = 0;
	?>
		<?php if(count($value) > 0):
			$time = strtotime($key);
		?>
			<h4>Date: <?php echo date('d-M-Y');?></h4>
			<table class="data">
				<tr>
					<td>Room</td>
					<td>Faculty Assigned</td>
					<td>Schedule</td>
					<td>Status</td>
					<td>Checked By:</td>
				</tr>
			<?php foreach ($value as $k => $rd):?>
					<tr>
						<td><?php echo $rd->roomcode;?></td>
						<td><?php echo $rd->firstname.' '.$rd->lastname;?></td>
						<td><?php echo $rd->day.' '.$rd->time;?></td>
						<td><?php echo $rd->status;?></td>
						<td><?php echo $rd->checker;?></td>
					</tr>
			<?php $count++;endforeach;?>
			</table>
			<br>
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>
