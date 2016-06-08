<?php
	echo "<h2> crear Viaje</h2>
		 <form method='POST' action=''><div style='float:left;'>
			<div>Precio<input type='text' name='precio'></input></div>
			<div>Comienzo<input type='text' name='comienzo'></input></div>
			<div>Fin<input type='text' name='fin'></input></div>
			<div style='float:left;'><div style='float:left;'>Observaciones</div><div style='float:right;'><textarea rows=5 cols=25 name='observaciones'></textarea></div></div>
			</br></br></br></br></br></br></br></br><div><input type='submit' name='crear viaje' ></input></div>
		 </div></br></form>";
	if($_REQUEST['precio']!='' && $_REQUEST['comienzo']!='' && $_REQUEST['fin']!='' && $_REQUEST['observaciones']!=''){
		$rv="insert into vi_viaje(fecha_comienzo, fecha_fin,precio, observaciones, estado_logico) values('".$_REQUEST['comienzo']."','".$_REQUEST['fin']."','".$_REQUEST['precio']."','".$_REQUEST['observaciones']."','1')"; 
		$qv=mysql_query($rv);	
	}
	else{
		echo "<p class='error'>LLene los campos para crear un viaje, todos son opbligatorios, muchas gracias</p>";
	}
	$rd="select id_orden_despachos, observaciones from vi_orden_despacho";
	$qd=mysql_query($rd);
	$id=$wd['id_orden_despachos'];
	$rt= "select id_viaje, observaciones from vi_viaje";
	$qt=mysql_query($rt);
	echo "<form method='POST' action=''><div style='float:right;'>
	<select name='viajes'>
		<option value='0'>TODOS LOS VIAJES</option>";
	while($wt=mysql_fetch_assoc($qt)){
		echo "<option value='".$_REQUEST[$wt['id_viaje']]."'>".$_REQUEST[$wt['observaciones']]."</option>";
	}
	echo "</select>";
	while($wd=mysql_fetch_assoc($qd)){
		$obs1=explode('.', $wd['observaciones']);
		$obs=$obs1[0].' '.$obs1[1];
		echo "<div><input type='checkbox'name='viaje' value='".$wd['id_orden_despachos']."'>".$obs."</input></div>";
	}
	echo "<input type=submit value='agregar a viaje' name='agregar a viaje'/></div></form>";
	echo $rv;
	echo $_REQUEST['observaciones'].$_REQUEST['precio'].$_REQUEST['fin'].$_REQUEST['cominezo'];
	if(isset($_REQUEST['viaje'])){
			$ru="update vi_orden_despacho SET id_viaje='".$_REQUEST['viajes']."'";
			$qu=mysql_query($ru);
	}
	
?>
