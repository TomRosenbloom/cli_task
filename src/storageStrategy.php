<?php

class StorageStrategy {
    private $strategy = NULL;

    public function __construct($storageMethod) {
        switch ($storageMethod) {
            case "ftp":
                $this->strategy = new StoreFTP();
                break;
            case "s3":
                $this->strategy = new StoreS3();
                break;
            case "local":
                $this->strategy = new StoreLocal();
                break;
            default:
                echo "Unrecognised storage method\n";
        }
    }

    public function store($file) {
        return $this->strategy->store($file);
    }
}

interface StoreFile {
    public function store($file);
}

class StoreFTP implements StoreFile {
    public function store($file) {
        echo "Store as FTP\n";
    }
}

class StoreS3 {
    public function store($file){
        echo "Store as S3\n";
    }
}

class StoreLocal implements StoreFile {
    private $destinationPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;

    public function store($file) {
        echo "Store locally\n";
        return file_put_contents($this->destinationPath . 'html.htm', $file);
    }

}
