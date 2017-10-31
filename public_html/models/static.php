<?php

class Show extends BaseController
{
    
    public function __construct($action, $urlvalues, $action2 = "", $action3 = "") {
        $this->action = $action;
        $this->urlvalues = $urlvalues;
        $this->action2 = $action2;
        $this->action3 = $action3;
    }
    
    private function Header($action)
    {
        $template= new Template();
        $template->file = "/home/dyn/www.lockeythings.com/public_html/views/templates/header.html";
        $db = new Database;
        $querystring = "select * from Pages where url = '" . $action . "';";
   //     echo($querystring);
        $results = $db -> select($querystring . ";");
        $template->vars = $results[0];
  //      foreach ($results[0] as $key => $value){
    //        echo("Key: " . $key . " Value: " . $value . "\n");
      //  }
        $template->display();
    }
    
    private function MainSection($action)
    {

            $template= new Template();
            $template->file = "/home/dyn/www.lockeythings.com/public_html/views/templates/" . $action . ".html";
         
            $template->display();
         

    }
    
    private function Footer()
    {
        $template= new Template();
        $template->file = "/home/dyn/www.lockeythings.com/public_html/views/templates/footer.html";
        $template->display();
    }
    
    public function Show($urlvalue)
    {
     //   echo("Show Urlvalue: " . $urlvalue . " thisurlvalue: " .  $this->urlvalues . " thisaction: " . $this->action .  "\n" );
        Show::Header($urlvalue);
        Show::MainSection($urlvalue);
        Show::Footer();
    }
    
}




?>