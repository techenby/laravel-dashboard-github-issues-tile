<x-dashboard-tile :position="$position">
    <div class="{{ isset($title) ? 'space-y-2' : '' }} h-full">
        @isset($title)
            <h1 class="uppercase font-bold">
                {{ $title }}
            </h1>
        @endisset

        <ul class="divide-y-2">
            @foreach($repos as $repo => $stats)
                <li class="py-1">
                    <div class="flex items-center justify-between">
                        <div class="text-sm">{{ $repo }}</div>
                        <div class="text-sm font-mono text-dimmed space-x-2">
                            <span>{{ $stats['issues'] }}</span>
                            <span>{{ $stats['pulls'] }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-dashboard-tile>
