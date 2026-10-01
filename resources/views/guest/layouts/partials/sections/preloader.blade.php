<div id="boot-screen" class="fixed inset-0 z-[9999] bg-zinc-50 dark:bg-slate-950 flex flex-col justify-end p-6 md:p-12 font-mono text-sm md:text-base overflow-hidden transition-opacity duration-1000">
    <div class="max-w-3xl w-full mx-auto">
        <div id="terminal-output" class="text-teal-600 dark:text-teal-500 space-y-1 mb-4">
            {{-- Eksekusi text baris dikontrol oleh JS --}}
        </div>
        <div class="flex items-center text-slate-700 dark:text-slate-300">
            <span class="mr-2">root@himamo:~$</span>
            <span id="cursor" class="w-2 h-5 bg-teal-500 dark:bg-teal-400 animate-pulse"></span>
        </div>
    </div>
</div>
