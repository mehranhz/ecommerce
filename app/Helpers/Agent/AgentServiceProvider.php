<?php


namespace App\Helpers\Agent;


use Illuminate\Support\ServiceProvider;

class AgentServiceProvider extends ServiceProvider
{
public function register()
{
   $this->app->singleton('agent',function (){
       return new AgentService();
   });
}
}
