<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

/**
 *
 * An abstract class to share some commons methods
 *
 * @author: Diego Navarro <diego.nava07@gmail.com>
 *
 */
abstract class BaseModel extends Eloquent {

    /**
     * The public date format to use in the date's files on every model
     *
     * @var string
     */
    protected $publicDateFormat = 'd F Y H:i';

    /**
     * The Server date format predefine by laravel
     *
     * @var string
     */
    protected $serverDateFormat = 'Y-m-d H:i:s';

    /**
     * A getter for the created_at attribute in the models
     *
     * If the date is nor define should return an empty string
     * otherwise should return a date in public format
     *
     * @param $created_at : A server format date
     * @return string : A server date in a public format
     */
    public function getCreatedAtAttribute($created_at)
    {
        $this->setLocale();

        return $this->isDateZero($created_at) ? "" : Carbon::createFromFormat($this->serverDateFormat, $created_at)->format($this->publicDateFormat);
    }

    /**
     * A getter for the updated_at attribute in the models
     *
     * If the date is nor define should return an empty string
     * otherwise should return a date in public format
     *
     * @param $updated_at : A server format date
     * @return string : A server date in a public format
     */
    public function getUpdatedAtAttribute($updated_at)
    {
        $this->setLocale();

        return $this->isDateZero($updated_at) ? "" : Carbon::createFromFormat($this->serverDateFormat, $updated_at)->format($this->publicDateFormat);
    }

    /**
     * Return true if the $date is a a zero date
     *
     * @param  string $date : is a server format date
     * @return bool
     */
    protected function isDateZero($date)
    {
        return $date == "0000-00-00 00:00:00" || $date == "" ? true : false;
    }

}
