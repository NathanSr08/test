<?php

namespace App\Date;
class Events{

private $pdo;
public function __construct(\PDO $pdo)
{
    $this->pdo = $pdo;
}
public function geteventbetween(\DateTime $start,\DateTime $end,int $id_c):array{
    $pdo = new \PDO('mysql:host=172.18.0.3;dbname=aganda','root','password',[
        \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
    $sql = "SELECT * FROM events where start between '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' and id_user = $id_c";
 
    $statement = $pdo->query($sql);
    $result = $statement->fetchAll();

    return $result;
    
}
public function geteventbetweenAdmin(\DateTime $start,\DateTime $end):array{
    $pdo = new \PDO('mysql:host=172.18.0.3;dbname=aganda','root','password',[
        \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
    $sql = "SELECT * FROM events where start between '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
 
    $statement = $pdo->query($sql);
    $result = $statement->fetchAll();

    return $result;
    
}
public function geteventbetweenbyday(\DateTime $start,\DateTime $end,int $id_c):array{
    
    $events = $this->geteventbetween($start,$end,$id_c);
    $days=[];
    foreach($events as $event)
    {
        $date = explode(' ',$event['start'])[0];
        if(!isset($days[$date])){
            $days[$date] = [$event];

        }else{
            $days[$date][] = $event;
        }
        
    }
    return $days;
}
public function geteventbetweenbydayAdmin(\DateTime $start,\DateTime $end):array{
    
    $events = $this->geteventbetweenAdmin($start,$end);
    $days=[];
    foreach($events as $event)
    {
        $date = explode(' ',$event['start'])[0];
        if(!isset($days[$date])){
            $days[$date] = [$event];

        }else{
            $days[$date][] = $event;
        }
        
    }
    return $days;
}
public function find(int $id)
{
    $result =  $this->pdo->query("SELECT * from events where id = $id LIMIT 1")->fetch();  
        if($result)
        {
              return $result;
        }
        else
        {
              return False;
        }   
}
public function add_event($nom,$des,$date,$start,$end,$id)
{
    $sql = "insert into events (`name`,`description`,`date`,`start`,`end`,`id_user`) VALUES ('".$nom."','".$des."','".$date."','".$date.' '.$start.':00'."','".$date.' '.$end.':00'."',$id)";
   $stat = $this->pdo->prepare("insert into events (`name`,`description`,`date`,`start`,`end`,`id_user`) VALUES ('".$nom."','".$des."','".$date."','".$date.' '.$start.':00'."','".$date.' '.$end.':00'."',$id)");
   $stat->execute();
}
public function edit_event($id,$nom,$des,$date,$start,$end)
{
    $sql = "UPDATE events set   `name` = '".$nom."',`description`='".$des."',`date`='".$date."',`start`='".$date.' '.$start.':00'."',`end`='".$date.' '.$end.':00'."' where id =".$id;
   $stat = $this->pdo->prepare("UPDATE events set   `name` = '".$nom."',`description`='".$des."',`date`='".$date."',`start`='".$date.' '.$start.':00'."',`end`='".$date.' '.$end.':00'."' where id =".$id);
   $stat->execute();
}
public function del_event($id)
{
    $stat = $this->pdo->prepare("delete from events where id =".$id);
    $stat->execute();
}






}

?>
