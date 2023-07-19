<?php namespace Teamgrid\Task\Models;

use Model;
use Carbon\Carbon;
use Teamgrid\TimeEntry\Models\TimeEntry;
use Carbon\CarbonInterval;
/**
 * Task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $belongsTo = [
        'project' => ['Teamgrid\Project\Models\Project'],
        'user' => ['Rainlab\User\Models\User'],
    ];
    public $hasMany = [
        'timeEntries' => ['Teamgrid\Timeentry\Models\TimeEntry'],
    ]; 

    public function getTrackedTimeAttribute()
    {
    $total_seconds = $this->timeEntries()->get()->sum(function ($entry) 
    {
        return $entry->total_time->totalSeconds;
    });
    $tracked_time = CarbonInterval::seconds($total_seconds);
    return $tracked_time->cascade();
    }
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'teamgrid_task_tasks';

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
    public $rules = [];

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
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
