<ul class="list-group">
	<li class="list-group-item"><strong>Nome: </strong><?= $usuario->nome ?></li>
	<li class="list-group-item"><strong>E-mail: </strong><?= $usuario->email ?></li>
	<li class="list-group-item"><strong>Registrado em: </strong><?= dateTimeToBr($usuario->registrado_em) ?></li>
</ul>