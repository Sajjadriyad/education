<?php
class upload{
   protected $src;
    public $dbSrc = "uploads/";
    public $tmp;
    public $filename;
    public $type;
    public $uploadfile;
    public $dbupload;
    public  $newTargetFile;

    public function startupload($files){
        $this->src = $_SERVER['DOCUMENT_ROOT']."/education/uploads/";
        $this->filename = $files["name"];
        $this->tmp = $files["tmp_name"];
        $this->uploadfile = $this->src. basename($this -> filename);
        // file extension
        $fileType = strtolower(pathinfo($this->uploadfile, PATHINFO_EXTENSION));
        // file rename
        $filenewName =  uniqid().time().".".$fileType;
        $this->newTargetFile = $this->src.basename($filenewName);
        // dbuploadName
        $this->dbupload = $this->dbSrc.basename($filenewName);
    }
    public function uploadfile(){
        if(move_uploaded_file($this -> tmp, $this ->newTargetFile)){
            return $this->dbupload;
        }
        else{
            return $this->dbupload = "";    
        }
    }


}

?>