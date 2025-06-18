@props(['status', 'error'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@else
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-red-600 dark:text-red-400']) }}>
        {{ $status }}
    </div>
@endif
