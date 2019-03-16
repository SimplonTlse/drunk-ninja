<?php namespace Nindo;


class Nindo {

	private $shuriken;
	private $lucky;
	private $successBasePoints;
	private $failBasePoints;
	private $finaluScolu = 0;
	private $kinkouyousanjousuu;
	private $succesiveHitu;
	private $succesiveFailu;
	private $startShuriken;
	private $launches = 0;
	private $logged;

	public function __construct($efficiency = 70, $shurikens = 60, $successPoints = 1, $failPoints = 10) {
		$this->lucky = 100 - $efficiency; 
		$this->successBasePoints = $successPoints;
		$this->failBasePoints = $failPoints;
		$this->shuriken = $this->startShuriken = $shurikens;
		$this->toreningu();
	}

	private function toreningu () {
		while ($this->hasShurikens()) {
			$succesu = $this->hajime();
			$this->launches++;
			if ($succesu) {
				$this->izuGoaru();
			} else {
				$this->bakaDesu();
			}
		}
	}

	private function hajime() {
		$r = random_int(0,100);
		$this->shuriken--;
		return $this->lucky <= $r;
	}

	private function izuGoaru() {
		$this->log("Yatta !  Currentu Scolu {$this->finaluScolu}, consecutive yatta : {$this->succesiveHitu}", true);
		$this->shuriken++;
		$this->succesiveHitu++;
		$this->finaluScolu += $this->successBasePoints * $this->succesiveHitu;
		$this->succesiveFailu = 0;
	}

	private function bakaDesu() {
		$this->log("Baaaaaaka !!!!!!! Currentu Scolu {$this->finaluScolu}, consecutive yatta : {$this->succesiveFailu}", false);
		$this->succesiveFailu++;
		$this->finaluScolu -= $this->failBasePoints * $this->succesiveFailu;
		$this->succesiveHitu = 0;
	}

	private function hasShurikens(){
		return $this->shuriken > 0;
	}

	private function ascii() {
		return file_get_contents(base_path("naruto.txt"));
	}

	private function log($msg, $success) {
		$this->logged[] = (object)["msg"=>$msg, "success"=>$success];
	}

	public function hasWon() {
		return $this->finaluScolu > 0;
	}

	public function getLog() {
		return $this->logged;
	}

	public function __toString() {

		return join("\n",[
			"====================",
			"Min rand success : {$this->lucky}",  
			"Success points: {$this->successBasePoints}",
			"Fail Points : {$this->failBasePoints } ",
			"Startu Surikens : {$this->startShuriken} ",
			"Launched Surikens : {$this->launches} ",
			"====================",
			"Finaru Scoru : {$this->finaluScolu} ",
			"====================",
			"\n\n",
			$this->finaluScolu > 0 ? "\o/ Tsugi no kage ni narimasu !!! Hoy !!!" : "Unko desu :(("
		]);

	} 
}

