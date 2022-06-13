<?php
namespace App\Date;
class Mounth{
    private $months = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
    public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    public $month;
    public $year;
    /**
     * @param int $month
     * @param int $year
     * @throws \Exception
     */
    public function __construct(?int $month = NULL,?int $year = NULL)
    {
        if($month==NULL)
        {
            intval($month = date('m'));
        }
        if($year==NULL)
        {
            intval($year = date('Y'));
        }
        if($month<1 || $month>12)
        {
            throw new \Exception("Le mois $month est incorrecte");
        }
        if($year<1900)
        {
            throw new \Exception("L'année $year est incorrecte");
        }
        $this->month = $month;
        $this->year = $year;

    }
    /**
     * Retourne le mois en toute lettre
     */
    public function toString():string
    {
        return $this->months[$this->month - 1].' '.$this->year;
    }
     /**
     * Retourne le nombre de semaines
     */
    public function getweeks():int{
        $start = $this->getFirstDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks =  intval($end->format('W'))-intval($start->format('W')-1);
        if($weeks<0)
        {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }
    /**
     * @return \DateTime
     */
    public function getFirstDay(): \DateTime
    {
       return new \DateTime("{$this->year}-{$this->month}-01");
    }
    public function nextMonth():Mounth
    {
        $month = $this->month + 1;
        $year = $this->year;
        if($month>12)
        {
            $month = 1;
            $year = $year+1;   
        }
        return new Mounth($month,$year);
    }
    public function precMonth():Mounth
    {
        $month = $this->month - 1;
        $year = $this->year;
        if($month<1)
        {
            $month = 12;
            $year = $year-1;   
        }
        return new Mounth($month,$year);
    }
    public function verifdayinmonth(\DateTime $date):bool{
              return $this->getFirstDay()->format('Y-m') == $date->format('Y-m');

    }
    
}
?>
