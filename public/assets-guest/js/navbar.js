(function () {
	'use strict';

    var MOBILE_BREAKPOINT = 767; 
    
    var SUBMENU_SELECTOR = 'dropdown-submenu'; 

	function closeAllSubmenus() {
        if (window.innerWidth > MOBILE_BREAKPOINT) return; 
        
		document.querySelectorAll(SUBMENU_SELECTOR + '.open').forEach(function (el) {
			el.classList.remove('open');
            var trigger = el.querySelector(':scope > a');
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
		});
	}

	function toggleSubmenu(submenu) {
		var isOpen = submenu.classList.contains('open');
        
        if (!isOpen && window.innerWidth <= MOBILE_BREAKPOINT) {
            submenu.parentNode.querySelectorAll(':scope > ' + SUBMENU_SELECTOR + '.open').forEach(function(sib) {
                if (sib !== submenu) {
                    sib.classList.remove('open');
                    sib.querySelector(':scope > a').setAttribute('aria-expanded', 'false');
                }
            });
        }
        
		submenu.classList.toggle('open', !isOpen);
        
		var trigger = submenu.querySelector(':scope > a');
		if (trigger) {
			trigger.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
		}
	}

	function initSubmenuClicks() {
		var submenus = document.querySelectorAll(SUBMENU_SELECTOR);
		submenus.forEach(function (li) {
			if (li.__submenuInitialized) return;
			li.__submenuInitialized = true;

			var trigger = li.querySelector(':scope > a');
			if (!trigger) return;

			trigger.setAttribute('role', 'button');
			trigger.setAttribute('aria-haspopup', 'true');
			trigger.setAttribute('aria-expanded', 'false');

			trigger.addEventListener('click', function (e) {
                // **Hanya jalankan fungsi toggle di mobile**
                if (window.innerWidth <= MOBILE_BREAKPOINT) { 
                    e.preventDefault();
                    toggleSubmenu(li);
                }
			});
		});
        

        document.querySelectorAll('.dropdown > a').forEach(function (link) {
            if (link.__dropdownInitialized) return;
            link.__dropdownInitialized = true;
            
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= MOBILE_BREAKPOINT && link.parentNode.querySelector('.dropdown-menu')) {
                    e.preventDefault();
                    link.parentNode.classList.toggle('open');
                }
            });
        });
	}
    
	document.addEventListener('click', function (e) {
		if (window.innerWidth <= MOBILE_BREAKPOINT) {
            var target = e.target;
            
            if (!target.closest('.navigation') && !target.closest('.hamburger-icon')) {
                closeAllSubmenus();
                document.querySelectorAll('.dropdown.open').forEach(function(el) {
                    el.classList.remove('open');
                });
            }
		}
	});

	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' || e.key === 'Esc') {
			closeAllSubmenus();
			var menuToggle = document.getElementById('menu-toggle');
			if (menuToggle && menuToggle.checked) menuToggle.checked = false;
		}
	});

	window.addEventListener('resize', function () {
		if (window.innerWidth > MOBILE_BREAKPOINT) {
			document.querySelectorAll('.dropdown.open').forEach(function (li) {
				li.classList.remove('open');
			});
            document.querySelectorAll(SUBMENU_SELECTOR + '.open').forEach(function (li) {
				li.classList.remove('open');
                li.querySelector(':scope > a').setAttribute('aria-expanded', 'false');
			});
		}
	});

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSubmenuClicks);
	} else {
		initSubmenuClicks();
	}
})();