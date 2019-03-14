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

	public function __construct($lucky) {
		$this->lucky = 10 - $lucky; 
		$this->successBasePoints = 1;
		$this->failBasePoints = 10;
		$this->shuriken = $this->startShuriken = 60;
		$this->toreningu();
	}

	private function toreningu () {
		while ($this->hasShurikens()) {
			$succesu = $this->hajime();
			if ($succesu) {
				$this->izuGoaru();
			} else {
				$this->bakaDesu();
			}
		}
	}

	private function hajime() {
		$r = random_int(0,10);
		$this->shuriken--;
		return $this->lucky <= $r;
	}

	private function izuGoaru() {
		echo "Yatta !  Currentu Scolu {$this->finaluScolu}, consecutive yatta : {$this->succesiveHitu}\n";
		$this->shuriken++;
		$this->succesiveHitu++;
		$this->finaluScolu += $this->successBasePoints * $this->succesiveHitu;
		$this->succesiveFailu = 0;
	}

	private function bakaDesu() {
		echo "Baaaaaaka !!!!!!!!!!!!! Currentu Scolu {$this->finaluScolu}, consecutive yatta : {$this->succesiveFailu}\n";
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

	public function __toString() {

		$isHokage = $this->finaluScolu > 0 ? "Tsugi no kage ni narimasu !!!!! Hoy !!!!! \o/ " : "Unko desu :((";
		$ascii = $this->finaluScolu > 0 ? $this->ascii() : "";
		return "\n\n====================\nMin rand success : {$this->lucky}\n  
Success points: {$this->successBasePoints}\n
Fail Points : {$this->failBasePoints } \n
Startu Surikens : {$this->startShuriken} \n
Finaru Scoru : {$this->finaluScolu} \n
====================\n
\n\n\n{$isHokage}\n
\n{$ascii}";
	} 
}

