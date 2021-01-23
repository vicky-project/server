<?= $this->extend('_partial/base') ?>

<?= $this->section('default') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Create Sites</h1>
</div>

<?php $session = session()->get('message'); if (isset($session)): ?>
	<div class="alert alert-danger" role="alert"><?= $session ?></div>
<?php endif ?>

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<form action="" method="post">
					<input type="hidden" name="action" value="save_site">
					<div class="form-group">
						<input type="text" class="form-control" name="domain_name" placeholder="Your domain name" autofocus value="<?= old('domain_name') ?>">
					</div>
					<br>
					<div class="form-group">
						<!-- <input type="file" class="form-control" name="direktory" webkitdirectory directory> -->
						<!-- <input type="text" name="yourFieldName"><input type="button" value="Browse..." onclick="this.form.yourFieldName.value=getFolder()"> -->
						<input type="text" class="form-control" name="directory" placeholder="Directory path folder" value="<?= old('directory') ?>">
					</div>
					<br>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-success" onclick="this.setAttribute('disabled', true);this.innerHTML=`<i class='fa fa-spin fa-spinner'></i> Processing...`;this.form.submit()">Send</button>
						<button type="reset" class="btn btn-sm btn-secondary">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>