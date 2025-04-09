<template>
    <div class="min-h-screen bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full">
            <div class="text-center mb-6">
                <img src="https://storage.googleapis.com/a1aa/image/j79R2dtCEl_vS19DtsODiE5CVTcQlTe8EV5On9QZOzk.jpg"
                     alt="Logo" class="mx-auto h-16 w-16 rounded-full mb-2" />
                <h1 class="text-2xl font-bold text-blue-600">NouraLara Vue</h1>
                <p class="text-sm text-gray-500">Code Like a Polar Bear – Stay Cool Under Pressure</p>
            </div>
            <slot />
        </div>
    </div>
</template>
