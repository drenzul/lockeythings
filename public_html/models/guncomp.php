<?php
class gunList extends baseController
{

    public function __construct($action, $urlvalues, $action2="", $action3="") {
        $this->action = $action;
        $this->urlvalues = $urlvalues;
        $this->action2 = $action2;
        $this->action3 = $action3;
    }

    public function gunList()
    {
    	$db = new Database;
    	$querystring = "select gunid, name, size, maker, mass, rof, ((pdamage+edamage+ddamage)*rof) as dps, (heatpershot*rof/60) as hps, (powerpershot*rof) as pps from Guns";
    	if ($this ->action3 != "")
    	{
    	    $filters = explode(":", $this->action3);
    	    $filternumber = 0;
    	    foreach($filters as $filter){
    	        $filtervalue = explode("-", $filter);
  //  	        echo("filter0: " . $filtervalue[0] . " filter1: " . $filtervalue[1] . "\n");
  //  	        echo("raw filter: " . $filter . "\n");
    	        if ($filternumber == 0){
    	            $querystring = $querystring . " where ";
    	        }else{         //first time needs where, afterwards needs and.
    	            $querystring = $querystring . " AND ";
    	        }
    	        $filternumber++;
    	        if (strcmp($filtervalue[0], "minsize") == 0){
   // 	            echo("MINSIZE");
    	           $querystring = $querystring . " size >= " . $filtervalue[1];
    	        }
    	        if (strcmp($filtervalue[0],"maxsize") == 0){
    //	            echo("MAXSIZE");
    	           $querystring = $querystring . "size <=" . $filtervalue[1];
    	        }
    	        if (strcmp($filtervalue[0], "type") == 0){
    	            $querystring = $querystring . "type = " . $filtervalue[1];
    	        }

   // 	        echo("Query: " . $querystring . "\n");



    	    }
    	}
    	if ($this->action2 != ""){
    	    if ($this->action2 == "dps"){
    	        $querystring = $querystring . " order by ((pdamage+edamage+ddamage)*rof), name";
    	    }elseif ($this->action2 == "hps"){
    	       $querystring = $querystring . " order by (heatpershot*rof), name";
    	    }elseif ($this->action2 == "pps"){
    	        $querystring = $querystring . " order by (powerpershot*rof), name";
    	    }
    	    else{
    	       $querystring = $querystring . " order by " . $this->action2 . ",name";
    	    }
    	}else
    	{
    	    $querystring = $querystring . " order by name";
    	}
    	$results = $db -> select($querystring . ";");
    	if (is_array($results) ){

    	}else{
    	    echo("<p>Show Urlvalue: " . $urlvalue . " thisurlvalue: " .  $this->urlvalues . " thisaction: " . $this->action .  "</p>" );
    	    echo("<p>Action2: ". $this->action2 . "</p>");
    	    echo("<p>Action3: ". $this->action3 . "</p>");
    	    echo("<p>Query String: " . $querystring . "</p>");
    	    echo("<p>Results: " . $results . "</p>");
    	}

    	foreach ($results as $result){
    		echo("<div class='gunitem'>
                    <h3>" . $result['name'] . "</h3>
                	<p>Size: " . $result['size'] . "<br />
    				Manufactorer: " . $result['maker'] . "<br />
    				Mass: " . $result['mass'] . "<br />
                    DPS: " . $result['dps'] . "<br />
                    Heat Per Second: " . $result['hps'] . "<br />
                    Power Per Second: " . $result['pps'] . "</p>
                    <div class='choices'>
                        <div class='choice'><input type='radio' name='" . $this->urlvalues . "' value='" . $result['gunid'] . "-1'><p>Single Mount</p></input></div><br />
                        <div class='choice'><input type='radio' name='" . $this->urlvalues . "' value='" . $result['gunid'] . "-2'><p>Double Mount</p></input></div><br />
                        <div class='choice'><input type='radio' name='" . $this->urlvalues . "' value='" . $result['gunid'] . "-4'><p>Quad Mount</p></input></div><br />
                    </div>
    			</div>");
    	}
    }

}

class gunComp extends baseController
{
    public function __construct($action, $urlvalues) {
        $this->action = $action;
        $this->urlvalues = $urlvalues;
    }

