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
<table style="width:80%;margin:0 auto">
	<tr>
		<td><img src="<?php echo base_url('assets/images/TSU.png')?>" style="width:100px;float:right"></td>
		<td style="text-align:center">
			<p>Republic of the Philippines</p>
			<p>TARLAC STATE UNIVERSITY</p>
			<p>OFFICE OF THE VICE PRESIDENT FOR ACADEMIC AFFAIRS</p>
			<p>Tarlac City</p>
		</td>
	</tr>
</table>
<hr>

<?php if($dates):?>
	<?php foreach ($dates as $key => $value):
		$count = 0;
	?>
		<?php if(count($value) > 0):?>
			
			
			<table style="width:100%">
				<tr>
					<td><small>To: <?php echo $printfor->dean;?></small></td>
					<td><small><?php echo $printfor->name;?></small></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><small>Time: <?php echo $dates[$key][$count]->time;?> (<?php echo $dates[$key][$count]->period;?> Period)</small></td>
					<td>Monitored By : <?php echo ucwords($dates[$key][$count]->checker);?></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<h4>Date <?php echo $key;?></h4>
			<table class="data">
				<tr>
					<td>Room</td>
					<td>Faculty Assigned</td>
					<td>Status</td>
					<td>Checked By:</td>
				</tr>
			<?php foreach ($value as $k => $rd):?>
					<tr>
						<td><?php echo $rd->roomcode;?></td>
						<td><?php echo $rd->firstname.' '.$rd->lastname;?></td>
						<td><?php echo $rd->status;?></td>
						<td><?php echo $rd->checker;?></td>
					</tr>
			<?php $count++;endforeach;?>
			</table>
			<br>
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>
