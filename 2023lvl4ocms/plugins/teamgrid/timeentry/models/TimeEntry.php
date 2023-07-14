<?php namespace Teamgrid\TimeEntry\Models;

use Model;
use Carbon\Carbon;

/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $belongsTo = [
        "task" => ['Teamgrid\Task\Models\Task'],
        "user" => ['Rainlab\User\Models\User'],
    ];
    public function getTotalTimeAttribute() 
    {
        $start = Carbon::parse($this->end_time);
        $end = Carbon::parse($this->start_time);
        $result = $end->diffAsCarbonInterval($start);
        return $result;

    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'teamgrid_timeentry_time_entries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'task' => 'required',
        'user' => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
 
    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}