    public function buildcomps($gunstats)
    { //Builds lists of stats to be compared as well as establishing needed values for processing
       // from the database listing of the guns (passed in $gunstats)
       // built up like this so it can do more than 2 if needed.

        $comps = array();

        //   	$gun1stats[0]['tdamage'] = $gun1stats[0]['pdamage'] + $gun1stats[0]['edamage'] + $gun1stats[0]['ddamage'];
        //   	$gun2stats[0]['tdamage'] = $gun2stats[0]['pdamage'] + $gun2stats[0]['edamage'] + $gun2stats[0]['ddamage'];

        // Setting up definitions for the comparisons. Too arbitary to automate.
        $x=0;
        foreach($gunstats as $gun){
            $comps['pspeed']['gun'][$x] = $gun['pspeed'];
            $x++;
        }
        $comps['pspeed']['inverse'] = 0;
        $comps['pspeed']['name'] = "Projectile Speed";
        $comps['pspeed']['showmult'] = 0;   /// 0 = No, 1 = Yes 2 = Yes but no Total
        $comps['pspeed']['zeroinfinite'] = 0; /// 0 = No, 1 = Yes, Mainly for ammo for energy weapons

        $x=0;
        foreach($gunstats as $gun){
            $comps['pdamage']['gun'][$x] = $gun['pdamage'];
            $x++;
        }
        $comps['pdamage']['inverse'] = 0;
        $comps['pdamage']['name'] = "Physical Damage";
        $comps['pdamage']['showmult'] = 1;
        $comps['pdamage']['zeroinfinite'] = 0;

        $x=0;
        foreach($gunstats as $gun){
            $comps['edamage']['gun'][$x] = $gun['edamage'];
            $x++;
        }
        $comps['edamage']['name'] = "Energy Damage";
        $comps['edamage']['showmult']= 1;
        $comps['edamage']['inverse']= 0;
        $comps['edamage']['zeroinfinite'] = 0;

        $x=0;
        foreach($gunstats as $gun){
            $comps['ddamage']['gun'][$x] = $gun['ddamage'];
            $x++;
        }
        $comps['ddamage']['name'] = "Distortion Damage";
        $comps['ddamage']['showmult'] = 1;
        $comps['ddamage']['inverse'] = 0;
        $comps['ddamage']['zeroinfinite'] = 0;

        $comps['tdamage']['name'] = "Total Damage";
        $comps['tdamage']['showmult'] = 1;
        $comps['tdamage']['inverse'] = 0;
        $comps['tdamage']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['tdamage']['gun'][$x] = $gun['pdamage'] + $gun['edamage'] + $gun['ddamage'];
            $x++;
        }

        $comps['rof']['name'] = "Rate of Fire";
        $comps['rof']['showmult'] = 2;
        $comps['rof']['inverse'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['rof']['gun'][$x] = $gun['rof'];
            $x++;
        }
        $comps['rof']['zeroinfinite'] = 0;

        $comps['dps']['name'] = "Damage per second";
        $comps['dps']['showmult'] = 1;
        $comps['dps']['inverse'] = 0;
        $comps['dps']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['dps']['gun'][$x] = $comps['tdamage']['gun'][$x] * $comps['rof']['gun'][$x] /60;
            $x++;
        }

