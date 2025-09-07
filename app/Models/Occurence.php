<?php

namespace App\Models;

use App\Traits\Shipyard\HasStandardAttributes;
use App\Traits\Shipyard\HasStandardFields;
use App\Traits\Shipyard\HasStandardScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class Occurence extends Model
{
    //

    public const META = [
        "label" => "Wystąpienia",
        "icon" => "clock",
        "description" => "Wystąpienia wydarzenia.",
        "ordering" => 12,
    ];

    use SoftDeletes, Userstamps;

    protected $fillable = [
        "date",
        "notes",
    ];

    #region fields
    use HasStandardFields;

    public const FIELDS = [
        "date" => [
            "type" => "date",
            "label" => "Data",
            "icon" => "calendar",
            "required" => true,
        ],
        "notes" => [
            "type" => "TEXT",
            "label" => "Notatki",
            "icon" => "text",
        ],
    ];

    public const CONNECTIONS = [
        "event" => [
            "model" => Event::class,
            "mode" => "one",
        ],
    ];

    public const ACTIONS = [
        // [
        //     "icon" => "",
        //     "label" => "",
        //     "show-on" => "<list|edit>",
        //     "route" => "",
        //     "role" => "",
        //     "dangerous" => true,
        // ],
    ];
    #endregion

    // use CanBeSorted;
    public const SORTS = [
        // "<name>" => [
        //     "label" => "",
        //     "compare-using" => "function|field",
        //     "discr" => "<function_name|field_name>",
        // ],
    ];

    public const FILTERS = [
        // "<name>" => [
        //     "label" => "",
        //     "icon" => "",
        //     "compare-using" => "function|field",
        //     "discr" => "<function_name|field_name>",
        //     "mode" => "<one|many>",
        //     "operator" => "",
        //     "options" => [
        //         "<label>" => <value>,
        //     ],
        // ],
    ];

    #region scopes
    use HasStandardScopes;
    #endregion

    #region attributes
    protected function casts(): array
    {
        return [
            "date" => "date",
        ];
    }

    use HasStandardAttributes;

    // public function badges(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => [
    //             [
    //                 "label" => "",
    //                 "icon" => "",
    //                 "class" => "",
    //                 "condition" => "",
    //             ],
    //         ],
    //     );
    // }
    #endregion

    #region relations
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    #endregion

    #region helpers
    #endregion
}
