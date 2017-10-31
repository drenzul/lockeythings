<?php

abstract class BaseController {
    protected $urlvalues;
    protected $action;
    public function __construct($action, $urlvalues, $action2="", $action3="") {
        $this->action = $action;
        $this->urlvalues = $urlvalues;
       $this->action2 = $action2;
       $this->action3 = $action3;
    }
    public function ExecuteAction() {
 //     echo("EA Action: " . $this->action . " URLVALUES: " . $this->urlvalues . " Action 2: " .  $this->action2 . "\n");
        return $this->{$this->action}($this->urlvalues, $this->action2, $this->action3);
    }

}

?>