<div @class([
    'rounded-xl border px-2 py-1',
    'border-green-300 bg-green-200 text-green-700' => $status,
    'border-red-300 bg-red-200 text-red-700' => !$status,
])>
    {{ $status ? 'Feita' : 'Não Feita' }}
</div>
