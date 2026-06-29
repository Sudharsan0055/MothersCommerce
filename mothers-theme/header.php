<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mothersfragrances | Premium Incense, Cones & Oils</title>
  <meta name="description" content="Discover The Mother's Fragrances. Shop our premium collections of handcrafted Incense, Cones, Perfume Oils, Essential Oils, and Tapestries.">
  <meta name="keywords" content="The Mother's Fragrances, incense, cones, tapestry, perfume oils, essential oils, handcrafted incense">
  <link rel="icon" type="image/webp" href="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-logo-golden.webp">
  
  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/variables.css?v=10">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css?v=20">
  
  <!-- FontAwesome for Premium Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts: Cinzel for cinematic feel -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
  
  <style>
    /* Home page specific styles */
    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background-color: #050a07;
      padding-top: var(--header-height);
    }

    .hero-bg-slider {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      overflow: hidden;
    }

    .hero-bg-slider .hero-slide {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.5s ease-in-out, transform 8s ease-out;
      transform: scale(1);
    }

    .hero-bg-slider .hero-slide.active {
      opacity: 1;
      transform: scale(1.06);
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at center, rgba(5, 10, 7, 0.45) 0%, rgba(5, 10, 7, 0.8) 100%);
      z-index: 1;
      pointer-events: none;
    }

    /* Centered Glassmorphic card */
    .hero-container {
      position: relative;
      z-index: 3;
      width: 90%;
      max-width: 800px;
      margin: 0 auto;
      display: flex;
      justify-content: center;
    }

    .hero-card {
      background: transparent;
      backdrop-filter: none;
      -webkit-backdrop-filter: none;
      border: none;
      padding: var(--space-xl) var(--space-md);
      text-align: center;
      box-shadow: none;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: var(--space-md);
      animation: cinematicFadeUp 1.2s cubic-bezier(0.25, 1, 0.5, 1) 0.3s both;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      align-self: center;
      background-color: rgba(212, 175, 55, 0.15);
      border: 1px solid var(--color-gold);
      color: var(--color-gold-light);
      padding: var(--space-xs) var(--space-md);
      border-radius: var(--radius-round);
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
    }

    .hero-card h1 {
      color: var(--color-bg);
      font-size: 4rem;
      line-height: 1.15;
      font-weight: 500;
      margin: 0;
      letter-spacing: -0.01em;
    }

    .hero-card h1 span {
      color: var(--color-gold);
      font-style: italic;
    }

    .hero-card p {
      color: rgba(250, 248, 245, 0.85);
      font-size: 1.2rem;
      line-height: 1.6;
      max-width: 620px;
      margin: 0;
    }

    .hero-actions {
      display: flex;
      justify-content: center;
      margin-top: var(--space-sm);
    }



    .hero-shape {
      position: absolute;
      border: 2px solid var(--color-gold);
      opacity: 0.3;
      border-radius: var(--radius-lg);
      width: 100%;
      height: 100%;
      top: 20px;
      left: 20px;
      z-index: -1;
    }


    /* ===== CINEMATIC HERO ANIMATIONS ===== */

    /* Particle Canvas */
    #heroCanvas {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 1;
      pointer-events: none;
    }

    /* Glowing orbs */
    .hero-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      z-index: 2;
      pointer-events: none;
      animation: orbFloat 8s ease-in-out infinite;
    }
    .hero-orb-1 {
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(194,125,86,0.35) 0%, transparent 70%);
      top: -100px; right: -50px;
      animation-delay: 0s;
    }
    .hero-orb-2 {
      width: 350px; height: 350px;
      background: radial-gradient(circle, rgba(212,175,55,0.2) 0%, transparent 70%);
      bottom: -80px; left: 5%;
      animation-delay: -3s;
    }
    .hero-orb-3 {
      width: 250px; height: 250px;
      background: radial-gradient(circle, rgba(30,58,43,0.5) 0%, transparent 70%);
      top: 30%; left: 40%;
      animation-delay: -5s;
    }
    @keyframes orbFloat {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-30px) scale(1.08); }
    }

    /* Cursor glow */
    .cursor-glow {
      position: fixed;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(212,175,55,0.06) 0%, transparent 70%);
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: opacity 0.3s ease;
    }

    /* Cinematic hero text entrance */
    @keyframes cinematicFadeUp {
      0% { opacity: 0; transform: translateY(60px) scale(0.96); filter: blur(8px); }
      100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
    }
    @keyframes cinematicFadeLeft {
      0% { opacity: 0; transform: translateX(80px); filter: blur(6px); }
      100% { opacity: 1; transform: translateX(0); filter: blur(0); }
    }
    @keyframes shimmerLine {
      0% { width: 0; }
      100% { width: 100%; }
    }
    @keyframes badgePop {
      0% { opacity: 0; transform: scale(0.7) translateY(10px); }
      70% { transform: scale(1.05) translateY(-2px); }
      100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    @keyframes glowPulse {
      0%, 100% { text-shadow: 0 0 20px rgba(212,175,55,0.3), 0 0 40px rgba(212,175,55,0.1); }
      50% { text-shadow: 0 0 30px rgba(212,175,55,0.5), 0 0 60px rgba(212,175,55,0.2), 0 0 80px rgba(212,175,55,0.1); }
    }
    @keyframes lineReveal {
      0% { transform: scaleX(0); }
      100% { transform: scaleX(1); }
    }

    /* Hero badge */
    .hero-badge {
      animation: badgePop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both !important;
    }

    /* Hero h1 cinematic */
    .hero-card h1 {
      animation: cinematicFadeUp 1.2s cubic-bezier(0.25, 1, 0.5, 1) 0.6s both !important;
    }
    .hero-card h1 span {
      color: var(--color-gold);
      font-style: italic;
      animation: glowPulse 3s ease-in-out 2s infinite;
    }

    /* Decorative shimmer line under h1 */
    .hero-shimmer-line {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--color-gold), rgba(212,175,55,0.5), transparent);
      border-radius: 2px;
      animation: shimmerLine 1s ease-out 1.4s both;
      transform-origin: center;
      max-width: 280px;
    }

    /* Hero paragraph */
    .hero-card p {
      animation: cinematicFadeUp 1s cubic-bezier(0.25, 1, 0.5, 1) 1s both !important;
    }

    /* Hero actions */
    .hero-actions {
      animation: cinematicFadeUp 1s cubic-bezier(0.25, 1, 0.5, 1) 1.3s both !important;
    }

    /* Cinematic grain overlay */
    .hero-grain {
      position: absolute;
      inset: 0;
      z-index: 2;
      pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
      opacity: 0.4;
    }

    /* Stats bar in hero */
    .hero-stats {
      display: flex;
      gap: var(--space-xl);
      padding-top: var(--space-md);
      border-top: 1px solid rgba(250,248,245,0.15);
      margin-top: var(--space-md);
      animation: cinematicFadeUp 1s cubic-bezier(0.25, 1, 0.5, 1) 1.6s both;
    }
    .hero-stat-item {
      display: flex;
      flex-direction: column;
    }
    .hero-stat-num {
      font-family: var(--font-serif);
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--color-gold);
      line-height: 1;
    }
    .hero-stat-label {
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: rgba(250,248,245,0.55);
      margin-top: 2px;
    }

    /* Section reveal — cinematic version */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.9s cubic-bezier(0.25, 1, 0.5, 1), transform 0.9s cubic-bezier(0.25, 1, 0.5, 1), filter 0.9s ease;
      filter: blur(3px);
    }
    .reveal.revealed {
      opacity: 1;
      transform: translateY(0);
      filter: blur(0);
    }
    .reveal-left {
      opacity: 0;
      transform: translateX(-50px);
      transition: opacity 0.9s cubic-bezier(0.25, 1, 0.5, 1), transform 0.9s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-left.revealed { opacity: 1; transform: translateX(0); }
    .reveal-right {
      opacity: 0;
      transform: translateX(50px);
      transition: opacity 0.9s cubic-bezier(0.25, 1, 0.5, 1), transform 0.9s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-right.revealed { opacity: 1; transform: translateX(0); }

    /* Section number decorators */
    .section-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: var(--space-xs);
    }
    .section-eyebrow::before {
      content: '';
      width: 30px; height: 2px;
      background: var(--color-gold);
      display: block;
    }

    @media (max-width: 1024px) {
      .hero-container {
        grid-template-columns: 1fr;
        text-align: center;
        padding: var(--space-xl) 0;
      }
      .hero-badge {
        align-self: center;
      }
      .hero h1 {
        font-size: 3.2rem;
      }
      .hero p {
        margin: 0 auto;
      }
      .hero-actions {
        justify-content: center;
      }
    }

    /* Pillars */
    .pillar-card {
      background-color: var(--color-surface);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-md);
      padding: var(--space-xl);
      transition: var(--transition-smooth);
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      gap: var(--space-md);
    }

    .pillar-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background-color: var(--color-primary);
      transition: var(--transition-smooth);
    }

    .pillar-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-md);
      border-color: rgba(30, 58, 43, 0.15);
    }

    .pillar-card:hover::before {
      background-color: var(--color-terracotta);
      width: 8px;
    }

    .pillar-icon {
      font-size: 2.2rem;
      color: var(--color-terracotta);
    }

    .pillar-card h3 {
      font-size: 1.5rem;
      color: var(--color-primary);
    }

    /* Split Section */
    .split-section {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      align-items: center;
      gap: var(--space-4xl);
    }

    .split-image-wrapper {
      position: relative;
      height: 500px;
    }

    .split-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-md);
    }

    @media (max-width: 768px) {
      .split-section {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
      }
      .split-image-wrapper {
        height: 300px;
      }
    }

    /* Product Cards Teaser */
    .product-teaser-card {
      background-color: var(--color-surface);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-md);
      overflow: hidden;
      transition: var(--transition-smooth);
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .product-teaser-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }

    .product-teaser-img-wrapper {
      height: 250px;
      overflow: hidden;
    }

    .product-teaser-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition-slow);
    }

    .product-teaser-card:hover .product-teaser-img {
      transform: scale(1.05);
    }

    .product-teaser-content {
      padding: var(--space-lg);
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: var(--space-sm);
    }

    .product-tag {
      font-family: var(--font-sans);
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      color: var(--color-terracotta);
      letter-spacing: 0.05em;
    }

    .product-teaser-content h3 {
      font-size: 1.4rem;
      color: var(--color-primary);
    }

    .product-teaser-actions {
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: var(--space-md);
      border-top: 1px solid var(--color-border);
    }

    /* Counters section */
    .counters-section {
      background-color: var(--color-primary);
      color: var(--color-bg);
      text-align: center;
    }

    .counter-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: var(--space-xs);
    }

    .counter-num {
      font-family: var(--font-serif);
      font-size: 4rem;
      font-weight: bold;
      color: var(--color-gold);
      line-height: 1;
    }

    .counter-title {
      font-family: var(--font-sans);
      font-size: 0.85rem;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: rgba(250, 248, 245, 0.7);
    }

    /* Process Timeline */
    .process-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: var(--space-lg);
      margin-top: var(--space-2xl);
    }
    .process-step {
      text-align: center;
      position: relative;
    }
    .process-step:not(:last-child)::after {
      content: '\f101';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      top: 30%;
      right: -20px;
      color: var(--color-gold);
      font-size: 1.5rem;
      transform: translateY(-50%);
    }
    .process-img-wrapper {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      margin: 0 auto var(--space-md) auto;
      overflow: hidden;
      border: 3px solid var(--color-gold);
      box-shadow: var(--shadow-md);
      position: relative;
    }
    .process-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .process-step:hover .process-img-wrapper img {
      transform: scale(1.1);
    }
    .process-step h4 {
      color: var(--color-terracotta);
      font-size: 1.2rem;
      margin-bottom: var(--space-xs);
    }
    @media (max-width: 900px) {
      .process-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-xl); }
      .process-step:not(:last-child)::after { display: none; }
    }
    @media (max-width: 500px) {
      .process-grid { grid-template-columns: 1fr; }
    }

    /* Ingredients Grid */
    .ingredients-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: var(--space-xl);
      margin-top: var(--space-xl);
    }
    .ingredient-card {
      display: block;
      position: relative;
      height: 380px;
      border-radius: var(--radius-lg);
      overflow: hidden;
      cursor: pointer;
      border: 1px solid rgba(212, 175, 55, 0.15);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .ingredient-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), filter 0.8s ease;
      filter: brightness(0.85);
    }
    .ingredient-card:hover .ingredient-img {
      transform: scale(1.1);
      filter: brightness(0.7) blur(1px);
    }
    .ingredient-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(18, 30, 23, 0.95) 0%, rgba(18, 30, 23, 0.4) 50%, transparent 100%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: var(--space-xl);
      color: var(--color-bg);
      transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
      z-index: 2;
    }
    .ingredient-card-header {
      transform: translateY(25px);
      transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .ingredient-card:hover .ingredient-card-header {
      transform: translateY(0);
    }
    .ingredient-overlay h3 {
      color: var(--color-bg);
      font-family: var(--font-serif);
      font-size: 1.8rem;
      font-weight: 500;
      margin: 0;
      transition: color 0.4s ease;
    }
    .ingredient-card:hover .ingredient-overlay h3 {
      color: var(--color-gold);
    }
    .ingredient-overlay .decorative-line {
      width: 40px;
      height: 1px;
      background-color: var(--color-gold);
      margin: var(--space-xs) 0;
      transition: width 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .ingredient-card:hover .decorative-line {
      width: 100%;
    }
    .ingredient-desc {
      font-size: 0.95rem;
      line-height: 1.6;
      color: rgba(250, 248, 245, 0.8);
      opacity: 0;
      transform: translateY(15px);
      margin: var(--space-xs) 0 0 0;
      transition: opacity 0.4s, transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .ingredient-card:hover .ingredient-desc {
      opacity: 1;
      transform: translateY(0);
      transition-delay: 0.1s;
    }
    .ingredient-action {
      font-family: var(--font-sans);
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--color-gold);
      margin-top: var(--space-md);
      opacity: 0;
      transform: translateY(10px);
      transition: opacity 0.4s, transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .ingredient-card:hover .ingredient-action {
      opacity: 1;
      transform: translateY(0);
      transition-delay: 0.2s;
    }
    .ingredient-card:hover {
      transform: translateY(-8px);
      border-color: var(--color-gold);
      box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.3),
        0 0 25px rgba(212, 175, 55, 0.25);
    }
    .ingredient-card:hover .ingredient-overlay {
      background: rgba(18, 30, 23, 0.88);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
    }

    /* Testimonials Section */
    .testimonials-section {
      position: relative;
      background: 
        radial-gradient(circle at 10% 10%, rgba(212, 175, 55, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 90% 90%, rgba(194, 125, 86, 0.06) 0%, transparent 50%),
        linear-gradient(180deg, #FAF8F5 0%, #F6F2EC 100%) !important;
      border-top: 1px solid rgba(212, 175, 55, 0.18);
      border-bottom: 1px solid rgba(212, 175, 55, 0.18);
      overflow: hidden;
    }

    /* Glowing ambient orbs for testimonials */
    .t-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      pointer-events: none;
      z-index: 0;
      animation: tOrbFloat 14s ease-in-out infinite alternate;
    }
    .t-orb-1 {
      width: 350px; height: 350px;
      background: radial-gradient(circle, rgba(212, 175, 55, 0.06) 0%, transparent 70%);
      top: -10%; left: 5%;
    }
    .t-orb-2 {
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(194, 125, 86, 0.05) 0%, transparent 70%);
      bottom: -10%; right: 5%;
      animation-delay: -7s;
    }
    @keyframes tOrbFloat {
      0% { transform: translateY(0) scale(1); }
      100% { transform: translateY(-25px) scale(1.08); }
    }

    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: var(--space-xl);
      margin-top: var(--space-2xl);
      position: relative;
      z-index: 1;
    }

    .testimonial-card {
      background: rgba(255, 255, 255, 0.55) !important;
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(212, 175, 55, 0.25) !important;
      padding: var(--space-xl) var(--space-lg);
      border-radius: 20px;
      position: relative;
      transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 220px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    }

    .testimonial-card::before {
      content: '\f10d';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      top: 24px;
      right: 24px;
      font-size: 2.2rem;
      color: rgba(212, 175, 55, 0.15);
      transition: all 0.4s ease;
    }

    .testimonial-card:hover {
      background: rgba(255, 255, 255, 0.85) !important;
      transform: translateY(-8px);
      border-color: rgba(212, 175, 55, 0.6) !important;
      box-shadow: 
        0 20px 40px rgba(212, 175, 55, 0.1),
        0 15px 30px rgba(0, 0, 0, 0.04);
    }

    .testimonial-card:hover::before {
      color: rgba(212, 175, 55, 0.35);
      transform: translateY(-4px) scale(1.08);
    }

    .stars {
      color: var(--color-gold);
      margin-bottom: var(--space-sm);
      font-size: 1rem;
      letter-spacing: 2px;
      transition: all 0.3s ease;
    }
    
    .testimonial-card:hover .stars {
      transform: scale(1.04);
      text-shadow: 0 0 8px rgba(212, 175, 55, 0.3);
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: var(--space-md);
      color: var(--color-text);
      line-height: 1.7;
      font-size: 1.05rem;
      position: relative;
      z-index: 1;
    }

    .testimonial-author-info {
      display: flex;
      align-items: center;
      gap: var(--space-sm);
      margin-top: auto;
      border-top: 1px solid rgba(212, 175, 55, 0.12);
      padding-top: var(--space-md);
    }

    .testimonial-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(212, 175, 55, 0.15) 0%, rgba(194, 125, 86, 0.15) 100%);
      border: 1px solid rgba(212, 175, 55, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-gold);
      font-size: 0.95rem;
      font-family: var(--font-sans);
    }

    .testimonial-meta {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .testimonial-author {
      font-weight: 600;
      color: var(--color-primary);
      font-size: 1rem;
    }

    .testimonial-company {
      font-size: 0.78rem;
      color: var(--color-terracotta);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      font-weight: 600;
    }

    /* Wholesale CTA */
    .wholesale-cta {
      position: relative;
      border-radius: var(--radius-lg);
      overflow: hidden;
      min-height: 580px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: var(--space-xl) var(--space-md);
      background-color: #0c2618;
      margin-top: var(--space-2xl);
    }
    .cta-bg-slider {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      overflow: hidden;
    }
    .cta-bg-slider .cta-bg-slide {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.8s ease-in-out, transform 8s ease-out;
      transform: scale(1);
    }
    .cta-bg-slider .cta-bg-slide.active {
      opacity: 0.75;
      transform: scale(1.05);
    }
    .cta-overlay {
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at center, rgba(30, 58, 43, 0.2) 0%, rgba(12, 38, 24, 0.7) 100%);
      z-index: 2;
      pointer-events: none;
    }
    
    /* Glowing animated background orbs */
    .cta-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      z-index: 2;
      opacity: 0.25;
      pointer-events: none;
      width: 280px;
      height: 280px;
      animation: cta-orb-drift 12s infinite alternate ease-in-out;
    }
    .cta-orb-1 {
      top: -10%;
      left: -10%;
      background: radial-gradient(circle, rgba(212, 175, 55, 0.45) 0%, rgba(212, 175, 55, 0) 70%);
    }
    .cta-orb-2 {
      bottom: -10%;
      right: -10%;
      background: radial-gradient(circle, rgba(194, 125, 86, 0.45) 0%, rgba(194, 125, 86, 0) 70%);
      animation-delay: -6s;
    }
    @keyframes cta-orb-drift {
      0% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(30px, -20px) scale(1.15); }
      100% { transform: translate(-20px, 30px) scale(0.9); }
    }

    .cta-content {
      position: relative;
      z-index: 3;
      background: rgba(255, 255, 255, 0.08) !important;
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      padding: var(--space-2xl) var(--space-xl);
      border-radius: var(--radius-lg);
      border: 1px solid rgba(212, 175, 55, 0.25) !important;
      max-width: 720px;
      width: 90%;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      text-align: center;
      color: #FFFFFF;
      transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s cubic-bezier(0.25, 1, 0.5, 1), border-color 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .cta-content:hover {
      transform: translateY(-6px);
      border-color: rgba(212, 175, 55, 0.55) !important;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.45);
    }
    .cta-content h2 { 
      color: var(--color-gold-light); 
      font-size: 2.8rem; 
      margin-bottom: var(--space-sm); 
      line-height: 1.25; 
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    .cta-content p { 
      font-size: 1.15rem; 
      max-width: 580px; 
      margin: 0 auto var(--space-lg) auto; 
      opacity: 0.95; 
      color: rgba(250, 248, 245, 0.95);
      text-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
    }

    /* Parallax & Magnetic Styles */
    .parallax-wrapper {
      overflow: hidden;
      position: relative;
    }
    .parallax-img {
      will-change: transform;
      transform: scale(1.1);
      transition: transform 0.1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .magnetic {
      display: inline-block;
      transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1), background-color 0.3s, color 0.3s, border-color 0.3s;
      will-change: transform;
    }
    .text-reveal-line {
      overflow: hidden;
      display: inline-block;
      vertical-align: top;
    }
    .reveal-word {
      display: inline-block;
      transform: translateY(110%);
      opacity: 0;
      transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), opacity 1s ease;
      vertical-align: top;
    }
    .text-reveal-line.revealed .reveal-word {
      transform: translateY(0);
      opacity: 1;
    }

    /* Our Story Slider Styling */
    .story-slider-wrapper {
      position: relative;
      height: 100%;
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(212, 175, 55, 0.2);
    }
    
    .story-slider {
      width: 100%;
      height: 100%;
      position: relative;
    }

    .story-slide {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.5s ease-in-out, transform 6s ease-out;
      transform: scale(1);
    }

    .story-slide.active {
      opacity: 1;
      transform: scale(1.05);
    }

    .story-slider-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(5, 10, 7, 0.4) 0%, transparent 60%);
      z-index: 1;
      pointer-events: none;
    }

    .story-slider-controls {
      position: absolute;
      bottom: var(--space-md);
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
      z-index: 10;
      background: rgba(18, 30, 23, 0.6);
      padding: var(--space-xs) var(--space-md);
      border-radius: var(--radius-round);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .story-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: rgba(250, 248, 245, 0.4);
      border: none;
      cursor: pointer;
      padding: 0;
      transition: all 0.3s ease;
    }

    .story-dot.active, .story-dot:hover {
      background-color: var(--color-gold);
      transform: scale(1.2);
    }

    /* Premium Header CTA (Enquire Now) Styling */
    #navCta {
      position: relative;
      overflow: hidden;
      font-weight: 600;
      letter-spacing: 0.08em;
      transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }

    #navCta::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 50%;
      height: 100%;
      background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.3),
        transparent
      );
      transform: skewX(-25deg);
      transition: none;
      z-index: 2;
      pointer-events: none;
    }

    #navCta:hover::before {
      left: 150%;
      transition: left 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }

    /* Transparent header state - over dark hero */
    .header.header-transparent #navCta {
      color: var(--color-gold-light);
      border-color: rgba(212, 175, 55, 0.5);
      background: rgba(212, 175, 55, 0.06);
      backdrop-filter: blur(4px);
    }
    
    .header.header-transparent #navCta:hover {
      color: var(--color-primary);
      background: var(--color-gold);
      border-color: var(--color-gold);
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
      transform: translateY(-2px);
    }

    /* Scrolled header state - over light page body */
    .header.scrolled #navCta {
      color: var(--color-primary);
      border-color: var(--color-primary);
      background: transparent;
    }
    
    .header.scrolled #navCta:hover {
      color: var(--color-bg);
      background: var(--color-primary);
      border-color: var(--color-primary);
      box-shadow: 0 4px 12px rgba(30, 58, 43, 0.15);
      transform: translateY(-2px);
    }

    /* Premium Scrolling Header Enhancements */
    .header {
      transition: height 0.4s cubic-bezier(0.25, 1, 0.5, 1), background-color 0.4s, border-color 0.4s, box-shadow 0.4s;
    }
    
    .header.scrolled {
      height: 68px !important; /* Compress height slightly on scroll */
      background-color: rgba(250, 248, 245, 0.88) !important;
      backdrop-filter: blur(20px) saturate(180%) !important;
      -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
      box-shadow: 0 10px 30px rgba(30, 58, 43, 0.04), 0 1px 0 rgba(212, 175, 55, 0.12) !important;
      border-bottom: 1px solid rgba(212, 175, 55, 0.15) !important;
    }

    /* Subtle golden shimmer line under scrolled header */
    .header.scrolled::after {
      content: '';
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.35), transparent);
      z-index: 10;
    }

    .header.scrolled .nav-link {
      color: var(--color-primary) !important;
      font-weight: 600 !important;
    }

    .header.scrolled .nav-link:hover,
    .header.scrolled .nav-link.active {
      color: var(--color-terracotta) !important;
    }

    .header.scrolled .logo-text {
      color: var(--color-primary) !important;
    }
    
    .header.scrolled .logo-text span {
      color: var(--color-terracotta) !important;
    }

    /* Transparent header state links styling */
    .header.header-transparent .nav-link {
      color: rgba(250, 248, 245, 0.95) !important;
      font-weight: 500 !important;
      letter-spacing: 0.06em;
      text-shadow: 0 1px 3px rgba(0,0,0,0.25);
    }
    .header.header-transparent .nav-link:hover {
      color: var(--color-gold-light) !important;
    }

    /* Why Choose Us Section & Slider Styling */
    .why-choose-us-section {
      background: #04150b !important;
      position: relative;
      overflow: hidden;
    }
    .why-bg-slider {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      overflow: hidden;
    }
    .why-bg-slider .why-bg-slide {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.5s ease-in-out, transform 8s ease-out;
      transform: scale(1);
    }
    .why-bg-slider .why-bg-slide.active {
      opacity: 1;
      transform: scale(1.06);
    }
    .why-overlay {
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at center, rgba(4, 21, 11, 0.50) 0%, rgba(4, 21, 11, 0.85) 100%);
      z-index: 1;
      pointer-events: none;
    }

    .why-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      z-index: 2;
      pointer-events: none;
      animation: orbFloat 10s ease-in-out infinite;
    }
    .why-orb-1 {
      width: 550px; height: 550px;
      background: radial-gradient(circle, rgba(22, 101, 52, 0.25) 0%, rgba(6, 70, 30, 0.10) 50%, transparent 70%);
      top: -20%; left: -8%;
      animation-delay: 0s;
    }
    .why-orb-2 {
      width: 450px; height: 450px;
      background: radial-gradient(circle, rgba(16, 85, 42, 0.20) 0%, rgba(10, 60, 25, 0.05) 50%, transparent 70%);
      bottom: -20%; right: -5%;
      animation-delay: -4s;
    }

    .why-slider-wrapper {
      width: 100%;
      max-width: 860px;
      margin: 0 auto;
      overflow: hidden;
      position: relative;
      z-index: 2;
    }

    .why-slider-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: rgba(18, 30, 23, 0.75);
      border: 1px solid rgba(212, 175, 55, 0.35);
      color: var(--color-gold);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .why-slider-arrow:hover {
      background: var(--color-gold);
      color: var(--color-primary);
      border-color: var(--color-gold);
      box-shadow: 0 0 15px rgba(212, 175, 55, 0.45);
      transform: translateY(-50%) scale(1.08);
    }

    .why-prev {
      left: 10px;
    }

    .why-next {
      right: 10px;
    }

    .why-slider {
      display: flex;
      width: 100%;
      transition: transform 1.5s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .pillar-card-wrapper {
      width: 100%;
      flex: 0 0 100%;
      padding: var(--space-md);
      box-sizing: border-box;
    }

    .why-slider .pillar-card {
      background: rgba(255, 255, 255, 0.08) !important;
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border: 1px solid rgba(212, 175, 55, 0.25) !important;
      border-radius: 24px;
      padding: var(--space-3xl) var(--space-xl) !important;
      text-align: center;
      transition: all 0.4s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: var(--space-md);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      position: relative;
      overflow: hidden;
    }

    .why-slider .pillar-card::before {
      background: linear-gradient(to bottom, rgba(212, 175, 55, 0.4), rgba(150, 117, 21, 0.4)) !important;
      width: 4px;
      transition: all 0.4s ease;
    }

    .why-slider .pillar-card:hover::before {
      background: linear-gradient(to bottom, #ffe89e, #d4af37, #b38600) !important;
      width: 8px;
    }

    .why-slider .pillar-card h3 {
      color: var(--color-bg) !important;
      font-size: 1.65rem;
      margin: 0;
      font-family: var(--font-serif);
      font-weight: 500;
    }

    .why-slider .pillar-card p {
      color: rgba(250, 248, 245, 0.75) !important;
      font-size: 1.1rem;
      line-height: 1.6;
      margin: 0;
      max-width: 480px;
    }

    /* Glassmorphic Double-Ring Golden Icons styling */
    .why-slider .pillar-icon {
      width: 84px;
      height: 84px;
      border-radius: 50%;
      background: rgba(212, 175, 55, 0.08);
      border: 2px solid rgba(212, 175, 55, 0.45);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.3rem;
      color: var(--color-gold) !important;
      box-shadow: 
        0 8px 24px rgba(212, 175, 55, 0.15), 
        inset 0 0 15px rgba(212, 175, 55, 0.1);
      transform: perspective(600px) translateZ(10px);
      transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
      margin-bottom: var(--space-sm);
      position: relative;
    }
    .why-slider .pillar-icon::before {
      content: '';
      position: absolute;
      inset: -6px;
      border: 1px solid rgba(212, 175, 55, 0.2);
      border-radius: 50%;
      transition: all 0.5s ease;
      pointer-events: none;
    }

    .why-slider .pillar-card:hover {
      border-color: rgba(212, 175, 55, 0.75) !important;
      background: rgba(255, 255, 255, 0.15) !important;
      transform: translateY(-4px);
      box-shadow: 
        0 0 25px rgba(212, 175, 55, 0.2),
        0 25px 50px rgba(0,0,0,0.4);
    }

    .why-slider .pillar-card:hover .pillar-icon {
      transform: perspective(600px) translateZ(25px) scale(1.08);
      border-color: var(--color-gold);
      background: rgba(212, 175, 55, 0.15);
      color: var(--color-gold-light) !important;
      box-shadow: 
        0 15px 30px rgba(212, 175, 55, 0.35), 
        inset 0 0 20px rgba(212, 175, 55, 0.2);
    }
    .why-slider .pillar-card:hover .pillar-icon::before {
      inset: -10px;
      border-color: rgba(212, 175, 55, 0.4);
      transform: rotate(180deg);
    }

    /* ===== FEATURED COLLECTIONS IMMERSIVE SLIDER ===== */
    .feat-slider-outer {
      position: relative;
      width: 100%;
      height: 520px;
      overflow: hidden;
      background: #0a0f0a;
    }

    .feat-slider-track {
      display: flex;
      width: 100%;
      height: 100%;
      transition: transform 0.9s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .feat-slide {
      position: relative;
      min-width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .feat-slide-bg {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.04);
      transition: transform 7s ease-out;
      z-index: 0;
    }

    .feat-slide.active .feat-slide-bg {
      transform: scale(1.0);
    }

    .feat-slide-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        105deg,
        rgba(5, 10, 7, 0.88) 0%,
        rgba(5, 10, 7, 0.68) 38%,
        rgba(5, 10, 7, 0.15) 65%,
        rgba(5, 10, 7, 0.05) 100%
      );
      z-index: 1;
    }

    .feat-slide-content {
      position: absolute;
      top: 50%;
      left: max(5vw, calc((100vw - 1280px) / 2));
      transform: translateY(-50%);
      z-index: 2;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.045);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border: 1px solid rgba(212, 175, 55, 0.18);
      border-radius: 20px;
      padding: 2.5rem 2.2rem;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
    }

    .feat-slide-tag {
      font-family: var(--font-sans);
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--color-gold);
      margin-bottom: 0.75rem;
    }

    .feat-slide-title {
      font-family: var(--font-serif);
      font-size: 2.1rem;
      font-weight: 500;
      color: var(--color-bg);
      line-height: 1.2;
      margin: 0 0 1rem 0;
    }

    .feat-slide-desc {
      font-size: 0.97rem;
      color: rgba(250, 248, 245, 0.80);
      line-height: 1.65;
      margin: 0 0 1.5rem 0;
    }

    .feat-slide-btn {
      background: var(--color-gold) !important;
      color: #111 !important;
      font-weight: 700;
      font-size: 0.82rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      padding: 0.75rem 1.8rem !important;
      border-radius: 50px !important;
      border: none !important;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .feat-slide-btn:hover {
      background: #e8c730 !important;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
    }

    .feat-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: rgba(18, 30, 23, 0.7);
      border: 1px solid rgba(212, 175, 55, 0.35);
      color: var(--color-gold);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      transition: all 0.3s ease;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.35);
      font-size: 1.1rem;
    }

    .feat-arrow:hover {
      background: var(--color-gold);
      color: #111;
      border-color: var(--color-gold);
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.45);
      transform: translateY(-50%) scale(1.08);
    }

    .feat-prev { left: 22px; }
    .feat-next { right: 22px; }

    .feat-counter {
      position: absolute;
      bottom: 20px;
      right: 26px;
      font-family: var(--font-sans);
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      color: rgba(250, 248, 245, 0.65);
      z-index: 10;
    }

    @media (max-width: 768px) {
      .feat-slider-outer { height: 460px; }
      .feat-slide-content { left: 5%; max-width: 88%; padding: 1.8rem 1.5rem; }
      .feat-slide-title { font-size: 1.7rem; }
    }

    /* ===== OUR HERITAGE — 4 STEPS OF PURITY (LIGHT SLIDER) ===== */
    .heritage-section {
      position: relative;
      padding: 0;
      background: 
        radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.08) 0%, transparent 60%),
        radial-gradient(circle at 90% 80%, rgba(194, 125, 86, 0.06) 0%, transparent 60%),
        linear-gradient(180deg, #FAF8F5 0%, #F5F1E9 100%);
      overflow: hidden;
      min-height: 600px;
      border-top: 1px solid rgba(212, 175, 55, 0.15);
      border-bottom: 1px solid rgba(212, 175, 55, 0.15);
    }

    /* Animated aurora orbs */
    .heritage-aurora {
      position: absolute; inset: 0; pointer-events: none; overflow: hidden; z-index: 0;
    }
    .h-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      animation: hOrbFloat 12s ease-in-out infinite;
    }
    .h-orb-1 {
      width: 550px; height: 550px;
      background: radial-gradient(circle, rgba(212,175,55,0.12) 0%, rgba(180,130,20,0.04) 50%, transparent 70%);
      top: -20%; left: 0%;
      animation-delay: 0s;
    }
    .h-orb-2 {
      width: 400px; height: 400px;
      background: radial-gradient(circle, rgba(240,200,80,0.08) 0%, rgba(200,150,30,0.02) 50%, transparent 70%);
      bottom: -15%; right: 5%;
      animation-delay: -5s;
    }
    .h-orb-3 {
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(255,215,80,0.06) 0%, transparent 70%);
      top: 35%; right: 18%;
      animation-delay: -9s;
    }
    @keyframes hOrbFloat {
      0%, 100% { transform: translateY(0) scale(1); }
      50%       { transform: translateY(-35px) scale(1.08); }
    }

    /* Slider container */
    .heritage-slider-wrap {
      position: relative;
      z-index: 2;
      overflow: hidden;
      width: 100%;
    }
    .heritage-slides {
      display: flex;
      transition: transform 0.85s cubic-bezier(0.77, 0, 0.175, 1);
      width: 100%;
    }
    .heritage-slide {
      min-width: 100%;
      display: grid;
      grid-template-columns: 1fr 1fr;
      min-height: 560px;
    }

    /* Left text panel */
    .h-slide-text {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem 3.5rem 4rem max(5vw, calc((100vw - 1280px) / 2));
      gap: 1.5rem;
    }
    .h-slide-step-num {
      font-family: var(--font-serif);
      font-size: 7rem;
      font-weight: 700;
      line-height: 1;
      color: transparent;
      -webkit-text-stroke: 1.5px rgba(212,175,55,0.45);
      margin-bottom: -2rem;
    }
    .h-slide-tag {
      font-family: var(--font-sans);
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--color-gold);
    }
    .h-slide-title {
      font-family: var(--font-serif);
      font-size: 2.8rem;
      font-weight: 500;
      color: var(--color-primary);
      line-height: 1.2;
      margin: 0;
    }
    .h-slide-desc {
      font-size: 1rem;
      color: var(--color-text-muted);
      line-height: 1.75;
      max-width: 420px;
      margin: 0;
    }
    .h-slide-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 54px; height: 54px;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(212,175,55,0.18), rgba(212,175,55,0.06));
      border: 1px solid rgba(212,175,55,0.35);
      color: var(--color-gold);
      font-size: 1.35rem;
      backdrop-filter: blur(6px);
    }

    /* Right image panel */
    .h-slide-img {
      position: relative;
      overflow: hidden;
    }
    .h-slide-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transform: scale(1.06);
      transition: transform 7s ease-out;
      filter: brightness(0.85) saturate(1.1);
    }
    .heritage-slide.active .h-slide-img img {
      transform: scale(1);
    }
    .h-slide-img::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(250, 248, 245, 1) 0%, rgba(250, 248, 245, 0.2) 40%, transparent 100%);
      z-index: 1;
    }

    /* Step dots at bottom */
    .heritage-dots {
      position: absolute;
      bottom: 24px;
      left: max(5vw, calc((100vw - 1280px) / 2));
      display: flex;
      gap: 10px;
      z-index: 10;
    }
    .h-dot {
      width: 28px; height: 3px;
      border-radius: 2px;
      background: rgba(212,175,55,0.35);
      cursor: pointer;
      transition: all 0.4s ease;
    }
    .h-dot.active {
      background: var(--color-gold);
      width: 48px;
    }

    /* Section header above slider */
    .heritage-hdr {
      text-align: center;
      padding: var(--space-3xl) 0 var(--space-2xl) 0;
      position: relative;
      z-index: 2;
    }
    .heritage-hdr-eye {
      display: inline-block;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--color-gold);
      margin-bottom: var(--space-sm);
    }
    .heritage-hdr h2 {
      font-size: 2.8rem;
      color: var(--color-primary);
      margin: 0 0 var(--space-sm) 0;
    }
    .heritage-hdr p {
      color: var(--color-text-muted);
      max-width: 540px;
      margin: 0 auto;
      font-size: 1rem;
      line-height: 1.7;
    }

    @media (max-width: 900px) {
      .heritage-slide { grid-template-columns: 1fr; min-height: auto; }
      .h-slide-text { padding: 2.5rem 5%; }
      .h-slide-img { height: 280px; }
      .h-slide-img img { height: 280px; }
      .h-slide-title { font-size: 2rem; }
      .h-slide-step-num { font-size: 5rem; }
      .h-slide-img::before {
        background: linear-gradient(180deg, rgba(250, 248, 245, 1) 0%, transparent 40%) !important;
      }
    }

    /* Video section cover image */
    .video-cover-img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
      filter: brightness(0.45) saturate(1.1);
      transition: filter 0.5s ease;
    }
    .video-eyebrow {
      display: inline-block;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--color-gold);
      margin-bottom: 1rem;
    }
    .video-cover-text {
      text-align: center;
      margin-bottom: 1.5rem;
    }

  </style>
  <?php wp_head(); ?>
