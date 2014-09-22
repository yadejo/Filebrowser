Filebrowser
===========

simple class to browse files based on SPL DirectoryIterator and FileInfo classes

Usages:
-------

Create a new Filebrowser-instance:

  $fb = new Filebrowser("path/to/basedir/");

Set myFolder to the first folder found by Filebrowser
  
  $myFolder = $fb->getFolders()[0];

Find all files in myFolder

  $fb->getFiles($myFolder);


