<?php $this->load->view('components/page_head') ?>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor('usuario', '<i class="fa fa-address-book-o"></i>', array('class' => 'navbar-brand')); ?>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><?php echo anchor('usuario/add', 'Adicionar'); ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php 
$types = ['success' => 'alert-success','info' => 'alert-info','warning' => 'alert-warning',
'danger' => 'alert-danger'];
foreach ($types as $key => $value) {
  if($this->session->flashdata($key)){ ?>
  <div class="alert <?php echo $value ?>" role="alert"><?=$this->session->flashdata($key) ?></div>
  <?php }} ?>
  <?php load_content_view($part = NULL) ?>
  <?php $this->load->view('components/page_end') ?>