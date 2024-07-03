<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarefa extends Model
{
    use HasFactory;

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
}
