<?php

class Interpretor {
    private $controller;
    private $action;
    private $urlvalues;
    private $action2 = "";
    private $action3 = "";
    //store the URL values on object creation
    
    
    public function __construct($urlvalues)
    {
        $this->urlvalues = $urlvalues;
//        foreach ($urlvalues as $key => $value){
//         echo("Key:" . $key . " Value: " . $value . "\n");
//        }
        if ($this->urlvalues['controller'] == "")
        {
 //           echo("No controller");
            $this->controller = "show";
        } //if no controller set in URL, default to show page
        else
        {
            $this->controller = $this->urlvalues['controller'];
        }  
        if ($this->urlvalues['action'] == "")
        {
//            echo("No Action \n");
            $this->action = "index";
        } // if no action set, default to Index page
        else
        {
            $this->action = $this->urlvalues['action'];  // Only want actions 2 and 3 set if action is set.
            $this->action2 = $this->urlvalues['action2'];
            $this->action3 = $this->urlvalues['action3'];
        }
    }
    
    
    //instantiate the requested controller as an object
    public function CreateController()
    {
        //does the class exist?
        if (class_exists($this->controller))
        {
 //           echo("Controller: " . $this->controller . "\n");
            $parents = class_parents($this->controller);
            //does the class extend the controller class?
            if (in_array("BaseController",$parents))
            {
  //              echo("Action: " . $this->action . "\n");
                //does the class contain the requested method?
                if (method_exists($this->controller,$this->controller))
                {
                    return new $this->controller($this->controller, $this->action, $this->action2, $this->action3);
                }  //for this app, the controller and the action always have the same name
                else
                {
//                    echo("Method does not exist");
                    return new $this->controller('show', '404');
                }
            }
            else
            {
 //               echo("Not in array \n");
                return new $this->controller('show', '404');
            }
        }
        else
        {
  //          echo("Controller not found \n");
            return new show('show', '404');
        }  //If anything isn't set right, return the 404 page
    }
}

?>