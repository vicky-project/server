<?= $this->extend('_partial/base') ?>

<?= $this->section('default') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Server</h1>
</div>

<div class="row">
	<div class="col">
		<div class="table-responsive">
	    <table class="table table-striped table-sm table-hover">
	      <thead>
	        <tr>
	          <th>No</th>
	          <th>Name</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php if (count($server) > 0): $i = 1; ?>
	      		<tr>
	      			<td><?= $i++; ?></td>
	      			<td><?= $server['name'] ?></td>
	      			<td>
	      				<?php if ($server['status']): ?>
	      					<button class="btn btn-danger btn-sm" onclick="stopApache(this)">Stop</button>
	      					<button class="btn btn-warning btn-sm" onclick="reloadApache(this)">Reload</button>
	      				<?php else: ?>
	      					<button class="btn btn-sm btn-success" onclick="startApache(this)">Start</button>
	      				<?php endif ?>
	      			</td>
	      		</tr>
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

<?= $this->section('custom_js') ?>
<script type="text/javascript">
	function startApache(btn)
	{
		btn.setAttribute('disabled', true);
		btn.innerHTML = `<i class="fa fa-spin fa-spinner"></i> Processing...`;
		fetch("http://localhost:8080/", {
			method: "POST",
			body: JSON.stringify({server: "on"})
		}).then(response => response.json()).then(data => {
			if(data.status) document.location.href="";
			else alert("Failed operation")
		})
	}

	function stopApache(btn)
	{
		btn.setAttribute('disabled', true);
		btn.innerHTML = `<i class="fa fa-spin fa-spinner"></i> Processing...`;
		fetch("http://localhost:8080/", {
			method: "POST",
			body: JSON.stringify({server: "off"})
		}).then(response => response.json()).then(data => {
			if(data.status) document.location.href="";
			else alert("Failed operation")
		})
	}

	function reloadApache(btn)
	{
		btn.setAttribute('disabled', true);
		btn.innerHTML = `<i class="fa fa-spin fa-spinner"></i> Processing...`;
		fetch("http://localhost:8080/", {
			method: "POST",
			body: JSON.stringify({server: "reload"})
		}).then(response => response.json()).then(data => {
			if(data.status) document.location.href="";
			else alert("Failed operation")
		})
	}
</script>
<?= $this->endSection() ?>