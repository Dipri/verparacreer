<?php
include_once "../system.php";
require_once '../header.php';
?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?=$current?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="../images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="../images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content">
                                <?
                                require_once '../alert.php';
                                ?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Recorrido</a></th>
                                        <th class="table-header-repeat line-left minwidth-1"><a>Fecha</a></th>
                                        <th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
                                <?
                                $evento = new Evento();
                                $eventos = $evento->getAll();
                                /*var_dump($rubros);*/
                                for ($i=0;$i<count($eventos);$i++)
                                {
                                ?>
				<tr>
                                    <td></td>
                                    <td>
                                    <?
                                        $recorrido = new Lugar($eventos[$i]->lugar);
                                        echo htmlentities($recorrido->nombre);
                                    ?>
                                    </td>
                                    <td>
                                        <?
                                            /*$fecha = date_parse($eventos[$i]->fechahora);*/
                                            $fecha = getdate(strtotime($eventos[$i]->fechahora));
                                            echo $fecha["mday"]."/".$fecha["mon"]?>
                                    </td>
                                    <td class="options-width">
                                        <a href="listado.php?id=<?=$eventos[$i]->id?>" title="Listar Usuarios" class="icon-5 info-tooltip"></a>
                                        <a href="invite.php?id=<?=$eventos[$i]->id?>" title="Invitar Usuarios" class="icon-6 info-tooltip"></a>
                                        <a href="form.php?id=<?=$eventos[$i]->id?>" title="Editar" class="icon-1 info-tooltip"></a>
                                        <a href="actions.php?action=delete&id=<?=$eventos[$i]->id?>" title="Borrar" class="icon-2 info-tooltip"></a>
                                        <a href="actions.php?action=drop&id=<?=$eventos[$i]->id?>" title="Vaciar lista de invitados." class="icon-2 info-tooltip"></a>
                                    </td>
				</tr>
                                <?
                                }
                                ?>
				</table>
				<!--  end product-table................................... -->
				</form>
			</div>
			<!--  end content-table  -->

			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
                                    <a href="form.php" class="action-edit">Nuevo</a>
				</div>
			</div>
			<!-- end actions-box........... -->

			<!--  start paging..................................................... -->
			<!--
                        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
			</td>
			</tr>
			</table>
                        -->
			<!--  end paging................ -->

			

		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
</div>
<!--  end content -->

</div>
<?php
require_once '../footer.php';
?>
