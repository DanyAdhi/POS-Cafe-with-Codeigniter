<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');


class User_model extends CI_model{


	private $table 	= 'user';
	public 	$id;
	public 	$nama;
	public 	$username;
	public 	$password;
	public 	$role_id;


	public function rule(){
		return [
				[	'field'		=> 'nama',
					'label'		=> 'Nama',
					'rules'		=> 'required|rtrim',
					'errors'	=> array('required'	=> '<b>%s</b> tidak boleh kosong!')
				],
				[	'field'		=> 'username',
					'label'		=> 'Username',
					'rules'		=> 'required|rtrim|is_unique[user.username]',
					'errors'	=> array(
									'required'	=> '<b>%s</b> tidak boleh kosong!',
									'is_unique' => '<b>%s</b> sudah terdaftar.'	)
				],
				[	'field'		=> 'password1',
					'label'		=> 'Password',
					'rules'		=> 'required|rtrim|min_length[4]|matches[password2]',
					'errors'	=> array(
									'required' 		=> '<b>%s</b> tidak boleh kosong!',
									'matches'		=> '<b>%s</b> tidak cocok!',
									'min_length'	=> '<b>%s</b> minimal 4 karakter!')
				],
				[ 	'field'		=> 'password2',
					'label'		=> 'Password',
					'rules'		=> 'required|rtrim|matches[password1]'
				]

		];
	}


	public function rule_login()
	{
		return 	[
					[	
						'field'	=> 'username',
						'label'	=> 'Username',
						'rules'	=> 'required|rtrim',
						'errors'=> ['required' => '<b>%s</b> harus diisi.']
					],
					[
						'field'	=> 'password',
						'label'	=> 'Password',
						'rules'	=> 'required|rtrim',
						'errors'=> ['required' => '<b>%s</b> harus diisi']
					]

				];
	}

	public function get_all()
	{
		return $this->db->get($this->table);
	}

	public function get_by($where)
	{
		return $this->db->get_where($this->table, ['username'=> $where]);
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, ['id'=>$id]);
	}
	public function reset($id)
	{
		$reset='$2y$10$NuJpueDsXtO2jre2Dq5TXucFV8hEnOV4CLUnMAgvCpO5o2wIe6wOG';
		return $this->db->query("UPDATE user set password ='$reset' WHERE id='$id'");
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}


}


 ?>