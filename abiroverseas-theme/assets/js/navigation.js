/**
 * Shared header navigation, touch dropdowns, scroll-to-top, and reveal controller.
 */
(function () {
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var navToggle = document.querySelector('[data-nav-toggle]');
  var navMenu = document.querySelector('[data-nav-menu]');
  var dropdownItems = Array.prototype.slice.call(
    document.querySelectorAll('.ab-nav-menu > li.has-dropdown, .ab-nav-menu > li.menu-item-has-children')
  );

  function setExpanded(item, expanded) {
    item.classList.toggle('is-open', expanded);
    var trigger = item.querySelector(':scope > a, :scope > .ab-dropdown-toggle');
    if (trigger) {
      trigger.setAttribute('aria-expanded', String(expanded));
    }
  }

  function closeDropdowns(exceptItem) {
    dropdownItems.forEach(function (item) {
      if (item !== exceptItem) {
        setExpanded(item, false);
      }
    });
  }

  function closeMobileMenu() {
    if (!navMenu || !navToggle) return;
    navMenu.classList.remove('is-open');
    navToggle.setAttribute('aria-expanded', 'false');
    closeDropdowns(null);
  }

  dropdownItems.forEach(function (item) {
    var link = item.querySelector(':scope > a');
    if (!link) return;
    link.setAttribute('aria-haspopup', 'true');
    if (!link.hasAttribute('aria-expanded')) {
      link.setAttribute('aria-expanded', 'false');
    }

    var toggle = item.querySelector(':scope > .ab-dropdown-toggle');
    if (!toggle) {
      toggle = document.createElement('button');
      toggle.type = 'button';
      toggle.className = 'ab-dropdown-toggle';
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'Toggle ' + (link.textContent || 'submenu').trim() + ' submenu');
      toggle.innerHTML = '<svg class="ab-chevron" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      link.insertAdjacentElement('afterend', toggle);
    }

    toggle.addEventListener('click', function (event) {
      event.preventDefault();
      event.stopPropagation();
      var willOpen = !item.classList.contains('is-open');
      closeDropdowns(item);
      setExpanded(item, willOpen);
      toggle.setAttribute('aria-expanded', String(willOpen));
    });

    link.addEventListener('click', function (event) {
      var href = link.getAttribute('href') || '';
      var isTouchOrCompact = window.matchMedia('(max-width: 960px), (hover: none)').matches;
      if (href === '#' || (isTouchOrCompact && !item.classList.contains('is-open'))) {
        event.preventDefault();
        var willOpen = !item.classList.contains('is-open');
        closeDropdowns(item);
        setExpanded(item, willOpen);
        toggle.setAttribute('aria-expanded', String(willOpen));
      }
    });
  });

  if (navToggle && navMenu) {
    navToggle.addEventListener('click', function (event) {
      event.stopPropagation();
      var isOpen = navMenu.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
      if (!isOpen) {
        closeDropdowns(null);
      }
    });

    navMenu.addEventListener('click', function (event) {
      var anchor = event.target.closest('a[href]');
      if (!anchor) return;
      var parentItem = anchor.parentElement;
      var isParentTrigger = parentItem && (parentItem.classList.contains('has-dropdown') || parentItem.classList.contains('menu-item-has-children')) && anchor.parentElement === parentItem;
      if (!isParentTrigger && navMenu.classList.contains('is-open')) {
        closeMobileMenu();
      }
    });

    document.addEventListener('click', function (event) {
      if (!navMenu.contains(event.target) && !navToggle.contains(event.target)) {
        closeMobileMenu();
      }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        var wasOpen = navMenu.classList.contains('is-open');
        closeMobileMenu();
        if (wasOpen) {
          navToggle.focus();
        }
      }
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 960 && navMenu.classList.contains('is-open')) {
        closeMobileMenu();
      }
    });
  }

  var scrollTopButton = document.querySelector('[data-scroll-top]');
  if (scrollTopButton) {
    var toggleScrollTop = function () {
      scrollTopButton.classList.toggle('is-visible', window.scrollY > 480);
    };
    toggleScrollTop();
    window.addEventListener('scroll', toggleScrollTop, { passive: true });
    scrollTopButton.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
  }

  var revealItems = document.querySelectorAll('.ab-reveal');
  if (revealItems.length) {
    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
      revealItems.forEach(function (item) {
        item.classList.add('is-visible');
      });
    } else {
      var revealObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              revealObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1, rootMargin: '0px 0px -32px 0px' }
      );
      revealItems.forEach(function (item) {
        if (!item.classList.contains('is-visible')) {
          revealObserver.observe(item);
        }
      });
    }
  }
})();
