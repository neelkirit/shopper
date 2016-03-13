<?php
class jd{
    public $rawEvents;
    
    function getAll($search){
        $url = 'http://www.justdial.com/index.php?city=Bangalore&what=leather+shoes&where=&catid=&type=1&group=&itab=0&classic=0&asflg=undefined&enflg=undefined&prid=&ncatid1=&psearch=&sfsearch=&reshref=&jdg=';
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            )
        );
        
        $context  = stream_context_create($options);
        /*
         * I believe this is what you're looking for
         */
        $result = file_get_contents($url, false, $context);
       
        $dom = new DOMDocument();
        @$dom->loadHTML($result);
        $xpath = new DOMXPath($dom);
        $bname = $xpath->query("//span[@class='jcn ']");
        $bph = $xpath->query("//p[@class='jrcw']");
        $bloc = $xpath->query("//span[@class='jaddt']");
        
        $root = $xpath->query("//aside[@class='compdt']");
        
        foreach ($bname as $name) {
            foreach ($xpath->query('a', $name) as $child) {
                echo $child->nodeValue, PHP_EOL;
                echo "<br/>";
         }
    }
    
    echo "<hr/>";
    $counter = 1;
    foreach ($root as $name) {
            foreach ($xpath->query('p', $name) as $child) {
                if($counter !=4){
                    echo $child->nodeValue, PHP_EOL;
                    echo '<br/>';
                    $counter++;
                }
                else{
                    $counter = 1;
                    echo "<hr/>";
                } 
         }
    }
    
    
        
        
        //$this->rawEvents = $element->item(0)->childNodes; 
        //echo $bname;    
    
    }
    
    function processRawEvents(){
        foreach ($this->rawEvents as $event){
            if(trim($event->nodeValue) ){
                $this->processEvent($event);
            }
        }
    }
    
    function has($node,$nameToCheck){
        $index = 0;
        foreach ($node->childNodes as $child){
            if($child->nodeName == $nameToCheck)
                return $index;
            $index++;
        }
        return FALSE;
    }
    
    function getClass($node){
        $classStr = $node->getAttribute("class");
        $classArray = split(" ", $classStr);
        foreach ($classArray as $className){
            if($className == "fa-clock-o")
                return "time";
            if($className == "fa-map-marker")
                return "location";
            if($className == "fa-calendar")
                return "date";
            if($className == "fa-calendar")
                return "date";
        }
    }
    
    function processEvent($event){
        $details = array();
        foreach ($event->childNodes as $child){
            if(!trim($child->nodeValue))
                continue;
            if($child->nodeName == "h")
                $details['name'] = $child->nodeValue;
            if(($index = $this->has($child,"i"))){
                $className = $this->getClass($child->childNodes->item($index));
                $details[$className] = trim($child->nodeValue);
            }
        }
    }
}
$m = new jd();
$m->getAll();
?>