<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Data cadastro</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usuarios as $usuario):?>
			<tr>
				<th><?= $usuario->usuario_id  ?></th>
				<td><?= anchor('usuario/view/'.$usuario->usuario_id, $usuario->nome);?></td>
				<td><?= $usuario->email ?></td>
				<td><?= dateTimeToBr($usuario->registrado_em) ?></td>
				<td><?= btn_edit('usuario/edit/'.$usuario->usuario_id) ?></td>
				<td><?= btn_delete('usuario/delete/'.$usuario->usuario_id) ?></td>
			</tr>
		<?php endforeach  ?>
	</tbody>
</table>