</head>
<body>

  <!-- Navigation Header -->
  <header class="header header-transparent" id="mainHeader">
    <div class="container header-container">
      <a href="index.html" class="logo-wrapper" id="headerLogo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-logo-golden.webp" alt="The Mother's Fragrances Logo" class="logo-img" style="height: 38px; width: auto; margin-right: var(--space-xs); filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.15));">
        <div class="logo-text">
          The Mother's Fragrances
        </div>
      </a>
      
      <nav class="nav" id="desktopNav">
        <!-- MEGA MENU WRAPPER -->
        <div class="has-mega-menu">
          <a href="#" class="nav-link">Catalog <i class="fa-solid fa-angle-down" style="font-size: 0.8em; margin-left: 4px;"></i></a>
          
          <div class="mega-menu">
            <div class="mega-menu-column">
              <h3 class="mega-menu-heading">Shop by Product</h3>
              <ul class="mega-menu-list">
                <li><a href="incense.html">Incense Sticks</a></li>
                <li><a href="cones.html">Botanical Cones</a></li>
                <li><a href="essential-oil.html">Essential Oils</a></li>
                <li><a href="tapestry.html">Mandala Tapestries</a></li>
                <li><a href="products.html">View All Products</a></li>
              </ul>
            </div>
            
            <div class="mega-menu-column">
              <h3 class="mega-menu-heading">Shop by Fragrance</h3>
              <ul class="mega-menu-list">
                <li><a href="fragrances.html#floral">Floral Series</a></li>
                <li><a href="fragrances.html#woody">Woody & Earthy</a></li>
                <li><a href="fragrances.html#spicy">Spicy & Exotic</a></li>
                <li><a href="fragrances.html#sweet">Sweet & Resinous</a></li>
                <li><a href="ingredients.html">Our Natural Ingredients</a></li>
              </ul>
            </div>
            
            <div class="mega-menu-column">
              <div class="mega-menu-featured">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/incense_premium_bundle_1781801699731.png" alt="Featured Premium Collection">
                <div class="mega-menu-featured-content">
                  <h3>Premium Collection</h3>
                  <p>Discover our best-selling hand-rolled incense bundles.</p>
                  <a href="products.html" class="btn btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.9rem;">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /MEGA MENU WRAPPER -->
<a href="index.html" class="nav-link">Home</a>
        <a href="fragrances.html" class="nav-link">Fragrances</a>
        <a href="products.html" class="nav-link">Products</a>
        <a href="about-us.html" class="nav-link">About Us</a>
        <a href="contact.html" class="nav-link">Contact</a>
      </nav>

      <div class="nav-actions">
        <a href="contact.html" class="btn btn-outline" id="navCta">Enquire Now</a>
        <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle mobile menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>
