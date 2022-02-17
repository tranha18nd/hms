<?php
include ('model.php');
date_default_timezone_set("Asia/Ho_Chi_Minh");
class cHms {
		public function cGetModel(){
		$all = new mHms();
		$result = $all->mGetModel();
		return $result;
	}

	public function cModel(){
		$all = new mHms();
		$result = $all->mModel();
		return $result;
	}
	
	public function cModelBT(){
		$all = new mHms();
		$result = $all->mModelBT();
		return $result;
	}
	public function cGetSubCode(){
		$all = new mHms();
		$result = $all->mGetSubCode();
		return $result;
	}
	public function cXe(){
		$all = new mHms();
		$result = $all->mXe();
		return $result;
	}

	public function cStatus(){
		$all = new mHms();
		$result = $all->mStatus();
		return $result;
	}
	public function cStatusIm(){
		$all = new mHms();
		$result = $all->mStatusIm();
		return $result;
	}
	public function cStatusEx(){
		$all = new mHms();
		$result = $all->mStatusEx();
		return $result;
	}
	
	public function cSt(){
		$all = new mHms();
		$result = $all->mSt();
		return $result;
	}
	public function cGetModelLine(){
		$all = new mHms();
		$result = $all->mGetModelLine();
		return $result;
	}

	public function user($user,$pass){
		$all = new mHms();
		$result = $all->getUser($user,$pass);
		if ($result) {
			$_SESSION['success'] = 'Login Success';
			$_SESSION['user'] = $result->name;
			$_SESSION['id'] = $result->manv;
			$_SESSION['role'] = $result->roler;
			$_SESSION['type'] = $result->Type;
			$_SESSION['direct'] = $result->Direct;
			$sTime = date("Y-m-d h:i:s");
			$token = $result->manv.$sTime;
			setcookie('token', md5($token),time()+7*24*3600);
			$all->mUpToken($token,$user);
			if (isset($_SESSION['logError'])) {
				unset($_SESSION['logError']);
						}
			header('Location:index.php');
			exit();

		}else {
			echo '<script>alert("Sai Thông Tin Tài Khoản");</script>';
		}
	}

	public function edit($user,$pass,$newPass){
		$all = new mHms();
		$result = $all->getUser($user,$pass);
		echo $user;
		if ($result) {
				$all->mEdit($user,$newPass);
				echo '<script>alert("Đổi Mật Khẩu Thành Công");</script>';
				unset($_SESSION['id']);
				session_unset();
				session_destroy();
				header("Location:login.php");
			exit();
		}else {
			echo '<script>alert("Sai Thông Tin Tài Khoản");</script>';
		}
	}

	
	public function cSmartBt(){
		$all = new mHms();
		$result = $all->mSmartBt();
		return $result;
	}
	public function cSmartSt(){
		$all = new mHms();
		$result = $all->mSmartSt();
		return $result;
	}
	public function cSmartIl(){
		$all = new mHms();
		$result = $all->mSmartIl();
		return $result;
	}
	public function cSmartFd(){
		$all = new mHms();
		$result = $all->mSmartFd();
		return $result;
	}
	public function cSmartFd1(){
		$all = new mHms2();
		$result = $all->mSmartFd1();
		return $result;
	}
	public function cSmartFd2(){
		$all = new mHms3();
		$result = $all->mSmartFd2();
		return $result;
	}
	public function cBackData(){
		$all = new mHms();
		$data = $all->mGetCodeErr();
		foreach ($data as $key) {
			$all->mBackData($key->subCode,$key->qty);
			echo $key->subCode.' : '.$key->qty;
			echo '<br>';
		}
	}
}
?>