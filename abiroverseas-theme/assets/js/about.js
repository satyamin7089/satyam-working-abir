/**
 * About page interactions: accessible FAQ category filtering with keyboard support.
 */
(function () {
  var faqTabs = Array.from(document.querySelectorAll('[data-faq-filter]'));
  var faqCards = Array.from(document.querySelectorAll('#ab-faq-container .ab-faq-card'));
  var faqEmpty = document.getElementById('ab-faq-empty');

  if (!faqTabs.length || !faqCards.length) return;

  var activateTab = function (tab, moveFocus) {
    var filter = tab.getAttribute('data-faq-filter');
    faqTabs.forEach(function (t) {
      var active = t === tab;
      t.classList.toggle('is-active', active);
      t.setAttribute('aria-selected', String(active));
      t.setAttribute('tabindex', active ? '0' : '-1');
    });
    if (moveFocus) tab.focus();

    var visible = 0;
    faqCards.forEach(function (card) {
      var match = filter === 'all' || card.getAttribute('data-category') === filter;
      card.hidden = !match;
      if (!match) card.removeAttribute('open');
      if (match) visible += 1;
    });

    if (faqEmpty) {
      faqEmpty.classList.toggle('is-visible', visible === 0);
    }
  };

  faqTabs.forEach(function (tab, index) {
    tab.setAttribute('tabindex', tab.classList.contains('is-active') ? '0' : '-1');

    tab.addEventListener('click', function () {
      activateTab(tab, false);
    });

    tab.addEventListener('keydown', function (event) {
      var nextIndex = null;
      if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
        nextIndex = (index + 1) % faqTabs.length;
      } else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
        nextIndex = (index - 1 + faqTabs.length) % faqTabs.length;
      } else if (event.key === 'Home') {
        nextIndex = 0;
      } else if (event.key === 'End') {
        nextIndex = faqTabs.length - 1;
      }
      if (nextIndex !== null) {
        event.preventDefault();
        activateTab(faqTabs[nextIndex], true);
      }
    });
  });
})();
