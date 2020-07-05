<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models
 * @version June 25, 2020, 1:32 pm UTC
 *
 * @property \App\Models\Appraisal $appraisal
 * @property string $body
 * @property integer $appraisal_id
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'body',
        'appraisal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'body' => 'string',
        'appraisal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'body' => 'required',
        'appraisal_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function appraisal()
    {
        return $this->belongsTo(\App\Models\Appraisal::class);
    }
}