        $comps['projspeed']['name'] = "Projectile Speed";
        $comps['projspeed']['showmult'] = 0;
        $comps['projspeed']['inverse'] = 0;
        $comps['projspeed']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['projspeed']['gun'][$x] = $gun['pspeed'];
            $x++;
        }

        $comps['maxrange']['name'] = "Max Range";
        $comps['maxrange']['showmult'] = 0;
        $comps['maxrange']['inverse'] = 0;
        $comps['maxrange']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['maxrange']['gun'][$x] = $gun['maxrange'];
            $x++;
        }

        $comps['ammo']['name'] = "Ammo";
        $comps['ammo']['showmult'] = 2;
        $comps['ammo']['inverse'] = 0;
        $comps['ammo']['zeroinfinite'] = 1;
        $x=0;
        foreach($gunstats as $gun){
            $comps['ammo']['gun'][$x] = $gun['ammocount'];
            $x++;
        }

        $comps['mass']['name'] = "Total Weapon Mass";
        $comps['mass']['showmult'] = 1;
        $comps['mass']['inverse'] = 1;
        $comps['mass']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['mass']['gun'][$x] = $gun['mass'];
            $x++;
        }

        $comps['hp']['name'] = "Hitpoints";
        $comps['hp']['showmult'] = 1;
        $comps['hp']['inverse'] = 0;
        $comps['hp']['zeroinfinite'] = 0;
        $x=0;
        foreach($gunstats as $gun){
            $comps['hp']['gun'][$x] = $gun['hp'];
            $x++;
        }


        return($comps);
    }





    private function comparestat($gun1stat, $gun2stat, $inverse, $zeroinfinite){
        //inverse is where lower is better, so tilt bar towards lower value instead of higher. 0 = higher is better, 1 = lower is better
        if ($gun1stat+$gun2stat != 0){     //Both could be zero so avoid divide by zero error
            if ($zeroinfinite != 1){
                $comp = $gun1stat / ($gun1stat+$gun2stat);
                if ($inverse == 1){
                    $comp = 1 - $comp;
                }
            }else{
                if (($gun1stat == 0) && ($gun2stat == 0)){
                    $comp = 0.5;
                }elseif ($gun1stat == 0)
                {
                    $comp = 1;
                }elseif ($gun2stat == 0){
                    $comp = 0;
                }else{
                    $comp = $gun1stat / ($gun1stat+$gun2stat);
                    if ($inverse == 1){
                        $comp = 1 - $comp;
                    }
                }

            }
        }else
        {
            $comp = 0.5;  //If both are zero set the comparison to middle.
        }
        return($comp * 100);  // Coverts 0 to 1 value to %
    }

    public function gunComp()
    {
   //     echo("Show Urlvalue: " . $urlvalue . " thisurlvalue: " .  $this->urlvalues . " thisaction: " . $this->action .  "\n" );

    	// Action format should be gun1id-multiple:gun2id-multiple
    	$db = new Database;
    	$gun1 = substr($this->urlvalues, 0, strpos($this->urlvalues, ":"));
    	$gun2 = substr($this->urlvalues, strpos($this->urlvalues, ":")+1);
  //  	echo("\n Gun 1: " . $gun1 . " Gun 2: " . $gun2 . "\n");
    	$gun1id = substr($gun1, 0, strpos($gun1, "-"));
    	$gun1mult = substr($gun1, strpos($gun1, "-")+1);
    	$gun2id = substr($gun2, 0, strpos($gun2, "-"));
    	$gun2mult = substr($gun2, strpos($gun2, "-")+1);

    	$gun1stats = $db -> select("select * from Guns where gunid = " . $gun1id . ";");
    	$gun2stats = $db -> select("select * from Guns where gunid = " . $gun2id . ";");

    	$guns[0] = $gun1stats[0];
    	$guns[1] = $gun2stats[0];

    	$comps = $this->buildcomps($guns);

    	$gunhead = '<div class="comp"><div class="compsec"><div class="leftsec"><h3>' . $gun1stats[0]['name'];
    	if ($gun1mult != 1)
    	{
    	    $gunhead = $gunhead . " X" . $gun1mult;
    	}
    	$gunhead = $gunhead . '</h3></div><div class="midsec"></div><div class="rightsec"><h3>' . $gun2stats[0]['name'];
    	if ($gun2mult != 1)
    	{
    	    $gunhead = $gunhead . " X" . $gun2mult;
    	}
    	$gunhead = $gunhead . '</h3></div></div> ';
    	echo $gunhead;
    	//Should rework this bit to be a view and just pass values to it, but meh :) Maybe later

    	foreach ($comps as $key => $value){
    	    if ($value['showmult'] != 1){
    	       $value['value'] = $this->comparestat($value['gun'][0], $value['gun'][1], $value['inverse'], $value['zeroinfinite']);
    	    }else
    	    {
    	        $value['value'] = $this->comparestat($value['gun'][0]*$gun1mult, $value['gun'][1]*$gun2mult, $value['inverse'], $value['zeroinfinite']);
    	    }
    	    echo('<div class="compsec"><div class="statname"><h3>' . $value['name'] . '</div>');
    	    $gunstats = '<div class="leftsec"><h4>';
    	    if (($value['zeroinfinite'] == 1) && ($value['gun'][0] == 0)){
    	        $stat = "Infinite";
    	    }else{
                $stat = number_format($value['gun'][0], 2);
    	    }
            $gunstats = $gunstats . $stat;

    	    if (($gun1mult != 1) && ($value['showmult'] >= 1 ))
    	    {

    	      $gunstats = $gunstats . " X" . $gun1mult;
    	      if ($value['showmult'] == 1)
    	      {
    	          $gunstats = $gunstats . " (" . number_format($value['gun'][0]*$gun1mult, 2) . ")";
    	      }
            }
            $gunstats = $gunstats . '</h4></div>
                <div class="midsec"><div class="midsecinner"><div class="leftbar" style="width:' . $value['value'] . '%"></div><div class="marker" style="left:' . $value['value'] . '%"></div><div class="rightbar" style="width:' . (100 - $value['value']) . '%"></div></div></div>
                <div class="rightsec"><h4>';
            if (($value['zeroinfinite'] == 1) && ($value['gun'][1] == 0)){
                $stat = "Infinite";
            }else{
                $stat = number_format($value['gun'][1], 2);
            }
            $gunstats = $gunstats . $stat;
            if ($gun2mult != 1 && $value['showmult'] >= 1)
            {
                $gunstats = $gunstats . " X" . $gun2mult;
                if ($value['showmult'] == 1)
                {
                    $gunstats = $gunstats . " (" . number_format($value['gun'][1]*$gun2mult, 2) . ")";
                }
            }

            $gunstats = $gunstats . '</h4></div></div>';
    	    echo($gunstats);
    	}
    	echo('</div>');

    }

}





?>