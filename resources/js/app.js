import './bootstrap';

const themeStorageKey = 'theme';
const themeToggle = document.getElementById('themeToggle');
const root = document.documentElement;

const getStoredTheme = () => localStorage.getItem(themeStorageKey);
const getSystemTheme = () =>
	window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
		? 'dark'
		: 'light';

const applyTheme = (theme) => {
	root.classList.toggle('dark', theme === 'dark');
	if (themeToggle) {
		themeToggle.checked = theme === 'dark';
	}
};

const initTheme = () => {
	const storedTheme = getStoredTheme();
	applyTheme(storedTheme || getSystemTheme());
};

initTheme();

if (themeToggle) {
	themeToggle.addEventListener('change', (event) => {
		const theme = event.target.checked ? 'dark' : 'light';
		localStorage.setItem(themeStorageKey, theme);
		applyTheme(theme);
	});
}

const mediaQuery = window.matchMedia ? window.matchMedia('(prefers-color-scheme: dark)') : null;
if (mediaQuery && mediaQuery.addEventListener) {
	mediaQuery.addEventListener('change', () => {
		if (!getStoredTheme()) {
			applyTheme(getSystemTheme());
		}
	});
}
