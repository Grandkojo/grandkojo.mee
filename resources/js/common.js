// Common JavaScript for portfolio website
// Includes: Mesh Gradient, Mouse Tracking, Dynamic Island Navigation

// Animated Mesh Gradient Background
document.addEventListener('DOMContentLoaded', function() {
    const meshGradient = document.getElementById('mesh-gradient');
    if (!meshGradient) return;
    
    // Create canvas for mesh gradient
    const canvas = document.createElement('canvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    meshGradient.appendChild(canvas);
    const ctx = canvas.getContext('2d');
    
    // Color stops for the gradient
    const colors = [
        { r: 6, g: 182, b: 212 },   // cyan
        { r: 168, g: 85, b: 247 },  // purple
        { r: 20, g: 184, b: 166 },  // teal
        { r: 139, g: 92, b: 246 }   // violet
    ];
    
    // Control points for the mesh
    let points = [];
    const numPoints = 4;
    
    function initPoints() {
        points = [];
        for (let i = 0; i < numPoints; i++) {
            points.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                color: colors[i % colors.length]
            });
        }
    }
    
    function updatePoints() {
        points.forEach(point => {
            point.x += point.vx;
            point.y += point.vy;
            
            if (point.x < 0 || point.x > canvas.width) point.vx *= -1;
            if (point.y < 0 || point.y > canvas.height) point.vy *= -1;
            
            point.x = Math.max(0, Math.min(canvas.width, point.x));
            point.y = Math.max(0, Math.min(canvas.height, point.y));
        });
    }
    
    function drawMesh() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Create gradient mesh
        const gradient = ctx.createRadialGradient(
            points[0].x, points[0].y, 0,
            points[0].x, points[0].y, Math.max(canvas.width, canvas.height) * 0.8
        );
        
        // Add color stops based on points
        points.forEach((point, i) => {
            const color = point.color;
            const stop = i / (points.length - 1);
            gradient.addColorStop(stop, `rgba(${color.r}, ${color.g}, ${color.b}, 0.3)`);
        });
        
        // Draw the gradient
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Add additional overlapping gradients for depth
        points.forEach((point, i) => {
            const nextPoint = points[(i + 1) % points.length];
            const gradient2 = ctx.createLinearGradient(
                point.x, point.y,
                nextPoint.x, nextPoint.y
            );
            gradient2.addColorStop(0, `rgba(${point.color.r}, ${point.color.g}, ${point.color.b}, 0.2)`);
            gradient2.addColorStop(1, `rgba(${nextPoint.color.r}, ${nextPoint.color.g}, ${nextPoint.color.b}, 0.2)`);
            ctx.fillStyle = gradient2;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        });
    }
    
    function animate() {
        updatePoints();
        drawMesh();
        requestAnimationFrame(animate);
    }
    
    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initPoints();
    }
    
    window.addEventListener('resize', resize);
    initPoints();
    animate();
});

// Mouse Tracking Cursor Effect (Sun & Orbit)
document.addEventListener('DOMContentLoaded', function() {
    const cursorDot = document.getElementById('cursor-dot');
    const cursorRing = document.getElementById('cursor-ring');
    
    if (!cursorDot || !cursorRing) return;
    
    let mouseX = 0;
    let mouseY = 0;
    let ringX = 0;
    let ringY = 0;
    let isVisible = false;
    
    // Style the dot (sun)
    cursorDot.style.width = '8px';
    cursorDot.style.height = '8px';
    cursorDot.style.borderRadius = '50%';
    cursorDot.style.backgroundColor = 'rgba(255, 255, 255, 0.6)';
    cursorDot.style.boxShadow = '0 0 12px rgba(255, 255, 255, 0.4)';
    cursorDot.style.transform = 'translate(-50%, -50%)';
    cursorDot.style.opacity = '0';
    
    // Style the ring (orbit)
    cursorRing.style.width = '40px';
    cursorRing.style.height = '40px';
    cursorRing.style.borderRadius = '50%';
    cursorRing.style.border = '1.5px solid rgba(255, 255, 255, 0.3)';
    cursorRing.style.transform = 'translate(-50%, -50%)';
    cursorRing.style.opacity = '0';
    
    // Track mouse movement
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        if (!isVisible) {
            cursorDot.style.opacity = '1';
            cursorRing.style.opacity = '1';
            isVisible = true;
        }
        
        // Update dot position immediately
        cursorDot.style.left = mouseX + 'px';
        cursorDot.style.top = mouseY + 'px';
    });
    
    // Smooth ring animation
    function animateRing() {
        ringX += (mouseX - ringX) * 0.4;
        ringY += (mouseY - ringY) * 0.4;
        
        cursorRing.style.left = ringX + 'px';
        cursorRing.style.top = ringY + 'px';
        
        requestAnimationFrame(animateRing);
    }
    
    // Hide on mouse leave
    document.addEventListener('mouseleave', () => {
        cursorDot.style.opacity = '0';
        cursorRing.style.opacity = '0';
        isVisible = false;
    });
    
    // Show on mouse enter
    document.addEventListener('mouseenter', () => {
        if (mouseX > 0 || mouseY > 0) {
            cursorDot.style.opacity = '1';
            cursorRing.style.opacity = '1';
            isVisible = true;
        }
    });
    
    animateRing();
});

