<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign-in | ICCMS</title>
        {{-- css --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="min-h-screen bg-background">
        <div class="m-auto flex h-screen flex-col items-center justify-center space-y-12">
            {{-- Card --}}
            <div class="grid w-full max-w-[400px] items-center px-4">
                <div class="rounded-lg border bg-card p-8 shadow-sm">
                    {{-- Card Header --}}
                    <div class="flex flex-col space-y-1.5 pb-6">
                        {{-- Card Title --}}
                        <h2 class="text-2xl font-semibold tracking-tight">Sign in</h2>
                        {{-- Card Description --}}
                        <p class="text-sm text-muted-foreground">Welcome back! Please sign-in to continue</p>
                    </div>
                    {{-- Card Content --}}
                    <div class="space-y-4">
                        <form action="#" method="POST">
                            @csrf
                            <div class="space-y-4">
                                {{-- Email --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="email">Email</label>
                                    <input
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                        type="email" name="email" id="email" placeholder="name@example.com"
                                        required />
                                </div>
                                {{-- Password --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="password">Password</label>
                                    <input
                                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                        type="password" name="password" id="password" required />
                                </div>
                                {{-- Remember Me & Forgot Password --}}
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <input type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300" />
                                        <label for="remember" class="text-sm text-muted-foreground">Remember me</label>
                                    </div>
                                    <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                                </div>
                                {{-- Submit Button --}}
                                <button type="submit" id="submitBtn"
                                    class="inline-flex w-full items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                                    <span id="btnText">Sign in</span>
                                    <svg id="loadingSpinner" class="ml-2 hidden h-4 w-4 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

