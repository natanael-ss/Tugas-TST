<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mambo-Materi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-indigo-100 to-white min-h-screen flex items-center justify-center p-4">
    <div class="text-center">
        <!-- Logo/Icon -->
        <div class="mb-8">
            <i class="fas fa-book-reader text-6xl text-indigo-600"></i>
        </div>
        
        <!-- Welcome Text -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Welcome to Mambo-Materi
        </h1>
        
        <!-- Subtitle -->
        <p class="text-xl text-gray-600 mb-12">
            Your gateway to interactive learning experience
        </p>
        
        <!-- Buttons Container -->
        <div class="space-y-4 md:space-y-0 md:space-x-4">
            <a href="/auth/register" 
               class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                <i class="fas fa-user-plus mr-2"></i>
                Register
            </a>
            
            <a href="/auth/login" 
               class="inline-flex items-center px-8 py-3 border border-indigo-600 text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Login
            </a>
        </div>
        
        <!-- Optional: Footer Text -->
        <p class="mt-12 text-sm text-gray-500">
            Start your learning journey today
        </p>
    </div>
    
    <!-- Optional: Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-4 bg-indigo-600"></div>
</body>
</html>