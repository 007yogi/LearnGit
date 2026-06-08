/* ==========================================================================
    flora aura - interactive logic
   ========================================================================== */

// --- Botanical Database ---
const flowerData = [
    {
        name: "Crimson Rose",
        botanical: "Rosa rubiginosa",
        rarity: "Exotic",
        desc: "A legendary bloom symbolizing deep romance and unparalleled elegance. Known for its lush layers of velvet-textured crimson petals and an enchanting, timeless fragrance that lingers beautifully in the air.",
        origin: "Persia & Western Europe",
        sunlight: "Full Sun (6+ hrs)",
        watering: "Moderate (Once Weekly)",
        temp: "15°C - 24°C",
        accent: "#be184a",
        glow: "rgba(190, 24, 74, 0.15)"
    },
    {
        name: "Midnight Orchid",
        botanical: "Orchidaceae",
        rarity: "Ultra Rare",
        desc: "An exotic masterpiece hailing from deep, humid cloud forests. Its breathtaking, iridescent violet petals and unique structure make it a highly coveted treasure among master botanical collectors.",
        origin: "Andes Mountain Range",
        sunlight: "Dappled Shade",
        watering: "High Humidity / Misting",
        temp: "18°C - 26°C",
        accent: "#9333ea",
        glow: "rgba(147, 51, 234, 0.15)"
    },
    {
        name: "Sakura Whisper",
        botanical: "Prunus serrulata",
        rarity: "Seasonal",
        desc: "Delicate and fleeting pink cherry blossoms that represent renewal and the beautiful, impermanent nature of life. Celebrated globally for creating breathtaking clouds of soft pastel pink petals.",
        origin: "Kyoto, Japan",
        sunlight: "Full to Partial Sun",
        watering: "Well-drained / Regular",
        temp: "10°C - 20°C",
        accent: "#f472b6",
        glow: "rgba(244, 114, 182, 0.15)"
    },
    {
        name: "Golden Sunflower",
        botanical: "Helianthus annuus",
        rarity: "Vibrant",
        desc: "A radiant, towering giant that follows the journey of the sun. Known for its massive golden flower heads that bring warmth, happiness, and rich, hearty seeds to late-summer meadows.",
        origin: "North America",
        sunlight: "Direct Full Sun",
        watering: "Low to Moderate",
        temp: "20°C - 33°C",
        accent: "#eab308",
        glow: "rgba(234, 179, 8, 0.15)"
    },
    {
        name: "Dusk Lavender",
        botanical: "Lavandula angustifolia",
        rarity: "Aromatic",
        desc: "A beautifully fragrant purple herb celebrated for its powerful calming properties and sweet, soothing aroma. Ideal for creating tranquil, therapeutic home gardens.",
        origin: "Mediterranean Coast",
        sunlight: "Full Dry Sun",
        watering: "Very Low (Drought Hardy)",
        temp: "15°C - 30°C",
        accent: "#6366f1",
        glow: "rgba(99, 102, 241, 0.15)"
    }
];

// --- DOM Elements ---
const sliderTrack = document.getElementById('sliderTrack');
const slideCards = document.querySelectorAll('.slide-card');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const dots = document.querySelectorAll('.dot');
const ambientGlow = document.getElementById('ambientGlow');

// Details Panel Elements
const detailsContainer = document.querySelector('.flower-details-container');
const flowerRarity = document.getElementById('flowerRarity');
const flowerName = document.getElementById('flowerName');
const flowerBotanical = document.getElementById('flowerBotanical');
const flowerDesc = document.getElementById('flowerDesc');
const flowerOrigin = document.getElementById('flowerOrigin');
const flowerSun = document.getElementById('flowerSun');
const flowerWater = document.getElementById('flowerWater');
const flowerTemp = document.getElementById('flowerTemp');
const timerProgress = document.getElementById('timerProgress');

// --- State Variables ---
let currentIndex = 0;
const totalSlides = flowerData.length;
let autoplayTimer = null;
let progressInterval = null;
const autoplayDelay = 8000; // 8 seconds per slide
let currentProgress = 0;

