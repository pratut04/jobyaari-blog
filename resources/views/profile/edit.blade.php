<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        My Profile
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 dark:bg-[#020617] dark:text-white min-h-screen">

    <!-- NAVBAR -->

    @include('frontend.partials.navbar')

    <div class="py-12">

        <h1 class="text-4xl font-bold mb-8 text-center text-gray-900 dark:text-white">

            My Profile

        </h1>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-[#111827] shadow sm:rounded-lg">

                <div class="max-w-xl">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-[#111827] shadow sm:rounded-lg">

                <div class="max-w-xl">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-[#111827] shadow sm:rounded-lg">

                <div class="max-w-xl">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</body>
</html>