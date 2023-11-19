"use strict";

// Util functions
const toggleClass = (element, className) => element.classList.toggle(className);
const addClass = (element, className) => element.classList.add(className);
const removeClass = (element, className) => element.classList.remove(className);
const isElementInViewport = (element) => {
    const rect = element.getBoundingClientRect();
    return rect.top >= 0 && rect.bottom <= window.innerHeight;
};

// Navigation
(() => {
    const navParent = document.querySelector('.nav__wrap');
    const burger = document.querySelector('.nav__burger');
    const nav = document.querySelector('.nav__list');
    const navLinks = document.querySelectorAll('.nav__item');

    const toggleNav = () => {
        toggleClass(nav, 'active');
        navLinks.forEach((link, index) => {
            link.style.animation = link.style.animation ? '' : `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
        });
        toggleClass(burger, 'toggle');
    };

    const shrinkOnScroll = () => {
        if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
            addClass(navParent, 'small');
        } else {
            removeClass(navParent, 'small');
        }
    };

    burger.addEventListener('click', toggleNav);
    document.addEventListener('scroll', shrinkOnScroll);
})();

// Counter
const counters = document.querySelectorAll('.counter');
const duration = 2000; // Duration in milliseconds
const intervalTime = 10;
const startedCounters = new Set();

const startCounter = (counter, target, increment, symbol) => {
    let count = 0;
    const interval = setInterval(() => {
        count = Math.min(count + increment, target);
        counter.textContent = `${count.toLocaleString()}${count === target && symbol ? symbol : ''}`;
        if (count === target) clearInterval(interval);
    }, intervalTime);
};

window.addEventListener('scroll', () => {
    counters.forEach(counter => {
        if (isElementInViewport(counter) && !startedCounters.has(counter)) {
            const target = parseInt(counter.getAttribute('data-target'));
            const symbol = counter.getAttribute('data-symbol') || '';
            const increment = target / (duration / intervalTime);
            startCounter(counter, target, increment, symbol);
            startedCounters.add(counter);
        }
    });
});

// Accordion
const toggleAccordion = (button) => {
    const accordionItem = button.closest('.empowering__accordion__item');
    const accordionCollapse = accordionItem.querySelector('.empowering__accordion__collapse');

    document.querySelectorAll('.empowering__accordion__item').forEach(otherItem => {
        if (otherItem !== accordionItem) {
            otherItem.querySelector('.empowering__accordion__collapse').style.maxHeight = null;
            removeClass(otherItem.querySelector('.empowering__accordion__header'), 'active');
            removeClass(otherItem, 'active');
            removeClass(otherItem.querySelector('.empowering__accordion__collapse'), 'active');
        }
    });

    accordionCollapse.style.maxHeight = accordionCollapse.classList.contains('active') ? null : `${accordionCollapse.scrollHeight}px`;
    toggleClass(accordionItem.querySelector('.empowering__accordion__header'), 'active');
    toggleClass(accordionItem, 'active');
    toggleClass(accordionCollapse, 'active');
};

document.querySelectorAll('.empowering__accordion__header').forEach(button => {
    button.addEventListener('click', () => toggleAccordion(button));
});

// Gradient Text
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.header-gradient').forEach(element => {
        const text = element.textContent.trim();
        element.style.setProperty('--inherited-text', `"${text}"`);
    });
});