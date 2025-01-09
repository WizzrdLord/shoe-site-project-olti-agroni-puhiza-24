// Dark Mode Toggle
document.getElementById('theme-toggle').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent link default behavior
    const isDarkMode = document.body.classList.toggle('dark-mode');
    document.cookie = `theme=${isDarkMode ? 'dark' : 'light'}; path=/;`;
});

// Set Theme on Page Load
window.addEventListener('DOMContentLoaded', function () {
    const cookies = document.cookie.split('; ');
    const themeCookie = cookies.find(cookie => cookie.startsWith('theme='));
    if (themeCookie) {
        const theme = themeCookie.split('=')[1];
        if (theme === 'dark') {
            document.body.classList.add('dark-mode');
        }
    }
});

