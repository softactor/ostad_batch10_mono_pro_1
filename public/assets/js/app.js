// Minimal JS starter. When you migrate to Vue 3, mount your app to the #app element here.
document.addEventListener('DOMContentLoaded', function () {
  // Simple click handler for "Add to cart" buttons (demo-only)
  document.querySelectorAll('button.btn-success').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      const card = btn.closest('.card');
      const title = card ? card.querySelector('.card-title') : null;
      const name = title ? title.textContent : 'Product';
      // Lightweight toast: create a Bootstrap alert element
      const alertPlace = document.createElement('div');
      alertPlace.className = 'alert alert-success alert-dismissible fade show alert-fixed';
      alertPlace.role = 'alert';
      alertPlace.innerHTML = 'Added <strong>' + name + '</strong> to cart. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      document.body.appendChild(alertPlace);
      setTimeout(() => {
        // fade out then remove
        alertPlace.classList.remove('show');
        alertPlace.remove();
      }, 2500);
    });
  });

  // Handle contact form submission (demo only)
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      // Show a simple success alert
      const alertPlace = document.createElement('div');
      alertPlace.className = 'alert alert-primary alert-dismissible fade show alert-fixed';
      alertPlace.role = 'alert';
      alertPlace.innerHTML = 'Thank you — your message was received. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      document.body.appendChild(alertPlace);
      setTimeout(() => {
        alertPlace.classList.remove('show');
        alertPlace.remove();
      }, 2500);
      contactForm.reset();
    });
  }
});