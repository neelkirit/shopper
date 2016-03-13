<?php
class jd{
    public $rawEvents;
    
    function getAll($search,$place){
        $url = 'http://www.justdial.com/index.php?city='.$place.'&what='.$search.'&where=&catid=&type=1&group=&itab=0&classic=0&asflg=undefined&enflg=undefined&prid=&ncatid1=&psearch=&sfsearch=&reshref=&jdg=';
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
       
        $dom = new DOMDocument();
        @$dom->loadHTML($result);
        $xpath = new DOMXPath($dom);
        $bname = $xpath->query("//span[@class='jcn ']");
        $bph = $xpath->query("//p[@class='jrcw']");
        $bloc = $xpath->query("//span[@class='jaddt']");
        
        $root = $xpath->query("//aside[@class='compdt']");
        /*
        foreach ($bname as $name) {
            foreach ($xpath->query('a', $name) as $child) {
                echo $child->nodeValue, PHP_EOL;
                echo "<br/>";
         }
    }
    
    echo "<hr/>";*/
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
    
   
    
   
}
$m = new jd();
$m->getAll(urlencode("leather shoes"),"Bangalore");
?>