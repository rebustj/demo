<nav class="container mx-auto">
    <div class="flex justify-between px-2">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <img class="w-7" src="https://larazeus.com/images/zeus-logo.png"
                 alt="{{ config('zeus.wind.name', config('app.name', 'Laravel')) }}">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">@zeus</span>
        </a>
        <div class="z-50 hidden sm:flex items-center justify-center gap-4">
            <x-filament::dropdown placement="bottom-start" teleport="true">
                <x-slot name="trigger"
                        class="dark:text-primary-200 text-primary-700 flex items-center justify-center gap-1">
                    {{ __('Site') }}
                    <x-ri-arrow-down-s-fill
                            class="h-4 w-4 text-secondary-500 hover:text-primary-600 transition-all ease-in-out duration-300"/>
                </x-slot>

                <x-filament::dropdown.header
                        class="dark:text-gray-200 text-gray-700"
                        :color="'primary'"
                        :icon="'ri-global-fill'"
                        :href="'#'"
                        :tag="'a'"
                >
                    Our Site:
                </x-filament::dropdown.header>

                <x-filament::dropdown.list>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('sky')"
                            tag="a"
                    >
                        {{ __('Blog') }}
                    </x-filament::dropdown.list.item>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('sky/faq')"
                            tag="a"
                    >
                        {{ __('Faq') }}
                    </x-filament::dropdown.list.item>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('sky/library')"
                            tag="a"
                    >
                        {{ __('Library') }}
                    </x-filament::dropdown.list.item>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('wind/contact-us')"
                            tag="a"
                    >
                        {{ __('Contact us') }}
                    </x-filament::dropdown.list.item>
                </x-filament::dropdown.list>
            </x-filament::dropdown>

            <x-filament::dropdown placement="bottom-start" teleport="true">
                <x-slot name="trigger"
                        class="dark:text-primary-200 text-primary-700 flex items-center justify-center gap-1">
                    {{ __('Forms') }}
                    <x-ri-arrow-down-s-fill
                            class="h-4 w-4 text-secondary-500 hover:text-primary-600 transition-all ease-in-out duration-300"/>
                </x-slot>

                <x-filament::dropdown.list>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('bolt')"
                            tag="a"
                    >
                        {{ __('All Forms') }}
                    </x-filament::dropdown.list.item>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('bolt/entries')"
                            tag="a"
                    >
                        {{ __('My Entries') }}
                    </x-filament::dropdown.list.item>
                </x-filament::dropdown.list>
            </x-filament::dropdown>

            <x-filament::dropdown placement="bottom-start" teleport="true">
                <x-slot name="trigger" class="dark:text-primary-200 text-primary-700 flex items-center justify-center gap-1">
                    {{ __('Tickets') }}
                    <x-ri-arrow-down-s-fill class="h-4 w-4 text-secondary-500 hover:text-primary-600 transition-all ease-in-out duration-300"/>
                </x-slot>

                <x-filament::dropdown.list>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('thunder')"
                            tag="a"
                    >
                        {{ __('All Tickets') }}
                    </x-filament::dropdown.list.item>
                    <x-filament::dropdown.list.item
                            class="dark:text-gray-200 text-gray-700"
                            :color="'secondary'"
                            :icon="'iconpark-dot'"
                            :href="url('thunder/tickets')"
                            tag="a"
                    >
                        {{ __('My Tickets') }}
                    </x-filament::dropdown.list.item>
                </x-filament::dropdown.list>
            </x-filament::dropdown>

            <x-filament::button tag="a" size="sm" href="{{ url('/admin') }}">
                {{ __('Admin') }}
            </x-filament::button>

            <x-lang-switcher/>
            <x-dark-mode/>
        </div>

        <button @click="open = !open" type="button"
                class="inline-flex sm:hidden items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg :class="{ 'hidden': open, 'block': !(open) }" class="h-6 w-6"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-cloak :class="{ 'block': open, 'hidden': !(open) }" class="h-6 w-6"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <div x-show="open" @click.away="open = false" x-cloak class="" id="mobile-menu"
         x-transition:enter="duration-200 ease-out"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="duration-100 ease-in"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="mt-0 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-gray-800 divide-y-2 divide-gray-50 mx-2">
            <div class="flex flex-col p-4 gap-4">
                <a href="{{ url('sky') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    {{ __('Blog') }}
                </a>
                <a href="{{ url('wind/contact-us') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    {{ __('Contact us') }}
                </a>
                <a href="{{ url('sky/faq') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    {{ __('Faq') }}
                </a>
                <a href="{{ url('sky/library') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    {{ __('Library') }}
                </a>
                <x-filament-support::hr/>
                <a href="{{ url('/bolt') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    All Forms
                </a>
                <a href="{{ url('/bolt/entries') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    My Entries
                </a>
                <x-filament-support::hr/>
                <a href="{{ url('/thunder') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    All Tickets
                </a>
                <a href="{{ url('/thunder/tickets') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    My Tickets
                </a>
                <x-filament-support::hr/>
                <a href="{{ url('/admin') }}"
                   class="whitespace-nowrap transition ease-in-out text-primary-600 dark:text-primary-200 hover:text-secondary-600 dark:hover:text-secondary-300">
                    {{ __('Admin Panel') }}
                </a>

                <div class="flex gap-4 mt-4">
                    <x-lang-switcher/>
                    <x-dark-mode/>
                </div>

            </div>
        </div>
    </div>
</nav>
