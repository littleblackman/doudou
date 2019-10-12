<?php

/**
 * DateExtend Class
 * Used to manager calendar & date
 *
 *
 * @author Sandy Razafitrimo <sandy@etsik.com>
 */
class DateExtendService {


    private $date_ref;
    private $objectDate;
    private $year_ref;
    private $month_ref;
    private $day_ref;

    protected $day_week      = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    protected $day_week_en   = array('', 'Monday','Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday' );

    /**
     * init the basic value from a date_ref
     *
     * LbmDateExtend constructor.
     * @param null $date_ref
     * @param null $lang
     *
     */
    public function __construct($date_ref = null) {

        if(!$date_ref) $date_ref = date('Y-m-d H:i:s');
        $objectDate = new \DateTime($date_ref);

        $this->objectDate = $objectDate;
        $this->date_ref = $date_ref;

        $this->year_ref  = $objectDate->format('Y');
        $this->month_ref = $objectDate->format('m');
        $this->day_ref   = $objectDate->format('d');
    }


    /**
     * set an object dateTime reference
     *
     * @return \DateTime
     */
    public function setObjectDate(\DateTime $date)
    {
        $this->objectDate = $date;
        return $this;
    }


    /**
     * return the object dateTime reference
     *
     * @return \DateTime
     */
    public function getObjectDate()
    {
        return $this->objectDate;
    }

    /**
     * set the date ref
     * @return $this;
     */
    public function setDateRef($date_ref)
    {
        $objectDate = new \DateTime($date_ref);

        $this->objectDate = $objectDate;
        $this->date_ref = $date_ref;

        $this->year_ref  = $objectDate->format('Y');
        $this->month_ref = $objectDate->format('m');
        $this->day_ref   = $objectDate->format('d');
        return $this;
    }

    /**
     * return the date_ref
     * @return string $date_ref
     */
    public function getDateRef($format = null)
    {
        if(!$format) return $this->date_ref;
        return $this->getObjectDate()->format($format);

    }

    /**
     * return the a string year
     * @return string
     */
    public function getYearRef() {
        return $this->year_ref;
    }

    /**
     * return the month ref
     * @return string
     */
    public function getMonthRef() {
        return $this->month_ref;
    }

    /**
     * retur nthe day ref
     * @return string
     */
    public function getDayRef() {
        return $this->day_ref;
    }

    /**
     * return the next month
     *
     * @return \DateTime
     */
    public function getNextMonth() {

        $next_Y = $this->year_ref;
        $next_m = $this->month_ref+1;

        if($next_m<10) $next_m = '0'.$next_m;
        if($next_m == 13) {
            $next_m = '01';
            $next_Y = $next_Y+1;
        }
        $date = new \DateTime(date($next_Y.'-'.$next_m.'-01'));

        return $date;
    }

    /**
     * return the prev month
     *
     * @return \DateTime
     */
    public function getPrevMonth() {

        $prev_Y = $this->year_ref;
        $prev_m = $this->month_ref-1;

        if($prev_m<10) $prev_m = '0'.$prev_m;
        if($prev_m == 0) {
            $prev_m = 12;
            $prev_Y = $prev_Y-1;
        }
        $date = new \DateTime(date($prev_Y.'-'.$prev_m.'-01'));

        return $date;
    }

    /**
     * return the name of the day
     *
     * @param $i
     * @return mixed
     */
    public function getDayName($i)
    {
        return $this->day_week[$i];
    }


    /**
     * return the start month in string
     * @return string
     */
    public function getStartMonth() {
        return $this->year_ref.'-'.$this->month_ref.'-01';
    }

    /**
     * return the start of the week
     *
     * @return false|string
     */
    public function getDateStartWeek() {
        // Calcul de l'écart entre le jour de $day et le lundi (=1)
        $rel = 1 - date('N', strtotime ($this->date_ref));
        //calcul du lundi avec cet écart
        $monday = date('Y-m-d', strtotime("$rel days", strtotime($this->date_ref)));
        return $monday;
    }

    /**
     * return the first monday from day_ref
     * @return false|string
     */
    public function getFirstMondayFromMonth() {
        // Calcul de l'écart entre le jour de $day et le lundi (=1)
        $rel = 1 - date('N', strtotime ($this->getStartMonth()));
        //calcul du lundi avec cet écart
        $monday = date('Y-m-d', strtotime("$rel days", strtotime($this->getStartMonth())));
        return $monday;
    }

    /**
     * retun the last sunday from day_ref
     * @return false|string
     */
    public function getLastSundayFromMonth() {
        $rel = 7 - date('N', strtotime ($this->getEndMonth()));
        //calcul du lundi avec cet écart
        $sunday = date('Y-m-d', strtotime("$rel days", strtotime($this->getEndMonth())));
        return $sunday;
    }

    /**
     * return the end of the day
     *
     * @return string
     */
    public function getEndMonth() {
        $lastday = date('t', strtotime($this->date_ref));
        return $this->year_ref.'-'.$this->month_ref.'-'.$lastday;
    }

    /**
     * @param $string date
     * @return false|string
     */
    public function getLessNday($n, $date = null) {
        if(!$date) $date = $this->getDateRef();
        return date('Y-m-d', strtotime($date.", -".$n." day"));
    }

    /**
     * @param $string date
     * @return false|string
     */
    public function getPlusNday($n, $date = null) {
        if(!$date) $date = $this->getDateRef();
        return date('Y-m-d', strtotime($date.", +".$n." day"));
    }

    /**
     * @param $n
     * @param null $date
     * @return false|string
     */
    public function getPlusNyear($n, $date = null)
    {
        if(!$date) $date = $this->getDateRef();
        return date("Y-m-d", strtotime($date.", +".$n." years"));
    }


    /**
     * return the date seven day later
     *
     * @param DateTime $date
     * @return DateTime
     */
    public function getNextDateNextWeek(\DateTime $date)
    {
        return $date->modify('+7 day');
    }


    /**
     * return an array of string date
     *
     * @return array
     */
    public function getWeekValues()
    {

        $currentDate = $this->getDateStartWeek();

        for( $i = 1; $i < 8 ; $i++ )
        {
            // activeday
            $class= "activeday";

            // if not active month
            $this_m = date( 'm' , strtotime($currentDate));
            if($this_m  != $this->getMonthRef()) $class = "notactiveday";

            //current day
            if( strtotime($currentDate) == strtotime(date('Y-m-d'))) $class .= " currentDay";

            $arr[] = array(
                'date'     => $currentDate,
                'class'    => $class,
                'day_name' => $this->getDayName($i),
                'month'    => date('F', strtotime($currentDate)),
                'day'      => date('d', strtotime($currentDate)),
                'd_name'   => $this->getDayName($i)[0]
            );

            $currentDate = $this->getPlusNday(1, $currentDate);

        };

        return $arr;
    }


    /**
     * return an array of string dates
     *
     * @return array
     */
    public function getCalendarValues()
    {

        for( $a = strtotime( $this->getFirstMondayFromMonth());
             $a <= strtotime( $this->getLastSundayFromMonth() );
             $a = strtotime( date( 'Y-m-d' , $a ) . ' +1 day' )
        )
        {
            // activeday
            $this_m = date( 'm' , $a );
            $class= "activeday";

            // if not active month
            if($this_m  != $this->getMonthRef()) $class = "notactiveday";

            //current day
            $current_day = date( 'Y-m-d' , $a );

            if($current_day == date('Y-m-d')) $class .= " currentDay";

            $arr[] = array(
                'date'  => $current_day,
                'class' => $class,
            );

        };
        return $arr;

    }


}
