 <!-- Desktop sidebar -->
 <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
     <div class="py-4 text-gray-500 dark:text-gray-400">
         <a class="flex items-center  ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
             <img style="width: 25%" src="{{ asset('assets/img/logo.png') }}" alt="Logo du CIL">
         </a>

         <ul>
             <li class="relative px-6 py-3">
                 @if (request()->routeIs('dashboard'))
                     <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                         aria-hidden="true"></span>
                 @endif
                 <a class=" inline-flex items-center w-full @if (request()->routeIs('dashboard')) text-gray-800 @endif text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                     href="{{ route('dashboard') }}" wire:navigate>
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                         </path>
                     </svg>
                     <span class="ml-4">Accueil</span>
                 </a>
             </li>
         </ul>
         <ul>
             <li class="relative px-6 py-3">
                 @if (request()->routeIs('users.index'))
                     <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                         aria-hidden="true"></span>
                 @endif
                 <a class=" inline-flex items-center w-full @if (request()->routeIs('users.index')) text-gray-800 @endif text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                     href="{{ route('users.index') }}" wire:navigate>
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                         </path>
                     </svg>
                     <span class="ml-4">Utilisateurs</span>
                 </a>
             </li>
         </ul>
         <ul>
             <li class="relative px-6 py-3">
                 @if (request()->routeIs('complaints.index'))
                     <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                         aria-hidden="true"></span>
                 @endif
                 <a class=" inline-flex items-center w-full @if (request()->routeIs('complaints.index')) text-gray-800 @endif text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                     href="{{ route('complaints.index') }}" wire:navigate>
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                         </path>
                     </svg>
                     <span class="ml-4">Plaintes</span>
                 </a>
             </li>
         </ul>
         <ul>
             <li class="relative px-6 py-3">
                 @if (request()->routeIs('websites.index'))
                     <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                         aria-hidden="true"></span>
                 @endif
                 <a class=" inline-flex items-center w-full @if (request()->routeIs('websites.index')) text-gray-800 @endif text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                     href="{{ route('websites.index') }}" wire:navigate>
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                         </path>
                     </svg>
                     <span class="ml-4">Sites Web</span>
                 </a>
             </li>
         </ul>
     </div>
 </aside>
 <!-- Mobile sidebar -->
 <!-- Backdrop -->
 <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
 <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
     x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
     x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
     @keydown.escape="closeSideMenu">
     <div class="py-4 text-gray-500 dark:text-gray-400">
         <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
             Windmill
         </a>
         <ul class="mt-6">
             <li class="relative px-6 py-3">
                 <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                     aria-hidden="true"></span>
                 <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                     href="index.html">
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                         </path>
                     </svg>
                     <span class="ml-4">Dashboard</span>
                 </a>
             </li>
         </ul>
         <ul>



             <li class="relative px-6 py-3">
                 <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                     href="buttons.html">
                     <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                         <path
                             d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                         </path>
                     </svg>
                     <span class="ml-4">Buttons</span>
                 </a>
             </li>



         </ul>
         <div class="px-6 my-6">
             <button
                 class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                 Create account
                 <span class="ml-2" aria-hidden="true">+</span>
             </button>
         </div>
     </div>
 </aside>
