<?php



namespace App\Models;

use App\Http\Traits\TimestampsTrait;
use App\Http\Traits\TasksTrait;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use TimestampsTrait;
    use TasksTrait;

    public function getDates()
    {
        return ['created_at', 'updated_at', 'due_dates'];
    }

    //define table
    protected $table = 'tasks';

    //created at --- 5 mins ago instead of time and date
    //updated at
}
