document.getElementById('theme-toggle').addEventListener('click', function () {
    const isDarkMode = document.body.classList.toggle('dark-mode');
    document.cookie = `theme=${isDarkMode ? 'dark' : 'light'}; path=/;`;
});

window.addEventListener('DOMContentLoaded', function (){
    const cookies = this.document.cookie.split('; ');
    const themeCookie = cookies.find(cookie => cookie.startsWith('theme='));
    if (themeCookie){
        const theme = themeCookie.split('=')[1];
        if (theme === 'dark'){
            this.document.body.classList.add('dark-mode')
        }
    }
});



--// MOS E FSHI: Eshte per navbar glitch
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
    });
});