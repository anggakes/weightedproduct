<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		 DB::table('status_nilai_gap')->delete();
         //insert some dummy records
		 $data=array();

		 for($i=4;$i>-4;$i--){
		 	$insert['selisih'] = $i;
		 	$insert['status'] = ($i>=0) ? "V":"X";

		 	if($i>0){
		 		$insert['keterangan'] = "Memenuhi Syarat Kelebihan $i Tingkat";
		 	}else if($i<0){
		 		$minus = $i*-1;
		 		$insert['keterangan'] = "Memenuhi Syarat Kekurangan $minus Tingkat";
		 	}else{
		 		$insert['keterangan'] = "Memenuhi Syarat Minimal";
		 	}

		 	array_push($data,$insert);
		 }

         DB::table('status_nilai_gap')->insert($data);

         DB::table('bobot_nilai_gap')->delete();
         //insert some dummy records
		 $data=array();
		 $insert=array();

		 $bobot =6;
		 $selisih = 0;
		 for($i=1;$i<=11;$i++){
		 	
		 	$insert['bobot'] = $bobot;
			$tingkat = $selisih;
		 	if($i%2!=0 and $i!=1){
		 		$insert['keterangan'] ="Kompetensi Individu Kekurangan $tingkat tingkat/level" ;
		 	}elseif($i%2==0 and $i!=1){
		 		$insert['keterangan'] ="Kompetensi Individu Kelebihan $tingkat tingkat/level" ;
		 	}else{
		 		$insert['keterangan'] ="Kompetensi sesuai dengan yang dibutuhkan" ;
		 	}

		 	
		 	
		 	if($i%2==0){
		 		$insert['selisih'] = $selisih;
		 	}else{
		 		$insert['selisih'] = $selisih * -1;
		 		$selisih++;
		 	}
		 	
		 	if($selisih ==0){
		 		$selisih++;
		 	}

		 	$bobot-=0.5;
		 	array_push($data,$insert);
		 }

         DB::table('bobot_nilai_gap')->insert($data);



	}

}