// --- Initialize Slider ---
function initSlider() {
    updateActiveSlide(0);
    startAutoplay();
    
    // Add Click Listeners to Slider Cards directly
    slideCards.forEach((card, index) => {
        card.addEventListener('click', () => {
            if (currentIndex !== index) {
                goToSlide(index);
            }
        });
    });

    // Navigation buttons
    prevBtn.addEventListener('click', () => {
        navigateSlider(-1);
    });

    nextBtn.addEventListener('click', () => {
        navigateSlider(1);
    });

    // Dots listeners
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            goToSlide(index);
        });
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            navigateSlider(-1);
        } else if (e.key === 'ArrowRight') {
            navigateSlider(1);
        }
    });

    // Touch Support for Mobile Swiping
    let startX = 0;
    let endX = 0;
    sliderTrack.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    }, { passive: true });

    sliderTrack.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const threshold = 50;
        if (startX - endX > threshold) {
            // Swiped Left -> Next
            navigateSlider(1);
        } else if (endX - startX > threshold) {
            // Swiped Right -> Prev
            navigateSlider(-1);
        }
    }
}

// --- Navigate Slider ---
function navigateSlider(direction) {
    let nextIndex = currentIndex + direction;
    if (nextIndex < 0) {
        nextIndex = totalSlides - 1;
    } else if (nextIndex >= totalSlides) {
        nextIndex = 0;
    }
    goToSlide(nextIndex);
}

// --- Go to specific Slide ---
function goToSlide(index) {
    currentIndex = index;
    resetAutoplay();
    updateActiveSlide(index);
}

// --- Update UI for Active Slide ---
function updateActiveSlide(index) {
    const data = flowerData[index];

    // 1. Update Card Classes & layout positioning
    slideCards.forEach((card, i) => {
        card.classList.remove('active');
        if (i === index) {
            card.classList.add('active');
        }
    });

    // Scroll active card into view in horizontal mode (for tablets/mobile)
    const activeCard = slideCards[index];
    if (window.innerWidth <= 1024) {
        const trackWidth = sliderTrack.clientWidth;
        const cardOffset = activeCard.offsetLeft;
        const cardWidth = activeCard.clientWidth;
        sliderTrack.scrollTo({
            left: cardOffset - (trackWidth / 2) + (cardWidth / 2),
            behavior: 'smooth'
        });
    }

    // 2. Update Dots
    dots.forEach((dot, i) => {
        dot.classList.remove('active');
        if (i === index) {
            dot.classList.add('active');
        }
    });

    // 3. Dynamic Styling Updates (CSS variables & glow effects)
    document.documentElement.style.setProperty('--accent-color', data.accent);
    document.documentElement.style.setProperty('--accent-glow', data.glow);
    ambientGlow.style.background = `radial-gradient(circle, ${data.glow} 0%, rgba(7, 11, 9, 0) 70%)`;

    // 4. Update Details panel with a clean fade transition
    detailsContainer.classList.add('fade-out');

    setTimeout(() => {
        flowerRarity.textContent = data.rarity;
        flowerName.textContent = data.name;
        flowerBotanical.textContent = data.botanical;
        flowerDesc.textContent = data.desc;
        flowerOrigin.textContent = data.origin;
        flowerSun.textContent = data.sunlight;
        flowerWater.textContent = data.watering;
        flowerTemp.textContent = data.temp;

        // Apply new accent background to rarity badge
        flowerRarity.style.backgroundColor = data.glow;
        flowerRarity.style.borderColor = data.accent;

        // Bring details container back in
        detailsContainer.classList.remove('fade-out');
    }, 450);
}

// --- Autoplay Progress Management ---
function startAutoplay() {
    clearInterval(progressInterval);
    clearTimeout(autoplayTimer);

    currentProgress = 0;
    timerProgress.style.width = '0%';

    const stepMs = 50; // Update progress bar every 50ms
    const totalSteps = autoplayDelay / stepMs;
    let stepCount = 0;

    progressInterval = setInterval(() => {
        stepCount++;
        currentProgress = (stepCount / totalSteps) * 100;
        timerProgress.style.width = `${currentProgress}%`;

        if (stepCount >= totalSteps) {
            clearInterval(progressInterval);
            navigateSlider(1);
        }
    }, stepMs);
}

function resetAutoplay() {
    clearInterval(progressInterval);
    clearTimeout(autoplayTimer);
    timerProgress.style.width = '0%';
    startAutoplay();
}

// --- Initialize on load ---
document.addEventListener('DOMContentLoaded', initSlider);
