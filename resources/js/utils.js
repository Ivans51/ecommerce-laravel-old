window.changeTheme = function changeTheme() {
  const theme = localStorage.theme

  const queryDark = '(prefers-color-scheme: dark)'
  if (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(queryDark).matches)) {
    document.querySelector('html').classList.add('dark')
    document.getElementById('dark-theme').checked = false
  } else {
    document.querySelector('html').classList.remove('dark')
    document.getElementById('dark-theme').checked = true
  }

  localStorage.theme = theme === 'dark' ? 'light' : 'dark'
}

window.isDarkTheme = function () {
  document.getElementById('dark-theme').checked = localStorage.theme === 'dark';
}

window.startTheme = function () {
  const theme = localStorage.theme === 'dark' ? 'light' : 'dark'

  const queryDark = '(prefers-color-scheme: dark)'
  if (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(queryDark).matches)) {
    document.querySelector('html').classList.add('dark')
  } else {
    document.querySelector('html').classList.remove('dark')
  }
}

