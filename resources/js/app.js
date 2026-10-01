document.addEventListener('DOMContentLoaded', () => {
    const bootScreen = document.getElementById('boot-screen');
    const terminalOutput = document.getElementById('terminal-output');

    // Jangan jalankan efek jika screen tidak ditemukan
    if (!bootScreen || !terminalOutput) return;

    // Matikan scroll saat booting
    document.body.style.overflow = 'hidden';

    const bootSequence = [
        "Initiating HIMAMO Core Kernel...",
        "Loading UI/UX modules... [OK]",
        "Mounting Database... [OK]",
        "Bypassing legacy jQuery constraints... [OK]",
        "Injecting Tailwind Directives... [OK]",
        "System Check Passed. All engines ready.",
        "Welcome to the new standard."
    ];

    let delay = 0;

    bootSequence.forEach((line, index) => {
        // Randomize typing speed for realism (100ms - 400ms)
        delay += Math.floor(Math.random() * 300) + 100;

        setTimeout(() => {
            const p = document.createElement('p');
            // Jika baris terakhir, buat warnanya putih untuk penekanan
            p.className = index === bootSequence.length - 1 ? 'text-slate-900 dark:text-white font-bold' : '';
            p.textContent = `> ${line}`;
            terminalOutput.appendChild(p);
        }, delay);
    });

    // Fade out screen 1 detik setelah teks terakhir selesai diketik
    setTimeout(() => {
        bootScreen.classList.add('opacity-0');
        bootScreen.classList.add('pointer-events-none'); // Agar tidak menghalangi klik

        // Kembalikan fungsi scroll
        document.body.style.overflow = '';

        // Optional: Hapus DOM boot screen setelah transisi selesai untuk menghemat memori
        setTimeout(() => {
            bootScreen.remove();
        }, 1000);

    }, delay + 1000);
});
