<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.plan{
			border: 1px dotted #000;
			opacity: 0.80;
		}
		.plan:hover{
			border: 1px dotted yellow;
			cursor: pointer;
			opacity: 1;
		}
	</style>
	<table width="100%" cellspacing=0 cellpadding=0 style="border:1px;margin:0px;padding:0px;">
		<?php $cont=1; ?>
		<?php for($i=0;$i<6;$i++){ ?>
		<tr>
			<?php for($j=0;$j<4;$j++){ ?>
			<td width="25%">
				<img 
					src="<?php echo "plan".$cont.".png" ?>" 
					width="100%"
					class="plan"
				>
				<?php $cont++; ?>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
</body>
</html>