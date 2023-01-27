<?php
/**
 * login controller
 */
class Login extends Controller
{
	
	function index()
	{
		// code...
		$errors = array();

		if(count($_POST) > 0)
 		{
 			$errors['post']= $_POST;

 			$user = new User();
 			if($row = $user->where('username',$_POST['username']))
 			{
 				$row = $row[0];
 				if($_POST['password']==$row->password)
 				{
 					Auth::authenticate($row);
 					$this->redirect('cashiers');	
 				}
  			
 			}
  			
  			$errors['email'] = "Wrong email or password";

 		}

		$this->view('login',[
			'errors'=>$errors,
		]);
	}	
}