<div class="container-fluid">
	<?php echo validation_errors(); ?>
	<?php echo form_open('usuario/add'); ?>
	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" value="<?= set_value('nome') ?>" class="form-control" placeholder="Digite seu primeiro nome">
	</div><!-- form-group -->
	<div class="form-group">
		<label for="email">E-mail:</label>
		<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Digite seu melhor e-mail">
	</div><!-- form-group -->
	<div class="form-group">
		<label for="senha">Senha:</label>
		<input type="password" name="senha" value="<?= set_value('senha') ?>" class="form-control" placeholder="Digite uma boa senha">
	</div><!-- form-group -->
	<div class="form-group">
		<label for="senha">Confirmar senha:</label>
		<input type="password" name="senhaconf" value="<?= set_value('senhaconf') ?>" class="form-control" placeholder="Digite a senha novamente">
	</div><!-- form-group -->
	<button type="submit" name="submit" class="btn btn-success">Salvar</button>
</form>
</div><!-- /container-fluid -->