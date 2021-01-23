<?php
namespace App\Libraries;

/**
 * Apache
 */
class Apache
{
	protected $status = "service apache2 status";

	public function getStatus() : bool
	{
		$shell = shell_exec($this->status);
		if (strpos($shell, "dead")) {
			return false;
		} elseif (strpos($shell, "running")) {
			return true;
		}
	}

	public function startServer() : bool
	{
		$exec = "service apache2 start";
		exec($exec, $output);
		if($output) {
			return false;
		} else {
			return true;
		}
	}

	public function stopServer() : bool
	{
		$exec = "service apache2 stop";
		exec($exec, $output);
		if($output) {
			return false;
		} else {
			return true;
		}
	}

	public function reloadServer()
	{
		$exec = "service apache2 reload";
		exec($exec, $output);
		if($output) {
			return false;
		} else {
			return true;
		}
	}
}