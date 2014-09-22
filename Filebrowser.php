<?php
	
/**
* Filebrowser
*
* This class represents a simple filebrowser implementation Based on the SPL DirectoryIterator class.
* It contains a constructor which takes 1 argument: the base Folder to initialise the file browser
* 2 methods: 
*	- getFolders: get all folders in the given path
*	- getFiles: get all files in the given path

* @author Yannick De Jonghe <yannickdejonghe@gmail.com>
* 
*/
		
	class Filebrowser {

		private $baseDir = "/";
		private $currentPath = "/";

		public function __construct($dir = "") {
			$this->baseDir = $dir;
			$this->currentPath = $this->baseDir;
		}	

		/****************************************************************
		Function returns all folders in the given subpath of the current path
		If $namesOnly = true, it only returns the names,
		If $namesOnly = false, it returns all SPL-FileInfoObjects
		***************************************************************/
		public function getFolders($path = "",$namesOnly = true) {
			$this->setPath($path,false);
			$di = new \DirectoryIterator ($this->currentPath);

			$folders = array();

			foreach ($di as $f) {
				if(!$f->isDot() && $f->isDir()) {
					if($namesOnly)
						array_push($folders,$f->getFilename());
					else
						array_push($folders,$f);
				}
			}
			return $folders;
		}

		/****************************************************************
		Function return all files in the given subpath of the current path
		If $namesOnly = true, it only returns the names,
		If $namesOnly = false, it returns all SPL-FileInfoObjects
		***************************************************************/
		public function getFiles($path = "", $namesOnly = true) {
			$this->setPath($path,false);
			$di = new \DirectoryIterator ( $this->currentPath );

			$files = array();

			foreach ($di as $f) {
				if(!$f->isDot() && $f->isFile()) {
					if($namesOnly)
						array_push($files,$f->getFilename());
					else
						array_push($files,$f);
				}
			}

			return $files;
		}


		/****************************************************************
		Function that adds $path to the current path if $overwrite = false.
		if $overwrite = true, the current path will be reset to $path
		***************************************************************/
		public function setPath($path, $overwrite = false) {
			if($overwrite) {
				$this->currentPath = $path;
			}
			else {
				while(substr($path, 0,1) == '/') {
					$path = substr($path,1);
				}

				$this->currentPath .= $path;

				if(substr($this->currentPath, -1) != '/') {
					$this->currentPath .= "/";
				}
			}
		}
	}

?>