// Dynamic Island Navigation
function handleOutsideClick(event) {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const dynamicIsland = document.getElementById('dynamic-island');
    const hamburgerLine1 = document.getElementById('hamburger-line-1');
    const hamburgerLine2 = document.getElementById('hamburger-line-2');
    const hamburgerLine3 = document.getElementById('hamburger-line-3');
    const menuContent = document.getElementById('menu-content');

    if (!mobileMenuButton || !mobileMenu || !menuContent) return;
    
    if (!mobileMenuButton.contains(event.target)){
        menuContent.style.transition = 'all 0.3s ease-in';
        menuContent.style.transform = 'scale(0.95)';
        menuContent.style.opacity = '0';
        if (hamburgerLine1) hamburgerLine1.style.removeProperty('transform');
        if (hamburgerLine1) hamburgerLine1.style.removeProperty('top');
        if (hamburgerLine2) hamburgerLine2.style.removeProperty('opacity');
        if (hamburgerLine2) hamburgerLine2.style.removeProperty('transform');
        if (hamburgerLine3) hamburgerLine3.style.removeProperty('transform');
        if (hamburgerLine3) hamburgerLine3.style.removeProperty('top');
        
        // Reset dynamic island - remove inline styles
        if (dynamicIsland) {
            dynamicIsland.style.removeProperty('width');
            dynamicIsland.style.removeProperty('min-width');
        }

        setTimeout(() => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuContent = document.getElementById('menu-content');
    const menuOverlay = document.getElementById('menu-overlay');
    const dynamicIsland = document.getElementById('dynamic-island');
    const hamburgerLine1 = document.getElementById('hamburger-line-1');
    const hamburgerLine2 = document.getElementById('hamburger-line-2');
    const hamburgerLine3 = document.getElementById('hamburger-line-3');
    
    if (!mobileMenuButton || !mobileMenu || !menuContent) return;
    
    const mobileMenuLinks = mobileMenu.querySelectorAll('a');
    let isMenuOpen = false;

    function closeMenu() {
        if (!isMenuOpen) return;
        isMenuOpen = false;
        
        // Close menu
        menuContent.style.transition = 'all 0.3s ease-in';
        menuContent.style.transform = 'scale(0.95)';
        menuContent.style.opacity = '0';
        
        // Reset hamburger animation properly - remove inline styles to restore Tailwind classes
        if (hamburgerLine1) {
            hamburgerLine1.style.removeProperty('transform');
            hamburgerLine1.style.removeProperty('top');
        }
        if (hamburgerLine2) {
            hamburgerLine2.style.removeProperty('opacity');
            hamburgerLine2.style.removeProperty('transform');
        }
        if (hamburgerLine3) {
            hamburgerLine3.style.removeProperty('transform');
            hamburgerLine3.style.removeProperty('top');
        }
        
        // Reset dynamic island - remove inline styles
        if (dynamicIsland) {
            dynamicIsland.style.removeProperty('width');
            dynamicIsland.style.removeProperty('min-width');
        }
        
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    function openMenu() {
        if (isMenuOpen) return;
        isMenuOpen = true;
        
        // Open menu
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Animate hamburger to X with smooth transition
        setTimeout(() => {
            if (hamburgerLine1) {
                hamburgerLine1.style.transform = 'rotate(45deg) translateY(8px)';
                hamburgerLine1.style.top = '8px';
            }
            if (hamburgerLine2) {
                hamburgerLine2.style.opacity = '0';
                hamburgerLine2.style.transform = 'scaleX(0)';
            }
            if (hamburgerLine3) {
                hamburgerLine3.style.transform = 'rotate(-45deg) translateY(-8px)';
                hamburgerLine3.style.top = '8px';
            }
        }, 10);
        
        // Expand dynamic island with smooth animation
        if (dynamicIsland) {
            dynamicIsland.style.width = 'auto';
            dynamicIsland.style.minWidth = '140px';
        }
        
        // Animate menu content with spring-like effect
        requestAnimationFrame(() => {
            menuContent.style.transition = 'all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
            menuContent.style.transform = 'scale(1)';
            menuContent.style.opacity = '1';
        });
    }

    function toggleMenu() {
        if (isMenuOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    }

    mobileMenuButton.addEventListener('click', (e) => {
        e.stopPropagation();
        toggleMenu();
    });

    // Close menu when clicking overlay
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }
    document.addEventListener('click', handleOutsideClick);
    
    // Close menu when clicking outside the menu content
    mobileMenu.addEventListener('click', (e) => {
        // Don't close if clicking on menu content or hamburger button
        const clickedOnMenuContent = e.target.closest('#menu-content');
        const clickedOnButton = e.target.closest('#mobile-menu-button');
        
        if (!clickedOnMenuContent && !clickedOnButton) {
            closeMenu();
        }
    });

    // Close menu when clicking a link
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.stopPropagation();
            closeMenu();
        });
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMenu();
        }
    });
});

