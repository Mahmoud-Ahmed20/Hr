<?php

	define('PAGINATION_COUNT', 10);
	define('PAGINATION_COUNT_FRONT', 20);

	function uploadIamge($file, $folder){

		$path = public_path();
		$destinationPath = $path . '/admin/assets/images/' . $folder . '/'; // upload path
		$photo = $file;
		$extension = $photo->getClientOriginalExtension(); // getting image extension
		$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
		$photo->move($destinationPath, $name); // uploading file to given path
		$fileName = 'admin/assets/images/' . $folder . '/' . $name;
		return $fileName;

	}

	function uploadIamges($photos, $folder){
		$images = [];
		foreach ($photos as $photo){
			$path = public_path();
			$destinationPath = $path . '/admin/assets/images/' . $folder . '/'; // upload path
			$extension = $photo->getClientOriginalExtension(); // getting image extension
			$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
			$photo->move($destinationPath, $name); // uploading file to given path
			$images[]= 'admin/assets/images/' . $folder . '/' . $name;
		}
		$files = implode(",", $images);
		return $files;

	}

	function learningStages(){
		$val [] = [
			'id' => 1,
			'name' => 'ابتدائي / Elementary',
		];
		$val [] = [
			'id' => 2,
			'name' => 'إعدادي / Intermediate',
		];
		$val [] = [
			'id' => 3,
			'name' => 'ثانوي / ElementarSecondary',
		];
		$val [] = [
			'id' => 4,
			'name' => 'دبلوم بعد الثانوية / High scholl',
		];
		$val [] = [
			'id' => 5,
			'name' => 'الجامعة / University',
		];
		$val [] = [
			'id' => 6,
			'name' => 'دراسات عليا / Post graduation',
		];
		return $val;
	}

	function languages(){
		$valEn [] = [
			'id' => 1,
			'name' => 'العربية / Arabic',
		];
		$valEn [] = [
			'id' => 2,
			'name' => 'الانجليزية / English',
		];
		return $valEn;
	}
