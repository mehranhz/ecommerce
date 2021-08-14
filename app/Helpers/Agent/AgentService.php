<?php


namespace App\Helpers\Agent;


class AgentService
{
    protected $agent ;
    public function __construct()
    {
        $this->agent = new \Jenssegers\Agent\Agent();
    }
    public  function get(){
        return $this->agent;
    }

}
