<?php
    class Replace {
        public $string = array(',','(',')',' ','^','$','/');
        public $unstring = array('-');
        public function CleanUrl($kalimat)
        {
            $k = strtolower(str_replace($this->string,'-',$kalimat));
            return $k;
        }
        
        public function UnCleanUrl($kalimat)
        {
            $k = str_replace($this->unstring,' ',$kalimat);
            return $k;
        }

        public function NamaFile($kalimat)
        {
            $k = strtolower(str_replace($this->string,'_',$kalimat));
            return $k;
        }
    }
?>