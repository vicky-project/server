<?php
namespace App\Controllers;

use App\Models\Default_model;
use App\Libraries\Apache;

/**
 * Server Site Controller
 */
class Server extends BaseController
{
	protected $apache;

	public function __construct()
	{
		$this->apache = new Apache;
	}

	public function index()
	{
		if($this->request->getJson()) {
			return $this->_handlePost();
		}
		$data = [
			'title'	=> 'Sites Management',
			'server'	=>  [
				'name'	=> 'Apache',
				'status'=> $this->apache->getStatus()
			],
			'addJs'	=> 'custom_js'
		];

		return view('server/index', $data);
	}

	public function site()
	{
		$data = [
			'title'	=> 'Sites Management',
			'sites'	=>  $this->_getSites()
		];

		return view('sites/index', $data);
	}

	public function create_site()
	{
		if ($this->request->getPost()) {
			return $this->_handlePost();
		}
		$data = [
			'title'	=> 'Create Site'
		];
		return view('sites/create', $data);
	}

	private function _handlePost()
	{
		$json = $this->request->getJson();
		$action = $this->request->getPost("action");
		if($json && $json->server) {
			switch ($json->server) {
				case 'on':
					if($this->apache->startServer()) {
						echo json_encode(["status"=>true], JSON_PRETTY_PRINT);
					} else {
						echo json_encode(["status"=>false], JSON_PRETTY_PRINT);
					}
					exit;
					break;
				case 'off':
					if($this->apache->stopServer()) {
						echo json_encode(["status"=>true], JSON_PRETTY_PRINT);
					} else {
						echo json_encode(["status"=>false], JSON_PRETTY_PRINT);
					}
					exit;
					break;
				case 'reload':
					if($this->apache->reloadServer()) {
						echo json_encode(["status"=>true], JSON_PRETTY_PRINT);
					} else {
						echo json_encode(["status"=>false], JSON_PRETTY_PRINT);
					}
					exit;
					break;
				default:
					break;
			}
		}
		if($action) {
			switch ($action) {
				case 'save_site':
					$post = $this->request->getPost();
					unset($post['action']);
					foreach ($post as $key => $value) {
						if(empty($value)) {
							return redirect()->back()->withInput()->with("message", sprintf("%s tidak boleh kosong", $key));
						}
					}
					if(!is_dir($post['directory'])) {
						if(!is_file($post['directory'])) {
							return redirect()->back()->withInput()->with("message", sprintf("direktory <strong>%s</strong> tidak ditemukan.", $post['directory']));
						}
					}
					$model = new Default_model;
					return;
					break;
				// cas
				default:
					break;
			}
		}
	}

	private function _getFileHosts()
	{
		$handle = fopen("/etc/hosts", "r");
		if ($handle) {
			$lines = [];
	    while (($line = fgets($handle)) !== false) {
	        // process the line read.
	    	$get = between_str("127.0.0.1\t", "\n", $line);
	    	if($get) {
	    		$lines[] = $get;
	    	}
	    }
	    fclose($handle);
	    return $lines;
		} else {
		    // error opening the file.
			dd($handle);
		} 
	}

	private function _getSites()
	{
		$model = new Default_model;
		$model->setTable('sites');
		$result = [];
		if($model->countAll() > 0) {
			$result = $model->findAll();
		}
		return $result;
	}
}