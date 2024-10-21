
function Pratik(){
    window.location.assign("index.html");
}


// Dark Mode Toggle Function
const themeSwitch = document.getElementById('theme-switch');
const themeIcon = document.getElementById('theme-icon');

// Toggle Dark Mode function
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    
    // Toggle icon based on theme
    if (document.body.classList.contains('dark-mode')) {
        themeIcon.classList.replace('fa-sun', 'fa-moon');
        localStorage.setItem('theme', 'dark');
    } else {
        themeIcon.classList.replace('fa-moon', 'fa-sun');
        localStorage.setItem('theme', 'light');
    }
}

// Load theme based on user preference saved in local storage
window.onload = function () {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeIcon.classList.replace('fa-sun', 'fa-moon');
    }
};





