 <aside id="logo-sidebar"
     class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
     aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium">

             {{-- Dashboard --}}
             <li>
                 <a href="{{ route('dashboard') }}" wire:navigate
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Request::routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                     <svg class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white {{ Request::routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                         <path
                             d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                         <path
                             d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                     </svg>
                     <span class="ms-3">Dashboard</span>
                 </a>
             </li>

             {{-- Users --}}
             @if (Auth::user()->role === 'admin' || Auth::user()->role === 'officer')
                 <li>
                     <button type="button"
                         class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::routeIs('citizen*') || Request::routeIs('officer*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}"
                         aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                         <svg class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white {{ Request::routeIs('citizen*') || Request::routeIs('officer*') ? 'bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400' }}"
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 18">
                             <path
                                 d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                         </svg>
                         <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                         <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 10 6">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="m1 1 4 4 4-4" />
                         </svg>
                     </button>
                     <ul id="dropdown-example" class="hidden py-2 space-y-2">
                         <li>
                             <a href="{{ route('citizens') }}"
                                 class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::routeIs('citizen*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">Citizens</a>
                         </li>
                         <li>
                             <a href="{{ route('officers') }}"
                                 class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::routeIs('officer*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">Officers</a>
                         </li>
                     </ul>
                 </li>
             @endif

             {{-- Complaint --}}
             <li>
                 <a href="{{ route('complaints') }}" wire:navigate
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Request::routeIs('complaints') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white {{ Request::routeIs('complaints') ? 'bg-gray-100 dark:bg-gray-700' : 'text-gray-500 dark:text-gray-400' }}">
                         <path fill-rule="evenodd"
                             d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                             clip-rule="evenodd" />
                         <path fill-rule="evenodd"
                             d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                             clip-rule="evenodd" />
                     </svg>
                     <span class="ms-3">Complaints</span>
                 </a>
             </li>
         </ul>
     </div>
 </aside>
