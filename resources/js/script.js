// Delete confirmation
document.querySelectorAll(".delete").forEach(btn=>{
    btn.addEventListener("click",function(e){
        if(!confirm("Yakin ingin menghapus project ini?")){
            e.preventDefault();
        }
    });
});

// ========================================
// SCROLL ANIMATION - Intersection Observer
// ========================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            // Add stagger delay to children
            const children = entry.target.querySelectorAll('.edu-card, .project-card');
            children.forEach((child, childIndex) => {
                child.style.setProperty('--item-index', childIndex);
            });

            // Trigger animation
            entry.target.classList.add('is-visible');
        }
    });
}, observerOptions);

// Observe all scroll-animate elements
document.querySelectorAll('.scroll-animate').forEach((element, index) => {
    observer.observe(element);
    
    // Immediately show hero section on page load
    if (element.classList.contains('hero-section')) {
        element.classList.add('is-visible');
    }
});

// ========================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ========================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});