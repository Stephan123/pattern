<?php 
interface audioInterface
{
    public function getAudioName();
}

class audio1 implements audioInterface
{
    private $audioName = "Audio 1";

    public function getAudioName()
    {
        return $this->audioName;
    }
}

class audio2 implements audioInterface
{
    private $audioName = "Audio 2";

    public function getAudioName()
    {
        return $this->audioName."<br>";
    }
}

class audio3 implements audioInterface
{
    private $audioName = "Audio 3";

    public function getAudioName()
    {
        return $this->audioName."<br>";
    }
}
