<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FileUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $nameParts = pathinfo($file->getClientOriginalName());
        $fileName = $nameParts['filename'] . "_" . md5(uniqid()) . '.' . $file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

    public function chunkedUpload()
    {
        $temp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(!(isset($_GET['resumableIdentifier']) && trim($_GET['resumableIdentifier'])!='')){
                $_GET['resumableIdentifier']='';
            }
            $temp_dir = $temp_dir . $_GET['resumableIdentifier'];

            if(!(isset($_GET['resumableFilename']) && trim($_GET['resumableFilename'])!='')){
                $_GET['resumableFilename']='';
            }

            if(!(isset($_GET['resumableChunkNumber']) && trim($_GET['resumableChunkNumber'])!='')){
                $_GET['resumableChunkNumber']='';
            }

            $chunk_file = $temp_dir.'/'.$_GET['resumableFilename'].'.part'.$_GET['resumableChunkNumber'];
            if (file_exists($chunk_file)) {
                header("HTTP/1.0 200 Ok");
            } else {
                header("HTTP/1.0 404 Not Found");
            }
        }

        if (!empty($_FILES)) foreach ($_FILES as $file) {
            if ($file['error'] != 0) {
               return false;
            }

            if(isset($_POST['resumableIdentifier']) && trim($_POST['resumableIdentifier'])!=''){
                $temp_dir = $temp_dir . '/' .$_POST['resumableIdentifier'];
            }
            $dest_file = $temp_dir.'/'.$_POST['resumableFilename'].'.part'.$_POST['resumableChunkNumber'];

            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777, true);
            }

            if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                return false;
            } else {
                return $this->createFileFromChunks($temp_dir, $_POST['resumableFilename'], $_POST['resumableTotalSize'], $_POST['resumableTotalChunks']);
            }
        }

        return true;
    }

    /**
     *
     * Check if all the parts exist, and
     * gather all the parts of the file together
     * @param string $temp_dir - the temporary directory holding all the parts of the file
     * @param string $fileName - the original file name
     * @param string $totalSize - original file size (in bytes)
     */
    public function createFileFromChunks($temp_dir, $fileName, $totalSize, $total_files)
    {
        $total_files_on_server_size = 0;
        foreach(scandir($temp_dir) as $file) {
            $temp_total = $total_files_on_server_size;
            $tempfilesize = filesize($temp_dir.'/'.$file);
            $total_files_on_server_size = $temp_total + $tempfilesize;
        }

        if ($total_files_on_server_size >= $totalSize) {
            if (($fp = fopen($this->getTargetDir() . $fileName, 'w')) !== false) {
                for ($i=1; $i<=$total_files; $i++) {
                    fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                }
                fclose($fp);
                return 1;
            } else {
                $this->validationFail('bad_request','Cannot create destination file.');
                return false;
            }

            if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                $this->rrmdir($temp_dir.'_UNUSED');
            } else {
                $this->rrmdir($temp_dir);
            }
        }

        return true;
    }

    /**
     *
     * Delete a directory RECURSIVELY
     * @param string $dir - directory path
     * @link http://php.net/manual/en/function.rmdir.php
     */
    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") {
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
}
