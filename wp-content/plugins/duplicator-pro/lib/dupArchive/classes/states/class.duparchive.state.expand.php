<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__).'/class.duparchive.state.base.php');

class DupArchiveValidationTypes
{
    const None = 0;
    const Standard = 1;
    const Full = 2;
        
}

abstract class DupArchiveExpandState extends DupArchiveStateBase
{
    public $archiveHeader = null;
    public $currentFileHeader= null;
    public $validateOnly= false;
    public $validationType = DupArchiveValidationTypes::Full;
    public $fileWriteCount = 0;
    public $directoryWriteCount = 0;
    public $expectedFileCount = -1;
    public $expectedDirectoryCount = -1;

    public function resetForFile()
    {
        $this->currentFileHeader = null;
        $this->currentFileOffset = 0;
    }
}