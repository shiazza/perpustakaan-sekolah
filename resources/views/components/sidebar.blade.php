<style>
    /* Efek glow text (tidak berubah) */
    .sidebar-text {
        text-shadow:
            0 0 0.5px #36454F,
            0 0 5px #FFFFFF,
            0 0 10px #EFEFEF;
    }

    .sidebar-textsilent {
        text-shadow:
            0 0 0.5px #9CA3AF,
            0 0 5px #FFFFFF,
            0 0 10px #EFEFEF;
    }

    /* Kontainer utama sidebar yang sudah digabung dan diperbaiki */
    .sidebar-container {
        position: fixed; /* Hanya kontainer terluar yang fixed */
        top: 1rem;
        left: 1rem;
        height: calc(99vh - 2rem);
        width: 16rem;
        border-radius: 2rem;
        overflow: hidden; /* Ini akan berfungsi untuk memotong konten di dalamnya */
        /* box-shadow: inset 0 -3px 6px rgba(255,255,255,0.1),
                    inset 0 -3px 10px rgba(0,0,0,0.25),
                    0 6px 18px rgba(0,0,0,0.2);
        background: radial-gradient(
            circle at 50% 50%,
            rgba(255, 255, 255, 1),
            rgba(52, 52, 52, 0.3) 100%
        ); */
        z-index: 10;
    }

    /* Efek glass pertama (gelap) menggunakan pseudo-element ::before */
    .sidebar-container::before {
        content: "";
        position: absolute;
        inset: 1;
        border-radius: inherit;
        backdrop-filter: url(#displacementFilter);
        -webkit-backdrop-filter: url();
        z-index: 1; /* Di bawah konten */
    }

    /* Efek glass kedua (terang & blur) menggunakan pseudo-element ::after */
    .sidebar-container::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: inherit;
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(1px) brightness(1.2) url(#displacementFilterRev);
        -webkit-backdrop-filter: blur(8px) brightness(1);
        background:  rgba(200, 200, 200, 0.01);
        z-index: 2; /* Di bawah konten, di atas ::before */
    }

    /* Kontainer untuk konten agar berada di atas efek glass */
    .sidebar-content {
        position: relative;
        z-index: 3; /* Pastikan konten berada di lapisan paling atas */
        height: 100%;
        overflow-y: auto; /* Tambahkan scroll jika konten lebih panjang dari sidebar */
        box-shadow: inset 0 -3px 6px rgba(255,255,255,0.1),
                    inset 0 -3px 10px rgba(0,0,0,0.25),
                    0 6px 18px rgba(0,0,0,0.2);
        background: radial-gradient(
                    circle at 50% 36%,
                    rgba(255, 255, 255, 1),
                    rgba(255, 255, 255, 0.6) 100%
        );
        overflow: hidden;
        border-radius: 2rem;
    }

.profile-container {
    position: fixed;
    top: 1.5rem;
    right:2rem;
    border-radius: 1rem;
    overflow: hidden;
    z-index: 20;
    box-shadow: inset 0 -3px 6px rgba(255,255,255,0.2),
            inset 0 -3px 10px rgba(0,0,0,0.3),
            0 -3px 20px rgba(0,0,0,0.12);
}

/* Layer gelap seperti sidebar ::before */
.profile-container::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    backdrop-filter: url(#displacementFilter);
    -webkit-backdrop-filter: url(#displacementFilter);
    z-index: 1;
}

.profile-container::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: rgba(255, 255, 255, 0.15); /* opacity kecil aja */
    backdrop-filter: blur(1px) brightness(1.03) url(#displacementFilterRev);
    -webkit-backdrop-filter: blur(8px) brightness(1);
    z-index: 2;
}


/* Konten tetap di atas efek */
.profile-content {
    position: relative;
    z-index: 3;
}
    
</style>

<div class="sidebar-container">
    <div class="sidebar-content">
        <div class="p-6 space-y-6 transition duration-300 ease-in-out hover:scale-[1.01]">
            <div class="flex items-center space-x-3">
                <div class="text-3xl text-orange-500">📘</div>
                <div class="font-bold text-lg leading-tight sidebar-text">
                    <div>Perpustakaan</div>
                    <div>Sekolah</div>
                </div>
            </div>

            <nav class="space-y-4 text-sm text-gray-700 font-medium">
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📊</span>
                        <span class="sidebar-text">Dashboard</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>

                <div class="text-gray-400 uppercase text-xs mt-4 sidebar-textsilent">Data Master</div>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📚</span>
                        <span class="sidebar-text">Book List</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>

                <div class="text-gray-400 uppercase text-xs mt-4 sidebar-textsilent">Transaction</div>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📥</span>
                        <span class="sidebar-text">Borrow</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">🚚</span>
                        <span class="sidebar-text">Return</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>

                <div class="text-gray-400 uppercase text-xs mt-4 sidebar-textsilent">Audit</div>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📝</span>
                        <span class="sidebar-text">Report’s Book</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📝</span>
                        <span class="sidebar-text">Report’s Borrow</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>
                <a href="#" class="flex items-center justify-between hover:text-orange-500">
                    <div class="flex items-center space-x-2">
                        <span class="text-lg">📝</span>
                        <span class="sidebar-text">Report’s Return</span>
                    </div>
                    <span class="sidebar-text">›</span>
                </a>
            </nav>
        </div>
    </div>
</div>


<div class="profile-container">
    <div class="profile-content fixed top-6 right-6 flex items-center gap-2 px-3 py-1 cursor-pointer hover:bg-white transition z-20">
        <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
        <img src="{{ asset('assets/profile.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover">
    </div>
</div>

<svg style="display:none;">
    <filter id="displacementFilter">
  <feImage href="data:image/png;base64,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" 
                    preserveAspectRatio="none" />
        <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="-30" xChannelSelector="R" yChannelSelector="G" />
    </filter>
    <filter id="displacementFilterRev">
  <feImage href="data:image/png;base64,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" 
                    preserveAspectRatio="none" />
        <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="G" />
    </filter>
</svg>