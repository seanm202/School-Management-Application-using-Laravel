<style>

@media only screen and (max-width: 600px) {
  .topNavigation{
  display:hide;
  }
}

</style>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                @if ( Auth::user()->role == 3)
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('Admindashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                @endif
                @if ( Auth::user()->role == 2)
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('Teacherdashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                @endif
                @if ( Auth::user()->role == 4)
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('Studentdashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                @endif

                <!-- Navigation Links -->
                @if ( Auth::user()->role == 3)
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('Admindashboard')" :active="request()->routeIs('Admindashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('Admin')" :active="request()->routeIs('Admin')">
                        {{ __('Admin') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminAttendance')" :active="request()->routeIs('AdminAttendance')">
                        {{ __('Attendance') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('getAdminClassRoomDetails')" :active="request()->routeIs('getAdminClassRoomDetails')">
                        {{ __('Classroom') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('getAdminAllDetails')" :active="request()->routeIs('getAdminAllDetails')">
                        {{ __('Details') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminGrade')" :active="request()->routeIs('AdminGrade')">
                        {{ __('Grade') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminRole')" :active="request()->routeIs('AdminRole')">
                        {{ __('User Roles') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminSection')" :active="request()->routeIs('AdminSection')">
                        {{ __('Section') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminStudent')" :active="request()->routeIs('AdminStudent')">
                        {{ __('Student') }}
                    </x-nav-link>
                </div>
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminSubjectTeachersForEachSection')" :active="request()->routeIs('AdminSubjectTeachersForEachSection')">
                        {{ __('Subject Teachers') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminSubject')" :active="request()->routeIs('AdminSubject')">
                        {{ __('Subject') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('AdminTeacher')" :active="request()->routeIs('AdminTeacher')">
                        {{ __('Teacher') }}
                    </x-nav-link>
                </div>
                @endif
                @if ( Auth::user()->role == 2)
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('Teacherdashboard')" :active="request()->routeIs('Teacherdashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('TeacherStudent')" :active="request()->routeIs('TeacherStudent')">
                        {{ __('Student') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('TeacherAttendance')" :active="request()->routeIs('TeacherAttendance')">
                        {{ __('Attendance') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('TeacherDetails')" :active="request()->routeIs('TeacherDetails')">
                        {{ __('Details') }}
                    </x-nav-link>
                </div>
                @endif
                @if ( Auth::user()->role == 4)
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('StudentDashboard')" :active="request()->routeIs('StudentDashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('StudentTeachersDetails')" :active="request()->routeIs('StudentTeachersDetails')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('StudentAttendance')" :active="request()->routeIs('StudentAttendance')">
                        {{ __('Attendance') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('StudentMarks')" :active="request()->routeIs('StudentMarks')">
                        {{ __('Marks') }}
                    </x-nav-link>
                </div>

                <div class="hidden topNavigation space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('StudentDetails')" :active="request()->routeIs('StudentDetails')">
                        {{ __('Details') }}
                    </x-nav-link>
                </div>

                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                                    <!-- Navigation Links -->

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if ( Auth::user()->role == 3)
                    <x-responsive-nav-link :href="route('Admindashboard')" :active="request()->routeIs('Admindashboard')">
                            {{ __('Dashboard') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('Admin')" :active="request()->routeIs('Admin')">
                            {{ __('Admin') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminAttendance')" :active="request()->routeIs('AdminAttendance')">
                            {{ __('Attendance') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('getAdminClassRoomDetails')" :active="request()->routeIs('getAdminClassRoomDetails')">
                            {{ __('Classroom') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('getAdminAllDetails')" :active="request()->routeIs('getAdminAllDetails')">
                            {{ __('Details') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminGrade')" :active="request()->routeIs('AdminGrade')">
                            {{ __('Grade') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminRole')" :active="request()->routeIs('AdminRole')">
                            {{ __('User Roles') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminSection')" :active="request()->routeIs('AdminSection')">
                            {{ __('Section') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminStudent')" :active="request()->routeIs('AdminStudent')">
                            {{ __('Student') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminSubjectTeachersForEachSection')" :active="request()->routeIs('AdminSubjectTeachersForEachSection')">
                            {{ __('Subject Teachers') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminSubject')" :active="request()->routeIs('AdminSubject')">
                            {{ __('Subject') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('AdminTeacher')" :active="request()->routeIs('AdminTeacher')">
                            {{ __('Teacher') }}
                          </x-responsive-nav-link>
                @endif
                @if ( Auth::user()->role == 2)
                    <x-responsive-nav-link :href="route('Teacherdashboard')" :active="request()->routeIs('Teacherdashboard')">
                            {{ __('Dashboard') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('TeacherStudent')" :active="request()->routeIs('TeacherStudent')">
                            {{ __('Student') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('TeacherAttendance')" :active="request()->routeIs('TeacherAttendance')">
                            {{ __('Attendance') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('TeacherDetails')" :active="request()->routeIs('TeacherDetails')">
                            {{ __('Details') }}
                          </x-responsive-nav-link>
                @endif
                @if ( Auth::user()->role == 4)
                          <x-responsive-nav-link :href="route('StudentDashboard')" :active="request()->routeIs('StudentDashboard')">
                            {{ __('Dashboard') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('StudentTeachersDetails')" :active="request()->routeIs('StudentTeachersDetails')">
                            {{ __('Contact Us') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('StudentAttendance')" :active="request()->routeIs('StudentAttendance')">
                            {{ __('Attendance') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('StudentMarks')" :active="request()->routeIs('StudentMarks')">
                            {{ __('Marks') }}
                          </x-responsive-nav-link>
                          <x-responsive-nav-link :href="route('StudentDetails')" :active="request()->routeIs('StudentDetails')">
                            {{ __('Details') }}
                          </x-responsive-nav-link>

              @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
