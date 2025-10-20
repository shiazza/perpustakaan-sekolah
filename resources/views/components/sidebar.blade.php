<style>
    /* Biar text kebaca agak rapihan lah njir*/
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

    .sidebar-container {
        position: fixed; 
        top: 1rem;
        left: 1rem;
        height: calc(99vh - 2rem);
        width: 16rem;
        border-radius: 2rem;
        overflow: hidden; 
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

    /* Efek glass pertama menggunakan pseudo-element ::before */
    .sidebar-container::before {
        content: "";
        position: absolute;
        inset: 1;
        border-radius: inherit;
        backdrop-filter: url(#displacementFilter);
        -webkit-backdrop-filter: url();
        z-index: 1; 
    }

    /* Efek glass kedua menggunakan pseudo-element ::after */
    .sidebar-container::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: inherit;
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(1px) brightness(1.2) url(#displacementFilterRev);
        -webkit-backdrop-filter: blur(8px) brightness(1);
        background:  rgba(200, 200, 200, 0.01);
        z-index: 2; 
    }

    .sidebar-content {
        position: relative;
        z-index: 3; 
        height: 100%;
        overflow-y: auto;
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

/* Efek glass pertama menggunakan pseudo-element ::before */
.profile-container::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    backdrop-filter: url(#displacementFilter);
    -webkit-backdrop-filter: url(#displacementFilter);
    z-index: 1;
}

/* Efek glass kedua menggunakan pseudo-element ::before */
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

.profile-content {
    position: relative;
    z-index: 3;
}
</style>
{{-- Sidebar Sialan --}}
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

@include('components.liquid')