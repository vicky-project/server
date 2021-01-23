<?= $this->extend('_partial/base') ?>

<?= $this->section('default') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Sites</h1>
	<div class="float-right">
		<a href="<?= base_url('create-site') ?>" class="btn btn-sm btn-success">Create Site</a>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="table-responsive">
	    <table class="table table-striped table-sm table-hover">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Name</th>
	          <th>Location</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php if (count($sites) > 0): ?>
	      		<?php $i=1; foreach ($sites as $sites): ?>
		      		<tr>
		      			<td><?= $i++; ?></td>
		      			<td><?= $sites['name'] ?></td>
		      			<td><?= $sites['location'] ?></td>
		      			<td><a href="">Browse</a></td>
		      		</tr>
		      	<?php endforeach ?>
	      	<?php else: ?>
	      		<tr>
	      			<td colspan="4" class="text-center">No Sites available</td>
	      		</tr>
	      	<?php endif ?>
	      </tbody>
	    </table>
	  </div>
	</div>
</div>

<?= $this->endSection() ?>