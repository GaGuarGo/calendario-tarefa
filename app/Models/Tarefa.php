<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'prazo'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPrazo(): string
    {
        return Carbon::parse($this->prazo)->format('d/m/Y');
    }

    public function switchStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }

    public function isLate() : bool {
        return $this->prazo < now()->subtract(1,'day');
    }


    public function scopeDoneTasks(Builder $query) : Builder | QueryBuilder  {
        return $query->where('status', '=', true);
    }
    public function scopeUndoneTasks(Builder $query) : Builder | QueryBuilder  {
        return $query->where('status', '=', false);
    }
    public function scopeLateTasks(Builder $query) : Builder | QueryBuilder  {
        return $query->where('prazo', '<', Carbon::today())->where('status', '=', false);
    }

    public function scopeTodayTasks(Builder $query) : Builder | QueryBuilder  {
        return $query->whereDate('prazo', '=', Carbon::today());
    }
}
