<?php

class Template
{
    public $file;
    public $vars=array();
    
    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }
    
    public function display()
    {
        
        try
        {
            if(file_exists($this->file))
            {
                
                $output = file_get_contents($this->file);
                
            }
            else
            {
 //               echo("Trying to get: " . $this->file . "\n");
                $this->$vars['title'] = 'Page not found';
                $this->$vars['description'] = 'This page was not found!';
                $output = file_get_contents("/home/dyn/www.lockeythings.com/public_html/views/templates/404.html");
                
            }
            
            foreach ($this->vars as $key => $value){
           //     echo("Key: " . $key . " Value: " . $value . "\n");
                $entry = "/{" . $key . "}/";
             //   echo("Entry: " . $entry . "\n" );
                $output = preg_replace($entry, $value, $output);
            }
            
            echo $output;
            
            
        }
        
        catch (Exception $e)
        {
            echo "Exception caught: " . $e->getMessage();
        }
        
    }
}

?>