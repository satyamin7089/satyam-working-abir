/**
 * Material page interactions: hero gallery (slide-based + touch swipe), form prefill/validation, and sticky subnav spy.
 */
(function () {
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* 1. Hero gallery + touch swipe */
  var gallery = document.querySelector('[data-hdpe-gallery], .ab-product-gallery');
  if (gallery) {
    var slides = Array.from(gallery.querySelectorAll('.ab-gallery-slide'));
    var mainImage = gallery.querySelector('[data-gallery-main]');
    var caption = gallery.querySelector('[data-gallery-caption]');
    var thumbs = Array.from(gallery.querySelectorAll('.ab-gallery-thumb, [data-gallery-thumb]'));
    var prevButton = gallery.querySelector('.ab-gallery-arrow--prev, [data-gallery-prev]');
    var nextButton = gallery.querySelector('.ab-gallery-arrow--next, [data-gallery-next]');
    var activeIndex = 0;
    var timer = null;

    var showGalleryImage = function (index) {
      var count = slides.length || thumbs.length;
      if (!count) return;
      activeIndex = (index + count) % count;

      if (slides.length) {
        slides.forEach(function (slide, slideIndex) {
          var isCurrent = slideIndex === activeIndex;
          slide.classList.toggle('is-active', isCurrent);
          slide.setAttribute('aria-hidden', String(!isCurrent));
        });
      } else if (mainImage && thumbs[activeIndex]) {
        var activeThumb = thumbs[activeIndex];
        mainImage.src = activeThumb.getAttribute('data-src') || mainImage.src;
        mainImage.alt = activeThumb.getAttribute('data-alt') || '';
        if (caption) caption.textContent = activeThumb.getAttribute('data-caption') || '';
      }

      thumbs.forEach(function (thumb, thumbIndex) {
        var isCurrent = thumbIndex === activeIndex;
        thumb.classList.toggle('is-active', isCurrent);
        thumb.setAttribute('aria-pressed', String(isCurrent));
      });
    };

    var stopAuto = function () {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
    };

    var startAuto = function () {
      var count = slides.length || thumbs.length;
      if (prefersReducedMotion || count < 2) return;
      stopAuto();
      timer = window.setInterval(function () {
        showGalleryImage(activeIndex + 1);
      }, 4200);
    };

    thumbs.forEach(function (thumb, index) {
      thumb.addEventListener('click', function () {
        showGalleryImage(index);
        startAuto();
      });
    });

    if (prevButton) {
      prevButton.addEventListener('click', function () {
        showGalleryImage(activeIndex - 1);
        startAuto();
      });
    }

    if (nextButton) {
      nextButton.addEventListener('click', function () {
        showGalleryImage(activeIndex + 1);
        startAuto();
      });
    }

    gallery.addEventListener('mouseenter', stopAuto);
    gallery.addEventListener('mouseleave', startAuto);
    gallery.addEventListener('focusin', stopAuto);
    gallery.addEventListener('focusout', startAuto);

    var artStage = gallery.querySelector('.ab-prod-art') || gallery;
    var touchStartX = 0;
    var touchStartY = 0;
    artStage.addEventListener('touchstart', function (e) {
      if (!e.touches || !e.touches.length) return;
      touchStartX = e.touches[0].clientX;
      touchStartY = e.touches[0].clientY;
    }, { passive: true });

    artStage.addEventListener('touchend', function (e) {
      var count = slides.length || thumbs.length;
      if (!e.changedTouches || !e.changedTouches.length || count < 2) return;
      var dx = e.changedTouches[0].clientX - touchStartX;
      var dy = e.changedTouches[0].clientY - touchStartY;
      if (Math.abs(dx) > 42 && Math.abs(dx) > Math.abs(dy)) {
        showGalleryImage(dx < 0 ? activeIndex + 1 : activeIndex - 1);
        startAuto();
      }
    }, { passive: true });

    startAuto();
  }

  /* 2. Material form prefill & validation */
  var formField = document.querySelector('#hdpe-form');
  var datasheetField = document.querySelector('#hdpe-datasheet');
  var statusText = document.querySelector('#hdpe-form-status');
  var enquiryForm = document.querySelector('#hdpe-enquiry-form');

  document.querySelectorAll('[data-form-select]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var selectedForm = trigger.getAttribute('data-form-select');
      if (!formField || !selectedForm) return;
      var match = Array.from(formField.options).find(function (option) {
        return option.textContent.trim() === selectedForm.trim();
      });
      if (match) formField.value = match.value;
      if (statusText) statusText.textContent = 'Selected material form: ' + selectedForm + '.';
    });
  });

  document.querySelectorAll('[data-focus-datasheet], a[href="#hdpe-datasheet"]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      window.setTimeout(function () {
        if (datasheetField) datasheetField.focus();
      }, 280);
    });
  });

  if (enquiryForm && statusText) {
    var enquiryResult = new URLSearchParams(window.location.search).get('ab_enquiry');
    if (enquiryResult === 'sent') {
      statusText.textContent = 'Thank you. Your material enquiry has been sent.';
    } else if (enquiryResult === 'missing') {
      statusText.textContent = 'Please complete your name, business email, and application or specification details.';
    } else if (enquiryResult === 'error') {
      statusText.textContent = 'We could not send your requirement just now. Please verify the required fields and file upload (up to 5 MB).';
    }

    enquiryForm.addEventListener('submit', function (event) {
      var name = enquiryForm.elements.name ? enquiryForm.elements.name.value.trim() : '';
      var email = enquiryForm.elements.email ? enquiryForm.elements.email.value.trim() : '';
      var requirement = enquiryForm.elements.requirement ? enquiryForm.elements.requirement.value.trim() : '';
      var emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
      var file = datasheetField && datasheetField.files ? datasheetField.files[0] : null;
      var maxBytes = 5 * 1024 * 1024;

      if (!name || !emailOk || !requirement) {
        event.preventDefault();
        statusText.textContent = 'Please add your name, a valid business email, and your application or specification details.';
        var firstMissing = [enquiryForm.elements.name, enquiryForm.elements.email, enquiryForm.elements.requirement].find(function (field) {
          return field && (!field.value.trim() || (field === enquiryForm.elements.email && !emailOk));
        });
        if (firstMissing) firstMissing.focus();
        return;
      }

      if (file && file.size > maxBytes) {
        event.preventDefault();
        statusText.textContent = 'The selected file is larger than 5 MB. Please upload a smaller datasheet or specification file.';
        datasheetField.focus();
        return;
      }

      statusText.textContent = 'Sending your requirement...';
    });
  }

  /* 3. Sticky sub-navigation active section spy */
  var subnavContainer = document.querySelector('#product-section-nav, [data-subnav]');
  var subnavLinks = subnavContainer ? Array.from(subnavContainer.querySelectorAll('a[href^="#"]')) : [];
  var trackedSections = subnavLinks
    .map(function (link) {
      return document.querySelector(link.getAttribute('href'));
    })
    .filter(Boolean);

  if (trackedSections.length && 'IntersectionObserver' in window) {
    var sectionObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          subnavLinks.forEach(function (link) {
            var isCurrent = link.getAttribute('href') === '#' + entry.target.id;
            link.classList.toggle('is-current', isCurrent);
            if (isCurrent && subnavContainer && subnavContainer.scrollWidth > subnavContainer.clientWidth) {
              var targetLeft = link.offsetLeft - subnavContainer.clientWidth / 2 + link.offsetWidth / 2;
              subnavContainer.scrollTo({ left: Math.max(0, targetLeft), behavior: 'smooth' });
            }
          });
        });
      },
      { rootMargin: '-28% 0px -58% 0px', threshold: 0 }
    );
    trackedSections.forEach(function (section) {
      sectionObserver.observe(section);
    });
  }
})();
