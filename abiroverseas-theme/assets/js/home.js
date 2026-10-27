/**
 * Homepage interactions: hero photo gallery (with touch swipe) and quick-enquiry prefill/validation.
 */
(function () {
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* 1. Hero four-image rotating gallery + touch swipe */
  var heroGallery = document.querySelector('.ab-hero-art--rotating');
  var heroPhotos = Array.from(document.querySelectorAll('[data-hero-photo]'));
  var photoThumbs = Array.from(document.querySelectorAll('[data-photo-thumb]'));
  var prevPhotoButton = document.querySelector('[data-photo-prev]');
  var nextPhotoButton = document.querySelector('[data-photo-next]');
  var activePhoto = 0;
  var photoTimer = null;

  var setHeroPhoto = function (nextIndex) {
    if (!heroPhotos.length) return;
    activePhoto = (nextIndex + heroPhotos.length) % heroPhotos.length;
    heroPhotos.forEach(function (photo, index) {
      var isCurrent = index === activePhoto;
      photo.classList.toggle('is-active', isCurrent);
      photo.setAttribute('aria-hidden', String(!isCurrent));
    });
    photoThumbs.forEach(function (thumb, index) {
      var isCurrent = index === activePhoto;
      thumb.classList.toggle('is-active', isCurrent);
      thumb.setAttribute('aria-pressed', String(isCurrent));
    });
  };

  var stopPhotoRotation = function () {
    if (photoTimer) {
      window.clearInterval(photoTimer);
      photoTimer = null;
    }
  };

  var startPhotoRotation = function () {
    if (prefersReducedMotion || heroPhotos.length < 2) return;
    stopPhotoRotation();
    photoTimer = window.setInterval(function () {
      setHeroPhoto(activePhoto + 1);
    }, 3800);
  };

  photoThumbs.forEach(function (thumb, index) {
    thumb.addEventListener('click', function () {
      setHeroPhoto(index);
      startPhotoRotation();
    });
  });

  if (prevPhotoButton) {
    prevPhotoButton.addEventListener('click', function () {
      setHeroPhoto(activePhoto - 1);
      startPhotoRotation();
    });
  }

  if (nextPhotoButton) {
    nextPhotoButton.addEventListener('click', function () {
      setHeroPhoto(activePhoto + 1);
      startPhotoRotation();
    });
  }

  if (heroGallery && heroPhotos.length > 1) {
    heroGallery.addEventListener('mouseenter', stopPhotoRotation);
    heroGallery.addEventListener('mouseleave', startPhotoRotation);
    heroGallery.addEventListener('focusin', stopPhotoRotation);
    heroGallery.addEventListener('focusout', startPhotoRotation);

    var touchStartX = 0;
    var touchStartY = 0;
    heroGallery.addEventListener('touchstart', function (e) {
      if (!e.touches || !e.touches.length) return;
      touchStartX = e.touches[0].clientX;
      touchStartY = e.touches[0].clientY;
    }, { passive: true });

    heroGallery.addEventListener('touchend', function (e) {
      if (!e.changedTouches || !e.changedTouches.length) return;
      var dx = e.changedTouches[0].clientX - touchStartX;
      var dy = e.changedTouches[0].clientY - touchStartY;
      if (Math.abs(dx) > 42 && Math.abs(dx) > Math.abs(dy)) {
        setHeroPhoto(dx < 0 ? activePhoto + 1 : activePhoto - 1);
        startPhotoRotation();
      }
    }, { passive: true });

    startPhotoRotation();
  }

  /* 2. Quick-enquiry topic prefill */
  var topicField = document.querySelector('#home-topic');
  var statusText = document.querySelector('#home-form-status');
  var form = document.querySelector('#enquiry-form');

  document.querySelectorAll('[data-enquiry]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var topic = trigger.getAttribute('data-enquiry');
      if (!topicField || !topic) return;
      var match = Array.from(topicField.options).find(function (option) {
        return option.textContent.trim() === topic.trim();
      });
      if (match) {
        topicField.value = match.value;
      }
      if (statusText) {
        statusText.textContent = 'Selected enquiry type: ' + topic + '.';
      }
    });
  });

  /* 3. Form validation & server status notice */
  if (form && statusText) {
    var enquiryResult = new URLSearchParams(window.location.search).get('ab_enquiry');
    if (enquiryResult === 'sent') {
      statusText.textContent = 'Thank you. Your enquiry has been sent.';
    } else if (enquiryResult === 'missing') {
      statusText.textContent = 'Please complete your name, business email, enquiry type, and requirement details.';
    } else if (enquiryResult === 'error') {
      statusText.textContent = 'We could not send your enquiry just now. Please verify the required fields and try again.';
    }

    form.addEventListener('submit', function (event) {
      var name = form.elements.name ? form.elements.name.value.trim() : '';
      var email = form.elements.email ? form.elements.email.value.trim() : '';
      var topic = form.elements.topic ? form.elements.topic.value.trim() : '';
      var message = form.elements.message ? form.elements.message.value.trim() : '';
      var emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

      if (!name || !emailOk || !topic || !message) {
        event.preventDefault();
        statusText.textContent = 'Please complete your name, a valid business email, enquiry type, and requirement details.';
        var firstMissing = [form.elements.name, form.elements.email, form.elements.topic, form.elements.message].find(function (field) {
          return field && (!field.value.trim() || (field === form.elements.email && !emailOk));
        });
        if (firstMissing) firstMissing.focus();
      } else {
        statusText.textContent = 'Sending your enquiry...';
      }
    });
  }
})();
