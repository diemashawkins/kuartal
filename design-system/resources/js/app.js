import './theme-toggle';

/**
 * Mobile nav toggle — shared across all 5 properties.
 * Expects a trigger [data-nav-toggle] and a panel [data-nav-panel].
 */
document.addEventListener('DOMContentLoaded', function () {
  const trigger = document.querySelector('[data-nav-toggle]');
  const panel = document.querySelector('[data-nav-panel]');
  if (!trigger || !panel) return;

  trigger.addEventListener('click', function () {
    const isOpen = panel.classList.toggle('hidden');
    // classList.toggle('hidden') returns true when 'hidden' was ADDED,
    // meaning the panel is now closed — invert for aria-expanded.
    trigger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
  });
});
