<div id="success-alert"
    class="fixed z-[999] top-4 left-1/2 -translate-x-1/2 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 transition-all duration-300 ease-out opacity-0 -translate-y-full"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        {{ $message }}
    </div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#success-alert" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

<script>
    const successAlert = document.getElementById('success-alert');
    const dismissButton = successAlert.querySelector('[data-dismiss-target]');

    successAlert.classList.remove('opacity-0', '-translate-y-full');
    successAlert.classList.add('opacity-100', 'translate-y-0');

    const dismissTimeout = setTimeout(() => {
        dismiss(successAlert);
    }, 5000);

    dismissButton.addEventListener('click', () => {
        dismiss(successAlert);
    });

    function dismiss(alert) {
        alert.classList.remove('opacity-100', 'translate-y-0');
        alert.classList.add('opacity-0', '-translate-y-full');

        clearTimeout(dismissTimeout);
        setTimeout(() => {
            alert.remove();
        }, parseFloat(getComputedStyle(alert).transitionDuration) * 1000);
    }
</script>
