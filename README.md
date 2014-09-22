Filebrowser
===========

simple class to browse files based on SPL DirectoryIterator and FileInfo classes

Usages:
-------

  $fb = new Filebrowser("path/to/basedir/");
  
  $myFolder = $fb->getFolders()[0];

  $fb->getFiles($myFolder);


